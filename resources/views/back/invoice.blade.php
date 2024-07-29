@extends('back.layout.main_view')

@push('title')
    Invoice | QASTARAT & DAWALI CLINICS
@endpush

@section('content-section')


    <?php
    $D = json_decode(json_encode(Auth::guard('doctor')->user()->get_role()), true);
    $arr = [];
    foreach ($D as $v) {
        $arr[] = $v['permission_id'];
    }
    ?>

    <!-- delete Modal -->

    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                {{-- <div class="modal-header">

                <button type="button" class="close customClose" data-bs-dismiss="modal"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> --}}

                <div class="modal-header">
                    {{-- <h1 class="modal-title" id="exampleModalLabel">Add or Remove Diagnosis</h1> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>


                <form action="{{ route('delete.invoice') }}" method="post" /> @csrf
                <div class="modal-body">



                    <div class="text-center">



                        <div class=" fs-15 mx-4 mx-sm-5 mb-3">

                            <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>

                        </div>



                        <input type="hidden" name="common" id="hidden_id" value="" />



                    </div>

                    <div class="action text-end bottom_modal">
                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient btn-danger"
                            data-bs-dismiss="modal">
                            Yes, Delete It!</button>
                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">
                            Close</a>
                    </div>


                    {{-- <div class="d-flex gap-2 justify-content-center mt-4 mb-2">

                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>

                    <button type="sumit" class="btn-danger " id="delete-record">Yes, Delete It!</button>

                </div> --}}

                </div>

                </form>

            </div>

        </div>

    </div>

    <!--end modal -->



    <style>
        .selectedpatientlist ul li {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f6f9fb;
            padding: 12px 20px;
            border-radius: 5px;
        }

        .selectedpatientlist h2 {
            font-size: 16px;
            display: flex;
            font-weight: normal;
            align-items: center;
        }

        .alertslted_text {
            color: #f44;
            font-size: 14px;
            margin-left: 10px;
        }

        .selectedpatientlist ul {
            margin-top: 20px;
        }

        .selectedpatientlist ul li {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f6f9fb;
            padding: 12px 20px;
            border-radius: 5px;
            margin-bottom: 8px;
        }

        form.paidMain {
            position: absolute;
            top: 1px;
            right: 193px;
        }

        .paid_select {

            padding: 6px 15px;

        }

        .paid_btn {
            padding: 9px 15px;

        }
    </style>


    <div class="modal fade select2_dp centercanvas" id="close_lab" tabindex="-1" aria-labelledby="exampleModalLabel12"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="offcanvas-body small p-0">

                    <div class="invoicenotedet_box">

                        <div class="invoice_notebox_header">

                            <div class="invuser_nametopay">

                                <h1><span class="patientNameCls"></span> | Invoice Number <span
                                        class="invoiceNumber"></span></h1>

                            </div>


                        </div>



                        <div class="invuserinvoice_middle">

                            <table class="rwd-table">

                                <thead>

                                    <tr>

                                        <th>Total Paid Amount</th>


                                        <th>Date Paid</th>

                                        <th>Payment Method</th>

                                    </tr>

                                </thead>




                                <tbody>



                                    <tr>


                                        <td class="hiddenamountPaid" data-th="Supplier Code">





                                        </td>




                                        <td data-th="Invoice Date ">

                                            <div class="invdate_input input_width">
                                                <input type="text" class="form-control " name="datePaid" id="datePaid"
                                                    readonly>
                                            </div>

                                        </td>

                                        <td data-th="paymentMethod">
                                            <div class="invdate_input input_width">
                                                <input type="text" class="form-control" id="paymentMethod" readonly>
                                            </div>

                                        </td>



                                    </tr>



                                </tbody>

                                </form>

                            </table>

                        </div>



                        <div class="newbalance_area">

                            <div class="type_noteforinv_user">

                                <div class="custom_textareadet">

                                    <label for="exampleFormControlTextarea1" class="form-label">Add Note</label>

                                    <textarea class="form-control" id="paymentNote" rows="3"
                                        placeholder="Type any notes related to this invoice here..."></textarea>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="offcanvas-footer">

                    <div class="frmbtn_areasubmit">

                        <button type="button" id="closeFormBtn"
                            class="btn cmncanvasft_buttons r-04 btn--theme hover--tra-black secondary_btn">Close</button>

                    </div>

                </div>


            </div>
        </div>
    </div>














    <div class="modal fade select2_dp centercanvas" id="add_lab" tabindex="-1" aria-labelledby="exampleModalLabel12"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form action="{{ route('submit.invoice') }}" method="post" /> @csrf
                <div class="offcanvas-body small p-0">

                    <div class="invoicenotedet_box">

                        <div class="invoice_notebox_header">

                            <div class="invuser_nametopay">

                                <h1><span class="patientNameCls"></span> | Invoice Number <span
                                        class="invoiceNumber"></span></h1>

                            </div>



                            {{-- <div class="fullypaid_invbox">

                     <button type="button" class="ft_buttonshoover">Mark Fully Paid</button>

                 </div> --}}

                        </div>



                        <div class="invuserinvoice_middle">

                            <table class="rwd-table">

                                <thead>

                                    <tr>

                                        <th>Total Amount</th>

                                        <th>Date Paid</th>

                                        <th>Payment Method</th>

                                    </tr>

                                </thead>




                                <tbody>



                                    <tr>

                                        <td class="amountPaid" data-th="Supplier Code">



                                        </td>



                                        <td data-th="Invoice Date ">

                                            <div class="invdate_input input_width">
                                                <input type="text" name="datePaid"
                                                    class="form-control datepickerInput comoninpt_border"
                                                    placeholder="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" readonly>
                                                <iconify-icon icon="solar:calendar-linear"></iconify-icon>
                                            </div>

                                            <input type="hidden" name="invoiceId" id="invoiceIdCls">

                                        </td>

                                        <td data-th="Due Date">

                                            <select name="paymentMethod">

                                                <option value="Cash">Cash</option>

                                                <option value="Card">Card</option>

                                                <option value="Credit">Online</option>

                                            </select>

                                        </td>



                                    </tr>



                                </tbody>

                                </form>

                            </table>

                        </div>



                        <div class="newbalance_area">

                            <div class="type_noteforinv_user">

                                <div class="custom_textareadet">

                                    <label for="exampleFormControlTextarea1" class="form-label">Add Note</label>

                                    <textarea class="form-control" name="paymentNote" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="Type any notes related to this invoice here..."></textarea>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="offcanvas-footer">

                    <div class="frmbtn_areasubmit">

                        <!-- <button type="submit" class="btn btn-primary  edit__green">Edit</button> -->


                        <button type="submit"
                            class="btn cmncanvasft_buttons r-04 btn--theme hover--tra-black add_patient">Save</button>

                        <button type="button" id="closeFormBtn"
                            class="btn cmncanvasft_buttons r-04 btn--theme hover--tra-black secondary_btn">Close</button>

                    </div>

                </div>

                </form>



            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Find the close button element
            var closeButton = document.getElementById('closeFormBtn');

            // Find the modal element
            var modalElement = document.getElementById('add_lab');
            var modalElement2 = document.getElementById('close_lab');

            // Add a click event listener to the close button
            closeButton.addEventListener('click', function() {
                // Use Bootstrap modal method to hide the modal
                $(modalElement).modal('hide');
                $(modalElement2).modal('hide');
            });
        });
    </script>




    <div class="table_head_filtersarea invoicing_main_ttop">
        <div class="container">
            <div class="filterinv_data">
                <div class="inv_titlecr">
                    <h1>Invoices</h1>
                </div>
                <!-- <div class="ftinv_center">
                                             <div class="form-group">
                                                <input type="checkbox" id="tests">
                                                <label for="tests">Don't Auto-Invoice Appointments & Tests</label>
                                             </div>
                                             <div class="form-group">
                                                <input type="checkbox" id="future">
                                                <label for="future">Show future invoice items</label>
                                             </div>
                                          </div> -->
                <div class="filterbtn_tabletr">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">

                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link ft_buttonshoover active" data-bs-toggle="tab" href="#profile-1"
                                role="tab">
                                <span class="d-block "><iconify-icon
                                        icon="mdi:invoice-arrow-right-outline"></iconify-icon></span>
                                <span class=" d-sm-block">To Invoice</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link ft_buttonshoover" data-bs-toggle="tab" href="#home-1" role="tab">
                                <span class="d-block "><iconify-icon icon="iconamoon:invoice-light"></iconify-icon></span>
                                <span class=" d-sm-block">All Invoices</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link ft_buttonshoover" data-bs-toggle="tab" href="#messages-1" role="tab">
                                <span class="d-block "><iconify-icon
                                        icon="streamline:graph-bar-increase"></iconify-icon></span>
                                <span class=" d-sm-block">Stats</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item waves-effect waves-light">
                                                   <a class="nav-link ft_buttonshoover" data-bs-toggle="tab" href="#settings-1" role="tab">
                                                   <span class="d-block"><iconify-icon icon="tabler:send-off"></iconify-icon></span>
                                                   <span class=" d-sm-block">Last Unsent Invoices</span>
                                                   </a>
                                                </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="tabcontenttable_area incoive_fgi">
        <div class="container">
            <!-- Tab panes -->


            <div class="tab-content  text-muted">
                <div class="tab-pane" id="home-1" role="tabpanel">
                    <div class="row">
                        <div class="customblck_card bggredient">
                            <div class="blcard_header">


                                <h3 class="blcard_header_title ">All Invoices</h3>

                                <form class="paidMain" action="{{ route('user.invoice') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="checkFilter" value="1" />

                                    <div class="row">
                                        <div class="col-6 pe-0">
                                            <select class="form-control paid_select" name="PaymentType" id="Priority">
                                                <option value="" selected>Select Type</option>
                                                <option value="1" {{ $PaymentType == '1' ? 'selected' : '' }}>Paid
                                                </option>
                                                <option value="0" {{ $PaymentType == '0' ? 'selected' : '' }}>Unpaid
                                                </option>
                                            </select>

                                        </div>

                                        <div class="col-6 ps-1">
                                            <button type="submit" class="btn btn_calender_cus btn-success paid_btn"
                                                id="btn-save-event">Submit</button>
                                        </div>
                                    </div>

                                </form>



                                </form>




                            </div>
                            <div class="blcard_body">

                                <div class="datatable-container allinvoice_table custom_table_area invoicing_table">
                                    <table id="allinvoice_table" class="display">
                                        <thead>
                                            <tr>
                                                <th class="sortable " style="width: 31.9661px;">
                                                    <div class="arrow_box">
                                                        <span>S.No.</span>
                                                    </div>
                                                </th>
                                                <th class="sortable" style="width: 87.5521px;">
                                                    <div class="arrow_box">
                                                        <span>Order Date</span>
                                                    </div>
                                                </th>
                                                <th class="sortable " style="width: 71.9141px;">
                                                    <div class="arrow_box">
                                                        <span>Invoice No.</span>
                                                    </div>
                                                </th>

                                                <th class="sortable " style="width: 187.995px;">
                                                    <div class="arrow_box">
                                                        <span>Item</span>
                                                    </div>
                                                </th>

                                                <th class="sortable" style="width: 58.8672px;">
                                                    <div class="arrow_box">
                                                        <span>Patient</span>
                                                    </div>
                                                </th>
                                                <th class="sortable" style="width: 58.8672px;">
                                                    <div class="arrow_box">
                                                        <span>Amount </span>
                                                    </div>
                                                </th>
                                                <th class="sortable" style="width: 58.8672px;">
                                                    <div class="arrow_box">
                                                        <span>% Discount </span>
                                                    </div>
                                                </th>
                                                <th class="sortable" style="width: 58.8672px;">
                                                    <div class="arrow_box">
                                                        <span>% VAT </span>
                                                    </div>
                                                </th>

                                                <th class="sortable" style="width: 86.9661px;">
                                                    <div class="arrow_box">
                                                        <span>Final Amount </span>
                                                    </div>
                                                </th>

                                                <th class="sortable" style="width: 41.9661px;">
                                                    <div class="arrow_box">
                                                        <span>Status</span>
                                                    </div>
                                                </th>

                                                <th class="sortable" style="width: 29.9219px;">
                                                    <div class="arrow_box">
                                                        <span>Sent</span>
                                                    </div>
                                                </th>
                                                <th class="sortable" style="width: 44.987px;">
                                                    <div class="arrow_box">
                                                        <span>Action</span>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                            @forelse ($allInvoice as $key=>$alltaskInvoice)
                                                @if ($alltaskInvoice->paidStatus == '1')
                                                    <tr class="pain_inv odd">
                                                @endif

                                                @if ($alltaskInvoice->paidStatus == '0')
                                                    <tr class="unpaid_inv even">
                                                @endif
                                                <td>{{ $key + 1 }}</td>

                                                <td>{{ \Carbon\Carbon::parse($alltaskInvoice->created_at)->format('Y-m-d H:i:s') }}
                                                </td>


                                                <td>{{ $alltaskInvoice->invoiceNumber }}</td>

                                                @php
                                                    $pathology_price_list = DB::table('pathology_price_list')->where(
                                                        'id',
                                                        $alltaskInvoice->task,
                                                    );
                                                    $pathology_price_list = $pathology_price_list->first();
                                                    $patient = DB::table('users')
                                                        ->where('id', $alltaskInvoice->patient_id)
                                                        ->first();

                                                @endphp


                                                <td data-title="Item">
                                                    <div class="item_details_tb">
                                                        <h2>{{ $pathology_price_list->test_name ?? '' }}</h2>
                                                        <span>{{ $patient->name ?? '' }} | Email:
                                                            <a
                                                                href="mailto:{{ $patient->email??'' }}">{{ $patient->email??'' }}</a>
                                                        </span>
                                                    </div>
                                                </td>


                                                <td>
                                                    @php

                                                        $patientName = DB::table('users')
                                                            ->whereId($alltaskInvoice->patient_id)
                                                            ->first();
                                                        $amount = DB::table('pathology_price_list')
                                                            ->whereId($alltaskInvoice->task)
                                                            ->first();

                                                    @endphp
                                                    <div class="flex-grow-1">{{ $patientName->name??'' }}</div>
                                                </td>

                                                @if ($amount->price)
                                                    <td>{{env('SHOW_CURRENCY')}} {{ $alltaskInvoice->amountPaid }}.00</td>
                                                @else
                                                    <td></td>
                                                @endif



                                                <td>
                                                    @isset($alltaskInvoice->discount)
                                                        {{ $alltaskInvoice->discount }}%
                                                    @else
                                                        No discount available
                                                    @endisset
                                                </td>

                                                <td>
                                                    @isset($alltaskInvoice->vatDiscount)
                                                        {{ $alltaskInvoice->vatDiscount }} %
                                                    @else
                                                        No discount available
                                                    @endisset
                                                </td>

                                                @if ($alltaskInvoice->finalAmount)
                                                    <td>{{env('SHOW_CURRENCY')}} {{ $alltaskInvoice->finalAmount }}.00</td>
                                                @else
                                                    <td></td>
                                                @endif

                                                @if ($alltaskInvoice->paidStatus == '1')
                                                    <td>
                                                        <div class="statusuccess_itgt">
                                                            <div class="activecircle">
                                                                <div class="mini_circlegreen"></div>
                                                            </div>
                                                            Paid
                                                        </div>
                                                    </td>
                                                @endif


                                                @if ($alltaskInvoice->paidStatus == '0')
                                                    <td>
                                                        <div class="statusinactive_itgt">
                                                            <div class="activecircle">
                                                                <div class="mini_circlegreen"></div>
                                                            </div>
                                                            Unpaid
                                                        </div>

                                                    </td>
                                                @endif


                                                @if ($alltaskInvoice->paidStatus == '1')
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" checked disabled>
                                                     </div>
                                                </td>
                                                @endif


                                                @if ($alltaskInvoice->paidStatus == '0')
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                     </div>
                                                </td>
                                                @endif



                                                <td>

                                                    <div class="customactions_dt">

                                                        <ul>

                                                            @if (in_array('9', $arr))
                                                                @if ($alltaskInvoice->paidStatus == '0')
                                                                    <li id="invoice-item"
                                                                        onclick="openInvoice(
                                             '{{ $alltaskInvoice->id ?? '' }}',
                                             '{{ $patientName->name ?? '' }}',
                                             '{{ $alltaskInvoice->invoiceNumber ?? '' }}',
                                             '{{ $amount->price ?? (0 - $alltaskInvoice->discountAmount ?? '') }}',
                                             '{{ $alltaskInvoice->payAmount ?? 0 }}',
                                             '{{ $alltaskInvoice->finalAmount ?? '' }}'
                                       )"
                                                                        aria-controls="offcanvasBottom">
                                                                        <div class="comonactionbtn copybtn">
                                                                            <img src="{{ url('/assets/images/new-images/note.gif') }}"
                                                                                alt="">
                                                                        </div>
                                                                    </li>
                                                                @else
                                                                    <li id="invoice-item"
                                                                        onclick="closeInvoice(
                                             '{{ $alltaskInvoice->id ?? '' }}',
                                             '{{ $patientName->name ?? '' }}',
                                             '{{ $alltaskInvoice->invoiceNumber ?? '' }}',
                                             '{{ $amount->price ?? (0 - $alltaskInvoice->discountAmount ?? '') }}',
                                             '{{ $alltaskInvoice->payAmount ?? 0 }}',
                                             '{{ $alltaskInvoice->finalAmount ?? '' }}',
                                             '{{ $alltaskInvoice->paymentNote ?? '' }}',
                                             '{{ $alltaskInvoice->datePaid ?? '' }}',
                                             '{{ $alltaskInvoice->paymentMethod ?? '' }}'
                                       )"
                                                                        aria-controls="offcanvasBottom">
                                                                        <div class="comonactionbtn copybtn">
                                                                            <img src="{{ url('/assets/images/new-images/note.gif') }}"
                                                                                alt="">
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                            @endif




                                                            @if (in_array('7', $arr))
                                                                <li>

                                                                    <a href="{{ route('user.print.invoice', ['id' => $alltaskInvoice->id]) }}"
                                                                        target="_blank">

                                                                        <div class="comonactionbtn printbtnacti">

                                                                            <img src="{{ asset('/assets/images/new-images/printer.gif')}}"
                                                                                alt="">

                                                                        </div>

                                                                    </a>

                                                                </li>
                                                            @endif



                                                        </ul>

                                                    </div>

                                                </td>








                                                </tr>

                                            @empty
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                                <!-- table end -->
                            </div>
                        </div>
                    </div>
                </div>





                <div class="tab-pane active" id="profile-1" role="tabpanel">
                    <div class="row">
                        <div class="customblck_card bggredient">

                            <div class="blcard_body">
                                <div class="datatable-container allinvoice_table custom_table_area invoicing_table">
                                    <table id="allinvoice_table" class="display">
                                        <thead>
                                            <tr>
                                                <th scope="col">Item</th>
                                                <th scope="col">Invoice</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Cost</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($toInvocie as $key=>$alltaskInvoice)
                                                @php
                                                    $pathology_price_list = DB::table('pathology_price_list')->where(
                                                        'id',
                                                        $alltaskInvoice->task,
                                                    );
                                                    $pathology_price_list = $pathology_price_list->first();
                                                    $patient = DB::table('users')
                                                        ->where('id', $alltaskInvoice->patient_id)
                                                        ->first();

                                                @endphp
                                                <tr>
                                                    <td data-title="Item">
                                                        <div class="item_details_tb">
                                                            <h2>{{ $pathology_price_list->test_name ?? 'Appointment' }}

                                                            @if ($alltaskInvoice->appoinment_date)
                                                            <span class="taskDate" style="color: #19276d;">{{$alltaskInvoice->appoinment_date}}</span>
                                                                
                                                            @endif
                                                            </h2>
                                                            <span>{{ $patient->name ?? '' }} | Email:
                                                                <a
                                                                    href="mailto:{{ $patient->email ?? '' }}">{{ $patient->email ?? '' }}</a>
                                                            </span>
                                                        </div>
                                                    </td>

                                                    <td>{{ $alltaskInvoice->invoiceNumber }}</td>

                                                    <td data-title="Date">
                                                        {{ \Carbon\Carbon::parse($alltaskInvoice->created_at)->format('M d, Y') }}

                                                    </td>
                                                    @php
                                                        $amount = DB::table('pathology_price_list')
                                                            ->whereId($alltaskInvoice->task)
                                                            ->first();
                                                    @endphp
                                                    <td data-title="Cost">
                                                        <div class="discount_inputvt">
                                                            <input type="text" class="form-control comoninpt_border"
                                                                id="amount{{ $key + 2 }}" name="amount"
                                                                value="{{ $amount->price??'0' }}" readonly>
                                                            <input type="text"
                                                                class="form-control comoninpt_border numericInput"
                                                                onclick="discountPrice(`checkbox3{{ $key + 1 }}`)"
                                                                id="discount{{ $key + 2 }}" name="discount"
                                                                placeholder=" % Discount">
                                                            <input type="text" class="form-control comoninpt_border"
                                                                onclick="vatPrice(`checkbox3{{ $key + 1 }}`)"
                                                                id="vat{{ $key + 2 }}" placeholder=" % VAT">
                                                        </div>
                                                    </td>


                                                    <td data-title="Action">
                                                        <div class="dltwh_check">
                                                            <div class="deletebtn_prtientgh"
                                                                onclick="removeInvoice(`{{ $alltaskInvoice->id }}`)">
                                                                {{-- <a class="btn text-danger btn-sm" onclick="deleteRow(356)" data-bs-toggle="tooltip" data-bs-original-title="Delete"><span class="fe fe-trash-2 fs-14"></span></a> --}}
                                                                <iconify-icon
                                                                    icon="fluent:delete-24-regular"></iconify-icon>
                                                            </div>
                                                            <div class="round_custom">
                                                                <input type="checkbox"
                                                                    onclick="checkData(`{{ $amount->price??'0' }}`,`{{ $alltaskInvoice->id }}`,`amount{{ $key + 2 }}`,`discount{{ $key + 2 }}`,`vat{{ $key + 2 }}`,this,`{{ $pathology_price_list->test_name ?? '' }}`,`{{ $patient->name ?? '' }}`,`{{ $patient->email ?? '' }}`,`{{ \Carbon\Carbon::parse($alltaskInvoice->created_at)->format('M d, Y') }}`)"
                                                                    id="checkbox3{{ $key + 1 }}" />
                                                                <label for="checkbox3{{ $key + 1 }}"></label>
                                                            </div>
                                                        </div>
                                                    </td>




                                                </tr>

                                            @empty
                                            @endforelse



                                        </tbody>
                                    </table>
                                </div>



                                <form action={{ route('user.invoice_item_add') }} method="post" /> @csrf
                                <div class="selectedpatientlist">
                                    <h2>Selected Items - <div class="alertslted_text">Ensure these belong to the same
                                            patient before generating invoice!</div>
                                    </h2>

                                    <ul id="appendItemCls">


                                    </ul>

                                    <div class="createinvoice_selectitem">
                                        <div class="selted_inpt">

                                        </div>

                                        <div class="cret_buttonart">
                                            <button type="button" id="buttonSubmit"
                                                style="background: #d3e2f1; color: black;">Create Invoice With Selected
                                                Items</button>
                                            <button type="submit" id="submitButton">Create Invoice With Selected
                                                Items</button>
                                        </div>
                                    </div>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                




                <div class="tab-pane" id="messages-1" role="tabpanel">
                    <div class="row">
                        <div class="blcard_header">
                            <div class="stats_charts_title">
                                <h2>Invoice Stats</h2>
                            </div>
                        </div>

                        <div class="col-lg-12">


                            <div class="charts_multiarea">
                                <div class="row invoice_stats">
                                    <!-- Widget 1 Start -->
                                    <div class="col-xxl-3 col-md-6 mb5">
                                        <a href="#">
                                            <div class="card shadow-card p5 border-top-one">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md p-2 bg-one">
                                                            <iconify-icon icon="guidance:in-patient"
                                                                width="24"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">Total
                                                            Patient</p>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="fw-semibold mb-0 lh-1 total_count__">
                                                                {{ $totalPatient }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                    <!-- Widget 1 End -->

                                    <!-- Widget 1 Start -->
                                    <div class="col-xxl-3 col-md-6 mb5">
                                        <a href="#">
                                            <div class="card shadow-card p5 border-top-two">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md p-2 bg-two">

                                                            <iconify-icon icon="basil:invoice-outline"
                                                                width="24"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">Total
                                                            invoice raised</p>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="fw-semibold mb-0 lh-1 total_count__">{{env('SHOW_CURRENCY')}}
                                                                {{ $totalRased }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                    <!-- Widget 1 End -->
                                    <!-- Widget 1 Start -->
                                    <div class="col-xxl-3 col-md-6 mb5">
                                        <a href="#">
                                            <div class="card shadow-card p5 border-top-three">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md p-2 bg-three">

                                                            <iconify-icon icon="mdi:invoice-text-check-outline"
                                                                width="24"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">Total paid
                                                            invoice </p>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="fw-semibold mb-0 lh-1 total_count__">{{env('SHOW_CURRENCY')}}
                                                                {{ $paidfinalAmount }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                    <!-- Widget 1 End -->
                                    <!-- Widget 1 Start -->
                                    <div class="col-xxl-3 col-md-6 mb5">
                                        <a href="#">
                                            <div class="card shadow-card p5 border-top-four">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        <span class="avatar avatar-md p-2 bg-four">
                                                            <!-- <iconify-icon icon="uil:invoice"></iconify-icon> -->
                                                            <iconify-icon icon="mdi:invoice-text-clock-outline"
                                                                width="24"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">Total
                                                            unpaid invoice</p>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            @if ($unpaidfinalAmount > 0)
                                                                <h5 class="fw-semibold mb-0 lh-1 total_count__">{{env('SHOW_CURRENCY')}}
                                                                    {{ $unpaidfinalAmount }}</h5>
                                                            @else
                                                                <h5 class="fw-semibold mb-0 lh-1 total_count__">{{env('SHOW_CURRENCY')}} 0.00
                                                                </h5>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>


                                </div>

                                
                                <div class="row">
                                    <div class="col-lg-6">


                                    <form method="post" action="{{ route('user.invoice') }}" style="padding: 5px;">@csrf
                                        <div class="row">
                                            <div class="col-lg-8">
                                            <select class="form-content select2" name="yearName" id="yearDropdown">
                                                <!-- <option value="">Select Year</option> -->
                                                @foreach ($years as $yr)
                                                        <option value="{{ $yr }}" {{ $year == $yr ? 'selected' : '' }}>{{ $yr }}</option>
                                                @endforeach
                                            </select> 
                                            </div>
                                            <div class="col-lg-4">
                                            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient" style="border-color: #636674 !important;
    background-color: #636674 !important;">

                                                <iconify-icon icon="bi:save"></iconify-icon> Filter

                                                </button>
                                            </div>
                                        </div>
                                                    

                                     </form>




                                        <div class="total_invoices_graph card">
                                            <div class="card-header">
                                                <div class="graphtitle" id="totalInvoices"></div>
                                            </div>
                                            <div class="card-body pb-0">
                                                <div id="chart"></div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="padding-top: 52px;">
                                        <div class="total_invoices_graph card">
                                            <div class="card-header">
                                                <div class="graphtitle">All Invoices</div>
                                            </div>
                                            <div class="card-body pb-0">
                                                <div id="chart2"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    @push('custom-js')
        <!-- invoice datatable -->
        <script>
            $('#allinvoice_table').DataTable({
                scrollX: true,
                "pagingType": "simple_numbers",
                "language": {
                    "paginate": {
                        "previous": '<iconify-icon icon="radix-icons:double-arrow-left"></iconify-icon>',
                        "next": '<iconify-icon icon="radix-icons:double-arrow-right"></iconify-icon>'
                    }
                }
            });
        </script>
        <!-- end -->
        <!-- unsent invoice data table -->
        <script>
            $('.unsentinvoice_table').DataTable({

                "pagingType": "simple_numbers",
                "language": {
                    "paginate": {
                        "previous": '<iconify-icon icon="radix-icons:double-arrow-left"></iconify-icon>',
                        "next": '<iconify-icon icon="radix-icons:double-arrow-right"></iconify-icon>'
                    }
                }
            });
        </script>
        <!-- end -->



        <!-- data table searchbar style js -->
        <script>
            $(document).ready(function() {

                // Iterate through each DataTable
                $('.datatable-container , .toinv_table , .unsent_table').each(function() {
                    const $searchLabel = $(this).find('.dataTables_filter label');
                    const $searchInput = $(this).find('.dataTables_filter input');

                    // Add the search icon (Font Awesome in this example)
                    $searchLabel.prepend('<i class="fas fa-search"></i>');

                    // Update the search filter for each DataTable
                    $('.allinvoice_table').each(function() {
                        const $searchInput = $(this).find('.dataTables_filter input');

                        // Add a placeholder text to the input field
                        $searchInput.attr('placeholder', 'Search Patient...');


                    });

                    // Update the search filter for each DataTable
                    $('.searchhere_tabletext').each(function() {
                        const $searchInput = $(this).find('.dataTables_filter input');

                        // Add a placeholder text to the input field
                        $searchInput.attr('placeholder', 'Search here...');


                    });

                });
            });
        </script>
        <!-- data table searchbar style js end -->





        <!-- createinvoice hide show js -->

        <script>
            $(".round_custom label").click(function() {
                $(".selected_patient_list").toggle();
            })
        </script>


        <script>
            const invoices = <?php echo json_encode($checkInvoice); ?>;

            // Sample data (you can replace it with your actual data)
            const data = {
                months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
                    'November', 'December'
                ],
                invoices: invoices.slice(0, 12) // Assuming $invoices is an array with at least 12 elements
            };

            // Calculate total invoices
            const totalInvoices = data.invoices.reduce((acc, curr) => acc + curr, 0);

            // Display total invoices count
            document.getElementById('totalInvoices').innerText = 'Overall Month Invoices: ' + totalInvoices;

            // Create a chart
            const options = {
                chart: {
                    type: 'bar',
                    height: 390
                },
                series: [{
                    name: 'Total Invoices',
                    data: data.invoices,
                    color: '#484b5c'
                }],
                xaxis: {
                    categories: data.months,
                    labels: {
                        rotate: -45,
                        offsetY: -5,
                        style: {
                            fontSize: '12px',
                            fontFamily: 'Arial, sans-serif'
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Total Invoices'
                    }
                },
                title: {
                    text: 'Invoices Generated by Month',
                    align: 'center'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            position: 'top' // Display data labels on top of bars
                        }
                    }
                }
            };

            const chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();



            const statusData = {
                paid: {{ $paidStatus }},
                unpaid: {{ $unpaidStatus }}
            };

            // Create a chart for invoice status
            const options2 = {
                chart: {
                    type: 'bar',
                    height: 400
                },
                series: [{
                    name: 'Invoice Status',
                    data: Object.values(statusData),
                    color: '#484b5c'
                }],
                xaxis: {
                    categories: Object.keys(statusData),
                    labels: {
                        style: {
                            fontSize: '14px',
                            fontWeight: 600
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Number of Invoices'
                    }
                },
                colors: ['#36A2EB', '#FF6384'], // Blue for paid, Red for unpaid
                title: {
                    text: 'Invoices Status',
                    align: 'center'
                }
            };

            // Render the second chart
            const chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
            chart2.render();


            // Sample data (you can replace it with your actual data)
            const patientsData = {
                totalPatients: 500,
                totalPaidPatients: 300,
                totalAmount: 1500 // Assuming the total amount is $150,000
            };

            // Create a chart for patients information
            const options3 = {
                chart: {
                    type: 'bar',
                    height: 400
                },
                series: [{
                    name: 'Patients Information',
                    data: [patientsData.totalPatients, patientsData.totalPaidPatients, patientsData.totalAmount],
                    color: '#484b5c'
                }],
                xaxis: {
                    categories: ['Total Patients', 'Total Paid Patients', 'Total Amount'],
                    labels: {
                        style: {
                            fontSize: '14px',
                            fontWeight: 600
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: 'Count / Amount'
                    }
                },
                colors: ['#007bff', '#28a745',
                    '#ffc107'
                ], // Blue for total patients, Green for total paid patients, Yellow for total amount
                title: {
                    text: 'Patients Information',
                    align: 'center'
                }
            };

            // Render the third chart
            const chart3 = new ApexCharts(document.querySelector("#chart3"), options3);
            chart3.render();



            function vatPrice(checkValue) {
                const checkbox = document.getElementById(checkValue);
                checkbox.checked = false;
            }

            function discountPrice(checkValue) {
                const checkbox = document.getElementById(checkValue);
                checkbox.checked = false;
            }

            function removeInvoice(id) {
                $('#hidden_id').val(id);
                $("#deleteRecordModal").modal('show');
            }


            var submitButton = document.getElementById('submitButton');
            submitButton.style.display = 'none';

            function checkData(taskPrice,taskId, amount, discountkey, vatKey, checkbox, testname, name, email, createdAt) {

                var submitButton = document.getElementById('submitButton');
                submitButton.style.display = 'block';

                var buttonSubmit = document.getElementById('buttonSubmit');
                buttonSubmit.style.display = 'none';


                if (checkbox.checked) {
                    var amountValue = $('#' + amount).val() || 0;
                    var discountValue = $('#' + discountkey).val() || 0;
                    var vatValue = $('#' + vatKey).val() || 0;
                    var taskPrice = taskPrice;

                    var totalPrice = 0;
                    var totalPrice_discountValue = 0;
                    var totalPrice_vatValue = 0;
                    //  var finalvat=0;

                    if (discountValue !== 0) {
                        totalPrice_discountValue = (amountValue * discountValue) / 100;
                    }

                    totalPrice = amountValue - totalPrice_discountValue || 0;
                   
                    totalPrice = totalPrice + totalPrice_vatValue ;

                    var finalAmount = totalPrice.toFixed(2);


                    if (vatValue !== 0) {
                        finalAmount = (finalAmount * vatValue) / 100;
                        finalAmount = finalAmount + totalPrice;
                        var finalAmount = finalAmount.toFixed(2);
                    }

                    const appendId = taskId.replace(/\s/g, '_');
                    var append = `          
                    <li id="${taskId.replace(/\s/g, '_')}">
                        <div class="item_details_tb">
                            <h2>${testname}</h2>
                            <span>${name} | Email: ${email}</span>

                            <input type="hidden" name="taskId[]" value="${taskId}" />
                            <input type="hidden" name="discount[]" value="${discountValue}" />
                            <input type="hidden" name="vatDiscount[]" value="${vatValue}" />
                            <input type="hidden" name="taskPrice[]" value="${taskPrice}" />

                        </div>
                        <div class="slted_date">${createdAt}</div>
                        <div class="selted_inpt">
                            <div class="discount_inputvt">
                                <input type="text" class="form-control comoninpt_border" name="finalAmount[]" value="${finalAmount}" readonly>
                            </div>
                        </div>
                    </li>
                `;

                    const existingListItem = $('#' + appendId);
                    if (existingListItem.length > 0) {
                        // If the element already exists, replace it with the new one
                        existingListItem.replaceWith(append);
                    } else {
                        $('#appendItemCls').append(append);
                    }

                } else {
                    $(`#${taskId.replace(/\s/g, '_')}`).remove();
                }
            }


            function openInvoice(invoiceId, name, invoiceNumber, price, payAmount, finalAmount) {
                $('#invoiceIdCls').val(invoiceId);
                $('.patientNameCls').text(name);
                $('.invoiceNumber').text(invoiceNumber);
                var combinedText = 'ADE ' + finalAmount;
                $('.amountPaid').text(combinedText);
                $('.amountPaid_2').text(payAmount);
                $('#add_lab').modal('show');
            }


            function closeInvoice(invoiceId, name, invoiceNumber, price, payAmount, finalAmount, paymentNote, datePaid,
                paymentMethod) {
                $('.patientNameCls').text(name);
                $('.invoiceNumber').text(invoiceNumber);
                var combinedText = 'ADE ' + finalAmount;
                $('.hiddenamountPaid').text(combinedText);
                $('.amountPaid_2').text(payAmount);
                $('#datePaid').val(datePaid);
                $('#paymentNote').val(paymentNote);
                $('#paymentMethod').val(paymentMethod);
                $('#close_lab').modal('show');
            }
        </script>
    @endpush

@endsection

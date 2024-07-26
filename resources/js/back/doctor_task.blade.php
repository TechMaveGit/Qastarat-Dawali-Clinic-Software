@extends('back.layout.main_view')

@push('title')

Home | Nurse  tasks QASTARAT & DAWALI CLINICS

@endpush

@section('content-section')

@push('custom-css')

	{{-- add here --}}

@endpush



<?php
$D = json_decode(json_encode(Auth::guard('doctor')->user()->get_role()),true);
$arr = [];
foreach($D as $v)
{
  $arr[] = $v['permission_id'];
}

?>




<!----------- Start Report ----------------->
<div class="modal fade edit_patient__" id="view_report" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">View Tests & Uploaded Reports</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body padding-0">
                <div class="inner_data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="datatable-container allinvoice_table custom_table_area table_test_fgi">

                                <table id="allinvoice_table" class="display">
                                    <thead>
                                        <tr>
                                            <th>Test Name</th>

                                            <th>Download</th>

                                            <th>View</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td hidden></td>
                                            <td><span class="testName" id="testName"> </span></td>
                                            <td>
                                                <a href="{{ env('Document_Url') }}" download
                                                    class="download_rp_btn"><i class="fa-solid fa-file-arrow-down"></i>
                                                    Download Report</a>
                                            </td>

                                            <td>
                                                <a href="{{ env('Document_Url') }}" target="_blank" class="download_rp_btn">
                                                    <i class="fa-solid fa-file-arrow-down"></i> View Report
                                                </a>
                                            </td>

                                        </tr>



                                    </tbody>



                                </table>
                                <br>

                                <div class="row" id="hideDivid">
                                    <div class="col-md-6" style="display: flex">
                                        <form action="{{ route('approveDocument') }}" method="post" > @csrf
                                            <input type="hidden" class="taskCls" id="taskId" name="taskId"/>
                                            <button type="submit" class="book_appointment_btn">Approve</button>
                                        </form>

                                        <form action="{{ route('approveDocument') }}" method="post" > @csrf
                                            <input type="hidden" class="taskCls" id="taskId" name="taskId"/>
                                         <button type="submit" class="book_appointment_btn">Reject</button>
                                        </form>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- <div class="action text-end bottom_modal">
                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">
                    Book</a>
                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn" data-bs-dismiss="modal">
                    Close</a>
                </div> -->
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>




    <!-- End report section -->

<div class="task_main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card listtableCard">
                    <div class="card-body p-0">
                        <h4 class="cr_title_kj">All Tests</h4>
                        <div class="inner_tb_flo">
                            <table class="table task_table listTable_custom  dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th hidden></th>
                                        <th></th>
                                    </tr>
                                </thead>



                                <tbody>
                                    @forelse ($nurse_tasks as $nurse_task)

                                    @php
                                    $pathology_price_list = DB::table(
                                                                        'pathology_price_list',
                                                                    )->where(
                                                                        'id',
                                                                        $nurse_task->task,
                                                                    );
                                                                    if (
                                                                        $nurse_task->test_type ==
                                                                        'pathology'
                                                                    ) {
                                                                        $pathology_price_list = $pathology_price_list->where(
                                                                            'price_type',
                                                                            '0',
                                                                        );
                                                                    } else {
                                                                        $pathology_price_list = $pathology_price_list->where(
                                                                            'price_type',
                                                                            '1',
                                                                        );
                                                                    }
                                    $pathology_price_list = $pathology_price_list->first();

                                @endphp

@if ($nurse_task->form_type!='Meeting')
                                    <tr>

                                        <td hidden></td>
                                        
                                        <td>
                                            <div class="lists_tasks_Report">    
                                                <div class="" data-bs-interval="3000">
                                                    <div class="task_card cardtaskslist_item">      
                                                        <!-- <div class="date_test_jh">27 Jan, 2024</div> -->
                                                        <div class="taskOtherDetails">
                                                            <ul class="book_li">
                                                                <li>
                                                                    <div class="tb_listTitle_label labe_test"></div>

                                                                   
                                                                    <div class="test_list">
                                                                        <span>{{ $pathology_price_list->test_name?? '' }} </span>

                                                                    </div>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="taskOtherDetails">
                                                            @php
                                                            $patient=DB::table('users')->where('id',$nurse_task->patient_id)->first();
                                                           @endphp
                                                            <ul>

                                                                <li>
                                                                    <div class="tb_listTitle_label">Test Name</div>
                                                                    <span>{{ $patient->name??'' }}</span>
                                                                </li>

                                                                {{-- <li>
                                                                    <div class="tb_listTitle_label">Appoinment Date</div>
                                                                    <span>{{ $nurse_task->appoinment_date }}</span>
                                                                </li> --}}

                                                                <li>
                                                                    <div class="tb_listTitle_label">Status</div>
                                                                                @if ($nurse_task->approveDocumentSts == '1')
                                                                            <button class="pending-badge">Approve
                                                                                        By Nurse</button>
                                                                   
                                                                            @elseif($nurse_task->approveDocumentSts == '0')
                                                                            <button class="confirmed-badge">Reject
                                                                                        By nurse</button>
                                                                            
                                                                            @else
                                                                            <button class="confirmed-badge">No
                                                                                        Action</button>   
                                                                            
                                                                            @endif
                                                                </li>

                                                                <li>
                                                                    <div class="tb_listTitle_label">Order Date</div>
                                                                    {{ \Carbon\Carbon::parse($nurse_task->created_at)->format('D, d M Y') }}

                                                                </li>
                                                               
                                                               <li>
                                                                <div class="tb_listTitle_label">Action
                                                                </div>

                                                                @if ($nurse_task->labDocument)
                                                            
                                                                    <a href="{{ env('Document_Url') }}{{ $nurse_task->labDocument }}"
                                                                        download="{{ env('Document_Url') }}{{ $nurse_task->labDocument }}"
                                                                        class="download_rp_btn">
                                                                        <i
                                                                            class="fa-solid fa-file-arrow-down"></i>
                                                                        Download Report
                                                                    </a>
                                                                
                                                                 @else
                                                            
                                                                    <a href=""
                                                                        class="download_rp_btn"
                                                                        style="color: #f30728;">
                                                                        <i class="fa-solid fa-file-arrow-down"
                                                                            style="color: #db0808; border: 1px solid #e90a0a;"></i>
                                                                        Report Not Uploded
                                                                    </a>
                                                                
                                                                 @endif



                                                            </li>

                                                                <li>    
                                                                    <div class="tb_listTitle_label">Summary</div>

                                                                    
                                                                        <a onclick="ViewOrderSummary(`{{ $nurse_task->order_summary  }}`)"
                                                                            class="download_rp_btn"
                                                                            style="color: #011205e1;">
                                                                            <i class="fas fa-eye"
                                                                                style="color: #050606d6; border: 1px solid #e90a0a;"></i>
                                                                            
                                                                        </a>
                                                                   

                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="customdotdropdown dropbtnRight">
                                                                        <div class="buttondrop_dot">
                                                                            <i
                                                                                class="fa-solid fa-ellipsis-vertical"></i>
                                                                        </div>
                                                                        <div class="dropdown-content">

                                                                        <a onclick="viewDocuemnt(`{{$nurse_task->id ??''}}`,`{{$pathology_price_list->test_name??''}}`,`{{$nurse_task->labDocument??''}}`,`{{ $nurse_task->approveDocumentSts??'' }}`)" class="bottom_btn extract_btn"> <i class="fa-regular fa-eye"></i> View  Report </a>

                                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </td>

                                    </tr>
                                    @endif
                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--end card-->
            </div>


        </div>
    </div>
</div>

<!----------------------------
    Make an Appointment
---------------------------->

<!----------------------------
    Make an Appointment
---------------------------->
<div class="modal fade edit_patient__" id="book_appointment" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Make an Appointment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body padding-0">
                <div class="inner_data">
                    <div class="row top_head_vitals">

                        <div class="col-lg-12">
                            <div class="row appointment_book">
                                <h6 class="book_appin_title">Pathology Appointment</h6>
                                <div class="col-lg-6">
                                    <label for="validationCustom01" class="form-label">Pathology Tests</label>
                                    <select id="sumo-select2" multiple>
                                        <option value="1">17 Hydroxyprogesterone</option>
                                        <option value="2">24 Hour Urinary Calcium</option>
                                        <option value="3">5 HIAA</option>
                                        <option value="4">6-TGN</option>
                                        <option value="5">5 HIAA</option>
                                        <option value="6">Acetone</option>
                                        <option value="7">Acetyl Choline Receptor Abs</option>
                                        <option value="8">Acid phosphatase (prostatic)</option>
                                        <option value="9">Activated Protein C Resistance</option>
                                        <option value="10">Active B12</option>
                                        <option value="11">Adalimumab Level</option>
                                        <option value="12">Adenovirus PCR</option>
                                        <option value="13">Adiponectin</option>
                                        <option value="14">Adrenal Antibodies</option>
                                        <option value="15">Adrenocorticotropic Hormone (ACTH)</option>

                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <div class="inner_element">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Select Pathology</label>
                                            <select class="form-control select2_appointment">
                                                <option value=""></option>
                                                <option value="">AK Pathology</option>
                                                <option value="">Zenath Pathology</option>
                                                <option value="">QASTARAT & DAWALI CLINICS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="inner_element">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Date</label>
                                            <input type="text" class="form-control datepickerInput"
                                                placeholder="17 Nov,2023">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="inner_element">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Time</label>
                                            <input type="text" class="form-control timepicker-custom"
                                                placeholder="12:00">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row appointment_book">
                                <h6 class="book_appin_title">Radiology Appointment</h6>
                                <div class="col-lg-6">
                                    <label for="validationCustom01" class="form-label">Radiology Tests</label>
                                    <select id="sumo-select3" multiple>
                                        <option value="1">17 Hydroxyprogesterone</option>
                                        <option value="2">24 Hour Urinary Calcium</option>
                                        <option value="3">5 HIAA</option>
                                        <option value="4">6-TGN</option>
                                        <option value="5">5 HIAA</option>
                                        <option value="6">Acetone</option>
                                        <option value="7">Acetyl Choline Receptor Abs</option>
                                        <option value="8">Acid phosphatase (prostatic)</option>
                                        <option value="9">Activated Protein C Resistance</option>
                                        <option value="10">Active B12</option>
                                        <option value="11">Adalimumab Level</option>
                                        <option value="12">Adenovirus PCR</option>
                                        <option value="13">Adiponectin</option>
                                        <option value="14">Adrenal Antibodies</option>
                                        <option value="15">Adrenocorticotropic Hormone (ACTH)</option>

                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <div class="inner_element">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Select Radiology</label>
                                            <select class="form-control select2_appointment">
                                                <option value=""></option>
                                                <option value="">AK Radiology</option>
                                                <option value="">Zenath Radiology</option>
                                                <option value="">QASTARAT & DAWALI CLINICS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="inner_element">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Date</label>
                                            <input type="text" class="form-control datepickerInput"
                                                placeholder="17 Nov,2023">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="inner_element">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Time</label>
                                            <input type="text" class="form-control timepicker-custom"
                                                placeholder="12:00">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="action text-end bottom_modal">
                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">
                        Book</a>
                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                        data-bs-dismiss="modal">
                        Close</a>
                </div>
            </div>
            <!-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div> -->
        </div>
    </div>
</div>
 @push('custom-js')

 <script>

$('.select2_with_search').select2({}); 


    $('.select2_appointment').select2({
        dropdownParent: $('#book_appointment'),
        minimumResultsForSearch: -1
    });
</script>
<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('.listTable_custom').DataTable({
            // lengthChange: false
            language: {
                searchPlaceholder: 'Search by patient name & id...'
            }
        });
        // Add search icon inside the input
        $('.dataTables_filter input').before('<i class="fa-solid fa-magnifying-glass"></i>');
        // Add click event for the search icon
        $('.search-icon').click(function() {
            var searchValue = $('.dataTables_filter input').val();
            table.search(searchValue).draw();
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Initialize SumoSelect with search
        $('#sumo-select2').SumoSelect({
            search: true,
            dropdownParent: $('#book_appointment')
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Initialize SumoSelect with search
        $('#sumo-select3').SumoSelect({
            search: true,
            dropdownParent: $('#book_appointment')
        });
    });
</script>


<!-- assigend lab form   data -->
<script>
	$(document).ready(function() {
    $('.SelectLab').change(function(e) {
        e.preventDefault();

        var lab_id = $(this).find(':selected').data('lab-id');
        var task_id = $(this).find(':selected').data('task-id');
        var assignPerson = $(this).find(':selected').data('assign-id');

        $.ajax({
            url: "{{ route('taskAssignedToLab') }}",
            type: 'GET',
            data: { 'lab_id': lab_id,'task_id': task_id,'assignPerson':assignPerson },
            dataType: 'json',
            success: function(result) {
                if (result.error == 200) {
                    swal.fire(
                        'Success',
                        'Lab Assigned Successfully!',
                        'success'
                    ).then(function() {
                        window.location.reload();
                    });
                } else {
                    swal.fire('Error!', result.message, 'error');
                }
            },
            error: function(xhr, status, error) {
                if (xhr.status == 422) {
                    var response = JSON.parse(xhr.responseText);
                    var errorMessage = response.error;
                    swal.fire('Error!', errorMessage, 'error');
                } else if (xhr.status == 404) {
                    swal.fire('Error!', 'The requested resource was not found.', 'error');
                } else if (xhr.status == 500) {
                    swal.fire('Error!', 'Internal server error. Please try again later.', 'error');
                } else {
                    swal.fire('Error!', 'An error occurred. Please try again later.', 'error');
                }
            }
        });
    });
});

</script>
<!-- end  -->

<script>

function refreshPage() {
    window.location.reload();
}
$('#book_appointment').on('hidden.bs.modal', function () {
    refreshPage();
});
</script>


<script>
    function viewDocuemnt(taskId,documentId,labDocument,approveDocumentSts)
    {
        var documentUrl = "{{ env('Document_Url') }}";
        $('#testName').text(documentId);
        $('.taskCls').val(taskId);
        $("#hideDivid").show();
        $('.download_rp_btn').show();

        if (approveDocumentSts=='1') {
            $("#hideDivid").hide();
        }

        if (!labDocument)
        {
          //  console.log("null");
            $("#hideDivid").hide();
            $('.download_rp_btn').hide();
        }

        var downloadLink = documentUrl + labDocument;
         $('.download_rp_btn').attr('href', downloadLink);
         $('#view_report').modal('show');
    }
</script>
@endpush

@endsection

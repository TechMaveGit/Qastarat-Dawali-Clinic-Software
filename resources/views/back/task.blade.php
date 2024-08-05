@extends('back.layout.main_view')

@push('title')

Home |  tasks QASTARAT & DAWALI CLINICS

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

<div class="task_main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card listtableCard">
                    <div class="card-body p-0">
                        <h4 class="cr_title_kj">Tests List</h4>
                        <div class="inner_tb_flo">
                            <table class="table task_table listTable_custom  dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ( $nurse_tasks as $nurse_task)
                                        
                                    @if ($nurse_task->form_type!='Meeting')
                                    <tr>
                                        <td>
                                            <div class="lists_tasks_Report">

                                                <div class="" data-bs-interval="3000">
                                                    <div class="task_card cardtaskslist_item">
                                                        <!-- <div class="date_test_jh">27 Jan, 2024</div> -->
                                                        <div class="taskOtherDetails">
                                                            <ul class="book_li">
                                                                <li>
                                                                    <div class="tb_listTitle_label labe_test">
                                                                    </div>
                                                                    @php
                                                                    $pathology_price_list_ids  = json_decode($nurse_task->pathology_price_list_id);
                                                                   
                                                                  $pathology_price_list=  DB::table('pathology_price_list')->whereIn('id',$pathology_price_list_ids);
                                                                  
                                                                    if($nurse_task->test_type){
                                                                      $pathology_price_list=  $pathology_price_list->where('price_type', $nurse_task->test_type);
                                                                    }
                                                                   
                                                                    $pathology_price_list =$pathology_price_list->pluck('test_name');
                                                                   
                                                                  @endphp
                                                                    <div class="test_list">
                                                                        @forelse ($pathology_price_list as $value)
                                                                        <span>{{ $value }} </span>
                                                                       
                                                                        @empty
                                                                            
                                                                        @endforelse
                                                                       
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
                                                                    <div class="tb_listTitle_label">Patient Id</div>
                                                                    <span>{{ $patient->patient_id }}</span>
                                                                </li>
                                                                <li>
                                                                    <div class="tb_listTitle_label"> Patient Name</div>
                                                                    <span>{{ $patient->name }}</span>
                                                                </li>

                                                                <li>
                                                                    <div class="tb_listTitle_label">Mobile No.</div>
                                                                    <span>{{ $patient->mobile_no }}</span>
                                                                </li>
                                                                
                                                                <li>
                                                                    <div class="tb_listTitle_label">Order Date</div>
                                                                    <span>{{ \Carbon\Carbon::parse($patient->created_at)->format('d M, Y') }}</span>
                                                                </li>


                                                                <li>
                                                                    <div class="tb_listTitle_label">Status</div>
                                                                    <span>Test Ordered </span>
                                                                </li>

                                                              

                                                                <li class="book_bx_">
                                                                   
                                                                    <a href="#" class="book_appointment_btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#book_appointment">Assign to Nurse</a>
                                                                </li>

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

                                                                            <a href="#" class="bottom_btn extract_btn"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#view_report"><i
                                                                                    class="fa-regular fa-eye"></i> View
                                                                                Report
                                                                            </a>

                                                                        </div>
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

            <!-- <div class="col-xl-3 col-12">
                <div class="card">

                    <div class="card-body p-0">

                        <div class="appointment_list_hgk">
                            <h4 class="cr_title_kj">Today Appointment </h4>
                            <div class="scroll_height">
                                <div class="appoin_list_item">

                                    <div class="apoin_dt_lh">
                                        <p class="patient_name_ap">Shawn Hampton</p>
                                        <span class="apoin_tt">Emergency appointment</span>
                                    </div>
                                    <div class="appoin_time">
                                        <p class=""><i class="fa-regular fa-clock"></i> 10:00 </p>
                                    </div>
                                </div>
                                <div class="appoin_list_item">

                                    <div class="apoin_dt_lh">
                                        <p class="patient_name_ap">Jonny kemu</p>
                                        <span class="apoin_tt">Regular Check Up</span>
                                    </div>
                                    <div class="appoin_time">
                                        <p class=""><i class="fa-regular fa-clock"></i> 10:00 </p>
                                    </div>
                                </div>
                                <div class="appoin_list_item">

                                    <div class="apoin_dt_lh">
                                        <p class="patient_name_ap">Tom hussan</p>
                                        <span class="apoin_tt">Injection</span>
                                    </div>
                                    <div class="appoin_time">
                                        <p class=""><i class="fa-regular fa-clock"></i> 10:00 </p>
                                    </div>
                                </div>
                                <div class="appoin_list_item">

                                    <div class="apoin_dt_lh">
                                        <p class="patient_name_ap">Ali Khan</p>
                                        <span class="apoin_tt">Regular Check Up</span>
                                    </div>
                                    <div class="appoin_time">
                                        <p class=""><i class="fa-regular fa-clock"></i> 10:00 </p>
                                    </div>
                                </div>
                                <div class="appoin_list_item">

                                    <div class="apoin_dt_lh">
                                        <p class="patient_name_ap">Shawn Hampton</p>
                                        <span class="apoin_tt">Emergency appointment</span>
                                    </div>
                                    <div class="appoin_time">
                                        <p class=""><i class="fa-regular fa-clock"></i> 10:00 </p>
                                    </div>
                                </div>
                                <div class="appoin_list_item">

                                    <div class="apoin_dt_lh">
                                        <p class="patient_name_ap">Jonny kemu</p>
                                        <span class="apoin_tt">Regular Check Up</span>
                                    </div>
                                    <div class="appoin_time">
                                        <p class=""><i class="fa-regular fa-clock"></i> 10:00 </p>
                                    </div>
                                </div>
                                <div class="appoin_list_item">

                                    <div class="apoin_dt_lh">
                                        <p class="patient_name_ap">Tom hussan</p>
                                        <span class="apoin_tt">Injection</span>
                                    </div>
                                    <div class="appoin_time">
                                        <p class=""><i class="fa-regular fa-clock"></i> 10:00 </p>
                                    </div>
                                </div>
                                <div class="appoin_list_item">

                                    <div class="apoin_dt_lh">
                                        <p class="patient_name_ap">Ali Khan</p>
                                        <span class="apoin_tt">Regular Check Up</span>
                                    </div>
                                    <div class="appoin_time">
                                        <p class=""><i class="fa-regular fa-clock"></i> 10:00 </p>
                                    </div>
                                </div>
                                <div class="appoin_list_item">

                                    <div class="apoin_dt_lh">
                                        <p class="patient_name_ap">Jonny kemu</p>
                                        <span class="apoin_tt">Regular Check Up</span>
                                    </div>
                                    <div class="appoin_time">
                                        <p class=""><i class="fa-regular fa-clock"></i> 10:00 </p>
                                    </div>
                                </div>
                                <div class="appoin_list_item">

                                    <div class="apoin_dt_lh">
                                        <p class="patient_name_ap">Tom hussan</p>
                                        <span class="apoin_tt">Injection</span>
                                    </div>
                                    <div class="appoin_time">
                                        <p class=""><i class="fa-regular fa-clock"></i> 10:00 </p>
                                    </div>
                                </div>
                                <div class="appoin_list_item">

                                    <div class="apoin_dt_lh">
                                        <p class="patient_name_ap">Ali Khan</p>
                                        <span class="apoin_tt">Regular Check Up</span>
                                    </div>
                                    <div class="appoin_time">
                                        <p class=""><i class="fa-regular fa-clock"></i> 10:00 </p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div> -->
            
        </div>
    </div>
</div>

<!----------------------------
    Make an Appointment
---------------------------->
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

                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>17 Hydroxyprogesterone</td>

                                            <td>
                                                <a href="images/new-images/dummy.pdf" download
                                                    class="download_rp_btn"><i class="fa-solid fa-file-arrow-down"></i>
                                                    Download Report</a>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>5 HIAA</td>
                                            <td>
                                                <a href="images/new-images/dummy.pdf" download
                                                    class="download_rp_btn"><i class="fa-solid fa-file-arrow-down"></i>
                                                    Download Report</a>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>6-TGN</td>
                                            <td>
                                                <a href="images/new-images/dummy.pdf" download
                                                    class="download_rp_btn"><i class="fa-solid fa-file-arrow-down"></i>
                                                    Download Report</a>
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
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
<!----------------------------
    Make an Appointment
---------------------------->
<div class="modal fade edit_patient__" id="book_appointment" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Assign to Nurse</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body padding-0">
                <div class="inner_data">
                    <div class="row top_head_vitals">

                        

                        <div class="col-lg-12">
                            <div class="row">
                              
                                

                                <div class="col-lg-6">
                                    <div class="inner_element">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Select Nurse</label>
                                            <select class="form-control select2_appointment">
                                                <option value=""></option>
                                                <option value="">Ella</option>
                                                <option value="">Ashley</option>
                                                <option value="">Harry</option>
                                                <option value="">Patrick</option>
                                                <option value="">Ashley</option>
                                                <option value="">Kenneth</option>
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
                    <a href="receptionist.php" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">
                        Assign</a>
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
@endpush

@endsection

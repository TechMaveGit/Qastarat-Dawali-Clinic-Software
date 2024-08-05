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




@if(in_array("84", $arr) || in_array("85", $arr) || in_array("86", $arr) || in_array("87", $arr))
<div class="sub_bnr patient_recordsbanner" style="background-image: url(images/hero-15.jpg);">
    <div class="sub_bnr_cnt">
       <h1>Tasks <span class="blue_theme"> </span> </h1>
       <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
          <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="index-2.php">Home</a></li>
             <li class="breadcrumb-item active" aria-current="page">Tasks</li>
          </ol>
       </nav>
       <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-toggle="modal" data-bs-target="#add_patient">+ Add New Patient </a>
          -->
    </div>
 </div>
 <div class="task_main">
     <div class="container">
         <div class="row">



            @if(in_array("84", $arr) || in_array("85", $arr))

             <div class="col-lg-9">
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
                                            @foreach($nurse_tasks as $nurse_task)
                                                <tr>
                                                    <td>
                                                        <div class="lists_tasks_Report">
                                                            <div class="" data-bs-interval="3000">
                                                                <div class="task_card cardtaskslist_item">
                                                                    <div class="taskOtherDetails">
                                                                        <ul class="book_li">
                                                                            <li>
                                                                                <div class="tb_listTitle_label">Tests</div>
                                                                                <div class="test_list">
                                                                                    @php
                                                                                      $pathology_price_list_ids  = json_decode($nurse_task->pathology_price_list_id);
                                                                                     
                                                                                    $pathology_price_list=  DB::table('pathology_price_list')->whereIn('id',$pathology_price_list_ids);
                                                                                    
                                                                                      if($nurse_task->test_type){
                                                                                        $pathology_price_list=  $pathology_price_list->where('price_type', $nurse_task->test_type);
                                                                                      }
                                                                                      
                                                                                    
                                                                                      $pathology_price_list =$pathology_price_list->pluck('test_name');
                                                                                     
                                                                                    @endphp
                                                                                  @forelse ($pathology_price_list as $value)
                                                                                  <span>{{ $value }} ,</span>
                                                                                 
                                                                                  @empty
                                                                                      
                                                                                  @endforelse
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    @php
                                                                        $patient=DB::table('users')->where('id',$nurse_task->patient_id)->first();
                                                                    @endphp
                                                                    <div class="taskOtherDetails">
                                                                        <ul>
                                                                            <li>
                                                                                <div class="tb_listTitle_label">Patient Id</div>
                                                                                <span>{{ $patient->patient_id }}</span>
                                                                            </li>
                                                                            <li>
                                                                                <div class="tb_listTitle_label">Patient Name</div>
                                                                                <span>{{ $patient->name }}</span>
                                                                            </li>
                                                                            <li>
                                                                                <div class="tb_listTitle_label">Mobile No.</div>
                                                                                <span>{{ $patient->mobile_no }}</span>
                                                                            </li>
                                                                            <li>
                                                                                <div class="tb_listTitle_label">Date</div>
                                                                                <span>{{ \Carbon\Carbon::parse($patient->created_at)->format('d M, Y') }}</span>
                                                                            </li>
                                                                            @if(in_array("85", $arr))
                                                                                <li class="book_bx_">
                                                                                    <a href="#" class="book_appointment_btn" data-bs-toggle="modal" data-bs-target="#book_appointment">Book Appointment</a>
                                                                                </li>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        
                                     </table>
                                  </div>




                                 </div>
                             </div>
                             <!--end card-->
             </div>
             @endif

             @if(in_array("87", $arr))
             <div class="col-xl-3 col-12">
                     <div class="card">
                     <!-- <div class="card-header appoin-header">
                             <h4 class="appoin_title">Today Appointments</h4>
                         </div> -->

                         <div class="card-body p-0">

                             <div class="appointment_list_hgk">
                               <h4 class="cr_title_kj">Today Appointment </h4>
                               <div class="scroll_height">
                               
                                <div class="appoin_list_item">

                                    <div class="apoin_dt_lh">
                                        <p class="patient_name_ap">Shawn Hampton</p>
                                        <span class="apoin_tt"></span>
                                    </div>
                                    <div class="appoin_time">
                                        <p class=""><i class="fa-regular fa-clock"></i> 
                                        </p>
                                    </div>
                                </div>
                              
                              
                                     {{-- <div class="appoin_list_item">

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
                                     </div> --}}
                               </div>

                             </div>

                         </div>
                     </div>
                   </div>
                 @endif


                 @if(in_array("86", $arr))
                 <div class="col-lg-12">
                     <div class="card listtableCard">
                                 <div class="card-body p-0">
                                  <h4 class="cr_title_kj">Updated Reports From Lab</h4>
                                  <div class="inner_tb_flo">
                                  <table class="table task_table listTable_custom  dt-responsive nowrap w-100">
                                         <thead>
                                         <tr>
                                             <th></th>
                                         </tr>
                                         </thead>


                                         <tbody>
                                         <tr>
                                             <td>
                                                 <div class="lists_tasks_Report">

                                                     <div class="" data-bs-interval="3000">
                                                         <div class="task_card cardtaskslist_item">
                                                                         <!-- <div class="date_test_jh">27 Jan, 2024</div> -->
                                                            <div class="taskOtherDetails">
                                                                 <ul class="book_li">
                                                                     <li>
                                                                         <div class="tb_listTitle_label">Tests</div>
                                                                         <div class="test_list">
                                                                             <span>17 Hydroxyprogesterone ,</span>
                                                                             <span>24 Hour Urinary Calcium ,</span>
                                                                             <span>5 HIAA ,</span>
                                                                             <span>17 Hydroxyprogesterone ,</span>
                                                                         </div>
                                                                     </li>

                                                                 </ul>
                                                             </div>
                                                             <div class="taskOtherDetails">
                                                                 <ul>
                                                                     <li>
                                                                         <div class="tb_listTitle_label">Patient Id</div>
                                                                         <span>MA760607</span>
                                                                     </li>
                                                                     <li>
                                                                         <div class="tb_listTitle_label"> Patient Name</div>
                                                                         <span>MOHAMMED ALI AL BADI</span>
                                                                     </li>


                                                                     <li>
                                                                         <div class="tb_listTitle_label">Mobile No.</div>
                                                                         <span>+91-7895667587</span>
                                                                     </li>
                                                                     <li>
                                                                         <div class="tb_listTitle_label">Lab Name</div>
                                                                         <span>Ak Pathology</span>
                                                                     </li>
                                                                     <li>
                                                                         <div class="tb_listTitle_label">Date</div>
                                                                         <span>27 Jan, 2024</span>
                                                                     </li>
                                                                     <li class="status">
                                                                         <div class="tb_listTitle_label">Status</div>
                                                                         <div class="form-group">

                                                                             <select class="form-control select2_without_search">
                                                                                 <option value="">Pending</option>
                                                                                 <option value="">Approved</option>
                                                                             </select>
                                                                         </div>
                                                                     </li>
                                                                     <li class="book_bx_ drop_list_ghi">
                                                                         <div class="customdotdropdown">
                                                                             <div class="buttondrop_dot">
                                                                             <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                             </div>
                                                                             <div class="dropdown-content">

                                                                             <a href="#" class="bottom_btn extract_btn" data-bs-toggle="modal"
                                                                                 data-bs-target="#view_report"><i class="fa-regular fa-eye"></i> View Report
                                                                             </a>

                                                                             </div>
                                                                         </div>
                                                                     </li>
                                                                 </ul>
                                                             </div>

                                                         </div>

                                                     </div>

                                                 </div>


                                             </td>

                                         </tr>

                                         <tr>
                                             <td>
                                                 <div class="lists_tasks_Report">

                                                     <div class="" data-bs-interval="3000">
                                                         <div class="task_card cardtaskslist_item">
                                                                         <!-- <div class="date_test_jh">27 Jan, 2024</div> -->
                                                            <div class="taskOtherDetails">
                                                                 <ul class="book_li">
                                                                     <li>
                                                                         <div class="tb_listTitle_label">Tests</div>
                                                                         <div class="test_list">
                                                                             <span>17 Hydroxyprogesterone ,</span>
                                                                             <span>24 Hour Urinary Calcium ,</span>

                                                                         </div>
                                                                     </li>

                                                                 </ul>
                                                             </div>
                                                             <div class="taskOtherDetails">
                                                                 <ul>
                                                                     <li>
                                                                         <div class="tb_listTitle_label">Patient Id</div>
                                                                         <span>MA760607</span>
                                                                     </li>
                                                                     <li>
                                                                         <div class="tb_listTitle_label"> Patient Name</div>
                                                                         <span>MOHAMMED ALI AL BADI</span>
                                                                     </li>


                                                                     <li>
                                                                         <div class="tb_listTitle_label">Mobile No.</div>
                                                                         <span>+91-7895667587</span>
                                                                     </li>
                                                                     <li>
                                                                         <div class="tb_listTitle_label">Lab Name</div>
                                                                         <span>Ak Pathology</span>
                                                                     </li>
                                                                     <li>
                                                                         <div class="tb_listTitle_label">Date</div>
                                                                         <span>27 Jan, 2024</span>
                                                                     </li>
                                                                     <li class="status">
                                                                         <div class="tb_listTitle_label">Status</div>
                                                                         <div class="form-group">

                                                                             <select class="form-control select2_without_search">
                                                                                 <option value="">Pending</option>
                                                                                 <option value="">Approved</option>
                                                                             </select>
                                                                         </div>
                                                                     </li>
                                                                     <li class="book_bx_ drop_list_ghi">
                                                                         <div class="customdotdropdown">
                                                                             <div class="buttondrop_dot">
                                                                             <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                             </div>
                                                                             <div class="dropdown-content">

                                                                             <a href="#" class="bottom_btn extract_btn" data-bs-toggle="modal"
                                                                                 data-bs-target="#view_report"><i class="fa-regular fa-eye"></i> View Report
                                                                             </a>

                                                                             </div>
                                                                         </div>
                                                                     </li>
                                                                 </ul>
                                                             </div>

                                                         </div>

                                                     </div>

                                                 </div>


                                             </td>

                                         </tr>

                                         <tr>
                                             <td>
                                                 <div class="lists_tasks_Report">

                                                     <div class="" data-bs-interval="3000">
                                                         <div class="task_card cardtaskslist_item">
                                                                         <!-- <div class="date_test_jh">27 Jan, 2024</div> -->
                                                            <div class="taskOtherDetails">
                                                                 <ul class="book_li">
                                                                     <li>
                                                                         <div class="tb_listTitle_label">Tests</div>
                                                                         <div class="test_list">

                                                                             <span>5 HIAA ,</span>
                                                                             <span>17 Hydroxyprogesterone ,</span>
                                                                         </div>
                                                                     </li>

                                                                 </ul>
                                                             </div>
                                                             <div class="taskOtherDetails">
                                                                 <ul>
                                                                     <li>
                                                                         <div class="tb_listTitle_label">Patient Id</div>
                                                                         <span>MA760607</span>
                                                                     </li>
                                                                     <li>
                                                                         <div class="tb_listTitle_label"> Patient Name</div>
                                                                         <span>MOHAMMED ALI AL BADI</span>
                                                                     </li>


                                                                     <li>
                                                                         <div class="tb_listTitle_label">Mobile No.</div>
                                                                         <span>+91-7895667587</span>
                                                                     </li>
                                                                     <li>
                                                                         <div class="tb_listTitle_label">Lab Name</div>
                                                                         <span>Ak Pathology</span>
                                                                     </li>
                                                                     <li>
                                                                         <div class="tb_listTitle_label">Date</div>
                                                                         <span>27 Jan, 2024</span>
                                                                     </li>
                                                                     <li class="status">
                                                                         <div class="tb_listTitle_label">Status</div>
                                                                         <div class="form-group">

                                                                             <select class="form-control select2_without_search">
                                                                                 <option value="">Pending</option>
                                                                                 <option value="">Approved</option>
                                                                             </select>
                                                                         </div>
                                                                     </li>
                                                                     <li class="book_bx_ drop_list_ghi">
                                                                         <div class="customdotdropdown">
                                                                             <div class="buttondrop_dot">
                                                                             <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                             </div>
                                                                             <div class="dropdown-content">

                                                                             <a href="#" class="bottom_btn extract_btn" data-bs-toggle="modal"
                                                                                 data-bs-target="#view_report"><i class="fa-regular fa-eye"></i> View Report
                                                                             </a>

                                                                             </div>
                                                                         </div>
                                                                     </li>
                                                                 </ul>
                                                             </div>

                                                         </div>

                                                     </div>

                                                 </div>


                                             </td>

                                         </tr>


                                         </tbody>
                                     </table>
                                     </div>




                                 </div>
                             </div>
                             <!--end card-->
                </div>
             @endif
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
                                                     <a href="images/new-images/dummy.pdf" download class="download_rp_btn"><i class="fa-solid fa-file-arrow-down"></i> Download Report</a>
                                                 </td>


                                             </tr>
                                             <tr>
                                                 <td>5 HIAA</td>
                                                 <td>
                                                     <a href="images/new-images/dummy.pdf" download class="download_rp_btn"><i class="fa-solid fa-file-arrow-down"></i> Download Report</a>
                                                 </td>


                                             </tr>
                                             <tr>
                                                 <td>6-TGN</td>
                                                 <td>
                                                     <a href="images/new-images/dummy.pdf" download class="download_rp_btn"><i class="fa-solid fa-file-arrow-down"></i> Download Report</a>
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
                                 <input type="text" class="form-control datepickerInput" placeholder="17 Nov,2023">
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="inner_element">
                             <div class="form-group">
                                 <label for="validationCustom01" class="form-label">Time</label>
                                 <input type="text" class="form-control timepicker-custom" placeholder="12:00">
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
                                 <input type="text" class="form-control datepickerInput" placeholder="17 Nov,2023">
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="inner_element">
                             <div class="form-group">
                                 <label for="validationCustom01" class="form-label">Time</label>
                                 <input type="text" class="form-control timepicker-custom" placeholder="12:00">
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
                     <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn" data-bs-dismiss="modal">
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
 

@endif









@if(in_array("88", $arr) || in_array("89", $arr))
<div class="sub_bnr patient_recordsbanner" style="background-image: url(images/hero-15.jpg);">
    <div class="sub_bnr_cnt">
       <h1>Tasks <span class="blue_theme"> </span> </h1>
       <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
          <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="index-2.php">Home</a></li>
             <li class="breadcrumb-item active" aria-current="page">Tasks</li>
          </ol>
       </nav>
       <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-toggle="modal" data-bs-target="#add_patient">+ Add New Patient </a>
          -->
    </div>
 </div>
 <div class="task_main">
     <div class="container">
         <div class="row">


            @if(in_array("88", $arr))
                 <div class="col-lg-12">
             <div class="card listtableCard">
                                 <div class="card-body p-0">
                                  <h4 class="cr_title_kj">Patient Test's</h4>
                                  <div class="inner_tb_flo">
                                  <table class="table task_table listTable_custom  dt-responsive nowrap w-100">
                                         <thead>
                                         <tr>
                                             <th></th>
                                         </tr>
                                         </thead>


                                         <tbody>

                                         <tr>
                                             <td>
                                                 <div class="lists_tasks_Report">

                                                     <div class="" data-bs-interval="3000">
                                                         <div class="task_card cardtaskslist_item">
                                                                         <!-- <div class="date_test_jh">27 Jan, 2024</div> -->
                                                            <div class="taskOtherDetails">
                                                                 <ul class="book_li">
                                                                     <li>
                                                                         <div class="tb_listTitle_label">Tests</div>
                                                                         <div class="test_list">
                                                                             <span>17 Hydroxyprogesterone ,</span>
                                                                             <span>24 Hour Urinary Calcium ,</span>
                                                                             <span>5 HIAA ,</span>
                                                                             <span>17 Hydroxyprogesterone ,</span>
                                                                         </div>
                                                                     </li>

                                                                 </ul>
                                                             </div>
                                                             <div class="taskOtherDetails">
                                                                 <ul>
                                                                     <li>
                                                                         <div class="tb_listTitle_label">Patient Id</div>
                                                                         <span>MA760607</span>
                                                                     </li>
                                                                     <li>
                                                                         <div class="tb_listTitle_label"> Patient Name</div>
                                                                         <span>MOHAMMED ALI AL BADI</span>
                                                                     </li>


                                                                     <li>
                                                                         <div class="tb_listTitle_label">Mobile No.</div>
                                                                         <span>+91-7895667587</span>
                                                                     </li>

                                                                     <li>
                                                                         <div class="tb_listTitle_label">Date & Time</div>
                                                                         <span>27 Jan, 2024, 10:00</span>
                                                                     </li>

                                                                     @if(in_array("89", $arr))
                                                                     <li class="book_bx_ drop_list_ghi">
                                                                         <div class="customdotdropdown">
                                                                             <div class="buttondrop_dot">
                                                                             <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                             </div>
                                                                             <div class="dropdown-content">

                                                                             <a href="#" class="bottom_btn extract_btn" data-bs-toggle="modal"
                                                                                 data-bs-target="#view_report"><i class="fa-solid fa-file-arrow-up"></i> Upload Reports
                                                                             </a>

                                                                             </div>
                                                                         </div>
                                                                     </li>
                                                                     @endif
                                                                 </ul>
                                                             </div>

                                                         </div>

                                                     </div>

                                                 </div>


                                             </td>

                                         </tr>


                                         </tbody>
                                     </table>
                                     </div>




                                 </div>
                             </div>
                             <!--end card-->
             </div>
             @endif
         </div>
     </div>
 </div>
 <!----------------------------
     View Test and upload report
 ---------------------------->
 <div class="modal fade edit_patient__" id="view_report" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title" id="exampleModalLabel">View Test's & Upload Reports</h1>
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
                                                     <th>Status</th>
                                                     <th>Action</th>

                                                 </tr>
                                             </thead>
                                             <tbody>
                                             <tr>
                                                 <td>17 Hydroxyprogesterone</td>
                                                 <td>

                                                         <div class="form-group lab_status mb-0">
                                                             <!-- <label class="form-label">Select Status</label> -->
                                                             <select class="form-control js-example-basic-single" style="width: 100%;">
                                                                 <option value="">Pending</option>
                                                                 <option value="">Progress</option>
                                                                 <option value="">Completed</option>
                                                             </select>
                                                         </div>
                                                     <!-- /.form-group -->

                                                 </td>
                                                 <td>
                                                     <div class="variants">
                                                     <div class='file file--upload'>
                                                         <label for='input-file'>
                                                         <i class="fa-solid fa-upload"></i> Upload
                                                         </label>
                                                         <input id='input-file' type='file' />
                                                         </div>
                                                     </div>
                                                 </td>


                                             </tr>
                                             <tr>
                                                 <td>5 HIAA</td>
                                                 <td>

                                                         <div class="form-group lab_status mb-0">
                                                             <!-- <label class="form-label">Select Status</label> -->
                                                             <select class="form-control js-example-basic-single" style="width: 100%;">
                                                                 <option value="">Pending</option>
                                                                 <option value="">Progress</option>
                                                                 <option value="">Completed</option>
                                                             </select>
                                                         </div>
                                                     <!-- /.form-group -->

                                                 </td>
                                                 <td>
                                                     <div class="variants">
                                                     <div class='file file--upload'>
                                                         <label for='input-file'>
                                                         <i class="fa-solid fa-upload"></i> Upload
                                                         </label>
                                                         <input id='input-file' type='file' />
                                                         </div>
                                                     </div>
                                                 </td>


                                             </tr>
                                             <tr>
                                                 <td>6-TGN</td>
                                                 <td>

                                                         <div class="form-group lab_status mb-0">
                                                             <!-- <label class="form-label">Select Status</label> -->
                                                             <select class="form-control js-example-basic-single" style="width: 100%;">
                                                                 <option value="">Pending</option>
                                                                 <option value="">Progress</option>
                                                                 <option value="">Completed</option>
                                                             </select>
                                                         </div>
                                                     <!-- /.form-group -->

                                                 </td>
                                                 <td>
                                                     <div class="variants">
                                                     <div class='file file--upload'>
                                                         <label for='input-file'>
                                                         <i class="fa-solid fa-upload"></i> Upload
                                                         </label>
                                                         <input id='input-file' type='file' />
                                                         </div>
                                                     </div>
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
 @push('custom-js')
    


 <script>
    $('.select2_appointment').select2({
    dropdownParent: $('#book_appointment'),
    minimumResultsForSearch: -1
});
$('.js-example-basic-single').select2({
    dropdownParent: $('#view_report'),
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
@endif
@endsection

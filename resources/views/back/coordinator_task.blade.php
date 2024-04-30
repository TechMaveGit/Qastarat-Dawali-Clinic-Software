@extends('back.layout.main_view')

@push('title')

Home | Coordinator  tasks QASTARAT & DAWALI CLINICS

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
                        <h4 class="cr_title_kj">All Tests</h4>
                        <div class="inner_tb_flo">
                            <table class="table task_table listTable_custom  dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ( $nurse_tasks as $nurse_task)
                                    <tr>
                                        <td>
                                            <div class="lists_tasks_Report">

                                                <div class="" data-bs-interval="3000">
                                                    <div class="task_card cardtaskslist_item">
                                                        <!-- <div class="date_test_jh">27 Jan, 2024</div> -->
                                                        <div class="taskOtherDetails">
                                                            <ul class="book_li">
                                                                <li>
                                                                    <div class="tb_listTitle_label labe_test">Test :
                                                                    </div>
                                                                    @php
                                                                    $pathology_price_list_ids  = json_decode($nurse_task->pathology_price_list_id);

                                                                  $pathology_price_list=  DB::table('pathology_price_list')->whereIn('id',$pathology_price_list_ids);

                                                                    if($nurse_task->test_type == 'pathology'){
                                                                      $pathology_price_list=  $pathology_price_list->where('price_type', '0');

                                                                    }
                                                                    else {

                                                                      $pathology_price_list=  $pathology_price_list->where('price_type', '1');
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
                                                                    <div class="tb_listTitle_label"> Patient Name</div>
                                                                    <span>{{ $patient->name }}</span>
                                                                </li>
                                                                <li>
                                                                    <div class="tb_listTitle_label">Patient Id</div>
                                                                    <span>{{ $patient->patient_id }}</span>
                                                                </li>
                                                                <li>
                                                                    <div class="tb_listTitle_label">Mobile No.</div>
                                                                    <span>{{ $patient->mobile_no }}</span>
                                                                </li>

                                                                <li>
                                                                    <div class="tb_listTitle_label">Order Date</div>
                                                                    <span>{{ \Carbon\Carbon::parse($patient->created_at)->format('d M, Y') }}</span>
                                                                </li>
                                                                    @php
                                                                         $receptionist_task_status= DB::table('receptionist_tasks')->where('nurse_task_id',$nurse_task->id)->first();

                                                                    @endphp
                                                                    <li>
                                                                        <div class="tb_listTitle_label">Appoinment Date</div>
                                                                        @if (isset($receptionist_task_status->appoinment_date))
                                                                        <span>{{ \Carbon\Carbon::parse($receptionist_task_status->appoinment_date)->format('d M, Y') }}</span>
                                                                        @else
                                                                        <span>&nbsp;</span>
                                                                        @endif

                                                                    </li>

                                                                <li>
                                                                    <div class="tb_listTitle_label">Status</div>
                                                                    @if (isset($receptionist_task_status->status) && $receptionist_task_status->status=='test_ordered')
                                                                    <span>Test Ordered </span>
                                                                    @elseif (isset($receptionist_task_status->status) && $receptionist_task_status->status=='billing_completed')
                                                                    <span>Billing completed </span>
                                                                    @elseif (isset($receptionist_task_status->status) &&  $receptionist_task_status->status=='assigned_to_nurse')
                                                                    <span>Assigned to Nurse  </span>
                                                                    @elseif (isset($receptionist_task_status->status) && $receptionist_task_status->status=='approved')
                                                                    <span>Approved</span>
                                                                    @endif

                                                                </li>



                                                                <li class="book_bx_">


                                                                        <a href="#" class="book_appointment_btn"
                                                                            onclick="setTaskId({{ $receptionist_task_status->nurse_task_id }})"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#book_appointment">
                                                                            Assign to Nurse
                                                                            </a>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        {{-- <div class="customdotdropdown dropbtnRight">
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
                                                                    </div> --}}

                                                    </div>

                                                </div>

                                            </div>

                                        </td>

                                    </tr>
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
            <form id="taskAssigendForm" method="POST">
                @csrf
            <div class="modal-body padding-0">
                <div class="inner_data">
                    <div class="row top_head_vitals">



                        <div class="col-lg-12">
                            <div class="row">



                                <div class="col-lg-6">
                                    <div class="inner_element">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Select Nurse</label>
                                            <select class="form-control select2_appointment" name="nurse">
                                              @php
                                                  $nurses=  DB::table('doctors')->select('id','name','user_type')->where('user_type','Nurse')->get();
                                              @endphp
                                              <option value="">Select Nurse</option>
                                              @forelse ( $nurses as  $nurse)
                                              <option value="{{ $nurse->id }}">{{ $nurse->name }}</option>
                                              @empty

                                              @endforelse

                                            </select>
                                            <span class="text-danger" style="font-size: 14px" id="nurseError"></span>
                                            <input type="hidden" name="task_id" value="" id="task"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="inner_element">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Date</label>
                                            <input type="text" class="form-control datepickerInput"
                                                placeholder="17 Nov,2023" name="date">
                                                <span class="text-danger" style="font-size: 14px" id="dateError"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="inner_element">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Time</label>
                                            <input type="text" class="form-control timepicker-custom"
                                                placeholder="12:00" name="time">
                                                <span class="text-danger" style="font-size: 14px" id="timeError"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="action text-end bottom_modal">
                    <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">
                        Assign</button>
                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                        data-bs-dismiss="modal">
                        Close</a>
                </div>
            </div>
            </form>
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


<!-- assigend nurse form   data -->
<script>
	$(document).ready(function() {

		$('#taskAssigendForm').submit(function(e) {
			e.preventDefault();

			let isValid = validateForm();
			let searchInput = null;

			if (isValid) {
				let formData = new FormData(this);

				$.ajax({
					url: "{{ route('taskAssignedToNurse') }}",
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,

					success: function(result) {
						$('#taskAssigendForm')[0].reset();
						$('#book_appointment').modal('hide');

						if (result.error==200) {
							swal.fire(
								'Success',
								'Task Assigend Successfully!',
								'success'
							).then(function() {
                                        window.location.reload();
                                    });

						}
					},
					error: function(xhr, status, error) {

						if (xhr.status == 422) {
							$('#book_appointment').modal('show');
							var response = JSON.parse(xhr.responseText);
							var errorMessage = response.error;
							swal.fire('Error!', errorMessage, 'error');
						} else if (xhr.status == 404) {
							swal.fire('Error!', 'The requested resource was not found.', 'error');
						} else if (xhr.status == 500) {
							swal.fire('Error!', 'Internal server error. Please try again later.', 'error');
						} else {
							swal.fire('Error!', 'hhhh An error occurred. Please try again later.', 'error');
						}
					}




				});
			}
		});


		function validateForm() {
			let isValid = true;
			// Validate nurse
            let nurse_name = $('select[name="nurse"]').val();
                    if (nurse_name === '') {

                        isValid = false;

                        $('#nurseError').text('Please select  Nurse');
                        $('select[name="nurse"]').addClass('error');
                    }

			// Validate Date
			let date = $('input[name="date"]').val();
			if (date === '') {
				isValid = false;

				$('#dateError').text('date  is required');
				$('input[name="date"]').addClass('error');
			}

			// Validate time
			let time = $('input[name="time"]').val();
			if (time === '') {
				isValid = false;

				$('#timeError').text('Time  is required');
				$('input[name="time"]').addClass('error');
			}

			return isValid;
		}

	});
</script>
<!-- end  -->

<script>
function setTaskId(task_id){

$('#task').val(task_id);
}
function refreshPage() {
    window.location.reload();
}
$('#book_appointment').on('hidden.bs.modal', function () {
    refreshPage();
});
</script>
@endpush

@endsection

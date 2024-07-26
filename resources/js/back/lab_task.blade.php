@extends('back.layout.main_view')

@push('title')

Home | lab   tasks QASTARAT & DAWALI CLINICS

@endpush

@section('content-section')

@push('custom-css')


@endpush

<div class="task_main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card listtableCard">
                    <div class="card-body p-0">
                        <h4 class="cr_title_kj">All Tests </h4>
                        <div class="inner_tb_flo">
                            <table class="table task_table listTable_custom  dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th hidden></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                   @forelse($nurse_tasks as $nurse_task)
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
                                                                @php

                                                              $pathology_price_list=  DB::table('pathology_price_list')->where('id',$nurse_task->task);



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
                                                                <div class="tb_listTitle_label">Invoice Number</div>
                                                                <span>{{ $nurse_task->invoiceNumber??'' }}</span>
                                                            </li>


                                                            <li>
                                                                <div class="tb_listTitle_label">Patient Id</div>
                                                                <span>{{ $patient->patient_id }}</span>
                                                            </li>
                                                            @php
                                                            $lab_task_status= DB::table('lab_has_tasks')->where('nurse_task_id',$nurse_task->id)->first();

                                                             @endphp
                                                              <li>
                                                                <div class="tb_listTitle_label">Reports uploaded
                                                                    Date
                                                                </div>
                                                                @if (isset($nurse_task->assignDate))
                                                                <span>{{ \Carbon\Carbon::parse($nurse_task->assignDate)->format('d M, Y') }}</span>
                                                                @else
                                                                <span>&nbsp;</span>
                                                                @endif
                                                            </li>

                                                            <li>
                                                                <div class="tb_listTitle_label">Status</div>

                                                                @if ($nurse_task->assigned=='7')
                                                                <span>Report Uploaded</span>
                                                                @else
                                                                <span>Pending</span>
                                                                @endif

                                                            </li>


                                                         @if ($nurse_task->assigned !== '7')  
                                                            <li class="">
                                                                <button type="button" class="btn btn-primary btnFileUpload"
                                                                    data-bs-toggle="modal"
                                                                    onclick="setTaskId({{ $nurse_task->id ?? '' }})"
                                                                    data-bs-target="#uploadModal">
                                                                    <iconify-icon icon="ant-design:cloud-upload-outlined"></iconify-icon> Upload Document
                                                                </button>
                                                            </li>
                                                            @else

                                                          
                                                            <li class="">
                                                                <button type="button" class="btn btn-primary btnFileUpload"
                                                                    data-bs-toggle="modal"
                                                                    @if (empty($nurse_task->approveDocumentSts))
                                                                        onclick="setTaskId({{ $nurse_task->id ?? '' }})"
                                                                    @endif
                                                                    data-bs-target="#uploadModal"
                                                                    {{ empty($nurse_task->approveDocumentSts) ? '' : 'disabled' }}>
                                                                    <iconify-icon icon="ant-design:cloud-upload-outlined"></iconify-icon>
                                                                    ReUpload Documents
                                                                </button>
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
                                                        
                                                        
                                                        <li class="">
                                                                <a target="block" href="{{ env('Document_Url') . $nurse_task->labDocument }}" type="button" class="btn btn-primary btnFileUpload">
                                                                    <iconify-icon icon="ant-design:cloud-upload-outlined"></iconify-icon> View Report
                                                                </a>
                                                            </li>
                                                            @endif


                                                        </ul>
                                                    </div>
                                                    {{-- <div class="customdotdropdown dropbtnRight">
                                                        <div class="buttondrop_dot">
                                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                                        </div>
                                                        <div class="dropdown-content">

                                                            <a href="#" class="bottom_btn extract_btn"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#view_report"><i
                                                                    class="fa-regular fa-eye"></i>View Uploaded
                                                                Reports
                                                            </a>

                                                        </div>
                                                    </div> --}}

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


<!-- upload documents dropify -->

<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="labUploadedDocumentForm" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Document</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><iconify-icon icon="majesticons:close-line"></iconify-icon></button>
            </div>
            <div class="modal-body">
                <!-- Dropify file input field -->
                <input type="file" id="documentUpload" class="dropify" multiple name="document"/>
                <!-- Uploaded Files Preview -->
                <div id="uploadedFilesPreview"></div>
                <span class="text-danger" style="font-size: 14px" id="documentError"></span>
            </div>
            <input type="hidden" name="task_id" value="" id="task"/>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary" id="saveFilesBtn">Submit</button>
            </div>
        </div>
        </form>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"><!-- Bootstrap JavaScript and jQuery -->
<!-- Include Dropify JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<script>
    $(document).ready(function () {
        // Initialize Dropify
        $('.dropify').dropify();

        // Initialize uploaded files array
        var uploadedFiles = [];

        // Listen for file upload success event
        $('#documentUpload').on('change', function () {
            var files = this.files;
            var uploadedFilesPreview = $('#uploadedFilesPreview');
            uploadedFilesPreview.empty(); // Clear existing uploaded files

            // Loop through each file
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var fileName = file.name;

                // Create preview div for the uploaded file
                var previewDiv = $('<div>').addClass('uploaded-file-preview').html('<img src="" alt="Uploaded File"><input type="text" class="form-control" placeholder="Enter Document Title">');
                uploadedFilesPreview.append(previewDiv);

                // Set the src attribute of the img element to show the uploaded image
                var previewImage = previewDiv.find('img');
                previewImage.attr('src', URL.createObjectURL(file));

                // Initialize Dropify for the preview image
                previewImage.dropify();

                // Store the uploaded file data
                uploadedFiles.push({name: fileName, title: '', preview: previewDiv});
            }
        });

        // Save uploaded files and titles
        // $('#saveFilesBtn').on('click', function () {
        //     var uploadedFilesContainer = $('#uploadedFilesContainer');
        //     uploadedFilesContainer.empty(); // Clear existing files

        //     // Loop through uploaded files array
        //     for (var i = 0; i < uploadedFiles.length; i++) {
        //         var file = uploadedFiles[i];
        //         var title = file.preview.find('input').val();
        //         file.title = title; // Update title in the uploadedFiles array

        //         // Create card element for each file
        //         var card = $('<div>').addClass('card').html('<img src="' + file.preview.find('img').attr('src') + '" class="card-img-top" alt="' + file.name + '"><div class="card-body"><h5 class="card-title">' + title + '</h5></div>');
        //         uploadedFilesContainer.append(card);
        //     }

        //     // Clear uploaded files array after saving
        //     uploadedFiles = [];

        //     // Close modal
        //     $('#uploadModal').modal('hide');
        // });
    });
</script>

<!-- upload file sjs end -->

<!-- assigend nurse form   data -->
<script>
	$(document).ready(function() {

		$('#labUploadedDocumentForm').submit(function(e) {

			e.preventDefault();

			let isValid = validateDocumentForm();
			let searchInput = null;

			if (isValid) {
				let formData = new FormData(this);

				$.ajax({
					url: "{{ route('labDocumentUpload') }}",
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,

					success: function(result) {
						$('#labUploadedDocumentForm')[0].reset();
						$('#uploadModal').modal('hide');

						if (result.error==200) {
							swal.fire(
								'Success',
								'Document  Uploaded Successfully!',
								'success'
							).then(function() {
                                        window.location.reload();
                                    });

						}
					},
					error: function(xhr, status, error) {

						if (xhr.status == 422) {
							$('#uploadModal').modal('show');
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


		function validateDocumentForm() {
			let isValid = true;


			// Validate document
			let document = $('input[name="document"]').val();
			if (document === '') {
				isValid = false;

				$('#documentError').text('Document  is required');
				$('input[name="document"]').addClass('error');
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
$('#uploadModal').on('hidden.bs.modal', function () {
    refreshPage();
});
</script>
@endpush

@endsection

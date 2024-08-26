@extends('back.layout.main_view')
@push('title')
    Patient | QASTARAT & DAWALI CLINICS
@endpush
@section('content-section')
    @push('custom-css')
        {{-- add here --}}
    @endpush

    <style>
      .loader_1 {
  border: 7px solid #f3f3f3;
  border-radius: 50%;
  border-top: 7px solid #3498db;
  width: 30px;
  height: 30px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}
        
        /* Safari */
        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }
        
        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
        </style>

    <style>
        .view_medical_record 
        {
            margin-right: 4px;
        }
        .custom_table_area table td {
            white-space: nowrap !important;
        }
        .password-container {
            position: relative;
        }

        #passwordField {
            padding-right: 30px; /* Space for the eye icon */
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .input-group-append {
    position: absolute;
    top: 22px;
    right: 0;
}
   </style>


 <?php
 $D = json_decode(json_encode(Auth::guard('doctor')->user()->get_role()),true);
 $arr = [];
 foreach($D as $v)
 {
   $arr[] = $v['permission_id'];
 }
 ?>


 @if(in_array("1", $arr) || in_array("2", $arr) || in_array("3", $arr) ||in_array("5", $arr))

    <div class="sub_bnr" style="background-image: url({{ asset('/assets/images/hero-15.jpg') }}); background: #C4E2FF !important;">
        <div class="sub_bnr_cnt">
            <h1>Find The <span class="blue_theme">Patient</span> </h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Patients</li>
                </ol>
            </nav>

            @if(in_array("1", $arr))
            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-toggle="modal"
                data-bs-target="#add_patient">+ Add New Patient </a>
             @endif


        </div>
        <div id="search-container" class="search_bar">
            <input type="text" class="form-control" id="searchInput"
                placeholder="Search patient by name, street, post code , mobile or ID number"
                onkeyup="fetchAndDisplayPatients(this.value)">
            <!-- <div class="search_icon">    
             <a href="#">

                 <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">

                 <path d="M22.6667 22.6667L28 28M4 14.6667C4 17.4956 5.12381 20.2088 7.12419 22.2091C9.12458 24.2095 11.8377 25.3333 14.6667 25.3333C17.4956 25.3333 20.2088 24.2095 22.2091 22.2091C24.2095 20.2088 25.3333 17.4956 25.3333 14.6667C25.3333 11.8377 24.2095 9.12458 22.2091 7.12419C20.2088 5.12381 17.4956 4 14.6667 4C11.8377 4 9.12458 5.12381 7.12419 7.12419C5.12381 9.12458 4 11.8377 4 14.6667Z" stroke="#797979" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>

                 </svg>

             </a>

             </div> -->
        </div>
    </div>
    <div id="courseList" style="display: none;">
        <ul>
            <li>
                <a href="view-medical-record.php">
                    <div class="patient_details">
                        <div class="patient_profile">
                            <img src="{{ asset('/assets/images/new-images/avtar.jpg')}}" alt="">
                        </div>
                        <div class="patient_dt">
                            <h6 class="patient_name">MOHAMMED ALI AL BADI</h6>
                            <div class="bottom_dt_kk">
                                <p class="patient_number">+971 50 664 0661</p>
                                <p class="patient_id">MA760607</p>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="view-medical-record.php">
                    <div class="patient_details">
                        <div class="patient_profile">
                            <img src="{{ asset('/assets/images/new-images/avtar.jpg')}}" alt="">
                        </div>
                        <div class="patient_dt">
                            <h6 class="patient_name">Jacob Hunter</h6>
                            <div class="bottom_dt_kk">
                                <p class="patient_number">+971 50 664 0661</p>
                                <p class="patient_id">MA760608</p>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="view-medical-record.php">
                    <div class="patient_details">
                        <div class="patient_profile">
                            <img src="{{ asset('/assets/images/new-images/avtar.jpg')}}" alt="">
                        </div>
                        <div class="patient_dt">
                            <h6 class="patient_name">Ronald Taylor</h6>
                            <div class="bottom_dt_kk">
                                <p class="patient_number">+971 50 664 0661</p>
                                <p class="patient_id">MA760609</p>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="view-medical-record.php">
                    <div class="patient_details">
                        <div class="patient_profile">
                            <img src="{{ asset('/assets/images/new-images/avtar.jpg')}}" alt="">
                        </div>
                        <div class="patient_dt">
                            <h6 class="patient_name">Juan Mitchell</h6>
                            <div class="bottom_dt_kk">
                                <p class="patient_number">+971 50 664 0661</p>
                                <p class="patient_id">MA760610</p>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="view-medical-record.php">
                    <div class="patient_details">
                        <div class="patient_profile">
                            <img src="{{ asset('/assets/images/new-images/avtar.jpg')}}" alt="">
                        </div>
                        <div class="patient_dt">
                            <h6 class="patient_name">Jamal Burnett</h6>
                            <div class="bottom_dt_kk">
                                <p class="patient_number">+971 50 664 0661</p>
                                <p class="patient_id">MA760611</p>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="view-medical-record.php">
                    <div class="patient_details">
                        <div class="patient_profile">
                            <img src="{{ asset('/assets/images/new-images/avtar.jpg')}}" alt="">
                        </div>
                        <div class="patient_dt">
                            <h6 class="patient_name">Neal Matthews </h6>
                            <div class="bottom_dt_kk">
                                <p class="patient_number">+971 50 664 0661</p>
                                <p class="patient_id">MA760612</p>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="view-medical-record.php">
                    <div class="patient_details">
                        <div class="patient_profile">
                            <img src="{{ asset('/assets/images/new-images/avtar.jpg')}}" alt="">
                        </div>
                        <div class="patient_dt">
                            <h6 class="patient_name">Tiger Nixon</h6>
                            <div class="bottom_dt_kk">
                                <p class="patient_number">+971 50 664 0661</p>
                                <p class="patient_id">MA760613</p>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>


   


    <div class="search_result">
        <!-- <div id="searchResults"></div> -->
        <!-- <div id="noDataFound" class="no_data_found">
          <img src="images/new-images/no-data.png" alt="No Data Found">

          <h5>No patient selected.</h5>

          <p>Search or add a patient to get started.</p>

          </div> -->
    </div>

    @if(in_array("3", $arr))
    <div class="patient_data">
        <div class="tabcontenttable_area">
            <div class="container">
                <div class="row">
                    <div class="customblck_card bggredient">
                        <div class="blcard_header">
                            <h3 class="blcard_header_title">All Patient</h3>
                        </div>
                        <div class="blcard_body">
                            <div class="datatable-container allinvoice_table custom_table_area patient_table_info">

                                <div class="container">
                                    <div class="row referaldivcls" style="justify-content: flex-end;">

                                       
                                            <div class="col-md-12 px-0">
                                                <form action="{{route('user.getPatientsData')}}" method="get">@csrf
                                                <div class="row justify-content-end">
                                                    @php
                                                    $dtype = 'doctor';
                                                    if(Auth::guard('doctor')->user()->user_type == "Nurse"){
                                                        $dtype = 'Nurse';
                                                    }else if(Auth::guard('doctor')->user()->user_type == "Receptionist"){
                                                        $dtype = 'receptionist';
                                                    }else if(Auth::guard('doctor')->user()->user_type == "Coordinator"){
                                                        $dtype = 'coordinator';
                                                    }
                                                    $doctorBranch = DB::table('user_branchs')->where(['patient_id'=>Auth::guard('doctor')->user()->id,'branch_type'=>$dtype])->get()->pluck('add_branch')->toArray();
                                                    $allBranch=  DB::table('branchs')->whereIn('id',$doctorBranch)->get();
                                                  @endphp
                                                    <div class="col-lg-3">
                                                        
                                                        <select class="form-control select2_referal" onchange="fetchReferalBranch(this.value)">
                                                            <option value="" selected>All Branch</option>
                                                           @forelse ($allBranch as $allBranch)
                                                           <option value="{{ $allBranch->id }}">{{ $allBranch->branch_name }}</option>   
                                                           
                                                               
                                                           @empty
                                                               
                                                           @endforelse
                                                        </select>

                                                   
                                                        
                                                    </div>
                                                    <div class="col-lg-3 pe-0">
                                                        <select class="form-control select2_referal" onchange="fetchReferalPatient(this.value)">
                                                            <option value="" selected>All Patient</option>
                                                            <option value="1">Referrals Patient</option>
                                                        </select>
                                                    </div>

                                                
                                                
                                                    
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <table id="allinvoice_table" class="display">
                                    <thead>
                                        <tr>
                                            <th hidden></th>
                                            <th class="sortable ">
                                                <div class="arrow_box">
                                                    <span>Patient Id</span>
                                                </div>
                                            </th>
                                            <th class="sortable ">
                                                <div class="arrow_box">
                                                    <span>Patient Name</span>
                                                </div>
                                            </th>
                                            <th class="sortable">
                                                <div class="arrow_box">
                                                    <span>Mobile Phone</span>
                                                </div>
                                            </th>
                                            <th class="sortable">
                                                <div class="arrow_box">
                                                    <span>Email Address</span>
                                                </div>
                                            </th>
                                            <th class="sortable">
                                                <div class="arrow_box">
                                                    <span>Post Code</span>
                                                </div>
                                            </th>
                                            
                                            <th class="sortable">
                                                <div class="arrow_box">
                                                    <span>Action</span>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- table end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @push('custom-js')
        <script>
            var invoiceUrl = "{{route('user.invoice')}}";
            document.addEventListener("DOMContentLoaded", function() {

                const searchInput = document.getElementById("searchInput");

                const courseList = document.getElementById("courseList");

                const searchResults = document.getElementById("searchResults");

                const noDataFound = document.getElementById("noDataFound");



                searchInput.addEventListener("input", function() {

                    const searchValue = searchInput.value.toLowerCase();

                    let found = false;



                    searchResults.innerHTML = ""; // Clear previous search results

                    courseList.style.display = "none"; // Hide the entire course list by default



                    if (searchValue.trim() === "") {

                        noDataFound.style.display = "block";

                        searchResults.style.display = "none";

                        return;

                    }



                    for (let i = 0; i < courseList.children.length; i++) {

                        const course = courseList.children[i];

                        if (course.textContent.toLowerCase().includes(searchValue)) {

                            searchResults.appendChild(course.cloneNode(true));

                            found = true;

                        }

                    }



                    if (!found) {

                        noDataFound.style.display = "block";

                        searchResults.style.display = "none";

                    } else {

                        noDataFound.style.display = "none";

                        searchResults.style.display = "block";

                    }

                });

            });
        </script>
        <!-- invoice datatable -->
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

        <script>
            $(document).ready(function() {

                $('#patientForm').submit(function(e) {
                                    
                    e.preventDefault();

                    let isValid = validateForm();
                    let searchInput = null;

                    if (isValid) 
                    {
                        let formData = new FormData(this);

                        // Show the loader
                        $('#ajaxLoader').show();

                        $.ajax({
                            url: '{{ route("user.patient.store") }}',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(result) {
                                // Hide the loader
                                $('#ajaxLoader').hide();
                                $('#patientForm')[0].reset();
                                $('#add_patient').modal('hide');

                                if (!result.error) {
                                    Swal.fire({
                                        title: '', // Empty title
                                        text: 'Patient Details Added successfully!', // Success message
                                        icon: 'success',
                                        showConfirmButton: false, // Hide the default "OK" button
                                        timer: 2000 // Display the message for 2 seconds
                                    }).then(function() {
                                        // Reload the current page after the alert is closed
                                        window.location.reload();
                                    });

                                    fetchAndDisplayPatients(searchInput);
                                } else {
                                    swal.fire('Error!',
                                        'Failed to add patient details. Please try again.',
                                        'error');
                                }
                            },
                            error: function(xhr, status, error) {
                                // Hide the loader
                                $('#ajaxLoader').hide();

                                if (xhr.status == 422) {
                                    var errors = JSON.parse(xhr.responseText);
                                    console.log('validation-error', errors);
                                    var errorMessage = 'Validation error(s):<br>';

                                    $.each(errors.error, function(key, value) {
                                        errorMessage += value + '<br>';
                                    });

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
                    }
                 });



                function validateForm() {
                    let isValid = true;
                    // data-bs-dismiss="modal"
                    // Validate sirname
                    let selectedTitle = $('select[name="sirname"]').val();
                    if (selectedTitle === '') {

                        isValid = false;

                        $('#titleError').text('Please select a title');
                        $('select[name="sirname"]').addClass('error');
                    }

                    // Validate Name
                    let name = $('input[name="name"]').val();
                    if (name === '') {
                        isValid = false;

                        $('#nameError').text('Name is required');
                        $('input[name="name"]').addClass('error');
                    }

                    // // Validate Date of Birth
                    let dob = $('input[data-provide="datepicker"]').val();
                    if (dob === '') {
                        isValid = false;

                        $('#birth_dateError').text('Date of Birth is required');
                        $('input[data-provide="datepicker"]').addClass('error');
                    }

                    // // Validate Gender
                    let gender = $('select[name="gender"]').val();
                    if (gender === '' || gender === 'Select') {
                        isValid = false;

                        $('#genderError').text('Please select a gender');
                        $('select[name="gender"]').addClass('error');
                    }

                    // Validate Email Address
                    let email = $('input[name="email"]').val();
                    if (email === '') {
                        isValid = false;

                        $('#emailError').text('Email Address is required');
                        $('input[name="email"]').addClass('error');
                    }
                    // Validate post code
                    // let post_code = $('input[name="post_code"]').val();
                    // if (post_code === '') {
                    //     isValid = false;

                    //     $('#post_codeError').text('Post code  is required');
                    //     $('input[name="post_code"]').addClass('error');
                    // }
                    // Validate street
                    let street = $('input[name="street"]').val();
                    if (street === '') {
                        isValid = false;

                        $('#streetError').text('Street is required');
                        $('input[name="street"]').addClass('error');
                    }
                    // Validate town
                    let town = $('input[name="town"]').val();
                    if (town === '') {
                        isValid = false;

                        $('#townError').text('town is required');
                        $('input[name="town"]').addClass('error');
                    }
                    // Validate country
                    let country = $('select[name="country"]').val();
                    if (country === '') {
                        isValid = false;

                        $('#countryError').text('country is required');
                        $('input[name="country"]').addClass('error');
                    }
                    // Validate mobile number
                    let mobile_no = $('input[name="mobile_no"]').val();
                    if (mobile_no === '') {
                        isValid = false;

                        $('#mobile_noError').text('Mobile number is required');
                        $('input[name="mobile_no"]').addClass('error');
                    }
                    // Validate landline   number
                    // let landline = $('input[name="landline"]').val();
                    // if (landline === '') {
                    //     isValid = false;

                    //     $('#landlineError').text('landline number is required');
                    //     $('input[name="landline"]').addClass('error');
                    // }
                    // Validate document type
                    let document_type = $('input[name="document_type"]').val();
                    if (document_type === '') {
                        isValid = false;

                        $('#document_typeError').text('document type  is required');
                        $('input[name="document_type"]').addClass('error');
                    }
                    // Validate password
                    // let password = $('input[name="password"]').val();
                    // if (password === '') {
                    //     isValid = false;

                    //     $('#passwordError').text('Password  is required');
                    //     $('input[name="password"]').addClass('error');
                    // }

                    return isValid;
                }

            });
        </script>
        <!-- Function to fetch and populate patient data -->
        <script>
            var assetUrl = "{{asset('/assets/')}}";
            function fetchAndDisplayPatients(searchInput) {

                $('#loader').show();

                $.ajax({
                    url: '{{ route('user.getPatientsData') }}',

                    type: 'GET',

                    data: {
                        searchInput: searchInput
                    },
                    dataType: 'json',
                    success: function(data) {

                        let allinvoice_table = $('#allinvoice_table').DataTable();

                        allinvoice_table.clear().draw();


                        if (data && Object.keys(data).length > 0) {
                            Object.values(data).forEach(function(patient, index) {   


                                let row = '<tr class="' + (patient.referal_status == '1' ? 'pain_inv odd' : '') + '">' +
                                                    '<td hidden></td>' +
                                                    '<td class="sorting_1">' +  patient.patient_id  + '</td>' +
                                                    '<td>' +
                                                    '<div class="patent_detail__">' +
                                                    '<div class="patient_profile">' +
                                                    '<img src="'+assetUrl+'images/new-images/avtar.jpg" alt="">' +
                                                    '</div>' +
                                                    '<div class="patient_name__dt_">' +
                                                    '<h6>' + patient.name + '</h6>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</td>' +
                                                    '<td>' + patient.mobile_no + '</td>' +
                                                    '<td>' + patient.email + '</td>' +
                                                    '<td>' + patient.post_code + '</td>' +
                                                    '<td>';

                                                row += '<a href="'+invoiceUrl+'?id=' +  patient.id  +
                                                        '" class="btn r-04 btn--theme hover--tra-black add_patient view_invoice">' +
                                                        '<i class="fa-regular fa-file-lines"></i> View Invoice</a>&nbsp;';


                                                @if(in_array("2", $arr))
                                                    row += '<a href="patient-medical-detail/' +  patient.id  +
                                                        '" class="btn r-04 btn--theme hover--tra-black add_patient view_medical_record">' +
                                                        '<i class="fa-regular fa-rectangle-list"></i> View Medical Record</a>';
                                                @endif

                                                @if(in_array("5", $arr))
                                                row += '<a href="patient-detail/' +  patient.id  +
                                                        '" class="btn r-04 btn--theme hover--tra-black add_patient view_medical_record">' +
                                                        '<i class="fa-regular fa-rectangle-list"></i>Edit Patient </a>';
                                                @endif

                                                        row += '</td></tr>';



                                allinvoice_table.row.add($(row)[0]);


                            });
                            allinvoice_table.columns.adjust().draw();

                        } else {
                            allinvoice_table.row.add($(row)[0]);
                            allinvoice_table.columns.adjust().draw();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

                // Change Dropdown
                function fetchReferalPatient(dropdownValue) {

                $('#loader').show();

                $.ajax({
                    url: '{{ route('user.getPatientsData') }}',

                    type: 'GET',

                    data: {
                        dropdownValue: dropdownValue
                    },
                    dataType: 'json',
                    success: function(data) {

                        let allinvoice_table = $('#allinvoice_table').DataTable();

                        allinvoice_table.clear().draw();


                        if (data && Object.keys(data).length > 0) {
                            Object.values(data).forEach(function(patient, index) {


                                let row = '<tr>' +
                                                    '<td hidden></td>' +
                                                    '<td class="sorting_1">' +  patient.patient_id  + '</td>' +
                                                    '<td>' +
                                                    '<div class="patent_detail__">' +
                                                    '<div class="patient_profile">' +
                                                    '<img src="'+assetUrl+'images/new-images/avtar.jpg" alt="">' +
                                                    '</div>' +
                                                    '<div class="patient_name__dt_">' +
                                                    '<h6>' + patient.name + '</h6>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</td>' +
                                                    '<td>' + patient.mobile_no + '</td>' +
                                                    '<td>' + patient.email + '</td>' +
                                                    '<td>' + patient.post_code + '</td>' +
                                                    '<td>';

                                                row += '<a href="'+invoiceUrl+'?id=' +  patient.id  +
                                                        '" class="btn r-04 btn--theme hover--tra-black add_patient view_invoice">' +
                                                        '<i class="fa-regular fa-file-lines"></i> View Invoice</a>&nbsp;';


                                                @if(in_array("2", $arr))
                                                    row += '<a href="patient-medical-detail/' +  patient.id  +
                                                        '" class="btn r-04 btn--theme hover--tra-black add_patient view_medical_record">' +
                                                        '<i class="fa-regular fa-rectangle-list"></i> View Medical Record</a>';
                                                @endif

                                                @if(in_array("5", $arr))
                                                row += '<a href="patient-detail/' +  patient.id  +
                                                        '" class="btn r-04 btn--theme hover--tra-black add_patient view_medical_record">' +
                                                        '<i class="fa-regular fa-rectangle-list"></i>Edit Patient </a>';
                                                @endif

                                                        row += '</td></tr>';



                                allinvoice_table.row.add($(row)[0]);


                            });
                            allinvoice_table.columns.adjust().draw();

                        } else {
                            allinvoice_table.row.add($(row)[0]);
                            allinvoice_table.columns.adjust().draw();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
                }



                function fetchReferalBranch(dropdownValue) 
                {

                    $('#loader').show();

                    $.ajax({
                        url: '{{ route('user.getPatientsData') }}',

                        type: 'GET',

                        data: {
                            dropdownBranchValue: dropdownValue
                        },
                        dataType: 'json',
                        success: function(data) {

                            let allinvoice_table = $('#allinvoice_table').DataTable();

                            allinvoice_table.clear().draw();


                            if (data && Object.keys(data).length > 0) {
                                Object.values(data).forEach(function(patient, index) {


                                    let row = '<tr>' +
                                                        '<td hidden></td>' +
                                                        '<td class="sorting_1">' +  patient.patient_id  + '</td>' +
                                                        '<td>' +
                                                        '<div class="patent_detail__">' +
                                                        '<div class="patient_profile">' +
                                                        '<img src="'+assetUrl+'images/new-images/avtar.jpg" alt="">' +
                                                        '</div>' +
                                                        '<div class="patient_name__dt_">' +
                                                        '<h6>' + patient.name + '</h6>' +
                                                        '</div>' +
                                                        '</div>' +
                                                        '</td>' +
                                                        '<td>' + patient.mobile_no + '</td>' +
                                                        '<td>' + patient.email + '</td>' +
                                                        '<td>' + patient.post_code + '</td>' +
                                                        '<td>';

                                                    row += '<a href="'+invoiceUrl+'?id=' +  patient.id  +
                                                            '" class="btn r-04 btn--theme hover--tra-black add_patient view_invoice">' +
                                                            '<i class="fa-regular fa-file-lines"></i> View Invoice</a>&nbsp;';


                                                    @if(in_array("2", $arr))
                                                        row += '<a href="patient-medical-detail/' +  patient.id  +
                                                            '" class="btn r-04 btn--theme hover--tra-black add_patient view_medical_record">' +
                                                            '<i class="fa-regular fa-rectangle-list"></i> View Medical Record</a>';
                                                    @endif

                                                    @if(in_array("5", $arr))
                                                    row += '<a href="patient-detail/' +  patient.id  +
                                                            '" class="btn r-04 btn--theme hover--tra-black add_patient view_medical_record">' +
                                                            '<i class="fa-regular fa-rectangle-list"></i>Edit Patient </a>';
                                                    @endif

                                                            row += '</td></tr>';



                                    allinvoice_table.row.add($(row)[0]);


                                });
                                allinvoice_table.columns.adjust().draw();

                            } else {
                                allinvoice_table.row.add($(row)[0]);
                                allinvoice_table.columns.adjust().draw();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching data:', error);
                        }
                    });
                }



                

            // Call the function on page load
            $(document).ready(function() {
                fetchAndDisplayPatients();
            });
        </script>
    @endpush

    @else

    <div class="sub_bnr" style="background-image: url({{ asset('/assets/images/hero-15.jpg') }});">
        <div class="sub_bnr_cnt">

            <h1>Unauthorized page</h1>

        </div>
    </div>

    @endif


    
<script>
    function togglePasswordVisibility() {
        const passwordField = document.getElementById('passwordField');
        const icon = document.querySelector('.toggle-password');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    }
</script>




    

@endsection

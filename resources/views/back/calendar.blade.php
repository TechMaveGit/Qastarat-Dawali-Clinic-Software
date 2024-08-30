@extends('back.layout.main_view')
@push('title')
    Calender | QASTARAT & DAWALI CLINICS
@endpush
@section('content-section')
    @push('custom-css')
        <style>
            td.fc-event-container {
                position: relative;
            }

            span.event-icon {
                position: absolute;
                right: 0px;
                top: 0px;
            }

            .fc-day-grid-event .fc-content {
                white-space: pre-wrap;
                overflow: visible;
                padding: 5px;
                width: 70%;
            }



            #calendar .btn {
                padding: 5px 10px;
                font-size: 14px;
                background: #214874;
            }

            .fc td,
            .fc th {
                border-style: solid;
                border-width: 1px;
                padding: 0;
                vertical-align: top;
                border-color: #ddd !important;
            }

            .checkFont {
                font-size: 12px;
            }

            .add_patient_appoin {
                margin-top: 25px
            }

            .fc-timeGrid-view .fc-day-grid .fc-row .fc-content-skeleton {
                padding-bottom: 2em !important;
            }
            .appointment_service{
                height: 300px;
            }

            .service_box_appoin {
                display: inline-block;
                width: 100%;
               
            }

            .service_box_appoin p{
                display: flex;
                margin-bottom: 0px;
            }

            .service_box_appoin p>span{
                margin-right: 5px;
            }

            .service_box_appoin span{
                display: inherit;
                white-space: inherit;
                margin-right:15px; 
            }
        </style>
    @endpush




    <script>
        // Check if flash message exists  
        @if (Session::has('message'))
            // Display SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ Session::get('message') }}", // Use 'message' instead of 'flash_message'
                showConfirmButton: false,
                timer: 2000 // Close alert after 2 seconds
            });
        @endif
    </script>



    <?php
    $D = json_decode(json_encode(Auth::guard('doctor')->user()->get_role()), true);
    $arr = [];
    foreach ($D as $v) {
        $arr[] = $v['permission_id'];
    }
    ?>


    @if (isset($_GET['user_id']))
        <input type="hidden" name="user_id" value="{{ $_GET['user_id'] }}" id="user_id" />
    @endif

    @if (isset($_GET['ap_type']))
        <input type="hidden" name="ap_type" value="{{ $_GET['ap_type'] }}" id="ap_type" />
    @endif

    @if (isset($_GET['location']))
        <input type="hidden" name="hiddenLocation" value="{{ $_GET['location'] }}" id="hiddenLocation" />
    @endif

    <div class="top_header_hui">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="quick_act">
                        <div class="act_title_q">
                            <h5>Calendar Action</h5>
                        </div>
                        <div class="quick_action_gj">
                            {{-- <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#printable">Printable List</a> --}}
                            <a class="setLocationId" href="javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#setLocation">Set up Locations</a>
                            <a class="ServicesProduct" href="javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#ServicesProduct">Products and
                                Services</a>
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#Availablity"> Availability
                            </a>
                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#SearchPatient"><iconify-icon icon="iconamoon:search"></iconify-icon> Search
                            </a>
                            <a href="javascript:void(0)" data-bs-toggle="modal" onclick="createApr()"><iconify-icon
                                    icon="gala:add"></iconify-icon> Create Appointment </a>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <div class="appoinmentcalendar_area">
        <div class="container">

            <div class="row mb-4">


                <div class="col-xl-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div id="external-events">

                            </div>



                            {{-- <div class="opencalendar_box">
                                <!-- Container for the calendar -->
                                <div id="calendarContainer">


                                </div>


                            </div> --}}



                            <div class="Clinicians_boxflt">
                                <a href="{{ route('user.calendar') }}">
                                    <div class="fltr_eventhead">
                                        <h2>Clinicians</h2>
                                        <span
                                            style="font-weight: bold;
                                        font-size: 13px; color: black;">Clear
                                            Filters</span>

                                    </div>
                                </a>


                                <input type="text" id="searchInput" class="form-control"
                                    placeholder="Search clinicians...">
                                <div class="clinician_common_listbox clinic_listactive">
                                    <ul>
                                        @forelse ($allDoctor as $alldoctors)
                                            @if (isset($_GET['user_id']))
                                                @if ($alldoctors->id == $_GET['user_id'])
                                                    <li class="checkFont active" data-user_id="{{ $alldoctors->id }}"
                                                        style="background-color: #c1c1c1;">{{ $alldoctors->name }}</li>
                                                @else
                                                    <li class="checkFont" data-user_id="{{ $alldoctors->id }}">
                                                        {{ $alldoctors->name }}</li>
                                                @endif
                                            @else
                                                <li class="checkFont" data-user_id="{{ $alldoctors->id }}">
                                                    {{ $alldoctors->name }}</li>
                                            @endif
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>

                                <script>
                                    // Function to filter list items based on search input
                                    function filterList() {
                                        var input, filter, ul, li, a, i, txtValue;
                                        input = document.getElementById('searchInput');
                                        filter = input.value.toUpperCase();
                                        ul = document.querySelector('.clinician_common_listbox ul');
                                        li = ul.getElementsByTagName('li');

                                        // Loop through all list items, and hide those that don't match the search query
                                        for (i = 0; i < li.length; i++) {
                                            a = li[i];
                                            txtValue = a.textContent || a.innerText;
                                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                li[i].style.display = '';
                                            } else {
                                                li[i].style.display = 'none';
                                            }
                                        }
                                    }

                                    // Attach event listener to input field
                                    document.getElementById('searchInput').addEventListener('input', filterList);
                                </script>

                            </div>



                            <div class="Clinicians_boxflt">
                                <div class="fltr_eventhead">
                                    <h2>Appointment Types</h2>
                                </div>

                                <input type="text" id="searchAppointment" class="form-control"
                                    placeholder="Search Appointment Types...">
                                <div class="clinician_common_listbox appointmentClass">
                                    <ul>
                                        @foreach ($book_appointments as $allbook_appointments)
                                            @if ($allbook_appointments)
                                                @if (isset($_GET['ap_type']))
                                                    @if ($allbook_appointments->appointment_type == $_GET['ap_type'])
                                                        <li class="checkFont active"
                                                            data-appointment_type="{{ $allbook_appointments->appointment_type }}"
                                                            style="background-color: #c1c1c1;">
                                                            {{ $allbook_appointments->appointment_type }} </li>
                                                    @else
                                                        <li class="checkFont"
                                                            data-appointment_type="{{ $allbook_appointments->appointment_type }}">
                                                            {{ $allbook_appointments->appointment_type }}</li>
                                                    @endif
                                                @else
                                                    <li class="checkFont"
                                                        data-appointment_type="{{ $allbook_appointments->appointment_type }}">
                                                        {{ $allbook_appointments->appointment_type }}</li>
                                                @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>


                            <script>
                                // Function to filter appointment types based on search input
                                function filterAppointmentTypes() {
                                    var input, filter, ul, li, a, i, txtValue;
                                    input = document.getElementById('searchAppointment');
                                    filter = input.value.toUpperCase();
                                    ul = document.querySelector('.appointmentClass ul'); // Selecting the ul with class 'appointmentClass'
                                    li = ul.getElementsByTagName('li');

                                    // Loop through all list items, and hide those that don't match the search query
                                    for (i = 0; i < li.length; i++) {
                                        a = li[i];
                                        txtValue = a.textContent || a.innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            li[i].style.display = ''; // Show the list item if it matches the search query
                                        } else {
                                            li[i].style.display = 'none'; // Hide the list item if it doesn't match
                                        }
                                    }
                                }

                                // Attach event listener to input field
                                document.getElementById('searchAppointment').addEventListener('input', filterAppointmentTypes);
                            </script>






                            <div class="Clinicians_boxflt_">
                                <div class="fltr_eventhead">
                                    <h2>Location</h2>
                                </div>

                                <input type="text" id="searchLocation" class="form-control"
                                    placeholder="Search Location...">


                                <div class="clinician_common_listbox Location_flt">
                                    <ul>

                                        @foreach ($dlocations as $alllocation)
                                            @if (isset($_GET['location']))
                                                @if ($alllocation->branch_name == $_GET['location'])
                                                    <li class="checkFont" data-location_type=""
                                                        style="background-color: #c1c1c1;">
                                                        <iconify-icon
                                                            icon="simple-line-icons:location-pin"></iconify-icon>{{ $alllocation->branch_name }}
                                                    </li>
                                                @else
                                                    <li class="checkFont"
                                                        data-location_type="{{ $alllocation->branch_name }}">
                                                        <iconify-icon
                                                            icon="simple-line-icons:location-pin"></iconify-icon>{{ $alllocation->branch_name }}
                                                    </li>
                                                @endif
                                            @else
                                                <li class="checkFont" data-location_type="{{ $alllocation->branch_name }}">
                                                    <iconify-icon
                                                        icon="simple-line-icons:location-pin"></iconify-icon>{{ $alllocation->branch_name }}
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>


                            <script>
                                // Function to filter locations based on search input
                                function filterLocations() {
                                    var input, filter, ul, li, a, i, txtValue;
                                    input = document.getElementById('searchLocation');
                                    filter = input.value.toUpperCase();
                                    ul = document.querySelector('.Location_flt ul'); // Selecting the ul within the Location_flt div
                                    li = ul.getElementsByTagName('li');

                                    // Loop through all list items, and hide those that don't match the search query
                                    for (i = 0; i < li.length; i++) {
                                        a = li[i];
                                        txtValue = a.textContent || a.innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                            li[i].style.display = ''; // Show the list item if it matches the search query
                                        } else {
                                            li[i].style.display = 'none'; // Hide the list item if it doesn't match
                                        }
                                    }
                                }

                                // Attach event listener to input field for filtering
                                document.getElementById('searchLocation').addEventListener('input', filterLocations);
                            </script>



                        </div>
                    </div>
                </div> <!-- end col-->
                <div class="col-xl-8">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div id="calendar"></div>


                        </div>
                    </div>
                </div>

            </div> <!-- end row-->
            <div style='clear:both'></div>
        </div>
    </div>

    <!-- Add New Event MODAL -->
    <div class="modal fade event-modal" id="event-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header py-3 px-4">
                    <h5 class="modal-title" id="modal-title">Create Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>

                <div class="modal-body p-4">
                    <form class="needs-validation" novalidate name="event-form" id="form-event"  method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12" id="appoinment_book_bx">
                                <div class="row appointment_book">
                                    <h6 class="book_appin_title">Book Appointment</h6>


                                    <div class="col-12 mb-3">
                                        <select class="form-control select2_modal_fir" id="priority" required name="priority">
                                            <option > --Select Priority-- </option>
                                            <option value="bg-danger">High</option>
                                            <option value="bg-success">Medium</option>   
                                            <option value="bg-primary">Low</option>
                                        </select>

                                        <span id="priorityError" style="color: red;"></span>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="inner_element">
                                                    <div class="form-group">

                                                        @if (isset($_GET['patientId']))
                                                            <input type="hidden" name="patintValue"
                                                                value="{{ $_GET['patientId'] }}" id="patientId" />
                                                        @else
                                                            <label class="form-label">Patient</label>
                                                            <select class="form-control select2_modal" required name="patintValue"
                                                                id="patient_id">
                                                                <option value=""> --Select-- </option>
                                                                @forelse ($patients as $patient)
                                                                    <option value="{{ $patient->id }}">
                                                                        {{ $patient->name }}</option>
                                                                @empty
                                                                @endforelse
                                                            </select>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 ps-0">
                                                <a href="#" id="addNew_patientBtn" style="font-size: 13px;"
                                                    class="add_patient_appoin"> <iconify-icon icon="gala:add">
                                                    </iconify-icon> Add Patient</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="inner_element">
                                            <div class="form-group">
                                                <select class="form-control select2_modalapponiment"
                                                    name="appointment_type" id="appointment_type" required>
                                                    <option value=""> --Select Appoinment Type-- </option>
                                                    @foreach ($pathology_price_list as $allpathology_price_list)
                                                        @if (!empty($allpathology_price_list))
                                                            <option value="{{ $allpathology_price_list->test_name }}">{{ $allpathology_price_list->test_name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="inner_element">
                                            <div class="form-group">
                                                <select class="form-control " name="location" id="location" required>
                                                    @forelse ($dlocations as $alllocations)
                                                        <option value="{{ $alllocations->branch_name }}">{{ $alllocations->branch_name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="inner_element">
                                            <div class="form-group">
                                                <input type="hidden" id="event_id" name="event_id" value="">
                                                <input type="text" required class="form-control datepickerInput"
                                                    placeholder="Y-m-d" name="start_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="inner_element">
                                            <div class="form-group">
                                                <input type="time" required class="form-control" id="start_time" placeholder="12:00"
                                                    name="start_time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="inner_element">
                                            <div class="form-group">
                                                <input type="time" id="end_time" required class="form-control" placeholder="12:00"
                                                    name="end_time">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="inner_element">
                                            <div class="form-group">
                                                <select class="form-control select2_modal" required name="doctor_id"
                                                    id="clinician_id">
                                                    <option value="">Select Clinician</option>
                                                    @forelse ($doctors as $doctor)
                                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="checked"
                                                id="flexCheckChecked" name="confirmation">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Send appointment confirmation immediately
                                            </label>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="col-lg-12" id="patientDetail_box">

                                <div class="row appointment_book">
                                    <h6 class="book_appin_title">New Patient Details</h6>
                                    <div class="col-lg-12">
                                        <div class="patient_detail_add_app">
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label">Title</label>
                                                        <select class="form-control select2_modal" name="sirname">
                                                            <option value="Mr">Mr</option>
                                                            <option value="Mrs">Mrs</option>
                                                            <option value="Miss">Miss</option>
                                                            <option value="Ms">Ms</option>
                                                            <option value="Dr">Dr</option>
                                                            <option value="Lady">Lady</option>
                                                            <option value="Sir">Sir</option>
                                                            <option value="Professor">Professor</option>
                                                            <option value="Capt">Capt</option>
                                                            <option value="Lord">Lord</option>

                                                        </select>
                                                        <span id="titleError" style="color: red;"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3 form-group">
                                                        <label for="validationCustom01" class="form-label">Name</label>
                                                        <input type="text" class="form-control" id=""
                                                            placeholder="" name="name">
                                                        <span id="nameError" style="color: red;font-size:smaller"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-4">
                                                        <label class="form-label">Date of Birth</label>
                                                        <div class="input-group" id="datepicker1">
                                                            <input type="text" class="form-control"
                                                                placeholder="dd M, yyyy" data-date-format="dd M, yyyy"
                                                                data-date-container='#datepicker1' name="birth_date"
                                                                data-provide="datepicker" data-date-end-date="0d">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label">Gender</label>
                                                        <select class="form-control select2_modal" name="gender">
                                                            <option value="">Select</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="other">Other</option>
                                                        </select>
                                                        <span id="genderError"
                                                            style="color: red;font-size:smaller"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                        <div class="mb-3 form-group">
                                                            <label for="validationCustom01"
                                                                class="form-label">Select Branch</label>
                                                            <select class="form-control select2_modal" name="selectBranch">
                                                                <option value="">Select</option>
                                                                @forelse ($locations as $alllocations)
                                                                    <option value="{{ $alllocations->id }}">
                                                                        {{ $alllocations->branch_name }}</option>

                                                                @empty
                                                                @endforelse

                                                            </select>
                                                            <span id="branchError"
                                                            style="color: red;font-size:smaller"></span>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="postalcode_patienadd">
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="mb-3 form-group">
                                                        <label for="validationCustom01" class="form-label">Post
                                                            Code</label>
                                                        <input type="text" class="form-control" id=""
                                                            placeholder="" name="post_code">
                                                        <span id="post_codeError"
                                                            style="color: red;font-size:smaller"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3 form-group">
                                                        <label for="validationCustom01" class="form-label">Street</label>
                                                        <input type="text" class="form-control" id=""
                                                            placeholder="" name="street">
                                                        <span id="streetError"
                                                            style="color: red;font-size:smaller"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3 form-group">
                                                        <label for="validationCustom01" class="form-label">Town</label>
                                                        <input type="text" class="form-control" id=""
                                                            placeholder="" name="town">
                                                        <span id="townError" style="color: red;font-size:smaller"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label">Country</label>
                                                        <select class="form-control select2_modal" name="country">
                                                            <option value="Afghanistan">Afghanistan</option>
                                                            <option value="Åland Islands">Åland Islands</option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Antarctica">Antarctica</option>
                                                            <option value="Antigua and Barbuda">Antigua and Barbuda
                                                            </option>
                                                            <option value="Argentina">Argentina</option>
                                                            <option value="Armenia">Armenia</option>
                                                            <option value="Aruba">Aruba</option>
                                                        </select>
                                                        <span id="countryError"
                                                            style="color: red;font-size:smaller"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="phnemailadd_pat">
                                            <div class="row">

                                                <div class="col-lg-4">
                                                    <div class="mb-3 form-group">
                                                        <label for="validationCustom01" class="form-label">Email
                                                            Address</label>
                                                        <input type="text" class="form-control" id=""
                                                            placeholder="" name="email">
                                                        <span id="emailError" style="color: red;font-size:smaller"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3 form-group">
                                                        <label for="validationCustom01" class="form-label">Mobile
                                                            Phone</label>
                                                        <input type="text" class="form-control" id="mobileNumber"
                                                            placeholder="" minlength="0" maxlength="15"
                                                            name="mobile_no">

                                                        <span id="mobile_noError"
                                                            style="color: red;font-size:smaller"></span>
                                                        <!-- @error('mobile_no')
                                                                <span class="alert alert-danger">{{ $message }}</span>
                                                            @enderror -->

                                                    </div>
                                                </div>


                                                <div class="col-lg-4">

                                                    <div class="mb-3 form-group">

                                                        <label for="validationCustom01"
                                                            class="form-label">Paswword</label>

                                                        <input type="password" class="form-control" id=""
                                                            placeholder="password" name="password">
                                                        <span id="passwordError"
                                                            style="color: red;font-size:smaller"></span>
                                                    </div>

                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Select Id</label>
                                                        <select class="form-control select2_modal" name="document_type"
                                                            id="document_type" onclick="emptyId()" style="width: 100%;">
                                                            <option value="">Select Any One</option>
                                                            <option value="CIVIL ID"
                                                                {{ old('document_type') == 'CIVIL ID' ? 'selected' : '' }}>
                                                                CIVIL ID </option>
                                                            <option value="EID"
                                                                {{ old('document_type') == 'EID' ? 'selected' : '' }}>EID
                                                            </option>
                                                            <option value="PERSONAL NUMBER"
                                                                {{ old('document_type') == 'PERSONAL NUMBER' ? 'selected' : '' }}>
                                                                PERSONAL NUMBER</option>
                                                            <option value="RESIDENT ID"
                                                                {{ old('document_type') == 'RESIDENT ID' ? 'selected' : '' }}>
                                                                RESIDENT ID</option>
                                                            <option value="PASSPORT, DRIVER's LICENSE, ETC"
                                                                {{ old('document_type') == 'PASSPORT, DRIVERs LICENSE, ETC' ? 'selected' : '' }}>
                                                                PASSPORT, DRIVER's LICENSE, ETC</option>

                                                        </select>
                                                        @error('document_type')
                                                            <span class="error text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Enter Id Number</label>
                                                        <input type="text" name="enterIdNumber" id="enterIdNumber"
                                                            value="{{ old('enterIdNumber') }}" class="form-control"
                                                            placeholder="">
                                                        <span class="error text-danger" id="validationMessage"> </span>

                                                    </div>
                                                </div>



                                                <div class="col-lg-12 text-end">
                                                    <a href="#" class="theme_btn back_btn"
                                                        id="backToAppointment">Back</a>
                                                    <button type="button" class="theme_btn save_btn"
                                                        id="backToappoin">Save</button>


                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>

                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">

                                <button type="button" class="btn btn_calender_cus btn-danger"
                                    id="btn-delete-event">Delete </button>

                            </div>
                            <div class="col-6 text-end d-flex justify-content-end">
                                <button type="button" id="closebtn" class="btn btn_calender_cus btn-light me-1"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit"  class="btn btn_calender_cus btn-success"
                                    id="btn-save-event">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>




        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const documentTypeSelect = document.getElementById('document_type');
                const idNumberInput = document.getElementById('enterIdNumber');
                const validationMessage = document.getElementById('validationMessage');

                documentTypeSelect.addEventListener('change', handleDropdownChange);
                idNumberInput.addEventListener('input', validateInput);

                function handleDropdownChange() {
                    // Reset the value of the input field
                    idNumberInput.value = '';
                    // Clear the validation message
                    validationMessage.textContent = '';
                    // Validate input to enforce new rules
                    validateInput();
                }

                function validateInput() {
                    const selectedType = documentTypeSelect.value;
                    const idNumber = idNumberInput.value;

                    let maxLength = 0;
                    let message = '';

                    switch (selectedType) {
                        case 'CIVIL ID':
                            maxLength = 9;
                            message = 'CIVIL ID must be exactly 9 digits';
                            break;
                        case 'EID':
                            maxLength = 15;
                            message = 'EID must be exactly 15 digits';
                            break;
                        case 'PERSONAL NUMBER':
                        case 'RESIDENT ID':
                            maxLength = 11;
                            message = selectedType + ' must be exactly 11 digits';
                            break;
                        case 'PASSPORT, DRIVER\'s LICENSE, ETC':
                            maxLength = Infinity;
                            message = '';
                            break;
                    }

                    if (maxLength !== Infinity && idNumber.length > maxLength) {
                        idNumberInput.value = idNumber.slice(0, maxLength);
                    }

                    if (maxLength !== Infinity && idNumber.length !== maxLength) {
                        validationMessage.textContent = message;
                    } else {
                        validationMessage.textContent = '';
                    }
                }
            });
        </script>





        <script>
            // Get the input element by ID
            const mobileNumberInput = document.getElementById('mobileNumber');

            // Add event listener for input events (e.g., keypress, paste)
            mobileNumberInput.addEventListener('input', function(event) {
                // Get the current value of the input field
                let currentValue = event.target.value;

                // Remove non-numeric characters from the input value
                let sanitizedValue = currentValue.replace(/[^0-9]/g, '');

                // Update the input field value with the sanitized value
                event.target.value = sanitizedValue;
            });
        </script>

        <script>
            // Get the input element by ID
            const Landline = document.getElementById('LandlineId');

            // Add event listener for input events (e.g., keypress, paste)
            Landline.addEventListener('input', function(event) {
                // Get the current value of the input field
                let currentValue = event.target.value;

                // Remove non-numeric characters from the input value
                let sanitizedValue = currentValue.replace(/[^0-9]/g, '');

                // Update the input field value with the sanitized value
                event.target.value = sanitizedValue;
            });
        </script>

    </div>
    <!-- end modal-->
    <!----------------------------
                      Download Clinic List (Printable)
                    ---------------------------->
    <div class="modal fade edit_patient__" id="printable" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel"> Download Clinic List</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body padding-0">
                    <div class="inner_data">
                        <div class="row">
                            <!-- <div class="col-lg-12">
                          <div class="title_head">
                           <h4>Schedule Appointment</h4>
                          </div>
                         </div> -->

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="inner_element">
                                            <div class="form-group">
                                                <label for="validationCustom01" class="form-label">Date</label>
                                                <div class="input-group" id="datepicker22">

                                                    <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                        data-date-format="dd M, yyyy" data-date-container='#datepicker22'
                                                        data-provide="datepicker">
                                                </div>
                                                <!-- <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"> -->
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="inner_element">
                                            <div class="mb-3 form-group">
                                                <label for="validationCustom01" class="form-label">Location</label>
                                                <select class="form-control select2_print">
                                                    <option value="">CLINIC</option>
                                                    <option value="">DUBAI</option>
                                                    <option value="">QASTARAT & DAWALI CLINICS</option>
                                                    <option value="">QASTARAT & DAWALI CLINICS</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="inner_element">
                                            <div class="mb-3 form-group">
                                                <label for="validationCustom01" class="form-label">Clinicians</label>
                                                <select class="form-control select2_print">
                                                    <option value="">SAIF ALZAABI</option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="action text-end bottom_modal">
                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                            data-bs-dismiss="modal">
                            Generate PDF</a>
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
    <!----------------------------
                      Set up location
                    ---------------------------->
    <div class="modal fade edit_patient__" id="setLocation" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="location_title">
                        <h1 class="modal-title" id="exampleModalLabel">Set up Locations</h1>
                        <p class="loction_para">Set up your clinic locations and their availability</p>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body padding-0">
                    <div class="inner_data">
                        <div class="row">

                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="inner_element">
                                            <div class="mb-3 form-group">
                                                <label for="validationCustom01" class="form-label">Location</label>
                                                <select class="form-control select2_location" name="setlocation_data_id"
                                                    id="setlocation_data_id">


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="add_loaction">
                                            <a href="javascript:void(0)" id="locationAddBtn"><iconify-icon
                                                    icon="gala:add"></iconify-icon> Add New Location</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="new_location" id="locationNew_box">
                                    <form id="setUpLocationForm_" method="POST" enctype="multipart/form-data">

                                        @csrf
                                        <input type="hidden" name="location_update" id="location_update"
                                            value="">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <h6>New Location Details</h6>
                                            </div>
                                            <div class="col-lg-6">

                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <label class="form-label">Location
                                                            Name</label>

                                                        <input type="text" class="form-control" id="location_name"
                                                            placeholder="" name="location_name">
                                                        <span id="location_nameError" class="text-danger"
                                                            style="font-size: 14px;"></span>
                                                    </div>
                                                </div>
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <label class="form-label">Phone
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            id="geographicLocation" placeholder=""
                                                            name="geographicLocation">
                                                        <span id="geographicLocationError" class="text-danger"
                                                            style="font-size: 14px;"></span>
                                                    </div>
                                                </div>


                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <label class="form-label">Postal
                                                            Address</label>
                                                        <textarea class="form-control" placeholder="" style="height:100px" name="postalAddress" id="postalAddress"></textarea>

                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-lg-6">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d28050.13791057104!2d77.4012928!3d28.5016064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1712228465761!5m2!1sen!2sin"
                                                    width="100%" height="100%" style="border:0;" allowfullscreen=""
                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>


                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-lg-6 text-end">
                                                <button type="submit"
                                                    class="btn r-04 btn--theme hover--tra-black add_patient">
                                                    Save Location</button>
                                                <a href="#" id="closeBtnLocation"
                                                    class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn">
                                                    Close</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>



                            </div>


                        </div>

                    </div>
                </div>
                <!-- <div class="action text-end bottom_modal">
                         <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">
                         Add Location</a>
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


    <script>
        // Add event listener to the "Add New Location" link
        document.getElementById('locationAddBtn').addEventListener('click', function() {
            // Reset the dropdown value to its default (first option)
            document.getElementById('setlocation_data_id').selectedIndex = 0; // Set to first option (index 0)

            // If you want to clear the selected value completely (no option selected), use:
            // document.getElementById('setlocation_data_id').selectedIndex = -1;

            // If you are using a library like Select2 to style the dropdown, you may need to trigger an event to notify Select2 of the change:
            // $('#setlocation_data_id').trigger('change');
        });
    </script>

    <!----------------------------
                        Product & Services
                        ---------------------------->
    <div class="modal fade edit_patient__" id="ServicesProduct" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="location_title">
                        <h1 class="modal-title" id="exampleModalLabel">Products and Services</h1>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body padding-0">
                    <div class="inner_data">
                        <div class="row">
                            <!-- <div class="col-lg-12">
                          <div class="title_head">
                           <h4>Schedule Appointment</h4>
                          </div>
                         </div> -->


                            <div class="col-lg-12">
                                <div class="appointment_service" id="serviceList">


                                </div>
                                <form id="ServicesProductForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="consultaion">
                                        <div class="form_filed_consultaion">
                                            <div class="inner_element">
                                                <div class="form-group">
                                                    <label for="test_name" class="form-label">Test Name</label>
                                                    <input type="text" class="form-control" id="test_name"
                                                        placeholder="Test Name" name="test_name">
                                                    <span id="test_nameError" class="text-danger"
                                                        style="font-size: 14px;"></span>
                                                </div>
                                            </div>
                                            <div class="inner_element">
                                                <div class="form-group">
                                                    <label for="test_code" class="form-label">Test Code</label>
                                                    <input class="form-control" id="test_code" placeholder="test code"
                                                        type="text" name="test_code" id="test_code">

                                                </div>
                                            </div>
                                            <div class="inner_element">
                                                <div class="form-group">
                                                    <label for="turnaround" class="form-label">Turnaround</label>
                                                    <input type="text" name="turnaround" id="turnaround"
                                                        class="form-control" id="" placeholder="turnaround">

                                                </div>
                                            </div>
                                            <div class="inner_element">
                                                <div class="form-group">
                                                    <label for="price" class="form-label">Price</label>
                                                    <input type="number" min="0" name="price" id="price"
                                                        class="form-control" placeholder="" required="price"
                                                        fdprocessedid="phkvnx">
                                                    <span id="priceError" class="text-danger"
                                                        style="font-size: 14px;"></span>
                                                </div>
                                            </div>
                                            <div class="inner_element">
                                                <div class="form-group">

                                                    <input type="color" class="colorpicker form-control"
                                                        name="color_type">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="inner_element appoin_type">
                                                    <div class="mb-3 form-group">
                                                        <label for="validationCustom01" class="form-label">Type</label>
                                                        <select class="form-control" id="mulipleType" name="price_type">
                                                            <option value="">Select Any One</option>
                                                            @if($patho_types)
                                                            @foreach($patho_types as  $value)
                                                                <option value="{{$value}}">{{$value}}</option>
                                                            @endforeach
                                                            @endif
                                                            <option value="Other">Other</option>

                                                        </select>
                                                        <div id="mulipleTypeInput" hidden>
                                                            <input class="form-control" name="mulipleTypeOt" id="mulipleTypeOt" placeholder="Enter New Type Here..." />
                                                        </div>
                                                        <span id="price_typeError" class="text-danger"
                                                            style="font-size: 14px;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="inner_element appoin_type">
                                                    <div class="mb-3 form-group">

                                                        <label class="form-label">Included Tests</label>
                                                        <textarea rows="2" name="included_test" id="included_test" class="form-control" placeholder=""></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="inner_element appoin_type">
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label">Note</label>
                                                        <textarea rows="2" name="note" id="note" minlength="15" maxlength="100" class="form-control"
                                                            placeholder=""></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">

                                            <div class="col-lg-12 text-end"
                                                style="display: flex; justify-content: flex-end;">
                                                <button type="submit"
                                                    class="btn r-04 btn--theme hover--tra-black add_patient">
                                                    Save</button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>

                    </div>
                </div>
                <!-- <div class="action text-end bottom_modal">
                         <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">
                         Add Location</a>
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
    <!----------------------------
                        Product & Services
                        ---------------------------->
    <div class="modal fade edit_patient__" id="Availablity" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="location_title">
                        <h1 class="modal-title" id="exampleModalLabel">Appointment Availability </h1>

                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body padding-0">
                    <div class="inner_data">
                        <div class="row">
                            <!-- <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>Schedule Appointment</h4>
                                        </div>
                                    </div> -->
                            <div class="col-lg-12">
                                <div class="aviablity_tabs">
                                    <ul class="nav nav-pills  mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button" role="tab"
                                                aria-controls="pills-home" aria-selected="true">Find Availability</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button" role="tab"
                                                aria-controls="pills-profile" aria-selected="false">Add
                                                Availability</button>
                                        </li>

                                    </ul>

                                    <div class="tab-content" id="pills-tabContent">


                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                            aria-labelledby="pills-home-tab" tabindex="0">
                                            <form action="{{ route('user.calendar') }}" method="post" /> @csrf
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="inner_element appoin_type">
                                                        <div class="mb-3 form-group">
                                                            <label for="validationCustom01" class="form-label">Appointment
                                                                Type</label>
                                                            <select class="form-control select2_appoin_ttype"
                                                                name="appointmentType">
                                                                <option value="">Select Any one</option>

                                                                @foreach ($pathology_price_list as $allpathology_price_list)
                                                                    @if (!empty($allpathology_price_list))
                                                                        <option
                                                                            value="{{ $allpathology_price_list->test_name }}">
                                                                            {{ $allpathology_price_list->test_name }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-3">
                                                    <div class="inner_element appoin_type">
                                                        <div class="mb-3 form-group">
                                                            <label for="validationCustom01"
                                                                class="form-label">Location</label>
                                                            <select class="form-control select2_appoin_ttype"
                                                                name="location">

                                                                <option value="">Select Any one</option>

                                                                @forelse ($locations as $alllocations)
                                                                    <option value="{{ $alllocations->branch_name }}">
                                                                        {{ $alllocations->branch_name }}</option>

                                                                @empty
                                                                @endforelse

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-3">
                                                    <div class="inner_element appoin_type">
                                                        <div class="mb-3 form-group">
                                                            <label for="validationCustom01" class="form-label">Select
                                                                Clinician</label>
                                                            <select class="form-control select2_appoin_ttype"
                                                                name="selectClinician">
                                                                <option value="">Select Any one</option>

                                                                @forelse ($doctors as $alldoctors)
                                                                    <option value="{{ $alldoctors->id }}">
                                                                        {{ $alldoctors->name }}</option>
                                                                @empty
                                                                @endforelse


                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="inner_element appoin_type">
                                                        <div class="mb-3 form-group">
                                                            <button type="submit"
                                                                class="btn r-04 btn--theme hover--tra-black add_patient"
                                                                style="margin-top: 28px;">Find Availability</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>


                                            <div class="col-lg-12">

                                                <p class="possiablity_found">
                                                    @if ($countData)
                                                        {{ $countData }}
                                                    @else
                                                        0
                                                    @endif

                                                    possibility found.
                                                </p>


                                                @forelse ($appontment_availability as $allappontment_availability)
                                                    @php
                                                        $doctorName = DB::table('users')
                                                            ->where('id', $allappontment_availability->doctor_id)
                                                            ->first();
                                                    @endphp

                                                    <div class="possiblity">
                                                        @if ($allappontment_availability->created_at)
                                                            <span class="dayfound">
                                                                <h6>{{ \Carbon\Carbon::parse($allappontment_availability->created_at)->format('l') }}
                                                                </h6>
                                                                <p>{{ \Carbon\Carbon::parse($allappontment_availability->created_at)->format('M j, Y') }}
                                                                </p>
                                                            </span>
                                                        @endif


                                                        <span>{{ $doctorName->doctorName ?? '' }}</span>
                                                        <span>
                                                            {{ $allappontment_availability->start_time }} -
                                                            {{ $allappontment_availability->end_time }}
                                                        </span>
                                                        <span>{{ $allappontment_availability->appointment_types }}</span>
                                                        <span>{{ $allappontment_availability->location }}</span>

                                                    </div>

                                                @empty
                                                @endforelse

                                            </div>
                                        </div>


                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                            aria-labelledby="pills-profile-tab" tabindex="0">
                                            <form action="{{ route('add.Availability') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-10">
                                                        <div class="inner_element">
                                                            <div class="mb-3 form-group">
                                                                <label for="validationCustom01" class="form-label">Select
                                                                    a
                                                                    Clinician <span class="">*</span></label>
                                                                <select class="form-control select2_appoin_ttype"
                                                                    id="setdoctor_id" name="doctor_id" required>
                                                                    @forelse ($doctors as $alldoctors)
                                                                        <option value="{{ $alldoctors->id }}">
                                                                            {{ $alldoctors->name }}</option>
                                                                    @empty
                                                                    @endforelse

                                                                </select>
                                                                <span id="setdoctor_idError" class="text-danger"
                                                                    style="font-size: 14px;"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="add_loaction">
                                                            <a href="#" id="avia_btn_add"><iconify-icon
                                                                    icon="gala:add"></iconify-icon> Add</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="add_avialablity" id="avialablity_box_fgu">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    <div class="inner_element">
                                                                        <div class="mb-3 form-group">
                                                                            <label for="validationCustom01"
                                                                                class="form-label">Location <span
                                                                                    class="">*</span></label>
                                                                            <select
                                                                                class="form-control select2_appoin_ttype"
                                                                                name="location" id="setlocation_data_id"
                                                                                required>
                                                                                <option value="">Select Any One
                                                                                </option>

                                                                                @forelse ($locations as $alllocations)
                                                                                    <option
                                                                                        value="{{ $alllocations->branch_name }}">
                                                                                        {{ $alllocations->branch_name }}
                                                                                    </option>

                                                                                @empty
                                                                                @endforelse


                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="inner_element">
                                                                        <div class="mb-3 form-group">
                                                                            <label for="validationCustom01"
                                                                                class="form-label">Day of the week</label>
                                                                            <select
                                                                                class="form-control select2_appoin_ttype"
                                                                                name="day_of_the_week">
                                                                                <option value="Monday">Monday</option>
                                                                                <option value="Tuesday">Tuesday</option>
                                                                                <option value="Wednesday">Wednesday
                                                                                </option>
                                                                                <option value="Thursday">Thursday</option>
                                                                                <option value="Friday">Friday</option>
                                                                                <option value="Saturday">Saturday</option>
                                                                                <option value="Sunday">Sunday</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="inner_element">
                                                                        <div class="form-group">
                                                                            <label for="validationCustom01"
                                                                                class="form-label">Date</label>
                                                                            <div class="input-group" id="datepicker22">

                                                                                <input type="date" class="form-control"
                                                                                    placeholder="DD,MM,YYYY"
                                                                                    name="date">
                                                                            </div>
                                                                            <!-- <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"> -->
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="inner_element">
                                                                        <div class="mb-3 form-group">
                                                                            <label for="validationCustom01"
                                                                                class="form-label">Repeats</label>
                                                                            <select
                                                                                class="form-control select2_appoin_ttype"
                                                                                name="repeats">
                                                                                <option value="">Every Week</option>
                                                                                <option value="">Every 2 Weeks
                                                                                </option>
                                                                                <option value="">Every 3 Weeks
                                                                                </option>
                                                                                <option value="">Every 4 Weeks
                                                                                </option>
                                                                                <option value="">None</option>



                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="inner_element">
                                                                        <div class="form-group">
                                                                            <label for="validationCustom01"
                                                                                class="form-label">Start Time <span
                                                                                    class="">*</span></label>
                                                                            <input type="text"
                                                                                class="form-control timepicker-custom"
                                                                                placeholder="12:00" name="start_time"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="inner_element">
                                                                        <div class="form-group">
                                                                            <label for="validationCustom01"
                                                                                class="form-label">End Time <span
                                                                                    class="">*</span></label>
                                                                            <input type="text"
                                                                                class="form-control timepicker-custom"
                                                                                placeholder="12:00" name="end_time"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <div class="inner_element">
                                                                        <div class="mb-3 form-group">
                                                                            <label for="validationCustom01"
                                                                                class="form-label">Appointment Types <span
                                                                                    class="">*</span></label>
                                                                            <select
                                                                                class="form-control select2_appoin_ttype"
                                                                                name="appointment_types" required>


                                                                                @foreach ($book_appointments as $allPatientappointments)
                                                                                    <option
                                                                                        value="{{ $allPatientappointments->appointment_type }}">
                                                                                        {{ $allPatientappointments->appointment_type }}
                                                                                    </option>
                                                                                @endforeach

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 text-end">
                                                                    <button type="submit"
                                                                        class="btn r-04 btn--theme hover--tra-black add_patient">
                                                                        Save</button>
                                                                    <a href="#" id="availablity_bx_closeBTN"
                                                                        class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn">
                                                                        Close</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>




                    </div>

                </div>
            </div>
            <!-- <div class="action text-end bottom_modal">
                                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">
                                    Add Location</a>
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


    <!----------------------------
                    Product & Services
                    ---------------------------->
    <div class="modal fade edit_patient__" id="SearchPatient" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="location_title">

                        <h1 class="modal-title" id="exampleModalLabel">Search Patient </h1>

                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body padding-0">
                    <div class="inner_data">
                        <div class="row">
                            <!-- <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>Schedule Appointment</h4>
                                        </div>
                                    </div> -->
                            <div class="col-lg-12">
                                <div class="inner_element">
                                    <form action="{{ route('user.calendar') }}" method="post">
                                        @csrf
                                        <div class="form-group">

                                            <input type="search" class="form-control" name="searchPatient"
                                                value="{{ $searchPatient }}" placeholder="Type a patient name">

                                            <button type="submit"
                                                class="btn r-04 btn--theme hover--tra-black add_patient"
                                                style="margin-top: 28px;">Search Patient</button>

                                        </div>
                                    </form>

                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="search_result_cl">
                                    <h6>Results</h6>
                                    @if ($matchingAppointments)
                                        @forelse ($matchingAppointments as $allmatchingAppointments)
                                            <div class="service_box_appoin">


                                                <span>{{ \Carbon\Carbon::parse($allmatchingAppointments->start_date)->format('l M j, Y') }}</span>
                                                <span>{{ $allmatchingAppointments->start_time }}</span>
                                                <span>{{ $allmatchingAppointments->appointment_type }} </span>
                                                <span>{{ $allmatchingAppointments->location }}</span>
                                                {{-- <span><iconify-icon icon="charm:circle-cross"></iconify-icon></span> --}}
                                            </div>

                                        @empty
                                        @endforelse
                                    @endif


                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <!-- <div class="action text-end bottom_modal">
                                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">
                                    Add Location</a>
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



    <script>
        // Get all the list items
        const listItems = document.querySelectorAll('.checkFont');

        listItems.forEach(item => {
            item.addEventListener('click', function() {
                // Get the data attributes of the clicked item
                const userId = item.getAttribute('data-user_id');
                const appointmentType = item.getAttribute('data-appointment_type');
                const locationType = item.getAttribute('data-location_type');

                const baseUrl = window.location.href.split('?')[0];
                const queryParams = new URLSearchParams(window.location.search);

                if (userId) {
                    queryParams.set('user_id', userId);
                    const newUrl = `${baseUrl}?${queryParams.toString()}`;
                    window.location.href = newUrl;
                } else {
                    queryParams.delete('user_id');
                }



                if (appointmentType) {
                    appointmentType_ = appointmentType.replace(/\+/g, ' ');
                    queryParams.set('ap_type', appointmentType_);
                    const newUrl = `${baseUrl}?${queryParams.toString()}`;
                    window.location.href = newUrl;
                } else {
                    queryParams.delete('ap_type');
                }


                if (locationType) {
                    locationType_ = locationType.replace(/\+/g, ' ');
                    queryParams.set('location', locationType_);
                    const newUrl = `${baseUrl}?${queryParams.toString()}`;
                    window.location.href = newUrl;
                } else {
                    queryParams.delete('locationType');
                }

                // Update the URL with the modified query parameters
                const newUrl = `${baseUrl}?${queryParams.toString()}`;
                history.pushState({}, '', newUrl);
            });
        });
    </script>


    @push('custom-js')
        <link rel="stylesheet" href="{{ asset('/assets/libs/fullcalendar/core/main.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{ asset('/assets/libs/fullcalendar/daygrid/main.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{ asset('/assets/libs/fullcalendar/bootstrap/main.min.css')}}" type="text/css">
        <link rel="stylesheet" href="{{ asset('/assets/libs/fullcalendar/timegrid/main.min.css')}}" type="text/css">

        <script src="{{ asset('/assets/libs/moment/min/moment.min.js')}}"></script>
        <script src="{{ asset('/assets/libs/jquery-ui-dist/jquery-ui.min.js')}}"></script>
        <script src="{{ asset('/assets/libs/fullcalendar/core/main.min.js')}}"></script>
        <script src="{{ asset('/assets/libs/fullcalendar/bootstrap/main.min.js')}}"></script>
        <script src="{{ asset('/assets/libs/fullcalendar/daygrid/main.min.js')}}"></script>
        <script src="{{ asset('/assets/libs/fullcalendar/timegrid/main.min.js')}}"></script>
        <script src="{{ asset('/assets/libs/fullcalendar/interaction/main.min.js')}}"></script>


        <script src="{{ asset('/assets/js/app.js')}}"></script>



        <script>

$("#mulipleType").on('change',function(){

$("#mulipleTypeInput").attr('hidden',true);
// $("#mulipleType").attr('hidden',false);
if($(this).val() == "Other"){
    $("#mulipleTypeInput").attr('hidden',false);
    // $("#mulipleType").attr('hidden',true);
}
})

            document.addEventListener('DOMContentLoaded', function() {
                // Get all list items
                var listItems = document.querySelectorAll('.clinic_listactive li');

                // Add click event listener to each list item
                listItems.forEach(function(item) {
                    item.addEventListener('click', function() {
                        // Remove the "active" class from all list items
                        listItems.forEach(function(li) {
                            li.classList.remove('activefltr');
                        });

                        // Add the "active" class to the clicked list item
                        item.classList.add('activefltr');
                    });
                });
            });
        </script>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                flatpickr("#calendarContainer", {
                    inline: true, // Display the calendar inline
                    dateFormat: "Y-m-d", // Customize date format
                    defaultDate: "today", // Set the default date
                    // Add more options as needed
                });
            });
        </script>
        <!-- fullcalender calculation handle  -->
        <script>
            $(document).ready(function() {
                var calendar = $('#calendar');
                var modal = $('#event-modal');
                var form = $('#form-event');
                var deleteButton = $('#btn-delete-event');



                function initCalendar(events) {
                    //    console.log(events);
                    
                    "use strict";

                    var allowedPid = Object.values(events[events.length - 1]);
                    // console.log(allowedPid);

                    var m = new FullCalendar.Calendar(document.getElementById("calendar"), {
                        plugins: ["bootstrap", "interaction", "dayGrid", "timeGrid"],
                        editable: false,
                        droppable: !0,
                        selectable: !0,
                        defaultView: "dayGridMonth",
                        themeSystem: "bootstrap",
                        header: {
                            left: "prev,next today",
                            center: "title",
                            right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
                        },
                        eventTimeFormat: { 
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: false
                        },
                        events: events,

                        eventRender: function(info) {
                            var eventEl = info.el;
                            var priority = info.event.extendedProps.priority;
                            var colour_type = info.event.extendedProps.colour_type;
                            // console.log(info);

                            // Create a span element for the icon
                            var iconSpan = document.createElement('span');
                            iconSpan.classList.add('event-icon'); // Add custom class for styling

                            // Set icon and customize color based on priority value
                            var iconClass, iconColor;
                            if (priority === "bg-danger") {
                                iconClass = "fas fa-exclamation-circle";
                                iconColor = "#dc3545"; // Red color for danger
                            } else if (priority === "bg-success") {
                                iconClass = "fas fa-check-circle";
                                iconColor = "#28a745"; // Green color for success
                            } else if (priority === "bg-primary") {
                                iconClass = "fas fa-info-circle";
                                iconColor = "#007bff"; // Blue color for primary
                            } else {
                                iconClass = "fas fa-question-circle";
                                iconColor = "#ffc107"; // Default color for other priorities
                            }

                            // Set icon HTML with specified class and color
                            iconSpan.innerHTML = `<i class="${iconClass}" style="color: ${iconColor};"></i>`;

                            // Append the icon span to the event element
                            eventEl.appendChild(iconSpan);

                            if (colour_type) {
                                eventEl.style.backgroundColor = colour_type; // Light red background for danger
                            } else {
                                eventEl.style.backgroundColor = "#fff3cd"; // Light yellow background for other priorities
                            }
                        },
                        






                        eventClick: function(info) {
                            $('#form-event').find('input, textarea, select, button').removeAttr('disabled');
                            $("#addNew_patientBtn").css('display','block');
                            modal.find('.modal-title').text('Edit Appointment');
                            form[0].reset();
                            form.find('#btn-save-event').text('Update');
                            deleteButton.show();


                            form.find('input[name="event_id"]').val(info.event.id);
                            form.find('select[name="patintValue"]').val(info.event.extendedProps.patient_id)
                                .trigger('change');

                            form.find('select[name="priority"]').val(info.event.extendedProps.priority)
                                .trigger('change');


                            form.find('select[name="appointment_type"]').val(info.event.title).trigger(
                                'change');

                            form.find('select[name="location"]').val(info.event.extendedProps.location)
                                .trigger('change');

                            form.find('select[name="doctor_id"]').val(info.event.extendedProps.doctor_id)
                                .trigger('change');

                            function formatDate(date) {
                                var day = date.getDate();
                                var month = date.getMonth() + 1;
                                var year = date.getFullYear();


                                if (day < 10) {
                                    day = '0' + day;
                                }
                                if (month < 10) {
                                    month = '0' + month;
                                }


                                return year + '-' + month + '-' + day;
                            }


                            function compareTwoDates(d2) {
                                const date1 = new Date();
                                const date2 = new Date(d2);
                                return date1 - date2;
                            }

                            

                            if (info.event.end) {
                                var formatendDate = new Date(info.event.end);
                                var formattedEndDate = formatDate(formatendDate);
                                form.find('input[name="end_date"]').val(formattedEndDate);
                            }

                            if (info.event.start) {
                                var startDate = new Date(info.event.start);
                                var formattedStartDate = formatDate(startDate);
                                form.find('input[name="start_date"]').val(formattedStartDate);
                            }


                            let datesComparisonResult;
                            datesComparisonResult = compareTwoDates(formattedStartDate);
                           
                            if (datesComparisonResult > 0) { 
                                $("#btn-delete-event").css("display","none");
                                $("#btn-save-event").css("display","none");
                            } 


                            form.find('input[name="start_time"]').val(info.event.extendedProps.start_time)
                                .trigger('change');
                            form.find('input[name="end_time"]').val(info.event.extendedProps.end_time)
                                .trigger('change');
                            form.find('input[name="cost"]').val(info.event.extendedProps.cost);
                            form.find('input[name="code"]').val(info.event.extendedProps.code);
                            form.find('select[name="clinician_id"]').val(info.event.extendedProps
                                .clinician_id).trigger('change');
                            form.find('input[name="confirmation"]').prop('checked', info.event.extendedProps
                                .confirmation === 'yes');
                                // console.log(allowedPid,info.event.extendedProps.patient_id);

                            if(!allowedPid.includes(info.event.extendedProps.patient_id)){
                                $("#btn-delete-event").css("display","none");
                                $("#btn-save-event").css("display","none");
                                $('#form-event').find('input, textarea, select, button').prop('disabled', true);
                                $("#addNew_patientBtn").css('display','none');
                                // $('#select2-appointment_type-container').text(info.event.title);
                                // $("#location").css('display','none');
                                // $("#showlocation").css('display','block');
                                // $('#showlocation').append(new Option(info.event.extendedProps.location, info.event.extendedProps.location));

                                $("#closebtn").removeAttr('disabled');
                            }else{
                                
                            }
                                

                            modal.modal('show');
                        },


                        dateClick: function(info) {
                            // Get the current date
                            var today = new Date();
                            today.setHours(0, 0, 0,
                                0); // Set the time to midnight to only compare the date part

                            // Convert the clicked date to a Date object
                            var clickedDate = new Date(info.dateStr);

                            // Check if the clicked date is in the past
                            if (clickedDate < today) {
                                // If the date is in the past, do not show the modal
                                Swal.fire({
                                    title: 'Warning',
                                    text: 'You cannot create an appointment on a past date.',
                                    icon: 'warning',
                                    showConfirmButton: false,
                                    timer: 3000 // Display the message for 2 seconds
                                });
                                return; // Exit the function
                            }
                            // $("#btn-delete-event").css("display","block");
                            $("#btn-save-event").css("display","block");
                            modal.find('.modal-title').text('Create Appointment');
                            form[0].reset();
                            form.find('#btn-save-event').text('Save');
                            deleteButton.hide();

                            form.find('input[name="start_date"]').val(info.dateStr);
                            form.find('input[name="end_date"]').val(info.dateStr);

                            $('.datepickerInput_1').datepicker({
                                dateFormat: 'yy-mm-dd',
                                minDate: info.dateStr,
                            });

                            $('#end_date').datepicker({
                                dateFormat: 'yy-mm-dd',
                                minDate: info.dateStr // Set minDate to start_date initially
                            });
                            $('#form-event').find('input, textarea, select, button').removeAttr('disabled');


                            modal.modal('show');
                        }


                    });

                    m.render();



                    form.on('submit', function(e) { 

                        e.preventDefault();

                        if (!$('#priority').val() || $('#priority').val()=="") {
                            Swal.fire({
                                title: 'Warning',
                                text: 'Priority field is required.',
                                icon: 'warning',
                            });
                        }else if(!$('#patient_id').val() || $('#patient_id').val()==""){
                            Swal.fire({
                                title: 'Warning',
                                text: 'Patient field is required.',
                                icon: 'warning',
                            });
                            
                        }else if(!$('#appointment_type').val() || $('#appointment_type').val()==""){
                            Swal.fire({
                                title: 'Warning',
                                text: 'Appoinment type field is required.',
                                icon: 'warning',
                            });
                            
                        }else if(!$('#location').val() || $('#location').val()==""){
                            Swal.fire({
                                title: 'Warning',
                                text: 'Location field is required.',
                                icon: 'warning',
                            });
                            
                        }else if(!$('#start_time').val() || $('#start_time').val()==""){
                            Swal.fire({
                                title: 'Warning',
                                text: 'Start time field is required.',
                                icon: 'warning',
                            });
                        }else if(!$('#end_time').val() || $('#end_time').val()==""){
                            Swal.fire({
                                title: 'Warning',
                                text: 'End time field is required.',
                                icon: 'warning',
                            });
                        }else if(!$('#clinician_id').val() || $('#clinician_id').val()==""){
                            Swal.fire({
                                title: 'Warning',
                                text: 'Clinician field is required.',
                                icon: 'warning',
                            });
                        }else{
                            var formData = $(this).serialize();
                            $.ajax({
                                url: '{{ route('user.calendar.event') }}',
                                type: 'POST',
                                data: formData,
                                success: function(response) {
                                    if (response.message) {
                                        Swal.fire({
                                            title: 'Success',
                                            text: response.message,
                                            icon: 'success',
                                            showConfirmButton: false, // Hide the default "OK" button
                                            timer: 2000 // Display the message for 2 seconds
                                        }).then(function() {
                                            window.location.reload();
                                        });
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        }
                    });

                    deleteButton.on('click', function() {
                        var eventId = form.find('input[name="event_id"]').val();

                        var deleteUrl = '{{ route('user.delete.event') }}' + '?id=' + eventId;

                        if (eventId) {
                            $.ajax({
                                url: deleteUrl,
                                type: 'GET',
                                data: {
                                    event_id: eventId
                                },
                                success: function(response) {

                                    m.refetchEvents();
                                    modal.modal('hide');
                                    if (response.message) {
                                        swal.fire(
                                            'Success',
                                            response.message,
                                            'success'
                                        ).then(function() {
                                            window.location.reload();
                                        });
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        }
                    });
                }

                var patientValue = $('#patientId').val();
                var user_id = $('#user_id').val();
                var appointment_type = $('#ap_type').val();
                var location = $('#hiddenLocation').val();

                $.ajax({
                    url: '{{ route('user.calendar.getEvents') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        patientValue: patientValue,
                        user_id: user_id,
                        appointment_type: appointment_type,
                        location: location
                    },
                    success: function(response) {
                        console.log(response);
                        initCalendar(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {

                // $('.datepickerInputDate').datepicker({
                //     dateFormat: 'YYYY-MM-DD'
                // });


                $('.datepickerInputDate').attr('autocomplete', 'off');


                $('.start_date, .end_date').change(function() {
                    var startDate = $('.start_date').datepicker('getDate');
                    var endDate = $('.end_date').datepicker('getDate');

                    if (startDate != null && endDate != null && startDate > endDate) {
                        alert('Start date must be before end date!');
                        $('.start_date').val('');
                        $('.end_date').val('');
                    }
                });

                $('#event-modal').on('hidden.bs.modal', function(e) {
                    // location.reload();
                });
                //   date format
                $(function() {
                    $(".end_date").datepicker({
                        dateFormat: 'yy-mm-dd'
                    });
                    $(".start_date").datepicker({
                        dateFormat: 'yy-mm-dd'
                    }).bind("change", function() {
                        var minValue = $(this).val();
                        minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
                        minValue.setDate(minValue.getDate() + 1);
                        $(".end_date").datepicker("option", "minDate", minValue);
                    })
                });

            });
        </script>


        <script>
            $('.select2_print').select2({
                dropdownParent: $('#printable'),
                minimumResultsForSearch: -1
            });
        </script>
        <script>
            $('.select2_location').select2({
                dropdownParent: $('#setLocation'),
                minimumResultsForSearch: -1
            });
        </script>
        <script>
            $('.select2_service').select2({
                dropdownParent: $('#ServicesProduct'),
                minimumResultsForSearch: -1
            });
            $('.select2_service').select2({
                dropdownParent: $('#setLocation'),
                minimumResultsForSearch: -1
            });
        </script>
        <script>
            $('.select2_appoin_ttype').select2({
                dropdownParent: $('#Availablity'),
                minimumResultsForSearch: -1
            });
        </script>


        <script>
            $(document).ready(function() {
                $('#locationNew_box').hide();
                $('#locationAddBtn').click(function() {
                    $('#location_update').val('');
                    $('#location_name').val('');
                    $('#geographicLocation').val('');
                    $('#appointment').val('');
                    $('#postalAddress').val('');
                    $('#locationNew_box').show();

                });
                $('#closeBtnLocation').click(function() {
                    $('#locationNew_box').hide();
                });


            })
        </script>


        <script>
            $(document).ready(function() {
                $('#avialablity_box_fgu').hide();
                $('#avia_btn_add').click(function() {
                    $('#avialablity_box_fgu').show();
                });
                $('#availablity_bx_closeBTN').click(function() {
                    $('#avialablity_box_fgu').hide();
                });


            })
        </script>
        <!-- add patinets form data -->
        <script>
            $(document).ready(function() {


                $('#backToappoin').click(function(e) {
                    e.preventDefault();

                    let isValid = validateForm();



                    if (isValid) {
                        let formData = new FormData();
                        formData.append('sirname', $('select[name="sirname"]').val());
                        formData.append('name', $('input[name="name"]').val());
                        formData.append('birth_date', $('input[name="birth_date"]').val());
                        formData.append('gender', $('select[name="gender"]').val());
                        formData.append('selectBranch', $('select[name="selectBranch"]').val());
                        formData.append('post_code', $('input[name="post_code"]').val());
                        formData.append('street', $('input[name="street"]').val());
                        formData.append('town', $('input[name="town"]').val());
                        formData.append('country', $('select[name="country"]').val());
                        formData.append('email', $('input[name="email"]').val());
                        formData.append('mobile_no', $('input[name="mobile_no"]').val());
                        formData.append('password', $('input[name="password"]').val());
                        formData.append('landline', $('input[name="landline"]').val());
                        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                        $.ajax({
                            url: '{{ route('user.patient.store') }}',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,

                            success: function(result) {

                                swal.fire(
                                    'Success',
                                    'Patient Details Added successfully!',
                                    'success'
                                );
                               
                                $('#patientDetail_box').hide();
                                $('#appoinment_book_bx').show();


                                $('select[name="sirname"]').val('');
                                $('input[name="name"]').val();
                                $('input[name="birth_date"]').val('');
                                $('select[name="gender"]').val('');
                                $('input[name="post_code"]').val('');
                                $('input[name="street"]').val('');
                                $('input[name="town"]').val('');
                                $('select[name="country"]').val('');
                                $('input[name="email"]').val('');
                                $('input[name="mobile_no"]').val('');
                                $('input[name="password"]').val('');

                                populateUsers();
                            },
                            error: function(xhr, status, error) {

                                if (xhr.status == 422) {

                                    var errors = JSON.parse(xhr.responseText);
                                    console.log('validation-error', errors);
                                    var errorMessage = 'Validation error(s):<br>';

                                    $.each(errors.error, function(key, value) {
                                        errorMessage += value + '<br>';
                                    });

                                    swal.fire('Error!', errorMessage, 'error');
                                } else if (xhr.status == 404) {
                                    swal.fire('Error!', 'The requested resource was not found.',
                                        'error');
                                } else if (xhr.status == 500) {
                                    swal.fire('Error!',
                                        'Internal server error. Please try again later.',
                                        'error');
                                } else {
                                    swal.fire('Error!',
                                        'hhhh An error occurred. Please try again later.',
                                        'error');
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

                    let pbranch = $('select[name="selectBranch"]').val();
                    if (pbranch == '' || pbranch == 'Select') {
                        isValid = false;

                        $('#branchError').text('Please select a branch');
                        $('select[name="selectBranch"]').addClass('error');
                    }

                    // Validate Email Address
                    let email = $('input[name="email"]').val();
                    if (email === '') {
                        isValid = false;

                        $('#emailError').text('Email Address is required');
                        $('input[name="email"]').addClass('error');
                    }
                    // Validate post code
                    let post_code = $('input[name="post_code"]').val();
                    if (post_code === '') {
                        isValid = false;

                        $('#post_codeError').text('Post code  is required');
                        $('input[name="post_code"]').addClass('error');
                    }
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
                    // let document_type = $('input[name="document_type"]').val();
                    // if (document_type === '') {
                    //     isValid = false;

                    //     $('#document_typeError').text('document type  is required');
                    //     $('input[name="document_type"]').addClass('error');
                    // }
                    // Validate password
                    let password = $('input[name="password"]').val();
                    if (password === '') {
                        isValid = false;

                        $('#passwordError').text('Password  is required');
                        $('input[name="password"]').addClass('error');
                    }

                    return isValid;
                }

                function populateUsers() {
                    $.ajax({
                        url: '{{ route('getUsers') }}',
                        type: 'GET',
                        success: function(users) {
                            $('#patient_id').empty();
                            $('#patient_id').append('<option value=""> --Select-- </option>');
                            users.forEach(function(user) {
                                $('#patient_id').append('<option value="' + user.id + '">' + user
                                    .name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching users:', error);
                        }
                    });
                }

            });
        </script>
        <script>
            $(document).ready(function() {
                $('#patientDetail_box').hide();
                $('#addNew_patientBtn').click(function() {
                    $('#patientDetail_box').show();
                    $('#appoinment_book_bx').hide();

                    var closeButton = document.getElementById('closebtn');
                    // Find the save button by ID
                    var saveButton = document.getElementById('btn-save-event');

                    // Hide the close button
                    if (closeButton) {
                        closeButton.style.display = 'none';
                    }

                    // Hide the save button
                    if (saveButton) {
                        saveButton.style.display = 'none';
                    }

                });
                $('#backToAppointment').click(function() {
                    $('#patientDetail_box').hide();
                    $('#appoinment_book_bx').show();


                    var closeButton = document.getElementById('closebtn');
                    // Find the save button by ID
                    var saveButton = document.getElementById('btn-save-event');

                    // Show the close button if it exists
                    if (closeButton) {
                        closeButton.style.display = 'block'; // Set display to 'block' to show the button
                    }

                    // Show the save button if it exists
                    if (saveButton) {
                        saveButton.style.display = 'block'; // Set display to 'block' to show the button
                    }


                });
                //  Set up or edit your appointments and services

                $('.ServicesProduct').click(function() {


                });

            })
        </script>


        <!-- Set up or edit your appointments and services -->
        <script>
            $(document).ready(function() {
                $('#ServicesProductForm').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateServicesProductForm();
                    let searchInput = null;

                    if (isValid) {
                        let formData = new FormData(this);

                        $.ajax({
                            url: '{{ route('addNewTest') }}',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,

                            success: function(result) {
                                $('#ServicesProductForm')[0].reset();


                                if (result.message) {
                                    swal.fire(
                                        'Success',
                                        'Products and Services added successfully!',
                                        'success'
                                    );
                                    window.location.reload();
                                    populateServices();
                                }
                            },
                            error: function(xhr, status, error) {

                                if (xhr.status == 422) {

                                    var errors = JSON.parse(xhr.responseText);
                                    console.log('validation-error', errors);
                                    var errorMessage = 'Validation error(s):<br>';

                                    $.each(errors.error, function(key, value) {
                                        errorMessage += value + '<br>';
                                    });

                                    swal.fire('Error!', errorMessage, 'error');
                                } else if (xhr.status == 404) {
                                    swal.fire('Error!', 'The requested resource was not found.',
                                        'error');
                                } else if (xhr.status == 500) {
                                    swal.fire('Error!',
                                        'Internal server error. Please try again later.',
                                        'error');
                                } else {
                                    swal.fire('Error!',
                                        'hhhh An error occurred. Please try again later.',
                                        'error');
                                }
                            }




                        });
                    }
                });


                function validateServicesProductForm() {
                    let isValid = true;

                    // Validate test_name
                    let test_name = $('input[name="test_name"]').val();
                    if (test_name === '') {

                        isValid = false;

                        $('#test_nameError').text('Please enter test name');
                        $('input[name="test_name"]').addClass('error');
                    }

                    // Validate price
                    let price = $('input[name="price"]').val();
                    if (price === '') {
                        isValid = false;

                        $('#priceError').text('Test code is required');
                        $('input[name="price"]').addClass('error');
                    }

                    

                    return isValid;
                }

                function populateServices() {

                    $.ajax({
                        url: '{{ route('getServices') }}',
                        type: 'GET',
                        success: function(services) {
                            $('#serviceList').empty();
                            services.forEach(function(service) {
                                let priceType=service.price_type;
                                let notes = service.note;
                                if(service.note == null){
                                    notes = '-';
                                }

                                let serviceBox = `
                        <div class="service_box_appoin">
                            <p><span class="bx_color_ghi" style="background: ${service.colour_type};"></span>
                            <span>${service.test_name}</span></p>
                            <span><b>Note :</b> ${notes}</span>
                            <span><b>Type :</b>${priceType}</span>
                            <span><b>Price :</b>${service.price}</span>
                           
                        </div>
                    `;
                                $('#serviceList').append(serviceBox);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching services:', error);
                        }
                    });
                }

                $('.ServicesProduct').click(function(e) {

                    populateServices();
                });

            });
        </script>

        <!-- Set up or edit Location -->
        <script>
            $(document).ready(function() {
                let isUpdateMode = false;
                let updateLocationId = null;

                $('#setUpLocationForm_').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateLocationForm();

                    if (isValid) {

                        let formData = new FormData(this);

                        $.ajax({
                            url: '{{ route('setLocations') }}',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,

                            success: function(result) {
                                $('#setUpLocationForm_')[0].reset();


                                if (result.message) {
                                    // Display success message using SweetAlert
                                    swal.fire({
                                        title: 'Success',
                                        text: result.message,
                                        icon: 'success',
                                        showConfirmButton: false, // Hide the "OK" button
                                        timer: 2000 // Automatically close after 2000 milliseconds (2 seconds)
                                    });

                                    // Optionally hide other elements or perform additional actions
                                    $('#locationNew_box').hide();
                                    clearForm();
                                    populateLocations();
                                    // $('#setLocation').hide();

                                    // Reload the page after a delay (if needed)
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 2000); // Reload after 2 seconds (matching the timer above)
                                }

                            },
                            error: function(xhr, status, error) {

                                if (xhr.status == 422) {

                                    var errors = JSON.parse(xhr.responseText);
                                    console.log('validation-error', errors);
                                    var errorMessage = 'Validation error(s):<br>';

                                    $.each(errors.error, function(key, value) {
                                        errorMessage += value + '<br>';
                                    });

                                    swal.fire('Error!', errorMessage, 'error');
                                } else if (xhr.status == 404) {
                                    swal.fire('Error!', 'The requested resource was not found.',
                                        'error');
                                } else if (xhr.status == 500) {
                                    swal.fire('Error!',
                                        'Internal server error. Please try again later.',
                                        'error');
                                } else {
                                    swal.fire('Error!',
                                        'hhhh An error occurred. Please try again later.',
                                        'error');
                                }
                            }
                        });
                    }
                });


                function validateLocationForm() {
                    let isValid = true;

                    // Validate location_name
                    let location_name = $('input[name="location_name"]').val();
                    if (location_name === '') {

                        isValid = false;

                        $('#location_nameError').text('Please enter location name');
                        $('input[name="location_name"]').addClass('error');
                    }
                    // // Validate appointment
                    let appointment = $('select[name="appointment"]').val();
                    if (appointment === '' || appointment === 'Select') {
                        isValid = false;

                        $('#appointmentError').text('Please select Appointment Type');
                        $('select[name="appointment"]').addClass('error');
                    }

                    return isValid;
                }

                function populateLocations() {
                    $.ajax({
                        url: '{{ route('getLocations') }}',
                        type: 'GET',
                        success: function(locations) {
                            $('#setlocation_data_id').empty();
                            $('#setlocation_data_id').append(
                                '<option value=""> --Select Any One-- </option>');
                            locations.forEach(function(location) {
                                $('#setlocation_data_id').append('<option value="' + location.id +
                                    '">' + location
                                    .branch_name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching users:', error);
                        }
                    });
                }
                $('.setLocationId').click(function(e) {

                    populateLocations();
                });


                $('#setlocation_data_id').change(function() {
                    let location_id;
                    let selectedLocation = $(this).val();
                    if (selectedLocation !== '') {
                        $.ajax({
                            url: '{{ route('getLocationDetails') }}',
                            type: 'GET',
                            data: {
                                location_id: selectedLocation
                            },
                            success: function(response) {
                                var locationName = response.branch_name;
                                var geographicLocation = response.phone_no;
                                var appointment = response.appointmentType;
                                var postalAddress = response.address;
                                clearForm();

                                setUpdateMode(selectedLocation, locationName, geographicLocation,
                                    appointment, postalAddress);
                                $('#locationNew_box').show();
                            },
                            error: function(xhr, status, error) {
                                console.error('Error fetching users:', error);
                            }
                        });
                    }
                });



                function setUpdateMode(locationId, locationName, geographicLocation, appointment, postalAddress) {


                    $('#location_update').val(locationId);
                    $('#location_name').val(locationName);
                    $('#geographicLocation').val(geographicLocation);
                    $('#appointment').val(appointment).trigger('change');
                    $('#postalAddress').val(postalAddress);


                }


                function clearForm() {
                    $('[id$="Error"], .Error').remove();
                    $('#location_update').val('');
                    $('#location_name').val('');
                    $('#geographicLocation').val('');
                    $('#appointment').val('');
                    $('#postalAddress').val('');
                }





            });
        </script>


        <!-- Set up  Appontment Availability -->
        <script>
            $(document).ready(function() {

                $('#setUpLocationForm').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateLocationForm();

                    if (isValid) {

                        let formData = new FormData(this);

                        $.ajax({
                            url: '{{ route('setLocations') }}',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,

                            success: function(result) {
                                $('#setUpLocationForm')[0].reset();


                                if (result.message) {
                                    swal.fire(
                                        'Success',
                                        result.message,
                                        'success'
                                    );
                                    $('#locationNew_box').hide();
                                    clearForm();
                                    populateLocations();

                                }
                            },
                            error: function(xhr, status, error) {

                                if (xhr.status == 422) {

                                    var errors = JSON.parse(xhr.responseText);
                                    console.log('validation-error', errors);
                                    var errorMessage = 'Validation error(s):<br>';

                                    $.each(errors.error, function(key, value) {
                                        errorMessage += value + '<br>';
                                    });

                                    swal.fire('Error!', errorMessage, 'error');
                                } else if (xhr.status == 404) {
                                    swal.fire('Error!', 'The requested resource was not found.',
                                        'error');
                                } else if (xhr.status == 500) {
                                    swal.fire('Error!',
                                        'Internal server error. Please try again later.',
                                        'error');
                                } else {
                                    swal.fire('Error!',
                                        'hhhh An error occurred. Please try again later.',
                                        'error');
                                }
                            }




                        });
                    }
                });


                function validateLocationForm() {
                    let isValid = true;

                    // Validate location_name
                    let location_name = $('input[name="location_name"]').val();
                    if (location_name === '') {

                        isValid = false;

                        $('#location_nameError').text('Please enter location name');
                        $('input[name="location_name"]').addClass('error');
                    }
                    // // Validate appointment
                    let appointment = $('select[name="appointment"]').val();
                    if (appointment === '' || appointment === 'Select') {
                        isValid = false;

                        $('#appointmentError').text('Please select Appointment Type');
                        $('select[name="appointment"]').addClass('error');
                    }

                    return isValid;
                }

                $('#pills-profile-tab').click(function(e) {

                    populateDoctors();
                    populateLocations();
                });

                function populateDoctors() {
                    $.ajax({
                        url: '{{ route('getdoctors') }}',
                        type: 'GET',
                        success: function(doctors) {
                            $('#setdoctor_id').empty();
                            $('#setdoctor_id').append('<option value=""> --Select Any One-- </option>');
                            doctors.forEach(function(doctor) {
                                $('#setdoctor_id').append('<option value="' + doctor.id + '">' +
                                    doctor
                                    .name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching users:', error);
                        }
                    });
                }

                function populateLocations() {
                    $.ajax({
                        url: '{{ route('getLocations') }}',
                        type: 'GET',
                        success: function(locations) {
                            $('#setlocation_data_id').empty();
                            $('#setlocation_data_id').append(
                                '<option value=""> --Select Any One-- </option>');
                            locations.forEach(function(location) {
                                $('#setlocation_data_id').append('<option value="' + location.id +
                                    '">' + location
                                    .name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching users:', error);
                        }
                    });
                }
            });
        </script>


        @if ($countData)
            <script>
                $(document).ready(function() {
                    $('#Availablity').modal('show');
                });
            </script>
        @endif


        @if ($matchingAppointments)
            <script>
                $(document).ready(function() {
                    $('#SearchPatient').modal('show');
                });
            </script>
        @endif


        <script>
            function createApr() {

                var deleteEvent = document.getElementById('btn-delete-event');
                // Hide the close button
                if (deleteEvent) {
                    deleteEvent.style.display = 'none';
                }
                $('#event-modal').modal('show');
            };
        </script>
    @endpush


@endsection

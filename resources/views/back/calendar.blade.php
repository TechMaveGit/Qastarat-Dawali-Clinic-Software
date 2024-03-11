@extends('back.layout.main_view')
@push('title')
Calender | QASTARAT & DAWALI CLINICS
@endpush
@section('content-section')
@push('custom-css')
	{{-- add here --}}
@endpush

<style>
    #calendar .btn {
    padding: 5px 10px;
    font-size: 14px;
    background: #214874;
}
</style>


<div class="sub_bnr patient_recordsbanner" style="background-image: url({{ asset('public/assets/images/hero-15.jpg') }});">
   <div class="sub_bnr_cnt">
      <h1>Calendar <span class="blue_theme"> </span> </h1>
      <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Calendar</li>
         </ol>
      </nav>
      <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-toggle="modal" data-bs-target="#add_patient">+ Add New Patient </a>
         -->
   </div>
</div>







<div class="appoinmentcalendar_area">
    <div class="container">
        
    <div class="row mb-4">
                            <div class="col-xl-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                    
            
                                        <div id="external-events">
                                            <!-- <br>
                                            <p class="text-muted">Drag and drop your event or click in the calendar</p> -->
                                            <!-- <div class="external-event fc-event bg-success" data-class="bg-success">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>New Event
                                                Planning
                                            </div>
                                            <div class="external-event fc-event bg-info" data-class="bg-info">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Meeting
                                            </div>
                                            <div class="external-event fc-event bg-warning" data-class="bg-warning">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Generating
                                                Reports
                                            </div>
                                            <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Create
                                                New theme
                                            </div> -->
                                        </div>

                                        <div class="opencalendar_box">
                                            <!-- Container for the calendar -->
                                          <div id="calendarContainer"></div>
                                        </div>

                                        <div class="Clinicians_boxflt">
                                            <div class="fltr_eventhead">
                                            <h2>Clinicians</h2>
                                            <span>Clear Filters</span>
                                            </div>
                                            <div class="clinician_common_listbox clinic_listactive">
                                            <ul>
                                                <li class="activefltr"><a href="##">Testing</a></li>
                                                <li><a href="##">Demo</a></li>
                                                <li><a href="##">Rohit</a></li>
                                            </ul>
                                            </div>
                                        </div>

                                        <div class="Clinicians_boxflt">
                                            <div class="fltr_eventhead">
                                            <h2>Appointment Types</h2>
                                            </div>
                                            <div class="clinician_common_listbox ">
                                            <ul>
                                                <li><a href="##">CONSULTATION/Interventional... </a></li>
                                                <li><a href="##">CT / Fluro Guided joint / facet RFA... </a></li>
                                                <li><a href="##">Follow up appointment</a></li>
                                                <li><a href="##">Follow up appointment</a></li>
                                                <li><a href="##">Follow up appointment</a></li>
                                                <li><a href="##">Follow up appointment</a></li>
                                            </ul>
                                            </div>
                                        </div>

                                        <div class="Clinicians_boxflt">
                                            <div class="fltr_eventhead">
                                            <h2>Location</h2>
                                            </div>
                                            <div class="clinician_common_listbox Location_flt">
                                            <ul>
                                                <li><a href="##"> <iconify-icon icon="simple-line-icons:location-pin"></iconify-icon>Clinic</a></li>
                                                <li><a href="##"> <iconify-icon icon="simple-line-icons:location-pin"></iconify-icon>Dubai</a></li>
                                                <li><a href="##"><iconify-icon icon="simple-line-icons:location-pin"></iconify-icon> India</a></li>
                                            </ul>
                                            </div>
                                        </div>


                                        
                                    </div>
                                </div>
                            </div> <!-- end col-->
                            <div class="col-xl-9">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row-->
                        <div style='clear:both'></div>
    </div>
</div>

<!-- Add New Event MODAL -->
<div class="modal fade" id="event-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header py-3 px-4">
                                        <h5 class="modal-title" id="modal-title">Event</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
            
                                    <div class="modal-body p-4">
                                        <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                            <div class="row">
                                                <!-- <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Event Name</label>
                                                        <input class="form-control" placeholder="Insert Event Name" type="text"
                                                            name="title" id="event-title" required value="">
                                                        <div class="invalid-feedback">Please provide a valid event name
                                                        </div>
                                                    </div>
                                                </div>  -->
                                            
                                                <div class="col-lg-12">
                                                    <div class="row appointment_book">
                                                        <h6 class="book_appin_title">Book Appointment</h6>
                                                        <div class="col-12 mb-3">
                                                 
                                                        <label class="form-label">Priority</label>
                                                        <select class="form-control select2_appointment" name="category" id="event-category">
                                                            <option  selected> --Select-- </option>
                                                            <option value="bg-danger">High</option>
                                                            <option value="bg-success">Medium</option>
                                                            <option value="bg-primary">Low</option>
                                                            <!-- <option value="bg-info">Info</option>
                                                            <option value="bg-dark">Dark</option>
                                                            <option value="bg-warning">Warning</option> -->
                                                        </select>
                                                        <!-- <div class="invalid-feedback">Please select a valid event
                                                            category</div> -->
                                                  
                                                </div>
                                                        <div class="col-lg-6">
                                                        <div class="inner_element">
                                                                <div class="form-group">
                                                                <input class="form-control" placeholder="Appointment Type" type="text"
                                                                    name="title" id="event-title" required value="">
                                                                <div class="invalid-feedback">Please provide a valid Appointment Type
                                                                </div>
                                                                    <!-- <select class="form-control select2_appointment" id="event-category">
                                                                        <option value="">Appointment Type</option>
                                                                        <option value="">CONSULTATION/Interventional Radiology   استشارة أشعة تداخلية</option>
                                                                        <option value="">CT / Fluro Guided joint / facet RFA (Radio-Frequency) ablation علاج ألم المفاصل بالتردد الحراري بتوجية الأشعة</option>
                                                                        <option value="">Follow up appointment</option>
                                                                        <option value="">Hemorrhoids Embolization</option>
                                                                        <option value="">Image guided MSK inflammation / pain injection - PRP حقن إالتهاب/ألم المفاصل بتوجية الأشعة-بلازما QASTARAT & DAWALI CLINICS</option>
                                                                        <option value="">Image guided MSK / pain injection - HA حقن إالتهاب/ألم المفاصل بتوجية الأشعة-حقن زيتية</option>
                                                                        <option value="">Image (Ultrasound) guided Occipital Headache nerve block</option>
                                                                        <option value="">INTRAVENOUS VITAMIN THERAPY</option>
                                                                        <option value="">IV DRIP ASCORBIC ACID  (Essential dose) فيتامين سي الجرعه الأساسية</option>
                                                                        <option value="">IV DRIP DETOX MASTER (ESSENTIAL DOSE)مزيل السميات (الجرعة الأساسية)</option>
                                                                        <option value="">IV DRIP ENERGY BOOSTER  (ESSENTIAL DOSE)  معزز الطاقة الجرعة الأساسية</option>
                                                                        <option value="">IV DRIP FAT BURNER   (ESSENTIAL DOSE)  مسرعات حرق الدهون (الجرعة الأساسية)</option>
                                                                        <option value="">IV VITAMINE- WOMEN SPECIFICIMMUNITY BOOSTER WITH VITAMIN C</option>
                                                                        <option value="">IV VITAMINE- WOMEN SPECIFIC- IRON BOOSTER - ANTI HAIR LOSS COMBINATION </option>
                                                                        <option value="">IV Vitamin - Multivatamins w/ Iron</option>
                                                                        <option value="">PIRIFORMIS MUSCLE INJECTION</option>
                                                                        <option value="">PRESSURE STOCKING</option>
                                                                        <option value="">SPERM DNA FRAGMENTATION</option>
                                                                        <option value="">Spider / Reticular Veins Sclerotherapy</option>
                                                                        <option value="">Ultrasound doppler of VENOUS MAPPING</option>
                                                                        <option value="">Ultrasound/General</option>
                                                                        <option value="">Ultrasound NERVE MAPPING </option>
                                                                        <option value="">Varicocele Embolization - قسطرة دوالي الخصية-</option>

                                                                    </select> -->
                                                                </div>
                                                        </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                        <div class="inner_element">
                                                                <div class="form-group">
                                                                <!-- <input class="form-control" placeholder="Location" type="text"
                                                                    name="title"  required value="">
                                                                <div class="invalid-feedback">Please provide a valid Location
                                                                </div> -->
                                                                    <select class="form-control select2_appointment">
                                                                        <option value="">Location</option>
                                                                        <option value="">CLINIC</option>
                                                                        <option value="">DUBAI</option>
                                                                        <option value="">QASTARAT & DAWALI CLINICS</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                                <div class="inner_element">
                                                                    <div class="form-group">
                                                                        
                                                                        <input type="text" class="form-control datepickerInput" placeholder="17 Nov,2023">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="inner_element">
                                                                    <div class="form-group">
                                                                        
                                                                        <input type="text" class="form-control timepicker-custom" placeholder="12:00">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="inner_element">
                                                                    <div class="form-group">
                                                                        
                                                                        <input type="text" class="form-control datepickerInput" placeholder="17 Nov,2023">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="inner_element">
                                                                    <div class="form-group">
                                                                        
                                                                        <input type="text" class="form-control timepicker-custom" placeholder="12:00">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="inner_element">
                                                                    <div class="form-group">
                                                                        
                                                                        <input type="text" class="form-control" placeholder="Cost">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="inner_element">
                                                                    <div class="form-group">
                                                                        
                                                                        <input type="text" class="form-control" placeholder="Code">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                            <div class="inner_element">
                                                                <div class="form-group">
                                                                    <select class="form-control select2_appointment">
                                                                        <option value="">Select Clinician</option>
                                                                        <option value="">SAIF ALZAABI</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                                                <label class="form-check-label" for="flexCheckChecked">
                                                                Send appointment confirmation immediately
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                            </div> 
                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <button type="button" class="btn btn_calender_cus btn-danger"
                                                        id="btn-delete-event">Delete</button>
                                                </div>
                                                <div class="col-6 text-end d-flex">
                                                    <button type="button" class="btn btn_calender_cus btn-light me-1"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn_calender_cus btn-success" id="btn-save-event">Book</button>
                                                </div> 
                                            </div> 
                                        </form>
                                    </div>
                                </div>
                               
                            </div>
                           
                        </div>
<!-- end modal-->
                       

@push('custom-js')


 <link rel="stylesheet" href="{{ url('public/assets') }}/libs/fullcalendar/core/main.min.css" type="text/css">
 <link rel="stylesheet" href="{{ url('public/assets') }}/libs/fullcalendar/daygrid/main.min.css" type="text/css">
 <link rel="stylesheet" href="{{ url('public/assets') }}/libs/fullcalendar/bootstrap/main.min.css" type="text/css">
 <link rel="stylesheet" href="{{ url('public/assets') }}/libs/fullcalendar/timegrid/main.min.css" type="text/css">

  <script src="{{ url('public/assets') }}/libs/moment/min/moment.min.js"></script>
 <script src="{{ url('public/assets') }}/libs/jquery-ui-dist/jquery-ui.min.js"></script>
 <script src="{{ url('public/assets') }}/libs/fullcalendar/core/main.min.js"></script>
 <script src="{{ url('public/assets') }}/libs/fullcalendar/bootstrap/main.min.js"></script>
 <script src="{{ url('public/assets') }}/libs/fullcalendar/daygrid/main.min.js"></script>
 <script src="{{ url('public/assets') }}/libs/fullcalendar/timegrid/main.min.js"></script>
 <script src="{{ url('public/assets') }}/libs/fullcalendar/interaction/main.min.js"></script>
 
 <script src="{{ url('public/assets') }}/js/calendar.init.js"></script>
 <script src="{{ url('public/assets') }}/js/app.js"></script>

 <script>
     document.addEventListener('DOMContentLoaded', function () {
   // Get all list items
   var listItems = document.querySelectorAll('.clinic_listactive li');

   // Add click event listener to each list item
   listItems.forEach(function (item) {
     item.addEventListener('click', function () {
       // Remove the "active" class from all list items
       listItems.forEach(function (li) {
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
   document.addEventListener('DOMContentLoaded', function () {
     flatpickr("#calendarContainer", {
       inline: true, // Display the calendar inline
       dateFormat: "Y-m-d", // Customize date format
       defaultDate: "today", // Set the default date
       // Add more options as needed
     });
   });
 </script>
@endpush

@endsection
@extends('back.layout.main_view')

@push('title')

profile  | QASTARAT & DAWALI CLINICS 

@endpush

@section('content-section')

@push('custom-css')

	{{-- add here --}}

@endpush
<div class="sub_bnr_img" style="background-image: url({{ asset('assets/public/images/hero-15.jpg') }});">
    <div class="sub_bnr ">
        <h1 class="dashboard_title">Profile  <span class="blue_theme">Details</span> </h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Details</li>
         </ol>
      </nav>
      <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-toggle="modal" data-bs-target="#add_patient">+ Add New Patient </a>
    </div>
</div>
<!-- <div class="sub_bnr_img" style="background-image: url(images/hero-15.jpg);">
<div class="sub_bnr_cnt">
        <h1>Patient <span class="blue_theme"> Details</span> </h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Patient Details</li>
            </ol>
        </nav>
        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-toggle="modal" data-bs-target="#add_patient">+ Add New Patient </a>
    </div>

</div> -->


<div class="patient-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="left_side">
                    <div class="profile_action">
                        <div class="left_side_pr_icon">
                        <a href="{{ route('user.patient') }}" class="action_btn_tooltip">
                            <iconify-icon icon="ph:folder-duotone"></iconify-icon>
                            <span class="toolTip">View Medical Record</span>
                        </a>
                        <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#edit_patient">
                            <iconify-icon icon="material-symbols:edit"></iconify-icon>
                            <span class="toolTip">Edit Patient Info.</span>
                        </a>
                        <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#create_appointment">
                            <iconify-icon icon="formkit:date"></iconify-icon>
                            <span class="toolTip">Make an Appointment</span>
                        </a>
                        <!-- <a href="#" class="action_btn_tooltip">
                            <iconify-icon icon="ph:envelope-open-light" data-bs-toggle="modal" data-bs-target="#send_message"></iconify-icon>
                            <span class="toolTip">Send a Message</span>
                        </a> -->
                        <a href="{{ route('user.patient') }}" class="action_btn_tooltip">
                            <iconify-icon icon="iconamoon:search-light"></iconify-icon>
                            <span class="toolTip">Find Another Patient</span>
                        </a>
                        </div>
                        <div class="right_side_pr_icon">
                            <a href="#" class="action_btn_tooltip">
                                <iconify-icon icon="material-symbols:delete-outline"></iconify-icon>
                                <!-- <span class="toolTip">Find Another Patient</span> -->
                            </a>
                        </div>
                    </div>

                    <div class="profile_img">
                        <img src="images/team-1.jpg" alt="">

                        <div class="patient_dt_profile">
                            <h5 class="patient_name__">MOHAMMED ALI  AL BADI </h5>
                            <p class="patient_age__">87 Years , <span class="patient_id__">MA760607</span></p>
                        </div>
                    </div>

                    <div class="patient_dt_line">
                        <ul>
                            <li>
                                <div class="title___">
                                  <h6>Date of Birth</h6>
                                </div>
                                <div class="data_pt">
                                 <h6>01.01.1111</h6>
                                </div>
                            </li>
                            <li>
                                <div class="title___">
                                  <h6>Gender</h6>
                                </div>
                                <div class="data_pt">
                                 <h6>Male</h6>
                                </div>
                            </li>
                            <li>
                                <div class="title___">
                                  <h6>Email Address</h6>
                                </div>
                                <div class="data_pt">
                                 <h6>medicallazer@gmail.com</h6>
                                </div>
                            </li>
                            <li>
                                <div class="title___">
                                  <h6>Mobile Phone</h6>
                                </div>
                                <div class="data_pt">
                                 <h6>92110703</h6>
                                </div>
                            </li>
                            <li>
                                <div class="title___">
                                  <h6>Landline</h6>
                                </div>
                                <div class="data_pt">
                                 <h6>----</h6>
                                </div>
                            </li>
                            <li>
                                <div class="title___">
                                  <h6>Street Address</h6>
                                </div>
                                <div class="data_pt">
                                 <h6>----</h6>
                                </div>
                            </li>
                            <li>
                                <div class="title___">
                                  <h6>City/Town</h6>
                                </div>
                                <div class="data_pt">
                                 <h6>----</h6>
                                </div>
                            </li>
                            <li>
                                <div class="title___">
                                  <h6>County/State</h6>
                                </div>
                                <div class="data_pt">
                                 <h6>----</h6>
                                </div>
                            </li>
                            <li>
                                <div class="title___">
                                  <h6>Post Code</h6>
                                </div>
                                <div class="data_pt">
                                 <h6>----</h6>
                                </div>
                            </li>
                            <li>
                                <div class="title___">
                                  <h6>Country</h6>
                                </div>
                                <div class="data_pt">
                                 <h6>----</h6>
                                </div>
                            </li>
                            <li>
                                <div class="title___">
                                  <h6>Next of Kin</h6>
                                </div>
                                <div class="data_pt">
                                 <h6>----</h6>
                                </div>
                            </li>
                            <li>
                                <div class="title___">
                                  <h6>Insurer</h6>
                                </div>
                                <div class="data_pt">
                                 <h6>----</h6>
                                </div>
                            </li>
                            <li>
                                <div class="title___">
                                  <h6>Policy No</h6>
                                </div>
                                <div class="data_pt">
                                 <h6>----</h6>
                                </div>
                            </li>
                            <li>
                                <div class="title___">
                                  <h6>GP</h6>
                                </div>
                                <div class="data_pt">
                                 <h6>----</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="appointments___list">
                    <h3 class="sub_title__">Appointments</h3>
                    <ul>
                        <li>
                            <div class="appoin_title">
                               <h6>Piriformis Muscle Injection</h6> 
                            </div>
                            <div class="appoin_date">
                                <p>Sun, 22 October 2023 <span class="appoin_time">10:00</span></p>
                            </div>
                        </li>

                        <li>
                            <div class="appoin_title">
                               <h6>Follow up appointment</h6> 
                            </div>
                            <div class="appoin_date">
                                <p>Sat, 21 October 2023 <span class="appoin_time">13:43</span></p>
                            </div>
                        </li>

                        <li>
                            <div class="appoin_title">
                               <h6>Medical Lazer Kit</h6> 
                            </div>
                            <div class="appoin_date">
                                <p>Mon, 27 March 2023 <span class="appoin_time">10:30</span></p>
                            </div>
                        </li>
                        <li>
                            <div class="appoin_title">
                               <h6>Medical Lazer Kit</h6> 
                            </div>
                            <div class="appoin_date">
                                <p>Mon, 13 March 2023 <span class="appoin_time">10:30</span></p>
                            </div>
                        </li>
                        <li>
                            <div class="appoin_title">
                               <h6>Medical Lazer Kit</h6> 
                            </div>
                            <div class="appoin_date">
                                <p>Mon, 10 March 2023 <span class="appoin_time">10:30</span></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
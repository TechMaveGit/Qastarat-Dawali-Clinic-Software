@extends('front.layout.main_view')

@push('title')
    Home | QASTARAT & DAWALI CLINICS
@endpush

@section('content-section')


<div class="sub_bnr"
    style="background-image: url({{ asset('public/assets/images/hero-15.jpg') }});">

    <div class="sub_bnr_cnt">

        <h1>Patient <span class="blue_theme"> Details</span> </h1>

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{ route('patient.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('patient.dashboard') }}">Patient</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Patient Details</li>

            </ol>

        </nav>



    </div>



</div>





<div class="patient-detail">

    <div class="container">

        <div class="row">

            <div class="col-lg-5">

                <div class="left_side">

                    <div class="profile_action">

                        <div class="left_side_pr_icon">
                            {{-- 
                                    <a href="{{ route('user.patient_medical_detail', ['id' => encrypt(@$id)]) }}"
                            class="action_btn_tooltip">

                            <iconify-icon icon="ph:folder-duotone"></iconify-icon>

                            <span class="toolTip">View Medical Record</span>

                            </a> --}}

                            {{-- <a href="#" class="action_btn_tooltip patient_edit" data-bs-toggle="modal"
                                data-bs-target="#edit_patient">

                                <iconify-icon icon="material-symbols:edit"></iconify-icon>

                                <span class="toolTip">Edit Patient Info.</span>

                            </a> --}}

                            {{-- <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#create_appointment">

                            <iconify-icon icon="formkit:date"></iconify-icon>

                            <span class="toolTip">Make an Appointment</span>

                        </a> --}}

                            <!-- <a href="#" class="action_btn_tooltip">

                            <iconify-icon icon="ph:envelope-open-light" data-bs-toggle="modal" data-bs-target="#send_message"></iconify-icon>

                            <span class="toolTip">Send a Message</span>

                        </a> -->

                            {{-- <a href="{{ route('user.patient') }}"
                            class="action_btn_tooltip">

                            <iconify-icon icon="iconamoon:search-light"></iconify-icon>

                            <span class="toolTip">Find Another Patient</span>

                            </a> --}}

                        </div>

                        {{-- <div class="right_side_pr_icon">

                                    <a href="#" class="action_btn_tooltip"
                                        onclick="removePatient({{ encrypt(@$id) }})">

                        <iconify-icon icon="material-symbols:delete-outline"></iconify-icon>

                        <!-- <span class="toolTip">Find Another Patient</span> -->

                        </a>

                    </div> --}}

                </div>

                <input type="hidden" name="patient_id" value="{{ encrypt(@$id) }}" />

                <div class="profile_img">



                    @isset($patient->patient_profile_img)
                        <img src="{{ asset('public/assets/patient_profile/' . $patient->patient_profile_img) }}"
                            alt="">
                    @else
                        <img src="{{ asset('public/assets/images/team-13.jpg') }}" alt="">
                    @endisset


                    <div class="patient_dt_profile">

                        <h5 class="patient_name__">
                            {{ $patient->sirname??'' . ' ' . $patient->name??'' }}
                        </h5>
                        @php
                            if (!empty($patient->birth_date)) {
                            $birthDate = \Carbon\Carbon::createFromFormat('d M, Y', $patient->birth_date);
                            $patientBirthDate = $birthDate->diffInYears(\Carbon\Carbon::now());
                            } else {
                            $patientBirthDate = null;
                            }
                        @endphp

                        <p class="patient_age__">{{ @$patientBirthDate }} Years , <span
                                class="patient_id__">{{ @$patient->patient_id }}</span></p>

                    </div>

                </div>



                <div class="patient_dt_line">

                    <ul>

                        <li>

                            <div class="title___">

                                <h6>Date of Birth</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_dob"> {{ @$patient->birth_date }}</h6>

                            </div>

                        </li>

                        <li>

                            <div class="title___">

                                <h6>Gender</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_gendar">{{ @$patient->gendar }}</h6>

                            </div>

                        </li>

                        <li>

                            <div class="title___">

                                <h6>Email Address</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_email">{{ @$patient->email }}</h6>

                            </div>

                        </li>

                        <li>

                            <div class="title___">

                                <h6>Mobile Phone</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_mobile">{{ @$patient->mobile_no }}</h6>

                            </div>

                        </li>

                        <li>

                            <div class="title___">

                                <h6>Landline</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_landline">{{ @$patient->landline }}</h6>

                            </div>

                        </li>

                        <li>

                            <div class="title___">

                                <h6>Street Address</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_street">{{ @$patient->street }}</h6>

                            </div>

                        </li>

                        <li>

                            <div class="title___">

                                <h6>City/Town</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_town">{{ @$patient->town }}</h6>

                            </div>

                        </li>

                        <li>

                            <div class="title___">

                                <h6>County/State</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_state">{{ @$patient->country }}</h6>

                            </div>

                        </li>

                        <li>

                            <div class="title___">

                                <h6>Post Code</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_post_code">{{ @$patient->post_code }}</h6>

                            </div>

                        </li>

                        <li>

                            <div class="title___">

                                <h6>Country</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_country">{{ @$patient->country }}</h6>

                            </div>

                        </li>

                        <li>

                            <div class="title___">

                                <h6>Next of Kin</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_kin">{{ @$patient->kin }}</h6>

                            </div>

                        </li>

                        <li>

                            <div class="title___">

                                <h6>Insurer</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_insurer">{{ @$Patient_insurer->insurer_name }}</h6>

                            </div>

                        </li>

                        <li>

                            <div class="title___">

                                <h6>Policy No</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_policy_no">{{ @$patient->policy_no }}</h6>

                            </div>

                        </li>

                        <li>

                            <div class="title___">

                                <h6>GP</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_gp">{{ @$patient->gp }}</h6>

                            </div>

                        </li>

                        <li>

                            <div class="title___">

                                <h6>Document Id
                                </h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_kin">{{ @$patient->document_type }}</h6>

                            </div>

                        </li>


                        <li>

                            <div class="title___">

                                <h6>Id Number </h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_kin">{{ @$patient->enterIdNumber }}</h6>

                            </div>

                        </li>


                        <li>

                            <div class="title___">

                                <h6>Referal Doctor</h6>

                            </div>

                            <div class="data_pt">

                                @forelse($doctorDetail as $alldoctorDetail)

                                    <h6 id="data_pt_kin">{{ $alldoctorDetail->name }} @if (!$loop->last) ,@endif</h6>

                                @empty

                                @endforelse
                            </div>

                        </li>



                        <li>

                            <div class="title___">

                                <h6>Assign Doctor</h6>

                            </div>

                            <div class="data_pt">

                                <h6 id="data_pt_kin">{{ $doctors->name??'' }} </h6>

                            </div>

                        </li>

                        <li>
                            <div class="detail_title">
                                <h6>Branch Name</h6>
                            </div>
                            <div class="detail_ans">
                                <span class="branchcls">
                                @forelse($patient->userBranch as $getbranchName)
                                        <h6 id="data_pt_kin">
                                            {{ $getbranchName->userBranchName->branch_name }}
                                            @if(!$loop->last)
                                                ,
                                            @endif
                                        </h6>
                                    @empty
                                        <!-- Optional: Handle the case where there are no branches -->
                                    @endforelse

                                </span>
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

                    @forelse($Patient_appointments as $Patient_appointment)

                        <li>

                            <div class="appoin_title">    

                            @php
                                              $doctorName=DB::table('doctors')->where('id',$Patient_appointment->doctor_id)->first();
                                            @endphp
                               
                                <h6>{{ $Patient_appointment->appointment_type }}</h6>
                                <p style="font-size: 15px;"> <span
                                        style="color: #082787; font-weight: bold;">{{ $doctorName->title??'' }}
                                       
                                    </span>  {{ $doctorName->name??'' }} -
                                    {{ $doctorName->email??'' }}</p>


                            </div>

                            <div class="appoin_date">
                                <h6 style="font-size: 12px;">Appointment Date</h6>

                                <p>{{ $Patient_appointment->start_date }} 
                                </p>


                            </div>

                        </li>

                    @empty
                        <li>
                            Not Found Any Appointments
                        </li>


                    @endforelse

                </ul>

            </div>

        </div>

    </div>

</div>

</div>







<!-- FOOTER-3

   ============================================= -->

<footer id="footer-3" class="pt-100 footer ft-3-ntr">

    <div class="container">

        @php
            $footer = DB::table('footers')->first();
        @endphp

        <!-- FOOTER CONTENT -->

        <div class="row">

            <!-- FOOTER LOGO -->

            <!-- FOOTER LOGO -->
            <div class="col-xl-4">
                <div class="footer-info mb-0">
                    @isset($footer->websitelogo)
                        <img class="footer-logo"
                            src="{{ asset('public/assets/video/'.$footer->websitelogo) }}"
                            alt="footer-logo">
                    @else
                        <img class="footer-logo"
                            src="{{ asset('public/assets/images/new-images/logofwhite.png') }}"
                            alt="footer-logo">
                    @endisset
                </div>
                <div class="contact_dt_ak">
                    <h6>Headquarter Location:</h6>
                    <p>{{ $footer->HeadquarterLocation ?? '' }}</p>
                    <h6>Mailing address:</h6>
                    <p>{{ $footer->Mailingaddress ?? '' }}</p>
                    <h6>International Call Center:</h6>
                    <p><a
                            href="tel:+{{ $footer->CallCenter ?? '' }}">+{{ $footer->CallCenter ?? '' }}</a>
                    </p>
                </div>
            </div>

            <!-- FOOTER LINKS -->
            <div class="col-sm-4 col-lg-4 col-xl-2">
                <div class="footer-links fl-1">

                    <!-- Title -->
                    <h6 class="s-17 w-700">Quick login</h6>
                    <ul class="foo-links clearfix">
                        <li>
                            <p><a href="index.php">Patient Login</a></p>
                        </li>
                        <li>
                            <p><a href="#">Staff Login</a></p>
                        </li>

                    </ul>
                    <h6 class="s-17 w-700 mt-3">Services</h6>
                    <!-- Links -->
                    <ul class="foo-links clearfix">
                        <li>
                            <p><a href="#">Women heal better</a></p>
                        </li>
                        <li>
                            <p><a href="#">Men heal better</a></p>
                        </li>
                        <li>
                            <p><a href="#">Women & Men heal better</a></p>
                        </li>
                        <li>
                            <p><a href="#">Regenerative therapies</a></p>
                        </li>
                    </ul>
                    <h6 class="s-17 w-700 mt-3">Legal</h6>
                    <ul class="foo-links clearfix">
                        <li>
                            <p><a href="{{ route('front.terms.page') }}">Terms of use</a></p>
                        </li>
                        <li>
                            <p><a href="{{ route('front.privacy.terms') }}">Privacy Policy</a></p>
                        </li>
                        <li>
                            <p><a href="{{ route('front.cookie.page') }}">Cookie Policy</a></p>
                        </li>

                    </ul>
                </div>
            </div> <!-- END FOOTER LINKS -->




            <!-- FOOTER LINKS -->
            <div class="col-sm-4 col-lg-4 col-xl-3">
                <div class="footer-links fl-3">

                    <!-- Title -->
                    <h6 class="s-17 w-700">Quick Connect</h6>

                    <!-- Links -->
                    <div class="coonect_box">
                        <div class="left_flag">
                            @isset($footer->logo1)
                                <img src="{{ asset('public/assets/video/'.$footer->logo1) }}"
                                    alt="">
                            @else
                                <img src="{{ asset('public/assets/images/new-images/Flag_of_Oman.svg.png') }}"
                                    alt="">
                            @endisset

                        </div>
                        <div class="contact_num">
                            <p><a href="https://wa.me/{{ $footer->logo1whatsapp ?? '' }}"><i
                                        class="fa-brands fa-whatsapp"></i>
                                    +{{ $footer->logo1whatsapp ?? '' }}</a></p>
                            <p><a href="tel:+{{ $footer->logo1phone ?? '' }}"><i
                                        class="fa-solid fa-phone"></i>
                                    +{{ $footer->logo1phone ?? '' }}</a></p>

                        </div>
                    </div>
                    <div class="coonect_box">
                        <div class="left_flag">
                            @isset($footer->logo2)
                                <img src="{{ asset('public/assets/video/'.$footer->logo2) }}"
                                    alt="">
                            @else
                                <img src="{{ asset('public/assets/images/new-images/Flag_of_the_United_Arab_Emirates.svg.png') }}"
                                    alt="">
                            @endisset

                        </div>
                        <div class="contact_num">
                            <p><a href="https://wa.me/{{ $footer->logo2whatsapp ?? '' }}"><i
                                        class="fa-brands fa-whatsapp"></i>
                                    +{{ $footer->logo2whatsapp ?? '' }}</a></p>
                            <p><a href="tel:+{{ $footer->logo2phone ?? '' }}"><i
                                        class="fa-solid fa-phone"></i>
                                    +{{ $footer->logo2phone ?? '' }}</a></p>

                        </div>
                    </div>
                    <div class="coonect_box">
                        <div class="left_flag">
                            @isset($footer->logo3)
                                <img src="{{ asset('public/assets/video/'.$footer->logo3) }}"
                                    alt="">
                            @else
                                <img src="{{ asset('public/assets/images/new-images/Flag_of_Saudi_Arabia.svg.png') }}"
                                    alt="">
                            @endisset

                        </div>
                        <div class="contact_num">
                            <p><a href="https://wa.me/{{ $footer->logo3whatsapp ?? '' }}"><i
                                        class="fa-brands fa-whatsapp"></i>
                                    +{{ $footer->logo3whatsapp ?? '' }}</a></p>
                            <p><a href="tel:+{{ $footer->logo3phone ?? '' }}"><i
                                        class="fa-solid fa-phone"></i>
                                    +{{ $footer->logo3phone ?? '' }}</a></p>

                        </div>
                    </div>
                    <div class="coonect_box">
                        <div class="left_flag">
                            @isset($footer->logo4)
                                <img src="{{ asset('public/assets/video/'.$footer->logo4) }}"
                                    alt="">
                            @else
                                <img src="{{ asset('public/assets/images/new-images/Flag_of_Bahrain-manama.png') }}"
                                    alt="">
                            @endisset

                        </div>
                        <div class="contact_num">
                            <p><a href="https://wa.me/{{ $footer->logo4whatsapp ?? '' }}"><i
                                        class="fa-brands fa-whatsapp"></i>
                                    +{{ $footer->logo4whatsapp ?? '' }}</a></p>
                            <p><a href="tel:+{{ $footer->logo4phone ?? '' }}"><i
                                        class="fa-solid fa-phone"></i>
                                    +{{ $footer->logo4phone ?? '' }}</a></p>

                        </div>
                    </div>
                    <!-- <ul class="foo-links clearfix address_ul">
						<li><i class="fa-solid fa-location-dot"></i>
							<p><a href="#">Main Branch Muscat - OMAN</a></p>
						</li>
						<li><i class="fa-solid fa-envelope"></i>
							<p><a href="mailto:admin@qastaratclinics.com">admin@qastaratclinics.com</a></p>
						</li>
						<li><i class="fa-solid fa-phone"></i>
							<p><a href="tel:+971581114000">+971581114000</a></p>
						</li>

					</ul> -->

                </div>
            </div> <!-- END FOOTER LINKS -->



            <!-- FOOTER NEWSLETTER FORM -->
            <div class="col-sm-10 col-md-8 col-lg-4 col-xl-3">
                <div class="footer-form">

                    <!-- Title -->
                    <h6 class="s-17 w-700">{{ $footer->text1 ?? '' }}</h6>

                    <!-- Newsletter Form Input -->
                    <form class="newsletter-form">

                        <div class="input-group r-06">
                            <input type="email" class="form-control" placeholder="Email Address" required id="s-email">
                            <span class="input-group-btn ico-15">
                                <button type="submit" class="btn color--theme">
                                    <span class="flaticon-right-arrow-1 submit_btn"></span>
                                </button>
                            </span>
                        </div>

                        <!-- Newsletter Form Notification -->
                        <label for="s-email" class="form-notification"></label>

                    </form>

                </div>
            </div> <!-- END FOOTER NEWSLETTER FORM -->


        </div> <!-- END FOOTER CONTENT -->

        <hr> <!-- FOOTER DIVIDER LINE -->

        <!-- BOTTOM FOOTER -->
        <div class="bottom-footer">
            <div class="row row-cols-1 row-cols-md-2 d-flex align-items-center">


                <!-- FOOTER COPYRIGHT -->
                <div class="col-lg-8">
                    <div class="footer-copyright">
                        <p class="p-sm">2023-24, All Right Reserved by Qastarat & Dawali Clinics - Developed by <a
                                href="https://techmavesoftware.com/">TechMave Software</a> .</p>
                    </div>
                </div>


                <!-- FOOTER SOCIALS -->
                <div class="col-lg-4">
                    <ul class="bottom-footer-socials ico-20 text-end">
                        <li><a href="#"><span class="fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa-brands fa-tiktok"></span></a></li>
                        <li><a href="#"><span class="fa-brands fa-snapchat"></span></a></li>
                        <li><a href="#"><span class="fa-brands fa-x-twitter"></span></a></li>
                        <li><a href="#"><span class="fa-brands fa-youtube"></span></a></li>

                    </ul>
                </div>

            </div> <!-- End row -->
        </div> <!-- END BOTTOM FOOTER -->

    </div> <!-- End container -->

</footer> <!-- END FOOTER-3 -->


</div> <!-- END PAGE CONTENT -->






<form id="patientForm" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade add_patient__" id="add_patient" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h1 class="modal-title" id="exampleModalLabel">Add A New Patient </h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>

                </div>

                <div class="modal-body body-patient">

                    <div class="inner_data pt-0">



                        <div class="basic_details_patient">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Basic Inf dashboard</h4>
                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Profile
                                                Image</label>

                                            <input type="file" class="form-control" id="" placeholder=" "
                                                name="profile_image" id="profile_image">
                                            <span id="profile_imageError" style="color: red;font-size:smaller"></span>
                                            <!-- @error('profile_image')
    <span class="alert alert-danger">{{ $message }}</span>
@enderror-->
                                            </div>


                                        </div>
  
                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label class="form-label">Title</label>

                                            <select class="form-control select2_modal" name="sirname">

                                                <option value="mr">Mr</option>

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
                                            <!-- @error('sirname')
    <span class="alert alert-danger">{{ $message }}</span>
@enderror-->

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Name</label>

                                            <input type="text" class="form-control" id=""
                                                placeholder=" " name="name">
                                            <span id="nameError" style="color: red;font-size:smaller"></span>
                                            <!-- @error('name')
    <span class="alert alert-danger">{{ $message }}</span>
@enderror-->
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-4">

                                            <label class="form-label">Date of Birth</label>

                                            <div class="input-group" id="datepicker1">

                                                <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                    data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                                                    data-provide="datepicker" name="birth_date">
                                                <span id="datepickerError"
                                                    style="color: red;font-size:smaller"></span>
                                                <!-- @error('birth_date')
    <span class="alert alert-danger">{{ $message }}</span>
@enderror-->
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label class="form-label">Gender</label>

                                            <select class="form-control select2_modal" name="gender">

                                                <option value="">Select</option>

                                                <option value="male">Male</option>

                                                <option value="female">Female</option>

                                            </select>

                                            <span id="genderError" style="color: red;font-size:smaller"></span>
                                            <!-- @error('gender')
    <span class="alert alert-danger">{{ $message }}</span>
@enderror-->
                                        </div>

                                    </div>

                                </div>

                            </div>



                            <div class="postalcode_patienadd">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="title_head">

                                            <h4>Postal Address</h4>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Post Code</label>

                                            <input type="text" class="form-control" id="" placeholder=""
                                                name="post_code">
                                            <span id="post_codeError" style="color: red;font-size:smaller"></span>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Street</label>

                                            <input type="text" class="form-control" id="" placeholder=""
                                                name="street">
                                            <span id="streetError" style="color: red;font-size:smaller"></span>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Town</label>

                                            <input type="text" class="form-control" id="" placeholder=""
                                                name="town">
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

                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>

                                                <option value="Argentina">Argentina</option>

                                                <option value="Armenia">Armenia</option>

                                                <option value="Aruba">Aruba</option>

                                            </select>
                                            <span id="countryError" style="color: red;font-size:smaller"></span>


                                        </div>

                                    </div>

                                </div>

                            </div>





                            <div class="phnemailadd_pat">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="title_head">

                                            <h4>Phone and Email</h4>

                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Email Address</label>

                                            <input type="text" class="form-control" id="" placeholder=""
                                                name="email">
                                            <span id="emailError" style="color: red;font-size:smaller"></span>
                                            <!-- @error('email')
    <span class="alert alert-danger">{{ $message }}</span>
@enderror-->
                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Mobile Phone</label>

                                            <input type="text" class="form-control" id="" placeholder=""
                                                name="mobile_no">
                                            <span id="mobile_noError" style="color: red;font-size:smaller"></span>
                                            <!-- @error('mobile_no')
    <span class="alert alert-danger">{{ $message }}</span>
@enderror-->
                                        </div>

                                    </div>


                                    <div class="col-lg-4">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Paswword</label>

                                            <input type="password" class="form-control" id=""
                                                placeholder="password" name="password">
                                            <span id="passwordError" style="color: red;font-size:smaller"></span>
                                        </div>

                                    </div>

                                </div>

                            </div>





                            <div class="documentsadd_pat">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="title_head">

                                            <h4>Document Type</h4>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <label for="validationCustom01" class="form-label">Select Document</label>

                                        <select class="form-control select2_modal" name="document_type">

                                            <option value="Passport">Passport</option>

                                            <option value="Address proof">Address proof</option>



                                        </select>
                                        <span id="document_typeError" style="color: red;font-size:smaller"></span>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Landline</label>

                                            <input type="text" class="form-control" id="" placeholder=""
                                                name="landline">
                                            <span id="landlineError" style="color: red;font-size:smaller"></span>
                                        </div>

                                    </div>



                                </div>

                            </div>







                        </div>



                        <div class="action text-end bottom_modal">

                            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                                <iconify-icon icon="bi:save"></iconify-icon> Save

                            </button>

                        </div>

                    </div>



                    <!-- <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <button type="button" class="btn btn-primary">Save changes</button>

                        </div> -->

                                        </div>

                                    </div>

                                </div>

</form>



<!-- Modal -->

<div class="modal fade edit_patient__" id="edit_patient" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Edit Patient Info.</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="edit_patient_info_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ encrypt(@$id) }}" />
                <div class="modal-body body-patient">

                    <div class="inner_data pt-0 edit_patient__cusr">



                        <div class="basic_details">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Basic Info</h4>



                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Profile
                                                Image</label>

                                            <input type="file" class="form-control" id="" placeholder=" "
                                                name="profile_image" id="profile_image">
                                            <span id="profile_imageError" style="color: red;font-size:smaller"></span>
                                            <!-- @error('profile_image')
    <span class="alert alert-danger">{{ $message }}</span>
@enderror-->
                                            </div>




                                        </div>



                                        <div class="row">

                                            <div class="col-lg-6">

                                                <div class="mb-3 form-group">

                                                    <label class="form-label">Title</label>

                                                    <select class="form-control select2_edit_info"
                                                        name="patient_sirname" id="patient_sirname">

                                                        <option value="mr">Mr</option>

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

                                                    <span id="patient_sirnameError" style="color: red;"></span>

                                                </div>

                                            </div>

                                            <div class="col-lg-6">

                                                <div class="mb-3 form-group">

                                                    <label for="validationCustom01" class="form-label">Name</label>

                                                    <input type="text" class="form-control" id="patient_name"
                                                        placeholder="" name="patient_name">
                                                    <span id="patient_nameError"
                                                        style="color: red;font-size:smaller"></span>

                                                </div>

                                            </div>

                                            <div class="col-lg-6">

                                                <div class="mb-4">

                                                    <label class="form-label">Date of Birth</label>

                                                    <div class="input-group" id="datepicker3">

                                                        <input type="text" class="form-control"
                                                            placeholder="dd M, yyyy" data-date-format="dd M, yyyy"
                                                            data-date-container='#datepicker3'
                                                            data-provide="datepicker" name="patient_birth"
                                                            id="patient_birth">
                                                        <span id="patient_birthError"
                                                            style="color: red;font-size:smaller"></span>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-6">

                                                <div class="mb-3 form-group">

                                                    <label class="form-label">Gender</label>

                                                    <select class="form-control select2_edit_info"
                                                        name="patient_gendar" id="patient_gendar">

                                                        <option value="">Select</option>

                                                        <option value="male">Male</option>

                                                        <option value="female">Female</option>

                                                    </select>

                                                    <span id="patient_gendarError"
                                                        style="color: red;font-size:smaller"></span>


                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>



                            <div class="postal__address">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="title_head">

                                            <h4>Postal Address</h4>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Post Code</label>

                                            <input type="text" class="form-control" id="patient_post_code"
                                                placeholder="" name="patient_post_code">
                                            <span id="patient_post_codeError"
                                                style="color: red;font-size:smaller"></span>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Street</label>

                                            <input type="text" class="form-control" id="patient_street"
                                                placeholder="" name="patient_street">
                                            <span id="patient_streetError"
                                                style="color: red;font-size:smaller"></span>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Town</label>

                                            <input type="text" class="form-control" id="patient_town"
                                                placeholder="" name="patient_town">
                                            <span id="patient_townError" style="color: red;font-size:smaller"></span>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label class="form-label">Country</label>

                                            <select class="form-control select2_edit_info" name="patient_country"
                                                id="patient_country">

                                                <option value="Afghanistan">Afghanistan</option>

                                                <option value="Åland Islands">Åland Islands</option>

                                                <option value="Albania">Albania</option>

                                                <option value="Algeria">Algeria</option>

                                                <option value="American Samoa">American Samoa</option>

                                                <option value="Andorra">Andorra</option>

                                                <option value="Angola">Angola</option>

                                                <option value="Anguilla">Anguilla</option>

                                                <option value="Antarctica">Antarctica</option>

                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>

                                                <option value="Argentina">Argentina</option>

                                                <option value="Armenia">Armenia</option>

                                                <option value="Aruba">Aruba</option>

                                            </select>

                                            <span id="patient_countryError"
                                                style="color: red;font-size:smaller"></span>


                                        </div>

                                    </div>

                                </div>

                            </div>



                            <div class="phnandemail">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="title_head">

                                            <h4>Phone and Email</h4>

                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Email Address</label>

                                            <input type="text" class="form-control" id="patient_email"
                                                placeholder="" name="patient_email">
                                            <span id="patient_emailError" style="color: red;font-size:smaller"></span>

                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Mobile Phone</label>

                                            <input type="text" class="form-control" id="patient_mobile_no"
                                                placeholder="" name="patient_mobile_no">
                                            <span id="patient_mobile_noError"
                                                style="color: red;font-size:smaller"></span>

                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Landline</label>

                                            <input type="text" class="form-control" id="patient_landline"
                                                placeholder="" name="patient_landline">
                                            <span id="patient_landlineError"
                                                style="color: red;font-size:smaller"></span>

                                        </div>

                                    </div>

                                    <div class="col-lg-12">

                                        <div class="title_head">

                                            <h4>Other Details</h4>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Next of Kin</label>

                                            <input type="text" class="form-control" id="patient_kin"
                                                placeholder="" name="patient_kin">
                                            <span id="patient_kinError" style="color: red;font-size:smaller"></span>


                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label class="form-label">Insurer Name</label>

                                            <input type="text" name="patient_insurer" class="form-control">

                                            <!-- <select class="form-control select2_edit_info" name="patient_insurer"
                                                id="patient_insurer">

                                            </select> -->

                                            <span id="patient_insurerError" style="color: red;font-size:smaller"></span>

                                        </div>

                                    </div>


                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Policy No</label>

                                            <input type="text" class="form-control" id="patient_policy_no"
                                                placeholder="" name="patient_policy_no">
                                            <span id="patient_policy_noError"
                                                style="color: red;font-size:smaller"></span>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">GP</label>

                                            <input type="text" class="form-control" id="patient_gp" placeholder=""
                                                name="patient_gp">
                                            <span id="patient_gpError" style="color: red;font-size:smaller"></span>

                                        </div>

                                    </div>



                                    <div class="col-lg-12">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Additional
                                                Info.</label>

                                            <textarea class="form-control" placeholder="" style="height: 100px"
                                                id="patient_additional_info" name="patient_additional_info"></textarea>
                                            <span id="patient_additional_infoError"
                                                style="color: red;font-size:smaller"></span>

                                        </div>

                                    </div>

                                    <div class="col-lg-12">

                                        <div class="add_categoryweb">



                                            <div class="row">

                                                <div class="col-lg-12">

                                                    <label for="validationCustom01" class="form-label">Tags</label>

                                                    <div class="category-container" id="category-container-2">

                                                        <input type="text" class="form-control category-input"
                                                            placeholder="To allow future audits" name="patient_tags"
                                                            id="patient_tags">

                                                        <button
                                                            class="btn r-04 btn--theme hover--tra-black add_patient add-category"
                                                            type="button"><i class="fa-solid fa-plus"></i>
                                                            Add</button>

                                                    </div>
                                                    <span id="patient_tagsError"
                                                        style="color: red;font-size:smaller"></span>

                                                    <div class="categories-list" id="categories-list-2"
                                                        name="patient_tags_list">

                                                        <!-- Categories will be displayed here -->

                                                    </div>
                                                    <span id="patient_tags_listError"
                                                        style="color: red;font-size:smaller"></span>

                                                </div>

                                            </div>



                                        </div>

                                    </div>

                                </div>

                            </div>





                            <div class="documentsadd_pat">

                                <div class="row">




                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Id</label>
                                            <select class="form-control select2_modal_" name="document_type"
                                                id="document_type" style="width: 100%;">
                                                <option value="">Select Any One</option>
                                                <option value="CIVIL ID"
                                                    {{ old('document_type') == 'CIVIL ID' ? 'selected' : '' }}>
                                                    CIVIL ID </option>
                                                <option value="EID"
                                                    {{ old('document_type') == 'EID' ? 'selected' : '' }}>
                                                    EID</option>
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
                                                value="{{ old('enterIdNumber') }}"
                                                class="form-control" placeholder="">
                                            <span class="error text-danger" id="validationMessage"> </span>

                                        </div>
                                    </div>
                                    {{-- 
                                    <div class="col-lg-12">

                                        <div class="title_head">

                                            <h4>Document Type</h4>

                                        </div>

                                    </div> --}}

                                    {{-- <div class="col-lg-6">

                                        <label for="validationCustom01" class="form-label">Select Document</label>

                                        <select class="form-control select2_edit_info" name="patient_document_type"
                                            id="patient_document_type">

                                            <option value="Passport">Passport</option>

                                            <option value="Address proof">Address proof</option>



                                        </select>
                                        <span id="patient_document_typeError"
                                            style="color: red;font-size:smaller"></span>

                                    </div> --}}

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Patient ID</label>

                                            <input type="text" class="form-control" id="patient_edit_id" placeholder=""
                                                name="patient_edit_id" readonly>
                                            <span id="patient_edit_idError" style="color: red;font-size:smaller"></span>
                                        </div>

                                    </div>

                                </div>

                            </div>









                        </div>

                        <div class="action text-end bottom_modal">

                            <button type="submit"
                                class="btn r-04 btn--theme hover--tra-black add_patient">Update</button>



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

<!-- Modal -->

<div class="modal fade edit_patient__" id="create_appointment" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Create Appointment</h1>

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

                            <div class="mb-4">

                                <label class="form-label">Select Date</label>

                                <div class="input-group" id="datepicker2">

                                    <input type="text" class="form-control" placeholder="dd M, yyyy"
                                        data-date-format="dd M, yyyy" data-date-container='#datepicker2'
                                        data-provide="datepicker">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                        <iconify-icon icon="bi:save"></iconify-icon> Save

                    </a>



                </div>

            </div>

            <!-- <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <button type="button" class="btn btn-primary">Save changes</button>

                        </div> -->

        </div>

    </div>

</div>



<!-- Modal -->

<div class="modal fade edit_patient__" id="send_message" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Send a Message</h1>

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

                            <div class="mb-3 form-group">

                                <label for="validationCustom01" class="form-label">Subject</label>

                                <input type="text" class="form-control" id="" placeholder="">

                            </div>

                        </div>



                        <div class="col-lg-12">

                            <div class="mb-3 form-group">

                                <label for="validationCustom01" class="form-label">Message</label>

                                <textarea class="form-control" placeholder="" style="height: 100px"></textarea>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient send_message"
                        data-bs-dismiss="modal">Send Message <iconify-icon icon="teenyicons:send-outline">

                        </iconify-icon></a>



                </div>

            </div>

            <!-- <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <button type="button" class="btn btn-primary">Save changes</button>

                        </div> -->

        </div>

    </div>

</div>



<!-- Modal Add & Edit Insure-->

<div class="modal fade edit_patient__" id="insure_add_edit" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Add or Edit Insurer</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="edit_insurer_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">

                            <!-- <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Schedule Appointment</h4>

                                    </div>

                                </div> -->



                            <div class="col-lg-12">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Insurer Name</label>

                                    <input type="text" class="form-control insurer_name" id="" placeholder=""
                                        name="insurer_name">
                                    <span id="insurer_nameError" style="color: red;font-size:small"></span>

                                </div>

                            </div>



                            <div class="col-lg-12">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Insurance Number</label>

                                    <input type="text" class="form-control insurer_number" id="" placeholder=""
                                        name="insurer_number">
                                    <span id="insurer_numberError" style="color: red;font-size:small"></span>
                                </div>

                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            <iconify-icon icon="bi:save"></iconify-icon> Save & Update

                        </button>



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



<!-- Modal Add & Edit Insure-->

<div class="modal fade edit_patient__" id="extract_code" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Extract SNOMED Codes from Notes</h1>

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

                            <div class="mb-2 form-group">

                                <label class="form-label">Select an Entry</label>

                                <select class="form-control select2_extract_code">

                                    <option value=""></option>

                                    <option value="">Note Sat, 21 Oct,2023</option>



                                </select>



                            </div>

                        </div>

                        <div class="col-lg-12">

                            <p class="note">Make sure the note you are selecting has substantial content. If not
                                the

                                action will fail. You can try forcing it by clicking the button again. </p>

                        </div>



                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                        Extract</a>



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

                Executive Summary

            ---------------------------->

<div class="modal fade edit_patient__" id="executive_summary" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Executive Summary</h1>

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

                            <div class="mb-3 form-group">

                                <label for="validationCustom01" class="form-label">Write Executive
                                    Summary</label>

                                <textarea class="form-control" placeholder="" style="height: 150px"></textarea>

                            </div>

                        </div>



                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                        Save</a>

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

                 Symptoms

            ---------------------------->

<div class="modal fade edit_patient__" id="symptoms_add" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Add Symptoms</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">





                        <div class="col-lg-12">

                            <div class="add_categoryweb">



                                <div class="row">

                                    <div class="col-lg-12">

                                        <label for="validationCustom01" class="form-label">Type Symptoms</label>
                                        <form id="symptom_form">
                                            @csrf
                                            <input type="hidden" name="patient_id" value="{{ @$id }}" />
                                            <div class="category-container" id="category-container-1">

                                                <input type="text" class="form-control category-input"
                                                    placeholder="Type Symptoms here..." name="symptom_name">
                                                <span id="symptom_nameError" style="color: red;font-size:small"></span>

                                                <button class="btn r-04 btn--theme hover--tra-black add_patient "
                                                    type="submit"><i class="fa-solid fa-plus"></i> Add</button>

                                            </div>
                                        </form>
                                        <div class="categories-list" id="categories-list-1">

                                            <!-- Categories will be displayed here -->

                                        </div>

                                    </div>

                                </div>



                            </div>

                        </div>



                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                        Save</a> -->

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

            clinical_exam

            ---------------------------->

<div class="modal fade edit_patient__" id="clinical_exam" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Clinical Exam</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="clinical_exam_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">





                            <div class="col-lg-12">





                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Write</label>

                                            <textarea class="form-control" placeholder="" style="height:150px"
                                                name="write_text"></textarea>
                                            <span id="write_textError" style="color: red;font-size:small"></span>

                                        </div>

                                    </div>

                                </div>





                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Save</button>

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





<!----------------------------

                Drugs / Current Meds

            ---------------------------->

<div class="modal fade edit_patient__" id="medicine_add_edit" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Drugs / Current Meds</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="drug_from">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">

                            <!-- <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Schedule Appointment</h4>

                                    </div>

                                </div> -->



                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Type a Drug
                                            Name</label>

                                        <input type="search" class="form-control" id="" placeholder="" name="drug_name">

                                        <button class="btn search_btn">

                                            <iconify-icon icon="prime:search-plus" width="24"></iconify-icon>

                                        </button>
                                        <span id="drug_nameError" style="color: red;font-size:small"></span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Frequency</label>

                                        <input type="search" class="form-control" id="" placeholder="" name="frequency">
                                        <span id="frequencyError" style="color: red;font-size:small"></span>


                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-2">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Today Date</label>

                                        <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"
                                            name="today_date">
                                        <span id="today_dateError" style="color: red;font-size:small"></span>

                                    </div>

                                </div>

                            </div>



                            <div class="col-lg-2">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Duration</label>

                                        <input type="search" class="form-control" id="" placeholder="" name="duration">

                                        <span id="durationError" style="color: red;font-size:small"></span>


                                    </div>

                                </div>

                            </div>



                            <div class="col-lg-2">

                                <div class="inner_element mt-4">

                                    <div class="form-group">

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" name="stopped"
                                                id="is_stopped" value="is_stopped">

                                            <label class="form-check-label" for="is_stopped">

                                                Stopped

                                            </label>
                                            <span id="stoppedError" style="color: red;font-size:small"></span>

                                        </div>

                                    </div>

                                </div>

                            </div>



                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Stopped Date</label>

                                        <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"
                                            name="stopped_date">
                                        <span id="stopped_dateError" style="color: red;font-size:small"></span>
                                    </div>

                                </div>

                            </div>



                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Code</label>

                                        <input type="search" class="form-control" id="" placeholder="" name="drug_code">

                                        <span id="drug_codeError" style="color: red;font-size:small"></span>

                                    </div>

                                </div>

                            </div>



                            <div class="col-lg-2">

                                <div class="inner_element add_medicine_btn">

                                    <div class="form-group">

                                        <button type="submit" class="add_diagnosis">+ Add</button>

                                    </div>

                                </div>

                            </div>


            </form>




        </div>


        <div class="add_data_diagnosis">

            <table class="table table-striped table-bordered">

                <tr>

                    <th>Drug Name</th>

                    <th>Frequency</th>

                    <th>Today Date</th>

                    <th>Duration</th>

                    <th>Stopped</th>

                    <th>Stopped Date</th>

                    <th>Code</th>

                    <th>Action</th>

                </tr>
                <tbody id="drug_table_body"></tbody>
                <!-- <tr>

                            <td>Asirpin</td>

                            <td>2</td>

                            <td>15 Nov, 2023</td>

                            <td>4</td>

                            <td>Yes</td>

                            <td>16 Nov, 2023</td>

                            <td>0345</td>

                            <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                        </tr>

                        <tr>

                            <td>Calpol 500</td>

                            <td>2</td>

                            <td>15 Nov, 2023</td>

                            <td>4</td>

                            <td>No</td>

                            <td></td>

                            <td></td>

                            <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                        </tr> -->

            </table>

        </div>

    </div>

    <div class="action text-end bottom_modal">

        <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                                Save</a> -->

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

<!----------------------------

                 allergies add

            ---------------------------->

<div class="modal fade " id="allergies_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Add Allergy</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="add_categoryweb">
                                <form id="allergy_form">
                                    @csrf
                                    <input type="hidden" name="patient_id" value="{{ @$id }}" />
                                    <div class="row">

                                        <div class="col-lg-12">

                                            <label for="validationCustom01" class="form-label">Type
                                                Allergy</label>

                                            <div class="category-container" id="category-container-3">

                                                <input type="text" name="allergy" class="form-control category-input"
                                                    placeholder="Type Allergy here...">
                                                <span id="allergy_nameError" style="color: red;font-size:small"></span>

                                                <button type="submit"
                                                    class="btn r-04 btn--theme hover--tra-black add_patient "><i
                                                        class="fa-solid fa-plus"></i> Add</button>

                                            </div>

                                            <!-- <div class="categories-list" id="categories-list-3">

                                               

                                            </div> -->

                                        </div>

                                    </div>
                                </form>



                            </div>

                        </div>



                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                                Save</a> -->

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

             Add or Remove Diagnosis

            ---------------------------->

<div class="modal fade edit_patient__" id="diagnosis" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Add or Remove Diagnosis</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="AddRemoveDiagnosis">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">

                            <!-- <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Schedule Appointment</h4>

                                    </div>

                                </div> -->





                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Type a Diagnosis
                                            name</label>

                                        <input type="search" class="form-control" id="" placeholder="">

                                        <button class="btn search_btn">

                                            <iconify-icon icon="prime:search-plus" width="24"></iconify-icon>

                                        </button>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Date</label>

                                        <div class="input-group" id="datepicker20">



                                            <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                data-date-format="dd M, yyyy" data-date-container='#datepicker20'
                                                data-provide="datepicker">

                                        </div>

                                        <!-- <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"> -->

                                    </div>



                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Comment</label>

                                        <input type="search" class="form-control" id="" placeholder="">



                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">SNOMED</label>

                                        <input type="search" class="form-control" id="" placeholder="">



                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-2">

                                <div class="inner_element mt-4">

                                    <div class="form-group">

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">

                                            <label class="form-check-label" for="flexCheckDefault">

                                                Active

                                            </label>

                                        </div>

                                    </div>

                                </div>

                            </div>



                            <div class="col-lg-2">

                                <div class="inner_element mt-4">

                                    <div class="form-group">

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault1">

                                            <label class="form-check-label" for="flexCheckDefault1">

                                                Flag

                                            </label>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element mt-4">

                                    <div class="form-group">

                                        <button type="submit" class="add_diagnosis"> Add</button>

                                    </div>

                                </div>

                            </div>








            </form>




        </div>

        <div class="add_data_diagnosis">

            <table class="table table-striped table-bordered" id="add_data_diagnosis">

                <tr>

                    <th>Diagnosis Name</th>

                    <th>Date</th>

                    <th>Comment</th>

                    <th>SNOMED</th>

                    <th>Status</th>

                    <th>Flag</th>

                    <th>Action</th>

                </tr>

                <tr>

                    <td>Routine venipuncture</td>

                    <td>15 Nov, 2023</td>

                    <td>Lorem ipsum dolor sit amet.</td>

                    <td></td>

                    <td><span class="badge badge-soft-success ">Active</span></td>

                    <td><i class="fa-regular fa-flag"></i></td>

                    <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                </tr>

                <tr>

                    <td>Lipid panel</td>

                    <td>15 Nov, 2023</td>

                    <td>Lorem ipsum dolor sit amet.</td>

                    <td></td>

                    <td><span class="badge badge-soft-success ">Active</span></td>

                    <td><i class="fa-regular fa-flag"></i></td>

                    <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                </tr>

            </table>

        </div>

    </div>

    <div class="action text-end bottom_modal">

        {{-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                        Save</a> --}}

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



<!----------------------------

                 Future Plans

            ---------------------------->

<div class="modal fade edit_patient__" id="future_plans" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Future Plans</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="future_plan_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">



                            <div class="col-lg-12">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Date</label>

                                        <div class="input-group" id="datepicker21">



                                            <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                data-date-format="dd M, yyyy" data-date-container='#datepicker21'
                                                data-provide="datepicker" name="future_date">

                                        </div>
                                        <span id="future_dateError" style="color: red;font-size:small"></span>
                                        <!-- <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"> -->

                                    </div>



                                </div>

                            </div>

                            <div class="col-lg-12">



                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Write</label>

                                            <textarea class="form-control" placeholder="" style="height:150px"
                                                name="future_write"></textarea>
                                            <span id="future_writeError" style="color: red;font-size:small"></span>

                                        </div>

                                    </div>

                                </div>





                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Save</button>

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



<!----------------------------

                 procedure list

            ---------------------------->

<div class="modal fade edit_patient__" id="procedure_list" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">List of Procedure</h1>

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

                            <div class="procedure_list_">

                                <h6 class="procedure_main_title">Reception</h6>

                                <h6 class="procedure_sub_title">Pre-Procedure :</h6>

                                <ul class="procedure_list_check mb-3">

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault1">

                                            <label class="form-check-label" for="flexCheckDefault1">

                                                Fee Paid

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault2">

                                            <label class="form-check-label" for="flexCheckDefault2">

                                                4wk Follow-up booked (US + TFT)

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault3">

                                            <label class="form-check-label" for="flexCheckDefault3">

                                                Patient File Prepared

                                                <ul class="patient_file_list">

                                                    <li>Clinical Note</li>

                                                    <li>Ultrasound images</li>

                                                    <li>LAB - CBC/PT/PTT report</li>

                                                    <li>LAB - TSH/T4 report</li>

                                                    <li>FNA report</li>

                                                    <li>Consent Form</li>

                                                    <li>Discharge Prescription</li>

                                                </ul>

                                            </label>

                                        </div>

                                    </li>



                                </ul>

                                <h6 class="procedure_main_title">NURSE</h6>

                                <h6 class="procedure_sub_title">Pre-Procedure :</h6>

                                <ul class="procedure_list_check mb-3">

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault4">

                                            <label class="form-check-label" for="flexCheckDefault4">

                                                Lab cleared

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault5">

                                            <label class="form-check-label" for="flexCheckDefault5">

                                                Consent taken

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault6">

                                            <label class="form-check-label" for="flexCheckDefault6">

                                                Tools kit assigned

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault7">

                                            <label class="form-check-label" for="flexCheckDefault7">

                                                6 hours NPO

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault8">

                                            <label class="form-check-label" for="flexCheckDefault8">

                                                IV cannula left arm

                                            </label>

                                        </div>

                                    </li>



                                </ul>

                                <h6 class="procedure_main_title">NURSE</h6>

                                <h6 class="procedure_sub_title">Post-Procedure :</h6>

                                <ul class="procedure_list_check mb-3">

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault9">

                                            <label class="form-check-label" for="flexCheckDefault9">

                                                60 min Cold applied

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault10">

                                            <label class="form-check-label" for="flexCheckDefault10">

                                                Solu-Medrol injected

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault11">

                                            <label class="form-check-label" for="flexCheckDefault11">

                                                Paracetamol injected

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault12">

                                            <label class="form-check-label" for="flexCheckDefault12">

                                                6 hours NPO

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault13">

                                            <label class="form-check-label" for="flexCheckDefault13">

                                                Ancef injected

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault14">

                                            <label class="form-check-label" for="flexCheckDefault14">

                                                Discharge Prescription

                                                given & explained

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault15">

                                            <label class="form-check-label" for="flexCheckDefault15">

                                                Discharge instructions given & explained

                                            </label>

                                        </div>

                                    </li>

                                </ul>

                            </div>

                        </div>



                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                        Save</a>

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

                  Patient Refer

            ---------------------------->

<div class="modal fade edit_patient__" id="refer_patient" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Refer to Another Clinician</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="refer_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="">


                            <div class="row top_head_vitals">

                                <div class="col-lg-12">

                                    <div class="inner_element search_dr">

                                        <div class="form-group">

                                            <input type="search" class="form-control" id=""
                                                placeholder="Find a user by name or specialty..">

                                            <button class="btn search_btn_dr"><i
                                                    class="fa-solid fa-magnifying-glass"></i></button>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-12">

                                    <div class="doctor_list">

                                        <h6 class="list_title_dr">List of Available Clinicians</h6>

                                        <ul>

                                            <li>

                                                <div class="booking_card_select">

                                                    <input type="checkbox" class="check_dr" name="cbx4" id="cbx1">

                                                    <label for="cbx1">

                                                        <div class="doctor_dt">

                                                            <div class="image_dr">

                                                                <img src="{{ url('public/assets') }}/images/new-images/avtar.jpg"
                                                                    alt="">

                                                            </div>

                                                            <div class="dr_detail">

                                                                <h6 class="dr_name">Abbigail Titmus
                                                                    <span>(MBBS)</span></h6>

                                                                <p class="dr_email"><a
                                                                        href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a>
                                                                </p>

                                                            </div>

                                                        </div>

                                                    </label>

                                                </div>





                                            </li>

                                            <li>

                                                <div class="booking_card_select">

                                                    <input type="checkbox" class="check_dr" name="cbx4" id="cbx2">

                                                    <label for="cbx2">

                                                        <div class="doctor_dt">

                                                            <div class="image_dr">

                                                                <img src="{{ url('public/assets') }}/images/new-images/avtar.jpg"
                                                                    alt="">

                                                            </div>

                                                            <div class="dr_detail">

                                                                <h6 class="dr_name">Abbigail Titmus
                                                                    <span>(MBBS)</span></h6>

                                                                <p class="dr_email"><a
                                                                        href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a>
                                                                </p>

                                                            </div>

                                                        </div>

                                                    </label>

                                                </div>





                                            </li>

                                            <li>

                                                <div class="booking_card_select">

                                                    <input type="checkbox" class="check_dr" name="cbx4" id="cbx3">

                                                    <label for="cbx3">

                                                        <div class="doctor_dt">

                                                            <div class="image_dr">

                                                                <img src="{{ url('public/assets') }}/images/new-images/avtar.jpg"
                                                                    alt="">

                                                            </div>

                                                            <div class="dr_detail">

                                                                <h6 class="dr_name">Abbigail Titmus
                                                                    <span>(MBBS)</span></h6>

                                                                <p class="dr_email"><a
                                                                        href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a>
                                                                </p>

                                                            </div>

                                                        </div>

                                                    </label>

                                                </div>





                                            </li>

                                            <li>

                                                <div class="booking_card_select">

                                                    <input type="checkbox" class="check_dr" name="cbx4" id="cbx4">

                                                    <label for="cbx4">

                                                        <div class="doctor_dt">

                                                            <div class="image_dr">

                                                                <img src="{{ url('public/assets') }}/images/new-images/avtar.jpg"
                                                                    alt="">

                                                            </div>

                                                            <div class="dr_detail">

                                                                <h6 class="dr_name">Abbigail Titmus
                                                                    <span>(MBBS)</span></h6>

                                                                <p class="dr_email"><a
                                                                        href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a>
                                                                </p>

                                                            </div>

                                                        </div>

                                                    </label>

                                                </div>





                                            </li>

                                        </ul>





                                    </div>



                                </div>

                                <div class="col-lg-12 px-4 mb-3" id="refer_note">

                                    <div class="mt-3 form-group">

                                        <textarea class="form-control" placeholder="Type a short referral message here. This will be entered as a note on EMR and will be emailed to addressees (salutation added automatically). 

            

            This action also gives the addressee access to this medical record. " style="height:150px"></textarea>

                                    </div>

                                </div>

                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                            Save</a>

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">

                            Close</a>

                    </div>

                </div>
                <form>
                    <!-- <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <button type="button" class="btn btn-primary">Save changes</button>

                        </div> -->

        </div>

    </div>

</div>



<!----------------------------

                 Special Notes

            ---------------------------->

<div class="modal fade edit_patient__" id="special_notes" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Special Notes</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="special_note_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
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

                                    <div class="col-lg-12">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Write Special
                                                Notes</label>

                                            <textarea class="form-control" placeholder="" style="height:150px"
                                                name="note_text"></textarea>
                                            <span id="note_textError" style="color: red;font-size:small"></span>

                                        </div>

                                    </div>

                                </div>





                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Save</button>

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





<!----------------------------

                Add New Notes

            ---------------------------->

<div class="modal fade edit_patient__" id="add_new_note" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel"><i class="fa-regular fa-square-plus"></i> Add a
                    New Note</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="progress_note_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">

                            <!-- <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Schedule Appointment</h4>

                                    </div>

                                </div> -->



                            <div class="">
                                @php
                                    @$formattedDate = Carbon\Carbon::now()->format('M d, Y g:i A');
                                    @$patient = App\Models\User::where('id', @$id)->first();
                                @endphp
                                <h6 class="patient_on_ new_entry">New entry on: <span>
                                        {{ @$patient != null ? @$patient->name : '' }}</span>
                                </h6>

                                <p class="entry_by">
                                    {{ @$patient != null ? @$patient->name : '' }}|
                                    {{ @$formattedDate }}</p>

                                <div class="row top_head_vitals">

                                    <div class="col-lg-12">

                                        <div class="row">

                                            <div class="col-lg-4">

                                                <div class="d-flex">

                                                    <div class="inner_element w-100">

                                                        <div class="form-group">

                                                            <select class="form-control select2_note" id="canned_texts"
                                                                name="canned_texts">



                                                            </select>

                                                            <span id="canned_textsError"
                                                                style="color: red; font-size:small"></span>


                                                        </div>





                                                    </div>

                                                    <div class="add_btn_plus" id="entry_add_btn">

                                                        <a href="#">+</a>

                                                    </div>

                                                </div>



                                            </div>

                                            <div class="col-lg-4" id="context_add">

                                                <div class="d-flex">

                                                    <div class="inner_element w-100">

                                                        <div class="form-group">

                                                            <input type="text" class="form-control"
                                                                placeholder="Type a new context" id="new_text"
                                                                name="new_text">
                                                            <span id="new_textError"
                                                                style="color: red; font-size:small"></span>

                                                        </div>

                                                    </div>

                                                    <div class="add_btn_plus">

                                                        <a href="#">+</a>

                                                    </div>

                                                </div>



                                            </div>

                                            <div class="col-lg-4">

                                                <div class="d-flex">

                                                    <div class="inner_element w-100">

                                                        <div class="form-group">

                                                            <select class="form-control select2_note" id="note_contents"
                                                                name="note_contents">
                                                            </select>
                                                            <span id="note_contentsError"
                                                                style="color: red; font-size:small"></span>


                                                        </div>





                                                    </div>

                                                    <div class="add_btn_plus">

                                                        <a href="#">+</a>

                                                    </div>

                                                </div>



                                            </div>

                                            <div class="col-lg-12 mt-4">

                                                <div class="row">

                                                    <div class="col-lg-4">

                                                        <div class="voice_recognition">

                                                            {{-- 
                                                    <button  class="startRecognition" id="startRecognition">Start Voice Recognition</button> --}}


                                                            <p>
                                                                <a href="javascript:void(0)" class="mic_btn"
                                                                    role="button"
                                                                    aria-label="Start/Stop voice recognition">
                                                                    <i class="fa-solid fa-microphone startRecognition"
                                                                        id="startRecognition" aria-hidden="true"></i>
                                                                </a>
                                                                <span class="tooltip" role="tooltip"
                                                                    aria-live="assertive" aria-atomic="true">Click the
                                                                    icon to start
                                                                    voice recognition.</span>
                                                            </p>



                                                        </div>

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <div class="automated_clinic_notes">

                                                            <a href="javascript:void(0)"
                                                                id="automated_clinic_note">Automated Clinic Notes
                                                                - <span>Click Here to Start!</span></a>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>



                                            <div class="col-lg-12">

                                                <div class="mt-2 form-group">

                                                    <textarea class="form-control" id="voiceInput"
                                                        placeholder="Type your entry here" style="height:100px"
                                                        id="prog_voice_recognition"
                                                        name="prog_voice_recognition"></textarea>
                                                    <span id="prog_voice_recognitionError"
                                                        style="color: red; font-size:small"></span>

                                                </div>

                                                <h6 class="recall">Recall <span>Follow-up on this episode. Patient
                                                        will be notified a week before and clinic staff will be
                                                        notified on due date. </span></h6>

                                            </div>

                                            <div class="col-lg-12">

                                                <div class="row align-items-center mt-3">

                                                    <div class="col-lg-1">

                                                        <div class="inner_element w-100">

                                                            <div class="form-group">

                                                                <input type="text" class="form-control" placeholder=""
                                                                    name="prog_day" id="prog_day">
                                                                <span id="prog_dayError"
                                                                    style="color: red; font-size:small"></span>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <div class="inner_element w-100">

                                                            <div class="form-group">

                                                                <select class="form-control select2_note" id="prog_date"
                                                                    name="prog_date">

                                                                    <option value="Days">Days</option>

                                                                    <option value="Weeks">Weeks</option>

                                                                    <option value="Months">Months</option>

                                                                    <option value="Years">Years</option>

                                                                </select>
                                                                <span id="prog_dateError"
                                                                    style="color: red; font-size:small"></span>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <div class="inner_element w-100">

                                                            <div class="form-group">

                                                                <input type="text" class="form-control"
                                                                    placeholder="Details  -  e.g OPD, CT Scan etc."
                                                                    name="prog_details">

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-3">

                                                        <div class="form-check">

                                                            <input class="form-check-input" type="checkbox"
                                                                value="active" id="prog_recall_reminder"
                                                                name="prog_recall_reminder">

                                                            <label class="form-check-label" for="prog_recall_reminder">

                                                                Save without a recall reminder

                                                            </label>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-12 mt-3  mb-3">

                                                <div class="row align-items-center">

                                                    <div class="col-lg-4">

                                                        <div class="inner_element w-100">

                                                            <div class="form-group">

                                                                <input type="text" class="form-control"
                                                                    placeholder="Email" name="prog_email"
                                                                    id="prog_email">
                                                                <span id="prog_emailError"
                                                                    style="color: red; font-size:small"></span>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <div class="inner_element w-100">

                                                            <div class="form-group">

                                                                <input type="text" class="form-control"
                                                                    placeholder="Mobile Phone" id="prog_mobile_no"
                                                                    name="prog_mobile_no">
                                                                <span id="prog_mobile_noError"
                                                                    style="color: red; font-size:small"></span>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <div class="form-check">

                                                            <input class="form-check-input" type="checkbox"
                                                                value="active" id="flexCheckCheckeda2"
                                                                id="prog_invoice_item" name="prog_invoice_item">

                                                            <label class="form-check-label" for="flexCheckCheckeda2">

                                                                Create an Invoice Item

                                                            </label>
                                                            <span id="prog_invoice_itemError"
                                                                style="color: red; font-size:small"></span>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-12 mt-3" id="invoice_appoin">

                                                        <div class="inner_element w-100">

                                                            <div class="form-group">

                                                                <select class="form-control select2_note"
                                                                    name="prog_appointment_type">

                                                                    <option value="">Appointment Type
                                                                    </option>

                                                                    <option
                                                                        value="CONSULTATION/Interventional Radiology">
                                                                        CONSULTATION/Interventional Radiology
                                                                        استشارة أشعة تداخلية</option>

                                                                    <option
                                                                        value="CT / Fluro Guided joint / facet RFA (Radio-Frequency) ablation">
                                                                        CT / Fluro Guided joint / facet RFA
                                                                        (Radio-Frequency) ablation علاج ألم المفاصل
                                                                        بالتردد الحراري بتوجية الأشعة</option>

                                                                    <option value="Follow up appointment">Follow
                                                                        up appointment</option>

                                                                    <option value="Hemorrhoids Embolization">
                                                                        Hemorrhoids Embolization</option>

                                                                    <option
                                                                        value="Image guided MSK inflammation / pain injection - PRP">
                                                                        Image guided MSK inflammation / pain
                                                                        injection - PRP حقن إالتهاب/ألم المفاصل
                                                                        بتوجية الأشعة-بلازما QASTARAT & DAWALI
                                                                        CLINICS</option>

                                                                    <option
                                                                        value="Image guided MSK / pain injection - HA">
                                                                        Image guided MSK / pain injection - HA حقن
                                                                        إالتهاب/ألم المفاصل بتوجية الأشعة-حقن زيتية
                                                                    </option>

                                                                    <option
                                                                        value="Image (Ultrasound) guided Occipital Headache nerve block">
                                                                        Image (Ultrasound) guided Occipital Headache
                                                                        nerve block</option>

                                                                    <option value="INTRAVENOUS VITAMIN THERAPY">
                                                                        INTRAVENOUS VITAMIN THERAPY</option>

                                                                    <option
                                                                        value="IV DRIP ASCORBIC ACID (Essential dose)">
                                                                        IV DRIP ASCORBIC ACID (Essential dose)
                                                                        فيتامين سي الجرعه الأساسية</option>

                                                                    <option
                                                                        value="IV DRIP DETOX MASTER (ESSENTIAL DOSE)">
                                                                        IV DRIP DETOX MASTER (ESSENTIAL DOSE)مزيل
                                                                        السميات (الجرعة الأساسية)</option>

                                                                    <option
                                                                        value="IV DRIP ENERGY BOOSTER (ESSENTIAL DOSE)">
                                                                        IV DRIP ENERGY BOOSTER (ESSENTIAL DOSE) معزز
                                                                        الطاقة الجرعة الأساسية</option>

                                                                    <option value="IV DRIP FAT BURNER (ESSENTIAL DOSE)">
                                                                        IV DRIP FAT BURNER (ESSENTIAL DOSE) مسرعات
                                                                        حرق الدهون (الجرعة الأساسية)</option>

                                                                    <option
                                                                        value="IV VITAMINE- WOMEN SPECIFICIMMUNITY BOOSTER WITH VITAMIN C">
                                                                        IV VITAMINE- WOMEN SPECIFICIMMUNITY BOOSTER
                                                                        WITH VITAMIN C</option>

                                                                    <option
                                                                        value="IV VITAMINE- WOMEN SPECIFIC- IRON BOOSTER - ANTI HAIR LOSS COMBINATION ">
                                                                        IV VITAMINE- WOMEN SPECIFIC- IRON BOOSTER -
                                                                        ANTI HAIR LOSS COMBINATION </option>

                                                                    <option value="IV Vitamin - Multivatamins w/ Iron">
                                                                        IV Vitamin - Multivatamins w/ Iron</option>


                                                                </select>

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

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Save</button>

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



<!----------------------------

               order imagenairy Exam

            ---------------------------->

<div class="modal fade edit_patient__" id="order_imagenairy" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Order Imaginary Exam </h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="order_imaginary_exam_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">

                            <!-- <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Schedule Appointment</h4>

                                    </div>

                                </div> -->

                            <div class="col-lg-12">

                                <div class="inner_element w-100">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Select Tests</label>

                                        <select class="form-control select2_imaginary_test" name="test_name[]"
                                            multiple="multiple">
                                            @php
                                                $test_names =
                                                App\Models\patient\Order_imaginary_exam_test::orderBy('id',
                                                'desc')->get();
                                            @endphp
                                            @foreach($test_names as $test_name)
                                                <option value="{{ $test_name->id }}">
                                                    {{ $test_name->test_name }}</option>
                                            @endforeach

                                        </select>
                                        <span id="testNameError" style="color: red;font-size:small"></span>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3 form-group">
                                    <label for="validationCustom01" class="form-label">Write Summary</label>
                                    <textarea class="form-control" placeholder="" style="height:150px"></textarea>
                                </div>
                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Save</button>

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


<!----------------------------
  MDT Review
---------------------------->
<div class="modal fade edit_patient__" id="mdt_review" tabindex="-1" aria-labelledby="exampleModalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel"> MDT Review</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    fdprocessedid="kapxq"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body padding-0">
                <div class="inner_data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4 class="mt-0">Choose MDT Decision</h4>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input" type="checkbox" name="formRadiosRight"
                                    id="enableTextarea1">
                                <label class="form-check-label" for="enableTextarea1">
                                    IR Procesure
                                </label>
                            </div>
                            <div class="form-check form-check-right mb-3 ps-0">
                                <textarea class="form-control" id="myTextarea1"
                                    placeholder="Enter Elaborate / notes here***" style="height: 100px"
                                    disabled=""></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input" type="checkbox" name="formRadiosRight"
                                    id="enableTextarea2">
                                <label class="form-check-label" for="enableTextarea2">
                                    Medical Conservative
                                </label>
                            </div>
                            <div class="form-check form-check-right mb-3 ps-0">
                                <textarea class="form-control" id="myTextarea2"
                                    placeholder="Enter Elaborate / notes here***" style="height: 100px"
                                    disabled=""></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input" type="checkbox" name="formRadiosRight"
                                    id="enableTextarea3">
                                <label class="form-check-label" for="enableTextarea3">
                                    Surgical
                                </label>
                            </div>
                            <div class="form-check form-check-right mb-3 ps-0">
                                <textarea class="form-control" id="myTextarea3"
                                    placeholder="Enter Elaborate / notes here***" style="height: 100px"
                                    disabled=""></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input" type="checkbox" name="formRadiosRight"
                                    id="enableTextarea4">
                                <label class="form-check-label" for="enableTextarea4">
                                    Other Options
                                </label>
                            </div>
                            <div class="form-check form-check-right mb-3 ps-0">
                                <textarea class="form-control" id="myTextarea4"
                                    placeholder="Enter Elaborate / notes here***" style="height: 100px"
                                    disabled=""></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 form-group">
                                <label for="validationCustom01" class="form-label">Write Summary</label>
                                <textarea class="form-control" placeholder="" style="height:100px"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="action text-end bottom_modal">
                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">
                        Save</a>
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
  Eligibility Status
---------------------------->

<div class="modal fade edit_patient__" id="eligibility_status" tabindex="-1" aria-labelledby="exampleModalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel"> Eligibility Status</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body padding-0">
                <div class="inner_data">
                    <div class="row">
                        <!-- <div class="col-lg-12">
      <div class="title_head">
       <h4 class="mt-0">Choose MDT Decision</h4>
      </div>
     </div> -->
                        <div class="col-lg-12 mb-2">
                            <div class="row align-items-center">
                                <div class="col-lg-12 ">
                                    <h6 class="question_title">Conservative - Topical Riparil</h6>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="non_eligibile1_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight20"
                                            id="formRadiosRight_a5">
                                        <label class="form-check-label" for="formRadiosRight_a5">
                                            Non-Eligibile
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="eligibile1_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight20"
                                            id="formRadiosRight_a6">
                                        <label class="form-check-label" for="formRadiosRight_a6">
                                            Eligibile
                                        </label>
                                    </div>
                                </div>


                                <div class="col-lg-12" id="eligibile1_textarea" style="display: none;">
                                    <div class="form-check form-check-right mb-3 ps-0">
                                        <textarea class="form-control" placeholder="Enter Elaborate / notes here***"
                                            style="height: 100px"></textarea>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <h6 class="question_title">Conservative - Topical Analgesics</h6>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="non_eligibile2_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight21"
                                            id="formRadiosRight_a7">
                                        <label class="form-check-label" for="formRadiosRight_a7">
                                            Non-Eligibile
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="eligibile2_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight21"
                                            id="formRadiosRight_a8">
                                        <label class="form-check-label" for="formRadiosRight_a8">
                                            Eligibile
                                        </label>
                                    </div>
                                </div>


                                <div class="col-lg-12" id="eligibile2_textarea" style="display: none;">
                                    <div class="form-check form-check-right mb-3 ps-0">
                                        <textarea class="form-control" placeholder="Enter Elaborate / notes here***"
                                            style="height: 100px"></textarea>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <h6 class="question_title">Conservative - PO Analgesics</h6>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="non_eligibile3_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight22"
                                            id="formRadiosRight_a9">
                                        <label class="form-check-label" for="formRadiosRight_a9">
                                            Non-Eligibile
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="eligibile3_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight22"
                                            id="formRadiosRight_a10">
                                        <label class="form-check-label" for="formRadiosRight_a10">
                                            Eligibile
                                        </label>
                                    </div>
                                </div>


                                <div class="col-lg-12" id="eligibile3_textarea" style="display: none;">
                                    <div class="form-check form-check-right mb-3 ps-0">
                                        <textarea class="form-control" placeholder="Enter Elaborate / notes here***"
                                            style="height: 100px"></textarea>
                                    </div>
                                </div>


                            </div>
                        </div>


                        <div class="col-lg-12 mb-2">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <h6 class="question_title">Conservative - Glucasamine / Chondroitin</h6>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="non_eligibile4_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight23"
                                            id="formRadiosRight_a11">
                                        <label class="form-check-label" for="formRadiosRight_a11">
                                            Non-Eligibile
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="eligibile4_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight23"
                                            id="formRadiosRight_a12">
                                        <label class="form-check-label" for="formRadiosRight_a12">
                                            Eligibile
                                        </label>
                                    </div>
                                </div>


                                <div class="col-lg-12" id="eligibile4_textarea" style="display: none;">
                                    <div class="form-check form-check-right mb-3 ps-0">
                                        <textarea class="form-control" placeholder="Enter Elaborate / notes here***"
                                            style="height: 100px"></textarea>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <h6 class="question_title">Conservative - PO - Collagen</h6>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="non_eligibile5_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight24"
                                            id="formRadiosRight_a13">
                                        <label class="form-check-label" for="formRadiosRight_a13">
                                            Non-Eligibile
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="eligibile5_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight24"
                                            id="formRadiosRight_a14">
                                        <label class="form-check-label" for="formRadiosRight_a14">
                                            Eligibile
                                        </label>
                                    </div>
                                </div>


                                <div class="col-lg-12" id="eligibile5_textarea" style="display: none;">
                                    <div class="form-check form-check-right mb-3 ps-0">
                                        <textarea class="form-control" placeholder="Enter Elaborate / notes here***"
                                            style="height: 100px"></textarea>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <h6 class="question_title">Conservative - IV Vitamins</h6>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="non_eligibile6_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight25"
                                            id="formRadiosRight_a15">
                                        <label class="form-check-label" for="formRadiosRight_a15">
                                            Non-Eligibile
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="eligibile6_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight25"
                                            id="formRadiosRight_a16">
                                        <label class="form-check-label" for="formRadiosRight_a16">
                                            Eligibile
                                        </label>
                                    </div>
                                </div>


                                <div class="col-lg-12" id="eligibile6_textarea" style="display: none;">
                                    <div class="form-check form-check-right mb-3 ps-0">
                                        <textarea class="form-control" placeholder="Enter Elaborate / notes here***"
                                            style="height: 100px"></textarea>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <h6 class="question_title">Conservative - IM Nurobion</h6>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="non_eligibile7_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight26"
                                            id="formRadiosRight_a17">
                                        <label class="form-check-label" for="formRadiosRight_a17">
                                            Non-Eligibile
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="eligibile7_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight26"
                                            id="formRadiosRight_a18">
                                        <label class="form-check-label" for="formRadiosRight_a18">
                                            Eligibile
                                        </label>
                                    </div>
                                </div>


                                <div class="col-lg-12" id="eligibile7_textarea" style="display: none;">
                                    <div class="form-check form-check-right mb-3 ps-0">
                                        <textarea class="form-control" placeholder="Enter Elaborate / notes here***"
                                            style="height: 100px"></textarea>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <h6 class="question_title">Conservative - IM Collagen</h6>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="non_eligibile8_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight27"
                                            id="formRadiosRight_a19">
                                        <label class="form-check-label" for="formRadiosRight_a19">
                                            Non-Eligibile
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-2" id="eligibile8_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight27"
                                            id="formRadiosRight_a20">
                                        <label class="form-check-label" for="formRadiosRight_a20">
                                            Eligibile
                                        </label>
                                    </div>
                                </div>


                                <div class="col-lg-12" id="eligibile8_textarea" style="display: none;">
                                    <div class="form-check form-check-right mb-3 ps-0">
                                        <textarea class="form-control" placeholder="Enter Elaborate / notes here***"
                                            style="height: 100px"></textarea>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3 form-group">
                                <label for="validationCustom01" class="form-label">Write Summary</label>
                                <textarea class="form-control" placeholder="" style="height:100px"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="action text-end bottom_modal">
                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">
                        Save</a>
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

               order imagenairy Exam

            ---------------------------->

<div class="modal fade edit_patient__" id="consent_form" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Eligibility Forms</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="EligibilityForms" action="{{ route('user.slectEligibilityForms') }}"
                method="POST">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">

                            <!-- <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Schedule Appointment</h4>

                                    </div>

                                </div> -->





                            <div class="col-lg-4">

                                <label class="w-100">

                                    <input type="radio" name="EligibilityForm" class="card-input-element"
                                        id="ProstateArteryEmbolizationEligibility"
                                        value="ProstateArteryEmbolizationEligibility" />

                                    <div class="form_box card-input">

                                        <div class="form_img">

                                            <img src="{{ url('public/assets') }}/images/new-images/forms.png"
                                                alt="">

                                        </div>

                                        <div class="form_dt">

                                            <h6>Prostate Artery Embolization Eligibility Form</h6>

                                        </div>

                                    </div>

                                </label>



                            </div>

                            <div class="col-lg-4">

                                <label class="w-100">

                                    <input type="radio" name="EligibilityForm" class="card-input-element"
                                        id="ThyroidAblation" value="ThyroidAblation" />

                                    <div class="form_box card-input">

                                        <div class="form_img">

                                            <img src="{{ url('public/assets') }}/images/new-images/forms.png"
                                                alt="">

                                        </div>

                                        <div class="form_dt">

                                            <h6>Thyroid Ablation Form</h6>

                                        </div>

                                    </div>

                                </label>



                            </div>

                            <div class="col-lg-4">

                                <label class="w-100">

                                    <input type="radio" name="EligibilityForm" class="card-input-element"
                                        id="ProstateArteryEmbolizationEligibility" value="UterineEmboForm" />

                                    <div class="form_box card-input">

                                        <div class="form_img">

                                            <img src="{{ url('public/assets') }}/images/new-images/forms.png"
                                                alt="">

                                        </div>

                                        <div class="form_dt">

                                            <h6>Uterine Embo Form</h6>

                                        </div>

                                    </div>

                                </label>



                            </div>
                            <div class="col-lg-4">

                                <label class="w-100">

                                    <input type="radio" name="EligibilityForm" class="card-input-element"
                                        id="ProstateArteryEmbolizationEligibility" value="VaricoceleEmboForm" />

                                    <div class="form_box card-input">

                                        <div class="form_img">

                                            <img src="{{ url('public/assets') }}/images/new-images/forms.png"
                                                alt="">

                                        </div>

                                        <div class="form_dt">

                                            <h6>Varicocele Embo Form</h6>

                                        </div>

                                    </div>

                                </label>



                            </div>
                            <div class="col-lg-4">

                                <label class="w-100">

                                    <input type="radio" name="EligibilityForm" class="card-input-element"
                                        id="ProstateArteryEmbolizationEligibility" value="PelvicCongEmbo" />

                                    <div class="form_box card-input">

                                        <div class="form_img">

                                            <img src="{{ url('public/assets') }}/images/new-images/forms.png"
                                                alt="">

                                        </div>

                                        <div class="form_dt">

                                            <h6>Pelvic Cong Embo Form</h6>

                                        </div>

                                    </div>

                                </label>



                            </div>
                            <div class="col-lg-4">

                                <label class="w-100">

                                    <input type="radio" name="EligibilityForm" class="card-input-element"
                                        id="ProstateArteryEmbolizationEligibility" value="VaricoseAblation" />

                                    <div class="form_box card-input">

                                        <div class="form_img">

                                            <img src="{{ url('public/assets') }}/images/new-images/forms.png"
                                                alt="">

                                        </div>

                                        <div class="form_dt">

                                            <h6>Varicose Ablation Form</h6>

                                        </div>

                                    </div>

                                </label>



                            </div>
                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Next</button>

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





<!----------------------------

              Add a new invoice item

            ---------------------------->

<div class="modal fade edit_patient__" id="invoice_add" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Add a new invoice item</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="invoice_item_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">

                            <!-- <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Schedule Appointment</h4>

                                    </div>

                                </div> -->



                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Date</label>

                                        <div class="input-group" id="datepicker22">



                                            <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                data-date-format="dd M, yyyy" data-date-container='#datepicker22'
                                                data-provide="datepicker" name="date">

                                        </div>
                                        <span id="DateError" style="color: red;font-size:small"></span>
                                        <!-- <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"> -->

                                    </div>



                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Type an item
                                            name</label>

                                        <input type="search" class="form-control" id="" placeholder="" name="item_name">

                                        <button class="btn search_btn">

                                            <iconify-icon icon="prime:search-plus" width="24"></iconify-icon>

                                        </button>
                                        <span id="ItemNameError" style="color: red;font-size:small"></span>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Cost</label>

                                        <input type="search" class="form-control" id="" placeholder="" name="cost">

                                        <span id="CostError" style="color: red;font-size:small"></span>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Code</label>

                                        <input type="text" class="form-control" id="" placeholder="" name="code">

                                        <span id="CodeError" style="color: red;font-size:small"></span>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element add_medicine_btn">

                                    <div class="form-group">

                                        <button type="submit" class="add_diagnosis">+ Add</button>

                                    </div>

                                </div>

                            </div>





                        </div>
            </form>

            <div class="add_data_diagnosis">

                <table class="table table-striped table-bordered">
                    <tr>

                        <th>Date</th>

                        <th>Item Name</th>

                        <th>Cost </th>

                        <th>Code</th>

                        <th>Action</th>

                    </tr>
                    <tbody id="invoice_item_table_body"></tbody>


                    <!--        <tr>

                            <td>15 Nov, 2023</td>

                            <td>Asirpin</td>

                            <td>100</td>

                            <td>CO22</td>

                            <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                        </tr>

                        <tr>

                            <td>15 Nov, 2023</td>

                            <td>Asirpin</td>

                            <td>100</td>

                            <td>CO22</td>

                            <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                        </tr> -->

                </table>

            </div>

        </div>

        <div class="action text-end bottom_modal">

            <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                                save</a> -->

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



<!----------------------------

                  Add a new Task

            ---------------------------->

<div class="modal fade edit_patient__" id="new_task" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">New Task on</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="new_task_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row top_head_letter">

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">



                                        <input type="search" class="form-control" id="" placeholder="Task"
                                            name="task_name">

                                        <span id="TaskError" style="color: red;font-size:small"></span>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">



                                        <div class="input-group" id="datepicker23">



                                            <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                data-date-format="dd M, yyyy" data-date-container='#datepicker23'
                                                data-provide="datepicker" name="task_date">

                                        </div>
                                        <span id="DateError" style="color: red;font-size:small"></span>
                                        <!-- <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"> -->

                                    </div>



                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">



                                        <select class="form-control select2_task" name="option_name">

                                            <option value="SAIF ALZAABI">SAIF ALZAABI</option>
                                            <option value="SAIF 123">SAIF 123</option>
                                            <option value="SAIF xyz">SAIF xyz</option>
                                            <option value="SAIF abc">SAIF abc</option>


                                        </select>
                                        <span id="NameError" style="color: red;font-size:small"></span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-12">

                                <div class="mt-3 form-group">

                                    <textarea class="form-control" placeholder="" style="height:100px"
                                        name="task_text"></textarea>
                                    <span id="TextError" style="color: red;font-size:small"></span>

                                </div>

                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            save</button>

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



<!----------------------------

                Discharge Instruction

            ---------------------------->

<div class="modal fade edit_patient__" id="discharge_instruction" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Discharge Instruction</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="mb-3 form-group">

                                <label for="validationCustom01" class="form-label">Write Discharge
                                    Instruction</label>

                                <textarea class="form-control" placeholder="" style="height:150px"></textarea>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                        save</a>

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

             Follow up notes

            ---------------------------->

<div class="modal fade edit_patient__" id="followup_note" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Follow Up Note</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="mb-3 form-group">

                                <label for="validationCustom01" class="form-label">Write Follow Up Note</label>

                                <textarea class="form-control" placeholder="" style="height:150px"></textarea>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                        save</a>

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

             Attach Document

            ---------------------------->

<div class="modal fade edit_patient__" id="attach_document" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Attach Document</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="mb-2 form-group">

                                <label for="validationCustom01" class="form-label">Document Name</label>

                                <input type="search" class="form-control" id="" placeholder="">

                            </div>



                        </div>

                        <div class="col-lg-12">

                            <div class="mb-2 form-group">

                                <label for="validationCustom01" class="form-label">Upload Document</label>

                                <input name="file1" type="file" class="dropify" data-height="100" />

                            </div>



                        </div>

                        <div class="col-lg-12 text-end">

                            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient">Upload</a>

                        </div>

                    </div>

                    <div class="add_data_diagnosis">

                        <table class="table table-striped table-bordered">

                            <tr>

                                <th>Document</th>

                                <th>Date</th>

                                <th>Action</th>

                            </tr>

                            <tr>

                                <td>

                                    <div class="d-flex document pt-2">

                                        <img src="{{ url('public/assets') }}/images/new-images/documents.png"
                                            class="avatar rounded me-3" alt="shreyu">

                                        <div class="flex-grow-1">

                                            <h5 class="dcument_name">document 1</h5>



                                        </div>



                                    </div>

                                </td>

                                <td>15 Nov, 2023</td>

                                <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                            </tr>



                        </table>

                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                        save</a>

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

             Past Medical history

            ---------------------------->

<div class="modal fade edit_patient__" id="past_medical" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Past Medical History</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="past_medical_history_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">



                            <div class="col-lg-12 " id="add_diseases">

                                <div class="diseases_box">

                                    <div class="row">

                                        <div class="col-lg-12">

                                            <div class="inner_element">

                                                <div class="form-group">

                                                    <label for="validationCustom01"
                                                        class="form-label diseases_title"><span>Diseases
                                                            Name</span> </label>

                                                    <input type="text" class="form-control" placeholder="Diseases Name"
                                                        name="diseases_name[]">
                                                    <span id="diseases_nameError"
                                                        style="color: red;font-size:small"></span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-12">

                                            <div class="mb-1 form-group">

                                                <label for="validationCustom01" class="form-label">Describe</label>

                                                <textarea class="form-control" placeholder="" style="height:60px"
                                                    name="describe[]"></textarea>
                                                <span id="describeError" style="color: red;font-size:small"></span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-12 text-end">

                                    <a href="#" class="diseases_name add_diseases_btn">+ Add More</a>
                                    <span><a href="#" id="remove_disease"><i
                                                class="fa-regular fa-trash-can"></i></a></span>
                                </div>

                            </div>



                            <div id="dynamic-sections">
                                <!-- Initially empty; will contain dynamically added sections -->
                            </div>

                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            save</button>

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



<!----------------------------

             Past surgery history

            ---------------------------->

<div class="modal fade edit_patient__" id="past_surgical" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Past Surgical History</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="past_surgical_history_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">
                            <div class="col-lg-12 " id="add_surgical">
                                <div class="diseases_box">

                                    <div class="col-lg-12">

                                        <div class="inner_element">

                                            <div class="form-group">

                                                <label for="validationCustom01" class="form-label">Surgery
                                                    Name</label>

                                                <input type="text" class="form-control" placeholder="Surgery Name"
                                                    name="surgery_name[]">
                                                <span id="surgery_nameError" style="color: red;font-size:small"></span>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-12">

                                        <div class="mb-1 form-group">

                                            <label for="validationCustom01" class="form-label">Describe</label>

                                            <textarea class="form-control" placeholder="" style="height:60px"
                                                name="surgery_describe[]"></textarea>
                                            <span id="surgery_describeError" style="color: red;font-size:small"></span>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-12 text-end">

                                    <a href="#" class="diseases_name add_surgical_btn">+ Add More</a>
                                    <span><a href="#" id="remove_surgical"><i
                                                class="fa-regular fa-trash-can"></i></a></span>
                                </div>
                            </div>

                            <div id="surgical-dynamic-sections">
                                <!-- Initially empty; will contain dynamically added sections -->
                            </div>

                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            save</button>

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

<!----------------------------

                Make an Appointment

            ---------------------------->

<div class="modal fade edit_patient__" id="make_appointment" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Make an Appointment</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="appointment_form">

                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row top_head_vitals">

                            <div class="col-lg-12 mt-4">

                                <div class="row">

                                    <div class="col-lg-9">

                                        <div class="inner_element">

                                            <div class="form-group">



                                                <input type="text" class="form-control datepickerInput"
                                                    placeholder="Click here to find availability"
                                                    name="appointment_date">
                                                <span id="appointment_dateError"
                                                    style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-3">

                                        <a href="#"
                                            class="btn r-04 btn--theme hover--tra-black add_patient add_appointment"
                                            id="appoin_btn_form">Next</a>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-12" id="book_appointment_box">

                                <div class="row appointment_book">

                                    <h6 class="book_appin_title">Book Appointment</h6>

                                    <div class="col-lg-6">

                                        <div class="inner_element">

                                            <div class="form-group">

                                                <select class="form-control select2_appointment"
                                                    name="appointment_type">

                                                    <option value="">Appointment Type</option>

                                                    <option
                                                        value="CONSULTATION/Interventional Radiology   استشارة أشعة تداخلية">
                                                        CONSULTATION/Interventional Radiology استشارة أشعة تداخلية
                                                    </option>

                                                    <option
                                                        value="CT / Fluro Guided joint / facet RFA (Radio-Frequency) ablation علاج ألم المفاصل بالتردد الحراري بتوجية الأشعة">
                                                        CT / Fluro Guided joint / facet RFA (Radio-Frequency)
                                                        ablation علاج ألم المفاصل بالتردد الحراري بتوجية الأشعة
                                                    </option>

                                                    <option value="Follow up appointment">Follow up appointment
                                                    </option>

                                                    <option value="Hemorrhoids Embolization">Hemorrhoids
                                                        Embolization</option>

                                                    <option
                                                        value="Image guided MSK inflammation / pain injection - PRP حقن إالتهاب/ألم المفاصل بتوجية الأشعة-بلازما QASTARAT & DAWALI CLINICS">
                                                        Image guided MSK inflammation / pain injection - PRP حقن
                                                        إالتهاب/ألم المفاصل بتوجية الأشعة-بلازما QASTARAT & DAWALI
                                                        CLINICS</option>

                                                    <option
                                                        value="Image guided MSK / pain injection - HA حقن إالتهاب/ألم المفاصل بتوجية الأشعة-حقن زيتية">
                                                        Image guided MSK / pain injection - HA حقن إالتهاب/ألم
                                                        المفاصل بتوجية الأشعة-حقن زيتية</option>

                                                    <option
                                                        value="Image (Ultrasound) guided Occipital Headache nerve block">
                                                        Image (Ultrasound) guided Occipital Headache nerve block
                                                    </option>

                                                    <option value="INTRAVENOUS VITAMIN THERAPY">INTRAVENOUS
                                                        VITAMIN THERAPY</option>

                                                    <option
                                                        value="IV DRIP ASCORBIC ACID  (Essential dose) فيتامين سي الجرعه الأساسية">
                                                        IV DRIP ASCORBIC ACID (Essential dose) فيتامين سي الجرعه
                                                        الأساسية</option>

                                                    <option
                                                        value="IV DRIP DETOX MASTER (ESSENTIAL DOSE)مزيل السميات (الجرعة الأساسية)">
                                                        IV DRIP DETOX MASTER (ESSENTIAL DOSE)مزيل السميات (الجرعة
                                                        الأساسية)</option>

                                                    <option
                                                        value="IV DRIP ENERGY BOOSTER  (ESSENTIAL DOSE)  معزز الطاقة الجرعة الأساسية">
                                                        IV DRIP ENERGY BOOSTER (ESSENTIAL DOSE) معزز الطاقة الجرعة
                                                        الأساسية</option>

                                                    <option
                                                        value="IV DRIP FAT BURNER   (ESSENTIAL DOSE)  مسرعات حرق الدهون (الجرعة الأساسية)">
                                                        IV DRIP FAT BURNER (ESSENTIAL DOSE) مسرعات حرق الدهون
                                                        (الجرعة الأساسية)</option>

                                                    <option
                                                        value="IV VITAMINE- WOMEN SPECIFICIMMUNITY BOOSTER WITH VITAMIN C">
                                                        IV VITAMINE- WOMEN SPECIFICIMMUNITY BOOSTER WITH VITAMIN C
                                                    </option>

                                                    <option
                                                        value="IV VITAMINE- WOMEN SPECIFIC- IRON BOOSTER - ANTI HAIR LOSS COMBINATION ">
                                                        IV VITAMINE- WOMEN SPECIFIC- IRON BOOSTER - ANTI HAIR LOSS
                                                        COMBINATION </option>

                                                    <option value="IV Vitamin - Multivatamins w/ Iron">IV Vitamin
                                                        - Multivatamins w/ Iron</option>

                                                    <option value="PIRIFORMIS MUSCLE INJECTION">PIRIFORMIS MUSCLE
                                                        INJECTION</option>

                                                    <option value="PRESSURE STOCKING">PRESSURE STOCKING</option>

                                                    <option value="SPERM DNA FRAGMENTATION">SPERM DNA
                                                        FRAGMENTATION</option>

                                                    <option value="Spider / Reticular Veins Sclerotherapy">Spider
                                                        / Reticular Veins Sclerotherapy</option>

                                                    <option value="Ultrasound doppler of VENOUS MAPPING">
                                                        Ultrasound doppler of VENOUS MAPPING</option>

                                                    <option value="Ultrasound/General">Ultrasound/General</option>

                                                    <option value="Ultrasound NERVE MAPPING">Ultrasound NERVE
                                                        MAPPING </option>

                                                    <option value="Varicocele Embolization - قسطرة دوالي الخصية-">
                                                        Varicocele Embolization - قسطرة دوالي الخصية-</option>



                                                </select>
                                                <span id="appointment_typeError"
                                                    style="color: red;font-size:small"></span>

                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-lg-6">

                                        <div class="inner_element">

                                            <div class="form-group">

                                                <select class="form-control select2_appointment" name="location">

                                                    <option value="">Location</option>

                                                    <option value="CLINIC">CLINIC</option>

                                                    <option value="DUBAI">DUBAI</option>

                                                    <option value="QASTARAT & DAWALI CLINICS">QASTARAT & DAWALI
                                                        CLINICS</option>

                                                </select>
                                                <span id="locationError" style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="inner_element">

                                            <div class="form-group">



                                                <input type="text" class="form-control datepickerInput"
                                                    placeholder="17 Nov,2023" name="start_date">
                                                <span id="start_dateError" style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="inner_element">

                                            <div class="form-group">



                                                <input type="text" class="form-control timepicker-custom"
                                                    placeholder="12:00" name="start_time">
                                                <span id="start_timeError" style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="inner_element">

                                            <div class="form-group">



                                                <input type="text" class="form-control datepickerInput"
                                                    placeholder="17 Nov,2023" name="end_date">
                                                <span id="end_dateError" style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="inner_element">

                                            <div class="form-group">



                                                <input type="text" class="form-control timepicker-custom"
                                                    placeholder="12:00" name="end_time">
                                                <span id="end_timeError" style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="inner_element">

                                            <div class="form-group">



                                                <input type="text" class="form-control" placeholder="Cost"
                                                    name="app_cost">
                                                <span id="app_costError" style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="inner_element">

                                            <div class="form-group">



                                                <input type="text" class="form-control" placeholder="Code"
                                                    name="app_code">
                                                <span id="app_codeError" style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="inner_element">

                                            <div class="form-group">

                                                <select class="form-control select2_appointment" name="clinician">

                                                    <option value="">Select Clinician</option>

                                                    <option value="SAIF ALZAAB">SAIF ALZAABI</option>
                                                    <option value="SAIF AAB">SAIF ALZAABI</option>
                                                    <option value="SAIF ALZ">SAIF ALZAABI</option>
                                                    <option value="SAIF AL">SAIF ALZAABI</option>
                                                    <option value="SAIF AB">SAIF ALZAABI</option>

                                                </select>
                                                <span id="clinicianError" style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-12">

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" id="flexCheckChecked"
                                                name="is_confirmation" value="confirmationed">

                                            <label class="form-check-label" for="flexCheckChecked">

                                                Send appointment confirmation immediately

                                            </label>
                                            <span id="is_confirmationError" style="color: red;font-size:small"></span>
                                        </div>

                                    </div>

                                </div>

                            </div>





                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient" id="book_app">

                            Book</button>

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



<!----------------------------

                start a video call

            ---------------------------->

<div class="modal fade edit_patient__" id="video_meeting" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Start a Video call</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="video_call_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row top_head_vitals">

                            <div class="col-lg-12">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="inner_element">

                                            <div class="form-group mb-3">

                                                <label for="validationCustom01" class="form-label">Select
                                                    Date</label>

                                                <input type="text" class="form-control datepickerInput" placeholder=""
                                                    name="meeting_date">
                                                <span id="meeting_dateError" style="color: red;font-size:small"></span>
                                            </div>

                                            <div class="form-group">

                                                <label for="validationCustom01" class="form-label">Paste Meeting
                                                    URL</label>

                                                <input type="text" class="form-control " placeholder="Paste Meeting URL"
                                                    name="meeting_url">
                                                <span id="meeting_urlError" style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                    <!-- <div class="col-lg-3">

                                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient add_appointment" id="appoin_btn_form">Next</a>

                                </div> -->

                                </div>

                            </div>







                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Save</button>

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



<!----------------------------

                Lab Test

            ---------------------------->

<div class="modal fade edit_patient__" id="lab_test" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Order Lab Test</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="order_lab_test_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row top_head_vitals">

                            <div class="col-lg-12">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <label for="validationCustom01" class="form-label">Select Lab
                                            Tests</label>

                                        <select id="sumo-select" multiple name="lab_test_names[]">
                                            @php
                                                $patient_order_labs = App\Models\patient\Order_lab_test::orderBy('id',
                                                'desc')->get();
                                            @endphp
                                            @foreach($patient_order_labs as $patient_order_lab)
                                                <option value="{{ $patient_order_lab->id }}">
                                                    {{ $patient_order_lab->test_name }}</option>
                                            @endforeach
                                        </select>
                                        <span id="LabTestNamesError" style="color: red;"></span>
                                    </div>



                                    <div class="col-lg-12">



                                        <div class="add_data_diagnosis mt-3">

                                            <h6 class="selected_testtitle"><span>Selected Tests <i
                                                        class="fa-solid fa-cart-shopping"></i></span> <span><a
                                                        href="all-lab-tests.php">View all Tests</a></span></h6>

                                            <table class="table lab_order_list">


                                                <tbody id="lab_order_list_body"></tbody>
                                                <!-- <tr>

                            <td>17 Hydroxyprogesterone</td>

                            <td>Turnaround Time : 1 Week</td>

                            <td><a href="#" class="trash_btn"><i class="fa-solid fa-xmark"></i></a></td>

                        </tr>

                        <tr>

                            <td>24 Hour Urinary Calcium</td>

                            <td>Turnaround Time : 3 days</td>

                            <td><a href="#" class="trash_btn"><i class="fa-solid fa-xmark"></i></a></td>

                        </tr>

                        <tr>

                            <td>5 HIAA</td>

                            <td>Turnaround Time : 4 Days</td>

                            <td><a href="#" class="trash_btn"><i class="fa-solid fa-xmark"></i></a></td>

                        </tr> -->

                                            </table>

                                        </div>

                                    </div>





                                </div>

                            </div>







                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Order</button>

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">

                            Cancel</a>

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

<!----------------------------

                    High level

            ---------------------------->

<div class="offcanvas offcanvas-bottom offcanvas-h-custom-50" tabindex="-1" id="high_level"
    aria-labelledby="offcanvasBottomLabel">

    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
            class="fa-regular fa-circle-down"></i> Close</button>



    <div class="offcanvas-header">

        <h5 class="offcanvas-title" id="offcanvasBottomLabel">High level summary on this patient</h5>

        <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-regular fa-circle-down"></i></button> -->

    </div>

    <div class="offcanvas-body small">

        <div class="main_box_offcanvas">

            <div class="row">



                <div class="col-lg-12">

                    <div class="mb-3 form-group">

                        <label for="validationCustom01" class="form-label">Write</label>

                        <textarea class="form-control" placeholder="" style="height: 100px"></textarea>

                    </div>

                </div>



            </div>

        </div>

    </div>

    <div class="offcanvas-footer">

        <div class="frmbtn_areasubmit">

            <!-- <button type="submit" class="btn btn-primary  edit__green">Edit</button> -->

            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient"
                data-bs-dismiss="offcanvas">Save</button>

            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                data-bs-dismiss="offcanvas">Close</button>

        </div>

    </div>

</div>

<script>
    const micIcon = document.getElementById('startRecognition');
    const tooltip = document.querySelector('.tooltip');

    let recognition;

    micIcon.addEventListener('click', toggleRecognition);

    function toggleRecognition() {
        if (!recognition) {
            recognition = new webkitSpeechRecognition();
            recognition.continuous = true;
            recognition.interimResults = true;
            recognition.onresult = handleRecognitionResult;
            recognition.onerror = handleError;
            recognition.onend = handleRecognitionEnd;
            micIcon.classList.remove('fa-microphone');
            micIcon.classList.add('fa-times');
            tooltip.textContent = 'Voice recognition is on';
            recognition.start();
        } else {
            recognition.stop();
            recognition = null;
            micIcon.classList.remove('fa-times');
            micIcon.classList.add('fa-microphone');
            tooltip.textContent = 'Click the icon to start voice recognition.';
        }
    }

    function handleRecognitionResult(event) {
        const transcript = Array.from(event.results)
            .map(result => result[0].transcript)
            .join('');

        voiceInput.value = transcript;
    }

    function handleError(event) {
        console.error('Speech recognition error:', event.error);
        tooltip.textContent = 'Speech recognition error. Please try again.';
    }

    function handleRecognitionEnd() {
        recognition = null;
        micIcon.classList.remove('fa-times');
        micIcon.classList.add('fa-microphone');
        tooltip.textContent = 'Click the icon to start voice recognition.';
    }
</script>





















<!----------------------------

              Add New Letter

            ---------------------------->

<div class="offcanvas offcanvas-bottom offcanvas-h-custom-90" tabindex="-1" id="new_letter"
    aria-labelledby="offcanvasBottomLabel">

    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
            class="fa-regular fa-circle-down"></i> Close</button>



    <div class="offcanvas-header">

        <h5 class="offcanvas-title" id="offcanvasBottomLabel"> <i class="fa-regular fa-file-lines"></i> New
            Letter </h5>

        <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-regular fa-circle-down"></i></button> -->

    </div>

    <div class="offcanvas-body small">

        <div class="main_box_offcanvas">

            <h6 class="patient_on_">On Patient <span>Avi Singh</span></h6>

            <div class="row top_head_letter">

                <div class="col-lg-4">

                    <div class="inner_element">

                        <div class="form-group">

                            <label class="form-label">Select a Note</label>

                            <select class="form-control select2_note">

                                <option value="">&nbsp;</option>

                                <option value="">Note Sat, 21 Oct,2023</option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="inner_element">

                        <div class="form-group">

                            <label class="form-label">Address this letter to</label>

                            <select class="form-control select2_note">

                                <option value="">&nbsp;</option>

                                <option value="">&nbsp;</option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="inner_element mt-4">

                        <div class="form-group">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">

                                <label class="form-check-label" for="flexCheckDefault4">

                                    Import text from the selected episode

                                </label>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="diagnosis_main_box new_letter_box">

                <div class="inner_element">

                    <div class="form-group">

                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">

                            <label class="form-check-label" for="flexCheckDefault5">

                                To Patient

                            </label>

                        </div>

                    </div>

                </div>

                <div class="inner_element">

                    <div class="form-group">

                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6" disabled>

                            <label class="form-check-label" for="flexCheckDefault6">

                                To NOK

                            </label>

                        </div>

                    </div>

                </div>

                <div class="inner_element">

                    <div class="form-group">

                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7" disabled>

                            <label class="form-check-label" for="flexCheckDefault7">

                                To GP

                            </label>

                        </div>

                    </div>

                </div>

                <div class="inner_element mt-1">

                    <div class="form-group">

                        <p class="add_contact" id="add_address_new">Contact not in list? <a href="#">Add
                                New</a></p>

                    </div>

                </div>



            </div>

            <div class="row top_head_letter add_contact_details" id="add_address_new_form">

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Title</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">First Name</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Last Name</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Designation</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Address</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Email Address</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Phone</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Mobile</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Fax</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element mt-4">

                        <div class="form-group">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">

                                <label class="form-check-label" for="flexCheckDefault11">

                                    This is patient's GP

                                </label>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-12">

                    <div class="action_save_address">

                        <!-- <button type="submit" class="btn btn-primary  edit__green">Edit</button> -->

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">Save</button>

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            id="cancel_btn_address">Cancel</button>

                    </div>

                </div>

            </div>

            <div class="row top_head_letter">

                <div class="col-lg-5">

                    <div class="inner_element">

                        <div class="form-group">

                            <label class="form-label">Click here to select people to copy in</label>

                            <select class="form-control select2_note">

                                <option value="">&nbsp;</option>

                                <option value="">&nbsp;</option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="col-lg-5">

                    <div class="inner_element">

                        <div class="form-group">

                            <label class="form-label">Paste Canned Text Snippest</label>

                            <select class="form-control select2_note">

                                <option value="">EVLT-GSV</option>

                                <option value="">IR-THYROID ABLATION</option>

                                <option value="">PRP KNEE INJECTION</option>

                                <option value="">PRP KNEE INJECTION</option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="col-lg-2">

                    <div class="inner_element">

                        <div class="form-group">

                            <a href="#" class="paste_btn">Paste this Template</a>

                        </div>

                    </div>

                </div>



            </div>



            <div class="payg_">

                <p><a href="#" class="mic_btn"><i class="fa-solid fa-microphone"></i></a> Add a voice
                    note</p>

            </div>



            <div class="row top_head_letter">

                <div class="col-lg-12">

                    <div class="mt-3 form-group">

                        <textarea class="form-control" placeholder="" style="height:200px"></textarea>

                    </div>

                </div>

                <div class="col-lg-12 mt-3 mb-3">

                    <div class="form-group">

                        <input type="search" class="form-control sign_input" id=""
                            placeholder="Signature Text - e.g Yours Sincerely, Your Name, Designation, Electronically Signed  etc. ">

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <div class="form-check" id="sign_btn_upload">

                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8">

                                <label class="form-check-label" for="flexCheckDefault8">

                                    Include Signature Image

                                </label>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault9">

                                <label class="form-check-label" for="flexCheckDefault9">

                                    Include Diagnoses & Drugs

                                </label>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10">

                                <label class="form-check-label" for="flexCheckDefault10">

                                    Cc Patient

                                </label>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-12 mt-3" id="sign_upload">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Upload Signature Image</label>

                            <input name="file1" type="file" class="dropify" data-height="100" />

                        </div>

                    </div>

                </div>

            </div>



        </div>

    </div>

    <div class="offcanvas-footer">

        <div class="frmbtn_areasubmit">

            <!-- <button type="submit" class="btn btn-primary  edit__green">Edit</button> -->

            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient"
                data-bs-dismiss="offcanvas">Save</button>

            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                data-bs-dismiss="offcanvas">Close</button>

        </div>

    </div>

</div>







<!----------------------------

                    Add Vitals

            ---------------------------->

<div class="offcanvas offcanvas-bottom offcanvas-h-custom-80" tabindex="-1" id="add_vitals"
    aria-labelledby="offcanvasBottomLabel">

    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
            class="fa-regular fa-circle-down"></i> Close </button>



    <div class="offcanvas-header">

        <h5 class="offcanvas-title" id="offcanvasBottomLabel"><i class="fa-solid fa-temperature-three-quarters"></i>
            Enter Vitals </h5>

        <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-regular fa-circle-down"></i></button> -->

    </div>

    <div class="offcanvas-body small p-0">

        <div class="main_box_offcanvas vitals_add_box">

            <div class="row top_head_vitals">

                <div class="col-lg-9 left_side_cnt_mm">
                    <form id="add_measurement">
                        @csrf
                        <input type="hidden" name="patient_id" value="{{ @$id }}">
                        <div class="row">

                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <div class="form-group">



                                        <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"
                                            name="date">
                                        <span id="dateError" style="color: red;font-size:small"></span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <div class="form-group">



                                        <select class="form-control select2_vitals" name="measurement">

                                            <option value="">Choose a measurement...</option>

                                            <option value="Weight">Weight</option>

                                            <option value="Height">Height</option>

                                            <option value="BMI">BMI</option>

                                            <option value="Waist Circumference">Waist Circumference</option>

                                            <option value="SBP">SBP</option>

                                            <option value="DBP">DBP</option>

                                            <option value="Temperature">Temperature</option>

                                            <option value="Pulse">Pulse</option>

                                            <option value="GCS">GCS</option>

                                            <option value="MMS">MMS</option>

                                            <option value="Visceral Fat">Visceral Fat</option>

                                            <option value="Resting Heart Rate">Resting Heart Rate</option>

                                            <option value="Thigh circumference">Thigh circumference</option>

                                            <option value="MUAC circumference">MUAC circumference</option>

                                            <option value="Waist circumference">Waist circumference</option>

                                            <option value="Neck circumference">Neck circumference</option>

                                        </select>
                                        <span id="measurementError" style="color: red;font-size:small"></span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <input type="text" class="form-control" id="" placeholder="Value" name="value">
                                        <span id="valueError" style="color: red;font-size:small"></span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <button type="submit"
                                        class="btn r-04 btn--theme hover--tra-black add_patient add_vitals_btn">Add
                                        Vitals<i class="fa-solid fa-arrow-right-to-bracket"></i></button>

                                </div>

                            </div>

                        </div>
                    </form>
                    <div class="col-lg-12">

                        <div class="add_data_diagnosis">

                            <table class="table table-striped table-bordered" id="measurement_table">

                                <tr>

                                    <th>Date</th>

                                    <th>Measurement</th>

                                    <th>Value </th>

                                    <th>Action</th>

                                </tr>
                                <tbody id="measurement_table_body"></tbody>





                                <!-- <tr>

                            <td>15 Nov, 2023</td>

                            <td>Height</td>

                            <td>172</td>

                        

                            <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                        </tr>

                        <tr>

                            <td>15 Nov, 2023</td>

                            <td>Weight</td>

                            <td>70</td>

                            

                            <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                        </tr> -->

                            </table>

                        </div>

                    </div>

                </div>



                <div class="col-lg-3 right_side_cnt_mm">

                    <div class="inner_element">

                        <div class="form-group">



                            <select class="form-control select2_vitals">

                                <option value="">&nbsp;</option>

                                <option value="">Weight</option>

                                <option value="">Height</option>

                                <option value="">BMI</option>

                                <option value="">Waist Circumference</option>

                                <option value="">SBP</option>

                                <option value="">DBP</option>

                                <option value="">Temperature</option>

                                <option value="">Pulse</option>

                                <option value="">GCS</option>

                                <option value="">MMS</option>

                                <option value="">Visceral Fat</option>

                                <option value="">Resting Heart Rate</option>

                                <option value="">Thigh circumference</option>

                                <option value="">MUAC circumference</option>

                                <option value="">Waist circumference</option>

                                <option value="">Neck circumference</option>

                            </select>

                        </div>

                    </div>



                    <div id="line_chart_basic" class="apex-charts" dir="ltr"></div>

                </div>

            </div>



        </div>

    </div>

    <div class="offcanvas-footer">

        <div class="frmbtn_areasubmit">

            <!-- <button type="submit" class="btn btn-primary  edit__green">Edit</button> -->

            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient"
                data-bs-dismiss="offcanvas">Save</button>

            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                data-bs-dismiss="offcanvas">Close</button>

        </div>

    </div>

</div>













<!---- prescription_day model ---->

<div class="modal fade edit_patient__" id="prescription_day" tabindex="-1" aria-labelledby="exampleModalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Prescription a day</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="prescription_day_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />

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
                                    <div class="col-lg-12">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Prescription</label>
                                            <textarea class="form-control" placeholder="" style="height:150px"
                                                name="prescription"></textarea>
                                            <span id="prescriptionError" style="color: red;font-size:small"></span>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="action text-end bottom_modal">
                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">
                            Save</button>
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


<!------Order Special Invistigation model ---->

<div class="modal fade edit_patient__" id="order_supportive_surface" tabindex="-1" aria-labelledby="exampleModalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel"> Order Special Invistigation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="order_supportive_surface_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />

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
                                    <div class="col-lg-12">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Write Special
                                                Invistigation</label>
                                            <textarea class="form-control" placeholder="" style="height:150px"
                                                name="invistigation"></textarea>
                                            <span id="invistigationError" style="color: red;font-size:small"></span>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="action text-end bottom_modal">
                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">
                            Save</button>
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




<!------Order Order Procedure model ---->
<div class="modal fade edit_patient__" id="order_procedure" tabindex="-1" aria-labelledby="exampleModalLabel"
    style="display: none;" data-select2-id="order_procedure" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel"> Order Procedure</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="order_procedure_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />

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
                                    <div class="mb-3 form-group">
                                        <label for="validationCustom01" class="form-label">Select
                                            Procedure</label>
                                        <select class="form-control select2_procedure" name="procedure">
                                            <option value="Consent Form">Consent Form</option>
                                            <option value="Pre-Procedure Order">Pre-Procedure Order</option>
                                            <option value="Procedure Record">Procedure Record</option>
                                            <option value="Discharge Order">Discharge Order</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Type your entry
                                                here</label>
                                            <textarea class="form-control" placeholder="" style="height:100px"
                                                name="entry"></textarea>
                                            <span id="entryError" style="color: red;font-size:small"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Write
                                                Summary</label>
                                            <textarea class="form-control" placeholder="" style="height:100px"
                                                name="summary"></textarea>
                                            <span id="summaryError" style="color: red;font-size:small"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="action text-end bottom_modal">
                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">
                            Save</button>
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


<!----------------------------

                  invoice canvas modal #invoice page action to open canvas

            ---------------------------->

<div class="offcanvas offcanvas-bottom offcanvas-h-custom-80  centercanvas" tabindex="-1" id="user-invoice"
    aria-labelledby="offcanvasBottomLabel">

    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
            class="fa-regular fa-circle-down"></i> Close</button>



    <div class="offcanvas-body small p-0">

        <div class="invoicenotedet_box">

            <div class="invoice_notebox_header">

                <div class="invuser_nametopay">

                    <h1>Jansh Brown | Invoice Number RUHF5TJ</h1>

                </div>



                <div class="fullypaid_invbox">

                    <button type="button" class="ft_buttonshoover">Mark Fully Paid</button>

                </div>

            </div>



            <div class="invuserinvoice_middle">

                <table class="rwd-table">

                    <thead>

                        <tr>

                            <th>Inv Total</th>

                            <th>Balance</th>

                            <th>Amount Paid</th>

                            <th>Date Paid</th>

                            <th>Payment Method</th>

                        </tr>

                    </thead>

                    <tbody>



                        <tr>

                            <td data-th="Supplier Code">

                                AED 100.00

                            </td>

                            <td data-th="Supplier Name">

                                AED 100.00

                            </td>

                            <td data-th="Invoice Number">

                                <div class="amountpaid_input input_width"><input type="text"
                                        class="form-control comoninpt_border"></div>

                            </td>

                            <td data-th="Invoice Date ">

                                <div class="invdate_input input_width"><input type="text"
                                        class="form-control datepickerInput comoninpt_border" placeholder="20/11/2023">
                                    <iconify-icon icon="solar:calendar-linear"></iconify-icon>
                                </div>

                            </td>

                            <td data-th="Due Date">

                                <div class="paymenttype_select">

                                    <select name="" id="">

                                        <option value="">BACS</option>

                                        <option value="">Cheque</option>

                                        <option value="">Cash</option>

                                        <option value="">Card</option>

                                        <option value="">Credit</option>

                                    </select>

                                </div>

                            </td>



                        </tr>



                    </tbody>

                </table>

            </div>



            <div class="newbalance_area">

                <div class="balance_amount_number">
                    <h1>New Balance : </h1> <span>AED 100.00</span>
                </div>



                <div class="type_noteforinv_user">

                    <div class="custom_textareadet">

                        <label for="exampleFormControlTextarea1" class="form-label">Add Note</label>

                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Type any notes related to this invoice here..."></textarea>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="offcanvas-footer">

        <div class="frmbtn_areasubmit">

            <!-- <button type="submit" class="btn btn-primary  edit__green">Edit</button> -->

            <a href="invoicing.php">

                <button type="submit" class="btn cmncanvasft_buttons r-04 btn--theme hover--tra-black add_patient">Save
                    Note</button>

            </a>

            <a href="invoicing.php">

                <button type="submit"
                    class="btn cmncanvasft_buttons r-04 btn--theme hover--tra-black  secondary_btn">Save</button>

            </a>

        </div>

    </div>

</div>

<!-- invoice canvas modal end -->



<!----------------------------
     Symptoms
---------------------------->

<div class="modal fade edit_patient__" id="symptoms_add2" tabindex="-1" aria-labelledby="exampleModalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Severity Symptoms Scale </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    fdprocessedid="0d6mcr"><i class="fa-solid fa-xmark"></i></button>
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
                            <div class="add_categoryweb">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="validationCustom01" class="form-label">Type Symptoms</label>
                                        <div class="category-container" id="category-container-1">
                                            <input type="text" class="form-control category-input"
                                                placeholder="Type Symptoms here..." fdprocessedid="b2lsu">
                                            <button
                                                class="btn r-04 btn--theme hover--tra-black add_patient add-category"
                                                type="button" fdprocessedid="30sk7"><i class="fa-solid fa-plus"></i>
                                                Add</button>
                                        </div>
                                        <div class="categories-list" id="categories-list-1">
                                            <!-- Categories will be displayed here -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 form-group">
                                <label for="validationCustom01" class="form-label">Write Summary</label>
                                <textarea class="form-control" placeholder="" style="height:150px"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="action text-end bottom_modal">
                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">
                        Save</a>
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




@endsection
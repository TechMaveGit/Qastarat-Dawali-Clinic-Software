<!doctype html>

<html lang="en">

<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SITE TITLE -->

    <title>Patient Dashboard</title>



    <!-- FAVICON AND TOUCH ICONS -->

    <link class="dark-theme-img" rel="icon" href="{{ asset('/assets/images/new-images/logofwhite.png') }}" type="image/x-icon">



    <!-- GOOGLE FONTS -->

    <!-- <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- BOOTSTRAP CSS -->

    <link href="{{ asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">





    <!-- Dropify css -->

    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

    <!-- flatpicker time -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">

    <!-- form plugin field css -->

    <link href="{{ asset('/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ asset('/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

    <link href="{{ asset('/assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet"
        type="text/css">

    <link href="{{ asset('/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}"
        rel="stylesheet">



    <!-- DataTables -->

    <link href="{{ asset('/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css" />

    <link href="{{ asset('/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css" />



    <!-- Responsive datatable examples -->

    <link href="{{ asset('/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css" />



    <!-- FONT ICONS -->

    <link href="{{ asset('/assets/css/flaticon.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- PLUGINS STYLESHEET -->

    <link href="{{ asset('/assets/css/menu.css')}}" rel="stylesheet">

    <link id="effect" href="{{ asset('/assets/css/dropdown-effects/fade-down.css')}}" media="all"
        rel="stylesheet">

    <link href="{{ asset('/assets/css/magnific-popup.css')}}" rel="stylesheet">

    <link href="{{ asset('/assets/css/owl.carousel.min.css')}}" rel="stylesheet">

    <link href="{{ asset('/assets/css/owl.theme.default.min.css')}}" rel="stylesheet">

    <link href="{{ asset('/assets/css/lunar.css')}}" rel="stylesheet">



    <!-- ON SCROLL ANIMATION -->

    <link href="{{ asset('/assets/css/animate.css')}}" rel="stylesheet">



    <!-- TEMPLATE CSS -->

    <link href="{{ asset('/assets/css/violet-theme.css')}}" rel="stylesheet">



    <!-- Style Switcher CSS -->

    <link href="{{ asset('/assets/css/blue-theme.css')}}" rel="alternate stylesheet" title="blue-theme">

    <link href="{{ asset('/assets/css/crocus-theme.css')}}" rel="alternate stylesheet" title="crocus-theme">

    <link href="{{ asset('/assets/css/green-theme.css')}}" rel="alternate stylesheet" title="green-theme">

    <link href="{{ asset('/assets/css/magenta-theme.css')}}" rel="alternate stylesheet" title="magenta-theme">

    <link href="{{ asset('/assets/css/pink-theme.css')}}" rel="alternate stylesheet" title="pink-theme">

    <link href="{{ asset('/assets/css/purple-theme.css')}}" rel="alternate stylesheet" title="purple-theme">

    <link href="{{ asset('/assets/css/skyblue-theme.css')}}" rel="alternate stylesheet" title="skyblue-theme">

    <link href="{{ asset('/assets/css/red-theme.css')}}" rel="alternate stylesheet" title="red-theme">

    <link href="{{ asset('/assets/css/custom.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

    <link rel="stylesheet" href="{{ asset('/assets/css/sumoselect.css')}}">

    <!-- RESPONSIVE CSS -->

    <link href="{{ asset('/assets/css/responsive.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">

    <!-- sweetalert2 asset CSS and JS -->

    <script src="{{ asset('/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <link rel="stylesheet" href="{{ asset('/assets/libs/sweetalert2/sweetalert2.min.css')}}">
    <!--summer note text editor-->


</head>









<body>











    <!-- PRELOADER SPINNER

  ============================================= -->

    <!-- <div id="loading" class="loading--theme">

   <div id="loading-center"><span class="loader"></span></div>

  </div> -->



    <!-- STYLE SWITCHER

  ============================================= -->

    <!-- <div id="stlChanger">

   <div class="blockChanger bgChanger">

            <a href="#" class="chBut icon-xs"><span class="flaticon-control-panel"></span></a>

                <div class="chBody white-color">



                <div class="stBlock text-center" style="margin: 30px 20px 20px 26px;">

      <div class="stBgs">

       <p class="switch"></p>





      </div>

     </div>

    </div>

   </div>

  </div>	 -->

    <!-- END SWITCHER -->

    <!-- PAGE CONTENT

  ============================================= -->

    <div id="page" class="page font--jakarta">









        <!-- HEADER

   ============================================= -->

        <header id="header" class="tra-menu navbar-dark light-hero-header white-scroll">

            <div class="header-wrapper">





                <!-- MOBILE HEADER -->

                <div class="wsmobileheader clearfix">
                    <span class="smllogo"><img src="{{ asset('/assets/images/new-images/qastara-logo-new.png') }}" alt="mobile-logo"></span>
                    <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
                </div>





                <!-- NAVIGATION MENU -->

                <div class="wsmainfull menu clearfix">

                    <div class="wsmainwp clearfix">





                        <!-- HEADER BLACK LOGO -->

                        <div class="desktoplogo">
                            <a href="{{ route('patient.dashboard') }}" class="logo-black">
                                <img class="light-theme-img" src="{{ asset('/assets/images/new-images/logofwhite.png') }}" alt="logo light">
                                <img class="dark-theme-img" src="{{ asset('/assets/images/new-images/logofwhite.png') }}" alt="logo dark">
                            </a>
                        </div>



                        <!-- HEADER WHITE LOGO -->

                        <!-- <div class="desktoplogo">

 <a href="#hero-15" class="logo-white"><img src="images/new-images/qastrat-logo2.png" alt="logo"></a>

 </div> -->



                        <div class="right_side_box">

                            <!-- MAIN MENU -->

                            <nav class="wsmenu clearfix">

                                <ul class="wsmenu-list nav-theme">





                                    <!-- DROPDOWN SUB MENU -->

                                    <!-- <li aria-haspopup="true"><a href="#" class="h-link">Home<span class="wsarrow"></span></a>

 <ul class="sub-menu">

 <li aria-haspopup="true"><a href="#features-2">Why Martex?</a></li>

 <li aria-haspopup="true"><a href="#lnk-1">Best Solutions</a></li>

 <li aria-haspopup="true"><a href="#lnk-2">How It Works</a></li>

 <li aria-haspopup="true"><a href="#lnk-3">Integrations</a></li>

 <li aria-haspopup="true"><a href="#reviews-2">Testimonials</a></li>

      </ul>

        </li> -->




                                    <!-- SIMPLE NAVIGATION LINK -->

                                    {{-- <li class="nl-simple" aria-haspopup="true"><a href="#"
                                            class="h-link">Messages</a></li> --}}



                                    <!-- SIMPLE NAVIGATION LINK -->



                                 


                                    <!-- SIMPLE NAVIGATION LINK -->

                                    {{-- <li class="nl-simple {{ Request::segment(2) == 'invoice' ? 'active' : '' }}"
                                        aria-haspopup="true"><a href="{{ route('user.invoice') }}"
                                            class="h-link">Invoices</a></li> --}}



                                    <!-- SIMPLE NAVIGATION LINK -->

                                    <li class="nl-simple {{  request()->routeIs('front.service.page') ? 'active': '' }}"
                                        aria-haspopup="true"><a href="{{ route('front.service.page') }}"
                                            class="h-link">Services</a></li>



                                    <!-- SIMPLE NAVIGATION LINK -->

                                    {{-- <li class="nl-simple" aria-haspopup="true"><a href="#"
                                            class="h-link">Services</a></li> --}}



                                    <!-- SIMPLE NAVIGATION LINK -->

                                    <!-- <li class="nl-simple" aria-haspopup="true"><a href="#" class="h-link">Contact Us</a></li> -->

                                    <!-- SIGN IN LINK -->

                                    <!-- <li class="nl-simple reg-fst-link mobile-last-link" aria-haspopup="true">

       <a href="login.php" class="h-link login_btn">Login</a>

       </li> -->









                                </ul>

                            </nav> <!-- END MAIN MENU -->

                            <div class="profile_box">

                                <div class="profile">



                                    <div class="img-box">
                                    @isset($patient->patient_profile_img)
                                    <img src="{{ asset('/assets/patient_profile/' . $patient->patient_profile_img) }}"
                                    alt="">
                                    @endisset
                                      

                                    </div>

                                    <div class="user">

                                        <h3 class="h-link text-white">{{ auth('web')->user()->name ?? '' }}</h3>

                                    </div>

                                </div>

                                <div class="menu menu__">

                                    <ul>

                                        <li><a href="#"><i class="fa-solid fa-user"></i>&nbsp;Profile</a></li>

                                        <li><a href="#"><i class="fa-solid fa-house"></i>&nbsp;Dashboard</a>
                                        </li>
                                        @auth('web')
                                            @if (Auth::user()->role == 'user')
                                                <li><a href="{{ route('patient.logout') }}"><i
                                                            class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;Sign
                                                        Out</a></li>
                                            @endif
                                        @endauth

                                        {{-- @auth('admin')
											<li><a href="{{ route('admin.logout') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;Sign Out</a></li>
										@endauth --}}


                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                </div> <!-- END NAVIGATION MENU -->





            </div> <!-- End header-wrapper -->

        </header> <!-- END HEADER -->






        <div class="sub_bnr" style="background-image: url({{ asset('/assets/images/hero-15.jpg') }});">

            <div class="sub_bnr_cnt">

                <h1>Patient <span class="blue_theme"> Details</span> </h1>

                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{ route('patient.dashboard') }}" >Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('patient.dashboard') }}" >Patient</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Patient Details</li>

                    </ol>

                </nav>

                {{-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-toggle="modal" data-bs-target="#add_patient">+ Add New Patient </a> --}}

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

                                    <a href="#" class="action_btn_tooltip patient_edit" data-bs-toggle="modal"
                                        data-bs-target="#edit_patient">

                                        <iconify-icon icon="material-symbols:edit"></iconify-icon>

                                        <span class="toolTip">Edit Patient Info.</span>

                                    </a>

                                    {{-- <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#create_appointment">

                            <iconify-icon icon="formkit:date"></iconify-icon>

                            <span class="toolTip">Make an Appointment</span>

                        </a> --}}

                                    <!-- <a href="#" class="action_btn_tooltip">

                            <iconify-icon icon="ph:envelope-open-light" data-bs-toggle="modal" data-bs-target="#send_message"></iconify-icon>

                            <span class="toolTip">Send a Message</span>

                        </a> -->

                                    {{-- <a href="{{ route('user.patient') }}" class="action_btn_tooltip">

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

                                <img src="{{ asset('/assets/patient_profile/' . $patient->patient_profile_img) }}"
                                    alt="">




                                <div class="patient_dt_profile">

                                    <h5 class="patient_name__">{{ $patient->sirname }} {{   $patient->name }} </h5>

                                    @php
                                        use Carbon\Carbon;
                                    
                                        $patientBirthDate = null;
                                        if (isset($patient->birth_date) && !empty($patient->birth_date)) {
                                            try {
                                                $birthDate = Carbon::createFromFormat('Y-m-d', date('Y-m-d', strtotime($patient->birth_date)));
                                                $patientBirthDate = $birthDate->diffInYears(Carbon::now());
                                            } catch (\Exception $e) {
                                                // Handle the exception if the date format is incorrect
                                                $patientBirthDate = null;
                                            }
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

                                </ul>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-7">

                        <div class="appointments___list">

                            <h3 class="sub_title__">Appointments    </h3>

                            <ul>
                                @foreach ($Patient_appointments as $Patient_appointment)
                                    <li>

                                        <div class="appoin_title">

                                            <h6>{{ $Patient_appointment->appointment_type }} </h6>
                                            @php
                                              $doctorName=DB::table('doctors')->where('id',$Patient_appointment->doctor_id)->first();
                                            @endphp
                                            <p class="hover-primary text-fade mb-1 fs-14">{{ $doctorName->name??'' }}</p>
                                        </div>

                                        <div class="appoin_date">

                                            <p>{{ $Patient_appointment->date }} <span
                                                    class="appoin_time">{{ $Patient_appointment->start_time }}</span>
                                            </p>


                                        </div>

                                    </li>
                                @endforeach

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
            $footer = App\Models\Footer::first();
        @endphp

        <!-- FOOTER CONTENT -->

        <div class="row">

            <!-- FOOTER LOGO -->

            <!-- FOOTER LOGO -->
            <div class="col-xl-3">
                <div class="footer-info mb-0">
                    <img class="footer-logo" src="{{ asset('/assets/images/new-images/logofwhite.png') }}"
                        alt="footer-logo">
                    <img class="footer-logo-dark" src="{{ asset('/assets/images/new-images/qastrat-logo2.png') }}"
                        alt="footer-logo">
                </div>
                <p class="intro_para">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore inventore
                    sapiente corporis voluptates at rerum.</p>
            </div>

            <!-- FOOTER LINKS -->
            <div class="col-sm-4 col-lg-3 col-xl-2">
                <div class="footer-links fl-1">

                    <!-- Title -->
                    <h6 class="s-17 w-700">Quick Links</h6>

                    <!-- Links -->
                    <ul class="foo-links clearfix">
                        <li>
                            <p><a href="#">Home</a></p>
                        </li>
                        <li>
                            <p><a href="#">Patients</a></p>
                        </li>
                        <li>
                            <p><a href="#">Services</a></p>
                        </li>
                        <li>
                            <p><a href="#">Contact Us</a></p>
                        </li>
                    </ul>

                </div>
            </div> <!-- END FOOTER LINKS -->


            <!-- FOOTER LINKS -->
            <div class="col-sm-4 col-lg-3 col-xl-2">
                <div class="footer-links fl-3">

                    <!-- Title -->
                    <h6 class="s-17 w-700">Legal</h6>

                    <!-- Links -->
                    <ul class="foo-links clearfix">
                        <li>
                            <p><a href="#">Terms of Use</a></p>
                        </li>
                        <li>
                            <p><a href="#">Privacy Policy</a></p>
                        </li>
                        <li>
                            <p><a href="#">Cookie Policy</a></p>
                        </li>

                    </ul>

                </div>
            </div> <!-- END FOOTER LINKS -->

            <!-- FOOTER LINKS -->
            <div class="col-sm-4 col-lg-3 col-xl-2">
                <div class="footer-links fl-3">

                    <!-- Title -->
                    <h6 class="s-17 w-700">Quick Connect</h6>

                    <!-- Links -->
                    <ul class="foo-links clearfix address_ul">
                        <li><i class="fa-solid fa-location-dot"></i>
                            <p><a href="#">Main Branch Muscat - OMAN</a></p>
                        </li>
                        <li><i class="fa-solid fa-envelope"></i>
                            <p><a href="mailto:admin@qastaratclinics.com">admin@qastaratclinics.com</a></p>
                        </li>
                        <li><i class="fa-solid fa-phone"></i>
                            <p><a href="tel:+971581114000">+971581114000</a></p>
                        </li>

                    </ul>

                </div>
            </div> <!-- END FOOTER LINKS -->



            <!-- FOOTER NEWSLETTER FORM -->
            <div class="col-sm-10 col-md-8 col-lg-4 col-xl-3">
                <div class="footer-form">

                    <!-- Title -->
                    <h6 class="s-17 w-700">Follow the Best</h6>

                    <!-- Newsletter Form Input -->
                    <form class="newsletter-form">

                        <div class="input-group r-06">
                            <input type="email" class="form-control" placeholder="Email Address" required
                                id="s-email">
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
                        <li><a href="#"><span class="fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa-brands fa-x-twitter"></span></a></li>
                        <li><a href="#"><span class="fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa-brands fa-linkedin-in"></span></a></li>
                    </ul>
                </div>
                <!-- <i class="fa-brands fa-x-twitter"></i>
       <i class="fa-brands fa-facebook-f"></i>
       <i class="fa-brands fa-instagram"></i>
       <i class="fa-brands fa-linkedin-in"></i> -->
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

                                            <h4>Basic Info</h4>
                                            <div class="mb-3 form-group">

                                                <label for="validationCustom01" class="form-label">Profile
                                                    Image</label>

                                                <input type="file" class="form-control" id=""
                                                    placeholder=" " name="profile_image" id="profile_image">
                                                <span id="profile_imageError"
                                                    style="color: red;font-size:smaller"></span>
                                                <!-- @error('profile_image')
    <span class="alert alert-danger">{{ $message }}</span>
@enderror -->
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
@enderror -->

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
@enderror -->
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
@enderror -->
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
@enderror -->
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
@enderror -->
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
@enderror -->
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

                                                <input type="file" class="form-control" id=""
                                                    placeholder=" " name="profile_image" id="profile_image">
                                                <span id="profile_imageError"
                                                    style="color: red;font-size:smaller"></span>
                                                <!-- @error('profile_image')
    <span class="alert alert-danger">{{ $message }}</span>
@enderror -->
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

                                            <select class="form-control select2_edit_info" name="patient_insurer"
                                                id="patient_insurer">

                                            </select>

                                            <span id="patient_insurerError"
                                                style="color: red;font-size:smaller"></span>

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

                                            <input type="text" class="form-control" id="patient_gp"
                                                placeholder="" name="patient_gp">
                                            <span id="patient_gpError" style="color: red;font-size:smaller"></span>

                                        </div>

                                    </div>



                                    <div class="col-lg-12">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Additional
                                                Info.</label>

                                            <textarea class="form-control" placeholder="" style="height: 100px" id="patient_additional_info"
                                                name="patient_additional_info"></textarea>
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

                                    <div class="col-lg-12">

                                        <div class="title_head">

                                            <h4>Document Type</h4>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <label for="validationCustom01" class="form-label">Select Document</label>

                                        <select class="form-control select2_edit_info" name="patient_document_type"
                                            id="patient_document_type">

                                            <option value="Passport">Passport</option>

                                            <option value="Address proof">Address proof</option>



                                        </select>
                                        <span id="patient_document_typeError"
                                            style="color: red;font-size:smaller"></span>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Patient ID</label>

                                            <input type="text" class="form-control" id="patient_edit_id"
                                                placeholder="" name="patient_edit_id">
                                            <span id="patient_edit_idError"
                                                style="color: red;font-size:smaller"></span>
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

    <div class="modal fade edit_patient__" id="create_appointment" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

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

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                            data-bs-dismiss="modal">

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

    <div class="modal fade edit_patient__" id="insure_add_edit" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

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

                                        <input type="text" class="form-control insurer_name" id=""
                                            placeholder="" name="insurer_name">
                                        <span id="insurer_nameError" style="color: red;font-size:small"></span>

                                    </div>

                                </div>



                                <div class="col-lg-12">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Insurance Number</label>

                                        <input type="text" class="form-control insurer_number" id=""
                                            placeholder="" name="insurer_number">
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

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                            data-bs-dismiss="modal">

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

    <div class="modal fade edit_patient__" id="executive_summary" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

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

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                            data-bs-dismiss="modal">

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
                                                <input type="hidden" name="patient_id"
                                                    value="{{ @$id }}" />
                                                <div class="category-container" id="category-container-1">

                                                    <input type="text" class="form-control category-input"
                                                        placeholder="Type Symptoms here..." name="symptom_name">
                                                    <span id="symptom_nameError"
                                                        style="color: red;font-size:small"></span>

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

                                                <textarea class="form-control" placeholder="" style="height:150px" name="write_text"></textarea>
                                                <span id="write_textError"
                                                    style="color: red;font-size:small"></span>

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

    <div class="modal fade edit_patient__" id="medicine_add_edit" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

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

                                            <input type="search" class="form-control" id=""
                                                placeholder="" name="drug_name">

                                            <button class="btn search_btn">

                                                <iconify-icon icon="prime:search-plus"
                                                    width="24"></iconify-icon>

                                            </button>
                                            <span id="drug_nameError" style="color: red;font-size:small"></span>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-3">

                                    <div class="inner_element">

                                        <div class="form-group">

                                            <label for="validationCustom01" class="form-label">Frequency</label>

                                            <input type="search" class="form-control" id=""
                                                placeholder="" name="frequency">
                                            <span id="frequencyError" style="color: red;font-size:small"></span>


                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-2">

                                    <div class="inner_element">

                                        <div class="form-group">

                                            <label for="validationCustom01" class="form-label">Today Date</label>

                                            <input type="text" class="form-control datepickerInput"
                                                placeholder="dd M, yyyy" name="today_date">
                                            <span id="today_dateError" style="color: red;font-size:small"></span>

                                        </div>

                                    </div>

                                </div>



                                <div class="col-lg-2">

                                    <div class="inner_element">

                                        <div class="form-group">

                                            <label for="validationCustom01" class="form-label">Duration</label>

                                            <input type="search" class="form-control" id=""
                                                placeholder="" name="duration">

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

                                            <input type="text" class="form-control datepickerInput"
                                                placeholder="dd M, yyyy" name="stopped_date">
                                            <span id="stopped_dateError" style="color: red;font-size:small"></span>
                                        </div>

                                    </div>

                                </div>



                                <div class="col-lg-3">

                                    <div class="inner_element">

                                        <div class="form-group">

                                            <label for="validationCustom01" class="form-label">Code</label>

                                            <input type="search" class="form-control" id=""
                                                placeholder="" name="drug_code">

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

                 allergies add

            ---------------------------->

    <div class="modal fade " id="allergies_add" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

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

                                                    <input type="text" name="allergy"
                                                        class="form-control category-input"
                                                        placeholder="Type Allergy here...">
                                                    <span id="allergy_nameError"
                                                        style="color: red;font-size:small"></span>

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

                                            <input type="search" class="form-control" id=""
                                                placeholder="">

                                            <button class="btn search_btn">

                                                <iconify-icon icon="prime:search-plus"
                                                    width="24"></iconify-icon>

                                            </button>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="inner_element">

                                        <div class="form-group">

                                            <label for="validationCustom01" class="form-label">Date</label>

                                            <div class="input-group" id="datepicker20">



                                                <input type="text" class="form-control"
                                                    placeholder="dd M, yyyy" data-date-format="dd M, yyyy"
                                                    data-date-container='#datepicker20' data-provide="datepicker">

                                            </div>

                                            <!-- <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"> -->

                                        </div>



                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="inner_element">

                                        <div class="form-group">

                                            <label for="validationCustom01" class="form-label">Comment</label>

                                            <input type="search" class="form-control" id=""
                                                placeholder="">



                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="inner_element">

                                        <div class="form-group">

                                            <label for="validationCustom01" class="form-label">SNOMED</label>

                                            <input type="search" class="form-control" id=""
                                                placeholder="">



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



                                                <input type="text" class="form-control"
                                                    placeholder="dd M, yyyy" data-date-format="dd M, yyyy"
                                                    data-date-container='#datepicker21' data-provide="datepicker"
                                                    name="future_date">

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

                                                <textarea class="form-control" placeholder="" style="height:150px" name="future_write"></textarea>
                                                <span id="future_writeError"
                                                    style="color: red;font-size:small"></span>

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

    <div class="modal fade edit_patient__" id="procedure_list" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

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

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                            data-bs-dismiss="modal">

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

                                                        <input type="checkbox" class="check_dr" name="cbx4"
                                                            id="cbx1">

                                                        <label for="cbx1">

                                                            <div class="doctor_dt">

                                                                <div class="image_dr">

                                                                    <img src="{{ asset('/assets/images/new-images/avtar.jpg')}}"
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

                                                        <input type="checkbox" class="check_dr" name="cbx4"
                                                            id="cbx2">

                                                        <label for="cbx2">

                                                            <div class="doctor_dt">

                                                                <div class="image_dr">

                                                                    <img src="{{ asset('/assets/images/new-images/avtar.jpg')}}"
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

                                                        <input type="checkbox" class="check_dr" name="cbx4"
                                                            id="cbx3">

                                                        <label for="cbx3">

                                                            <div class="doctor_dt">

                                                                <div class="image_dr">

                                                                    <img src="{{ asset('/assets/images/new-images/avtar.jpg')}}"
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

                                                        <input type="checkbox" class="check_dr" name="cbx4"
                                                            id="cbx4">

                                                        <label for="cbx4">

                                                            <div class="doctor_dt">

                                                                <div class="image_dr">

                                                                    <img src="{{ asset('/assets/images/new-images/avtar.jpg')}}"
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

                                            <textarea class="form-control"
                                                placeholder="Type a short referral message here. This will be entered as a note on EMR and will be emailed to addressees (salutation added automatically). 

            

            This action also gives the addressee access to this medical record. "
                                                style="height:150px"></textarea>

                                        </div>

                                    </div>

                                </div>



                            </div>

                        </div>

                        <div class="action text-end bottom_modal">

                            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                                data-bs-dismiss="modal">

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

                                                <textarea class="form-control" placeholder="" style="height:150px" name="note_text"></textarea>
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
                                            {{ @$patient != null ? @$patient->name : '' }}</span></h6>

                                    <p class="entry_by">{{ @$patient != null ? @$patient->name : '' }}|
                                        {{ @$formattedDate }}</p>

                                    <div class="row top_head_vitals">

                                        <div class="col-lg-12">

                                            <div class="row">

                                                <div class="col-lg-4">

                                                    <div class="d-flex">

                                                        <div class="inner_element w-100">

                                                            <div class="form-group">

                                                                <select class="form-control select2_note"
                                                                    id="canned_texts" name="canned_texts">



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

                                                                <select class="form-control select2_note"
                                                                    id="note_contents" name="note_contents">
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
                                                                            id="startRecognition"
                                                                            aria-hidden="true"></i>
                                                                    </a>
                                                                    <span class="tooltip" role="tooltip"
                                                                        aria-live="assertive"
                                                                        aria-atomic="true">Click the icon to start
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

                                                        <textarea class="form-control" id="voiceInput" placeholder="Type your entry here" style="height:100px"
                                                            id="prog_voice_recognition" name="prog_voice_recognition"></textarea>
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

                                                                    <input type="text" class="form-control"
                                                                        placeholder="" name="prog_day"
                                                                        id="prog_day">
                                                                    <span id="prog_dayError"
                                                                        style="color: red; font-size:small"></span>
                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-lg-4">

                                                            <div class="inner_element w-100">

                                                                <div class="form-group">

                                                                    <select class="form-control select2_note"
                                                                        id="prog_date" name="prog_date">

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

                                                                <label class="form-check-label"
                                                                    for="prog_recall_reminder">

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
                                                                        placeholder="Mobile Phone"
                                                                        id="prog_mobile_no" name="prog_mobile_no">
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

                                                                <label class="form-check-label"
                                                                    for="flexCheckCheckeda2">

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

                                                                        <option
                                                                            value="IV DRIP FAT BURNER (ESSENTIAL DOSE)">
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

                                                                        <option
                                                                            value="IV Vitamin - Multivatamins w/ Iron">
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

    <div class="modal fade edit_patient__" id="order_imagenairy" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

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
                                    <textarea class="form-control" id="myTextarea1" placeholder="Enter Elaborate / notes here***"
                                        style="height: 100px" disabled=""></textarea>
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
                                    <textarea class="form-control" id="myTextarea2" placeholder="Enter Elaborate / notes here***"
                                        style="height: 100px" disabled=""></textarea>
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
                                    <textarea class="form-control" id="myTextarea3" placeholder="Enter Elaborate / notes here***"
                                        style="height: 100px" disabled=""></textarea>
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
                                    <textarea class="form-control" id="myTextarea4" placeholder="Enter Elaborate / notes here***"
                                        style="height: 100px" disabled=""></textarea>
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
                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                            data-bs-dismiss="modal">
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

    <div class="modal fade edit_patient__" id="eligibility_status" tabindex="-1"
        aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
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
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight20" id="formRadiosRight_a5">
                                            <label class="form-check-label" for="formRadiosRight_a5">
                                                Non-Eligibile
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-2" id="eligibile1_checkbox">
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight20" id="formRadiosRight_a6">
                                            <label class="form-check-label" for="formRadiosRight_a6">
                                                Eligibile
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-lg-12" id="eligibile1_textarea" style="display: none;">
                                        <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"></textarea>
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
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight21" id="formRadiosRight_a7">
                                            <label class="form-check-label" for="formRadiosRight_a7">
                                                Non-Eligibile
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-2" id="eligibile2_checkbox">
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight21" id="formRadiosRight_a8">
                                            <label class="form-check-label" for="formRadiosRight_a8">
                                                Eligibile
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-lg-12" id="eligibile2_textarea" style="display: none;">
                                        <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"></textarea>
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
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight22" id="formRadiosRight_a9">
                                            <label class="form-check-label" for="formRadiosRight_a9">
                                                Non-Eligibile
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-2" id="eligibile3_checkbox">
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight22" id="formRadiosRight_a10">
                                            <label class="form-check-label" for="formRadiosRight_a10">
                                                Eligibile
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-lg-12" id="eligibile3_textarea" style="display: none;">
                                        <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"></textarea>
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
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight23" id="formRadiosRight_a11">
                                            <label class="form-check-label" for="formRadiosRight_a11">
                                                Non-Eligibile
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-2" id="eligibile4_checkbox">
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight23" id="formRadiosRight_a12">
                                            <label class="form-check-label" for="formRadiosRight_a12">
                                                Eligibile
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-lg-12" id="eligibile4_textarea" style="display: none;">
                                        <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"></textarea>
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
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight24" id="formRadiosRight_a13">
                                            <label class="form-check-label" for="formRadiosRight_a13">
                                                Non-Eligibile
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-2" id="eligibile5_checkbox">
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight24" id="formRadiosRight_a14">
                                            <label class="form-check-label" for="formRadiosRight_a14">
                                                Eligibile
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-lg-12" id="eligibile5_textarea" style="display: none;">
                                        <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"></textarea>
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
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight25" id="formRadiosRight_a15">
                                            <label class="form-check-label" for="formRadiosRight_a15">
                                                Non-Eligibile
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-2" id="eligibile6_checkbox">
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight25" id="formRadiosRight_a16">
                                            <label class="form-check-label" for="formRadiosRight_a16">
                                                Eligibile
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-lg-12" id="eligibile6_textarea" style="display: none;">
                                        <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"></textarea>
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
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight26" id="formRadiosRight_a17">
                                            <label class="form-check-label" for="formRadiosRight_a17">
                                                Non-Eligibile
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-2" id="eligibile7_checkbox">
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight26" id="formRadiosRight_a18">
                                            <label class="form-check-label" for="formRadiosRight_a18">
                                                Eligibile
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-lg-12" id="eligibile7_textarea" style="display: none;">
                                        <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"></textarea>
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
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight27" id="formRadiosRight_a19">
                                            <label class="form-check-label" for="formRadiosRight_a19">
                                                Non-Eligibile
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-2" id="eligibile8_checkbox">
                                            <input class="form-check-input" type="radio"
                                                name="formRadiosRight27" id="formRadiosRight_a20">
                                            <label class="form-check-label" for="formRadiosRight_a20">
                                                Eligibile
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col-lg-12" id="eligibile8_textarea" style="display: none;">
                                        <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"></textarea>
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
                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                            data-bs-dismiss="modal">
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
                <form id="EligibilityForms" action="{{ route('user.slectEligibilityForms') }}" method="POST">
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

                                                <img src="{{ asset('/assets/images/new-images/forms.png')}}"
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

                                                <img src="{{ asset('/assets/images/new-images/forms.png')}}"
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

                                                <img src="{{ asset('/assets/images/new-images/forms.png')}}"
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

                                                <img src="{{ asset('/assets/images/new-images/forms.png')}}"
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

                                                <img src="{{ asset('/assets/images/new-images/forms.png')}}"
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

                                                <img src="{{ asset('/assets/images/new-images/forms.png')}}"
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



                                                <input type="text" class="form-control"
                                                    placeholder="dd M, yyyy" data-date-format="dd M, yyyy"
                                                    data-date-container='#datepicker22' data-provide="datepicker"
                                                    name="date">

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

                                            <input type="search" class="form-control" id=""
                                                placeholder="" name="item_name">

                                            <button class="btn search_btn">

                                                <iconify-icon icon="prime:search-plus"
                                                    width="24"></iconify-icon>

                                            </button>
                                            <span id="ItemNameError" style="color: red;font-size:small"></span>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="inner_element">

                                        <div class="form-group">

                                            <label for="validationCustom01" class="form-label">Cost</label>

                                            <input type="search" class="form-control" id=""
                                                placeholder="" name="cost">

                                            <span id="CostError" style="color: red;font-size:small"></span>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="inner_element">

                                        <div class="form-group">

                                            <label for="validationCustom01" class="form-label">Code</label>

                                            <input type="text" class="form-control" id=""
                                                placeholder="" name="code">

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



                                            <input type="search" class="form-control" id=""
                                                placeholder="Task" name="task_name">

                                            <span id="TaskError" style="color: red;font-size:small"></span>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="inner_element">

                                        <div class="form-group">



                                            <div class="input-group" id="datepicker23">



                                                <input type="text" class="form-control"
                                                    placeholder="dd M, yyyy" data-date-format="dd M, yyyy"
                                                    data-date-container='#datepicker23' data-provide="datepicker"
                                                    name="task_date">

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

                                        <textarea class="form-control" placeholder="" style="height:100px" name="task_text"></textarea>
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

    <div class="modal fade edit_patient__" id="discharge_instruction" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

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

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                            data-bs-dismiss="modal">

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

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                            data-bs-dismiss="modal">

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

    <div class="modal fade edit_patient__" id="attach_document" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

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

                                <a href="#"
                                    class="btn r-04 btn--theme hover--tra-black add_patient">Upload</a>

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

                                            <img src="{{ asset('/assets/images/new-images/documents.png')}}"
                                                class="avatar rounded me-3" alt="shreyu">

                                            <div class="flex-grow-1">

                                                <h5 class="dcument_name">document 1</h5>



                                            </div>



                                        </div>

                                    </td>

                                    <td>15 Nov, 2023</td>

                                    <td><a href="#" class="trash_btn"><i
                                                class="fa-regular fa-trash-can"></i></a></td>

                                </tr>



                            </table>

                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                            data-bs-dismiss="modal">

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

                                                        <input type="text" class="form-control"
                                                            placeholder="Diseases Name" name="diseases_name[]">
                                                        <span id="diseases_nameError"
                                                            style="color: red;font-size:small"></span>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-12">

                                                <div class="mb-1 form-group">

                                                    <label for="validationCustom01"
                                                        class="form-label">Describe</label>

                                                    <textarea class="form-control" placeholder="" style="height:60px" name="describe[]"></textarea>
                                                    <span id="describeError"
                                                        style="color: red;font-size:small"></span>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-12 text-end">

                                        
                                        <span><a href="#" id="remove_disease"><i
                                                    class="fa-regular fa-trash-can"></i></a></span>
                                    </div>

                                </div>
                                <a href="#" class="diseases_name add_diseases_btn">+ Add More</a>



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

                                                    <input type="text" class="form-control"
                                                        placeholder="Surgery Name" name="surgery_name[]">
                                                    <span id="surgery_nameError"
                                                        style="color: red;font-size:small"></span>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-12">

                                            <div class="mb-1 form-group">

                                                <label for="validationCustom01" class="form-label">Describe</label>

                                                <textarea class="form-control" placeholder="" style="height:60px" name="surgery_describe[]"></textarea>
                                                <span id="surgery_describeError"
                                                    style="color: red;font-size:small"></span>

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

    <div class="modal fade edit_patient__" id="make_appointment" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

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

                                                    <select class="form-control select2_appointment"
                                                        name="location">

                                                        <option value="">Location</option>

                                                        <option value="CLINIC">CLINIC</option>

                                                        <option value="DUBAI">DUBAI</option>

                                                        <option value="QASTARAT & DAWALI CLINICS">QASTARAT & DAWALI
                                                            CLINICS</option>

                                                    </select>
                                                    <span id="locationError"
                                                        style="color: red;font-size:small"></span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="inner_element">

                                                <div class="form-group">



                                                    <input type="text" class="form-control datepickerInput"
                                                        placeholder="17 Nov,2023" name="start_date">
                                                    <span id="start_dateError"
                                                        style="color: red;font-size:small"></span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="inner_element">

                                                <div class="form-group">



                                                    <input type="text" class="form-control timepicker-custom"
                                                        placeholder="12:00" name="start_time">
                                                    <span id="start_timeError"
                                                        style="color: red;font-size:small"></span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="inner_element">

                                                <div class="form-group">



                                                    <input type="text" class="form-control datepickerInput"
                                                        placeholder="17 Nov,2023" name="end_date">
                                                    <span id="end_dateError"
                                                        style="color: red;font-size:small"></span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="inner_element">

                                                <div class="form-group">



                                                    <input type="text" class="form-control timepicker-custom"
                                                        placeholder="12:00" name="end_time">
                                                    <span id="end_timeError"
                                                        style="color: red;font-size:small"></span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-4">

                                            <div class="inner_element">

                                                <div class="form-group">



                                                    <input type="text" class="form-control" placeholder="Cost"
                                                        name="app_cost">
                                                    <span id="app_costError"
                                                        style="color: red;font-size:small"></span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-4">

                                            <div class="inner_element">

                                                <div class="form-group">



                                                    <input type="text" class="form-control" placeholder="Code"
                                                        name="app_code">
                                                    <span id="app_codeError"
                                                        style="color: red;font-size:small"></span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-4">

                                            <div class="inner_element">

                                                <div class="form-group">

                                                    <select class="form-control select2_appointment"
                                                        name="clinician">

                                                        <option value="">Select Clinician</option>

                                                        <option value="SAIF ALZAAB">SAIF ALZAABI</option>
                                                        <option value="SAIF AAB">SAIF ALZAABI</option>
                                                        <option value="SAIF ALZ">SAIF ALZAABI</option>
                                                        <option value="SAIF AL">SAIF ALZAABI</option>
                                                        <option value="SAIF AB">SAIF ALZAABI</option>

                                                    </select>
                                                    <span id="clinicianError"
                                                        style="color: red;font-size:small"></span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-12">

                                            <div class="form-check">

                                                <input class="form-check-input" type="checkbox"
                                                    id="flexCheckChecked" name="is_confirmation"
                                                    value="confirmationed">

                                                <label class="form-check-label" for="flexCheckChecked">

                                                    Send appointment confirmation immediately

                                                </label>
                                                <span id="is_confirmationError"
                                                    style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                </div>





                            </div>

                        </div>

                        <div class="action text-end bottom_modal">

                            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient"
                                id="book_app">

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

                                                    <input type="text" class="form-control datepickerInput"
                                                        placeholder="" name="meeting_date">
                                                    <span id="meeting_dateError"
                                                        style="color: red;font-size:small"></span>
                                                </div>

                                                <div class="form-group">

                                                    <label for="validationCustom01" class="form-label">Paste Meeting
                                                        URL</label>

                                                    <input type="text" class="form-control "
                                                        placeholder="Paste Meeting URL" name="meeting_url">
                                                    <span id="meeting_urlError"
                                                        style="color: red;font-size:small"></span>
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

                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault4">

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

                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckDefault5">

                                <label class="form-check-label" for="flexCheckDefault5">

                                    To Patient

                                </label>

                            </div>

                        </div>

                    </div>

                    <div class="inner_element">

                        <div class="form-group">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckDefault6" disabled>

                                <label class="form-check-label" for="flexCheckDefault6">

                                    To NOK

                                </label>

                            </div>

                        </div>

                    </div>

                    <div class="inner_element">

                        <div class="form-group">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckDefault7" disabled>

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

                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault11">

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

                            <button type="submit"
                                class="btn r-04 btn--theme hover--tra-black add_patient">Save</button>

                            <button type="submit"
                                class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
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

                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault8">

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

                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault9">

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

                                    <input class="form-check-input" type="checkbox" value=""
                                        id="flexCheckDefault10">

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

            <h5 class="offcanvas-title" id="offcanvasBottomLabel"><i
                    class="fa-solid fa-temperature-three-quarters"></i> Enter Vitals </h5>

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



                                            <input type="text" class="form-control datepickerInput"
                                                placeholder="dd M, yyyy" name="date">
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

                                            <input type="text" class="form-control" id=""
                                                placeholder="Value" name="value">
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

    <div class="modal fade edit_patient__" id="prescription_day" tabindex="-1"
        aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
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
                                                <label for="validationCustom01"
                                                    class="form-label">Prescription</label>
                                                <textarea class="form-control" placeholder="" style="height:150px" name="prescription"></textarea>
                                                <span id="prescriptionError"
                                                    style="color: red;font-size:small"></span>
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

    <div class="modal fade edit_patient__" id="order_supportive_surface" tabindex="-1"
        aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
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
                                                <textarea class="form-control" placeholder="" style="height:150px" name="invistigation"></textarea>
                                                <span id="invistigationError"
                                                    style="color: red;font-size:small"></span>
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
    <div class="modal fade edit_patient__" id="order_procedure" tabindex="-1"
        aria-labelledby="exampleModalLabel" style="display: none;" data-select2-id="order_procedure"
        aria-hidden="true">
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
                                                <textarea class="form-control" placeholder="" style="height:100px" name="entry"></textarea>
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
                                                <textarea class="form-control" placeholder="" style="height:100px" name="summary"></textarea>
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

                                    {{env('SHOW_CURRENCY')}} 100.00

                                </td>

                                <td data-th="Supplier Name">

                                    {{env('SHOW_CURRENCY')}} 100.00

                                </td>

                                <td data-th="Invoice Number">

                                    <div class="amountpaid_input input_width"><input type="text"
                                            class="form-control comoninpt_border"></div>

                                </td>

                                <td data-th="Invoice Date ">

                                    <div class="invdate_input input_width"><input type="text"
                                            class="form-control datepickerInput comoninpt_border"
                                            placeholder="20/11/2023"><iconify-icon
                                            icon="solar:calendar-linear"></iconify-icon></div>

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
                        <h1>New Balance : </h1> <span>{{env('SHOW_CURRENCY')}} 100.00</span>
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

                    <button type="submit"
                        class="btn cmncanvasft_buttons r-04 btn--theme hover--tra-black add_patient">Save
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
                    <h1 class="modal-title" id="exampleModalLabel">Severity Symptoms Sfcale </h1>
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
                                                    type="button" fdprocessedid="30sk7"><i
                                                        class="fa-solid fa-plus"></i> Add</button>
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
                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                            data-bs-dismiss="modal">
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





    <!-- EXTERNAL SCRIPTS

                    ============================================= -->

    <script src="{{ asset('/assets/js/jquery-3.7.0.min.js')}}"></script>



    <script src="{{ asset('/assets/js/bootstrap.min.js')}}"></script>

    <script src="{{ asset('/assets/js/modernizr.custom.js')}}"></script>

    <script src="{{ asset('/assets/js/jquery.easing.js')}}"></script>

    <script src="{{ asset('/assets/js/jquery.appear.js')}}"></script>

    <script src="{{ asset('/assets/js/menu.js')}}"></script>

    <script src="{{ asset('/assets/js/owl.carousel.min.js')}}"></script>

    <script src="{{ asset('/assets/js/pricing-toggle.js')}}"></script>

    <script src="{{ asset('/assets/js/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{ asset('/assets/js/request-form.js')}}"></script>

    <script src="{{ asset('/assets/js/jquery.validate.min.js')}}"></script>

    <script src="{{ asset('/assets/js/jquery.ajaxchimp.min.js')}}"></script>

    <script src="{{ asset('/assets/js/popper.min.js')}}"></script>

    <script src="{{ asset('/assets/js/lunar.js')}}"></script>

    <script src="{{ asset('/assets/js/wow.js')}}"></script>

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>



    <!-- apex chart cdn -->

    <!-- Include ApexCharts library -->

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>



    <!-- Custom Script -->

    <script src="{{ asset('/assets/js/custom.js')}}"></script>



    <!-- <script>
        $(document).on({

            "contextmenu": function(e) {

                console.log("ctx menu button:", e.which);





                e.preventDefault();

            },

            "mousedown": function(e) {

                console.log("normal mouse down:", e.which);

            },

            "mouseup": function(e) {

                console.log("normal mouse up:", e.which);

            }

        });
    </script> -->



    <script>
        $(function() {

            $(".switch").click(function() {

                $("body").toggleClass("theme--dark");

                if ($("body").hasClass("theme--dark")) {

                    $(".switch").text("Light Mode");

                } else {

                    $(".switch").text("Dark Mode");

                }

            });

        });
    </script>



    <script>
        $(document).ready(function() {

            if ($("body").hasClass("theme--dark")) {

                $(".switch").text("Light Mode");

            } else {

                $(".switch").text("Dark Mode");

            }

        });
    </script>

    <script>
        $(function() {

            $('#sign_upload').hide();

        })

        var check = $('#flexCheckDefault8').val();

        $('#flexCheckDefault8').change(function() {

            if (this.checked) {

                $('#sign_upload').show();

            } else {

                $('#sign_upload').hide();

            }



        });
    </script>

    <script>
        $(function() {

            $('#invoice_appoin').hide();

        })

        var check = $('#flexCheckCheckeda2').val();

        $('#flexCheckCheckeda2').change(function() {

            if (this.checked) {

                $('#invoice_appoin').show();

            } else {

                $('#invoice_appoin').hide();

            }



        });
    </script>

    <script>
        $(function() {

            $('#refer_note').hide();

        })

        var check = $('.check_dr').val();

        $('.check_dr').change(function() {

            if (this.checked) {

                $('#refer_note').show();

            } else {

                $('#refer_note').hide();

            }



        });
    </script>

    <!-- book appointment form toggle -->

    <script>
        $(document).ready(function() {

            $('#book_appointment_box').hide();



            $('#appoin_btn_form').click(function() {

                $('#book_appointment_box').toggle();

            });

        });
    </script>

    <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->

    <!--

                    <script>
                        var _gaq = _gaq || [];

                        _gaq.push(['_setAccount', 'UA-XXXXX-X']);

                        _gaq.push(['_trackPageview']);



                        (function() {

                            var ga = document.createElement('script');
                            ga.type = 'text/javascript';
                            ga.async = true;

                            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                                '.google-analytics.com/ga.js';

                            var s = document.getElementsByTagName('script')[0];
                            s.parentNode.insertBefore(ga, s);

                        })();
                    </script>

                    -->



    <script src="{{ asset('/assets/js/changer.js')}}"></script>

    <script defer src="{{ asset('/assets/js/styleswitch.js')}}"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>	 -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

    <script>
        $('.service_slider').owlCarousel({

            loop: true,

            margin: 15,

            dots: false,

            nav: false,

            items: 3,

            center: true,

            autoplay: true,

        })
    </script>

    <script>
        $('.doctor_slider').owlCarousel({

            loop: true,

            margin: 15,

            dots: false,

            nav: false,

            items: 4,

            autoplay: true,

        })
    </script>

    <script>
        let profile = document.querySelector(".profile");

        let menu = document.querySelector(".menu__");



        profile.onclick = function() {

            menu.classList.toggle("active");

        };
    </script>





    <!-- iconify icons js -->

    <script src="{{ asset('/assets/js/iconify-icons.js')}}"></script>



    <!-- timepicker js -->

    <script src="{{ asset('/assets/js/jquery.timepicker.min.js')}}"></script>

    <!-- timepicker js end -->



    <!-- form plugin js -->

    <script src="{{ asset('/assets/libs/select2/js/select2.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>



    <script src="{{ asset('/assets/js/pages/form-advanced.init.js')}}"></script>

    <!-- apexcharts -->

    <script src="{{ asset('/assets/libs/apexcharts/apexcharts.min.js')}}"></script>



    <!-- Vector map-->

    <script src="{{ asset('/assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/jsvectormap/maps/world-merc.js')}}"></script>



    <!-- Required datatable js -->

    <script src="{{ asset('/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>





    <!-- Buttons examples -->

    <script src="{{ asset('/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/jszip/jszip.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>

    <script src="{{ asset('/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>



    <script src="{{ asset('/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>



    <!-- Responsive examples -->

    <script src="{{ asset('/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>

    <script src="{{ asset('/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>



    <!-- Datatable init js -->

    <script src="{{ asset('/assets/js/pages/datatables.init.js')}}"></script>

    <!-- linecharts init -->

    <script src="{{ asset('/assets/js/pages/apexcharts-line.init.js')}}"></script>

    <!-- App js -->

    <script src="{{ asset('/assets/js/app.js')}}"></script>

    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

    <!--  Flatpickr  -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>

    <script>
        $("#timePicker").flatpickr({

            enableTime: true,

            noCalendar: true,

            time_24hr: true,

            dateFormat: "H:i",

        });
    </script>

    <!-- Dropify Js  -->

    <script>
        $('.dropify').dropify();
    </script>



    <!-- Select 2 js without searchbar -->

    <script>
        $('.select2_without_search').select2({

            minimumResultsForSearch: -1 // for no searchbar



        });
    </script>

    <script>
        $('.select2_modal').select2({

            dropdownParent: $('.add_patient__')



        });
    </script>

    <script>
        $('.select2_edit_info').select2({

            dropdownParent: $('#edit_patient')

        });



        $('.select2_extract_code').select2({

            dropdownParent: $('#extract_code')

        });

        $('.select2_note').select2({

            dropdownParent: $('#new_letter'),

            minimumResultsForSearch: -1

        });

        $('.select2_task').select2({

            dropdownParent: $('#new_task'),

            minimumResultsForSearch: -1

        });

        $('.select2_vitals').select2({

            dropdownParent: $('#add_vitals'),

            minimumResultsForSearch: -1

        });

        $('.select2_appointment').select2({

            dropdownParent: $('#make_appointment'),

            minimumResultsForSearch: -1

        });

        $('.select2_procedure').select2({

            dropdownParent: $('#order_procedure'),

            minimumResultsForSearch: -1

        });

        $('.select2_note').select2({

            dropdownParent: $('#add_new_note'),

            minimumResultsForSearch: -1

        });

        $('.paymenttype_select select').select2({

            dropdownParent: $('#user-invoice')

        });

        $('.select2_imaginary_test').select2({

            dropdownParent: $('#order_imagenairy'),

            minimumResultsForSearch: -1

        });
    </script>





    <!-- add subcat js -->

    <script>
        // Updated JavaScript (script.js)

        $(document).ready(function() {

            function setupCategorySection(containerID, inputClass, addButtonClass, listID) {

                var categories = [];



                $(containerID).on('click', addButtonClass, function() {

                    var category = $(inputClass, containerID).val();

                    if (category.trim() !== '') {

                        categories.push(category);

                        var categoryItem = $('<div class="category">' + category +

                            '<i class="remove-category fas fa-times"></i></div>');

                        $(listID).append(categoryItem);

                        $(inputClass, containerID).val('');

                    }

                });



                $(inputClass, containerID).keypress(function(event) {

                    if (event.which === 13) {

                        var category = $(inputClass, containerID).val();

                        if (category.trim() !== '') {

                            categories.push(category);

                            var categoryItem = $('<div class="category">' + category +

                                '<i class="remove-category fas fa-times"></i></div>');

                            $(listID).append(categoryItem);

                            $(inputClass, containerID).val('');

                        }

                    }

                });



                $(listID).on('click', '.remove-category', function() {

                    var category = $(this).parent().text().trim();

                    categories = categories.filter(function(item) {

                        return item !== category;

                    });

                    $(this).parent().remove();

                });

            }



            setupCategorySection('#category-container-1', '.category-input', '.add-category', '#categories-list-1');

            setupCategorySection('#category-container-2', '.category-input', '.add-category', '#categories-list-2');

            setupCategorySection('#category-container-3', '.category-input', '.add-category', '#categories-list-3');

        });
    </script>

    <!-- end -->



    <script>
        $(document).ready(function() {

            $('#text_area').hide();

            $('.text_area_show').click(function() {

                $('#text_area').show();

            });

            $('.text_area_hide').click(function() {

                $('#text_area').hide();

            });

        });
    </script>





    <script>
        $(document).ready(function() {

            $('#text_pae').hide();

            $('#pae_yes').click(function() {

                $('#text_pae').show();

            });

            $('#pae_no').click(function() {

                $('#text_pae').hide();

            });

        });
    </script>



    <script>
        $(document).ready(function() {

            $('#eligibility_text_area').hide();

            $('#eligibility_other').click(function() {

                $('#eligibility_text_area').show();

            });

            $('.hide_eligibility_textarea').click(function() {

                $('#eligibility_text_area').hide();

            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('#Nephrology_textarea').hide();

            $('#PevicRehab_textarea').hide();



            $('#Nephrology_checkbox').click(function() {

                $('#Nephrology_textarea').show();

                $('#PevicRehab_textarea').hide();

            });

            $('#PevicRehab_checkbox').click(function() {

                $('#Nephrology_textarea').hide();

                $('#PevicRehab_textarea').show();

            });

        });
    </script>



    <!-- jQuery and jQuery UI JS -->

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {

            // Initialize jQuery UI datepicker

            $('.datepickerInput').datepicker({

                dateFormat: 'dd M, yy'

            });



        });
    </script>

    <script>
        $(document).ready(function() {

            $('#add_address_new_form').hide();

            $('#add_address_new').click(function() {

                $('#add_address_new_form').toggle();

            })

            $('#cancel_btn_address').click(function() {

                $('#add_address_new_form').hide();

            })

        });
    </script>

    <script>
        $(document).ready(function() {

            $('#context_add').hide();

            $('#entry_add_btn').click(function() {

                $('#context_add').toggle();

            })



        });
    </script>







    <script>
        $(function() {

            // Initialize the timepicker

            $('.timepicker-custom').timepicker({

                'step': 1,

                'timeFormat': 'h:i A' // Use 'h:i A' for AM/PM format

            });

        });
    </script>



    <!-- three dot dropdown js -->



    <script>
        $(document).ready(function() {

            // jQuery code to handle the dropdown animation

            $(".customdotdropdown").hover(

                function() {

                    // Close any open dropdowns

                    $(".dropdown-content").stop().slideUp("fast");



                    // Open the current dropdown

                    $(this).find(".dropdown-content").stop().slideDown("fast");

                },

                function() {

                    // Hover out - close the dropdown

                    $(this).find(".dropdown-content").stop().slideUp("fast");

                }

            );



            // Close the dropdown on outside click

            $(document).on("click", function(event) {

                var dropdown = $(".customdotdropdown");

                if (!dropdown.is(event.target) && dropdown.has(event.target).length === 0) {

                    $(".dropdown-content").slideUp("fast");

                }

            });

        });
    </script>





    <!-- comon select call -->

    <script>
        $('.comon_selectrtj').select2({

        });
    </script>



    <script>
        $(document).ready(function() {

            $('#symptom_input').hide();

            $('#add_symptom').click(function() {

                $('#symptom_input').show();

            })



            $('#remove_symptom').click(function() {

                $('#symptom_input').hide();

            })

        });
    </script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sumoselect/3.4.9/jquery.sumoselect.min.js"></script>

    <script>
        $(document).ready(function() {

            // Initialize SumoSelect with search

            $('#sumo-select').SumoSelect({

                search: true,

                dropdownParent: $('#lab_test')

            });

        });
    </script>
    <!-- add_diseases_btn start-->
    <script>
        $(document).ready(function() {
            let counter = 1;

            $(document).on('click', '.add_diseases_btn', function(e) {
                e.preventDefault();

                let newSection = $('#add_diseases').clone();

                newSection.attr('id', 'add_diseases_' + counter);
                newSection.find('input[type="text"]').val('');
                newSection.find('textarea').val('');

                $('#dynamic-sections').append(newSection);
                counter++;
            });

            $(document).on('click', '#remove_disease', function(e) {
                e.preventDefault();
                if (counter != 1) {
                    $(this).closest('.col-lg-12').parent().remove();
                    counter--;
                }

            });
        });
    </script>
    <!-- add_diseases_btn end here -->
    <!-- add_surgical_btn start-->

    <script>
        $(document).ready(function() {
            let counter = 1;

            $(document).on('click', '.add_surgical_btn', function(e) {
                e.preventDefault();

                let newSection = $('#add_surgical').clone();

                newSection.attr('id', 'add_surgicals_' + counter);
                newSection.find('input[type="text"]').val('');
                newSection.find('textarea').val('');

                $('#surgical-dynamic-sections').append(newSection);
                counter++;
            });

            $(document).on('click', '#remove_surgical', function(e) {
                e.preventDefault();
                if (counter != 1) {
                    $(this).closest('.col-lg-12').parent().remove();
                    counter--;
                }

            });
        });
    </script>
    <!-- add_surgical_btn end here -->

    <!-- Annotate image js  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/konva/8.1.1/konva.min.js"></script>

    <script>
        const stage = new Konva.Stage({
            container: 'image-container',
            width: 800,
            height: 600,
        });

        const layer = new Konva.Layer();
        stage.add(layer);

        let isDrawing = false;
        let annotationMode = false;
        let lastLine;

        const imageObj = new Image();
        imageObj.src = "{{ asset('/assets/images/new-images/nodules.png') }}";

        imageObj.onload = function() {
            const image = new Konva.Image({
                image: imageObj,
                width: 800,
                height: 600,
            });

            layer.add(image);
            stage.draw();
        };

        stage.on('mousedown touchstart', function(e) {
            if (annotationMode) {
                const text = prompt('Enter annotation text:');
                if (text) {
                    const pos = stage.getPointerPosition();
                    const annotation = new Konva.Label({
                        x: pos.x,
                        y: pos.y,
                    });

                    annotation.add(
                        new Konva.Tag({
                            fill: 'transparent',
                        })
                    );

                    annotation.add(
                        new Konva.Text({
                            text: text,
                        fontSize: 18,
                        width:500,
                        fontStyle: 'bold',
                        fontFamily: 'Arial',
                        fill: '#000',
                        wrap:'word',
                        ellipsis:true
                        })
                    );

                    layer.add(annotation);
                    stage.draw();
                }
            } else {
                isDrawing = true;
                const pos = stage.getPointerPosition();
                lastLine = new Konva.Line({
                    stroke: '#2760a4',
                    strokeWidth: 3,
                    globalCompositeOperation: 'source-over',
                    points: [pos.x, pos.y],
                });
                layer.add(lastLine);
            }
        });

        stage.on('mousemove touchmove', function() {
            if (!isDrawing) {
                return;
            }

            const pos = stage.getPointerPosition();
            const newPoints = lastLine.points().concat([pos.x, pos.y]);
            lastLine.points(newPoints);
            layer.batchDraw();
        });

        stage.on('mouseup touchend', function() {
            isDrawing = false;
            lastLine = null;
        });

        document.getElementById('draw-mode').addEventListener('click', function() {
            annotationMode = false;
        });

        document.getElementById('annotate-mode').addEventListener('click', function() {
            annotationMode = true;
        });

        document.getElementById('download-image').addEventListener('click', function() {
            const dataURL = stage.toDataURL({
                mimeType: 'image/png'
            });
            const link = document.createElement('a');
            link.href = dataURL;
            link.download = 'drawn-image.png';
            link.click();
        });
    </script>
    <!-- summer note editor start here -->

    <script>
        $(document).ready(function() {
            //  
            $('#edit_patient').on('hidden.bs.modal', function(e) {
                // location.reload();
            });
        });
    </script>
    <!-- Edit Patient Info. form data into database-->
    <script>
        $(document).ready(function() {
            let patient_id = $('input[name="patient_id"]').val();
            $('#edit_patient_info_form').submit(function(e) {

                e.preventDefault();
                // alert("aasdasd");

                let isValid = validateFormPatientInfoEdit();
                let formData = new FormData(this);
                let categoriesListContent = $('#categories-list-2').html();

                // Append categoriesListContent
                formData.append('patient_tags_list', categoriesListContent);
                if (isValid) {

                    $.ajax({
                        url: '{{ route('patient.patient-info-update') }}',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(result) {


                            if (result != '') {

                                swal.fire(

                                    'Success',

                                    'Patient Info  Updated successfully!',

                                    'success'

                                )

                                fetchAndDisplayPatientInfoData(patient_id);
                                location.reload();
                            } else {

                                swal.fire("Error!", "Enter valid Patient Info  Details!",
                                    "error");

                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            if (xhr.status == 409) {
                                swal.fire('Error!',
                                    'The email is already in use. Please use a different email.',
                                    'error');
                            } else if (xhr.status == 404) {
                                swal.fire('Error!', 'The requested resource was not found.',
                                    'error');
                            } else if (xhr.status == 500) {
                                swal.fire('Error!',
                                    'Internal server error. Please try again later.',
                                    'error');
                            } else {
                                swal.fire('Error!',
                                    'An error occurred. Please try again later.', 'error');
                            }
                        }
                    });
                }
            });


            function validateFormPatientInfoEdit() {
                let isValid = true;

                // Validate patient_sirname
                let patient_sirname = $('select[name="patient_sirname"]').val();
                if (patient_sirname === '') {

                    isValid = false;

                    $('#patient_sirnameError').text('Please select a title');
                    $('select[name="patient_sirname"]').addClass('error');
                }

                // Validate patient_name 
                let patient_name = $('input[name="patient_name"]').val();
                if (patient_name === '') {
                    isValid = false;

                    $('#patient_nameError').text('Name is required');
                    $('input[name="patient_name"]').addClass('error');
                }

                // // Validate patient_birth
                let patient_birth = $('input[name="patient_birth"]').val();
                if (patient_birth === '') {
                    isValid = false;

                    $('#patient_birthError').text('Date of Birth is required');
                    $('input[name="patient_birth"]').addClass('error');
                }

                // // Validate patient_gendar
                let patient_gendar = $('select[name="patient_gendar"]').val();
                if (patient_gendar === '' || patient_gendar === 'Select') {
                    isValid = false;

                    $('#patient_gendarError').text('Please select a gender');
                    $('select[name="patient_gendar"]').addClass('error');
                }

                // Validate patient_post_code
                let patient_post_code = $('input[name="patient_post_code"]').val();
                if (patient_post_code === '') {
                    isValid = false;

                    $('#patient_post_codeError').text('Post Code is required');
                    $('input[name="patient_post_code"]').addClass('error');
                }
                // Validate patient_email
                let patient_email = $('input[name="patient_email"]').val();
                if (patient_email === '') {
                    isValid = false;

                    $('#patient_emailError').text('Email  is required');
                    $('input[name="patient_email"]').addClass('error');
                }
                // Validate patient_street  
                let patient_street = $('input[name="patient_street"]').val();
                if (patient_street === '') {
                    isValid = false;

                    $('#patient_streetError').text('Street is required');
                    $('input[name="patient_street"]').addClass('error');
                }
                // Validate patient_town  
                let patient_town = $('input[name="patient_town"]').val();
                if (patient_town === '') {
                    isValid = false;

                    $('#patient_townError').text('Town is required');
                    $('input[name="patient_town"]').addClass('error');
                }
                // Validate patient_country  
                let patient_country = $('select[name="patient_country"]').val();
                if (patient_country === '') {
                    isValid = false;

                    $('#patient_countryError').text('country is required');
                    $('input[name="patient_country"]').addClass('error');
                }
                // Validate patient_mobile_no 
                let patient_mobile_no = $('input[name="patient_mobile_no"]').val();
                if (patient_mobile_no === '') {
                    isValid = false;

                    $('#patient_mobile_noError').text('Mobile number is required');
                    $('input[name="patient_mobile_no"]').addClass('error');
                }
                // Validate patient_landline 
                let patient_landline = $('input[name="patient_landline"]').val();
                if (patient_landline === '') {
                    isValid = false;

                    $('#patient_landlineError').text('landline number is required');
                    $('input[name="patient_landline"]').addClass('error');
                }
                // Validate patient_additional_info 
                let patient_additional_info = $('textarea[name="patient_additional_info"]').val();
                if (patient_additional_info === '') {
                    isValid = false;

                    $('#patient_additional_infoError').text('Additional Info is required');
                    $('textarea[name="patient_additional_info"]').addClass('error');
                }
                // Validate patient_document_type   
                let patient_document_type = $('input[name="patient_document_type"]').val();
                if (patient_document_type === '') {
                    isValid = false;

                    $('#patient_document_typeError').text('document type  is required');
                    $('input[name="patient_document_type"]').addClass('error');
                }
                // Validate patient_edit_id     
                let patient_edit_id = $('input[name="patient_edit_id"]').val();
                if (patient_edit_id === '') {
                    isValid = false;

                    $('#patient_edit_idError').text('Patient ID  is required');
                    $('input[name="patient_edit_id"]').addClass('error');
                }

                return isValid;
            }

        });
    </script>
    <!-- Function to fetch and populate patient data -->
    <script>
        function fetchAndDisplayPatientInfoData(patient_id) {

            // let patient_id = $('input[name="patient_id"]').val();
            
            $.ajax({
                url: '{{ route('patient.patient-info-edit') }}',
                type: 'GET',
                data: {
                    patient_id: patient_id
                },
                dataType: 'json',
                success: function(data) {
                    if (data && data.hasOwnProperty('patient_info')) {
                        let selectedSirname = data.patient_info.sirname ? data.patient_info.sirname : '';
                        let name = data.patient_info.name ? data.patient_info.name : '';
                        let id = data.patient_info.id ? data.patient_info.id : '';
                        let email = data.patient_info.email ? data.patient_info.email : '';
                        let patient_profile_img = data.patient_info.patient_profile_img ? data.patient_info
                            .patient_profile_img : '';
                        let role = data.patient_info.role ? data.patient_info.role : '';
                        let post_code = data.patient_info.post_code ? data.patient_info.post_code : '';
                        let mobile_no = data.patient_info.mobile_no ? data.patient_info.mobile_no : '';
                        let birth_date = data.patient_info.birth_date ? data.patient_info.birth_date : '';
                        let selectedGendar = data.patient_info.gendar ? data.patient_info.gendar : '';
                        let street = data.patient_info.street ? data.patient_info.street : '';
                        let town = data.patient_info.town ? data.patient_info.town : '';
                        let selectedCountry = data.patient_info.country ? data.patient_info.country : '';
                        let landline = data.patient_info.landline ? data.patient_info.landline : '';
                        let selectedDocument_type = data.patient_info.document_type ? data.patient_info
                            .document_type : '';
                        let patient_id = data.patient_info.patient_id ? data.patient_info.patient_id : '';
                        let kin = data.patient_info.kin ? data.patient_info.kin : '';
                        let gp = data.patient_info.gp ? data.patient_info.gp : '';
                        let tags = data.patient_info.tags ? data.patient_info.tags : '';
                        let additional_info = data.patient_info.additional_info ? data.patient_info
                            .additional_info : '';
                        let policy_no = data.patient_info.policy_no ? data.patient_info.policy_no : '';

                        $('#patient_sirname option').each(function() {
                            if ($(this).val() === selectedSirname) {
                                $(this).prop('selected', true);
                            }
                        });
                        $('#patient_sirname').val(selectedSirname).trigger('change.select2');
                        $("#patient_name").val(name);
                        $("#patient_birth").val(birth_date);
                        $('#patient_gendar option').each(function() {
                            if ($(this).val() === selectedGendar) {
                                $(this).prop('selected', true);
                            }
                        });
                        $('#patient_gendar').val(selectedGendar).trigger('change.select2');
                        $("#patient_post_code").val(post_code);
                        $("#patient_street").val(street);
                        $("#patient_town").val(town);
                        $('#patient_country option').each(function() {
                            if ($(this).val() === selectedCountry) {
                                $(this).prop('selected', true);
                            }
                        });
                        $('#patient_country').val(selectedCountry).trigger('change.select2');
                        $("#patient_email").val(email);
                        $("#patient_mobile_no").val(mobile_no);
                        $("#patient_landline").val(landline);
                        $("#patient_kin").val(kin);
                        $("#patient_policy_no").val(policy_no);
                        $("#patient_gp").val(gp);
                        $("#patient_additional_info").val(additional_info);

                        $('#patient_document_type option').each(function() {
                            if ($(this).val() === selectedDocument_type) {
                                $(this).prop('selected', true);
                            }
                        });
                        $('#patient_document_type').val(selectedDocument_type).trigger('change.select2');
                        $("#patient_edit_id").val(patient_id);
                        $("#categories-list-2").html(tags);
                        // set patient info

                        let dob = new Date(birth_date);
                        let now = new Date();
                        let ageDiff = now - dob;
                        let ageDate = new Date(ageDiff);
                        let calculatedAge = Math.abs(ageDate.getUTCFullYear() - 1970);

                        $(".patient_name__").text(selectedSirname + ' ' + name);
                        $(".patient_age__").html(calculatedAge + ' Years ' + '<span class="patient_id__">' +
                            patient_id + '</span>');
                        $("#data_pt_dob").text(birth_date);
                        $("#data_pt_gendar").text(selectedGendar);

                        $("#data_pt_mobile").text(mobile_no);
                        $("#data_pt_landline").text(landline);
                        $("#data_pt_street").text(street);
                        $("#data_pt_town").text(town);
                        $("#data_pt_state").text(selectedCountry);
                        $("#data_pt_post_code").text(post_code);
                        $("#data_pt_country").text(selectedCountry);
                        $("#data_pt_kin").text(kin);
                        $("#data_pt_policy_no").text(policy_no);
                        $("#data_pt_gp").text(gp);



                    }
                    if (data && data.hasOwnProperty('patient_insurer')) {

                        let patient_insurer = data.patient_insurer;
                        patient_insurer.forEach(function(note) {
                            let newOption = $('<option>', {
                                value: note.id,
                                text: note.insurer_name
                            });

                            let optionExists = $('#patient_insurer option[value="' + note.id + '"]')
                                .length > 0;

                            if (!optionExists) {
                                $('#patient_insurer').append(newOption);
                            } else {
                                $('#patient_insurer option[value="' + note.id + '"]').text(note
                                    .insurer_name);
                            }

                            if (note.status === 'active') {
                                $('#patient_insurer').val(note.id);
                            }
                        });



                    }



                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    if (xhr.status == 409) {
                        swal.fire('Error!', 'The email is already in use. Please use a different email.',
                            'error');
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

        // Call the function on clcik class add_insurer
        $(document).ready(function() {
            let patient_id1 = $('input[name="patient_id"]').val();
            $(".patient_edit").on('click', function() {

                fetchAndDisplayPatientInfoData(patient_id1);
            });

        });
    </script>
    <script>
        function removePatient(patient_id) {
            var label = "Patient Details";
            swal.fire({
                title: "Are you sure?",
                text: "Do you want to Delete!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                confirmButtonText: "Yes, Delete it!",
                cancelButtonText: "No, Cancel It",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('patient.patient_delete') }}",
                        data: {
                            "patient_id": patient_id,
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(result) {
                            swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Patient Deleted',
                                timer: 1000
                            }).then(function() {
                                window.location.href = '{{ route('user.patient') }}';
                            });
                        },
                        error: function(data) {

                        }
                    });
                } else {
                    swal.fire("Cancelled", label + " safe :)", "error");
                }
            });
        }
    </script>
</body>



</html>



















<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- SITE TITLE -->

    <title>@stack('title')</title>

    <!-- FAVICON AND TOUCH ICONS -->

    <link class="dark-theme-img" rel="icon" href="{{ asset('/assets/images/new-images/logofwhite.png') }}"
        type="image/x-icon">



    <!-- GOOGLE FONTS -->

    <!-- <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- BOOTSTRAP CSS -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">


    <link href="{{ asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/assets/invoiceassets/css/style.css')}}">

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

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

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

    @stack('custom-css')

</head>


<body>


    <style>
        .appoin_title h6 {
    font-size: 13px;
    font-weight: 400;
    width: 234px;
}


        .cke_notification_warning{
            z-index: 0;
            display: none;
        }
        .cke_notifications_area{
            z-index: 0;
            display: none;
        }
  
        .checkeditPt {
            width: 20px;
            line-height: 0px;
            position: relative;
            top: -9px;
            margin-right: 5px;
        }


        .removeReferalPatient {
            position: absolute;
            top: 11px;
            right: 8px;
        }

        .trash_btn {
            color: #ff0000;
            outline: none;
            border: none;
            margin-right: 5px;
            background: transparent;
        }

        .view-report-btn {
            border: none;
            background: none;
            padding: 0;
            cursor: pointer;
        }

        .view-report-btn .iconify {
            margin-right: 5px;
            /* Adjust spacing between icon and text */
            font-size: 16px;
            /* Adjust icon size */
            vertical-align: middle;
            /* Align icon vertically */
        }

        .appoin_title_ h6 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 14px;
        }

        .appoin_title_ h6 span {
            font-weight: 400;
            font-size: 12px;
        }

        .appoin_title_ .view-report-btn {
            border: none;
            background: none;
            padding: 0;
            cursor: pointer;
            color: #19276d;
            padding: 2px 10px;
            margin: 11px 0 0;
            background: antiquewhite;
        }

        ul.scroll_list {
            min-height: auto;
            max-height: 300px;
            overflow-x: auto;
            scrollbar-width: thin;
            position: relative;
        }

        .modalCloseBtn {
            border: none;
            padding: 8px 10px;
            border-radius: 5px;
        }

        .allergiesdtl li {
            display: flex;
            align-items: center;
            justify-content: space-between;

        }

        .Bottom_btn {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            /* position: absolute; */
            right: 23px;
            top: 25px;
        }
        .action_btn_tooltip_ {
                    border: none;
                    cursor: pointer;
                    display: block;
                    position: relative;
                    overflow: visible;
                    padding: 0;
                    border: 2px solid #8f8f8f;
                    border-radius: 50px;
                    display: flex;
                    margin-right: 12px;
                    width: 35px;
                    height: 35px;
                    align-items: center;
                    justify-content: center;
                    background: #ffffff;
                    color: #7983B4;
                }
               .action_btn_tooltip_  iconify-icon
               {
                position: absolute;
               }
                .content-header nav{
                    right: 3%;
                    position: absolute;
                }
                .sypm_tom_cnt {
  max-height: 100% !important;
}
    </style>





    @php
        $showAlert = false;
        if (isset($patient)) 
        {
            if ($patient->check_edit_referal == '0') 
            {
                if (Auth::user()->id != $patient->doctor_id) 
                {
                    $showAlert = true;
                }
            }
        }
    @endphp

    @if ($showAlert && isset($isEditAllowed) &&  $isEditAllowed)
        <script>
            function appendRandomIDToDataBsToggle() {
                const elements = document.querySelectorAll('.action_btn_tooltip');

                elements.forEach(element => {

                    // Get the value of data-bs-target
                    const targetId = element.getAttribute('data-bs-target');

                    // Remove the data-bs-toggle and data-bs-target attributes
                    element.removeAttribute('data-bs-toggle');
                    element.removeAttribute('data-bs-target');

                    // Remove the modal element with the targetId
                    if (targetId) {
                        const modalElement = document.querySelector(targetId);
                        if (modalElement) {
                            modalElement.remove();
                        }
                    }
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                appendRandomIDToDataBsToggle();
            });




        </script>
    @endif



    <div class="main_loader">
        <div class="loader3">
            <div class="loader_img">
                <img src="https://techmavesoftwaredemo.com/Design/qastarat-clinics/images/new-images/qastara-logo.png"
                    alt="Front side of logo">
            </div>

        </div>
    </div>



    @if (session('referralMessage'))
        <script>
            swal.fire({
                title: 'Success',
                html: 'Patient referred successfully!',
                icon: 'success',
                showConfirmButton: false,
                timer: 1000 // 1000 milliseconds = 1 second
            });
        </script>
    @endif


    @if (session('referralAlreadyRfd'))
        <script>
            swal.fire({
                html: 'Patient already referred to this doctor, please select other doctor.',
                icon: 'error',
                showConfirmButton: false,
                timer: 4000 // 1000 milliseconds = 1 second
            });
        </script>
    @endif


    @if (session('referralError'))
        <script>
            swal.fire({
                title: 'Error',
                html: 'Please select doctor!',
                icon: 'error',
                showConfirmButton: false,
                timer: 1000 // 1000 milliseconds = 1 second
            });
        </script>
    @endif


    @if (session('updateDiagnosis'))
        <script>
            swal.fire({
                title: 'Success',
                html: '<strong>Diagnosis updated successfully</strong>',
                icon: 'success',
                showConfirmButton: false,
                timer: 1000 // 1000 milliseconds = 1 second
            });
        </script>
    @endif

    <style>
        /* .customdotdropdown .copy_btn{
   display: none!important;
  }
   .invoicing_main_ttop {
   margin-top: 74px;
   padding: 15px;
   } */
    </style>

    <?php
    $D = json_decode(json_encode(Auth::guard('doctor')->user()->get_role()), true);
    $arr = [];
    foreach ($D as $v) {
        $arr[] = $v['permission_id'];
    }
    ?>


    <!-- PAGE CONTENT

  ============================================= -->
  

    <div id="page" class="page font--jakarta">

        <!-- HEADER

   ============================================= -->

        <header id="header" class="tra-menu navbar-dark light-hero-header white-scroll">

            <div class="header-wrapper">


                @php
                    $footer = DB::table('footers')->select('websitelogo')->first();
                @endphp

                <!-- MOBILE HEADER -->

                <div class="wsmobileheader clearfix">

                    <span class="smllogo">
                        @isset($footer->websitelogo)
                            <img src="{{ asset('/assets/video/' . $footer->websitelogo) }}" alt="footer-logo">
                        @else
                            <img src="{{ asset('/assets/images/new-images/logofwhite.png') }}" alt="footer-logo">
                        @endisset
                    </span>

                    <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>

                </div>





                <!-- NAVIGATION MENU -->

                <div class="wsmainfull menu clearfix">

                    <div class="wsmainwp clearfix">

                        <!-- HEADER BLACK LOGO -->
                        <div class="desktoplogo">
                            <a href="{{ route('admin.dashboard') }}" class="logo-black">
                                @isset($footer->websitelogo)
                                    <img class="light-theme-img"
                                        src="{{ asset('/assets/video/' . $footer->websitelogo) }}"
                                        alt="footer-logo">
                                @else
                                    <img class="dark-theme-img"
                                        src="{{ asset('/assets/images/new-images/logofwhite.png') }}"
                                        alt="footer-logo">
                                @endisset
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


                                    {{-- <li class="nl-simple" aria-haspopup="true"><a href="#" class="h-link">Messages</a></li> --}}



                                    <!-- SIMPLE NAVIGATION LINK in_array("84", $arr) || in_array("85", $arr) || in_array("86", $arr) || in_array("87", $arr) || in_array("88", $arr) || in_array("89", $arr)-->
                                    @if (in_array('11', $arr) || in_array('12', $arr))
                                        @if (true)
                                            <li class="nl-simple {{ request()->routeIs('nurseTask') ? 'active' : '' }}"
                                                aria-haspopup="true"><a href="{{ route('nurseTask') }}"
                                                    class="h-link">Tasks </a></li>
                                        @endif
                                    @else
                                        <li class="nl-simple {{ request()->routeIs('nurseTask') ? 'active' : '' }}"
                                            aria-haspopup="true"><a href="{{ route('nurseTask') }}"
                                                class="h-link">Tasks </a></li>

                                    @endif


                                    @if (in_array('1', $arr) || in_array('2', $arr) || in_array('3', $arr) || in_array('4', $arr))
                                        @if (Auth::guard('doctor')->user()->user_type !== 'pathology' &&
                                                Auth::guard('doctor')->user()->user_type !== 'radiology')
                                            <li class="nl-simple {{ request()->routeIs('user.patient') ? 'active' : '' }}"
                                                aria-haspopup="true"><a href="{{ route('user.patient') }}"
                                                    class="h-link">Patient</a></li>
                                        @endif
                                    @endif



                                    @if (in_array('7', $arr) || in_array('9', $arr))
                                        @if (Auth::guard('doctor')->user()->user_type !== 'pathology' &&
                                                Auth::guard('doctor')->user()->user_type !== 'radiology')
                                            <li class="nl-simple {{ request()->routeIs('user.invoice') ? 'active' : '' }}"
                                                aria-haspopup="true"><a href="{{ route('user.invoice') }}"
                                                    class="h-link">Invoices</a></li>
                                        @endif
                                    @endif


                                    <!-- SIMPLE NAVIGATION LINK -->

                                    @if (in_array('13', $arr))
                                        @if (Auth::guard('doctor')->user()->user_type !== 'pathology' &&
                                                Auth::guard('doctor')->user()->user_type !== 'radiology')
                                            <li class="nl-simple {{ request()->routeIs('user.calendar') ? 'active' : '' }}"
                                                aria-haspopup="true"><a href="{{ route('user.calendar') }}"
                                                    class="h-link">Calendar </a></li>
                                        @endif
                                    @endif


                                    <!-- SIMPLE NAVIGATION LINK -->
                                    @if (!Auth::guard('doctor')->user())
                                        <li class="nl-simple {{ request()->routeIs('service') ? 'active' : '' }}"
                                            aria-haspopup="true"><a href="{{ route('service') }}"
                                                class="h-link">Services--</a></li>
                                    @endif

                                </ul>

                            </nav> <!-- END MAIN MENU -->

                            <div class="profile_box">

                                <div class="profile">

                                    <div class="img-box">
                                        @php
                                            $doctor = auth('doctor')->user();
                                            $doctor_profile = '';
                                            if ($doctor->role_id == '1') {
                                                $doctor_profile =
                                                    asset('/assets/profileImage/') .
                                                    '/' .
                                                    $doctor->patient_profile_img;
                                            } elseif ($doctor->role_id == '2') {
                                                $doctor_profile =
                                                    asset('/assets/nurse_profile/') .
                                                    '/' .
                                                    $doctor->patient_profile_img;
                                            } elseif ($doctor->role_id == '5') {
                                                $doctor_profile =
                                                    asset('/assets/nurse_profile/') .
                                                    '/' .
                                                    $doctor->patient_profile_img;
                                            } elseif ($doctor->role_id == '6') {
                                                $doctor_profile =
                                                    asset('/assets/nurse_profile/') .
                                                    '/' .
                                                    $doctor->patient_profile_img;
                                            } elseif ($doctor->role_id == '11') {
                                                $doctor_profile =
                                                    asset('/assets/nurse_profile/') .
                                                    '/' .
                                                    $doctor->patient_profile_img;
                                            } elseif ($doctor->role_id == '10') {
                                                $doctor_profile =
                                                    asset('/assets/nurse_profile/') .
                                                    '/' .
                                                    $doctor->patient_profile_img;
                                            }

                                        @endphp

                                        @isset($doctor->patient_profile_img)
                                            <img src="{{ $doctor_profile }}" alt="db_img">
                                        @else
                                            <img src="{{ asset('/assets/images/team-13.jpg') }}" alt="temp_img">
                                        @endisset
                                    </div>

                                    <div class="user">

                                        <h3 class="h-link text-white" aria-haspopup="true">
                                            {{ auth('doctor')->user()->name ?? '' }}</h3>

                                    </div>

                                </div>

                                <div class="menu menu__">

                                    <ul>

                                        @auth('doctor')
                                            @if (Auth::guard('doctor')->check())
                                                <li><a href="{{ route('profile') }}"><i
                                                            class="fa-solid fa-user"></i>&nbsp;Profile</a></li>
                                                <li><a href="{{ route('admin.dashboard') }}"><i
                                                            class="fa-solid fa-house"></i>&nbsp;Dashboard</a></li>
                                                <li><a href="{{ route('doctor.logout') }}"><i
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
      


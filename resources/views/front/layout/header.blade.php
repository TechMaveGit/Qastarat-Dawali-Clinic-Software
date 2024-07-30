<!doctype html>

<html lang="en">

<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SITE TITLE -->

    <title>@stack('title')</title>



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

    <link href="{{ asset('/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}"
        rel="stylesheet">

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

</head>

<body>
    

   <style>
    .cke_notification_warning{
        z-index: 0;
        display: none;
    }
    .cke_notifications_area{
        z-index: 0;
        display: none;
    }
   </style>



	<!-- PRELOADER SPINNER
		============================================= -->
		{{-- <div id="loading" class="loading--theme">
			<div id="loading-center"><span class="loader"></span></div>
		</div> --}}

		<div class="main_loader">
			<div class="loader3">
				<div class="loader_img">
				<img src="https://techmavesoftwaredemo.com/Design/qastarat-clinics/images/new-images/qastara-logo.png" alt="Front side of logo">
				</div>
				
			</div>
			</div>
	
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
				@php
				$footer = DB::table('footers')->select('websitelogo')->first();
				@endphp

			<header id="header" class="tra-menu navbar-dark light-hero-header white-scroll">
				<div class="header-wrapper">
	
	
					<!-- MOBILE HEADER -->
					<div class="wsmobileheader clearfix">
						<span class="smllogo">
							@isset($footer->websitelogo)
							<img  src="{{ asset('/assets/video/'.$footer->websitelogo) }}"
							alt="footer-logo">
							@else
							<img  src="{{ asset('/assets/images/new-images/logofwhite.png') }}"
							alt="footer-logo">
                    	@endisset
						
						</span>
						<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
					</div>
	
	
					<!-- NAVIGATION MENU -->
					<div class="wsmainfull menu clearfix">
						<div class="wsmainwp clearfix">
	
	
							<!-- HEADER BLACK LOGO -->
							<div class="desktoplogo">
								<a href="" class="logo-black">
									@isset($footer->websitelogo)
										<img class="light-theme-img"  src="{{ asset('/assets/video/'.$footer->websitelogo) }}"
										alt="footer-logo">
										@else
										<img class="dark-theme-img" src="{{ asset('/assets/images/new-images/logofwhite.png') }}"
										alt="footer-logo">
                  					  @endisset
									
								</a>
							</div>
	
							<!-- HEADER WHITE LOGO -->
							<!-- <div class="desktoplogo">
									<a href="#hero-15" class="logo-white"><img src="images/new-images/qastara-logo-new.png" alt="logo"></a>
								</div> -->
	
							<div class="right_side_box">
								<!-- MAIN MENU -->
								<nav class="wsmenu clearfix">
									<ul class="wsmenu-list nav-theme">
	
	
										
	
										<!-- SIMPLE NAVIGATION LINK service_section-->
										<li class="nl-simple"><a href="{{ url('/service') }}"
												class="h-link">Services </a>
	
										</li>
	
	
										<!-- SIGN IN LINK -->
										<!-- <li class="nl-simple reg-fst-link mobile-last-link" aria-haspopup="true">
											<a href="login.php" class="h-link login_btn">Login</a>
										</li> -->
	
	
									</ul>
								</nav> <!-- END MAIN MENU -->
	
								        @php
                                                $doctor=auth('web')->user();
											
                                            @endphp

											@if($doctor)
									 <div class="profile_box">

                                    <div class="profile">
    
    
    
                                        <div class="img-box">
                                           
                                        @isset($doctor->patient_profile_img)
                                        <img src="{{ asset('/assets/patient_profile/' . $doctor->patient_profile_img) }}"
                                        alt="">
                                        @else
                                        <img src="{{ asset('/assets/images/team-13.jpg') }}"
                                        alt="">
                                        @endisset
                                          
    
                                        </div>
    
                                        <div class="user">
    
                                            <h3 class="h-link text-white">{{ auth('web')->user()->name ?? '' }}</h3>
    
                                        </div>
    
                                    </div>
                                    <div class="menu menu__">
    
                                        <ul>
    
                                            <li><a href="{{ route('patient.profile') }}"><i class="fa-solid fa-user"></i>&nbsp;Profile</a></li>
                                            <li><a href="{{ route('patient.myLabResult') }}"><i class="fa-solid fa-file-medical"></i>&nbsp;My result</a></li>
                                            <li><a href="{{ route('patient.dashboard') }}"><i class="fa-solid fa-house"></i>&nbsp;Dashboard</a>
                                            </li>
                                            @auth('web')
                                                @if (Auth::user()->role == 'user')
                                                    <li><a href="{{ route('patient.logout') }}"><i
                                                                class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;Sign
                                                            Out</a></li>
                                                @endif
                                            @endauth
    
    
                                        </ul>
    
                                    </div>
    
                                </div>
								@endif
							</div>
	
	
	
	
						</div>
					</div> <!-- END NAVIGATION MENU -->
	
	
				</div> <!-- End header-wrapper -->
			</header> <!-- END HEADER -->
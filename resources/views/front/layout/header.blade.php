<!doctype html>

<html lang="en">

<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SITE TITLE -->

    <title>@stack('title')</title>



    <!-- FAVICON AND TOUCH ICONS -->

    <link class="dark-theme-img" rel="icon" href="{{ asset('public/assets/images/new-images/logofwhite.png') }}" type="image/x-icon">



    <!-- GOOGLE FONTS -->

    <!-- <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- BOOTSTRAP CSS -->

    <link href="{{ url('/public/assets') }}/css/bootstrap.min.css" rel="stylesheet">





    <!-- Dropify css -->

    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

    <!-- flatpicker time -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">

    <!-- form plugin field css -->

    <link href="{{ url('/public/assets') }}/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">

    <link href="{{ url('/public/assets') }}/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css"
        rel="stylesheet">

    <link href="{{ url('/public/assets') }}/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet"
        type="text/css">

    <link href="{{ url('/public/assets') }}/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css"
        rel="stylesheet">





    <!-- DataTables -->

    <link href="{{ url('/public/assets') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <link href="{{ url('/public/assets') }}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <link href="{{ url('/public/assets') }}/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />



    <!-- Responsive datatable examples -->

    <link href="{{ url('/public/assets') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />



    <!-- FONT ICONS -->

    <link href="{{ url('/public/assets') }}/css/flaticon.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- PLUGINS STYLESHEET -->

    <link href="{{ url('/public/assets') }}/css/menu.css" rel="stylesheet">

    <link id="effect" href="{{ url('/public/assets') }}/css/dropdown-effects/fade-down.css" media="all"
        rel="stylesheet">

    <link href="{{ url('/public/assets') }}/css/magnific-popup.css" rel="stylesheet">

    <link href="{{ url('/public/assets') }}/css/owl.carousel.min.css" rel="stylesheet">

    <link href="{{ url('/public/assets') }}/css/owl.theme.default.min.css" rel="stylesheet">

    <link href="{{ url('/public/assets') }}/css/lunar.css" rel="stylesheet">



    <!-- ON SCROLL ANIMATION -->

    <link href="{{ url('/public/assets') }}/css/animate.css" rel="stylesheet">



    <!-- TEMPLATE CSS -->

    <link href="{{ url('/public/assets') }}/css/violet-theme.css" rel="stylesheet">



    <!-- Style Switcher CSS -->

    <link href="{{ url('/public/assets') }}/css/blue-theme.css" rel="alternate stylesheet" title="blue-theme">

    <link href="{{ url('/public/assets') }}/css/crocus-theme.css" rel="alternate stylesheet" title="crocus-theme">

    <link href="{{ url('/public/assets') }}/css/green-theme.css" rel="alternate stylesheet" title="green-theme">

    <link href="{{ url('/public/assets') }}/css/magenta-theme.css" rel="alternate stylesheet" title="magenta-theme">

    <link href="{{ url('/public/assets') }}/css/pink-theme.css" rel="alternate stylesheet" title="pink-theme">

    <link href="{{ url('/public/assets') }}/css/purple-theme.css" rel="alternate stylesheet" title="purple-theme">

    <link href="{{ url('/public/assets') }}/css/skyblue-theme.css" rel="alternate stylesheet" title="skyblue-theme">

    <link href="{{ url('/public/assets') }}/css/red-theme.css" rel="alternate stylesheet" title="red-theme">

    <link href="{{ url('/public/assets') }}/css/custom.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

    <link rel="stylesheet" href="{{ url('/public/assets') }}/css/sumoselect.css">

    <!-- RESPONSIVE CSS -->

    <link href="{{ url('/public/assets') }}/css/responsive.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">

    <!-- sweetalert2 asset CSS and JS -->

    <script src="{{ url('/public/assets') }}/libs/sweetalert2/sweetalert2.min.js"></script>

    <link rel="stylesheet" href="{{ url('/public/assets') }}/libs/sweetalert2/sweetalert2.min.css">

</head>

<body>



	<!-- PRELOADER SPINNER
		============================================= -->
		<div id="loading" class="loading--theme">
			<div id="loading-center"><span class="loader"></span></div>
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
							<img  src="{{ asset('public/assets/video/'.$footer->websitelogo) }}"
							alt="footer-logo">
							@else
							<img  src="{{ asset('public/assets/images/new-images/logofwhite.png') }}"
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
								<a href="{{ route('front.home.page') }}" class="logo-black">
									@isset($footer->websitelogo)
										<img class="light-theme-img"  src="{{ asset('public/assets/video/'.$footer->websitelogo) }}"
										alt="footer-logo">
										@else
										<img class="dark-theme-img" src="{{ asset('public/assets/images/new-images/logofwhite.png') }}"
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
										<li class="nl-simple {{  request()->routeIs('front.home.page') ? 'active': '' }}" aria-haspopup="true"><a href="{{ route('front.home.page') }}"
												class="h-link">Home</a></li>
										<li class="nl-simple " aria-haspopup="true"><a href="#About_Us"
												class="h-link" onclick="scrollToSection('about_us-1')">About Us</a></li>
										<li class="nl-simple" aria-haspopup="true"><a href="#Our_Branches"
												class="h-link" onclick="scrollToSection('Our_Branches')">Our Branches</a></li>
										<li class="nl-simple " aria-haspopup="true"><a href="#Qastarat_Team"
												class="h-link" onclick="scrollToSection('Qastarat_Team')">Qastarat Team</a></li>
										<!-- <li class="nl-simple active" aria-haspopup="true"><a href="#" class="h-link">Qastarat Team</a></li> -->
	
										<!-- SIMPLE NAVIGATION LINK -->
										<!-- <li class="nl-simple" aria-haspopup="true"><a href="login.php" class="h-link">Patients</a></li> -->
	
	
										<!-- SIMPLE NAVIGATION LINK service_section-->
										<li class="nl-simple" onclick="scrollToSection('service_section')"  aria-haspopup="true"><a href="#Our_Services"
												class="h-link">Services </a>
	
										</li>
	
	
										<!-- SIGN IN LINK -->
										<!-- <li class="nl-simple reg-fst-link mobile-last-link" aria-haspopup="true">
											<a href="login.php" class="h-link login_btn">Login</a>
										</li> -->
	
	
									</ul>
								</nav> <!-- END MAIN MENU -->
	
								<!-- <div class="profile_box">
								<div class="logoIconHeader profile">
								<img class="" src="images/new-images/iconqas.png" alt="logo"> 
							
								</div>
								   
										
									 </div> -->
							</div>
	
	
	
	
						</div>
					</div> <!-- END NAVIGATION MENU -->
	
	
				</div> <!-- End header-wrapper -->
			</header> <!-- END HEADER -->
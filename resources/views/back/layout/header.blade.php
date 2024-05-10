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

		<link class="dark-theme-img" rel="icon" href="{{ asset('public/assets/images/new-images/logofwhite.png') }}" type="image/x-icon">



		<!-- GOOGLE FONTS -->

		<!-- <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"> -->

		<link rel="preconnect" href="https://fonts.googleapis.com">

		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500;600;700;800;900&display=swap" rel="stylesheet">

		<!-- BOOTSTRAP CSS -->

		<link href="{{ url('public/assets') }}/css/bootstrap.min.css" rel="stylesheet">

		<link rel="stylesheet" href="{{ url('public/assets') }}/invoiceassets/css/style.css">

		<!-- Dropify css -->

		<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

       <!-- flatpicker time -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">

        <!-- form plugin field css -->

        <link href="{{ url('public/assets') }}/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">

        <link href="{{ url('public/assets') }}/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

        <link href="{{ url('public/assets') }}/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">

        <link href="{{ url('public/assets') }}/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">



		 <!-- DataTables -->

		 <link href="{{ url('public/assets') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <link href="{{ url('public/assets') }}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <link href="{{ url('public/assets') }}/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />



        <!-- Responsive datatable examples -->

        <link href="{{ url('public/assets') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />



		<!-- FONT ICONS -->

		<link href="{{ url('public/assets') }}/css/flaticon.css" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

		<!-- PLUGINS STYLESHEET -->

		<link href="{{ url('public/assets') }}/css/menu.css" rel="stylesheet">

		<link id="effect" href="{{ url('public/assets') }}/css/dropdown-effects/fade-down.css" media="all" rel="stylesheet">

		<link href="{{ url('public/assets') }}/css/magnific-popup.css" rel="stylesheet">

		<link href="{{ url('public/assets') }}/css/owl.carousel.min.css" rel="stylesheet">

		<link href="{{ url('public/assets') }}/css/owl.theme.default.min.css" rel="stylesheet">

		<link href="{{ url('public/assets') }}/css/lunar.css" rel="stylesheet">



		<!-- ON SCROLL ANIMATION -->

		<link href="{{ url('public/assets') }}/css/animate.css" rel="stylesheet">



		<!-- TEMPLATE CSS -->

		<link href="{{ url('public/assets') }}/css/violet-theme.css" rel="stylesheet">



		<!-- Style Switcher CSS -->

		<link href="{{ url('public/assets') }}/css/blue-theme.css" rel="alternate stylesheet" title="blue-theme">

		<link href="{{ url('public/assets') }}/css/crocus-theme.css" rel="alternate stylesheet" title="crocus-theme">

		<link href="{{ url('public/assets') }}/css/green-theme.css" rel="alternate stylesheet" title="green-theme">

		<link href="{{ url('public/assets') }}/css/magenta-theme.css" rel="alternate stylesheet" title="magenta-theme">

		<link href="{{ url('public/assets') }}/css/pink-theme.css" rel="alternate stylesheet" title="pink-theme">

		<link href="{{ url('public/assets') }}/css/purple-theme.css" rel="alternate stylesheet" title="purple-theme">

		<link href="{{ url('public/assets') }}/css/skyblue-theme.css" rel="alternate stylesheet" title="skyblue-theme">

		<link href="{{ url('public/assets') }}/css/red-theme.css" rel="alternate stylesheet" title="red-theme">

		<link href="{{ url('public/assets') }}/css/custom.css" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

		<link rel="stylesheet" href="{{ url('public/assets') }}/css/sumoselect.css">

		<!-- RESPONSIVE CSS -->

		<link href="{{ url('public/assets') }}/css/responsive.css" rel="stylesheet">

		<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css">

			<!-- sweetalert2 asset CSS and JS -->

			<script src="{{ url('public/assets') }}/libs/sweetalert2/sweetalert2.min.js"></script>

           <link rel="stylesheet" href="{{ url('public/assets') }}/libs/sweetalert2/sweetalert2.min.css">
			<!--summer note text editor-->

		   @stack('custom-css')

	</head>


<body>

	<div class="main_loader">
		<div class="loader3">
			<div class="loader_img">
			<img src="https://techmavesoftwaredemo.com/Design/qastarat-clinics/images/new-images/qastara-logo.png" alt="Front side of logo">
			</div>
			
		</div>
		</div>

		

	@if(session('updateDiagnosis'))
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
 $D = json_decode(json_encode(Auth::guard('doctor')->user()->get_role()),true);
 $arr = [];
 foreach($D as $v)
 {
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
								<a href="{{ route('admin.dashboard') }}" class="logo-black">
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
									@if(in_array("11", $arr) || in_array("12", $arr))
										@if( true)
										<li class="nl-simple {{  request()->routeIs('nurseTask') ? 'active': '' }}" aria-haspopup="true"><a href="{{ route('nurseTask') }}" class="h-link">Tasks </a></li>
										@endif
									@else
								
									  <li class="nl-simple {{  request()->routeIs('nurseTask') ? 'active': '' }}" aria-haspopup="true"><a href="{{ route('nurseTask') }}" class="h-link">Tasks </a></li>
									 
									@endif


                                     @if(in_array("1", $arr) || in_array("2", $arr) || in_array("3", $arr) ||in_array("4", $arr))
										@if (Auth::guard('doctor')->user()->user_type !== 'pathology' && Auth::guard('doctor')->user()->user_type !== 'radiology')
										   <li class="nl-simple {{  request()->routeIs('user.patient') ? 'active': '' }}" aria-haspopup="true"><a href="{{ route('user.patient') }}" class="h-link">Patient</a></li>
										@endif
                                     @endif



                                     @if(in_array("7", $arr) ||  in_array("9", $arr) )
										@if (Auth::guard('doctor')->user()->user_type !== 'pathology' && Auth::guard('doctor')->user()->user_type !== 'radiology')
										<li class="nl-simple {{  request()->routeIs('user.invoice') ? 'active': '' }}" aria-haspopup="true"><a href="{{ route('user.invoice') }}" class="h-link">Invoices</a></li>                
										@endif
									 @endif


                                    <!-- SIMPLE NAVIGATION LINK -->    

									@if(in_array("13", $arr))
										@if (Auth::guard('doctor')->user()->user_type !== 'pathology' &&  Auth::guard('doctor')->user()->user_type !== 'radiology')
											<li class="nl-simple {{  request()->routeIs('user.calendar') ? 'active': '' }}" aria-haspopup="true"><a href="{{ route('user.calendar') }}" class="h-link">Calendar </a></li>
										@endif
									@endif


                                    <!-- SIMPLE NAVIGATION LINK -->
									@if (Auth::guard('doctor')->user()->user_type !== 'pathology' &&  Auth::guard('doctor')->user()->user_type !== 'radiology')
							    	<li class="nl-simple {{  request()->routeIs('service') ? 'active': '' }}" aria-haspopup="true"><a href="{{ route('service') }}" class="h-link">Services</a></li>

									@endif


                                    <!-- SIMPLE NAVIGATION LINK -->

                                    <!-- <li class="nl-simple" aria-haspopup="true"><a href="#" class="h-link">Contact Us</a></li> -->

							    	<!-- SIGN IN LINK -->

							    	<!-- <li class="nl-simple reg-fst-link mobile-last-link" aria-haspopup="true">

							    		<a href="login.php" class="h-link login_btn">Login</a>

							    	</li> -->









	        					</ul>

	        				</nav>	<!-- END MAIN MENU -->

                            <div class="profile_box">

                                 <div class="profile">


                                        <div class="img-box">   
											@php
											$doctor=auth('doctor')->user();
											  $doctor_profile='';
												if($doctor->role_id=='1'){
													$doctor_profile=asset('public/assets/profileImage/').'/'.$doctor->patient_profile_img;
												}elseif($doctor->role_id=='2'){
													$doctor_profile=asset('public/assets/nurse_profile/').'/'.$doctor->patient_profile_img;
												}
												elseif($doctor->role_id=='5'){
													$doctor_profile=asset('public/assets/nurse_profile/').'/'.$doctor->patient_profile_img;
												}
												elseif($doctor->role_id=='6'){
													$doctor_profile=asset('public/assets/nurse_profile/').'/'.$doctor->patient_profile_img;
												}

												elseif($doctor->role_id=='11'){
													$doctor_profile=asset('public/assets/nurse_profile/').'/'.$doctor->patient_profile_img;
												}
												
												elseif($doctor->role_id=='10'){
													$doctor_profile=asset('public/assets/nurse_profile/').'/'.$doctor->patient_profile_img;
												}
										   
										@endphp
                                           
											@isset($doctor->patient_profile_img)
											<img src="{{ $doctor_profile }}"
											alt="db_img">
											@else
											<img src="{{ asset('public/assets/images/team-13.jpg') }}"
											alt="temp_img">
											@endisset
                                        </div>

                                        <div class="user">

                                            <h3 class="h-link text-white" aria-haspopup="true">{{ auth('doctor')->user()->name ?? '' }}</h3>

                                         </div>

                                    </div>

                                    <div class="menu menu__">

                                        <ul>

											@auth('doctor')
											@if(Auth::guard('doctor')->check())
												<li><a href="{{ route('profile') }}"><i class="fa-solid fa-user"></i>&nbsp;Profile</a></li>
												<li><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i>&nbsp;Dashboard</a></li>
												{{-- <li><a href="{{ route('myLabResult') }}"><i class="fa-solid fa-file-medical"></i>&nbsp;My lab result</a></li> --}}
												<li><a href="{{ route('doctor.logout') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;Sign Out</a></li>
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

	    			</div>	<!-- END NAVIGATION MENU -->





				</div>     <!-- End header-wrapper -->

			</header>	<!-- END HEADER -->

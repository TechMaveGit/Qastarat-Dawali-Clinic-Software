<!doctype html>

<html lang="en">



<head>



		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1">

  		<!-- SITE TITLE -->

		<title>Sign Up - QASTARAT & DAWALI CLINICS</title>

							

		<!-- FAVICON AND TOUCH ICONS -->

		<link rel="icon" href="{{ url('/assets') }}/images/new-images/favicon-qastarat.png" type="image/x-icon">



	    <!-- GOOGLE FONTS -->

		<!-- <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"> -->

		<link rel="preconnect" href="https://fonts.googleapis.com">

		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500;600;700;800;900&display=swap" rel="stylesheet">

		

		<!-- BOOTSTRAP CSS -->

		<link href="{{ url('/assets') }}/css/bootstrap.min.css" rel="stylesheet">

				

		<!-- FONT ICONS -->

		<link href="{{ url('/assets') }}/css/flaticon.css" rel="stylesheet">



		<!-- PLUGINS STYLESHEET -->

		<link href="{{ url('/assets') }}/css/menu.css" rel="stylesheet">	

		<link id="effect" href="{{ url('/assets') }}/css/dropdown-effects/fade-down.css" media="all" rel="stylesheet">

		<link href="{{ url('/assets') }}/css/magnific-popup.css" rel="stylesheet">	

		<link href="{{ url('/assets') }}/css/owl.carousel.min.css" rel="stylesheet">

		<link href="{{ url('/assets') }}/css/owl.theme.default.min.css" rel="stylesheet">

		<link href="{{ url('/assets') }}/css/lunar.css" rel="stylesheet">



		<!-- ON SCROLL ANIMATION -->

		<link href="{{ url('/assets') }}/css/animate.css" rel="stylesheet">



		<!-- TEMPLATE CSS -->

		<link href="{{ url('/assets') }}/css/blue-theme.css" rel="stylesheet">



		<!-- Style Switcher CSS -->	

		<link href="{{ url('/assets') }}/css/crocus-theme.css" rel="alternate stylesheet" title="crocus-theme">	

		<link href="{{ url('/assets') }}/css/green-theme.css" rel="alternate stylesheet" title="green-theme">

		<link href="{{ url('/assets') }}/css/magenta-theme.css" rel="alternate stylesheet" title="magenta-theme">

		<link href="{{ url('/assets') }}/css/pink-theme.css" rel="alternate stylesheet" title="pink-theme">	

		<link href="{{ url('/assets') }}/css/purple-theme.css" rel="alternate stylesheet" title="purple-theme">

		<link href="{{ url('/assets') }}/css/skyblue-theme.css" rel="alternate stylesheet" title="skyblue-theme">	

		<link href="{{ url('/assets') }}/css/red-theme.css" rel="alternate stylesheet" title="red-theme">	

		<link href="{{ url('/assets') }}/css/violet-theme.css" rel="alternate stylesheet" title="violet-theme">	

		

		<!-- RESPONSIVE CSS -->

		<link href="{{ url('/assets') }}/css/responsive.css" rel="stylesheet">

		<script src="{{ url('/assets') }}/libs/sweetalert2/sweetalert2.min.js"></script>

		<link rel="stylesheet" href="{{ url('/assets') }}/libs/sweetalert2/sweetalert2.min.css">

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

		</div>	   -->

        <!-- END SWITCHER -->









		<!-- PAGE CONTENT

		============================================= -->	

		<div id="page" class="page font--jakarta">









			<!-- LOGIN PAGE

			============================================= -->

			<div id="login" class="bg--scroll login-section division">

				<div class="container">

					<div class="row justify-content-center">





						<!-- REGISTER PAGE WRAPPER -->

						<div class="col-lg-11">

							<div class="register-page-wrapper r-16 bg--fixed">	

								<div class="row">





									<!-- LOGIN PAGE TEXT -->

									<div class="col-md-6 bg_login" style="background: url({{ url('/assets') }}/images/new-images/17a8091499.png);">

                                        <div class="login_cnt_box">

                                        <div class="register-page-txt color--white">



                                         



                                            <!-- Title -->

                                            <h2 class="s-42 w-700">Create your account</h2>

                                            <!-- <h2 class="s-42 w-700 title_name">Qastarat & Dawali Clinics</h2> -->



                                            <!-- Text -->

                                            <p class="p-md mt-25">Create a free account and start using Qastarat & Dawali Clinics

                                            </p>



                                            <!-- Copyright -->

                                            <div class="register-page-copyright">

                                                <p class="p-sm">&copy; 2023 - 24 Qastarat & Dawali Clinics. <span>All Rights Reserved</span></p>

                                            </div>



                                            </div>

                                        </div>

										

									</div>	<!-- END LOGIN PAGE TEXT -->





									<!-- LOGIN FORM -->

									<div class="col-md-6">

										<div class="register-page-form">

											<!--	<form name="signinform" class="row sign-in-form">-->

                                                <form method="POST" action="{{ route('user.register.submit') }}" class="row sign-in-form">

                                                    @csrf

												<!-- Google Button -->	

												<div class="col-md-12">

												   <!-- Logo -->

												   <div class="logo">

												  <a href="{{ route('front.home.page') }}"><img class="img-fluid" src="{{ url('/assets') }}/images/new-images/qastrat-logo2.png" alt="logo-image"></a> 	

												   </div>

												  	

												</div>  



		

                                                <!-- Form Input -->	

                                                <div class="col-md-12">

													<p class="p-sm input-header">Full name</p>

												   <!--	<input class="form-control name" type="text" name="name" placeholder="John Doe"> -->	

                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="John Doe">



                                                    @error('name')

                                                        <span class="invalid-feedback" role="alert">

                                                            <strong>{{ $message }}</strong>

                                                        </span>

                                                    @enderror

												</div>

												<!-- Form Input -->	

												<div class="col-md-12">

													<p class="p-sm input-header">Email address</p>

												<!--	<input class="form-control email" type="email" name="email" placeholder="example@example.com"> -->	

                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@example.com">



                                                    @error('email')

                                                        <span class="invalid-feedback" role="alert">

                                                            <strong>{{ $message }}</strong>

                                                        </span>

                                                    @enderror

												</div>



												<!-- Form Input -->	

												<div class="col-md-12">

													<p class="p-sm input-header">Password</p>

													<div class="wrap-input">

														<span class="btn-show-pass ico-20"><span class="flaticon-visibility eye-pass"></span></span>

													<!--	<input class="form-control password" type="password" name="password" placeholder="* * * * * * * * *">  -->	

                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="* * * * * * * * *">



                                                    @error('password')

                                                        <span class="invalid-feedback" role="alert">

                                                            <strong>{{ $message }}</strong>

                                                        </span>

                                                    @enderror

													</div>

												</div>

                                                <!-- Form Input -->	

                                                <div class="col-md-12">

                                                    <p class="p-sm input-header">Password Confirmation</p>

                                                    <div class="wrap-input">

                                                        <span class="btn-show-pass ico-20"><span class="flaticon-visibility eye-pass"></span></span>

                                                    <!--	<input class="form-control password" type="password" name="password" placeholder="* * * * * * * * *">  -->	

                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="* * * * * * * * *">

                                                    </div>

                                                </div>

												<!-- Checkbox -->

												<div class="col-md-12">

													<div class="form-data">

														<span>By clicking “Create Account”, you agree to our 

															<a href="#">Terms</a> and that you have read our

															<a href="#"> Privacy Policy</a>

														</span>

													</div>

												</div>

													

												<!-- Form Submit Button -->	

												<div class="col-md-12">

													<button type="submit" class="btn btn--theme hover--theme submit">Create Account</button>

												</div>



												<!-- Log In Link -->	

												<div class="col-md-12">

													<p class="create-account text-center">

														Already have an account? @if (Route::has('user.login')) <a href="{{ route('user.login') }}" class="color--theme">Log in</a>@endif

													</p>

												</div> 



											</form> 

										</div>

									</div>	<!-- END LOGIN FORM -->





								</div>  <!-- End row -->

							</div>	<!-- End register-page-wrapper -->

						</div>	<!-- END REGISTER PAGE WRAPPER -->





			 		</div>	   <!-- End row -->	

			 	</div>	   <!-- End container -->		

			</div>	<!-- END LOGIN PAGE -->









		</div>	<!-- END PAGE CONTENT -->	









		<!-- EXTERNAL SCRIPTS

		============================================= -->	

		<script src="{{ url('/assets') }}/js/jquery-3.7.0.min.js"></script>

		<script src="{{ url('/assets') }}/js/bootstrap.min.js"></script>	

		<script src="{{ url('/assets') }}/js/modernizr.custom.js"></script>

		<script src="{{ url('/assets') }}/js/jquery.easing.js"></script>

		<script src="{{ url('/assets') }}/js/jquery.appear.js"></script>

		<script src="{{ url('/assets') }}/js/menu.js"></script>

		<script src="{{ url('/assets') }}/js/owl.carousel.min.js"></script>

		<script src="{{ url('/assets') }}/js/pricing-toggle.js"></script>

		<script src="{{ url('/assets') }}/js/jquery.magnific-popup.min.js"></script>

		<script src="{{ url('/assets') }}/js/request-form.js"></script>	

		<script src="{{ url('/assets') }}/js/jquery.validate.min.js"></script>

		<script src="{{ url('/assets') }}/js/jquery.ajaxchimp.min.js"></script>	

		<script src="{{ url('/assets') }}/js/popper.min.js"></script>

		<script src="{{ url('/assets') }}/js/lunar.js"></script>

		<script src="{{ url('/assets') }}/js/wow.js"></script>

				

		<!-- Custom Script -->		

		<script src="{{ url('/assets') }}/js/custom.js"></script>



		<script>

			$(document).on({

			    "contextmenu": function (e) {

			        console.log("ctx menu button:", e.which); 



			        // Stop the context menu

			        e.preventDefault();

			    },

			    "mousedown": function(e) { 

			        console.log("normal mouse down:", e.which); 

			    },

			    "mouseup": function(e) { 

			        console.log("normal mouse up:", e.which); 

			    }

			});

		</script>



		<script>

			$(function() {

			  $(".switch").click(function() {

			    $("body").toggleClass("theme--dark");

				    if( $( "body" ).hasClass( "theme--dark" )) {

	                	$( ".switch" ).text( "Light Mode" );

	            	} else {

	                	$( ".switch" ).text( "Dark Mode" );

	            	}

			    });

			});

		</script>



		<script>

			$(document).ready(function() {

	            if( $( "body" ).hasClass( "theme--dark" )) {

	                $( ".switch" ).text( "Light Mode" );

	            } else {

	                $( ".switch" ).text( "Dark Mode" );

	            }

	        });

		</script>







		<script src="{{ url('/assets') }}/js/changer.js"></script>

		<script defer src="{{ url('/assets') }}/js/styleswitch.js"></script>	



	</body>





</html>
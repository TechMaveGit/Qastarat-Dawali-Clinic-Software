<!doctype html>

<html lang="en">



<head>



		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1">

  		<!-- SITE TITLE -->

		<title>Forget - QASTARAT & DAWALI CLINICS</title>

							

		<!-- FAVICON AND TOUCH ICONS src -->

		<link rel="icon" href="{{ asset('/assets/images/new-images/logofwhite.png')}}" type="image/x-icon">



	    <!-- GOOGLE FONTS -->

		<!-- <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"> -->

		<link rel="preconnect" href="https://fonts.googleapis.com">

		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500;600;700;800;900&display=swap" rel="stylesheet">

		

		<!-- BOOTSTRAP CSS -->

		<link href="{{ asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">

				

		<!-- FONT ICONS -->

		<link href="{{ asset('/assets/css/flaticon.css')}}" rel="stylesheet">



		<!-- PLUGINS STYLESHEET -->

		<link href="{{ asset('/assets/css/menu.css')}}" rel="stylesheet">	

		<link id="effect" href="{{ asset('/assets/css/dropdown-effects/fade-down.css')}}" media="all" rel="stylesheet">

		<link href="{{ asset('/assets/css/magnific-popup.css')}}" rel="stylesheet">	

		<link href="{{ asset('/assets/css/owl.carousel.min.css')}}" rel="stylesheet">

		<link href="{{ asset('/assets/css/owl.theme.default.min.css')}}" rel="stylesheet">

		<link href="{{ asset('/assets/css/lunar.css')}}" rel="stylesheet">



		<!-- ON SCROLL ANIMATION -->

		<link href="{{ asset('/assets/css/animate.css')}}" rel="stylesheet">



		<!-- TEMPLATE CSS -->

		<link href="{{ asset('/assets/css/blue-theme.css')}}" rel="stylesheet">



		<!-- Style Switcher CSS -->	

		<link href="{{ asset('/assets/css/crocus-theme.css')}}" rel="alternate stylesheet" title="crocus-theme">	

		<link href="{{ asset('/assets/css/green-theme.css')}}" rel="alternate stylesheet" title="green-theme">

		<link href="{{ asset('/assets/css/magenta-theme.css')}}" rel="alternate stylesheet" title="magenta-theme">

		<link href="{{ asset('/assets/css/pink-theme.css')}}" rel="alternate stylesheet" title="pink-theme">	

		<link href="{{ asset('/assets/css/purple-theme.css')}}" rel="alternate stylesheet" title="purple-theme">

		<link href="{{ asset('/assets/css/skyblue-theme.css')}}" rel="alternate stylesheet" title="skyblue-theme">	

		<link href="{{ asset('/assets/css/red-theme.css')}}" rel="alternate stylesheet" title="red-theme">	

		<link href="{{ asset('/assets/css/violet-theme.css')}}" rel="alternate stylesheet" title="violet-theme">	

		

		<!-- RESPONSIVE CSS -->

		<link href="{{ asset('/assets/css/responsive.css')}}" rel="stylesheet">

		<!-- sweetalert2 asset CSS and JS -->

		<script src="{{ asset('/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

		<link rel="stylesheet" href="{{ asset('/assets/libs/sweetalert2/sweetalert2.min.css')}}">
		<style>

			.loader {
			border: 4px solid rgba(0, 0, 0, 0.1);
			border-left: 4px solid #333;
			border-radius: 50%;
			width: 30px;
			height: 30px;
			animation: spin 1s linear infinite;
			position: absolute;
			top: 50%;
			left: 50%;
			margin-left: -15px;
			margin-top: -15px;
			z-index: 9999;
			}

			@keyframes spin {
			0% { transform: rotate(0deg); }
			100% { transform: rotate(360deg); }
			}
		</style>

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









			<!-- RESET PASSWORD PAGE

			============================================= -->

			<section id="reset-password" class="bg--fixed reset-password-section division">

				<div class="container">

					<div class="row justify-content-center">	

						<div class="col-md-7 col-lg-5">





							<!-- LOGO -->

							<div class="login-page-logo">

								<img class="img-fluid light-theme-img" src="{{ asset('/assets/images/new-images/logofwhite.png') }}" alt="logo-image">		

								<img class="img-fluid dark-theme-img" src="{{ asset('/assets/images/new-images/logofwhite.png') }}" alt="logo-image">			

							</div> 	





							<!-- RESET PASSWORD FORM -->

							<div class="reset-page-wrapper text-center">

								<form id="resetpasswordformpage"  name="resetpasswordform" class="row reset-password-form r-10" method="POST">

									@csrf

									<!-- Title-->

									<div class="col-md-12">

										<div class="reset-form-title">

											<h5 class="s-26 w-700">Forgot your password?</h5>

											<p class="p-sm color--grey">Enter your email address, if an account exists we‘ll 

												send you a link to reset your password.

											</p>

										</div>

									</div> 



									<!-- Form Input -->	

									<div class="col-md-12">

										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="example@example.com">

										@error('email')

										<span class="invalid-feedback" role="alert">

											<strong>{{ $message }}</strong>

										</span>

									@enderror

									</div>									



									<!-- Form Submit Button -->	

									<div class="col-md-12">

										<button type="submit" class="btn btn--theme hover--theme submit">Reset My Password </button>
										<div class="loader" style="display: none;"></div>
									</div> 

								</form>	

									<!-- Form Data  -->	

									<div class="col-md-12">

										<div class="form-data text-center">

											 <span><a href="{{ route('front.home.page') }}">Never mind, I remembered!</a></span>

										</div>

									</div>



									<!-- Form Message -->

									<div class="col-lg-12 reset-form-msg">

										<span class="loading"></span>

									</div>	



								

							</div>	<!-- END RESET PASSWORD FORM -->





						</div>

			 		</div>	   <!-- End row -->	

			 	</div>	   <!-- End container -->		

			</section>	<!-- END RESET PASSWORD PAGE -->









		</div>	<!-- END PAGE CONTENT -->	









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

				

		<!-- Custom Script -->		

		<script src="{{ asset('/assets/js/custom.js')}}"></script>

		<script>

			$(document).ready(function(){
				// alert('ok');
					$('#resetpasswordformpage').submit(function (e) {

		            
					  e.preventDefault();
					
					$('.submit').prop('disabled', true);
					
					
					$('.loader').show();
					$('.submit').hide();
				
		
					  if($('#email').val()==''){
		
						swal.fire("Error!", "Email field is required!", "error");
		
					   }
					   else {
							$.ajax({
								type: "POST",
								url: "{{ route('patient.forget.password.post') }}",
								data: {'email': $('#email').val(), "_token": "{{ csrf_token() }}"},
								success: function(result) {
									
									
									let routeUrl = result.routeUrl;
									let user = result.user;

									if (user !== '') {
										swal.fire(
											'Success',
											'Reset link sent to the email',
											'success'
										).then(function() {
											window.location.href = routeUrl;
										});
									} else {
										swal.fire("Error!", "Enter valid email!", "error").then(function() {
											location.reload();
										});;
									}
								},
								error: function(xhr, status, error) {
									var errorMessage = xhr.status + ': ' + xhr.statusText;
									swal.fire("Error!", errorMessage, "error");
								}
							});
							}
		
		
					});
		
				
				});
				</script>

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







		<script src="{{ asset('/assets/js/changer.js')}}"></script>

		<script defer src="{{ asset('/assets/js/styleswitch.js')}}"></script>	



		



	</body>





</html>
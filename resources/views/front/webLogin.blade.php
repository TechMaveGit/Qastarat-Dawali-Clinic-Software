<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
  <link href="{{ asset('/assets/images/newChange/img/qastara-logo.png')}}" rel="icon" />
  <title>Qastarat - Login</title>
  <meta name="description" content="Login and Register Form Html Template">
  <meta name="author" content="harnishdesign.net">

  <!-- Web Fonts
========================= -->
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
    type='text/css'>

  <!-- Stylesheet
========================= -->
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/images/newChange/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/images/newChange/css/all.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/images/newChange/css/qastarata.css')}}" />
  <!-- Colors Css -->
  <link id="color-switcher" type="text/css" rel="stylesheet" href="{{ asset('/assets/images/newChange/color-teal.css')}}"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <script src="{{ url('//assets') }}/libs/sweetalert2/sweetalert2.min.js"></script>

  <link rel="stylesheet" href="{{ url('//assets') }}/libs/sweetalert2/sweetalert2.min.css">


</head>

<body>

  

  <div id="main-wrapper" class="oxyy-login-register">
    <div class="container-fluid px-0">
      <div class="row g-0 min-vh-100">

        <!-- Login Form
      ========================= -->
        <div class="col-md-6 d-flex flex-column signin_area">

          <div class="container padding-vertical-3 py-4">
            <div class="row g-0">
              <div class="col-md-8 mx-auto">
                <div class="left_content">
                  <h1>Full Website</h1>
                     <div class="explore_btn">
                     <a href="#"> Click here !</a>

                     </div>
                     <div class="pt">
                       Meet The Team
                     </div>
                     <div class="pt mb-1">
                       Explore our Services
                     </div>
                   </div>
                <div class="logo mt-5 mb-5 mx-auto"> <a class="d-flex" href="#" title="Oxyy">
                    <img src="{{ asset('/assets/images/newChange/img/qastara-logo-new.png')}}" alt="Oxyy"></a> </div>
              </div>
            </div>
            <div class="row g-0">
              <div class="col-11 col-md-10 col-lg-9 col-xl-8 mx-auto">

                <h1 class="fw-600 mb-1 loginHeading text-center">Welcome Back</h1>
                <section class="section questions">

                  <div class="section__inner">


                      <div class="form__tab active">
                        <fieldset class="form__group">
                           <label class="form__label" for="refinance">
                            <input class="form__input" type="radio" name="loanType" id="refinance" onclick="checkform('1')" checked>
                            <span class="form__label-name">IR Staff Login</span>
                            <svg class="form__label-check" viewBox="0 0 512 512" width="100" title="check-circle">
                              <path
                                d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" />
                            </svg>
                          </label>
                          <!-- </button> -->
                          <label class="form__label">
                            <input class="form__input" required type="radio" name="loanType" onclick="checkform('2')" id="purchase">
                            <span class="form__label-name">Patient Login</span>
                            <svg class="form__label-check" viewBox="0 0 512 512" title="check-circle">
                              <path
                                d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" />
                            </svg>
                          </label>

                        </fieldset>
                      </div>
                    </form>


                  </div>
                </section>


                <form class="form_container loginFormcontainer" id="patientLoginForm" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="email" class="form-control mt-3" name="email" id="emailAddress" required
                        placeholder="Enter Your Email">
                        <input type="hidden" name="formValue" value="1" id="formValueId"/>
                        <span class="text-danger" style="font-size: 14px" id="emailError"></span>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-12">
                                <input id="password-field" type="password" class="form-control mb-2" name="password"
                                placeholder="Password">
                                <iconify-icon id="toggle-icon" class="field-icon" icon="ph:eye"></iconify-icon>
                            </div>
                        </div>
                        <span class="text-danger" style="font-size: 14px" id="passwordError"></span>
                    </div>
                    <button type="submit" class="btn login_btn shadow-none mt-2">
                      <span id="loginBtnText">Log In</span>
                      <span id="loginBtnLoader" style="display: none;">Please wait...</span>
                    </button>
                </form>


              </div>
            </div>
            <div class="row g-0">
              <div class="col-md-8 mx-auto">
                <footer class="text-center cop_txt">
                  <span>2023-24, All Right Reserved by Qastarat & Dawali Clinics</span>
                </footer>
              </div>
            </div>
          </div>
        </div>
        <!-- Login Form End -->

        <!-- Welcome Text
      ========================= -->
        <div class="col-md-6 none">
          <div class="hero-wrap ">
            <div class="hero-mask opacity-3"></div>

            <div class="hero-content ">
              <div class="container d-flex flex-column min-vh-100">
                <div class="row g-0 my-auto">
                  <div class="col-12 col-md-12 col-lg-12 mx-auto">
                    <div class="right_img position-relative">
                      <img src="{{ asset('/assets/images/newChange/img/Health professional team-bro (1).png')}}" alt="">
                    </div>
                    <div class="right_content">
                   <h1>Full Website</h1>
                      <div class="explore_btn">
                      <a href="#"> Click here !</a>

                      </div>
                      <div class="pt">
                        Meet The Team
                      </div>
                      <div class="pt mb-1">
                        Explore our Services
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- Welcome Text End -->

      </div>
    </div>
  </div>


  <script>
    function checkform(id)
    {
        $('#formValueId').val(id);
    }
</script>


    <script>
        $(document).ready(function() {
            $('#patientLoginForm').submit(function(e) {
			e.preventDefault();

			let isValid = validateForm();
			let searchInput = null;

			if (isValid) {
				let formData = new FormData(this);

				$.ajax({
					url: "{{ route('patient.login') }}",
					type: 'POST',
					data: formData,
					processData: false,
					contentType: false,
          beforeSend: function() {
        $('#loginBtnText').hide();
        $('#loginBtnLoader').show();
    },

					success: function(result) {
						$('#patientLoginForm')[0].reset();
						$('#modelpatientLogin').modal('hide');

						if (result.error==200)
                        {
                            Swal.fire({
                                        title: '', // Empty title
                                        text: 'Login successfully!', // Success message
                                        icon: 'success',
                                        showConfirmButton: false, // Hide the default "OK" button
                                        timer: 2000 // Display the message for 2 seconds
                                    }).then(function() {
                                        var redirectUrl = "{{ route('patient.dashboard') }}";
                                        window.location.href = redirectUrl;
                                    });
                                    $('#loginBtnLoader').hide();
                                    $('#loginBtnText').show();
				             		}

                        if (result.error==301)
                        {
                            Swal.fire({
                                        title: '', // Empty title
                                        text: 'Login successfully!', // Success message
                                        icon: 'success',
                                        showConfirmButton: false, // Hide the default "OK" button
                                        timer: 2000 // Display the message for 2 seconds
                                    }).then(function() {
                                        var redirectUrl = "{{ route('admin.dashboard') }}";
                                        window.location.href = redirectUrl;
                                    });

                                    $('#loginBtnLoader').hide();
                                    $('#loginBtnText').show();
						}


					},

          
					error: function(xhr, status, error) {

            $('#loginBtnLoader').hide();
            $('#loginBtnText').show();

						if (xhr.status == 422) {
							$('#modelpatientLogin').modal('show');
							var response = JSON.parse(xhr.responseText);
							var errorMessage = response.error;
							swal.fire('Error!', errorMessage, 'error');
						} else if (xhr.status == 404) {
							swal.fire('Error!', 'The requested resource was not found.', 'error');
						} else if (xhr.status == 500) {
							swal.fire('Error!', 'Internal server error. Please try again later.', 'error');
						} else {
							swal.fire('Error!', 'Your account is inactive. Please contact support for assistance.', 'error');
						}
					}
				});






			}
		});

        function validateForm() {
			let isValid = true;


			// Validate Email Address
			let email = $('input[name="email"]').val();
			if (email === '') {
				isValid = false;

				$('#emailError').text('Email  is required');
				$('input[name="email"]').addClass('error');
			}

			// Validate password
			let password = $('input[name="password"]').val();
			if (password === '') {
				isValid = false;

				$('#passwordError').text('Password  is required');
				$('input[name="password"]').addClass('error');
			}

			return isValid;
		}


    });
</script>


  <script>
    document.getElementById('toggle-icon').addEventListener('click', function () {
      var icon = this;
      var passwordField = document.getElementById('password-field');

      if (icon.getAttribute('icon') === 'ph:eye') {
        icon.setAttribute('icon', 'ph:eye-slash');
        passwordField.type = 'text';
      } else {
        icon.setAttribute('icon', 'ph:eye');
        passwordField.type = 'password';
      }
    });
  </script>


  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
  <script src="{{ asset('/assets/images/newChange/js/jquery.min.js')}}"></script>
  <script src="{{ asset('/assets/images/newChange/js/bootstrap.min.js')}}"></script>
  <!-- Style Switcher -->
  <script src="{{ asset('/assets/images/newChange/js/switcher.min.js')}}"></script>
  <script src="{{ asset('/assets/images/newChange/js/theme.js')}}"></script>




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

</body>

</html>

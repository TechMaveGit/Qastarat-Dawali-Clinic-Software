<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - QASTARAT & DAWALI CLINICS</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/superAdmin/login/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/superAdmin/login/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/superAdmin/login/css/iofrm-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/superAdmin/login/css/iofrm-theme12.css')}}">
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="{{ url('/') }}">
                                <div class="logo">
                                    <img class="logo-size" src="{{ asset('public/superAdmin/login/new-img/logo.png')}}" alt="">
                                </div>
                            </a>
                        </div>
                        <h3>Get more things done with Loggin platform.</h3>
                        <!-- <p>Access to the most powerfull tool in the entire design and web industry.</p> -->
                        {{-- <div class="page-links">
                            <a href="login.html" class="active">Login</a><a href="register.html">Register</a>
                        </div> --}}
                        <form action="{{ route('admin.login') }}" method="post"/> @csrf
                            <input class="form-control" type="text" name="email" placeholder="E-mail Address" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))

									<h6><span class="text-danger">{{ $errors->first('password') }}</span></h6>

							    	@endif

                                    @if (\Session::has('success'))

									<div class="">

										<ul>

											<li style="display: contents;

                                            color: red;">{!! \Session::get('success') !!}</li>

										</ul>

									</div>

									@endif
                            <div class="form-button">
                                <button type="submit" class="ibtn">Login</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('public/superAdmin/login/js/jquery.min.js')}}"></script>
<script src="{{ asset('public/superAdmin/login/js/popper.min.js')}}"></script>
<script src="{{ asset('public/superAdmin/login/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/superAdmin/login/js/main.js')}}"></script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/login12.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jul 2023 12:03:33 GMT -->
</html>

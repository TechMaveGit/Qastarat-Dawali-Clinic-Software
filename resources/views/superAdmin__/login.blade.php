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
    <link rel="icon" href="{{ asset('public/superAdmin/images/newimages/iconlogo.png')}}">
    <link href="{{ url('public/assets') }}/css/flaticon.css" rel="stylesheet">
    <style>

        /* Default styles for the eye icon */
.btn-show-pass {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
}

/* Adjust icon size for smaller screens */
@media (max-width: 768px) {
    .btn-show-pass {
        font-size: 16px;
        right: 5px;
    }
}

/* Adjust icon size for even smaller screens */
@media (max-width: 576px) {
    .btn-show-pass {
        font-size: 14px;
        right: 3px;
    }
}

/* Adjust icon size for very small screens */
@media (max-width: 360px) {
    .btn-show-pass {
        font-size: 12px;
        right: 2px;
    }
}

    </style>
	

   
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
                                    <img class="logo-size" src="{{ asset('public/superAdmin/images/newimages/qastara-logo.png') }}" alt="">
                                </div>
                            </a>
                        </div>

                        <h3>Super Administration Login.</h3>
                        <!-- <p>Access to the most powerfull tool in the entire design and web industry.</p> -->
                        {{-- <div class="page-links">
                            <a href="login.html" class="active">Login</a><a href="register.html">Register</a>
                        </div> --}}
                        <form action="{{ route('admin.login') }}" method="post">
                            @csrf
                            <input class="form-control" type="text" name="email" placeholder="E-mail Address" required>
                            <div class="input-group">
                                <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
                                <div class="input-group-append">
                                    <span class="btn-show-pass ico-20">
                                        <span id="showPassword" class="eye-pass flaticon-visibility"></span>
                                    </span>
                                   
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <h6><span class="text-danger">{{ $errors->first('password') }}</span></h6>
                            @endif
                        
                            @if (\Session::has('success'))
                                <div class="">
                                    <ul>
                                        <li style="display: contents; color: red;">{!! \Session::get('success') !!}</li>
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

<script>
    $(document).ready(function() {
        $('#showPassword').click(function() {
            var passwordInput = $('#password');
            var fieldType = passwordInput.attr('type');

            // Toggle password visibility
            if (fieldType === 'password') {
                passwordInput.attr('type', 'text');
                $('#showPassword').removeClass('flaticon-visibility').addClass('flaticon-invisible');
            } else {
                passwordInput.attr('type', 'password');
                $('#showPassword').removeClass('flaticon-invisible').addClass('flaticon-visibility');
            }
        });
    });
</script>
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/login12.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jul 2023 12:03:33 GMT -->
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('public/superAdmin/images/newimages/iconlogo.png')}}">

    @stack('title')


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('public/superAdmin/css/vendors_css.css')}}">

	<!-- Style-->

	<link rel="stylesheet" href="{{ asset('public/superAdmin/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('public/superAdmin/css/skin_color.css')}}">
	<link rel="stylesheet" href="{{ asset('public/superAdmin/ccss/custom.css')}}">
	<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
	<link rel="stylesheet" href="{{ asset('public/superAdmin/css/sumoselect.min.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    @stack('custom-css')
</head>

<body class="hold-transition light-skin sidebar-mini theme-success fixed">



 <script>

    @if(Session::has('message'))

    toastr.options =

    {

        "closeButton" : true,

        "progressBar" : true

    }
        toastr.success("{{ session('message') }}");    @endif
    @if(Session::has('error'))

    toastr.options =

    {

        "closeButton" : true,

        "progressBar" : true

    }

            toastr.error("{{ session('error') }}");

    @endif
    @if(Session::has('info'))

    toastr.options =

    {

        "closeButton" : true,

        "progressBar" : true

    }

            toastr.info("{{ session('info') }}");

    @endif
    @if(Session::has('warning'))

    toastr.options =

    {

        "closeButton" : true,

        "progressBar" : true

    }

  toastr.warning("{{ session('warning') }}");
@endif

</script>



<div class="wrapper">
	<div id="loader"></div>

  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">
		<!-- Logo -->
		<a href="{{ route('super-admin.dashboard') }}" class="logo">
		  <!-- logo-->
		  <div class="logo-mini">
			  <span class="light-logo LogoFull_width"><img src="{{ asset('public/superAdmin/images/newimages/logo.png') }}" alt="logo"></span>
			  <span class="light-logo logowIcon"><img src="{{ asset('public/superAdmin/images/newimages/iconlogo.png') }}" alt="logo"></span>
			  <span class="dark-logo"><img src="{{ asset('public/superAdmin/images/logo-letter.png') }}" alt="logo"></span>
		  </div>

		</a>
	</div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light" data-toggle="push-menu" role="button">
					<i data-feather="align-left"></i>
			    </a>
			</li>

		</ul>
	  </div>

      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
			<li class="btn-group nav-item d-lg-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen btn-warning-light" title="Full Screen">
					<i data-feather="maximize"></i>
			    </a>
			</li>
		  <!-- Notifications -->
		  <li class="dropdown notifications-menu">
			<a href="#" class="waves-effect waves-light dropdown-toggle btn-info-light" data-bs-toggle="dropdown" title="Notifications">
			  <i data-feather="bell"></i>
			</a>
			<ul class="dropdown-menu animated bounceIn">

			  <li class="header">
				<div class="p-20">
					<div class="flexbox">
						<div>
							<h4 class="mb-0 mt-0">Notifications</h4>
						</div>
						<div>
							<a href="#" class="text-danger">Clear All</a>
						</div>
					</div>
				</div>
			  </li>

			  <li>
				<!-- inner menu: contains the actual data -->
				<ul class="menu sm-scrol">
				  <li>
					<a href="#">
					  <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-user text-primary"></i> Nunc fringilla lorem
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
					</a>
				  </li>
				</ul>
			  </li>
			  <li class="footer">
				  <a href="#">View all</a>
			  </li>
			</ul>
		  </li>

          <!-- Control Sidebar Toggle Button -->


	      <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="waves-effect waves-light dropdown-toggle w-auto l-h-12 bg-transparent py-0 no-shadow" data-bs-toggle="dropdown" title="User">
				<div class="d-flex pt-5">
					<div class="text-end me-10">
						<p class="pt-5 fs-14 mb-0 fw-700 text-primary">{{ auth('admin')->user()->name }}</p>
						<small class="fs-10 mb-0 text-uppercase text-mute">Admin</small>
					</div>
					<img src="{{ asset('public/superAdmin/images/avatar/avatar-1.png')}}" class="avatar rounded-10 bg-primary-light h-40 w-40" alt="" />
				</div>
            </a>
            <ul class="dropdown-menu animated flipInX">
              <li class="user-body">
				 <a class="dropdown-item" href="#"><i class="ti-user text-muted me-2"></i> Profile</a>
				 <!-- <a class="dropdown-item" href="#"><i class="ti-wallet text-muted me-2"></i> My Wallet</a>
				 <a class="dropdown-item" href="#"><i class="ti-settings text-muted me-2"></i> Settings</a> -->
				 <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="#"><i class="ti-lock text-muted me-2"></i> Logout</a>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">

	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">
				<li class="{{  request()->routeIs('super-admin.dashboard') ? 'active': '' }}">
				  <a href="{{ route('super-admin.dashboard') }}">
					<i data-feather="monitor"></i>
					<span>Dashboard</span>

				  </a>
				  <!-- <ul class="treeview-menu">
					<li><a href="index.html"><i class="fa-solid fa-minus"></i>Dashboard 1</a></li>
					<li><a href="index2.html"><i class="fa-solid fa-minus"></i>Dashboard 2</a></li>
					<li><a href="index3.html"><i class="fa-solid fa-minus"></i>Dashboard 3</a></li>
					<li><a href="index4.html"><i class="fa-solid fa-minus"></i>Dashboard 4</a></li>
				  </ul> -->
				</li>
				<li class="{{  request()->routeIs('permissions.index') ? 'active': '' }}" >
				  <a href="{{ route('permissions.index') }}">
					<i data-feather="unlock"></i>
					<span>User Permission</span>
				  </a>
				</li>


				<li class="{{  request()->routeIs('patients.index') ? 'active': '' }} {{  request()->routeIs('patients.create') ? 'active': '' }} {{  request()->routeIs('patients.edit') ? 'active': '' }}">
				  <a href="{{ route('patients.index') }}">
					<i data-feather="users"></i>
					<span>Patients</span>

				  </a>
				</li>
				<li class="{{  request()->routeIs('doctors.index') ? 'active': '' }}">
				  <a href="{{ route('doctors.index') }}">
					<i data-feather="activity"></i>
					<span>Doctors</span>

				  </a>


				</li>

				<li class="treeview  {{ Route::is('nurses.index', 'accountants.index', 'telecallers.index') ? 'active menu-open' : '' }}">
				  <a href="#">
					<i data-feather="user"></i>
					<span>Staff</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li class="{{ Route::is('nurses.index') ? 'active' : '' }}"><a href="{{ route('nurses.index') }}"><i class="fa-solid fa-minus"></i>Nurse</a></li>
					<li class="{{ Route::is('accountants.index') ? 'active' : '' }}"><a href="{{ route('accountants.index') }}"><i class="fa-solid fa-minus"></i>Accountant</a></li>
					<li class="{{ Route::is('telecallers.index') ? 'active' : '' }}"><a href="{{ route('telecallers.index') }}"><i class="fa-solid fa-minus"></i>Telecaller</a></li>
				  </ul>
				</li>
				<li class="treeview">
					<a href="javascript:void(0)">
					  <i data-feather="calendar"></i>
					  <span>Pathology Department</span>
					  <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
					</a>
					<ul class="treeview-menu">
					<li>
						<ul class="lab_list">
							<li><a href="#"><i class="fa-solid fa-minus"></i> Zenath Lab</a></li>
							<li><a href="#"><i class="fa-solid fa-minus"></i> JB Lab</a></li>
						</ul>
					</li>

					<li><a href="#" class="create_new"><i data-feather="plus-circle"></i> Create New Lab</a></li>
				  </ul>
				  </li>
				  <li class="treeview">
					<a href="javascript:void(0)">
					  <i data-feather="image"></i>
					  <span>Radiology Department</span>
					  <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
					</a>
					<ul class="treeview-menu">
					<li>
						<ul class="lab_list">
							<li><a href="#"><i class="fa-solid fa-minus"></i> Zenath Radio</a></li>
							<li><a href="#"><i class="fa-solid fa-minus"></i> JB Radio</a></li>
						</ul>
					</li>

					<li><a href="#" class="create_new"><i data-feather="plus-circle"></i> Create New Radio..</a></li>
				  </ul>
				  </li>
				  <li class="treeview">
				  <a href="#">
					<i data-feather="file-text"></i>
					<span>Invoice Management</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="#"><i class="fa-solid fa-minus"></i>Video Call</a></li>
					<li><a href="#"><i class="fa-solid fa-minus"></i>Audio Call</a></li>
					<!-- <li><a href="#"><i class="fa-solid fa-minus"></i>Other</a></li>	 -->

				  </ul>
				</li>
				<li >
				  <a href="#">
					<i data-feather="map-pin"></i>
					<span>Branch Management</span>

				  </a>
				</li>
				<li class="treeview">
				  <a href="#">
					<i data-feather="globe"></i>
					<span>Web Management</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="error_404.html"><i class="fa-solid fa-minus"></i>Error 404</a></li>
					<li><a href="error_500.html"><i class="fa-solid fa-minus"></i>Error 500</a></li>
					<li><a href="error_maintenance.html"><i class="fa-solid fa-minus"></i>Maintenance</a></li>
				  </ul>
				</li>
			  </ul>

			  <div class="sidebar-widgets">
				  <div class="mx-25 mb-30 pb-20 side-bx bg-primary-light rounded20">
					<div class="text-center">
						<img src="{{ asset('public/superAdmin/https://rhythm-admin-template.multipurposethemes.com/images/svg-icon/color-svg/custom-17.svg" class="sideimg p-5" alt="">
						<h4 class="title-bx text-primary">Make an Appointments</h4>
						<a href="javascript:void(0);" class="py-10 fs-14 mb-0 text-primary">
							Best Helth Care here <i class="mdi mdi-arrow-right"></i>
						</a>
					</div>
				  </div>
				<div class="copyright text-center m-25">
					<p><strong class="d-block">QASTARAT & DAWALI CLINICS</strong> © <script>document.write(new Date().getFullYear())</script> All Rights Reserved</p>
				</div>
			  </div>
		  </div>
		</div>
    </section>
  </aside>

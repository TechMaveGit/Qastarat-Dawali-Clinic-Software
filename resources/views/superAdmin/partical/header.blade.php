<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link class="dark-theme-img" rel="icon" href="{{ asset('public/assets/images/new-images/imgpsh_fullsize_anim (1).png') }}" type="image/x-icon">

    @stack('title')


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('public/superAdmin/css/vendors_css.css')}}">

	<!-- Style-->

	<link rel="stylesheet" href="{{ asset('public/superAdmin/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('public/superAdmin/css/skin_color.css')}}">
	<link rel="stylesheet" href="{{ asset('public/superAdmin/css/custom.css')}}">

	<link rel="stylesheet" href="{{ asset('public/superAdmin/css/sumoselect.min.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link href="{{ url('public/assets') }}/css/flaticon.css" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
   <link href="{{ asset('public/assets/css/toastr.min.css')}}" rel="stylesheet">
 <!-- CHARTJS JS -->
 <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
	<style>
	.website_icon iconify-icon {
	font-size: 17px;
}
.website_icon li a{
	display:flex;
	align-items:center;
	gap:10px;
}
		/* Position the wrap-input relative to serve as a container */
	.wrap-input {
		position: relative;
	}

	/* Absolute position for the icon */
	.btn-show-pass {
		position: absolute;
		right: 10px;
		top: 60%;
		transform: translateY(-50%);
		cursor: pointer;
		z-index: 1; /* Ensure the icon is above the input */
	}

	/* Adjust input padding to make space for the icon */
	.form-control {
		padding-right: 40px; /* Adjust as needed based on the icon size */
	}
    .modal-dialog {
    max-width: 800px;
    margin: 1.75rem auto;
}

			</style>
    @stack('custom-css')
	<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
	<!-- sweetalert2 asset CSS and JS -->

	<script src="{{ url('public/assets') }}/libs/sweetalert2/sweetalert2.min.js"></script>

	<link rel="stylesheet" href="{{ url('public/assets') }}/libs/sweetalert2/sweetalert2.min.css">
</head>

<body class="hold-transition light-skin sidebar-mini theme-success fixed">



 <script>

@if(Session::has('message'))
    swal.fire({
        title: 'Success',
        text: '{{ session("message") }}',
        icon: 'success',
        showConfirmButton: false,
        timer: 1000 // 1000 milliseconds = 1 second

    });
@endif



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
			  <span class="light-logo LogoFull_width"><img src="{{ asset('public/superAdmin/images/newimages/qastara-logo.png') }}" alt="logo"></span>
			  <span class="light-logo logowIcon"><img src="{{ asset('public/superAdmin/images/newimages/FullLogo-icon.png') }}" alt="logo"></span>
			  <!-- <span class="dark-logo"><img src="{{ asset('public/superAdmin/images/logo-letter.png') }}" alt="logo"></span> -->
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
		  {{-- <li class="dropdown notifications-menu">
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
		  </li> --}}


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
				 <a class="dropdown-item" href="{{ route('super-admin.profile') }}"><i class="ti-user text-muted me-2"></i> Profile</a>
				 <!-- <a class="dropdown-item" href="#"><i class="ti-wallet text-muted me-2"></i> My Wallet</a>
				 <a class="dropdown-item" href="#"><i class="ti-settings text-muted me-2"></i> Settings</a> -->
				 <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="{{ route('super-admin.logout') }}"><i class="ti-lock text-muted me-2"></i> Logout</a>
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

                <li class="{{  request()->routeIs('nurses.index') ? 'active': '' }}">
                    <a {{ Route::is('nurses.index') ? 'active' : '' }} href="{{ route('nurses.index') }}">
                      <i data-feather="activity"></i>
                      <span>Staff</span>
                    </a>
                  </li>


				{{-- <li class="treeview  {{ Route::is('nurses.index','nurses.edit','nurses.create', 'accountants.index','accountants.edit', 'accountants.create','telecallers.index') ? 'active menu-open' : '' }} ">
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
				</li> --}}

                  <li class="{{ Route::is('pathology.index') ? 'active' : '' }}">
					<a href="{{ route('pathology.index') }}">
					  <i data-feather="calendar"></i>
					  <span>Pathology Department</span>

					</a>

				  </li>

				  <li class="{{ Route::is('radiology.index') ? 'active' : '' }}">
                        <a href="{{ route('radiology.index') }}">
                        <i data-feather="image"></i>
					  <span>Radiology Department</span>
					</a>
				  </li>

                    <li class="{{ Route::is('price.radiologyPriceList') ? 'active' : '' }}">
                        <a href="{{ route('price.radiologyPriceList')}}"><i data-feather="image"></i><span>Appointments and Services</span></a>
                    </li>




				  {{-- <li class="treeview">
					<a href="javascript:void(0)">
					  <i data-feather="image"></i>
					  <span>Price Management</span>
					  <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
					</a>

					 <ul class="treeview-menu" {{ Route::is('price.pathologyPriceList','price.radiologyPriceList','price.radiologyPriceList') ? 'active menu-open' : '' }}>
							<li {{ Route::is('price.pathologyPriceList') ? 'active' : '' }}><a href="{{ route('price.pathologyPriceList') }}"><i class="fa-solid fa-minus"></i> Pathology Price</a></li>
							<li {{ Route::is('price.radiologyPriceList') ? 'active' : '' }}><a href="{{ route('price.radiologyPriceList') }}"><i class="fa-solid fa-minus"></i> Radiology Price</a></li>
							<li><a href="{{ route('expense.index') }}"><i class="fa-solid fa-minus"></i> Other Price</a></li>


				    </ul>
				  </li> --}}




				<li>
                    <a href="{{ route('branch.management.index') }}">
					<i data-feather="map-pin"></i>
					<span>Branch Management</span>

				  </a>
				</li>


				<li>
                    <a href="{{ route('snippets') }}">
					<i data-feather="map-pin"></i>
					<span>Snippet</span>

				  </a>
				</li>
				<li class="treeview  {{ Route::is('footers.footer','faqs.faq','contactUs.contactUs', 'ourTeams.ourTeam','ourBranches.ourBranch', 'ourUniqueSoftwares.ourUniqueSoftware','ourServices.ourService','ourTreatments.ourTreatment','aboutUs.aboutUs','homes.index') ? 'active menu-open' : '' }} ">
					<a href="#">
					  <i data-feather="globe"></i>
					  <span>Website</span>
					  <span class="pull-right-container">
						
						<i class="fa fa-angle-right pull-right"></i>
					  </span>
					</a>
					<ul class="treeview-menu website_icon">
					  <li class="{{ Route::is('homes.index') ? 'active' : '' }}"><a href="{{ route('homes.index') }}"><iconify-icon icon="carbon:home"></iconify-icon> Home</a></li>
					  <li class="{{ Route::is('aboutUs.aboutUs') ? 'active' : '' }}"><a href="{{ route('aboutUs.aboutUs') }}"><iconify-icon icon="mdi:about-circle-outline"></iconify-icon> About Us</a></li>
					  <li class="{{ Route::is('ourTreatments.ourTreatment') ? 'active' : '' }}"><a href="{{ route('ourTreatments.ourTreatment') }}"><iconify-icon icon="healthicons:hospitalized-outline"></iconify-icon>Our Treatments</a></li>
					  <li class="{{ Route::is('ourServices.ourService') ? 'active' : '' }}"><a href="{{ route('ourServices.ourService') }}"><iconify-icon icon="grommet-icons:services"></iconify-icon> Our Services</a></li>
					  <li class="{{ Route::is('ourUniqueSoftwares.ourUniqueSoftware') ? 'active' : '' }}"><a href="{{ route('ourUniqueSoftwares.ourUniqueSoftware') }}"><iconify-icon icon="carbon:software-resource-cluster"></iconify-icon> Our Unique Softwares</a></li>
					  <li class="{{ Route::is('ourBranches.ourBranch') ? 'active' : '' }}"><a href="{{ route('ourBranches.ourBranch') }}"><iconify-icon icon="fluent:branch-24-regular"></iconify-icon> Our Branches</a></li>
					  <li class="{{ Route::is('ourTeams.ourTeam') ? 'active' : '' }}"><a href="{{ route('ourTeams.ourTeam') }}"><iconify-icon icon="fluent:people-team-16-regular"></iconify-icon> Our Teams</a></li>
					  <li class="{{ Route::is('contactUs.contactUs') ? 'active' : '' }}"><a href="{{ route('contactUs.contactUs') }}"><iconify-icon icon="pixelarticons:contact-plus"></iconify-icon> Contact Us</a></li>
					  <li class="{{ Route::is('faqs.faq') ? 'active' : '' }}"><a href="{{ route('faqs.faq') }}"><iconify-icon icon="wpf:faq"></iconify-icon> FAQ</a></li>
					  <li class="{{ Route::is('footers.footer') ? 'active' : '' }}"><a href="{{ route('footers.footer') }}"><iconify-icon icon="fluent-mdl2:footer"></iconify-icon> Footer</a></li>
					</ul>
				  </li>
			  </ul>


			  <div class="sidebar-widgets">
				  <div class="mx-25 mb-30 pb-20 side-bx bg-primary-light rounded20">
					<div class="text-center">
						<img src="{{ asset('public/superAdmin/images/sidebar-img.svg')}}" class="sideimg p-5" alt="">
						<h4 class="title-bx text-primary">Make an Appointments</h4>
						<a href="javascript:void(0);" class="py-10 fs-14 mb-0 text-primary">
							Best Helth Care here <i class="mdi mdi-arrow-right"></i>
						</a>
					</div>
				  </div>
				<!-- <div class="copyright text-center m-25">
					<p><strong class="d-block">QASTARAT & DAWALI CLINICS</strong> © <script>document.write(new Date().getFullYear())</script> All Rights Reserved</p>
				</div> -->
			  </div>
		  </div>
		</div>
    </section>
  </aside>

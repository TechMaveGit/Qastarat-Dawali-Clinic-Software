@extends('superAdmin.superAdminLayout.main')
@push('title')
  <title>All Doctors | Super Admin</title>
@endpush
@section('content')
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="search_container">
        <div class="d-flex">
        <h4 class="page-title">All Doctors</h4>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Doctors</li>
                </ol>
            </nav>
        </div>
        <div class="search-bx mx-5">
            <div class="add_dr">
            <a href="{{ route('doctors.create') }}" class="waves-effect waves-light btn btn-md btn-primary"><i class="fa-solid fa-plus"></i> Add Doctor</a>
            </div>
						<form>
							<div class="input-group">
							  <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
							  <div class="input-group-append">
								<button class="btn" type="submit" id="button-addon3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
							  </div>
							</div>
						</form>
					</div>
        </div>


		</div>
        <section class="content">
        <div class="row">

            @forelse ($doctor as $alldoctor)

            <div class="col-12 col-lg-4">
                <div class="box ribbon-box">

                    <div class="box-body">
                        <div class="text-center">
                        <div class="dr_img_box">
                    <a href="{{ route('doctors.view',['id'=>$alldoctor->id]) }}">
                        <img class="img-fluid" src="{{ asset('public/images/avatar.png') }}" alt="">
                    </a>
                    </div>

                        <h3 class="my-10">

                        <a href="{{ route('doctors.view',['id'=>$alldoctor->id]) }}">{{ $alldoctor->name }}</a>
                        <span class="dr_id">{{ $alldoctor->doctorId }}</span>
                        </h3>

                        <h6 class="user-info mt-0 mb-0 text-fade">{{ $alldoctor->qualifications}}</h6>
                        </div>
                    </div>
                    <div class="box-footer p-0">
                        <a href="{{ route('doctors.edit',['id'=>$alldoctor->id]) }}" class="view_more_details">View More Details <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
                </div>



            @empty

            @endforelse


</div>
        </section>

      </div>
 </div>
@endsection

@extends('superAdmin.superAdminLayout.main')
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

<div class="col-12 col-lg-4">
  <div class="box ribbon-box">

    <div class="box-body">
        <div class="text-center">
        <div class="dr_img_box">
    <a href="{{ route('doctors.show',['doctor'=>1]) }}">
        <img class="img-fluid" src="{{ assets('public/images/avatar.png') }}" alt="">
      </a>
    </div>

          <h3 class="my-10">

          <a href="{{ route('doctors.show',['doctor'=>1]) }}">Dr. Tristan</a>
          <span class="dr_id">MA760607</span>
        </h3>

          <h6 class="user-info mt-0 mb-0 text-fade">Gynecologist</h6>
        </div>
    </div>
    <div class="box-footer p-0">
        <a href="{{ route('doctors.show',['doctor'=>1]) }}" class="view_more_details">View More Details <i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
  </div>
</div>
<div class="col-12 col-lg-4">
  <div class="box ribbon-box">

    <div class="box-body">
        <div class="text-center">
        <div class="dr_img_box">
    <a href="{{ route('doctors.show',['doctor'=>1]) }}">
        <img class="img-fluid" src="{{ assets('public/images/avatar2.png') }}g" alt="">
      </a>
    </div>

          <h3 class="my-10"><a href="{{ route('doctors.show',['doctor'=>1]) }}">Dr. Sophia</a> <span class="dr_id">MA760608</span></h3>
          <h6 class="user-info mt-0 mb-0 text-fade">Dentist</h6>
        </div>
    </div>
    <div class="box-footer p-0">
        <a href="{{ route('doctors.show',['doctor'=>1]) }}" class="view_more_details">View More Details <i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
  </div>
</div>
<div class="col-12 col-lg-4">
  <div class="box ribbon-box">

    <div class="box-body">
        <div class="text-center">
        <div class="dr_img_box">
    <a href="{{ route('doctors.show',['doctor'=>1]) }}">
        <img class="img-fluid" src="{{ assets('public/images/avatar3.pn') }}g" alt="">
      </a>
    </div>
          <h3 class="my-10"><a href="{{ route('doctors.show',['doctor'=>1]) }}">Dr. Jacob</a>  <span class="dr_id">MA760609</span></h3>
          <h6 class="user-info mt-0 mb-0 text-fade">Physical Therapy</h6>
        </div>
    </div>
    <div class="box-footer p-0">
        <a href="{{ route('doctors.show',['doctor'=>1]) }}" class="view_more_details">View More Details <i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
  </div>
</div>
<div class="col-12 col-lg-4">
  <div class="box">

    <div class="box-body">
        <div class="text-center">
        <div class="dr_img_box">
    <a href="{{ route('doctors.show',['doctor'=>1]) }}">
        <img class="img-fluid" src="{{ assets('public/images/avatar04.p') }}ng" alt="">
      </a>
    </div>
          <h3 class="my-10"><a href="{{ route('doctors.show',['doctor'=>1]) }}">Dr. Isabella</a>  <span class="dr_id">MA760610</span></h3>
          <h6 class="user-info mt-0 mb-0 text-fade">Nursingc</h6>
        </div>
    </div>
    <div class="box-footer p-0">
        <a href="{{ route('doctors.show',['doctor'=>1]) }}" class="view_more_details">View More Details <i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
  </div>
</div>
<div class="col-12 col-lg-4">
  <div class="box ribbon-box">

    <div class="box-body">
        <div class="text-center">
        <div class="dr_img_box">
    <a href="{{ route('doctors.show',['doctor'=>1]) }}">
        <img class="img-fluid" src="{{ assets('public/images/avatar5.pn') }}g" alt="">
      </a>
    </div>
          <h3 class="my-10"><a href="{{ route('doctors.show',['doctor'=>1]) }}">Dr. Emma</a>  <span class="dr_id">MA760611</span></h3>
          <h6 class="user-info mt-0 mb-0 text-fade">Urologist</h6>
        </div>
    </div>
    <div class="box-footer p-0">
        <a href="{{ route('doctors.show',['doctor'=>1]) }}" class="view_more_details">View More Details <i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
  </div>
</div>
<div class="col-12 col-lg-4">
  <div class="box">
    <div class="box-body">
        <div class="text-center">
        <div class="dr_img_box">
    <a href="{{ route('doctors.show',['doctor'=>1]) }}">
        <img class="img-fluid" src="{{ assets('public/images/user4-128x') }}128.jpg" alt="">
      </a>
    </div>
          <h3 class="my-10"><a href="{{ route('doctors.show',['doctor'=>1]) }}">Dr. William</a>  <span class="dr_id">MA760612</span></h3>
          <h6 class="user-info mt-0 mb-0 text-fade">Rheumatologist</h6>
        </div>
    </div>
    <div class="box-footer p-0">
        <a href="{{ route('doctors.show',['doctor'=>1]) }}" class="view_more_details">View More Details <i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
  </div>
</div>
<div class="col-12 col-lg-4">
  <div class="box">

    <div class="box-body">
        <div class="text-center">
        <div class="dr_img_box">
    <a href="{{ route('doctors.show',['doctor'=>1]) }}">
        <img class="img-fluid" src="{{ assets('public/images/user5-128x') }}128.jpg" alt="">
      </a>
    </div>
          <h3 class="my-10"><a href="{{ route('doctors.show',['doctor'=>1]) }}">Dr. Tristan</a>  <span class="dr_id">MA760613</span></h3>
          <h6 class="user-info mt-0 mb-0 text-fade">Orthopeadic</h6>
        </div>
    </div>
    <div class="box-footer p-0">
        <a href="{{ route('doctors.show',['doctor'=>1]) }}" class="view_more_details">View More Details <i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
  </div>
</div>
<div class="col-12 col-lg-4">
  <div class="box">

    <div class="box-body">
        <div class="text-center">
        <div class="dr_img_box">
    <a href="{{ route('doctors.show',['doctor'=>1]) }}">
        <img class="img-fluid" src="{{ assets('public/images/user6-128x') }}128.jpg" alt="">
      </a>
    </div>
          <h3 class="my-10"><a href="{{ route('doctors.show',['doctor'=>1]) }}">Dr. Michael</a>  <span class="dr_id">MA760614</span></h3>
          <h6 class="user-info mt-0 mb-0 text-fade">ENT Specialist</h6>
        </div>
    </div>
    <div class="box-footer p-0">
        <a href="{{ route('doctors.show',['doctor'=>1]) }}" class="view_more_details">View More Details <i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
  </div>
</div>
<div class="col-12 col-lg-4">
  <div class="box">
    <div class="box-body">
        <div class="text-center">
        <div class="dr_img_box">
        <a href="{{ route('doctors.show',['doctor'=>1]) }}">
        <img class="img-fluid" src="{{ assets('public/images/user7-128x') }}128.jpg" alt="">
      </a>
        </div>
          <h3 class="my-10"><a href="{{ route('doctors.show',['doctor'=>1]) }}">Dr. Sophia</a>  <span class="dr_id">MA760615</span></h3>
          <h6 class="user-info mt-0 mb-0 text-fade">Vascular specialist</h6>
        </div>
    </div>
    <div class="box-footer p-0">
        <a href="{{ route('doctors.show',['doctor'=>1]) }}" class="view_more_details">View More Details <i class="fa-solid fa-arrow-right-long"></i></a>
    </div>
  </div>
</div>
</div>
        </section>

      </div>
 </div>
@endsection

@extends('superAdmin.superAdminLayout.main')

@push('title')

	<title>Dashboard | Super Admin</title>

@endpush

@push('cuistom-css')



@endpush

  <!-- Content Wrapper. Contains page content -->

  @section('content')

  <div class="content-wrapper">

	  <div class="container-full">

		<!-- Main content -->

		<section class="content">

			<div class="row">

				<div class="col-xl-12 col-12">

					<div class="row">



						<div class="col-xl-3 col-md-6 col-6">

							<div class="box">

								<div class="box-body text-center">

									<div class="bg-danger-light rounded10 p-20 mx-auto w-100 h-100">

										<img src="{{ asset('public/superAdmin/images/newimages/icon-3.svg')}}" class="" alt="" />

									</div>

									<p class="text-fade mt-15 mb-5">Total Patients</p>

									<h2 class="mt-0">{{ $patients }}</h2>

								</div>

							</div>

						</div>

						<div class="col-xl-3 col-md-6 col-6">

							<div class="box">

								<div class="box-body text-center">

									<div class="bg-info-light rounded10 p-20 mx-auto w-100 h-100">

										<img src="{{ asset('public/superAdmin/images/newimages/icon-2.svg')}}" class="" alt="" />

									</div>

									<p class="text-fade mt-15 mb-5">Total Doctor</p>

									<h2 class="mt-0">{{ $doctors }}</h2>

								</div>

							</div>

						</div>

						<div class="col-xl-3 col-md-6 col-6">

							<div class="box">

								<div class="box-body text-center">

									<div class="bg-warning-light rounded10 p-20 mx-auto w-100 h-100">

										<img src="{{ asset('public/superAdmin/images/newimages/medical-team(2).png')}}" class="" alt="" />

									</div>

									<p class="text-fade mt-15 mb-5">Total Staff</p>

									<h2 class="mt-0">{{ $nurses + $telecallers + $accountants }}</h2>

								</div>

							</div>

						</div>



						<div class="col-xl-3 col-md-6 col-6">

							<div class="box">

								<div class="box-body text-center">

									<div class="bg-primary-light rounded10 p-20 mx-auto w-100 h-100">

										<img src="{{ asset('public/superAdmin/images/newimages/flask.png')}}" class="" alt="" />

									</div>

									<p class="text-fade mt-15 mb-5">Total Lab</p>

									<h2 class="mt-0">{{ $labs }}</h2>

								</div>

							</div>

						</div>

					</div>

					<div class="row">

						<!-- <div class="col-xl-6 col-12">

							<div class="box">

								<div class="box-header">

									<h4 class="box-title">Daily Revenue Report</h4>

								</div>

								<div class="box-body">

									<h3 class="text-primary mt-0">$32,485 <small class="text-muted">$12,458</small></h3>

									<div id="recent_trend"></div>

								</div>

							</div>

						</div> -->



						<div class="col-xl-12 col-12">

							<div class="box">

								<div class="box-header with-border">

									<h4 class="box-title">Doctor List</h4>



								</div>

								<div class="box-body">

									<div class="inner_doctor_list">



                                      @forelse ($adddoctor as $alladddoctor)


										<div class="d-flex align-items-center mb-30">

											<div class="me-15">

												<img src="{{ asset('public/superAdmin/images/avatar/avatar-1.png')}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />

											</div>

											<div class="doc_dt">

											<div class="d-flex flex-column flex-grow-1 fw-500">

												<a href="#" class="text-dark hover-primary mb-1 fs-16">{{ $alladddoctor->name }}</a>

												<span class="dr_id">{{ $alladddoctor->doctor_id	 }}</span>

												<span class="text-fade">{{ $alladddoctor->qualifications }}</span>

											</div>

											<div class="view_more_btn_">

												<a href="{{ route('doctors.edit',['id'=>$alladddoctor->id]) }}">View More Details</a>

											</div>

											</div>



										</div>

                                        @empty

								<div> No Doctor Found</div>
                                        @endforelse



									</div>

								</div>

							</div>

						</div>

						</div>

				</div>

			</div>

		</section>

		<!-- /.content -->

	  </div>

  </div>

  <!-- /.content-wrapper -->

@push('custom-js')



@endpush



@endsection

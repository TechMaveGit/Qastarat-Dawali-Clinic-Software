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

								<div class="box-body ">
                                   <div class="top_card">
								   <div class="bg-danger-light rounded10 top_card_img_box">
										<img src="{{ asset('public/superAdmin/images/newimages/icon-3.svg')}}" class="" alt="" />

										</div>

										<div class="top_card_dt">
										<p class="text-fade mt-15 mb-5">Total Patients</p>
										<h2 class="mt-0">{{ $patients }}</h2>
										</div>
								   </div>




								</div>

							</div>

						</div>

						<div class="col-xl-3 col-md-6 col-6">

							<div class="box">

								<div class="box-body ">
									<div class="top_card">
									<div class="bg-info-light rounded10 top_card_img_box">
										<img src="{{ asset('public/superAdmin/images/newimages/icon-2.svg')}}" class="" alt="" />

										</div>
										<div class="top_card_dt">
										<p class="text-fade mt-15 mb-5">Total Doctor</p>
										<h2 class="mt-0">{{ $doctors }}</h2>
										</div>
									</div>

								</div>

							</div>

						</div>

						<div class="col-xl-3 col-md-6 col-6">

							<div class="box">

								<div class="box-body ">
									<div class="top_card">
									<div class="bg-warning-light rounded10 top_card_img_box">
										<img src="{{ asset('public/superAdmin/images/newimages/medical-team(2).png')}}" class="" alt="" />

										</div>

										<div class="top_card_dt">
										<p class="text-fade mt-15 mb-5">Total Staff</p>
										<h2 class="mt-0">{{  $nurseCount }}</h2>
										</div>
									</div>



								</div>

							</div>

						</div>



						<div class="col-xl-3 col-md-6 col-6">

							<div class="box">

								<div class="box-body ">
                                   <div class="top_card">
                                       <div class="bg-primary-light rounded10 top_card_img_box">

										   <img src="{{ asset('public/superAdmin/images/newimages/flask.png')}}" class="" alt="" />

									    </div>


									<div class="top_card_dt">
									   <p class="text-fade mt-15 mb-5">Total Lab</p>
                                       <h2 class="mt-0">{{ $radiology +  $pathology }}</h2>
										</div>
                                     </div>

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



						<div class="col-12">



<div class="box">

   <div class="box-header with-border">

    <div class="top_area">

    <h3 class="box-title">All Doctors</h3>

    <!-- <a href="{{ route('doctors.create') }}" class="waves-effect waves-light btn btn-md btn-primary"><i class="fa-solid fa-plus"></i> Add Doctor</a> -->

    </div>



   </div>

   <!-- /.box-header -->

   <div class="box-body pt-0">

       <div class="table-main-box">

         <table id="custom_table" class="custom_table table  table-striped table-hover" style="width:100%">

           <thead>

               <tr>
                   <th hidden></th>
                   <th>Doctor Id</th>
                   <th>Doctor Name</th>
                   <th>Specialist</th>
                   <th>Mobile No.</th>
                   <th>Email Address</th>
                   <th>Postal Code</th>
                   <th>Action</th>



               </tr>

           </thead>

           <tbody>


            @foreach ($adddoctor as $alldoctor)


               <tr>
                   <td hidden></td>

                   <td>{{ $alldoctor->doctor_id }}</td>

                   <td>

                   <div class="patent_detail__">

                    <div class="patient_profile">

                        @if (isset($alldoctor->patient_profile_img))

                        <img src="{{ asset('/public/assets/profileImage/' . $alldoctor->patient_profile_img) }}" alt="">

                        @else
                        <img src="{{ asset('public/superAdmin/images/newimages/avtar.jpg')}}" alt="">

                        @endif

                    </div>

                    <div class="patient_name__dt_">

                        <h6>{{ $alldoctor->name }}</h6>

                    </div>

                    </div>

                   </td>
                   <td>{{ $alldoctor->specialty }}</td>

                   <td>{{ $alldoctor->mobile_no }}</td>

                   <td>{{ $alldoctor->email }}</td>

                   <td>{{ $alldoctor->post_code }}</td>

                   <td>

                   <div class="btn-group">

                        <a class="hover-primary dropdown-toggle no-caret" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>

                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="{{ route('doctors.view',['id'=>$alldoctor->id]) }}">View Details</a>

                            <a class="dropdown-item" href="{{ route('doctors.edit',['id'=>$alldoctor->id]) }}">Edit Details</a>

                           {{-- <a class="dropdown-item" href="#">Delete</a> --}}

                        </div>
                    </div>
                   </td>
               </tr>

               @endforeach

           </tbody>



       </table>

       </div>

   </div>

   <!-- /.box-body -->

 </div>

 <!-- /.box -->

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

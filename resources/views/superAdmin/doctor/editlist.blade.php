



@extends('superAdmin.superAdminLayout.main')
@push('title')
  <title>Edit Doctor | Super Admin</title>
@endpush
@section('content')


<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

	  <div class="container-full">

	<!-- Content Header (Page header) -->

    <div class="content-header">

        <div class="d-flex">

        <h4 class="page-title">Doctor Details</h4>

        <nav aria-label="breadcrumb">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="#">Doctor</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Doctor Details</li>

                </ol>

            </nav>

        </div>

          

		</div>

        <section class="content">

        <div class="row">

				<div class="col-xl-8 col-12">

					<div class="box">

						<div class="box-body text-end min-h-150" style="background-image:url('{{ asset('public/superAdmin/images/gallery/landscape14.jpg')}}'); background-repeat: no-repeat; background-position: center;background-size: cover;">

							<a href="doctor-edit.php" class="btn-md btn btn-success"><i class="fa-regular fa-pen-to-square"></i> Edit</a>	

						</div>						

						<div class="box-body wed-up position-relative">

							<div class="d-md-flex align-items-end">

								<!-- <img src="{{ asset('public/superAdmin/images/avatar/avatar-1.png')}}" class="bg-success-light rounded10 me-20" alt="" /> -->

                                <div class="profile_main">

                                    <div class="circle">

                                    <img class="profile-pic" src="{{ asset('public/superAdmin/images/avatar3.png')}}">



                                    </div>

                                    <div class="p-image">

                                    <i class="fa fa-camera upload-button"></i>

                                        <input class="file-upload" type="file" accept="image/*"/>

                                    </div>

                                </div>

                                <div class="dr_name">

									<h4>Dr. Johen doe</h4>

									<p><i class="fa-solid fa-user-doctor"></i> Gynecologist</p>

								</div>

							</div>

						</div>						

						<div class="box-body pt-0">

							<div class="row">

                            <!-- <div class="col-lg-12">

                                <div class="title_head">

                                    <h4>View Volunteer Info.</h4>

                                </div>

                            </div> -->

                            <div class="col-lg-12">

                                <div class="detail_box ">

                                    <ul>

                                        <li>

                                            <div class="detail_title">

                                                <h6>Date of Birth</h6>

                                            </div>

                                            <div class="detail_ans">

                                                <h6>25 jan, 1999</h6>

                                            </div>

                                        </li>

                                       

                                        <li>

                                            <div class="detail_title">

                                                <h6>Gender</h6>

                                            </div>

                                            <div class="detail_ans">

                                                <h6>Male</h6>

                                            </div>

                                        </li>

                                        <li>

                                            <div class="detail_title">

                                                <h6>Email </h6>

                                            </div>

                                            <div class="detail_ans">

                                                <h6>jhon@gmail.com</h6>

                                            </div>

                                        </li>

                                      

                                        <li>

                                            <div class="detail_title">

                                                <h6>Landline</h6>

                                            </div>

                                            <div class="detail_ans">

                                                <h6>011-222-340</h6>

                                            </div>

                                        </li>

                                        <li>

                                            <div class="detail_title">

                                                <h6>Qualifications</h6>

                                            </div>

                                            <div class="detail_ans">

                                                <h6>----</h6>

                                            </div>

                                        </li>

                                        <li>

                                            <div class="detail_title">

                                                <h6>Experience</h6>

                                            </div>

                                            <div class="detail_ans">

                                                <h6>2yr</h6>

                                            </div>

                                        </li>

                                        <li>

                                            <div class="detail_title">

                                                <h6>Working Hours</h6>

                                            </div>

                                            <div class="detail_ans">

                                                <h6>7hr</h6>

                                            </div>

                                        </li>

                                        <li>

                                            <div class="detail_title">

                                                <h6>Languages Spoken</h6>

                                            </div>

                                            <div class="detail_ans">

                                                <h6>English,Arabic,Hindi,French</h6>

                                            </div>

                                        </li>

                                        <li>

                                            <div class="detail_title">

                                                <h6>License Number</h6>

                                            </div>

                                            <div class="detail_ans">

                                                <h6>LIC9034872</h6>

                                            </div>

                                        </li>

                                        

                                    </ul>

                                    <div class="col-lg-12">

                             <div class="detail_title">

                                <h6>Address</h6>

                            </div>

                            <div class="detail_ans">

                                <h6>Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore-560016</h6>

                            </div>

                                   

                            </div>

                                </div>

                           

                            </div>

                            

                            </div>

						</div>

					</div>

					

					

				</div>

				<div class="col-xl-4 col-12">

					<div class="box">

						<div class="box-header">

							<h4 class="box-title">Today Appointments</h4>

						</div>

						

						<div class="box-body">

							<div class="inner-user-div4">

								<div>

									<div class="d-flex align-items-center mb-10">

										<div class="me-15">

											<img src="{{ asset('public/superAdmin/images/avatar/1.jpg')}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />

										</div>

										<div class="d-flex flex-column flex-grow-1 fw-500">

											<p class="hover-primary text-fade mb-1 fs-14">Shawn Hampton</p>

											<span class="text-dark fs-14">Emergency appointment</span>

										</div>

										<div>

											<p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 10:00 </p>

										</div>

									</div>



								</div>

								<div>

									<div class="d-flex align-items-center mb-10">

										<div class="me-15">

											<img src="{{ asset('public/superAdmin/images/avatar/2.jpg')}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />

										</div>

										<div class="d-flex flex-column flex-grow-1 fw-500">

											<p class="hover-primary text-fade mb-1 fs-14">Polly Paul</p>

											<span class="text-dark fs-14">USG + Consultation</span>

										</div>

                                        <div>

											<p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 10:30 </p>

										</div>

									</div>

							

								</div>

								<div>

									<div class="d-flex align-items-center mb-10">

										<div class="me-15">

											<img src="{{ asset('public/superAdmin/images/avatar/3.jpg')}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />

										</div>

										<div class="d-flex flex-column flex-grow-1 fw-500">

											<p class="hover-primary text-fade mb-1 fs-14">Johen Doe</p>

											<span class="text-dark fs-14">Laboratory screening</span>

										</div>

                                        <div>

											<p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 11:00 </p>

										</div>

									</div>

									

								</div>

								<div>

									<div class="d-flex align-items-center mb-10">

										<div class="me-15">

											<img src="{{ asset('public/superAdmin/images/avatar/4.jpg')}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />

										</div>

										<div class="d-flex flex-column flex-grow-1 fw-500">

											<p class="hover-primary text-fade mb-1 fs-14">Harmani Doe</p>

											<span class="text-dark fs-14">Keeping pregnant</span>

										</div>

										<div>

											<p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 11:30 </p>

										</div>

									</div>

									

								</div>

								<div>

									<div class="d-flex align-items-center mb-10">

										<div class="me-15">

											<img src="{{ asset('public/superAdmin/images/avatar/5.jpg')}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />

										</div>

										<div class="d-flex flex-column flex-grow-1 fw-500">

											<p class="hover-primary text-fade mb-1 fs-14">Mark Wood</p>

											<span class="text-dark fs-14">Primary doctor consultation</span>

										</div>

                                        <div>

											<p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 12:00 </p>

										</div>

									</div>

									

								</div>

								<div>

									<div class="d-flex align-items-center mb-10">

										<div class="me-15">

											<img src="{{ asset('public/superAdmin/images/avatar/6.jpg')}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />

										</div>

										<div class="d-flex flex-column flex-grow-1 fw-500">

											<p class="hover-primary text-fade mb-1 fs-14">Shawn Marsh</p>

											<span class="text-dark fs-14">Emergency appointment</span>

										</div>

										<div>

											<p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 13:00 </p>

										</div>

									</div>

								

								</div>

                                <div>

									<div class="d-flex align-items-center mb-10">

										<div class="me-15">

											<img src="{{ asset('public/superAdmin/images/avatar/7.jpg')}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />

										</div>

										<div class="d-flex flex-column flex-grow-1 fw-500">

											<p class="hover-primary text-fade mb-1 fs-14">Polly Paul</p>

											<span class="text-dark fs-14">USG + Consultation</span>

										</div>

                                        <div>

											<p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 10:30 </p>

										</div>

									</div>

							

								</div>

								<div>

									<div class="d-flex align-items-center mb-10">

										<div class="me-15">

											<img src="{{ asset('public/superAdmin/images/avatar/8.jpg')}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />

										</div>

										<div class="d-flex flex-column flex-grow-1 fw-500">

											<p class="hover-primary text-fade mb-1 fs-14">Johen Doe</p>

											<span class="text-dark fs-14">Laboratory screening</span>

										</div>

                                        <div>

											<p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 11:00 </p>

										</div>

									</div>

									

								</div>

								<div>

									<div class="d-flex align-items-center mb-10">

										<div class="me-15">

											<img src="{{ asset('public/superAdmin/images/avatar/9.jpg')}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />

										</div>

										<div class="d-flex flex-column flex-grow-1 fw-500">

											<p class="hover-primary text-fade mb-1 fs-14">Harmani Doe</p>

											<span class="text-dark fs-14">Keeping pregnant</span>

										</div>

										<div>

											<p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 11:30 </p>

										</div>

									</div>

									

								</div>

								<div>

									<div class="d-flex align-items-center mb-10">

										<div class="me-15">

											<img src="{{ asset('public/superAdmin/images/avatar/1.jpg')}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />

										</div>

										<div class="d-flex flex-column flex-grow-1 fw-500">

											<p class="hover-primary text-fade mb-1 fs-14">Mark Wood</p>

											<span class="text-dark fs-14">Primary doctor consultation</span>

										</div>

                                        <div>

											<p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 12:00 </p>

										</div>

									</div>

									

								</div>

								<div>

									<div class="d-flex align-items-center mb-10">

										<div class="me-15">

											<img src="{{ asset('public/superAdmin/images/avatar/2.jpg')}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />

										</div>

										<div class="d-flex flex-column flex-grow-1 fw-500">

											<p class="hover-primary text-fade mb-1 fs-14">Shawn Marsh</p>

											<span class="text-dark fs-14">Emergency appointment</span>

										</div>

										<div>

											<p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 13:00 </p>

										</div>

									</div>

								

								</div>

							</div>

						</div>

					</div>

								

					

				</div>

			</div>

        </section>

        

      </div>

 </div>
 @endsection
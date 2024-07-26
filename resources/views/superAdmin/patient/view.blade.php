@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Patient Details | Super Admin</title>
@endpush
@section('content')

<style>
    .imageSize{
        width: 100px;
    }
</style>

<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex">
        <h4 class="page-title">Patient Details</h4>
        <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('doctors.index') }}">Patient</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Patient Details</li>
                </ol>
            </nav> -->
        </div>

		</div>
        <section class="content">
        <div class="row">
               <div class="col-xl-8 col-12">
					<div class="box">
						<div class="box-body text-end min-h-150" style="background-repeat: no-repeat; background-position: center;background-size: cover;">
							<a href="{{ route('patients.edit',['id'=>$doctor->id]) }}" class="btn-md btn btn-success"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
						</div>
						<div class="box-body wed-up position-relative">
							<div class="d-md-flex align-items-end">
								<!-- <img src="images/avatar/avatar-1.png" class="bg-success-light rounded10 me-20" alt="" /> -->
                                <div class="profile_main">
                                    <div class="circle">


                                        @if (isset($doctor->patient_profile_img) && !empty($doctor->patient_profile_img))
                                        <img src="{{ asset('/public/assets/patient_profile/' . $doctor->patient_profile_img) }}" alt="">
                                        @else
                                        <img class="profile-pic" src="{{ asset('public/superAdmin/images/newimages/avtar.jpg')}}" alt="">

                                        @endif


                                    </div>
                                    {{-- <div class="p-image">
                                    <i class="fa fa-camera upload-button"></i>
                                        <input class="file-upload" type="file" accept="image/*"/>
                                    </div> --}}
                                </div>
                                <div class="dr_name">
									<h4>{{ $doctor->name }}</h4>
									<p> {{ $doctor->qualifications }}</p>
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


                                        <!-- <li>
                                            <div class="detail_title">
                                                <h6>Surname</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{ $doctor->sirname }}</h6>
                                            </div>
                                        </li> -->

                                        <li>
                                            <div class="detail_title">
                                                <h6>Name</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{ $doctor->name }}</h6>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="detail_title">
                                                <h6>Email </h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{ $doctor->email }}</h6>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="detail_title">
                                                <h6>Mobile No </h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{ $doctor->mobile_no }}</h6>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="detail_title">
                                                <h6>Date of Birth</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{ $doctor->birth_date }}</h6>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="detail_title">
                                                <h6>Gender</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{ $doctor->gendar }}</h6>
                                            </div>
                                        </li>


                                        <li>
                                            <div class="detail_title">
                                                <h6>Landline</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{ $doctor->landline}}</h6>
                                            </div>
                                        </li>


                                        <li>
                                            @php
                                            $doctorName= DB::table('doctors')->where('id',$doctor->doctor_id)->first();
                                         @endphp
                                            <div class="detail_title">
                                                <h6>Assigned Doctor</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{  $doctorName->name??'' }}</h6>
                                            </div>
                                        </li>




                                         <li>
                                            <div class="detail_title">
                                                <h6>Profile Image</h6>
                                            </div>

                                            <div class="detail_ans imageSize">
                                                @if($doctor->patient_profile_img)
                                                 <a href="{{ asset('public/assets/patient_profile') }}/{{ $doctor->patient_profile_img }}" target="_blank">
                                                            <img src="{{ asset('public/assets/patient_profile') }}/{{ $doctor->patient_profile_img }}" alt="Profile Image" style="max-width: 50%;"/>
                                                </a>
                                                @endif
                                            </div>

                                        </li>



                                         <li>
                                            <div class="detail_title">
                                                <h6>Address</h6>
                                            </div>
                                            <div class="detail_ans">

                                               <h6>
                                                    @if ($doctor->street)
                                                        {{ $doctor->street }} ,
                                                        @elseif($doctor->country)
                                                        {{ $doctor->country }} ,
                                                        @elseif ($doctor->town)
                                                        {{ $doctor->town }} ,
                                                        @elseif ($doctor->post_code)
                                                        {{ $doctor->post_code }}
                                                    @else

                                                    @endif
                                                </h6>
                                            </div>
                                        </li>


                                        <li>
                                            <div class="detail_title">
                                                <h6>Document Type</h6>
                                            </div>
                                            <div class="detail_ans">

                                               <h6>
                                                  {{ $doctor->document_type }}    
                                                </h6>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="detail_title">
                                                <h6>Id Number</h6>
                                            </div>
                                            <div class="detail_ans">

                                               <h6>
                                                  {{ $doctor->enterIdNumber }}
                                                </h6>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="detail_title">
                                                <h6>Branch Name</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <span class="branchcls">
                                                    @forelse ($doctor->userBranch as $getbranchName)
                                                            
                                                             <p>{{ $getbranchName->userBranchName->branch_name }} @if (!$loop->last) ,@endif</p>
                                                       
                                                       @empty
                                                  
                                                    @endforelse
                                                 </span>
                                            </div>
                                        </li>




                                    </ul>

                                </div>

                            </div>

                            </div>
						</div>
					</div>
				</div>


				<div class="col-xl-4 col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title">Total Appointments</h4>
						</div>

						<div class="box-body">
							<div class="inner-user-div4">


                                @forelse ($book_appointments as $add_book_appointments)


                                <div>
									<div class="d-flex align-items-center mb-10">   
										<div class="me-15">

										</div>
										<div class="d-flex flex-column flex-grow-1 fw-500">
                                        
											<p class="hover-primary text-fade mb-1 fs-14">{{ $add_book_appointments->appointment_type }}</p>
                                            
                                            @php
                                             $doctorDetail= DB::table('doctors')->where('id',$add_book_appointments->doctor_id)->first();
                                            @endphp
											<p class="hover-primary text-fade mb-1 fs-14">{{ $doctorDetail->name??'' }}</p>

											<span class="text-dark fs-14">{{$pathology_price_list->test_name??''}}</span>
                                            
										</div>
										<div>

                                        @php
                                            $startDate = \Carbon\Carbon::parse($add_book_appointments->start_date);
                                            $startTime = \Carbon\Carbon::createFromFormat('H:i', $add_book_appointments->start_time);
                                            $startDateTime = $startDate->copy()->setTime($startTime->hour, $startTime->minute);
                                            $formattedDateTime = $startDateTime->format('l, j F Y H:i');
                                        @endphp


                                           
											<p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> {{ $formattedDateTime }}</p>
										</div>
									</div>
                                    <hr>
								</div>
                                

                                @empty

                                @endforelse










							</div>
						</div>
					</div>
				</div>



			</div>
        </section>

      </div>
 </div>
@endsection

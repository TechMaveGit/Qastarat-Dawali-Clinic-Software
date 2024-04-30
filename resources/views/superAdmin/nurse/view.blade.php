@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Staff Details | Super Admin</title>
@endpush
@section('content')

<style>
    .imageSize{
        width: 100px;
    }
    .detail_ans{
        width: 50%;
    }
</style>

<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex">
        <h4 class="page-title">Staff Details</h4>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('doctors.index') }}">Staff</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Staff Details</li>
                </ol>
            </nav>
        </div>

		</div>
        <section class="content">
        <div class="row">
				<div class="col-xl-8 col-12">
					<div class="box">
						<div class="box-body text-end min-h-150" style="background-repeat: no-repeat; background-position: center;background-size: cover;">
							<a href="{{ route('nurses.edit',['id'=>$doctor->id]) }}" class="btn-md btn btn-success"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
						</div>
						<div class="box-body wed-up position-relative">
							<div class="d-md-flex align-items-end">
								<!-- <img src="images/avatar/avatar-1.png" class="bg-success-light rounded10 me-20" alt="" /> -->
                                <div class="profile_main">
                                    <div class="circle">

                                        {{-- https://techmavesoftwaredev.com/webclinic/public/superAdmin/images/avatar/avatar-1.png --}}

                                        @if (isset($doctor->patient_profile_img) && !empty($doctor->patient_profile_img))
                                        <img src="{{ asset('/public/assets/nurse_profile/'.'/' . $doctor->patient_profile_img) }}" alt="">
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
									<p><i class="fa-solid fa-user-doctor"></i> {{ $doctor->qualifications }}</p>
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
                                                <h6>Email </h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{ $doctor->email }}</h6>
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
                                            <div class="detail_title">
                                                <h6>Qualifications</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{ $doctor->qualifications }}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Experience</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{ $doctor->experience	 }}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Working Hours</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{ $doctor->working_hours }}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Languages Spoken</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{ $doctor->languages_spoken }}</h6>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="detail_title">
                                                <h6>License Number</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{ $doctor->lincense_no }}</h6>
                                            </div>
                                        </li>


                                         <li>
                                            <div class="detail_title">
                                                <h6>Profile Image</h6>
                                            </div>

                                            <div class="detail_ans imageSize">
                                                @if($doctor->patient_profile_img)
                                                 <a href="{{ asset('/public/assets/nurse_profile') }}/{{ $doctor->patient_profile_img }}" target="_blank">
                                                            <img src="{{ asset('/public/assets/nurse_profile') }}/{{ $doctor->patient_profile_img }}" alt="Profile Image"/>
                                                </a>
                                                @endif
                                            </div>
                                        </li>


                                        <li>
                                            <div class="detail_title">
                                                <h6>License Upload</h6>
                                            </div>
                                            <div class="detail_ans">
                                                @if($doctor->LicenseUpload)
                                                    @php
                                                        $extension = pathinfo($doctor->LicenseUpload, PATHINFO_EXTENSION);
                                                    @endphp




                                                    @if($extension == 'pdf')
                                                        <a href="{{ asset('public/assets/LicenseUpload') }}/{{ $doctor->LicenseUpload }}" target="_blank">View Document</a>
                                                    @elseif($extension=='xlsx')
                                                        <a href="{{ asset('public/assets/LicenseUpload') }}/{{ $doctor->LicenseUpload }}" target="_blank">View Document</a>
                                                    @else
                                                        <a href="{{ asset('public/assets/LicenseUpload') }}/{{ $doctor->LicenseUpload }}" target="_blank">
                                                            <img src="{{ asset('public/assets/LicenseUpload') }}/{{ $doctor->LicenseUpload }}" alt="License Image"/>
                                                        </a>
                                                    @endif
                                                @endif
                                            </div>
                                        </li>


                                     <li>
                                        <div class="detail_title">
                                            <h6>Academic Document Upload</h6>
                                        </div>
                                        <div class="detail_ans">
                                            @if($doctor->AcademicDocumentUpload)

                                              <a href="{{ asset('public/assets/AcademicDocumentUpload') }}/{{ $doctor->AcademicDocumentUpload }}" target="_blank">
                                                        <img src="{{ asset('public/assets/AcademicDocumentUpload') }}/{{ $doctor->AcademicDocumentUpload }}" alt="Profile Image"/>
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
							<h4 class="box-title">Total Task</h4>
						</div>

						<div class="box-body">
							<div class="inner-user-div4">

                               @forelse ($tasks as $alltasks)
							   @php
								$userDetail=DB::table('users')->where('id',$alltasks->patient_id)->first();
							   @endphp

								<div>
									<div class="d-flex align-items-center mb-10">
										<div class="me-15">
											@if($userDetail->patient_profile_img)
											<img src="{{ asset('public/assets/nurse_profile'.$userDetail->patient_profile_img)}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />
											@else
											<img src="{{ asset('public/superAdmin/images/newimages/avtar.jpg')}}" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />
											@endif
										</div>
										<div class="d-flex flex-column flex-grow-1 fw-500">
											<p class="hover-primary text-fade mb-1 fs-14">{{ $userDetail->name }}</p>
											@php

											   $pathology_price_list=  DB::table('pathology_price_list')->where('id',$alltasks->task);

											@endphp
											<span class="text-dark fs-14">{{$pathology_price_list->test_name??''}}</span>
										</div>
										<div>
											<p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 10:00 </p>
										</div>
									</div>
								</div>
								@empty

								<h4 class="box-title" style="bold">Not Have Any Task</h4>

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

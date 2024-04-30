@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Add Patient | Super Admin</title>
@endpush
@section('content')

<style>
.italic{
    color: red;
}
    </style>


<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex">
        <h4 class="page-title">Add Patient</h4>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('patients.index') }}">Patients</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Patient</li>
                </ol>
            </nav>
        </div>

		</div>
        <section class="content">
        <div class="row">
        <div class="col-12">

   <form action="{{ route('patients.addCreate') }}" method="post" enctype="multipart/form-data"> @csrf
            <div class="box">
                <div class="box-body">
                    <div class="row">
                    <div class="col-lg-12 mt-2">
							<div class="title_head">
								<h4>Basic Info</h4>
							</div>
						</div>

                    <div class="col-md-3">
					  <div class="form-group">
						<label class="form-label">Title <span class="clr"> * </span></label>
						<select class="form-control select2" name="title" style="width: 100%;" >
                                   <option value="">Select Any One</option>
					            	<option value="Mr" {{ old('title') == 'Mr' ? 'selected' : '' }}>Mr</option>
									<option value="Mrs" {{ old('title') == 'Mrs' ? 'selected' : '' }}>Mrs</option>
									<option value="Miss" {{ old('title') == 'Miss' ? 'selected' : '' }}>Miss</option>
									<option value="Ms" {{ old('title') == 'Ms' ? 'selected' : '' }}>Ms</option>
									<option value="Dr" {{ old('title') == 'Dr' ? 'selected' : '' }}>Dr</option>
									<option value="Lady" {{ old('title') == 'Lady' ? 'selected' : '' }}>Lady</option>
									<option value="Sir" {{ old('title') == 'Sir' ? 'selected' : '' }}>Sir</option>
									<option value="Professor" {{ old('title') == 'Professor' ? 'selected' : '' }}>Professor</option>
									<option value="Capt" {{ old('title') == 'Capt' ? 'selected' : '' }}>Capt</option>
									<option value="Lord" {{ old('title') == 'Lord' ? 'selected' : '' }}>Lord</option>
                           </select>
                           @error('title')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
					  </div>
					  <!-- /.form-group -->
					</div>
                       <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Name <span class="clr"> * </span></label>
                            <input type="text" name="name"  value="{{ old('name') }}" class="form-control" placeholder="">
                            @error('name')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                    <label class="form-label">Date of Birth</label>

                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="birth_date" value="{{ old('birth_date') }}" class="form-control pull-right datepicker" >

                                    </div>
                                    @error('birth_date')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                    <!-- /.input group -->
                                </div>
                        </div>
                            <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Gender <span class="clr"> * </span></label>
                                <select class="form-control select2" name="gendar" style="width: 100%;">
                                    <option value="">Select Any One</option>
                                    <option value="Male" {{ old('gendar') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gendar') == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gendar') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gendar')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        <!-- /.form-group -->
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Add Branch</label>

                                <select class="form-control select2 form-select" name="selectBranch[]" style="width: 100%;" multiple required>

                                {{-- <select class="form-control select2" name="doctorName" style="width: 100%;" required> --}}
                                     <option value="">Select Any One</option>
                                    @forelse ($branchs as $allbranchs)
                                       <option value="{{$allbranchs->id}}" {{ old('doctorName') == $allbranchs->id ? 'selected' : '' }} >{{$allbranchs->branch_name}}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        <!-- /.form-group -->
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Add Doctor</label>
                                <select class="form-control select2" name="doctorName" style="width: 100%;" required>
                                     <option value="">Select Any One</option>
                                    @forelse ($doctors as $alldoctors)
                                       <option value="{{$alldoctors->id}}" {{ old('doctorName') == $alldoctors->id ? 'selected' : '' }} >{{$alldoctors->name}}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        <!-- /.form-group -->
                        </div>




                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Profile Image</label>
                                  <input type="file" class="dropify1" name="patient_profile_img" id="image" accept="image/*"/>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                           <div class="col-md-10">
                               <img style="width:100px" id="showImage" class="rounded avatar-lg" src="{{ asset('public/superAdmin/images/newimages/avtar.jpg') }}" alt="Card image cap">
                           </div>
                       </div>

                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Phone & Email</h4>
							</div>
						</div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Email Address <span class="clr"> * </span></label>
                            <input type="text" name="email"  value="{{ old('email') }}" class="form-control" placeholder="">

                            @error('email')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror

                        </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Password <span class="clr">*</span></label>
                                <div class="wrap-input">
                                    <input type="password" name="password" id="password" class="form-control password" placeholder="">
                                    <span class="btn-show-pass ico-20 " >
                                        <span class="  eye-pass flaticon-visibility "></span>
                                    </span>
                                </div>
                                @error('password')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Mobile Phone <span class="clr"> * </span></label>
                            <input type="tel" name="mobile_no" value="{{ old('mobile_no') }}" class="form-control" placeholder="" minlength="10" maxlength="15">

                            @error('mobile_no')
                            <p class="error text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Landline</label>
                            <input type="tel"  name="landline" value="{{ old('landline') }}" class="form-control" placeholder="" >
                            @error('landline')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>

                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Postal Address</h4>
							</div>
						</div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Post Code</label>
                            <input type="text" name="post_code" value="{{ old('post_code') }}" class="form-control" placeholder="" minlength="4" maxlength="8">
                            @error('post_code')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Street</label>
                            <input type="text" name="street" value="{{ old('street') }}" class="form-control" placeholder="">
                            @error('street')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Town</label>
                            <input type="text" name="town"  value="{{ old('town') }}" class="form-control" placeholder="">
                            @error('town')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Country </label>
                                <select class="form-control select2" name="country" style="width: 100%;">
                                    <option value="">Select Any One</option>
                                    <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                    <option value="USA" {{ old('country') == 'USA' ? 'selected' : '' }}>USA</option>
                                </select>
                                @error('country')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Document Type</h4>
							</div>
						</div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Select Document</label>
                                <select class="form-control select2" name="document_type" style="width: 100%;">
                                    <option value="">Select Any One</option>
                                    <option value="Passport" {{ old('document_type') == 'Passport' ? 'selected' : '' }}>Passport </option>
                                    <option value="Address proof" {{ old('document_type') == 'Address proof' ? 'selected' : '' }}>Address proof</option>
                                </select>
                                @error('document_type')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        <!-- /.form-group -->
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-label">Upload Document (PDF,IMAGE) </label>
                              <input name="id_proof" type="file" class="dropify" data-height="100" />
                              </div>
                            </div>


                        {{-- <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Patient Id</label>
                            <input type="text" name="patient_id" value="{{ old('patient_id') }}" class="form-control" placeholder="">
                        </div>
                        </div> --}}

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="submit_btn text-end">
                               <button type="submit" class="waves-effect waves-light btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>

            </form>
                <!-- /.box -->
            </div>
          </div>
        </section>

      </div>
 </div>


@endsection

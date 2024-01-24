@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Add Telecaller | Super Admin </title>
@endpush
@section('content')
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex">
        <h4 class="page-title">Add Telecaller</h4>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('telecallers.index') }}">Staff</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Telecaller </li>
                </ol>
            </nav>
        </div>
          
		</div>
        <section class="content">
        <div class="row">
        <div class="col-12">
            <form action="{{ route('telecallers.create') }}" method="post"> @csrf
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
						<label class="form-label">Title</label>
						<select class="form-control select2" name="title" style="width: 100%;" required>
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
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" placeholder="" name="name">
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
                                    <input value="{{ old('birth_date') }}" type="text" class="form-control pull-right" id="datepicker" name="birth_date">
                                    @error('birth_date')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                    </div>
                                    <!-- /.input group -->
                                </div>
                        </div>
                            <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <select class="form-control select2" name="gendar" style="width: 100%;">
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
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Postal Address</h4>
							</div>
						</div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Post Code</label>
                            <input type="text" class="form-control" placeholder="" name="post_code" value="{{ old('post_code') }}">
                            @error('post_code')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Street</label>
                            <input type="text" class="form-control" placeholder="" name="street" value="{{ old('street') }}">
                            @error('street')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Town</label>
                            <input type="text" class="form-control" placeholder="" name="town" value="{{ old('town') }}">
                            @error('town')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <select class="form-control" name="country" id="countries" style="width: 100%;">
                                    <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                    <option value="USA" {{ old('country') == 'USA' ? 'selected' : '' }}>USA</option>
                                </select>
                                @error('country')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        <!-- /.form-group -->
                        </div>
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Phone & Email</h4>
							</div>
						</div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="text" class="form-control" placeholder="" name="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="">
                                @error('password')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Mobile Phone</label>
                            <input type="text" class="form-control" placeholder="" name="mobile_no" value="{{ old('mobile_no') }}">
                            @error('mobile_no')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                       
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Landline</label>
                            <input type="text" class="form-control" placeholder="" name="landline"  value="{{ old('landline') }}">
                            @error('landline')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Educational Background</h4>
							</div>
						</div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Name of University/College</label>
                            <input type="text" class="form-control" placeholder="" value="{{ old('college_name') }}" name="college_name">
                            @error('college_name')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Qualifications</label>
                                <input type="text" name="qualifications" value="{{ old('qualifications') }}" class="form-control" placeholder="">
                                @error('qualifications')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Graduation Year</label>
                            <input type="text" class="form-control" placeholder="" name="graduation_year" value="{{ old('graduation_year') }}">
                            @error('graduation_year')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Soft Skill</label>
                            <input type="text" class="form-control" placeholder="" name="soft_skill" value="{{ old('soft_skill') }}">
                            @error('soft_skill')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Experience</label>
                                <input type="text" name="experience" value="{{ old('experience') }}" class="form-control" placeholder="">
                                @error('experience')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Languages Spoken</label>
                                    <input type="text" name="languages_spoken" value="{{ old('languages_spoken') }}" class="form-control" placeholder="">
                                    @error('languages_spoken')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Communication Skill</label>
                                <select class="form-control select2" style="width: 100%;" name="communication_skill">
                                    <option value="Good" {{ old('communication_skill') =='Good'  ? 'selected' : ''}}>Good</option>
                                    <option value="Very Good" {{ old('communication_skill') =='Very Good'  ? 'selected' : ''}}>Very Good</option>
                                    <option value="Excellent" {{ old('communication_skill') =='Excellent'  ? 'selected' : ''}}>Excellent</option>

                                </select>
                                @error('communication_skill')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        <!-- /.form-group -->
                        </div>

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
                <!-- /.box -->      
            </div>
        </form>
          </div>
        </section>
        
      </div>
 </div>
@endsection
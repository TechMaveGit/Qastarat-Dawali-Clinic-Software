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
        <h4 class="page-title">Edit Doctor</h4>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Doctor</li>
                </ol>
            </nav>
        </div>

		</div>
        <section class="content">
        <div class="row">

     <form action="{{ route('doctors.edit',['id'=>$id]) }}" method="post"> @csrf
        <div class="col-12">
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
						<select class="form-control select2" style="width: 100%;" name="title">
                            <option value="Mr" {{ $doctor ->title == 'Mr' ? 'selected="selected"' : '' }}>Mr</option>
                            <option value="Mrs" {{ $doctor->title == 'Mrs' ? 'selected="selected"' : '' }}>Mrs</option>
                            <option value="Miss" {{ $doctor->title == 'Miss' ? 'selected="selected"' : '' }}>Miss</option>
                            <option value="Ms" {{ $doctor->title == 'Ms' ? 'selected="selected"' : '' }}>Ms</option>
                            <option value="Dr" {{ $doctor->title ==  'Dr' ? 'selected="selected"' : '' }}>Dr</option>
                            <option value="Lady" {{ $doctor->title ==  'Lady' ? 'selected="selected"' : '' }}>Lady</option>
                            <option value="Sir" {{ $doctor->title == 'Sir' ? 'selected="selected"' : '' }}>Sir</option>
                            <option value="Professor" {{ $doctor->title == 'Professor' ? 'selected="selected"' : '' }}>Professor</option>
                            <option value="Capt" {{ $doctor->title == 'Capt' ? 'selected="selected"' : '' }}>Capt</option>
                            <option value="Lord" {{ $doctor->title == 'Lord' ? 'selected="selected"' : '' }}>Lord</option>
                        </select>
                        @error('title')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
					  </div>
					  <!-- /.form-group -->
					</div>
                       <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label"> Name</label>
                            <input type="text" name="name" value="{{ $doctor->name }}" class="form-control" placeholder="">
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
                                    <input type="text" value="{{ $doctor->birth_date }}" name="birth_date" class="form-control pull-right" id="datepicker">
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
                                    <option value="male" {{ $doctor->gendar  == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $doctor->gendar == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ $doctor->gendar == 'other' ? 'selected' : '' }}>Other</option>
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
                            <input type="text" value="{{ $doctor->post_code }}" class="form-control" placeholder="" name="post_code">
                            @error('post_code')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Street</label>
                            <input type="text" value="{{ $doctor->street }}" class="form-control" placeholder=" " name="street">
                            @error('street')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Town</label>
                            <input type="text" value="{{ $doctor->town }}" class="form-control" placeholder="" name="town">
                            @error('town')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <select class="form-control" id="countries" style="width: 100%;" name="country">
                                    {{-- <option value=""></option>
                                    <option value="">Female</option> --}}
                                </select>
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
                            <input type="text" value="{{ $doctor->email }}" class="form-control" placeholder="" name="email">
                            @error('email')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Mobile Phone</label>
                            <input type="text" value="{{ $doctor->mobile_no }}" class="form-control" placeholder="" name="mobile_no">
                            @error('mobile_no')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Landline</label>
                            <input type="text" value="{{ $doctor->landline }}" class="form-control" placeholder="" name="landline">
                            @error('landline')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Skills Info.</h4>
							</div>
						</div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Specialty</label>
                            <input type="text" value="{{ $doctor->specialty }}" class="form-control" placeholder="" name="specialty">
                            @error('specialty')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Qualifications</label>
                            <input type="text" value="{{ $doctor->qualifications }}" class="form-control" placeholder="" name="qualifications">
                            @error('qualifications')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Experience</label>
                            <input type="text" value="{{ $doctor->experience }}" class="form-control" placeholder="" name="experience">
                            @error('experience')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Working Hours</label>
                            <input type="text" value="{{ $doctor->working_hours }}" class="form-control" placeholder="" name="working_hours">
                            @error('working_hours')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Languages Spoken</label>
                            <input type="text" value="{{ $doctor->languages_spoken }}" class="form-control" placeholder="" name="languages_spoken">
                            @error('languages_spoken')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">License Number</label>
                            <input type="text" value="{{ $doctor->lincense_no }}" class="form-control" placeholder="" name="lincense_no">
                            @error('lincense_no')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        {{-- <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Document</h4>
							</div>
						</div>
                      <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-label">License Upload</label>
                        <input name="file1" type="file" class="dropify" data-height="100" />
                        </div>
                      </div>
                      <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-label">Academic Document Upload</label>
                        <input name="file1" type="file" class="dropify" data-height="100" />
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
                <!-- /.box -->
            </div>
           </form>
          </div>
        </section>

      </div>
 </div>
@endsection

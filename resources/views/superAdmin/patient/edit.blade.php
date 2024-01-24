@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Edit Patient | Super Admin</title>
@endpush
@section('content')
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex">
        <h4 class="page-title">Edit Patient</h4>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ Route('patients.index') }}">Patients</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Patient</li>
                </ol>
            </nav>
        </div>

		</div>
        <section class="content">
        <div class="row">
        <div class="col-12">


            <form action="{{ route('patients.edit', ['id' => $patientId->id]) }}" method="post"/>@csrf
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
						<select name="title" class="form-control select2" style="width: 100%;">
						            <option value="Mr" {{ $patientId->title == 'Mr' ? 'selected="selected"' : '' }}>Mr</option>
									<option value="Mrs" {{ $patientId->title == 'Mrs' ? 'selected="selected"' : '' }}>Mrs</option>
									<option value="Miss" {{ $patientId->title == 'Miss' ? 'selected="selected"' : '' }}>Miss</option>
									<option value="Ms" {{ $patientId->title == 'Ms' ? 'selected="selected"' : '' }}>Ms</option>
									<option value="Dr" {{ $patientId->title ==  'Dr' ? 'selected="selected"' : '' }}>Dr</option>
									<option value="Lady" {{ $patientId->title ==  'Lady' ? 'selected="selected"' : '' }}>Lady</option>
									<option value="Sir" {{ $patientId->title == 'Sir' ? 'selected="selected"' : '' }}>Sir</option>
									<option value="Professor" {{ $patientId->title == 'Professor' ? 'selected="selected"' : '' }}>Professor</option>
									<option value="Capt" {{ $patientId->title == 'Capt' ? 'selected="selected"' : '' }}>Capt</option>
									<option value="Lord" {{ $patientId->title == 'Lord' ? 'selected="selected"' : '' }}>Lord</option>
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
                            <input type="text" value="{{ $patientId->name }}" name="name" class="form-control" placeholder="">
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
                                    <input type="text" name="birth_date"  value="{{ $patientId->name }}" class="form-control pull-right" id="datepicker">
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
                                    <option value="">Select Any One</option>
                                    <option value="male" {{ $patientId->gendar == 'male' ? 'selected="selected"' : '' }}>Male</option>
                                    <option value="female" {{ $patientId->gendar == 'female' ? 'selected="selected"' : '' }}>Female</option>
                                    <option value="other" {{ $patientId->gendar == 'other' ? 'selected="selected"' : '' }}>Other</option>
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
                            <input type="text" value="{{ $patientId->post_code }}" name="post_code" class="form-control" placeholder="">
                            @error('post_code')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Street</label>
                            <input type="text" value="{{ $patientId->street }}" name="street" class="form-control" placeholder="">
                            @error('street')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Town</label>
                            <input type="text" value="{{ $patientId->town }}" name="town" class="form-control" placeholder="">
                            @error('town')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <select class="form-control" id="countries" name="country" style="width: 100%;">

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
                            <input type="text" value="{{ $patientId->email }}" name="email" class="form-control" placeholder="">
                            @error('email')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Mobile Phone</label>
                            <input type="text" value="{{ $patientId->mobile_no }}" name="mobile_no" class="form-control" placeholder="">
                            @error('mobile_no')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Landline</label>
                            <input type="text" value="{{ $patientId->landline }}" name="landline" class="form-control" placeholder="">
                            @error('landline')
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
                                <select class="form-control select2"  name="document_type" style="width: 100%;">
                                    <option value="">Select Any One</option>
                                    <option value="Passport" {{ $patientId->document_type == 'Passport' ? 'selected="selected"' : '' }}>Passport </option>
                                    <option value="Address proof" {{ $patientId->document_type == 'Address proof' ? 'selected="selected"' : '' }}>Address proof</option>

                                </select>
                                @error('document_type')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        <!-- /.form-group -->
                        </div>
                        {{-- <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Patient Id</label>
                            <input type="text"  class="form-control" placeholder="">
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

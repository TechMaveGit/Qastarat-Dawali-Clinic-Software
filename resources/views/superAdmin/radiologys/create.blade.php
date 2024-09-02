@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Add Nurse | Super Admin</title>
@endpush
@section('content')
    <style>
        .italic {
            color: red;
        }
    </style>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex">
                    <h4 class="page-title">Add Nurse</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('nurses.index') }}">Nurse</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Nurse</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <form action="{{ route('nurses.create') }}" method="post" /> @csrf
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
                                            <select class="form-control select2" name="title" style="width: 100%;">
                                                <option value="Mr" {{ old('title') == 'Mr' ? 'selected' : '' }}>Mr
                                                </option>
                                                <option value="Mrs" {{ old('title') == 'Mrs' ? 'selected' : '' }}>Mrs
                                                </option>
                                                <option value="Miss" {{ old('title') == 'Miss' ? 'selected' : '' }}>Miss
                                                </option>
                                                <option value="Ms" {{ old('title') == 'Ms' ? 'selected' : '' }}>Ms
                                                </option>
                                                <option value="Dr" {{ old('title') == 'Dr' ? 'selected' : '' }}>Dr
                                                </option>
                                                <option value="Lady" {{ old('title') == 'Lady' ? 'selected' : '' }}>Lady
                                                </option>
                                                <option value="Sir" {{ old('title') == 'Sir' ? 'selected' : '' }}>Sir
                                                </option>
                                                <option value="Professor"
                                                    {{ old('title') == 'Professor' ? 'selected' : '' }}>Professor</option>
                                                <option value="Capt" {{ old('title') == 'Capt' ? 'selected' : '' }}>Capt
                                                </option>
                                                <option value="Lord" {{ old('title') == 'Lord' ? 'selected' : '' }}>Lord
                                                </option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label"> Name</label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Date of Birth</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="birth_date" value="{{ old('birth_date') }}"
                                                    class="form-control pull-right" id="datepicker">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <select class="form-control select2" name="gendar" style="width: 100%;">
                                                <option value="Male" {{ old('gendar') == 'Male' ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="Female" {{ old('gendar') == 'Female' ? 'selected' : '' }}>
                                                    Female</option>
                                                <option value="Other" {{ old('gendar') == 'Other' ? 'selected' : '' }}>
                                                    Other</option>
                                            </select>
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
                                            <input type="text" name="post_code" value="{{ old('post_code') }}"
                                                class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Street</label>
                                            <input type="text" name="street" value="{{ old('street') }}"
                                                class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Town</label>
                                            <input type="text" name="town" value="{{ old('town') }}"
                                                class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Country</label>
                                            <select class="form-control" name="country" id="countries" style="width: 100%;">
                                                <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>
                                                    India</option>
                                                <option value="USA" {{ old('country') == 'USA' ? 'selected' : '' }}>USA
                                                </option>
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
                                            <input type="text" name="email" value="{{ old('email') }}"
                                                class="form-control" placeholder="">

                                            @error('email')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="mb-3 form-group">
                                            <label for="dialCode" class="form-label">Dial Code</label>
                                            <select name="dial_code" class="form-select form-control" id="dialCode">
                                                <option value="+968">+968</option>
                                                <option value="+973">+973</option>
                                                <option value="+966">+966</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Mobile Phone</label>
                                            <input type="text" name="mobile_no" value="{{ old('mobile_no') }}"
                                                class="form-control" placeholder="">

                                            @error('mobile_no')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Landline</label>
                                            <input type="number" min="0" name="landline"
                                                value="{{ old('landline') }}" class="form-control" placeholder="">
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
                                            <input type="text" name="specialty" value="{{ old('specialty') }}"
                                                class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Qualifications</label>
                                            <input type="text" name="qualifications"
                                                value="{{ old('qualifications') }}" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Experience</label>
                                            <input type="text" name="experience" value="{{ old('experience') }}"
                                                class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Working Hours</label>
                                            <input type="text" name="working_hours"
                                                value="{{ old('working_hours') }}" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Languages Spoken</label>
                                            <input type="text" name="languages_spoken"
                                                value="{{ old('languages_spoken') }}" class="form-control"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">License Number</label>
                                            <input type="text" name="lincense_no" value="{{ old('lincense_no') }}"
                                                class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Document</h4>
							</div>
						</div> --}}
                                    {{-- <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-label">License Upload</label>
                        <input name="file1" name="" type="file" class="dropify" data-height="100" />
                        </div>
                      </div> --}}
                                    {{-- <div class="col-lg-6">
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
                                            <button type="submit" class="waves-effect waves-light btn btn-primary"><i
                                                    class="fa-regular fa-floppy-disk"></i> Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection

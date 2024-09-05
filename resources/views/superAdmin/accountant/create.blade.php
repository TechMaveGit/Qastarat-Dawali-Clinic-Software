@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Add Accountant | Super Admin</title>
@endpush
@section('content')
@php
    
    $countryCode = DB::table('dial_codes')->where('status', '1')->get();
@endphp
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex">
                    <h4 class="page-title">Add Staff</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('accountants.index') }}">Accountant</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Accountant</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <form action="{{ route('accountants.create') }}" method="post" enctype="multipart/form-data"> @csrf
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
                                                <label class="form-label">Title<span class="clr"> * </span></label>
                                                <select class="form-control select2" name="title" style="width: 100%;">
                                                    <option value="">Select Any One</option>

                                                    <option value="Mr" {{ old('title') == 'Mr' ? 'selected' : '' }}>Mr
                                                    </option>
                                                    <option value="Mrs" {{ old('title') == 'Mrs' ? 'selected' : '' }}>Mrs
                                                    </option>
                                                    <option value="Miss" {{ old('title') == 'Miss' ? 'selected' : '' }}>
                                                        Miss</option>
                                                    <option value="Ms" {{ old('title') == 'Ms' ? 'selected' : '' }}>Ms
                                                    </option>
                                                    <option value="Dr" {{ old('title') == 'Dr' ? 'selected' : '' }}>Dr
                                                    </option>
                                                    <option value="Lady" {{ old('title') == 'Lady' ? 'selected' : '' }}>
                                                        Lady</option>
                                                    <option value="Sir" {{ old('title') == 'Sir' ? 'selected' : '' }}>Sir
                                                    </option>
                                                    <option value="Professor"
                                                        {{ old('title') == 'Professor' ? 'selected' : '' }}>Professor
                                                    </option>
                                                    <option value="Capt" {{ old('title') == 'Capt' ? 'selected' : '' }}>
                                                        Capt</option>
                                                    <option value="Lord" {{ old('title') == 'Lord' ? 'selected' : '' }}>
                                                        Lord</option>
                                                </select>
                                                @error('title')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label"> Name<span class="clr"> * </span></label>
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    class="form-control" placeholder="">
                                                @error('name')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Date of Birth<span class="clr"> *
                                                    </span></label>

                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" name="birth_date" value="{{ old('birth_date') }}"
                                                        class="form-control pull-right datepicker">
                                                    @error('birth_date')
                                                        <span class="error text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Gender<span class="clr"> * </span></label>
                                                <select class="form-control select2" name="gendar" style="width: 100%;">
                                                    <option value="">Select Any One</option>
                                                    <option value="Male" {{ old('gendar') == 'Male' ? 'selected' : '' }}>
                                                        Male</option>
                                                    <option value="Female"
                                                        {{ old('gendar') == 'Female' ? 'selected' : '' }}>Female</option>
                                                    <option value="Other"
                                                        {{ old('gendar') == 'Other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                                @error('gendar')
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

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Email Address<span class="clr"> *
                                                    </span></label>
                                                <input type="text" name="email" value="{{ old('email') }}"
                                                    class="form-control" placeholder="">

                                                @error('email')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Password <span class="clr">*</span></label>
                                                <div class="wrap-input">
                                                    <input type="password" name="password" id="password"
                                                        class="form-control" placeholder="">
                                                    <span class="btn-show-pass ico-20 ">
                                                        <span class="  eye-pass flaticon-visibility "></span>
                                                    </span>
                                                </div>
                                                @error('password')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-1">
                                            <div class="mb-3 form-group">
                                                <label for="dialCode" class="form-label">Dial Code</label>
                                                <select id="dialCode" class="form-control select2" name="dial_code" data-placeholder="Select a country" data-dynamic-select required>
                                                    @foreach ($countryCode as $countryCodes)
                                                        <option value="{{ $countryCodes->dial_code }}" {{ $countryCodes->dial_code == '+968' ? 'selected' : '' }} data-img="{{ $countryCodes->flag }}"> 
                                                            {{ isset($countryCodes->dial_code) ? $countryCodes->dial_code : '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Mobile Phone<span class="clr"> *
                                                    </span></label>
                                                <input type="text" name="mobile_no" value="{{ old('mobile_no') }}"
                                                    class="form-control" placeholder="" minlength="10" maxlength="15">

                                                @error('mobile_no')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Landline</label>
                                                <input type="text" name="landline" value="{{ old('landline') }}"
                                                    class="form-control" placeholder="">
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
                                                <input type="text" name="post_code" value="{{ old('post_code') }}"
                                                    class="form-control" placeholder="" minlength="4" maxlength="8">
                                                @error('post_code')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Street</label>
                                                <input type="text" name="street" value="{{ old('street') }}"
                                                    class="form-control" placeholder="">
                                                @error('street')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Town</label>
                                                <input type="text" name="town" value="{{ old('town') }}"
                                                    class="form-control" placeholder="">
                                                @error('town')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Country</label>
                                                <select class="form-control" name="country" id="countries"
                                                    style="width: 100%;">
                                                    <option value="India"
                                                        {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                                    <option value="USA"
                                                        {{ old('country') == 'USA' ? 'selected' : '' }}>USA</option>
                                                </select>
                                                @error('country')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="title_head">
                                                <h4>Educational Background</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Name of University/College</label>
                                                <input type="text" name="college_name"
                                                    value="{{ old('college_name') }}" class="form-control"
                                                    placeholder="">
                                                @error('college_name')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Degree</label>
                                                <input type="text" name="Degree" value="{{ old('Degree') }}"
                                                    class="form-control" placeholder="">
                                                @error('Degree')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Graduation Year</label>
                                                <input type="text" name="graduation_year"
                                                    value="{{ old('graduation_year') }}" class="form-control"
                                                    placeholder="">
                                                @error('graduation_year')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Soft Skill</label>
                                                <input type="text" name="soft_skill" value="{{ old('soft_skill') }}"
                                                    class="form-control" placeholder="">
                                                @error('soft_skill')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Work Experience</label>
                                                <input type="text" name="experience" value="{{ old('experience') }}"
                                                    class="form-control" placeholder="">
                                                @error('experience')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label">Profile Image</label>
                                                <input type="file" class="dropify" name="patient_profile_img"
                                                    accept="image/*" />
                                            </div>
                                        </div>
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

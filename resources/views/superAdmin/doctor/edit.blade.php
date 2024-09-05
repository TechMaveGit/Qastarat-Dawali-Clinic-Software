@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Edit Doctor | Super Admin</title>
@endpush
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


@php
    $countryCode = DB::table('dial_codes')->where('status', '1')->get();
@endphp
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex">
                    <h4 class="page-title">Edit Doctor</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('doctors.index') }}">All Doctors</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Doctor</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <section class="content">
                <div class="row">

                    <form action="{{ route('doctors.edit', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                                    <option value="Mr"
                                                        {{ $doctor->title == 'Mr' ? 'selected="selected"' : '' }}>Mr
                                                    </option>
                                                    <option value="Mrs"
                                                        {{ $doctor->title == 'Mrs' ? 'selected="selected"' : '' }}>Mrs
                                                    </option>
                                                    <option value="Miss"
                                                        {{ $doctor->title == 'Miss' ? 'selected="selected"' : '' }}>Miss
                                                    </option>
                                                    <option value="Ms"
                                                        {{ $doctor->title == 'Ms' ? 'selected="selected"' : '' }}>Ms
                                                    </option>
                                                    <option value="Dr"
                                                        {{ $doctor->title == 'Dr' ? 'selected="selected"' : '' }}>Dr
                                                    </option>
                                                    <option value="Lady"
                                                        {{ $doctor->title == 'Lady' ? 'selected="selected"' : '' }}>Lady
                                                    </option>
                                                    <option value="Sir"
                                                        {{ $doctor->title == 'Sir' ? 'selected="selected"' : '' }}>Sir
                                                    </option>
                                                    <option value="Professor"
                                                        {{ $doctor->title == 'Professor' ? 'selected="selected"' : '' }}>
                                                        Professor</option>
                                                    <option value="Capt"
                                                        {{ $doctor->title == 'Capt' ? 'selected="selected"' : '' }}>Capt
                                                    </option>
                                                    <option value="Lord"
                                                        {{ $doctor->title == 'Lord' ? 'selected="selected"' : '' }}>Lord
                                                    </option>
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
                                                <input type="text" name="name" value="{{ $doctor->name }}"
                                                    class="form-control" placeholder="">
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
                                                    <input type="text" name="birth_date"
                                                        value="{{ $doctor->birth_date }}"
                                                        class="form-control pull-right datepicker">

                                                </div>
                                                @error('birth_date')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>




                                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                    <label class="form-label">Date of Birth</label>

                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{ $doctor->birth_date }}" name="birth_date" class="form-control pull-right datepicker" id="datepicker">
                                    @error('birth_date')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                    </div>
                                    <!-- /.input group -->
                                </div>
                        </div> --}}





                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Gender </label>
                                                <select class="form-control select2" name="gendar" style="width: 100%;">
                                                    <option value="male"
                                                        {{ $doctor->gendar == 'male' ? 'selected' : '' }}>Male</option>
                                                    <option value="female"
                                                        {{ $doctor->gendar == 'female' ? 'selected' : '' }}>Female</option>
                                                    <option value="other"
                                                        {{ $doctor->gendar == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                                @error('gendar')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <!-- /.form-group -->
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Status </label>
                                                <select class="form-control select2" name="status" style="width: 100%;">
                                                    <option value="active"
                                                        {{ $doctor->status == 'active' ? 'selected' : '' }}>Active
                                                    </option>
                                                    <option value="inactive "
                                                        {{ $doctor->status == 'inactive' ? 'selected' : '' }}>Inactive
                                                    </option>
                                                </select>

                                            </div>
                                            <!-- /.form-group -->
                                        </div>


                                        @php
                                            $doctors = \App\Models\superAdmin\Doctor::where('user_type', 'Coordinator')
                                                ->where('status', 'active')
                                                ->get();
                                            $nurse = \App\Models\superAdmin\Doctor::where('user_type', 'Nurse')
                                                ->where('status', 'active')
                                                ->get();
                                            $branchs = DB::table('branchs')->where('status', '1')->get();
                                            $doctor_nurses = DB::table('doctor_nurse')
                                                ->select('id', 'branch_type', 'doctor_id', 'nurse_id')
                                                ->where('doctor_id', @$id)
                                                ->get();
                                        @endphp


                                        @php
                                            $branchs = DB::table('branchs')->where('status', '1')->get();
                                        @endphp
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Add Branch
                                                </label>
                                                <select class="form-control select2 form-select" name="selectBranch[]"
                                                    style="width: 100%;" multiple required>
                                                    <option value="">Select Any One</option>
                                                    @forelse ($branchs as $branch)
                                                        <option value="{{ $branch->id }}"
                                                            {{ in_array($branch->id, $user_branchs) ? 'selected' : '' }}>
                                                            {{ $branch->branch_name }}
                                                        </option>
                                                    @empty
                                                        <!-- Handle case where no branches are available -->
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>




                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Select coordinator<span class="clr"> *
                                                    </span></label>
                                                <select class="form-control select2 form-select" name="coordinator[]"
                                                    style="width: 100%;" multiple>
                                                    <option value="">Select Any One </option>
                                                    @forelse ($doctors as $doctorsss)
                                                        @php
                                                            $selected = '';
                                                            foreach ($doctor_nurses as $dn) {
                                                                if ($dn->nurse_id == $doctorsss->id) {
                                                                    $selected = 'selected';
                                                                }
                                                            }
                                                        @endphp
                                                        <option value="{{ $doctorsss->id }}" {{ $selected }}>
                                                            {{ $doctorsss->name }} ({{ $doctorsss->email }})</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            @error('coordinator')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>



                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Select Nurse <span class="clr"> *
                                                    </span></label>
                                                <select class="form-control select2 form-select" name="nurse[]"
                                                    style="width: 100%;" multiple>
                                                    <option value="">Select Any One </option>
                                                    @forelse ($nurse as $doctor_)
                                                        @php
                                                            $selected = '';
                                                            foreach ($doctor_nurses as $dn) {
                                                                if ($dn->nurse_id == $doctor_->id) {
                                                                    $selected = 'selected';
                                                                }
                                                            }
                                                        @endphp
                                                        <option value="{{ $doctor_->id }}" {{ $selected }}>
                                                            {{ $doctor_->name }} ({{ $doctor_->email }})</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            @error('coordinator')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Role</label>
                                                <select class="form-control select2" name="role_id" style="width: 100%;">
                                                    <option value="">Select Any One</option>
                                                    @forelse ($roles as $role)
                                                        <option value="{{ $role->id }}"
                                                            {{ $role->id == $doctor->role_id ? 'selected' : '' }}>
                                                            {{ $role->name }}
                                                        </option>
                                                    @empty
                                                        <!-- Optional: Handle case where no roles are available -->
                                                    @endforelse
                                                </select>
                                                @error('role_id')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>







                                        <div class="col-lg-12 mt-3">
                                            <div class="title_head">
                                                <h4>Phone & Email</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Email Address</label>
                                                <input type="text" value="{{ $doctor->email }}" name="email"
                                                    class="form-control" placeholder="">
                                                @error('email')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Password <span class="clr">*</span></label>
                                                <div class="wrap-input">
                                                    <input type="password" name="password" id="password"
                                                        class="form-control password" placeholder=""
                                                        autocomplete="new-password" />
                                                    <span class="btn-show-pass ico-20 ">
                                                        <span class="  eye-pass flaticon-visibility "></span>
                                                    </span>
                                                </div>
                                                @error('password')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mb-3 form-group">
                                                <label for="dialCode" class="form-label">Dial Code</label>
                                                <select id="dialCode" class="form-control select2" name="dial_code" data-placeholder="Select a country" data-dynamic-select required>
                                                    @foreach ($countryCode as $countryCodes)
                                                        <option value="{{ $countryCodes->dial_code }}" {{ $countryCodes->dial_code == $doctor->dial_code ? 'selected' : '' }} data-img="{{ $countryCodes->flag }}"> 
                                                            {{ isset($countryCodes->dial_code) ? $countryCodes->dial_code : '' }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="form-label">Mobile Phone</label>
                                                <input type="text" value="{{ $doctor->mobile_no }}" name="mobile_no"
                                                    class="form-control" placeholder="" minlength="7" maxlength="13">
                                                @error('mobile_no')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="form-label">Landline</label>
                                                <input type="text" value="{{ $doctor->landline }}"
                                                    class="form-control" placeholder="" name="landline">
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
                                                <input type="text" value="{{ $doctor->post_code }}"
                                                    class="form-control" placeholder="" name="post_code" minlength="4"
                                                    maxlength="8">
                                                @error('post_code')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Street</label>
                                                <input type="text" value="{{ $doctor->street }}" class="form-control"
                                                    placeholder=" " name="street">
                                                @error('street')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Town</label>
                                                <input type="text" value="{{ $doctor->town }}" class="form-control"
                                                    placeholder="" name="town">
                                                @error('town')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                        @php
                                            $allcountries = DB::table('countries')->get();
                                        @endphp
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Country</label>
                                                <select class="form-control select2" name="country" style="width: 100%;"
                                                    required>
                                                    <option value="">Select Any One</option>

                                                    @forelse ($allcountries as $countries)
                                                        <option value="{{ $countries->Name }}"
                                                            {{ $countries->Name == $doctor->country ? 'selected' : '' }}>
                                                            {{ $countries->Name }}</option>

                                                    @empty
                                                    @endforelse

                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>



                                        <div class="col-lg-12 mt-3">
                                            <div class="title_head">
                                                <h4>Skills Info.</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Specialty</label>
                                                <input type="text" value="{{ $doctor->specialty }}"
                                                    class="form-control" placeholder="" name="specialty">
                                                @error('specialty')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Qualifications</label>
                                                <input type="text" value="{{ $doctor->qualifications }}"
                                                    class="form-control" placeholder="" name="qualifications">
                                                @error('qualifications')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Experience</label>
                                                <input type="text" value="{{ $doctor->experience }}"
                                                    class="form-control" placeholder="" name="experience">
                                                @error('experience')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Working Hours</label>
                                                <input type="text" value="{{ $doctor->working_hours }}"
                                                    class="form-control" placeholder="" name="working_hours">
                                                @error('working_hours')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Languages Spoken</label>
                                                <input type="text" value="{{ $doctor->languages_spoken }}"
                                                    class="form-control" placeholder="" name="languages_spoken">
                                                @error('languages_spoken')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">License Number</label>
                                                <input type="text" value="{{ $doctor->lincense_no }}"
                                                    class="form-control" placeholder="" name="lincense_no">
                                                @error('lincense_no')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>




                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Profile Image</label>
                                                <input type="file" class="dropify"
                                                    data-default-file="{{ asset('/assets/profileImage/' . $doctor->patient_profile_img) }}"
                                                    data-height="100" name="profileImage" />
                                            </div>
                                        </div>



                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">License Upload</label>
                                                <input type="file" class="dropify"
                                                    data-default-file="{{ asset('/assets/LicenseUpload/' . $doctor->LicenseUpload) }}"
                                                    data-height="100" name="LicenseUpload" />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Academic Document Upload</label>
                                                <input type="file" class="dropify"
                                                    data-default-file="{{ asset('/assets/LicenseUpload/' . $doctor->AcademicDocumentUpload) }}"
                                                    data-height="100" name="AcademicDocumentUpload" />
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
                    </form>
                </div>
            </section>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize the datepicker
            $('#datepicker').datepicker({
                alert("ok");
                dateFormat: 'yy-mm-dd', // Set desired date format
                disabled: true, // Disable date selection
                // Add any other options you need
            });
        });
    </script>


    <script>
        // Disable the "Select Any One" option using JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.querySelector('select[name="role_id"]');
            const selectAnyOneOption = selectElement.querySelector('option[value=""]');

            if (selectAnyOneOption) {
                selectAnyOneOption.disabled = true;
            }
        });
    </script>

    <script>
        // Disable the "Select Any One" option using JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.querySelector('select[name="country"]');
            const selectAnyOneOption = selectElement.querySelector('option[value=""]');

            if (selectAnyOneOption) {
                selectAnyOneOption.disabled = true;
            }
        });
    </script>
@endsection

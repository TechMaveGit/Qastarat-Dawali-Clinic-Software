@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Add Doctor | Super Admin</title>
@endpush
@section('content')
    <!-- Add these in your layout or Blade file -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


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
                    <h4 class="page-title">Add Doctor</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('doctors.index') }}">All Doctors</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Doctor</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <form action="{{ route('doctors.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
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
                                                <select class="form-control select2" name="title" style="width: 100%;"
                                                    required>
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
                                                    class="form-control" placeholder="" required>
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
                                                    <input type="text" name="birth_date" value="{{ old('birth_date') }}"
                                                        class="form-control pull-right datepicker">

                                                </div>
                                                @error('birth_date')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Gender</label>
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

                                        @php
                                            $nurse = \App\Models\superAdmin\Doctor::where('role_id', '11')
                                                ->where('status', 'active')
                                                ->get();
                                            $branchs = DB::table('branchs')->where('status', '1')->get();
                                            $selectedCoordinators = old('selectBranch', []);

                                        @endphp

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Select Branch<span class="clr"> *
                                                    </span></label>
                                                <select class="form-control select2 form-select selectBranch"
                                                    name="selectBranch[]" style="width: 100%;" multiple required>
                                                    <option value="">Select Any One </option>
                                                    @forelse ($branchs as $allbranchs)
                                                        <option value="{{ $allbranchs->id }}"
                                                            @if (in_array($allbranchs->id, $selectedCoordinators)) selected @endif>
                                                            {{ $allbranchs->branch_name }}</option>
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
                                                <label class="form-label">Select coordinator<span class="clr"> *
                                                    </span></label>
                                                <select class="form-control select2 form-select" id="appendCoordinator"
                                                    name="coordinator[]" style="width: 100%;" multiple required>





                                                </select>
                                            </div>
                                            @error('coordinator')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>




                                        @php
                                            $addNurse = \App\Models\superAdmin\Doctor::where('user_type', 'Nurse')
                                                ->where('status', 'active')
                                                ->get();
                                            $selectedNurses = old('nurse', []);
                                        @endphp

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Select Nurse<span class="clr"> *
                                                    </span></label>
                                                <select class="form-control select2 form-select" id="appendNurse"
                                                    name="nurse[]" style="width: 100%;" multiple required>

                                                    {{-- <option value="">Select Any One</option> --}}
                                                    {{-- @foreach ($addNurse as $allnurse)
                                    <option value="{{ $allnurse->id }}" @if (in_array($allnurse->id, $selectedNurses)) selected @endif>{{ $allnurse->name }} ({{ $allnurse->email }})</option>
                                @endforeach --}}


                                                </select>
                                            </div>
                                            @error('nurse')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Role</label>
                                                <select class="form-control select2" name="role_id" style="width: 100%;"
                                                    required>
                                                    <option value="">Select Any One</option>
                                                    @forelse ($role as $allrole)
                                                        <option value="{{ $allrole->id }}">{{ $allrole->name }}</option>
                                                    @empty
                                                    @endforelse


                                                </select>
                                                @error('gendar')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <!-- /.form-group -->
                                        </div>


                                        {{-- <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Select Role <span class="clr"> * </span></label>
                            <select class="form-control select2" name="role_id" style="width: 100%;" required>
                                <option value="">Select any one</option>
                                @forelse ($role as $allrole)
                                <option value="{{ $allrole->id }}" {{ old('role_id') == $allrole->id ? 'selected' : '' }}>{{ $allrole->name }}</option>

                                @empty

                                @endforelse

                            </select>
                        </div>
                    </div> --}}


                                        <div class="col-lg-12 mt-3">
                                            <div class="title_head">
                                                <h4>Phone & Email</h4>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Email Address<span class="clr"> *
                                                    </span></label>
                                                <input type="text" name="email" value="{{ old('email') }}"
                                                    class="form-control" placeholder="">

                                                @error('email')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Password <span class="clr">*</span></label>
                                                <div class="wrap-input">
                                                    <input type="password" name="password" id="password"
                                                        class="form-control password" placeholder="" required>
                                                    <span class="btn-show-pass ico-20 ">
                                                        <span class="eye-pass flaticon-visibility"></span>
                                                    </span>
                                                </div>
                                                @error('password')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Mobile Phone </label>
                                                <input type="tel" name="mobile_no" value="{{ old('mobile_no') }}"
                                                    class="form-control" placeholder="" minlength="10" maxlength="15"
                                                    required>

                                                @error('mobile_no')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Landline</label>
                                                <input type="tel" name="landline" value="{{ old('landline') }}"
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
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Town</label>
                                                <input type="text" name="town" value="{{ old('town') }}"
                                                    class="form-control" placeholder="">
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
                                                            {{ $countries->Name == $countries->Name ? 'selected' : '' }}>
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
                                                <input type="text" name="specialty" value="{{ old('specialty') }}"
                                                    class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Qualifications</label>
                                                <input type="text" name="qualifications"
                                                    value="{{ old('qualifications') }}" class="form-control"
                                                    placeholder="">
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
                                                    value="{{ old('working_hours') }}" class="form-control"
                                                    placeholder="">
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
                                                <input type="text" name="lincense_no"
                                                    value="{{ old('lincense_no') }}" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>



                                        <div class="col-lg-12 mt-3">
                                            <div class="title_head">
                                                <h4>Document</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Profile Image</label>
                                                <input type="file" class="dropify" data-height="100"
                                                    name="profileImage" />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">License Upload</label>
                                                <input type="file" class="dropify" data-height="100"
                                                    name="LicenseUpload" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Academic Document Upload</label>
                                                <input type="file" class="dropify" data-height="100"
                                                    name="AcademicDocumentUpload" />
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Profile Image</label>
                              <input type="file" class="dropify" name="patient_profile_img" accept="image/*"/>
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





    <script>
        $(document).ready(function() {
            $('.selectBranch').change(function() {
                var selectedNurseId = $(this).val(); // Get the selected nurse ID

                $.ajax({
                    url: '{{ route('doctors.getStaff') }}', // Specify the URL for your AJAX request
                    type: 'post', // Use GET method (or 'POST' if needed)
                    data: {
                        nurse_id: selectedNurseId,
                        _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                    },
                    success: function(response) {

                        $('#appendCoordinator').empty();
                        $('#appendNurse').empty();

                        if (response.data && response.data.length > 0) {
                            $.each(response.data, function(index, branch) {
                                let addressHtml =
                                    `<option value="${branch.id}">${branch.name}</option>`;
                                $("#appendNurse").append(addressHtml);

                            });
                        }

                        if (response.nurseData && response.nurseData.length > 0) {
                            $.each(response.nurseData, function(index, branch) {
                                let addressHtml =
                                    `<option value="${branch.id}">${branch.name}</option>`;
                                $("#appendCoordinator").append(addressHtml);

                            });
                        }



                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(error); // Log the error for debugging
                    }
                });
            });
        });
    </script>



    <script>
        // Disable the "Select Any One" option using JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.querySelector('select[name="gendar"]');
            const selectAnyOneOption = selectElement.querySelector('option[value=""]');

            if (selectAnyOneOption) {
                selectAnyOneOption.disabled = true;
            }
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

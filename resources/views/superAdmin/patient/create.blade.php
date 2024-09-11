@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Add Patient | Super Admin</title>
@endpush
@section('content')

<style>
    .italic {
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
                        <li class="breadcrumb-item"><a
                                href="{{ route('patients.index') }}">Patients</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Patient</li>
                    </ol>
                </nav>
            </div>

        </div>
        <section class="content">
            <div class="row">
                <div class="col-12">

                    <form action="{{ route('patients.addCreate') }}" id="patientadddataForm" method="post"
                        enctype="multipart/form-data"> @csrf
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
                                            <select class="form-control select2" name="title" style="width: 100%;">
                                                <option value="">Select Any One</option>
                                                <option value="Mr"
                                                    {{ old('title') == 'Mr' ? 'selected' : '' }}>
                                                    Mr</option>
                                                <option value="Mrs"
                                                    {{ old('title') == 'Mrs' ? 'selected' : '' }}>
                                                    Mrs</option>
                                                <option value="Miss"
                                                    {{ old('title') == 'Miss' ? 'selected' : '' }}>
                                                    Miss</option>
                                                <option value="Ms"
                                                    {{ old('title') == 'Ms' ? 'selected' : '' }}>
                                                    Ms</option>
                                                <option value="Dr"
                                                    {{ old('title') == 'Dr' ? 'selected' : '' }}>
                                                    Dr</option>
                                                <option value="Lady"
                                                    {{ old('title') == 'Lady' ? 'selected' : '' }}>
                                                    Lady</option>
                                                <option value="Sir"
                                                    {{ old('title') == 'Sir' ? 'selected' : '' }}>
                                                    Sir</option>
                                                <option value="Professor"
                                                    {{ old('title') == 'Professor' ? 'selected' : '' }}>
                                                    Professor</option>
                                                <option value="Capt"
                                                    {{ old('title') == 'Capt' ? 'selected' : '' }}>
                                                    Capt</option>
                                                <option value="Lord"
                                                    {{ old('title') == 'Lord' ? 'selected' : '' }}>
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
                                            <label class="form-label">Name <span class="clr"> * </span></label>
                                            <input type="text" name="name" value="{{ old('name') }}"
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
                                                    value="{{ old('birth_date') }}"
                                                    class="form-control pull-right datepicker">

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
                                                <option value="Male"
                                                    {{ old('gendar') == 'Male' ? 'selected' : '' }}>
                                                    Male</option>
                                                <option value="Female"
                                                    {{ old('gendar') == 'Female' ? 'selected' : '' }}>
                                                    Female</option>
                                                <option value="Other"
                                                    {{ old('gendar') == 'Other' ? 'selected' : '' }}>
                                                    Other</option>
                                            </select>
                                            @error('gendar')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!-- /.form-group -->
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Add Branch <span class="clr"> * </span></label>

                                            <select class="form-control select2 form-select selectBranch" required name="selectBranch[]"
                                                style="width: 100%;" multiple >

                                                {{-- <select class="form-control select2" name="doctorName" style="width: 100%;" required> --}}
                                                <option value="">Select Any One</option>
                                                @forelse($branchs as $allbranchs)
                                                    <option value="{{ $allbranchs->id }}"
                                                        {{ old('selectBranch') && in_array($allbranchs->id,old('selectBranch'))  ? 'selected' : '' }}>
                                                        {{ $allbranchs->branch_name }}</option>
                                                @empty

                                                @endforelse
                                            </select>
                                            @error('selectBranch')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!-- /.form-group -->
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Add Doctor <span class="clr"> * </span></label>
                                            <select class="form-control select2 selectDoctor" required name="doctorName" style="width: 100%;"
                                                >
                                                <option value="">Select Any One</option>
                                                {{-- @forelse($doctors as $alldoctors)
                                                    <option value="{{ $alldoctors->id }}"
                                                        {{ old('doctorName') == $alldoctors->id ? 'selected' : '' }}>
                                                        {{ $alldoctors->name }} - {{ $alldoctors->email }}</option>
                                                @empty

                                                @endforelse --}}
                                            </select>
                                            @error('doctorName')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!-- /.form-group -->
                                    </div>




                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Profile Image</label>
                                            <input type="file" class="dropify1" name="patient_profile_img" id="image"
                                                accept="image/*" />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                        <div class="col-md-10">
                                            <img style="width:100px" id="showImage" class="rounded avatar-lg"
                                                src="{{ asset('/superAdmin/images/newimages/avtar.jpg') }}"
                                                alt="Card image cap">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-3">
                                        <div class="title_head">
                                            <h4>Phone & Email</h4>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Email Address </label>
                                            <input type="text" name="email" value="{{ old('email') }}"
                                                class="form-control" placeholder="">

                                            @error('email')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror

                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Password </label>
                                            <div class="wrap-input">
                                                <input type="password" name="password" id="password"
                                                    class="form-control password" placeholder="">
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
                                                    <option value="{{ $countryCodes->dial_code }}" {{ $countryCodes->dial_code == '+968' ? 'selected' : '' }} data-img="{{ $countryCodes->flag }}"> 
                                                        {{ isset($countryCodes->dial_code) ? $countryCodes->dial_code : '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Mobile Phone <span class="clr"> * </span></label>
                                            <input type="tel" name="mobile_no"
                                                value="{{ old('mobile_no') }}" class="form-control"
                                                placeholder="" minlength="7" maxlength="13">

                                            @error('mobile_no')
                                                <p class="error text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Landline</label>
                                            <input type="tel" name="landline"
                                                value="{{ old('landline') }}" class="form-control"
                                                placeholder="">
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
                                            <input type="text" name="post_code"
                                                value="{{ old('post_code') }}" class="form-control"
                                                placeholder="" minlength="4" maxlength="8">
                                            @error('post_code')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Street</label>
                                            <input type="text" name="street"
                                                value="{{ old('street') }}" class="form-control"
                                                placeholder="">
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

                                    @php
                                        $allCountrie= DB::table('countries')->get();
                                    @endphp

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Country </label>
                                            <select class="form-control select2" name="country" style="width: 100%;">
                                                @forelse($allCountrie as $countrie)
                                                    <option value="">Select</option>
                                                    <option value="{{ $countrie->Name }}">{{ $countrie->Name }}
                                                    </option>
                                                @empty

                                                @endforelse
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
                                            <label class="form-label">Select Id</label>
                                            <select class="form-control select2" name="document_type" id="document_type"  style="width: 100%;">
                                                <option value="">Select Any One</option>
                                                <option value="CIVIL ID"
                                                    {{ old('document_type') == 'CIVIL ID' ? 'selected' : '' }}>
                                                    CIVIL ID </option>
                                                <option value="EID"
                                                    {{ old('document_type') == 'EID' ? 'selected' : '' }}>
                                                    EID</option>
                                                <option value="PERSONAL NUMBER"
                                                    {{ old('document_type') == 'PERSONAL NUMBER' ? 'selected' : '' }}>
                                                    PERSONAL NUMBER</option>
                                                <option value="RESIDENT ID"
                                                    {{ old('document_type') == 'RESIDENT ID' ? 'selected' : '' }}>
                                                    RESIDENT ID</option>
                                                <option value="PASSPORT, DRIVER's LICENSE, ETC"
                                                    {{ old('document_type') == 'PASSPORT, DRIVERs LICENSE, ETC' ? 'selected' : '' }}>
                                                    PASSPORT, DRIVER's LICENSE, ETC</option>

                                            </select>
                                            @error('document_type')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label">Enter Id Number</label>
                                            <input type="text" name="enterIdNumber" id="enterIdNumber"
                                                value="{{ old('enterIdNumber') }}"
                                                class="form-control" placeholder="">
                                            <span class="error text-danger" id="validationMessage"> </span>

                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="submit_btn text-end">
                                            <button id="patientadddatabutton" type="button" class="waves-effect waves-light btn btn-primary"><i
                                                    class="fa-regular fa-floppy-disk"></i> Save</button>
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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        var validForm = false;

        $("#patientadddatabutton").click(function(){
            validateInput();
            if(!validForm){
                setTimeout(() => {
                    $("#patientadddataForm").submit();
                }, 1000);
                
            }
        })

        $("#document_type").change(function(){
            $("#enterIdNumber").val('');
            $("#validationMessage").text('');
            validateInput();
        })

        
        function validateInput() {
            const selectedType = $("#document_type").val();
            const idNumber = $("#enterIdNumber").val();
            
            let maxLength = 0;
            let message = '';

            switch (selectedType) {
                case 'CIVIL ID':
                    maxLength = 9;
                    message = 'CIVIL ID must be exactly 9 digits';
                    break;
                case 'EID':
                    maxLength = 15;
                    message = 'EID must be exactly 15 digits';
                    break;
                case 'PERSONAL NUMBER':
                case 'RESIDENT ID':
                    maxLength = 10;
                    message = selectedType + ' must be exactly 10 digits';
                    break;
                case 'PASSPORT, DRIVER\'s LICENSE, ETC':
                    maxLength = Infinity;
                    message = '';
                    break;
            }

            if (maxLength !== Infinity && idNumber.length > maxLength) {
                $("#enterIdNumber").val(idNumber.slice(0, maxLength));
            }
            $("#enterIdNumber").attr('maxlength',maxLength);
            $("#enterIdNumber").attr('minlength',maxLength);
            if (maxLength !== Infinity && idNumber.length !== maxLength) {
                $("#validationMessage").text(message);
                validForm = true;
            } else {
                $("#validationMessage").text('');
                validForm = false;
            }
        }

        $('.selectBranch').change(function() {

            var selectedNurseId = $(this).val();
            
            if(selectedNurseId && selectedNurseId != ''){
            $.ajax({
                    url: '{{ route('doctors.getStaff') }}', // Specify the URL for your AJAX request
                    type: 'post', // Use GET method (or 'POST' if needed)
                    data: {
                        nurse_id: selectedNurseId,
                        _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                    },
                    success: function(response) {
                        $('.selectDoctor').empty();

                        if (response.doctorData && response.doctorData.length > 0) {
                            $.each(response.doctorData, function(index, doctor) {
                                let addressHtml =
                                    `<option value="${doctor.id}">${doctor.name}</option>`;
                                $(".selectDoctor").append(addressHtml);

                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error); 
                    }
                });
            }else{
                $('.selectDoctor').empty();
            }
        });

        $('.selectBranch').trigger('change');
    });
</script>

<script>
            
</script>


@endsection
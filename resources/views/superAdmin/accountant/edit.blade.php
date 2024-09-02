@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Edit Accountant | Super Admin</title>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex">
                    <h4 class="page-title">Edit Staff</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('accountants.index') }}">Accountant</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Accountant</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <section class="content">
                <div class="row">

                    <form action="{{ route('accountants.edit', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
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
                                                        {{ $accountant->title == 'Mr' ? 'selected="selected"' : '' }}>Mr
                                                    </option>
                                                    <option value="Mrs"
                                                        {{ $accountant->title == 'Mrs' ? 'selected="selected"' : '' }}>Mrs
                                                    </option>
                                                    <option value="Miss"
                                                        {{ $accountant->title == 'Miss' ? 'selected="selected"' : '' }}>Miss
                                                    </option>
                                                    <option value="Ms"
                                                        {{ $accountant->title == 'Ms' ? 'selected="selected"' : '' }}>Ms
                                                    </option>
                                                    <option value="Dr"
                                                        {{ $accountant->title == 'Dr' ? 'selected="selected"' : '' }}>Dr
                                                    </option>
                                                    <option value="Lady"
                                                        {{ $accountant->title == 'Lady' ? 'selected="selected"' : '' }}>
                                                        Lady</option>
                                                    <option value="Sir"
                                                        {{ $accountant->title == 'Sir' ? 'selected="selected"' : '' }}>Sir
                                                    </option>
                                                    <option value="Professor"
                                                        {{ $accountant->title == 'Professor' ? 'selected="selected"' : '' }}>
                                                        Professor</option>
                                                    <option value="Capt"
                                                        {{ $accountant->title == 'Capt' ? 'selected="selected"' : '' }}>
                                                        Capt</option>
                                                    <option value="Lord"
                                                        {{ $accountant->title == 'Lord' ? 'selected="selected"' : '' }}>
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
                                                <label class="form-label"> Name</label>
                                                <input type="text" name="name" value="{{ $accountant->name }}"
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
                                                    <input type="text" value="{{ $accountant->birth_date }}"
                                                        name="birth_date" class="form-control pull-right datepicker">
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
                                                    <option value="male"
                                                        {{ $accountant->gendar == 'male' ? 'selected' : '' }}>Male
                                                    </option>
                                                    <option value="female"
                                                        {{ $accountant->gendar == 'female' ? 'selected' : '' }}>Female
                                                    </option>
                                                    <option value="other"
                                                        {{ $accountant->gendar == 'other' ? 'selected' : '' }}>Other
                                                    </option>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Email Address</label>
                                                <input type="text" value="{{ $accountant->email }}" name="email"
                                                    class="form-control" placeholder="">
                                                @error('email')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Password <span class="clr"></span></label>
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

                                        <div class="col-lg-2">
                                            <div class="mb-3 form-group">
                                                <label for="dialCode" class="form-label">Dial Code</label>
                                                <select name="dial_code" class="form-select form-control" id="dialCode">
                                                    <option {{$accountant->dial_code == '+968' ? 'selected' : '' }}  value="+968">+968</option>
                                                    <option {{$accountant->dial_code == '+973' ? 'selected' : '' }}  value="+973">+973</option>
                                                    <option {{$accountant->dial_code == '+966' ? 'selected' : '' }} value="+966">+966</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="form-label">Mobile Phone</label>
                                                <input type="text" value="{{ $accountant->mobile_no }}" name="mobile_no"
                                                    class="form-control" placeholder="" minlength="10" maxlength="15">
                                                @error('mobile_no')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="form-label">Landline</label>
                                                <input type="text" value="{{ $accountant->landline }}"
                                                    name="landline" class="form-control" placeholder="">
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
                                                <input type="text" value="{{ $accountant->post_code }}"
                                                    name="post_code" class="form-control" placeholder="" minlength="4"
                                                    maxlength="8">
                                                @error('post_code')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Street</label>
                                                <input type="text" value="{{ $accountant->street }}" name="street"
                                                    class="form-control" placeholder="">
                                                @error('street')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Town</label>
                                                <input type="text" value="{{ $accountant->town }}" name="town"
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
                                                    @if (isset($accountant->country) && !empty($accountant->country))
                                                        <option value="{{ $accountant->country }}"
                                                            {{ $accountant->country ? 'selected' : '' }}>
                                                            {{ $accountant->country }}</option>
                                                    @endif
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
                                                    value="{{ $accountant->college_name }}" class="form-control"
                                                    placeholder="">
                                                @error('college_name')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Degree</label>
                                                <input type="text" name="Degree" value="{{ $accountant->Degree }}"
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
                                                    value="{{ $accountant->graduation_year }}" class="form-control"
                                                    placeholder="">
                                                @error('graduation_year')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Soft Skill</label>
                                                <input type="text" name="soft_skill"
                                                    value="{{ $accountant->soft_skill }}" class="form-control"
                                                    placeholder="">
                                                @error('soft_skill')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Work Experience</label>
                                                <input type="text" name="experience"
                                                    value="{{ $accountant->experience }}"class="form-control"
                                                    placeholder="">
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
                    </form>
                </div>
            </section>

        </div>
    </div>
@endsection

@extends('superAdmin.superAdminLayout.main')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex">
                    <h4 class="page-title">Edit Telecaller</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('telecallers.index') }}">Staff</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Telecaller</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('telecallers.edit', ['id' => $telecaller->id]) }}" method="POST" enctype="multipart/form-data">
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
                                                <label class="form-label">Title</label>
                                                <select class="form-control select2" style="width: 100%;" name="title">
                                                    <option value="Mr"
                                                        {{ $telecaller->title == 'Mr' ? 'selected="selected"' : '' }}>Mr
                                                    </option>
                                                    <option value="Mrs"
                                                        {{ $telecaller->title == 'Mrs' ? 'selected="selected"' : '' }}>Mrs
                                                    </option>
                                                    <option value="Miss"
                                                        {{ $telecaller->title == 'Miss' ? 'selected="selected"' : '' }}>Miss
                                                    </option>
                                                    <option value="Ms"
                                                        {{ $telecaller->title == 'Ms' ? 'selected="selected"' : '' }}>Ms
                                                    </option>
                                                    <option value="Dr"
                                                        {{ $telecaller->title == 'Dr' ? 'selected="selected"' : '' }}>Dr
                                                    </option>
                                                    <option value="Lady"
                                                        {{ $telecaller->title == 'Lady' ? 'selected="selected"' : '' }}>
                                                        Lady</option>
                                                    <option value="Sir"
                                                        {{ $telecaller->title == 'Sir' ? 'selected="selected"' : '' }}>Sir
                                                    </option>
                                                    <option value="Professor"
                                                        {{ $telecaller->title == 'Professor' ? 'selected="selected"' : '' }}>
                                                        Professor</option>
                                                    <option value="Capt"
                                                        {{ $telecaller->title == 'Capt' ? 'selected="selected"' : '' }}>
                                                        Capt</option>
                                                    <option value="Lord"
                                                        {{ $telecaller->title == 'Lord' ? 'selected="selected"' : '' }}>
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
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" placeholder="" name="name"
                                                    value="{{ $telecaller->name }}">
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
                                                    <input type="text" value="{{ $telecaller->birth_date }}"
                                                        name="birth_date" class="form-control pull-right datepicker" id="">
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
                                                        {{ $telecaller->gendar == 'male' ? 'selected' : '' }}>Male
                                                    </option>
                                                    <option value="female"
                                                        {{ $telecaller->gendar == 'female' ? 'selected' : '' }}>Female
                                                    </option>
                                                    <option value="other"
                                                        {{ $telecaller->gendar == 'other' ? 'selected' : '' }}>Other
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Email Address</label>
                                                <input type="text" value="{{ $telecaller->email }}"
                                                    class="form-control" placeholder="" name="email">
                                                @error('email')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Password <span class="clr"></span></label>
                                                <div class="wrap-input">
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="">
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
                                                <label class="form-label">Mobile Phone</label>
                                                <input type="text" value="{{ $telecaller->mobile_no }}"
                                                    class="form-control" placeholder="" name="mobile_no" minlength="7" maxlength="13">
                                                @error('mobile_no')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Landline</label>
                                                <input type="text" value="{{ $telecaller->landline }}"
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
                                                <input type="text" value="{{ $telecaller->post_code }}"
                                                    class="form-control" placeholder="" name="post_code" minlength="4" maxlength="8">
                                                @error('post_code')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Street</label>
                                                <input type="text" value="{{ $telecaller->street }}"
                                                    class="form-control" placeholder="" name="street">
                                                @error('street')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Town</label>
                                                <input type="text" value="{{ $telecaller->town }}" class="form-control"
                                                    placeholder="" name="town">
                                                @error('town')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Country</label>
                                                <select class="form-control" name="country" id="countries" style="width: 100%;">
                                                    @if (isset($telecaller->country) && !empty($telecaller->country))
                                                    <option value="{{ $telecaller->country }}" {{ $telecaller->country ? 'selected' : '' }}>{{ $telecaller->country }}</option>
                                                    @endif
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
                                                <h4>Educational Background</h4>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Name of University/College</label>
                                                <input type="text" value="{{ $telecaller->college_name }}"
                                                    class="form-control" placeholder="" name="college_name">
                                                @error('college_name')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Degree</label>
                                                <input type="text" value="{{ $telecaller->Degree }}"
                                                    class="form-control" placeholder="" name="Degree">
                                                @error('Degree')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Graduation Year</label>
                                                <input type="text" value="{{ $telecaller->graduation_year }}"
                                                    class="form-control" placeholder="" name="graduation_year">
                                                @error('graduation_year')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Soft Skill</label>
                                                <input type="text" value="{{ $telecaller->soft_skill }}"
                                                    class="form-control" placeholder="" name="soft_skill">
                                                @error('soft_skill')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Work Experience</label>
                                                <input type="text" value="{{ $telecaller->experience }}"
                                                    class="form-control" placeholder="" name="experience">
                                                @error('experience')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Language Spoken</label>
                                                <input type="text" value="{{ $telecaller->languages_spoken }}"
                                                    class="form-control" placeholder="" name="languages_spoken">
                                                @error('languages_spoken')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Communication Skill</label>
                                                <select class="form-control select2" style="width: 100%;"
                                                    name="communication_skill">
                                                    <option value="Good"
                                                        {{ $telecaller->communication_skill == 'Good' ? 'selected="selected"' : '' }}>
                                                        Good</option>
                                                    <option value="Very Good"
                                                        {{ $telecaller->communication_skill == 'Very Good' ? 'selected="selected"' : '' }}>
                                                        Very Good</option>
                                                    <option value="Excellent"
                                                        {{ $telecaller->communication_skill == 'Excellent' ? 'selected="selected"' : '' }}>
                                                        Excellent</option>

                                                </select>
                                                @error('communication_skill')
                                                    <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <!-- /.form-group -->
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label">Profile Image</label>
                                                  <input type="file" class="dropify" name="patient_profile_img" accept="image/*"/>
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
                        </form>
                        <!-- /.box -->
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection

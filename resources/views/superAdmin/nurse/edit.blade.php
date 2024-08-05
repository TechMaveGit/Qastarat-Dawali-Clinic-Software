@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Edit Staff | Super Admin</title>
@endpush
@section('content')

<div class="content-wrapper">
    <div class="container-full">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="d-flex">
      <h4 class="page-title">Edit Staff</h4>
      <!-- <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('nurses.index') }}">Staff</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Staff</li>
              </ol>
          </nav> -->
      </div>

      </div>
      <section class="content">
      <div class="row">

   <form action="{{ route('nurses.edit',['id'=>$id]) }}" method="post" enctype="multipart/form-data"> @csrf
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
                          <option value="">Select Any One</option>
                          <option value="Mr" {{ $nurse ->title == 'Mr' ? 'selected="selected"' : '' }}>Mr</option>
                          <option value="Mrs" {{ $nurse->title == 'Mrs' ? 'selected="selected"' : '' }}>Mrs</option>
                          <option value="Miss" {{ $nurse->title == 'Miss' ? 'selected="selected"' : '' }}>Miss</option>
                          <option value="Ms" {{ $nurse->title == 'Ms' ? 'selected="selected"' : '' }}>Ms</option>
                          <option value="Dr" {{ $nurse->title ==  'Dr' ? 'selected="selected"' : '' }}>Dr</option>
                          <option value="Lady" {{ $nurse->title ==  'Lady' ? 'selected="selected"' : '' }}>Lady</option>
                          <option value="Sir" {{ $nurse->title == 'Sir' ? 'selected="selected"' : '' }}>Sir</option>
                          <option value="Professor" {{ $nurse->title == 'Professor' ? 'selected="selected"' : '' }}>Professor</option>
                          <option value="Capt" {{ $nurse->title == 'Capt' ? 'selected="selected"' : '' }}>Capt</option>
                          <option value="Lord" {{ $nurse->title == 'Lord' ? 'selected="selected"' : '' }}>Lord</option>
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
                          <input type="text" name="name" value="{{ $nurse->name }}" class="form-control" placeholder="">
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
                                  <input type="text" value="{{ $nurse->birth_date }}" name="birth_date" class="form-control pull-right datepicker" >
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
                                  <option value="male" {{ $nurse->gendar  == 'male' ? 'selected' : '' }}>Male</option>
                                  <option value="female" {{ $nurse->gendar == 'female' ? 'selected' : '' }}>Female</option>
                                  <option value="   " {{ $nurse->gendar == 'other' ? 'selected' : '' }}>Other</option>
                              </select>
                              @error('gendar')
                              <span class="error text-danger">{{ $message }}</span>
                          @enderror
                          </div>
                      <!-- /.form-group -->
                      </div>

                      @php
                      $roleData=DB::table('roles')->get();
                      @endphp

                       <div class="col-md-3">
                          <div class="form-group">
                              <label class="form-label">Role</label>
                              <select class="form-control select2" name="role_id" style="width: 100%;">
                                  @foreach($roleData as $addRoleData)
                                  <option value="{{ $addRoleData->id }}" {{ $addRoleData->id  == $nurse->role_id ? 'selected' : '' }}>{{ $addRoleData->name}}</option>
                                  @endforeach
                              </select>

                          </div>
                      </div>


                      @php
                            $branchs = DB::table('branchs')->where('status', '1')->get();
                      @endphp
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Add Branch
                                </label>
                                <select class="form-control select2 form-select" name="selectBranch[]" style="width: 100%;" multiple required>
                                    <option value="">Select Any One</option>
                                    @forelse ($branchs as $branch)
                                        <option value="{{ $branch->id }}" {{ in_array($branch->id, $user_branchs) ? 'selected' : '' }}>
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
                                <label class="form-label">Select Status</label>
                                <select class="form-control select2" name="status" style="width: 100%;">
                                    <option value="">Select any one</option>

                                     <option value="active" {{ $nurse->status  == "active" ? 'selected' : '' }}>Active</option>
                                     <option value="inactive" {{ $nurse->status  == "inactive" ? 'selected' : '' }}>Inactive</option>


                                </select>
                            </div>
                        </div>




                      <div class="col-lg-12 mt-3">
                        <div class="title_head">
                            <h4>Phone & Email</h4>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="text" value="{{ $nurse->email }}" class="form-control" placeholder="" name="email">
                        @error('email')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Password <span class="clr"></span></label>
                          <div class="wrap-input">
                              <input type="password" name="password" id="password" class="form-control password" placeholder="">
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
                        <input type="text" value="{{ $nurse->mobile_no }}" class="form-control" placeholder="" name="mobile_no" minlength="10" maxlength="15">
                        @error('mobile_no')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Landline</label>
                        <input type="text" value="{{ $nurse->landline }}" class="form-control" placeholder="" name="landline">
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
                          <input type="text" value="{{ $nurse->post_code }}" class="form-control" placeholder="" name="post_code" minlength="4" maxlength="8">
                          @error('post_code')
                          <span class="error text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Street</label>
                          <input type="text" value="{{ $nurse->street }}" class="form-control" placeholder="" name="street">
                          @error('street')
                          <span class="error text-danger">{{ $message }}</span>
                      @enderror
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Town</label>
                          <input type="text" value="{{ $nurse->town }}" class="form-control" placeholder="" name="town">
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
                                            {{ $countries->Name == $nurse->country ? 'selected' : '' }}>
                                            {{ $countries->Name }}</option>

                                    @empty
                                    @endforelse

                                </select>
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
                        <label class="form-label">Name of Nursing School</label>
                        <input type="text" name="NursingSchool" value="{{ $nurse->NursingSchool }}" class="form-control" placeholder="">
                        @error('NursingSchool')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Degree</label>
                        <input type="text" name="Degree" value="{{ $nurse->Degree }}" class="form-control" placeholder="">
                        @error('Degree')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Graduation Year</label>
                        <input type="text" name="graduation_year" value="{{ $nurse->graduation_year }}" class="form-control" placeholder="">
                        @error('graduation_year')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">License Number</label>
                            <input type="text" name="lincense_no" value="{{ $nurse->lincense_no }}" class="form-control" placeholder="">
                            @error('lincense_no')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label">Work Experience</label>
                        <input type="text" name="experience" value="{{ $nurse->experience }}"class="form-control" placeholder="">
                        @error('experience')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    </div>
                   

                   
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Profile Image</label>
                            <input type="file" class="dropify" data-default-file="{{ asset('/assets/nurse_profile/' . $nurse->patient_profile_img) }}" name="patient_profile_img" accept="image/*"/>
                        </div>
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

<script>
    // Disable the "Select Any One" option using JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.querySelector('select[name="title"]');
        const selectAnyOneOption = selectElement.querySelector('option[value=""]');

        if (selectAnyOneOption) {
            selectAnyOneOption.disabled = true;
        }
    });
</script>

<script>
    // Disable the "Select Any One" option using JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.querySelector('select[name="status"]');
        const selectAnyOneOption = selectElement.querySelector('option[value=""]');

        if (selectAnyOneOption) {
            selectAnyOneOption.disabled = true;
        }
    });
</script>

@endsection

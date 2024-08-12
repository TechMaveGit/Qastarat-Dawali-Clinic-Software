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


            <form action="{{ route('patients.edit', ['id' => $patientId->id]) }}" method="post" enctype="multipart/form-data">@csrf
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
                                    <input type="text" name="birth_date" placeholder="dd M, yyyy" data-date-format="dd M, yyyy" value="{{ $patientId->birth_date }}" class="form-control pull-right datepicker">
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


                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select class="form-control select2" name="status" style="width: 100%;">
                                    <option value="">Select Any One</option>
                                    <option value="1" {{ $patientId->status == '1' ? 'selected="selected"' : '' }}>Active</option>
                                    <option value="0" {{ $patientId->status == '0' ? 'selected="selected"' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        <!-- /.form-group -->
                        </div>


                        @php
                        $branchs = DB::table('branchs')->where('status', '1')->get();
                        // Get array of selected branch IDs
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
                                <label class="form-label">Add Doctor</label>
                                <select class="form-control select2" name="doctorName" style="width: 100%;" required>
                                     <option value="">Select Any One</option>
                                    @forelse ($doctors as $alldoctors)
                                       <option value="{{$alldoctors->id}}" {{ $alldoctors->id == $patientId->doctor_id ? 'selected' : '' }} >{{$alldoctors->name}}</option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        <!-- /.form-group -->
                        </div>





                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Profile Image</label>
                                  <input type="file" class="dropify1" name="patient_profile_img" id="image" accept="image/*"/>
                            </div>
                        </div>
                        @if (isset($patientId->patient_profile_img) && !empty($patientId->patient_profile_img))
                        <div class="col-md-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                           <div class="col-md-10">
                               <img style="width:100px" id="showImage" class="rounded avatar-lg" src="{{ asset('/assets/patient_profile/'.$patientId->patient_profile_img ) }}" alt="Profile image">
                           </div>
                       </div>
                       @else
                       <div class="col-md-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                       <div class="col-md-10">
                           <img style="width:100px" id="showImage" class="rounded avatar-lg" src="{{ asset('/superAdmin/images/newimages/avtar.jpg') }}" alt="Profile image">
                       </div>
                   </div>
                        @endif

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
                                <label class="form-label">Password <span class="clr"></span></label>
                                <div class="wrap-input">
                                    <input type="password" name="password" id="password" class="form-control password" placeholder="" autocomplete="new-password">
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
                            <input type="tel" value="{{ $patientId->mobile_no }}" name="mobile_no" class="form-control" placeholder="" minlength="10" maxlength="15">
                            @error('mobile_no')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Landline</label>
                            <input type="tel" value="{{ $patientId->landline }}" name="landline" class="form-control" placeholder="">
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
                            <input type="text" value="{{ $patientId->post_code }}" name="post_code" class="form-control" placeholder="" minlength="4" maxlength="8">
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

                        @php
                        $allCountrie=  DB::table('countries')->get();
                      @endphp

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <select class="form-control select2"  name="country" style="width: 100%;">

                                    {{-- <option value="">Select Any One</option>
                                    <option value="India" {{ $patientId->country == 'India' ? 'selected' : '' }}>India</option>
                                    <option value="USA" {{ $patientId->country == 'USA' ? 'selected' : '' }}>USA</option> --}}

                                    @forelse ($allCountrie as $countrie)
                                    <option value="{{ $countrie->Name }}" {{ $countrie->Name == $patientId->country ? 'selected' : '' }}>{{ $countrie->Name }}</option>
                                    @empty
                                    @endforelse


                                </select>
                                @error('country')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                            </div>
                        <!-- /.form-group -->
                        </div>



                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Document Type</h4>
							</div>
						</div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Select Id</label>
                                <select class="form-control select2" name="document_type" id="document_type" style="width: 100%;">
                                    <option value="">Select Any One</option>
                                    <option value="CIVIL ID" {{ $patientId->document_type == 'CIVIL ID' ? 'selected' : '' }}>CIVIL ID </option>
                                    <option value="EID" {{ $patientId->document_type == 'EID' ? 'selected' : '' }}>EID</option>
                                    <option value="PERSONAL NUMBER" {{ $patientId->document_type == 'PERSONAL NUMBER' ? 'selected' : '' }}>PERSONAL NUMBER</option>
                                    <option value="RESIDENT ID" {{ $patientId->document_type == 'RESIDENT ID' ? 'selected' : '' }}>RESIDENT ID</option>
                                    <option value="PASSPORT, DRIVER's LICENSE, ETC" {{ $patientId->document_type == 'PASSPORT, DRIVERs LICENSE, ETC' ? 'selected' : '' }}>PASSPORT, DRIVER's LICENSE, ETC</option>

                                </select>
                                @error('document_type')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">    
                              <label class="form-label">Enter Id Number</label>
                              <input type="text" name="enterIdNumber" id="enterIdNumber" value="{{ $patientId->enterIdNumber}}" class="form-control" placeholder="">
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



 <script>
    document.addEventListener('DOMContentLoaded', function () {
        

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
                    maxLength = 11;
                    message = selectedType + ' must be exactly 11 digits';
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
            } else {
                $("#validationMessage").text('');
            }
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

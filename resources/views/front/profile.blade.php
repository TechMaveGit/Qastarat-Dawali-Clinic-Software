@extends('front.layout.main_view')

@push('title')
    Home | QASTARAT & DAWALI CLINICS
@endpush

@section('content-section')

    <div class="partner_view">
        <form action="{{ route('patient.update_profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-lg-12 mt-4">
                    <div class="profile_box admin_profile">
                        <div class="back_img">
                            <div class="avtar_box">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg"
                                            name="patient_profile_img">
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">


                                        @isset($doctor->patient_profile_img)
                                            <div id="imagePreview"
                                                style="background-image: url('{{ asset(
                                                    "
                                                                                        /assets/patient_profile/" . $doctor->patient_profile_img,
                                                ) }}');">
                                            </div>
                                        @else
                                            <div id="imagePreview"
                                                style="background-image: url('{{ asset("
                                                                                        /assets/images/team-13.jpg") }}');">
                                            </div>
                                        @endisset


                                    </div>
                                    <!-- <h6 class="name_dt_fg">kathreen Cooper</h6>  -->
                                </div>
                                <!-- <div class="partners_dt_name">
                           <h6>Frank Kirk <span>example@gmail.com</span></h6>
                       </div> -->

                            </div>
                        </div>
                        <div class="inner_box_ghie">

                            <div class="row align-items-center">


                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form_input">
                                                <label for="formrow-firstname-input" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="formrow-firstname-input"
                                                    placeholder="Hector Lambert" name="name"
                                                    value="{{ $doctor->name ?? '' }}">
                                                @error('name')
                                                    <span class="text-danger"
                                                        style="font-size: 13px;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form_input">
                                                <label for="formrow-firstname-input" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="formrow-firstname-input"
                                                    placeholder="HectorLambert" name="title"
                                                    value="{{ $doctor->title ?? '' }}">
                                                @error('title')
                                                    <span class="text-danger"
                                                        style="font-size: 13px;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form_input">
                                                <label for="formrow-firstname-input" class="form-label">Email </label>
                                                <input type="email" class="form-control" id="formrow-firstname-input"
                                                    placeholder="example@gmail.com" name="email"
                                                    value="{{ $doctor->email ?? '' }}" readonly>
                                                @error('email')
                                                    <span class="text-danger"
                                                        style="font-size: 13px;">{{ $message }}</span>
                                                @enderror



                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form_input">
                                                <label for="formrow-firstname-input" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="formrow-firstname-input"
                                                    placeholder="" name="password">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="action_btns_ui text-end">

                                        <button type="submit" class="update_btn">
                                            <iconify-icon icon="solar:smartphone-update-outline" class="update_icon">
                                            </iconify-icon> Update
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>




                    </div>
                </div>


            </div>
        </form>

        @if (isset(auth()->user()->role) && auth()->user()->role == 'user')
            @php
                $patient = auth()->user();

                $doctorId = DB::table('referal_patients')->where('patient_id', $patient->id)->pluck('doctor_id')->toArray();
                $doctorDetail = DB::table('doctors')->whereIn('id', $doctorId)->get();
            @endphp
            <div class="row partner_view" >

                <div class="col-lg-12 profile_box admin_profile">

                    <div class="left_side">

                        <div class="profile_action">

                            <div class="left_side_pr_icon">


                            </div>



                        </div>

                        <input type="hidden" name="patient_id" value="{{ encrypt(@$id) }}" />

                        <div class="profile_img">



                            @isset($patient->patient_profile_img)
                                <img src="{{ asset('/assets/patient_profile/' . $patient->patient_profile_img) }}"
                                    alt="">
                            @else
                                <img src="{{ asset('/assets/images/team-13.jpg') }}') }}" alt="">
                            @endisset


                            <div class="patient_dt_profile">

                                <h5 class="patient_name__">
                                    {{ $patient->sirname ?? ('' . ' ' . $patient->name ?? '') }}
                                </h5>



                                @php

                                function parseDate($dateString, $desiredFormat = 'Y-m-d') {
                                    $formats = [
                                        'd M, Y',
                                        'Y-m-d',
                                        'm/d/Y',
                                        'd/m/Y',
                                        'Y-m-d H:i:s',
                                        'm-d-Y',
                                        'd-m-Y',
                                        'M d, Y',
                                        'd F Y',
                                        'Y/m/d'
                                    ];

                                    // Try to parse the date using each format
                                    foreach ($formats as $format) {
                                        $sDate = new DateTime();
                                        $date = $sDate::createFromFormat($format, $dateString);
                                        if ($date && $date->format($format) === $dateString) {
                                            return $date->format($desiredFormat);
                                        }
                                    }

                                    // If no format matched, return false or an error message
                                    return null; // Or you can return "Invalid date format"
                                }

                                // Assuming $patient->birth_date exists
                                if (!empty($patient->birth_date ?? '')) {
                                    $birthDate = DateTime::createFromFormat('Y-m-d', parseDate($patient->birth_date));
                                    // $birthDate = parseDate($patient->birth_date);
                                    if ($birthDate) {
                                        // Calculate the age
                                        $currentDate = new DateTime();
                                        $ageInterval = $birthDate->diff($currentDate); // Difference between birth date and now
                                        $patientBirthDate = $ageInterval->y; // Age in years
                                    } else {
                                        $patientBirthDate = null;
                                    }
                                } else {
                                    $patientBirthDate = null;
                                }
                                @endphp

                                <p class="patient_age__">{{ @$patientBirthDate }} Years , <span
                                        class="patient_id__">{{ @$patient->patient_id }}</span></p>

                            </div>

                        </div>



                        <div class="patient_dt_line">

                            <ul>

                                <li>

                                    <div class="title___">

                                        <h6>Date of Birth</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_dob"> {{ @$patient->birth_date }}</h6>

                                    </div>

                                </li>

                                <li>

                                    <div class="title___">

                                        <h6>Gender</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_gendar">{{ @$patient->gendar }}</h6>

                                    </div>

                                </li>

                                <li>

                                    <div class="title___">

                                        <h6>Email Address</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_email">{{ @$patient->email }}</h6>

                                    </div>

                                </li>

                                <li>

                                    <div class="title___">

                                        <h6>Mobile Phone</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_mobile">{{ @$patient->dial_code }} {{ @$patient->mobile_no??'' }}</h6>

                                    </div>

                                </li>

                                <li>

                                    <div class="title___">

                                        <h6>Landline</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_landline">{{ @$patient->landline }}</h6>

                                    </div>

                                </li>

                                <li>

                                    <div class="title___">

                                        <h6>Street Address</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_street">{{ @$patient->street }}</h6>

                                    </div>

                                </li>

                                <li>

                                    <div class="title___">

                                        <h6>City/Town</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_town">{{ @$patient->town }}</h6>

                                    </div>

                                </li>

                                <li>

                                    <div class="title___">

                                        <h6>County/State</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_state">{{ @$patient->country }}</h6>

                                    </div>

                                </li>

                                <li>

                                    <div class="title___">

                                        <h6>Post Code</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_post_code">{{ @$patient->post_code }}</h6>

                                    </div>

                                </li>

                                <li>

                                    <div class="title___">

                                        <h6>Country</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_country">{{ @$patient->country }}</h6>

                                    </div>

                                </li>

                                <li>

                                    <div class="title___">

                                        <h6>Next of Kin</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_kin">{{ @$patient->kin }}</h6>

                                    </div>

                                </li>

                                <li>

                                    <div class="title___">

                                        <h6>Insurer</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_insurer">{{ @$Patient_insurer->insurer_name }}</h6>

                                    </div>

                                </li>

                                <li>

                                    <div class="title___">

                                        <h6>Policy No</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_policy_no">{{ @$patient->policy_no }}</h6>

                                    </div>

                                </li>

                                <li>

                                    <div class="title___">

                                        <h6>GP</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_gp">{{ @$patient->gp }}</h6>

                                    </div>

                                </li>

                                <li>

                                    <div class="title___">

                                        <h6>Document Id
                                        </h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_kin">{{ @$patient->document_type }}</h6>

                                    </div>

                                </li>


                                <li>

                                    <div class="title___">

                                        <h6>Id Number </h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_kin">{{ @$patient->enterIdNumber }}</h6>

                                    </div>

                                </li>


                                <li>

                                    <div class="title___">

                                        <h6>Referal Doctor</h6>

                                    </div>

                                    <div class="data_pt">

                                        @forelse($doctorDetail as $alldoctorDetail)
                                            <h6 id="data_pt_kin">{{ $alldoctorDetail->name }} 
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            </h6>

                                        @empty
                                        @endforelse
                                    </div>

                                </li>



                                <li>

                                    <div class="title___">

                                        <h6>Assign Doctor</h6>

                                    </div>

                                    <div class="data_pt">

                                        <h6 id="data_pt_kin">{{ $doctors->name ?? '' }} </h6>

                                    </div>

                                </li>

                                <li>
                                    <div class="detail_title">
                                        <h6>Branch Name</h6>
                                    </div>
                                    <div class="detail_ans">
                                        <span class="branchcls">
                                            @forelse($patient->userBranch as $getbranchName)
                                                <h6 id="data_pt_kin">
                                                    {{ $getbranchName->userBranchName->branch_name ?? '' }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                </h6>
                                            @empty
                                                <!-- Optional: Handle the case where there are no branches -->
                                            @endforelse

                                        </span>
                                    </div>
                                </li>





                            </ul>

                        </div>

                    </div>

                </div>
        @endif
    </div>



@endsection

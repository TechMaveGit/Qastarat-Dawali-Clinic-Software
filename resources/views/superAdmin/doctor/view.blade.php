@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>
        Doctor Details | Super Admin</title>
@endpush
@section('content')

    <style>
        .imageSize {
            width: 100px;
        }
    </style>

    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex">
                    <h4 class="page-title">Doctor Details</h4>
                    {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('doctors.index') }}">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Doctor Details</li>
                </ol>
            </nav> --}}
                </div>

            </div>
            <section class="content">
                <div class="row">
                    <div class="col-xl-8 col-12">
                        <div class="box">
                            <div class="box-body text-end min-h-150">
                                <a href="{{ route('doctors.edit', ['id' => $doctor->id]) }}"
                                    class="btn-md btn btn-success"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                            </div>
                            <div class="box-body wed-up position-relative">
                                <div class="d-md-flex align-items-end" style="margin-top: -49px;">
                                    <!-- <img src="images/avatar/avatar-1.png" class="bg-success-light rounded10 me-20" alt="" /> -->
                                    <div class="profile_main">
                                        <div class="circle">

                                            {{-- https://techmavesoftwaredev.com/webclinic//superAdmin/images/avatar/avatar-1.png --}}

                                            @if (isset($doctor->patient_profile_img) && !empty($doctor->patient_profile_img))
                                                <img src="{{ asset('//assets/profileImage/' . $doctor->patient_profile_img) }}"
                                                    alt="">
                                            @else
                                                <img class="profile-pic"
                                                    src="{{ asset('/superAdmin/images/newimages/avtar.jpg') }}"
                                                    alt="">
                                            @endif


                                        </div>
                                        {{-- <div class="p-image">
                                    <i class="fa fa-camera upload-button"></i>
                                        <input class="file-upload" type="file" accept="image/*"/>
                                    </div> --}}
                                    </div>
                                    <div class="dr_name">
                                        <h4>{{ $doctor->name }}</h4>
                                        <p><i class="fa-solid fa-user-doctor"></i> {{ $doctor->qualifications }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body pt-0">
                                <div class="row">
                                    <!-- <div class="col-lg-12">
                                                            <div class="title_head">
                                                                <h4>View Volunteer Info.</h4>
                                                            </div>
                                                        </div> -->
                                    <div class="col-lg-12">
                                        <div class="detail_box ">
                                            <ul>
                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Date of Birth</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <h6>{{ $doctor->birth_date }}</h6>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Gender</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <h6>{{ $doctor->gendar }}</h6>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Email </h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <h6>{{ $doctor->email }}</h6>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Landline</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <h6>{{ $doctor->landline }}</h6>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Qualifications</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <h6>{{ $doctor->qualifications }}</h6>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Experience</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <h6>{{ $doctor->experience }}</h6>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Working Hours</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <h6>{{ $doctor->working_hours }}</h6>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Languages Spoken</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <h6>{{ $doctor->languages_spoken }}</h6>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="detail_title">
                                                        <h6>License Number</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <h6>{{ $doctor->lincense_no }}</h6>
                                                    </div>
                                                </li>

                                                @php
                                                    $doctorNurse = DB::table('doctor_nurse')
                                                        ->where('type', '1')
                                                        ->where('doctor_id', $doctor->id)
                                                        ->pluck('nurse_id')
                                                        ->toArray();
                                                    $drnurse = DB::table('doctors')->whereIn('id', $doctorNurse)->get();

                                                    //
                                                    $doctorCord = DB::table('doctor_nurse')
                                                        ->where('type', '0')
                                                        ->where('doctor_id', $doctor->id)
                                                        ->pluck('nurse_id')
                                                        ->toArray();
                                                    $drCord = DB::table('doctors')->whereIn('id', $doctorCord)->get();

                                                @endphp

                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Nurse</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        @if ($drnurse)
                                                            @foreach ($drnurse as $key => $alldrnurse)
                                                                <h6>{{ $alldrnurse->name }}
                                                                    @if ($key !== count($drnurse) - 1)
                                                                        <span>,</span>
                                                                    @endif
                                                                </h6>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </li>
                                                <br>


                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Coordinator</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        @if ($drCord)
                                                            @foreach ($drCord as $key => $allcord)
                                                                <h6>{{ $allcord->name }} @if ($key !== count($drCord) - 1)
                                                                        <span>,</span>
                                                                    @endif
                                                                </h6>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </li>






                                                <li>
                                                    <div class="detail_title">
                                                        <h6>License Upload</h6>
                                                    </div>
                                                    <div class="detail_ans imageSize">
                                                        @if ($doctor->LicenseUpload)
                                                            @php
                                                                $extension = pathinfo(
                                                                    $doctor->LicenseUpload,
                                                                    PATHINFO_EXTENSION,
                                                                );
                                                            @endphp




                                                            @if ($extension == 'pdf')
                                                                <a href="{{ asset('/assets/LicenseUpload') }}/{{ $doctor->LicenseUpload }}"
                                                                    target="_blank">View License Document</a>
                                                            @elseif($extension == 'xlsx')
                                                                <a href="{{ asset('/assets/LicenseUpload') }}/{{ $doctor->LicenseUpload }}"
                                                                    target="_blank">View License Document</a>
                                                            @else
                                                                <a href="{{ asset('/assets/LicenseUpload') }}/{{ $doctor->LicenseUpload }}"
                                                                    target="_blank">
                                                                    <img src="{{ asset('/assets/LicenseUpload') }}/{{ $doctor->LicenseUpload }}"
                                                                        alt="License Image" />
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </li>


                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Academic Document Upload</h6>
                                                    </div>
                                                    <div class="detail_ans imageSize">
                                                        @if ($doctor->AcademicDocumentUpload)
                                                            <a href="{{ asset('/assets/AcademicDocumentUpload') }}/{{ $doctor->AcademicDocumentUpload }}"
                                                                target="_blank">
                                                                <i class="fas fa-file-pdf"></i> Academic Document
                                                            </a>
                                                        @endif
                                                    </div>
                                                </li>



                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Address</h6>
                                                    </div>
                                                    <div class="detail_ans">


                                                        @if ($doctor->street)
                                                            {{ $doctor->street }} ,
                                                        @endif

                                                        @if ($doctor->town)
                                                            {{ $doctor->town }},
                                                        @endif


                                                        @if ($doctor->post_code)
                                                            {{ $doctor->post_code }},
                                                        @endif

                                                        @if ($doctor->country)
                                                            {{ $doctor->country }} ,
                                                        @endif

                                                    </div>
                                                </li>


                                                <li>
                                                    <div class="detail_title">
                                                        <h6>Branch Name</h6>
                                                    </div>
                                                    <div class="detail_ans">
                                                        <span class="branchcls">
                                                            @forelse ($doctor->userBranch as $getbranchName)
                                                                <p>{{ $getbranchName->userBranchName->branch_name }}
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                </p>

                                                            @empty
                                                            @endforelse
                                                        </span>
                                                    </div>
                                                </li>




                                            </ul>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">Today Appointments</h4>
                            </div>

                            <div class="box-body">
                                <div class="inner-user-div4">

                                    @forelse ($book_appointments as $allbook_appointments)
                                        @php
                                            $userDetail = DB::table('users')
                                                ->where('id', $allbook_appointments->patient_id)
                                                ->first();
                                        @endphp

                                        <div>
                                            <div class="d-flex align-items-center mb-10">
                                                <div class="d-flex flex-column flex-grow-1 fw-500">
                                                    <p class="hover-primary text-fade mb-1 fs-14">{{ $userDetail->name }}
                                                    </p>
                                                    <p class="hover-primary text-fade mb-1 fs-14">
                                                        {{ $allbook_appointments->appointment_type }}</p>

                                                    <span class="text-dark fs-14"></span>
                                                </div>
                                                <div>

                                                    @php
                                                        $startDate = \Carbon\Carbon::parse(
                                                            $allbook_appointments->start_date,
                                                        );
                                                        $startTime = \Carbon\Carbon::createFromFormat(
                                                            'H:i',
                                                            $allbook_appointments->start_time,
                                                        );
                                                        $startDateTime = $startDate
                                                            ->copy()
                                                            ->setTime($startTime->hour, $startTime->minute);
                                                        $formattedDateTime = $startDateTime->format('l, j F Y H:i');
                                                    @endphp


                                                    <p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i>
                                                        {{ $formattedDateTime }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>

                                    @empty

                                        <h4 class="box-title" style="bold">Not Have Any Today Appointments</h4>
                                    @endforelse



                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection

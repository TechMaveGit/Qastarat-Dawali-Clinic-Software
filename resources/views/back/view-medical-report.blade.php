@extends('back.layout.main_view')

@push('title')
    Medical report | QASTARAT & DAWALI CLINICS
@endpush

@section('content-section')

    @push('custom-css')
       
    @endpush



    <?php
    $D = json_decode(
        json_encode(
            Auth::guard('doctor')
                ->user()
                ->get_role(),
        ),
        true,
    );
    $arr = [];
    foreach ($D as $v) {
        $arr[] = $v['permission_id'];
    }
    ?>




    <!-- <div class="sub_bnr patient_recordsbanner" style="background-image: url(images/hero-15.jpg);">

                      <div class="sub_bnr_cnt">

                        <h1>Patient <span class="blue_theme"> Records</span> </h1>

                        <nav

                          style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"

                          aria-label="breadcrumb">

                          <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="index-2.php">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Patient Details</li>

                          </ol>

                        </nav>



                      </div>



                    </div> -->





    <div class="patient-detail">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="top_menus top_menu_up">

                        @include('back.custom_link')

                        <!-- <div class="middle_mm">
                              </div> -->

                        <div class="middle_mm">

                            <div class="view_record_icon">
                                <a href="#" class="action_btn_tooltip proress_notes" data-bs-toggle="modal"
                                    data-bs-target="#add_new_note">

                                    <iconify-icon icon="simple-line-icons:plus" width="20"></iconify-icon>

                                    <span class="toolTip">Progress notes / New note</span>

                                </a>
                                <a href="#" class="action_btn_tooltip" data-bs-toggle="modal"
                                    data-bs-target="#order_procedure">
                                    <iconify-icon icon="la:procedures" width="24"></iconify-icon>
                                    <span class="toolTip">Order Procedure</span>
                                </a>
                                <a href="#" class="action_btn_tooltip" data-bs-toggle="modal"
                                    data-bs-target="#order_supportive_surface">
                                    <iconify-icon icon="icon-park-outline:order" width="24"></iconify-icon>
                                    <span class="toolTip">Order Supportive Service</span>
                                </a>
                                <a href="#" class="action_btn_tooltip" data-bs-toggle="modal"
                                    data-bs-target="#prescription_day">
                                    <iconify-icon icon="majesticons:script-prescription-line" width="24"></iconify-icon>
                                    <span class="toolTip">Prescribe Drug</span>
                                </a>
                                <a href="#" class="action_btn_tooltip" data-bs-toggle="modal"
                                    data-bs-target="#refer_patient" aria-controls="offcanvasBottom">

                                    <iconify-icon icon="codicon:references" width="20"></iconify-icon>

                                    <span class="toolTip">Referrals</span>

                                </a>
                                <a href="#" class="action_btn_tooltip" data-bs-toggle="modal"
                                    data-bs-target="#future_plans">
                                    <iconify-icon icon="material-symbols-light:list-alt-outline"
                                        width="20"></iconify-icon>
                                    <span class="toolTip">Add Plan / Recommendation</span>
                                </a>
                            </div>
                        </div>

                        <div class="right_mm">

                            <div class="view_record_icon">

                             

              <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#genrate_report">
                <iconify-icon icon="carbon:report" width="22"></iconify-icon>
                <span class="toolTip">Generate Report</span>
            </a>

                                <a href="#" class="action_btn_tooltip" data-bs-toggle="modal"
                                    data-bs-target="#make_appointment">

                                    <iconify-icon icon="formkit:date"></iconify-icon>

                                    <span class="toolTip">Make an Appointment</span>

                                </a>

                                <a href="#" class="action_btn_tooltip" data-bs-toggle="modal"
                                    data-bs-target="#video_meeting">

                                    <iconify-icon icon="octicon:device-camera-video-24" width="20"></iconify-icon>

                                    <span class="toolTip">Start a video call</span>

                                </a>



                            </div>


                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="left_side_bxx_">





                        <div class="left_side">


                            <input type="hidden" name="patient_id" value="{{ @$id }}" />
                            <div class="profile_img">

                                <img src="{{ asset('/assets/patient_profile/' . $patient->patient_profile_img) }}"
                                    alt="">

                                <div class="insure_btn">

                                    <a href="#" class="outline_btn add_insurer" data-bs-toggle="modal"
                                        data-bs-target="#insure_add_edit">Add Insurer</a>

                                </div>

                                <div class="patient_dt_profile">

                                    <h5 class="patient_name__">{{ @$patient->sirname . ' ' . @$patient->name }} <a
                                            href="{{ route('user.patient-detail', ['id' => @$id]) }}"><iconify-icon
                                                icon="material-symbols:edit"></iconify-icon></a></h5>
                                  


                                @php
                                use Carbon\Carbon;

                                $patientBirthDate = null;
                                if (isset($patient->birth_date) && !empty($patient->birth_date)) {
                                    try {
                                        $birthDate = Carbon::createFromFormat('Y-m-d', date('Y-m-d', strtotime($patient->birth_date)));
                                        $patientBirthDate = $birthDate->diffInYears(Carbon::now());
                                    } catch (\Exception $e) {
                                        // Handle the exception if the date format is incorrect
                                        $patientBirthDate = null;
                                    }
                                }
                                @endphp
                                    <p class="patient_age__">{{ $patientBirthDate }} Years , <span
                                            class="patient_id__">{{ @$patient->patient_id }}</span></p>

                                    <p class="insurance_dt">{{ $insurer != null ? $insurer->insurer_name : '' }} -
                                        <span>{{ $insurer ? $insurer->insurance_number : '' }}</span>
                                    </p>

                                </div>



                            </div>







                            <div class="patient_dt_line_mm">

                                <!-- <h3 class="sub_title__">Key Diagnosis</h3> -->

                                <div class="accordion acordignleft__small" id="accordionExample2">

                                    <div class="accordion-item mm_title">

                                        <h2 class="accordion-header key_diagnosis_accordion">

                                            <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseleft1" aria-expanded="true"
                                                aria-controls="collapseleft1">

                                                <div class="top_title_mm_box key_diagnosis">

                                                    <h6>Key Diagnosis</h6>



                                                </div>

                                            </button>

                                        </h2>

                                        <div id="collapseleft1" class="accordion-collapse collapse show"
                                            data-bs-parent="#accordionExample2">

                                            <div class="accordion-body ">



                                                <div class="diagnosis_type">

                                                    <h6><span class="point_dia"><i
                                                                class="fa-regular fa-circle-dot"></i></span> Provisional /
                                                        Gernal diagnosis</h6>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod</p>

                                                </div>

                                                <div class="diagnosis_type">

                                                    <h6><span class="point_dia"><i
                                                                class="fa-regular fa-circle-dot"></i></span> ICD 10</h6>

                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod</p>

                                                </div>



                                            </div>

                                        </div>

                                    </div>


                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft7"
                                                aria-expanded="false" aria-controls="collapseleft7"
                                                fdprocessedid="fwkd6">
                                                <div class="top_title_mm_box">
                                                    <h6 class="allergies_hgjo"><span>Allergies</span>
                                                        @if (in_array('6', $arr))
                                                            <a href="#" class="allergies_add_klt"
                                                                data-bs-toggle="modal" data-bs-target="#allergies_add"><i
                                                                    class="fa-solid fa-circle-plus"></i></a>
                                                        @endif

                                                    </h6>
                                                </div>
                                            </button>
                                        </h2>



                                        <div id="collapseleft7" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample7">
                                            <div class="accordion-body">
                                                    <ul class="symptoms">
                                                        @php
                                                            $patient_allergies = App\Models\patient\Patient_allergy::where('patient_id', decrypt(@$id))
                                                                ->orderBy('id', 'desc')
                                                                ->get();
                                                        @endphp

                                                        @if ($patient_allergies->isEmpty())
                                                            {{-- <li>No Data Found.</li> --}}
                                                        @else
                                                            @foreach ($patient_allergies as $patient_allergy)
                                                                <li>{{ $patient_allergy->allergy_name }}

                                                                    <span class="alergyDelete" data-id="{{ $patient_allergy->id }}">
                                                                        <i class="fa-regular fa-trash-can trash_btn"></i>
                                                                    </span>

                                                                </li>
                                                            @endforeach
                                                        @endif

                                                    </ul>
                                              
                                            </div>
                                        </div>



                                    </div>
                                    <div class="accordion-item mm_title">

                                        <h2 class="accordion-header">

                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft3"
                                                aria-expanded="false" aria-controls="collapseleft3">
                                                <div class="view_record_icon left_side_icon_inner">


                                                    {{-- @if (in_array('8', $arr)) --}}
                                                    <a href="#" class="action_btn_tooltip" data-bs-toggle="modal"
                                                        data-bs-target="#past_medical">

                                                        <iconify-icon icon="solar:history-3-line-duotone"
                                                            width="20"></iconify-icon>

                                                        <span class="toolTip">Past Medical History</span>

                                                    </a>
                                                    {{-- @endif --}}

                                                </div>&nbsp;
                                                <div class="top_title_mm_box">

                                                    <h6>Past Medical History</h6>



                                                </div>

                                            </button>

                                        </h2>

                                        <div id="collapseleft3" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample2">

                                            <div class="accordion-body">

                                                <div class="appointments___list past_medical_history_ak">

                                                        <ul id="past_medical_histories">
                                                            @if ($patient_past_history->isEmpty())
                                                                <li>No data Found.</li>
                                                            @else
                                                                @foreach ($patient_past_history as $past_history)
                                                                    <li>

                                                                        <div class="appoin_title">

                                                                            <h6>{{ $past_history->diseases_name }}</h6>

                                                                            <p>{{ \Carbon\Carbon::parse($past_history->created_at)->format('D, d M Y') }}

                                                                                <span class="pastMedicalHistoryDelete" data-id="{{ $past_history->id }}">
                                                                                    <i class="fa-regular fa-trash-can trash_btn"></i>
                                                                                </span>

                                                                            </p>

                                                                        </div>

                                                                        <div class="appoin_date">

                                                                            <div class="read-more-content">

                                                                                <p>

                                                                                    {{ $past_history->describe }}
                                                                                </p>

                                                                            </div>
                                                                            @if (strlen($past_history->describe) >= 50)
                                                                                <button
                                                                                    class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                                    onclick="toggleReadMore(this)">Read
                                                                                    More</button>
                                                                            @endif

                                                                        </div>

                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    

                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                    <div class="accordion-item mm_title">

                                        <h2 class="accordion-header">

                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft4"
                                                aria-expanded="false" aria-controls="collapseleft4">
                                                <div class="view_record_icon left_side_icon_inner">





                                                    <a href="#" class="action_btn_tooltip" data-bs-toggle="modal"
                                                        data-bs-target="#past_surgical">

                                                        <iconify-icon icon="healthicons:surgical-sterilization-outline"
                                                            width="20"></iconify-icon>

                                                        <span class="toolTip">Past surgical History</span>

                                                    </a>





                                                </div>&nbsp;
                                                <div class="top_title_mm_box">

                                                    <h6>Past Surgical History</h6>



                                                </div>

                                            </button>

                                        </h2>

                                        <div id="collapseleft4" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample4">

                                            <div class="accordion-body">



                                                <div class="appointments___list past_medical_history_ak">
                                                 
                                                        <ul>
                                                            @if ($patient_past_surgical->isEmpty())
                                                                <li>No data Found.</li>
                                                            @else
                                                                @foreach ($patient_past_surgical as $past_surgical)
                                                                    <li>

                                                                        <div class="appoin_title">

                                                                            <h6>{{ $past_surgical->diseases_name }}</h6>

                                                                            <p>{{ \Carbon\Carbon::parse($past_surgical->created_at)->format('D, d M Y') }}

                                                                                <p>{{ \Carbon\Carbon::parse($past_surgical->created_at)->format('D, d M Y') }}

                                                                                    <span class="patientPastSurgical" data-id="{{ $past_surgical->id }}">
                                                                                        <i class="fa-regular fa-trash-can trash_btn"></i>
                                                                                    </span>
    
                                                                                </p>


                                                                            </p>

                                                                        </div>

                                                                        <div class="appoin_date">

                                                                            <div class="read-more-content">

                                                                                <p>

                                                                                    {{ $past_surgical->describe }}
                                                                                </p>

                                                                            </div>
                                                                            @if (strlen($past_surgical->describe) >= 50)
                                                                                <button
                                                                                    class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                                    onclick="toggleReadMore(this)">Read
                                                                                    More</button>
                                                                            @endif


                                                                        </div>

                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                  

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="accordion-item mm_title">

                                        <h2 class="accordion-header">

                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft6"
                                                aria-expanded="false" aria-controls="collapseleft6">
                                                <div class="view_record_icon left_side_icon_inner">



                                                    <a href="#" class="action_btn_tooltip drug_add"
                                                        data-bs-toggle="modal" data-bs-target="#medicine_add_edit">

                                                        <iconify-icon icon="covid:vaccine-protection-medicine-pill"
                                                            width="20"></iconify-icon>

                                                        <span class="toolTip">Drugs / Current Meds</span>

                                                    </a>



                                                </div>&nbsp;
                                                <div class="top_title_mm_box">

                                                    <h6>Drugs / Current meds</h6>

                                                </div>

                                            </button>

                                        </h2>

                                        <div id="collapseleft6" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample6">

                                            <div class="accordion-body">
                                                <div class="appointments___list past_medical_history_ak">

                                                    <ul>
                                                        @if ($patient_current_med->isEmpty())
                                                            <li>No data Found.</li>
                                                        @else
                                                            @foreach ($patient_current_med as $patient_current)
                                                                <li>

                                                                    <div class="appoin_title">

                                                                        <h6>{{ $patient_current->drug_name }}</h6>

                                                                        <p>{{ \Carbon\Carbon::parse($patient_current->created_at)->format('D, d M Y') }}
                                                                        </p>

                                                                    </div>

                                                                    <div class="appoin_date">

                                                                        <div class="read-more-content">

                                                                            <p>

                                                                                {{ $patient_current->frequency }}
                                                                            </p>

                                                                        </div>


                                                                    </div>

                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="accordion-item mm_title">

                                        <h2 class="accordion-header">

                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft10"
                                                aria-expanded="false" aria-controls="collapseleft10">

                                                <div class="top_title_mm_box">

                                                    <h6>List of procedures</h6>

                                                </div>

                                            </button>

                                        </h2>

                                        <div id="collapseleft10" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample10">

                                            <div class="accordion-body">
                                                <div class="appointments___list past_medical_history_ak">
                                                    <ul>
                                                        @if ($procedures->isEmpty())
                                                            <li>No data Found.</li>
                                                        @else
                                                            @foreach ($procedures as $procedure)
                                                            <li>

                                                                <div class="appoin_title">

                                                                    <h6>{{ $procedure->procedure_name }}</h6>

                                                                    <p>
                                                                        <span class="patientListOf"
                                                                            data-id="{{ $procedure->id }}">
                                                                            <i
                                                                                class="fa-regular fa-trash-can trash_btn"></i>
                                                                        </span>
                                                                    </p>

                                                                </div>


                                                                <div class="appoin_date">


                                                                    <div class="appoin_title">
                                                                        <h6> {{ $procedure->summary }}</h6>

                                                                        <p>

                                                                            {{ \Carbon\Carbon::parse($procedure->created_at)->format('D, d M Y') }}
                                                                        </p>

                                                                    </div>
                                                                </div>

                                                            </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                    </div>




                                    <div class="accordion-item mm_title">

                                        <h2 class="accordion-header">

                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft11"
                                                aria-expanded="false" aria-controls="collapseleft11">

                                                <div class="top_title_mm_box">

                                                    <h6>Referrals</h6>

                                                </div>

                                            </button>

                                        </h2>

                                        <div id="collapseleft11" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample11">

                                            <div class="accordion-body">

                                                <ul class="referrals_list scroll_list">
                                                  

                                                    @forelse ($referaldoctors as $allreferaldoctors)

                                                    @php
                                                     $doctorDetail = DB::table('doctors')->where('id',$allreferaldoctors->doctor_id)->first();
                                                    
                                                    @endphp
                                                    
                                                    <li style="position: relative;">

                                                        <div class="booking_card_select">

                                                            <label for="cbx1">

                                                                <div class="doctor_dt">

                                                                    <div class="image_dr">

                                                                        @if (isset($doctorDetail->patient_profile_img))

                                                                        <img src="{{ asset('/assets/profileImage/' . $doctorDetail->patient_profile_img) }}" alt="">

                                                                        @else
                                                                        <img src="{{ asset('/superAdmin/images/newimages/avtar.jpg')}}" alt="">

                                                                        @endif

                                                                    </div>

                                                                    <div class="dr_detail">

                                                                        <h6 class="dr_name">{{ $doctorDetail->name??'' }}
                                                                            <span>{{ $doctorDetail->title??'' }}</span>
                                                                        </h6>

                                                                        <span class="text-align-right">
                                                                          

                                                                        <p class="dr_email"><a
                                                                                href="mailto:{{ $doctorDetail->email??'' }}">{{ $doctorDetail->email??'' }}</a>
                                                                        </p>
                                                                        <p onclick="ViewSummary(`{{ $allreferaldoctors->patient_summary}}`)"> View Summary</p></span>


                                                                    </div>

                                                                </div>

                                                            </label>

                                                        </div>

                                                        @if (!(auth()->guard('doctor')->id()==$allreferaldoctors->doctor_id))
                                                        <span class="removeReferalPatient" data-id="{{ $allreferaldoctors->id }}">
                                                            <i class="fa-regular fa-trash-can trash_btn"></i>
                                                        </span>
                                                        @endif

                                                    </li>

                                                    @empty
                                                    {{-- <p>sasd</p> --}}
                                                    
                                                    @endforelse

                                                  

                                                </ul>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft8"
                                                aria-expanded="false" aria-controls="collapseleft8"
                                                fdprocessedid="1qbdpg">
                                                <div class="top_title_mm_box">
                                                    <h6>List of Visit</h6>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft8" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample8" style="">
                                            <div class="accordion-body">
                                                <div class="appointments___list">

                                                    <ul class="symptoms">
                                                        @php
                                                                $patient_id = decrypt(@$id);
                                                                $visit_notes = App\Models\patient\Patient_progress_note::where([
                                                                        // 'progress_note_canned_text_id' => 6,
                                                                        'patient_id' => @$patient_id
                                                                    ])
                                                                    ->orderBy('id', 'desc')
                                                                    ->get();
                                                            @endphp
                                                            @if ($visit_notes->isEmpty())
                                                                {{-- <li><small style="font-size:10px;">No Data Found</small></li> --}}
                                                            @else
                                                                @foreach ($visit_notes as $visit)
                                                                    <li>
                                                                        <div class="appoin_title">

                                                                            <h6></h6>

                                                                            <p>{{ \Carbon\Carbon::parse($visit->created_at)->format('D, d M Y') }}
                                                                            </p>

                                                                        </div>
                                                                        <div class="appoin_date">

                                                                            <div class="read-more-content">

                                                                                <p>{{ $visit->day??'0' }} {{ $visit->date??'days' }}</p>
                                                                                <p>{{$visit->details}}</p>

                                                                            </div>
                                                                          

                                                                        </div>

                                                                    </li>
                                                                @endforeach
                                                            @endif

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="accordion-item mm_title">

                                        <h2 class="accordion-header">

                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft91"
                                                aria-expanded="false" aria-controls="collapseleft8">

                                                <div class="top_title_mm_box">

                                                    <h6>List of prescribed Medicines</h6>

                                                </div>

                                            </button>

                                        </h2>

                                        <div id="collapseleft91" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample8">

                                            <div class="accordion-body">

                                                <div class="appointments___list past_medical_history_ak">

                                                    <ul>
                                                        @if ($prescriptions->isEmpty())
                                                            <li>No data Found.</li>
                                                        @else
                                                            @foreach ($prescriptions as $prescription)
                                                                <li>

                                                                    <div class="appoin_title">

                                                                        <h6></h6>

                                                                        <p>{{ \Carbon\Carbon::parse($prescription->created_at)->format('D, d M Y') }}
                                                                        </p>

                                                                    </div>

                                                                    <div class="appoin_date">

                                                                        <div class="read-more-content">

                                                                            <p>

                                                                                {{ $prescription->prescription }}
                                                                            </p>

                                                                        </div>
                                                                        @if (strlen($prescription->prescription) >= 50)
                                                                            <button
                                                                                class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                                onclick="toggleReadMore(this)">Read
                                                                                More</button>
                                                                        @endif

                                                                    </div>

                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>

                                            </div>

                                        </div>

                                    </div>







                                </div>





                            </div>

                        </div>

                    </div>





                </div>



                <div class="col-lg-8">
                    <div class="right_side_mm_box">
                        <div class="card mb-3 border_yellow">
                            <div class="card-body p-0">
                                <div class="accordion acordignleft__small" id="accordionExample2">
                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header key_diagnosis_accordion">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft24"
                                                aria-expanded="false" aria-controls="collapseleft24"
                                                fdprocessedid="u4x1b2">
                                                <div class="top_title_mm_box ">
                                                    <h6 class="action_flex_ghi">
                                                        <a href="#" class="action_btn_tooltip "
                                                            data-bs-toggle="modal" data-bs-target=""
                                                            id="diagnosis_key">
                                                            <iconify-icon
                                                                icon="material-symbols-light:diagnosis-outline-rounded"
                                                                width="20"></iconify-icon>
                                                            <span class="toolTip">Diagnosis</span>
                                                        </a>
                                                        <div class="enterd_by">
                                                            <span>Key Diagnosis | <span class="enter_span_hivj"> Entered By
                                                                    | {{ auth()->guard('admin')->user()->name ?? 'Guest' }}
                                                                </span> </span>

                                                            <div class="right_side_hjkl">    
                                                                <span class="date_time_fgu">
                                                                    <p>{{ \Carbon\Carbon::parse(now())->format('D, d M Y') }}
                                                                    </p>
                                                                </span>
                                                                <div class="customdotdropdown">
                                                                    <div class="buttondrop_dot">
                                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                    </div>
                                                                    <div class="dropdown-content">
                                                                        <a href="#" class="bottom_btn copy_btn"><i
                                                                                class="fa-solid fa-print"></i> Print
                                                                        </a>
                                                                        <a href="#" class="bottom_btn extract_btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#attach_document"><i
                                                                                class="fa-solid fa-paperclip"></i> Attach
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </h6>

                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft24" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample24">
                                            <div class="accordion-body">

                                                <div class="diagnosis_type">
                                                    <h6><span class="point_dia"><i
                                                                class="fa-regular fa-circle-dot"></i></span> Provisional /
                                                        Gernal diagnosis</h6>
                                                    @php
                                                        $diagnosis_general_data = App\Models\patient\Diagnosis::where(['title_name' => 'diagnosis_general', 'patient_id' => decrypt(@$id)])
                                                            ->get()
                                                            ->groupBy(['title_name', 'data_value']);
                                                    @endphp

                                                    @if ($diagnosis_general_data->isNotEmpty())
                                                        @foreach ($diagnosis_general_data as $groupedData)
                                                            @foreach ($groupedData as $data)
                                                                @php
                                                                    $decodedData = json_decode($data->first()->data_value, true);

                                                                @endphp

                                                                @if (is_array($decodedData))
                                                                    @foreach ($decodedData as $key => $value)
                                                                        @foreach ($value as $keyInner => $valueInner)
                                                                            <p>{{ $valueInner }}</p>
                                                                        @endforeach
                                                                    @endforeach
                                                                @else
                                                                    <p></p>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @else
                                                        {{-- <p>No Data Found</p> --}}
                                                    @endif

                                                </div>
                                                
                                                
                                                <div class="diagnosis_type">
                                                    <h6><span class="point_dia"><i
                                                                class="fa-regular fa-circle-dot"></i></span> ICD 10</h6>
                                                    @php
                                                        $diagnosis_cid_data = App\Models\patient\Diagnosis::where(['title_name' => 'diagnosis_cid', 'patient_id' => decrypt(@$id)])
                                                            ->get()
                                                            ->groupBy(['title_name', 'data_value']);
                                                    @endphp

                                                    @if ($diagnosis_cid_data->isNotEmpty())
                                                        @foreach ($diagnosis_cid_data as $groupedData)
                                                            @foreach ($groupedData as $data)
                                                                @php
                                                                    $decodedData = json_decode($data->first()->data_value, true);

                                                                @endphp

                                                                @if (is_array($decodedData))
                                                                    @foreach ($decodedData as $key => $value)
                                                                        @foreach ($value as $keyInner => $valueInner)
                                                                            <p>{{ $valueInner }}</p>
                                                                        @endforeach
                                                                    @endforeach
                                                                @else
                                                                    <p></p>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @else
                                                        {{-- <p>No Data Found</p> --}}
                                                    @endif



                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft16"
                                                aria-expanded="false" aria-controls="collapseleft16"
                                                fdprocessedid="wsvhuu">
                                                <div class="top_title_mm_box">
                                                    <h6 class="action_flex_ghi">
                                                        <a href="#" class="action_btn_tooltip"
                                                            data-bs-toggle="modal" data-bs-target="">
                                                            <iconify-icon icon="fluent:image-edit-20-regular"
                                                                width="24"></iconify-icon>
                                                            <span class="toolTip">Symptoms</span>
                                                        </a>
                                                        @php
                                                        $SymptomsAll = App\Models\patient\Diagnosis::with('doctor')
                                                            ->where(['title_name' => 'Symptoms', 'patient_id' => decrypt(@$id)])
                                                            ->orderBy('id', 'desc');


                                                      $symptom =  $SymptomsAll->first();
                                                    @endphp
                                                        <div class="enterd_by">
                                                            <span>Sympotms | <span class="enter_span_hivj"> Entered By |
                                                              @if (isset($symptom) && $symptom->exists)
                                                              {{ optional($symptom->doctor)->name ?? '' }}</span>
                                                              @endif

                                                            </span>
                                                            <div class="right_side_hjkl">
                                                                <span
                                                                    class="date_time_fgu">  @if (isset($symptom) && $symptom->exists){{ \Carbon\Carbon::parse($symptom->created_at)->format('D, d M Y') ?? '' }}  @endif</span>
                                                                <div class="customdotdropdown">
                                                                    <div class="buttondrop_dot">
                                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                    </div>
                                                                    <div class="dropdown-content">
                                                                        <a href="#" class="bottom_btn copy_btn"><i
                                                                                class="fa-solid fa-print"></i> Print
                                                                        </a>
                                                                        <a href="#" class="bottom_btn extract_btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#attach_document"><i
                                                                                class="fa-solid fa-paperclip"></i> Attach
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft16" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample16">
                                            <div class="accordion-body">
                                                <div class="prescription_btn_mm_box">
                                                    <ul class="symptoms">
                                                     @php
                                                          $SymptomsAll= $SymptomsAll->get();
                                                     @endphp
                                                        @forelse ($SymptomsAll as $Symptoms)
                                                            @php

                                                                $dataValueArray = json_decode($Symptoms->data_value, true);

                                                            @endphp
                                                            <li class="draggable" draggable="true">
                                                                {{ $dataValueArray . '  /-' . \Carbon\Carbon::parse($Symptoms->created_at)->format('D, d M Y') . ' /- ' . (optional($Symptoms->doctor) ? $Symptoms->doctor->title : '') . ' ' . (optional($Symptoms->doctor) ? $Symptoms->doctor->name : '') }}
                                                            </li>


                                                        @empty
                                                            {{-- <p>No Data Found</p> --}}
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft2"
                                                aria-expanded="false" aria-controls="collapseleft2"
                                                fdprocessedid="zo6ho">
                                                <div class="top_title_mm_box">
                                                    <h6 class="action_flex_ghi">
                                                        <a href="#" class="action_btn_tooltip"
                                                            data-bs-toggle="modal" data-bs-target="#symptoms_add2">
                                                            <iconify-icon icon="covid:symptoms-virus-lung-damage"
                                                                width="22"></iconify-icon>
                                                            <span class="toolTip"> Severity Symptoms Scale</span>
                                                        </a>
                                                        @php
                                                             $SeveritySymptomsScales = App\Models\patient\Diagnosis::with('doctor')
                                                        ->where(['title_name' => 'symptoms_score', 'patient_id' => decrypt(@$id)])
                                                        ->orderBy('id','desc');
                                                        $SeveritySymptomsScale=  $SeveritySymptomsScales->first();
                                                        @endphp

                                                        <div class="enterd_by">
                                                            <span>Severity Symptoms Scale | <span class="enter_span_hivj">
                                                                    Entered By | @if (isset($SeveritySymptomsScale) && $SeveritySymptomsScale->exists){{ optional($SeveritySymptomsScale->doctor) ? $SeveritySymptomsScale->doctor->name : '' }} @endif</span> </span>
                                                            <div class="right_side_hjkl">
                                                                <span class="date_time_fgu">@if (isset($SeveritySymptomsScale) && $SeveritySymptomsScale->exists){{ \Carbon\Carbon::parse($SeveritySymptomsScale->created_at)->format('D, d M Y') }}@endif</span>
                                                                <div class="customdotdropdown">
                                                                    <div class="buttondrop_dot">
                                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                    </div>
                                                                    <div class="dropdown-content">
                                                                        <a href="#" class="bottom_btn copy_btn"><i
                                                                                class="fa-solid fa-print"></i> Print
                                                                        </a>
                                                                        <a href="#" class="bottom_btn extract_btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#attach_document"><i
                                                                                class="fa-solid fa-paperclip"></i> Attach
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h6>

                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft2" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample2" style="">
                                            <div class="accordion-body">
                                                <div class="prescription_btn_mm_box">
                                                    <!-- <a href="#" class="prescription_btn" >Prescription</a> -->
                                                    {{-- <ul class="symptoms">
                                                        <li class="draggable" draggable="true">high fever (40°C/104°F)
                                                        </li>
                                                        <li class="draggable" draggable="true">severe headache</li>
                                                        <li class="draggable" draggable="true">pain behind the eyes.</li>
                                                        <li class="draggable" draggable="true">muscle and joint pains.
                                                        </li>
                                                        <li class="draggable" draggable="true">nausea</li>
                                                        <li class="draggable" draggable="true">vomiting</li>
                                                        <li class="draggable" draggable="true">swollen glands</li>
                                                        <li class="draggable" draggable="true">rash</li>
                                                    </ul> --}}
                                                    @php
                                                        $SeveritySymptomsScales =$SeveritySymptomsScales->get();


                                                    @endphp
                                                    <ul class="symptoms">
                                                        @forelse ($SeveritySymptomsScales as $SeveritySymptomsScale)
                                                            @php
                                                                // Decode JSON data_value
                                                                $dataValueArray = json_decode($SeveritySymptomsScale->data_value, true);
                                                                // Calculate the score based on your criteria

                                                                $score = 0;

                                                                foreach ($dataValueArray as $symptom => $values) {

                                                                $score += intval($values[0]);

                                                                }

                                                                // Determine the severity based on the score
                                                                $severity = '';
                                                                if ($score >= 0 && $score <= 7) {
                                                                    $severity = 'Mild LUTS';
                                                                } elseif ($score >= 8 && $score <= 19) {
                                                                    $severity = 'Moderate LUTS (PAE FAVORABLE)';
                                                                } elseif ($score >= 20 && $score <= 35) {
                                                                    $severity = 'Severe LUTS (PAE FAVORABLE)';
                                                                }

                                                            @endphp
                                                            <li class="draggable" draggable="true">
                                                                {{
                                                                    $score .
                                                                    ' pts ' .
                                                                    $severity .
                                                                    '/- ' .
                                                                    \Carbon\Carbon::parse($SeveritySymptomsScale->created_at)->format('D, d M Y') .
                                                                    '/- ' .
                                                                    (optional($SeveritySymptomsScale->doctor) ? $SeveritySymptomsScale->doctor->title : '') .
                                                                    (optional($SeveritySymptomsScale->doctor) ? $SeveritySymptomsScale->doctor->name : '')
                                                                }}

                                                            @empty
                                                                {{-- <p>No Data Found</p> --}}
                                                        @endforelse

                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft5"
                                                aria-expanded="false" aria-controls="collapseleft5"
                                                fdprocessedid="tuvade">
                                                <div class="top_title_mm_box">

                                                    <h6 class="action_flex_ghi">
                                                        <a href="#" class="action_btn_tooltip"
                                                            data-bs-toggle="modal" data-bs-target="">
                                                            <iconify-icon icon="healthicons:clinical-fe-outline"
                                                                width="20"></iconify-icon>
                                                            <span class="toolTip">Clinical Exam</span>
                                                        </a>

                                                        <div class="enterd_by">
                                                            <span>Clinical Exam | <span class="enter_span_hivj"> Entered By
                                                                    |
                                                                    {{ auth()->guard('admin')->user()->name ?? 'Guest' }}</span>
                                                            </span>
                                                            <div class="right_side_hjkl">
                                                                <span
                                                                    class="date_time_fgu">{{ \Carbon\Carbon::parse(now())->format('D, d M Y') }}</span>
                                                                <div class="customdotdropdown">
                                                                    <div class="buttondrop_dot">
                                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                    </div>
                                                                    <div class="dropdown-content">
                                                                        <a href="#" class="bottom_btn copy_btn"><i
                                                                                class="fa-solid fa-print"></i> Print
                                                                        </a>
                                                                        <a href="#" class="bottom_btn extract_btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#attach_document"><i
                                                                                class="fa-solid fa-paperclip"></i> Attach
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft5" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample5">
                                            <div class="accordion-body">
                                                @php
                                                    $diagnosis_cid_data = App\Models\patient\Diagnosis::where(['title_name' => 'ClinicalIndicator', 'patient_id' => decrypt(@$id)])
                                                        ->get()
                                                        ->groupBy(['title_name', 'data_value']);
                                                @endphp

                                                @if ($diagnosis_cid_data->isNotEmpty())
                                                    @foreach ($diagnosis_cid_data as $groupedData)
                                                        @foreach ($groupedData as $data)
                                                            @php
                                                                $decodedData = json_decode($data->first()->data_value, true);

                                                            @endphp

                                                            @if (is_array($decodedData))
                                                                @foreach ($decodedData as $key => $value)
                                                                    @foreach ($value as $keyInner => $valueInner)
                                                                        <ul class="symptoms">
                                                                            <li class="draggable" draggable="true">
                                                                                {{ $valueInner }}</li>

                                                                        </ul>
                                                                    @endforeach
                                                                @endforeach
                                                            @else
                                                                <p></p>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @else
                                                    {{-- <p>No Data Found</p> --}}
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft15"
                                                aria-expanded="false" aria-controls="collapseleft15"
                                                fdprocessedid="qp0jj">
                                                <div class="top_title_mm_box">
                                                    <h6 class="action_flex_ghi">
                                                        <a href="#" class="action_btn_tooltip"
                                                            data-bs-toggle="modal" data-bs-target="">
                                                            <iconify-icon icon="mdi:x-ray-box-outline"
                                                                width="24"></iconify-icon>
                                                            <span class="toolTip">Order Imaginary Exam</span>
                                                        </a>

                                                        <div class="enterd_by">
                                                            <span>Order Imaginary Exam | <span class="enter_span_hivj">
                                                                    Entered By |
                                                                    {{ auth()->guard('admin')->user()->name ?? 'Guest' }}</span>
                                                            </span>
                                                            <div class="right_side_hjkl">
                                                                <span
                                                                    class="date_time_fgu">{{ \Carbon\Carbon::parse(now())->format('D, d M Y') }}</span>
                                                                <div class="customdotdropdown">
                                                                    <div class="buttondrop_dot">
                                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                    </div>
                                                                    <div class="dropdown-content">
                                                                        <a href="#" class="bottom_btn copy_btn"><i
                                                                                class="fa-solid fa-print"></i> Print
                                                                        </a>
                                                                        <a href="#" class="bottom_btn extract_btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#attach_document"><i
                                                                                class="fa-solid fa-paperclip"></i> Attach
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft15" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample15">
                                            <div class="accordion-body">
                                                <div class="appointments___list">
                                                    @php
                                                        $diagnosis_cid_data = App\Models\patient\Diagnosis::where(['title_name' => 'Imaging', 'patient_id' => decrypt(@$id)])
                                                            ->get()
                                                            ->groupBy(['title_name', 'data_value']);
                                                    @endphp

                                                    @if ($diagnosis_cid_data->isNotEmpty())
                                                        @foreach ($diagnosis_cid_data as $groupedData)
                                                            @foreach ($groupedData as $data)
                                                                @php
                                                                    $decodedData = json_decode($data->first()->data_value, true);

                                                                @endphp

                                                                @if (is_array($decodedData))
                                                                    @foreach ($decodedData as $key => $value)
                                                                        @foreach ($value as $keyInner => $valueInner)
                                                                            @if (isset($valueInner) && !empty($valueInner))
                                                                                <ul class="symptoms">
                                                                                    <li class="draggable"
                                                                                        draggable="true">
                                                                                        {{ $valueInner }}</li>

                                                                                </ul>
                                                                            @endif
                                                                        @endforeach
                                                                    @endforeach
                                                                @else
                                                                    <p></p>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @else
                                                        {{-- <p>No Data Found</p> --}}
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft17"
                                                aria-expanded="false" aria-controls="collapseleft17"
                                                fdprocessedid="hxegnn">
                                                <div class="top_title_mm_box">

                                                    <h6 class="action_flex_ghi">
                                                        <a href="#" class="action_btn_tooltip"
                                                            data-bs-toggle="modal" data-bs-target="#lab_test">
                                                            <iconify-icon icon="entypo:lab-flask"
                                                                width="20"></iconify-icon>
                                                            <span class="toolTip">Order Lab Test</span>
                                                        </a>

                                                        <div class="enterd_by">
                                                            <span>Lab Pendings | <span class="enter_span_hivj"> Entered By
                                                                    |
                                                                    {{ auth()->guard('admin')->user()->name ?? 'Guest' }}</span>
                                                            </span>
                                                            <div class="right_side_hjkl">
                                                                <span
                                                                    class="date_time_fgu">{{ \Carbon\Carbon::parse(now())->format('D, d M Y') }}</span>
                                                                <div class="customdotdropdown">
                                                                    <div class="buttondrop_dot">
                                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                    </div>
                                                                    <div class="dropdown-content">
                                                                        <a href="#" class="bottom_btn copy_btn"><i
                                                                                class="fa-solid fa-print"></i> Print
                                                                        </a>
                                                                        <a href="#" class="bottom_btn extract_btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#attach_document"><i
                                                                                class="fa-solid fa-paperclip"></i> Attach
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft17" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample17">
                                            <div class="accordion-body">
                                                <div class="appointments___list">
                                                    @php
                                                        $diagnosis_cid_data = App\Models\patient\Diagnosis::where(['title_name' => 'lab', 'patient_id' => decrypt(@$id)])
                                                            ->get()
                                                            ->groupBy(['title_name', 'data_value']);
                                                    @endphp

                                                    @if ($diagnosis_cid_data->isNotEmpty())
                                                        @foreach ($diagnosis_cid_data as $groupedData)
                                                            @foreach ($groupedData as $data)
                                                                @php
                                                                    $decodedData = json_decode($data->first()->data_value, true);

                                                                @endphp

                                                                @if (is_array($decodedData))
                                                                    @foreach ($decodedData as $key => $value)
                                                                        @foreach ($value as $keyInner => $valueInner)
                                                                            @if (isset($valueInner) && !empty($valueInner))
                                                                                <ul class="symptoms">
                                                                                    <li class="draggable"
                                                                                        draggable="true">
                                                                                        {{ $valueInner }}</li>

                                                                                </ul>
                                                                            @endif
                                                                        @endforeach
                                                                    @endforeach
                                                                @else
                                                                    <p></p>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @else
                                                        {{-- <p>No Data Found</p> --}}
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft12"
                                                aria-expanded="false" aria-controls="collapseleft12"
                                                fdprocessedid="blxc">
                                                <div class="top_title_mm_box">

                                                    <h6 class="action_flex_ghi">
                                                        <a href="#" class="action_btn_tooltip"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#order_supportive_surface_">
                                                            <iconify-icon icon="icon-park-outline:order"
                                                                width="24"></iconify-icon>
                                                            <span class="toolTip">Order Special Investigation</span>
                                                        </a>

                                                        <div class="enterd_by">
                                                            <span>Special Investigation Result | <span
                                                                    class="enter_span_hivj"> Entered By
                                                                    |{{ auth()->guard('admin')->user()->name ?? 'Guest' }}</span>
                                                            </span>
                                                            <div class="right_side_hjkl">
                                                                <span
                                                                    class="date_time_fgu">{{ \Carbon\Carbon::parse(now())->format('D, d M Y') }}</span>
                                                                <div class="customdotdropdown">
                                                                    <div class="buttondrop_dot">
                                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                    </div>
                                                                    <div class="dropdown-content">
                                                                        <a href="#" class="bottom_btn copy_btn"><i
                                                                                class="fa-solid fa-print"></i> Print
                                                                        </a>
                                                                        <a href="#" class="bottom_btn extract_btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#attach_document"><i
                                                                                class="fa-solid fa-paperclip"></i> Attach
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft12" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample12">
                                            <div class="accordion-body">
                                                @php
                                                    $diagnosis_cid_data = App\Models\patient\Diagnosis::where(['title_name' => 'intervention_procedure', 'patient_id' => decrypt(@$id)])
                                                        ->get()
                                                        ->groupBy(['title_name', 'data_value']);
                                                @endphp

                                                @if ($diagnosis_cid_data->isNotEmpty())
                                                    @foreach ($diagnosis_cid_data as $groupedData)
                                                        @foreach ($groupedData as $data)
                                                            @php
                                                                $decodedData = json_decode($data->first()->data_value, true);

                                                            @endphp

                                                            @if (is_array($decodedData))
                                                                @foreach ($decodedData as $key => $value)
                                                                    @foreach ($value as $keyInner => $valueInner)
                                                                        @if (isset($valueInner) && !empty($valueInner))
                                                                            <ul class="symptoms">
                                                                                <li class="draggable" draggable="true">
                                                                                    {{ $valueInner }}</li>

                                                                            </ul>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            @else
                                                                <p></p>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @else
                                                    {{-- <p>No Data Found</p> --}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft18"
                                                aria-expanded="false" aria-controls="collapseleft18"
                                                fdprocessedid="8ha05t">
                                                <div class="top_title_mm_box">
                                                    <h6 class="action_flex_ghi">
                                                        <a href="#" class="action_btn_tooltip"
                                                            data-bs-toggle="modal" data-bs-target="">
                                                            <iconify-icon
                                                                icon="material-symbols-light:reviews-outline-rounded"
                                                                width="24"></iconify-icon>
                                                            <span class="toolTip">MDT Review</span>
                                                        </a>

                                                        <div class="enterd_by">
                                                            <span>MDT Review | <span class="enter_span_hivj"> Entered By
                                                                    |{{ auth()->guard('admin')->user()->name ?? 'Guest' }}</span>
                                                            </span>
                                                            <div class="right_side_hjkl">
                                                                <span
                                                                    class="date_time_fgu">{{ \Carbon\Carbon::parse(now())->format('D, d M Y') }}</span>
                                                                <div class="customdotdropdown">
                                                                    <div class="buttondrop_dot">
                                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                    </div>
                                                                    <div class="dropdown-content">
                                                                        <a href="#" class="bottom_btn copy_btn"><i
                                                                                class="fa-solid fa-print"></i> Print
                                                                        </a>
                                                                        <a href="#" class="bottom_btn extract_btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#attach_document"><i
                                                                                class="fa-solid fa-paperclip"></i> Attach
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft18" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample18">
                                            <div class="accordion-body">
                                                @php
                                                    $diagnosis_cid_data = App\Models\patient\Diagnosis::where(['title_name' => 'mdt', 'patient_id' => decrypt(@$id)])
                                                        ->get()
                                                        ->groupBy(['title_name', 'data_value']);
                                                @endphp

                                                @if ($diagnosis_cid_data->isNotEmpty())
                                                    @foreach ($diagnosis_cid_data as $groupedData)
                                                        @foreach ($groupedData as $data)
                                                            @php
                                                                $decodedData = json_decode($data->first()->data_value, true);

                                                            @endphp

                                                            @if (is_array($decodedData))
                                                                @foreach ($decodedData as $key => $value)
                                                                    @foreach ($value as $keyInner => $valueInner)
                                                                        @if (isset($valueInner) && !empty($valueInner))
                                                                            <ul class="symptoms">
                                                                                <li class="draggable" draggable="true">
                                                                                    {{ $valueInner }}</li>

                                                                            </ul>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            @else
                                                                <p></p>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @else
                                                    {{-- <p>No Data Found</p> --}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft19"
                                                aria-expanded="false" aria-controls="collapseleft19"
                                                fdprocessedid="mropxd">
                                                <div class="top_title_mm_box">
                                                    <h6 class="action_flex_ghi">
                                                        <a href="#" class="action_btn_tooltip"
                                                            data-bs-toggle="modal" data-bs-target="">
                                                            <iconify-icon icon="solar:checklist-minimalistic-outline"
                                                                width="24"></iconify-icon>
                                                            <span class="toolTip">Eligibility Status</span>
                                                        </a>
                                                        <div class="enterd_by">
                                                            <span>Eligibility Status | <span class="enter_span_hivj">
                                                                    Entered By |
                                                                    {{ auth()->guard('admin')->user()->name ?? 'Guest' }}</span>
                                                            </span>
                                                            <div class="right_side_hjkl">
                                                                <span
                                                                    class="date_time_fgu">{{ \Carbon\Carbon::parse(now())->format('D, d M Y') }}</span>
                                                                <div class="customdotdropdown">
                                                                    <div class="buttondrop_dot">
                                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                    </div>
                                                                    <div class="dropdown-content">
                                                                        <a href="#" class="bottom_btn copy_btn"><i
                                                                                class="fa-solid fa-print"></i> Print
                                                                        </a>
                                                                        <a href="#" class="bottom_btn extract_btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#attach_document"><i
                                                                                class="fa-solid fa-paperclip"></i> Attach
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft19" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample19">
                                            <div class="accordion-body">
                                                @php
                                                    $diagnosis_cid_data = App\Models\patient\Diagnosis::where(['title_name' => 'elegibility_status', 'patient_id' => decrypt(@$id)])
                                                        ->get()
                                                        ->groupBy(['title_name', 'data_value']);
                                                @endphp

                                                @if ($diagnosis_cid_data->isNotEmpty())
                                                    @foreach ($diagnosis_cid_data as $groupedData)
                                                        @foreach ($groupedData as $data)
                                                            @php
                                                                $decodedData = json_decode($data->first()->data_value, true);

                                                            @endphp

                                                            @if (is_array($decodedData))
                                                                @foreach ($decodedData as $key => $value)
                                                                    @foreach ($value as $keyInner => $valueInner)
                                                                        @if (isset($valueInner) && !empty($valueInner))
                                                                            <ul class="symptoms">
                                                                                <li class="draggable" draggable="true">
                                                                                    {{ $valueInner }}</li>

                                                                            </ul>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            @else
                                                                <p></p>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @else
                                                    {{-- <p>No Data Found</p> --}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 border_yellow without_icon">
                            <div class="card-body p-0">
                                <div class="accordion acordignleft__small" id="accordionExample2">


                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft20"
                                                aria-expanded="false" aria-controls="collapseleft20"
                                                fdprocessedid="dn453">
                                                <div class="top_title_mm_box">
                                                    <h6 class="action_flex_ghi">
                                                        <div class="enterd_by">
                                                            <span>Order Procedure | <span class="enter_span_hivj"> Entered
                                                                    By | SAIF ALZAABI</span> </span>
                                                            <div class="right_side_hjkl">
                                                                <span class="date_time_fgu">Sat 21st Oct, 2023, 1:39
                                                                    pm</span>
                                                                <div class="customdotdropdown">
                                                                    <div class="buttondrop_dot">
                                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                    </div>
                                                                    <div class="dropdown-content">
                                                                        <a href="#" class="bottom_btn copy_btn"><i
                                                                                class="fa-solid fa-print"></i> Print
                                                                        </a>
                                                                        <a href="#" class="bottom_btn extract_btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#attach_document"><i
                                                                                class="fa-solid fa-paperclip"></i> Attach
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h6>

                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft20" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample20">
                                            <div class="accordion-body">
                                                <ul>
                                                    @if ($procedures->isEmpty())
                                                        <li>No data Found.</li>
                                                    @else
                                                        @foreach ($procedures as $procedure)
                                                            <li>

                                                                <div class="appoin_title">

                                                                    <h6>{{ $procedure->procedure_name }}</h6>

                                                                    <p class="text-align:right">
                                                                        {{ \Carbon\Carbon::parse($procedure->created_at)->format('D, d M Y') }}
                                                                    </p>

                                                                </div>
                                                                <div class="appoin_date">

                                                                    <div class="read-more-content">

                                                                        <p>

                                                                            {{ $procedure->entry }}
                                                                        </p>

                                                                    </div>
                                                                    @if (strlen($procedure->entry) >= 50)
                                                                        <button
                                                                            class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                            onclick="toggleReadMore(this)">Read
                                                                            More</button>
                                                                    @endif

                                                                </div>

                                                                <div class="appoin_date">

                                                                    <div class="read-more-content">

                                                                        <p>

                                                                            {{ $procedure->summary }}
                                                                        </p>

                                                                    </div>
                                                                    @if (strlen($procedure->summary) >= 50)
                                                                        <button
                                                                            class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                            onclick="toggleReadMore(this)">Read
                                                                            More</button>
                                                                    @endif

                                                                </div>

                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft21"
                                                aria-expanded="false" aria-controls="collapseleft21"
                                                fdprocessedid="xrcj4o">
                                                <div class="top_title_mm_box">

                                                    <h6 class="action_flex_ghi">
                                                        <div class="enterd_by">
                                                            <span>Order Supportive Service | <span class="enter_span_hivj">
                                                                    Entered By | SAIF ALZAABI</span> </span>
                                                            <div class="right_side_hjkl">
                                                                <span class="date_time_fgu">Sat 21st Oct, 2023, 1:39
                                                                    pm</span>
                                                                <div class="customdotdropdown">
                                                                    <div class="buttondrop_dot">
                                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                    </div>
                                                                    <div class="dropdown-content">
                                                                        <a href="#" class="bottom_btn copy_btn"><i
                                                                                class="fa-solid fa-print"></i> Print
                                                                        </a>
                                                                        <a href="#" class="bottom_btn extract_btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#attach_document"><i
                                                                                class="fa-solid fa-paperclip"></i> Attach
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft21" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample21">
                                            <div class="accordion-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft9"
                                                aria-expanded="false" aria-controls="collapseleft9"
                                                fdprocessedid="qp7m9">
                                                <div class="top_title_mm_box">
                                                    <h6 class="action_flex_ghi">
                                                        <div class="enterd_by">
                                                            <span>Plans/Recommandation | <span class="enter_span_hivj">
                                                                    Entered By | SAIF ALZAABI</span> </span>
                                                            <div class="right_side_hjkl">
                                                                <span class="date_time_fgu">Sat 21st Oct, 2023, 1:39
                                                                    pm</span>
                                                                <div class="customdotdropdown">
                                                                    <div class="buttondrop_dot">
                                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                    </div>
                                                                    <div class="dropdown-content">
                                                                        <a href="#" class="bottom_btn copy_btn"><i
                                                                                class="fa-solid fa-print"></i> Print
                                                                        </a>
                                                                        <a href="#" class="bottom_btn extract_btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#attach_document"><i
                                                                                class="fa-solid fa-paperclip"></i> Attach
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft9" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample9">
                                            <div class="accordion-body">
                                                <div class="appointments___list">

                                                    <ul>
                                                        @if ($patient_future_plan->isEmpty())
                                                            <li>No data Found.</li>
                                                        @else
                                                            @foreach ($patient_future_plan as $patient_future)
                                                                <li>

                                                                    <div class="appoin_title">

                                                                        <h6>{{ $patient_future->plan_text }}</h6>

                                                                    </div>

                                                                    <div class="appoin_date">

                                                                        <p>{{ $patient_future->date }}</p>

                                                                    </div>

                                                                </li>
                                                            @endforeach
                                                        @endif






                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card border_yellow without_icon">
                            <div class="card-body p-0">
                                <div class="accordion acordignleft__small" id="accordionExample2">


                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft14"
                                                aria-expanded="false" aria-controls="collapseleft14"
                                                fdprocessedid="825lrs">
                                                <div class="top_title_mm_box">
                                                    <h6 class="action_flex_ghi">
                                                        <div class="enterd_by">
                                                            <span>Progress Note | <span class="enter_span_hivj"> Entered By
                                                                    | SAIF ALZAABI</span> </span>
                                                            <div class="right_side_hjkl">
                                                                <span class="date_time_fgu">Sat 21st Oct, 2023, 1:39
                                                                    pm</span>
                                                                <div class="customdotdropdown">
                                                                    <div class="buttondrop_dot">
                                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                                    </div>
                                                                    <div class="dropdown-content">
                                                                        <a href="#" class="bottom_btn copy_btn"><i
                                                                                class="fa-solid fa-print"></i> Print
                                                                        </a>
                                                                        <a href="#" class="bottom_btn extract_btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#attach_document"><i
                                                                                class="fa-solid fa-paperclip"></i> Attach
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h6>
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft14" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample14">
                                            <div class="accordion-body">
                                                @php
                                                    $patient_id = decrypt(@$id);
                                                    $procedures_list2 = App\Models\patient\Patient_progress_note::select('created_at', 'voice_recognition', 'appointment_type')
                                                        ->where('patient_id', @$patient_id)
                                                        ->orderBy('id', 'desc')
                                                        ->get();
                                                @endphp
                                                <ul>
                                                    @if ($procedures_list2->isEmpty())
                                                        <li>No data Found.</li>
                                                    @else
                                                        @foreach ($procedures_list2 as $procedure2)
                                                            <li>

                                                                <div class="appoin_title">

                                                                    <h6>{{ $procedure2->appointment_type }}</h6>

                                                                    <p>{{ \Carbon\Carbon::parse($procedure2->created_at)->format('D, d M Y') }}
                                                                    </p>

                                                                </div>

                                                                <div class="appoin_date">

                                                                    <div class="read-more-content">

                                                                        <p>

                                                                            {{ $procedure2->voice_recognition }}
                                                                        </p>

                                                                    </div>
                                                                    @if (strlen($procedure2->voice_recognition) >= 50)
                                                                        <button
                                                                            class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                            onclick="toggleReadMore(this)">Read
                                                                            More</button>
                                                                    @endif

                                                                </div>

                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>




                    </div>
                </div>

            </div>

        </div>

    </div>

















    @push('custom-js')
        <script>
            function toggleReadMore(button) {

                var content = button.previousElementSibling; // Assumes the content is always before the button



                if (content.style.maxHeight) {

                    content.style.maxHeight = null;

                    button.innerHTML = 'Read More';

                } else {

                    content.style.maxHeight = content.scrollHeight + 'px';

                    button.innerHTML = 'Read Less';

                }

            }
        </script>



        <!-- symptons drag and drop -->

        <script>
            var btn = document.querySelector('.add');

            var remove = document.querySelector('.draggable');



            function dragStart(e) {

                this.style.opacity = '0.4';

                dragSrcEl = this;

                e.dataTransfer.effectAllowed = 'move';

                e.dataTransfer.setData('text/html', this.innerHTML);

            };



            function dragEnter(e) {

                this.classList.add('over');

            }



            function dragLeave(e) {

                e.stopPropagation();

                this.classList.remove('over');

            }



            function dragOver(e) {

                e.preventDefault();

                e.dataTransfer.dropEffect = 'move';

                return false;

            }



            function dragDrop(e) {

                if (dragSrcEl != this) {

                    dragSrcEl.innerHTML = this.innerHTML;

                    this.innerHTML = e.dataTransfer.getData('text/html');

                }

                return false;

            }



            function dragEnd(e) {

                var listItens = document.querySelectorAll('.draggable');

                [].forEach.call(listItens, function(item) {

                    item.classList.remove('over');

                });

                this.style.opacity = '1';

            }



            function addEventsDragAndDrop(el) {

                el.addEventListener('dragstart', dragStart, false);

                el.addEventListener('dragenter', dragEnter, false);

                el.addEventListener('dragover', dragOver, false);

                el.addEventListener('dragleave', dragLeave, false);

                el.addEventListener('drop', dragDrop, false);

                el.addEventListener('dragend', dragEnd, false);

            }



            var listItens = document.querySelectorAll('.draggable');

            [].forEach.call(listItens, function(item) {

                addEventsDragAndDrop(item);

            });



            function addNewItem() {

                var newItem = document.querySelector('.input').value;

                if (newItem != '') {

                    document.querySelector('.input').value = '';

                    var li = document.createElement('li');

                    var attr = document.createAttribute('draggable');

                    var ul = document.querySelector('ul');

                    li.className = 'draggable';

                    attr.value = 'true';

                    li.setAttributeNode(attr);

                    li.appendChild(document.createTextNode(newItem));

                    ul.appendChild(li);

                    addEventsDragAndDrop(li);

                }

            }



            btn.addEventListener('click', addNewItem);
        </script>
        <!-- add vital measurement form data -->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#add_measurement').submit(function(e) {
                    e.preventDefault();

                    let isValid = validateFormVital();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.patient_vital') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#add_measurement')[0].reset();
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Vital Measurement Added successfully!',

                                        'success'

                                    )
                                    fetchAndDisplayPatientVital(patient_id);
                                } else {

                                    swal.fire("Error!", "Enter valid Vital Measuremen Details!",
                                        "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormVital() {
                    let isValid = true;
                    // data-bs-dismiss="modal"
                    // Validate sirname
                    let measurement = $('select[name="measurement"]').val();
                    if (measurement === '') {

                        isValid = false;

                        $('#measurementError').text('Please select a measurement');
                        $('select[name="measurement"]').addClass('error');
                    }

                    // Validate Name
                    let date = $('input[name="date"]').val();
                    if (date === '') {
                        isValid = false;

                        $('#dateError').text('date is required');
                        $('input[name="date"]').addClass('error');
                    }



                    // Validate Value
                    let value = $('input[name="value"]').val();
                    if (value === '') {
                        isValid = false;

                        $('#valueError').text('value  is required');
                        $('input[name="value"]').addClass('error');
                    }


                    return isValid;
                }

            });
        </script>
        <!-- Function to fetch and populate patient data -->
        <script>
            function fetchAndDisplayPatientVital(patient_id) {

                // let patient_id = $('input[name="patient_id"]').val();
                $.ajax({
                    url: '{{ route('user.patient_vital_list') }}',
                    type: 'GET',
                    data: {
                        patient_id: patient_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        let patientData = $('#measurement_table_body');
                        patientData.empty();

                        if (data && data.length > 0) {
                            data.forEach(item => {
                                var rowHtml2 = `<tr>
                    <td>${item.date}</td>
                    <td>${item.measurement}</td>
                    <td>${item.value}</td>
                    <td>
                        <a onclick="removeMeasurement(this, ${item.id})" class="trash_btn">
                          <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </td>
                </tr>`;

                                $("#measurement_table_body").append(rowHtml2);
                            });


                        } else {
                            $('#measurement_table_body').html(
                                '<tr><td colspan="4">No measurement found.</td></tr>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Call the function on page load
            $(document).ready(function() {
                let patient_id1 = $('input[name="patient_id"]').val();
                $(".vitals").on('click', function() {

                    fetchAndDisplayPatientVital(patient_id1);
                });

            });
        </script>
        <script>
            function removeMeasurement(that, measurement_id) {
                var label = "Measurement";
                swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to Delete!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#dc3545",
                    confirmButtonText: "Yes, Delete it!",
                    cancelButtonText: "No, Cancel It",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('user.patient_vital_list_delete') }}",
                            data: {
                                "measurement_id": measurement_id,
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: 'json',
                            success: function(result) {
                                swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Measurement Deleted',
                                    timer: 1000
                                });

                                if (that) {
                                    // Delete specific row
                                    $(that).closest('tr').remove();
                                }

                                // window.setTimeout(function(){ } ,1000);
                                // location.reload();
                            },
                            error: function(data) {

                            }
                        });
                    } else {
                        swal.fire("Cancelled", label + " safe :)", "error");
                    }
                });
            }
        </script>


        <!--add patient order imaginary exam form data store into db  -->
        <script>
            $(document).ready(function() {

                $('#order_imaginary_exam_form').submit(function(e) {
                    e.preventDefault();

                    let isValid = validateFormOrderImaginaryExamForm();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.order_imaginary_exam') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#order_imaginary_exam_form')[0].reset();
                                $('#order_imagenairy').modal('hide');
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Order Imaginary Exam Added successfully!',

                                        'success'

                                    )

                                } else {

                                    swal.fire("Error!", "Enter valid Order Imaginary Exam Details!",
                                        "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormOrderImaginaryExamForm() {
                    let isValid = true;
                    // data-bs-dismiss="modal"
                    // Validate test_name
                    let test_name = $('select[name="test_name"]').val();
                    if (test_name === '') {

                        isValid = false;

                        $('#testNameError').text('Please select a Test name');
                        $('select[name="test_name"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>
        <!-- add order lab test form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#order_lab_test_form').submit(function(e) {
                    e.preventDefault();

                    let isValid = validateFormOrderLabTest();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.order_lab_test') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#order_lab_test_form')[0].reset();
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);

                                if (result != '') {

                                    Swal.fire(
    'Success',
    'Order Lab Test Added successfully!',
    'success'
).then((result) => {
    if (result.isConfirmed || result.isDismissed) {
        location.reload(); // Refresh the page
    }
});



                                    fetchAndDisplayPatientOrderLabTest(patient_id);
                                } else {

                                    swal.fire("Error!", "Enter valid Order Lab Test Details!",
                                        "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormOrderLabTest() {
                    let isValid = true;
                    // Validate date
                    let lab_test_names = $('input[name="lab_test_names"]').val();
                    if (lab_test_names === '') {
                        isValid = false;

                        $('#LabTestNamesError').text('Lab Test Names is required');
                        $('input[name="lab_test_names"]').addClass('error');
                    }





                    return isValid;
                }

            });
        </script>
        <!-- Function to fetch and populate patient data -->
        <script>
            function fetchAndDisplayPatientOrderLabTest(patient_id) {

                // let patient_id = $('input[name="patient_id"]').val();
                $.ajax({
                    url: '{{ route('user.order_lab_test_list') }}',
                    type: 'GET',
                    data: {
                        patient_id: patient_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        let patientData = $('#lab_order_list_body');
                        patientData.empty();

                        if (data && data.length > 0) {
                            data.forEach(item => {
                                var rowHtml2 = `<tr>
                    <td>${item.test_name}</td>

                    <td>${item.lab_created_at}</td>
                    <td>
                        <a onclick="removeOrderLabTest(this, ${item.lab_id})" class="trash_btn">
                          <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </td>
                </tr>`;

                                $("#lab_order_list_body").append(rowHtml2);
                            });


                        } else {
                            $('#lab_order_list_body').html(
                                '<tr><td colspan="4">No Order Lab Test found.</td></tr>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Call the function on page click class OrderLabTest
            $(document).ready(function() {
                let patient_id1 = $('input[name="patient_id"]').val();
                $(".OrderLabTest").on('click', function() {

                    fetchAndDisplayPatientOrderLabTest(patient_id1);
                });

            });
        </script>
        <script>
            function removeOrderLabTest(that, lab_id) {
                var label = "Order Lab Test";
                swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to Delete!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#dc3545",
                    confirmButtonText: "Yes, Delete it!",
                    cancelButtonText: "No, Cancel It",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('user.order_lab_test_list_delete') }}",
                            data: {
                                "lab_id": lab_id,
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: 'json',
                            success: function(result) {
                                swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Order Lab Test Deleted',
                                    timer: 1000
                                });

                                if (that) {
                                    // Delete specific row
                                    $(that).closest('tr').remove();
                                }

                                // window.setTimeout(function(){ } ,1000);
                                // location.reload();
                            },
                            error: function(data) {

                            }
                        });
                    } else {
                        swal.fire("Cancelled", label + " safe :)", "error");
                    }
                });
            }
        </script>
        <!-- Add a new invoice item form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#invoice_item_form').submit(function(e) {
                    e.preventDefault();

                    let isValid = validateFormInvoiceItem();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.invoice_item_add') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#invoice_item_form')[0].reset();
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        ' Invoice Item Added successfully!',

                                        'success'

                                    )
                                    fetchAndDisplayPatientInvoiceItem(patient_id);
                                } else {

                                    swal.fire("Error!", "Enter valid Invoice Item Details!",
                                        "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormInvoiceItem() {
                    let isValid = true;
                    // Validate date
                    let date = $('input[name="date"]').val();
                    if (date === '') {
                        isValid = false;

                        $('#DateError').text('Date  is required');
                        $('input[name="date"]').addClass('error');
                    }
                    // Validate item name
                    let item_name = $('input[name="item_name"]').val();
                    if (item_name === '') {
                        isValid = false;

                        ('#frequencyError').text('ItemNname  is required');
                        $('input[name="item_name"]').addClass('error');
                    }
                    // Validate cost
                    let cost = $('input[name="cost"]').val();
                    if (cost === '') {
                        isValid = false;

                        $('#CostError').text('Cost  is required');
                        $('input[name="cost"]').addClass('error');
                    }
                    // Validate code
                    let code = $('input[name="code"]').val();
                    if (code === '') {
                        isValid = false;

                        $('#CodeError').text('Code  is required');
                        $('input[name="code"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>
        <!-- Function to fetch and populate patient data -->
        <script>
            function fetchAndDisplayPatientInvoiceItem(patient_id) {

                // let patient_id = $('input[name="patient_id"]').val();
                $.ajax({
                    url: '{{ route('user.invoice_item_list') }}',
                    type: 'GET',
                    data: {
                        patient_id: patient_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        let patientData = $('#invoice_item_table_body');
                        patientData.empty();

                        if (data && data.length > 0) {
                            data.forEach(item => {
                                var rowHtml2 = `<tr>
                    <td>${item.date}</td>

                    <td>${item.item_name}</td>
                    <td>${item.cost}</td>
                    <td>${item.code}</td>
                    <td>
                        <a onclick="removeInvoiceItem(this, ${item.id})" class="trash_btn">
                          <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </td>
                </tr>`;

                                $("#invoice_item_table_body").append(rowHtml2);
                            });


                        } else {
                            $('#invoice_item_table_body').html(
                                '<tr><td colspan="5">No Invoice Item found.</td></tr>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Call the function on clcik class invoice_item
            $(document).ready(function() {
                let patient_id1 = $('input[name="patient_id"]').val();
                $(".invoice_item").on('click', function() {

                    fetchAndDisplayPatientInvoiceItem(patient_id1);
                });

            });
        </script>
        <script>
            function removeInvoiceItem(that, invoice_id) {
                var label = "Invoice Item";
                swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to Delete!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#dc3545",
                    confirmButtonText: "Yes, Delete it!",
                    cancelButtonText: "No, Cancel It",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('user.invoice_item_list_delete') }}",
                            data: {
                                "invoice_id": invoice_id,
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: 'json',
                            success: function(result) {
                                swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Invoice Item Deleted',
                                    timer: 1000
                                });

                                if (that) {
                                    // Delete specific row
                                    $(that).closest('tr').remove();
                                }

                                // window.setTimeout(function(){ } ,1000);
                                // location.reload();
                            },
                            error: function(data) {

                            }
                        });
                    } else {
                        swal.fire("Cancelled", label + " safe :)", "error");
                    }
                });
            }
        </script>
        <!-- Add New Task on form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#new_task_form').submit(function(e) {
                    e.preventDefault();

                    let isValid = validateFormTask();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.new_task_add') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#new_task_form')[0].reset();
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'New Task Added successfully!',

                                        'success'

                                    )

                                } else {

                                    swal.fire("Error!", "Enter valid New Task Details!", "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormTask() {
                    let isValid = true;
                    // Validate date
                    let date = $('input[name="task_date"]').val();
                    if (date === '') {
                        isValid = false;

                        $('#DateError').text('Date  is required');
                        $('input[name="task_date"]').addClass('error');
                    }
                    // Validate task
                    let task = $('input[name="task_name"]').val();
                    if (task === '') {
                        isValid = false;

                        $('#TaskError').text('Task  is required');
                        $('input[name="task_name"]').addClass('error');
                    }
                    // Validate option_name
                    let option_name = $('select[name="option_name"]').val();
                    if (option_name === '') {
                        isValid = false;

                        $('#NameError').text('Name  is required');
                        $('select[name="option_name"]').addClass('error');
                    }
                    // Validate text
                    let text = $('textarea[name="task_text"]').val();
                    if (text === '') {
                        isValid = false;
                        $('#TextError').text('Text is required');
                        $('textarea[name="task_text"]').addClass('error');
                    }


                    return isValid;
                }

            });
        </script>
        <!-- Add Make an Appointment form data into database-->
        <script>
            $(document).ready(function() {
                $('#book_app').prop('disabled', true);
                $('#appoin_btn_form').click(function(event) {
                    event.preventDefault();
                    $('#book_app').prop('disabled', false);
                });


                let patient_id = $('input[name="patient_id"]').val();
                $('#appointment_form').submit(function(e) {
                    e.preventDefault();

                    let isValid = validateFormAppointment();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.appointment_add') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#appointment_form')[0].reset();
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Appointment Booked successfully!',

                                        'success'

                                    )
                                    location.reload();
                                } else {

                                    swal.fire("Error!", "Enter valid Appointment Details!",
                                        "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormAppointment() {
                    let isValid = true;
                    // Validate date
                    let date = $('input[name="appointment_date"]').val();
                    if (date === '') {
                        isValid = false;

                        $('#appointment_dateError').text('Date  is required');
                        $('input[name="appointment_date"]').addClass('error');
                    }
                    // Validate appointment_type
                    let appointment_type = $('select[name="appointment_type"]').val();
                    if (appointment_type === '') {
                        isValid = false;

                        $('#appointment_typeError').text('Appointment Type  is required');
                        $('select[name="appointment_type"]').addClass('error');
                    }
                    // Validate location
                    let location = $('select[name="location"]').val();
                    if (location === '') {
                        isValid = false;

                        $('#locationError').text('location   is required');
                        $('select[name="location"]').addClass('error');
                    }
                    // Validate start_date
                    let start_date = $('input[name="start_date"]').val();
                    if (start_date === '') {
                        isValid = false;

                        $('#start_dateError').text('Start Date  is required');
                        $('input[name="start_date"]').addClass('error');
                    }
                    // Validate start_time
                    let start_time = $('input[name="start_time"]').val();
                    if (start_time === '') {
                        isValid = false;

                        $('#start_timeError').text('Start Date  is required');
                        $('input[name="start_time"]').addClass('error');
                    }
                    // Validate end_date
                    let end_date = $('input[name="end_date"]').val();
                    if (end_date === '') {
                        isValid = false;

                        $('#end_dateError').text('End Date  is required');
                        $('input[name="end_date"]').addClass('error');
                    }
                    // Validate end_time
                    let end_time = $('input[name="end_time"]').val();
                    if (end_time === '') {
                        isValid = false;

                        $('#end_timeError').text('End Time is required');
                        $('input[name="end_time"]').addClass('error');
                    }
                    // Validate app_cost
                    let app_cost = $('input[name="app_cost"]').val();
                    if (app_cost === '') {
                        isValid = false;

                        $('#app_costError').text('Cost  is required');
                        $('input[name="app_cost"]').addClass('error');
                    }
                    // Validate app_code
                    // let app_code = $('input[name="app_code"]').val();
                    // if (app_code === '') {
                    //     isValid = false;

                    //     $('#app_codeError').text('Code  is required');
                    //     $('input[name="app_code"]').addClass('error');
                    // }
                    // Validate clinician
                    let clinician = $('select[name="clinician"]').val();
                    if (clinician === '') {
                        isValid = false;

                        $('#clinicianError').text('Clinician   is required');
                        $('select[name="clinician"]').addClass('error');
                    }


                    return isValid;
                }

            });
        </script>
        <!-- Add Start a Video call form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#video_call_form').submit(function(e) {
                    e.preventDefault();

                    let isValid = validateFormVideoCall();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.video_call_add') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#video_call_form')[0].reset();
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Video Call Added successfully!',

                                        'success'

                                    )
                                    location.reload();
                                } else {

                                    swal.fire("Error!", "Enter valid Video Call Details!", "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormVideoCall() {
                    let isValid = true;
                    // Validate date
                    let date = $('input[name="meeting_date"]').val();
                    if (date === '') {
                        isValid = false;

                        $('#meeting_dateError').text('Date  is required');
                        $('input[name="meeting_date"]').addClass('error');
                    }
                    //  // Validate meeting_url
                    let meeting_url = $('input[name="meeting_url"]').val();
                    if (meeting_url === '') {
                        isValid = false;

                        $('#meeting_urlError').text('Meeting URL  is required');
                        $('input[name="meeting_url"]').addClass('error');
                    }



                    return isValid;
                }

            });
        </script>

        <!-- Add Drugs / Current Meds form data into database-->
        <script>
            $(document).ready(function() {
                $('.secondary_btn').click(function(e) {
                    e.preventDefault();
                    location.reload();
                    $('#medicine_add_edit').modal('hide');

                });

                $('#medicine_add_edit').on('hidden.bs.modal', function(e) {
                    // location.reload();
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#drug_from').submit(function(e) { 
                    e.preventDefault();

                    let isValid = validateFormDrug();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.drug_add') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#drug_from')[0].reset();
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        ' Drug Item Added successfully!',

                                        'success'

                                    )
                                    fetchAndDisplayPatientDrugList(patient_id);
                                } else {

                                    swal.fire("Error!", "Enter valid Drug Item Details!", "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormDrug() {
                    let isValid = true;
                    // Validate drug_name
                    let drug_name = $('input[name="drug_name"]').val();
                    if (drug_name === '') {
                        isValid = false;

                        $('#drug_nameError').text('Drug Name  is required');
                        $('input[name="drug_name"]').addClass('error');
                    }
                    // Validate frequency
                    let frequency = $('input[name="frequency"]').val();
                    if (frequency === '') {
                        isValid = false;

                        $('#frequencyError').text('Frequency  is required');
                        $('input[name="frequency"]').addClass('error');
                    }
                    // Validate today_date
                    let today_date = $('input[name="today_date"]').val();
                    if (today_date === '') {
                        isValid = false;

                        $('#today_dateError').text('Today Date  is required');
                        $('input[name="today_date"]').addClass('error');
                    }
                    // Validate duration
                    let duration = $('input[name="duration"]').val();
                    if (duration === '') {
                        isValid = false;

                        $('#durationError').text('Duration  is required');
                        $('input[name="duration"]').addClass('error');
                    }
                    // Check if the checkbox is checked
                    let isChecked = $('#is_stopped').is(':checked');
                    if (!isChecked) {


                        // Validate stopped_date
                        let stopped_date = $('input[name="stopped_date"]').val();
                        if (stopped_date === '') {
                            isValid = false;

                            $('#stopped_dateError').text('Stopped Date  is required');
                            $('input[name="stopped_date"]').addClass('error');
                        }
                    }
                    // Validate drug_code
                    // let drug_code = $('input[name="drug_code"]').val();
                    // if (drug_code === '') {
                    //   isValid = false;

                    //   $('#drug_codeError').text('code  is required');
                    //   $('input[name="drug_code"]').addClass('error');
                    // }

                    return isValid;
                }

            });
        </script>
        <!-- Function to fetch and populate patient data -->
        <script>
            function fetchAndDisplayPatientDrugList(patient_id) {

                $.ajax({
                    url: '{{ route('user.drug_item_list') }}',
                    type: 'GET',
                    data: {
                        patient_id: patient_id
                    },
                    dataType: 'json',
                    success: function(response) 
                    {
                        let patientData = $('#drug_table_body');
                        patientData.empty();  
                        if (response && response.patient_current_med && response.patient_current_med.length > 0) {
                            response.patient_current_med.forEach(item => {
                                var rowHtml2 = `
                                    <tr>
                                        <td>${item.drug_name}</td>
                                        <td>${item.frequency}</td>
                                        <td>${item.today_date}</td>
                                        <td>${item.duration}</td>
                                        <td>${item.stopped}</td>
                                        <td>${item.stopped_date}</td>
                                        <td>${item.code}</td>
                                        <td>
                                            <a onclick="removeDrugItem(this, ${item.id})" class="trash_btn">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>`;
                                patientData.append(rowHtml2);
                            });
                        }
                        else {
                            patientData.html('<tr><td colspan="8">No Drug nhh Item found.</td></tr>');
                        }
                    },
                            error: function(xhr, status, error) {
                                console.error('Error fetching data:', error);
                            }
                        });
            }

            // Call the function on clcik class invoice_item
            $(document).ready(function() {
                let patient_id1 = $('input[name="patient_id"]').val();
                $(".drug_add").on('click', function() {

                    fetchAndDisplayPatientDrugList(patient_id1);
                });

            });
        </script>
        <script>
            function removeDrugItem(that, drug_id) {
                var label = "Drug Item";
                swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to Delete!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#dc3545",
                    confirmButtonText: "Yes, Delete it!",
                    cancelButtonText: "No, Cancel It",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('user.drug_item_list_delete') }}",
                            data: {
                                "drug_id": drug_id,
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: 'json',
                            success: function(result) {
                                swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Drug Item Deleted',
                                    timer: 1000
                                });

                                if (that) {
                                    // Delete specific row
                                    $(that).closest('tr').remove();
                                }

                                // window.setTimeout(function(){ } ,1000);
                                // location.reload();
                            },
                            error: function(data) {

                            }
                        });
                    } else {
                        swal.fire("Cancelled", label + " safe :)", "error");
                    }
                });
            }
        </script>
        <!-- Add Allergy form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#allergy_form').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateFormAllergy();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.allergy_add') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#allergy_form')[0].reset();
                                // $('#add_patient').modal('hide');

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Allergy Added successfully!',

                                        'success'

                                    )
                                    // Call the function every second
                                    setInterval(function() {
                                        $('[id*="Error"]').text('');
                                    }, 1000);
                                    location.reload();
                                } else {

                                    swal.fire("Error!", "Enter valid Allergy Details!", "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormAllergy() {
                    let isValid = true;
                    // Validate allergy
                    let allergy = $('input[name="allergy"]').val();
                    if (allergy === '') {
                        isValid = false;

                        $('#allergy_nameError').text('Allergy Name  is required');
                        $('input[name="allergy"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>
        <!-- Add  Symptoms form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#symptom_form').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateFormSymptom();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.symptom_add') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#symptom_form')[0].reset();
                                // $('#add_patient').modal('hide');

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Symptom Added successfully!',

                                        'success'

                                    )
                                    // Call the function every second
                                    setInterval(function() {
                                        $('[id*="Error"]').text('');
                                    }, 1000);
                                } else {

                                    swal.fire("Error!", "Enter valid Symptom Details!", "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormSymptom() {
                    let isValid = true;
                    // Validate symptom_name
                    let symptom_name = $('input[name="symptom_name"]').val();
                    if (symptom_name === '') {
                        isValid = false;

                        $('#symptom_nameError').text('Symptom Name  is required');
                        $('input[name="symptom_name"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>
        <!-- Add  Clinical Exam form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#clinical_exam_form').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateFormClinicalExam();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.clinical_exam_add') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#clinical_exam_form')[0].reset();
                                // $('#add_patient').modal('hide');
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);
                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Clinical Exam Added successfully!',

                                        'success'

                                    )

                                } else {

                                    swal.fire("Error!", "Enter valid Clinical Exam Details!",
                                        "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormClinicalExam() {
                    let isValid = true;
                    // Validate text
                    let text = $('textarea[name="write_text"]').val();
                    if (text === '') {
                        isValid = false;
                        $('#write_textError').text('Text is required');
                        $('textarea[name="write_text"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>
        <!-- Add  Future Plans form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#future_plan_form').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateFormFuturePlan();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.future_plan_add') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#future_plan_form')[0].reset();
                                // $('#add_patient').modal('hide');

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Future Plans Added successfully!',

                                        'success'

                                    )
                                    // Call the function every second
                                    setInterval(function() {
                                        $('[id*="Error"]').text('');
                                    }, 1000);
                                    location.reload();
                                } else {

                                    swal.fire("Error!", "Enter valid Future Plans Details!",
                                        "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormFuturePlan() {
                    let isValid = true;
                    // Validate future_date
                    let future_date = $('input[name="future_date"]').val();
                    if (future_date === '') {
                        isValid = false;

                        $('#future_dateError').text(' Date  is required');
                        $('input[name="future_date"]').addClass('error');
                    }
                    // Validate text
                    let text = $('textarea[name="future_write"]').val();
                    if (text === '') {
                        isValid = false;
                        $('#future_writeError').text('Write is required');
                        $('textarea[name="future_write"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>
        <!-- Add  Special Notes form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#special_note_form').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateFormSpecialNote();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.special_note_add') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#special_note_form')[0].reset();
                                // $('#add_patient').modal('hide');

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Special Note Added successfully!',

                                        'success'

                                    )
                                    // Call the function every second
                                    setInterval(function() {
                                        $('[id*="Error"]').text('');
                                    }, 1000);
                                } else {

                                    swal.fire("Error!", "Enter valid Special Note Details!",
                                        "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormSpecialNote() {
                    let isValid = true;

                    // Validate text
                    let text = $('textarea[name="note_text"]').val();
                    if (text === '') {
                        isValid = false;
                        $('#note_textError').text('Write Special Notes is required');
                        $('textarea[name="note_text"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>
        <!-- Add  Past Medical History form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#past_medical_history_form').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateFormPastMedicalHistory();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.past_medical_histories_add') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#past_medical_history_form')[0].reset();
                                // $('#add_patient').modal('hide');

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Past Medical History Added successfully!',

                                        'success'

                                    )
                                    location.reload();
                                    // Call the function every second
                                    setInterval(function() {
                                        $('[id*="Error"]').text('');
                                    }, 1000);


                                } else {

                                    swal.fire("Error!", "Enter valid Past Medical History Details!",
                                        "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormPastMedicalHistory() {
                    let isValid = true;
                    // Validate diseases_name
                    let diseases_name = $('input[name="diseases_name"]').val();
                    if (diseases_name === '') {
                        isValid = false;
                        $('#diseases_nameError').text('Diseases Name is required');
                        $('input[name="diseases_name"]').addClass('error');
                    }
                    // Validate describe
                    let describe = $('textarea[name="describe"]').val();
                    if (describe === '') {
                        isValid = false;
                        $('#describeError').text('Describe is required');
                        $('textarea[name="describe"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>
        <!-- Add  Past Surgical History form data into database-->
        <script>
            $(document).ready(function() {

                let patient_id = $('input[name="patient_id"]').val();
                $('#past_surgical_history_form').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateFormPastMedicalHistory();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.past_surgical_history_add') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#past_surgical_history_form')[0].reset();
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Past Surgical History Added successfully!',

                                        'success'

                                    )
                                    location.reload();
                                } else {

                                    swal.fire("Error!",
                                        "Enter valid Past Surgical History Details!", "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormPastMedicalHistory() {
                    let isValid = true;
                    // Validate surgery_name
                    let surgery_name = $('input[name="surgery_name"]').val();
                    if (surgery_name === '') {
                        isValid = false;
                        $('#surgery_nameError').text('Surgery Name is required');
                        $('input[name="surgery_name"]').addClass('error');
                    }
                    // Validate surgery_describe
                    let surgery_describe = $('textarea[name="surgery_describe"]').val();
                    if (surgery_describe === '') {
                        isValid = false;
                        $('#surgery_describeError').text('Describe is required');
                        $('textarea[name="surgery_describe"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>
        <!-- Add  Add or Edit Insurer form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#edit_insurer_form').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateFormEditInsurer();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.insurer_add') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {


                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Insurer  Updated successfully!',

                                        'success'

                                    )
                                    fetchAndDisplayPatientInsurerData(patient_id);
                                    // Call the function every second
                                    setInterval(function() {
                                        $('[id*="Error"]').text('');
                                    }, 1000);
                                } else {

                                    swal.fire("Error!", "Enter valid Insurer  Details!", "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormEditInsurer() {
                    let isValid = true;
                    // Validate insurer_name
                    let insurer_name = $('input[name="insurer_name"]').val();
                    if (insurer_name === '') {
                        isValid = false;
                        $('#insurer_nameError').text('Insurer Name is required');
                        $('input[name="insurer_name"]').addClass('error');
                    }
                    // Validate insurer_number
                    let insurer_number = $('input[name="insurer_number"]').val();
                    if (insurer_number === '') {
                        isValid = false;
                        $('#insurer_numberError').text('Insurer Number is required');
                        $('input[name="insurer_number"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>
        <!-- Function to fetch and populate patient data -->
        <script>
            function fetchAndDisplayPatientInsurerData(patient_id) {

                // let patient_id = $('input[name="patient_id"]').val();
                $.ajax({
                    url: '{{ route('user.insurer_list') }}',
                    type: 'GET',
                    data: {
                        patient_id: patient_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data && Object.keys(data).length > 0) {
                            $('.insurance_dt').html(data.insurer_name + ' - ' + '<span>' + data.insurance_number +
                                '</span>');
                            $('.insurer_name').val(data.insurer_name);
                            $('.insurer_number').val(data.insurance_number);
                        } else {
                            $('.insurance_dt').text('');
                            $('.insurance_dt span').text('');
                            $('.insurer_name').val('');
                            $('.insurer_number').val('');
                        }

                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Call the function on clcik class add_insurer
            $(document).ready(function() {
                let patient_id1 = $('input[name="patient_id"]').val();
                $(".add_insurer").on('click', function() {

                    fetchAndDisplayPatientInsurerData(patient_id1);
                });

            });
        </script>
        <!-- Add prescription_day_form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#prescription_day_form').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateFormPrescription();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.add_patient_prescription') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#prescription_day_form')[0].reset();
                                // $('#add_patient').modal('hide');

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Prescription day Added successfully!',

                                        'success'

                                    )
                                    // Call the function every second
                                    setInterval(function() {
                                        $('[id*="Error"]').text('');
                                    }, 1000);
                                    location.reload();
                                } else {

                                    swal.fire("Error!", "Enter valid Prescription day Details!",
                                        "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormPrescription() {
                    let isValid = true;
                    // Validate prescription
                    let prescription = $('textarea[name="prescription"]').val();
                    if (prescription === '') {
                        isValid = false;

                        $('#prescriptionError').text('prescription   is required');
                        $('textarea[name="prescription"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>

        <!-- Add  Order Special Invistigation form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#order_supportive_surface_form').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateFormInvistigation();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.add_patient_invistigation') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#order_supportive_surface_form')[0].reset();
                                // $('#add_patient').modal('hide');

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Order Special Invistigation Added successfully!',

                                        'success'

                                    )
                                    location.reload();
                                    // Call the function every second
                                    setInterval(function() {
                                        $('[id*="Error"]').text('');
                                    }, 1000);
                                } else {

                                    swal.fire("Error!",
                                        "Enter Order Special Invistigation Details!", "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormInvistigation() {
                    let isValid = true;

                    // Validate invistigation
                    let invistigation = $('textarea[name="invistigation"]').val();
                    if (invistigation === '') {
                        isValid = false;

                        $('#invistigationError').text('Invistigation   is required');
                        $('textarea[name="invistigation"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>
        <!-- Add Order Procedure form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#order_procedure_form').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateFormProcedure();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.add_patient_procedure') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#order_procedure_form')[0].reset();
                                // $('#add_patient').modal('hide');

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Order Procedure Added successfully!',

                                        'success'

                                    )
                                    // Call the function every second
                                    setInterval(function() {
                                        $('[id*="Error"]').text('');
                                    }, 1000);
                                    location.reload();
                                } else {

                                    swal.fire("Error!", "Enter Order Procedure Details!", "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormProcedure() {
                    let isValid = true;

                    // Validate entry
                    let entry = $('textarea[name="entry"]').val();
                    if (entry === '') {
                        isValid = false;

                        $('#entryError').text('Entry   is required');
                        $('textarea[name="entry"]').addClass('error');
                    }
                    // Validate summary
                    let summary = $('textarea[name="summary"]').val();
                    if (summary === '') {
                        isValid = false;

                        $('#summaryError').text('Summary   is required');
                        $('textarea[name="summary"]').addClass('error');
                    }
                    // Validate procedure
                    let procedure = $('select[name="procedure"]').val();
                    if (procedure === '') {
                        isValid = false;

                        $('#procedureError').text('Procedure   is required');
                        $('select[name="procedure"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>


        <!-- Add a new progress notes form data into database-->
        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#progress_note_form').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateFormProgressNote();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.patient_progress_list_save') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#progress_note_form')[0].reset();
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        ' Progress Note Added successfully!',

                                        'success'

                                    )
                                    fetchAndDisplayPatientProgressNote(patient_id);
                                    location.reload();
                                } else {

                                    swal.fire("Error!", "Enter valid Progress Note Details!",
                                        "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormProgressNote() {
                    let isValid = true;
                    // Validate note_contents
                    let note_contents = $('select[name="note_contents"]').val();
                    if (note_contents === '') {
                        isValid = false;

                        $('#note_contentsError').text('Note Content  is required');
                        $('select[name="note_contents"]').addClass('error');
                    }
                    // Validate new_text
                    // let new_text = $('input[name="new_text"]').val();
                    // if (new_text === '') {
                    //   isValid = false;

                    //   ('#new_textError').text('New context  is required');
                    //   $('input[name="new_text"]').addClass('error');
                    // }
                    // Validate prog_voice_recognition
                    let prog_voice_recognition = $('textarea[name="prog_voice_recognition"]').val();
                    if (prog_voice_recognition === '') {
                        isValid = false;

                        $('#prog_voice_recognitionError').text('voice_recognition  is required');
                        $('textarea[name="prog_voice_recognition"]').addClass('error');
                    }
                    // Validate prog_day
                    // let prog_day = $('input[name="prog_day"]').val();
                    // if (prog_day === '') {
                    //   isValid = false;

                    //   $('#prog_dayError').text('Day  is required');
                    //   $('input[name="prog_day"]').addClass('error');
                    // }
                    // Validate date
                    //  let date = $('input[name="date"]').val();
                    // if (date === '') {
                    //   isValid = false;

                    //   $('#dateError').text('Date  is required');
                    //   $('input[name="date"]').addClass('error');
                    // }
                    // Validate prog_email
                    //  let prog_email = $('input[name="prog_email"]').val();
                    // if (prog_email === '') {
                    //   isValid = false;

                    //   $('#prog_emailError').text('email  is required');
                    //   $('input[name="prog_email"]').addClass('error');
                    // }

                    return isValid;
                }

            });
        </script>
        <!-- Function to fetch and populate patient data -->
        <script>
            function fetchAndDisplayPatientProgressNote(patient_id) {

                // let patient_id = $('input[name="patient_id"]').val();
                $.ajax({
                    url: '{{ route('user.patient_progress_list') }}',
                    type: 'GET',
                    data: {
                        patient_id: patient_id
                    },
                    dataType: 'json',
                    success: function(data) {

                        if (data && data.hasOwnProperty('note_contents')) {
                            let cannedNotes = data.note_contents;
                            cannedNotes.forEach(function(note) {
                                let newOption = $('<option>', {
                                    value: note.id,
                                    text: note.note_name
                                });


                                let optionExists = $('#note_contents option[value="' + note.id + '"]')
                                    .length > 0;

                                if (!optionExists) {

                                    $('#note_contents').append(newOption);
                                } else {

                                    $('#note_contents option[value="' + note.id + '"]').text(note
                                        .note_name);
                                }
                            });


                        }
                        if (data && data.hasOwnProperty('canned_texts')) {
                            let canned_texts = data.note_contents.canned_texts ? data.note_contents.canned_texts :
                                '';
                            let id = data.canned_texts.id ? data.canned_texts.id : '';
                            let canned_textsobj = data.canned_texts;
                            canned_textsobj.forEach(function(note) {
                                let newOption = $('<option>', {
                                    value: note.id,
                                    text: note.canned_name
                                });


                                let optionExists = $('#canned_texts option[value="' + note.id + '"]')
                                    .length > 0;

                                if (!optionExists) {

                                    $('#canned_texts').append(newOption);
                                } else {

                                    $('#canned_texts option[value="' + note.id + '"]').text(note
                                        .canned_name);
                                }
                            });
                        }


                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Call the function on clcik class proress_notes
            $(document).ready(function() {
                let patient_id1 = $('input[name="patient_id"]').val();
                $(".proress_notes").on('click', function() {

                    fetchAndDisplayPatientProgressNote(patient_id1);
                });

            });
        </script>

        {{-- patient predefine content notes listing here --}}

        <!-- Function to fetch and populate patient data -->
        <script>
            function fetchAndDisplayPredefineNoteList(patient_id, canned_texts, note_contents) {

                // let patient_id = $('input[name="patient_id"]').val();
                $.ajax({
                    url: '{{ route('user.patient_progress_predefine_notes_list') }}',
                    type: 'GET',
                    data: {
                        patient_id: patient_id,
                        canned_texts_id: canned_texts,
                        note_contents_id: note_contents
                    },
                    dataType: 'json',
                    success: function(data) {
                        let patientData = $('#voiceInput');

                        if (data && data.describe && data.describe.describe.length > 0) {
                            patientData.val(data.describe.describe);
                        } else {
                            patientData.val('');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Call the function on clcik class invoice_item
            $(document).ready(function() {
                let patient_id1 = $('input[name="patient_id"]').val();

                $("#automated_clinic_note").on('click', function() {
                    let isValid = validatePatientPredefineNote();
                    if (isValid) {
                        let canned_texts = $('#canned_texts').val();
                        let note_contents = $('#note_contents').val();
                        fetchAndDisplayPredefineNoteList(patient_id1, canned_texts, note_contents);
                    }
                });

                function validatePatientPredefineNote() {
                    let isValid = true;
                    // Validate canned_texts
                    let canned_texts = $('select[name="canned_texts"]').val();
                    if (canned_texts === '') {
                        isValid = false;

                        $('#canned_textsError').text('Field  is required');
                        $('select[name="canned_texts"]').addClass('error');
                    }
                    // Validate note_contents
                    let note_contents = $('select[name="note_contents"]').val();
                    if (note_contents === '') {
                        isValid = false;

                        $('#note_contentsError').text('Field  is required');
                        $('select[name="note_contents"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>


        <!-- AddRemoveDiagnosis form data into database-->
        <script>
            $(document).ready(function() {
                $('.secondary_btn').click(function(e) {
                    e.preventDefault();
                    location.reload();
                    $('#medicine_add_edit').modal('hide');

                });

                $('#medicine_add_edit').on('hidden.bs.modal', function(e) {
                    // location.reload();
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#AddRemoveDiagnosis').submit(function(e) {
                    e.preventDefault();

                    let isValid = validateFormDiagnosis();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.drug_add') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#AddRemoveDiagnosis')[0].reset();
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        ' Diagnosis Added Successfully!',

                                        'success'

                                    )
                                    fetchAndDisplayAddRemoveDiagnosis(patient_id);
                                } else {

                                    swal.fire("Error!", "Enter valid Diagnosis Details!", "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormDiagnosis() {
                    let isValid = true;
                    // Validate drug_name
                    let drug_name = $('input[name="drug_name"]').val();
                    if (drug_name === '') {
                        isValid = false;

                        $('#drug_nameError').text('Drug Name  is required');
                        $('input[name="drug_name"]').addClass('error');
                    }
                    // Validate frequency
                    let frequency = $('input[name="frequency"]').val();
                    if (frequency === '') {
                        isValid = false;

                        $('#frequencyError').text('Frequency  is required');
                        $('input[name="frequency"]').addClass('error');
                    }
                    // Validate today_date
                    let today_date = $('input[name="today_date"]').val();
                    if (today_date === '') {
                        isValid = false;

                        $('#today_dateError').text('Today Date  is required');
                        $('input[name="today_date"]').addClass('error');
                    }
                    // Validate duration
                    let duration = $('input[name="duration"]').val();
                    if (duration === '') {
                        isValid = false;

                        $('#durationError').text('Duration  is required');
                        $('input[name="duration"]').addClass('error');
                    }
                    // Check if the checkbox is checked
                    let isChecked = $('#is_stopped').is(':checked');
                    if (!isChecked) {


                        // Validate stopped_date
                        let stopped_date = $('input[name="stopped_date"]').val();
                        if (stopped_date === '') {
                            isValid = false;

                            $('#stopped_dateError').text('Stopped Date  is required');
                            $('input[name="stopped_date"]').addClass('error');
                        }
                    }
                    // Validate drug_code
                    // let drug_code = $('input[name="drug_code"]').val();
                    // if (drug_code === '') {
                    //   isValid = false;

                    //   $('#drug_codeError').text('code  is required');
                    //   $('input[name="drug_code"]').addClass('error');
                    // }

                    return isValid;
                }

            });
        </script>
        <!-- Function to fetch and populate patient data ProstateArteryEmbolizationEligibilityFormDiagnosisList-->
        <script>
            function fetchAndDisplayAddRemoveDiagnosis(patient_id) {

                // let patient_id = $('input[name="patient_id"]').val();
                $.ajax({
                    url: "{{ route('user.ProstateArteryEmbolizationEligibilityFormDiagnosisList') }}",
                    type: 'GET',
                    data: {
                        patient_id: patient_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        let patientData = $('#add_data_diagnosis');
                        patientData.empty();

                        if (data && data.length > 0) {
                            data.forEach(item => {
                                var rowHtml2 = `<tr>
                                <td>${item.drug_name}</td>

                                <td>${item.frequency}</td>
                                <td>${item.today_date}</td>
                                <td>${item.duration}</td>
                                <td>${item.stopped}</td>
                                <td>${item.stopped_date}</td>
                                <td>${item.code}</td>
                                <td>
                                    <a onclick="removeDiagnosisItem(this, ${item.id})" class="trash_btn">
                                    <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>`;

                                $("#add_data_diagnosis").append(rowHtml2);
                            });


                        } else {
                            $('#add_data_diagnosis').html('<tr><td colspan="8">No Diagnosis found.</td></tr>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Call the function on clcik class invoice_item
            $(document).ready(function() {
                let patient_id1 = $('input[name="patient_id"]').val();
                $("#diagnosis_key").on('click', function() {

                    fetchAndDisplayAddRemoveDiagnosis(patient_id1);
                });

            });
        </script>
        <script>
            function removeDiagnosisItem(that, drug_id) {
                var label = "Diagnosis";
                swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to Delete!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#dc3545",
                    confirmButtonText: "Yes, Delete it!",
                    cancelButtonText: "No, Cancel It",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('user.drug_item_list_delete') }}",
                            data: {
                                "drug_id": drug_id,
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: 'json',
                            success: function(result) {
                                swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Diagnosis Item Deleted',
                                    timer: 1000
                                });

                                if (that) {
                                    // Delete specific row
                                    $(that).closest('tr').remove();
                                }

                                // window.setTimeout(function(){ } ,1000);
                                // location.reload();
                            },
                            error: function(data) {

                            }
                        });
                    } else {
                        swal.fire("Cancelled", label + " safe :)", "error");
                    }
                });
            }
        </script>
    @endpush

@endsection

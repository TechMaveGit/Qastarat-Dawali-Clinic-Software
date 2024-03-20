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

                                {{-- <a href="{{ route('user.patient',['id'=>@$id]) }}" class="action_btn_tooltip vitals" data-bs-toggle="offcanvas" data-bs-target="#add_vitals"

              aria-controls="offcanvasBottom" >

              <iconify-icon icon="carbon:temperature-max" width="20"></iconify-icon>

              <span class="toolTip">Enter Vitals</span>

              </a> --}}


                                {{-- <a href="#" class="action_btn_tooltip order_imaginary_exam" data-bs-toggle="modal" data-bs-target="#order_imagenairy"

                aria-controls="offcanvasBottom">

                <!-- <iconify-icon icon="akar-icons:thunder" width="20"></iconify-icon> -->

                <iconify-icon icon="mdi:x-ray-box-outline" width="24"></iconify-icon>

                <span class="toolTip">Order Imaginary Exam</span>

              </a> --}}

                                {{-- <a href="#" class="action_btn_tooltip OrderLabTest" data-bs-toggle="modal" data-bs-target="#lab_test">

                <iconify-icon icon="entypo:lab-flask" width="20"></iconify-icon>

                <span class="toolTip">Order Lab Test</span>

              </a> --}}

                                <!-- <a href="#" class="action_btn_tooltip " data-bs-toggle="modal" data-bs-target="#consent_form">

                                            <iconify-icon icon="fluent:form-multiple-48-regular" width="22"></iconify-icon>

                                            <span class="toolTip">Consent Forms</span>

                                          </a> -->


                                {{-- <a href="#" class="action_btn_tooltip">

                <iconify-icon icon="fluent:form-multiple-48-regular" width="22"></iconify-icon>

                <span class="toolTip">Consent Forms</span>

              </a> --}}

                                <!-- <a href="#" class="action_btn_tooltip" data-bs-toggle="offcanvas" data-bs-target="#diagnosis" aria-controls="offcanvasBottom">

                                                           <iconify-icon icon="maki:doctor" width="20"></iconify-icon>

                                                            <span class="toolTip">Add a diagnosis</span>

                                                        </a>

                                                        <a href="#" class="action_btn_tooltip" data-bs-toggle="offcanvas" data-bs-target="#medicine_add_edit" aria-controls="offcanvasBottom">

                                                        <iconify-icon icon="solar:document-medicine-linear" width="20"></iconify-icon>

                                                            <span class="toolTip">Add/Edit Drugs</span>

                                                        </a> -->

                                {{-- <a href="#" class="action_btn_tooltip invoice_item" data-bs-toggle="modal" data-bs-target="#invoice_add">

                <iconify-icon icon="la:file-invoice-dollar" width="20"></iconify-icon>

                <span class="toolTip">Add an Invoice Item</span>

              </a> --}}

                                <!-- <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#followup_note">

                                            <iconify-icon icon="la:edit" width="20"></iconify-icon>

                                            <span class="toolTip">Follow Up Notes</span>

                                          </a> -->

                                <!-- <a href="patient.php" class="action_btn_tooltip" data-bs-toggle="offcanvas" data-bs-target="#new_letter"

                                            aria-controls="offcanvasBottom">

                                            <iconify-icon icon="la:edit" width="20"></iconify-icon>

                                            <span class="toolTip">Write a New letter</span>

                                          </a> -->

                                {{-- <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#new_task">

                <iconify-icon icon="mdi:bell-outline" width="20"></iconify-icon>

                <span class="toolTip">Add a task (reminder)</span>

              </a> --}}


                                <!-- <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#discharge_instruction">

                                          <iconify-icon icon="healthicons:discharge" width="26"></iconify-icon>

                                            <span class="toolTip">Discharge Instruction</span>

                                          </a> -->



                                <!-- <a href="patient.php" class="action_btn_tooltip" data-bs-toggle="offcanvas" data-bs-target="#refer_patient" aria-controls="offcanvasBottom">

                                                        <iconify-icon icon="codicon:references" width="20"></iconify-icon>

                                                            <span class="toolTip">Refer this patient</span>

                                                        </a> -->

                                {{-- <a href="#" class="action_btn_tooltip">

                <iconify-icon icon="uit:print" width="24"></iconify-icon>

                <span class="toolTip">Print all notes</span>

              </a> --}}




                                <a href="#" class="action_btn_tooltip">
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

                            <!-- <div class="view_record_icon">

                                          <a href="#" class="action_btn_tooltip box_shadow">

                                            <iconify-icon icon="entypo:lab-flask" width="20"></iconify-icon>

                                            <span class="toolTip">Order Blood Tests</span>

                                          </a>

                                          <a href="#" class="action_btn_tooltip" data-bs-toggle="offcanvas" data-bs-target="#add_new_note"

                                            aria-controls="offcanvasBottom">

                                            <iconify-icon icon="simple-line-icons:plus" width="20"></iconify-icon>

                                            <span class="toolTip">Add a New Note</span>

                                          </a>





                                        </div> -->

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="left_side_bxx_">





                        <div class="left_side">


                            <input type="hidden" name="patient_id" value="{{ @$id }}" />
                            <div class="profile_img">

                                <img src="{{ asset('public/assets/patient_profile/' . $patient->patient_profile_img) }}"
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
                                        if (!empty(@$patient->birth_date)) {
                                            $birthDate = \Carbon\Carbon::createFromFormat('d M, Y', @$patient->birth_date);
                                            $patientBirthDate = $birthDate->diffInYears(\Carbon\Carbon::now());
                                        } else {
                                            $patientBirthDate = null;
                                        }

                                    @endphp
                                    <p class="patient_age__">{{ $patientBirthDate }} Years , <span
                                            class="patient_id__">{{ @$patient->patient_id }}</span></p>

                                    <p class="insurance_dt">{{ $insurer != null ? $insurer->insurer_name : '' }} -
                                        <span>{{ $insurer ? $insurer->insurance_number : '' }}</span>
                                    </p>

                                </div>



                                <!-- <div class="otheroptions__rgty">

                                      <ul>

                                          <li><i class="fa-solid fa-plus"></i> Symptoms</li>

                                          <li><i class="fa-solid fa-plus"></i> Clinical exams(PMH)</li>

                                          <li><i class="fa-solid fa-plus"></i> recom/futre plans</li>

                                          <li data-bs-toggle="offcanvas" data-bs-target="#medicine_add_edit" aria-controls="offcanvasBottom"><i class="fa-solid fa-plus"></i> Durgs</li>

                                          <li data-bs-toggle="offcanvas" data-bs-target="#diagnosis" aria-controls="offcanvasBottom"><i class="fa-solid fa-plus"></i> Diagnosis</li>

                                          <li><i class="fa-solid fa-plus"></i> Gernal lcd 10</li>

                                          <li><i class="fa-solid fa-plus"></i> list of procudure & dates</li>

                                          <li data-bs-toggle="offcanvas" data-bs-target="#refer_patient" aria-controls="offcanvasBottom"><i class="fa-solid fa-plus"></i> referals</li>

                                          <li><i class="fa-solid fa-plus"></i> special notes</li>

                                      </ul>

                                  </div> -->

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
                                                @if (in_array('5', $arr))
                                                    <ul class="symptoms">
                                                        @php
                                                            $patient_allergies = App\Models\patient\Patient_allergy::where('patient_id', decrypt(@$id))
                                                                ->orderBy('id', 'desc')
                                                                ->get();
                                                        @endphp

                                                        @if ($patient_allergies->isEmpty())
                                                            <li><small style="font-size:10px;">No Data Found</small>.</li>
                                                        @else
                                                            @foreach ($patient_allergies as $patient_allergy)
                                                                <li>{{ $patient_allergy->allergy_name }}</li>
                                                            @endforeach
                                                        @endif

                                                    </ul>
                                                @endif
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

                                                    @if (in_array('7', $arr))
                                                        <ul id="past_medical_histories">
                                                            @if ($patient_past_history->isEmpty())
                                                                <li><small style="font-size:10px;">No Data Found</small>.
                                                                </li>
                                                            @else
                                                                @foreach ($patient_past_history as $past_history)
                                                                    <li>

                                                                        <div class="appoin_title">

                                                                            <h6>{{ $past_history->diseases_name }}</h6>

                                                                            <p>{{ \Carbon\Carbon::parse($past_history->created_at)->format('D, d M Y') }}
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
                                                    @endif

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
                                                    @if (in_array('10', $arr))
                                                        <ul>
                                                            @if ($patient_past_surgical->isEmpty())
                                                                <li><small style="font-size:10px;">No Data Found</small>.
                                                                </li>
                                                            @else
                                                                @foreach ($patient_past_surgical as $past_surgical)
                                                                    <li>

                                                                        <div class="appoin_title">

                                                                            <h6>{{ $past_surgical->diseases_name }}</h6>

                                                                            <p>{{ \Carbon\Carbon::parse($past_surgical->created_at)->format('D, d M Y') }}
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
                                                    @endif

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
                                                            <li><small style="font-size:10px;">No Data Found</small>.</li>
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
                                                            <li><small style="font-size:10px;">No Data Found</small>.</li>
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

                                                <ul class="referrals_list">

                                                    <li>

                                                        <div class="booking_card_select">



                                                            <label for="cbx1">

                                                                <div class="doctor_dt">

                                                                    <div class="image_dr">

                                                                        <img src="images/new-images/avtar.jpg"
                                                                            alt="">

                                                                    </div>

                                                                    <div class="dr_detail">

                                                                        <h6 class="dr_name">Abbigail Titmus
                                                                            <span>(MBBS)</span>
                                                                        </h6>

                                                                        <p class="dr_email"><a
                                                                                href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a>
                                                                        </p>

                                                                    </div>

                                                                </div>

                                                            </label>

                                                        </div>





                                                    </li>

                                                    <li>

                                                        <div class="booking_card_select">



                                                            <label for="cbx2">

                                                                <div class="doctor_dt">

                                                                    <div class="image_dr">

                                                                        <img src="images/new-images/avtar.jpg"
                                                                            alt="">

                                                                    </div>

                                                                    <div class="dr_detail">

                                                                        <h6 class="dr_name">Abbigail Titmus
                                                                            <span>(MBBS)</span>
                                                                        </h6>

                                                                        <p class="dr_email"><a
                                                                                href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a>
                                                                        </p>

                                                                    </div>

                                                                </div>

                                                            </label>

                                                        </div>





                                                    </li>

                                                    <li>

                                                        <div class="booking_card_select">



                                                            <label for="cbx3">

                                                                <div class="doctor_dt">

                                                                    <div class="image_dr">

                                                                        <img src="images/new-images/avtar.jpg"
                                                                            alt="">

                                                                    </div>

                                                                    <div class="dr_detail">

                                                                        <h6 class="dr_name">Abbigail Titmus
                                                                            <span>(MBBS)</span>
                                                                        </h6>

                                                                        <p class="dr_email"><a
                                                                                href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a>
                                                                        </p>

                                                                    </div>

                                                                </div>

                                                            </label>

                                                        </div>





                                                    </li>

                                                    <li>

                                                        <div class="booking_card_select">



                                                            <label for="cbx4">

                                                                <div class="doctor_dt">

                                                                    <div class="image_dr">

                                                                        <img src="images/new-images/avtar.jpg"
                                                                            alt="">

                                                                    </div>

                                                                    <div class="dr_detail">

                                                                        <h6 class="dr_name">Abbigail Titmus
                                                                            <span>(MBBS)</span>
                                                                        </h6>

                                                                        <p class="dr_email"><a
                                                                                href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a>
                                                                        </p>

                                                                    </div>

                                                                </div>

                                                            </label>

                                                        </div>





                                                    </li>

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
                                                            $visit_notes = App\Models\patient\Patient_progress_note::select('created_at', 'voice_recognition')
                                                                ->where(['progress_note_canned_text_id' => 6, 'patient_id' => @$patient_id])
                                                                ->orderBy('id', 'desc')
                                                                ->get();
                                                        @endphp
                                                        @if ($visit_notes->isEmpty())
                                                            <li><small style="font-size:10px;">No Data Found</small>.</li>
                                                        @else
                                                            @foreach ($visit_notes as $visit)
                                                                <li>

                                                                    <div class="appoin_date">

                                                                        <div class="read-more-content">

                                                                            <p>

                                                                                {{ $visit->voice_recognition }}
                                                                            </p>

                                                                        </div>
                                                                        @if (strlen($visit->voice_recognition) >= 50)
                                                                            <button
                                                                                class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                                onclick="toggleReadMore(this)">Read
                                                                                More</button>
                                                                        @endif

                                                                    </div>
                                                                    <div class="appoin_date">
                                                                        <p>{{ \Carbon\Carbon::parse($visit->created_at)->format('D, d M Y') }}
                                                                        </p>
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

                                                    <h6>List of prescribed medicationt</h6>

                                                </div>

                                            </button>

                                        </h2>

                                        <div id="collapseleft91" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample8">

                                            <div class="accordion-body">

                                                <div class="appointments___list past_medical_history_ak">

                                                    <ul>
                                                        @if ($prescriptions->isEmpty())
                                                            <li><small style="font-size:10px;">No Data Found</small>.</li>
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
                        <div class="card mb-3 form2_bg">
                            <div class="card-body p-0">
                                <div class="accordion acordignleft__small" id="accordionExample2">
                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header key_diagnosis_accordion">
                                            <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseleft24" aria-expanded="true"
                                                aria-controls="collapseleft24">
                                                <div class="top_title_mm_box ">
                                                    <h6 class="action_flex_ghi">
                                                        <a href="#" class="action_btn_tooltip"
                                                            data-bs-toggle="modal" data-bs-target="#diagnosis">
                                                            <iconify-icon
                                                                icon="material-symbols-light:diagnosis-outline-rounded"
                                                                width="20"></iconify-icon>
                                                            <span class="toolTip">Diagnosis</span>
                                                        </a>
                                                        <div class="enterd_by">
                                                            <span>Diagnosis </span>

                                                            <div class="right_side_hjkl">

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
                                                                            data-bs-target="#attach_document">
                                                                            <i class="fa-solid fa-paperclip"></i> Attach
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </h6>

                                                </div>
                                            </button>
                                        </h2>
                                        <div id="collapseleft24" class="accordion-collapse collapse show"
                                            data-bs-parent="#accordionExample24">
                                            <div class="accordion-body ">
                                                <div class="appointments___list past_medical_history_ak diagnosis_data">
                                                    <ul>
                                                        <li>
                                                            <div class="appoin_title">
                                                                <h6><span class="point_dia"><i
                                                                            class="fa-regular fa-circle-dot"></i></span>
                                                                    Provisional / Gernal diagnosis</h6>

                                                            </div>


                                                            <div class="appoin_date">
                                                                <div class="read-more-content" style="max-height: 160px;">

                                                                    @forelse ($diagnosis_generals as $diagnosis_general)
                                                                        <div class="diagnosis_show ">
                                                                            <p class="diagnosis_date">
                                                                                <span class="enter_span_hivj">Entered By |
                                                                                    &nbsp;{{ optional(optional($diagnosis_general)->doctor)->name ?? '' }}</span>


                                                                                <span
                                                                                    class="enter_span_hivj">{{ isset($diagnosis_general) && isset($diagnosis_general->created_at) ? $diagnosis_general->created_at->format('D, d M Y, H:i A') : '' }}</span>
                                                                            </p>
                                                                            <p class="diagnosis_text">
                                                                                @if (isset($diagnosis_general))
                                                                                    @php

                                                                                        $diagnosis_general_data_value = json_decode($diagnosis_general->data_value, true);

                                                                                    @endphp
                                                                                    @forelse ($diagnosis_general_data_value as $key => $values)
                                                                                        @foreach ($values as $value)
                                                                                            {{ $value }}

                                                                                            <span
                                                                                                class="separation">|</span>
                                                                                        @endforeach
                                                                                    @empty
                                                                                    @endforelse
                                                                                @endif
                                                                            </p>


                                                                        </div>

                                                                        @if ($loop->last)
                                                                            <button
                                                                                class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                                onclick="toggleReadMore(this)">Read
                                                                                More</button>
                                                                        @endif
                                                                    @empty
                                                                        <small style="font-size:10px;">No Data
                                                                            Found</small>
                                                                    @endforelse

                                                                </div>




                                                            </div>


                                                        </li>

                                                        <li>
                                                            <div class="appoin_title">
                                                                <h6><span class="point_dia"><i
                                                                            class="fa-regular fa-circle-dot"></i></span>
                                                                    ICD 10</h6>

                                                            </div>


                                                            <div class="appoin_date">
                                                                <div class="read-more-content" style="max-height: 160px;">

                                                                    @forelse ($diagnosis_cids as $diagnosis_cid)
                                                                        <div class="diagnosis_show ">
                                                                            <p class="diagnosis_date">
                                                                                <span class="enter_span_hivj">Entered By |
                                                                                    &nbsp;{{ optional(optional($diagnosis_cid)->doctor)->name ?? '' }}</span>


                                                                                <span
                                                                                    class="enter_span_hivj">{{ isset($diagnosis_cid) && isset($diagnosis_cid->created_at) ? $diagnosis_cid->created_at->format('D, d M Y, H:i A') : '' }}</span>
                                                                            </p>
                                                                            <p class="diagnosis_text">
                                                                                @if (isset($diagnosis_cid))
                                                                                    @php

                                                                                        $diagnosis_cid_data_value = json_decode($diagnosis_cid->data_value, true);

                                                                                    @endphp
                                                                                    @forelse ($diagnosis_cid_data_value as $key => $values)
                                                                                        @foreach ($values as $value)
                                                                                            {{ $value }}

                                                                                            <span
                                                                                                class="separation">|</span>
                                                                                        @endforeach
                                                                                    @empty
                                                                                    @endforelse
                                                                                @endif
                                                                            </p>


                                                                        </div>

                                                                        @if ($loop->last)
                                                                            <button
                                                                                class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                                onclick="toggleReadMore(this)">Read
                                                                                More</button>
                                                                        @endif
                                                                    @empty
                                                                        <small style="font-size:10px;">No Data
                                                                            Found</small>
                                                                    @endforelse

                                                                </div>




                                                            </div>


                                                        </li>


                                                    </ul>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mm_title">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseleft16"
                                                aria-expanded="false" aria-controls="collapseleft16">
                                                <div class="top_title_mm_box">
                                                    <h6 class="action_flex_ghi">
                                                        <a href="#" class="action_btn_tooltip"
                                                            data-bs-toggle="modal" data-bs-target="#symptoms_add">
                                                            <iconify-icon icon="fluent:image-edit-20-regular"
                                                                width="24"></iconify-icon>
                                                            <span class="toolTip">Symptoms</span>
                                                        </a>

                                                        <div class="enterd_by">
                                                            <span>Sympotms </span>
                                                            <div class="right_side_hjkl">

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
                                                <div class="appointments___list past_medical_history_ak diagnosis_data">
                                                    <ul>

                                                        @forelse ($symptoms_db as $symptoms)
                                                            <li>
                                                                <div class="appoin_date">
                                                                    <div class="read-more-content sypm_tom_cnt"
                                                                        style="">
                                                                        <div class="diagnosis_show">
                                                                            <p class="diagnosis_date"><span
                                                                                    class="enter_span_hivj">
                                                                                    {{ 'Entered By |' . optional(optional($symptoms)->doctor)->name ?? '' }}
                                                                                </span> <span
                                                                                    class="enter_span_hivj">{{ isset($symptoms) && isset($symptoms->created_at) ? $symptoms->created_at->format('D, d M Y, H:i A') : '' }}</span>
                                                                            </p>
                                                                            @if (isset($symptoms))
                                                                                @php

                                                                                    $symptoms_data_value = json_decode($symptoms->data_value, true);
                                                                                    //    echo "<pre>";
                                                                                    //     print_r($symptoms_data_value);
                                                                                    //     die;
                                                                                @endphp
                                                                                @forelse ($symptoms_data_value as $key =>$value)
                                                                                    <div class="symp_title">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>

                                                                                            {{ $value['SymptomType'] ?? '' }}
                                                                                            <span class="sym_duration">-
                                                                                                {{ $value['SymptomDurationValue'] ?? '' }}
                                                                                                &nbsp;{{ $value['SymptomDurationType'] ?? '' }}
                                                                                            </span>
                                                                                        </h6>
                                                                                        <p class="diagnosis_text">
                                                                                            {{ $value['SymptomDurationNote'] ?? '' }}
                                                                                        </p>
                                                                                    </div>


                                                                                @empty
                                                                                @endforelse
                                                                            @endif



                                                                        </div>

                                                                    </div>

                                                                    <button
                                                                        class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                        onclick="toggleReadMore(this)">Read
                                                                        More</button>

                                                                </div>
                                                            </li>
                                                        @empty
                                                            <small style="font-size:10px;">No Data Found</small>
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
                                                aria-expanded="false" aria-controls="collapseleft2">
                                                <div class="top_title_mm_box">
                                                    <h6 class="action_flex_ghi">
                                                        <a href="#" class="action_btn_tooltip">
                                                            <iconify-icon icon="covid:symptoms-virus-lung-damage"
                                                                width="22"></iconify-icon>
                                                            <span class="toolTip"> Severity Symptoms Scale</span>
                                                        </a>

                                                        <div class="enterd_by">
                                                            <span>Severity Symptoms Scale </span> </span>
                                                            <div class="right_side_hjkl">

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
                                            data-bs-parent="#accordionExample2">
                                            <div class="accordion-body">
                                                <div class="appointments___list past_medical_history_ak diagnosis_data">
                                                    <ul>
                                                        @if (isset($symptoms_scores_db) || isset($ClinicalIndicator_db))
                                                            <li>

                                                                <div class="appoin_date">
                                                                    <div class="read-more-content sypm_tom_cnt"
                                                                        style="">
                                                                        @forelse ($symptoms_scores_db as $record)
                                                                            <div class="diagnosis_show">
                                                                                <p class="diagnosis_date top_de"><span
                                                                                        class="enter_span_hivj">
                                                                                        {{ 'Entered By |' . optional(optional($record)->doctor)->name ?? '' }}
                                                                                    </span> <span
                                                                                        class="enter_span_hivj">{{ isset($record) && isset($record->created_at) ? $record->created_at->format('D, d M Y, H:i A') : '' }}
                                                                                    </span></p>

                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                            prostate Compressive symptoms
                                                                                            score
                                                                                            (TCSS)
                                                                                        </h6>
                                                                                    </div>
                                                                                    @php
                                                                                        $sum = 0;

                                                                                        $jsonData = json_decode($record->data_value, true);

                                                                                        if (is_array($jsonData) && !empty($jsonData)) {
                                                                                            foreach ($jsonData as $key => $value) {
                                                                                                $sum += (int) $value[0];
                                                                                            }
                                                                                        }

                                                                                    @endphp
                                                                                    @if (isset($sum) && ($sum >= 0 && $sum <= 7))
                                                                                        <p class="ss_result">Mild LUTS (0-7
                                                                                            pts)</p>
                                                                                        
                                                                                            @elseif (isset($sum) && ($sum >= 8 && $sum <= 19))
                                                                                        <p class="ss_result">Moderate LUTS
                                                                                            (8-19 pts)</p>
                                                                                        
                                                                                            @elseif (isset($sum) && ($sum >= 20 && $sum <= 1009))
                                                                                        <p class="ss_result">Severe LUTS
                                                                                            (20-35 pts)</p>
                                                                                    @endif

                                                                                </div>
                                                                            @empty
                                                                                <small style="font-size:10px;">No Data
                                                                                    Found</small>
                                                                        @endforelse

                                                                        @if (isset($ClinicalIndicator_db))
                                                                            @forelse ($ClinicalIndicator_db as $record)
                                                                                @php
                                                                                    $jsonData = json_decode($record->data_value, true);
                                                                                @endphp


                                                                                @if (isset($jsonData) && is_array($jsonData) && array_key_exists('Palpitations', $jsonData))
                                                                                    <div class="ss_result_box">
                                                                                        <div class="symp_title mb-1">
                                                                                            <h6><span class="point_dia"><i
                                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                                hyper-Toxic symptoms:
                                                                                                Palpitations |
                                                                                                Sweating | Anxiety | tremor
                                                                                                | weight
                                                                                                loss | hair loss</h6>
                                                                                        </div>
                                                                                        <p class="ss_result">
                                                                                            {{ $jsonData['Palpitations'][0] ?? '' }}
                                                                                        </p>
                                                                                    </div>
                                                                                @endif
                                                                                @if (isset($jsonData) && is_array($jsonData) && array_key_exists('Carbimazole', $jsonData))
                                                                                    <div class="ss_result_box">
                                                                                        <div class="symp_title mb-1">
                                                                                            <h6><span class="point_dia"><i
                                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                                Anti-thyroid meds (e.g.
                                                                                                Carbimazole)
                                                                                            </h6>
                                                                                        </div>
                                                                                        <p class="ss_result">
                                                                                            {{ $jsonData['Carbimazole'][0] ?? '' }}
                                                                                        </p>
                                                                                    </div>
                                                                                @endif
                                                                                @if (isset($jsonData) && is_array($jsonData) && array_key_exists('lethargy', $jsonData))
                                                                                    <div class="ss_result_box">
                                                                                        <div class="symp_title mb-1">
                                                                                            <h6><span class="point_dia"><i
                                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                                Hypo-thyroid symptoms:
                                                                                                lethargy |
                                                                                                Fatigue | cold intolerance |
                                                                                                weight gain
                                                                                                | altered mood</h6>
                                                                                        </div>
                                                                                        <p class="ss_result">
                                                                                            {{ $jsonData['lethargy'][0] ?? '' }}
                                                                                        </p>
                                                                                    </div>
                                                                                @endif
                                                                                @if (isset($jsonData) && is_array($jsonData) && array_key_exists('Thyroxine', $jsonData))
                                                                                    <div class="ss_result_box">
                                                                                        <div class="symp_title mb-1">
                                                                                            <h6><span class="point_dia"><i
                                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                                Thyroid hormone replacement
                                                                                                (e.g.
                                                                                                Thyroxine)</h6>
                                                                                        </div>
                                                                                        <p class="ss_result">
                                                                                            {{ $jsonData['Thyroxine'][0] ?? '' }}
                                                                                        </p>
                                                                                    </div>
                                                                                @endif
                                                                            @empty
                                                                            @endforelse
                                                                        @endif
                                                                    </div>



                                                                </div>
                                                                <button
                                                                    class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                    onclick="toggleReadMore(this)">Read More</button>
                                                </div>
                                                </li>


                                                @endif

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                


                                <div class="accordion-item mm_title">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseleft5"
                                            aria-expanded="false" aria-controls="collapseleft5">
                                            <div class="top_title_mm_box">

                                                <h6 class="action_flex_ghi">
                                                    <a href="#" class="action_btn_tooltip" data-bs-toggle="modal"
                                                        data-bs-target="#clinical_exam">
                                                        <iconify-icon icon="healthicons:clinical-fe-outline"
                                                            width="20"></iconify-icon>
                                                        <span class="toolTip">Clinical Exam</span>
                                                    </a>

                                                    <div class="enterd_by">
                                                        <span>Clinical Exam </span>
                                                        <div class="right_side_hjkl">

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
                                            <div class="appointments___list past_medical_history_ak diagnosis_data">
                                                <ul>
                                                    @if (isset($ClinicalExam_db))
                                                        @forelse ($ClinicalExam_db as $record)
                                                            <li>

                                                                <div class="appoin_date">
                                                                    <div class="read-more-content sypm_tom_cnt"
                                                                        style="">
                                                                        <div class="diagnosis_show">
                                                                            <p class="diagnosis_date top_de"><span
                                                                                    class="enter_span_hivj">{{ 'Entered By |' . optional(optional($record)->doctor)->name ?? '' }}
                                                                                </span> <span
                                                                                    class="enter_span_hivj">{{ isset($record) && isset($record->created_at) ? $record->created_at->format('D, d M Y, H:i A') : '' }}
                                                                                </span></p>
                                                                            @php
                                                                                $ClinicalExam = json_decode($record->data_value, true);
                                                                                // echo "<pre>";
                                                                                //     echo $ClinicalExam['RegionalExam'][0];
                                                                                //     die;
                                                                            @endphp


                                                                            @if (isset($ClinicalExam['RegionalExam']) && $ClinicalExam['RegionalExam'][0] == 'Abnormal')
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                            Regional Exam</h6>
                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        <strong>Abnormal</strong>
                                                                                        -
                                                                                        {{ $ClinicalExam['RegionalExamNote'][0] ?? '' }}.
                                                                                    </p>
                                                                                </div>
                                                                            @endif


                                                                            @if (isset($ClinicalExam['RegionalExam']) && $ClinicalExam['RegionalExam'][0] == 'Normal')
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                            Regional Exam</h6>
                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        <strong>Normal</strong>

                                                                                </div>
                                                                            @endif
                                                                            @if (isset($ClinicalExam['SystemicExam']) && $ClinicalExam['SystemicExam'][0] == 'Abnormal')
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                            Systemic Exam</h6>
                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        <strong>Abnormal</strong>
                                                                                        -
                                                                                        {{ $ClinicalExam['SystemicExamNote'][0] ?? '' }}.
                                                                                    </p>
                                                                                </div>
                                                                            @endif
                                                                            @if (isset($ClinicalExam['SystemicExam']) && $ClinicalExam['SystemicExam'][0] == 'Normal')
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                            Systemic Exam</h6>
                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        <strong>Normal</strong>

                                                                                </div>
                                                                            @endif

                                                                        </div>



                                                                    </div>
                                                                    <button
                                                                        class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                        onclick="toggleReadMore(this)">Read More</button>
                                                                </div>
                                                            </li>
                                                        @empty
                                                            <small style="font-size:10px;">No Data Found</small>
                                                        @endforelse
                                                    @endif

                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mm_title">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseleft15"
                                            aria-expanded="false" aria-controls="collapseleft15">
                                            <div class="top_title_mm_box">
                                                <h6 class="action_flex_ghi">
                                                    <a href="#" class="action_btn_tooltip" data-bs-toggle="modal"
                                                        data-bs-target="#order_imagenairy">
                                                        <iconify-icon icon="mdi:x-ray-box-outline"
                                                            width="24"></iconify-icon>
                                                        <span class="toolTip">Order Imaging Exam</span>
                                                    </a>

                                                    <div class="enterd_by">
                                                        <span>Order Imaging Exam </span>
                                                        <div class="right_side_hjkl">

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
                                            <div class="appointments___list past_medical_history_ak diagnosis_data">
                                                <ul>
                                                    <li>

                                                        <div class="appoin_date">

                                                            <div class="diagnosis_show">
                                                                <p class="diagnosis_date top_de"><span
                                                                        class="enter_span_hivj">
                                                                        {{ isset($Patient_order_imaginary_exams[0]) ? 'Entered By | ' . optional(optional($Patient_order_imaginary_exams[0])->doctor)->name ?? '' : '' }}
                                                                    </span> <span
                                                                        class="enter_span_hivj">{{ isset($Patient_order_imaginary_exams[0]) && isset($Patient_order_imaginary_exams[0]->created_at) ? $Patient_order_imaginary_exams[0]->created_at->format('D, d M Y, H:i A') : '' }}
                                                                    </span></p>

                                                                <div
                                                                    class="datatable-container allinvoice_table custom_table_area table_test_fgi">
                                                                    <table id="allinvoice_table" class="display">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Test Name</th>
                                                                                <th>Duration</th>
                                                                                <th>Status</th>
                                                                                <th>Action</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse ($Patient_order_imaginary_exams as $Patient_order_imaginary_exam)
                                                                                <tr>
                                                                                    <td>{{ $Patient_order_imaginary_exam->test->test_name }}
                                                                                    </td>
                                                                                    <td>{{ $Patient_order_imaginary_exam->test->duration }}
                                                                                    </td>
                                                                                    @if ($Patient_order_imaginary_exam->status == 'pending')
                                                                                        <td><button
                                                                                                class="pending-badge">Pending</button>
                                                                                        </td>
                                                                                    @else
                                                                                        <td><button
                                                                                                class="confirmed-badge">Complete</button>
                                                                                        </td>
                                                                                    @endif


                                                                                    <td>
                                                                                        <a href="{{ $Patient_order_imaginary_exam->report_url }}"
                                                                                            download=""
                                                                                            class="download_rp_btn">
                                                                                            <i
                                                                                                class="fa-solid fa-file-arrow-down"></i>
                                                                                            Download Report
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            @empty
                                                                                <td colspan="4" class="text-center">No
                                                                                    record found</td>
                                                                            @endforelse

                                                                            {{-- <tr>
                                                                                    <td>CT- Scan</td>
                                                                                    <td>2 week</td>
                                                                                    <td><button
                                                                                            class="confirmed-badge">Complete</button>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href="images/new-images/dummy.pdf"
                                                                                            download=""
                                                                                            class="download_rp_btn"><i
                                                                                                class="fa-solid fa-file-arrow-down"></i>
                                                                                            Download Report</a>
                                                                                    </td>


                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Ultrasound</td>
                                                                                    <td>1 day</td>
                                                                                    <td><button
                                                                                            class="pending-badge">Pending</button>
                                                                                    </td>
                                                                                    <td>

                                                                                    </td>


                                                                                </tr>
                                                                                <tr>
                                                                                    <td>MRI</td>
                                                                                    <td>1 day</td>
                                                                                    <td><button
                                                                                            class="pending-badge">Pending</button>
                                                                                    </td>
                                                                                    <td>

                                                                                    </td>


                                                                                </tr> --}}
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>





                                                        </div>
                                                    </li>

                                                    @forelse ($Imaging as $record)
                                                        <li>

                                                            <div class="appoin_date">
                                                                <div class="read-more-content sypm_tom_cnt"
                                                                    style="">
                                                                    <div class="diagnosis_show">


                                                                        <p class="diagnosis_date top_de"><span
                                                                                class="enter_span_hivj">{{ 'Entered By |' . optional(optional($record)->doctor)->name ?? '' }}
                                                                            </span> <span
                                                                                class="enter_span_hivj">{{ isset($record) && isset($record->created_at) ? $record->created_at->format('D, d M Y, H:i A') : '' }}
                                                                            </span></p>

                                                                        @php

                                                                            $jsonData = json_decode($record->data_value, true);
                                                                            // echo "<pre>";
                                                                            //     print_r($jsonData);
                                                                            //     die;
                                                                        @endphp
                                                                        <!--USGENERAL70 > Prostate Parameters start -->
                                                                        <div class="ss_result_box">
                                                                            <div class="symp_title mb-3">
                                                                                <h6><span class="point_dia"><i
                                                                                            class="fa-regular fa-circle-dot"></i></span>
                                                                                    USGENERAL70 > Prostate Parameters</h6>
                                                                            </div>

                                                                            <div class="symp_title mb-3">

                                                                                <p class="ss_result">
                                                                                    {{ $jsonData['USGENERAL701'][0] ?? '' }}</p>
                                                                                <p class="ss_result">
                                                                                    {{ $jsonData['USGENERAL702'][0] ?? '' }}</p>
                                                                                <p class="ss_result">
                                                                                    {{ $jsonData['USGENERAL703'][0] ?? '' }}</p>
                                                                                <p class="ss_result">
                                                                                    {{ $jsonData['USGENERAL704'][0] ?? '' }}</p>
                                                                                    

                                                                            </div>

                                                                        </div>
                                                                 <!--USGENERAL70 > Prostate Parameters end -->

                                                                  <!--MRCIR48 > Prostate Parameters start -->
                                                                  <div class="ss_result_box">
                                                                    <div class="symp_title mb-3">
                                                                        <h6><span class="point_dia"><i
                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                            USGENERAL70 > Calculate PI-RARDS</h6>
                                                                    </div>

                                                                    <div class="symp_title mb-3">

                                                                            <p class="ss_result">
                                                                            {{ $jsonData['MRCIR481'][0] ?? '' }}</p>
                                                                             <p class="ss_result">
                                                                            {{ $jsonData['MRCIR482'][0] ?? '' }}</p>
                                                                            <p class="ss_result">
                                                                            {{ $jsonData['MRCIR483'][0] ?? '' }}</p>
                                                                            <p class="ss_result">
                                                                            {{ $jsonData['MRCIR484'][0] ?? '' }}</p>
                                                                            <p class="ss_result">
                                                                            {{ $jsonData['MRCIR485'][0] ?? '' }}</p>
                                                                            <p class="ss_result">
                                                                            {{ $jsonData['MRCIR486'][0] ?? '' }}</p>
                                                                            <p class="ss_result">
                                                                            {{ $jsonData['MRCIR487'][0] ?? '' }}</p>
                                                                            <p class="ss_result">
                                                                            {{ $jsonData['MRCIR488'][0] ?? '' }}</p>

                                                                    </div>

                                                                </div>
                                                         <!--MRCIR48 > Prostate Parameters end -->

                                                          <!--BPH type > start -->
                                                          <div class="ss_result_box">
                                                            <div class="symp_title mb-3">
                                                                <h6><span class="point_dia"><i
                                                                            class="fa-regular fa-circle-dot"></i></span>
                                                                            BPH type </h6>
                                                            </div>

                                                            <div class="symp_title mb-3">

                                                                    <p class="ss_result">
                                                                    {{ $jsonData['BPHtype'][0] ?? '' }}</p>
                                                                     

                                                            </div>

                                                        </div>
                                                 <!--BPH type  end -->

                                                  <!--3rd lobe > start -->
                                                  <div class="ss_result_box">
                                                    <div class="symp_title mb-3">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                    3rd lobe </h6>
                                                    </div>

                                                    <div class="symp_title mb-3">

                                                            <p class="ss_result">
                                                            {{ $jsonData['lobe'][0] ?? '' }}</p>
                                                             

                                                    </div>

                                                </div>
                                            <!--3rd lobe  end -->

                                            <!-- Prostitis / Prostate Abscess start -->
                                            <div class="ss_result_box">
                                                <div class="symp_title mb-3">
                                                    <h6><span class="point_dia"><i
                                                                class="fa-regular fa-circle-dot"></i></span>
                                                                Prostitis / Prostate Abscess </h6>
                                                </div>
                                                        @if (isset($jsonData['Abscess']) && !empty($jsonData['Abscess'][0]))
                                                        <div class="symp_title mb-3">

                                                            <p class="ss_result">
                                                            {{ $jsonData['Abscess'][0] == 'NO' ?  $jsonData['Abscess'][0] :  '' }}</p>
                                                            @elseif (isset($jsonData['AbscessNOTE']) && !empty($jsonData['AbscessNOTE'][0]))
                                                            <p class="ss_result">
                                                                <p class="ss_result">{{ $jsonData['Abscess'][0] ?? '' }}</p>
                                                                &nbsp;&nbsp;{{ $jsonData['Abscess'][0] == 'YES' ?  $jsonData['AbscessNOTE'][0] :  '' }}</p>
                                                             
                                                           </div>
                                                        @endif
                                                       

                                            </div>
                                        <!-- Prostitis / Prostate Abscess  end -->

                                        <!-- CTCIR48 / CTA -  Prostatic artery Angiography Protocol -RIGHT -->
                                        <div class="ss_result_box">
                                            <div class="symp_title mb-3">
                                                <h6><span class="point_dia"><i
                                                            class="fa-regular fa-circle-dot"></i></span>
                                                            CTCIR48 / CTA -  Prostatic artery Angiography Protocol -RIGHT</h6>
                                            </div>
                                                   
                                                    <div class="symp_title mb-3">

                                                        <p class="ss_result">
                                                        {{ $jsonData['CTARIGHT1'][0] ?? '' }}</p>
                                                        <p class="ss_result">
                                                            {{ $jsonData['CTARIGHT2'][0] ?? '' }}</p>
                                                            <p class="ss_result">
                                                             {{ $jsonData['CTARIGHT3'][0] ?? '' }}</p>
                                                            <p class="ss_result">
                                                            {{ $jsonData['CTARIGHT4'][0] ?? '' }}</p>
                                                            <p class="ss_result">
                                                                {{ $jsonData['CTARIGHT5'][0] ?? '' }}</p>
                                                    
                                                       </div>
                                                    
                                                   

                                        </div>
                                    <!--CTCIR48 / CTA -  Prostatic artery Angiography Protocol -RIGHT  end -->

                                     <!-- CTCIR48 / CTA -  Prostatic artery Angiography Protocol -LEFT-->
                                     <div class="ss_result_box">
                                        <div class="symp_title mb-3">
                                            <h6><span class="point_dia"><i
                                                        class="fa-regular fa-circle-dot"></i></span>
                                                        CTCIR48 / CTA -  Prostatic artery Angiography Protocol -LEFT</h6>
                                        </div>
                                               
                                                <div class="symp_title mb-3">

                                                    <p class="ss_result">
                                                    {{ $jsonData['CTALEFT1'][0]  ?? ''}}</p>
                                                    <p class="ss_result">
                                                        {{ $jsonData['CTALEFT2'][0] ?? '' }}</p>
                                                        <p class="ss_result">
                                                         {{ $jsonData['CTALEFT3'][0] ?? '' }}</p>
                                                        <p class="ss_result">
                                                        {{ $jsonData['CTALEFT4'][0] ?? '' }}</p>
                                                        <p class="ss_result">
                                                            {{ $jsonData['CTALEFT5'][0] ?? '' }}</p>
                                                
                                                   </div>
                                                
                                               

                                    </div>
                                <!--CTCIR48 /CTA -  Prostatic artery Angiography Protocol -LEFT  end -->

                                <!-- USBIOPSYPROSTETE690 / Prostate Hyperplasia -->
                                <div class="ss_result_box">
                                    <div class="symp_title mb-3">
                                        <h6><span class="point_dia"><i
                                                    class="fa-regular fa-circle-dot"></i></span>
                                                    USBIOPSYPROSTETE690 / Prostate Hyperplasia</h6>
                                    </div>
                                           
                                            <div class="symp_title mb-3">

                                                <p class="ss_result">
                                                {{ $jsonData['ProstateHyperplasia'][0] ?? '' }}</p>
                                                
                                            
                                               </div>
                                            
                                           

                                </div>
                            <!-- USBIOPSYPROSTETE690 / Prostate Hyperplasia  end -->
                            <!-- USBIOPSYPROSTETE690 / Prostate Hyperplasia -->
                            <div class="ss_result_box">
                                <div class="symp_title mb-3">
                                    <h6><span class="point_dia"><i
                                                class="fa-regular fa-circle-dot"></i></span>
                                                USBIOPSYPROSTETE690 / Prostate AdenoCarcinoma</h6>
                                </div>
                                    
                                        <div class="symp_title mb-3">

                                            <p class="ss_result">
                                            {{ $jsonData['ProstateAdenoCarcinoma'][0] ?? '' }}</p>
                                            
                                        
                                        </div>
                                        
                                    

                            </div>
                            <!-- USBIOPSYPROSTETE690 / Prostate AdenoCarcinoma  end -->
                                                                    </div>



                                                                </div>
                                                                <button
                                                                    class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                    onclick="toggleReadMore(this)">Read More</button>
                                                            </div>

                                                        </li>

                                                    @empty

                                                        <small style="font-size:10px;">No Data Found</small>
                                                    @endforelse




                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item mm_title">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseleft17"
                                            aria-expanded="false" aria-controls="collapseleft17">
                                            <div class="top_title_mm_box">

                                                <h6 class="action_flex_ghi">
                                                    <a href="#" class="action_btn_tooltip OrderLabTest"
                                                        data-bs-toggle="modal" data-bs-target="#lab_test">
                                                        <iconify-icon icon="entypo:lab-flask"
                                                            width="20"></iconify-icon>
                                                        <span class="toolTip">Order Lab Test</span>
                                                    </a>

                                                    <div class="enterd_by">
                                                        <span>Lab </span>
                                                        <div class="right_side_hjkl">

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
                                            <div class="appointments___list past_medical_history_ak diagnosis_data">
                                                <ul>
                                                    <li>

                                                        <div class="appoin_date">

                                                            <div class="diagnosis_show">
                                                                <p class="diagnosis_date top_de"><span
                                                                        class="enter_span_hivj">{{ isset($Patient_order_labs[0]) ? 'Entered By | ' . optional(optional($Patient_order_labs[0])->doctor)->name ?? '' : '' }}

                                                                    </span> <span
                                                                        class="enter_span_hivj">{{ isset($Patient_order_labs[0]) && isset($Patient_order_labs[0]->created_at) ? $Patient_order_labs[0]->created_at->format('D, d M Y, H:i A') : '' }}
                                                                    </span></p>

                                                                <div
                                                                    class="datatable-container allinvoice_table custom_table_area table_test_fgi">
                                                                    <table id="allinvoice_table" class="display">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Test Name</th>
                                                                                <th>Duration</th>
                                                                                <th>Status</th>
                                                                                <th>Action</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse ($Patient_order_labs as $Patient_order_lab)
                                                                                <tr>
                                                                                    <td>{{ $Patient_order_lab->lab->test_name }}
                                                                                    </td>
                                                                                    <td>{{ $Patient_order_lab->lab->duration }}
                                                                                    </td>
                                                                                    @if ($Patient_order_lab->status == 'pending')
                                                                                        <td><button
                                                                                                class="pending-badge">Pending</button>
                                                                                        </td>
                                                                                    @else
                                                                                        <td><button
                                                                                                class="confirmed-badge">Complete</button>
                                                                                        </td>
                                                                                    @endif


                                                                                    <td>
                                                                                        <a href="{{ $Patient_order_lab->report_url }}"
                                                                                            download=""
                                                                                            class="download_rp_btn">
                                                                                            <i
                                                                                                class="fa-solid fa-file-arrow-down"></i>
                                                                                            Download Report
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            @empty
                                                                                <td colspan="4" class="text-center">No
                                                                                    record found</td>
                                                                            @endforelse
                                                                            {{-- <tr>
                                                                                    <td>17 Hydroxyprogesterone</td>
                                                                                    <td>2 week</td>
                                                                                    <td><button
                                                                                            class="confirmed-badge">Complete</button>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href="images/new-images/dummy.pdf"
                                                                                            download=""
                                                                                            class="download_rp_btn"><i
                                                                                                class="fa-solid fa-file-arrow-down"></i>
                                                                                            Download Report</a>
                                                                                    </td>


                                                                                </tr>
                                                                                <tr>
                                                                                    <td>5 HIAA</td>
                                                                                    <td>1 day</td>
                                                                                    <td><button
                                                                                            class="pending-badge">Pending</button>
                                                                                    </td>
                                                                                    <td>

                                                                                    </td>


                                                                                </tr>
                                                                                <tr>
                                                                                    <td>6-TGN</td>
                                                                                    <td>1 day</td>
                                                                                    <td><button
                                                                                            class="pending-badge">Pending</button>
                                                                                    </td>
                                                                                    <td>

                                                                                    </td>


                                                                                </tr> --}}
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>





                                                        </div>
                                                    </li>
                                                    @forelse ($Labs as $record)
                                                        <li>

                                                            <div class="appoin_date">
                                                                <div class="read-more-content sypm_tom_cnt"
                                                                    style="">
                                                                    <div class="diagnosis_show">
                                                                        <p class="diagnosis_date top_de"><span
                                                                                class="enter_span_hivj">
                                                                                {{ 'Entered By |' . optional(optional($record)->doctor)->name ?? '' }}

                                                                            </span> <span
                                                                                class="enter_span_hivj">{{ isset($record) && isset($record->created_at) ? $record->created_at->format('D, d M Y, H:i A') : '' }}
                                                                            </span></p>
                                                                        @php
                                                                            $jsonData = json_decode($record->data_value, true);
                                                                            // echo "<pre>";
                                                                            //     print_r($jsonData);
                                                                            //     die;
                                                                        @endphp
                                                                        
                                                                         <!-- LABPSA24 / PSA -->
                                                                    <div class="ss_result_box">
                                                                        <div class="symp_title mb-3">
                                                                            <h6><span class="point_dia"><i
                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                        LABPSA24 / PSA</h6>
                                                                        </div>
                                                                            
                                                                                <div class="symp_title mb-3">

                                                                                    <p class="ss_result">
                                                                                    {{ $jsonData['LABPSA24'][0] ?? '' }}</p>
                                                                                    
                                                                                
                                                                                </div>
                                                                                
                                                                            

                                                                    </div>
                                                                    <!-- LABPSA24 / PSA  end -->

                                                                     <!-- LABRFT12 / Renal Function test (Creatinine | Na | K | urea) Results -->
                                                                     <div class="ss_result_box">
                                                                        <div class="symp_title mb-3">
                                                                            <h6><span class="point_dia"><i
                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                        LABRFT12 / Renal Function test (Creatinine | Na | K | urea) Results</h6>
                                                                        </div>
                                                                            
                                                                                <div class="symp_title mb-3">
                                                                                @if (isset($jsonData['LABRFT12']) && !empty($jsonData['LABRFT12'][0]))
                                                                                    
                                                                              
                                                                                    <p class="ss_result">
                                                                                    {{ $jsonData['LABRFT12'][0] =='Normal Renal profile' ?  $jsonData['LABRFT12'][0] :  '' }}</p>
                                                                                    @elseif (isset($jsonData['LABRFT12NOTE']) && !empty($jsonData['LABRFT12NOTE'][0]))
                                                                                    <p class="ss_result">{{ $jsonData['LABRFT12'][0] ?? '' }}</p>
                                                                                    <p class="ss_result">
                                                                                        &nbsp;&nbsp;{{ $jsonData['LABRFT12'][0] =='Abnormal Renal profile' ?  $jsonData['LABRFT12NOTE'][0] :  '' }}</p>
                                                                                    
                                                                                    @endif
                                                                                </div>
                                                                                
                                                                            

                                                                    </div>
                                                                    <!-- LABRFT12 / Renal Function test (Creatinine | Na | K | urea) Results  end -->


                                                                     <!--  LABUA29 / Urinalysis (Blood | Protein | WBC) Results -->
                                                                     <div class="ss_result_box">
                                                                        <div class="symp_title mb-3">
                                                                            <h6><span class="point_dia"><i
                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                        LABUA29 / Urinalysis (Blood | Protein | WBC) Results</h6>
                                                                        </div>
                                                                            
                                                                                <div class="symp_title mb-3">
                                                                                @if (isset($jsonData['LABUA29']) && !empty($jsonData['LABUA29'][0]))
                                                                                    
                                                                              
                                                                                    <p class="ss_result">
                                                                                    {{ $jsonData['LABUA29'][0] =='Normal Urinanalysis' ?  $jsonData['LABUA29'][0] :  '' }}</p>
                                                                                    @elseif (isset($jsonData['LABUA29NOTE']) && !empty($jsonData['LABUA29NOTE'][0]))
                                                                                    <p class="ss_result">{{ $jsonData['LABUA29'][0] }}</p>
                                                                                    <p class="ss_result">
                                                                                        {{ $jsonData['LABUA29'][0] =='Abnormal Urinanalysis (PAE unfaverable)' ?  $jsonData['LABUA29NOTE'][0] :  '' }}</p>
                                                                                    
                                                                                    @endif
                                                                                </div>
                                                                                
                                                                            

                                                                    </div>
                                                                    <!--  LABUA29 / Urinalysis (Blood | Protein | WBC) Results  end -->
                                                                    <!-- LABUROFLO82 / Uroflowmetery tests Results -->
                                                                    <div class="ss_result_box">
                                                                        <div class="symp_title mb-3">
                                                                            <h6><span class="point_dia"><i
                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                        LABUROFLO82 / Uroflowmetery tests Results</h6>
                                                                        </div>
                                                                            
                                                                                <div class="symp_title mb-3">

                                                                                    <p class="ss_result">
                                                                                    {{ $jsonData['QMax'][0] ?? '' }}</p>
                                                                                    
                                                                                
                                                                                </div>
                                                                                
                                                                            

                                                                    </div>
                                                                    <!-- LABUROFLO82 / Uroflowmetery tests Results  end -->
                                                                    <!-- LABUROFLO82 / Uroflowmetery tests Results -->
                                                                    <div class="ss_result_box">
                                                                        <div class="symp_title mb-3">
                                                                            <h6><span class="point_dia"><i
                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                        LABUROFLO82 / Post-Residual Volume (PVR)</h6>
                                                                        </div>
                                                                            
                                                                                <div class="symp_title mb-3">

                                                                                    <p class="ss_result">
                                                                                    {{ $jsonData['PVR'][0] ?? '' }}</p>
                                                                                    
                                                                                
                                                                                </div>
                                                                                
                                                                            

                                                                    </div>
                                                                    <!-- LABUROFLO82 / Uroflowmetery tests Results  end -->

                                                                     <!--   LABUROFLOINVASIVE752 /Filling-Voiding phase testing Results -->
                                                                     <div class="ss_result_box">
                                                                        <div class="symp_title mb-3">
                                                                            <h6><span class="point_dia"><i
                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                        LABUROFLOINVASIVE752 /Filling-Voiding phase testing Results</h6>
                                                                        </div>
                                                                            
                                                                                <div class="symp_title mb-3">
                                                                                @if (isset($jsonData['LABUROFLOINVASIVE752']) && !empty($jsonData['LABUROFLOINVASIVE752'][0]))
                                                                                    
                                                                              
                                                                                    <p class="ss_result">
                                                                                    {{ $jsonData['LABUROFLOINVASIVE752'][0] =='Normal results (PAE unfaverable)' ?  $jsonData['LABUROFLOINVASIVE752'][0] :  '' }}</p>
                                                                                    @elseif (isset($jsonData['LABUROFLOINVASIVE752NOTE']) && !empty($jsonData['LABUROFLOINVASIVE752NOTE'][0]))
                                                                                    <p class="ss_result">
                                                                                        <p class="ss_result">{{ $jsonData['LABUROFLOINVASIVE752'][0] ?? '' }}</p>
                                                                                        {{ $jsonData['LABUROFLOINVASIVE752'][0] =='Abnormal Urinanalysis (PAE unfaverable)' ?  $jsonData['LABUROFLOINVASIVE752NOTE'][0] :  '' }}</p>
                                                                                    
                                                                                    @endif
                                                                                </div>
                                                                                
                                                                            

                                                                    </div>
                                                                    <!--  LABUROFLOINVASIVE752 /Filling-Voiding phase testing Results  end -->
                                                                    </div>



                                                                </div>
                                                                <button
                                                                    class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                    onclick="toggleReadMore(this)">Read More</button>
                                                            </div>
                                                        </li>
                                                    @empty
                                                    @endforelse




                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mm_title">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseleft12"
                                            aria-expanded="false" aria-controls="collapseleft12">
                                            <div class="top_title_mm_box">

                                                <h6 class="action_flex_ghi">
                                                    <a href="#" class="action_btn_tooltip" data-bs-toggle="modal"
                                                        data-bs-target="#order_supportive_surface">
                                                        <iconify-icon icon="icon-park-outline:order"
                                                            width="24"></iconify-icon>
                                                        <span class="toolTip">Order Special Invistigation</span>
                                                    </a>

                                                    <div class="enterd_by">
                                                        <span>Special Investigation </span>
                                                        <div class="right_side_hjkl">

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
                                            <div class="appointments___list past_medical_history_ak diagnosis_data">
                                                <ul>
                                                    @if (isset($SpecialInvestigations_db))
                                                        @forelse ($SpecialInvestigations_db as $record)
                                                            <li>

                                                                <div class="appoin_date">
                                                                    <div class="read-more-content " style="">
                                                                        <div class="diagnosis_show">
                                                                            <p class="diagnosis_date "><span
                                                                                    class="enter_span_hivj">
                                                                                    {{ 'Entered By |' . optional(optional($record)->doctor)->name ?? '' }}
                                                                                </span> <span
                                                                                    class="enter_span_hivj">{{ isset($record) && isset($record->created_at) ? $record->created_at->format('D, d M Y, H:i A') : '' }}
                                                                                </span></p>
                                                                            @php
                                                                                $specialInvestigations = json_decode($record->data_value, true);
                                                                                // echo "<pre>";
                                                                                //     print_r($specialInvestigations);
                                                                                //     die;
                                                                            @endphp
                                                                            @if (isset($specialInvestigations['REQUROFLONONI5']) && $specialInvestigations['REQUROFLONONI5'][0] == 'Abnormal')
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                                    REQUROFLONONI5</h6>
                                                                                        <h6 class="ss_result">Uro-flow-dynamic non-invasive</h6>
                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        <strong>Abnormal</strong>
                                                                                        -
                                                                                        {{ $specialInvestigations['REQUROFLONONI5NOTE'][0] ?? '' }}
                                                                                    </p>
                                                                                </div>
                                                                            @endif
                                                                            @if (isset($specialInvestigations['REQUROFLOI5']) && $specialInvestigations['REQUROFLOI5'][0] == 'Normal')
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                                    REQUROFLOI5</h6>
                                                                                        <h6 class="ss_result">Uro-flow-dynamic invasive</h6>
                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        <strong>Normal</strong>
                                                                                    </p>
                                                                                </div>
                                                                            @endif

                                                                            @if (isset($specialInvestigations['title']) && $specialInvestigations['title'])
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                            REQVCFUNEVAL5</h6>
                                                                                        <h6 class="ss_result">
                                                                                            {{ $specialInvestigations['title'] ?? '' }}
                                                                                        </h6>
                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        <strong>{{ $specialInvestigations['subtile'] ?? '' }}</strong>
                                                                                        -
                                                                                        {{ $specialInvestigations['invistigation'] ?? '' }}
                                                                                    </p>
                                                                                </div>
                                                                            @endif
                                                                        </div>



                                                                    </div>
                                                                    <button
                                                                        class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                        onclick="toggleReadMore(this)">Read More</button>
                                                                </div>
                                                            </li>
                                                        @empty
                                                            <small style="font-size:10px;">No Data Found</small>
                                                        @endforelse
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mm_title">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseleft18"
                                            aria-expanded="false" aria-controls="collapseleft18">
                                            <div class="top_title_mm_box">
                                                <h6 class="action_flex_ghi">
                                                    <a href="#" class="action_btn_tooltip" data-bs-toggle="modal"
                                                        data-bs-target="#mdt_review">
                                                        <iconify-icon icon="material-symbols-light:reviews-outline-rounded"
                                                            width="24"></iconify-icon>
                                                        <span class="toolTip">MDT Review</span>
                                                    </a>

                                                    <div class="enterd_by">
                                                        <span>MDT Review </span> </span>
                                                        <div class="right_side_hjkl">

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
                                            <div class="appointments___list past_medical_history_ak diagnosis_data">
                                                <ul>
                                                    @if ($MDTs_db)
                                                        @forelse ($MDTs_db as $record)
                                                            <li>

                                                                <div class="appoin_date">
                                                                    <div class="read-more-content " style="">
                                                                        <div class="diagnosis_show">
                                                                            <p class="diagnosis_date "><span
                                                                                    class="enter_span_hivj">{{ 'Entered By |' . optional(optional($record)->doctor)->name ?? '' }}
                                                                                </span> <span
                                                                                    class="enter_span_hivj">{{ isset($record) && isset($record->created_at) ? $record->created_at->format('D, d M Y, H:i A') : '' }}
                                                                                </span></p>
                                                                            @php
                                                                                $MDT = json_decode($record->data_value, true);
                                                                                // echo "<pre>";
                                                                                //     print_r($MDT);
                                                                                //     die;
                                                                            @endphp


                                                                            @if (isset($MDT['PAE']) && $MDT['PAE'][0] == 'PAE')
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                            PAE</h6>

                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        {{ $MDT['PAENote'][0] ?? '' }}.</p>
                                                                                </div>
                                                                            @endif
                                                                            @if (isset($MDT['Medical']) && $MDT['Medical'][0] == 'Medical')
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                            Medical</h6>

                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        {{ $MDT['MedicalNote'][0] ?? '' }}.
                                                                                    </p>
                                                                                </div>
                                                                            @endif
                                                                            @if (isset($MDT['Surgical']) && $MDT['Surgical'][0] == 'Surgical')
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                            Surgical</h6>

                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        {{ $MDT['SurgicalNote'][0] ?? '' }}.
                                                                                    </p>
                                                                                </div>
                                                                            @endif
                                                                            @if (isset($MDT['OtherOptions']) && $MDT['OtherOptions'][0] == 'Other options')
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                            Other options</h6>

                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        {{ $MDT['OtherOptionsNote'][0] ?? '' }}.
                                                                                    </p>
                                                                                </div>
                                                                            @endif

                                                                            @if (!isset($MDT['OtherOptions']) || !isset($MDT['Surgical']) || !isset($MDT['Medical']) || !isset($MDT['PAE']))
                                                                                <div class="ss_result_box">
                                                                                    @foreach ($MDT as $key => $value)
                                                                                        <div class="symp_title mb-1">
                                                                                            <h6><span class="point_dia"><i
                                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                                {{ $key }}</h6>
                                                                                        </div>
                                                                                        <p class="ss_result">
                                                                                            {{ $value['asd'] ?? '' }}</p>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endif

                                                                        </div>



                                                                    </div>
                                                                    <button
                                                                        class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                        onclick="toggleReadMore(this)">Read More</button>
                                                                </div>
                                                            </li>
                                                        @empty
                                                            <small style="font-size:10px;">No Data Found</small>
                                                        @endforelse
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mm_title">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseleft19"
                                            aria-expanded="false" aria-controls="collapseleft19">
                                            <div class="top_title_mm_box">
                                                <h6 class="action_flex_ghi">
                                                    <a href="#" class="action_btn_tooltip" data-bs-toggle="modal"
                                                        data-bs-target="#eligibility_status">
                                                        <iconify-icon icon="solar:checklist-minimalistic-outline"
                                                            width="24"></iconify-icon>
                                                        <span class="toolTip">Eligibility Status</span>
                                                    </a>
                                                    <div class="enterd_by">
                                                        <span>Eligibility Status </span>
                                                        <div class="right_side_hjkl">

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
                                            <div class="appointments___list past_medical_history_ak diagnosis_data">
                                                <ul>
                                                    @if ($ElegibilitySTATUSDB)
                                                        @forelse ($ElegibilitySTATUSDB as $record)
                                                            <li>

                                                                <div class="appoin_date">
                                                                    <div class="read-more-content " style="">
                                                                        <div class="diagnosis_show">
                                                                            <p class="diagnosis_date "><span
                                                                                    class="enter_span_hivj">
                                                                                    {{ 'Entered By |' . optional(optional($record)->doctor)->name ?? '' }}
                                                                                </span> <span
                                                                                    class="enter_span_hivj">{{ isset($record) && isset($record->created_at) ? $record->created_at->format('D, d M Y, H:i A') : '' }}
                                                                                </span></p>
                                                                            @php
                                                                                $ElegibilitySTATUS = json_decode($record->data_value, true);
                                                                                // echo "<pre>";
                                                                                //     print_r($ElegibilitySTATUS);
                                                                                //     die;
                                                                            @endphp

                                                                            @if (isset($ElegibilitySTATUS['PAE']) && $ElegibilitySTATUS['PAE'][0] == 'PAE')
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                            PAE</h6>

                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        {{ $ElegibilitySTATUS['PAENote'][0] ?? '' }}.
                                                                                    </p>
                                                                                </div>
                                                                            @endif
                                                                            @if (isset($ElegibilitySTATUS['Medical']) && $ElegibilitySTATUS['Medical'][0] == 'Medical')
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                            Medical</h6>

                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        {{ $ElegibilitySTATUS['MedicalNote'][0] ?? '' }}.
                                                                                    </p>
                                                                                </div>
                                                                            @endif
                                                                            @if (isset($ElegibilitySTATUS['Surgical']) && $ElegibilitySTATUS['Surgical'][0] == 'Surgical')
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                            Surgical</h6>

                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        {{ $ElegibilitySTATUS['SurgicalNote'][0] ?? '' }}.
                                                                                    </p>
                                                                                </div>
                                                                            @endif
                                                                            @if (isset($ElegibilitySTATUS['OTHERS']) && $ElegibilitySTATUS['OTHERS'][0] == 'OTHERS')
                                                                                <div class="ss_result_box">
                                                                                    <div class="symp_title mb-1">
                                                                                        <h6><span class="point_dia"><i
                                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                                            Other options</h6>

                                                                                    </div>
                                                                                    <p class="ss_result">
                                                                                        {{ $ElegibilitySTATUS['OTHERSNote'][0] ?? '' }}.
                                                                                    </p>
                                                                                </div>
                                                                            @endif
                                                                            @if (
                                                                                !isset($ElegibilitySTATUS['OTHERS']) ||
                                                                                    !isset($ElegibilitySTATUS['PAE']) ||
                                                                                    !isset($ElegibilitySTATUS['Medical']) ||
                                                                                    !isset($ElegibilitySTATUS['Surgical']))
                                                                                <div class="ss_result_box">
                                                                                    @foreach ($ElegibilitySTATUS as $key => $value)
                                                                                        <div class="symp_title mb-1">
                                                                                            <h6><span class="point_dia"><i
                                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                                {{ $key }}</h6>
                                                                                        </div>
                                                                                        <p class="ss_result">
                                                                                            {{ $value['asd'] ?? '' }}</p>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endif
                                                                        </div>



                                                                    </div>
                                                                    <button
                                                                        class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                        onclick="toggleReadMore(this)">Read More</button>
                                                                </div>
                                                            </li>
                                                        @empty
                                                        @endforelse
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
                    <div class="card mb-3 border_yellow without_icon">
                        <div class="card-body p-0">
                            <div class="accordion acordignleft__small" id="accordionExample2">


                                <div class="accordion-item mm_title">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseleft20"
                                            aria-expanded="false" aria-controls="collapseleft20">
                                            <div class="top_title_mm_box">
                                                <h6 class="action_flex_ghi">
                                                    <div class="enterd_by">
                                                        <span>Procedure </span>
                                                        <div class="right_side_hjkl">

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
                                            <div class="appointments___list past_medical_history_ak diagnosis_data">
                                                <ul>
                                                    <li>

                                                        <div class="appoin_date">
                                                            <div class="read-more-content " style="">
                                                                <div class="diagnosis_show">
                                                                    <p class="diagnosis_date "><span
                                                                            class="enter_span_hivj"> Entered By | SAIF
                                                                            ALZAABI </span> <span
                                                                            class="enter_span_hivj">Sun, 22 Oct 2023,
                                                                            12:00</span></p>

                                                                    <div class="ss_result_box">
                                                                        <div class="symp_title mb-1">
                                                                            <h6><span class="point_dia"><i
                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                USTTAUL2180</h6>

                                                                        </div>

                                                                    </div>

                                                                    <div class="ss_result_box">
                                                                        <div class="symp_title mb-1">
                                                                            <h6><span class="point_dia"><i
                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                USTTABL2470</h6>

                                                                        </div>

                                                                    </div>

                                                                    <div class="ss_result_box">
                                                                        <div class="symp_title mb-1">
                                                                            <h6><span class="point_dia"><i
                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                LABPREIRBASIC32</h6>
                                                                        </div>

                                                                    </div>

                                                                    <div class="ss_result_box">
                                                                        <div class="symp_title mb-1">
                                                                            <h6><span class="point_dia"><i
                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                LABPREIRSAFETY17</h6>

                                                                        </div>

                                                                    </div>
                                                                </div>



                                                            </div>
                                                            <button
                                                                class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                onclick="toggleReadMore(this)">Read More</button>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item mm_title">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseleft21"
                                            aria-expanded="false" aria-controls="collapseleft21">
                                            <div class="top_title_mm_box">

                                                <h6 class="action_flex_ghi">
                                                    <div class="enterd_by">
                                                        <span>Supportive Treatment </span>
                                                        <div class="right_side_hjkl">

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
                                            <div class="appointments___list past_medical_history_ak diagnosis_data">
                                                <ul>
                                                    <li>

                                                        <div class="appoin_date">
                                                            <div class="read-more-content " style="">
                                                                <div class="diagnosis_show">
                                                                    <p class="diagnosis_date "><span
                                                                            class="enter_span_hivj"> Entered By | SAIF
                                                                            ALZAABI </span> <span
                                                                            class="enter_span_hivj">Sun, 22 Oct 2023,
                                                                            12:00</span></p>

                                                                    <div class="ss_result_box">
                                                                        <div class="symp_title mb-1">
                                                                            <h6><span class="point_dia"><i
                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                IVVITATHYROID175</h6>

                                                                        </div>

                                                                    </div>

                                                                    <div class="ss_result_box">
                                                                        <div class="symp_title mb-1">
                                                                            <h6><span class="point_dia"><i
                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                LABPREIVBASIC52</h6>

                                                                        </div>

                                                                    </div>

                                                                    <div class="ss_result_box">
                                                                        <div class="symp_title mb-1">
                                                                            <h6><span class="point_dia"><i
                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                LABPREIVADVANCED230</h6>
                                                                        </div>

                                                                    </div>


                                                                </div>



                                                            </div>
                                                            <button
                                                                class="btn btn_read read-more-btn past_history_readmorebtn"
                                                                onclick="toggleReadMore(this)">Read More</button>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item mm_title">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseleft9"
                                            aria-expanded="false" aria-controls="collapseleft9">
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
                                                    <li>
                                                        <div class="appoin_title">
                                                            <h6>Piriformis Muscle Injection</h6>
                                                        </div>
                                                        <div class="appoin_date">
                                                            <p>Sun, 22 October 2023 </p>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="appoin_title">
                                                            <h6>Follow up appointment</h6>
                                                        </div>
                                                        <div class="appoin_date">
                                                            <p>Sat, 21 October 2023 </p>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="appoin_title">
                                                            <h6>Medical Lazer Kit</h6>
                                                        </div>
                                                        <div class="appoin_date">
                                                            <p>Mon, 27 March 2023 </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="appoin_title">
                                                            <h6>Medical Lazer Kit</h6>
                                                        </div>
                                                        <div class="appoin_date">
                                                            <p>Mon, 13 March 2023 </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="appoin_title">
                                                            <h6>Medical Lazer Kit</h6>
                                                        </div>
                                                        <div class="appoin_date">
                                                            <p>Mon, 10 March 2023 </p>
                                                        </div>
                                                    </li>
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
                                            aria-expanded="false" aria-controls="collapseleft14">
                                            <div class="top_title_mm_box">
                                                <h6 class="action_flex_ghi">
                                                    <div class="enterd_by">
                                                        <span>Progress Notes | <span class="enter_span_hivj"> Entered
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
                                    <div id="collapseleft14" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample14">
                                        <div class="accordion-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            </p>
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









    <!----------------------------
         Add or Remove Diagnosis
        ---------------------------->
    <div class="modal fade edit_patient__" id="diagnosis" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Add or Remove Diagnosis</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <form id="Add_Diagnosis">
                    @csrf
                    <input type="hidden" value="{{ @$id }}" name="patient_id" />
                    <input type="hidden" value="prostate_form" name="formType" />
                    <div class="modal-body padding-0">
                        <div class="inner_data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="inner_element w-100">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Diagnosis Type</label>
                                            <select class="form-control select_diagnosis" id="diagnosis_type">
                                                <option value="">Choose Diagnosis Type</option>
                                                <option value="general">Provisional / Gernal diagnosis</option>
                                                <option value="icd">ICD 10 diagnosis</option>

                                            </select>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="validationCustom01" class="form-label">Add Diagnosis</label>
                                    <div class="category-container" id="category-container-4">
                                        <input type="text" class="form-control category-input"
                                            placeholder="Type Diagnosis here...">
                                        <button class="btn r-04 btn--theme hover--tra-black add_patient add-category"
                                            type="button"><i class="fa-solid fa-plus"></i> Add</button>
                                    </div>

                                </div>
                                <div class="col-lg-12">
                                    <div class="categories-list" id="categories-list-4">
                                        <!-- Categories will be displayed here -->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="action text-end bottom_modal">
                            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient"
                                data-bs-dismiss="modal">
                                Save</button>
                            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                                data-bs-dismiss="modal">
                                Close</a>
                        </div>
                    </div>
                </form>
                <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
           </div> -->
            </div>
        </div>
    </div>


    <!----------------------------
             Symptoms
        ---------------------------->
    <div class="modal fade edit_patient__" id="symptoms_add" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Add Symptoms</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <form id="Add_Symptoms_form" method="POST">
                    @csrf
                    <input type="hidden" value="{{ @$id }}" name="patient_id" />
                    <input type="hidden" value="prostate_form" name="formType" />
                    <div class="modal-body padding-0">
                        <div class="inner_data">
                            <div class="row">


                                <div class="col-lg-4">
                                    <div class="mb-3 form-group">
                                        <label for="validationCustom01" class="form-label">Type Symptom</label>
                                        <input type="text" class="form-control" id="SymptomType"
                                            placeholder="Type Symptom">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="inner_element">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Duration value</label>
                                            <select class="form-control select_symptoms" id="SymptomDurationValue">
                                                <option value="">Duration value</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>




                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="inner_element">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Duration Type</label>
                                            <select class="form-control select_symptoms" id="SymptomDurationType">
                                                <option value="">Duration Type</option>
                                                <option value="Days">Days</option>
                                                <option value="Weeks">Weeks</option>
                                                <option value="Months">Months</option>
                                                <option value="Years">Years</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="inner_element">
                                        <div class="form-group">
                                            <label for="validationCustom01" class="form-label">Note</label>
                                            <textarea class="form-control" placeholder="Type here..." style="height: 43px" id="SymptomDurationNote"> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-end">
                                    <a href="javascript:void(0)" class="diseases_name" id="addNewSymptoms">+ Add
                                        More</a>
                                </div>
                                <div class="add_data_diagnosis">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Symptom</th>
                                            <th>Duration Value</th>
                                            <th>Duration Type</th>
                                            <th>Notes</th>
                                            <th>Action</th>
                                        </tr>
                                        <tbody id="Symptoms">

                                        </tbody>
                                        {{-- <tr>
                                        <td>Urinary Frequency </td>
                                        <td>1</td>
                                        <td>Month</td>
                                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, saepe?</td>
                                        <td><a href="#" class="trash_btn"><i
                                                    class="fa-regular fa-trash-can"></i></a></td>
                                    </tr> --}}

                                    </table>
                                </div>
                                <!-- <div class="col-lg-12">
                <div class="mb-3 form-group">
                 <label for="validationCustom01" class="form-label">Write Summary</label>
                 <textarea class="form-control" placeholder="" style="height:150px"></textarea>
                </div>
               </div> -->

                            </div>
                        </div>
                        <div class="action text-end bottom_modal">
                            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient "
                                data-bs-dismiss="modal" id="add_symptoms">
                                Save</button>
                            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                                data-bs-dismiss="modal">
                                Close</a>
                        </div>
                    </div>
                </form>
                <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
           </div> -->
            </div>
        </div>
    </div>



    <!----------------------------
        clinical_exam
        ---------------------------->
    <div class="modal fade edit_patient__" id="clinical_exam" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Clinical Exam</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <form id="clinical_exam_form" method="POST">
                    @csrf
                    <input type="hidden" value="{{ @$id }}" name="patient_id" />
                    <input type="hidden" value="prostate_form" name="formType" />
                    <div class="modal-body padding-0">
                        <div class="inner_data eligiblity-form clinical_exam_box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6 class="mb-3 lut_title">Regional Exam</h6>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio"
                                                    name="clinical_exam[RegionalExam][]" value="Normal"
                                                    id="clinic_exam_1">
                                                <label class="form-check-label" for="clinic_exam_1">
                                                    Normal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio"
                                                    name="clinical_exam[RegionalExam][]" value="Abnormal"
                                                    id="clinic_exam_2">
                                                <label class="form-check-label" for="clinic_exam_2">
                                                    Abnormal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" id="abnormal_c2">
                                            <div class=" mb-3">
                                                <textarea class="form-control" placeholder="Enter Elaborate / notes here***" id="RegionalExamNote"
                                                    style="height: 100px" name="clinical_exam[RegionalExamNote][]"></textarea>
                                            </div>
                                            <span id="RegionalExamNoteError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6 class="mb-3 lut_title">Systemic Exam</h6>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio"
                                                    name="clinical_exam[SystemicExam][]" value="Normal"
                                                    id="clinic_exam_3">
                                                <label class="form-check-label" for="clinic_exam_3">
                                                    Normal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio"
                                                    name="clinical_exam[SystemicExam][]" value="Abnormal"
                                                    id="clinic_exam_4">
                                                <label class="form-check-label" for="clinic_exam_4">
                                                    Abnormal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" id="abnormal_c4">
                                            <div class="mb-3">
                                                <textarea class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"
                                                    id="SystemicExamNote" name="clinical_exam[SystemicExamNote][]"></textarea>
                                            </div>
                                            <span id="SystemicExamNoteError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="action text-end bottom_modal">
                            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">
                                Save</button>
                            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                                data-bs-dismiss="modal">
                                Close</a>
                        </div>
                    </div>
                </form>
                <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
           </div> -->
            </div>
        </div>
    </div>


    <!----------------------------
           order imagenairy Exam
        ---------------------------->
    <div class="modal fade edit_patient__" id="order_imagenairy" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Order Imaging Exam</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <form id="order_imaginary_exam_form">
                    @csrf
                    <input type="hidden" value="{{ @$id }}" name="patient_id" />
                    <input type="hidden" value="prostate_form" name="formType" />
                    <div class="modal-body padding-0">
                        <div class="inner_data">
                            <div class="row">
                                <!-- <div class="col-lg-12">
              <div class="title_head">
               <h4>Schedule Appointment</h4>
              </div>
             </div> -->
                                <!-- <div class="col-lg-12">
                <div class="inner_element w-100">
                 <div class="form-group">
                 <label for="validationCustom01" class="form-label">Select Tests</label>
                  <select class="form-control select2_imaginary_test" name="states[]" multiple="multiple">
                   <option value="">X ray</option>
                   <option value="">Ultrasound</option>
                   <option value="">endoscopy</option>
                   <option value="">CT Scan</option>
                   <option value="">MRI</option>
                  </select>
                 </div>
                </div>
               </div> -->

                                <div class="col-lg-12 mb-2">
                                    <label for="validationCustom01" class="form-label">Select Imaging Tests</label>
                                    <select id="sumo-select4" multiple name="test_name[]">
                                        @php
                                            $test_names = App\Models\patient\Order_imaginary_exam_test::orderBy('id', 'desc')->get();
                                        @endphp
                                        @foreach ($test_names as $test_name)
                                            <option value="{{ $test_name->id }}">{{ $test_name->test_name }}
                                            </option>
                                        @endforeach


                                    </select>
                                    <span id="testNameError" style="color: red;font-size:small"></span>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3 form-group">
                                        <label for="validationCustom01" class="form-label">Write Summary</label>
                                        <textarea class="form-control" placeholder="" style="height:150px" name="test_summery"></textarea>
                                    </div>
                                </div>





                            </div>
                        </div>
                        <div class="action text-end bottom_modal">
                            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">
                                Save</button>
                            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                                data-bs-dismiss="modal">
                                Close</a>
                        </div>
                    </div>
                </form>
                <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
           </div> -->
            </div>
        </div>
    </div>

    <!----------------------------
            Lab Test
        ---------------------------->
    <div class="modal fade edit_patient__" id="lab_test" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Order Lab Test</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <form id="order_lab_test_form" method="POST">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ @$id }}" />
                    <input type="hidden" value="prostate_form" name="formType" />
                    <div class="modal-body padding-0">
                        <div class="inner_data">
                            <div class="row top_head_vitals">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="validationCustom01" class="form-label">Select Lab Tests</label>
                                            <select id="sumo-select" multiple name="lab_test_names[]">
                                                @php
                                                    $patient_order_labs = App\Models\patient\Order_lab_test::orderBy('id', 'desc')->get();
                                                @endphp
                                                @foreach ($patient_order_labs as $patient_order_lab)
                                                    <option value="{{ $patient_order_lab->id }}">
                                                        {{ $patient_order_lab->test_name }}</option>
                                                @endforeach
                                            </select>
                                            <span id="LabTestNamesError" style="color: red;"></span>
                                        </div>

                                        <div class="col-lg-12">

                                            <div class="add_data_diagnosis mt-3">
                                                <h6 class="selected_testtitle"><span>Selected Tests <i
                                                            class="fa-solid fa-cart-shopping"></i></span> <span><a
                                                            href="all-lab-tests.php">View all Tests</a></span></h6>
                                                <table class="table lab_order_list">
                                                    <tbody id="lab_order_list_body"></tbody>
                                                    {{-- <tr>
                                                    <td>17 Hydroxyprogesterone</td>
                                                    <td>Turnaround Time : 1 Week</td>
                                                    <td><a href="#" class="trash_btn"><i
                                                                class="fa-solid fa-xmark"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>24 Hour Urinary Calcium</td>
                                                    <td>Turnaround Time : 3 days</td>
                                                    <td><a href="#" class="trash_btn"><i
                                                                class="fa-solid fa-xmark"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td>5 HIAA</td>
                                                    <td>Turnaround Time : 4 Days</td>
                                                    <td><a href="#" class="trash_btn"><i
                                                                class="fa-solid fa-xmark"></i></a></td>
                                                </tr> --}}
                                                </table>
                                            </div>
                                        </div>


                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="action text-end bottom_modal">
                            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">
                                Order</button>
                            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                                data-bs-dismiss="modal">
                                Cancel</a>
                        </div>
                    </div>
                </form>
                <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
           </div> -->
            </div>
        </div>
    </div>


    <!----------------------------
          Order Supportive Surface
        ---------------------------->
    <div class="modal fade edit_patient__" id="order_supportive_surface" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel"> Order Special Invistigation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <form id="OrderSpecialInvistigation" method="POST">
                    @csrf
                    <input type="hidden" value="{{ @$id }}" name="patient_id" />
                    <input type="hidden" value="prostate_form" name="formType" />
                    <div class="modal-body padding-0">
                        <div class="inner_data">
                            <div class="row">
                                <!-- <div class="col-lg-12">
              <div class="title_head">
               <h4>Schedule Appointment</h4>
              </div>
             </div> -->

                                <div class="col-lg-12">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3 form-group">
                                                <label for="validationCustom01" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="Title"
                                                    name="Title" placeholder="">
                                                <span id="TitleError" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3 form-group">
                                                <label for="validationCustom01" class="form-label">Sub Title</label>
                                                <input type="text" class="form-control" id="SubTitle"
                                                    name="SubTitle" placeholder="">
                                                <span id="SubTitleError" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3 form-group">
                                                <label for="validationCustom01" class="form-label">Write Special
                                                    Invistigation</label>
                                                <textarea class="form-control" placeholder="" style="height:100px" id="Invistigation" name="Invistigation"></textarea>
                                                <span id="InvistigationError" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                        <div class="action text-end bottom_modal">
                            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                                Save</button>
                            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                                data-bs-dismiss="modal">
                                Close</a>
                        </div>
                    </div>
                </form>
                <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
           </div> -->
            </div>
        </div>
    </div>

    <!----------------------------
          MDT Review
        ---------------------------->
    <div class="modal fade edit_patient__" id="mdt_review" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel"> MDT Review</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <form id="MDTReviewForm" method="POST">
                    @csrf
                    <input type="hidden" value="{{ @$id }}" name="patient_id" />
                    <input type="hidden" value="prostate_form" name="formType" />
                    <div class="modal-body padding-0">
                        <div class="inner_data">
                            <div class="row">
                                <div class="col-lg-12" id="MDTDecision">
                                    <div class="col-lg-12">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">MDT Decision</label>
                                            <input type="text" class="form-control" id="Decision" placeholder=""
                                                name="mdt_decision[]">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">

                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Enter Elaborate / notes
                                                here***</label>
                                            <textarea class="form-control" placeholder="" style="height:100px" name="mdt_elaborate[]"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-end">
                                        <a href="javascript:void(0)" class="diseases_name" id="add_mdt_diseases_btn">+
                                            Add More</a>
                                        <span><a href="javascript:void(0)" id="remove_MDTDecision"><i
                                                    class="fa-regular fa-trash-can"></i></a></span>
                                    </div>
                                </div>
                                <div id="MDTDecision-dynamic-sections">
                                    <!-- Initially empty; will contain dynamically added sections -->
                                </div>

                                {{-- <div class="col-lg-12">
                                <div class="mb-3 form-group">
                                    <label for="validationCustom01" class="form-label">Write Summary</label>
                                    <textarea class="form-control" placeholder="" style="height:100px" name="mdt_Summary"></textarea>
                                </div>
                            </div> --}}

                            </div>
                        </div>
                        <div class="action text-end bottom_modal">
                            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">
                                Save</button>
                            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                                data-bs-dismiss="modal">
                                Close</a>
                        </div>
                    </div>
                </form>
                <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
           </div> -->
            </div>
        </div>
    </div>


    <!----------------------------
          Eligibility Status
        ---------------------------->
    <div class="modal fade edit_patient__" id="eligibility_status" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel"> Eligibility Status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <form id="EligibilityStatusForm" method="POST">
                    @csrf
                    <input type="hidden" value="{{ @$id }}" name="patient_id" />
                    <input type="hidden" value="prostate_form" name="formType" />
                    <div class="modal-body padding-0">
                        <div class="inner_data">
                            <div class="row">
                                <!-- <div class="col-lg-12">
              <div class="title_head">
               <h4 class="mt-0">Choose MDT Decision</h4>
              </div>
             </div> -->
                                <div class="col-lg-12">
                                    <div class="row align-items-center">
                                        <div class="col-lg-12" id="add_eligiblity">
                                            <div class="col-lg-12">
                                                <div class="mb-3 form-group">
                                                    <label for="validationCustom01" class="form-label">Eligiblity
                                                        Title</label>
                                                    <input type="text" class="form-control" id=""
                                                        placeholder="" name="eligiblity_titles[]">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3 form-group">
                                                    <label for="validationCustom01" class="form-label">Enter Elaborate /
                                                        notes
                                                        here***</label>
                                                    <textarea class="form-control" placeholder="" style="height:100px" name="eligiblity_notes[]"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 text-end">
                                                <a href="javascript:void(0)" class="diseases_name"
                                                    id="add_eligiblity_diseases_btn">+ Add More</a>
                                                <span><a href="javascript:void(0)" id="remove_eligibility"><i
                                                            class="fa-regular fa-trash-can"></i></a></span>
                                            </div>

                                        </div>
                                        <div id="eligiblity-dynamic-sections">
                                            <!-- Initially empty; will contain dynamically added sections -->
                                        </div>
                                        {{-- <div class="col-lg-12">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Write Summary</label>
                                            <textarea class="form-control" placeholder="" style="height:100px" name="eligibility_summery"></textarea>
                                        </div>
                                    </div> --}}
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="action text-end bottom_modal">
                            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">
                                Save</button>
                            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                                data-bs-dismiss="modal">
                                Close</a>
                        </div>
                    </div>
                </form>
                <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
           </div> -->
            </div>
        </div>
    </div>

    @push('custom-js')
        <script>
            // Add or Remove Diagnosis
            $(document).ready(function() {
                var diagnosisData = {
                    general: [],
                    icd: []
                };

                $('.select_diagnosis').change(function() {

                    // $('.categories-list').empty(); // Clear existing categories
                    var diagnosisType = $(this).val();

                    $('.add-category').attr('data-diagnosis-type', diagnosisType);
                    $('.category-container .category-input').val('');


                });

                $('.add-category').click(function() {
                    var diagnosisType = $(this).attr('data-diagnosis-type');
                    var category = $('.category-container .category-input').val().trim();

                    if (category !== '') {
                        diagnosisData[diagnosisType].push(category);
                        var categoryItem = $('<div class="category">' + category +
                            '<i class="remove-category fas fa-times"></i></div>');
                        $('.categories-list').append(categoryItem);
                        $('.category-container .category-input').val('');

                    }
                });

                $('.categories-list').on('click', '.remove-category', function() {

                    var category = $(this).parent().text().trim();

                    // var diagnosisType = $('.select_diagnosis').val();
                    var diagnosisType = 'general';

                    if (diagnosisData[diagnosisType].includes(category)) {

                        diagnosisData[diagnosisType] = diagnosisData[diagnosisType].filter(function(item) {
                            return item !== category;
                        });
                        $(this).parent().remove();

                    } else {
                        var diagnosisType = 'icd';
                        diagnosisData[diagnosisType] = diagnosisData[diagnosisType].filter(function(item) {
                            return item !== category;
                        });
                        $(this).parent().remove();

                    }

                });

                // store into DB
                $('#Add_Diagnosis').submit(function(e) {
                    e.preventDefault();
                    var csrfToken = $('input[name="_token"]').val();
                    var formType = $('input[name="formType"]').val();
                    var patientId = $('input[name="patient_id"]').val();
                    $.ajax({
                        url: '{{ route('user.Add_Diagnosis') }}',
                        type: 'POST',
                        data: JSON.stringify({
                            _token: csrfToken,
                            Diagnosis: diagnosisData,
                            patient_id: patientId,
                            form_type: formType
                        }),
                        contentType: 'application/json',
                        success: function(result) {
                            $('#Symptoms').empty();


                            if (result != '') {

                                swal.fire(

                                    'Success',

                                    'Diagnosis Added successfully!',

                                    'success'

                                ).then(function() {
                                    location.reload();
                                });

                            } else {

                                swal.fire("Error!", "Enter valid Diagnosis Details!",
                                    "error");

                            }
                        },
                        error: function(error) {
                            swal.fire("Error!", "Enter valid Diagnosis Details!",
                                "error");
                        }
                    });

                });

            });
        </script>



        <script>
            // Add Symptoms
            $(document).ready(function() {



                $('#addNewSymptoms').click(function() {

                    let SymptomType = $("#SymptomType").val().trim();
                    let SymptomDurationNote = $("#SymptomDurationNote").val();
                    let SymptomDurationType = $("#SymptomDurationType").val();
                    let SymptomDurationValue = $("#SymptomDurationValue").val();


                    if (SymptomType.length >= 1) {
                        let microtime = Date.now();
                        let addressHtml = `<tr id="address${microtime}">
                                    <td hidden>
                                        <input name="SymptomType[]" hidden value="${SymptomType}">
                                        <input name="SymptomDurationValue[]" hidden value="${SymptomDurationValue}">
                                        <input name="SymptomDurationType[]" hidden value="${SymptomDurationType}">
                                        <input name="SymptomDurationNote[]" hidden value="${SymptomDurationNote}">
                                    </td>
                                    <td>
                                        ${SymptomType}
                                    </td>
                                    <td>
                                        ${SymptomDurationValue}
                                    </td>
                                    <td>
                                        ${SymptomDurationType}
                                    </td>
                                    <td>
                                        ${SymptomDurationNote}
                                    </td>


                                    <td><a href="javascript:void(0)" class="trash_btn" ><i
                                                    class="fa-regular fa-trash-can"></i></a></td>

                            </tr>`;
                        $("#Symptoms").append(addressHtml);
                    } else {
                        alert('Type Symptom is required');
                    }


                    $("#SymptomType").val('');
                    $("#SymptomDurationNote").val('');
                    $("#SymptomDurationType").val('');
                    $("#SymptomDurationValue").val('');

                    // delete row
                    $('.trash_btn').on('click', function() {

                        $(this).closest('tr').remove();

                        var filenumber = $(this).closest('tr').attr('id').replace('address', '');


                        if (filenumber !== 'none') {
                            $(`#Symptoms${filenumber}`).remove();
                        }
                    });
                });

                // store into DB
                $('#Add_Symptoms_form').submit(function(e) {
                    e.preventDefault();

                    $.ajax({
                        url: '{{ route('user.Add_Symptoms') }}',
                        type: 'POST',
                        data: $(this).serialize(),

                        success: function(result) {
                            $('.categories-list').empty();


                            if (result != '') {

                                swal.fire(

                                    'Success',

                                    'Symptoms Added successfully!',

                                    'success'

                                ).then(function() {
                                    location.reload();
                                });

                            } else {

                                swal.fire("Error!", "Enter valid Symptoms Details!",
                                    "error");

                            }
                        },
                        error: function(error) {
                            swal.fire("Error!", "Enter valid Symptoms Details!",
                                "error");
                        }
                    });

                });

            });
            // Add Symptoms end 
        </script>
        <!-- Order Special Invistigation form data -->


        <script>
            $(document).ready(function() {
                let patient_id = $('input[name="patient_id"]').val();
                $('#OrderSpecialInvistigation').submit(function(e) {
                    e.preventDefault();

                    let isValid = validateFormOrderSpecialInvistigation();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.OrderSpecialInvistigation') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#OrderSpecialInvistigation')[0].reset();
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Order Special Invistigation Added successfully!',

                                        'success'

                                    ).then(function() {
                                        location.reload();
                                    });

                                } else {

                                    swal.fire("Error!",
                                        "Enter valid Order Special Invistigation Details!",
                                        "error");

                                }
                            },
                            error: function(error) {
                                swal.fire("Error!",
                                    "Enter valid Order Special Invistigation Details!",
                                    "error");
                            }
                        });
                    }
                });


                function validateFormOrderSpecialInvistigation() {
                    let isValid = true;
                    // data-bs-dismiss="modal"
                    // Validate Title
                    let Title = $('select[name="Title"]').val();
                    if (Title === '') {

                        isValid = false;

                        $('#TitleError').text('Please select a Title');
                        $('select[name="Title"]').addClass('error');
                    }

                    // Validate SubTitle
                    let SubTitle = $('input[name="SubTitle"]').val();
                    if (SubTitle === '') {
                        isValid = false;

                        $('#SubTitleError').text('SubTitle is required');
                        $('input[name="SubTitle"]').addClass('error');
                    }



                    // Validate Invistigation
                    let Invistigation = $('textarea[name="Invistigation"]').val();
                    if (Invistigation === '') {
                        isValid = false;

                        $('#InvistigationError').text('Invistigation  is required');
                        $('textarea[name="Invistigation"]').addClass('error');
                    }


                    return isValid;
                }

            });
        </script>
        <!-- MDT Review start-->

        <script>
            $(document).ready(function() {
                let counter = 1;

                $(document).on('click', '#add_mdt_diseases_btn', function(e) {
                    e.preventDefault();

                    let newSection = $('#MDTDecision').clone();

                    newSection.attr('id', 'add_MDTDecision_' + counter);
                    newSection.find('input[type="text"]').val('');
                    newSection.find('textarea').val('');

                    $('#MDTDecision-dynamic-sections').append(newSection);
                    counter++;
                });

                $(document).on('click', '#remove_MDTDecision', function(e) {
                    e.preventDefault();
                    if (counter != 1) {
                        $(this).closest('.col-lg-12').parent().remove();
                        counter--;
                    }

                });
            });
        </script>
        <!-- MDT Review end here -->


        <!-- Add  MDT Review  form data into database-->
        <script>
            $(document).ready(function() {

                let patient_id = $('input[name="patient_id"]').val();
                $('#MDTReviewForm').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateFormMDTReview();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.MDTReview') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#MDTReviewForm')[0].reset();
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'MDT Review Added successfully!',

                                        'success'

                                    ).then(function() {
                                        location.reload();
                                    });

                                } else {

                                    swal.fire("Error!",
                                        "Enter valid MDT Review Details!", "error");

                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        });
                    }
                });


                function validateFormMDTReview() {
                    let isValid = true;
                    // Validate mdt_decision
                    let mdt_decision = $('input[name="mdt_decision"]').val();
                    if (mdt_decision === '') {
                        isValid = false;
                        $('#mdt_decisionError').text('Surgery Name is required');
                        $('input[name="mdt_decision"]').addClass('error');
                    }
                    // Validate mdt_elaborate
                    let mdt_elaborate = $('textarea[name="mdt_elaborate"]').val();
                    if (mdt_elaborate === '') {
                        isValid = false;
                        $('#mdt_elaborateError').text('Describe is required');
                        $('textarea[name="mdt_elaborate"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>
        <!-- End Add  MDT Review form data into database-->

        {{-- start --}}
        <!-- Eligibility Status start-->

        <script>
            $(document).ready(function() {
                let counter = 1;

                $(document).on('click', '#add_eligiblity_diseases_btn', function(e) {
                    e.preventDefault();

                    let newSection = $('#add_eligiblity').clone();

                    newSection.attr('id', 'add_eligiblity_' + counter);
                    newSection.find('input[type="text"]').val('');
                    newSection.find('textarea').val('');

                    $('#eligiblity-dynamic-sections').append(newSection);
                    counter++;
                });

                $(document).on('click', '#remove_eligibility', function(e) {
                    e.preventDefault();
                    if (counter != 1) {
                        $(this).closest('.col-lg-12').parent().remove();
                        counter--;
                    }

                });
            });
        </script>
        <!-- EligibilityStatus end here -->


        <!-- Add  Eligibility Status form data into database-->
        <script>
            $(document).ready(function() {

                let patient_id = $('input[name="patient_id"]').val();
                $('#EligibilityStatusForm').submit(function(e) {

                    e.preventDefault();

                    let isValid = validateFormEligibilityStatus();

                    if (isValid) {

                        $.ajax({
                            url: '{{ route('user.EligibilityStatus') }}',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(result) {
                                $('#EligibilityStatusForm')[0].reset();
                                // Call the function every second
                                setInterval(function() {
                                    $('[id*="Error"]').text('');
                                }, 1000);

                                if (result != '') {

                                    swal.fire(

                                        'Success',

                                        'Eligibility Status Added successfully!',

                                        'success'

                                    ).then(function() {
                                        location.reload();
                                    });

                                } else {

                                    swal.fire("Error!",
                                        "Enter valid Eligibility Status Details!", "error");

                                }
                            },
                            error: function(error) {
                                swal.fire("Error!",
                                    "Enter valid Eligibility Status Details!", "error");
                            }
                        });
                    }
                });


                function validateFormEligibilityStatus() {
                    let isValid = true;
                    // Validate eligiblity_titles
                    let eligiblity_titles = $('input[name="eligiblity_titles"]').val();
                    if (eligiblity_titles === '') {
                        isValid = false;
                        $('#eligiblity_titlesError').text('Eligiblity is required');
                        $('input[name="eligiblity_titles"]').addClass('error');
                    }
                    // Validate eligiblity_notes
                    let eligiblity_notes = $('textarea[name="eligiblity_notes"]').val();
                    if (eligiblity_notes === '') {
                        isValid = false;
                        $('#eligiblity_notesError').text('Describe is required');
                        $('textarea[name="eligiblity_notes"]').addClass('error');
                    }

                    return isValid;
                }

            });
        </script>
        <!-- End Add  Eligibility Status form data into database-->
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

                                    ).then(function() {
                                        location.reload();
                                    });

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

                    return true;
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

                                    swal.fire(

                                        'Success',

                                        'Order Lab Test Added successfully!',

                                        'success'

                                    )
                                    fetchAndDisplayPatientOrderLabTest(patient_id);
                                } else {

                                    swal.fire("Error!", "Enter valid Order Lab Test Details!",
                                        "error");

                                }
                            },
                            error: function(error) {
                                swal.fire("Error!", "Enter valid Order Lab Test Details!",
                                    "error");
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
                    location.reload();
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

                // let patient_id = $('input[name="patient_id"]').val();
                $.ajax({
                    url: '{{ route('user.drug_item_list') }}',
                    type: 'GET',
                    data: {
                        patient_id: patient_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        let patientData = $('#drug_table_body');
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
                        <a onclick="removeDrugItem(this, ${item.id})" class="trash_btn">
                          <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </td>
                </tr>`;

                                $("#drug_table_body").append(rowHtml2);
                            });


                        } else {
                            $('#drug_table_body').html('<tr><td colspan="8">No Drug Item found.</td></tr>');
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

                                    ).then(function() {
                                        location.reload();
                                    });

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
                    if ($('#clinic_exam_2').is(':checked')) {
                        let RegionalExamNote = $('#RegionalExamNote').val();
                        if (RegionalExamNote === '') {
                            isValid = false;
                            $('#RegionalExamNoteError').text('Text is required');
                            $('RegionalExamNote').addClass('error');
                        }
                    }
                    if ($('#clinic_exam_4').is(':checked')) {
                        let SystemicExamNote = $('#SystemicExamNote').val();
                        if (SystemicExamNote === '') {
                            isValid = false;
                            $('#SystemicExamNoteError').text('Text is required');
                            $('SystemicExamNote').addClass('error');
                        }
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

                                    ).then(function() {
                                        location.reload();
                                    });

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
                                swal.fire("Error!", "Enter valid Past Medical History Details!",
                                    "error");
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

                                    ).then(function() {
                                        location.reload();
                                    });

                                } else {

                                    swal.fire("Error!",
                                        "Enter valid Past Surgical History Details!", "error");

                                }
                            },
                            error: function(error) {
                                swal.fire("Error!",
                                    "Enter valid Past Surgical History Details!", "error");
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
                    location.reload();
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
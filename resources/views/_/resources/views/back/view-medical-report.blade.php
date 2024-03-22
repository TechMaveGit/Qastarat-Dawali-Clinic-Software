@extends('back.layout.main_view')

@push('title')

Medical report | QASTARAT & DAWALI CLINICS 

@endpush

@section('content-section')

@push('custom-css')

<style>

    .wsmainwp {

        background: #f9f9fd;

     }

  </style>

@endpush





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

          <div class="left_mm">

            <div class="view_record_icon">

            <a href="#" class="action_btn_tooltip " data-bs-toggle="modal" data-bs-target="#consent_form">

            <iconify-icon icon="fluent:form-new-48-regular" width="22"></iconify-icon>

                  <span class="toolTip">Eligibility Forms</span>

                </a>

                <a href="{{ route('front.service.page') }}" class="action_btn_tooltip pae_eligibility_">

                  <iconify-icon icon="healthicons:health-worker-form-outline" width="22"></iconify-icon>

                  <span class="toolTip">PAE Eligiblity</span>

                </a>

            </div>

         

         

          </div>

          <!-- <div class="middle_mm">

            

          </div> -->

          <div class="right_mm">

          <div class="view_record_icon">

          <a href="{{ route('user.patient',['id'=>@$id]) }}" class="action_btn_tooltip vitals" data-bs-toggle="offcanvas" data-bs-target="#add_vitals"

                aria-controls="offcanvasBottom" >

                <iconify-icon icon="carbon:temperature-max" width="20"></iconify-icon>

                <span class="toolTip">Enter Vitals</span>

              </a>

              <a href="#" class="action_btn_tooltip proress_notes" data-bs-toggle="modal" data-bs-target="#add_new_note">

                <iconify-icon icon="simple-line-icons:plus" width="20"></iconify-icon>

                <span class="toolTip">Progress notes / New note</span>

              </a>

              <a href="#" class="action_btn_tooltip order_imaginary_exam" data-bs-toggle="modal" data-bs-target="#order_imagenairy"

                aria-controls="offcanvasBottom">

                <!-- <iconify-icon icon="akar-icons:thunder" width="20"></iconify-icon> -->

                <iconify-icon icon="mdi:x-ray-box-outline" width="24"></iconify-icon>

                <span class="toolTip">Order Imaginary Exam</span>

              </a>

              <a href="#" class="action_btn_tooltip OrderLabTest" data-bs-toggle="modal" data-bs-target="#lab_test">

                <iconify-icon icon="entypo:lab-flask" width="20"></iconify-icon>

                <span class="toolTip">Order Lab Test</span>

              </a>

              <!-- <a href="#" class="action_btn_tooltip " data-bs-toggle="modal" data-bs-target="#consent_form">

                <iconify-icon icon="fluent:form-multiple-48-regular" width="22"></iconify-icon>

                <span class="toolTip">Consent Forms</span>

              </a> -->

              <a href="#" class="action_btn_tooltip">

                <iconify-icon icon="fluent:form-multiple-48-regular" width="22"></iconify-icon>

                <span class="toolTip">Consent Forms</span>

              </a>

              <!-- <a href="#" class="action_btn_tooltip" data-bs-toggle="offcanvas" data-bs-target="#diagnosis" aria-controls="offcanvasBottom">

                               <iconify-icon icon="maki:doctor" width="20"></iconify-icon>

                                <span class="toolTip">Add a diagnosis</span>

                            </a>

                            <a href="#" class="action_btn_tooltip" data-bs-toggle="offcanvas" data-bs-target="#medicine_add_edit" aria-controls="offcanvasBottom">

                            <iconify-icon icon="solar:document-medicine-linear" width="20"></iconify-icon>

                                <span class="toolTip">Add/Edit Drugs</span>

                            </a> -->

              <a href="#" class="action_btn_tooltip invoice_item" data-bs-toggle="modal" data-bs-target="#invoice_add">

                <iconify-icon icon="la:file-invoice-dollar" width="20"></iconify-icon>

                <span class="toolTip">Add an Invoice Item</span>

              </a>

              <!-- <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#followup_note">

                <iconify-icon icon="la:edit" width="20"></iconify-icon>

                <span class="toolTip">Follow Up Notes</span>

              </a> -->

              <!-- <a href="patient.php" class="action_btn_tooltip" data-bs-toggle="offcanvas" data-bs-target="#new_letter"

                aria-controls="offcanvasBottom">

                <iconify-icon icon="la:edit" width="20"></iconify-icon>

                <span class="toolTip">Write a New letter</span>

              </a> -->

              <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#new_task">

                <iconify-icon icon="mdi:bell-outline" width="20"></iconify-icon>

                <span class="toolTip">Add a task (reminder)</span>

              </a>

              <!-- <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#discharge_instruction">

              <iconify-icon icon="healthicons:discharge" width="26"></iconify-icon>

                <span class="toolTip">Discharge Instruction</span>

              </a> -->

            

              <!-- <a href="patient.php" class="action_btn_tooltip" data-bs-toggle="offcanvas" data-bs-target="#refer_patient" aria-controls="offcanvasBottom">

                            <iconify-icon icon="codicon:references" width="20"></iconify-icon>

                                <span class="toolTip">Refer this patient</span>

                            </a> -->

              <a href="#" class="action_btn_tooltip">

                <iconify-icon icon="uit:print" width="24"></iconify-icon>

                <span class="toolTip">Print all notes</span>

              </a>

              <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#make_appointment">

                <iconify-icon icon="formkit:date"></iconify-icon>

                <span class="toolTip">Make an Appointment</span>

              </a>

              <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#video_meeting">

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

      <div class="col-lg-5">

        <div class="left_side_bxx_">

          <div class="left_ss_icon_aks">

            <div class="view_record_icon left_side_icon_inner">

              <!-- <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#executive_summary">

                <iconify-icon icon="ph:note" width="20"></iconify-icon>

                <span class="toolTip">Executive Summary</span>

              </a> -->

                <a href="#" class="action_btn_tooltip">

                <iconify-icon icon="carbon:report" width="22"></iconify-icon>

                <span class="toolTip">Generate Report</span>

              </a>

              <!-- <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#diagnosis">

                <iconify-icon icon="material-symbols-light:diagnosis-outline-rounded" width="20"></iconify-icon>

                <span class="toolTip">Diagnosis</span>

              </a> -->

              <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#past_medical">

                <iconify-icon icon="solar:history-3-line-duotone" width="20"></iconify-icon>

                <span class="toolTip">Past Medical History</span>

              </a>

              <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#past_surgical">

                <iconify-icon icon="healthicons:surgical-sterilization-outline" width="20"></iconify-icon>

                <span class="toolTip">Past surgical History</span>

              </a>

              <a href="#" class="action_btn_tooltip drug_add" data-bs-toggle="modal" data-bs-target="#medicine_add_edit">

                <iconify-icon icon="covid:vaccine-protection-medicine-pill" width="20"></iconify-icon>

                <span class="toolTip">Drugs / Current Meds</span>

              </a>

              <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#allergies_add">

                <iconify-icon icon="healthicons:allergies-outline" width="20"></iconify-icon>

                <span class="toolTip">Allergies</span>

              </a>

              <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#symptoms_add">

                <iconify-icon icon="covid:symptoms-virus-loss-smell-1" width="20"></iconify-icon>

                <span class="toolTip">Symptoms</span>

              </a>

              <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#clinical_exam"> 

                <iconify-icon icon="healthicons:clinical-fe-outline" width="20"></iconify-icon>

                <span class="toolTip">Clinical Exam</span>

              </a>

             

              <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#future_plans">

                <iconify-icon icon="material-symbols-light:list-alt-outline" width="20"></iconify-icon>

                <span class="toolTip">Future Plans</span>

              </a>

              <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#refer_patient"

                aria-controls="offcanvasBottom">

                <iconify-icon icon="codicon:references" width="20"></iconify-icon>

                <span class="toolTip">Referrals</span>

              </a>

              <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#special_notes">

                <iconify-icon icon="solar:notes-outline" width="20"></iconify-icon>

                <span class="toolTip">Special Notes</span>

              </a>

            

              

           

              <!-- <a href="#" class="action_btn_tooltip " data-bs-toggle="modal" data-bs-target="#procedure_list">

                <iconify-icon icon="carbon:list-dropdown" width="20"></iconify-icon>

                <span class="toolTip">list of procedure</span>

              </a> -->

            

            </div>





          </div>



          <div class="left_side">

            <!-- <div class="download_pdf">

            <a href="#" class="action_btn_tooltip" >

            <iconify-icon icon="solar:download-broken"></iconify-icon>

                <span class="toolTip">Download PDF</span>

              </a>

            </div>

        -->
           <input type="hidden" name="patient_id" value="{{ @$id }}"/>
            <div class="profile_img">

              <img src="{{ url('public/assets') }}/images/{{ @$patient->patient_profile_img }}" alt="">

              <div class="insure_btn">

                <a href="#" class="outline_btn add_insurer" data-bs-toggle="modal" data-bs-target="#insure_add_edit">Add Insurer</a>

              </div>

              <div class="patient_dt_profile">

                <h5 class="patient_name__">{{ @$patient->sirname.' '. @$patient->name }} <a href="{{ route('user.patient-detail',['id'=>@$id]) }}"><iconify-icon icon="material-symbols:edit"></iconify-icon></a></h5>
                @php
                if(!empty(@$patient->birth_date) ){
                  $birthDate = \Carbon\Carbon::createFromFormat('d M, Y', @$patient->birth_date);
                $patientBirthDate=  $birthDate->diffInYears(\Carbon\Carbon::now());
                }else{
                  $patientBirthDate=null;
                }
                    
                @endphp
                <p class="patient_age__">{{ $patientBirthDate }} Years , <span class="patient_id__">{{ @$patient->patient_id }}</span></p>

                <p class="insurance_dt">Niva Healthcare Insurance - <span>{{ @$patient->mobile_no }}</span></p>

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

                      data-bs-target="#collapseleft1" aria-expanded="true" aria-controls="collapseleft1">

                      <div class="top_title_mm_box key_diagnosis">

                        <h6>Key Diagnosis</h6>



                      </div>

                    </button>

                  </h2>

                  <div id="collapseleft1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample2">

                    <div class="accordion-body ">

              

                      <div class="diagnosis_type">

                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span> Provisional / Gernal diagnosis</h6>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

                      </div>

                      <div class="diagnosis_type">

                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span> ICD 10</h6>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

                      </div>

                     

                    </div>

                  </div>

                </div>

                <div class="accordion-item mm_title">

                  <h2 class="accordion-header">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"

                      data-bs-target="#collapseleft3" aria-expanded="false" aria-controls="collapseleft3">

                      <div class="top_title_mm_box">

                        <h6>Past Medical History</h6>



                      </div>

                    </button>

                  </h2>
                  <div id="collapseleft3" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">

                    <div class="accordion-body">



                      <div class="appointments___list past_medical_history_ak">
                        @if(!empty($patentientDetails['patientMedicalHistory']) && $patentientDetails['patientMedicalHistory']!= null)
                        <ul id="past_medical_list_append">
                        @foreach($patentientDetails['patientMedicalHistory'] as $key =>$patientMedicalHistory)
                          <li>

                            <div class="appoin_title">

                              <h6>{{isset($patientMedicalHistory->diseases_name) ? ucfirst($patientMedicalHistory->diseases_name) : "" }}</h6>

                              <p>{{isset($patientMedicalHistory->created_at) ? \Carbon\Carbon::parse($patientMedicalHistory->created_at)->format('l d M Y') : "" }}</p>

                            </div>

                            <div class="appoin_date">

                              <div class="read-more-content">

                            <p>
                            {{isset($patientMedicalHistory->describe) ? ucfirst($patientMedicalHistory->describe) : "" }}
                            </p>

                            </div>

                              <button class="btn btn_read read-more-btn past_history_readmorebtn" onclick="toggleReadMore(this)">Read More</button>

                            </div>

                          </li> 
                          @endforeach
                          @else
                          <li><p>
                            No Records Found
                          </p>
                          </li>
                        </ul>
                        @endif
                      </div>

                    </div>

                  </div>

                </div>



                <div class="accordion-item mm_title">

                  <h2 class="accordion-header">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"

                      data-bs-target="#collapseleft4" aria-expanded="false" aria-controls="collapseleft4">

                      <div class="top_title_mm_box">

                        <h6>Past Surgical History</h6>



                      </div>

                    </button>

                  </h2>

                  <div id="collapseleft4" class="accordion-collapse collapse" data-bs-parent="#accordionExample4">

                    <div class="accordion-body">



                    <div class="appointments___list past_medical_history_ak">
                    @if(!empty($patentientDetails['patientSurgicalHistory']) && $patentientDetails['patientSurgicalHistory']!= null)
                      <ul id="get_patientSurgicalHistory">
                          @foreach($patentientDetails['patientSurgicalHistory'] as $key => $patientSurgicalHistory)
                        <li>

                          <div class="appoin_title">

                            <h6>{{isset($patientSurgicalHistory->diseases_name) ? $patientSurgicalHistory->diseases_name : ''}}</h6>

                            <p>{{isset($patientSurgicalHistory->created_at) ? \Carbon\Carbon::parse($patientSurgicalHistory->created_at)->format('l d M Y') : "" }}</p>

                          </div>

                          <div class="appoin_date">

                            <div class="read-more-content">

                        <p>{{isset($patientSurgicalHistory->describe) ? $patientSurgicalHistory->describe : ''}}</p>

                      </div>

                      <button class="btn btn_read read-more-btn past_history_readmorebtn" onclick="toggleReadMore(this)">Read More</button>

                          </div>
                        </li>
                        @endforeach
                      </ul>
                      @endif

                      </div>

                    </div>

                  </div>

                </div>

                <div class="accordion-item mm_title">

                  <h2 class="accordion-header">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"

                      data-bs-target="#collapseleft6" aria-expanded="false" aria-controls="collapseleft6">

                      <div class="top_title_mm_box">

                        <h6>Drugs / Current meds</h6>

                      </div>

                    </button>

                  </h2>

                  <div id="collapseleft6" class="accordion-collapse collapse" data-bs-parent="#accordionExample6">

                    <div class="accordion-body">

                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>



                    </div>

                  </div>

                </div>

                <div class="accordion-item mm_title">

                  <h2 class="accordion-header">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"

                      data-bs-target="#collapseleft7" aria-expanded="false" aria-controls="collapseleft7">

                      <div class="top_title_mm_box">

                        <h6>Allergies</h6>

                      </div>

                    </button>

                  </h2>

                  <div id="collapseleft7" class="accordion-collapse collapse" data-bs-parent="#accordionExample7">

                    <div class="accordion-body">

                      <ul class="symptoms">

                        <li>eggs, especially the whites</li>

                        <li>fish</li>

                        <li>milk</li>

                        <li>peanuts</li>

                        <li>tree nuts</li>

                        <li>crustacean shellfish</li>

                        <li>wheat</li>

                        <li>soy</li>

                      </ul>

                    </div>

                  </div>

                </div>

                <div class="accordion-item mm_title">

                  <h2 class="accordion-header">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"

                      data-bs-target="#collapseleft2" aria-expanded="false" aria-controls="collapseleft2">

                      <div class="top_title_mm_box">

                        <h6>Symptoms</h6>



                      </div>

                    </button>

                  </h2>

                  <div id="collapseleft2" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">

                    <div class="accordion-body">

                      <div class="prescription_btn_mm_box">

                        <!-- <a href="#" class="prescription_btn" >Prescription</a> -->

                        <ul class="symptoms">

                          <li class="draggable" draggable="true">high fever (40°C/104°F)</li>

                          <li class="draggable" draggable="true">severe headache</li>

                          <li class="draggable" draggable="true">pain behind the eyes.</li>

                          <li class="draggable" draggable="true">muscle and joint pains.</li>

                          <li class="draggable" draggable="true">nausea</li>

                          <li class="draggable" draggable="true">vomiting</li>

                          <li class="draggable" draggable="true">swollen glands</li>

                          <li class="draggable" draggable="true">rash</li>

                        </ul>

                      </div>

                    </div>

                  </div>

                </div>

                



                <div class="accordion-item mm_title">

                  <h2 class="accordion-header">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"

                      data-bs-target="#collapseleft5" aria-expanded="false" aria-controls="collapseleft5">

                      <div class="top_title_mm_box">

                        <h6>Clinical Exam</h6>



                      </div>

                    </button>

                  </h2>

                  <div id="collapseleft5" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">

                    <div class="accordion-body">

                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>



                    </div>

                  </div>

                </div>



            



                

                

                <div class="accordion-item mm_title">

                  <h2 class="accordion-header">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"

                      data-bs-target="#collapseleft9" aria-expanded="false" aria-controls="collapseleft9">

                      <div class="top_title_mm_box">

                        <h6>Future Plans</h6>



                      </div>

                    </button>

                  </h2>

                  <div id="collapseleft9" class="accordion-collapse collapse" data-bs-parent="#accordionExample9">

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

                <div class="accordion-item mm_title">

                  <h2 class="accordion-header">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"

                      data-bs-target="#collapseleft11" aria-expanded="false" aria-controls="collapseleft11">

                      <div class="top_title_mm_box">

                        <h6>Referrals</h6>

                      </div>

                    </button>

                  </h2>

                  <div id="collapseleft11" class="accordion-collapse collapse" data-bs-parent="#accordionExample11">

                    <div class="accordion-body">

                      <ul class="referrals_list">

                        <li>

                          <div class="booking_card_select">



                            <label for="cbx1">

                              <div class="doctor_dt">

                                <div class="image_dr">

                                  <img src="images/new-images/avtar.jpg" alt="">

                                </div>

                                <div class="dr_detail">

                                  <h6 class="dr_name">Abbigail Titmus <span>(MBBS)</span></h6>

                                  <p class="dr_email"><a href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a></p>

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

                                  <img src="images/new-images/avtar.jpg" alt="">

                                </div>

                                <div class="dr_detail">

                                  <h6 class="dr_name">Abbigail Titmus <span>(MBBS)</span></h6>

                                  <p class="dr_email"><a href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a></p>

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

                                  <img src="images/new-images/avtar.jpg" alt="">

                                </div>

                                <div class="dr_detail">

                                  <h6 class="dr_name">Abbigail Titmus <span>(MBBS)</span></h6>

                                  <p class="dr_email"><a href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a></p>

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

                                  <img src="images/new-images/avtar.jpg" alt="">

                                </div>

                                <div class="dr_detail">

                                  <h6 class="dr_name">Abbigail Titmus <span>(MBBS)</span></h6>

                                  <p class="dr_email"><a href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a></p>

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

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"

                      data-bs-target="#collapseleft12" aria-expanded="false" aria-controls="collapseleft12">

                      <div class="top_title_mm_box">

                        <h6>Special Notes</h6>

                      </div>

                    </button>

                  </h2>

                  <div id="collapseleft12" class="accordion-collapse collapse" data-bs-parent="#accordionExample12">

                    <div class="accordion-body">

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>

                    </div>

                  </div>

                </div>

                <div class="accordion-item mm_title">

                  <h2 class="accordion-header">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"

                      data-bs-target="#collapseleft10" aria-expanded="false" aria-controls="collapseleft10">

                      <div class="top_title_mm_box">

                        <h6>List of procedures</h6>

                      </div>

                    </button>

                  </h2>

                  <div id="collapseleft10" class="accordion-collapse collapse" data-bs-parent="#accordionExample10">

                    <div class="accordion-body">

                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi optio perferendis, ipsum cupiditate eligendi repudiandae?</p>

                    </div>

                  </div>

                </div>

                <div class="accordion-item mm_title">

                  <h2 class="accordion-header">

                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"

                      data-bs-target="#collapseleft8" aria-expanded="false" aria-controls="collapseleft8">

                      <div class="top_title_mm_box">

                        <h6>List of Visit</h6>

                      </div>

                    </button>

                  </h2>

                  <div id="collapseleft8" class="accordion-collapse collapse" data-bs-parent="#accordionExample8">

                    <div class="accordion-body">

                    <div class="appointments___list">



                      <ul>

                        <li>

                          <div class="appoin_date">

                            <p>Sun, 22 October 2023 </p>

                          </div>

                        </li>



                        <li>

                         

                          <div class="appoin_date">

                            <p>Sat, 21 October 2023 </p>

                          </div>

                        </li>



                        <li>

                         

                          <div class="appoin_date">

                            <p>Mon, 27 March 2023 </p>

                          </div>

                        </li>

                        <li>

                         

                          <div class="appoin_date">

                            <p>Mon, 13 March 2023 </p>

                          </div>

                        </li>

                        <li>

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

        </div>





      </div>



      <div class="col-lg-7">

        <div class="right_side_mm_box">



          <div class="accordion" id="accordionExample">

            <div class="accordion-item dt_box">

              <h2 class="accordion-header">

                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"

                  aria-expanded="true" aria-controls="collapseOne">

                  <div class="dt_head">

                    <h5>Discharge Summary Entered By | SAIF ALZAABI | Sat 21st Oct, 2023, 1:39 pm  </h5>

                    <div class="actions_icons">

                      <div class="action_list">

                        <ul>

                          <li><a href="#" class="bottom_btn view_btn"><i class="fa-regular fa-eye"></i> View</a></li>

                          <li><a href="#" class="bottom_btn attach_btn" data-bs-toggle="modal" data-bs-target="#attach_document"><i class="fa-solid fa-paperclip"></i> Attach</a>

                          </li>

                          <li><a href="#" class="bottom_btn print_btn"><i class="fa-solid fa-print"></i> Print</a></li>

                          <div class="customdotdropdown">

                            <div class="buttondrop_dot">

                              <i class="fa-solid fa-ellipsis-vertical"></i>

                            </div>

                            <div class="dropdown-content">

                              <a href="#" class="bottom_btn copy_btn"><i class="fa-regular fa-copy"></i> Copy Note Text

                              </a>

                              <a href="#" class="bottom_btn extract_btn" data-bs-toggle="modal"

                                data-bs-target="#extract_code"><i class="fa-solid fa-wand-magic-sparkles"></i> Extracts

                                Code & Drugs</a>

                              <a href="#" class="bottom_btn delete_btn"><i class="fa-regular fa-trash-can"></i>

                                Delete</a>

                            </div>

                          </div>

                        </ul>

                      </div>

                    </div>

                  </div>

                </button>

              </h2>

              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">

                <div class="accordion-body">

                  <div class="dt_body">

                    <ul class="procedure_list">

                      <li>

                        <h6>Vitals</h6>

                        <p>Height - 162CM, Weight - 70KG, BP - 90/60mmHg </p>

                      </li>

                      <li>

                        <h6>Progress Notes</h6>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, officiis.</p>

                        <p class="last_edit">Text edited by SAIF ALZAABI on 21 Oct 2023 17:36</p>

                      </li>

                      <li>

                        <h6>Imaginary Exams</h6>

                        <div class="img_exam">

                          <p>

                           <span>X-ray</span>, <span>Ultrasound</span>, <span>MRI</span>

                          </p>

                        </div>

                        <!-- <div class="read-more-content">

                          <p>

                           <span>X-ray</span> <span>Ultrasound</span> <span>MRI</span>

                          </p>

                        </div> -->

                        <!-- <button class="btn btn_read read-more-btn" onclick="toggleReadMore(this)">Read More</button> -->

                      





                      </li>

                      <li>

                        <h6>Lab Test</h6>

                        <p><span>Acetone</span>, <span>6-TGN</span>, <span>Active B12</span>, <span>Adenovirus PCR</span></p>

                       

                      </li>

                      <li>

                        <h6>Follow Up Notes</h6>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, sed.</p>

                       

                      </li>

                      <li>

                        <h6>Discharge Instruction</h6>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, sed.</p>

                       

                      </li>

                 

                      <li>

                        <h6>Next Appointment</h6>

                        <div class="appointments___list appointment_boxx">

                                  <div class="appoin_title">

                                  <h6>Piriformis Muscle Injection</h6> 

                                  </div>

                                  <div class="appoin_date">

                                      <p>Sun, 22 October 2023, 10:00</p>

                                  </div>

                          

                      </div>

                      </li>

                    </ul>

                    <!-- <a href="#" class="letter_btn"><i class="fa-regular fa-file-lines"></i> Letter to patient</a> -->

                  </div>

                </div>

              </div>

            </div>



            <div class="accordion-item dt_box">

              <h2 class="accordion-header">

                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"

                  data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                  <div class="dt_head">

                    <h5>Discharge Summary Entered By | SAIF ALZAABI | Tue 14th Nov, 2023, 2:39 pm </h5>

                    <div class="actions_icons">

                      <div class="action_list">

                        <ul>

                          <li><a href="#" class="bottom_btn view_btn"><i class="fa-regular fa-eye"></i> View</a></li>

                          <li><a href="#" class="bottom_btn attach_btn" data-bs-toggle="modal" data-bs-target="#attach_document"><i class="fa-solid fa-paperclip"></i> Attach</a>

                          </li>

                          <li><a href="#" class="bottom_btn print_btn"><i class="fa-solid fa-print"></i> Print</a></li>

                          <div class="customdotdropdown">

                            <div class="buttondrop_dot">

                              <i class="fa-solid fa-ellipsis-vertical"></i>

                            </div>

                            <div class="dropdown-content">

                              <a href="#" class="bottom_btn copy_btn"><i class="fa-regular fa-copy"></i> Copy Note Text

                              </a>

                              <a href="#" class="bottom_btn extract_btn" data-bs-toggle="modal"

                                data-bs-target="#extract_code"><i class="fa-solid fa-wand-magic-sparkles"></i> Extracts

                                Code & Drugs</a>

                              <a href="#" class="bottom_btn delete_btn"><i class="fa-regular fa-trash-can"></i>

                                Delete</a>

                            </div>

                          </div>

                        </ul>

                      </div>

                    </div>

                  </div>

                </button>

              </h2>

              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">

                <div class="accordion-body">

                  <div class="dt_body">

                  <ul class="procedure_list">

                      <li>

                        <h6>Vitals</h6>

                        <p>Height - 162CM, Weight - 70KG, BP - 90/60mmHg </p>

                      </li>

                      <li>

                        <h6>Progress Notes</h6>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, officiis.</p>

                        <p class="last_edit">Text edited by SAIF ALZAABI on 21 Oct 2023 17:36</p>

                      </li>

                      <li>

                        <h6>Imaginary Exams</h6>

                        <div class="img_exam">

                          <p>

                           <span>X-ray</span>, <span>Ultrasound</span>, <span>MRI</span>

                          </p>

                        </div>

                        <!-- <div class="read-more-content">

                          <p>

                           <span>X-ray</span> <span>Ultrasound</span> <span>MRI</span>

                          </p>

                        </div> -->

                        <!-- <button class="btn btn_read read-more-btn" onclick="toggleReadMore(this)">Read More</button> -->

                      





                      </li>

                      <li>

                        <h6>Lab Test</h6>

                        <p><span>Acetone</span>, <span>6-TGN</span>, <span>Active B12</span>, <span>Adenovirus PCR</span></p>

                       

                      </li>

                      <li>

                        <h6>Follow Up Notes</h6>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, sed.</p>

                       

                      </li>

                      <li>

                        <h6>Discharge Instruction</h6>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, sed.</p>

                       

                      </li>

                 

                      <li>

                        <h6>Next Appointment</h6>

                        <div class="appointments___list appointment_boxx">

                                  <div class="appoin_title">

                                  <h6>Piriformis Muscle Injection</h6> 

                                  </div>

                                  <div class="appoin_date">

                                      <p>Sun, 22 October 2023, 10:00</p>

                                  </div>

                          

                      </div>

                      </li>

                    </ul>

                    <!-- <a href="#" class="letter_btn"><i class="fa-regular fa-file-lines"></i> Letter to patient</a> -->

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
                  url: '{{ route("user.patient_vital") }}',
                  type: 'POST',
                  data: $(this).serialize(),
                  success: function(result) {
                      $('#add_measurement')[0].reset();
                      // $('#add_patient').modal('hide'); 

                      if(result!=''){

                          swal.fire(

                              'Success',

                              'Vital Measurement Added successfully!',

                              'success'

                          )
                           fetchAndDisplayPatientVital(patient_id); 
                          }else{

                          swal.fire("Error!", "Enter valid Vital Measuremen Details!", "error");

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
          url: '{{ route("user.patient_vital_list") }}',
          type: 'GET',
          data:{patient_id:patient_id},
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
                  $('#measurement_table_body').html('<tr><td colspan="4">No measurement found.</td></tr>');
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
    $(".vitals").on('click',function(){
      
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
                 url: '{{ route("user.order_imaginary_exam") }}',
                 type: 'POST',
                 data: $(this).serialize(),
                 success: function(result) {
                     $('#order_imaginary_exam_form')[0].reset();
                     $('#order_imagenairy').modal('hide'); 
                    //  data-bs-dismiss="modal"

                     if(result!=''){

                         swal.fire(

                             'Success',

                             'Order Imaginary Exam Added successfully!',

                             'success'

                         )
                         
                         }else{

                         swal.fire("Error!", "Enter valid Order Imaginary Exam Details!", "error");

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
                  url: '{{ route("user.order_lab_test") }}',
                  type: 'POST',
                  data: $(this).serialize(),
                  success: function(result) {
                      $('#order_lab_test_form')[0].reset();
                      // $('#add_patient').modal('hide'); 

                      if(result!=''){

                          swal.fire(

                              'Success',

                              'Order Lab Test Added successfully!',

                              'success'

                          )
                           fetchAndDisplayPatientOrderLabTest(patient_id); 
                          }else{

                          swal.fire("Error!", "Enter valid Order Lab Test Details!", "error");

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
          url: '{{ route("user.order_lab_test_list") }}',
          type: 'GET',
          data:{patient_id:patient_id},
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
                  $('#lab_order_list_body').html('<tr><td colspan="4">No Order Lab Test found.</td></tr>');
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
    $(".OrderLabTest").on('click',function(){
      
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
                  url: '{{ route("user.invoice_item_add") }}',
                  type: 'POST',
                  data: $(this).serialize(),
                  success: function(result) {
                      $('#invoice_item_form')[0].reset();
                      // $('#add_patient').modal('hide'); 

                      if(result!=''){

                          swal.fire(

                              'Success',

                              ' Invoice Item Added successfully!',

                              'success'

                          )
                          fetchAndDisplayPatientInvoiceItem(patient_id); 
                          }else{

                          swal.fire("Error!", "Enter valid Invoice Item Details!", "error");

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
          url: '{{ route("user.invoice_item_list") }}',
          type: 'GET',
          data:{patient_id:patient_id},
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
                  $('#invoice_item_table_body').html('<tr><td colspan="5">No Invoice Item found.</td></tr>');
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
    $(".invoice_item").on('click',function(){
      
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
                    url: '{{ route("user.new_task_add") }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(result) {
                        $('#new_task_form')[0].reset();
                        // $('#add_patient').modal('hide'); 
  
                        if(result!=''){
  
                            swal.fire(
  
                                'Success',
  
                                'New Task Added successfully!',
  
                                'success'
  
                            )
                           
                            }else{
  
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
      let patient_id = $('input[name="patient_id"]').val();
        $('#appointment_form').submit(function(e) {
            e.preventDefault();
           
            let isValid = validateFormAppointment(); 
           
            if (isValid) {
              
                $.ajax({
                    url: '{{ route("user.appointment_add") }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(result) {
                        $('#appointment_form')[0].reset();
                        // $('#add_patient').modal('hide'); 
  
                        if(result!=''){
  
                            swal.fire(
  
                                'Success',
  
                                'Appointment Booked successfully!',
  
                                'success'
  
                            )
                           
                            }else{
  
                            swal.fire("Error!", "Enter valid Appointment Details!", "error");
  
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
          //    // Validate appointment_type
          //    let appointment_type = $('select[name="appointment_type"]').val();
          //   if (appointment_type === '') {
          //       isValid = false;
               
          //       $('#appointment_typeError').text('Appointment Type  is required');
          //       $('select[name="appointment_type"]').addClass('error');
          //   }
          //    // Validate location
          //    let location = $('select[name="location"]').val();
          //   if (location === '') {
          //       isValid = false;
               
          //       $('#locationError').text('location   is required');
          //       $('select[name="location"]').addClass('error');
          //   }
          //  // Validate start_date 
          //  let start_date = $('input[name="start_date"]').val();
          //   if (start_date === '') {
          //       isValid = false;
               
          //       $('#start_dateError').text('Start Date  is required');
          //       $('input[name="start_date"]').addClass('error');
          //   }
          //    // Validate start_time 
          //  let start_time = $('input[name="start_time"]').val();
          //   if (start_time === '') {
          //       isValid = false;
               
          //       $('#start_timeError').text('Start Date  is required');
          //       $('input[name="start_time"]').addClass('error');
          //   }
          //   // Validate end_date 
          //  let end_date = $('input[name="end_date"]').val();
          //   if (end_date === '') {
          //       isValid = false;
               
          //       $('#end_dateError').text('End Date  is required');
          //       $('input[name="end_date"]').addClass('error');
          //   }
          //    // Validate end_time 
          //  let end_time = $('input[name="end_time"]').val();
          //   if (end_time === '') {
          //       isValid = false;
               
          //       $('#end_timeError').text('End Time is required');
          //       $('input[name="end_time"]').addClass('error');
          //   }
          //    // Validate app_cost
          //    let app_cost = $('input[name="app_cost"]').val();
          //   if (app_cost === '') {
          //       isValid = false;
               
          //       $('#app_costError').text('Cost  is required');
          //       $('input[name="app_cost"]').addClass('error');
          //   }
          //   // Validate app_code
          //   let app_code = $('input[name="app_code"]').val();
          //   if (app_code === '') {
          //       isValid = false;
               
          //       $('#app_codeError').text('Code  is required');
          //       $('input[name="app_code"]').addClass('error');
          //   }
          //   // Validate clinician
          //   let clinician = $('select[name="clinician"]').val();
          //   if (clinician === '') {
          //       isValid = false;
               
          //       $('#clinicianError').text('Clinician   is required');
          //       $('select[name="clinician"]').addClass('error');
          //   }

             
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
                      url: '{{ route("user.video_call_add") }}',
                      type: 'POST',
                      data: $(this).serialize(),
                      success: function(result) {
                          $('#video_call_form')[0].reset();
                          // $('#add_patient').modal('hide'); 
    
                          if(result!=''){
    
                              swal.fire(
    
                                  'Success',
    
                                  'Video Call Added successfully!',
    
                                  'success'
    
                              )
                             
                              }else{
    
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
    let patient_id = $('input[name="patient_id"]').val();
      $('#drug_from').submit(function(e) {
          e.preventDefault();
         
          let isValid = validateFormDrug(); 
         
          if (isValid) {
            
              $.ajax({
                  url: '{{ route("user.drug_add") }}',
                  type: 'POST',
                  data: $(this).serialize(),
                  success: function(result) {
                      $('#drug_from')[0].reset();
                      // $('#add_patient').modal('hide'); 

                      if(result!=''){

                          swal.fire(

                              'Success',

                              ' Drug Item Added successfully!',

                              'success'

                          )
                          fetchAndDisplayPatientDrugList(patient_id); 
                          }else{

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
           // Validate stopped_date
           let stopped_date = $('input[name="stopped_date"]').val();
          if (stopped_date === '') {
              isValid = false;
             
              $('#stopped_dateError').text('Stopped Date  is required');
              $('input[name="stopped_date"]').addClass('error');
          }
            // Validate drug_code
            let drug_code = $('input[name="drug_code"]').val();
          if (drug_code === '') {
              isValid = false;
             
              $('#drug_codeError').text('code  is required');
              $('input[name="drug_code"]').addClass('error');
          }
          
          return isValid;
      }
      
  });
  

</script>
<!-- Function to fetch and populate patient data -->
<script>
  function fetchAndDisplayPatientDrugList(patient_id) {
   
    // let patient_id = $('input[name="patient_id"]').val();
      $.ajax({
          url: '{{ route("user.drug_item_list") }}',
          type: 'GET',
          data:{patient_id:patient_id},
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
    $(".drug_add").on('click',function(){
      
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
                      url: '{{ route("user.allergy_add") }}',
                      type: 'POST',
                      data: $(this).serialize(),
                      success: function(result) {
                          $('#allergy_form')[0].reset();
                          // $('#add_patient').modal('hide'); 
    
                          if(result!=''){
    
                              swal.fire(
    
                                  'Success',
    
                                  'Allergy Added successfully!',
    
                                  'success'
    
                              )
                             
                              }else{
    
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
                      url: '{{ route("user.symptom_add") }}',
                      type: 'POST',
                      data: $(this).serialize(),
                      success: function(result) {
                          $('#symptom_form')[0].reset();
                          // $('#add_patient').modal('hide'); 
    
                          if(result!=''){
    
                              swal.fire(
    
                                  'Success',
    
                                  'Symptom Added successfully!',
    
                                  'success'
    
                              )
                             
                              }else{
    
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
                      url: '{{ route("user.clinical_exam_add") }}',
                      type: 'POST',
                      data: $(this).serialize(),
                      success: function(result) {
                          $('#clinical_exam_form')[0].reset();
                          // $('#add_patient').modal('hide'); 
    
                          if(result!=''){
    
                              swal.fire(
    
                                  'Success',
    
                                  'Clinical Exam Added successfully!',
    
                                  'success'
    
                              )
                             
                              }else{
    
                              swal.fire("Error!", "Enter valid Clinical Exam Details!", "error");
    
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
                      url: '{{ route("user.future_plan_add") }}',
                      type: 'POST',
                      data: $(this).serialize(),
                      success: function(result) {
                          $('#future_plan_form')[0].reset();
                          // $('#add_patient').modal('hide'); 
    
                          if(result!=''){
    
                              swal.fire(
    
                                  'Success',
    
                                  'Future Plans Added successfully!',
    
                                  'success'
    
                              )
                             
                              }else{
    
                              swal.fire("Error!", "Enter valid Future Plans Details!", "error");
    
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
                      url: '{{ route("user.special_note_add") }}',
                      type: 'POST',
                      data: $(this).serialize(),
                      success: function(result) {
                          $('#special_note_form')[0].reset();
                          // $('#add_patient').modal('hide'); 
    
                          if(result!=''){
    
                              swal.fire(
    
                                  'Success',
    
                                  'Special Note Added successfully!',
    
                                  'success'
    
                              )
                             
                              }else{
    
                              swal.fire("Error!", "Enter valid Special Note Details!", "error");
    
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
                      url: '{{ route("user.past_medical_histories_add") }}',
                      type: 'POST',
                      data: $(this).serialize(),
                      success: function(result) {
                        console.log("result",result);
                          $('#past_medical_history_form')[0].reset();
                          // $('#add_patient').modal('hide'); 
                          if(result!=''){
    
                              swal.fire(
    
                                  'Success',
    
                                  'Past Medical History Added successfully!',
    
                                  'success'
    
                              )
                              $('#past_medical_list_append').append(`<li><div class="appoin_title"><h6>${result && result.diseases_name ? result.diseases_name : ''}</h6><p>${result && result.createdat ? result.createdat : ''}</p></div>
                              <div class="appoin_date"><div class="read-more-content">${result && result.describe ? result.describe : ''}</p></div>
                              <button class="btn btn_read read-more-btn past_history_readmorebtn" onclick="toggleReadMore(this)">Read More</button></div></li>`);
                              }else{
                                
                              swal.fire("Error!", "Enter valid Past Medical History Details!", "error");
    
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
                      url: '{{ route("user.past_surgical_history_add") }}',
                      type: 'POST',
                      data: $(this).serialize(),
                      success: function(result) {
                          $('#past_surgical_history_form')[0].reset();
                          // $('#add_patient').modal('hide'); 
    
                          if(result!=''){
    
                              swal.fire(
    
                                  'Success',
    
                                  'Past Surgical History Added successfully!',
    
                                  'success'
    
                              )
                             
                              }else{
    
                              swal.fire("Error!", "Enter valid Past Surgical History Details!", "error");
    
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
                      url: '{{ route("user.insurer_add") }}',
                      type: 'POST',
                      data: $(this).serialize(),
                      success: function(result) {
                          
    
                          if(result!=''){
    
                              swal.fire(
    
                                  'Success',
    
                                  'Insurer  Updated successfully!',
    
                                  'success'
    
                              )
                              fetchAndDisplayPatientInsurerData(patient_id);
                              }else{
    
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
          url: '{{ route("user.insurer_list") }}',
          type: 'GET',
          data:{patient_id:patient_id},
          dataType: 'json',
          success: function(data) {
             if (data && Object.keys(data).length > 0) {
                  $('.insurance_dt').html(data.insurer_name + ' - ' + '<span>'  + data.insurance_number + '</span>');
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
    $(".add_insurer").on('click',function(){
      
      fetchAndDisplayPatientInsurerData(patient_id1);  
    });
   
  });
</script>
@endpush

@endsection
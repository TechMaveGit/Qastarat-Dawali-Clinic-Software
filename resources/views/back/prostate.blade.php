@extends('back.layout.main_view')
@push('title')
    Patient | Prostate QASTARAT & DAWALI CLINICS
@endpush
@push('custom-css')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endpush
@section('content-section')
    <div class="sub_bnr" style="background-image: url({{ asset('/assets/images/hero-15.jpg') }});">
        <div class="sub_bnr_cnt">
            <h1 class=""> <span class="blue_theme"> Eligibility</span> Form</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Patient Details</li>
                </ol>
            </nav>
            <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-toggle="modal" data-bs-target="#add_patient">+ Add New Patient </a> -->
        </div>

    </div>

    <div class="eligiblity-form">

        <div class="container">
            <div class="form_inner_dt">
                <form id="storeProstateEligibilityForms" method="POST" action="{{ route('user.storeProstateEligibilityForms') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ @$patient_id }}" />
                    <input type="hidden" name="form_type" value="prostate_form"/>

                    <h3 class="form_title">Prostate Artery Embolization <span>Eligibility</span></h3>

                    <div class="form_data">
                        <h6 class="section_title__">Diagnosis</h6>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>Diagnosis - General / Provisional</h4>
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[BPH][]" id="formRadiosRight1"
                                                value="BPH">
                                            <label class="form-check-label" for="formRadiosRight1">
                                                BPH
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[BOO][]" id="formRadiosRight2"
                                                value="BOO">
                                            <label class="form-check-label" for="formRadiosRight2">
                                                BOO
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Prostaitis][]" id="formRadiosRight3"
                                                value="Prostaitis">
                                            <label class="form-check-label" for="formRadiosRight3">
                                                Prostaitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Cystitis][]" id="formRadiosRight4"
                                                value="Cystitis">
                                            <label class="form-check-label" for="formRadiosRight4">
                                                Cystitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[OABBladder][]" id="formRadiosRight5"
                                                value="OAB Bladder">
                                            <label class="form-check-label" for="formRadiosRight5">
                                                OAB Bladder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[PostateCarcinoma][]" id="formRadiosRight6"
                                                value="Postate Carcinoma">
                                            <label class="form-check-label" for="formRadiosRight6">
                                                Postate Carcinoma
                                            </label>
                                        </div>
                                    </div>
                                  
                                    <div class="col-lg-4 " id="diagnosis_general_checkbox">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[AcuteUrinaryRetention][]" id="formRadiosRighta2"
                                                value="Acute Urinary Retention">
                                            <label class="form-check-label" for="formRadiosRighta2">
                                                Acute Urinary Retention
                                            </label>
                                        </div>
                                    </div>
                             

                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight"
                                                id="formRadiosRighta777">
                                            <label class="form-check-label" for="formRadiosRighta777">
                                                Add more diagnosis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="dynamic_checkbox_container" class="row">

                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="textarea_a777">
                                        <div class="row addmore_diag">
                                            <div class="col-lg-10">
                                                <div class="inner_element">

                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            placeholder="Type diagnosis here....." id="newDiagnosisInput">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="add_more_btn">
                                                    <a href="javascript:void(0);" class="add-more-link"><i
                                                            class="fa-solid fa-plus"></i> Add More</a>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>Diagnosis - ICD 10</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[C61][]"
                                                id="formRadiosRight8" value="C61 Malignant neoplasm of prostate">
                                            <label class="form-check-label" for="formRadiosRight8">
                                                C61 Malignant neoplasm of prostate
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D075][]"
                                                id="formRadiosRight9" value="D07.5 Carcinoma in situ: Prostate">
                                            <label class="form-check-label" for="formRadiosRight9">
                                                D07.5 Carcinoma in situ: Prostate
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D291][]"
                                                id="formRadiosRight10" value="D29.1 Benign neoplasm: Prostate">
                                            <label class="form-check-label" for="formRadiosRight10">
                                                D29.1 Benign neoplasm: Prostate
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D400][]"
                                                id="formRadiosRight11" value="D40.0 Neoplasm of uncertain or unknown behaviour: Prostate">
                                            <label class="form-check-label" for="formRadiosRight11">
                                                D40.0 Neoplasm of uncertain or unknown behaviour: Prostate
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N320][]"
                                                id="formRadiosRight12" value="N32.0 Bladder-neck obstruction">
                                            <label class="form-check-label" for="formRadiosRight12">
                                                N32.0 Bladder-neck obstruction
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N40][]"
                                                id="formRadiosRight13" value="N40 Hyperplasia of prostate">
                                            <label class="form-check-label" for="formRadiosRight13">
                                                N40 Hyperplasia of prostate
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N41][]"
                                                id="formRadiosRighta3" value="N41 Inflammatory diseases of prostate">
                                            <label class="form-check-label" for="formRadiosRighta3">
                                                N41 Inflammatory diseases of prostate
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N410][]"
                                                value="N41.0 Acute prostatitis" id="formRadiosRighta4">
                                            <label class="form-check-label" for="formRadiosRighta4">
                                                N41.0 Acute prostatitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N411][]"
                                                id="formRadiosRighta5"
                                                value="N41.1 Chronic prostatitis">
                                            <label class="form-check-label" for="formRadiosRighta5">
                                                N41.1 Chronic prostatitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N412][]"
                                                id="formRadiosRighta6"
                                                value="N41.2 Abscess of prostate">
                                            <label class="form-check-label" for="formRadiosRighta6">
                                                N41.2 Abscess of prostate
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N413][]"
                                                id="formRadiosRighta7" value="N41.3 Prostatocystitis">
                                            <label class="form-check-label" for="formRadiosRighta7">
                                                N41.3 Prostatocystitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N418][]"
                                                id="formRadiosRighta8" value="N41.8 Other inflammatory diseases of prostate">
                                            <label class="form-check-label" for="formRadiosRighta8">
                                                N41.8 Other inflammatory diseases of prostate
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N419][]"
                                                id="formRadiosRighta9" value="N41.9 Inflammatory disease of prostate, unspecified">
                                            <label class="form-check-label" for="formRadiosRighta9">
                                                N41.9 Inflammatory disease of prostate, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N42][]"
                                                id="formRadiosRighta10" value="N42 Other disorders of prostate">
                                            <label class="form-check-label" for="formRadiosRighta10">
                                                N42 Other disorders of prostate
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N422][]"
                                                id="formRadiosRighta11"
                                                value="N42.2 Atrophy of prostate">
                                            <label class="form-check-label" for="formRadiosRighta11">
                                                N42.2 Atrophy of prostate
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N423][]"
                                                id="formRadiosRighta12" value="N42.3 Dysplasia of prostate">
                                            <label class="form-check-label" for="formRadiosRighta12">
                                                N42.3 Dysplasia of prostate
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N510][]"
                                                id="formRadiosRighta13" value="N51.0 Disorders of prostate in diseases classified elsewhere">
                                            <label class="form-check-label" for="formRadiosRighta13">
                                                N51.0 Disorders of prostate in diseases classified elsewhere
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="Postpartum_thyroiditis">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Q554][]"
                                                id="formRadiosRighta14" value="Q55.4 Other congenital malformations of vas deferens, epididymis, seminal vesicles and prostate">
                                            <label class="form-check-label" for="formRadiosRighta14">
                                                Q55.4 Other congenital malformations of vas deferens, epididymis, seminal vesicles and prostate
                                            </label>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight"
                                                id="formRadiosRightz1">
                                            <label class="form-check-label" for="formRadiosRightz1">
                                                Add more diagnosis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="dynamic_checkbox_container_cid" class="row">

                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="textarea_z1">
                                        <div class="row addmore_diag">
                                            <div class="col-lg-10">
                                                <div class="inner_element">

                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            placeholder="Type diagnosis here....." id="cidvalue">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="add_more_btn">
                                                    <a href="javascript:void(0);" class="add-more-cid"><i
                                                            class="fa-solid fa-plus"></i> Add More</a>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Symptoms</h6>
                                        <div class="title_head">
                                            <h4>Select a symptom</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" id="sym_a1"
                                                        name="symptoms[0][0]"
                                                        value="Urinary Frequency">
                                                    <label class="form-check-label" for="sym_a1">
                                                        Urinary Frequency
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[0][1]">
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
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[0][2]">
                                                            <option value="">Duration Type</option>
                                                            <option value="Days">Days</option>
                                                            <option value="Weeks">Weeks</option>
                                                            <option value="Months">Months</option>
                                                            <option value="Years">Years</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[0][3]"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="symptoms[1][0]" id="sym_a2" value="Urgency">
                                                    <label class="form-check-label" for="sym_a2">
                                                        Urgency
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[1][1]">
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
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[1][2]">
                                                            <option value="">Duration Type</option>
                                                            <option value="Days">Days</option>
                                                            <option value="Weeks">Weeks</option>
                                                            <option value="Months">Months</option>
                                                            <option value="Years">Years</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[1][3]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" id="sym_a3"
                                                        name="symptoms[2][0]" value="Intermittency">
                                                    <label class="form-check-label" for="sym_a3">
                                                        Intermittency
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[2][1]">
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
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[2][2]">
                                                            <option value="">Duration Type</option>
                                                            <option value="Days">Days</option>
                                                            <option value="Weeks">Weeks</option>
                                                            <option value="Months">Months</option>
                                                            <option value="Years">Years</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[2][3]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" id="sym_a4"
                                                        name="symptoms[3][0]"
                                                        value="Straining">
                                                    <label class="form-check-label" for="sym_a4">
                                                        Straining
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[3][1]">
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
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[3][2]">
                                                            <option value="">Duration Type</option>
                                                            <option value="Days">Days</option>
                                                            <option value="Weeks">Weeks</option>
                                                            <option value="Months">Months</option>
                                                            <option value="Years">Years</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[3][3]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="symptoms[4][0]" id="sym_a5" value="Weak Stream">
                                                    <label class="form-check-label" for="sym_a5">
                                                        Weak Stream
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[4][1]">
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
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[4][2]">
                                                            <option value="">Duration Type</option>
                                                            <option value="Days">Days</option>
                                                            <option value="Weeks">Weeks</option>
                                                            <option value="Months">Months</option>
                                                            <option value="Years">Years</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[4][3]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="symptoms[6][0]" value="Incomplete emptying"
                                                        id="sym_a7">
                                                    <label class="form-check-label" for="sym_a7">
                                                        Incomplete emptying
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[6][1]">
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
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[6][2]">
                                                            <option value="">Duration Type</option>
                                                            <option value="Days">Days</option>
                                                            <option value="Weeks">Weeks</option>
                                                            <option value="Months">Months</option>
                                                            <option value="Years">Years</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[6][3]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="symptoms[7][0]" id="sym_a8"
                                                        value="Nocturia">
                                                    <label class="form-check-label" for="sym_a8">
                                                        Nocturia
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[7][1]">
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
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[7][2]">
                                                            <option value="">Duration Type</option>
                                                            <option value="Days">Days</option>
                                                            <option value="Weeks">Weeks</option>
                                                            <option value="Months">Months</option>
                                                            <option value="Years">Years</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[7][3]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="symptoms[8][0]" id="sym_a9" value="Erectile Dysfunction">
                                                    <label class="form-check-label" for="sym_a9">
                                                        Erectile Dysfunction
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[8][1]">
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
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[8][2]">
                                                            <option value="">Duration Type</option>
                                                            <option value="Days">Days</option>
                                                            <option value="Weeks">Weeks</option>
                                                            <option value="Months">Months</option>
                                                            <option value="Years">Years</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[8][3]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="symptoms[9][0]" id="sym_a10" value="Recurrent Urinary infections">
                                                    <label class="form-check-label" for="sym_a10">
                                                        Recurrent Urinary infections
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[9][1]">
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
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[9][2]">
                                                            <option value="">Duration Type</option>
                                                            <option value="Days">Days</option>
                                                            <option value="Weeks">Weeks</option>
                                                            <option value="Months">Months</option>
                                                            <option value="Years">Years</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[9][3]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    
                                    

                                   
                                   
                                    
                                   

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="symptoms[17][0]" value="Other" id="sym_a18">
                                                    <label class="form-check-label" for="sym_a18">
                                                        Other
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[17][1]">
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
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[17][2]">
                                                            <option value="">Duration Type</option>
                                                            <option value="Days">Days</option>
                                                            <option value="Weeks">Weeks</option>
                                                            <option value="Months">Months</option>
                                                            <option value="Years">Years</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[17][3]"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h6 class="section_title__">Symptoms Severity Score (SSS)</h6>
                                            <h4>Prostate Compressive symptoms score (TCSS)</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="5" class="top_header_frm_tb">Calculate TCSS Score
                                                    </th>
                                                </tr>
                                            </thead>
                                            <thead>
                                                <tr>
                                                    <th scope="col">Symptoms</th>
                                                    <th scope="col">No Symptoms</th>
                                                    <th scope="col">Mild Symptoms</th>
                                                    <th scope="col">Moderate Symptoms</th>
                                                    <th scope="col">Severe Symptoms</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Frequency </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Frequency][]"
                                                                id="formRadiosRight14" value="0">
                                                            <label class="form-check-label" for="formRadiosRight14">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Frequency][]"
                                                                id="formRadiosRight15" value="1">
                                                            <label class="form-check-label" for="formRadiosRight15">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Frequency][]"
                                                                id="formRadiosRight16" value="3">
                                                            <label class="form-check-label" for="formRadiosRight16">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Frequency][]"
                                                                id="formRadiosRight17" value="5">
                                                            <label class="form-check-label" for="formRadiosRight17">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Urgency</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Urgency][]"
                                                                id="formRadiosRight18" value="0">
                                                            <label class="form-check-label" for="formRadiosRight18">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Urgency][]"
                                                                id="formRadiosRight19" value="1">
                                                            <label class="form-check-label" for="formRadiosRight19">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Urgency][]"
                                                                id="formRadiosRight20" value="3">
                                                            <label class="form-check-label" for="formRadiosRight20">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Urgency][]"
                                                                id="formRadiosRight21" value="5">
                                                            <label class="form-check-label" for="formRadiosRight21">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Intermittency </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Intermittency][]"
                                                                id="formRadiosRight22" value="0">
                                                            <label class="form-check-label" for="formRadiosRight22">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Intermittency][]"
                                                                id="formRadiosRight23" value="1">
                                                            <label class="form-check-label" for="formRadiosRight23">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Intermittency][]"
                                                                id="formRadiosRight24" value="3">
                                                            <label class="form-check-label" for="formRadiosRight24">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Intermittency][]"
                                                                id="formRadiosRight25" value="5">
                                                            <label class="form-check-label" for="formRadiosRight25">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Straining</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Straining][]"
                                                                id="formRadiosRight26" value="0">
                                                            <label class="form-check-label" for="formRadiosRight26">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Straining][]"
                                                                id="formRadiosRight27" value="1">
                                                            <label class="form-check-label" for="formRadiosRight27">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Straining][]"
                                                                id="formRadiosRight28" value="3">
                                                            <label class="form-check-label" for="formRadiosRight28">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Straining][]"
                                                                id="formRadiosRight29" value="5">
                                                            <label class="form-check-label" for="formRadiosRight29">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Weak Stream</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[WeakStream][]"
                                                                id="formRadiosRight30" value="0">
                                                            <label class="form-check-label" for="formRadiosRight30">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[WeakStream][]"
                                                                id="formRadiosRight31" value="1">
                                                            <label class="form-check-label" for="formRadiosRight31">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[WeakStream][]"
                                                                id="formRadiosRight32" value="3">
                                                            <label class="form-check-label" for="formRadiosRight32">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[WeakStream][]"
                                                                id="formRadiosRight33" value="5">
                                                            <label class="form-check-label" for="formRadiosRight33">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Incomplete emptying</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Incompleteemptying][]"
                                                                id="formRadiosRight34" value="0">
                                                            <label class="form-check-label" for="formRadiosRight34">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Incompleteemptying][]"
                                                                id="formRadiosRight35" value="1">
                                                            <label class="form-check-label" for="formRadiosRight35">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Incompleteemptying][]"
                                                                id="formRadiosRight36" value="3">
                                                            <label class="form-check-label" for="formRadiosRight36">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Incompleteemptying][]"
                                                                id="formRadiosRight37" value="5">
                                                            <label class="form-check-label" for="formRadiosRight37">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Nocturia </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Nocturia][]"
                                                                id="formRadiosRight38" value="0">
                                                            <label class="form-check-label" for="formRadiosRight38">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Nocturia][]"
                                                                id="formRadiosRight39" value="1">
                                                            <label class="form-check-label" for="formRadiosRight39">
                                                                1 pts ( 1 time)
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Nocturia][]"
                                                                id="formRadiosRight40" value="3">
                                                            <label class="form-check-label" for="formRadiosRight40">
                                                                3 pts (3 times)
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Nocturia][]"
                                                                id="formRadiosRight41" value="5">
                                                            <label class="form-check-label" for="formRadiosRight41">
                                                                5 pts (5 times)
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr id="mildLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Mild LUTS </th>
                                                    <th>(0-7 pts)</th>
                                                </tr>
                                                <tr id="moderateLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Moderate LUTS </th>
                                                    <th>(8-19 pts) </th>
                                                </tr>
                                                <tr id="severeLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Severe LUTS </th>
                                                    <th>(20-35 pts) </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>Negative Clinical indicators</h4>
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">LUTS Meds</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[LUTSMeds][]" id="formRadiosRight42"
                                                        value="Mono-therapy">
                                                    <label class="form-check-label" for="formRadiosRight42">
                                                        Mono-therapy
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[LUTSMeds][]" id="formRadiosRight43"
                                                        value="Combo-therapy">
                                                    <label class="form-check-label" for="formRadiosRight43">
                                                        Combo-therapy
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Erectile Dysfunction (ED)</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Erectile][]" id="formRadiosRight44"
                                                        value="YES">
                                                    <label class="form-check-label" for="formRadiosRight44">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Erectile][]" id="formRadiosRight45"
                                                        value="No">
                                                    <label class="form-check-label" for="formRadiosRight45">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Detrusor Failure (indwelling / permanent catheter)</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="clinical_indicator[Detrusor][]" id="formRadiosRight46"
                                                        value="Yes">
                                                    <label class="form-check-label" for="formRadiosRight46">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="clinical_indicator[Detrusor][]" id="formRadiosRight47"
                                                        value="No">
                                                    <label class="form-check-label" for="formRadiosRight47">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Clinical Exam <a href="javascript:void(0)"
                                                class="order-now_btn order-now_btn_alt">Order Now <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                        <div class="title_head">
                                            <h4>Add Clinical Finding </h4>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Regional Exam</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="clinical_exam[RegionalExam][]" value="Normal"
                                                        id="clinic_exam_1">
                                                    <label class="form-check-label" for="clinic_exam_1">
                                                        Normal
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="clinical_exam[RegionalExam][]" value="Abnormal"
                                                        id="clinic_exam_2">
                                                    <label class="form-check-label" for="clinic_exam_2">
                                                        Abnormal
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="abnormal_c2">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px" name="clinical_exam[RegionalExamNote][]"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Systemic Exam</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="clinical_exam[SystemicExam][]" value="Normal"
                                                        id="clinic_exam_3">
                                                    <label class="form-check-label" for="clinic_exam_3">
                                                        Normal
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="clinical_exam[SystemicExam][]" value="Abnormal"
                                                        id="clinic_exam_4">
                                                    <label class="form-check-label" for="clinic_exam_4">
                                                        Abnormal
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="abnormal_c4">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px" name="clinical_exam[SystemicExamNote][]" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Imaging <a href="javascript:void(0)"
                                                class="order-now_btn order-now_btn_alt">Order Now <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                        <div class="title_head">
                                            <h4>USGENERAL70 </h4>
                                        </div>
                                        <!-- <h6 class="mb-3 lut_title">Calculate TI-RARDS - RIGHT LOBE score</h6> -->
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="mb-3 lut_title">Prostate Parameters</h6>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox" name="Imaging[USGENERAL701][]" value="Total Prostate Volume (TPV) TPV < 40 cc (PAE unfaverable)" id="formRadiosRight48">
                                            <label class="form-check-label" for="formRadiosRight48">
                                              Total Prostate Volume (TPV) TPV < 40 cc (PAE unfaverable)
                                            </label>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox" name="Imaging[USGENERAL702][]" value="PSA:TPV Ratio (PSA density)>0.15 ng/ml/cc (PAE unfaverable)" id="formRadiosRight49">
                                            <label class="form-check-label" for="formRadiosRight49">
                                            PSA:TPV Ratio (PSA density)>0.15 ng/ml/cc (PAE unfaverable)
                                            </label>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox" name="Imaging[USGENERAL703][]" value="TPV > 40 cc (PAE FAVERABLE)" id="formRadiosRight50">
                                            <label class="form-check-label" for="formRadiosRight50">
                                            TPV > 40 cc (PAE FAVERABLE)
                                            </label>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox" name="Imaging[USGENERAL704][]" value="0.15 ng/ml/cc" id="formRadiosRight51">
                                            <label class="form-check-label" for="formRadiosRight51">
                                            0.15 ng/ml/cc 
                                            </label>
                                        </div>
                                    </div> 
                                    
                                    
                                    

                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>MRCIR48</h4>
                                        </div>
                                    </div>  
                                    <div class="col-lg-12">
                                      <h6 class="mb-3 lut_title">Calculate PI-RARDS </h6>
                                    </div>  
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox" name="Imaging[MRCIR481][]" value="Pi-RADS PZ PI-RADS IV-V (PAE contraindicated)" id="formRadiosRight52">
                                            <label class="form-check-label" for="formRadiosRight52">
                                            Pi-RADS PZ PI-RADS IV-V (PAE contraindicated)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox" name="Imaging[MRCIR482][]" value="PI-RADS I-III" id="formRadiosRight53">
                                            <label class="form-check-label" for="formRadiosRight53">
                                            PI-RADS I-III 
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox" name="Imaging[MRCIR483][]" value="Pi-RADS TZ PI-RADS IV-V (PAE contraindicated)" id="formRadiosRight54">
                                            <label class="form-check-label" for="formRadiosRight54">
                                            Pi-RADS TZ PI-RADS IV-V (PAE contraindicated)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox" name="Imaging[MRCIR484][]" value="PI-RADS I-III" id="formRadiosRight55">
                                            <label class="form-check-label" for="formRadiosRight55">
                                            PI-RADS I-III 
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox" name="Imaging[MRCIR485][]" value="Total Prostate Volume (TPV) TPV < 40 cc (PAE unfaverable)" id="formRadiosRight56">
                                            <label class="form-check-label" for="formRadiosRight56">
                                            Total Prostate Volume (TPV) TPV < 40 cc (PAE unfaverable)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox" name="Imaging[MRCIR486][]" value="TPV > 40 cc (PAE FAVERABLE)" id="formRadiosRight57">
                                            <label class="form-check-label" for="formRadiosRight57">
                                            TPV > 40 cc (PAE FAVERABLE)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox" name="Imaging[MRCIR487][]" value="PSA:TPV Ratio (PSA density)>0.15 ng/ml/cc (PAE unfaverable)" id="formRadiosRight58">
                                            <label class="form-check-label" for="formRadiosRight58">
                                            PSA:TPV Ratio (PSA density)>0.15 ng/ml/cc (PAE unfaverable)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox" name="Imaging[MRCIR488][]" value="0.15 ng/ml/cc " id="formRadiosRight59">
                                            <label class="form-check-label" for="formRadiosRight59">
                                            &#60;0.15 ng/ml/cc 
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="mb-3 lut_title">BPH type</h6>
                                      </div> 
                                      <div class="col-lg-6">
                                          <div class="form-check form-check-right mb-3">
                                              <input class="form-check-input" type="radio" name="Imaging[BPHtype][]" value="AdBPH (PAE FAVERABLE)" id="formRadiosRight60">
                                              <label class="form-check-label" for="formRadiosRight60">
                                              AdBPH (PAE FAVERABLE)
                                              </label>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-check form-check-right mb-3">
                                              <input class="form-check-input" type="radio" name="Imaging[BPHtype][]" value="NON-AdBPH" id="formRadiosRight61">
                                              <label class="form-check-label" for="formRadiosRight61">
                                              NON-AdBPH 
                                              </label>
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <h6 class="mb-3 lut_title">3rd lobe</h6>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-check form-check-right mb-3">
                                              <input class="form-check-input" type="radio" name="Imaging[lobe][]" value="YES" id="formRadiosRight62">
                                              <label class="form-check-label" for="formRadiosRight62">
                                              YES (PAE unfaverable)
                                              </label>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-check form-check-right mb-3">
                                              <input class="form-check-input" type="radio" name="Imaging[lobe][]" value="NO" id="formRadiosRight63">
                                              <label class="form-check-label" for="formRadiosRight63">
                                              NO 
                                              </label>
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <h6 class="mb-3 lut_title">Prostitis / Prostate Abscess</h6>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-check form-check-right mb-3" id="pae_yes">
                                              <input class="form-check-input" type="radio" name="Imaging[Abscess][]" value="YES" id="formRadiosRight64">
                                              <label class="form-check-label" for="formRadiosRight64">
                                              YES 
                                              </label>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-check form-check-right mb-3" id="pae_no">
                                              <input class="form-check-input" type="radio" name="Imaging[Abscess][]" value="NO" id="formRadiosRight65">
                                              <label class="form-check-label" for="formRadiosRight65">
                                              NO 
                                              </label>
                                          </div>
                                      </div>
                                      <div class="col-lg-12" id="text_pae">
                                       <div class="mb-3 form-group">
                                          <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
                                          <textarea class="form-control" placeholder=""  style="height: 100px" name="Imaging[AbscessNOTE][]"></textarea>
                                      </div>
                                   </div>
                                   <div class="col-lg-12">
                                    <div class="title_head">
                                       <h4>CTCIR48 &gt; <span class="sub_tt__">CTA -  Pelvis  Protocol- Findings </span></h4>
                                   </div>
                               </div>
                               <div class="col-lg-12">
                                 <h6 class="mb-3 lut_title">CTA -  Prostatic artery Angiography Protocol -RIGHT </h6>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-check form-check-right mb-3">
                                       <input class="form-check-input"type="checkbox" name="Imaging[CTARIGHT1][]" value="Type I  (28%)" id="formRadiosRight66">
                                       <label class="form-check-label" for="formRadiosRight66">
                                       Type I  (28%)
                                       </label>
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-check form-check-right mb-3">
                                       <input class="form-check-input"type="checkbox" name="Imaging[CTARIGHT2][]" value="Type II (14%)" id="formRadiosRight67">
                                       <label class="form-check-label" for="formRadiosRight67">
                                       Type II (14%)
                                       </label>
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-check form-check-right mb-3">
                                       <input class="form-check-input"type="checkbox" name="Imaging[CTARIGHT3][]"  value="Type III (18%)" id="formRadiosRight68">
                                       <label class="form-check-label" for="formRadiosRight68">
                                       Type III (18%)
                                       </label>
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-check form-check-right mb-3">
                                       <input class="form-check-input"type="checkbox" name="Imaging[CTARIGHT4][]" value="Type IV (31%)" id="formRadiosRight69">
                                       <label class="form-check-label" for="formRadiosRight69">
                                       Type IV (31%)
                                       </label>
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-check form-check-right mb-3">
                                       <input class="form-check-input"type="checkbox" name="Imaging[CTARIGHT5][]" value="Type V (5%)" id="formRadiosRightc13">
                                       <label class="form-check-label" for="formRadiosRightc13">
                                       Type V (5%)
                                       </label>
                                   </div>
                               </div>
       
                               <div class="col-lg-12">
                                 <h6 class="mb-3 lut_title">CTA -  Prostatic artery Angiography Protocol -LEFT  </h6>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-check form-check-right mb-3">
                                       <input class="form-check-input"type="checkbox" name="Imaging[CTALEFT1][]" value="Type I  (28%)" id="formRadiosRightc14">
                                       <label class="form-check-label" for="formRadiosRightc14">
                                       Type I  (28%)
                                       </label>
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-check form-check-right mb-3">
                                       <input class="form-check-input"type="checkbox" name="Imaging[CTALEFT2][]" value="Type II (14%)" id="formRadiosRightc15">
                                       <label class="form-check-label" for="formRadiosRightc15">
                                       Type II (14%)
                                       </label>
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-check form-check-right mb-3">
                                       <input class="form-check-input"type="checkbox" name="Imaging[CTALEFT3][]" value="Type III (18%)" id="formRadiosRightc15">
                                       <label class="form-check-label" for="formRadiosRightc15">
                                       Type III (18%)
                                       </label>
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-check form-check-right mb-3">
                                       <input class="form-check-input"type="checkbox" name="Imaging[CTALEFT4][]" value="Type IV (31%)" id="formRadiosRightc16">
                                       <label class="form-check-label" for="formRadiosRightc16">
                                       Type IV (31%)
                                       </label>
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="form-check form-check-right mb-3">
                                       <input class="form-check-input"type="checkbox" name="Imaging[CTALEFT5][]" value="Type V (5%)" id="formRadiosRightc17">
                                       <label class="form-check-label" for="formRadiosRightc17">
                                       Type V (5%)
                                       </label>
                                   </div>
                               </div>
                               </div>
                               
                               
                               <div class="col-lg-12">
                                   <div class="title_head">
                                       <h4>USBIOPSYPROSTETE690 &#62; <span class="sub_tt__">US - Prostate tru-cut biopsy Results</span></h4>
                                   </div>
                               </div>
                               <div class="col-lg-12">
                                   <div class="row align-items-center">
                                   <div class="col-lg-4">
                                           <h6 class="mb-3 lut_title">Prostate Hyperplasia</h6>
                                       </div>
                                           <div class="col-lg-4">
                                           <div class="form-check form-check-right mb-3">
                                               <input class="form-check-input" type="radio" name="Imaging[ProstateHyperplasia][]"  value="YES" id="formRadiosRight70">
                                               <label class="form-check-label" for="formRadiosRight70">
                                               YES 
                                               </label>
                                           </div>
                                       </div>
                                       <div class="col-lg-4">
                                           <div class="form-check form-check-right mb-3">
                                               <input class="form-check-input" type="radio" name="Imaging[ProstateHyperplasia][]"  value="NO" id="formRadiosRight71">
                                               <label class="form-check-label" for="formRadiosRight71">
                                               NO 
                                               </label>
                                           </div>
                                       </div>
                                   </div>
       
                                   <div class="row align-items-center">
                                   <div class="col-lg-4">
                                           <h6 class="mb-3 lut_title">Prostate AdenoCarcinoma</h6>
                                       </div>
                                           <div class="col-lg-4">
                                           <div class="form-check form-check-right mb-3">
                                               <input class="form-check-input" type="radio" name="Imaging[ProstateAdenoCarcinoma][]" value="YES" id="formRadiosRight72">
                                               <label class="form-check-label" for="formRadiosRight72">
                                               YES 
                                               </label>
                                           </div>
                                       </div>
                                       <div class="col-lg-4">
                                           <div class="form-check form-check-right mb-3">
                                               <input class="form-check-input" type="radio" name="Imaging[ProstateAdenoCarcinoma][]" value="No" id="formRadiosRight73">
                                               <label class="form-check-label" for="formRadiosRight73">
                                               No
                                               </label>
                                           </div>
                                       </div>
                                   </div>
       
                               </div>
                            

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Image Annotation</h6>
                                        <div class="title_head">
                                            <h4>Annotate prostate  findings</h4>
                                        </div>
                                        <!-- <h6 class="mb-3 lut_title">Calculate TI-RARDS - RIGHT LOBE score</h6> -->
                                    </div>
                                    <div class="col-lg-12">
                                       
                                        <div id="image-container">

                                        </div>

                                        <div class="button_images">
                                            <button class="btn r-04 btn--theme hover--tra-black add_patient"
                                                id="draw-mode" type="button">Draw</button>
                                            <button class="btn r-04 btn--theme hover--tra-black add_patient"
                                                id="annotate-mode" type="button">Annotate</button>
                                            <button class="btn r-04 btn--theme hover--tra-black add_patient"
                                                id="download-image" type="button">Download</button>
                                        </div>
                                       
                                        <input type="hidden" name="canvasImage" id="canvasImage">

                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Lab <a href="javascript:void(0)" class="order-now_btn order-now_btn_alt">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
                                      </div>
                                        <div class="col-lg-12">
                                          <div class="title_head">
                                              <h4>LABPSA24</h4>
                                          </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-2">
                                        <h6 class="mb-3 lut_title">PSA</h6>
                                      </div>
                                   
                                        
                                                  <div class="col-lg-5">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input" type="radio" name="Lab[LABPSA24][]" value="PSA > 4 gm/dl OR PSA > 4 ng/ml (PAE unfaverable)" id="formRadiosRight74">
                                                      <label class="form-check-label" for="formRadiosRight74">
                                                      PSA > 4 gm/dl OR PSA > 4 ng/ml (PAE unfaverable)
                                                      </label>
                                                  </div>
                                              </div>
                                              <div class="col-lg-5">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input" type="radio" name="Lab[LABPSA24][]" value=" PSA 4 gm/dl    OR    PSA  4 ng/ml" id="formRadiosRight75">
                                                      <label class="form-check-label" for="formRadiosRight75">
                                                      PSA &#60;4 gm/dl    OR    PSA &#60;4 ng/ml
                                                      </label>
                                                  </div>
                                              </div>
                                        </div>
                                       
                                       
                                          <div class="col-lg-12">
                                          <div class="title_head">
                                              <h4>LABRFT12</h4>
                                          </div>
                                        </div>
                                        <div class="col-lg-12">
                                        <h6 class="mb-3 lut_title">Renal Function test (Creatinine | Na | K | urea) Results</h6>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="row">
                                              <div class="col-lg-6">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Lab[LABRFT12][]" value="Abnormal Renal profile" id="formRadiosRight88">
                                                  <label class="form-check-label" for="formRadiosRight88">
                                                  Abnormal Renal profile 
                                                  </label>
                                              </div>
                                              </div>
                                              <div class="col-lg-6">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Lab[LABRFT12][]" value="Normal Renal profile" id="formRadiosRight89">
                                                      <label class="form-check-label" for="formRadiosRight89">
                                                      Normal Renal profile
                                                      </label>
                                                  </div>
                                              </div>
                                              <div class="col-lg-12" id="textarea_88">
                                                  <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***"  style="height: 100px" name="Lab[LABRFT12NOTE][]"></textarea>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      
              
                                      <div class="col-lg-12">
                                          <div class="title_head">
                                              <h4>LABUA29</h4>
                                          </div>
                                        </div>
                                      
                                      <div class="row">
                                          <div class="col-lg-12">
                                          <h6 class="mb-3 lut_title">Urinalysis (Blood | Protein | WBC) Results</h6>
                                          </div>
                                              <div class="col-lg-6">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Lab[LABUA29][]"  value="Abnormal Urinanalysis (PAE unfaverable)" id="formRadiosRight76">
                                                  <label class="form-check-label" for="formRadiosRight76">
                                                  Abnormal Urinanalysis (PAE unfaverable)
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Lab[LABUA29][]" value="Normal Urinanalysis" id="formRadiosRight77">
                                                  <label class="form-check-label" for="formRadiosRight77">
                                                  Normal Urinanalysis
                                                  </label>
                                              </div>
                                          </div>
                                          <div class="col-lg-12" id="textarea_76">
                                                  <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***"  style="height: 100px" name="Lab[LABUA29NOTE][]"></textarea>
                                                  </div>
                                              </div>
                                      </div>
                                  
              
              
                                      <div class="col-lg-12">
                                          <div class="title_head">
                                              <h4>LABUROFLO82 &#62; <span class="sub_tt__">Uroflowmetery tests Results</span></h4>
                                          </div>
                                      </div>
              
                                      <div class="col-lg-12">
                                          <div class="row align-items-center">
                                          <div class="col-lg-4">
                                                  <h6 class="mb-3 lut_title">Q-Max </h6>
                                              </div>
                                                  <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Lab[QMax][]" value=">10ml/s (PAE unfaverable)" id="formRadiosRight78">
                                                      <label class="form-check-label" for="formRadiosRight78">
                                                      >10ml/s (PAE unfaverable)
                                                      </label>
                                                  </div>
                                              </div>
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Lab[QMax][]" value="10ml/s (BOO) (PAE FAVERABLE)" id="formRadiosRight79">
                                                      <label class="form-check-label" for="formRadiosRight79">
                                                      &#60;10ml/s (BOO) (PAE FAVERABLE)
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>
              
                                          <div class="row align-items-center">
                                          <div class="col-lg-4">
                                                  <h6 class="mb-3 lut_title">Post-Residual Volume (PVR)</h6>
                                              </div>
                                                  <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Lab[PVR][]" value="< 200cc (PAE unfaverable)" id="formRadiosRight80">
                                                      <label class="form-check-label" for="formRadiosRight80">
                                                      < 200cc (PAE unfaverable)
                                                      </label>
                                                  </div>
                                              </div>
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Lab[PVR][]" value="> 200cc (BOO) (PAE FAVERABLE)" id="formRadiosRight81">
                                                      <label class="form-check-label" for="formRadiosRight81">
                                                      > 200cc (BOO) (PAE FAVERABLE)
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>
              
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="title_head">
                                              <h4>LABUROFLOINVASIVE752 </h4>
                                          </div>
                                      </div>
              
                                      <div class="col-lg-12">
                                      <div class="row align-items-center">
                                          <div class="col-lg-4">
                                                  <h6 class="mb-3 lut_title">Filling-Voiding phase testing Results</h6>
                                              </div>
                                                  <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Lab[LABUROFLOINVASIVE752][]" value="Normal results (PAE unfaverable)" id="formRadiosRight82">
                                                      <label class="form-check-label" for="formRadiosRight82">
                                                      Normal results (PAE unfaverable)
                                                      </label>
                                                  </div>
                                              </div>
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input" type="radio" name="Lab[LABUROFLOINVASIVE752][]" value="Abnormal results" id="formRadiosRight83">
                                                      <label class="form-check-label" for="formRadiosRight83">
                                                      Abnormal results
                                                      </label>
                                                  </div>
                                              </div>
                                              <div class="col-lg-12" id="textarea_83">
                                                  <div class="form-check form-check-right mb-3 ps-0">
                                                    <textarea class="form-control" placeholder="Enter Elaborate Abnormal results / notes here***"  style="height: 100px" name="Lab[LABUROFLOINVASIVE752NOTE][]"></textarea>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                    <div class="col-lg-12  mb-2">
                                        <h6 class="section_title__">Special Investigation <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#refer_patient" class="order-now_btn">Reffer <i class="fa-solid fa-arrow-right-long"></i></a></h6>
                                        <div class="title_head">
                                              <h4>REQUROFLONONI5</h4>
                                          </div>
                                    
                                          <div class="row align-items-center">
                                          <div class="col-lg-4">
                                              <h6 class="mb-3 lut_title">Uro-flow-dynamic non-invasive</h6>
                                              </div>
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input" type="radio" name="SpecialInvestigation[REQUROFLONONI5][]"  value="Normal" id="formRadiosRightbf5">
                                                      <label class="form-check-label" for="formRadiosRightbf5">
                                                      Normal
                                                      </label>
                                                  </div>
                                               
                                              </div>
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input" type="radio" name="SpecialInvestigation[REQUROFLONONI5][]"  value="Abnormal" id="formRadiosRightbf7">
                                                      <label class="form-check-label" for="formRadiosRightbf7">
                                                      Abnormal
                                                      </label>
                                                  </div>
                                               
                                              </div>
                                       
                                              <div class="col-lg-12" id="textarea_a789" style="display: none;">
                                                  <div class="row addmore_diag">
                                                      <div class="col-lg-12">
                                                      <div class="inner_element">
                                                          
                                                          <div class="form-group">
                                                          <textarea  name="SpecialInvestigation[REQUROFLONONI5NOTE][]" class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"></textarea>
                                                          </div>
                                                      </div>
                                                      </div>
                                                     
                                                      
                                                          
                                                  </div>
                                               </div>


              
                                          </div>
                                          <div class="row align-items-center">
                                            <div class="col-lg-12">
                                            <div class="title_head">
                                            <h4>REQUROFLOI5</h4>
                                        </div>
                                            </div>
                                        <div class="col-lg-4">
                                            <h6 class="mb-3 lut_title">Uro-flow-dynamic invasive</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="SpecialInvestigation[REQUROFLOI5][]" value="Normal" id="formRadiosRightbf8">
                                                    <label class="form-check-label" for="formRadiosRightbf8">
                                                    Normal
                                                    </label>
                                                </div>
                                             
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="SpecialInvestigation[REQUROFLOI5][]" value="Abnormal" id="formRadiosRightbf9">
                                                    <label class="form-check-label" for="formRadiosRightbf9">
                                                    Abnormal
                                                    </label>
                                                </div>
                                             
                                            </div>
                                     
                                            <div class="col-lg-12" id="textarea_a890">
                                                <div class="row addmore_diag">
                                                    <div class="col-lg-12">
                                                    <div class="inner_element">
                                                        
                                                        <div class="form-group">
                                                        <textarea class="form-control" placeholder="Enter Elaborate / notes here***"  style="height: 100px" name="SpecialInvestigation[REQUROFLOI5NOTE][]"></textarea>
                                                        </div>
                                                    </div>
                                                    </div>
                                                   
                                                    
                                                        
                                                </div>
                                             </div>
            
                                      </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">MDT <a href="javascript:void(0)"
                                                class="order-now_btn order-now_btn_alt">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>MDTREVIEW00 &#62; <span class="sub_tt__">Prostate MDT outcome</span></h4>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="mb-3 lut_title">MDT decision</h6>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="MDT[PAE][]" value="PAE" id="formRadiosRight84">
                                                    <label class="form-check-label" for="formRadiosRight84">
                                                        PAE
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_84">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate PAE / notes here***" style="height: 100px" name="MDT[PAENote][]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="MDT[Medical][]" value="Medical" id="formRadiosRight85">
                                                    <label class="form-check-label" for="formRadiosRight85">
                                                        Medical
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_85">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate Medical / notes here***" style="height: 100px" name="MDT[MedicalNote][]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="MDT[Surgical][]" value="Surgical" id="formRadiosRight86">
                                                    <label class="form-check-label" for="formRadiosRight86">
                                                        Surgical
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_86">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***" style="height: 100px"  name="MDT[SurgicalNote][]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="MDT[OtherOptions][]" value="Other options" id="formRadiosRight87">
                                                    <label class="form-check-label" for="formRadiosRight87">
                                                        Other options
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_87">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate  Other options / notes here***" style="height: 100px" name="MDT[OtherOptionsNote][]" ></textarea>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Elegibility STATUS <a href="javascript:void(0)"
                                                class="order-now_btn order-now_btn_alt">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>ElegibilitySTATUS
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>Choose Eligible treatment option</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row ">

                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="ElegibilitySTATUS[PAE][]" value="PAE" id="formRadiosRight90">
                                                    <label class="form-check-label" for="formRadiosRight90">
                                                        PAE
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_90">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate     PROSTATE PAE / notes here***"
                                                            style="height: 100px" name="ElegibilitySTATUS[PAENote][]" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="ElegibilitySTATUS[Medical][]"  value="Medical" id="formRadiosRight91">
                                                    <label class="form-check-label" for="formRadiosRight91">
                                                        Medical
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_91">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate   PROSTATE  MEDICAL  / notes here***"
                                                            style="height: 100px" name="ElegibilitySTATUS[MedicalNote][]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="ElegibilitySTATUS[Surgical][]" value="Surgical" id="formRadiosRight92">
                                                    <label class="form-check-label" for="formRadiosRight92">
                                                        Surgical
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_92">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate  PROSTATE EMBOLIZATION  SURGICAL / notes here***"
                                                            style="height: 100px" name="ElegibilitySTATUS[SurgicalNote][]" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="ElegibilitySTATUS[OTHERS][]" value="OTHERS" id="formRadiosRight93">
                                                    <label class="form-check-label" for="formRadiosRight93">
                                                        OTHERS options
                                                    </label>
                                                </div>

                                                <div class="col-lg-12" id="textarea_93">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate OTHERS/ notes here***" style="height: 100px" name="ElegibilitySTATUS[OTHERSNote][]" ></textarea>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <h6 class="section_title__">Intervention PROCEDURE / Rx <a
                                            href="javascript:void(0)" class="order-now_btn order-now_btn_alt">Order Now <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[ANGIOPAE2910][]" value="ANGIOPAE2910"
                                                        id="formRadiosRightb37">
                                                    <label class="form-check-label" for="formRadiosRightb37">
                                                        ANGIOPAE2910
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[LABPREANGIO48][]" value="LABPREANGIO48"
                                                        id="formRadiosRightb38">
                                                    <label class="form-check-label" for="formRadiosRightb38">
                                                        LABPREANGIO48
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[LABPREIRSAFETY17][]" value="LABPREIRSAFETY17"
                                                        id="formRadiosRightb39">
                                                    <label class="form-check-label" for="formRadiosRightb39">
                                                        LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[IVSEDATION270][]" value="IVSEDATION270"
                                                        id="formRadiosRightb40">
                                                    <label class="form-check-label" for="formRadiosRightb40">
                                                        IVSEDATION270
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            
                                           
                                            
                                        </div>
                                    </div>






                                    <div class="col-lg-12 mb-3">
                                        <h6 class="section_title__">Supportive <a href="javascript:void(0)"
                                                class="order-now_btn order-now_btn_alt">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[IVVITATHYROID175][]" value="IVVITATHYROID175" id="formRadiosRightb45">
                                                    <label class="form-check-label" for="formRadiosRightb45">
                                                        IVVITATHYROID175
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                    name="Supportive[LABPREIVBASIC52][]" value="LABPREIVBASIC52" id="formRadiosRightb46">
                                                    <label class="form-check-label" for="formRadiosRightb46">
                                                        LABPREIVBASIC52
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3" id="Supportive">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                    name="Supportive[LABPREIVADVANCED230][]" value="LABPREIVADVANCED230" id="formRadiosRightb47">
                                                    <label class="form-check-label" for="formRadiosRightb47">
                                                        LABPREIVADVANCED230
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div id="dynamic_Supportive_checkbox_container" class="row">
        
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="formRadiosRight27" id="formRadiosRightbf1">
                                                    <label class="form-check-label" for="formRadiosRightbf1">
                                                        + Add More
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_a852">
                                                <div class="row addmore_diag">
                                                    <div class="col-lg-10">
                                                        <div class="inner_element">

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    id="SupportiveValue" placeholder="Type  here.....">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="add_more_btn">
                                                            <a href="javascript:void(0);" class="SupportiveAddMore"><i
                                                                    class="fa-solid fa-plus"></i> Add More</a>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Referral <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#refer_patient" class="order-now_btn">Reffer <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                        <div class="title_head">
                                            <h4>HCREFFERAL</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">

                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="Referral[Endocrinology][]" value="Endocrinology" id="formRadiosRightb48">
                                                    <label class="form-check-label" for="formRadiosRightb48">
                                                        Endocrinology
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b48">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[EndocrinologyNote][]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="Referral[NeckSurgery][]" value="ENT / Head and Neck surgery" id="formRadiosRightb49">
                                                    <label class="form-check-label" for="formRadiosRightb49">
                                                        ENT / Head and Neck surgery
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b49">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[NeckSurgeryNote][]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="Referral[IodineAblation][]" value="NM Radio-Active iodine Ablation" id="formRadiosRightb50">
                                                    <label class="form-check-label" for="formRadiosRightb50">
                                                        NM Radio-Active iodine Ablation
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b50">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[IodineAblationNote][]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="Referral[PhysioTherapy][]" value="Head & Neck Rehab/PhysioTherapy" id="formRadiosRightb51">
                                                    <label class="form-check-label" for="formRadiosRightb51">
                                                        Head & Neck Rehab/PhysioTherapy
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b51">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[PhysioTherapyNote][]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="Referral[Others][]" value="Others" id="formRadiosRightb52">
                                                    <label class="form-check-label" for="formRadiosRightb52">
                                                        Others
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b52">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[OthersNote][]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="action_btns">
                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient draft_btn">SAVE
                            DRAFT</button>
                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">SAVE
                            FINAL</button>
                    </div>
                </form>
            </div>
        </div>
    </div>








    @push('custom-js')
        <script>
            $(document).ready(function() {
                $("#abnormal_a74").hide();
                $("#formRadiosRighta74").click(function() {
                    $("#abnormal_a74").show();
                });
                $("#formRadiosRighta73").click(function() {
                    $("#abnormal_a74").hide();
                });

                $("#abnormal_a76").hide();
                $("#formRadiosRighta76").click(function() {
                    $("#abnormal_a76").show();
                });
                $("#formRadiosRighta75").click(function() {
                    $("#abnormal_a76").hide();
                });

            })
        </script>

        <script>
            $(document).ready(function() {
                $("#textarea_84").hide();
                $("#textarea_85").hide();
                $("#textarea_86").hide();
                $("#textarea_87").hide();

                $("#formRadiosRight84").click(function() {
                    $("#textarea_84").toggle();
                });
                $("#formRadiosRight85").click(function() {
                    $("#textarea_85").toggle();
                });
                $("#formRadiosRight86").click(function() {
                    $("#textarea_86").toggle();

                });
                $("#formRadiosRight87").click(function() {
                    $("#textarea_87").toggle();
                });
            })
        </script>

        <script>
            $(document).ready(function() {
                $("#textarea_90").hide();
                $("#textarea_91").hide();
                $("#textarea_92").hide();
                $("#textarea_93").hide();

                $("#formRadiosRight90").click(function() {
                    $("#textarea_90").toggle();

                });
                $("#formRadiosRight91").click(function() {
                    $("#textarea_91").toggle();
                });
                $("#formRadiosRight92").click(function() {
                    $("#textarea_92").toggle();
                });
                $("#formRadiosRight93").click(function() {
                    $("#textarea_93").toggle();
                });
            })
        </script>

        <script>
            $(document).ready(function() {
                $("#textarea_b48").hide();
                $("#textarea_b49").hide();
                $("#textarea_b50").hide();
                $("#textarea_b51").hide();
                $("#textarea_b52").hide();


                $("#formRadiosRightb48").click(function() {
                    $("#textarea_b48").toggle();

                });
                $("#formRadiosRightb49").click(function() {
                    $("#textarea_b49").toggle();
                });
                $("#formRadiosRightb50").click(function() {
                    $("#textarea_b50").toggle();

                });
                $("#formRadiosRightb51").click(function() {
                    $("#textarea_b51").toggle();
                });
                $("#formRadiosRightb52").click(function() {
                    $("#textarea_b52").toggle();
                });


            })
        </script>
        <script>
            $(document).ready(function() {
                $("#textarea_z1").hide();
                $("#formRadiosRightz1").click(function() {
                    $("#textarea_z1").toggle();
                });

                $("#textarea_a777").hide();
                $("#formRadiosRighta777").click(function() {
                    $("#textarea_a777").toggle();
                });


                $("#textarea_sym_a18").hide();
                $("#sym_a18").click(function() {
                    $("#textarea_sym_a18").toggle();
                });

                $("#abnormal_c2").hide();
                $("#abnormal_c4").hide();

                $("#clinic_exam_1").click(function() {
                    $("#abnormal_c2").hide();
                });
                $("#clinic_exam_2").click(function() {
                    $("#abnormal_c2").show();
                });

                $("#clinic_exam_3").click(function() {
                    $("#abnormal_c4").hide();
                });
                $("#clinic_exam_4").click(function() {
                    $("#abnormal_c4").show();
                });
            });
        </script>
        <script>
            $('.select2').select2({
                minimumResultsForSearch: -1
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.tshRange').select2({
                    minimumResultsForSearch: -1
                }); // Initialize Select2
                $('.tshRange').on('change', function() {
                    updateValues(this);
                });

                function updateValues(select) {
                    var tshRange = $(select).val();
                    var resultDiv = $(select).nextAll('.result').first(); // Get the next sibling with class 'result'

                    // Remove previous class to reset background color
                    resultDiv.removeClass('low high normal');

                    // Set low, high, and normal values based on the selected TSH range
                    var text, className;
                    switch (tshRange) {
                        case 'low':
                            text = 'Low';
                            className = 'low';
                            break;
                        case 'high':
                            text = 'High';
                            className = 'high';
                            break;
                        default: // normal
                            text = 'Normal';
                            className = 'normal';
                            break;
                    }

                    // Display the value and apply the class to set background color
                    resultDiv.text(text);
                    resultDiv.addClass(className);
                }
            });
        </script>
        <!-- supportive add more hide and show -->
        <script>
            $(document).ready(function() {
                $("#textarea_a852").hide();
                $("#textarea_a789").hide();

                $("#formRadiosRightbf1").click(function() {
                    $("#textarea_a852").toggle();
                });
                $("#formRadiosRightbf7").click(function() {
                    $("#textarea_a789").toggle();
                });
            });
        </script>
        {{-- sysmtoms scrore calculation --}}
        <script>
            $(document).ready(function() {
                $('.symtoms_scrore_checkbox').click(function() {
                    const checkboxes = document.querySelectorAll('input[type="radio"].symtoms_scrore_checkbox');

                    checkboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', updateCalculation);
                    });

                    function updateCalculation() {
                        const filteredCheckboxes = document.querySelectorAll(
                            'input[type="radio"].symtoms_scrore_checkbox:checked');

                        let totalPoints = 0;
                        filteredCheckboxes.forEach(checkbox => {
                            totalPoints += parseInt(checkbox.value);
                        });

                        showHideResults(totalPoints);
                    }

                    function showHideResults(totalPoints) {
                        const mildLUTS = document.getElementById('mildLUTS');
                        const moderateLUTS = document.getElementById('moderateLUTS');
                        const severeLUTS = document.getElementById('severeLUTS');

                        mildLUTS.classList.add('hidden');
                        moderateLUTS.classList.add('hidden');
                        severeLUTS.classList.add('hidden');

                        if (totalPoints >= 0 && totalPoints <= 7) {
                            mildLUTS.classList.remove('hidden');
                        } else if (totalPoints >= 8 && totalPoints <= 19) {
                            moderateLUTS.classList.remove('hidden');
                        } else if (totalPoints >= 20 && totalPoints <= 1035) {
                            severeLUTS.classList.remove('hidden');
                        }
                    }
                });
                // end here sysmtoms scrore calculation

                $('.right_lobe_score_checkbox').click(function() {


                    const checkboxes = document.querySelectorAll(
                        'input[type="radio"].right_lobe_score_checkbox');

                    checkboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', updateCalculation);
                    });

                    function updateCalculation() {
                        const filteredCheckboxes = document.querySelectorAll(
                            'input[type="radio"].right_lobe_score_checkbox:checked');

                        let totalPoints = 0;
                        filteredCheckboxes.forEach(checkbox => {
                            totalPoints += parseInt(checkbox.value);
                        });

                        showHideResults(totalPoints);
                    }

                    function showHideResults(totalPoints) {
                        const TR1_RIGHT = document.getElementById('TR1_RIGHT');
                        const TR2_RIGHT = document.getElementById('TR2_RIGHT');
                        const TR3_RIGHT = document.getElementById('TR3_RIGHT');
                        const TR4_RIGHT = document.getElementById('TR4_RIGHT');
                        const TR5_RIGHT = document.getElementById('TR5_RIGHT');

                        TR1_RIGHT.classList.add('hidden');
                        TR2_RIGHT.classList.add('hidden');
                        TR3_RIGHT.classList.add('hidden');
                        TR4_RIGHT.classList.add('hidden');
                        TR5_RIGHT.classList.add('hidden');

                        if (totalPoints >= 0 && totalPoints < 1) {
                            TR1_RIGHT.classList.remove('hidden');
                        } else if (totalPoints >= 2 && totalPoints < 3) {
                            TR2_RIGHT.classList.remove('hidden');
                        } else if (totalPoints >= 3 && totalPoints < 4) {
                            TR3_RIGHT.classList.remove('hidden');
                        } else if (totalPoints >= 4 && totalPoints <= 6) {
                            TR4_RIGHT.classList.remove('hidden');
                        } else if (totalPoints >= 7 && totalPoints <= 60000) {
                            TR5_RIGHT.classList.remove('hidden');
                        }

                    }
                }); // end here right_lobe_score_checkbox

                $('.left_lobe_score_checkbox').click(function() {


                    const checkboxes = document.querySelectorAll(
                    'input[type="radio"].left_lobe_score_checkbox');

                    checkboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', updateCalculation);
                    });

                    function updateCalculation() {
                        const filteredCheckboxes = document.querySelectorAll(
                            'input[type="radio"].left_lobe_score_checkbox:checked');

                        let totalPoints = 0;
                        filteredCheckboxes.forEach(checkbox => {
                            totalPoints += parseInt(checkbox.value);
                        });

                        showHideResults(totalPoints);
                    }

                    function showHideResults(totalPoints) {
                        const TR1_LEFT = document.getElementById('TR1_LEFT');
                        const TR2_LEFT = document.getElementById('TR2_LEFT');
                        const TR3_LEFT = document.getElementById('TR3_LEFT');
                        const TR4_LEFT = document.getElementById('TR4_LEFT');
                        const TR5_LEFT = document.getElementById('TR5_LEFT');

                        TR1_LEFT.classList.add('hidden');
                        TR2_LEFT.classList.add('hidden');
                        TR3_LEFT.classList.add('hidden');
                        TR4_LEFT.classList.add('hidden');
                        TR5_LEFT.classList.add('hidden');

                        if (totalPoints >= 0 && totalPoints < 1) {
                            TR1_LEFT.classList.remove('hidden');
                        } else if (totalPoints >= 2 && totalPoints < 3) {
                            TR2_LEFT.classList.remove('hidden');
                        } else if (totalPoints >= 3 && totalPoints < 4) {
                            TR3_LEFT.classList.remove('hidden');
                        } else if (totalPoints >= 4 && totalPoints <= 6) {
                            TR4_LEFT.classList.remove('hidden');
                        } else if (totalPoints >= 7 && totalPoints <= 60000) {
                            TR5_LEFT.classList.remove('hidden');
                        }

                    }
                }); // end here left_lobe_score_checkbox



            });
        </script>

        {{-- add more  --}}

        <script>
            $(document).ready(function() {
                // diagnosis_general_checkbox
                $('.add-more-link').click(function(e) {
                    e.preventDefault();

                    var diagnosisText = $('#newDiagnosisInput').val();
                    var key = diagnosisText.replace(/\s+/g, '_');

                    if (diagnosisText.trim() !== '') {
                        var clonedDiv = $('#diagnosis_general_checkbox').clone(true);

                        clonedDiv.find('.form-check-input').attr('id', 'formRadiosRight_' + key).attr('name',
                            'diagnosis_general[' + key + '][]').attr('value', diagnosisText);
                        clonedDiv.find('.form-check-label').attr('for', 'formRadiosRight_' + key).text(
                            diagnosisText);


                        $('#dynamic_checkbox_container').append(clonedDiv);

                        $('#newDiagnosisInput').val('');
                    }
                });
                //  Diagnosis - ICD 10
                $('.add-more-cid').click(function(e) {
                    e.preventDefault();

                    var diagnosisText = $('#cidvalue').val();
                    var key = diagnosisText.replace(/\s+/g, '_');

                    if (diagnosisText.trim() !== '') {
                        var clonedDiv = $('#Postpartum_thyroiditis').clone(true);

                        clonedDiv.find('.form-check-input').attr('id', 'formRadiosRight_' + key).attr('name',
                            'diagnosis_cid[' + key + '][]').attr('value', diagnosisText);
                        clonedDiv.find('.form-check-label').attr('for', 'formRadiosRight_' + key).text(
                            diagnosisText);


                        $('#dynamic_checkbox_container_cid').append(clonedDiv);

                        $('#cidvalue').val('');
                    }
                });
                // SpecialInvestigationAddMore

                $('.SpecialInvestigationAddMore').click(function(e) {
                    e.preventDefault();

                    var diagnosisText = $('#SpecialInvestigationValue').val();
                    var key = diagnosisText.replace(/\s+/g, '_');

                    if (diagnosisText.trim() !== '') {
                        var clonedDiv = $('#SpecialInvestigation').clone(true);

                        clonedDiv.find('.form-check-input').attr('id', 'formRadiosRight_' + key).attr('name',
                            'SpecialInvestigation[' + key + '][]').attr('value', diagnosisText);
                        clonedDiv.find('.form-check-label').attr('for', 'formRadiosRight_' + key).text(
                            diagnosisText);


                        $('#dynamic_checkbox_SpecialInvestigationd').append(clonedDiv);

                        $('#SpecialInvestigationValue').val('');
                    }
                });

                // Supportive

                $('.SupportiveAddMore').click(function(e) {
                    e.preventDefault();

                    var diagnosisText = $('#SupportiveValue').val();
                    var key = diagnosisText.replace(/\s+/g, '_');

                    if (diagnosisText.trim() !== '') {
                        var clonedDiv = $('#Supportive').clone(true);

                        clonedDiv.find('.form-check-input').attr('id', 'formRadiosRight_' + key).attr('name',
                            'Supportive[' + key + '][]').attr('value', diagnosisText);
                        clonedDiv.find('.form-check-label').attr('for', 'formRadiosRight_' + key).text(
                            diagnosisText);


                        $('#dynamic_Supportive_checkbox_container').append(clonedDiv);

                        $('#SupportiveValue').val('');
                    }
                });

            });
        </script>


<script>
    $(document).ready(function(){
        $("#textarea_88").hide();
        $("#formRadiosRight88").click(function(){
            $("#textarea_88").show();
        });
        $("#formRadiosRight89").click(function(){
            $("#textarea_88").hide();
        });


        $("#textarea_76").hide();
        $("#formRadiosRight76").click(function(){
            $("#textarea_76").show();
        });
        $("#formRadiosRight77").click(function(){
            $("#textarea_76").hide();
        });


        $("#textarea_83").hide();
        $("#formRadiosRight83").click(function(){
            $("#textarea_83").show();
        });
        $("#formRadiosRight82").click(function(){
            $("#textarea_83").hide();
        });
        })
</script>
<script>
    $(document).ready(function(){
        $("#textarea_a890").hide();
        $("#textarea_a789").hide();
        // $("#formRadiosRightbf9").hide();

        $("#formRadiosRightbf5").click(function(){
            $("#textarea_a789").hide();
        });
        $("#formRadiosRightbf7").click(function(){
            $("#textarea_a789").show();
        });

        $("#formRadiosRightbf8").click(function(){
            $("#textarea_a890").toggle();
        });
        $("#formRadiosRightbf9").click(function(){
            $("#textarea_a890").toggle();
        });
          });
</script>

  
<script>
   
    function showConfirmation() {
        
        Swal.fire({
            title: 'Are you sure?',
            text: 'You need to save your current form first!',
            icon: 'warning',
            showCancelButton: true,
            // confirmButtonText: 'save Form',
            // cancelButtonText: 'Cancel'
        })

        // .then((result) => {
            // if (result.isConfirmed) {
               
            //    window.location.href = "{{ route('user.updateHeadachePainEligibilityForms',['id'=>@$patient_id ]) }}";
        //    }
    //    });
    }

        $(document).ready(function(){
            $(".order-now_btn_alt").on('click',function(event){
                event.preventDefault();
                showConfirmation();
            });
    });
   
</script>



{{--  Symptoms fields validation  --}}
<script>
    $(document).ready(function() {
        
        function validateForm() {

            // Urinary Frequency start  
            var isChecked_sym_a1 = $("#sym_a1").is(":checked");
           
            var sym_a1_durationValue = $("select[name='symptoms[0][1]']").val();
            
            var sym_a1_durationType = $("select[name='symptoms[0][2]']").val();
            var sym_a1_description = $("textarea[name='symptoms[0][3]']").val();

            if (sym_a1_durationValue !== "" || sym_a1_durationType !== "" || sym_a1_description !== "") {
               
                if(isChecked_sym_a1 ===false){
                    
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please fill out Urinary Frequency fields in Symptoms.',
                            confirmButtonText: 'OK'
                        }).then(function () {
                            setTimeout(function() {
                                var elementToScroll = document.getElementById('sym_a1');
                                if (elementToScroll) {
                                    // Scroll to the element's position
                                    elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                                }
                            }, 1000);
                        });
                        return false;
                 }


        }
// Urinary Frequency end  


// Urgency start
var isChecked_sym_a2 = $("#sym_a2").is(":checked");
           
           var sym_a2_durationValue = $("select[name='symptoms[1][1]']").val();
           
           var sym_a2_durationType = $("select[name='symptoms[1][2]']").val();
           var sym_a2_description = $("textarea[name='symptoms[1][3]']").val();

           if (sym_a2_durationValue !== "" || sym_a2_durationType !== "" || sym_a2_description !== "") {
              
               if(isChecked_sym_a2 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Urgency fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a2');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
// Urgency end 



// Intermittency start
var isChecked_sym_a3 = $("#sym_a3").is(":checked");
           
           var sym_a3_durationValue = $("select[name='symptoms[2][1]']").val();
           
           var sym_a3_durationType = $("select[name='symptoms[2][2]']").val();
           var sym_a3_description = $("textarea[name='symptoms[2][3]']").val();

           if (sym_a3_durationValue !== "" || sym_a3_durationType !== "" || sym_a3_description !== "") {
              
               if(isChecked_sym_a3 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Intermittency fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a3');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
// Intermittency end 


//  Straining start
var isChecked_sym_a4 = $("#sym_a4").is(":checked");
           
           var sym_a4_durationValue = $("select[name='symptoms[3][1]']").val();
           
           var sym_a4_durationType = $("select[name='symptoms[3][2]']").val();
           var sym_a4_description = $("textarea[name='symptoms[3][3]']").val();

           if (sym_a4_durationValue !== "" || sym_a4_durationType !== "" || sym_a4_description !== "") {
              
               if(isChecked_sym_a4 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Straining fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a4');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Straining end 



//  Weak Stream start
var isChecked_sym_a5 = $("#sym_a5").is(":checked");
           
           var sym_a5_durationValue = $("select[name='symptoms[4][1]']").val();
           
           var sym_a5_durationType = $("select[name='symptoms[4][2]']").val();
           var sym_a5_description = $("textarea[name='symptoms[4][3]']").val();

           if (sym_a5_durationValue !== "" || sym_a5_durationType !== "" || sym_a5_description !== "") {
              
               if(isChecked_sym_a5 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Weak Stream fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a5');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Weak Stream end 



//  Incomplete emptying start
var isChecked_sym_a7= $("#sym_a7").is(":checked");
           
           var sym_a7_durationValue = $("select[name='symptoms[6][1]']").val();
           
           var sym_a7_durationType = $("select[name='symptoms[6][2]']").val();
           var sym_a7_description = $("textarea[name='symptoms[6][3]']").val();

           if (sym_a7_durationValue !== "" || sym_a7_durationType !== "" || sym_a7_description !== "") {
              
               if(isChecked_sym_a7 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Incomplete emptying fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a7');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Incomplete emptying end 



//  Nocturia start
var isChecked_sym_a8 = $("#sym_a8").is(":checked");
           
           var sym_a8_durationValue = $("select[name='symptoms[7][1]']").val();
           
           var sym_a8_durationType = $("select[name='symptoms[7][2]']").val();
           var sym_a8_description = $("textarea[name='symptoms[7][3]']").val();

           if (sym_a8_durationValue !== "" || sym_a8_durationType !== "" || sym_a8_description !== "") {
              
               if(isChecked_sym_a8 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Nocturia fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a8');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Nocturia end 



//   Erectile Dysfunction start
var isChecked_sym_a9 = $("#sym_a9").is(":checked");
           
           var sym_a9_durationValue = $("select[name='symptoms[8][1]']").val();
           
           var sym_a9_durationType = $("select[name='symptoms[8][2]']").val();
           var sym_a9_description = $("textarea[name='symptoms[8][3]']").val();

           if (sym_a9_durationValue !== "" || sym_a9_durationType !== "" || sym_a9_description !== "") {
              
               if(isChecked_sym_a9 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out  Erectile Dysfunction fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a9');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//   Erectile Dysfunction end 



//  Recurrent Urinary infections start
var isChecked_sym_a10 = $("#sym_a10").is(":checked");
           
           var _sym_a10_durationValue = $("select[name='symptoms[9][1]']").val();
           
           var _sym_a10_durationType = $("select[name='symptoms[9][2]']").val();
           var _sym_a10_description = $("textarea[name='symptoms[9][3]']").val();

           if (_sym_a10_durationValue !== "" || _sym_a10_durationType !== "" || _sym_a10_description !== "") {
              
               if(isChecked_sym_a10 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Recurrent Urinary infections fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a10');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Recurrent Urinary infections end 


// Other start
var isChecked_sym_a18 = $("#sym_a18").is(":checked");
           
           var sym_a18_durationValue = $("select[name='symptoms[17][1]']").val();
           
           var sym_a18_durationType = $("select[name='symptoms[17][2]']").val();
           var sym_a18_description = $("textarea[name='symptoms[17][3]']").val();

           if (sym_a18_durationValue !== "" || sym_a18_durationType !== "" || sym_a18_description !== "") {
              
               if(isChecked_sym_a18 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Other fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a18');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
// Other end
            return true; 
        }


        

// Start Image
    const stage = new Konva.Stage({
        container: 'image-container',
        width: 800,
        height: 600,
    });

    const layer = new Konva.Layer();
    stage.add(layer);

    let isDrawing = false;
    let annotationMode = false;
    let lastLine;

    const imageObj = new Image();
    imageObj.src = '{{ asset('/assets/thyroid-eligibility-form/add/prostate.jpg') }}';

    imageObj.onload = function() {
        const image = new Konva.Image({
            image: imageObj,
            width: 500,
            height: 600,
        });

        layer.add(image);
        stage.draw();
    };

    stage.on('mousedown touchstart', function(e) {
        if (annotationMode) {
            const text = prompt('Enter annotation text:');
            if (text) {
                const pos = stage.getPointerPosition();
                const annotation = new Konva.Label({
                    x: pos.x,
                    y: pos.y,
                });

                annotation.add(
                    new Konva.Tag({
                        fill: 'transparent',
                    })
                );

                annotation.add(
                    new Konva.Text({
                        text: text,
                        fontSize: 18,
                        width:500,
                        fontStyle: 'bold',
                        fontFamily: 'Arial',
                        fill: '#000',
                        wrap:'word',
                        ellipsis:true
                    })
                );

                layer.add(annotation);
                stage.draw();
            }
        } else {
            isDrawing = true;
            const pos = stage.getPointerPosition();
            lastLine = new Konva.Line({
                stroke: '#2760a4',
                strokeWidth: 3,
                globalCompositeOperation: 'source-over',
                points: [pos.x, pos.y],
            });
            layer.add(lastLine);
        }
    });

    stage.on('mousemove touchmove', function() {
        if (!isDrawing) {
            return;
        }

        const pos = stage.getPointerPosition();
        const newPoints = lastLine.points().concat([pos.x, pos.y]);
        lastLine.points(newPoints);
        layer.batchDraw();
    });

    stage.on('mouseup touchend', function() {
        isDrawing = false;
        lastLine = null;
    });


   document.getElementById('draw-mode').addEventListener('click', function() {
        annotationMode = false;
    });

    document.getElementById('annotate-mode').addEventListener('click', function() {
        annotationMode = true;
    });


    document.getElementById('download-image').addEventListener('click', function() {
        const dataURL = stage.toDataURL({
            mimeType: 'image/png'
        });
        const link = document.createElement('a');
        link.href = dataURL;
        link.download = 'thyroid-image.png';
        link.click();
    });


    function isFormDataValid(formData) {
        for (let [key, value] of formData.entries()) {
            if(key != '_token' && key != 'patient_id' && key != 'form_type' && key != 'canvasImage'){
                if (value.trim() !== '') {
                    return true; // A blank value found
                }
            }
        }
        return false; // All values are non-blank
    }


        
        $("#storeProstateEligibilityForms").submit(function(event) {

            const dataURL = stage.toDataURL({
                        mimeType: 'image/png'
                    });

                document.getElementById('canvasImage').value = dataURL;
            
            event.preventDefault();
            let formData = new FormData(this);
            if(isFormDataValid(formData)){
            if (!validateForm()) {
                e.preventDefault(); 
            } 
            else {
                if(validateForm()){

                
                
                $.ajax({
                                url: '{{ route("user.storeProstateEligibilityForms") }}',
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) 
                                {
                                    var patientId = response.patient_id;
                                    if(response!='')
                                       {
                                          Swal.fire({
                                                        title: 'Success',
                                                        text: 'Thyroid form saved successfully!!',
                                                        icon: 'success',
                                                        timer: 2000, // Display for 2 seconds
                                                        timerProgressBar: true, // Show progress bar
                                                        showConfirmButton: false, // Hide the OK button
                                                        willClose: () => {
                                                            var redirectUrl = "{{ route('user.ViewProstateEligibilityForms', ['id' => ':id']) }}";
                                                            redirectUrl = redirectUrl.replace(':id', patientId);
                                                            window.location.href = redirectUrl;
                                                        }
                                                    });                                           
                                        }
                                }
                             
                                
                            });
              
                
            }
        }}else{
            Swal.fire({
                    title: "Fill Data?",
                    text: "Please fill the details.",
                    icon: "info",
                });
        }
        });
    });
</script>
    @endpush
@endsection

@extends('back.layout.main_view')
@push('title')
    Patient | Varicocele Embo| QASTARAT & DAWALI CLINICS
@endpush
@section('content-section')
@push('custom-css')
   
<style>
    .hidden {
        display: none;
    }
</style>
@endpush
 
 

<div class="sub_bnr" style="background-image: url({{ asset('public/assets/images/hero-15.jpg') }});">
<div class="sub_bnr_cnt">
        <h1 class=""> <span class="blue_theme"> Eligibility</span> Form</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Patient Details</li>
            </ol>
        </nav>
        <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-toggle="modal" data-bs-target="#add_patient">+ Add New Patient </a> -->
    </div>

</div>

<div class="eligiblity-form">
   
    <div class="container">
        <div class="form_inner_dt">
            <form id="storeVaricoceleEmboEligibilityForms" method="POST" action="{{ route('user.storeVaricoceleEmboEligibilityForms') }}" enctype="multipart/form-data" >
                @csrf

            <input type="hidden" name="patient_id" value="{{ @$patient_id }}"/>

            
          <h3 class="form_title">Varicocele Embo (VE)</h3>
        
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
                                <input class="form-check-input" type="checkbox" name="diagnosis_general[Varicocele][]" value="Varicocele" id="formRadiosRight1">
                                <label class="form-check-label" for="formRadiosRight1">
                                Varicocele
                                </label>
                            </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Testicularpain][]" value="Testicular pain" id="formRadiosRight2">
                            <label class="form-check-label" for="formRadiosRight2">
                            Testicular pain
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Testicularatrophy][]" value="Testicular atrophy" id="formRadiosRight3">
                            <label class="form-check-label" for="formRadiosRight3">
                            Testicular atrophy
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Testicular][]" value="Testicular mass / cyst" id="formRadiosRight4">
                            <label class="form-check-label" for="formRadiosRight4">
                            Testicular mass / cyst
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Hydrocele][]" value="Hydrocele" id="formRadiosRight5">
                            <label class="form-check-label" for="formRadiosRight5">
                            Hydrocele
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Epedidimalabnormality][]" value="Epedidimal abnormality" id="formRadiosRight6">
                            <label class="form-check-label" for="formRadiosRight6">
                            Epedidimal abnormality
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Hormonalabnormalities][]" value=" Hormonal abnormalities" id="formRadiosRight7">
                            <label class="form-check-label" for="formRadiosRight7">
                            Hormonal abnormalities
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[DilatedSeminalvesicles][]" value="Dilated Seminal vesicles" id="formRadiosRightd1">
                            <label class="form-check-label" for="formRadiosRightd1">
                            Dilated Seminal vesicles
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Erectiledysfunction][]" value="Erectile dysfunction" id="formRadiosRightd2">
                            <label class="form-check-label" for="formRadiosRightd2">
                            Erectile dysfunction
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4" id="diagnosis_general_checkbox">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Prostatitis][]" value="Prostatitis" id="formRadiosRightd35">
                            <label class="form-check-label" for="formRadiosRightd35">
                            Prostatitis
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

                      </div>
                    </div>
                                        

                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Diagnosis - ICD 10</h4>
                            </div>
                        </div>
                        <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a183][]" value="183 Varicose veins of lower extremities" id="formRadiosRight8">
                            <label class="form-check-label" for="formRadiosRight8">
                            183 Varicose veins of lower extremities
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1830][]" value="183.0 Varicose veins of lower extremities with ulcer" id="formRadiosRight9">
                            <label class="form-check-label" for="formRadiosRight9">
                            183.0 Varicose veins of lower extremities with ulcer 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1831][]" value="183.1 Varicose veins of lower extremities with inflammatio" id="formRadiosRight10">
                            <label class="form-check-label" for="formRadiosRight10">
                            183.1 Varicose veins of lower extremities with inflammation 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1839][]" value="183.9 Varicose veins of lower extremities without ulcer or inflammation" id="formRadiosRight11">
                            <label class="form-check-label" for="formRadiosRight11">
                            183.9 Varicose veins of lower extremities without ulcer or inflammation 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a186][]" value="186 Varicose veins of other sites" id="formRadiosRight12">
                            <label class="form-check-label" for="formRadiosRight12">
                            186 Varicose veins of other sites
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1861][]" value="186.1 Scrotal varices, Varicocele" id="formRadiosRight13">
                            <label class="form-check-label" for="formRadiosRight13">
                            186.1 Scrotal varices, Varicocele
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a18620][]" value="186.2 Pelvic varices, Varicocele (thrombosed) (scrotum) ovary " id="formRadiosRightc1">
                            <label class="form-check-label" for="formRadiosRightc1">
                            186.2 Pelvic varices, Varicocele (thrombosed) (scrotum) ovary 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1862][]" value="186.2 Pelvic varices" id="formRadiosRightc2">
                            <label class="form-check-label" for="formRadiosRightc2">
                            186.2 Pelvic varices
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1872][]" value="187.2 Venous insufficiency (Chronic) (Peripheral) " id="formRadiosRightc3">
                            <label class="form-check-label" for="formRadiosRightc3">
                            187.2 Venous insufficiency (Chronic) (Peripheral) 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1878][]" value="187.8 Other specified disorders of veins" id="formRadiosRightc4">
                            <label class="form-check-label" for="formRadiosRightc4">
                            187.8 Other specified disorders of veins
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1879][]" value="187.9 Disorder of vein, unspecified" id="formRadiosRightc5">
                            <label class="form-check-label" for="formRadiosRightc5">
                            187.9 Disorder of vein, unspecified
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[aR10][]" value="R10 Abdominal and pelvic pain" id="formRadiosRightc6">
                            <label class="form-check-label" for="formRadiosRightc6">
                            R10 Abdominal and pelvic pain
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[aR102][]" value="R10.2 Pelvic and perineal pain" id="formRadiosRightc7">
                            <label class="form-check-label" for="formRadiosRightc7">
                            R10.2 Pelvic and perineal pain
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4" id="Postpartum_thyroiditis">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[aY528][]" value="Y52.8 Antivaricose drugs, including sclerosing agents " id="formRadiosRightc8">
                            <label class="form-check-label" for="formRadiosRightc8">
                            Y52.8 Antivaricose drugs, including sclerosing agents 
                            </label>
                        </div>
                     </div>

                     
                     <div class="col-lg-4" >
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
                                        value="Scrotal swelling">
                                    <label class="form-check-label" for="sym_a1">
                                        Scrotal swelling
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="inner_element">
                                    <div class="mb-3 form-group">
                                        <select class="form-control select2 sym_a1DurationValue"
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
                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px"
                                            name="symptoms[0][3]"></textarea>
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
                                        name="symptoms[1][0]" id="sym_a2" value="Scrotal heaviness">
                                    <label class="form-check-label" for="sym_a2">
                                        Scrotal heaviness
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
                                        name="symptoms[2][0]" value="Scrotal heat">
                                    <label class="form-check-label" for="sym_a3">
                                        Scrotal heat
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
                                        value="Scrotal pain">
                                    <label class="form-check-label" for="sym_a4">
                                        Scrotal pain
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
                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px"
                                            name="symptoms[3][3]"></textarea>
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
                                        name="symptoms[4][0]" id="sym_a5" value="Groin / thigh pain">
                                    <label class="form-check-label" for="sym_a5">
                                        Groin / thigh pain
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
                                        name="symptoms[5][0]" value="Erectile dysfunction"
                                        id="sym_a75">
                                    <label class="form-check-label" for="sym_a75">
                                        Erectile dysfunction
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="inner_element">
                                    <div class="mb-3 form-group">
                                        <select class="form-control select2"
                                            name="symptoms[5][1]">
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
                                            name="symptoms[5][2]">
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
                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[5][3]"></textarea>
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
                                        name="symptoms[6][0]" value="Infertility"
                                        id="sym_a7">
                                    <label class="form-check-label" for="sym_a7">
                                        Infertility
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
                                        name="symptoms[7][0]" value="Burning Micturation"
                                        id="sym_a7Fatigue">
                                    <label class="form-check-label" for="sym_a7Fatigue">
                                        Burning Micturation
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
                                        name="symptoms[8][0]" value="Pain during defecation"
                                        id="sym_8Painduringdefecation">
                                    <label class="form-check-label" for="sym_8Painduringdefecation">
                                        Pain during defecation
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
                                        name="symptoms[9][0]" value="Recurrent Urinary tract infections"
                                        id="sym_8RecurrentUrinarytractinfections">
                                    <label class="form-check-label" for="sym_8RecurrentUrinarytractinfections">
                                        Recurrent Urinary tract infections
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
                                        name="symptoms[13][0]" value="Other" id="sym_a18">
                                    <label class="form-check-label" for="sym_a18">
                                        Other
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="inner_element">
                                    <div class="mb-3 form-group">
                                        <select class="form-control select2"
                                            name="symptoms[13][1]">
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
                                            name="symptoms[13][2]">
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
                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[13][3]"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                     <div class="col-lg-12">
                        <h6 class="section_title__">Symptoms Severity Score (SSS)</h6>
                            <div class="title_head">
                                <h4>Varicocele symptoms score (VSS)</h4>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th colspan="5" class="top_header_frm_tb">Calculate VSS Score</th>
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
                                    <td>Scrotal swelling</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[ScrotalSwelling][]" value="0" id="formRadiosRight14">
                                            <label class="form-check-label" for="formRadiosRight14">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[ScrotalSwelling][]" value="1" id="formRadiosRight15">
                                            <label class="form-check-label" for="formRadiosRight15">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[ScrotalSwelling][]" value="3" id="formRadiosRight16">
                                            <label class="form-check-label" for="formRadiosRight16">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[ScrotalSwelling][]" value="5" id="formRadiosRight17">
                                            <label class="form-check-label" for="formRadiosRight17">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Scrotal heaviness</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Scrotalheaviness][]" value="0" id="formRadiosRight18">
                                            <label class="form-check-label" for="formRadiosRight18">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Scrotalheaviness][]" value="1" id="formRadiosRight19">
                                            <label class="form-check-label" for="formRadiosRight19">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Scrotalheaviness][]" value="3" id="formRadiosRight20">
                                            <label class="form-check-label" for="formRadiosRight20">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Scrotalheaviness][]" value="5" id="formRadiosRight21">
                                            <label class="form-check-label" for="formRadiosRight21">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Scrotal heat </td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Scrotalheat][]" value="0" id="formRadiosRight22">
                                            <label class="form-check-label" for="formRadiosRight22">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Scrotalheat][]" value="1" id="formRadiosRight23">
                                            <label class="form-check-label" for="formRadiosRight23">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Scrotalheat][]" value="3" id="formRadiosRight24">
                                            <label class="form-check-label" for="formRadiosRight24">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Scrotalheat][]" value="5" id="formRadiosRight25">
                                            <label class="form-check-label" for="formRadiosRight25">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Scrotal pain </td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[ScotalPain][]" value="0" id="formRadiosRight26">
                                            <label class="form-check-label" for="formRadiosRight26">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[ScotalPain][]" value="1" id="formRadiosRight27">
                                            <label class="form-check-label" for="formRadiosRight27">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[ScotalPain][]" value="3" id="formRadiosRight28">
                                            <label class="form-check-label" for="formRadiosRight28">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[ScotalPain][]" value="5" id="formRadiosRight29">
                                            <label class="form-check-label" for="formRadiosRight29">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Groin / thigh pain </td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Groin][]" value="0" id="formRadiosRight30">
                                            <label class="form-check-label" for="formRadiosRight30">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Groin][]" value="1" id="formRadiosRight31">
                                            <label class="form-check-label" for="formRadiosRight31">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Groin][]" value="3" id="formRadiosRight32">
                                            <label class="form-check-label" for="formRadiosRight32">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Groin][]" value="5" id="formRadiosRight33">
                                            <label class="form-check-label" for="formRadiosRight33">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr id="mildLUTS" class="hidden">
                                        <td colspan="3" rowspan="3"></td>
                                        <th>Mild </th>
                                        <th>(0-5 pts)</th>
                                    </tr>
                                    <tr id="moderateLUTS" class="hidden">>
                                        <td colspan="3" rowspan="3"></td>
                                        <th>Moderate </th>
                                        <th>(6-15 pts)</th>
                                    </tr>
                                    <tr id="severeLUTS" class="hidden">
                                        <td colspan="3" rowspan="3"></td>
                                        <th>Severe  </th>
                                        <th>(16-25 pts) </th>
                                    </tr>  
                                    
                                    
                                </tbody>
                              </table>
                        </div>

                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Other clinical indicators</h4>
                            </div>
                        </div>
             

                        <div class="col-lg-12">
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Small (atrophic) testicles</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[testicles][]" value="YES  (VE unfaverable)" id="formRadiosRight42">
                                        <label class="form-check-label" for="formRadiosRight42">
                                        YES  (VE unfaverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[testicles][]" value="NO" id="formRadiosRight43">
                                        <label class="form-check-label" for="formRadiosRight43">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Undecended testicles </h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[Undecendedtesticles][]" value="YES  (VE unfaverable)" id="formRadiosRight44">
                                        <label class="form-check-label" for="formRadiosRight44">
                                        YES  (VE unfaverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[Undecendedtesticles][]" value="NO" id="formRadiosRight45">
                                        <label class="form-check-label" for="formRadiosRight45">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Erectile dysfunction</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio"  name="clinical_indicator[Erectiledysfunction][]" value="YES" id="formRadiosRight46">
                                        <label class="form-check-label" for="formRadiosRight46">
                                        YES
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio"  name="clinical_indicator[Erectiledysfunction][]" value="NO" id="formRadiosRight47">
                                        <label class="form-check-label" for="formRadiosRight47">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Reduced Ejaculate volume</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[ReducedEjaculate][]" value="YES" id="formRadiosRightd5">
                                        <label class="form-check-label" for="formRadiosRightd5">
                                        YES 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[ReducedEjaculate][]" value="NO" id="formRadiosRightd6">
                                        <label class="form-check-label" for="formRadiosRightd6">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Primary infertility</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[Primaryinfertility][]" value="YES" id="formRadiosRightd8">
                                        <label class="form-check-label" for="formRadiosRightd8">
                                        YES 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[Primaryinfertility][]" value="NO" id="formRadiosRightd9">
                                        <label class="form-check-label" for="formRadiosRightd9">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title"> Secondary infertility</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[Secondaryinfertility][]" value="YES" id="formRadiosRightd36">
                                        <label class="form-check-label" for="formRadiosRightd36">
                                        YES 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[Secondaryinfertility][]" value="NO" id="formRadiosRightd37">
                                        <label class="form-check-label" for="formRadiosRightd37">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        
                        <div class="col-lg-12">
                            <h6 class="section_title__">Clinical Exam <a target="_blank"  href="{{ route('user.viewVaricoceleEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                    class="order-now_btn order-now_btn_alt ">Order Now <i
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
                            <h6 class="section_title__">Imaging <a target="_blank"  href="{{ route('user.viewVaricoceleEmboEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn order-now_btn_alt">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
                          </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>USVENOUSDOPPLER70 &gt; <span class="sub_tt__">Varicocel Grade - LEFT </span></h4>
                            </div>
                        </div> 
                     
                        <div class="col-lg-12">
                            <div class="row">
                         
                        <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Grade][]" value="Grade I (Reflux to Groin (with Vulsalva)" id="formRadiosRight48">
                                        <label class="form-check-label" for="formRadiosRight48">
                                        Grade I (Reflux to Groin (with Vulsalva)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Grade][]" value=" Grade II (Reflux to upper scrotum (with Vulsalva)" id="formRadiosRight49">
                                        <label class="form-check-label" for="formRadiosRight49">
                                        Grade II (Reflux to upper scrotum (with Vulsalva)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Grade][]" value="Grade III Reflux to lower scrotum (with Vulsalva)" id="formRadiosRightd10">
                                        <label class="form-check-label" for="formRadiosRightd10">
                                        Grade III Reflux to lower scrotum (with Vulsalva)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Grade][]" value="Grade IV (Spontoneous Reflux)" id="formRadiosRightd11">
                                        <label class="form-check-label" for="formRadiosRightd11">
                                        Grade IV (Spontoneous Reflux)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Grade][]" value="Grade V (Spontoneous Reflux with testicular atrophy)" id="formRadiosRightd12">
                                        <label class="form-check-label" for="formRadiosRightd12">
                                        Grade V (Spontoneous Reflux with testicular atrophy)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>USVENOUSDOPPLER70 &gt; <span class="sub_tt__">Scrotal Findings - LEFT</span></h4>
                            </div>
                        </div>
                     

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Testicular Size / Volume (< 2 cc)</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[LEFTTesticularSize][]" value="YES (VE Unfaverable)" id="formRadiosRightd38">
                                        <label class="form-check-label" for="formRadiosRightd38">
                                        YES (VE Unfaverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[LEFTTesticularSize][]" value="NO" id="formRadiosRightd13">
                                        <label class="form-check-label" for="formRadiosRightd13">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Testicular Mass / tumor </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[LEFTTesticularMass][]" value="YES (UFE contraindicated)"  id="formRadiosRightd14">
                                        <label class="form-check-label" for="formRadiosRightd14">
                                        YES (UFE contraindicated)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[LEFTTesticularMass][]" value="NO"  id="formRadiosRightd15">
                                        <label class="form-check-label" for="formRadiosRightd15">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Testicular Calcification (Echogenic foci)</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[LEFTTesticularCalcification][]" value="YES (VE Unfaverable)" id="formRadiosRightd39">
                                        <label class="form-check-label" for="formRadiosRightd39">
                                        YES (VE Unfaverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[LEFTTesticularCalcification][]" value="NO" id="formRadiosRightd40">
                                        <label class="form-check-label" for="formRadiosRightd40">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Epididemis Abnormality</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[LEFTEpididemisAbnormality][]" value="YES (VE Unfaverable)" id="formRadiosRightd41">
                                        <label class="form-check-label" for="formRadiosRightd41">
                                        YES (VE Unfaverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[LEFTEpididemisAbnormality][]" value="NO" id="formRadiosRightd42">
                                        <label class="form-check-label" for="formRadiosRightd42">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Hydrocele (moderate to severe) </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[LEFTHydrocele][]" value="YES (VE Unfaverable)" id="formRadiosRightd43">
                                        <label class="form-check-label" for="formRadiosRightd43">
                                        YES (VE Unfaverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[LEFTHydrocele][]" value="NO" id="formRadiosRightd44">
                                        <label class="form-check-label" for="formRadiosRightd44">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Retes testis </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[LEFTRetestestis][]" value="YES" id="formRadiosRightd45">
                                        <label class="form-check-label" for="formRadiosRightd45">
                                        YES
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[LEFTRetestestis][]" value="NO" id="formRadiosRightd46">
                                        <label class="form-check-label" for="formRadiosRightd46">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                                
                                
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>MRCIR48 &gt; <span class="sub_tt__">MRI - Scrotum Protocol- Findings </span></h4>
                            </div>
                        </div> 
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Testicular Size / Volume (< 2 cc)</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[RIGHTRetestestis][]" value="YES (VE Unfaverable)" id="formRadiosRightd16">
                                        <label class="form-check-label" for="formRadiosRightd16">
                                        YES (VE Unfaverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[RIGHTRetestestis][]" value="NO" id="formRadiosRightd17">
                                        <label class="form-check-label" for="formRadiosRightd17">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Testicular Mass / tumor </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[RIGHTTesticularMass][]" value="YES (VE contraindicated)" id="formRadiosRightd18">
                                        <label class="form-check-label" for="formRadiosRightd18">
                                        YES (VE contraindicated)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[RIGHTTesticularMass][]" value="NO" id="formRadiosRightd19">
                                        <label class="form-check-label" for="formRadiosRightd19">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Testicular Calcification (Echogenic foci)</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio"  name="Imaging[RIGHTTesticularCalcification][]" value="YES (VE Unfaverable)" id="formRadiosRightd20">
                                        <label class="form-check-label" for="formRadiosRightd20">
                                        YES (VE Unfaverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio"  name="Imaging[RIGHTTesticularCalcification][]" value="NO" id="formRadiosRightd21">
                                        <label class="form-check-label" for="formRadiosRightd21">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Epididemis Abnormality</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[RIGHTEpididemisAbnormality][]" value="YES (VE Unfaverable)" id="formRadiosRightd22">
                                        <label class="form-check-label" for="formRadiosRightd22">
                                        YES (VE Unfaverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[RIGHTEpididemisAbnormality][]" value="NO" id="formRadiosRightd23">
                                        <label class="form-check-label" for="formRadiosRightd23">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Hydrocele (moderate to severe)</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[RIGHTHydrocele][]" value="YES (VE Unfaverable)" id="formRadiosRightd24">
                                        <label class="form-check-label" for="formRadiosRightd24">
                                        YES (VE Unfaverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[RIGHTHydrocele][]" value="NO" id="formRadiosRightd25">
                                        <label class="form-check-label" for="formRadiosRightd25">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Retes testis </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[RIGHTRetestestis][]" value="YES" id="formRadiosRightd47">
                                        <label class="form-check-label" for="formRadiosRightd47">
                                        YES
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[RIGHTRetestestis][]" value="NO" id="formRadiosRightd48">
                                        <label class="form-check-label" for="formRadiosRightd48">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                                <div class="title_head">
                                    <h4>CTCIR48  </h4>
                                    </div>
                                </div> 
                        <div class="col-lg-12">
                            <div class="row">
                            
                                <div class="col-lg-4">
                                <h6 class="mb-3 lut_title">CT - Pelvic Venography Protocol - Findings </h6>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[CTCIR48][]" value="Normal" id="formRadiosRight64">
                                        <label class="form-check-label" for="formRadiosRight64">
                                        Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[CTCIR48][]" value="Abnormal" id="formRadiosRight65">
                                        <label class="form-check-label" for="formRadiosRight65">
                                        Abnormal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_65">
                                <div class="mb-3 form-group">
                                    <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
                                    <textarea class="form-control" placeholder=""  style="height: 100px" name="Imaging[NOTE][]"></textarea>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="section_title__">Image Annotation</h6>
                          <div class="title_head">
                                <h4>Annotate Prostate findings</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <!-- <div class="nodule_img">
                                <img src="images/new-images/nodules.png" alt="">
                            </div> -->
                            <div id="image-container">
                              <img src="images/new-images/nodules.png" alt="Your Image" id="image">
                            </div>
                            <div class="button_images">
                                <button class="btn r-04 btn--theme hover--tra-black add_patient" id="draw-mode" type="button">Draw</button>
                                <button class="btn r-04 btn--theme hover--tra-black add_patient" id="annotate-mode" type="button">Annotate</button>
                                <button class="btn r-04 btn--theme hover--tra-black add_patient" id="download-image" type="button">Download</button>
                            </div>
                            </div>

                            <div class="col-lg-12">
                                        
                                <h6 class="section_title__">Lab <a target="_blank"  href="{{ route('user.viewVaricoceleEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                    class="order-now_btn order-now_btn_alt">Order Now <i
                                        class="fa-solid fa-arrow-right-long"></i></a></h6>
                              </div>
                                <div class="col-lg-12">
                                  <div class="title_head">
                                      <h4>LABFERTILITYHORMONES000      &gt; <span class="sub_tt__">  FERTILITY HORMONES Results</span></h4>
                                  </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                   <div class="row">
                                      <div class="col-lg-3">
                                      <h6 class="mb-3 lut_title">Prolactin</h6>
                                      </div>  
                                      <div class="col-lg-6">
                                          <div class="lab_test_value">
                                              <select  class="tshRange" name="Lab[Prolactin][]">
                                              <option value=""></option>
                                              <option value="normal">(0.4 - 5.49 mIU/L)</option>
                                              <option value="low">(0.01 - 0.39 mIU/L)</option>
                                              <option value="high">(> 5.49 mIU/L)</option>
                                              </select>
                                              <div class="result result_value">
                                                  <!-- Display low, high, and normal values here -->
                                              </div>
                                          </div>
                                      </div>
                                      </div>
                                   </div>
                                   <div class="col-lg-12 mb-3">
                                   <div class="row">
                                      <div class="col-lg-3">
                                      <h6 class="mb-3 lut_title">TSH</h6>
                                      </div>  
                                      <div class="col-lg-6">
                                          <div class="lab_test_value">
                                              <select  class="tshRange" name="Lab[TSH][]">
                                              <option value=""></option>
                                              <option value="normal">(0.4 - 5.49 mIU/L)</option>
                                              <option value="low">(0.01 - 0.39 mIU/L)</option>
                                              <option value="high">(> 5.49 mIU/L)</option>
                                              </select>
                                              <div class="result result_value">
                                                  <!-- Display low, high, and normal values here -->
                                              </div>
                                          </div>
                                      </div>
                                      </div>
                                   </div>
                                   <div class="col-lg-12 mb-3">
                                    <div class="row">
                                       <div class="col-lg-3">
                                       <h6 class="mb-3 lut_title">FSH</h6>
                                       </div>  
                                       <div class="col-lg-6">
                                           <div class="lab_test_value">
                                               <select  class="tshRange" name="Lab[FSH][]">
                                               <option value=""></option>
                                               <option value="normal">(0.4 - 5.49 mIU/L)</option>
                                               <option value="low">(0.01 - 0.39 mIU/L)</option>
                                               <option value="high">(> 5.49 mIU/L)</option>
                                               </select>
                                               <div class="result result_value">
                                                   <!-- Display low, high, and normal values here -->
                                               </div>
                                           </div>
                                       </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="row">
                                           <div class="col-lg-3">
                                           <h6 class="mb-3 lut_title">LH</h6>
                                           </div>  
                                           <div class="col-lg-6">
                                               <div class="lab_test_value">
                                                   <select  class="tshRange" name="Lab[LH][]">
                                                   <option value=""></option>
                                                   <option value="normal">(0.4 - 5.49 mIU/L)</option>
                                                   <option value="low">(0.01 - 0.39 mIU/L)</option>
                                                   <option value="high">(> 5.49 mIU/L)</option>
                                                   </select>
                                                   <div class="result result_value">
                                                       <!-- Display low, high, and normal values here -->
                                                   </div>
                                               </div>
                                           </div>
                                           </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <div class="row">
                                               <div class="col-lg-3">
                                               <h6 class="mb-3 lut_title">Testosterone</h6>
                                               </div>  
                                               <div class="col-lg-6">
                                                   <div class="lab_test_value">
                                                       <select  class="tshRange" name="Lab[Testosterone][]">
                                                       <option value=""></option>
                                                       <option value="normal">(0.4 - 5.49 mIU/L)</option>
                                                       <option value="low">(0.01 - 0.39 mIU/L)</option>
                                                       <option value="high">(> 5.49 mIU/L)</option>
                                                       </select>
                                                       <div class="result result_value">
                                                           <!-- Display low, high, and normal values here -->
                                                       </div>
                                                   </div>
                                               </div>
                                               </div>
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <div class="row">
                                                   <div class="col-lg-3">
                                                   <h6 class="mb-3 lut_title">Estrodiol D2</h6>
                                                   </div>  
                                                   <div class="col-lg-6">
                                                       <div class="lab_test_value">
                                                           <select  class="tshRange" name="Lab[EstrodiolD2][]">
                                                           <option value=""></option>
                                                           <option value="normal">(0.4 - 5.49 mIU/L)</option>
                                                           <option value="low">(0.01 - 0.39 mIU/L)</option>
                                                           <option value="high">(> 5.49 mIU/L)</option>
                                                           </select>
                                                           <div class="result result_value">
                                                               <!-- Display low, high, and normal values here -->
                                                           </div>
                                                       </div>
                                                   </div>
                                                   </div>
                                                </div>
                     
                         
                            <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABSEMENANALYSIS000 &gt; <span class="sub_tt__">SEMEN Analysis RESULTS</span></h4>
                            </div>
                          </div>
                       
                          <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Semen Volume (ml)</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[Semen][]" value="> 1.5 ml " id="formRadiosRightd60">
                                        <label class="form-check-label" for="formRadiosRightd60">
                                        > 1.5 ml 
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[Semen][]" value="< 1.5 ml " id="formRadiosRightd61">
                                        <label class="form-check-label" for="formRadiosRightd61">
                                        < 1.5 ml 
                                        </label>
                                    </div>
                                </div>
                           
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Sperm count (Million)</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[Spermcount][]" value="> 39 Million " id="formRadiosRightd62">
                                        <label class="form-check-label" for="formRadiosRightd62">
                                        > 39 Million
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[Spermcount][]" value="< 39 Million  (VE Faverable)" id="formRadiosRightd63">
                                        <label class="form-check-label" for="formRadiosRightd63">
                                        < 39 Million  (VE Faverable)
                                        </label>
                                    </div>
                                </div>
                           
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Sperm Concentration (Million/ml)</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[SpermConcentration][]" value="> 15 Million /ml" id="formRadiosRightd64">
                                        <label class="form-check-label" for="formRadiosRightd64">
                                        > 15 Million /ml
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[SpermConcentration][]" value="< 15 Million /ml  (VE Faverable)" id="formRadiosRightd65">
                                        <label class="form-check-label" for="formRadiosRightd65">
                                        < 15 Million /ml  (VE Faverable)
                                        </label>
                                    </div>
                                </div>
                           
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Normal Form</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[NormalForm][]" value=">4%" id="formRadiosRightd66">
                                        <label class="form-check-label" for="formRadiosRightd66">
                                        > 4%
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[NormalForm][]" value="< 4% (VE Faverable)" id="formRadiosRightd67">
                                        <label class="form-check-label" for="formRadiosRightd67">
                                        < 4% (VE Faverable)
                                        </label>
                                    </div>
                                </div>
                           
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Progressive (Forward) Motility</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[Progressive][]" value=" > 32%"  id="formRadiosRightd68">
                                        <label class="form-check-label" for="formRadiosRightd68">
                                        > 32%
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[Progressive][]" value="< 32%  (VE Faverable)"  id="formRadiosRightd69">
                                        <label class="form-check-label" for="formRadiosRightd69">
                                        < 32%  (VE Faverable)
                                        </label>
                                    </div>
                                </div>
                           
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">WBC (Million /ml)</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio"  name="Lab[WBC][]" value="< 1%" id="formRadiosRightd70">
                                        <label class="form-check-label" for="formRadiosRightd70">
                                        < 1%
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio"  name="Lab[WBC][]" value="> 1%" id="formRadiosRightd71">
                                        <label class="form-check-label" for="formRadiosRightd71">
                                        > 1%
                                        </label>
                                    </div>
                                </div>
                           
                            </div>
                        </div>
                        


                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABSEMENCULTURE000 </h4>
                            </div>
                          </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                            <h6 class="mb-3 lut_title">SEMEN culture RESULTS</h6>
                            </div>
                          
                            <div class="col-lg-6">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[culture][]" value="Negative / no growth" id="formRadiosRight77">
                                    <label class="form-check-label" for="formRadiosRight77">
                                    Negative / no growth
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[culture][]" value="Positive  (VE contraindicated)" id="formRadiosRight76">
                                    <label class="form-check-label" for="formRadiosRight76">
                                    Positive  (VE contraindicated)
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_76">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***"  style="height: 100px" name="Lab[NOTE][]"></textarea>
                                    </div>
                                </div>
                        </div>
                    

                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABDNAFRAG000</h4>
                            </div>
                        </div>

                        <div class="col-lg-12">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                    <h6 class="mb-3 lut_title">DNA Fragmentation RESULTS</h6>
                                </div>
                                    <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Lab[RESULTS][]" value="Normal (&#60;30%)" id="formRadiosRight82">
                                        <label class="form-check-label" for="formRadiosRight82">
                                        Normal (&#60;30%)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="checkbox" name="Lab[RESULTS1][]" value=" < 1.5 ml " id="formRadiosRight83">
                                        <label class="form-check-label" for="formRadiosRight83">
                                        < 1.5 ml 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="checkbox" name="Lab[RESULTS2][]" value="AbNormal (>30%)" id="formRadiosRightd72">
                                        <label class="form-check-label" for="formRadiosRightd72">
                                        AbNormal (>30%)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="checkbox" name="Lab[RESULTS3][]" value=" < 39 Million  (VE Faverable)" id="formRadiosRightd73">
                                        <label class="form-check-label" for="formRadiosRightd73">
                                        < 39 Million  (VE Faverable)
                                        </label>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        
                       
                     
                        <div class="col-lg-12  mb-2">
                            <h6 class="section_title__">Special Investigation <a href="#" data-bs-toggle="modal" data-bs-target="#refer_patient" class="order-now_btn ">Reffer <i class="fa-solid fa-arrow-right-long"></i></a></h6>
                            <div class="title_head">
                                  <h4>REQDNAFRAGTEST320</h4>
                              </div>
                        
                              <div class="row align-items-center">
                              <div class="col-lg-4">
                                  <h6 class="mb-3 lut_title">DNA Fragmentation test</h6>
                                  </div>
                                  <div class="col-lg-4">
                                      <div class="form-check form-check-right mb-3">
                                          <input class="form-check-input" type="radio" name="SpecialInvestigation[Peripheral][]"  value="Normal" id="formRadiosRightbf5">
                                          <label class="form-check-label" for="formRadiosRightbf5">
                                          Normal
                                          </label>
                                      </div>
                                   
                                  </div>
                                  <div class="col-lg-4">
                                      <div class="form-check form-check-right mb-3">
                                          <input class="form-check-input" type="radio" name="SpecialInvestigation[Peripheral][]"  value="Abnormal" id="formRadiosRightbf7">
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
                                              <textarea  name="SpecialInvestigation[PeripheralNote][]" class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"></textarea>
                                              </div>
                                          </div>
                                          </div>
                                         
                                          
                                              
                                      </div>
                                   </div>


  
                              </div>
                       

                        <div class="col-lg-12">
                            <h6 class="section_title__">MDT <a target="_blank"  href="{{ route('user.viewVaricoceleEmboEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn order-now_btn_alt">Medical Record <i class="fa-solid fa-arrow-right-long"></i></a></h6>
                          </div>
                          <div class="col-lg-12">
                            <div class="title_head">
                                <h4>MDTREVIEW00    &#62; <span class="sub_tt__"> MSK MDT outcome</span></h4>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <h6 class="mb-3 lut_title">MDT decision</h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                         
                                        <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="MDT[VE][]" value="VE" id="formRadiosRight84">
                                            <label class="form-check-label" for="formRadiosRight84">
                                                VE
                                            </label>
                                        </div>
                                        <div  id="textarea_84">
                                        <div class="form-check form-check-right mb-3">
                                          <textarea class="form-control" placeholder="Enter Elaborate    VE / notes here***"  style="height: 100px" name="MDT[VENote][]"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="MDT[Medical][]" value="Medical"  id="formRadiosRight85">
                                            <label class="form-check-label" for="formRadiosRight85">
                                                Medical 
                                            </label>
                                        </div>
                                        <div  id="textarea_85">
                                        <div class="form-check form-check-right mb-3">
                                          <textarea class="form-control" placeholder="Enter Elaborate Medical / conservative/ notes here***"  style="height: 100px" name="MDT[MedicalNote][]"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="MDT[IVF][]" value="IVF" id="formRadiosRight86">
                                            <label class="form-check-label" for="formRadiosRight86">
                                                IVF
                                            </label>
                                        </div>
                                        <div  id="textarea_86">
                                        <div class="form-check form-check-right mb-3">
                                          <textarea class="form-control" placeholder="Enter Elaborate IVF / notes here***"  style="height: 100px" name="MDT[IVFNote][]"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="MDT[options][]" value="options" id="formRadiosRight87">
                                            <label class="form-check-label" for="formRadiosRight87">
                                            Other options
                                            </label>
                                        </div>
                                        <div  id="textarea_87">
                                        <div class="form-check form-check-right mb-3">
                                          <textarea class="form-control" placeholder="Enter Elaborate  Other options / notes here***"  style="height: 100px" name="MDT[optionsNote][]"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                  
                                
                                  
                                 
                                </div>
                            </div>

                        <div class="col-lg-12">
                            <h6 class="section_title__">Elegibility STATUS <a target="_blank"  href="{{ route('user.viewVaricoceleEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                    class="order-now_btn order-now_btn_alt">Medical Record <i
                                        class="fa-solid fa-arrow-right-long"></i></a></h6>ElegibilitySTATUS
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Choose Eligible treatment option</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row align-items-center">
                         
                                        <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3 ">
                                            <input class="form-check-input" type="checkbox"  name="ElegibilitySTATUS[VARICOCELEEMBOLIZATION][]" value="VARICOCELE EMBOLIZATION (VE)" id="formRadiosRight90">
                                            <label class="form-check-label" for="formRadiosRight90">
                                            VARICOCELE EMBOLIZATION (VE)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3 ">
                                            <input class="form-check-input" type="checkbox"  name="ElegibilitySTATUS[OTHERS][]" value="OTHERS" id="formRadiosRight91">
                                            <label class="form-check-label" for="formRadiosRight91">
                                            OTHERS
                                            </label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3 ">
                                            <input class="form-check-input" type="radio" name="formRadiosRight17" id="formRadiosRight92">
                                            <label class="form-check-label" for="formRadiosRight92">
                                            Surgical
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="radio" name="formRadiosRight17" id="formRadiosRight93">
                                            <label class="form-check-label" for="formRadiosRight93">
                                            Other options
                                            </label>
                                        </div>
                                    </div> -->
                                    <div class="col-lg-12" id="textarea_90" style="">
                                        <div class="form-check form-check-right mb-3">
                                          <textarea class="form-control" placeholder="Enter Elaborate  VE / notes here***" style="height: 100px" name="ElegibilitySTATUS[VARICOCELEEMBOLIZATIONNote][]"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="textarea_91" style="">
                                        <div class="form-check form-check-right mb-3">
                                          <textarea class="form-control" placeholder="Enter Elaborate Other / notes here***" style="height: 100px" name="ElegibilitySTATUS[OTHERSNote][]"></textarea>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-12" id="textarea_92">
                                        <div class="form-check form-check-right mb-3">
                                          <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***"  style="height: 100px"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="textarea_93">
                                        <div class="form-check form-check-right mb-3">
                                          <textarea class="form-control" placeholder="Enter Elaborate Other options / notes here***"  style="height: 100px"></textarea>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        <div class="col-lg-12 mb-3">
                            <h6 class="section_title__">Intervention PROCEDURE / Rx <a
                                    target="_blank"  href="{{ route('user.viewVaricoceleEmboEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn order-now_btn_alt">Order Now <i
                                        class="fa-solid fa-arrow-right-long"></i></a></h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[ANGIOVE1780][]" value="ANGIOVE1780" id="formRadiosRightb37">
                                            <label class="form-check-label" for="formRadiosRightb37">
                                            ANGIOVE1780
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightb38">
                                            <label class="form-check-label" for="formRadiosRightb38">
                                            LABPREANGIO48
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightb39">
                                            <label class="form-check-label" for="formRadiosRightb39">
                                            LABPREIRSAFETY17
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[IVSEDATION270][]" value="IVSEDATION270" id="formRadiosRightb40">
                                            <label class="form-check-label" for="formRadiosRightb40">
                                            IVSEDATION270
                                            </label>    
                                    </div>
                                </div>
                                
                                <!-- <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[][]" value="" id="formRadiosRightd34">
                                            <label class="form-check-label" for="formRadiosRightd34">
                                            LABPREIRSAFETY17
                                            </label>    
                                    </div>
                                </div> -->
                              
                            </div>
                        </div>
                  
                       
                      
                       
                        

                        <div class="col-lg-12 mb-3">
                            <h6 class="section_title__">Supportive <a target="_blank"  href="{{ route('user.viewVaricoceleEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                    class="order-now_btn order-now_btn_alt">Medical Record <i
                                        class="fa-solid fa-arrow-right-long"></i></a></h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Supportive[IVVITAFERTILITY175][]" value="IVVITAFERTILITY175" id="formRadiosRightb45">
                                            <label class="form-check-label" for="formRadiosRightb45">
                                            IVVITAFERTILITY175
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Supportive[LABPREIVBASIC52][]" value="LABPREIVBASIC52" id="formRadiosRightb46">
                                            <label class="form-check-label" for="formRadiosRightb46">
                                            LABPREIVBASIC52
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Supportive[LABPREIVADVANCED230][]" value="LABPREIVADVANCED230" id="formRadiosRightb47">
                                            <label class="form-check-label" for="formRadiosRightb47">
                                            LABPREIVADVANCED230
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Supportive[IMCOQ1069][]" value="IMCOQ1069" id="formRadiosRightd32">
                                            <label class="form-check-label" for="formRadiosRightd32">
                                            IMCOQ1069
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3" id="Supportive">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Supportive[PROZ290][]" value="PROZ290" id="formRadiosRightd33">
                                            <label class="form-check-label" for="formRadiosRightd33">
                                            PROZ290 
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
                            <h6 class="section_title__">Referral <a href="#" data-bs-toggle="modal" data-bs-target="#refer_patient" class="order-now_btn">Reffer <i class="fa-solid fa-arrow-right-long"></i></a></h6>
                          <div class="title_head">
                                <h4>HCREFFERAL</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                        
                                <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3 ">
                                    <input class="form-check-input" type="checkbox" name="Referral[Physiotherapy][]" value="Physiotherapy" id="formRadiosRightb48">
                                    <label class="form-check-label" for="formRadiosRightb48">
                                    Pelvic Rehab / Physiotherapy
                                    </label>
                                </div>
                                <div class="col-lg-12" id="textarea_b48" style="">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[PhysiotherapyNote][]" ></textarea>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3 ">
                                    <input class="form-check-input" type="checkbox" name="Referral[IVF][]" value="IVF" id="formRadiosRightb49">
                                    <label class="form-check-label" for="formRadiosRightb49">
                                    IVF
                                    </label>
                                </div>
                                <div class="col-lg-12" id="textarea_b49" style="">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px " name="Referral[IVFNote][]" ></textarea>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3 ">
                                    <input class="form-check-input" type="checkbox" name="Referral[Urology][]" value="Urology" id="formRadiosRightb50">
                                    <label class="form-check-label" for="formRadiosRightb50">
                                    Urology
                                    </label>
                                </div>
                                <div class="col-lg-12" id="textarea_b50" style="">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[UrologyNote][]"></textarea>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="checkbox" name="Referral[Andrology][]" value="Andrology" id="formRadiosRightb51">
                                    <label class="form-check-label" for="formRadiosRightb51">
                                    Andrology
                                    </label>
                                </div>
                                <div class="col-lg-12" id="textarea_b51" style="">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[AndrologyNote][]"></textarea>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="checkbox" name="Referral[Endocrinology][]" value="Endocrinology" id="formRadiosRightb52">
                                    <label class="form-check-label" for="formRadiosRightb52">
                                    Endocrinology
                                    </label>
                                </div>
                                <div class="col-lg-12" id="textarea_b52" style="">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[EndocrinologyNote][]"></textarea>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="checkbox" name="Referral[Others][]" value="Others" id="formRadiosRightb53">
                                    <label class="form-check-label" for="formRadiosRightb53">
                                    Others
                                    </label>
                                </div>
                                <div class="col-lg-12" id="textarea_b53" style="">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[OthersNote][]"></textarea>
                                </div>
                            </div>
                            </div>
                       
                          
                            
                            
                        
                          
                        </div>
                        </div>

                       
                    </div>
              
                </div>
                <div class="action_btns">
            
            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient draft_btn">SAVE DRAFT</button>
            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">SAVE FINAL</button>
          </div>
            </div>
          </div>
            
       
          </form>
        </div>
    </div>
</div>








    @push('custom-js')
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
    
    
            
            $("#textarea_65").hide();
            $("#formRadiosRight65").click(function(){
                $("#textarea_65").show();
            });
            $("#formRadiosRight64").click(function(){
                $("#textarea_65").hide();
            });
            })
    </script>
    
    <script>
        $(document).ready(function(){
            $("#textarea_90").hide();
            $("#textarea_91").hide();
            $("#textarea_92").hide();
            $("#textarea_93").hide();
    
            $("#formRadiosRight90").click(function(){
                $("#textarea_90").toggle();
              
            });
            $("#formRadiosRight91").click(function(){
                $("#textarea_91").toggle();
            });
            $("#formRadiosRight92").click(function(){
                $("#textarea_92").toggle();
            });
            $("#formRadiosRight93").click(function(){
                $("#textarea_93").toggle();
            });
        })
    </script>
   <script>
    $(document).ready(function(){
        $("#textarea_b48").hide();
        $("#textarea_b49").hide();
        $("#textarea_b50").hide();
        $("#textarea_b51").hide();
        $("#textarea_b52").hide();
        $("#textarea_b53").hide();



        $("#formRadiosRightb48").click(function(){
            $("#textarea_b48").toggle();
        
        });
        $("#formRadiosRightb49").click(function(){
            $("#textarea_b49").toggle();
        });
        $("#formRadiosRightb50").click(function(){
           $("#textarea_b50").toggle();
        
        });
        $("#formRadiosRightb51").click(function(){
            $("#textarea_b51").toggle();
          
        });
        $("#formRadiosRightb52").click(function(){
            $("#textarea_b52").toggle();
            
        });
        $("#formRadiosRightb53").click(function(){
            $("#textarea_b53").toggle();
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



    {{-- sysmtoms scrore calculation --}}
<script>
    $(document).ready(function() {
        $('.symtoms_scrore_checkbox').click(function(){
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

            if (totalPoints >= 0 && totalPoints <= 5) {
                mildLUTS.classList.remove('hidden');
            } else if (totalPoints >= 6 && totalPoints <= 15) {
                moderateLUTS.classList.remove('hidden');
            } else if (totalPoints >= 16 && totalPoints <= 1035) {
                severeLUTS.classList.remove('hidden');
            }
        }
    });
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
        $("#textarea_a890").hide();
        $("#textarea_a789").hide();
        
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
    $(document).ready(function() {
        $("#textarea_a852").hide();
        

        $("#formRadiosRightbf1").click(function() {
            $("#textarea_a852").toggle();
        });
      
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

            // focal headache start  
            var isChecked_sym_a1 = $("#sym_a1").is(":checked");
           
            var sym_a1_durationValue = $("select[name='symptoms[0][1]']").val();
            
            var sym_a1_durationType = $("select[name='symptoms[0][2]']").val();
            var sym_a1_description = $("textarea[name='symptoms[0][3]']").val();

            if (sym_a1_durationValue !== "" || sym_a1_durationType !== "" || sym_a1_description !== "") {
               
                if(isChecked_sym_a1 ===false){
                    
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please fill out Scrotal swelling fields in Symptoms.',
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
// focal headache end  


// numbness/ pain to neck or shoulder or arm start
var isChecked_sym_a2 = $("#sym_a2").is(":checked");
           
           var sym_a2_durationValue = $("select[name='symptoms[1][1]']").val();
           
           var sym_a2_durationType = $("select[name='symptoms[1][2]']").val();
           var sym_a2_description = $("textarea[name='symptoms[1][3]']").val();

           if (sym_a2_durationValue !== "" || sym_a2_durationType !== "" || sym_a2_description !== "") {
              
               if(isChecked_sym_a2 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Scrotal heaviness fields in Symptoms.',
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
// numbness/ pain to neck or shoulder or arm end 



// associated with nausea or vomiting start
var isChecked_sym_a3 = $("#sym_a3").is(":checked");
           
           var sym_a3_durationValue = $("select[name='symptoms[2][1]']").val();
           
           var sym_a3_durationType = $("select[name='symptoms[2][2]']").val();
           var sym_a3_description = $("textarea[name='symptoms[2][3]']").val();

           if (sym_a3_durationValue !== "" || sym_a3_durationType !== "" || sym_a3_description !== "") {
              
               if(isChecked_sym_a3 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Scrotal heat fields in Symptoms.',
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
// associated with nausea or vomiting end 


//  associated with vertigo or drawziness start
var isChecked_sym_a4 = $("#sym_a4").is(":checked");
           
           var sym_a4_durationValue = $("select[name='symptoms[3][1]']").val();
           
           var sym_a4_durationType = $("select[name='symptoms[3][2]']").val();
           var sym_a4_description = $("textarea[name='symptoms[3][3]']").val();

           if (sym_a4_durationValue !== "" || sym_a4_durationType !== "" || sym_a4_description !== "") {
              
               if(isChecked_sym_a4 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Scrotal pain fields in Symptoms.',
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
//  associated with vertigo or drawziness end 



//  associated with blurring / visual disturbances start
var isChecked_sym_a5 = $("#sym_a5").is(":checked");
           
           var sym_a5_durationValue = $("select[name='symptoms[4][1]']").val();
           
           var sym_a5_durationType = $("select[name='symptoms[4][2]']").val();
           var sym_a5_description = $("textarea[name='symptoms[4][3]']").val();

           if (sym_a5_durationValue !== "" || sym_a5_durationType !== "" || sym_a5_description !== "") {
              
               if(isChecked_sym_a5 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Groin / thigh pain fields in Symptoms.',
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
//  associated with blurring / visual disturbances end 



//  Sleep disturbance start
var isChecked_sym_a75 = $("#sym_a75").is(":checked");
           
           var sym_a75_durationValue = $("select[name='symptoms[5][1]']").val();
           
           var sym_a75_durationType = $("select[name='symptoms[5][2]']").val();
           var sym_a75_description = $("textarea[name='symptoms[5][3]']").val();

           if (sym_a75_durationValue !== "" || sym_a75_durationType !== "" || sym_a75_description !== "") {
              
               if(isChecked_sym_a75 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Erectile dysfunction fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a75');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Sleep disturbance end 



//  Lethargy start
var isChecked_sym_a7 = $("#sym_a7").is(":checked");
           
           var sym_a7_durationValue = $("select[name='symptoms[6][1]']").val();
           
           var sym_a7_durationType = $("select[name='symptoms[6][2]']").val();
           var sym_a7_description = $("textarea[name='symptoms[6][3]']").val();

           if (sym_a7_durationValue !== "" || sym_a7_durationType !== "" || sym_a7_description !== "") {
              
               if(isChecked_sym_a7 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Infertility fields in Symptoms.',
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
//  Lethargy end 



//  Burning Micturation start
var isChecked_sym_a7Fatigue = $("#sym_a7Fatigue").is(":checked");
           
           var sym_a7Fatigue_durationValue = $("select[name='symptoms[7][1]']").val();
           
           var sym_a7Fatigue_durationType = $("select[name='symptoms[7][2]']").val();
           var sym_a7Fatigue_description = $("textarea[name='symptoms[7][3]']").val();

           if (sym_a7Fatigue_durationValue !== "" || sym_a7Fatigue_durationType !== "" || sym_a7Fatigue_description !== "") {
              
               if(isChecked_sym_a7Fatigue ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Burning Micturation fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a7Fatigue');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Burning Micturation end 



//  Pain during defecation start
var isChecked_8Painduringdefecation = $("#sym_8Painduringdefecation").is(":checked");
           
           var _8Painduringdefecation_durationValue = $("select[name='symptoms[8][1]']").val();
           
           var _8Painduringdefecation_durationType = $("select[name='symptoms[8][2]']").val();
           var _8Painduringdefecation_description = $("textarea[name='symptoms[8][3]']").val();

           if (_8Painduringdefecation_durationValue !== "" || _8Painduringdefecation_durationType !== "" || _8Painduringdefecation_description !== "") {
              
               if(isChecked_8Painduringdefecation ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Pain during defecation fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_8Painduringdefecation');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Pain during defecation end 


//  Recurrent Urinary tract infections start
var isChecked_8RecurrentUrinarytractinfections = $("#sym_8RecurrentUrinarytractinfections").is(":checked");
           
           var _8RecurrentUrinarytractinfections_durationValue = $("select[name='symptoms[9][1]']").val();
           
           var _8RecurrentUrinarytractinfections_durationType = $("select[name='symptoms[9][2]']").val();
           var _8RecurrentUrinarytractinfections_description = $("textarea[name='symptoms[9][3]']").val();

           if (_8RecurrentUrinarytractinfections_durationValue !== "" || _8RecurrentUrinarytractinfections_durationType !== "" || _8RecurrentUrinarytractinfections_description !== "") {
              
               if(isChecked_8RecurrentUrinarytractinfections ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Recurrent Urinary tract infections fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_8RecurrentUrinarytractinfections');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Recurrent Urinary tract infections end 


//  Other start
var isChecked_sym_a18 = $("#sym_a18").is(":checked");
           
           var sym_a18_durationValue = $("select[name='symptoms[13][1]']").val();
           
           var sym_a18_durationType = $("select[name='symptoms[13][2]']").val();
           var sym_a18_description = $("textarea[name='symptoms[13][3]']").val();

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
//  Other end 
            return true; 
        }

        
        $("#storeVaricoceleEmboEligibilityForms").submit(function(event) {
            
            event.preventDefault();
            let formData = new FormData(this);
            if (!validateForm()) {
                e.preventDefault(); 
            } 
            else {
                if(validateForm()){

                
                
                $.ajax({
                                url: '{{ route("user.storeVaricoceleEmboEligibilityForms") }}',
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    
                                    var patientId = response.patient_id;
                                    if(response!=''){
              
                                        swal.fire(
              
                                            'Success',
              
                                            'Varicocele Embo form saved successfully!',
              
                                            'success'
              
                                        ).then(function() {
                                                
                                               
                                            var redirectUrl = "{{ route('user.viewVaricoceleEmboEligibilityForms', ['id' => ':id']) }}";
                                            redirectUrl = redirectUrl.replace(':id', patientId);
                                            window.location.href = redirectUrl;
                                            });
                                       
                                       
                                        }
                                }
                             
                                
                            });
              
                
            }
        }
        });
    });
</script>
    @endpush
@endsection

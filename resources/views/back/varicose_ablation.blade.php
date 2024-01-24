@extends('back.layout.main_view')
@push('title')
    Patient | Varicose Ablation| QASTARAT & DAWALI CLINICS
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
        <h1 class=""> <span class="blue_theme"> Varicose Ablation (VA) Form</span> </h1>
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
            <form method="POST" action="{{ route('user.StoreVaricoseAblationEligibilityForms') }}" enctype="multipart/form-data" >
                @csrf

            <input type="hidden" name="patient_id" value="{{ @$patient_id }}"/>

            
          <h3 class="form_title">Varicose Ablation (VA)</h3>
        
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
                                <input class="form-check-input" type="checkbox" name="diagnosis_general[VaricoseVeins][]" value="Varicose Veins" id="formRadiosRight1">
                                <label class="form-check-label" for="formRadiosRight1">
                                Varicose Veins
                                </label>
                            </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Thrombophlebitis][]" value="Thrombophlebitis" id="formRadiosRight2">
                            <label class="form-check-label" for="formRadiosRight2">
                            Thrombophlebitis
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Venousinsufficiency][]" value="Venous insufficiency" id="formRadiosRight3">
                            <label class="form-check-label" for="formRadiosRight3">
                            Venous insufficiency
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Reticular][]" value="Reticular/ spider veins" id="formRadiosRight4">
                            <label class="form-check-label" for="formRadiosRight4">
                            Reticular/ spider veins
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Pedaledema][]" value="Pedal edema" id="formRadiosRight5">
                            <label class="form-check-label" for="formRadiosRight5">
                            Pedal edema
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Venousuicer][]" value="Venous uicer" id="formRadiosRight6">
                            <label class="form-check-label" for="formRadiosRight6">
                            Venous uicer
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Lipidema][]" value="Lipidema" id="formRadiosRight7">
                            <label class="form-check-label" for="formRadiosRight7">
                            Lipidema
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[DeepVeinThrombosis][]" value="Deep Vein Thrombosis" id="formRadiosRightd1">
                            <label class="form-check-label" for="formRadiosRightd1">
                            Deep Vein Thrombosis
                            </label>
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
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[0220][]" value="022.0 Varicose veins of lower extremity in pregnancy" id="formRadiosRight8">
                            <label class="form-check-label" for="formRadiosRight8">
                            022.0 Varicose veins of lower extremity in pregnancy 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[183][]" value="183 Varicose veins of lower extremities" id="formRadiosRight9">
                            <label class="form-check-label" for="formRadiosRight9">
                            183 Varicose veins of lower extremities
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[1830][]" value="183.0 Varicose veins of lower extremities with ulcer " id="formRadiosRight10">
                            <label class="form-check-label" for="formRadiosRight10">
                            183.0 Varicose veins of lower extremities with ulcer 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[1831][]" value="183.1 Varicose veins of lower extremities with inflammation" id="formRadiosRight11">
                            <label class="form-check-label" for="formRadiosRight11">
                            183.1 Varicose veins of lower extremities with inflammation 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[1832][]" value="183.2 Varicose veins of lower extremities with both ulcer and inflammation" id="formRadiosRight12">
                            <label class="form-check-label" for="formRadiosRight12">
                            183.2 Varicose veins of lower extremities with both ulcer and inflammation 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[1839][]" value="183.9 Varicose veins of lower extremities without ulcer or inflammation " id="formRadiosRight13">
                            <label class="form-check-label" for="formRadiosRight13">
                            183.9 Varicose veins of lower extremities without ulcer or inflammation 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[186][]" value="186 Varicose veins of other sites" id="formRadiosRightc1">
                            <label class="form-check-label" for="formRadiosRightc1">
                            186 Varicose veins of other sites
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[1862][]" value="186.2 Pelvic varices" id="formRadiosRightc2">
                            <label class="form-check-label" for="formRadiosRightc2">
                            186.2 Pelvic varices
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[1863][]" value="186.3 Vulval varices" id="formRadiosRightc3">
                            <label class="form-check-label" for="formRadiosRightc3">
                            186.3 Vulval varices
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[1872][]" value=" 187.2 Venous insufficiency (Chronic) (Peripheral) " id="formRadiosRightc4">
                            <label class="form-check-label" for="formRadiosRightc4">
                            187.2 Venous insufficiency (Chronic) (Peripheral) 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[1878][]" value="187.8 Other specified disorders of veins" id="formRadiosRightc5">
                            <label class="form-check-label" for="formRadiosRightc5">
                            187.8 Other specified disorders of veins
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[1879][]" value="187.9 Disorder of vein, unspecified" id="formRadiosRightc6">
                            <label class="form-check-label" for="formRadiosRightc6">
                            187.9 Disorder of vein, unspecified
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Y528][]" value="Y52.8 Antivaricose drugs, including sclerosing agents " id="formRadiosRightc7">
                            <label class="form-check-label" for="formRadiosRightc7">
                            Y52.8 Antivaricose drugs, including sclerosing agents 
                            </label>
                        </div>
                     </div>
                        </div>
                    </div>
                       
                     <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Varicose Veins Symptoms Score (VVSS)</h4>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th colspan="5" class="top_header_frm_tb">Calculate VVSS Score</th>
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
                                    <td>Dilated leg veins</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dilatedlegveins][]" value="0" id="formRadiosRight14">
                                            <label class="form-check-label" for="formRadiosRight14">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dilatedlegveins][]" value="1" id="formRadiosRight15">
                                            <label class="form-check-label" for="formRadiosRight15">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dilatedlegveins][]" value="3" id="formRadiosRight16">
                                            <label class="form-check-label" for="formRadiosRight16">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dilatedlegveins][]" value="5" id="formRadiosRight17">
                                            <label class="form-check-label" for="formRadiosRight17">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Leg edema / swelling</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legedemaswelling][]" value="0" id="formRadiosRight18">
                                            <label class="form-check-label" for="formRadiosRight18">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legedemaswelling][]" value="1" id="formRadiosRight19">
                                            <label class="form-check-label" for="formRadiosRight19">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legedemaswelling][]" value="3" id="formRadiosRight20">
                                            <label class="form-check-label" for="formRadiosRight20">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legedemaswelling][]" value="5" id="formRadiosRight21">
                                            <label class="form-check-label" for="formRadiosRight21">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Warm legs / feet</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Warmlegsfeet][]" value="0" id="formRadiosRight22">
                                            <label class="form-check-label" for="formRadiosRight22">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Warmlegsfeet][]" value="1" id="formRadiosRight23">
                                            <label class="form-check-label" for="formRadiosRight23">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Warmlegsfeet][]" value="3" id="formRadiosRight24">
                                            <label class="form-check-label" for="formRadiosRight24">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Warmlegsfeet][]" value="5" id="formRadiosRight25">
                                            <label class="form-check-label" for="formRadiosRight25">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Leg heaviness</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legheaviness][]" value="0" id="formRadiosRight26">
                                            <label class="form-check-label" for="formRadiosRight26">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legheaviness][]" value="1" id="formRadiosRight27">
                                            <label class="form-check-label" for="formRadiosRight27">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legheaviness][]" value="3" id="formRadiosRight28">
                                            <label class="form-check-label" for="formRadiosRight28">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legheaviness][]" value="5" id="formRadiosRight29">
                                            <label class="form-check-label" for="formRadiosRight29">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Leg Pain / burning</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[LegPainburning][]" value="0" id="formRadiosRight30">
                                            <label class="form-check-label" for="formRadiosRight30">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[LegPainburning][]" value="1" id="formRadiosRight31">
                                            <label class="form-check-label" for="formRadiosRight31">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[LegPainburning][]" value="3" id="formRadiosRight32">
                                            <label class="form-check-label" for="formRadiosRight32">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[LegPainburning][]" value="5" id="formRadiosRight33">
                                            <label class="form-check-label" for="formRadiosRight33">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>
                                    <tr>
                                    <td>Leg pins & needles</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legpinsneedles][]" value="0" id="formRadiosRighte84">
                                            <label class="form-check-label" for="formRadiosRighte84">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legpinsneedles][]" value="1" id="formRadiosRighte85">
                                            <label class="form-check-label" for="formRadiosRighte85">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legpinsneedles][]" value="3" id="formRadiosRighte86">
                                            <label class="form-check-label" for="formRadiosRighte86">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legpinsneedles][]" value="5" id="formRadiosRighte87">
                                            <label class="form-check-label" for="formRadiosRighte87">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>
                                    <tr>
                                    <td>Leg itching</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legitching][]" value="0" id="formRadiosRighte88">
                                            <label class="form-check-label" for="formRadiosRighte88">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legitching][]" value="1" id="formRadiosRighte89">
                                            <label class="form-check-label" for="formRadiosRighte89">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legitching][]" value="3" id="formRadiosRighte90">
                                            <label class="form-check-label" for="formRadiosRighte90">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Legitching][]" value="5" id="formRadiosRighte91">
                                            <label class="form-check-label" for="formRadiosRighte91">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>
                                    <tr>
                                    <td>Night cramps</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Nightcramps][]" value="0" id="formRadiosRighte92">
                                            <label class="form-check-label" for="formRadiosRighte92">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Nightcramps][]" value="1" id="formRadiosRighte93">
                                            <label class="form-check-label" for="formRadiosRighte93">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Nightcramps][]" value="3" id="formRadiosRighte94">
                                            <label class="form-check-label" for="formRadiosRighte94">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Nightcramps][]" value="5" id="formRadiosRighte95">
                                            <label class="form-check-label" for="formRadiosRighte95">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>
                                    <tr>
                                    <td>Skin pigmentation</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Skinpigmentation][]" value="0" id="formRadiosRighte96">
                                            <label class="form-check-label" for="formRadiosRighte96">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Skinpigmentation][]" value="1" id="formRadiosRighte97">
                                            <label class="form-check-label" for="formRadiosRighte97">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Skinpigmentation][]" value="3" id="formRadiosRighte98">
                                            <label class="form-check-label" for="formRadiosRighte98">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Skinpigmentation][]" value="5" id="formRadiosRighte99">
                                            <label class="form-check-label" for="formRadiosRighte99">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>
                                    <tr>
                                    <td>General malise</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Generalmalise][]" value="0" id="formRadiosRighte1">
                                            <label class="form-check-label" for="formRadiosRighte1">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Generalmalise][]" value="1" id="formRadiosRighte2">
                                            <label class="form-check-label" for="formRadiosRighte2">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Generalmalise][]" value="3" id="formRadiosRighte3">
                                            <label class="form-check-label" for="formRadiosRighte3">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Generalmalise][]" value="5" id="formRadiosRighte4">
                                            <label class="form-check-label" for="formRadiosRighte4">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>
                                    <tr>
                                    <td>Leg Ulcers</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[LegUlcers][]" value="0" id="formRadiosRighte5">
                                            <label class="form-check-label" for="formRadiosRighte5">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[LegUlcers][]" value="1" id="formRadiosRighte6">
                                            <label class="form-check-label" for="formRadiosRighte6">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[LegUlcers][]" value="3" id="formRadiosRighte7">
                                            <label class="form-check-label" for="formRadiosRighte7">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[LegUlcers][]" value="5" id="formRadiosRighte8">
                                            <label class="form-check-label" for="formRadiosRighte8">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>
                                    <tr id="mildLUTS" class="hidden">
                                        <td colspan="3" rowspan="3"></td>
                                        <th>Mild </th>
                                        <th>(0-15 pts)</th>
                                    </tr>
                                    <tr id="moderateLUTS" class="hidden">>
                                        <td colspan="3" rowspan="3"></td>
                                        <th>Moderate </th>
                                        <th>(16-39 pts)</th>
                                    </tr>
                                    <tr id="severeLUTS" class="hidden">
                                        <td colspan="3" rowspan="3"></td>
                                        <th>Severe  </th>
                                        <th>(40-55 pts) </th>
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
                                    <h6 class="mb-3 lut_title">lower extremity Phlepitis</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[lowerextremityPhlepitis][]" value="YES  (VVA unfaverable)" id="formRadiosRight42">
                                        <label class="form-check-label" for="formRadiosRight42">
                                        YES  (VVA unfaverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[lowerextremityPhlepitis][]" value="No" id="formRadiosRight43">
                                        <label class="form-check-label" for="formRadiosRight43">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">lower extremity DVT (ACTIVE)</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[lowerextremityDVTActive][]" value="YES  (VVA unfaverable)" id="formRadiosRight44">
                                        <label class="form-check-label" for="formRadiosRight44">
                                        YES  (VVA unfaverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[lowerextremityDVTActive][]" value="No" id="formRadiosRight45">
                                        <label class="form-check-label" for="formRadiosRight45">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">lower extremity DVT (CHRONIC)</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[lowerextremityDVTCHRONIC][]" value="YES  (VVA unfaverable)" id="formRadiosRight46">
                                        <label class="form-check-label" for="formRadiosRight46">
                                        YES  (VVA unfaverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[lowerextremityDVTCHRONIC][]" value="No" id="formRadiosRight47">
                                        <label class="form-check-label" for="formRadiosRight47">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>
                        <div class="col-lg-12">
                          <h6 class="section_title__">Imaging</h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>USVENOUSDOPPLER70  &gt; <span class="sub_tt__">Great Saphenous Vein (GSV) - LEFT</span></h4>
                            </div>
                        </div> 
                     
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Dilated</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="imaging[GSVLEFTDilated][]" value="YES (VVA Faverable)" id="formRadiosRightd5">
                                        <label class="form-check-label" for="formRadiosRightd5">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="imaging[GSVLEFTDilated][]" value="No" id="formRadiosRightd6">
                                        <label class="form-check-label" for="formRadiosRightd6">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Reflux +</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="imaging[GSVLEFTReflux][]" value="YES (VVA Faverable)" id="formRadiosRightd8">
                                        <label class="form-check-label" for="formRadiosRightd8">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="imaging[GSVLEFTReflux][]" value="No" id="formRadiosRightd9">
                                        <label class="form-check-label" for="formRadiosRightd9">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title"> Reflux ++</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="imaging[GSVLEFTReflux2][]" value="YES (VVA Faverable)" id="formRadiosRightd36">
                                        <label class="form-check-label" for="formRadiosRightd36">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="imaging[GSVLEFTReflux2][]" value="No" id="formRadiosRightd37">
                                        <label class="form-check-label" for="formRadiosRightd37">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title"> Reflux +++</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="imaging[GSVLEFTReflux3][]" value="YES (VVA Faverable)" id="formRadiosRighte11">
                                        <label class="form-check-label" for="formRadiosRighte11">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="imaging[GSVLEFTReflux3][]" value="No" id="formRadiosRighte12">
                                        <label class="form-check-label" for="formRadiosRighte12">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Occlusive / partial thrombosis </h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="imaging[GSVLEFTOcclusive][]" value="YES (VVA contraindicated)" id="formRadiosRighte34">
                                        <label class="form-check-label" for="formRadiosRighte34">
                                        YES (VVA contraindicated)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="imaging[GSVLEFTOcclusive][]" value="No" id="formRadiosRighte33">
                                        <label class="form-check-label" for="formRadiosRighte33">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>USVENOUSDOPPLER70  &gt; <span class="sub_tt__">Short Saphenous Vein (SSV) - LEFT</span></h4>
                            </div>
                        </div>
                     

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Dilated</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVLEFTDilated][]" value="YES (VVA Faverable)" id="formRadiosRightd38">
                                        <label class="form-check-label" for="formRadiosRightd38">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVLEFTDilated][]" value="No" id="formRadiosRightd13">
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
                          <h6 class="mb-3 lut_title">Reflux + </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVLEFTDilated1][]" value="YES (VVA Faverable)" id="formRadiosRightd14">
                                        <label class="form-check-label" for="formRadiosRightd14">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVLEFTDilated1][]" value="No" id="formRadiosRightd15">
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
                          <h6 class="mb-3 lut_title">Reflux ++</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVLEFTDilated2][]" value="YES (VVA Faverable)" id="formRadiosRightd39">
                                        <label class="form-check-label" for="formRadiosRightd39">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVLEFTDilated2][]" value="No" id="formRadiosRightd40">
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
                          <h6 class="mb-3 lut_title">Reflux +++</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVLEFTDilated3][]" value="YES (VVA Faverable)" id="formRadiosRightd41">
                                        <label class="form-check-label" for="formRadiosRightd41">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVLEFTDilated3][]" value="No" id="formRadiosRightd42">
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
                          <h6 class="mb-3 lut_title">Occlusive / partial thrombosis </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVLEFTOcclusive][]" value="YES (VVA Faverable)" id="formRadiosRightd43">
                                        <label class="form-check-label" for="formRadiosRightd43">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVLEFTOcclusive][]" value="No" id="formRadiosRightd44">
                                        <label class="form-check-label" for="formRadiosRightd44">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>USVENOUSDOPPLER70  &gt; <span class="sub_tt__">Great Saphenous Vein (GSV) - RIGHT</span></h4>
                            </div>
                        </div>
                     

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Dilated</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[GSVRIGHTDilated][]" value="YES (VVA Faverable)" id="formRadiosRighte13">
                                        <label class="form-check-label" for="formRadiosRighte13">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[GSVRIGHTDilated][]" value="No" id="formRadiosRighte14">
                                        <label class="form-check-label" for="formRadiosRighte14">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Reflux + </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[GSVRIGHTReflux1][]" value="YES (VVA Faverable)" id="formRadiosRighte15">
                                        <label class="form-check-label" for="formRadiosRighte15">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[GSVRIGHTReflux1][]" value="No" id="formRadiosRighte16">
                                        <label class="form-check-label" for="formRadiosRighte16">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Reflux ++</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[GSVRIGHTReflux2][]" value="YES (VVA Faverable)" id="formRadiosRighte17">
                                        <label class="form-check-label" for="formRadiosRighte17">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[GSVRIGHTReflux2][]" value="No" id="formRadiosRighte18">
                                        <label class="form-check-label" for="formRadiosRighte18">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Reflux +++</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[GSVRIGHTReflux3][]" value="YES (VVA Faverable)" id="formRadiosRighte19">
                                        <label class="form-check-label" for="formRadiosRighte19">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[GSVRIGHTReflux3][]" value="No" id="formRadiosRighte20">
                                        <label class="form-check-label" for="formRadiosRighte20">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Occlusive / partial thrombosis </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[GSVRIGHTOcclusive][]" value="YES (VVA Faverable)" id="formRadiosRighte21">
                                        <label class="form-check-label" for="formRadiosRighte21">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[GSVRIGHTOcclusive][]" value="No" id="formRadiosRighte22">
                                        <label class="form-check-label" for="formRadiosRighte22">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>USVENOUSDOPPLER70  &gt; <span class="sub_tt__">Short Saphenous Vein (SSV) - RIGHT</span></h4>
                            </div>
                        </div>
                     

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Dilated</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVRIGHTDilated][]" value="YES (VVA Faverable)" id="formRadiosRighte23">
                                        <label class="form-check-label" for="formRadiosRighte23">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVRIGHTDilated][]" value="No" id="formRadiosRighte24">
                                        <label class="form-check-label" for="formRadiosRighte24">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Reflux + </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVRIGHTReflux1][]" value="YES (VVA Faverable)" id="formRadiosRighte25">
                                        <label class="form-check-label" for="formRadiosRighte25">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVRIGHTReflux1][]" value="No" id="formRadiosRighte26">
                                        <label class="form-check-label" for="formRadiosRighte26">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Reflux ++</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVRIGHTReflux2][]" value="YES (VVA Faverable)" id="formRadiosRighte27">
                                        <label class="form-check-label" for="formRadiosRighte27">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVRIGHTReflux2][]" value="No" id="formRadiosRighte28">
                                        <label class="form-check-label" for="formRadiosRighte28">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Reflux +++</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVRIGHTReflux3][]" value="YES (VVA Faverable)" id="formRadiosRighte29">
                                        <label class="form-check-label" for="formRadiosRighte29">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVRIGHTReflux3][]" value="No" id="formRadiosRighte30">
                                        <label class="form-check-label" for="formRadiosRighte30">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Occlusive / partial thrombosis </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVRIGHTOcclusive][]" value="YES (VVA Faverable)" id="formRadiosRighte31">
                                        <label class="form-check-label" for="formRadiosRighte31">
                                        YES (VVA Faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="imaging[SSVRIGHTOcclusive][]" value="No" id="formRadiosRighte32">
                                        <label class="form-check-label" for="formRadiosRighte32">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                                
                                
                        
                       
                        <div class="col-lg-12">
                                <div class="title_head">
                                    <h4>MRCIR48</h4>
                                    </div>
                                </div> 
                        <div class="col-lg-12">
                            <div class="row">
                            
                                <div class="col-lg-4">
                                <h6 class="mb-3 lut_title">MRI - Lower Extremity Venography Protocol - Findings </h6>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="imaging[MRI][]" value="Normal" id="formRadiosRight64">
                                        <label class="form-check-label" for="formRadiosRight64">
                                        Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="imaging[MRI][]" value="Abnormal" id="formRadiosRight65">
                                        <label class="form-check-label" for="formRadiosRight65">
                                        Abnormal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_65">
                                <div class="mb-3 form-group">
                                    <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
                                    <textarea class="form-control" placeholder=""  style="height: 100px" name="imaging[MRINOTE][]"></textarea>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                                <div class="title_head">
                                    <h4>CTCIR48</h4>
                                    </div>
                                </div> 
                        <div class="col-lg-12">
                            <div class="row">
                            
                                <div class="col-lg-4">
                                <h6 class="mb-3 lut_title">CT - Pelvic Venography Protocol - Findings</h6>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="imaging[CT][]" id="formRadiosRighte35">
                                        <label class="form-check-label" for="formRadiosRighte35">
                                        Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="imaging[CT][]" id="formRadiosRighte36">
                                        <label class="form-check-label" for="formRadiosRighte36">
                                        Abnormal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_e36">
                                <div class="mb-3 form-group">
                                    <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
                                    <textarea class="form-control" placeholder=""  style="height: 100px" name="imaging[CTNOTE][]"></textarea>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="section_title__">Image Annotation</h6>
                          <div class="title_head">
                                <h4>Annotate Leg Veins findings</h4>
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
                          <h6 class="section_title__">Lab </h6>
                        </div>
                          <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABABACUTEINFLAME000 &gt; <span class="sub_tt__">Acute inflammation Results</span></h4>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-3">
                          <h6 class="mb-3 lut_title">ESR</h6>
                        </div>
                        <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="lab[ESR][]" value="Normal" id="formRadiosRightd26">
                                        <label class="form-check-label" for="formRadiosRightd26">
                                        Normal
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="lab[ESR][]" value="High" id="formRadiosRightd27">
                                        <label class="form-check-label" for="formRadiosRightd27">
                                        High
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="lab[ESR][]" value="low" id="formRadiosRightd49">
                                        <label class="form-check-label" for="formRadiosRightd49">
                                        Low
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-3">
                          <h6 class="mb-3 lut_title">CRP</h6>
                        </div>
                        <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="lab[CRP][]" value="Normal" id="formRadiosRightd28">
                                        <label class="form-check-label" for="formRadiosRightd28">
                                        Normal
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="lab[CRP][]" value="High" id="formRadiosRightd29">
                                        <label class="form-check-label" for="formRadiosRightd29">
                                        High
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="lab[CRP][]" value="low" id="formRadiosRightd50">
                                        <label class="form-check-label" for="formRadiosRightd50">
                                        Low
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-lg-12">
                          <h6 class="section_title__">MDT</h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>MDTREVIEW00 &#62; <span class="sub_tt__">Varicose Veins MDT outcome</span></h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">MDT decision</h6>
                        </div>
                        <div class="col-lg-12">
                        <div class="row align-items-center">
                     
                                    <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="mdt[decisionOption][]" value="Thermal VVA" id="formRadiosRight84">
                                        <label class="form-check-label" for="formRadiosRight84">
                                        Thermal VVA
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="mdt[decisionOption][]" value="NTNT VVA Ablation" id="formRadiosRight85">
                                        <label class="form-check-label" for="formRadiosRight85">
                                        NTNT VVA Ablation
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="mdt[decisionOption][]" value="Surgical" id="formRadiosRight86">
                                        <label class="form-check-label" for="formRadiosRight86">
                                        Surgical
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="mdt[decisionOption][]" value="Other options" id="formRadiosRight87">
                                        <label class="form-check-label" for="formRadiosRight87">
                                        Other options
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_84">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate   Thermal VVA / notes here***"  style="height: 100px" name="mdt[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_85">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate NTNT VVA Ablation / notes here***"  style="height: 100px" name="mdt[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_86">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***"  style="height: 100px" name="mdt[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_87">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate  Other options / notes here***"  style="height: 100px" name="mdt[NOTE][]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                          <h6 class="section_title__">Elegibility STATUS</h6>
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
                                        <input class="form-check-input" type="radio" name="elegibilityStatus[treatmentoption][]" value="VV Thermal Ablation" id="formRadiosRight90">
                                        <label class="form-check-label" for="formRadiosRight90">
                                        VV Thermal Ablation
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3 ">
                                        <input class="form-check-input" type="radio" name="elegibilityStatus[treatmentoption][]" value="VV NTNT Ablation" id="formRadiosRight91">
                                        <label class="form-check-label" for="formRadiosRight91">
                                        VV NTNT Ablation
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3 ">
                                        <input class="form-check-input" type="radio" name="elegibilityStatus[treatmentoption][]" value="Foam Sclerotherapy" id="formRadiosRight92">
                                        <label class="form-check-label" for="formRadiosRight92">
                                        Foam Sclerotherapy
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="elegibilityStatus[treatmentoption][]" value="Others" id="formRadiosRight93">
                                        <label class="form-check-label" for="formRadiosRight93">
                                        Others
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_90">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate  VV Thermal Ablation / notes here***"  style="height: 100px" name="elegibilityStatus[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_91">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate VV NTNT Ablation / notes here***"  style="height: 100px" name="elegibilityStatus[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_92">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate  Foam Sclerotherapy / notes here***"  style="height: 100px" name="elegibilityStatus[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_93">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate Other options / notes here***"  style="height: 100px" name="elegibilityStatus[NOTE][]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                          <h6 class="section_title__">Intervention PROCEDURE / Rx</h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[USVVTAUL1180][]" value="USVVTAUL1180" id="formRadiosRightb37">
                                            <label class="form-check-label" for="formRadiosRightb37">
                                            USVVTAUL1180
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[USVVTABL1870][]" value="USVVTABL1870" id="formRadiosRightb38">
                                            <label class="form-check-label" for="formRadiosRightb38">
                                            USVVTABL1870
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightb39">
                                            <label class="form-check-label" for="formRadiosRightb39">
                                            LABPREIRBASIC32
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightb40">
                                            <label class="form-check-label" for="formRadiosRightb40">
                                            LABPREIRSAFETY17
                                            </label>    
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[PRESSURESTOCKINGS34][]" value="PRESSURESTOCKINGS34" id="formRadiosRightd34">
                                            <label class="form-check-label" for="formRadiosRightd34">
                                            PRESSURESTOCKINGS34
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[PRESSURESTOCKINGSFITDEVICE9][]" value="PRESSURESTOCKINGSFITDEVICE9" id="formRadiosRighte36">
                                            <label class="form-check-label" for="formRadiosRighte36">
                                            PRESSURESTOCKINGSFITDEVICE9
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[USVVNTNTAUL1490][]" value="USVVNTNTAUL1490" id="formRadiosRighte37">
                                            <label class="form-check-label" for="formRadiosRighte37">
                                            USVVNTNTAUL1490
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[USVVNTNTABL2200][]" value="USVVNTNTABL2200" id="formRadiosRighte38">
                                            <label class="form-check-label" for="formRadiosRighte38">
                                            USVVNTNTABL2200
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRighte39">
                                            <label class="form-check-label" for="formRadiosRighte39">
                                            LABPREIRBASIC32
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRighte40">
                                            <label class="form-check-label" for="formRadiosRighte40">
                                            LABPREIRSAFETY17
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[PRESSURESTOCKINGS34][]" value="PRESSURESTOCKINGS34" id="formRadiosRighte41">
                                            <label class="form-check-label" for="formRadiosRighte41">
                                            PRESSURESTOCKINGS34
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[PRESSURESTOCKINGSFITDEVICE9][]" value="PRESSURESTOCKINGSFITDEVICE9" id="formRadiosRighte42">
                                            <label class="form-check-label" for="formRadiosRighte42">
                                            PRESSURESTOCKINGSFITDEVICE9
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[USVVFST1DOSE220][]" value="USVVFST1DOSE220" id="formRadiosRighte43">
                                            <label class="form-check-label" for="formRadiosRighte43">
                                            USVVFST1DOSE220
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[PRESSURESTOCKINGS34][]" value="PRESSURESTOCKINGS34" id="formRadiosRighte44">
                                            <label class="form-check-label" for="formRadiosRighte44">
                                            PRESSURESTOCKINGS34
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[PRESSURESTOCKINGSFITDEVICE9][]" value="PRESSURESTOCKINGSFITDEVICE9" id="formRadiosRighte45">
                                            <label class="form-check-label" for="formRadiosRighte45">
                                            PRESSURESTOCKINGSFITDEVICE9
                                            </label>    
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                  
                       
                      
                       
                        

                        <div class="col-lg-12 mb-3">
                          <h6 class="section_title__">Supportive</h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Supportive[IVVITAFERTILITY175][]" value="IVVITAFERTILITY175" id="formRadiosRightb45">
                                            <label class="form-check-label" for="formRadiosRightb45">
                                            IVVITAFERTILITY175
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Supportive[LABPREIVBASIC52][]" value="LABPREIVBASIC52" id="formRadiosRightb46">
                                            <label class="form-check-label" for="formRadiosRightb46">
                                            LABPREIVBASIC52
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Supportive[LABPREIVADVANCED230][]" value="LABPREIVADVANCED230" id="formRadiosRightb47">
                                            <label class="form-check-label" for="formRadiosRightb47">
                                            LABPREIVADVANCED230
                                            </label>    
                                    </div>
                                </div>
                                
                          
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="section_title__">Referral</h6>
                          <div class="title_head">
                                <h4>HCREFFERAL</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row align-items-center">
                        
                                <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3 ">
                                    <input class="form-check-input" type="radio" name="Referral[HCREFFERAL][]" value="Lipidema care program" id="formRadiosRightb48">
                                    <label class="form-check-label" for="formRadiosRightb48">
                                    Lipidema care program
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3 ">
                                    <input class="form-check-input" type="radio" name="Referral[HCREFFERAL][]" value="Post EVLT - Rehab/PhysioTherapy" id="formRadiosRightb49">
                                    <label class="form-check-label" for="formRadiosRightb49">
                                    Post EVLT - Rehab/PhysioTherapy
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3 ">
                                    <input class="form-check-input" type="radio" name="Referral[HCREFFERAL][]" value="Other" id="formRadiosRightb50">
                                    <label class="form-check-label" for="formRadiosRightb50">
                                    Other
                                    </label>
                                </div>
                            </div>
                            <!-- <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="formRadiosRight28" id="formRadiosRightb51">
                                    <label class="form-check-label" for="formRadiosRightb51">
                                    Andrology
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="formRadiosRight28" id="formRadiosRightb52">
                                    <label class="form-check-label" for="formRadiosRightb52">
                                    Endocrinology
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="formRadiosRight28" id="formRadiosRightb53">
                                    <label class="form-check-label" for="formRadiosRightb53">
                                    Others
                                    </label>
                                </div>
                            </div> -->
                            <div class="col-lg-12" id="textarea_b48">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate Lipidema care program / Physiotherapy / notes here***"  style="height: 100px" name="Referral[NOTE][]"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_b49">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate  Post EVLT - Rehab/PhysioTherapy / Head and Neck surgery   / notes here***"  style="height: 100px" name="Referral[NOTE][]"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_b50">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate Other / notes here***"  style="height: 100px" name="Referral[NOTE][]"></textarea>
                                </div>
                            </div>
                            <!-- <div class="col-lg-12" id="textarea_b51">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate Andrology / notes here***"  style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_b52">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate Endocrinology / notes here***"  style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_b53">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate OTHERS / notes here***"  style="height: 100px"></textarea>
                                </div>
                            </div> -->
                        </div>
                        </div>

                       
                    </div>
              
                </div>
                <div class="action_btns">
            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient draft_btn">SAVE DRAFT</a>
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
    
            $("#textarea_e36").hide();
            $("#formRadiosRighte36").click(function(){
                $("#textarea_e36").show();
            });
            $("#formRadiosRighte35").click(function(){
                $("#textarea_e36").hide();
            });
            })
    </script>
    <script>
        $(document).ready(function(){
            $("#textarea_84").hide();
            $("#textarea_85").hide();
            $("#textarea_86").hide();
            $("#textarea_87").hide();
    
            $("#formRadiosRight84").click(function(){
                $("#textarea_84").show();
                $("#textarea_85").hide();
                $("#textarea_86").hide();
                $("#textarea_87").hide();
            });
            $("#formRadiosRight85").click(function(){
                $("#textarea_84").hide();
                $("#textarea_85").show();
                $("#textarea_86").hide();
                $("#textarea_87").hide();
            });
            $("#formRadiosRight86").click(function(){
                $("#textarea_84").hide();
                $("#textarea_85").hide();
                $("#textarea_86").show();
                $("#textarea_87").hide();
            });
            $("#formRadiosRight87").click(function(){
                $("#textarea_84").hide();
                $("#textarea_85").hide();
                $("#textarea_86").hide();
                $("#textarea_87").show();
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
                $("#textarea_90").show();
                $("#textarea_91").hide();
                $("#textarea_92").hide();
                $("#textarea_93").hide();
            });
            $("#formRadiosRight91").click(function(){
                $("#textarea_90").hide();
                $("#textarea_91").show();
                $("#textarea_92").hide();
                $("#textarea_93").hide();
            });
            $("#formRadiosRight92").click(function(){
                $("#textarea_90").hide();
                $("#textarea_91").hide();
                $("#textarea_92").show();
                $("#textarea_93").hide();
            });
            $("#formRadiosRight93").click(function(){
                $("#textarea_90").hide();
                $("#textarea_91").hide();
                $("#textarea_92").hide();
                $("#textarea_93").show();
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
                $("#textarea_b48").show();
                $("#textarea_b49").hide();
                $("#textarea_b50").hide();
                $("#textarea_b51").hide();
                $("#textarea_b52").hide();
                $("#textarea_b53").hide();
            });
            $("#formRadiosRightb49").click(function(){
                $("#textarea_b48").hide();
                $("#textarea_b49").show();
                $("#textarea_b50").hide();
                $("#textarea_b51").hide();
                $("#textarea_b52").hide();
                $("#textarea_b53").hide();
            });
            $("#formRadiosRightb50").click(function(){
                $("#textarea_b48").hide();
                $("#textarea_b49").hide();
                $("#textarea_b50").show();
                $("#textarea_b51").hide();
                $("#textarea_b52").hide();
                $("#textarea_b53").hide();
            });
            $("#formRadiosRightb51").click(function(){
                $("#textarea_b48").hide();
                $("#textarea_b49").hide();
                $("#textarea_b50").hide();
                $("#textarea_b51").show();
                $("#textarea_b52").hide();
                $("#textarea_b53").hide();
            });
            $("#formRadiosRightb52").click(function(){
                $("#textarea_b48").hide();
                $("#textarea_b49").hide();
                $("#textarea_b50").hide();
                $("#textarea_b51").hide();
                $("#textarea_b52").show();
                $("#textarea_b53").hide();
            });
            $("#formRadiosRightb53").click(function(){
                $("#textarea_b48").hide();
                $("#textarea_b49").hide();
                $("#textarea_b50").hide();
                $("#textarea_b51").hide();
                $("#textarea_b52").hide();
                $("#textarea_b53").show();
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

            if (totalPoints >= 0 && totalPoints <= 15) {
                mildLUTS.classList.remove('hidden');
            } else if (totalPoints >= 16 && totalPoints <= 39) {
                moderateLUTS.classList.remove('hidden');
            } else if (totalPoints >= 40 && totalPoints <= 1035) {
                severeLUTS.classList.remove('hidden');
            }
        }
    });
});
</script>
    @endpush
@endsection

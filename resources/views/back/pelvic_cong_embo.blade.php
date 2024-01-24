@extends('back.layout.main_view')
@push('title')
    Patient | pelvicCong Embo Form| QASTARAT & DAWALI CLINICS
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
        <h1 class=""> <span class="blue_theme"> Pelvic Cong Embo (PCE) Form</span> </h1>
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
            <form method="POST" action="{{ route('user.StorePelvicCongEmboEligibilityForms') }}" enctype="multipart/form-data" >
                @csrf

            <input type="hidden" name="patient_id" value="{{ @$patient_id }}"/>

            
          <h3 class="form_title">Pelvic Cong Embo (PCE)</h3>
        
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
                                <input class="form-check-input" type="checkbox" name="diagnosis_general[PelvicVarices][]" value="Pelvic Varices" id="formRadiosRight1">
                                <label class="form-check-label" for="formRadiosRight1">
                                Pelvic Varices    
                                </label>
                            </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[PelvicCongestionSyndrome][]" value="Pelvic Congestion Syndrome" id="formRadiosRight2">
                            <label class="form-check-label" for="formRadiosRight2">
                            Pelvic Congestion Syndrome
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[UterineVarices][]" value="Uterine Varices" id="formRadiosRight3">
                            <label class="form-check-label" for="formRadiosRight3">
                            Uterine Varices
                            </label>
                        </div>
                     </div>
                     
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[PerinealVarices][]" value="Perineal Varices" id="formRadiosRight5">
                            <label class="form-check-label" for="formRadiosRight5">
                            Perineal Varices 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[PelvicPain][]" value="Pelvic Pain" id="formRadiosRight6">
                            <label class="form-check-label" for="formRadiosRight6">
                            Pelvic Pain
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
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[183][]" value="183 Varicose veins of lower extremities" id="formRadiosRight8">
                            <label class="form-check-label" for="formRadiosRight8">
                            183 Varicose veins of lower extremities
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[186][]" value="186 Varicose veins of other sites" id="formRadiosRight9">
                            <label class="form-check-label" for="formRadiosRight9">
                            186 Varicose veins of other sites
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[1862][]" value="186.2 Pelvic varices" id="formRadiosRight10">
                            <label class="form-check-label" for="formRadiosRight10">
                            186.2 Pelvic varices
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[1863][]" value="186.3 Vulval varices" id="formRadiosRight11">
                            <label class="form-check-label" for="formRadiosRight11">
                            186.3 Vulval varices
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[R10][]" value="R10 Abdominal and pelvic pain" id="formRadiosRight12">
                            <label class="form-check-label" for="formRadiosRight12">
                            R10 Abdominal and pelvic pain
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[R102][]" value="R10.2 Pelvic and perineal pain" id="formRadiosRight13">
                            <label class="form-check-label" for="formRadiosRight13">
                            R10.2 Pelvic and perineal pain
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N736][]" value="N73.6 Female pelvic peritoneal adhesions" id="formRadiosRightc1">
                            <label class="form-check-label" for="formRadiosRightc1">
                            N73.6 Female pelvic peritoneal adhesions
                            </label>
                        </div>
                     </div>
                     
                    
                        </div>
                    </div>
                       
                             
                       

                     <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Pelvic Congestion Symptoms Scale (PCSS)</h4>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th colspan="5" class="top_header_frm_tb">Calculate PCSS Score</th>
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
                                    <td>Pelvic pain (standing)</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Pelvicpain][]" value="0" id="formRadiosRight14">
                                            <label class="form-check-label" for="formRadiosRight14">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Pelvicpain][]" value="1" id="formRadiosRight15">
                                            <label class="form-check-label" for="formRadiosRight15">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Pelvicpain][]" value="3" id="formRadiosRight16">
                                            <label class="form-check-label" for="formRadiosRight16">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Pelvicpain][]" value="5" id="formRadiosRight17">
                                            <label class="form-check-label" for="formRadiosRight17">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Pelvic heaviness </td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Pelvicheaviness][]" value="0" id="formRadiosRight18">
                                            <label class="form-check-label" for="formRadiosRight18">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Pelvicheaviness][]" value="1" id="formRadiosRight19">
                                            <label class="form-check-label" for="formRadiosRight19">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Pelvicheaviness][]" value="3" id="formRadiosRight20">
                                            <label class="form-check-label" for="formRadiosRight20">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Pelvicheaviness][]" value="5" id="formRadiosRight21">
                                            <label class="form-check-label" for="formRadiosRight21">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Pelvic heat</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Pelvicheat][]" value="0" id="formRadiosRight22">
                                            <label class="form-check-label" for="formRadiosRight22">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Pelvicheat][]" value="1" id="formRadiosRight23">
                                            <label class="form-check-label" for="formRadiosRight23">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Pelvicheat][]" value="3" id="formRadiosRight24">
                                            <label class="form-check-label" for="formRadiosRight24">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Pelvicheat][]" value="5" id="formRadiosRight25">
                                            <label class="form-check-label" for="formRadiosRight25">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Pain with period</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Painwithperiod][]" value="0" id="formRadiosRight26">
                                            <label class="form-check-label" for="formRadiosRight26">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Painwithperiod][]" value="1" id="formRadiosRight27">
                                            <label class="form-check-label" for="formRadiosRight27">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Painwithperiod][]" value="3" id="formRadiosRight28">
                                            <label class="form-check-label" for="formRadiosRight28">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Painwithperiod][]" value="5" id="formRadiosRight29">
                                            <label class="form-check-label" for="formRadiosRight29">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Perineal varicosities </td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Perinealvaricosities][]" value="0" id="formRadiosRight30">
                                            <label class="form-check-label" for="formRadiosRight30">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Perinealvaricosities][]" value="1" id="formRadiosRight31">
                                            <label class="form-check-label" for="formRadiosRight31">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Perinealvaricosities][]" value="3" id="formRadiosRight32">
                                            <label class="form-check-label" for="formRadiosRight32">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Perinealvaricosities][]" value="5" id="formRadiosRight33">
                                            <label class="form-check-label" for="formRadiosRight33">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>
                                    <tr>
                                    <td>Anal varicosities</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Analvaricosities][]" value="0" id="formRadiosRight80">
                                            <label class="form-check-label" for="formRadiosRight80">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Analvaricosities][]" value="1" id="formRadiosRight81">
                                            <label class="form-check-label" for="formRadiosRight81">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Analvaricosities][]" value="3" id="formRadiosRight82">
                                            <label class="form-check-label" for="formRadiosRight82">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Analvaricosities][]" value="5" id="formRadiosRight83">
                                            <label class="form-check-label" for="formRadiosRight83">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>
                                    <tr>
                                    <td>Vaginal bleed on/off</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Vaginalbleed][]" value="0" id="formRadiosRighte84">
                                            <label class="form-check-label" for="formRadiosRighte84">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Vaginalbleed][]" value="1" id="formRadiosRighte85">
                                            <label class="form-check-label" for="formRadiosRighte85">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Vaginalbleed][]" value="3" id="formRadiosRighte86">
                                            <label class="form-check-label" for="formRadiosRighte86">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Vaginalbleed][]" value="5" id="formRadiosRighte87">
                                            <label class="form-check-label" for="formRadiosRighte87">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>
                                    <tr>
                                    <td>Urinary symptoms</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Urinarysymptoms][]" value="0" id="formRadiosRighte88">
                                            <label class="form-check-label" for="formRadiosRighte88">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Urinarysymptoms][]" value="1" id="formRadiosRighte89">
                                            <label class="form-check-label" for="formRadiosRighte89">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Urinarysymptoms][]" value="3" id="formRadiosRighte90">
                                            <label class="form-check-label" for="formRadiosRighte90">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Urinarysymptoms][]" value="5" id="formRadiosRighte91">
                                            <label class="form-check-label" for="formRadiosRighte91">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>
                                    <tr>
                                    <td>Recurrent miscarriage</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Recurrentmiscarriage][]" value="0" id="formRadiosRighte92">
                                            <label class="form-check-label" for="formRadiosRighte92">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Recurrentmiscarriage][]" value="1" id="formRadiosRighte93">
                                            <label class="form-check-label" for="formRadiosRighte93">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Recurrentmiscarriage][]" value="3" id="formRadiosRighte94">
                                            <label class="form-check-label" for="formRadiosRighte94">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Recurrentmiscarriage][]" value="5" id="formRadiosRighte95">
                                            <label class="form-check-label" for="formRadiosRighte95">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>
                                    <tr>
                                    <td>Low back pain</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Lowbackpain][]" value="0" id="formRadiosRighte96">
                                            <label class="form-check-label" for="formRadiosRighte96">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Lowbackpain][]" value="1" id="formRadiosRighte97">
                                            <label class="form-check-label" for="formRadiosRighte97">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Lowbackpain][]" value="3" id="formRadiosRighte98">
                                            <label class="form-check-label" for="formRadiosRighte98">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Lowbackpain][]" value="5" id="formRadiosRighte99">
                                            <label class="form-check-label" for="formRadiosRighte99">
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
                                        <th>(16-35 pts)</th>
                                    </tr>
                                    <tr id="severeLUTS" class="hidden">
                                        <td colspan="3" rowspan="3"></td>
                                        <th>Severe  </th>
                                        <th>(36-50 pts) </th>
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
                                    <h6 class="mb-3 lut_title">Heamarrhoids</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[Heamarrhoids][]" value=" YES  (PVVE faverable)" id="formRadiosRight42">
                                        <label class="form-check-label" for="formRadiosRight42">
                                        YES  (PVVE faverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[Heamarrhoids][]" value="No" id="formRadiosRight43">
                                        <label class="form-check-label" for="formRadiosRight43">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Vulvar Varices</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[VulvarVarices][]" value="YES  (PVVE faverable)" id="formRadiosRight44">
                                        <label class="form-check-label" for="formRadiosRight44">
                                        YES  (PVVE faverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[VulvarVarices][]" value="No" id="formRadiosRight45">
                                        <label class="form-check-label" for="formRadiosRight45">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            
                           
                        </div>
                     
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>USVENOUSDOPPLER70  &gt; <span class="sub_tt__">Pelvic Findings  </span></h4>
                            </div>
                        </div> 
                     <div class="col-lg-12">
                     <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Dilated pelvic varices</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[Dilatedpelvicvarices][]" value="YES  (PVVE faverable)" id="formRadiosRight46">
                                        <label class="form-check-label" for="formRadiosRight46">
                                        YES  (PVVE faverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[Dilatedpelvicvarices][]" value="No" id="formRadiosRight47">
                                        <label class="form-check-label" for="formRadiosRight47">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Venous Reflux / insufficiency  </h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[VenousReflux][]" value="" id="formRadiosRightd5">
                                        <label class="form-check-label" for="formRadiosRightd5">
                                        YES  (PVVE faverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[VenousReflux][]" value="" id="formRadiosRightd6">
                                        <label class="form-check-label" for="formRadiosRightd6">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Free Fluid</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[FreeFluid][]" value="YES  (PVVE faverable)" id="formRadiosRightd8">
                                        <label class="form-check-label" for="formRadiosRightd8">
                                        YES  (PVVE faverable) 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[FreeFluid][]" value="No" id="formRadiosRightd9">
                                        <label class="form-check-label" for="formRadiosRightd9">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title"> Suapicious Pelvic  mass / complex  cyst</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[SuapiciousPelvicmass][]" value="YES (PCE contraindicated)" id="formRadiosRightd36">
                                        <label class="form-check-label" for="formRadiosRightd36">
                                        YES (PCE contraindicated)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[SuapiciousPelvicmass][]" value="No" id="formRadiosRightd37">
                                        <label class="form-check-label" for="formRadiosRightd37">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                     </div>
                        
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>MRCIR48 &gt; <span class="sub_tt__">MRI - Female Pelvis Protocol- Findings </span></h4>
                            </div>
                        </div>
                     

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Dilated pelvic varices</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[MRIDilatedpelvicvarices][]" value="YES  (PVVE faverable)" id="formRadiosRightd38">
                                        <label class="form-check-label" for="formRadiosRightd38">
                                        YES  (PVVE faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[MRIDilatedpelvicvarices][]" value="No" id="formRadiosRightd13">
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
                          <h6 class="mb-3 lut_title">Venous Reflux / insufficiency   </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[MRIVenousReflux][]" value="YES  (PVVE faverable)" id="formRadiosRightd14">
                                        <label class="form-check-label" for="formRadiosRightd14">
                                        YES  (PVVE faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[MRIVenousReflux][]" value="No" id="formRadiosRightd15">
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
                          <h6 class="mb-3 lut_title">Free Fluid</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[MRIFreeFluid][]" value="YES  (PVVE faverable)" id="formRadiosRightd39">
                                        <label class="form-check-label" for="formRadiosRightd39">
                                        YES  (PVVE faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[MRIFreeFluid][]" value="No" id="formRadiosRightd40">
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
                          <h6 class="mb-3 lut_title">Suapicious Pelvic  mass / complex  cyst</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[MRIcomplexcyst][]" value="YES (PCE contraindicated)" id="formRadiosRightd41">
                                        <label class="form-check-label" for="formRadiosRightd41">
                                        YES (PCE contraindicated)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[MRIcomplexcyst][]" value="No" id="formRadiosRightd42">
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
                          <h6 class="mb-3 lut_title">Netcrucker Features</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[MRINetcruckerFeatures][]" value="YES (PCE contraindicated)" id="formRadiosRightd43">
                                        <label class="form-check-label" for="formRadiosRightd43">
                                        YES (PCE contraindicated)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[MRINetcruckerFeatures][]" value="NO" id="formRadiosRightd44">
                                        <label class="form-check-label" for="formRadiosRightd44">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>CTCIR48 &gt; <span class="sub_tt__">CT - Pelvic Venography Protocol - Findings</span></h4>
                            </div>
                        </div> 
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Dilated pelvic varices</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[CTDilatedpelvicvarices][]" value="YES  (PVVE faverable)" id="formRadiosRightd45">
                                        <label class="form-check-label" for="formRadiosRightd45">
                                        YES  (PVVE faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[CTDilatedpelvicvarices][]" value="NO" id="formRadiosRightd46">
                                        <label class="form-check-label" for="formRadiosRightd46">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                                                       
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Venous Reflux / insufficiency  </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[CTinsufficiency][]" value="YES  (PVVE faverable)" id="formRadiosRightd16">
                                        <label class="form-check-label" for="formRadiosRightd16">
                                        YES  (PVVE faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[CTinsufficiency][]" value="No" id="formRadiosRightd17">
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
                          <h6 class="mb-3 lut_title">Free Fluid</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[CTFreeFluid][]" value="YES  (PVVE faverable)" id="formRadiosRightd18">
                                        <label class="form-check-label" for="formRadiosRightd18">
                                        YES  (PVVE faverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[CTFreeFluid][]" value="NO" id="formRadiosRightd19">
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
                          <h6 class="mb-3 lut_title">Suapicious Pelvic  mass / complex  cyst</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[CTcomplexcyst][]" value="YES (PCE contraindicated)" id="formRadiosRightd20">
                                        <label class="form-check-label" for="formRadiosRightd20">
                                        YES (PCE contraindicated)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[CTcomplexcyst][]" value="NO" id="formRadiosRightd21">
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
                          <h6 class="mb-3 lut_title">Netcrucker Features</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[CTNetcruckerFeatures][]" value="YES (PCE contraindicated)" id="formRadiosRightd22">
                                        <label class="form-check-label" for="formRadiosRightd22">
                                        YES (PCE contraindicated)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[CTNetcruckerFeatures][]" value="NO" id="formRadiosRightd23">
                                        <label class="form-check-label" for="formRadiosRightd23">
                                        NO 
                                        </label>
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
                          <h6 class="section_title__">Lab </h6>
                        </div>
                          <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABURINANALYSIS000</h4>
                            </div>
                          </div>
                         
                        
                        <div class="row">
                            <div class="col-lg-4">
                            <h6 class="mb-3 lut_title"> URINANALYSIS  Results</h6>
                            </div>
                          
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="lab[URINANALYSISResults][]" value="Negative / no growth" id="formRadiosRight77">
                                    <label class="form-check-label" for="formRadiosRight77">
                                    Negative / no growth
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="lab[URINANALYSISResults][]" value="Positive  (PCE Unfaverable)" id="formRadiosRight76">
                                    <label class="form-check-label" for="formRadiosRight76">
                                    Positive  (PCE Unfaverable)
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_76">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate  / notes here***"  style="height: 100px" name="lab[NOTE][]"></textarea>
                                    </div>
                                </div>
                        </div>
                    

                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABPAPSMEAR000</h4>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">

                                <div class="col-lg-4">
                                <h6 class="mb-3 lut_title"> Histopath  Results</h6>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="lab[HistopathResults][]" value="Negative" id="formRadiosRight64">
                                        <label class="form-check-label" for="formRadiosRight64">
                                        Negative
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="lab[HistopathResults][]" value="Positive  (PCE Unfaverable)" id="formRadiosRight65">
                                        <label class="form-check-label" for="formRadiosRight65">
                                        Positive  (PCE Unfaverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_65">
                                <div class="mb-3 form-group">
                                    <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
                                    <textarea class="form-control" placeholder=""  style="height: 100px" name="lab[NOTE][]"></textarea>
                                </div>
                            </div>
                            </div>
                            </div>

                       
                        
                       
                     
                        
                       

                        <div class="col-lg-12">
                          <h6 class="section_title__">MDT</h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>MDTREVIEW00 &#62; <span class="sub_tt__">Pelvic Congestion MDT outcome</span></h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">MDT decision</h6>
                        </div>
                        <div class="col-lg-12">
                        <div class="row align-items-center">
                     
                                    <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="mdt[decisionOption][]" value="PVVE" id="formRadiosRight84">
                                        <label class="form-check-label" for="formRadiosRight84">
                                        PVVE
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="mdt[decisionOption][]" value="Medical" id="formRadiosRight85">
                                        <label class="form-check-label" for="formRadiosRight85">
                                        Medical
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="mdt[decisionOption][]" value="Other options" id="formRadiosRight86">
                                        <label class="form-check-label" for="formRadiosRight86">
                                        Other options
                                        </label>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight" id="formRadiosRight87">
                                        <label class="form-check-label" for="formRadiosRight87">
                                        Other options
                                        </label>
                                    </div>
                                </div> -->
                                <div class="col-lg-12" id="textarea_84">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate PVVE / notes here***"  style="height: 100px" name="mdt[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_85">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate Medical / notes here***"  style="height: 100px" name="mdt[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_86">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate Other options / notes here***"  style="height: 100px" name="mdt[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-12" id="textarea_87">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate  Other options / notes here***"  style="height: 100px"></textarea>
                                    </div>
                                </div> -->
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
                                        <input class="form-check-input" type="radio" name="elegibilityStatus[treatmentoption][]" value="Pelvic Congestion EMBOLIZATION (PCE)" id="formRadiosRight90">
                                        <label class="form-check-label" for="formRadiosRight90">
                                        Pelvic Congestion EMBOLIZATION (PCE)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3 ">
                                        <input class="form-check-input" type="radio" name="elegibilityStatus[treatmentoption][]" value="OTHERS" id="formRadiosRight91">
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
                                <div class="col-lg-12" id="textarea_90">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate  (PCE) / notes here***"  style="height: 100px" name="elegibilityStatus[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_91">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate Other / notes here***"  style="height: 100px" name="elegibilityStatus[NOTE][]"></textarea>
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
                          <h6 class="section_title__">Intervention PROCEDURE / Rx</h6>
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
                                        <input class="form-check-input"type="checkbox" name="formRadiosRight27" id="formRadiosRightd34">
                                            <label class="form-check-label" for="formRadiosRightd34">
                                            LABPREIRSAFETY17
                                            </label>    
                                    </div>
                                </div> -->
                              
                            </div>
                        </div>
                  
                       
                      
                       
                        

                        <div class="col-lg-12 mb-3">
                          <h6 class="section_title__">Supportive</h6>
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
                                        <input class="form-check-input"type="checkbox" name="Supportive[IMBVITAMINES37][]" value="IMBVITAMINES37" id="formRadiosRightd32">
                                            <label class="form-check-label" for="formRadiosRightd32">
                                            IMBVITAMINES37
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Supportive[PROZ290][]" value="PROZ290" id="formRadiosRightd33">
                                            <label class="form-check-label" for="formRadiosRightd33">
                                            PROZ290 
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
                                    <input class="form-check-input" type="radio" name="Referral[HCREFFERAL][]" value="Pelvic Rehab / Physiotherapy" id="formRadiosRightb48">
                                    <label class="form-check-label" for="formRadiosRightb48">
                                    Pelvic Rehab / Physiotherapy
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3 ">
                                    <input class="form-check-input" type="radio" name="Referral[HCREFFERAL][]" value="Gyne" id="formRadiosRightb49">
                                    <label class="form-check-label" for="formRadiosRightb49">
                                    Gyne
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3 ">
                                    <input class="form-check-input" type="radio" name="Referral[HCREFFERAL][]" value="Others" id="formRadiosRightb50">
                                    <label class="form-check-label" for="formRadiosRightb50">
                                    Others
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
                                <textarea class="form-control" placeholder="Enter Elaborate   Pelvic Rehab / Physiotherapy / notes here***"  style="height: 100px" name="Referral[NOTE]"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_b49">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate   Gyne / Head and Neck surgery   / notes here***"  style="height: 100px" name="Referral[NOTE]"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_b50">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate Others  / notes here***"  style="height: 100px" name="Referral[NOTE]"></textarea>
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
            } else if (totalPoints >= 16 && totalPoints <= 35) {
                moderateLUTS.classList.remove('hidden');
            } else if (totalPoints >= 36 && totalPoints <= 1035) {
                severeLUTS.classList.remove('hidden');
            }
        }
    });
});
</script>
    @endpush
@endsection

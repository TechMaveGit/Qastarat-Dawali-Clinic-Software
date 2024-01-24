@extends('back.layout.main_view')
@push('title')
    Patient | Uterine Embo| QASTARAT & DAWALI CLINICS
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
            <form method="POST" action="{{ route('user.storeUterineEmboEligibilityForms') }}" enctype="multipart/form-data" >
                @csrf

            <input type="hidden" name="patient_id" value="{{ @$patient_id }}"/>
          <h3 class="form_title">Uterine Embo (UE)</h3>
        
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
                                <input class="form-check-input" type="checkbox" name="diagnosis_general[UterineFibroid][]" value="UterineFibroid" id="formRadiosRight1">
                                <label class="form-check-label" for="formRadiosRight1">
                                Uterine Fibroid
                                </label>
                            </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[MultiFibroidUterus][]" value="Multi-Fibroid Uterus" id="formRadiosRight2">
                            <label class="form-check-label" for="formRadiosRight2">
                            Multi-Fibroid Uterus
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Adenomyosis][]" value="Adenomyosis" id="formRadiosRight3">
                            <label class="form-check-label" for="formRadiosRight3">
                            Adenomyosis
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[UterineBleed][]" value="Uterine Bleed" id="formRadiosRight4">
                            <label class="form-check-label" for="formRadiosRight4">
                            Uterine Bleed
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Dysmenprrhea][]" value="Dysmenprrhea" id="formRadiosRight5">
                            <label class="form-check-label" for="formRadiosRight5">
                            Dysmenprrhea
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Abdominalmass][]" value="Abdominal mass" id="formRadiosRight6">
                            <label class="form-check-label" for="formRadiosRight6">
                            Abdominal mass
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[PelvicPain][]" value="Pelvic Pain" id="formRadiosRight7">
                            <label class="form-check-label" for="formRadiosRight7">
                            Pelvic Pain
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Anemia][]" value="Anemia" id="formRadiosRightd1">
                            <label class="form-check-label" for="formRadiosRightd1">
                            Anemia
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[EndomertialCA][]" value="Endomertial CA" id="formRadiosRightd2">
                            <label class="form-check-label" for="formRadiosRightd2">
                            Endomertial CA
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
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D250][]" value="D25.0 Submucous leiomyoma of uterus" id="formRadiosRight8">
                            <label class="form-check-label" for="formRadiosRight8">
                            D25.0 Submucous leiomyoma of uterus
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D251][]" value="D251 Intramural leiomvoma of uterus" id="formRadiosRight9">
                            <label class="form-check-label" for="formRadiosRight9">
                            D25.1 Intramural leiomvoma of uterus
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D252][]" value="D25.2 Subserosal leiomyoma of uterus" id="formRadiosRight10">
                            <label class="form-check-label" for="formRadiosRight10">
                            D25.2 Subserosal leiomyoma of uterus
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D259][]" value="D259 Leiomyoma of uterus, unspecified" id="formRadiosRight11">
                            <label class="form-check-label" for="formRadiosRight11">
                            D25.9 Leiomyoma of uterus, unspecified
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N710][]" value="N71.0 Acute inflammatory disease of uterus" id="formRadiosRight12">
                            <label class="form-check-label" for="formRadiosRight12">
                            N71.0 Acute inflammatory disease of uterus
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N800][]" value="N80.0 Endometriosis of uterus" id="formRadiosRight13">
                            <label class="form-check-label" for="formRadiosRight13">
                            N80.0 Endometriosis of uterus
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N840][]" value="N84.0 Polyp of corpus uteri" id="formRadiosRightc1">
                            <label class="form-check-label" for="formRadiosRightc1">
                            N84.0 Polyp of corpus uteri
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N852][]" value="N85.2 Hypertrophy of uterus" id="formRadiosRightc2">
                            <label class="form-check-label" for="formRadiosRightc2">
                            N85.2 Hypertrophy of uterus
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N853][]" value="N85.3 Subinvolution of uterus" id="formRadiosRightc3">
                            <label class="form-check-label" for="formRadiosRightc3">
                            N85.3 Subinvolution of uterus
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N854][]" value=" N85.4 Malposition of uterus" id="formRadiosRightc4">
                            <label class="form-check-label" for="formRadiosRightc4">
                            N85.4 Malposition of uterus
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N855][]" value="N85.5 Inversion of uterus" id="formRadiosRightc5">
                            <label class="form-check-label" for="formRadiosRightc5">
                            N85.5 Inversion of uterus
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N856][]" value="N85.6 Intrauterine synechiae" id="formRadiosRightc6">
                            <label class="form-check-label" for="formRadiosRightc6">
                            N85.6 Intrauterine synechiae
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N858][]" value="N85.8 Other specified noninflammatory disorders of uterus" id="formRadiosRightc7">
                            <label class="form-check-label" for="formRadiosRightc7">
                            N85.8 Other specified noninflammatory disorders of uterus
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N859][]" value="N85.9 Noninflammatory disorder of uterus, unspecified" id="formRadiosRightc8">
                            <label class="form-check-label" for="formRadiosRightc8">
                            N85.9 Noninflammatory disorder of uterus, unspecified
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N87][]" value="N87 Dysplasia of cervix uteri" id="formRadiosRightc9">
                            <label class="form-check-label" for="formRadiosRightc9">
                            N87 Dysplasia of cervix uteri
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N879][]" value="N87.9 Dysplasia of cervix uteri, unspecified" id="formRadiosRightc10">
                            <label class="form-check-label" for="formRadiosRightc10">
                            N87.9 Dysplasia of cervix uteri, unspecified
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[P209][]" value="P20.9 Intrauterine hypoxia, unspecified" id="formRadiosRightc11">
                            <label class="form-check-label" for="formRadiosRightc11">
                            P20.9 Intrauterine hypoxia, unspecified
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Q514][]" value="Q51.4 Unicornate uterus" id="formRadiosRightc12">
                            <label class="form-check-label" for="formRadiosRightc12">
                            Q51.4 Unicornate uterus
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Q513][]" value="Q51.3 Bicornate uterus" id="formRadiosRightd3">
                            <label class="form-check-label" for="formRadiosRightd3">
                            Q51.3 Bicornate uterus
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Q518][]" value="Q51.8 Other congenital malformations of uterus and cervix" id="formRadiosRightd4">
                            <label class="form-check-label" for="formRadiosRightd4">
                            Q51.8 Other congenital malformations of uterus and cervix
                            </label>
                        </div>
                     </div>
                        </div>
                    </div>
                       
                             
                       













                     <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Uterine Fibroids Symptoms Score  (UFSS)</h4>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th colspan="5" class="top_header_frm_tb">Calculate UFSS Score </th>
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
                                    <td>Heavy Period</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Period][]" value="0" id="formRadiosRight14">
                                            <label class="form-check-label" for="formRadiosRight14">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Period][]" value="1" id="formRadiosRight15">
                                            <label class="form-check-label" for="formRadiosRight15">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Period][]" value="3" id="formRadiosRight16">
                                            <label class="form-check-label" for="formRadiosRight16">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Period][]" value="5" id="formRadiosRight17">
                                            <label class="form-check-label" for="formRadiosRight17">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Dysmenorrhea</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dysmenorrhea][]" value="0" id="formRadiosRight18">
                                            <label class="form-check-label" for="formRadiosRight18">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dysmenorrhea][]" value="1" id="formRadiosRight19">
                                            <label class="form-check-label" for="formRadiosRight19">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dysmenorrhea][]" value="3" id="formRadiosRight20">
                                            <label class="form-check-label" for="formRadiosRight20">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dysmenorrhea][]" value="5" id="formRadiosRight21">
                                            <label class="form-check-label" for="formRadiosRight21">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Compressive symptoms - Urinary </td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Urinary][]" value="0" id="formRadiosRight22">
                                            <label class="form-check-label" for="formRadiosRight22">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Urinary][]" value="1" id="formRadiosRight23">
                                            <label class="form-check-label" for="formRadiosRight23">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Urinary][]" value="3" id="formRadiosRight24">
                                            <label class="form-check-label" for="formRadiosRight24">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Urinary][]" value="5" id="formRadiosRight25">
                                            <label class="form-check-label" for="formRadiosRight25">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Compressive symptoms - Constipation </td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Constipation][]" value="0" id="formRadiosRight26">
                                            <label class="form-check-label" for="formRadiosRight26">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Constipation][]" value="1" id="formRadiosRight27">
                                            <label class="form-check-label" for="formRadiosRight27">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Constipation][]" value="3" id="formRadiosRight28">
                                            <label class="form-check-label" for="formRadiosRight28">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Constipation][]" value="5" id="formRadiosRight29">
                                            <label class="form-check-label" for="formRadiosRight29">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Compressive symptoms - Low back pain</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Compressive][]" value="0" id="formRadiosRight30">
                                            <label class="form-check-label" for="formRadiosRight30">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Compressive][]" value="1" id="formRadiosRight31">
                                            <label class="form-check-label" for="formRadiosRight31">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Compressive][]" value="3" id="formRadiosRight32">
                                            <label class="form-check-label" for="formRadiosRight32">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Compressive][]" value="5" id="formRadiosRight33">
                                            <label class="form-check-label" for="formRadiosRight33">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Symptomatic anemia</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Symptomaticanemia][]" value="0" id="formRadiosRight34">
                                            <label class="form-check-label" for="formRadiosRight34">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Symptomaticanemia][]" value="1" id="formRadiosRight35">
                                            <label class="form-check-label" for="formRadiosRight35">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Symptomaticanemia][]" value="3" id="formRadiosRight36">
                                            <label class="form-check-label" for="formRadiosRight36">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Symptomaticanemia][]" value="5" id="formRadiosRight37">
                                            <label class="form-check-label" for="formRadiosRight37">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Abdominal mass</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Abdominalmass][]" value="0" id="formRadiosRight38">
                                            <label class="form-check-label" for="formRadiosRight38">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Abdominalmass][]" value="1" id="formRadiosRight39">
                                            <label class="form-check-label" for="formRadiosRight39">
                                            1 pts ( 1 time)
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Abdominalmass][]" value="3" id="formRadiosRight40">
                                            <label class="form-check-label" for="formRadiosRight40">
                                            3 pts  (3 times)
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Abdominalmass][]" value="5" id="formRadiosRight41">
                                            <label class="form-check-label" for="formRadiosRight41">
                                            5 pts (5 times)
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>


                                    <tr id="mildLUTS" class="hidden">
                                        <td colspan="3" rowspan="3"></td>
                                        <th>Mild UFSS </th>
                                        <th>(0-7 pts)</th>
                                    </tr>
                                    <tr id="moderateLUTS" class="hidden">>
                                        <td colspan="3" rowspan="3"></td>
                                        <th>Moderate UFSS </th>
                                        <th>(8-19 pts) (UAE FAVERABLE)</th>
                                    </tr>
                                    <tr id="severeLUTS" class="hidden">
                                        <td colspan="3" rowspan="3"></td>
                                        <th>Severe UFSS </th>
                                        <th>(20-35 pts) (UAE FAVERABLE)</th>
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
                                    <h6 class="mb-3 lut_title">Active PID |  Vaginal discharge | Vaginal or vulvar ulcer</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[ActivePID][]" value="YES (UFE contraindicated)" id="formRadiosRight42">
                                        <label class="form-check-label" for="formRadiosRight42">
                                        YES (UFE contraindicated)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[ActivePID][]" value="No" id="formRadiosRight43">
                                        <label class="form-check-label" for="formRadiosRight43">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Dysfunctional Uterine bleed </h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[Dysfunctional][]" value="YES (UFE contraindicated)"  id="formRadiosRight44">
                                        <label class="form-check-label" for="formRadiosRight44">
                                        YES (UFE contraindicated)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[Dysfunctional][]" value="No"  id="formRadiosRight45">
                                        <label class="form-check-label" for="formRadiosRight45">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Painful intercorse (for married female)</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio"  name="clinical_indicator[Painful][]" value="YES" id="formRadiosRight46">
                                        <label class="form-check-label" for="formRadiosRight46">
                                        YES
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio"  name="clinical_indicator[Painful][]" value="No" id="formRadiosRight47">
                                        <label class="form-check-label" for="formRadiosRight47">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Recurrent abortion (for married female)</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[Recurrent][]" value="YES"  id="formRadiosRightd5">
                                        <label class="form-check-label" for="formRadiosRightd5">
                                        YES 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[Recurrent][]" value="No"  id="formRadiosRightd6">
                                        <label class="form-check-label" for="formRadiosRightd6">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">GnRH-a injections</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[GnRH][]" value="YES" id="formRadiosRightd8">
                                        <label class="form-check-label" for="formRadiosRightd8">
                                        YES 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[GnRH][]" value="No" id="formRadiosRightd9">
                                        <label class="form-check-label" for="formRadiosRightd9">
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
                                <h4>USGENERAL70 &gt; <span class="sub_tt__">Ultrasound Uterus / Fibroids Findings</span></h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Fibroids</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Fibroids][]" value="Single" id="formRadiosRight48">
                                        <label class="form-check-label" for="formRadiosRight48">
                                        Single
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Fibroids][]" value="Multiple" id="formRadiosRight49">
                                        <label class="form-check-label" for="formRadiosRight49">
                                        Multiple
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Endometrium</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Endometrium][]" value="Normal" id="formRadiosRightd10">
                                        <label class="form-check-label" for="formRadiosRightd10">
                                        Normal 
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Endometrium][]" value="Abnormal (>15 mm Adnomyosis)" id="formRadiosRightd11">
                                        <label class="form-check-label" for="formRadiosRightd11">
                                        Abnormal (>15 mm Adnomyosis)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Ovaries</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Endometrium][]" value="Normal" id="formRadiosRightd12">
                                        <label class="form-check-label" for="formRadiosRightd12">
                                        Normal 
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Endometrium][]" value="Abnormal" id="formRadiosRightd13">
                                        <label class="form-check-label" for="formRadiosRightd13">
                                        Abnormal 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">PID</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[PID][]" value="YES (UFE contraindicated)" id="formRadiosRightd14">
                                        <label class="form-check-label" for="formRadiosRightd14">
                                        YES (UFE contraindicated)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[PID][]" value="NO" id="formRadiosRightd15">
                                        <label class="form-check-label" for="formRadiosRightd15">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                                
                                
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>MRCIR48 &gt; <span class="sub_tt__">CT - Uterus / Fibroids Findings </span></h4>
                            </div>
                        </div> 
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Fibroids</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Fibroids][]" value="Single" id="formRadiosRightd16">
                                        <label class="form-check-label" for="formRadiosRightd16">
                                        Single
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Fibroids][]" value="Multiple" id="formRadiosRightd17">
                                        <label class="form-check-label" for="formRadiosRightd17">
                                        Multiple
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Ovaries</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Ovaries][]" value="YES (UFE contraindicated" id="formRadiosRightd18">
                                        <label class="form-check-label" for="formRadiosRightd18">
                                        YES (UFE contraindicated)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Ovaries][]" value="NO" id="formRadiosRightd19">
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
                          <h6 class="mb-3 lut_title">Adnexal Mass / Complex Cyst</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Adnexal][]" value="YES (UFE  unfaverable)" id="formRadiosRightd20">
                                        <label class="form-check-label" for="formRadiosRightd20">
                                        YES (UFE  unfaverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Adnexal][]" value="NO" id="formRadiosRightd21">
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
                          <h6 class="mb-3 lut_title">Pelvic Lymph nodes enlargement / Free Fluid</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Pelvic][]" value="YES (UFE  unfaverable)" id="formRadiosRightd22">
                                        <label class="form-check-label" for="formRadiosRightd22">
                                        YES (UFE  unfaverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[Pelvic][]" value="NO" id="formRadiosRightd23">
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
                          <h6 class="mb-3 lut_title">PID</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[PID2][]" value="YES (UFE contraindicated)" id="formRadiosRightd24">
                                        <label class="form-check-label" for="formRadiosRightd24">
                                        YES (UFE contraindicated)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[PID2][]" value="NO" id="formRadiosRightd25">
                                        <label class="form-check-label" for="formRadiosRightd25">
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
                                <h4>LABOVARIANHOTMONES78 &gt; <span class="sub_tt__">Ovarian Reserve Result</span></h4>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">FSH</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[FSH][]" value="Normal" id="formRadiosRightd26">
                                        <label class="form-check-label" for="formRadiosRightd26">
                                        Normal
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[FSH][]" value="Abnormal (UAE unfaverable)" id="formRadiosRightd27">
                                        <label class="form-check-label" for="formRadiosRightd27">
                                        Abnormal (UAE unfaverable)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">LH</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[LH][]" value="Normal" id="formRadiosRightd28">
                                        <label class="form-check-label" for="formRadiosRightd28">
                                        Normal
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[LH][]" value="Abnormal (UAE unfaverable)" id="formRadiosRightd29">
                                        <label class="form-check-label" for="formRadiosRightd29">
                                        Abnormal (UAE unfaverable)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">AMH</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[AMH][]" value="Normal" id="formRadiosRightd30">
                                        <label class="form-check-label" for="formRadiosRightd30">
                                        Normal
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[AMH][]" value="Abnormal (UAE unfaverable)" id="formRadiosRightd31">
                                        <label class="form-check-label" for="formRadiosRightd31">
                                        Abnormal (UAE unfaverable)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        




                     
                         
                            <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABRFT12</h4>
                            </div>
                          </div>
                       
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Renal Function test (Creatinine | Na | K | urea) Results</h6>
                        </div>
                                <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[LABRFT12][]" value="Abnormal Renal profile (PAE contraindicated)" id="formRadiosRight88">
                                    <label class="form-check-label" for="formRadiosRight88">
                                    Abnormal Renal profile (PAE contraindicated)
                                    </label>
                                </div>
                                </div>
                                <div class="col-lg-4">
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
                            <div class="col-lg-4">
                            <h6 class="mb-3 lut_title">Urinalysis Results</h6>
                            </div>
                                <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[LABUA29][]" value="Abnormal Urinanalysis (UAE unfaverable)" id="formRadiosRight76">
                                    <label class="form-check-label" for="formRadiosRight76">
                                    Abnormal Urinanalysis (UAE unfaverable)
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[LABUA29][]" value="Normal Urinanalysis" id="formRadiosRight77">
                                    <label class="form-check-label" for="formRadiosRight77">
                                    Normal Urinanalysis
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_76">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***"  style="height: 100px"  name="Lab[LABUA29NOTE][]"></textarea>
                                    </div>
                                </div>
                        </div>
                    

                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABPAPSMEAR185</h4>
                            </div>
                        </div>

                        <div class="col-lg-12">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">PAP SMEAR  Results</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Lab[LABPAPSMEAR185][]" value="Normal PAP smear cervix" id="formRadiosRight82">
                                        <label class="form-check-label" for="formRadiosRight82">
                                        Normal PAP smear cervix
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Lab[LABPAPSMEAR185][]" value="Malignant PAP  (UFE contraindicated)" id="formRadiosRight83">
                                        <label class="form-check-label" for="formRadiosRight83">
                                        Malignant PAP  (UFE contraindicated)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_83">
                                    <div class="form-check form-check-right mb-3 ps-0">
                                      <textarea class="form-control" placeholder="Enter Elaborate Malignant PAP / notes here***"  style="height: 100px"  name="Lab[LABPAPSMEAR185NOTE][]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                     
                        
                       

                        <div class="col-lg-12">
                          <h6 class="section_title__">MDT</h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>MDTREVIEW00 &#62; <span class="sub_tt__">Uterine Fibroids MDT outcome</span></h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">MDT decision</h6>
                        </div>
                        <div class="col-lg-12">
                        <div class="row align-items-center">
                     
                                    <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="MDT[MDTDecision][]" value="UFE" id="formRadiosRight84">
                                        <label class="form-check-label" for="formRadiosRight84">
                                        UFE
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="MDT[MDTDecision][]" value="Medical" id="formRadiosRight85">
                                        <label class="form-check-label" for="formRadiosRight85">
                                        Medical
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="MDT[MDTDecision2][]" value="Surgical"  id="formRadiosRight86">
                                        <label class="form-check-label" for="formRadiosRight86">
                                        Surgical
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="MDT[MDTDecision2][]" value="Other options"  id="formRadiosRight87">
                                        <label class="form-check-label" for="formRadiosRight87">
                                        Other options
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_84">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate  UFE / notes here***"  style="height: 100px" name="MDT[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_85">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate Medical / notes here***"  style="height: 100px" name="MDT[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_86">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***"  style="height: 100px" name="MDT[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_87">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate  Other options / notes here***"  style="height: 100px" name="MDT[NOTE][]"></textarea>
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
                                        <input class="form-check-input" type="radio" name="elegibilityStatus[treatment][]" value="UFE" id="formRadiosRight90">
                                        <label class="form-check-label" for="formRadiosRight90">
                                        UFE
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3 ">
                                        <input class="form-check-input" type="radio" name="elegibilityStatus[treatment][]" value="Medical" id="formRadiosRight91">
                                        <label class="form-check-label" for="formRadiosRight91">
                                        Medical
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3 ">
                                        <input class="form-check-input" type="radio" name="elegibilityStatus[treatment][]" value="Surgical" id="formRadiosRight92">
                                        <label class="form-check-label" for="formRadiosRight92">
                                        Surgical
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="elegibilityStatus[treatment][]" value="Other options" id="formRadiosRight93">
                                        <label class="form-check-label" for="formRadiosRight93">
                                        Other options
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_90">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate  UFE / notes here***"  style="height: 100px" name="elegibilityStatus[note][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_91">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate Medical  / notes here***"  style="height: 100px" name="elegibilityStatus[note][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_92">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***"  style="height: 100px" name="elegibilityStatus[note][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_93">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate Other options / notes here***"  style="height: 100px" name="elegibilityStatus[note][]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                          <h6 class="section_title__">Intervention PROCEDURE / Rx</h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[ANGIOUFE2910][]" value="ANGIOUFE2910" id="formRadiosRightb37">
                                            <label class="form-check-label" for="formRadiosRightb37">
                                            ANGIOUFE2910
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
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[LABPREIRSAFETY17][]"  value="LABPREIRSAFETY17" id="formRadiosRightb39">
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
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[USTFAUL2420][]" value="USTFAUL2420" id="formRadiosRightd32">
                                            <label class="form-check-label" for="formRadiosRightd32">
                                            USTFAUL2420
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightd33">
                                            <label class="form-check-label" for="formRadiosRightd33">
                                            LABPREIRBASIC32
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="InterventionProcedure[LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightd34">
                                            <label class="form-check-label" for="formRadiosRightd34">
                                            LABPREIRSAFETY17
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
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Supportive[IVVITAPROSTATE175][]" value="IVVITAPROSTATE175" id="formRadiosRightb45">
                                            <label class="form-check-label" for="formRadiosRightb45">
                                            IVVITAPROSTATE175
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
                                    <input class="form-check-input" type="radio" name="Referral[HCREFFERAL][]" value="Gynae" id="formRadiosRightb48">
                                    <label class="form-check-label" for="formRadiosRightb48">
                                    Gynae
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3 ">
                                    <input class="form-check-input" type="radio" name="Referral[HCREFFERAL][]" value="Pevic Floor Rehab/PhysioTherapy" id="formRadiosRightb49">
                                    <label class="form-check-label" for="formRadiosRightb49">
                                    Pevic Floor Rehab/PhysioTherapy
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
                                    Head & Neck Rehab/PhysioTherapy
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="formRadiosRight28" id="formRadiosRightb52">
                                    <label class="form-check-label" for="formRadiosRightb52">
                                    Others
                                    </label>
                                </div>
                            </div> -->
                            <div class="col-lg-12" id="textarea_b48">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate   Gynae / notes here***"  style="height: 100px" name="Referral[NOTE][]"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_b49">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate   Pevic Floor Rehab/PhysioTherapy / Head and Neck surgery   / notes here***"  style="height: 100px" name="Referral[NOTE][]"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_b50">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate  Others  / notes here***"  style="height: 100px" name="Referral[NOTE][]"></textarea>
                                </div>
                            </div>
                            <!-- <div class="col-lg-12" id="textarea_b51">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate Head & Neck Rehab/PhysioTherapy / notes here***"  style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_b52">
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


        $("#formRadiosRightb48").click(function(){
            $("#textarea_b48").show();
            $("#textarea_b49").hide();
            $("#textarea_b50").hide();
            $("#textarea_b51").hide();
            $("#textarea_b52").hide();
        });
        $("#formRadiosRightb49").click(function(){
            $("#textarea_b48").hide();
            $("#textarea_b49").show();
            $("#textarea_b50").hide();
            $("#textarea_b51").hide();
            $("#textarea_b52").hide();
        });
        $("#formRadiosRightb50").click(function(){
            $("#textarea_b48").hide();
            $("#textarea_b49").hide();
            $("#textarea_b50").show();
            $("#textarea_b51").hide();
            $("#textarea_b52").hide();
        });
        $("#formRadiosRightb51").click(function(){
            $("#textarea_b48").hide();
            $("#textarea_b49").hide();
            $("#textarea_b50").hide();
            $("#textarea_b51").show();
            $("#textarea_b52").hide();
        });
        $("#formRadiosRightb52").click(function(){
            $("#textarea_b48").hide();
            $("#textarea_b49").hide();
            $("#textarea_b50").hide();
            $("#textarea_b51").hide();
            $("#textarea_b52").show();
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

            if (totalPoints >= 0 && totalPoints <= 7) {
                mildLUTS.classList.remove('hidden');
            } else if (totalPoints >= 8 && totalPoints <= 19) {
                moderateLUTS.classList.remove('hidden');
            } else if (totalPoints >= 20 && totalPoints <= 1035) {
                severeLUTS.classList.remove('hidden');
            }
        }
    });
});
</script>
    @endpush
@endsection

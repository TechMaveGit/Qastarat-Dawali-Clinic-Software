@extends('back.layout.main_view')
@push('title')
    Patient | Thyroid QASTARAT & DAWALI CLINICS
@endpush
@push('custom-css')
   
    <style>
        .hidden {
            display: none;
        }
    </style>
    @endpush
@section('content-section')
    
 
 

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
            <form method="POST" action="{{route('user.storeThyroidEligibilityForms')  }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$patient_id }}"/>

            
          <h3 class="form_title">Thyroid <span>Ablation</span></h3>
        
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
                                <input class="form-check-input" type="checkbox" name="diagnosis_general[Thyroidnodule][]"  id="formRadiosRight1" value="Thyroid nodule">
                                <label class="form-check-label" for="formRadiosRight1">
                                Thyroid nodule
                                </label>
                            </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[MultiNodularGoitre][]"  id="formRadiosRight2" value="Multi-Nodular Goitre">
                            <label class="form-check-label" for="formRadiosRight2">
                            Multi-Nodular Goitre
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[ThyroidCyst][]"  id="formRadiosRight3" value="Thyroid Cyst">
                            <label class="form-check-label" for="formRadiosRight3">
                            Thyroid Cyst
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Euothyroid][]"  id="formRadiosRight4" value="Euothyroid">
                            <label class="form-check-label" for="formRadiosRight4">
                            Euothyroid
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Hypothyroidism][]"  id="formRadiosRight5" value="Hypothyroidism">
                            <label class="form-check-label" for="formRadiosRight5">
                            Hypothyroidism
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[Thyrotoxicosis][]"  id="formRadiosRight6" value="Thyrotoxicosis">
                            <label class="form-check-label" for="formRadiosRight6">
                            Thyrotoxicosis
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[GraveDisease][]"  id="formRadiosRight7" value="Grave’s Disease">
                            <label class="form-check-label" for="formRadiosRight7">
                            Grave’s Disease
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[LymphocyticThyroiditis][]"  id="formRadiosRighta1" value="Lymphocytic Thyroiditis ">
                            <label class="form-check-label" for="formRadiosRighta1">
                            Lymphocytic Thyroiditis 
                            </label>
                        </div>
                    
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_general[ThyroidCarcinoma][]"  id="formRadiosRighta2" value="Thyroid Carcinoma">
                            <label class="form-check-label" for="formRadiosRighta2">
                            Thyroid Carcinoma 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Diagnosis - ICD 10</h4>
                            </div>
                        </div>
                        <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[C73][]" id="formRadiosRight8" value="C73 Malignant neoplasm of thyroid gland">
                            <label class="form-check-label" for="formRadiosRight8">
                            C73 Malignant neoplasm of thyroid gland 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D34][]" id="formRadiosRight9" value="D34 Benign neoplasm of thyroid gland">
                            <label class="form-check-label" for="formRadiosRight9">
                            D34 Benign neoplasm of thyroid gland
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E03][]" id="formRadiosRight10" value="E03 Other hypothyroidism">
                            <label class="form-check-label" for="formRadiosRight10">
                            E03 Other hypothyroidism
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E034][]" id="formRadiosRight11" value="E03.4 Atrophy of thyroid (acquired)">
                            <label class="form-check-label" for="formRadiosRight11">
                            E03.4 Atrophy of thyroid (acquired)
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E039][]" id="formRadiosRight12" value="E03.9 Hypothyroidism, unspecified">
                            <label class="form-check-label" for="formRadiosRight12">
                            E03.9 Hypothyroidism, unspecified 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E041][]" id="formRadiosRight13" value="E04.1 Nontoxic single thyroid nodule">
                            <label class="form-check-label" for="formRadiosRight13">
                            E04.1 Nontoxic single thyroid nodule 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E049][]" id="formRadiosRighta3" value="E04.9 Nontoxic goitre, unspecified">
                            <label class="form-check-label" for="formRadiosRighta3">
                            E04.9 Nontoxic goitre, unspecified 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E05][]" value="E05 Thyrotoxicosis [hyperthyroidism] " id="formRadiosRighta4">
                            <label class="form-check-label" for="formRadiosRighta4">
                            E05 Thyrotoxicosis [hyperthyroidism] 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E051][]" id="formRadiosRighta5" value="E05.1 Thyrotoxicosis with toxic single Thyroid nodule">
                            <label class="form-check-label" for="formRadiosRighta5">
                            E05.1 Thyrotoxicosis with toxic single Thyroid nodule
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E052][]" id="formRadiosRighta6" value="E05.2 Thyrotoxicosis with toxic multinodular goitre">
                            <label class="form-check-label" for="formRadiosRighta6">
                            E05.2 Thyrotoxicosis with toxic multinodular goitre 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E055][]" id="formRadiosRighta7" value="E05.5 Thyroid crisis or storm">
                            <label class="form-check-label" for="formRadiosRighta7">
                            E05.5 Thyroid crisis or storm 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E06][]" id="formRadiosRighta8" value="E06 Thyroiditis">
                            <label class="form-check-label" for="formRadiosRighta8">
                            E06 Thyroiditis
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E060][]" id="formRadiosRighta9" value="E06.0 Acute thyroiditis">
                            <label class="form-check-label" for="formRadiosRighta9">
                            E06.0 Acute thyroiditis 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E061][]" id="formRadiosRighta10" value="E06.1 Subacute thyroiditis">
                            <label class="form-check-label" for="formRadiosRighta10">
                            E06.1 Subacute thyroiditis 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E062][]" id="formRadiosRighta11" value="E06.2 Chronic thyroiditis with transient thyrotoxicosis">
                            <label class="form-check-label" for="formRadiosRighta11">
                            E06.2 Chronic thyroiditis with transient thyrotoxicosis 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E063][]" id="formRadiosRighta12" value="E06.3 Autoimmune thyroiditis">
                            <label class="form-check-label" for="formRadiosRighta12">
                            E06.3 Autoimmune thyroiditis 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E064][]" id="formRadiosRighta13" value="E06.4 Drug-induced thyroiditis">
                            <label class="form-check-label" for="formRadiosRighta13">
                            E06.4 Drug-induced thyroiditis 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E065][]" id="formRadiosRighta14" value="E06.5 Other chronic thyroiditis ">
                            <label class="form-check-label" for="formRadiosRighta14">
                            E06.5 Other chronic thyroiditis 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E069][]" id="formRadiosRighta15" value="E06.9 Thyroiditis, unspecified">
                            <label class="form-check-label" for="formRadiosRighta15">
                            E06.9 Thyroiditis, unspecified
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E07][]" id="formRadiosRighta24" value="E07 Disorders of thyroid gland">
                            <label class="form-check-label" for="formRadiosRighta24">
                            E07 Disorders of thyroid gland
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E209][]" id="formRadiosRighta16" value="E20.9 Hypoparathyroidism, unspecified Parathyroid tetany">
                            <label class="form-check-label" for="formRadiosRighta16">
                            E20.9 Hypoparathyroidism, unspecified Parathyroid tetany
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E210][]" id="formRadiosRighta17" value="E21.0 Primary hyperparathyroidism Hyperplasia of parathyroid">
                            <label class="form-check-label" for="formRadiosRighta17">
                            E21.0 Primary hyperparathyroidism Hyperplasia of parathyroid
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Disorderofparathyroidglandunspecified][]" id="formRadiosRighta18" value="E21.5 Disorder of parathyroid gland, unspecified ">
                            <label class="form-check-label" for="formRadiosRighta18">
                            E21.5 Disorder of parathyroid gland, unspecified 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Disordersofthyroidglandindiseasesclassifiedelsewhere][]" id="formRadiosRighta19" value="E35.0 Disorders of thyroid gland in diseases classified elsewhere">
                            <label class="form-check-label" for="formRadiosRighta19">
                            E35.0 Disorders of thyroid gland in diseases classified elsewhere 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Postproceduralhypothyroidism][]" id="formRadiosRighta20" value="E89.0 Postprocedural hypothyroidism">
                            <label class="form-check-label" for="formRadiosRighta20">
                            E89.0 Postprocedural hypothyroidism 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Thyroidhormonesandsubstitutes][]" id="formRadiosRighta21 " value="Y42.1 Thyroid hormones and substitutes">
                            <label class="form-check-label" for="formRadiosRighta21">
                            Y42.1 Thyroid hormones and substitutes 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Antithyroiddrugs][]" id="formRadiosRighta22" value="Y42.2 Antithyroid drugs">
                            <label class="form-check-label" for="formRadiosRighta22">
                            Y42.2 Antithyroid drugs
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Postpartumthyroiditis][]" id="formRadiosRighta23" value="090.5 Postpartum thyroiditis">
                            <label class="form-check-label" for="formRadiosRighta23">
                            090.5 Postpartum thyroiditis 
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Thyroid Compressive symptoms score  (TCSS)</h4>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th colspan="5" class="top_header_frm_tb">Calculate TCSS Score</th>
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
                                    <td>Disfiguring Neck mass </td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Disfiguring][]" id="formRadiosRight14" value="0">
                                            <label class="form-check-label" for="formRadiosRight14">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Disfiguring][]" id="formRadiosRight15" value="1">
                                            <label class="form-check-label" for="formRadiosRight15">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Disfiguring][]" id="formRadiosRight16" value="3">
                                            <label class="form-check-label" for="formRadiosRight16">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Disfiguring][]" id="formRadiosRight17" value="5">
                                            <label class="form-check-label" for="formRadiosRight17">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Dyspnea / SOB</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dyspnea][]" id="formRadiosRight18" value="0">
                                            <label class="form-check-label" for="formRadiosRight18">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dyspnea][]" id="formRadiosRight19" value="1">
                                            <label class="form-check-label" for="formRadiosRight19">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dyspnea][]" id="formRadiosRight20" value="3">
                                            <label class="form-check-label" for="formRadiosRight20">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dyspnea][]" id="formRadiosRight21" value="5">
                                            <label class="form-check-label" for="formRadiosRight21">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Dysphagia </td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dysphagia][]" id="formRadiosRight22" value="0">
                                            <label class="form-check-label" for="formRadiosRight22">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dysphagia][]" id="formRadiosRight23" value="1">
                                            <label class="form-check-label" for="formRadiosRight23">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dysphagia][]" id="formRadiosRight24" value="3">
                                            <label class="form-check-label" for="formRadiosRight24">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Dysphagia][]" id="formRadiosRight25" value="5">
                                            <label class="form-check-label" for="formRadiosRight25">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Hoarse altered voice </td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Hoarsealteredvoice][]" id="formRadiosRight26" value="0">
                                            <label class="form-check-label" for="formRadiosRight26">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Hoarsealteredvoice][]" id="formRadiosRight27" value="1">
                                            <label class="form-check-label" for="formRadiosRight27">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Hoarsealteredvoice][]" id="formRadiosRight28" value="3">
                                            <label class="form-check-label" for="formRadiosRight28">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Hoarsealteredvoice][]" id="formRadiosRight29" value="5">
                                            <label class="form-check-label" for="formRadiosRight29">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Head / Neck pain</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Neckpain][]" id="formRadiosRight30" value="0">
                                            <label class="form-check-label" for="formRadiosRight30">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Neckpain][]" id="formRadiosRight31" value="1">
                                            <label class="form-check-label" for="formRadiosRight31">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Neckpain][]" id="formRadiosRight32" value="3">
                                            <label class="form-check-label" for="formRadiosRight32">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Neckpain][]" id="formRadiosRight33" value="5">
                                            <label class="form-check-label" for="formRadiosRight33">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Sleep disturbance </td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Sleepdisturbance][]" id="formRadiosRight34" value="0">
                                            <label class="form-check-label" for="formRadiosRight34">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Sleepdisturbance][]" id="formRadiosRight35" value="1">
                                            <label class="form-check-label" for="formRadiosRight35">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Sleepdisturbance][]" id="formRadiosRight36" value="3">
                                            <label class="form-check-label" for="formRadiosRight36">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Sleepdisturbance][]" id="formRadiosRight37" value="5">
                                            <label class="form-check-label" for="formRadiosRight37">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Exophthalmos </td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Exophthalmos][]" id="formRadiosRight38" value="0">
                                            <label class="form-check-label" for="formRadiosRight38">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Exophthalmos][]" id="formRadiosRight39" value="1">
                                            <label class="form-check-label" for="formRadiosRight39">
                                            1 pts ( 1 time)
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Exophthalmos][]" id="formRadiosRight40" value="3">
                                            <label class="form-check-label" for="formRadiosRight40">
                                            3 pts  (3 times)
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input symtoms_scrore_checkbox" type="radio" name="symptoms_score[Exophthalmos][]" id="formRadiosRight41" value="5">
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
                                    <tr id="moderateLUTS" class="hidden">>
                                        <td colspan="3" rowspan="3"></td>
                                        <th>Moderate LUTS </th>
                                        <th>(8-19 pts) </th>
                                    </tr>
                                    <tr id="severeLUTS" class="hidden">
                                        <td colspan="3" rowspan="3"></td>
                                        <th>Severe LUTS  </th>
                                        <th>(20-35 pts) </th>
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
                                    <h6 class="mb-3 lut_title">hyper-Toxic symptoms: Palpitations | Sweating | Anxiety | tremor | weight loss | hair loss </h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio"  name="clinical_indicator[Palpitations][]" id="formRadiosRight42" value="YES  (TA unfaverable unless ATN)">
                                        <label class="form-check-label" for="formRadiosRight42">
                                        YES  (TA unfaverable unless ATN)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio"  name="clinical_indicator[Palpitations][]" id="formRadiosRight43" value="No">
                                        <label class="form-check-label" for="formRadiosRight43">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Anti-thyroid meds (e.g. Carbimazole)</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[Carbimazole][]" id="formRadiosRight44" value="YES  (TA unfaverable unless ATN)">
                                        <label class="form-check-label" for="formRadiosRight44">
                                        YES  (TA unfaverable unless ATN)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="clinical_indicator[Carbimazole][]" id="formRadiosRight45" value="No">
                                        <label class="form-check-label" for="formRadiosRight45">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Hypo-thyroid symptoms:  lethargy | Fatigue | cold intolerance | weight gain | altered mood</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[lethargy][]" id="formRadiosRight46" value="Yes">
                                        <label class="form-check-label" for="formRadiosRight46">
                                        YES
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[lethargy][]" id="formRadiosRight47" value="No">
                                        <label class="form-check-label" for="formRadiosRight47">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Thyroid hormone replacement (e.g. Thyroxine)</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[Thyroxine][]" id="formRadiosRight46" value="YES">
                                        <label class="form-check-label" for="formRadiosRight48">
                                        YES
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="clinical_indicator[Thyroxine][]" id="formRadiosRight47" value="NO">
                                        <label class="form-check-label" for="formRadiosRight49">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="section_title__">Imaging</h6>
                            <div class="title_head">
                                <h4>USTHYROIDACRTIRADS70 </h4>
                            </div>
                          <!-- <h6 class="mb-3 lut_title">Calculate TI-RARDS - RIGHT right_lobe_score</h6> -->
                        </div>
                     
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th colspan="5" class="top_header_frm_tb">Calculate TI-RARDS - RIGHT LOBE score</th>
                                     </tr>
                                </thead>
                            
                                <tbody>
                                    <tr>
                                        <th colspan="2">Composition</th>
                                    </tr>
                                    <tr>
                                    <td>Cystic</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Composition][]" id="formRadiosRighta25" value="0">
                                            <label class="form-check-label" for="formRadiosRighta25">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                   
                                    </tr>
                                    <tr>
                                    <td>Spongyform</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Composition][]" id="formRadiosRighta26" value="0">
                                            <label class="form-check-label" for="formRadiosRighta26">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                   
                                    </tr>
                                    <tr>
                                    <td>DMixed Cystic / solid </td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Composition][]" id="formRadiosRighta27" value="1">
                                            <label class="form-check-label" for="formRadiosRighta27">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                   
                                    
                                    </tr>

                                    <tr>
                                    <td>Solid </td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Composition][]" id="formRadiosRighta28" value="2">
                                            <label class="form-check-label" for="formRadiosRighta28">
                                            2 pts 
                                            </label>
                                        </div>
                                    </td>
                                   
                                    
                                    </tr>
                                    <tr>
                                        <th colspan="2">Echogenisity</th>
                                    </tr>
                                    
                                    <tr>
                                    <td>Anechoic </td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Echogenisity][]" id="formRadiosRighta29" value="0">
                                            <label class="form-check-label" for="formRadiosRighta29">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Hyper / iso echoic</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Echogenisity][]" id="formRadiosRighta30" value="1">
                                            <label class="form-check-label" for="formRadiosRighta30">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Hypoechoic</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Echogenisity][]" id="formRadiosRighta31" value="2">
                                            <label class="form-check-label" for="formRadiosRighta31">
                                            2 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Very Hypoechoic</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Echogenisity][]" id="formRadiosRighta32" value="2">
                                            <label class="form-check-label" for="formRadiosRighta32">
                                            2 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>

                                    <tr>
                                        <th colspan="2">Shape</th>
                                    </tr>
                                    <tr>
                                    <td>Eider-than-taller</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Shape][]" id="formRadiosRighta33" value="0">
                                            <label class="form-check-label" for="formRadiosRighta33">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>taller-than-wider</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="checkbox" name="right_lobe_score[Shape][]" id="formRadiosRighta34" value="3">
                                            <label class="form-check-label" for="formRadiosRighta34">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2">Margin</th>
                                    </tr>
                                    <tr>
                                    <td>smooth</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Margin][]" id="formRadiosRighta35" value="0">
                                            <label class="form-check-label" for="formRadiosRighta35">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>
                                      <tr>
                                    <td>ill-defined</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Margin][]" id="formRadiosRighta36" value="0">
                                            <label class="form-check-label" for="formRadiosRighta36">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>
                                      <tr>
                                    <td>lobulated / irrigular</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Margin][]" id="formRadiosRighta37" value="2">
                                            <label class="form-check-label" for="formRadiosRighta37">
                                            2 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>
                                      <tr>
                                    <td>extra-thyroid extension</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Margin][]" id="formRadiosRighta57" value="3">
                                            <label class="form-check-label" for="formRadiosRighta57">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>

                                      <tr>
                                        <th colspan="2">Calcification (Echogenic foci)</th>
                                    </tr>
                                    <tr>
                                    <td>None / large comet-tail artifacts</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Calcification][]" id="formRadiosRighta58" value="0">
                                            <label class="form-check-label" for="formRadiosRighta58">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>
                                      <tr>
                                    <td>Macrocalcifications</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Calcification][]" id="formRadiosRighta59" value="1">
                                            <label class="form-check-label" for="formRadiosRighta59">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>
                                      <tr>
                                    <td>Peripheral (rim) calcifications</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Calcification][]" id="formRadiosRighta60" value="2">
                                            <label class="form-check-label" for="formRadiosRighta60">
                                            2 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>
                                      <tr>
                                    <td>Punctate echogenic foci</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input right_lobe_score_checkbox" type="radio" name="right_lobe_score[Calcification][]" id="formRadiosRighta61" value="3">
                                            <label class="form-check-label" for="formRadiosRighta61">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>

                                     <tr id="TR1_RIGHT" class="hidden">
                                        <th> </th>
                                        <th>TR1 (0 pts- Benign)</th>
                                    </tr>
                                    <tr id="TR2_RIGHT" class="hidden">
                                        <th>  </th>
                                        <th>TR2 (2 pts- Not Suspicious)</th>
                                    </tr>
                                    <tr id="TR3_RIGHT" class="hidden">
                                        <th></th>
                                        <th>TR3 (3 pts- Mildly Suspicious)</th>
                                    </tr>
                                    <tr id="TR4_RIGHT" class="hidden">
                                        <th></th>
                                        <th>TR4 (4-6 pts- Moderately Suspicious)</th>
                                    </tr>
                                    <tr id="TR5_RIGHT" class="hidden">
                                        <th></th>
                                        <th>TR5 (7+ pts- Highly Suspicious)</th>
                                    </tr>
                                </tbody>
                              </table>
                        </div>
                        
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th colspan="5" class="top_header_frm_tb">Calculate TI-RARDS - LEFT  LOBE score</th>
                                     </tr>
                                </thead>
                            
                                <tbody>
                                    <tr>
                                        <th colspan="2">Composition</th>
                                    </tr>
                                    <tr>
                                    <td>Cystic</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Composition][]" id="formRadiosRighta39" value="0">
                                            <label class="form-check-label" for="formRadiosRighta39">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                   
                                    </tr>
                                    <tr>
                                    <td>Spongyform</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Composition][]" id="formRadiosRighta40" value="0">
                                            <label class="form-check-label" for="formRadiosRighta40">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                   
                                    </tr>
                                    <tr>
                                    <td>DMixed Cystic / solid </td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Composition][]" id="formRadiosRighta41" value="1">
                                            <label class="form-check-label" for="formRadiosRighta41">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                   
                                    
                                    </tr>

                                    <tr>
                                    <td>Solid </td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Composition][]" id="formRadiosRighta42" value="2">
                                            <label class="form-check-label" for="formRadiosRighta42">
                                            2 pts 
                                            </label>
                                        </div>
                                    </td>
                                   
                                    
                                    </tr>
                                    <tr>
                                        <th colspan="2">Echogenisity</th>
                                    </tr>
                                    
                                    <tr>
                                    <td>Anechoic </td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Echogenisity][]" id="formRadiosRighta43" value="0">
                                            <label class="form-check-label" for="formRadiosRighta43">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Hyper / iso echoic</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Echogenisity][]" id="formRadiosRighta44" value="1">
                                            <label class="form-check-label" for="formRadiosRighta44">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Hypoechoic</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Echogenisity][]" id="formRadiosRighta45" value="2">
                                            <label class="form-check-label" for="formRadiosRighta45">
                                            2 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Very Hypoechoic</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Echogenisity][]" id="formRadiosRighta46" value="2">
                                            <label class="form-check-label" for="formRadiosRighta46">
                                            2 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>

                                    <tr>
                                        <th colspan="2">Shape</th>
                                    </tr>
                                    <tr>
                                    <td>Eider-than-taller</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Shape][]" id="formRadiosRighta47" value="0">
                                            <label class="form-check-label" for="formRadiosRighta47">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>taller-than-wider</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Shape][]" id="formRadiosRighta48" value="3">
                                            <label class="form-check-label" for="formRadiosRighta48">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    
                                    <tr>
                                        <th colspan="2">Margin</th>
                                    </tr>
                                    <tr>
                                    <td>smooth</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Margin][]" id="formRadiosRighta49" value="0">
                                            <label class="form-check-label" for="formRadiosRighta49">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>
                                      <tr>
                                    <td>ill-defined</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Margin][]" id="formRadiosRighta50" value="0">
                                            <label class="form-check-label" for="formRadiosRighta50">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>
                                      <tr>
                                    <td>lobulated / irrigular</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Margin][]" id="formRadiosRighta51" value="2">
                                            <label class="form-check-label" for="formRadiosRighta51">
                                            2 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>
                                      <tr>
                                    <td>extra-thyroid extension</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Margin][]" id="formRadiosRighta52" value="3">
                                            <label class="form-check-label" for="formRadiosRighta52">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>

                                      <tr>
                                        <th colspan="2">Calcification (Echogenic foci)</th>
                                    </tr>
                                    <tr>
                                    <td>None / large comet-tail artifacts</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Calcification][]" id="formRadiosRighta53" value="0">
                                            <label class="form-check-label" for="formRadiosRighta53">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>
                                      <tr>
                                    <td>Macrocalcifications</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Calcification][]" value="1" id="formRadiosRighta54">
                                            <label class="form-check-label" for="formRadiosRighta54">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>
                                      <tr>
                                    <td>Peripheral (rim) calcifications</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Calcification][]" id="formRadiosRighta55" value="2">
                                            <label class="form-check-label" for="formRadiosRighta55">
                                            2 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>
                                      <tr>
                                    <td>Punctate echogenic foci</td>
                                    <td style="width:40%">
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input left_lobe_score_checkbox" type="radio" name="left_lobe_score[Calcification][]" id="formRadiosRighta56" value="3">
                                            <label class="form-check-label" for="formRadiosRighta56">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                      </tr>

                                     <tr id="TR1_LEFT" class="hidden">
                                        <th> </th>
                                        <th>TR1 (0 pts- Benign)</th>
                                    </tr>
                                    <tr id="TR2_LEFT" class="hidden">
                                        <th>  </th>
                                        <th>TR2 (2 pts- Not Suspicious)</th>
                                    </tr>
                                    <tr id="TR3_LEFT" class="hidden">
                                        <th></th>
                                        <th>TR3 (3 pts- Mildly Suspicious)</th>
                                    </tr>
                                    <tr id="TR4_LEFT" class="hidden">
                                        <th></th>
                                        <th>TR4 (4-6 pts- Moderately Suspicious)</th>
                                    </tr>
                                    <tr id="TR5_LEFT" class="hidden">
                                        <th></th>
                                        <th>TR5 (7+ pts- Highly Suspicious)</th>
                                    </tr>
                                </tbody>
                              </table>
                        </div>
                        <div class="col-lg-12">
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Retro-sternal extension  </h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Retrosternalextension[extension][]" id="formRadiosRighta63" value="YES">
                                        <label class="form-check-label" for="formRadiosRighta63">
                                        YES
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Retrosternalextension[extension][]" id="formRadiosRighta64" value="NO">
                                        <label class="form-check-label" for="formRadiosRighta64">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Enlarged Lymph nodes </h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="EnlargedLymphnodes[nodes][]" id="formRadiosRighta65" value="YES">
                                        <label class="form-check-label" for="formRadiosRighta65">
                                        YES  (TA unfaverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="EnlargedLymphnodes[nodes][]" id="formRadiosRighta66" value="NO">
                                        <label class="form-check-label" for="formRadiosRighta66">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">existing vocal cord changes / atony / paralysis </h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="paralysis[antoy][]" id="formRadiosRighta67" value="yes">
                                        <label class="form-check-label" for="formRadiosRighta67">
                                        YES
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="paralysis[antoy][]" id="formRadiosRighta68" value="no">
                                        <label class="form-check-label" for="formRadiosRighta68">
                                        No
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
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">MRI - Thyroid Protocol- Findings</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="MRCIR48[MRI][]" id="formRadiosRighta73" value="Normal">
                                <label class="form-check-label" for="formRadiosRighta73">
                                Normal
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="MRCIR48[MRI][]" id="formRadiosRighta74" value="Abnormal">
                                <label class="form-check-label" for="formRadiosRighta74">
                                Abnormal
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12" id="abnormal_a74">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate / notes here***"  name="MDT[MDTREVIEW002][]"name="MRCIR48[NOTE][]"></textarea>
                                    </div>
                                </div>
 
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>CTCIR48</h4>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">CT -  Thyroid Protocol- Findings </h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="CTCIR48[CT][]" id="formRadiosRighta75" value="Normal">
                                <label class="form-check-label" for="formRadiosRighta75">
                                Normal
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="CTCIR48[CT][]" id="formRadiosRighta76" value="Abnormal">
                                <label class="form-check-label" for="formRadiosRighta76">
                                Abnormal
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12" id="abnormal_a76">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate / notes here***"  style="height: 100px" name="CTCIR48[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                            <div class="title_head">
                                <h4>NMTHYROIDSCANCEIR78 &gt; <span class="sub_tt__">NM - Thyroid scan - Findings</span></h4>
                            </div>
                        </div>
                          
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Toxic Single Autonomous nodule (ATN) </h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="NMTHYROIDSCANCEIR78[NM][]" id="formRadiosRighta77" value="Yes">
                                <label class="form-check-label" for="formRadiosRighta77">
                                Yes
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="NMTHYROIDSCANCEIR78[NM][]" id="formRadiosRighta78" value="No">
                                <label class="form-check-label" for="formRadiosRighta78">
                                No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Toxic Multi-nodular (Hashimoto's)</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="Hashimoto[Toxic][]" id="formRadiosRighta79" value="YES">
                                <label class="form-check-label" for="formRadiosRighta79">
                                YES (TA contraindicated)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Hashimoto[Toxic][]" id="formRadiosRighta80" value="No">
                                <label class="form-check-label" for="formRadiosRighta80">
                                No
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Toxic diffuse (Graves disease)</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="diffuse[disease][]" value="YES" id="formRadiosRighta81">
                                <label class="form-check-label" for="formRadiosRighta81">
                                YES (TA contraindicated)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="diffuse[disease][]"  value="NO" id="formRadiosRighta82">
                                <label class="form-check-label" for="formRadiosRighta82">
                                No
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>NMPARATHYROIDSCANCEIR78 &gt; <span class="sub_tt__">NM -PARA Thyroid scan - Findings </span></h4>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Toxic Parathyroid Adenoma - RIGHTupper</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="NMPARATHYROIDSCANCEIR78[RIGHTupper][]" value="YES" id="formRadiosRighta83">
                                <label class="form-check-label" for="formRadiosRighta83">
                                YES 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="NMPARATHYROIDSCANCEIR78[RIGHTupper][]" value="NO" id="formRadiosRighta84">
                                <label class="form-check-label" for="formRadiosRighta84">
                                No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Toxic Parathyroid Adenoma - RIGHT lower</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="NMPARATHYROIDSCANCEIR78[RIGHTlower][]" value="YES"  id="formRadiosRighta85">
                                <label class="form-check-label" for="formRadiosRighta85">
                                YES 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="NMPARATHYROIDSCANCEIR78[RIGHTlower][]" value="NO"  id="formRadiosRighta86">
                                <label class="form-check-label" for="formRadiosRighta86">
                                No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Toxic Parathyroid Adenoma - left upper</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="NMPARATHYROIDSCANCEIR78[LEFTupper][]" value="YES" id="formRadiosRighta87">
                                <label class="form-check-label" for="formRadiosRighta87">
                                YES 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="NMPARATHYROIDSCANCEIR78[LEFTupper][]" value="NO" id="formRadiosRighta88">
                                <label class="form-check-label" for="formRadiosRighta88">
                                No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Toxic Parathyroid Adenoma - left lower</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="NMPARATHYROIDSCANCEIR78[leftlower][]" value="YES" id="formRadiosRighta89">
                                <label class="form-check-label" for="formRadiosRighta89">
                                YES 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="NMPARATHYROIDSCANCEIR78[leftlower][]" value="NO" id="formRadiosRighta90">
                                <label class="form-check-label" for="formRadiosRighta90">
                                No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>USFNATHYROIDUL320  &gt; <span class="sub_tt__">Histopath Right Thyroid nodule FNA - Findings  </span></h4>
                            </div>
                            
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Bathesda grade I-II</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="USFNATHYROIDUL320[BathesdagradeI_II][]" value="YES" id="formRadiosRighta91">
                                <label class="form-check-label" for="formRadiosRighta91">
                                YES 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="USFNATHYROIDUL320[BathesdagradeI_II][]" value="NO" id="formRadiosRighta92">
                                <label class="form-check-label" for="formRadiosRighta92">
                                No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Bathesda grade III-IV</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="USFNATHYROIDUL320[BathesdagradeIII_II][]" value="YES" id="formRadiosRighta93">
                                <label class="form-check-label" for="formRadiosRighta93">
                                YES 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="USFNATHYROIDUL320[BathesdagradeIII_II][]" value="NO" id="formRadiosRighta94">
                                <label class="form-check-label" for="formRadiosRighta94">
                               No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Bathesda grade V-VI</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="USFNATHYROIDUL320[BathesdagradeV_VI][]" value="YES"  id="formRadiosRighta95">
                                <label class="form-check-label" for="formRadiosRighta95">
                                YES (TA contraindicated)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="USFNATHYROIDUL320[BathesdagradeV_VI][]" value="NO"  id="formRadiosRighta96">
                                <label class="form-check-label" for="formRadiosRighta96">
                               No
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>USFNATHYROIDUL320  &gt; <span class="sub_tt__">Histopath Left Thyroid nodule FNA - Findings </span></h4>
                            </div>
                            
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Bathesda grade I-II</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio"  name="USFNATHYROIDUL320[BathesdagradeI_II][]" value="YES" id="formRadiosRighta97">
                                <label class="form-check-label" for="formRadiosRighta97">
                                YES 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio"  name="USFNATHYROIDUL320[BathesdagradeI_II][]" value="NO" id="formRadiosRighta98">
                                <label class="form-check-label" for="formRadiosRighta98">
                                No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Bathesda grade III-IV</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="USFNATHYROIDUL320[BathesdagradeIII_IV][]" value="YES" id="formRadiosRighta99">
                                <label class="form-check-label" for="formRadiosRighta99">
                                YES 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="USFNATHYROIDUL320[BathesdagradeIII_IV][]" value="NO" id="formRadiosRighta100">
                                <label class="form-check-label" for="formRadiosRighta100">
                               No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Bathesda grade V-VI</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="USFNATHYROIDUL320[BathesdagradeV_VI][]" value="YES" id="formRadiosRightb1">
                                <label class="form-check-label" for="formRadiosRightb1">
                                YES (TA contraindicated)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="USFNATHYROIDUL320[BathesdagradeV_VI][]" value="NO" id="formRadiosRightb2">
                                <label class="form-check-label" for="formRadiosRightb2">
                               No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>USFNATHYROIDBL380   &gt; <span class="sub_tt__">Histopath Right Thyroid nodule FNA - Findings  </span></h4>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Bathesda grade I-II</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="USFNATHYROIDBL380[rightBathesdagradeI_II][]" value="YES" id="formRadiosRightb3">
                                <label class="form-check-label" for="formRadiosRightb3">
                                YES 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="USFNATHYROIDBL380[rightBathesdagradeI_II][]" value="NO" id="formRadiosRightb4">
                                <label class="form-check-label" for="formRadiosRightb4">
                                No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Bathesda grade III-IV</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="USFNATHYROIDBL380[rightBathesdagradeIII_IV][]" value="YES" id="formRadiosRightb5">
                                <label class="form-check-label" for="formRadiosRightb5">
                                YES 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="USFNATHYROIDBL380[rightBathesdagradeIII_IV][]" value="NO" id="formRadiosRightb6">
                                <label class="form-check-label" for="formRadiosRightb6">
                               No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Bathesda grade V-VI</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="USFNATHYROIDBL380[rightBathesdagradeV_VI][]" value="YES" id="formRadiosRightb7">
                                <label class="form-check-label" for="formRadiosRightb7">
                                YES (TA contraindicated)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="USFNATHYROIDBL380[rightBathesdagradeV_VI][]" value="NO" id="formRadiosRightb8">
                                <label class="form-check-label" for="formRadiosRightb8">
                               No
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>USFNATHYROIDBL380   &gt; <span class="sub_tt__">Histopath Left Thyroid nodule FNA - Findings  </span></h4>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Bathesda grade I-II</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="USFNATHYROIDBL380[leftBathesdagradeI_II][]" value="YES" id="formRadiosRightb9">
                                <label class="form-check-label" for="formRadiosRightb9">
                                YES 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="USFNATHYROIDBL380[leftBathesdagradeI_II][]" value="NO" id="formRadiosRightb10">
                                <label class="form-check-label" for="formRadiosRightb10">
                                No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Bathesda grade III-IV</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="USFNATHYROIDBL380[leftBathesdagradeIII_IV][]" value="YES" id="formRadiosRightb11">
                                <label class="form-check-label" for="formRadiosRightb11">
                                YES 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="USFNATHYROIDBL380[leftBathesdagradeIII_IV][]" value="NO" id="formRadiosRightb12">
                                <label class="form-check-label" for="formRadiosRightb12">
                               No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Bathesda grade V-VI</h6>
                        </div>  
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="USFNATHYROIDBL380[leftBathesdagradeV_VI][]" value="YES" id="formRadiosRightb13">
                                <label class="form-check-label" for="formRadiosRightb13">
                                YES (TA contraindicated)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="USFNATHYROIDBL380[leftBathesdagradeV_VI][]" value="NO" id="formRadiosRightb14">
                                <label class="form-check-label" for="formRadiosRightb14">
                               No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="section_title__">Image Annotation</h6>
                            <div class="title_head">
                                <h4>Annotate Thyroid / Parathyroid findings</h4>
                            </div>
                          <!-- <h6 class="mb-3 lut_title">Calculate TI-RARDS - RIGHT LOBE score</h6> -->
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
                              <h6 class="section_title__">Lab</h6>
                              <div class="title_head">
                                <h4>LABTFT39   &gt; <span class="sub_tt__">TFT Results </span></h4>
                            </div>
                             </div>
                             <div class="col-lg-3">
                          <h6 class="mb-3 lut_title">TSH</h6>
                        </div>  
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="Lab[LABTFT39_TFT_RESULTS_TSH][]" value="NORMAL" id="formRadiosRightb15">
                                <label class="form-check-label" for="formRadiosRightb15">
                                Normal
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[LABTFT39_TFT_RESULTS_TSH][]" value="HIGH" id="formRadiosRightb16">
                                <label class="form-check-label" for="formRadiosRightb16">
                                High
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[LABTFT39_TFT_RESULTS_TSH][]" value="LOW" id="formRadiosRightb17">
                                <label class="form-check-label" for="formRadiosRightb17">
                                Low
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                          <h6 class="mb-3 lut_title">T4</h6>
                        </div>  
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="Lab[LABTFT39_TFT_RESULTS_T4][]" value="NORMAL" id="formRadiosRightb18">
                                <label class="form-check-label" for="formRadiosRightb18">
                                Normal
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[LABTFT39_TFT_RESULTS_T4][]" value="HIGH" id="formRadiosRightb19">
                                <label class="form-check-label" for="formRadiosRightb19">
                                High
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[LABTFT39_TFT_RESULTS_T4][]" value="LOW" id="formRadiosRightb20">
                                <label class="form-check-label" for="formRadiosRightb20">
                                Low
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                              <div class="title_head">
                                <h4>LABPTFT39   &gt; <span class="sub_tt__">PTFT Results </span></h4>
                            </div>
                         </div>

                             <div class="col-lg-3">
                          <h6 class="mb-3 lut_title">PTH</h6>
                        </div>  
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="Lab[LABTFT39_PTFT_RESULTS_PTH][]" value="NORMAL" id="formRadiosRightb21">
                                <label class="form-check-label" for="formRadiosRightb21">
                                Normal
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[LABTFT39_PTFT_RESULTS_PTH][]" value="HIGH" id="formRadiosRightb22">
                                <label class="form-check-label" for="formRadiosRightb22">
                                High
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[LABTFT39_PTFT_RESULTS_PTH][]" value="LOW" id="formRadiosRightb23">
                                <label class="form-check-label" for="formRadiosRightb23">
                                Low
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-3">
                          <h6 class="mb-3 lut_title">Ca+</h6>
                        </div>  
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="Lab[LABTFT39_PTFT_RESULTS_Ca][]" value="NORMAL" id="formRadiosRightb24">
                                <label class="form-check-label" for="formRadiosRightb24">
                                Normal
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[LABTFT39_PTFT_RESULTS_Ca][]" value="HIGH" id="formRadiosRightb25">
                                <label class="form-check-label" for="formRadiosRightb25">
                                High
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[LABTFT39_PTFT_RESULTS_Ca][]" value="LOW" id="formRadiosRightb26">
                                <label class="form-check-label" for="formRadiosRightb26">
                                Low
                                </label>
                            </div>
                        </div>
                             
                        <div class="col-lg-12">
                              <div class="title_head">
                                <h4>LABTHYROIDANTIBODY390   &gt; <span class="sub_tt__">Anti-thyroid antibodies tests results</span></h4>
                            </div>
                         </div>
                         
                        <div class="col-lg-3">
                          <h6 class="mb-3 lut_title">Hashimotos thyroditis (TPOAb)</h6>
                        </div>  
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="Lab[LABTHYROIDANTIBODY390testsresults][]" value="HIGH" id="formRadiosRightb27">
                                <label class="form-check-label" for="formRadiosRightb27">
                                High (TA contraindicated)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[LABTHYROIDANTIBODY390testsresults][]" value="LOW" id="formRadiosRightb28">
                                <label class="form-check-label" for="formRadiosRightb28">
                                low
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[LABTHYROIDANTIBODY390testsresults][]" value="N/A" id="formRadiosRightb29">
                                <label class="form-check-label" for="formRadiosRightb29">
                                N/A
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                          <h6 class="mb-3 lut_title">Graves disease (TSAb / TPOAb)</h6>
                        </div>  
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="Lab[LABTHYROIDANTIBODY390GravesdiseaseTPOAb][]" value="HIGH" id="formRadiosRightb30">
                                <label class="form-check-label" for="formRadiosRightb30">
                                High (TA contraindicated)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[LABTHYROIDANTIBODY390GravesdiseaseTPOAb][]" value="LOW" id="formRadiosRightb32">
                                <label class="form-check-label" for="formRadiosRightb32">
                                low
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[LABTHYROIDANTIBODY390GravesdiseaseTPOAb][]" value="N/A" id="formRadiosRightb33">
                                <label class="form-check-label" for="formRadiosRightb33">
                                N/A
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                          <h6 class="mb-3 lut_title">Graves disease / Atrophic thyroditis (TBAb)</h6>
                        </div>  
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3" >
                                <input class="form-check-input"type="radio" name="Lab[LABTHYROIDANTIBODY390GravesdiseaseTBAb][]" value="HIGH" id="formRadiosRightb34">
                                <label class="form-check-label" for="formRadiosRightb34">
                                High (TA contraindicated)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[LABTHYROIDANTIBODY390GravesdiseaseTBAb][]" value="LOW" id="formRadiosRightb35">
                                <label class="form-check-label" for="formRadiosRightb35">
                                low
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[LABTHYROIDANTIBODY390GravesdiseaseTBAb][]" value="N?A" id="formRadiosRightb36">
                                <label class="form-check-label" for="formRadiosRightb36">
                                N/A
                                </label>
                            </div>
                        </div>
                             
                             
                             
                             
                             
                            
                        <div class="col-lg-12">
                          <h6 class="section_title__">MDT</h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>MDTREVIEW00 &#62; <span class="sub_tt__">THYROID MDT outcome</span></h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">MDT decision</h6>
                        </div>
                        <div class="col-lg-12">
                        <div class="row align-items-center">
                     
                                    <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="MDT[MDTOPTION][]" value="TTA" id="formRadiosRight84">
                                        <label class="form-check-label" for="formRadiosRight84">
                                        TTA
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="MDT[MDTOPTION][]" value="TE" id="formRadiosRight85">
                                        <label class="form-check-label" for="formRadiosRight85">
                                        TE
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="MDT[MDTOPTION][]" value="Surgical" id="formRadiosRight86">
                                        <label class="form-check-label" for="formRadiosRight86">
                                        Surgical
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="MDT[MDTOPTION][]" value="Other options" id="formRadiosRight87">
                                        <label class="form-check-label" for="formRadiosRight87">
                                        Other options
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_84">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate TTA / notes here***"  style="height: 100px" name="MDT[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_85">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate TE / notes here***"  style="height: 100px" name="MDT[NOTE][]"></textarea>
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
                                        <input class="form-check-input" type="radio" name="elegibility_status[status][]" value="THYROID THERMAL ABLATION  (TTA)" id="formRadiosRight90">
                                        <label class="form-check-label" for="formRadiosRight90">
                                        THYROID THERMAL ABLATION  (TTA)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3 ">
                                        <input class="form-check-input" type="radio" name="elegibility_status[status][]" value="PARATHYROID THERMAL ABLATION  PTTA " id="formRadiosRight91">
                                        <label class="form-check-label" for="formRadiosRight91">
                                        PARATHYROID THERMAL ABLATION  PTTA 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3 ">
                                        <input class="form-check-input" type="radio" name="elegibility_status[status][]" value="THYROID EMBOLIZATION  TE" id="formRadiosRight92">
                                        <label class="form-check-label" for="formRadiosRight92">
                                        THYROID EMBOLIZATION  TE 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="elegibility_status[status][]" value="OTHERS" id="formRadiosRight93">
                                        <label class="form-check-label" for="formRadiosRight93">
                                        OTHERS
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_90">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate     THYROID THERMAL ABLATION  (TTA) / notes here***"  style="height: 100px" name="elegibility_status[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_91">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate   PARATHYROID THERMAL ABLATION  PTTA  / notes here***"  style="height: 100px" name="elegibility_status[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_92">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate  THYROID EMBOLIZATION  TE / notes here***"  style="height: 100px" name="elegibility_status[NOTE][]"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_93">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate OTHERS/ notes here***"  style="height: 100px" name="elegibility_status[NOTE][]"></textarea>
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
                                        <input class="form-check-input"type="checkbox" name="Intervention[USTTAUL2180][]" value="USTTAUL2180" id="formRadiosRightb37">
                                            <label class="form-check-label" for="formRadiosRightb37">
                                            USTTAUL2180
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Intervention[USTTABL2470][]" value="USTTABL2470" id="formRadiosRightb38">
                                            <label class="form-check-label" for="formRadiosRightb38">
                                            USTTABL2470
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Intervention[LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightb39">
                                            <label class="form-check-label" for="formRadiosRightb39">
                                            LABPREIRBASIC32
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Intervention[LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightb40">
                                            <label class="form-check-label" for="formRadiosRightb40">
                                            LABPREIRSAFETY17
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Intervention[ANGIOTE2910][]" value="ANGIOTE2910" id="formRadiosRightb41">
                                            <label class="form-check-label" for="formRadiosRightb41">
                                            ANGIOTE2910
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Intervention[LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightb42">
                                            <label class="form-check-label" for="formRadiosRightb42">
                                            LABPREANGIO48
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Intervention[LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightb43">
                                            <label class="form-check-label" for="formRadiosRightb43">
                                            LABPREIRSAFETY17
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Intervention[IVSEDATION270][]" value="IVSEDATION270" id="formRadiosRightb44">
                                            <label class="form-check-label" for="formRadiosRightb44">
                                            IVSEDATION270
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
                                        <input class="form-check-input"type="checkbox" name="Supportive[IVVITATHYROID175][]"  value="IVVITATHYROID175" id="formRadiosRightb45">
                                            <label class="form-check-label" for="formRadiosRightb45">
                                            IVVITATHYROID175
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Supportive[LABPREIVBASIC52][]" value="LABPREIVBASIC52"  id="formRadiosRightb46">
                                            <label class="form-check-label" for="formRadiosRightb46">
                                            LABPREIVBASIC52
                                            </label>    
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="Supportive[LABPREIVADVANCED230][]" value="LABPREIVADVANCED230"  id="formRadiosRightb47">
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
                                    <input class="form-check-input" type="radio" name="Referral[HCREFFERAL][]" value="Endocrinology" id="formRadiosRightb48">
                                    <label class="form-check-label" for="formRadiosRightb48">
                                    Endocrinology
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3 ">
                                    <input class="form-check-input" type="radio" name="Referral[HCREFFERAL][]" value="ENT / Head and Neck surgery" id="formRadiosRightb49">
                                    <label class="form-check-label" for="formRadiosRightb49">
                                    ENT / Head and Neck surgery
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3 ">
                                    <input class="form-check-input" type="radio" name="Referral[HCREFFERAL][]" value="NM Radio-Active iodine Ablation" id="formRadiosRightb50">
                                    <label class="form-check-label" for="formRadiosRightb50">
                                    NM Radio-Active iodine Ablation
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Referral[HCREFFERAL][]" value=" Head & Neck Rehab/PhysioTherapy" id="formRadiosRightb51">
                                    <label class="form-check-label" for="formRadiosRightb51">
                                    Head & Neck Rehab/PhysioTherapy
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Referral[HCREFFERAL][]" value="Others" id="formRadiosRightb52">
                                    <label class="form-check-label" for="formRadiosRightb52">
                                    Others
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_b48">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate  Endocrinology / notes here***"  style="height: 100px" name="Referral[NOTE][]"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_b49">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate   ENT / Head and Neck surgery   / notes here***"  style="height: 100px" name="Referral[NOTE][]"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_b50">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate NM Radio-Active iodine Ablation  / notes here***"  style="height: 100px" name="Referral[NOTE][]"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_b51">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate Head & Neck Rehab/PhysioTherapy / notes here***"  style="height: 100px" name="Referral[NOTE][]"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_b52">
                                <div class="form-check form-check-right mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate OTHERS / notes here***"  style="height: 100px" name="Referral[NOTE][]"></textarea>
                                </div>
                            </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
          </div>
            
          <div class="action_btns">
            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient draft_btn">SAVE DRAFT</a>
            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">SAVE FINAL</button>
          </div>
          </form>
        </div>
    </div>
</div>








    @push('custom-js')
      
<script>
    $(document).ready(function(){
        $("#abnormal_a74").hide();
        $("#formRadiosRighta74").click(function(){
            $("#abnormal_a74").show();
        });
        $("#formRadiosRighta73").click(function(){
            $("#abnormal_a74").hide();
        });

        $("#abnormal_a76").hide();
        $("#formRadiosRighta76").click(function(){
            $("#abnormal_a76").show();
        });
        $("#formRadiosRighta75").click(function(){
            $("#abnormal_a76").hide();
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
        // end here sysmtoms scrore calculation

        $('.right_lobe_score_checkbox').click(function(){

       
const checkboxes = document.querySelectorAll('input[type="radio"].right_lobe_score_checkbox');

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
    }else if (totalPoints >= 4 && totalPoints <=6) {
        TR4_RIGHT.classList.remove('hidden');
    }
    else if (totalPoints >= 7 && totalPoints <=60000) {
        TR5_RIGHT.classList.remove('hidden');
    }

}
});// end here right_lobe_score_checkbox

$('.left_lobe_score_checkbox').click(function(){

       
const checkboxes = document.querySelectorAll('input[type="radio"].left_lobe_score_checkbox');

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
    }else if (totalPoints >= 4 && totalPoints <=6) {
        TR4_LEFT.classList.remove('hidden');
    }
    else if (totalPoints >= 7 && totalPoints <=60000) {
        TR5_LEFT.classList.remove('hidden');
    }

}
});// end here left_lobe_score_checkbox



    });
</script>
    @endpush
@endsection

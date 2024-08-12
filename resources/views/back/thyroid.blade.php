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
                <form id="storeThyroidEligibilityForms" method="POST" action="{{ route('user.storeThyroidEligibilityForms') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ @$patient_id }}" />
                    <input type="hidden" name="form_type" value="thyroid_form"/>

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
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Thyroidnodule][]" id="formRadiosRight1"
                                                value="Thyroid nodule">
                                            <label class="form-check-label" for="formRadiosRight1">
                                                Thyroid nodule
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[MultiNodularGoitre][]" id="formRadiosRight2"
                                                value="Multi-Nodular Goitre">
                                            <label class="form-check-label" for="formRadiosRight2">
                                                Multi-Nodular Goitre
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ThyroidCyst][]" id="formRadiosRight3"
                                                value="Thyroid Cyst">
                                            <label class="form-check-label" for="formRadiosRight3">
                                                Thyroid Cyst
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Euothyroid][]" id="formRadiosRight4"
                                                value="Euothyroid">
                                            <label class="form-check-label" for="formRadiosRight4">
                                                Euothyroid
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Hypothyroidism][]" id="formRadiosRight5"
                                                value="Hypothyroidism">
                                            <label class="form-check-label" for="formRadiosRight5">
                                                Hypothyroidism
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Thyrotoxicosis][]" id="formRadiosRight6"
                                                value="Thyrotoxicosis">
                                            <label class="form-check-label" for="formRadiosRight6">
                                                Thyrotoxicosis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[GraveDisease][]" id="formRadiosRight7"
                                                value="Grave’s Disease">
                                            <label class="form-check-label" for="formRadiosRight7">
                                                Grave’s Disease
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LymphocyticThyroiditis][]" id="formRadiosRighta1"
                                                value="Lymphocytic Thyroiditis ">
                                            <label class="form-check-label" for="formRadiosRighta1">
                                                Lymphocytic Thyroiditis
                                            </label>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 " id="diagnosis_general_checkbox">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ThyroidCarcinoma][]" id="formRadiosRighta2"
                                                value="Thyroid Carcinoma">
                                            <label class="form-check-label" for="formRadiosRighta2">
                                                Thyroid Carcinoma
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="dynamic_checkbox_container" class="row">

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
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[C73][]"
                                                id="formRadiosRight8" value="C73 Malignant neoplasm of thyroid gland">
                                            <label class="form-check-label" for="formRadiosRight8">
                                                C73 Malignant neoplasm of thyroid gland
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D34][]"
                                                id="formRadiosRight9" value="D34 Benign neoplasm of thyroid gland">
                                            <label class="form-check-label" for="formRadiosRight9">
                                                D34 Benign neoplasm of thyroid gland
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E03][]"
                                                id="formRadiosRight10" value="E03 Other hypothyroidism">
                                            <label class="form-check-label" for="formRadiosRight10">
                                                E03 Other hypothyroidism
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E034][]"
                                                id="formRadiosRight11" value="E03.4 Atrophy of thyroid (acquired)">
                                            <label class="form-check-label" for="formRadiosRight11">
                                                E03.4 Atrophy of thyroid (acquired)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E039][]"
                                                id="formRadiosRight12" value="E03.9 Hypothyroidism, unspecified">
                                            <label class="form-check-label" for="formRadiosRight12">
                                                E03.9 Hypothyroidism, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E041][]"
                                                id="formRadiosRight13" value="E04.1 Nontoxic single thyroid nodule">
                                            <label class="form-check-label" for="formRadiosRight13">
                                                E04.1 Nontoxic single thyroid nodule
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E049][]"
                                                id="formRadiosRighta3" value="E04.9 Nontoxic goitre, unspecified">
                                            <label class="form-check-label" for="formRadiosRighta3">
                                                E04.9 Nontoxic goitre, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E05][]"
                                                value="E05 Thyrotoxicosis [hyperthyroidism] " id="formRadiosRighta4">
                                            <label class="form-check-label" for="formRadiosRighta4">
                                                E05 Thyrotoxicosis [hyperthyroidism]
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E051][]"
                                                id="formRadiosRighta5"
                                                value="E05.1 Thyrotoxicosis with toxic single Thyroid nodule">
                                            <label class="form-check-label" for="formRadiosRighta5">
                                                E05.1 Thyrotoxicosis with toxic single Thyroid nodule
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E052][]"
                                                id="formRadiosRighta6"
                                                value="E05.2 Thyrotoxicosis with toxic multinodular goitre">
                                            <label class="form-check-label" for="formRadiosRighta6">
                                                E05.2 Thyrotoxicosis with toxic multinodular goitre
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E055][]"
                                                id="formRadiosRighta7" value="E05.5 Thyroid crisis or storm">
                                            <label class="form-check-label" for="formRadiosRighta7">
                                                E05.5 Thyroid crisis or storm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E06][]"
                                                id="formRadiosRighta8" value="E06 Thyroiditis">
                                            <label class="form-check-label" for="formRadiosRighta8">
                                                E06 Thyroiditis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E060][]"
                                                id="formRadiosRighta9" value="E06.0 Acute thyroiditis">
                                            <label class="form-check-label" for="formRadiosRighta9">
                                                E06.0 Acute thyroiditis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E061][]"
                                                id="formRadiosRighta10" value="E06.1 Subacute thyroiditis">
                                            <label class="form-check-label" for="formRadiosRighta10">
                                                E06.1 Subacute thyroiditis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E062][]"
                                                id="formRadiosRighta11"
                                                value="E06.2 Chronic thyroiditis with transient thyrotoxicosis">
                                            <label class="form-check-label" for="formRadiosRighta11">
                                                E06.2 Chronic thyroiditis with transient thyrotoxicosis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E063][]"
                                                id="formRadiosRighta12" value="E06.3 Autoimmune thyroiditis">
                                            <label class="form-check-label" for="formRadiosRighta12">
                                                E06.3 Autoimmune thyroiditis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E064][]"
                                                id="formRadiosRighta13" value="E06.4 Drug-induced thyroiditis">
                                            <label class="form-check-label" for="formRadiosRighta13">
                                                E06.4 Drug-induced thyroiditis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E065][]"
                                                id="formRadiosRighta14" value="E06.5 Other chronic thyroiditis ">
                                            <label class="form-check-label" for="formRadiosRighta14">
                                                E06.5 Other chronic thyroiditis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E069][]"
                                                id="formRadiosRighta15" value="E06.9 Thyroiditis, unspecified">
                                            <label class="form-check-label" for="formRadiosRighta15">
                                                E06.9 Thyroiditis, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E07][]"
                                                id="formRadiosRighta24" value="E07 Disorders of thyroid gland">
                                            <label class="form-check-label" for="formRadiosRighta24">
                                                E07 Disorders of thyroid gland
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E209][]"
                                                id="formRadiosRighta16"
                                                value="E20.9 Hypoparathyroidism, unspecified Parathyroid tetany">
                                            <label class="form-check-label" for="formRadiosRighta16">
                                                E20.9 Hypoparathyroidism, unspecified Parathyroid tetany
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[E210][]"
                                                id="formRadiosRighta17"
                                                value="E21.0 Primary hyperparathyroidism Hyperplasia of parathyroid">
                                            <label class="form-check-label" for="formRadiosRighta17">
                                                E21.0 Primary hyperparathyroidism Hyperplasia of parathyroid
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_cid[Disorderofparathyroidglandunspecified][]"
                                                id="formRadiosRighta18"
                                                value="E21.5 Disorder of parathyroid gland, unspecified ">
                                            <label class="form-check-label" for="formRadiosRighta18">
                                                E21.5 Disorder of parathyroid gland, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_cid[Disordersofthyroidglandindiseasesclassifiedelsewhere][]"
                                                id="formRadiosRighta19"
                                                value="E35.0 Disorders of thyroid gland in diseases classified elsewhere">
                                            <label class="form-check-label" for="formRadiosRighta19">
                                                E35.0 Disorders of thyroid gland in diseases classified elsewhere
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_cid[Postproceduralhypothyroidism][]"
                                                id="formRadiosRighta20" value="E89.0 Postprocedural hypothyroidism">
                                            <label class="form-check-label" for="formRadiosRighta20">
                                                E89.0 Postprocedural hypothyroidism
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_cid[Thyroidhormonesandsubstitutes][]"
                                                id="formRadiosRighta21 " value="Y42.1 Thyroid hormones and substitutes">
                                            <label class="form-check-label" for="formRadiosRighta21">
                                                Y42.1 Thyroid hormones and substitutes
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_cid[Antithyroiddrugs][]" id="formRadiosRighta22"
                                                value="Y42.2 Antithyroid drugs">
                                            <label class="form-check-label" for="formRadiosRighta22">
                                                Y42.2 Antithyroid drugs
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="Postpartum_thyroiditis">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_cid[Postpartumthyroiditis][]" id="formRadiosRighta23"
                                                value="090.5 Postpartum thyroiditis">
                                            <label class="form-check-label" for="formRadiosRighta23">
                                                090.5 Postpartum thyroiditis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="dynamic_checkbox_container_cid" class="row">

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
                                                        value="Disfiguring Neck mass">
                                                    <label class="form-check-label" for="sym_a1">
                                                        Disfiguring Neck mass
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
                                                        name="symptoms[1][0]" id="sym_a2" value="Dyspnea / SOB">
                                                    <label class="form-check-label" for="sym_a2">
                                                        Dyspnea / SOB
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
                                                        name="symptoms[2][0]" value="Dysphagia">
                                                    <label class="form-check-label" for="sym_a3">
                                                        Dysphagia
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
                                                        value="Hoarse altered voice">
                                                    <label class="form-check-label" for="sym_a4">
                                                        Hoarse altered voice
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
                                                        name="symptoms[4][0]" id="sym_a5" value="Head / Neck pain">
                                                    <label class="form-check-label" for="sym_a5">
                                                        Head / Neck pain
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
                                                        name="symptoms[5][0]" id="sym_a6" value="Sleep disturbance">
                                                    <label class="form-check-label" for="sym_a6">
                                                        Sleep disturbance
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
                                                        name="symptoms[6][0]" value="Exophthalmos"
                                                        id="sym_a7">
                                                    <label class="form-check-label" for="sym_a7">
                                                        Exophthalmos
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
                                                        value="Palpitations">
                                                    <label class="form-check-label" for="sym_a8">
                                                        Palpitations
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
                                                        name="symptoms[8][0]" id="sym_a9" value="Sweating">
                                                    <label class="form-check-label" for="sym_a9">
                                                        Sweating
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
                                                        name="symptoms[9][0]" id="sym_a10" value="Anxiety">
                                                    <label class="form-check-label" for="sym_a10">
                                                        Anxiety
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
                                                        name="symptoms[10][0]" id="sym_a11" value="Tremor">
                                                    <label class="form-check-label" for="sym_a11">
                                                        Tremor
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[10][1]">
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
                                                            name="symptoms[10][2]">
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px"name="symptoms[10][3]"></textarea>
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
                                                        name="symptoms[11][0]" id="sym_a12" value="Hair loss">
                                                    <label class="form-check-label" for="sym_a12">
                                                        Hair loss
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[11][1]">
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
                                                            name="symptoms[11][2]">
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[11][3]"></textarea>
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
                                                        name="symptoms[12][0]" id="sym_a13" value="Lethargy">
                                                    <label class="form-check-label" for="sym_a13">
                                                        Lethargy
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[12][1]">
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
                                                            name="symptoms[12][2]">
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[12][3]"></textarea>
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
                                                        name="symptoms[13][0]" id="sym_a14" value="Fatigue">
                                                    <label class="form-check-label" for="sym_a14">
                                                        Fatigue
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px"name="symptoms[13][3]"></textarea>
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
                                                        name="symptoms[14][0]" id="sym_a15"
                                                        value="Cold intolerance">
                                                    <label class="form-check-label" for="sym_a15">
                                                        Cold intolerance
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[14][1]">
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
                                                            name="symptoms[14][2]">
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[14][3]"></textarea>
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
                                                        name="symptoms[15][0]" id="sym_a16"
                                                        value="Weight gain">
                                                    <label class="form-check-label" for="sym_a16">
                                                        Weight gain
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[15][1]">
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
                                                            name="symptoms[15][2]">
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[15][3]"></textarea>
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
                                                        name="symptoms[16][0]" value="Altered mood"
                                                        id="sym_a17">
                                                    <label class="form-check-label" for="sym_a17">
                                                        Altered mood
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[16][1]">
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
                                                            name="symptoms[16][2]">
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[16][3]"></textarea>
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
                                            <h4>Thyroid Compressive symptoms score (TCSS)</h4>
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
                                                    <td>Disfiguring Neck mass </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Disfiguring][]"
                                                                id="formRadiosRight14" value="0">
                                                            <label class="form-check-label" for="formRadiosRight14">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Disfiguring][]"
                                                                id="formRadiosRight15" value="1">
                                                            <label class="form-check-label" for="formRadiosRight15">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Disfiguring][]"
                                                                id="formRadiosRight16" value="3">
                                                            <label class="form-check-label" for="formRadiosRight16">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Disfiguring][]"
                                                                id="formRadiosRight17" value="5">
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
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dyspnea][]"
                                                                id="formRadiosRight18" value="0">
                                                            <label class="form-check-label" for="formRadiosRight18">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dyspnea][]"
                                                                id="formRadiosRight19" value="1">
                                                            <label class="form-check-label" for="formRadiosRight19">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dyspnea][]"
                                                                id="formRadiosRight20" value="3">
                                                            <label class="form-check-label" for="formRadiosRight20">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dyspnea][]"
                                                                id="formRadiosRight21" value="5">
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
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dysphagia][]"
                                                                id="formRadiosRight22" value="0">
                                                            <label class="form-check-label" for="formRadiosRight22">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dysphagia][]"
                                                                id="formRadiosRight23" value="1">
                                                            <label class="form-check-label" for="formRadiosRight23">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dysphagia][]"
                                                                id="formRadiosRight24" value="3">
                                                            <label class="form-check-label" for="formRadiosRight24">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dysphagia][]"
                                                                id="formRadiosRight25" value="5">
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
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Hoarsealteredvoice][]"
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
                                                                name="symptoms_score[Hoarsealteredvoice][]"
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
                                                                name="symptoms_score[Hoarsealteredvoice][]"
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
                                                                name="symptoms_score[Hoarsealteredvoice][]"
                                                                id="formRadiosRight29" value="5">
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
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Neckpain][]"
                                                                id="formRadiosRight30" value="0">
                                                            <label class="form-check-label" for="formRadiosRight30">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Neckpain][]"
                                                                id="formRadiosRight31" value="1">
                                                            <label class="form-check-label" for="formRadiosRight31">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Neckpain][]"
                                                                id="formRadiosRight32" value="3">
                                                            <label class="form-check-label" for="formRadiosRight32">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Neckpain][]"
                                                                id="formRadiosRight33" value="5">
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
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Sleepdisturbance][]"
                                                                id="formRadiosRight34" value="0">
                                                            <label class="form-check-label" for="formRadiosRight34">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Sleepdisturbance][]"
                                                                id="formRadiosRight35" value="1">
                                                            <label class="form-check-label" for="formRadiosRight35">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Sleepdisturbance][]"
                                                                id="formRadiosRight36" value="3">
                                                            <label class="form-check-label" for="formRadiosRight36">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Sleepdisturbance][]"
                                                                id="formRadiosRight37" value="5">
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
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Exophthalmos][]"
                                                                id="formRadiosRight38" value="0">
                                                            <label class="form-check-label" for="formRadiosRight38">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Exophthalmos][]"
                                                                id="formRadiosRight39" value="1">
                                                            <label class="form-check-label" for="formRadiosRight39">
                                                                1 pts ( 1 time)
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Exophthalmos][]"
                                                                id="formRadiosRight40" value="3">
                                                            <label class="form-check-label" for="formRadiosRight40">
                                                                3 pts (3 times)
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Exophthalmos][]"
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
                                                <h6 class="mb-3 lut_title">hyper-Toxic symptoms: Palpitations | Sweating |
                                                    Anxiety | tremor | weight loss | hair loss </h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Palpitations][]" id="formRadiosRight42"
                                                        value="YES">
                                                    <label class="form-check-label" for="formRadiosRight42">
                                                        YES (TA unfaverable unless ATN)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Palpitations][]" id="formRadiosRight43"
                                                        value="No">
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
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Carbimazole][]" id="formRadiosRight44"
                                                        value="YES">
                                                    <label class="form-check-label" for="formRadiosRight44">
                                                        YES (TA unfaverable unless ATN)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Carbimazole][]" id="formRadiosRight45"
                                                        value="No">
                                                    <label class="form-check-label" for="formRadiosRight45">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Hypo-thyroid symptoms: lethargy | Fatigue |
                                                    cold intolerance | weight gain | altered mood</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="clinical_indicator[lethargy][]" id="formRadiosRight46"
                                                        value="Yes">
                                                    <label class="form-check-label" for="formRadiosRight46">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="clinical_indicator[lethargy][]" id="formRadiosRight47"
                                                        value="No">
                                                    <label class="form-check-label" for="formRadiosRight47">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Thyroid hormone replacement (e.g. Thyroxine)
                                                </h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="clinical_indicator[Thyroxine][]" id="formRadiosRight46"
                                                        value="YES">
                                                    <label class="form-check-label" for="formRadiosRight48">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="clinical_indicator[Thyroxine][]" id="formRadiosRight47"
                                                        value="NO">
                                                    <label class="form-check-label" for="formRadiosRight49">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Clinical Exam 
                                            {{-- <a href="javascript:void(0)"
                                                class="order-now_btn order-now_btn_alt">Order Now <i
                                                    class="fa-solid fa-arrow-right-long"></i></a> --}}
                                                </h6>
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
                                        <h6 class="section_title__">Imaging 
                                            {{-- <a href="javascript:void(0)"
                                                class="order-now_btn order-now_btn_alt">Order Now <i
                                                    class="fa-solid fa-arrow-right-long"></i></a> --}}
                                                </h6>
                                        <div class="title_head">
                                            <h4>USTHYROIDACRTIRADS70 </h4>
                                        </div>
                                        <!-- <h6 class="mb-3 lut_title">Calculate TI-RARDS - RIGHT LOBE score</h6> -->
                                    </div>

                                    <div class="col-lg-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="5" class="top_header_frm_tb">Calculate TI-RARDS -
                                                        RIGHT LOBE score</th>
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Composition][]"
                                                                id="formRadiosRighta25" value="0">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Composition][]"
                                                                id="formRadiosRighta26" value="0">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Composition][]"
                                                                id="formRadiosRighta27" value="1">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Composition][]"
                                                                id="formRadiosRighta28" value="2">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Echogenisity][]"
                                                                id="formRadiosRighta29" value="0">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Echogenisity][]"
                                                                id="formRadiosRighta30" value="1">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Echogenisity][]"
                                                                id="formRadiosRighta31" value="2">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Echogenisity][]"
                                                                id="formRadiosRighta32" value="2">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Shape][]"
                                                                id="formRadiosRighta33" value="0">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="checkbox" name="right_lobe_score[Shape][]"
                                                                id="formRadiosRighta34" value="3">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Margin][]"
                                                                id="formRadiosRighta35" value="0">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Margin][]"
                                                                id="formRadiosRighta36" value="0">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Margin][]"
                                                                id="formRadiosRighta37" value="2">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Margin][]"
                                                                id="formRadiosRighta57" value="3">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Calcification][]"
                                                                id="formRadiosRighta58" value="0">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Calcification][]"
                                                                id="formRadiosRighta59" value="1">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Calcification][]"
                                                                id="formRadiosRighta60" value="2">
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
                                                            <input class="form-check-input right_lobe_score_checkbox"
                                                                type="radio" name="right_lobe_score[Calcification][]"
                                                                id="formRadiosRighta61" value="3">
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
                                                    <th> </th>
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
                                                    <th colspan="5" class="top_header_frm_tb">Calculate TI-RARDS -
                                                        LEFT LOBE score</th>
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Composition][]"
                                                                id="formRadiosRighta39" value="0">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Composition][]"
                                                                id="formRadiosRighta40" value="0">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Composition][]"
                                                                id="formRadiosRighta41" value="1">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Composition][]"
                                                                id="formRadiosRighta42" value="2">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Echogenisity][]"
                                                                id="formRadiosRighta43" value="0">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Echogenisity][]"
                                                                id="formRadiosRighta44" value="1">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Echogenisity][]"
                                                                id="formRadiosRighta45" value="2">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Echogenisity][]"
                                                                id="formRadiosRighta46" value="2">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Shape][]"
                                                                id="formRadiosRighta47" value="0">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Shape][]"
                                                                id="formRadiosRighta48" value="3">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Margin][]"
                                                                id="formRadiosRighta49" value="0">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Margin][]"
                                                                id="formRadiosRighta50" value="0">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Margin][]"
                                                                id="formRadiosRighta51" value="2">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Margin][]"
                                                                id="formRadiosRighta52" value="3">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Calcification][]"
                                                                id="formRadiosRighta53" value="0">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Calcification][]"
                                                                value="1" id="formRadiosRighta54">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Calcification][]"
                                                                id="formRadiosRighta55" value="2">
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
                                                            <input class="form-check-input left_lobe_score_checkbox"
                                                                type="radio" name="left_lobe_score[Calcification][]"
                                                                id="formRadiosRighta56" value="3">
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
                                                    <th> </th>
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
                                                <h6 class="mb-3 lut_title">Retro-sternal extension </h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="Retrosternalextension[extension][]"
                                                        id="formRadiosRighta63" value="YES">
                                                    <label class="form-check-label" for="formRadiosRighta63">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="Retrosternalextension[extension][]"
                                                        id="formRadiosRighta64" value="NO">
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
                                                    <input class="form-check-input"type="radio"
                                                        name="EnlargedLymphnodes[nodes][]" id="formRadiosRighta65"
                                                        value="YES">
                                                    <label class="form-check-label" for="formRadiosRighta65">
                                                        YES (TA unfaverable)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="EnlargedLymphnodes[nodes][]" id="formRadiosRighta66"
                                                        value="NO">
                                                    <label class="form-check-label" for="formRadiosRighta66">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">existing vocal cord changes / atony / paralysis
                                                </h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="paralysis[antoy][]" id="formRadiosRighta67"
                                                        value="YES">
                                                    <label class="form-check-label" for="formRadiosRighta67">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="paralysis[antoy][]" id="formRadiosRighta68"
                                                        value="NO">
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
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="MRCIR48[MRI][]"
                                                id="formRadiosRighta73" value="Normal">
                                            <label class="form-check-label" for="formRadiosRighta73">
                                                Normal
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="MRCIR48[MRI][]"
                                                id="formRadiosRighta74" value="Abnormal">
                                            <label class="form-check-label" for="formRadiosRighta74">
                                                Abnormal
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="abnormal_a74">
                                        <div class="form-check form-check-right mb-3">
                                            <textarea class="form-control" placeholder="Enter Elaborate / notes here***"
                                                name="MRCIR48[NOTE][]"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>CTCIR48</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">CT - Thyroid Protocol- Findings </h6>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="CTCIR48[CT][]"
                                                id="formRadiosRighta75" value="Normal">
                                            <label class="form-check-label" for="formRadiosRighta75">
                                                Normal
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="CTCIR48[CT][]"
                                                id="formRadiosRighta76" value="Abnormal">
                                            <label class="form-check-label" for="formRadiosRighta76">
                                                Abnormal
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="abnormal_a76">
                                        <div class="form-check form-check-right mb-3">
                                            <textarea class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"
                                                name="CTCIR48[NOTE][]"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>NMTHYROIDSCANCEIR78 &gt; <span class="sub_tt__">NM - Thyroid scan -
                                                    Findings</span></h4>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Toxic Single Autonomous nodule (ATN) </h6>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="NmThyroidScan[ATN][]"
                                                id="formRadiosRighta77" value="Yes">
                                            <label class="form-check-label" for="formRadiosRighta77">
                                                Yes
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="NmThyroidScan[ATN][]"
                                                id="formRadiosRighta78" value="No">
                                            <label class="form-check-label" for="formRadiosRighta78">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Toxic Multi-nodular (Hashimoto's)</h6>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="NmThyroidScan[Hashimoto][]"
                                                id="formRadiosRighta79" value="YES">
                                            <label class="form-check-label" for="formRadiosRighta79">
                                                YES (TA contraindicated)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="NmThyroidScan[Hashimoto][]"
                                                id="formRadiosRighta80" value="No">
                                            <label class="form-check-label" for="formRadiosRighta80">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Toxic diffuse (Graves disease)</h6>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="NmThyroidScan[disease][]"
                                                value="YES" id="formRadiosRighta81">
                                            <label class="form-check-label" for="formRadiosRighta81">
                                                YES (TA contraindicated)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="NmThyroidScan[disease][]"
                                                value="NO" id="formRadiosRighta82">
                                            <label class="form-check-label" for="formRadiosRighta82">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>NMPARATHYROIDSCANCEIR78 &gt; <span class="sub_tt__">NM -PARA Thyroid scan
                                                    - Findings </span></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Toxic Parathyroid Adenoma - RIGHTupper</h6>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio"
                                                name="NmParaThyroidScan[RightUpper][]" value="YES"
                                                id="formRadiosRighta83">
                                            <label class="form-check-label" for="formRadiosRighta83">
                                                YES
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio"
                                                name="NmParaThyroidScan[RightUpper][]" value="NO"
                                                id="formRadiosRighta84">
                                            <label class="form-check-label" for="formRadiosRighta84">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Toxic Parathyroid Adenoma - RIGHT lower</h6>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio"
                                                name="NmParaThyroidScan[RightLower][]"  value="YES"
                                                id="formRadiosRighta85">
                                            <label class="form-check-label" for="formRadiosRighta85">
                                                YES
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio"
                                                name="NmParaThyroidScan[RightLower][]"  value="NO"
                                                id="formRadiosRighta86">
                                            <label class="form-check-label" for="formRadiosRighta86">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Toxic Parathyroid Adenoma - left upper</h6>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio"
                                                name="NmParaThyroidScan[LeftUpper][]" value="YES"
                                                id="formRadiosRighta87">
                                            <label class="form-check-label" for="formRadiosRighta87">
                                                YES
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio"
                                                name="NmParaThyroidScan[LeftUpper][]" value="NO"
                                                id="formRadiosRighta88">
                                            <label class="form-check-label" for="formRadiosRighta88">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Toxic Parathyroid Adenoma - left lower</h6>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio"
                                                name="NmParaThyroidScan[LeftLower][]" value="YES"
                                                id="formRadiosRighta89">
                                            <label class="form-check-label" for="formRadiosRighta89">
                                                YES
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio"
                                                name="NmParaThyroidScan[LeftLower][]" value="NO"
                                                id="formRadiosRighta90">
                                            <label class="form-check-label" for="formRadiosRighta90">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>USFNATHYROIDUL320 &gt; <span class="sub_tt__">Histopath Right Thyroid
                                                    nodule FNA - Findings </span></h4>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="HistopathRightThyroidFNA[Bathesda][]" value="Bathesda grade I"
                                                id="formRadiosRighta91">
                                            <label class="form-check-label" for="formRadiosRighta91">
                                                Bathesda grade I
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="HistopathRightThyroidFNA[Bathesda][]" value="Bathesda grade II"
                                                id="formRadiosRighta92">
                                            <label class="form-check-label" for="formRadiosRighta92">
                                                Bathesda grade II
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="HistopathRightThyroidFNA[Bathesda][]" value="Bathesda grade III"
                                                id="formRadiosRighta93">
                                            <label class="form-check-label" for="formRadiosRighta93">
                                                Bathesda grade III
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="HistopathRightThyroidFNA[Bathesda][]" value="Bathesda grade IV"
                                                id="formRadiosRighta94">
                                            <label class="form-check-label" for="formRadiosRighta94">
                                                Bathesda grade IV
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="HistopathRightThyroidFNA[Bathesda][]" value="Bathesda grade V"
                                                id="formRadiosRighta95">
                                            <label class="form-check-label" for="formRadiosRighta95">
                                                Bathesda grade V
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="HistopathRightThyroidFNA[Bathesda][]" value="Bathesda grade VI"
                                                id="formRadiosRighta96">
                                            <label class="form-check-label" for="formRadiosRighta96">
                                                Bathesda grade VI
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>USFNATHYROIDUL320 &gt; <span class="sub_tt__">Histopath Left Thyroid
                                                    nodule FNA - Findings </span></h4>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="HistopathLeftThyroidFNA[Bathesda][]" value="Bathesda grade I"
                                                id="formRadiosRighta97">
                                            <label class="form-check-label" for="formRadiosRighta97">
                                                Bathesda grade I
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="HistopathLeftThyroidFNA[Bathesda][]" value=" Bathesda grade II"
                                                id="formRadiosRighta98">
                                            <label class="form-check-label" for="formRadiosRighta98">
                                                Bathesda grade II
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="HistopathLeftThyroidFNA[Bathesda][]" value="Bathesda grade III"
                                                id="formRadiosRighta99">
                                            <label class="form-check-label" for="formRadiosRighta99">
                                                Bathesda grade III
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="HistopathLeftThyroidFNA[Bathesda][]" value="Bathesda grade IV"
                                                id="formRadiosRighta100">
                                            <label class="form-check-label" for="formRadiosRighta100">
                                                Bathesda grade IV
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="HistopathLeftThyroidFNA[Bathesda][]" value="Bathesda grade V"
                                                id="formRadiosRightb1">
                                            <label class="form-check-label" for="formRadiosRightb1">
                                                Bathesda grade V
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="HistopathLeftThyroidFNA[Bathesda][]" value="Bathesda grade VI"
                                                id="formRadiosRightb2">
                                            <label class="form-check-label" for="formRadiosRightb2">
                                                Bathesda grade VI
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

                                   

                                            <div id="image-container">


                                            </div>

                                                <div class="button_images">
                                                    <button class="btn r-04 btn--theme hover--tra-black add_patient" id="draw-mode" type="button">Draw</button>
                                                    <button class="btn r-04 btn--theme hover--tra-black add_patient" id="annotate-mode" type="button">Annotate</button>
                                                    <button class="btn r-04 btn--theme hover--tra-black add_patient" id="download-image" type="button">Download</button>
                                                </div>

                                                <!-- Hidden input to store canvas image data -->
                                                <input type="hidden" name="canvasImage" id="canvasImage">
                                    </div>
                                
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Lab 
                                            {{-- <a href="javascript:void(0)"
                                                class="order-now_btn order-now_btn_alt">Order Now <i
                                                    class="fa-solid fa-arrow-right-long"></i></a> --}}
                                                </h6>
                                        <div class="title_head">
                                            <h4>LABTFT39 &gt; <span class="sub_tt__">TFT Results </span></h4>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6 class="mb-3 lut_title">TSH</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="lab_test_value">
                                                    <select class="tshRange" name="Lab[TSH][]">
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
                                                <h6 class="mb-3 lut_title">T4</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="lab_test_value">
                                                    <select class="tshRange" name="Lab[T4][]">
                                                        <option value=""></option>
                                                        <option value="normal">0.9 to 2.3 ng/dL </option>
                                                        <option value="low">Below 0.9 ng/dL</option>
                                                        <option value="high">Above 2.3 ng/dL</option>
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
                                            <h4>LABPTFT39 &gt; <span class="sub_tt__">PTFT Results </span></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6 class="mb-3 lut_title">PTH</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="lab_test_value">
                                                    <select class="tshRange" name="Lab[PTH][]">
                                                        <option value=""></option>
                                                        <option value="normal"> (0.4 - 5.49 mIU/L)</option>
                                                        <option value="low">(0.4 mIU/L)</option>
                                                        <option value="high">(5.49 mIU/L)</option>
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
                                                <h6 class="mb-3 lut_title">Ca +</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="lab_test_value">
                                                    <select class="tshRange" name="Lab[Ca][]">
                                                        <option value=""></option>
                                                        <option value="normal"> 0.4 to 5.49 mIU/L</option>
                                                        <option value="low">Below 0.4 mIU/L</option>
                                                        <option value="high">5.5 mIU/L and above</option>
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
                                            <h4>LABTHYROIDANTIBODY390 &gt; <span class="sub_tt__">Anti-thyroid antibodies
                                                    tests results</span></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <h6 class="mb-3 lut_title">Hashimotos thyroditis (TPOAb)</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="lab_test_value">
                                                    <select class="tshRange" name="AntithyroidAntibodiesTests[HashimotosThyroditisTPOAb][]">
                                                        <option value=""></option>
                                                        <option value="normal"> 0.4 to 5.49 mIU/L</option>
                                                        <option value="low">Below 0.4 mIU/L</option>
                                                        <option value="high">5.5 mIU/L and above</option>
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
                                                <h6 class="mb-3 lut_title">Graves disease (TSAb)</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="lab_test_value">
                                                    <select class="tshRange" name="AntithyroidAntibodiesTests[GravesDiseaseTSAb][]">
                                                        <option value=""></option>
                                                        <option value="normal"> 0.4 to 5.49 mIU/L</option>
                                                        <option value="low">Below 0.4 mIU/L</option>
                                                        <option value="high">5.5 mIU/L and above</option>
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
                                                <h6 class="mb-3 lut_title">Graves disease (TPOAb)</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="lab_test_value">
                                                    <select class="tshRange" name="AntithyroidAntibodiesTests[GravesDiseaseTPOAb][]">
                                                        <option value=""></option>
                                                        <option value="normal"> 0.4 to 5.49 mIU/L</option>
                                                        <option value="low">Below 0.4 mIU/L</option>
                                                        <option value="high">5.5 mIU/L and above</option>
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
                                                <h6 class="mb-3 lut_title">Graves disease (TBAb)</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="lab_test_value">
                                                    <select class="tshRange" name="AntithyroidAntibodiesTests[GravesDiseaseTBAb][]">
                                                        <option value=""></option>
                                                        <option value="normal"> 0.4 to 5.49 mIU/L</option>
                                                        <option value="low">Below 0.4 mIU/L</option>
                                                        <option value="high">5.5 mIU/L and above</option>
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
                                                <h6 class="mb-3 lut_title">Atrophic thyroditis (TBAb)</h6>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="lab_test_value">
                                                    <select class="tshRange" name="AntithyroidAntibodiesTests[AtrophicThyroditisTBAb][]">
                                                        <option value=""></option>
                                                        <option value="normal"> 0.4 to 5.49 mIU/L</option>
                                                        <option value="low">Below 0.4 mIU/L</option>
                                                        <option value="high">5.5 mIU/L and above</option>
                                                    </select>
                                                    <div class="result result_value">
                                                        <!-- Display low, high, and normal values here -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12  mb-2">
                                        <h6 class="section_title__">Special Investigation 
                                            {{-- <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#refer_patient" class="order-now_btn">Reffer <i class="fa-solid fa-arrow-right-long"></i></a> --}}
                                        </h6>
                                        <div class="title_head">
                                              <h4>REQVCFUNEVAL5</h4>
                                          </div>
                                    
                                          <div class="row align-items-center">
                                          <div class="col-lg-4">
                                              <h6 class="mb-3 lut_title">Vocal cord function endoscopic evaluation</h6>
                                              </div>
                                             <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input" type="radio" name="SpecialInvestigation[evaluation][]"  value="Normal" id="formRadiosRightbf5">
                                                      <label class="form-check-label" for="formRadiosRightbf5">
                                                      Normal
                                                      </label>
                                                  </div>
                                               
                                              </div>
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input" type="radio" name="SpecialInvestigation[evaluation][]"  value="Abnormal" id="formRadiosRightbf7">
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
                                                          <textarea  name="SpecialInvestigation[evaluationNOTE][]" class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"></textarea>
                                                          </div>
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
                                            <h4>MDTREVIEW00 &#62; <span class="sub_tt__">THYROID MDT outcome</span></h4>
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
                                                        name="MDT[TTA][]" value="TTA" id="formRadiosRight84">
                                                    <label class="form-check-label" for="formRadiosRight84">
                                                        TTA
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_84">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate TTA / notes here***" style="height: 100px" name="MDT[TTANote][]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="MDT[TE][]" value="TE" id="formRadiosRight85">
                                                    <label class="form-check-label" for="formRadiosRight85">
                                                        TE
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_85">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate TE / notes here***" style="height: 100px" name="MDT[TENote][]"></textarea>
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
                                        <h6 class="section_title__">Eligibility STATUS <a href="javascript:void(0)"
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
                                                        name="ElegibilitySTATUS[TTA][]" value="THYROID THERMAL ABLATION (TTA)" id="formRadiosRight90">
                                                    <label class="form-check-label" for="formRadiosRight90">
                                                        THYROID THERMAL ABLATION (TTA)
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_90">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate     THYROID THERMAL ABLATION  (TTA) / notes here***"
                                                            style="height: 100px" name="ElegibilitySTATUS[TTANote][]" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="ElegibilitySTATUS[PTTA][]"  value="PARATHYROID THERMAL ABLATION PTTA" id="formRadiosRight91">
                                                    <label class="form-check-label" for="formRadiosRight91">
                                                        PARATHYROID THERMAL ABLATION PTTA
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_91">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate   PARATHYROID THERMAL ABLATION  PTTA  / notes here***"
                                                            style="height: 100px" name="ElegibilitySTATUS[PTTANote][]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="ElegibilitySTATUS[TE][]" value="THYROID EMBOLIZATION TE" id="formRadiosRight92">
                                                    <label class="form-check-label" for="formRadiosRight92">
                                                        THYROID EMBOLIZATION TE
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_92">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate  THYROID EMBOLIZATION  TE / notes here***"
                                                            style="height: 100px" name="ElegibilitySTATUS[TENote][]" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="ElegibilitySTATUS[OTHERS][]" value="OTHERS" id="formRadiosRight93">
                                                    <label class="form-check-label" for="formRadiosRight93">
                                                        OTHERS
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
                                        <h6 class="section_title__">Intervention PROCEDURE / Rx 
                                            {{-- <a
                                            href="javascript:void(0)" class="order-now_btn order-now_btn_alt">Order Now <i
                                                    class="fa-solid fa-arrow-right-long"></i></a> --}}
                                                </h6>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[USTTAUL2180][]" value="USTTAUL2180"
                                                        id="formRadiosRightb37">
                                                    <label class="form-check-label" for="formRadiosRightb37">
                                                        USTTAUL2180
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[USTTABL2470][]" value="USTTABL2470"
                                                        id="formRadiosRightb38">
                                                    <label class="form-check-label" for="formRadiosRightb38">
                                                        USTTABL2470
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[LABPREIRBASIC32][]" value="LABPREIRBASIC32"
                                                        id="formRadiosRightb39">
                                                    <label class="form-check-label" for="formRadiosRightb39">
                                                        LABPREIRBASIC32
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[LABPREIRSAFETY17][]" value="LABPREIRSAFETY17"
                                                        id="formRadiosRightb40">
                                                    <label class="form-check-label" for="formRadiosRightb40">
                                                        LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[ANGIOTE2910][]" value="ANGIOTE2910"
                                                        id="formRadiosRightb41">
                                                    <label class="form-check-label" for="formRadiosRightb41">
                                                        ANGIOTE2910
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[LABPREANGIO48][]" value="LABPREANGIO48"
                                                        id="formRadiosRightb42">
                                                    <label class="form-check-label" for="formRadiosRightb42">
                                                        LABPREANGIO48
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[LABPREIRSAFETY17][]" value="LABPREIRSAFETY17"
                                                        id="formRadiosRightb43">
                                                    <label class="form-check-label" for="formRadiosRightb43">
                                                        LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[IVSEDATION270][]" value="IVSEDATION270"
                                                        id="formRadiosRightb44">
                                                    <label class="form-check-label" for="formRadiosRightb44">
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
                                        <h6 class="section_title__">Referral 
                                            {{-- <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#refer_patient" class="order-now_btn">Reffer <i
                                                    class="fa-solid fa-arrow-right-long"></i></a> --}}
                                                </h6>
                                        <div class="title_head">
                                            <h4>HCREFFERAL</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row ">

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
                        {{-- <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient draft_btn">SAVE
                            DRAFT</button> --}}
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

<!-- Annotate image js  -->





{{--  Symptoms fields validation  --}}
<script>
    $(document).ready(function() {
        
        function validateForm() {

            // Disfiguring Neck mass start  
            var isChecked_sym_a1 = $("#sym_a1").is(":checked");
           
            var sym_a1_durationValue = $("select[name='symptoms[0][1]']").val();
            
            var sym_a1_durationType = $("select[name='symptoms[0][2]']").val();
            var sym_a1_description = $("textarea[name='symptoms[0][3]']").val();

            if (sym_a1_durationValue !== "" || sym_a1_durationType !== "" || sym_a1_description !== "") {
               
                if(isChecked_sym_a1 ===false){
                    
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please fill out Disfiguring Neck mass fields in Symptoms.',
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
// Disfiguring Neck mass end  


// Dyspnea / SOB start
var isChecked_sym_a2 = $("#sym_a2").is(":checked");
           
           var sym_a2_durationValue = $("select[name='symptoms[1][1]']").val();
           
           var sym_a2_durationType = $("select[name='symptoms[1][2]']").val();
           var sym_a2_description = $("textarea[name='symptoms[1][3]']").val();

           if (sym_a2_durationValue !== "" || sym_a2_durationType !== "" || sym_a2_description !== "") {
              
               if(isChecked_sym_a2 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Dyspnea / SOB fields in Symptoms.',
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
// Dyspnea / SOB end 



// Dysphagia start
var isChecked_sym_a3 = $("#sym_a3").is(":checked");
           
           var sym_a3_durationValue = $("select[name='symptoms[2][1]']").val();
           
           var sym_a3_durationType = $("select[name='symptoms[2][2]']").val();
           var sym_a3_description = $("textarea[name='symptoms[2][3]']").val();

           if (sym_a3_durationValue !== "" || sym_a3_durationType !== "" || sym_a3_description !== "") {
              
               if(isChecked_sym_a3 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Dysphagia fields in Symptoms.',
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
// Dysphagia end 


//  Hoarse altered voice start
var isChecked_sym_a4 = $("#sym_a4").is(":checked");
           
           var sym_a4_durationValue = $("select[name='symptoms[3][1]']").val();
           
           var sym_a4_durationType = $("select[name='symptoms[3][2]']").val();
           var sym_a4_description = $("textarea[name='symptoms[3][3]']").val();

           if (sym_a4_durationValue !== "" || sym_a4_durationType !== "" || sym_a4_description !== "") {
              
               if(isChecked_sym_a4 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Hoarse altered voice fields in Symptoms.',
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
//  Hoarse altered voice end 



//  Head / Neck pain start
var isChecked_sym_a5 = $("#sym_a5").is(":checked");
           
           var sym_a5_durationValue = $("select[name='symptoms[4][1]']").val();
           
           var sym_a5_durationType = $("select[name='symptoms[4][2]']").val();
           var sym_a5_description = $("textarea[name='symptoms[4][3]']").val();

           if (sym_a5_durationValue !== "" || sym_a5_durationType !== "" || sym_a5_description !== "") {
              
               if(isChecked_sym_a5 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Head / Neck pain fields in Symptoms.',
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
//  Head / Neck pain end 



//  Sleep disturbance start
var isChecked_sym_a6= $("#sym_a6").is(":checked");
           
           var sym_a6_durationValue = $("select[name='symptoms[5][1]']").val();
           
           var sym_a6_durationType = $("select[name='symptoms[5][2]']").val();
           var sym_a6_description = $("textarea[name='symptoms[5][3]']").val();

           if (sym_a6_durationValue !== "" || sym_a6_durationType !== "" || sym_a6_description !== "") {
              
               if(isChecked_sym_a6 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Sleep disturbance fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a6');
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



//  Exophthalmos start
var isChecked_sym_a7 = $("#sym_a7").is(":checked");
           
           var sym_a7_durationValue = $("select[name='symptoms[6][1]']").val();
           
           var sym_a7_durationType = $("select[name='symptoms[6][2]']").val();
           var sym_a7_description = $("textarea[name='symptoms[6][3]']").val();

           if (sym_a7_durationValue !== "" || sym_a7_durationType !== "" || sym_a7_description !== "") {
              
               if(isChecked_sym_a7 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Exophthalmos fields in Symptoms.',
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
//  Exophthalmos end 



//  Palpitations start
var isChecked_sym_a8 = $("#sym_a8").is(":checked");
           
           var sym_a8_durationValue = $("select[name='symptoms[7][1]']").val();
           
           var sym_a8_durationType = $("select[name='symptoms[7][2]']").val();
           var sym_a8_description = $("textarea[name='symptoms[7][3]']").val();

           if (sym_a8_durationValue !== "" || sym_a8_durationType !== "" || sym_a8_description !== "") {
              
               if(isChecked_sym_a8 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Palpitations fields in Symptoms.',
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
//  Palpitations end 



//  Sweating start
var isChecked_sym_a9 = $("#sym_a9").is(":checked");
           
           var _sym_a9_durationValue = $("select[name='symptoms[8][1]']").val();
           
           var _sym_a9_durationType = $("select[name='symptoms[8][2]']").val();
           var _sym_a9_description = $("textarea[name='symptoms[8][3]']").val();

           if (_sym_a9_durationValue !== "" || _sym_a9_durationType !== "" || _sym_a9_description !== "") {
              
               if(isChecked_sym_a9 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Sweating fields in Symptoms.',
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
//  Sweating end 


//  Anxiety start
var isChecked_sym_a10 = $("#sym_a10").is(":checked");
           
           var _sym_a10_durationValue = $("select[name='symptoms[9][1]']").val();
           
           var _sym_a10_durationType = $("select[name='symptoms[9][2]']").val();
           var _sym_a10_description = $("textarea[name='symptoms[9][3]']").val();

           if (_sym_a10_durationValue !== "" || _sym_a10_durationType !== "" || _sym_a10_description !== "") {
              
               if(isChecked_sym_a10 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Anxiety fields in Symptoms.',
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
//  Anxiety end 


//  Tremor start
var isChecked_sym_a11 = $("#sym_a11").is(":checked");
           
           var sym_a11_durationValue = $("select[name='symptoms[10][1]']").val();
           
           var sym_a11_durationType = $("select[name='symptoms[10][2]']").val();
           var sym_a11_description = $("textarea[name='symptoms[10][3]']").val();

           if (sym_a11_durationValue !== "" || sym_a11_durationType !== "" || sym_a11_description !== "") {
              
               if(isChecked_sym_a11 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Tremor fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a11');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Tremor end 


//  Hair loss start
var isChecked_sym_a12 = $("#sym_a12").is(":checked");
           
           var sym_a12_durationValue = $("select[name='symptoms[11][1]']").val();
           
           var sym_a12_durationType = $("select[name='symptoms[11][2]']").val();
           var sym_a12_description = $("textarea[name='symptoms[11][3]']").val();

           if (sym_a12_durationValue !== "" || sym_a12_durationType !== "" || sym_a12_description !== "") {
              
               if(isChecked_sym_a12 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Hair loss fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a12');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Hair loss end

//  Lethargy start
var isChecked_sym_a13 = $("#sym_a13").is(":checked");
           
           var sym_a13_durationValue = $("select[name='symptoms[12][1]']").val();
           
           var sym_a13_durationType = $("select[name='symptoms[12][2]']").val();
           var sym_a13_description = $("textarea[name='symptoms[12][3]']").val();

           if (sym_a13_durationValue !== "" || sym_a13_durationType !== "" || sym_a13_description !== "") {
              
               if(isChecked_sym_a13 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Lethargy fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a13');
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

//  Fatigue start
var isChecked_sym_a14 = $("#sym_a14").is(":checked");
           
           var sym_a14_durationValue = $("select[name='symptoms[13][1]']").val();
           
           var sym_a14_durationType = $("select[name='symptoms[13][2]']").val();
           var sym_a14_description = $("textarea[name='symptoms[13][3]']").val();

           if (sym_a14_durationValue !== "" || sym_a14_durationType !== "" || sym_a14_description !== "") {
              
               if(isChecked_sym_a14 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Fatigue fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a14');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Fatigue end

//  Cold intolerance start
var isChecked_sym_a15 = $("#sym_a15").is(":checked");
           
           var sym_a15_durationValue = $("select[name='symptoms[14][1]']").val();
           
           var sym_a15_durationType = $("select[name='symptoms[14][2]']").val();
           var sym_a15_description = $("textarea[name='symptoms[14][3]']").val();

           if (sym_a15_durationValue !== "" || sym_a15_durationType !== "" || sym_a15_description !== "") {
              
               if(isChecked_sym_a15 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Cold intolerance fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a15');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Cold intolerance end


//  Weight gain start
var isChecked_sym_a16 = $("#sym_a16").is(":checked");
           
           var sym_a16_durationValue = $("select[name='symptoms[15][1]']").val();
           
           var sym_a16_durationType = $("select[name='symptoms[15][2]']").val();
           var sym_a16_description = $("textarea[name='symptoms[15][3]']").val();

           if (sym_a16_durationValue !== "" || sym_a16_durationType !== "" || sym_a16_description !== "") {
              
               if(isChecked_sym_a16 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Weight gain fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a16');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Weight gain end

//  Altered mood start
var isChecked_sym_a17 = $("#sym_a17").is(":checked");
           
           var sym_a17_durationValue = $("select[name='symptoms[16][1]']").val();
           
           var sym_a17_durationType = $("select[name='symptoms[16][2]']").val();
           var sym_a17_description = $("textarea[name='symptoms[16][3]']").val();

           if (sym_a17_durationValue !== "" || sym_a17_durationType !== "" || sym_a17_description !== "") {
              
               if(isChecked_sym_a17 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Altered mood fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a17');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Altered mood end

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
    imageObj.src = '{{ asset('/assets/thyroid-eligibility-form/add/thyroid-eligibility.jpg') }}';

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


        
        $("#storeThyroidEligibilityForms").submit(function(event) {

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
                                    url: '{{ route("user.storeThyroidEligibilityForms") }}',
                                    type: 'POST',
                                    data: formData,
                                    processData: false,
                                    contentType: false, 
                                    success: function(response) {
                                        
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
                                                                var redirectUrl = "{{ route('user.ViewThyroidAblationForm', ['id' => ':id']) }}";
                                                                redirectUrl = redirectUrl.replace(':id', patientId);
                                                                window.location.href = redirectUrl;
                                                            }
                                                        });    

                                            }
                                    }
                                
                                    
                                });
                
                    
                    }
                }
            }else{
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

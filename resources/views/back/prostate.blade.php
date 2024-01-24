@extends('back.layout.main_view')
@push('title')
    Patient | Prostate QASTARAT & DAWALI CLINICS
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
            <h1 class=""> PAE <span class="blue_theme"> Eligibility</span> Form</h1>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
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
                <form method="POST" action="{{ route('user.storeProstateEligibilityForms') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ @$patient_id }}" />


                    <h3 class="form_title">Prostate Artery Embolization <span>Eligibility</span></h3>

                    <div class="form_data">
                        <h6 class="section_title__">Diagnosis</h6>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>Diagnosis -General / Provisional</h4>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 px-0">
                                        <div class="row">

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
                                                        name="diagnosis_general[AcuteUrinaryRetention][]"
                                                        id="formRadiosRight6" value="Acute Urinary Retention">
                                                    <label class="form-check-label" for="formRadiosRight6">
                                                        Acute Urinary Retention
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_general[PostateCarcinoma][]" id="formRadiosRight7"
                                                        value="Postate Carcinoma">
                                                    <label class="form-check-label" for="formRadiosRight7">
                                                        Postate Carcinoma
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="title_head">
                                                    <h4>Diagnosis - ICD 10</h4>DiagnosisICD
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">

                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[C61][]" id="formRadiosRight8"
                                                        value="C61 Malignant neoplasm of prostate">
                                                    <label class="form-check-label" for="formRadiosRight8">
                                                        C61 Malignant neoplasm of prostate
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[D075][]" id="formRadiosRight9"
                                                        value="D07.5 Carcinoma in situ: Prostate">
                                                    <label class="form-check-label" for="formRadiosRight9">
                                                        D07.5 Carcinoma in situ: Prostate
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[D291][]" id="formRadiosRight10"
                                                        value="D29.1 Benign neoplasm: Prostate">
                                                    <label class="form-check-label" for="formRadiosRight10">
                                                        D29.1 Benign neoplasm: Prostate
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[D40][]" id="formRadiosRight11"
                                                        value="D40.0 Neoplasm of uncertain or unknown behaviour: Prostate">
                                                    <label class="form-check-label" for="formRadiosRight11">
                                                        D40.0 Neoplasm of uncertain or unknown behaviour: Prostate
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[N320][]" id="formRadiosRight12"
                                                        value="N32.0 Bladder-neck obstruction">
                                                    <label class="form-check-label" for="formRadiosRight12">
                                                        N32.0 Bladder-neck obstruction
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[N40][]" id="formRadiosRight13"
                                                        value="N40 Hyperplasia of prostate">
                                                    <label class="form-check-label" for="formRadiosRight13">
                                                        N40 Hyperplasia of prostate
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[N41][]" id="formRadiosRightc1"
                                                        value="N41 Inflammatory diseases of prostate">
                                                    <label class="form-check-label" for="formRadiosRightc1">
                                                        N41 Inflammatory diseases of prostate
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[N410][]" id="formRadiosRightc2"
                                                        value="N41.0 Acute prostatitis">
                                                    <label class="form-check-label" for="formRadiosRightc2">
                                                        N41.0 Acute prostatitis
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[N411][]" id="formRadiosRightc3"
                                                        value="N41.1 Chronic prostatitis">
                                                    <label class="form-check-label" for="formRadiosRightc3">
                                                        N41.1 Chronic prostatitis
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[N412][]" id="formRadiosRightc4"
                                                        value="N41.2 Abscess of prostate">
                                                    <label class="form-check-label" for="formRadiosRightc4">
                                                        N41.2 Abscess of prostate
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[N413][]" id="formRadiosRightc5"
                                                        value="N41.3 Prostatocystitis">
                                                    <label class="form-check-label" for="formRadiosRightc5">
                                                        N41.3 Prostatocystitis
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[N418][]" id="formRadiosRightc6"
                                                        value="N41.8 Other inflammatory diseases of prostate">
                                                    <label class="form-check-label" for="formRadiosRightc6">
                                                        N41.8 Other inflammatory diseases of prostate
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[N419][]" id="formRadiosRightc7"
                                                        value="N41.9 Inflammatory disease of prostate, unspecified">
                                                    <label class="form-check-label" for="formRadiosRightc7">
                                                        N41.9 Inflammatory disease of prostate, unspecified
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[N42][]" id="formRadiosRightc8"
                                                        value="N42 Other disorders of prostate">
                                                    <label class="form-check-label" for="formRadiosRightc8">
                                                        N42 Other disorders of prostate
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[N422][]" id="formRadiosRightc9"
                                                        value="N42.2 Atrophy of prostate">
                                                    <label class="form-check-label" for="formRadiosRightc9">
                                                        N42.2 Atrophy of prostate
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[N423][]" id="formRadiosRightc10"
                                                        value="N42.3 Dysplasia of prostate">
                                                    <label class="form-check-label" for="formRadiosRightc10">
                                                        N42.3 Dysplasia of prostate
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[N51][]" id="formRadiosRightc11"
                                                        value="N51.0 Disorders of prostate in diseases classified elsewhere">
                                                    <label class="form-check-label" for="formRadiosRightc11">
                                                        N51.0 Disorders of prostate in diseases classified elsewhere
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="diagnosis_cid[Q55][]" id="formRadiosRightc12"
                                                        value="Q55.4 Other congenital malformations of vas deferens, epididymis, seminal vesicles and prostate" />
                                                    <label class="form-check-label" for="formRadiosRightc12">
                                                        Q55.4 Other congenital malformations of vas deferens, epididymis,
                                                        seminal vesicles and prostate
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>Lowwer Urinary Tract symptoms score (IPSS)</h4>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="5" class="top_header_frm_tb">Calculate LUTS Score
                                                        (IPSS)</th>
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
                                            <tbody id="symptomsContainer">
                                                <tr>
                                                    <td>Frequency</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Frequency][]"
                                                                value="0" id="formRadiosRight14">
                                                            <label class="form-check-label" for="formRadiosRight14">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Frequency][]"
                                                                value="1" id="formRadiosRight15">
                                                            <label class="form-check-label" for="formRadiosRight15">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Frequency][]"
                                                                value="3" id="formRadiosRight16">
                                                            <label class="form-check-label" for="formRadiosRight16">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Frequency][]"
                                                                value="5" id="formRadiosRight17">
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
                                                                value="0" id="formRadiosRight18">
                                                            <label class="form-check-label" for="formRadiosRight18">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Urgency][]"
                                                                value="1" id="formRadiosRight19">
                                                            <label class="form-check-label" for="formRadiosRight19">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Urgency][]"
                                                                value="3" id="formRadiosRight20">
                                                            <label class="form-check-label" for="formRadiosRight20">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Urgency][]"
                                                                value="5" id="formRadiosRight21">
                                                            <label class="form-check-label" for="formRadiosRight21">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Intermittency</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Intermittency][]"
                                                                value="0" id="formRadiosRight22">
                                                            <label class="form-check-label" for="formRadiosRight22">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Intermittency][]"
                                                                value="1" id="formRadiosRight23">
                                                            <label class="form-check-label" for="formRadiosRight23">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Intermittency][]"
                                                                value="3" id="formRadiosRight24">
                                                            <label class="form-check-label" for="formRadiosRight24">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Intermittency][]"
                                                                value="5" id="formRadiosRight25">
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
                                                                type="radio" name="symptoms_score[Straining][]"
                                                                value="0" id="formRadiosRight26">
                                                            <label class="form-check-label" for="formRadiosRight26">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Straining][]"
                                                                value="1" id="formRadiosRight27">
                                                            <label class="form-check-label" for="formRadiosRight27">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Straining][]"
                                                                value="3" id="formRadiosRight28">
                                                            <label class="form-check-label" for="formRadiosRight28">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Straining][]"
                                                                value="5" id="formRadiosRight29">
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
                                                                value="0" id="formRadiosRight30">
                                                            <label class="form-check-label" for="formRadiosRight30">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[WeakStream][]"
                                                                value="1" id="formRadiosRight31">
                                                            <label class="form-check-label" for="formRadiosRight31">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[WeakStream][]"
                                                                value="3" id="formRadiosRight32">
                                                            <label class="form-check-label" for="formRadiosRight32">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[WeakStream][]"
                                                                value="5" id="formRadiosRight33">
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
                                                                type="radio"
                                                                name="symptoms_score[IncompleteEmptying][]" value="0"
                                                                id="formRadiosRight34">
                                                            <label class="form-check-label" for="formRadiosRight34">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[IncompleteEmptying][]" value="1"
                                                                id="formRadiosRight35">
                                                            <label class="form-check-label" for="formRadiosRight35">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[IncompleteEmptying][]" value="3"
                                                                id="formRadiosRight36">
                                                            <label class="form-check-label" for="formRadiosRight36">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[IncompleteEmptying][]" value="5"
                                                                id="formRadiosRight37">
                                                            <label class="form-check-label" for="formRadiosRight37">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Nocturia</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Nocturia][]"
                                                                value="0" id="formRadiosRight38">
                                                            <label class="form-check-label" for="formRadiosRight38">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Nocturia][]"
                                                                value="1" id="formRadiosRight39">
                                                            <label class="form-check-label" for="formRadiosRight39">
                                                                1 pts ( 1 time)
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Nocturia][]"
                                                                value="3" id="formRadiosRight40">
                                                            <label class="form-check-label" for="formRadiosRight40">
                                                                3 pts (3 times)
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Nocturia][]"
                                                                value="5" id="formRadiosRight41">
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
                                                    <th>(8-19 pts) (PAE FAVERABLE)</th>
                                                </tr>
                                                <tr id="severeLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Severe LUTS </th>
                                                    <th>(20-35 pts) (PAE FAVERABLE)</th>
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
                                                <h6 class="mb-3 lut_title">LUTS Meds</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[LUTSMeds][]" value="Mono-therapy"
                                                        id="formRadiosRight42">
                                                    <label class="form-check-label" for="formRadiosRight42">
                                                        Mono-therapy
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[LUTSMeds][]" value="Combo-therapy"
                                                        id="formRadiosRight43">
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
                                                        name="clinical_indicator[ErectileDysfunction][]" value="yes"
                                                        id="formRadiosRight44">
                                                    <label class="form-check-label" for="formRadiosRight44">
                                                        Yes
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[ErectileDysfunction][]" value="no"
                                                        id="formRadiosRight45">
                                                    <label class="form-check-label" for="formRadiosRight45">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Detrusor Failure (indwelling / permanent
                                                    catheter)</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="clinical_indicator[DetrusorFailure][]"
                                                        value="YES (PAE FAVERABLE)" id="formRadiosRight46">
                                                    <label class="form-check-label" for="formRadiosRight46">
                                                        YES (PAE FAVERABLE)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="clinical_indicator[DetrusorFailure][]" value="no"
                                                        id="formRadiosRight47">
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
                                            <h4>USGENERAL70</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="mb-3 lut_title">Prostate Parameters</h6>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Usgeneral70ProstateParameterstotalProstateVolume][]"
                                                value="Total Prostate Volume (TPV) TPV < 40 cc (PAE unfaverable)"
                                                id="formRadiosRight48">
                                            <label class="form-check-label" for="formRadiosRight48">
                                                Total Prostate Volume (TPV) TPV < 40 cc (PAE unfaverable) </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Usgeneral70ProstateParameterstotalPsa][]"
                                                value="PSA:TPV Ratio (PSA density)>0.15 ng/ml/cc (PAE unfaverable)"
                                                id="formRadiosRight49">
                                            <label class="form-check-label" for="formRadiosRight49">
                                                PSA:TPV Ratio (PSA density)>0.15 ng/ml/cc (PAE unfaverable)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Usgeneral70ProstateParametersTpv][]"
                                                value="TPV > 40 cc (PAE FAVERABLE)" id="formRadiosRight50">
                                            <label class="form-check-label" for="formRadiosRight50">
                                                TPV > 40 cc (PAE FAVERABLE)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Usgeneral70ProstateParametersNg][]" value="0.15 ng/ml/cc"
                                                id="formRadiosRight51">
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
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Mrcir48CalculatePiRardsPz][]"
                                                value="Pi-RADS PZ PI-RADS IV-V (PAE contraindicated)"
                                                id="formRadiosRight52">
                                            <label class="form-check-label" for="formRadiosRight52">
                                                Pi-RADS PZ PI-RADS IV-V (PAE contraindicated)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Mrcir48CalculatePiRards][]" value=" PI-RADS I-III "
                                                id="formRadiosRight53">
                                            <label class="form-check-label" for="formRadiosRight53">
                                                PI-RADS I-III
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Mrcir48CalculatePiRardsTz][]"
                                                value="Pi-RADS TZ PI-RADS IV-V (PAE contraindicated)"
                                                id="formRadiosRight54">
                                            <label class="form-check-label" for="formRadiosRight54">
                                                Pi-RADS TZ PI-RADS IV-V (PAE contraindicated)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Mrcir48CalculatePiRardsI][]" value="PI-RADS I-III"
                                                id="formRadiosRight55">
                                            <label class="form-check-label" for="formRadiosRight55">
                                                PI-RADS I-III
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Mrcir48CalculatePiRardsTpv][]"
                                                value="Total Prostate Volume (TPV) TPV < 40 cc (PAE unfaverable)"
                                                id="formRadiosRight56">
                                            <label class="form-check-label" for="formRadiosRight56">
                                                Total Prostate Volume (TPV) TPV < 40 cc (PAE unfaverable) </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Mrcir48CalculatePiRardsTpvCc][]"
                                                value="TPV > 40 cc (PAE FAVERABLE)" id="formRadiosRight57">
                                            <label class="form-check-label" for="formRadiosRight57">
                                                TPV > 40 cc (PAE FAVERABLE)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Mrcir48CalculatePiRardsTPvratio][]"
                                                value="PSA:TPV Ratio (PSA density)>0.15 ng/ml/cc (PAE unfaverable)"
                                                id="formRadiosRight58">
                                            <label class="form-check-label" for="formRadiosRight58">
                                                PSA:TPV Ratio (PSA density)>0.15 ng/ml/cc (PAE unfaverable)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Mrcir48CalculatePiRardsNg][]" value="0.15 ng/ml/cc"
                                                id="formRadiosRight59">
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
                                            <input class="form-check-input" type="radio" name="imaging[BPHType][]"
                                                value="AdBPH (PAE FAVERABLE)" id="formRadiosRight60">
                                            <label class="form-check-label" for="formRadiosRight60">
                                                AdBPH (PAE FAVERABLE)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="radio" name="imaging[BPHType][]"
                                                value="NON-AdBPH" id="formRadiosRight61">
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
                                            <input class="form-check-input" type="radio" name="imaging[3rdlobe][]"
                                                value="YES (PAE unfaverable)" id="formRadiosRight62">
                                            <label class="form-check-label" for="formRadiosRight62">
                                                YES (PAE unfaverable)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="radio" name="imaging[3rdlobe][]"
                                                value="NO" id="formRadiosRight63">
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
                                            <input class="form-check-input" type="radio"
                                                name="imaging[ProstateAbscess][]" value="YES (PAE contraindicated)"
                                                id="formRadiosRight64">
                                            <label class="form-check-label" for="formRadiosRight64">
                                                YES (PAE contraindicated)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3" id="pae_no">
                                            <input class="form-check-input" type="radio"
                                                name="imaging[ProstateAbscess][]" value="NO" id="formRadiosRight65">
                                            <label class="form-check-label" for="formRadiosRight65">
                                                NO
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="text_pae">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Enter Elaborate / notes
                                                here***</label>
                                            <textarea class="form-control" placeholder="" style="height: 100px" name="imaging[note][]"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>CTCIR48 &gt; <span class="sub_tt__">CTA - Pelvis Protocol- Findings </span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="mb-3 lut_title">CTA - Prostatic artery Angiography Protocol -RIGHT </h6>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Ctcir48ProstaticArteryAngiographyProtocolRighttypeI][]"
                                                value="Type I  (28%)" id="formRadiosRight66">
                                            <label class="form-check-label" for="formRadiosRight66">
                                                Type I (28%)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Ctcir48ProstaticArteryAngiographyProtocolRighttypeII][]"
                                                value="Type II (14%)" id="formRadiosRight67">
                                            <label class="form-check-label" for="formRadiosRight67">
                                                Type II (14%)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Ctcir48ProstaticArteryAngiographyProtocolRighttypeIII][]"
                                                value="Type III (18%)" id="formRadiosRight68">
                                            <label class="form-check-label" for="formRadiosRight68">
                                                Type III (18%)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Ctcir48ProstaticArteryAngiographyProtocolRighttypeIV][]"
                                                value="Type IV (31%)" id="formRadiosRight69">
                                            <label class="form-check-label" for="formRadiosRight69">
                                                Type IV (31%)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Ctcir48ProstaticArteryAngiographyProtocolRighttypeV][]"
                                                value="Type V (5%)" id="formRadiosRightc13">
                                            <label class="form-check-label" for="formRadiosRightc13">
                                                Type V (5%)
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="mb-3 lut_title">CTA - Prostatic artery Angiography Protocol -LEFT </h6>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Ctcir48ProstaticArteryAngiographyProtocolLefttypeV][]"
                                                value="Type V (28%)" id="formRadiosRightc14">
                                            <label class="form-check-label" for="formRadiosRightc14">
                                                Type I (28%)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Ctcir48ProstaticArteryAngiographyProtocolLefttypeV][]"
                                                value="Type V (14%)" id="formRadiosRightc15">
                                            <label class="form-check-label" for="formRadiosRightc15">
                                                Type II (14%)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Ctcir48ProstaticArteryAngiographyProtocolLefttypeV][]"
                                                value="Type V (18%)" id="formRadiosRightc15">
                                            <label class="form-check-label" for="formRadiosRightc15">
                                                Type III (18%)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Ctcir48ProstaticArteryAngiographyProtocolLefttypeV][]"
                                                value="Type V (31%)" id="formRadiosRightc16">
                                            <label class="form-check-label" for="formRadiosRightc16">
                                                Type IV (31%)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="checkbox"
                                                name="imaging[Ctcir48ProstaticArteryAngiographyProtocolLefttypeV][]"
                                                value="Type V (5%)" id="formRadiosRightc17">
                                            <label class="form-check-label" for="formRadiosRightc17">
                                                Type V (5%)
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>USBIOPSYPROSTETE690 &#62; <span class="sub_tt__">US - Prostate tru-cut
                                                    biopsy Results</span></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Prostate Hyperplasia</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="imaging[ProstateHyperplasia][]" value="YES"
                                                        id="formRadiosRight70">
                                                    <label class="form-check-label" for="formRadiosRight70">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="imaging[ProstateHyperplasia][]" value="NO"
                                                        id="formRadiosRight71">
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
                                                    <input class="form-check-input" type="radio"
                                                        name="imaging[ProstateAdenoCarcinoma][]"
                                                        value="YES (PAE contraindicated)" id="formRadiosRight72">
                                                    <label class="form-check-label" for="formRadiosRight72">
                                                        YES (PAE contraindicated)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="imaging[ProstateAdenoCarcinoma][]" value="NO"
                                                        id="formRadiosRight73">
                                                    <label class="form-check-label" for="formRadiosRight73">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <!-- <div class="col-lg-12">
                                  <h6 class="mb-3 lut_title">Annotate Prostate findings</h6>
                                </div> -->

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Image Annotation</h6>
                                        <div class="title_head">
                                            <h4>Annotate Prostate findings</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">

                                        <div id="image-container">

                                            <!-- Hidden file input -->
                                            <input type="file" id="fileInput" name="ImageAnnotation[image][]"
                                                style="display: none;">

                                        </div>


                                        <div class="button_images">
                                            <button class="btn r-04 btn--theme hover--tra-black add_patient"
                                                id="draw-mode" type="button">Draw</button>
                                            <button class="btn r-04 btn--theme hover--tra-black add_patient"
                                                id="annotate-mode" type="button">Annotate</button>
                                            <button class="btn r-04 btn--theme hover--tra-black add_patient"
                                                id="download-image" type="button">Download</button>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Lab</h6>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>LABPSA24</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="mb-3 lut_title">PSA</h6>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="radio" name="lab[PSA][]"
                                                value=" PSA > 4 gm/dl OR PSA > 4 ng/ml (PAE unfaverable)"
                                                id="formRadiosRight74">
                                            <label class="form-check-label" for="formRadiosRight74">
                                                PSA > 4 gm/dl OR PSA > 4 ng/ml (PAE unfaverable)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="radio" name="lab[PSA][]"
                                                value="PSA 4 gm/dl    OR    PSA 4 ng/ml" id="formRadiosRight75">
                                            <label class="form-check-label" for="formRadiosRight75">
                                                PSA &#60;4 gm/dl OR PSA &#60;4 ng/ml
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>LABRFT12</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="mb-3 lut_title">Renal Function test (Creatinine | Na | K | urea) Results
                                        </h6>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="lab[LABRFT12][]"
                                                        value=" Abnormal Renal profile (PAE contraindicated)"
                                                        id="formRadiosRight88">
                                                    <label class="form-check-label" for="formRadiosRight88">
                                                        Abnormal Renal profile (PAE contraindicated)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="lab[LABRFT12][]"
                                                        id="formRadiosRight89" value="Normal Renal profile">
                                                    <label class="form-check-label" for="formRadiosRight89">
                                                        Normal Renal profile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_88">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***" style="height: 100px"
                                                        name="lab[LABRFT12NOTE][]"></textarea>
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
                                                <input class="form-check-input"type="radio" name="lab[Urinalysis][]"
                                                    value="Abnormal Urinanalysis (PAE unfaverable)"
                                                    id="formRadiosRight76">
                                                <label class="form-check-label" for="formRadiosRight76">
                                                    Abnormal Urinanalysis (PAE unfaverable)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="lab[Urinalysis][]"
                                                    value="Normal Urinanalysis" id="formRadiosRight77">
                                                <label class="form-check-label" for="formRadiosRight77">
                                                    Normal Urinanalysis
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" id="textarea_76">
                                            <div class="form-check form-check-right mb-3">
                                                <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***" name="lab[UrinalysisNOTE][]"
                                                    style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>LABUROFLO82 &#62; <span class="sub_tt__">Uroflowmetery tests Results</span>
                                            </h4>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Q-Max </h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="lab[QMax][]"
                                                        value="10ml/s (PAE unfaverable)" id="formRadiosRight78">
                                                    <label class="form-check-label" for="formRadiosRight78">
                                                        >10ml/s (PAE unfaverable)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="lab[QMax][]"
                                                        value="10ml/s (BOO) (PAE FAVERABLE)" id="formRadiosRight79">
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
                                                    <input class="form-check-input"type="radio" name="lab[PVR][]"
                                                        value="< 200cc (PAE unfaverable)" id="formRadiosRight80">
                                                    <label class="form-check-label" for="formRadiosRight80">
                                                        < 200cc (PAE unfaverable) </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="lab[PVR][]"
                                                        value="> 200cc (BOO) (PAE FAVERABLE)" id="formRadiosRight81">
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
                                                    <input class="form-check-input"type="radio"
                                                        name="lab[LABUROFLOINVASIVE752][]"
                                                        value="Normal results (PAE unfaverable)" id="formRadiosRight82">
                                                    <label class="form-check-label" for="formRadiosRight82">
                                                        Normal results (PAE unfaverable)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="lab[LABUROFLOINVASIVE752][]" value="Abnormal results"
                                                        id="formRadiosRight83">
                                                    <label class="form-check-label" for="formRadiosRight83">
                                                        Abnormal results
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_83">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                    <textarea class="form-control" placeholder="Enter Elaborate Abnormal results / notes here***"
                                                        name="lab[LABUROFLOINVASIVE752NOTE][]" style="height: 100px"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <h6 class="section_title__">MDT</h6>
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
                                        <div class="row align-items-center">

                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="mdt[MDTDecision][]" value="PAE"
                                                        id="formRadiosRight84">
                                                    <label class="form-check-label" for="formRadiosRight84">
                                                        PAE
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="mdt[MDTDecision][]" value="Medical"
                                                        id="formRadiosRight85">
                                                    <label class="form-check-label" for="formRadiosRight85">
                                                        Medical
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="mdt[MDTDecision][]" value="Surgical"
                                                        id="formRadiosRight86">
                                                    <label class="form-check-label" for="formRadiosRight86">
                                                        Surgical
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="mdt[MDTDecision][]" value="Other options"
                                                        id="formRadiosRight87">
                                                    <label class="form-check-label" for="formRadiosRight87">
                                                        Other options
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_84">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate PAE  / notes here***" style="height: 100px"
                                                        name="mdt[MDTDecisionNOTE][]"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_85">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate Medical / notes here***" style="height: 100px"
                                                        name="mdt[MDTDecisionNOTE][]"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_86">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***" style="height: 100px"
                                                        name="mdt[MDTDecisionNOTE][]"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_87">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate  Other options / notes here***" style="height: 100px"
                                                        name="mdt[MDTDecisionNOTE][]"></textarea>
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
                                                    <input class="form-check-input" type="radio"
                                                        name="elegibilityStatus[ElegibilitySTATUS][]" value="PAE"
                                                        id="formRadiosRight90">
                                                    <label class="form-check-label" for="formRadiosRight90">
                                                        PAE
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="radio"
                                                        name="elegibilityStatus[ElegibilitySTATUS][]" value="Medical"
                                                        id="formRadiosRight91">
                                                    <label class="form-check-label" for="formRadiosRight91">
                                                        Medical
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="radio"
                                                        name="elegibilityStatus[ElegibilitySTATUS][]" value="Surgical"
                                                        id="formRadiosRight92">
                                                    <label class="form-check-label" for="formRadiosRight92">
                                                        Surgical
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="elegibilityStatus[ElegibilitySTATUS][]"
                                                        value="Other options" id="formRadiosRight93">
                                                    <label class="form-check-label" for="formRadiosRight93">
                                                        Other options
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_90">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate PAE / notes here***"
                                                        name="elegibilityStatus[ElegibilitySTATUSNOTE][]" style="height: 100px"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_91">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate Medical  / notes here***"
                                                        name="elegibilityStatus[ElegibilitySTATUSNOTE][]" style="height: 100px"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_92">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***"
                                                        name="elegibilityStatus[ElegibilitySTATUSNOTE][]" style="height: 100px"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_93">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate Other options / notes here***"
                                                        name="elegibilityStatus[ElegibilitySTATUSNOTE][]" style="height: 100px"></textarea>
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
                                                    <input class="form-check-input"type="checkbox"
                                                        name="InterventionProcedure[InterventionProcedureANGIOPAE2910][]"
                                                        value="ANGIOPAE2910" id="formRadiosRightb37">
                                                    <label class="form-check-label" for="formRadiosRightb37">
                                                        ANGIOPAE2910
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="InterventionProcedure[InterventionProcedureLABPREANGIO48][]"
                                                        value="LABPREANGIO48" id="formRadiosRightb38">
                                                    <label class="form-check-label" for="formRadiosRightb38">
                                                        LABPREANGIO48
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="InterventionProcedure[InterventionProcedureLABPREIRSAFETY17][]"
                                                        value="LABPREIRSAFETY17" id="formRadiosRightb39">
                                                    <label class="form-check-label" for="formRadiosRightb39">
                                                        LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="InterventionProcedure[InterventionProcedureIVSEDATION270][]"
                                                        value="IVSEDATION270" id="formRadiosRightb40">
                                                    <label class="form-check-label" for="formRadiosRightb40">
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
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[SupportiveIVVITAPROSTATE175][]"
                                                        value="IVVITAPROSTATE175" id="formRadiosRightb45">
                                                    <label class="form-check-label" for="formRadiosRightb45">
                                                        IVVITAPROSTATE175
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[SupportiveLABPREIVBASIC52][]"
                                                        value="LABPREIVBASIC52" id="formRadiosRightb46">
                                                    <label class="form-check-label" for="formRadiosRightb46">
                                                        LABPREIVBASIC52
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[SupportiveLABPREIVADVANCED230][]"
                                                        value="LABPREIVADVANCED230" id="formRadiosRightb47">
                                                    <label class="form-check-label" for="formRadiosRightb47">
                                                        LABPREIVADVANCED230
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[SupportivePROZ290][]" value="PROZ290"
                                                        id="formRadiosRightb47">
                                                    <label class="form-check-label" for="formRadiosRightb47">
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
                                                    <input class="form-check-input" type="radio"
                                                        name="Referral[HCREFFERAL][]" value="Endocrinology"
                                                        id="formRadiosRightb48">
                                                    <label class="form-check-label" for="formRadiosRightb48">
                                                        Endocrinology
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="radio"
                                                        name="Referral[HCREFFERAL][]"
                                                        value="ENT / Head and Neck surgery" id="formRadiosRightb49">
                                                    <label class="form-check-label" for="formRadiosRightb49">
                                                        ENT / Head and Neck surgery
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="radio"
                                                        name="Referral[HCREFFERAL][]"
                                                        value="NM Radio-Active iodine Ablation" id="formRadiosRightb50">
                                                    <label class="form-check-label" for="formRadiosRightb50">
                                                        NM Radio-Active iodine Ablation
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="Referral[HCREFFERAL][]"
                                                        value="Head & Neck Rehab/PhysioTherapy" id="formRadiosRightb51">
                                                    <label class="form-check-label" for="formRadiosRightb51">
                                                        Head & Neck Rehab/PhysioTherapy
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="Referral[HCREFFERAL][]" value="Others"
                                                        id="formRadiosRightb52">
                                                    <label class="form-check-label" for="formRadiosRightb52">
                                                        Others
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_b48">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate  Endocrinology / notes here***"
                                                        name="Referral[HCREFFERALNOTE][]" style="height: 100px"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_b49">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate   ENT / Head and Neck surgery   / notes here***"
                                                        name="Referral[HCREFFERALNOTE][]" style="height: 100px"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_b50">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate NM Radio-Active iodine Ablation  / notes here***"
                                                        name="Referral[HCREFFERALNOTE][]" style="height: 100px"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_b51">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate Head & Neck Rehab/PhysioTherapy / notes here***"
                                                        name="Referral[HCREFFERALNOTE][]" style="height: 100px"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_b52">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate OTHERS / notes here***" style="height: 100px"
                                                        name="Referral[HCREFFERALNOTE][]"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="action_btns">
                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient draft_btn">SAVE
                            DRAFT</a>
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
                $("#textarea_88").hide();
                $("#formRadiosRight88").click(function() {
                    $("#textarea_88").show();
                });
                $("#formRadiosRight89").click(function() {
                    $("#textarea_88").hide();
                });


                $("#textarea_76").hide();
                $("#formRadiosRight76").click(function() {
                    $("#textarea_76").show();
                });
                $("#formRadiosRight77").click(function() {
                    $("#textarea_76").hide();
                });


                $("#textarea_83").hide();
                $("#formRadiosRight83").click(function() {
                    $("#textarea_83").show();
                });
                $("#formRadiosRight82").click(function() {
                    $("#textarea_83").hide();
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
                    $("#textarea_84").show();
                    $("#textarea_85").hide();
                    $("#textarea_86").hide();
                    $("#textarea_87").hide();
                });
                $("#formRadiosRight85").click(function() {
                    $("#textarea_84").hide();
                    $("#textarea_85").show();
                    $("#textarea_86").hide();
                    $("#textarea_87").hide();
                });
                $("#formRadiosRight86").click(function() {
                    $("#textarea_84").hide();
                    $("#textarea_85").hide();
                    $("#textarea_86").show();
                    $("#textarea_87").hide();
                });
                $("#formRadiosRight87").click(function() {
                    $("#textarea_84").hide();
                    $("#textarea_85").hide();
                    $("#textarea_86").hide();
                    $("#textarea_87").show();
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
                    $("#textarea_90").show();
                    $("#textarea_91").hide();
                    $("#textarea_92").hide();
                    $("#textarea_93").hide();
                });
                $("#formRadiosRight91").click(function() {
                    $("#textarea_90").hide();
                    $("#textarea_91").show();
                    $("#textarea_92").hide();
                    $("#textarea_93").hide();
                });
                $("#formRadiosRight92").click(function() {
                    $("#textarea_90").hide();
                    $("#textarea_91").hide();
                    $("#textarea_92").show();
                    $("#textarea_93").hide();
                });
                $("#formRadiosRight93").click(function() {
                    $("#textarea_90").hide();
                    $("#textarea_91").hide();
                    $("#textarea_92").hide();
                    $("#textarea_93").show();
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
                    $("#textarea_b48").show();
                    $("#textarea_b49").hide();
                    $("#textarea_b50").hide();
                    $("#textarea_b51").hide();
                    $("#textarea_b52").hide();
                });
                $("#formRadiosRightb49").click(function() {
                    $("#textarea_b48").hide();
                    $("#textarea_b49").show();
                    $("#textarea_b50").hide();
                    $("#textarea_b51").hide();
                    $("#textarea_b52").hide();
                });
                $("#formRadiosRightb50").click(function() {
                    $("#textarea_b48").hide();
                    $("#textarea_b49").hide();
                    $("#textarea_b50").show();
                    $("#textarea_b51").hide();
                    $("#textarea_b52").hide();
                });
                $("#formRadiosRightb51").click(function() {
                    $("#textarea_b48").hide();
                    $("#textarea_b49").hide();
                    $("#textarea_b50").hide();
                    $("#textarea_b51").show();
                    $("#textarea_b52").hide();
                });
                $("#formRadiosRightb52").click(function() {
                    $("#textarea_b48").hide();
                    $("#textarea_b49").hide();
                    $("#textarea_b50").hide();
                    $("#textarea_b51").hide();
                    $("#textarea_b52").show();
                });

            })
        </script>

        <script>
            $(document).ready(function() {

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
        </script>
    @endpush
@endsection

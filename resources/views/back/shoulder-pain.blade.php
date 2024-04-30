@extends('back.layout.main_view')
@push('title')
Patient | Shoulder Pain | QASTARAT & DAWALI CLINICS
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
                <form id="storeShoulderPainEligibilityForms" method="POST" action="{{ route('user.storeShoulderPainEligibilityForms') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ @$patient_id }}" />
                    <input type="hidden" name="form_type" value="ShoulderPain"/>

                    <h3 class="form_title">Shoulder  Pain</h3>

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
                                                name="diagnosis_general[GradeI][]" id="formRadiosRight1"
                                                value="Grade I-II OA Shoulder">
                                            <label class="form-check-label" for="formRadiosRight1">
                                                Grade I-II OA Shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[GradeIII][]" id="formRadiosRight2"
                                                value="Grade III-IV OA Shoulder">
                                            <label class="form-check-label" for="formRadiosRight2">
                                                Grade III-IV OA Shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[AdhesiveCapsulitis][]" id="formRadiosRight3"
                                                value="Adhesive Capsulitis">
                                            <label class="form-check-label" for="formRadiosRight3">
                                                Adhesive Capsulitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[FrozenShoulder][]" id="formRadiosRight4"
                                                value="Frozen Shoulder">
                                            <label class="form-check-label" for="formRadiosRight4">
                                                Frozen Shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Nonseptic][]" id="formRadiosRight5"
                                                value="Non-septic Arthritis">
                                            <label class="form-check-label" for="formRadiosRight5">
                                                Non-septic Arthritis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[SepticArthritis][]" id="formRadiosRight6"
                                                value="Septic Arthritis">
                                            <label class="form-check-label" for="formRadiosRight6">
                                                Septic Arthritis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Tendonitis][]" id="formRadiosRight7"
                                                value="Tendonitis">
                                            <label class="form-check-label" for="formRadiosRight7">
                                                Tendonitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Bursitis][]" id="formRadiosRight7CervicalSpndylolysis"
                                                value="Bursitis">
                                            <label class="form-check-label" for="formRadiosRight7CervicalSpndylolysis">
                                                Bursitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ligamentousinjury][]" id="formRadiosRight7CervicalSpndylolylisthesis"
                                                value="ligamentous injury">
                                            <label class="form-check-label" for="formRadiosRight7CervicalSpndylolylisthesis">
                                                ligamentous injury
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="diagnosis_general_checkbox">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Enthesopathy][]" id="formRadiosRight7LumbarRadiculopathy"
                                                value="Enthesopathy">
                                            <label class="form-check-label" for="formRadiosRight7LumbarRadiculopathy">
                                                Enthesopathy
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
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M219][]"
                                                id="formRadiosRight8" value="M21.9 Acquired deformity of limb, unspecified Deformity shoulder (joint) (acquired)">
                                            <label class="form-check-label" for="formRadiosRight8">
                                                M21.9 Acquired deformity of limb, unspecified Deformity shoulder (joint) (acquired)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M242][]"
                                                id="formRadiosRight9" value="M24.2 Disorder of ligament Instability secondary to old ligament injury">
                                            <label class="form-check-label" for="formRadiosRight9">
                                                M24.2 Disorder of ligament Instability secondary to old ligament injury
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M244][]"
                                                id="formRadiosRight10" value="M24.4 Recurrent dislocation and subluxation of ioint">
                                            <label class="form-check-label" for="formRadiosRight10">
                                                M24.4 Recurrent dislocation and subluxation of ioint
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M249][]"
                                                id="formRadiosRight11" value="M24.9 Joint derangement, unspecified Derangement|shoulder (internal)">
                                            <label class="form-check-label" for="formRadiosRight11">
                                                M24.9 Joint derangement, unspecified Derangement|shoulder (internal)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M255][]"
                                                id="formRadiosRight12" value="M25.5 Pain in joint">
                                            <label class="form-check-label" for="formRadiosRight12">
                                                M25.5 Pain in joint
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M256][]"
                                                id="formRadiosRight13" value="M25.6 Stiffness of joint, not elsewhere classified Stiffness, joint|shoulder">
                                            <label class="form-check-label" for="formRadiosRight13">
                                                M25.6 Stiffness of joint, not elsewhere classified Stiffness, joint|shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M658][]"
                                                id="formRadiosRight14" value="M65.8 Other synovitis and tenosynovitis Tendinitis, tendonitis|adhesive">
                                            <label class="form-check-label" for="formRadiosRight14">
                                                M65.8 Other synovitis and tenosynovitis Tendinitis, tendonitis|adhesive
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M659][]"
                                                id="formRadiosRight15" value="M65.9 Synovitis and tenosynovitis, unspecified Disease, diseased|tendon, tendinous inflammatory NEC ">
                                            <label class="form-check-label" for="formRadiosRight15">
                                                M65.9 Synovitis and tenosynovitis, unspecified Disease, diseased|tendon, tendinous inflammatory NEC 
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M665][]"
                                                id="formRadiosRight16" value="M66.5 Spontaneous rupture of unspecified tendon Rupture at musculotendinous junction, nontraumatic">
                                            <label class="form-check-label" for="formRadiosRight16">
                                                M66.5 Spontaneous rupture of unspecified tendon Rupture at musculotendinous junction, nontraumatic
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M678][]"
                                                id="formRadiosRight17" value="M67.8 Other specified disorders of synovium and tendon Disease, diseased tendon, tendinous|specified NEC">
                                            <label class="form-check-label" for="formRadiosRight17">
                                                M67.8 Other specified disorders of synovium and tendon Disease, diseased tendon, tendinous|specified NEC
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M679][]"
                                                id="formRadiosRight18" value="M67.9 Disorder of synovium and tendon, unspecified Disease, diseased tendon, tendinous">
                                            <label class="form-check-label" for="formRadiosRight18">
                                                M67.9 Disorder of synovium and tendon, unspecified Disease, diseased tendon, tendinous
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M708][]"
                                                id="formRadiosRight19M510" value="M70.8 Other soft tissue disorders related to use, overuse and pressure Tendinitis, tendonitis|due to use, overuse, pressure|specified NEC">
                                            <label class="form-check-label" for="formRadiosRight19M510">
                                                M70.8 Other soft tissue disorders related to use, overuse and pressure Tendinitis, tendonitis|due to use, overuse, pressure|specified NEC
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M709][]"
                                                id="formRadiosRight19M511" value="M70.9 Unspecified soft tissue disorder related to use, overuse and pressure Tendinitis, tendonitis|due to use, overuse, pressure">
                                            <label class="form-check-label" for="formRadiosRight19M511">
                                                M70.9 Unspecified soft tissue disorder related to use, overuse and pressure Tendinitis, tendonitis|due to use, overuse, pressure
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M719][]"
                                                id="formRadiosRight19M512" value="M71.9 Bursopathy, unspecified Bursitis NOS">
                                            <label class="form-check-label" for="formRadiosRight19M512">
                                                M71.9 Bursopathy, unspecified Bursitis NOS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M750][]"
                                                id="formRadiosRight19M519" value="M75.0 Adhesive capsulitis of shoulder Frozen shoulder">
                                            <label class="form-check-label" for="formRadiosRight19M519">
                                                M75.0 Adhesive capsulitis of shoulder Frozen shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M752][]"
                                                id="formRadiosRight19M541" value="M75.2 Bicipital tendinitis">
                                            <label class="form-check-label" for="formRadiosRight19M541">
                                                M75.2 Bicipital tendinitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M753][]"
                                                id="formRadiosRight19M542" value="M75.3 Calcific tendinitis of shoulder">
                                            <label class="form-check-label" for="formRadiosRight19M542">
                                                M75.3 Calcific tendinitis of shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M754][]"
                                                id="formRadiosRight19M530" value="M75.4 Impingement syndrome of shoulder">
                                            <label class="form-check-label" for="formRadiosRight19M530">
                                                M75.4 Impingement syndrome of shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M755][]"
                                                id="formRadiosRight19M545" value="M75.5 Bursitis of shoulder">
                                            <label class="form-check-label" for="formRadiosRight19M545">
                                                M75.5 Bursitis of shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M756][]"
                                                id="formRadiosRight19Q765" value="M75.6 Tear of labrum of degenerative shoulder joint">
                                            <label class="form-check-label" for="formRadiosRight19Q765">
                                                M75.6 Tear of labrum of degenerative shoulder joint
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M758][]"
                                                id="formRadiosRight19S122" value="M75.8 Other shoulder lesions">
                                            <label class="form-check-label" for="formRadiosRight19S122">
                                                M75.8 Other shoulder lesions
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M759][]"
                                                id="formRadiosRight19S127" value="M75.9 Shoulder lesion, unspecified">
                                            <label class="form-check-label" for="formRadiosRight19S127">
                                                M75.9 Shoulder lesion, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M7791][]"
                                                id="formRadiosRight19S131" value="M77.9 Enthesopathy, unspecified Tendinitis NOS">
                                            <label class="form-check-label" for="formRadiosRight19S131">
                                                M77.9 Enthesopathy, unspecified Tendinitis NOS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M779][]"
                                                id="formRadiosRight19S134" value="M77.9 Enthesopathy, unspecified Capsulitis (joint) adhesive">
                                            <label class="form-check-label" for="formRadiosRight19S134">
                                                M77.9 Enthesopathy, unspecified Capsulitis (joint) adhesive
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M932][]"
                                                id="formRadiosRight19M932" value="M93.2 Osteochondritis dissecans Osteochondrosis dissecans (knee) (shoulder)">
                                            <label class="form-check-label" for="formRadiosRight19M932">
                                                M93.2 Osteochondritis dissecans Osteochondrosis dissecans (knee) (shoulder)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Q740][]"
                                                id="formRadiosRight19Q740" value="Q74.0 Other congenital malformations of upper limb(s), including shoulder girdle">
                                            <label class="form-check-label" for="formRadiosRight19Q740">
                                                Q74.0 Other congenital malformations of upper limb(s), including shoulder girdle
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S40][]"
                                                id="formRadiosRight19S40" value="S40 Superficial injury of shoulder and upper arm">
                                            <label class="form-check-label" for="formRadiosRight19S40">
                                                S40 Superficial injury of shoulder and upper arm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S400][]"
                                                id="formRadiosRight19S400" value="S40.0 Contusion of shoulder and upper arm">
                                            <label class="form-check-label" for="formRadiosRight19S400">
                                                S40.0 Contusion of shoulder and upper arm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S409][]"
                                                id="formRadiosRight19S409" value="S40.9 Superficial injury of shoulder and upper arm, unspecified">
                                            <label class="form-check-label" for="formRadiosRight19S409">
                                                S40.9 Superficial injury of shoulder and upper arm, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S41][]"
                                                id="formRadiosRight19S41" value="S41 Open wound of shoulder and upper arm">
                                            <label class="form-check-label" for="formRadiosRight19S41">
                                                S41 Open wound of shoulder and upper arm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S410][]"
                                                id="formRadiosRight19S410" value="S41.0 Open wound of shoulder">
                                            <label class="form-check-label" for="formRadiosRight19S410">
                                                S41.0 Open wound of shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S42][]"
                                                id="formRadiosRight19S42" value="S42 Fracture of shoulder and upper arm">
                                            <label class="form-check-label" for="formRadiosRight19S42">
                                                S42 Fracture of shoulder and upper arm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S421][]"
                                                id="formRadiosRight19S421" value="S42.1 Fracture of scapula">
                                            <label class="form-check-label" for="formRadiosRight19S421">
                                                S42.1 Fracture of scapula
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S429][]"
                                                id="formRadiosRight19S429" value="S42.9 Fracture of shoulder girdle, part unspecified">
                                            <label class="form-check-label" for="formRadiosRight19S429">
                                                S42.9 Fracture of shoulder girdle, part unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S430][]"
                                                id="formRadiosRight19S429" value="S43.0 Dislocation of shoulder joint">
                                            <label class="form-check-label" for="formRadiosRight19S429">
                                                S43.0 Dislocation of shoulder joint
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S433][]"
                                                id="formRadiosRight19S429" value="S43.3 Dislocation of other and unspecified parts of shoulder girdle">
                                            <label class="form-check-label" for="formRadiosRight19S429">
                                                S43.3 Dislocation of other and unspecified parts of shoulder girdle
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S434][]"
                                                id="formRadiosRight19S429" value="S43.4 Sprain and strain of shoulder joint">
                                            <label class="form-check-label" for="formRadiosRight19S429">
                                                S43.4 Sprain and strain of shoulder joint
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S437][]"
                                                id="formRadiosRight19S429" value="S43.7 Sprain and strain of other and unspecified parts of shoulder girdle">
                                            <label class="form-check-label" for="formRadiosRight19S429">
                                                S43.7 Sprain and strain of other and unspecified parts of shoulder girdle
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S49][]"
                                                id="formRadiosRight19S429" value="S49 Other and unspecified injuries of shoulder and upper arm">
                                            <label class="form-check-label" for="formRadiosRight19S429">
                                                S49 Other and unspecified injuries of shoulder and upper arm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="Postpartum_thyroiditis">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S497][]"
                                                id="formRadiosRight19S429" value="S49.7 Multiple injuries of shoulder and upper arm">
                                            <label class="form-check-label" for="formRadiosRight19S429">
                                                S49.7 Multiple injuries of shoulder and upper arm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
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
                                                        value="Shoulder pain">
                                                    <label class="form-check-label" for="sym_a1">
                                                        Shoulder pain
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
                                                        name="symptoms[1][0]" id="sym_a2" value="Shoulder joint Stiffness">
                                                    <label class="form-check-label" for="sym_a2">
                                                        Shoulder joint Stiffness
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
                                                        name="symptoms[2][0]" value="Shoulder Muscle Spasm">
                                                    <label class="form-check-label" for="sym_a3">
                                                        Shoulder Muscle Spasm
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
                                                        value="Pain to distal arm">
                                                    <label class="form-check-label" for="sym_a4">
                                                        Pain to distal arm
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
                                                        name="symptoms[4][0]" id="sym_a5" value="Numbness on lifting weight">
                                                    <label class="form-check-label" for="sym_a5">
                                                        Numbness on lifting weight
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
                                                        name="symptoms[5][0]" value="Pain on lifting weight"
                                                        id="sym_a75">
                                                    <label class="form-check-label" for="sym_a75">
                                                        Pain on lifting weight
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
                                                        name="symptoms[6][0]" value="Warm Shoulder"
                                                        id="sym_a7">
                                                    <label class="form-check-label" for="sym_a7">
                                                        Warm Shoulder
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
                                        <div class="title_head">
                                            <h6 class="section_title__">Symptoms Severity Score (SSS)</h6>
                                            <h4>Shoulder OA score (SOAS)</h4>
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
                                                    <td>Shoulder pain</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Shoulderpain][]"
                                                                id="formRadiosRight14" value="0">
                                                            <label class="form-check-label" for="formRadiosRight14">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Shoulderpain][]"
                                                                id="formRadiosRight15" value="1">
                                                            <label class="form-check-label" for="formRadiosRight15">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Shoulderpain][]"
                                                                id="formRadiosRight16" value="3">
                                                            <label class="form-check-label" for="formRadiosRight16">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Shoulderpain][]"
                                                                id="formRadiosRight171" value="5">
                                                            <label class="form-check-label" for="formRadiosRight171">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Shoulder joint Stiffness</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ShoulderjointStiffness][]"
                                                                id="formRadiosRight18" value="0">
                                                            <label class="form-check-label" for="formRadiosRight18">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ShoulderjointStiffness][]"
                                                                id="formRadiosRight19" value="1">
                                                            <label class="form-check-label" for="formRadiosRight19">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ShoulderjointStiffness][]"
                                                                id="formRadiosRight20" value="3">
                                                            <label class="form-check-label" for="formRadiosRight20">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ShoulderjointStiffness][]"
                                                                id="formRadiosRight21" value="5">
                                                            <label class="form-check-label" for="formRadiosRight21">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Shoulder Muscle Spasm</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ShoulderMuscleSpasm][]"
                                                                id="formRadiosRight22" value="0">
                                                            <label class="form-check-label" for="formRadiosRight22">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ShoulderMuscleSpasm][]"
                                                                id="formRadiosRight23" value="1">
                                                            <label class="form-check-label" for="formRadiosRight23">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ShoulderMuscleSpasm][]"
                                                                id="formRadiosRight24" value="3">
                                                            <label class="form-check-label" for="formRadiosRight24">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ShoulderMuscleSpasm][]"
                                                                id="formRadiosRight25" value="5">
                                                            <label class="form-check-label" for="formRadiosRight25">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Pain to distal arm</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Paintodistalarm][]"
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
                                                                name="symptoms_score[Paintodistalarm][]"
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
                                                                name="symptoms_score[Paintodistalarm][]"
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
                                                                name="symptoms_score[Paintodistalarm][]"
                                                                id="formRadiosRight29" value="5">
                                                            <label class="form-check-label" for="formRadiosRight29">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Numbness on lifting weight</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Numbnessonliftingweight][]"
                                                                id="formRadiosRight30" value="0">
                                                            <label class="form-check-label" for="formRadiosRight30">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Numbnessonliftingweight][]"
                                                                id="formRadiosRight31" value="1">
                                                            <label class="form-check-label" for="formRadiosRight31">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Numbnessonliftingweight][]"
                                                                id="formRadiosRight32" value="3">
                                                            <label class="form-check-label" for="formRadiosRight32">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Numbnessonliftingweight][]"
                                                                id="formRadiosRight33" value="5">
                                                            <label class="form-check-label" for="formRadiosRight33">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Pain on lifting weight</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painonliftingweight][]"
                                                                id="formRadiosRight34" value="0">
                                                            <label class="form-check-label" for="formRadiosRight34">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painonliftingweight][]"
                                                                id="formRadiosRight35" value="1">
                                                            <label class="form-check-label" for="formRadiosRight35">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painonliftingweight][]"
                                                                id="formRadiosRight36" value="3">
                                                            <label class="form-check-label" for="formRadiosRight36">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painonliftingweight][]"
                                                                id="formRadiosRight37" value="5">
                                                            <label class="form-check-label" for="formRadiosRight37">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Warm Shoulder</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[WarmShoulder][]"
                                                                id="formRadiosRight34WarmShoulder" value="0">
                                                            <label class="form-check-label" for="formRadiosRight34WarmShoulder">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[WarmShoulder][]"
                                                                id="formRadiosRight35WarmShoulder" value="1">
                                                            <label class="form-check-label" for="formRadiosRight35WarmShoulder">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[WarmShoulder][]"
                                                                id="formRadiosRight36WarmShoulder" value="3">
                                                            <label class="form-check-label" for="formRadiosRight36WarmShoulder">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[WarmShoulder][]"
                                                                id="formRadiosRight37WarmShoulder" value="5">
                                                            <label class="form-check-label" for="formRadiosRight37WarmShoulder">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                
                                                
                                                
                                                <tr id="mildLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Mild LUTS </th>
                                                    <th>(0-15 pts)</th>
                                                </tr>
                                                <tr id="moderateLUTS" class="hidden">>
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Moderate LUTS </th>
                                                    <th>(16-30 pts)</th>
                                                </tr>
                                                <tr id="severeLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Severe LUTS </th>
                                                    <th>(31-50 pts)</th>
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
                                                <h6 class="mb-3 lut_title">Septic Shoulder (acute pain | acute fever | acute swelling | acute redness)</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Softtissue][]" id="formRadiosRight042"
                                                        value="YES">
                                                    <label class="form-check-label" for="formRadiosRight042">
                                                        YES(Contra-indication)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Softtissue][]" id="formRadiosRight043Softtissue"
                                                        value="No">
                                                    <label class="form-check-label" for="formRadiosRight043Softtissue">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Shoulder Prosthesis</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[ShoulderProsthesis][]" id="formRadiosRight042ShoulderProsthesis"
                                                        value="YES">
                                                    <label class="form-check-label" for="formRadiosRight042ShoulderProsthesis">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[ShoulderProsthesis][]" id="formRadiosRight043ShoulderProsthesis"
                                                        value="No">
                                                    <label class="form-check-label" for="formRadiosRight043ShoulderProsthesis">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>     
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Post-op seroma / spine collection</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[seroma][]" id="formRadiosRight042seroma"
                                                        value="YES">
                                                    <label class="form-check-label" for="formRadiosRight042seroma">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[seroma][]" id="formRadiosRight043seroma"
                                                        value="No">
                                                    <label class="form-check-label" for="formRadiosRight043seroma">
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
                            <h6 class="section_title__">Imaging <a href="javascript:void(0)" class="order-now_btn order-now_btn_alt">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
                          </div>
                          
                          <div class="col-lg-12">
                              <div class="title_head">
                                  <h4>USMSK60    &gt; <span class="sub_tt__"> </span></h4>
                              </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">US - MSK (joint - Soft tissue ) Findings </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[Softtissue][]" value="Normal" id="formRadiosRighte13">
                                        <label class="form-check-label" for="formRadiosRighte13">
                                        Normal
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[Softtissue][]" value="Abnormal" id="formRadiosRighte14">
                                        <label class="form-check-label" for="formRadiosRighte14">
                                        Abnormal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_e14" style="display: none;">
                                    <div class="mb-3 form-group">
                                        <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
                                        <textarea class="form-control" placeholder="" style="height: 100px" name="Imaging[SofttissueNote][]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>USNERVEMAPPING70 > US- Nerves Mapping    &gt; <span class="sub_tt__"> </span></h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Nerve impegment (Affected nerve) </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[Affectednerve][]" value="Visible"  id="formRadiosRightd38">
                                        <label class="form-check-label" for="formRadiosRightd38">
                                        Visible
                                        </label>
                                    </div>
                                </div>

                               
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[Affectednerve][]" value="Non-Visible"  id="formRadiosRightd119">
                                        <label class="form-check-label" for="formRadiosRightd119">
                                            Non-Visible
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_119" style="display: none;">
                                <div class="text_area_gfhi mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate Rheumatology / notes here***" style="height: 100px" name="Imaging[AffectednerveNote][]"></textarea>
                                </div>
                            </div>

                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Shoulder effusion</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[Shouldereffusion][]" value="Yes" id="formRadiosRightd14">
                                        <label class="form-check-label" for="formRadiosRightd14">
                                        Yes
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[Shouldereffusion][]" value="No" id="formRadiosRightd15">
                                        <label class="form-check-label" for="formRadiosRightd15">
                                        No
                                        </label>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Osteoarthretic features </h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[Osteoarthreticfeatures][]" value="Yes" id="formRadiosRightd39">
                                        <label class="form-check-label" for="formRadiosRightd39">
                                        Yes
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[Osteoarthreticfeatures][]" value="No" id="formRadiosRightd40">
                                        <label class="form-check-label" for="formRadiosRightd40">
                                       No
                                        </label>
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                                 
                          <div class="col-lg-12">
                              <div class="title_head">
                                  <h4>MRCIR48   &gt; <span class="sub_tt__"></span></h4>
                              </div>
                          </div> 
                          
                         
                          <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">MRI - Spine Protocol- Findings</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[MRCIR48][]" value="Normal" id="formRadiosRighte15">
                                        <label class="form-check-label" for="formRadiosRighte15">
                                        Normal
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[MRCIR48][]" value="Abnormal" id="formRadiosRighte16">
                                        <label class="form-check-label" for="formRadiosRighte16">
                                        Abnormal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_e16" style="">
                                    <div class="mb-3 form-group">
                                        <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
                                        <textarea class="form-control" placeholder="" style="height: 100px"  name="Imaging[MRCIR48Note][]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        

                        

                       
                        
                      <div class="col-lg-12">
                        <div class="title_head">
                            <h4>CTCIR48  &gt; <span class="sub_tt__">
                            </span></h4>
                        </div>
                    </div> 
                    
                   
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-4">
                      <h6 class="mb-3 lut_title">CT - Spine Protocol- Findings </h6>
                    </div>
                    <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[CTCIR48][]" value="Normal" id="formRadiosRighte17">
                                    <label class="form-check-label" for="formRadiosRighte17">
                                    Normal
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[CTCIR48][]" value="Abnormal" id="formRadiosRighte18">
                                    <label class="form-check-label" for="formRadiosRighte18">
                                   Abnormal
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_e18" style="display: none;">
                                <div class="mb-3 form-group">
                                    <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
                                    <textarea class="form-control" placeholder="" style="height: 100px" name="Imaging[CTCIR48Note][]"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                  


                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Image Annotation</h6>
                                        <div class="title_head">
                                            <h4>Annotate Knee findings</h4>
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
                                            <button class="btn r-04 btn--theme hover--tra-black add_patient"
                                                id="draw-mode" type="button">Draw</button>
                                            <button class="btn r-04 btn--theme hover--tra-black add_patient"
                                                id="annotate-mode" type="button">Annotate</button>
                                            <button class="btn r-04 btn--theme hover--tra-black add_patient"
                                                id="download-image" type="button">Download</button>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Lab <a href="javascript:void(0)" class="order-now_btn order-now_btn_alt">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
                                      </div>
                                        <div class="col-lg-12">
                                          <div class="title_head">
                                              <h4>LABACUTEMSK35     &gt; <span class="sub_tt__"> Acute MSK inflammation Results</span></h4>
                                          </div>
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                           <div class="row">
                                              <div class="col-lg-3">
                                              <h6 class="mb-3 lut_title">CBC</h6>
                                              </div>  
                                              <div class="col-lg-6">
                                                  <div class="lab_test_value">
                                                      <select  class="tshRange" name="Lab[CBC][]">
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
                                              <h6 class="mb-3 lut_title">CRP</h6>
                                              </div>  
                                              <div class="col-lg-6">
                                                  <div class="lab_test_value">
                                                      <select  class="tshRange" name="Lab[CRP][]">
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
                                               <h6 class="mb-3 lut_title">ESR</h6>
                                               </div>  
                                               <div class="col-lg-6">
                                                   <div class="lab_test_value">
                                                       <select  class="tshRange" name="Lab[ESR][]">
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
                                                   <h6 class="mb-3 lut_title">CKMP</h6>
                                                   </div>  
                                                   <div class="col-lg-6">
                                                       <div class="lab_test_value">
                                                           <select  class="tshRange" name="Lab[CKMP][]">
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
                                                       <h6 class="mb-3 lut_title">Uric Acid</h6>
                                                       </div>  
                                                       <div class="col-lg-6">
                                                           <div class="lab_test_value">
                                                               <select  class="tshRange" name="Lab[UricAcid][]">
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
                                                           <h6 class="mb-3 lut_title">RF</h6>
                                                           </div>  
                                                           <div class="col-lg-6">
                                                               <div class="lab_test_value">
                                                                   <select  class="tshRange" name="Lab[RF][]">
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
                                                                <h4>LABJFA15    &gt; <span class="sub_tt__"> Joint Fluid Analysis Results</span></h4>
                                                            </div>
                                                          </div>
                                                          <div class="col-lg-12 mb-3">
                                                             <div class="row">
                                                                <div class="col-lg-3">
                                                                <h6 class="mb-3 lut_title">WBC</h6>
                                                                </div>  
                                                                <div class="col-lg-6">
                                                                    <div class="lab_test_value">
                                                                        <select  class="tshRange" name="Lab[WBC][]">
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
                                                                   <h6 class="mb-3 lut_title">Proteins</h6>
                                                                   </div>  
                                                                   <div class="col-lg-6">
                                                                       <div class="lab_test_value">
                                                                           <select  class="tshRange" name="Lab[Proteins][]">
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
                                                                       <h6 class="mb-3 lut_title">Glucose</h6>
                                                                       </div>  
                                                                       <div class="col-lg-6">
                                                                           <div class="lab_test_value">
                                                                               <select  class="tshRange" name="Lab[Glucose][]">
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
                                                                           <h6 class="mb-3 lut_title">Crystals</h6>
                                                                           </div>  
                                                                           <div class="col-lg-6">
                                                                               <div class="lab_test_value">
                                                                                   <select  class="tshRange" name="Lab[Crystals][]">
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
                                                                               <h6 class="mb-3 lut_title">Lactate</h6>
                                                                               </div>  
                                                                               <div class="col-lg-6">
                                                                                   <div class="lab_test_value">
                                                                                       <select  class="tshRange" name="Lab[Lactate][]">
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
                                                       
                                                        

                                    <div class="col-lg-12  mb-2">
                                        <h6 class="section_title__">Special Investigation <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#refer_patient" class="order-now_btn">Reffer <i class="fa-solid fa-arrow-right-long"></i></a></h6>
                                        <div class="title_head">
                                              <h4>REQNERVECON5</h4>
                                          </div>
                                    
                                          <div class="row align-items-center">
                                          <div class="col-lg-4">
                                              <h6 class="mb-3 lut_title">Peripheral Nerve conduction study</h6>
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
                                        <h6 class="section_title__">MDT <a href="javascript:void(0)"
                                                class="order-now_btn order-now_btn_alt">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
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
                                                        <input class="form-check-input" type="checkbox" name="MDT[IRprocedure][]" value="IR procedure" id="formRadiosRight84">
                                                        <label class="form-check-label" for="formRadiosRight84">
                                                            IR procedure
                                                        </label>
                                                    </div>
                                                    <div  id="textarea_84">
                                                    <div class="form-check form-check-right mb-3">
                                                      <textarea class="form-control" placeholder="Enter Elaborate    IR procedure / notes here***"  style="height: 100px" name="MDT[IRprocedureNote][]"></textarea>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="checkbox" name="MDT[Medical][]" value="Medical"  id="formRadiosRight85">
                                                        <label class="form-check-label" for="formRadiosRight85">
                                                            Medical / conservative
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
                                                        <input class="form-check-input" type="checkbox" name="MDT[Surgical][]" value="Surgical" id="formRadiosRight86">
                                                        <label class="form-check-label" for="formRadiosRight86">
                                                        Surgical
                                                        </label>
                                                    </div>
                                                    <div  id="textarea_86">
                                                    <div class="form-check form-check-right mb-3">
                                                      <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***"  style="height: 100px" name="MDT[SurgicalNote][]"></textarea>
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
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">conservative - Topical Riparil&nbsp;</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[TopicalRiparil][]" value="Non-Eligibile" id="formRadiosRightj1">
                                                        <label class="form-check-label" for="formRadiosRightj1">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[TopicalRiparil][]" value="Eligibile" id="formRadiosRightj2">
                                                        <label class="form-check-label" for="formRadiosRightj2">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j2" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[TopicalRiparilNote][]"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">conservative - Topical Analgesics&nbsp;</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[TopicalAnalgesics][]" value="Non-Eligibile" id="formRadiosRightj3">
                                                        <label class="form-check-label" for="formRadiosRightj3">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[TopicalAnalgesics][]" value="Eligibile" id="formRadiosRightj4">
                                                        <label class="form-check-label" for="formRadiosRightj4">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j4" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[TopicalAnalgesicsNote][]"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">conservative - PO Analgesics</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[POAnalgesics][]" value="Non-Eligibile" id="formRadiosRightj5">
                                                        <label class="form-check-label" for="formRadiosRightj5">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[POAnalgesics][]" value="Eligibile" id="formRadiosRightj6">
                                                        <label class="form-check-label" for="formRadiosRightj6">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j6" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[POAnalgesicsNote][]"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">conservative - PO Glucasamine / Chondroitin</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Chondroitin][]" value="Non-Eligibile"  id="formRadiosRightj7">
                                                        <label class="form-check-label" for="formRadiosRightj7">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Chondroitin][]" value="Eligibile"  id="formRadiosRightj8">
                                                        <label class="form-check-label" for="formRadiosRightj8">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j8" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[ChondroitinNote][]"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">conservative - PO Collagen</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio"  name="ElegibilitySTATUS[POCollagen][]" value="Non-Eligibile"  id="formRadiosRightj9">
                                                        <label class="form-check-label" for="formRadiosRightj9">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio"  name="ElegibilitySTATUS[POCollagen][]" value="Eligibile"  id="formRadiosRightj10">
                                                        <label class="form-check-label" for="formRadiosRightj10">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j10" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[POCollagenNote][]"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">conservative - IV Vitamines</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[conservativeVitamines][]" value="Non-Eligibile" id="formRadiosRightj11">
                                                        <label class="form-check-label" for="formRadiosRightj11">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[conservativeVitamines][]" value="Eligibile" id="formRadiosRightj12">
                                                        <label class="form-check-label" for="formRadiosRightj12">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j12" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[conservativeVitaminesNote][]"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">conservative - IM Nurobion</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[conservativeIMNurobion][]" value="Non-Eligibile" id="formRadiosRightj13">
                                                        <label class="form-check-label" for="formRadiosRightj13">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[conservativeIMNurobion][]" value="Eligibile" id="formRadiosRightj14">
                                                        <label class="form-check-label" for="formRadiosRightj14">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j14" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[conservativeIMNurobionNote][]" ></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">conservative - IM Collagen</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio"  name="ElegibilitySTATUS[conservativeIMCollagen][]" value="Non-Eligibile" id="formRadiosRightj15">
                                                        <label class="form-check-label" for="formRadiosRightj15">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio"  name="ElegibilitySTATUS[conservativeIMCollagen][]" value="Eligibile" id="formRadiosRightj16">
                                                        <label class="form-check-label" for="formRadiosRightj16">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j16" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[conservativeIMCollagenNote][]"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Trigger point injection</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Triggerpointinjection][]" value="Non-Eligibile"  id="formRadiosRightj19">
                                                        <label class="form-check-label" for="formRadiosRightj19">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Triggerpointinjection][]" value="Eligibile"  id="formRadiosRightj20">
                                                        <label class="form-check-label" for="formRadiosRightj20">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j20" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[TriggerpointinjectionNote][]" ></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Steroids injection</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Steroidsinjection][]" value="Non-Eligibile" id="formRadiosRightj17">
                                                        <label class="form-check-label" for="formRadiosRightj17">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Steroidsinjection][]" value="Eligibile" id="formRadiosRightj18">
                                                        <label class="form-check-label" for="formRadiosRightj18">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j18" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[SteroidsinjectionNote][]"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">HA injection </h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[HAinjection][]" value="Non-Eligibile" id="formRadiosRightj23">
                                                        <label class="form-check-label" for="formRadiosRightj23">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[HAinjection][]" value="Eligibile"  id="formRadiosRightj24">
                                                        <label class="form-check-label" for="formRadiosRightj24">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j24" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[HAinjectionNote][]"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">PRP injection </h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[PRPinjection][]" value="Non-Eligibile"  id="formRadiosRightj21">
                                                        <label class="form-check-label" for="formRadiosRightj21">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[PRPinjection][]" value="Eligibile"  id="formRadiosRightj22">
                                                        <label class="form-check-label" for="formRadiosRightj22">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j22" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[PRPinjectionNote][]"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Ozone IA injection</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[OzoneIAinjection][]" value="Non-Eligibile" id="formRadiosRightj25">
                                                        <label class="form-check-label" for="formRadiosRightj25">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[OzoneIAinjection][]" value="Eligibile" id="formRadiosRightj26">
                                                        <label class="form-check-label" for="formRadiosRightj26">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j26" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[OzoneIAinjectionNote][]"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Nerve RF Ablation </h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveRFAblation][]" value="Non-Eligibile" id="formRadiosRightj27">
                                                        <label class="form-check-label" for="formRadiosRightj27">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveRFAblation][]" value="Eligibile" id="formRadiosRightj28">
                                                        <label class="form-check-label" for="formRadiosRightj28">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j28" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[NerveRFAblationNote][]" ></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Nerve Cooled RF </h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCooledRF][]" value="Non-Eligibile" id="formRadiosRightj27NerveCooledRF">
                                                        <label class="form-check-label" for="formRadiosRightj27NerveCooledRF">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCooledRF][]" value="Eligibile" id="formRadiosRightj28NerveCooledRF">
                                                        <label class="form-check-label" for="formRadiosRightj28NerveCooledRF">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j28" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[NerveCooledRFNote][]" ></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Nerve Cryotherapy </h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCryotherapy][]" value="Non-Eligibile" id="formRadiosRightj27NerveCryotherapy">
                                                        <label class="form-check-label" for="formRadiosRightj27NerveCryotherapy">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCryotherapy][]" value="Eligibile" id="formRadiosRightj28NerveCryotherapy">
                                                        <label class="form-check-label" for="formRadiosRightj28NerveCryotherapy">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j28" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[NerveCryotherapyNote][]" ></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Shoulder Embolization</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[ShoulderEmbolization][]" value="Non-Eligibile" id="formRadiosRightj27ShoulderEmbolization">
                                                        <label class="form-check-label" for="formRadiosRightj27ShoulderEmbolization">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[ShoulderEmbolization][]" value="Eligibile" id="formRadiosRightj28ShoulderEmbolization">
                                                        <label class="form-check-label" for="formRadiosRightj28ShoulderEmbolization">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j28" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[ShoulderEmbolizationNote][]" ></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Others </h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Others][]" value="Non-Eligibile"  id="formRadiosRightj38">
                                                        <label class="form-check-label" for="formRadiosRightj38">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Others][]" value="Eligibile"  id="formRadiosRightj39">
                                                        <label class="form-check-label" for="formRadiosRightj39">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j39" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[OthersNote][]"></textarea>
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
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">USSINJECTION190</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[USSINJECTION190LABPREIRBASIC32][]" value="LABPREIRBASIC32"  id="formRadiosRightf70">
                                                    <label class="form-check-label" for="formRadiosRightf70">
                                                    LABPREIRBASIC32
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[USSINJECTION190LABPREIRSAFETY17][]" value="LABPREIRSAFETY17"  id="formRadiosRightf71">
                                                    <label class="form-check-label" for="formRadiosRightf71">
                                                    LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">USPRPINJECTION280</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[USPRPINJECTION280LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightf72">
                                                    <label class="form-check-label" for="formRadiosRightf72">
                                                    LABPREIRBASIC32
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[USPRPINJECTION280LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf73">
                                                    <label class="form-check-label" for="formRadiosRightf73">
                                                    LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">USHAINJECTION310</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[USHAINJECTION310LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightf73">
                                                    <label class="form-check-label" for="formRadiosRightf73">
                                                    LABPREIRBASIC32
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[USHAINJECTION310LABPREIRSAFETY17][]"  value="LABPREIRSAFETY17" id="formRadiosRightf74">
                                                    <label class="form-check-label" for="formRadiosRightf74">
                                                    LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">USIAOOZINJECTION340</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[USIAOOZINJECTION340LABPREIRBASIC32][]"  value="LABPREIRBASIC32" id="formRadiosRightf75">
                                                    <label class="form-check-label" for="formRadiosRightf75">
                                                    LABPREIRBASIC32
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[USIAOOZINJECTION340LABPREIRSAFETY17][]"  value="LABPREIRSAFETY17" id="formRadiosRightf76">
                                                    <label class="form-check-label" for="formRadiosRightf76">
                                                    LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">USRFABLATION490</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[USRFABLATION490LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightf77">
                                                    <label class="form-check-label" for="formRadiosRightf77">
                                                        LABPREIRBASIC32
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[USRFABLATION490LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf78">
                                                    <label class="form-check-label" for="formRadiosRightf78">
                                                    LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">ANGIOSHE2310</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOSHE2310LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightf77ANGIOSHE2310LABPREANGIO48">
                                                    <label class="form-check-label" for="formRadiosRightf77ANGIOSHE2310LABPREANGIO48">
                                                        LABPREANGIO48
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOSHE2310LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf78ANGIOSHE2310LABPREIRSAFETY17">
                                                    <label class="form-check-label" for="formRadiosRightf78ANGIOSHE2310LABPREIRSAFETY17">
                                                    LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOSHE2310IVSEDATION270][]" value="IVSEDATION270" id="formRadiosRightf78ANGIOSHE2310IVSEDATION270">
                                                    <label class="form-check-label" for="formRadiosRightf78ANGIOSHE2310IVSEDATION270">
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
                                                        name="Supportive[IVVITAPAIN175][]" value="IVVITAPAIN175" id="formRadiosRightb45">
                                                    <label class="form-check-label" for="formRadiosRightb45">
                                                        IVVITAPAIN175
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[LABPREIVBASIC52][]" value="LABPREIVBASIC52" id="formRadiosRightb45LABPREIVBASIC52">
                                                    <label class="form-check-label" for="formRadiosRightb45LABPREIVBASIC52">
                                                        LABPREIVBASIC52
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                    name="Supportive[IMNEUROBION19][]" value="IMNEUROBION19" id="formRadiosRightb46">
                                                    <label class="form-check-label" for="formRadiosRightb46">
                                                        IMNEUROBION19
                                                    </label>
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-3" >
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                    name="Supportive[IMCOLLAGEN110][]" value="IMCOLLAGEN110" id="formRadiosRightb47">
                                                    <label class="form-check-label" for="formRadiosRightb47">
                                                        IMCOLLAGEN110
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3" >
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                    name="Supportive[SCSB28][]" value="SCSB28" id="formRadiosRightb47SCSB28">
                                                    <label class="form-check-label" for="formRadiosRightb47SCSB28">
                                                        SCSB28
                                                    </label>
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-3" id="Supportive" >
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                    name="Supportive[SCICEB11][]" value="SCICEB11" id="formRadiosRightb47SCICEB11">
                                                    <label class="form-check-label" for="formRadiosRightb47SCICEB11">
                                                        SCICEB11
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
                                        <h6 class="section_title__">Prescription <a href="javascript:void(0)" class="order-now_btn order-now_btn_alt">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
                                        <div class="title_head">
                                              <h4>ADD A DRUG </h4>
                                          </div>
                                      </div>
                                      <div class="row">
                                      <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Glucasamine][]" value="Glucasamine Chondroitin Tab -1 tab PO BID x 2 months">
                                                <label class="form-check-label" for="formRadiosRightf90">
                                                    Glucasamine Chondroitin Tab -1 tab PO BID x 2 months
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Collagen][]" value="Collagen Suppliment (powder / liquid) - 1 scoop / 1 saschet PO OD x 3 months" id="formRadiosRightf91">
                                                <label class="form-check-label" for="formRadiosRightf91">
                                                Collagen Suppliment (powder / liquid) - 1 scoop / 1 saschet PO OD x 3 months
                                                </label>    
                                        </div>
                                    </div>
                                      </div>
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Diclofenac][]" value="Diclofenac Gel 1 Ampule -Topical TID x 2 weeks" id="formRadiosRightf92">
                                                <label class="form-check-label" for="formRadiosRightf92">
                                                Diclofenac Gel 1 Ampule -Topical TID x 2 weeks
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Lidocaine][]" value="Lidocaine Patch - 1 Patch Topical OD X 2 weeks" id="formRadiosRightf93">
                                                <label class="form-check-label" for="formRadiosRightf93">
                                                Lidocaine Patch - 1 Patch Topical OD X 2 weeks
                                                </label>    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Celebrix][]" value="Celebrix Tab - 200 mg PO BID x 1 month" id="formRadiosRightf94Celebrix">
                                                <label class="form-check-label" for="formRadiosRightf94Celebrix">
                                                Celebrix Tab - 200 mg PO BID x 1 month
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Riparil][]" value="Riparil Gel 1 Ampule - Topical TID x 2 weeks" id="formRadiosRightf94Riparil">
                                                <label class="form-check-label" for="formRadiosRightf94Riparil">
                                                Riparil Gel 1 Ampule - Topical TID x 2 weeks
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Sporidex][]" value="Sporidex (Cephalexin) Tab - 500 mg PO BID x 5 days" id="formRadiosRightf94Sporidex">
                                                <label class="form-check-label" for="formRadiosRightf94Sporidex">
                                                Sporidex (Cephalexin) Tab - 500 mg PO BID x 5 days
                                                </label>    
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
                                                        name="Referral[Rheumatology][]" value="Rheumatology" id="formRadiosRightb48">
                                                    <label class="form-check-label" for="formRadiosRightb48">
                                                        Rheumatology
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b48">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[RheumatologyNote][]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="Referral[OrthopedicsSurgery][]" value="Orthopedics Surgery" id="formRadiosRightb49">
                                                    <label class="form-check-label" for="formRadiosRightb49">
                                                        Orthopedics Surgery
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b49">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[OrthopedicsSurgeryNote][]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox" name="Referral[Orthotics][]" id="formRadiosRightb50" value="Orthotics">
                                                    <label class="form-check-label" for="formRadiosRightb50">
                                                        Shoulder Rehab program
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b50" style="display: none;">
                                                <div class="form-check form-check-right mb-3">
                                                <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[OrthoticsNote][]"></textarea>
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

                        if (totalPoints >= 0 && totalPoints <= 15) {
                            mildLUTS.classList.remove('hidden');
                        } else if (totalPoints >= 16 && totalPoints <= 30) {
                            moderateLUTS.classList.remove('hidden');
                        } else if (totalPoints >= 31 && totalPoints <= 1035) {
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
    $(document).ready(function(){
        $("#textarea_e14").hide();
        $("#textarea_e16").hide();
        $("#textarea_e18").hide();

        $("#formRadiosRighte14").click(function(){
            $("#textarea_e14").show();
           
        });
        $("#formRadiosRighte13").click(function(){
            $("#textarea_e14").hide();
           
        });
        $("#formRadiosRighte16").click(function(){
            $("#textarea_e16").show();
        });
        $("#formRadiosRighte15").click(function(){
            $("#textarea_e16").hide();
        });
        $("#formRadiosRighte18").click(function(){
             $("#textarea_e18").show();
        });
        $("#formRadiosRighte17").click(function(){
             $("#textarea_e18").hide();
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

        $("#textarea_e59").hide();
        $("#formRadiosRighte59").click(function(){
            $("#textarea_e59").show();
        });
        $("#formRadiosRighte58").click(function(){
            $("#textarea_e59").hide();
        });
        })
</script>
<script>
    $(document).ready(function(){
        $("#textarea_j2").hide();
        $("#textarea_j4").hide();
        $("#textarea_j6").hide();
        $("#textarea_j8").hide();
        $("#textarea_j10").hide();
        $("#textarea_j12").hide();
        $("#textarea_j14").hide();
        $("#textarea_j16").hide();
        $("#textarea_j18").hide();
        $("#textarea_j20").hide();
        $("#textarea_j22").hide();
        $("#textarea_j24").hide();
        $("#textarea_j26").hide();
        $("#textarea_j28").hide();
        $("#textarea_j30").hide();
        $("#textarea_j32").hide();
        $("#textarea_j34").hide();
        $("#textarea_j35").hide();
        $("#textarea_j39").hide();


        $("#formRadiosRightj1").click(function(){
            $("#textarea_j2").hide();
           
        });
        $("#formRadiosRightj2").click(function(){
            $("#textarea_j2").show();
           
        });
        $("#formRadiosRightj3").click(function(){
            $("#textarea_j4").hide();
           
        });
        $("#formRadiosRightj4").click(function(){
            $("#textarea_j4").show();
           
        });
        $("#formRadiosRightj5").click(function(){
            $("#textarea_j6").hide();
           
        });
        $("#formRadiosRightj6").click(function(){
            $("#textarea_j6").show();
           
        });
        $("#formRadiosRightj7").click(function(){
            $("#textarea_j8").hide();
           
        });
        $("#formRadiosRightj8").click(function(){
            $("#textarea_j8").show();
           
        });
        $("#formRadiosRightj9").click(function(){
            $("#textarea_j10").hide();
           
        });
        $("#formRadiosRightj10").click(function(){
            $("#textarea_j10").show();
           
        });
        $("#formRadiosRightj11").click(function(){
            $("#textarea_j12").hide();
           
        });
        $("#formRadiosRightj12").click(function(){
            $("#textarea_j12").show();
           
        });
        $("#formRadiosRightj13").click(function(){
            $("#textarea_j14").hide();
           
        });
        $("#formRadiosRightj14").click(function(){
            $("#textarea_j14").show();
           
        });
        $("#formRadiosRightj15").click(function(){
            $("#textarea_j16").hide();
           
        });
        $("#formRadiosRightj16").click(function(){
            $("#textarea_j16").show();
           
        });
        $("#formRadiosRightj17").click(function(){
            $("#textarea_j18").hide();
           
        });
        $("#formRadiosRightj18").click(function(){
            $("#textarea_j18").show();
           
        });
        $("#formRadiosRightj19").click(function(){
            $("#textarea_j20").hide();
           
        });
        $("#formRadiosRightj20").click(function(){
            $("#textarea_j20").show();
           
        });
        $("#formRadiosRightj21").click(function(){
            $("#textarea_j22").hide();
           
        });
        $("#formRadiosRightj22").click(function(){
            $("#textarea_j22").show();
           
        });
        $("#formRadiosRightj23").click(function(){
            $("#textarea_j24").hide();
           
        });
        $("#formRadiosRightj24").click(function(){
            $("#textarea_j24").show();
           
        });
        $("#formRadiosRightj25").click(function(){
            $("#textarea_j26").hide();
           
        });
        $("#formRadiosRightj26").click(function(){
            $("#textarea_j26").show();
           
        });
        $("#formRadiosRightj27").click(function(){
            $("#textarea_j28").hide();
           
        });
        $("#formRadiosRightj28").click(function(){
            $("#textarea_j28").show();
           
        });
        $("#formRadiosRightj29").click(function(){
            $("#textarea_j30").hide();
           
        });
        $("#formRadiosRightj30").click(function(){
            $("#textarea_j30").show();
           
        });
        $("#formRadiosRightj31").click(function(){
            $("#textarea_j32").hide();
           
        });
        $("#formRadiosRightj32").click(function(){
            $("#textarea_j32").show();
           
        });
        $("#formRadiosRightj33").click(function(){
            $("#textarea_j34").hide();
           
        });
        $("#formRadiosRightj34").click(function(){
            $("#textarea_j34").show();
           
        });
    
        $("#formRadiosRightj38").click(function(){
            $("#textarea_j39").hide();
           
        });
        $("#formRadiosRightj39").click(function(){
            $("#textarea_j39").show();
           
        });
    })
</script>
<script>
    $(document).ready(function(){
        $('#textarea_119').hide();
        $('#textarea_120').hide();
        $('#textarea_121').hide();
        $('#textarea_122').hide();

        $('#formRadiosRightd38, #formRadiosRightd13').click(function(){
            $('#textarea_119').hide();
        });
        $('#formRadiosRightd119').click(function(){
            $('#textarea_119').show();
        });


        
        $('#formRadiosRightd14, #formRadiosRightd15').click(function(){
            $('#textarea_120').hide();
        });
        $('#formRadiosRightd120').click(function(){
            $('#textarea_120').show();
        });
        

        $('#formRadiosRightd39, #formRadiosRightd40').click(function(){
            $('#textarea_121').hide();
        });
        $('#formRadiosRightd121').click(function(){
            $('#textarea_121').show();
        });

        $('#formRadiosRightd41, #formRadiosRightd42').click(function(){
            $('#textarea_122').hide();
        });
        $('#formRadiosRightd122').click(function(){
            $('#textarea_122').show();
        });
    })
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

            // Shoulder pain start  
            var isChecked_sym_a1 = $("#sym_a1").is(":checked");
           
            var sym_a1_durationValue = $("select[name='symptoms[0][1]']").val();
            
            var sym_a1_durationType = $("select[name='symptoms[0][2]']").val();
            var sym_a1_description = $("textarea[name='symptoms[0][3]']").val();

            if (sym_a1_durationValue !== "" || sym_a1_durationType !== "" || sym_a1_description !== "") {
               
                if(isChecked_sym_a1 ===false){
                    
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please fill out Shoulder pain fields in Symptoms.',
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
// Shoulder pain end  


// Shoulder joint Stiffness start
var isChecked_sym_a2 = $("#sym_a2").is(":checked");
           
           var sym_a2_durationValue = $("select[name='symptoms[1][1]']").val();
           
           var sym_a2_durationType = $("select[name='symptoms[1][2]']").val();
           var sym_a2_description = $("textarea[name='symptoms[1][3]']").val();

           if (sym_a2_durationValue !== "" || sym_a2_durationType !== "" || sym_a2_description !== "") {
              
               if(isChecked_sym_a2 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Shoulder joint Stiffness fields in Symptoms.',
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
// Shoulder joint Stiffness end 



// Shoulder Muscle Spasm start
var isChecked_sym_a3 = $("#sym_a3").is(":checked");
           
           var sym_a3_durationValue = $("select[name='symptoms[2][1]']").val();
           
           var sym_a3_durationType = $("select[name='symptoms[2][2]']").val();
           var sym_a3_description = $("textarea[name='symptoms[2][3]']").val();

           if (sym_a3_durationValue !== "" || sym_a3_durationType !== "" || sym_a3_description !== "") {
              
               if(isChecked_sym_a3 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Shoulder Muscle Spasm fields in Symptoms.',
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
// Shoulder Muscle Spasm end 


//   Pain to distal arm start
var isChecked_sym_a4 = $("#sym_a4").is(":checked");
           
           var sym_a4_durationValue = $("select[name='symptoms[3][1]']").val();
           
           var sym_a4_durationType = $("select[name='symptoms[3][2]']").val();
           var sym_a4_description = $("textarea[name='symptoms[3][3]']").val();

           if (sym_a4_durationValue !== "" || sym_a4_durationType !== "" || sym_a4_description !== "") {
              
               if(isChecked_sym_a4 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out  Pain to distal arm fields in Symptoms.',
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
//   Pain to distal arm end 



//  Numbness on lifting weight start
var isChecked_sym_a5 = $("#sym_a5").is(":checked");
           
           var sym_a5_durationValue = $("select[name='symptoms[4][1]']").val();
           
           var sym_a5_durationType = $("select[name='symptoms[4][2]']").val();
           var sym_a5_description = $("textarea[name='symptoms[4][3]']").val();

           if (sym_a5_durationValue !== "" || sym_a5_durationType !== "" || sym_a5_description !== "") {
              
               if(isChecked_sym_a5 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out  Numbness on lifting weight fields in Symptoms.',
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
//  Numbness on lifting weight end 



//   Pain on lifting weight start
var isChecked_sym_a75 = $("#sym_a75").is(":checked");
           
           var sym_a75_durationValue = $("select[name='symptoms[5][1]']").val();
           
           var sym_a75_durationType = $("select[name='symptoms[5][2]']").val();
           var sym_a75_description = $("textarea[name='symptoms[5][3]']").val();

           if (sym_a75_durationValue !== "" || sym_a75_durationType !== "" || sym_a75_description !== "") {
              
               if(isChecked_sym_a75 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out  Pain on lifting weight fields in Symptoms.',
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
//   Pain on lifting weight end 



//  Warm Shoulder  start
var isChecked_sym_a7 = $("#sym_a7").is(":checked");
           
           var sym_a7_durationValue = $("select[name='symptoms[6][1]']").val();
           
           var sym_a7_durationType = $("select[name='symptoms[6][2]']").val();
           var sym_a7_description = $("textarea[name='symptoms[6][3]']").val();

           if (sym_a7_durationValue !== "" || sym_a7_durationType !== "" || sym_a7_description !== "") {
              
               if(isChecked_sym_a7 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Warm Shoulder fields in Symptoms.',
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
//  Warm Shoulder  end 


//  Other start
var isChecked_sym_a18= $("#sym_a18").is(":checked");
           
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

        
        $("#storeShoulderPainEligibilityForms").submit(function(event) {
            
            event.preventDefault();
            let formData = new FormData(this);
            if (!validateForm()) {
                e.preventDefault(); 
            } 
            else {
                if(validateForm()){

                
                
                $.ajax({
                                url: '{{ route("user.storeShoulderPainEligibilityForms") }}',
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    
                                    var patientId = response.patient_id;
                                    if(response!=''){
              
                                        swal.fire(
              
                                            'Success',
              
                                            'Shoulder Pain form saved successfully!',
              
                                            'success'
              
                                        ).then(function() {
                                                
                                               
                                            var redirectUrl = "{{ route('user.viewShoulderPainEligibilityForms', ['id' => ':id']) }}";
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

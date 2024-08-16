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
                <form id="updateShoulderPainEligibilityForms" method="POST" action="{{ route('user.updateShoulderPainEligibilityForms') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ @$patient_id }}" />
                    <input type="hidden" name="form_type" value="msk_pain_report" />

                    <h3 class="form_title">Shoulder Pain</h3>

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
                                    @php
                                        if (isset($diagnosis_generals_db) && !empty($diagnosis_generals_db)) {
                                            $diagnosis_generals = [];

                                            foreach ($diagnosis_generals_db as $key => $value) {
                                                $decodedData = json_decode($value->data_value, true);
                                                $diagnosis_generals = array_merge($diagnosis_generals, $decodedData);
                                            }

                                            

                                            $existingData = [
                                                'GradeI' => ['Grade I-II OA Shoulder'],
                                                'GradeIII' => ['Grade III-IV OA Shoulder'],
                                                'AdhesiveCapsulitis' => ['Adhesive Capsulitis'],
                                                'FrozenShoulder' => ['Frozen Shoulder'],
                                                'Nonseptic' => ['Non-septic Arthritis'],
                                                'SepticArthritis' => ['Septic Arthritis'],     
                                                'Tendonitis' => ['Tendonitis'],     
                                                'Bursitis' => ['Bursitis'],     
                                                'ligamentousinjury' => ['ligamentous injury'],     
                                                'Enthesopathy' => ['Enthesopathy'],     
                                                 
                                                    
                                                
                                                
                                            ];
                                            $filteredData = array_diff_key($diagnosis_generals, $existingData);
                                        }

                                    @endphp

                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[GradeI][]" id="formRadiosRight1"
                                                {{ isset($diagnosis_generals['GradeI']) && in_array('Grade I-II OA Shoulder', $diagnosis_generals['GradeI']) ? 'checked' : '' }}
                                                value="Grade I-II OA Shoulder">
                                            <label class="form-check-label" for="formRadiosRight1">
                                                Grade I-II OA Shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[MuscleSpasm][]" id="formRadiosRight2"
                                                {{ isset($diagnosis_generals['MuscleSpasm']) && in_array('GradeIII', $diagnosis_generals['MuscleSpasm']) ? 'checked' : '' }}
                                                value="GradeIII">
                                            <label class="form-check-label" for="formRadiosRight2">
                                                GradeIII
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[AdhesiveCapsulitis][]" id="formRadiosRight3"
                                                {{ isset($diagnosis_generals['AdhesiveCapsulitis']) && in_array('Adhesive Capsulitis', $diagnosis_generals['AdhesiveCapsulitis']) ? 'checked' : '' }}
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
                                                {{ isset($diagnosis_generals['FrozenShoulder']) && in_array('Frozen Shoulder', $diagnosis_generals['FrozenShoulder']) ? 'checked' : '' }}
                                                value="Frozen Shoulder">
                                            <label class="form-check-label" for="formRadiosRight4">
                                                Frozen Shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Nonseptic][]" id="formRadiosRight5"
                                                {{ isset($diagnosis_generals['Nonseptic']) && in_array('Non-septic Arthritis', $diagnosis_generals['Nonseptic']) ? 'checked' : '' }}
                                                value="Non-septic Arthritis">
                                            <label class="form-check-label" for="formRadiosRight5">
                                                Non-septic Arthritis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[SepticArthritis][]" id="formRadiosRight4SepticArthritis"
                                                {{ isset($diagnosis_generals['SepticArthritis']) && in_array('Septic Arthritis', $diagnosis_generals['SepticArthritis']) ? 'checked' : '' }}
                                                value="Septic Arthritis">
                                            <label class="form-check-label" for="formRadiosRight4SepticArthritis">
                                                Septic Arthritis
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Tendonitis][]" id="formRadiosRight4Tendonitis"
                                                {{ isset($diagnosis_generals['Tendonitis']) && in_array('Tendonitis', $diagnosis_generals['Tendonitis']) ? 'checked' : '' }}
                                                value="Tendonitis">
                                            <label class="form-check-label" for="formRadiosRight4Tendonitis">
                                                Tendonitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Bursitis][]" id="formRadiosRight4Bursitis"
                                                {{ isset($diagnosis_generals['Bursitis']) && in_array('Bursitis', $diagnosis_generals['Bursitis']) ? 'checked' : '' }}
                                                value="Bursitis">
                                            <label class="form-check-label" for="formRadiosRight4Bursitis">
                                                Bursitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Ligamentousinjury][]" id="formRadiosRight4Ligamentousinjury"
                                                {{ isset($diagnosis_generals['Ligamentousinjury']) && in_array('Ligamentous injury', $diagnosis_generals['Ligamentousinjury']) ? 'checked' : '' }}
                                                value="Ligamentous injury">
                                            <label class="form-check-label" for="formRadiosRight4Ligamentousinjury">
                                                Ligamentous injury
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="diagnosis_general_checkbox">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Enthesopathy][]" id="formRadiosRight4Enthesopathy"
                                                {{ isset($diagnosis_generals['Enthesopathy']) && in_array('Enthesopathy', $diagnosis_generals['Enthesopathy']) ? 'checked' : '' }}
                                                value="Enthesopathy">
                                            <label class="form-check-label" for="formRadiosRight4Enthesopathy">
                                                Enthesopathy
                                            </label>
                                        </div>
                                    </div>
                                    

                                    <div class="col-lg-12">
                                        <div id="dynamic_checkbox_container" class="row">
                                            @if (isset($filteredData) && !empty($filteredData))
                                                @forelse ($filteredData as $key => $value)
                                                    <div class="col-lg-4">
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="diagnosis_general[{{ $key }}][]"
                                                                id="formRadiosRight{{ $key }}"
                                                                {{ isset($diagnosis_generals[$key]) && in_array($value[0], $diagnosis_generals[$key]) ? 'checked' : '' }}
                                                                value="{{ $value[0] }}">
                                                            <label class="form-check-label"
                                                                for="formRadiosRight{{ $key }}">
                                                                {{ $value[0] }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <!-- Code to be executed if $filteredData is empty -->
                                                @endforelse
                                            @endif
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
                                    @php
                                        if (isset($diagnosis_cids_db) && !empty($diagnosis_cids_db)) {
                                           
                                            $diagnosis_cids = [];
                                            foreach ($diagnosis_cids_db as $key => $value) {
                                                $decodedData = json_decode($value->data_value, true);
                                                $diagnosis_cids = array_merge($diagnosis_cids, $decodedData);
                                            }
                                            $existingData = [
                                                'M219' => ['M21.9 Acquired deformity of limb, unspecified Deformity shoulder (joint) (acquired)'],
                                                'M242' => ['M24.2 Disorder of ligament Instability secondary to old ligament injury'],
                                                'M244' => ['M24.4 Recurrent dislocation and subluxation of joint'],
                                                'M249' => ['M24.9 Joint derangement, unspecified Derangement|shoulder (internal)'],
                                                'M255' => ['M25.5 Pain in joint'],
                                                'M256' => ['M25.6 Stiffness of joint, not elsewhere classified Stiffness, joint|shoulder'],
                                                'M658' => ['M65.8 Other synovitis and tenosynovitis Tendinitis, tendonitis|adhesive'],
                                                'M659' => ['M65.9 Synovitis and tenosynovitis, unspecified Disease, diseased|tendon, tendinous inflammatory NEC '],
                                                'M665' => ['M66.5 Spontaneous rupture of unspecified tendon Rupture at musculotendinous junction, nontraumatic'],
                                                'M678' => ['M67.8 Other specified disorders of synovium and tendon Disease, diseased tendon, tendinous|specified NEC'],
                                                'M679' => ['M67.9 Disorder of synovium and tendon, unspecified Disease, diseased tendon, tendinous'],
                                                'M708' => ['M70.8 Other soft tissue disorders related to use, overuse and pressure Tendinitis, tendonitis|due to use, overuse, pressure|specified NEC'],
                                                'M709' => ['M70.9 Unspecified soft tissue disorder related to use, overuse and pressure Tendinitis, tendonitis|due to use, overuse, pressure'],
                                                'M719' => ['M71.9 Bursopathy, unspecified Bursitis NOS'],
                                                'M750' => ['M75.0 Adhesive capsulitis of shoulder Frozen shoulder'],
                                                'M752' => ['M75.2 Bicipital tendinitis'],
                                                'M753' => ['M75.3 Calcific tendinitis of shoulder'],
                                                'M754' => ['M75.4 Impingement syndrome of shoulder'],
                                                'M755' => ['M75.5 Bursitis of shoulder'],
                                                'M756' => ['M75.6 Tear of labrum of degenerative shoulder joint'],
                                                'M758' => ['M75.8 Other shoulder lesions'],
                                                'M759' => ['M75.9 Shoulder lesion, unspecified'],
                                                'M7791' => ['M77.9 Enthesopathy, unspecified Tendinitis NOS'],
                                                'M779' => ['M77.9 Enthesopathy, unspecified Capsulitis (joint) adhesive'],
                                                'M932' => ['M93.2 Osteochondritis dissecans Osteochondrosis dissecans (knee) (shoulder)'],
                                                'Q740' => ['Q74.0 Other congenital malformations of upper limb(s), including shoulder girdle'],
                                                'S40' => ['S40 Superficial injury of shoulder and upper arm'],
                                                'S400' => ['S40.0 Contusion of shoulder and upper arm'],
                                                'S409' => ['S40.9 Superficial injury of shoulder and upper arm, unspecified'],
                                                'S41' => ['S41 Open wound of shoulder and upper arm'],
                                                'S410' => ['S41.0 Open wound of shoulder'],
                                                'S42' => ['S42 Fracture of shoulder and upper arm'],
                                                'S421' => ['S42.1 Fracture of scapula'],
                                                'S429' => ['S42.9 Fracture of shoulder girdle, part unspecified'],
                                                'S430' => ['S43.0 Dislocation of shoulder joint'],
                                                'S433' => ['S43.3 Dislocation of other and unspecified parts of shoulder girdle'],
                                                'S434' => ['S43.4 Sprain and strain of shoulder joint'],
                                                'S437' => ['S43.7 Sprain and strain of other and unspecified parts of shoulder girdle'],
                                                'S49' => ['S49 Other and unspecified injuries of shoulder and upper arm'],
                                                'S497' => ['S49.7 Multiple injuries of shoulder and upper arm'],
                                                
                                                
                                               
                                            ];
                                            $filteredData = array_diff_key($diagnosis_cids, $existingData);
                                        }

                                    @endphp
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M219][]"
                                                id="formRadiosRight8" value="M21.9 Acquired deformity of limb, unspecified Deformity shoulder (joint) (acquired)"
                                                {{ isset($diagnosis_cids['M219']) && in_array('M21.9 Acquired deformity of limb, unspecified Deformity shoulder (joint) (acquired)', $diagnosis_cids['M219']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight8">
                                                M21.9 Acquired deformity of limb, unspecified Deformity shoulder (joint) (acquired)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M242][]"
                                                id="formRadiosRight9" value="M24.2 Disorder of ligament Instability secondary to old ligament injury"
                                                {{ isset($diagnosis_cids['M242']) && in_array('M24.2 Disorder of ligament Instability secondary to old ligament injury', $diagnosis_cids['M242']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight9">
                                                M24.2 Disorder of ligament Instability secondary to old ligament injury
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M244][]"
                                                id="formRadiosRight10" value="M24.4 Recurrent dislocation and subluxation of joint"
                                                {{ isset($diagnosis_cids['M244']) && in_array('M24.4 Recurrent dislocation and subluxation of joint', $diagnosis_cids['M244']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight10">
                                                M24.4 Recurrent dislocation and subluxation of joint
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M249][]"
                                                id="formRadiosRight11M249" value="M24.9 Joint derangement, unspecified Derangement|shoulder (internal)"
                                                {{ isset($diagnosis_cids['M249']) && in_array('M24.9 Joint derangement, unspecified Derangement|shoulder (internal)', $diagnosis_cids['M249']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight11M249">
                                                M24.9 Joint derangement, unspecified Derangement|shoulder (internal)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M255][]"
                                                id="formRadiosRight12M255" value="M25.5 Pain in joint"
                                                {{ isset($diagnosis_cids['M255']) && in_array('M25.5 Pain in joint', $diagnosis_cids['M255']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight12M255">
                                                M25.5 Pain in joint
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M256][]"
                                                id="formRadiosRight13M256" value="M25.6 Stiffness of joint, not elsewhere classified Stiffness, joint|shoulder"
                                                {{ isset($diagnosis_cids['M256']) && in_array('M25.6 Stiffness of joint, not elsewhere classified Stiffness, joint|shoulder', $diagnosis_cids['M256']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M256">
                                                M25.6 Stiffness of joint, not elsewhere classified Stiffness, joint|shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M658][]"
                                                id="formRadiosRight13M658" value="M65.8 Other synovitis and tenosynovitis Tendinitis, tendonitis|adhesive"
                                                {{ isset($diagnosis_cids['M658']) && in_array('M65.8 Other synovitis and tenosynovitis Tendinitis, tendonitis|adhesive', $diagnosis_cids['M658']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M658">
                                                M65.8 Other synovitis and tenosynovitis Tendinitis, tendonitis|adhesive
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M659][]"
                                                id="formRadiosRight13M659" value="M65.9 Synovitis and tenosynovitis, unspecified Disease, diseased|tendon, tendinous inflammatory NEC"
                                                {{ isset($diagnosis_cids['M659']) && in_array('M65.9 Synovitis and tenosynovitis, unspecified Disease, diseased|tendon, tendinous inflammatory NEC', $diagnosis_cids['M659']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M659">
                                                M65.9 Synovitis and tenosynovitis, unspecified Disease, diseased|tendon, tendinous inflammatory NEC
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M665][]"
                                                id="formRadiosRight13M665" value="M66.5 Spontaneous rupture of unspecified tendon Rupture at musculotendinous junction, nontraumatic"
                                                {{ isset($diagnosis_cids['M665']) && in_array('M66.5 Spontaneous rupture of unspecified tendon Rupture at musculotendinous junction, nontraumatic', $diagnosis_cids['M665']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M665">
                                                M66.5 Spontaneous rupture of unspecified tendon Rupture at musculotendinous junction, nontraumatic
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M678][]"
                                                id="formRadiosRight13M678" value="M67.8 Other specified disorders of synovium and tendon Disease, diseased tendon, tendinous|specified NEC"
                                                {{ isset($diagnosis_cids['M678']) && in_array('M67.8 Other specified disorders of synovium and tendon Disease, diseased tendon, tendinous|specified NEC', $diagnosis_cids['M678']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M678">
                                                M67.8 Other specified disorders of synovium and tendon Disease, diseased tendon, tendinous|specified NEC
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M679][]"
                                                id="formRadiosRight13M679" value="M67.9 Disorder of synovium and tendon, unspecified Disease, diseased tendon, tendinous"
                                                {{ isset($diagnosis_cids['M679']) && in_array('M67.9 Disorder of synovium and tendon, unspecified Disease, diseased tendon, tendinous', $diagnosis_cids['M679']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M679">
                                                M67.9 Disorder of synovium and tendon, unspecified Disease, diseased tendon, tendinous
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M708][]"
                                                id="formRadiosRight13M708" value="M70.8 Other soft tissue disorders related to use, overuse and pressure Tendinitis, tendonitis|due to use, overuse, pressure|specified NEC"
                                                {{ isset($diagnosis_cids['M708']) && in_array('M70.8 Other soft tissue disorders related to use, overuse and pressure Tendinitis, tendonitis|due to use, overuse, pressure|specified NEC', $diagnosis_cids['M708']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M708">
                                                M70.8 Other soft tissue disorders related to use, overuse and pressure Tendinitis, tendonitis|due to use, overuse, pressure|specified NEC
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M709][]"
                                                id="formRadiosRight13M709" value="M70.9 Unspecified soft tissue disorder related to use, overuse and pressure Tendinitis, tendonitis|due to use, overuse, pressure"
                                                {{ isset($diagnosis_cids['M709']) && in_array('M70.9 Unspecified soft tissue disorder related to use, overuse and pressure Tendinitis, tendonitis|due to use, overuse, pressure', $diagnosis_cids['M709']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M709">
                                                M70.9 Unspecified soft tissue disorder related to use, overuse and pressure Tendinitis, tendonitis|due to use, overuse, pressure
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M719][]"
                                                id="formRadiosRight13M719" value="M71.9 Bursopathy, unspecified Bursitis NOS"
                                                {{ isset($diagnosis_cids['M719']) && in_array('M71.9 Bursopathy, unspecified Bursitis NOS', $diagnosis_cids['M719']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M719">
                                                M71.9 Bursopathy, unspecified Bursitis NOS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M750][]"
                                                id="formRadiosRight13M750" value="M75.0 Adhesive capsulitis of shoulder Frozen shoulder"
                                                {{ isset($diagnosis_cids['M750']) && in_array('M75.0 Adhesive capsulitis of shoulder Frozen shoulder', $diagnosis_cids['M750']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M750">
                                                M75.0 Adhesive capsulitis of shoulder Frozen shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M752][]"
                                                id="formRadiosRight13M752" value="M75.2 Bicipital tendinitis"
                                                {{ isset($diagnosis_cids['M752']) && in_array('M75.2 Bicipital tendinitis', $diagnosis_cids['M752']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M752">
                                                M75.2 Bicipital tendinitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M753][]"
                                                id="formRadiosRight13M753" value="M75.3 Calcific tendinitis of shoulder"
                                                {{ isset($diagnosis_cids['M753']) && in_array('M75.3 Calcific tendinitis of shoulder', $diagnosis_cids['M753']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M753">
                                                M75.3 Calcific tendinitis of shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M754][]"
                                                id="formRadiosRight13M754" value="M75.4 Impingement syndrome of shoulder"
                                                {{ isset($diagnosis_cids['M754']) && in_array('M75.4 Impingement syndrome of shoulder', $diagnosis_cids['M754']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M754">
                                                M75.4 Impingement syndrome of shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M755][]"
                                                id="formRadiosRight13M755" value="M75.5 Bursitis of shoulder"
                                                {{ isset($diagnosis_cids['M755']) && in_array('M75.5 Bursitis of shoulder', $diagnosis_cids['M755']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M755">
                                                M75.5 Bursitis of shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M756][]"
                                                id="formRadiosRight13M756" value="M75.6 Tear of labrum of degenerative shoulder joint"
                                                {{ isset($diagnosis_cids['M756']) && in_array('M75.6 Tear of labrum of degenerative shoulder joint', $diagnosis_cids['M756']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M756">
                                                M75.6 Tear of labrum of degenerative shoulder joint
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M758][]"
                                                id="formRadiosRight13M758" value="M75.8 Other shoulder lesions"
                                                {{ isset($diagnosis_cids['M758']) && in_array('M75.8 Other shoulder lesions', $diagnosis_cids['M758']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M758">
                                                M75.8 Other shoulder lesions
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M759][]"
                                                id="formRadiosRight13M759" value="M75.9 Shoulder lesion, unspecified"
                                                {{ isset($diagnosis_cids['M759']) && in_array('M75.9 Shoulder lesion, unspecified', $diagnosis_cids['M759']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M759">
                                                M75.9 Shoulder lesion, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M7791][]"
                                                id="formRadiosRight13M7791" value="M77.9 Enthesopathy, unspecified Tendinitis NOS"
                                                {{ isset($diagnosis_cids['M7791']) && in_array('M77.9 Enthesopathy, unspecified Tendinitis NOS', $diagnosis_cids['M7791']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M7791">
                                                M77.9 Enthesopathy, unspecified Tendinitis NOS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M779][]"
                                                id="formRadiosRight13M779" value="M77.9 Enthesopathy, unspecified Capsulitis (joint) adhesive"
                                                {{ isset($diagnosis_cids['M779']) && in_array('M77.9 Enthesopathy, unspecified Capsulitis (joint) adhesive', $diagnosis_cids['M779']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M779">
                                                M77.9 Enthesopathy, unspecified Capsulitis (joint) adhesive
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M932][]"
                                                id="formRadiosRight13M932" value="M93.2 Osteochondritis dissecans Osteochondrosis dissecans (knee) (shoulder)"
                                                {{ isset($diagnosis_cids['M932']) && in_array('M93.2 Osteochondritis dissecans Osteochondrosis dissecans (knee) (shoulder)', $diagnosis_cids['M932']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M932">
                                                M93.2 Osteochondritis dissecans Osteochondrosis dissecans (knee) (shoulder)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Q740][]"
                                                id="formRadiosRight13Q740" value="Q74.0 Other congenital malformations of upper limb(s), including shoulder girdle"
                                                {{ isset($diagnosis_cids['Q740']) && in_array('Q74.0 Other congenital malformations of upper limb(s), including shoulder girdle', $diagnosis_cids['Q740']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13Q740">
                                                Q74.0 Other congenital malformations of upper limb(s), including shoulder girdle
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S40][]"
                                                id="formRadiosRight13S40" value="S40 Superficial injury of shoulder and upper arm"
                                                {{ isset($diagnosis_cids['S40']) && in_array('S40 Superficial injury of shoulder and upper arm', $diagnosis_cids['S40']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S40">
                                                S40 Superficial injury of shoulder and upper arm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S400][]"
                                                id="formRadiosRight13S400" value="S40.0 Contusion of shoulder and upper arm"
                                                {{ isset($diagnosis_cids['S400']) && in_array('S40.0 Contusion of shoulder and upper arm', $diagnosis_cids['S400']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S400">
                                                S40.0 Contusion of shoulder and upper arm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S409][]"
                                                id="formRadiosRight13S409" value="S40.9 Superficial injury of shoulder and upper arm, unspecified"
                                                {{ isset($diagnosis_cids['S409']) && in_array('S40.9 Superficial injury of shoulder and upper arm, unspecified', $diagnosis_cids['S409']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S409">
                                                S40.9 Superficial injury of shoulder and upper arm, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S41][]"
                                                id="formRadiosRight13S41" value="S41 Open wound of shoulder and upper arm"
                                                {{ isset($diagnosis_cids['S41']) && in_array('S41 Open wound of shoulder and upper arm', $diagnosis_cids['S41']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S33">
                                                S41 Open wound of shoulder and upper arm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S410][]"
                                                id="formRadiosRight13S410" value="S41.0 Open wound of shoulder"
                                                {{ isset($diagnosis_cids['S410']) && in_array('S41.0 Open wound of shoulder', $diagnosis_cids['S410']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S410">
                                                S41.0 Open wound of shoulder
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S42][]"
                                                id="formRadiosRight13S42" value="S42 Fracture of shoulder and upper arm"
                                                {{ isset($diagnosis_cids['S42']) && in_array('S42 Fracture of shoulder and upper arm', $diagnosis_cids['S42']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S42">
                                                S42 Fracture of shoulder and upper arm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S421][]"
                                                id="formRadiosRight13S421" value="S42.1 Fracture of scapula"
                                                {{ isset($diagnosis_cids['S421']) && in_array('S42.1 Fracture of scapula', $diagnosis_cids['S421']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S421">
                                                S42.1 Fracture of scapula
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S429][]"
                                                id="formRadiosRight13S429" value="S42.9 Fracture of shoulder girdle, part unspecified"
                                                {{ isset($diagnosis_cids['S429']) && in_array('S42.9 Fracture of shoulder girdle, part unspecified', $diagnosis_cids['S429']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S429">
                                                S42.9 Fracture of shoulder girdle, part unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S430][]"
                                                id="formRadiosRight13S430" value="S43.0 Dislocation of shoulder joint"
                                                {{ isset($diagnosis_cids['S430']) && in_array('S43.0 Dislocation of shoulder joint', $diagnosis_cids['S430']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S430">
                                                S43.0 Dislocation of shoulder joint
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S433][]"
                                                id="formRadiosRight13S433" value="S43.3 Dislocation of other and unspecified parts of shoulder girdle"
                                                {{ isset($diagnosis_cids['S433']) && in_array('S43.3 Dislocation of other and unspecified parts of shoulder girdle', $diagnosis_cids['S433']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S433">
                                                S43.3 Dislocation of other and unspecified parts of shoulder girdle
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S434][]"
                                                id="formRadiosRight13S434" value="S43.4 Sprain and strain of shoulder joint"
                                                {{ isset($diagnosis_cids['S434']) && in_array('S43.4 Sprain and strain of shoulder joint', $diagnosis_cids['S434']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S434">
                                                S43.4 Sprain and strain of shoulder joint
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S437][]"
                                                id="formRadiosRight13S437" value="S43.7 Sprain and strain of other and unspecified parts of shoulder girdle"
                                                {{ isset($diagnosis_cids['S437']) && in_array('S43.7 Sprain and strain of other and unspecified parts of shoulder girdle', $diagnosis_cids['S437']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S437">
                                                S43.7 Sprain and strain of other and unspecified parts of shoulder girdle
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S49][]"
                                                id="formRadiosRight13S49" value="S49 Other and unspecified injuries of shoulder and upper arm"
                                                {{ isset($diagnosis_cids['S49']) && in_array('S49 Other and unspecified injuries of shoulder and upper arm', $diagnosis_cids['S49']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S49">
                                                S49 Other and unspecified injuries of shoulder and upper arm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="Postpartum_thyroiditis">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S497][]"
                                                id="formRadiosRight13S497" value="S49.7 Multiple injuries of shoulder and upper arm"
                                                {{ isset($diagnosis_cids['S497']) && in_array('S49.7 Multiple injuries of shoulder and upper arm', $diagnosis_cids['S497']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S497">
                                                S49.7 Multiple injuries of shoulder and upper arm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="dynamic_checkbox_container_cid" class="row">
                                            @if (isset($filteredData) && !empty($filteredData))
                                                @forelse ($filteredData as $key => $value)
                                                    <div class="col-lg-4">
                                                        <div class="form-check form-check-right mb-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="diagnosis_cid[{{ $key }}][]"
                                                                id="formRadiosRight{{ $key }}"
                                                                {{ isset($diagnosis_cids[$key]) && in_array($value[0], $diagnosis_cids[$key]) ? 'checked' : '' }}
                                                                value="{{ $value[0] }}">
                                                            <label class="form-check-label"
                                                                for="formRadiosRight{{ $key }}">
                                                                {{ $value[0] }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <!-- Code to be executed if $filteredData is empty -->
                                                @endforelse
                                            @endif

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

                                    @php
                                    
                                        if (isset($symptoms) && !empty($symptoms)) {

                                            $symptoms_json_decode_values=[];
                                            $symptoms_flat = [];
                                            foreach ($symptoms as $symptom) {
                                                
                                                $symptoms_json_decode_values[] = json_decode($symptom->data_value, true);
                                            }
                                            
                                                        foreach ($symptoms_json_decode_values as $symptom_group) {
                                                            $symptoms_flat = array_merge($symptoms_flat, $symptom_group);
                                                        }
                                                    
                                                        $disfiguringSymptomsNotExist=[];
                                                        $disfiguringSymptoms1 = [];
                                                        $disfiguringSymptoms2 = [];
                                                        $disfiguringSymptoms3 = [];
                                                        $disfiguringSymptoms4 = [];
                                                        $disfiguringSymptoms5 = [];
                                                        $disfiguringSymptoms6 = [];
                                                        $disfiguringSymptoms7 = [];
                                                        $disfiguringSymptoms8 = [];
                                                        $disfiguringSymptoms9 = [];
                                                        $disfiguringSymptoms10 = [];
                                                        $disfiguringSymptoms11 = [];
                                                        $disfiguringSymptoms12 = [];
                                                        $disfiguringSymptoms13 = [];
                                                       
                                                        $disfiguringSymptoms18 = [];
                                                            foreach ($symptoms_flat as $symptom) {
                                                                if ($symptom['SymptomType'] === 'Shoulder pain') {
                                                                   
                                                                    $disfiguringSymptoms1 = $symptom;
                                                                    // dd(gettype($disfiguringSymptoms1),'array',$disfiguringSymptoms1);
                                                                }elseif ($symptom['SymptomType'] === 'Shoulder joint Stiffness') {
                                                                    $disfiguringSymptoms2 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Shoulder Muscle Spasm') {
                                                                    $disfiguringSymptoms3 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Pain to distal arm') {
                                                                    $disfiguringSymptoms4 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Numbness on lifting weight') {
                                                                    $disfiguringSymptoms5 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Pain on lifting weight') {
                                                                    $disfiguringSymptoms6 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Warm Shoulder') {
                                                                    $disfiguringSymptoms7 = $symptom;
                                                                }
                                                                
                                                               
                                                                elseif ($symptom['SymptomType'] === 'Other') {
                                                                    $disfiguringSymptoms18 = $symptom;
                                                                }else {
                                                                    $disfiguringSymptomsNotExist[] = $symptom;
                                                                }
                                                            }
                                                // echo "<pre>";
                                                //     print_r($disfiguringSymptomsNotExist);
                                                //     die;
                                                       
                                             
                                        }

                                    @endphp
                                     <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" id="sym_a1"
                                                        name="symptoms[0][0]"
                                                        value="Shoulder pain"
                                                        
                                                        {{ isset($disfiguringSymptoms1['SymptomType']) && $disfiguringSymptoms1['SymptomType'] === 'Shoulder pain' ? 'checked' : '' }}
                                                        >
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
                                                            @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($disfiguringSymptoms1['SymptomDurationValue']) && $disfiguringSymptoms1['SymptomDurationValue'] == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
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
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                                <option value="{{ $durationType }}"
                                                                    {{ isset($disfiguringSymptoms1['SymptomDurationType']) &&  $disfiguringSymptoms1['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
                                                                    {{ $durationType }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[0][3]">{{ trim($disfiguringSymptoms1['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        name="symptoms[1][0]" id="sym_a2" value="Shoulder joint Stiffness"
                                                        {{ isset($disfiguringSymptoms2['SymptomType']) && $disfiguringSymptoms2['SymptomType'] == 'Shoulder joint Stiffness' ? 'checked' : '' }}

                                                        >
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
                                                            @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($disfiguringSymptoms2['SymptomDurationValue']) && $disfiguringSymptoms2['SymptomDurationValue'] == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
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
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                            <option value="{{ $durationType }}"
                                                                {{ isset($disfiguringSymptoms2['SymptomDurationType']) &&  $disfiguringSymptoms2['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
                                                                {{ $durationType }}
                                                            </option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[1][3]">{{ trim($disfiguringSymptoms2['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        name="symptoms[2][0]" value="Shoulder Muscle Spasm"
                                                        {{ isset($disfiguringSymptoms3['SymptomType']) && $disfiguringSymptoms3['SymptomType'] == 'Shoulder Muscle Spasm' ? 'checked' : '' }}
                                                        >
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
                                                            @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($disfiguringSymptoms3['SymptomDurationValue']) && $disfiguringSymptoms3['SymptomDurationValue'] == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
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
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                            <option value="{{ $durationType }}"
                                                                {{ isset($disfiguringSymptoms3['SymptomDurationType']) &&  $disfiguringSymptoms3['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
                                                                {{ $durationType }}
                                                            </option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[2][3]">{{ trim($disfiguringSymptoms3['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        value="Pain to distal arm"
                                                        {{ isset($disfiguringSymptoms4['SymptomType']) && $disfiguringSymptoms4['SymptomType'] == 'Pain to distal arm' ? 'checked' : '' }}
                                                        >
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
                                                            @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($disfiguringSymptoms4['SymptomDurationValue']) && $disfiguringSymptoms4['SymptomDurationValue'] == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor

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
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                            <option value="{{ $durationType }}"
                                                                {{ isset($disfiguringSymptoms4['SymptomDurationType']) &&  $disfiguringSymptoms4['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
                                                                {{ $durationType }}
                                                            </option>
                                                        @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[3][3]">{{ trim($disfiguringSymptoms4['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        name="symptoms[4][0]" id="sym_a5" value="Numbness on lifting weight"
                                                        {{ isset($disfiguringSymptoms5['SymptomType']) && $disfiguringSymptoms5['SymptomType'] == 'Numbness on lifting weight' ? 'checked' : '' }}
                                                        >
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
                                                            @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($disfiguringSymptoms5['SymptomDurationValue']) && $disfiguringSymptoms5['SymptomDurationValue'] == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
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
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                            <option value="{{ $durationType }}"
                                                                {{ isset($disfiguringSymptoms5['SymptomDurationType']) &&  $disfiguringSymptoms5['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
                                                                {{ $durationType }}
                                                            </option>
                                                        @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[4][3]">{{ trim($disfiguringSymptoms5['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        name="symptoms[5][0]" id="sym_a6"
                                                        value="Pain on lifting weight"
                                                        {{ isset($disfiguringSymptoms6['SymptomType']) && $disfiguringSymptoms6['SymptomType'] == 'Pain on lifting weight' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a6">
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
                                                           @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($disfiguringSymptoms6['SymptomDurationValue']) && $disfiguringSymptoms6['SymptomDurationValue'] == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor



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
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                            <option value="{{ $durationType }}"
                                                                {{ isset($disfiguringSymptoms6['SymptomDurationType']) &&  $disfiguringSymptoms6['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
                                                                {{ $durationType }}
                                                            </option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[5][3]">{{ trim($disfiguringSymptoms6['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        name="symptoms[6][0]" id="sym_aa6"
                                                        value="Warm Shoulder"
                                                        {{ isset($disfiguringSymptoms7['SymptomType']) && $disfiguringSymptoms7['SymptomType'] == 'Warm Shoulder' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_aa6">
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
                                                           @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($disfiguringSymptoms7['SymptomDurationValue']) && $disfiguringSymptoms7['SymptomDurationValue'] == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor



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
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                            <option value="{{ $durationType }}"
                                                                {{ $disfiguringSymptoms7 && isset($disfiguringSymptoms7['SymptomDurationType']) &&  $disfiguringSymptoms6['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
                                                                {{ $durationType }}
                                                            </option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[6][3]">{{ trim($disfiguringSymptoms7['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        name="symptoms[17][0]" value="Other" id="sym_a18"
                                                        {{ isset($disfiguringSymptoms18['SymptomType']) && $disfiguringSymptoms18['SymptomType'] == 'Other' ? 'checked' : '' }}
                                                        >
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
                                                           @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($disfiguringSymptoms18['SymptomDurationValue']) && $disfiguringSymptoms18['SymptomDurationValue'] == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor



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
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                            <option value="{{ $durationType }}"
                                                                {{ isset($disfiguringSymptoms18['SymptomDurationType']) &&  $disfiguringSymptoms18['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
                                                                {{ $durationType }}
                                                            </option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[17][3]">{{ trim($disfiguringSymptoms18['SymptomDurationNote'] ?? '') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    {{-- add  --}}
                                    
                                    <div class="col-lg-12">
                                        @foreach ($disfiguringSymptomsNotExist as $index => $symptom)
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" id="sym_a{{$index+19}}"
                                                        name="symptoms[{{$index+19}}][0]" value="{{ $symptom['SymptomType'] }}"
                                                        {{ isset($symptom['SymptomType']) && $symptom['SymptomType'] == $symptom['SymptomType'] ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="sym_a{{$index+19}}">
                                                        {{ $symptom['SymptomType'] }}
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2" name="symptoms[{{$index+19}}][1]">
                                                            <option value="">Duration value</option>
                                                            @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($symptom['SymptomDurationValue']) && $symptom['SymptomDurationValue'] == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2" name="symptoms[{{$index+19}}][2]">
                                                            <option value="">Duration Type</option>
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                            <option value="{{ $durationType }}"
                                                                {{ isset($symptom['SymptomDurationType']) && $symptom['SymptomDurationType'] == $durationType ? 'selected' : '' }}>
                                                                {{ $durationType }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="inner_element">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px"
                                                            name="symptoms[{{$index+19}}][3]">{{ trim($symptom['SymptomDurationNote'] ?? '') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    
                                    {{-- end --}}
                                    
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h6 class="section_title__">Symptoms Severity Score (SSS)</h6>
                                            <h4>Soft tissue Pain score (STPS)</h4>
                                        </div>
                                    </div>
                                    @php
                                        if (isset($symptoms_scores) && !empty($symptoms_scores)) {
                                            $symptoms_scores = json_decode($symptoms_scores->data_value, true);
                                            //    echo "<pre>";
                                            //     print_r($symptoms_scores);
                                            //     die;

                                            $sum = 0;

                                            foreach ($symptoms_scores as $symptom => $values) {
                                                $sum += $values[0];
                                            }
                                        }

                                    @endphp

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
                                                                id="formRadiosRight14" value="0"
                                                                {{ isset($symptoms_scores['Shoulderpain'][0]) && $symptoms_scores['Shoulderpain'][0] == 0 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight14">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Shoulderpain][]"
                                                                id="formRadiosRight15" value="1"
                                                                {{ isset($symptoms_scores['Shoulderpain'][0]) && $symptoms_scores['Shoulderpain'][0] == 1 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight15">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Shoulderpain][]"
                                                                id="formRadiosRight16" value="3"
                                                                {{ isset($symptoms_scores['Shoulderpain'][0]) && $symptoms_scores['Shoulderpain'][0] == 3 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight16">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Shoulderpain][]"
                                                                id="formRadiosRight17" value="5"
                                                                {{ isset($symptoms_scores['Shoulderpain'][0]) && $symptoms_scores['Shoulderpain'][0] == 5 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight17">
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
                                                                id="formRadiosRight18" value="0"
                                                                {{ isset($symptoms_scores['ShoulderjointStiffness'][0]) && $symptoms_scores['ShoulderjointStiffness'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight18">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ShoulderjointStiffness][]"
                                                                id="formRadiosRight19" value="1"
                                                                {{ isset($symptoms_scores['ShoulderjointStiffness'][0]) && $symptoms_scores['ShoulderjointStiffness'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight19">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ShoulderjointStiffness][]"
                                                                id="formRadiosRight20" value="3"
                                                                {{ isset($symptoms_scores['ShoulderjointStiffness'][0]) && $symptoms_scores['ShoulderjointStiffness'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight20">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ShoulderjointStiffness][]"
                                                                id="formRadiosRight21" value="5"
                                                                {{ isset($symptoms_scores['ShoulderjointStiffness'][0]) && $symptoms_scores['ShoulderjointStiffness'][0] == 5 ? 'checked' : '' }}>
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
                                                                id="formRadiosRight22" value="0"
                                                                {{ isset($symptoms_scores['ShoulderMuscleSpasm'][0]) && $symptoms_scores['ShoulderMuscleSpasm'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight22">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ShoulderMuscleSpasm][]"
                                                                id="formRadiosRight23" value="1"
                                                                {{ isset($symptoms_scores['ShoulderMuscleSpasm'][0]) && $symptoms_scores['ShoulderMuscleSpasm'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight23">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ShoulderMuscleSpasm][]"
                                                                id="formRadiosRight24" value="3"
                                                                {{ isset($symptoms_scores['ShoulderMuscleSpasm'][0]) && $symptoms_scores['ShoulderMuscleSpasm'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight24">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ShoulderMuscleSpasm][]"
                                                                id="formRadiosRight25" value="5"
                                                                {{ isset($symptoms_scores['ShoulderMuscleSpasm'][0]) && $symptoms_scores['ShoulderMuscleSpasm'][0] == 5 ? 'checked' : '' }}>
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
                                                                id="formRadiosRight26" value="0"
                                                                {{ isset($symptoms_scores['Paintodistalarm'][0]) && $symptoms_scores['Paintodistalarm'][0] == 0 ? 'checked' : '' }}>
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
                                                                id="formRadiosRight27" value="1"
                                                                {{ isset($symptoms_scores['Paintodistalarm'][0]) && $symptoms_scores['Paintodistalarm'][0] == 1 ? 'checked' : '' }}>
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
                                                                id="formRadiosRight28" value="3"
                                                                {{ isset($symptoms_scores['Paintodistalarm'][0]) && $symptoms_scores['Paintodistalarm'][0] == 3 ? 'checked' : '' }}>
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
                                                                id="formRadiosRight29" value="5"
                                                                {{ isset($symptoms_scores['Paintodistalarm'][0]) && $symptoms_scores['Paintodistalarm'][0] == 5 ? 'checked' : '' }}>
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
                                                                id="formRadiosRight30" value="0"
                                                                {{ isset($symptoms_scores['Numbnessonliftingweight'][0]) && $symptoms_scores['Numbnessonliftingweight'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight30">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Numbnessonliftingweight][]"
                                                                id="formRadiosRight31" value="1"
                                                                {{ isset($symptoms_scores['Numbnessonliftingweight'][0]) && $symptoms_scores['Numbnessonliftingweight'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight31">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Numbnessonliftingweight][]"
                                                                id="formRadiosRight32" value="3"
                                                                {{ isset($symptoms_scores['Numbnessonliftingweight'][0]) && $symptoms_scores['Numbnessonliftingweight'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight32">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Numbnessonliftingweight][]"
                                                                id="formRadiosRight33" value="5"
                                                                {{ isset($symptoms_scores['Numbnessonliftingweight'][0]) && $symptoms_scores['Numbnessonliftingweight'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight33">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Pain on lifting weight </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painonliftingweight][]"
                                                                id="formRadiosRight341" value="0"
                                                                {{ isset($symptoms_scores['Painonliftingweight'][0]) && $symptoms_scores['Painonliftingweight'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painonliftingweight][]"
                                                                id="formRadiosRight351" value="1"
                                                                {{ isset($symptoms_scores['Painonliftingweight'][0]) && $symptoms_scores['Painonliftingweight'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painonliftingweight][]"
                                                                id="formRadiosRight361" value="3"
                                                                {{ isset($symptoms_scores['Painonliftingweight'][0]) && $symptoms_scores['Painonliftingweight'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painonliftingweight][]"
                                                                id="formRadiosRight371" value="5"
                                                                {{ isset($symptoms_scores['Painonliftingweight'][0]) && $symptoms_scores['Painonliftingweight'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371">
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
                                                                id="formRadiosRight341WarmShoulder" value="0"
                                                                {{ isset($symptoms_scores['WarmShoulder'][0]) && $symptoms_scores['WarmShoulder'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341WarmShoulder">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[WarmShoulder][]"
                                                                id="formRadiosRight351WarmShoulder" value="1"
                                                                {{ isset($symptoms_scores['WarmShoulder'][0]) && $symptoms_scores['WarmShoulder'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351WarmShoulder">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[WarmShoulder][]"
                                                                id="formRadiosRight361WarmShoulder" value="3"
                                                                {{ isset($symptoms_scores['WarmShoulder'][0]) && $symptoms_scores['WarmShoulder'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361WarmShoulder">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[WarmShoulder][]"
                                                                id="formRadiosRight371WarmShoulder" value="5"
                                                                {{ isset($symptoms_scores['WarmShoulder'][0]) && $symptoms_scores['WarmShoulder'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371WarmShoulder">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                
                                                @if (isset($sum))
                                                    @if ($sum >= 0 && $sum <= 15)
                                                        <tr id="mildLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Mild LUTS </th>
                                                            <th>(0-15 pts)</th>
                                                        </tr>
                                                    @elseif ($sum >= 16 && $sum <= 30)
                                                        <tr id="moderateLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Moderate LUTS </th>
                                                            <th>(16-30 pts) </th>
                                                        </tr>
                                                    @elseif ($sum >= 31 && $sum <= 1999)
                                                        <tr id="severeLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Severe LUTS </th>
                                                            <th>(31-50 pts) </th>
                                                        </tr>
                                                    @endif
                                                @endif
                                                <tr id="mildLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Mild LUTS </th>
                                                    <th>(0-15 pts)</th>
                                                </tr>
                                                <tr id="moderateLUTS" class="hidden">>
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Moderate LUTS </th>
                                                    <th>(16-30 pts) </th>
                                                </tr>
                                                <tr id="severeLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Severe LUTS </th>
                                                    <th>(31-50 pts) </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>Negative Clinical indicators</h4>
                                        </div>
                                    </div>

                                    @php
                                        if (isset($clinical_indicators) && !empty($clinical_indicators)) {
                                            $clinical_indicators = json_decode($clinical_indicators->data_value, true);
                                            //    echo "<pre>";
                                            //     print_r($clinical_indicators);
                                            //     die;
                                        }

                                    @endphp
                                    <div class="col-lg-12">
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Soft tissue infection (acute pain | acute fever | acute swelling | acute redness)</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Softtissue][]" id="formRadiosRight42"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['Softtissue'][0]) && $clinical_indicators['Softtissue'][0] == 'YES' ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="formRadiosRight42">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Softtissue][]" id="formRadiosRight43"
                                                        value="No"
                                                        {{ isset($clinical_indicators['Softtissue'][0]) && $clinical_indicators['Softtissue'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight43">
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
                                                        value="YES"
                                                        {{ isset($clinical_indicators['ShoulderProsthesis'][0]) && $clinical_indicators['ShoulderProsthesis'][0] == 'YES' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="formRadiosRight042ShoulderProsthesis">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[ShoulderProsthesis][]" id="formRadiosRight043ShoulderProsthesis"
                                                        value="No"
                                                        {{ isset($clinical_indicators['ShoulderProsthesis'][0]) && $clinical_indicators['ShoulderProsthesis'][0] == 'No' ? 'checked' : '' }}
                                                        >
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
                                                        value="YES"
                                                        {{ isset($clinical_indicators['seroma'][0]) && $clinical_indicators['seroma'][0] == 'YES' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="formRadiosRight042seroma">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[seroma][]" id="formRadiosRight043seroma"
                                                        value="No"
                                                        {{ isset($clinical_indicators['seroma'][0]) && $clinical_indicators['seroma'][0] == 'No' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="formRadiosRight043seroma">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div> 
                                                                  
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Clinical Exam 
                                            {{-- <a target="_blank"  href="{{ route('user.viewShoulderPainEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn">Order Now <i
                                                    class="fa-solid fa-arrow-right-long"></i></a> --}}
                                                </h6>
                                        <div class="title_head">
                                            <h4>Add Clinical Finding </h4>
                                        </div>

                                    </div>
                                    @php
                                        if (isset($ClinicalExam) && !empty($ClinicalExam)) {
                                            $ClinicalExam = json_decode($ClinicalExam->data_value, true);
                                            //    echo "<pre>";
                                            //     print_r($ClinicalExam);
                                            //     die;
                                        }

                                    @endphp
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Regional Exam</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_exam[RegionalExam][]" value="Normal"
                                                        id="clinic_exam_1"
                                                        {{ isset($ClinicalExam['RegionalExam'][0]) && $ClinicalExam['RegionalExam'][0] == 'Normal' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="clinic_exam_1">
                                                        Normal
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_exam[RegionalExam][]" value="Abnormal"
                                                        id="clinic_exam_2"
                                                        {{ isset($ClinicalExam['RegionalExam'][0]) && $ClinicalExam['RegionalExam'][0] == 'Abnormal' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="clinic_exam_2">
                                                        Abnormal
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="abnormal_c2">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"
                                                        name="clinical_exam[RegionalExamNote][]">{{ $ClinicalExam['RegionalExamNote'][0] ?? '' }}</textarea>
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
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_exam[SystemicExam][]" value="Normal"
                                                        id="clinic_exam_3"
                                                        {{ isset($ClinicalExam['SystemicExam'][0]) && $ClinicalExam['SystemicExam'][0] == 'Normal' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="clinic_exam_3">
                                                        Normal
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_exam[SystemicExam][]" value="Abnormal"
                                                        id="clinic_exam_4"
                                                        {{ isset($ClinicalExam['SystemicExam'][0]) && $ClinicalExam['SystemicExam'][0] == 'Abnormal' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="clinic_exam_4">
                                                        Abnormal
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="abnormal_c4">
                                                <div class="form-check form-check-right mb-3">
                                                    <textarea class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px"
                                                        name="clinical_exam[SystemicExamNote][]">{{ $ClinicalExam['SystemicExamNote'][0] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Imaging 
                                            {{-- <a target="_blank"  href="{{ route('user.viewShoulderPainEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a> --}}
                                        </h6>
                                      </div>
                                      
                                      <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>USMSK60   &gt; <span class="sub_tt__"> </span></h4>
                                        </div>
                                    </div>
                                      @php
                                      if (isset($Imaging) && !empty($Imaging)) {
                                          $Imaging = json_decode($Imaging->data_value, true);
                                          //    echo "<pre>";
                                          //     print_r($Imaging);
                                          //     die;
                                      }
  
  
  
                                  @endphp


                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-4">
                    <h6 class="mb-3 lut_title">US - MSK (joint - Soft tissue ) Findings </h6>
                    </div>
                    <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[Softtissue][]" value="Normal" id="formRadiosRighte13"
                                    {{ isset($Imaging['Softtissue'][0]) && $Imaging['Softtissue'][0] == "Normal" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRighte13">
                                    Normal
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[Softtissue][]" value="Abnormal" id="formRadiosRighte14"
                                    {{ isset($Imaging['Softtissue'][0]) && $Imaging['Softtissue'][0] == "Abnormal" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRighte14">
                                    Abnormal
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_e14" style="display: none;">
                                <div class="mb-3 form-group">
                                    <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
                                    <textarea class="form-control" placeholder="" style="height: 100px" name="Imaging[SofttissueNote][]">{{ $Imaging['SofttissueNote'][0] ?? '' }}</textarea>
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
                                    <input class="form-check-input" type="radio" name="Imaging[Affectednerve][]" value="Visible"  id="formRadiosRightd38"
                                    {{ isset($Imaging['Affectednerve'][0]) && $Imaging['Affectednerve'][0] == "Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd38">
                                    Visible
                                    </label>
                                </div>
                            </div>

                            
                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[Affectednerve][]" value="Non-Visible"  id="formRadiosRightd119"
                                    {{ isset($Imaging['Affectednerve'][0]) && $Imaging['Affectednerve'][0] == "Non-Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd119">
                                        Non-Visible
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_119" style="display: none;">
                            <div class="text_area_gfhi mb-3">
                            <textarea class="form-control" placeholder="Enter Elaborate Rheumatology / notes here***" style="height: 100px" name="Imaging[AffectednerveNote][]">{{ $Imaging['CervicalNerveRootsNote'][0] ?? '' }}</textarea>
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
                                    <input class="form-check-input" type="radio" name="Imaging[Shouldereffusion][]" value="Yes" id="formRadiosRightd14"
                                    {{ isset($Imaging['Shouldereffusion'][0]) && $Imaging['Shouldereffusion'][0] == "Yes" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd14">
                                    Yes
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[Shouldereffusion][]" value="No" id="formRadiosRightd15"
                                    {{ isset($Imaging['Shouldereffusion'][0]) && $Imaging['Shouldereffusion'][0] == "No" ? 'checked' : '' }}
                                    >
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
                                    <input class="form-check-input" type="radio" name="Imaging[Osteoarthreticfeatures][]" value="Yes" id="formRadiosRightd39"
                                    {{ isset($Imaging['Osteoarthreticfeatures'][0]) && $Imaging['Osteoarthreticfeatures'][0] == "Yes" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd39">
                                    Yes
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[Osteoarthreticfeatures][]" value="No" id="formRadiosRightd40"
                                    {{ isset($Imaging['Osteoarthreticfeatures'][0]) && $Imaging['Osteoarthreticfeatures'][0] == "No" ? 'checked' : '' }}
                                    >
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
                      <h6 class="mb-3 lut_title">MRI - Knee Protocol- Findings </h6>
                    </div>
                    <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[MRCIR48][]" value="Normal" id="formRadiosRighte15"
                                    {{ isset($Imaging['MRCIR48'][0]) && $Imaging['MRCIR48'][0] == "Normal" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRighte15">
                                    Normal
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[MRCIR48][]" value="Abnormal" id="formRadiosRighte16"
                                    {{ isset($Imaging['MRCIR48'][0]) && $Imaging['MRCIR48'][0] == "Abnormal" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRighte16">
                                    Abnormal
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_e16" style="">
                                <div class="mb-3 form-group">
                                    <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
                                    <textarea class="form-control" placeholder="" style="height: 100px"  name="Imaging[MRCIR48Note][]">{{ $Imaging['MRCIR48Note'][0] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    

                    

                   
                    
                  <div class="col-lg-12">
                    <div class="title_head">
                        <h4>CTCIR48  &gt; <span class="sub_tt__">CTA - Pelvic Protocol - Findings
                        </span></h4>
                    </div>
                </div> 
                
               
                <div class="col-lg-12">
                    <div class="row">
                    <div class="col-lg-4">
                  <h6 class="mb-3 lut_title">CT -  Knee Protocol- Findings </h6>
                </div>
                <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input" type="radio" name="Imaging[CTCIR48][]" value="Normal" id="formRadiosRighte17"
                                {{ isset($Imaging['CTCIR48'][0]) && $Imaging['CTCIR48'][0] == "Normal" ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="formRadiosRighte17">
                                Normal
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input" type="radio" name="Imaging[CTCIR48][]" value="Abnormal" id="formRadiosRighte18"
                                {{ isset($Imaging['CTCIR48'][0]) && $Imaging['CTCIR48'][0] == "Abnormal" ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="formRadiosRighte18">
                               Abnormal
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12" id="textarea_e18" style="display: none;">
                            <div class="mb-3 form-group">
                                <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
                                <textarea class="form-control" placeholder="" style="height: 100px" name="Imaging[CTCIR48Note][]">{{ $Imaging['CTCIR48Note'][0] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
              

                 
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Image Annotation</h6>
                                        <div class="title_head">
                                            <h4>Annotate Leg Veins findings</h4>
                                        </div>
                                        <!-- <h6 class="mb-3 lut_title">Calculate TI-RARDS - RIGHT LOBE score</h6> -->
                                    </div>
                                    <div class="col-lg-12">
                                        <!-- <div class="nodule_img">
                                                                                  <img src="images/new-images/nodules.png" alt="">
                                                                              </div> -->
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
                                    @php
                                    if (isset($Labs) && !empty($Labs)) {
                                        $Lab = json_decode($Labs->data_value, true);
                                        //    echo "<pre>";
                                        //     print_r($Labs);
                                        //     die;
                                    }

                                @endphp

<div class="col-lg-12">
    <h6 class="section_title__">Lab 
        {{-- <a target="_blank"  href="{{ route('user.viewShoulderPainEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a> --}}
    </h6>
  </div>
  <div class="col-lg-12">
    <div class="title_head">
        <h4>LABACUTEMSK35   &gt; <span class="sub_tt__"> Acute MSK inflammation Results</span></h4>
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
                <option value="normal" {{ isset($Lab['CBC'][0]) && $Lab['CBC'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                <option value="low" {{ isset($Lab['CBC'][0]) && $Lab['CBC'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                <option value="high" {{ isset($Lab['CBC'][0]) && $Lab['CBC'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                </select>
                <div class="result result_value {{ isset($Lab['CBC'][0]) ? $Lab['CBC'][0] : '' }}">
                    <!-- Display low, high, and normal values here -->
                    {{ isset($Lab['CBC'][0]) ? $Lab['CBC'][0] : '' }}
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
                <option value="normal" {{ isset($Lab['CRP'][0]) && $Lab['CRP'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                <option value="low" {{ isset($Lab['CRP'][0]) && $Lab['CRP'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                <option value="high" {{ isset($Lab['CRP'][0]) && $Lab['CRP'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                </select>
                <div class="result result_value {{ isset($Lab['CRP'][0]) ? $Lab['CRP'][0] : '' }}">
                    <!-- Display low, high, and normal values here -->
                    {{ isset($Lab['CRP'][0]) ? $Lab['CRP'][0] : '' }}
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
                 <option value="normal" {{ isset($Lab['ESR'][0]) && $Lab['ESR'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                 <option value="low" {{ isset($Lab['ESR'][0]) && $Lab['ESR'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                 <option value="high" {{ isset($Lab['ESR'][0]) && $Lab['ESR'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                 </select>
                 <div class="result result_value {{ isset($Lab['ESR'][0]) ? $Lab['ESR'][0] : '' }}">
                     <!-- Display low, high, and normal values here -->
                     {{ isset($Lab['ESR'][0]) ? $Lab['ESR'][0] : '' }}
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
                     <option value="normal" {{ isset($Lab['CKMP'][0]) && $Lab['CKMP'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                     <option value="low" {{ isset($Lab['CKMP'][0]) && $Lab['CKMP'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                     <option value="high" {{ isset($Lab['CKMP'][0]) && $Lab['CKMP'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                     </select>
                     <div class="result result_value {{ isset($Lab['CKMP'][0]) ? $Lab['CKMP'][0] : '' }}">
                         <!-- Display low, high, and normal values here -->
                         {{ isset($Lab['CKMP'][0]) ? $Lab['CKMP'][0] : '' }}
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
                         <option value="normal" {{ isset($Lab['UricAcid'][0]) && $Lab['UricAcid'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                         <option value="low" {{ isset($Lab['UricAcid'][0]) && $Lab['UricAcid'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                         <option value="high" {{ isset($Lab['UricAcid'][0]) && $Lab['UricAcid'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                         </select>
                         <div class="result result_value {{ isset($Lab['UricAcid'][0]) ? $Lab['UricAcid'][0] : '' }}">
                             <!-- Display low, high, and normal values here -->
                             {{ isset($Lab['UricAcid'][0]) ? $Lab['UricAcid'][0] : '' }}
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
                             <option value="normal" {{ isset($Lab['RF'][0]) && $Lab['RF'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                             <option value="low" {{ isset($Lab['RF'][0]) && $Lab['RF'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                             <option value="high" {{ isset($Lab['RF'][0]) && $Lab['RF'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                             </select>
                             <div class="result result_value {{ isset($Lab['RF'][0]) ? $Lab['RF'][0] : '' }}">
                                 <!-- Display low, high, and normal values here -->
                                 {{ isset($Lab['RF'][0]) ? $Lab['RF'][0] : '' }}
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
                                <option value="normal" {{ isset($Lab['WBC'][0]) && $Lab['WBC'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                                <option value="low" {{ isset($Lab['WBC'][0]) && $Lab['WBC'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                                <option value="high" {{ isset($Lab['WBC'][0]) && $Lab['WBC'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                                </select>
                                <div class="result result_value  {{ isset($Lab['WBC'][0]) ? $Lab['WBC'][0] : '' }}">
                                    <!-- Display low, high, and normal values here -->
                                    {{ isset($Lab['WBC'][0]) ? $Lab['WBC'][0] : '' }}
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
                                   <option value="normal" {{ isset($Lab['Proteins'][0]) && $Lab['Proteins'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                                   <option value="low" {{ isset($Lab['Proteins'][0]) && $Lab['Proteins'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                                   <option value="high" {{ isset($Lab['Proteins'][0]) && $Lab['Proteins'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                                   </select>
                                   <div class="result result_value  {{ isset($Lab['Proteins'][0]) ? $Lab['Proteins'][0] : '' }}">
                                       <!-- Display low, high, and normal values here -->
                                       {{ isset($Lab['Proteins'][0]) ? $Lab['Proteins'][0] : '' }}
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
                                       <option value="normal" {{ isset($Lab['Glucose'][0]) && $Lab['Glucose'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                                       <option value="low" {{ isset($Lab['Glucose'][0]) && $Lab['Glucose'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                                       <option value="high" {{ isset($Lab['Glucose'][0]) && $Lab['Glucose'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                                       </select>
                                       <div class="result result_value  {{ isset($Lab['Glucose'][0]) ? $Lab['Glucose'][0] : '' }}">
                                           <!-- Display low, high, and normal values here -->
                                           {{ isset($Lab['Glucose'][0]) ? $Lab['Glucose'][0] : '' }}
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
                                           <option value="normal" {{ isset($Lab['Crystals'][0]) && $Lab['Crystals'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                                           <option value="low" {{ isset($Lab['Crystals'][0]) && $Lab['Crystals'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                                           <option value="high" {{ isset($Lab['Crystals'][0]) && $Lab['Crystals'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                                           </select>
                                           <div class="result result_value {{ isset($Lab['Crystals'][0]) ? $Lab['Crystals'][0] : '' }}">
                                               <!-- Display low, high, and normal values here -->
                                               {{ isset($Lab['Crystals'][0]) ? $Lab['Crystals'][0] : '' }}
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
                                               <option value="normal" {{ isset($Lab['Lactate'][0]) && $Lab['Lactate'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                                               <option value="low" {{ isset($Lab['Lactate'][0]) && $Lab['Lactate'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                                               <option value="high" {{ isset($Lab['Lactate'][0]) && $Lab['Lactate'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                                               </select>
                                               <div class="result result_value {{ isset($Lab['Lactate'][0]) ? $Lab['Lactate'][0] : '' }}">
                                                   <!-- Display low, high, and normal values here -->
                                                   {{ isset($Lab['Lactate'][0]) ? $Lab['Lactate'][0] : '' }}
                                               </div>
                                           </div>
                                       </div>
                                       </div>
                                    </div>
                                  
                                   
    

                                    <div class="col-lg-12  mb-2">
                                        <h6 class="section_title__">Special Investigation 
                                            {{-- <a href="javascript:void(0)"
                                                data-bs-toggle="modal" data-bs-target="#refer_patient"
                                                class="order-now_btn">Reffer <i
                                                    class="fa-solid fa-arrow-right-long"></i></a> --}}
                                                </h6>
                                        <div class="title_head">
                                            <h4>REQNERVECON5</h4>
                                        </div>
                                        @php
                                            if (isset($SpecialInvestigations) && !empty($SpecialInvestigations)) {
                                                $SpecialInvestigations = json_decode($SpecialInvestigations->data_value, true);
                                                //    echo "<pre>";
                                                //     print_r($SpecialInvestigations);
                                                //     die;
                                            }

                                        @endphp
                                        
                                        
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Peripheral Nerve conduction study</h6>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="SpecialInvestigation[Peripheral][]"  value="Normal" id="formRadiosRightbf5"
                                                        {{ isset($SpecialInvestigations['Peripheral'][0]) && $SpecialInvestigations['Peripheral'][0] == "Normal" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightbf5">
                                                        Normal
                                                        </label>
                                                    </div>
                                                 
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="SpecialInvestigation[Peripheral][]"  value="Abnormal" id="formRadiosRightbf7"
                                                        {{ isset($SpecialInvestigations['Peripheral'][0]) && $SpecialInvestigations['Peripheral'][0] == "Abnormal" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightbf7">
                                                        Abnormal
                                                        </label>
                                                    </div>
                                                 
                                                </div>
                                         
                                                <div class="col-lg-12" id="textarea_a789" >
                                                    <div class="row addmore_diag">
                                                        <div class="col-lg-12">
                                                        <div class="inner_element">
                                                            
                                                            <div class="form-group">
                                                            <textarea  name="SpecialInvestigation[PeripheralNote][]" class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px">{{ $SpecialInvestigations['PeripheralNote'][0]  ?? '' }}</textarea>
                                                            </div>
                                                        </div>
                                                        </div>
                                                       
                                                        
                                                            
                                                    </div>
                                                 </div>
  
  
                
                                            </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">MDT 
                                            {{-- <a target="_blank"  href="{{ route('user.viewShoulderPainEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a> --}}
                                                </h6>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>MDTREVIEW00  &#62; <span class="sub_tt__"> Hemarrhoids MDT outcome</span></h4>
                                        </div>
                                    </div>
                                    @php
                                        if (isset($MDTs) && !empty($MDTs)) {
                                            $MDTs = json_decode($MDTs->data_value, true);
                                            //    echo "<pre>";
                                            //     print_r($MDTs);
                                            //     die;
                                        }

                                    @endphp
                                    <div class="col-lg-12">
                                        <h6 class="mb-3 lut_title">MDT decision</h6>
                                    </div>

                                    
                                    <div class="col-lg-12">
                                        <div class="row">
                                     
                                                    <div class="col-lg-6">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="checkbox" name="MDT[IRprocedure][]" value="IR procedure" id="formRadiosRight84"
                                                        {{ isset($MDTs['IRprocedure'][0]) && $MDTs['IRprocedure'][0] == 'IR procedure' ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRight84">
                                                            IR procedure
                                                        </label>
                                                    </div>
                                                    <div  id="textarea_84">
                                                    <div class="form-check form-check-right mb-3">
                                                      <textarea class="form-control" placeholder="Enter Elaborate    HE / notes here***"  style="height: 100px" name="MDT[IRprocedureNote][]">{{ $MDTs['IRprocedureNote'][0] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="checkbox" name="MDT[Medical][]" value="Medical"  id="formRadiosRight85"
                                                        {{ isset($MDTs['Medical'][0]) && $MDTs['Medical'][0] == 'Medical' ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRight85">
                                                        Medical
                                                        </label>
                                                    </div>
                                                    <div  id="textarea_85">
                                                    <div class="form-check form-check-right mb-3">
                                                      <textarea class="form-control" placeholder="Enter Elaborate Medical / notes here***"  style="height: 100px" name="MDT[MedicalNote][]">{{ $MDTs['MedicalNote'][0] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="checkbox" name="MDT[Surgical][]" value="Surgical" id="formRadiosRight86"
                                                        {{ isset($MDTs['Surgical'][0]) && $MDTs['Surgical'][0] == 'Surgical' ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRight86">
                                                        Surgical
                                                        </label>
                                                    </div>
                                                    <div  id="textarea_86">
                                                    <div class="form-check form-check-right mb-3">
                                                      <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***"  style="height: 100px" name="MDT[SurgicalNote][]">{{ $MDTs['SurgicalNote'][0] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="checkbox" name="MDT[options][]" value="options" id="formRadiosRight87"
                                                        {{ isset($MDTs['options'][0]) && $MDTs['options'][0] == 'options' ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRight87">
                                                        Other options
                                                        </label>
                                                    </div>
                                                    <div  id="textarea_87">
                                                    <div class="form-check form-check-right mb-3">
                                                      <textarea class="form-control" placeholder="Enter Elaborate  Other options / notes here***"  style="height: 100px" name="MDT[optionsNote][]">{{ $MDTs['optionsNote'][0] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                                </div>
                                              
                                            
                                              
                                             
                                            </div>
                                        </div>

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Eligibility STATUS 
                                            {{-- <a target="_blank"  href="{{ route('user.viewShoulderPainEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a> --}}
                                                </h6>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>Choose Eligible treatment option</h4>
                                        </div>
                                    </div>

                                    @php
                                        if (isset($ElegibilitySTATUS) && !empty($ElegibilitySTATUS)) {
                                            $ElegibilitySTATUS = json_decode($ElegibilitySTATUS->data_value, true);
                                            //    echo "<pre>";
                                            //     print_r($ElegibilitySTATUS);
                                            //     die;
                                        }

                                    @endphp
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Conservative - Topical Riparil&nbsp;</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[TopicalRiparil][]" value="Non-Eligibile" id="formRadiosRightj1"
                                                    {{ isset($ElegibilitySTATUS['TopicalRiparil'][0]) && $ElegibilitySTATUS['TopicalRiparil'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj1">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[TopicalRiparil][]" value="Eligibile" id="formRadiosRightj2"
                                                    {{ isset($ElegibilitySTATUS['TopicalRiparil'][0]) && $ElegibilitySTATUS['TopicalRiparil'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj2">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j2" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[TopicalRiparilNote][]">{{ $ElegibilitySTATUS['TopicalRiparilNote'][0] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Conservative - Topical Analgesics &nbsp;</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[TopicalAnalgesics][]" value="Non-Eligibile" id="formRadiosRightj3"
                                                    {{ isset($ElegibilitySTATUS['TopicalAnalgesics'][0]) && $ElegibilitySTATUS['TopicalAnalgesics'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj3">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[TopicalAnalgesics][]" value="Eligibile" id="formRadiosRightj4"
                                                    {{ isset($ElegibilitySTATUS['TopicalAnalgesics'][0]) && $ElegibilitySTATUS['TopicalAnalgesics'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj4">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j4" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[TopicalAnalgesicsNote][]">{{ $ElegibilitySTATUS['TopicalAnalgesicsNote'][0] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Conservative - PO Analgesics</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[POAnalgesics][]" value="Non-Eligibile" id="formRadiosRightj5"
                                                    {{ isset($ElegibilitySTATUS['POAnalgesics'][0]) && $ElegibilitySTATUS['POAnalgesics'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj5">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[POAnalgesics][]" value="Eligibile" id="formRadiosRightj6"
                                                    {{ isset($ElegibilitySTATUS['POAnalgesics'][0]) && $ElegibilitySTATUS['POAnalgesics'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj6">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j6" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[POAnalgesicsNote][]">{{ $ElegibilitySTATUS['POAnalgesicsNote'][0] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Conservative - PO Glucasamine / Chondroitin</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Chondroitin][]" value="Non-Eligibile"  id="formRadiosRightj7"
                                                    {{ isset($ElegibilitySTATUS['Chondroitin'][0]) && $ElegibilitySTATUS['Chondroitin'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj7">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Chondroitin][]" value="Eligibile"  id="formRadiosRightj8"
                                                    {{ isset($ElegibilitySTATUS['Chondroitin'][0]) && $ElegibilitySTATUS['Chondroitin'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj8">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j8" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[ChondroitinNote][]">{{ $ElegibilitySTATUS['ChondroitinNote'][0] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Conservative - PO Collagen</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"  name="ElegibilitySTATUS[POCollagen][]" value="Non-Eligibile"  id="formRadiosRightj9"
                                                    {{ isset($ElegibilitySTATUS['POCollagen'][0]) && $ElegibilitySTATUS['POCollagen'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj9">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"  name="ElegibilitySTATUS[POCollagen][]" value="Eligibile"  id="formRadiosRightj10"
                                                    {{ isset($ElegibilitySTATUS['POCollagen'][0]) && $ElegibilitySTATUS['POCollagen'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj10">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j10" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[POCollagenNote][]">{{ $ElegibilitySTATUS['POCollagenNote'][0] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Conservative - IV Vitamines</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[conservativeVitamines][]" value="Non-Eligibile" id="formRadiosRightj11"
                                                    {{ isset($ElegibilitySTATUS['conservativeVitamines'][0]) && $ElegibilitySTATUS['conservativeVitamines'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj11">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[conservativeVitamines][]" value="Eligibile" id="formRadiosRightj12"
                                                    {{ isset($ElegibilitySTATUS['conservativeVitamines'][0]) && $ElegibilitySTATUS['conservativeVitamines'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj12">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j12" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[conservativeVitaminesNote][]">{{ $ElegibilitySTATUS['conservativeVitaminesNote'][0] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Conservative - IM Nurobion</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[conservativeIMNurobion][]" value="Non-Eligibile" id="formRadiosRightj13"
                                                    {{ isset($ElegibilitySTATUS['conservativeIMNurobion'][0]) && $ElegibilitySTATUS['conservativeIMNurobion'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj13">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[conservativeIMNurobion][]" value="Eligibile" id="formRadiosRightj14"
                                                    {{ isset($ElegibilitySTATUS['conservativeIMNurobion'][0]) && $ElegibilitySTATUS['conservativeIMNurobion'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj14">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j14" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[conservativeIMNurobionNote][]" >{{ $ElegibilitySTATUS['conservativeIMNurobionNote'][0]  ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Conservative - IM Collagen</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"  name="ElegibilitySTATUS[conservativeIMCollagen][]" value="Non-Eligibile" id="formRadiosRightj15"
                                                    {{ isset($ElegibilitySTATUS['conservativeIMCollagen'][0]) && $ElegibilitySTATUS['conservativeIMCollagen'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj15">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"  name="ElegibilitySTATUS[conservativeIMCollagen][]" value="Eligibile" id="formRadiosRightj16"
                                                    {{ isset($ElegibilitySTATUS['conservativeIMCollagen'][0]) && $ElegibilitySTATUS['conservativeIMCollagen'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj16">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j16" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[conservativeIMCollagenNote][]">{{ $ElegibilitySTATUS['conservativeIMCollagenNote'][0] ?? '' }}</textarea>
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Steroidsinjection][]" value="Non-Eligibile" id="formRadiosRightj17"
                                                    {{ isset($ElegibilitySTATUS['Steroidsinjection'][0]) && $ElegibilitySTATUS['Steroidsinjection'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj17">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Steroidsinjection][]" value="Eligibile" id="formRadiosRightj18"
                                                    {{ isset($ElegibilitySTATUS['Steroidsinjection'][0]) && $ElegibilitySTATUS['Steroidsinjection'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj18">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j18" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[SteroidsinjectionNote][]">{{ $ElegibilitySTATUS['conservativekneeBraceNote'][0] ?? '' }}</textarea>
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Triggerpointinjection][]" value="Non-Eligibile"  id="formRadiosRightj19"
                                                    {{ isset($ElegibilitySTATUS['Triggerpointinjection'][0]) && $ElegibilitySTATUS['Triggerpointinjection'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj19">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Triggerpointinjection][]" value="Eligibile"  id="formRadiosRightj20"
                                                    {{ isset($ElegibilitySTATUS['Triggerpointinjection'][0]) && $ElegibilitySTATUS['Triggerpointinjection'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj20">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j20" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[TriggerpointinjectionNote][]" >{{ $ElegibilitySTATUS['TriggerpointinjectionNote'][0]  ?? '' }}</textarea>
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[PRPinjection][]" value="Non-Eligibile"  id="formRadiosRightj21"
                                                    {{ isset($ElegibilitySTATUS['PRPinjection'][0]) && $ElegibilitySTATUS['PRPinjection'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj21">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[PRPinjection][]" value="Eligibile"  id="formRadiosRightj22"
                                                    {{ isset($ElegibilitySTATUS['PRPinjection'][0]) && $ElegibilitySTATUS['PRPinjection'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj22">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j22" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[PRPinjectionNote][]">{{ $ElegibilitySTATUS['PRPinjectionNote'][0]  ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">HA injection</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[HAinjection][]" value="Non-Eligibile" id="formRadiosRightj23"
                                                    {{ isset($ElegibilitySTATUS['HAinjection'][0]) && $ElegibilitySTATUS['HAinjection'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj23">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[HAinjection][]" value="Eligibile"  id="formRadiosRightj24"
                                                    {{ isset($ElegibilitySTATUS['HAinjection'][0]) && $ElegibilitySTATUS['HAinjection'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj24">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j24" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[HAinjectionNote][]">{{ $ElegibilitySTATUS['HAinjectionNote'][0] ?? '' }}</textarea>
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[OzoneIAinjection][]" value="Non-Eligibile" id="formRadiosRightj25"
                                                    {{ isset($ElegibilitySTATUS['OzoneIAinjection'][0]) && $ElegibilitySTATUS['OzoneIAinjection'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj25">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[OzoneIAinjection][]" value="Eligibile" id="formRadiosRightj26"
                                                    {{ isset($ElegibilitySTATUS['OzoneIAinjection'][0]) && $ElegibilitySTATUS['OzoneIAinjection'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj26">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j26" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[OzoneIAinjectionNote][]">{{ $ElegibilitySTATUS['OzoneIAinjectionNote'][0] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Nerve RF Ablation</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveRFAblation][]" value="Non-Eligibile" id="formRadiosRightj27"
                                                    {{ isset($ElegibilitySTATUS['NerveRFAblation'][0]) && $ElegibilitySTATUS['NerveRFAblation'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj27">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveRFAblation][]" value="Eligibile" id="formRadiosRightj28"
                                                    {{ isset($ElegibilitySTATUS['NerveRFAblation'][0]) && $ElegibilitySTATUS['NerveRFAblation'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj28">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j28" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[NerveRFAblationNote][]" >{{ $ElegibilitySTATUS['NerveRFAblationNote'][0] ?? '' }}</textarea>
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCooledRF][]" value="Non-Eligibile"  id="formRadiosRightj38"
                                                    {{ isset($ElegibilitySTATUS['NerveCooledRF'][0]) && $ElegibilitySTATUS['NerveCooledRF'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj38">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCooledRF][]" value="Eligibile"  id="formRadiosRightj39"
                                                    {{ isset($ElegibilitySTATUS['NerveCooledRF'][0]) && $ElegibilitySTATUS['NerveCooledRF'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj39">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j39" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[NerveCooledRFNote][]">{{ $ElegibilitySTATUS['NerveCooledRFNote'][0]  ?? '' }}</textarea>
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCryotherapy][]" value="Non-Eligibile"  id="formRadiosRight_j37_hide"
                                                    {{ isset($ElegibilitySTATUS['NerveCryotherapy'][0]) && $ElegibilitySTATUS['NerveCryotherapy'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRight_j37_hide">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCryotherapy][]" value="Eligibile"  id="formRadiosRight_j37"
                                                    {{ isset($ElegibilitySTATUS['NerveCryotherapy'][0]) && $ElegibilitySTATUS['NerveCryotherapy'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRight_j37">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j37" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[NerveCryotherapyNote][]">{{ $ElegibilitySTATUS['NerveCryotherapyNote'][0]  ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Shoulder Embolization </h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[ShoulderEmbolization][]" value="Non-Eligibile"  id="formRadiosRight_j38_hide"
                                                    {{ isset($ElegibilitySTATUS['ShoulderEmbolization'][0]) && $ElegibilitySTATUS['ShoulderEmbolization'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRight_j38_hide">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[ShoulderEmbolization][]" value="Eligibile"  id="formRadiosRight_j38"
                                                    {{ isset($ElegibilitySTATUS['ShoulderEmbolization'][0]) && $ElegibilitySTATUS['ShoulderEmbolization'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRight_j38">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j38" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[ShoulderEmbolizationNote][]">{{ $ElegibilitySTATUS['ShoulderEmbolizationNote'][0]  ?? '' }}</textarea>
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Others][]" value="Non-Eligibile"  id="formRadiosRightj38"
                                                    {{ isset($ElegibilitySTATUS['Others'][0]) && $ElegibilitySTATUS['Others'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj38">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Others][]" value="Eligibile"  id="formRadiosRightj39"
                                                    {{ isset($ElegibilitySTATUS['Others'][0]) && $ElegibilitySTATUS['Others'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj39">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j39" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[OthersNote][]">{{ $ElegibilitySTATUS['OthersNote'][0] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <h6 class="section_title__">Intervention PROCEDURE / Rx 
                                            {{-- <a
                                                target="_blank"  href="{{ route('user.viewShoulderPainEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i
                                                    class="fa-solid fa-arrow-right-long"></i></a> --}}
                                                </h6>
                                    </div>

                                    @php
                                        if (isset($Interventions) && !empty($Interventions)) {
                                            $Interventions = json_decode($Interventions->data_value, true);
                                            //    echo "<pre>";
                                            //     print_r($Interventions);
                                            //     die;
                                        }

                                    @endphp

                                    
<div class="col-lg-12">
    <div class="row">
    <div class="col-lg-4">
  <h6 class="mb-3 lut_title">USSINJECTION190</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USSINJECTION190LABPREIRBASIC32][]" value="LABPREIRBASIC32"  id="formRadiosRightf70"
                {{ isset($Interventions['USSINJECTION190LABPREIRBASIC32'][0]) && $Interventions['USSINJECTION190LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf70">
                LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USSINJECTION190LABPREIRSAFETY17][]" value="LABPREIRSAFETY17"  id="formRadiosRightf71"
                {{ isset($Interventions['USSINJECTION190LABPREIRSAFETY17'][0]) && $Interventions['USSINJECTION190LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
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
                <input class="form-check-input" type="checkbox" name="Intervention[USPRPINJECTION280LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightf73"
                {{ isset($Interventions['USPRPINJECTION280LABPREIRBASIC32'][0]) && $Interventions['USPRPINJECTION280LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf73">
                LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USPRPINJECTION280LABPREIRSAFETY17][]"  value="LABPREIRSAFETY17" id="formRadiosRightf74"
                {{ isset($Interventions['USPRPINJECTION280LABPREIRSAFETY17'][0]) && $Interventions['USPRPINJECTION280LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
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
  <h6 class="mb-3 lut_title">USHAINJECTION310</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USHAINJECTION310LABPREIRBASIC32][]"  value="LABPREIRBASIC32" id="formRadiosRightf75"
                {{ isset($Interventions['USHAINJECTION310LABPREIRBASIC32'][0]) && $Interventions['USHAINJECTION310LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf75">
                LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USHAINJECTION310LABPREIRSAFETY17][]"  value="LABPREIRSAFETY17" id="formRadiosRightf76"
                {{ isset($Interventions['USHAINJECTION310LABPREIRSAFETY17'][0]) && $Interventions['USHAINJECTION310LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
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
  <h6 class="mb-3 lut_title">USIAOOZINJECTION340</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USIAOOZINJECTION340LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightf77"
                {{ isset($Interventions['USIAOOZINJECTION340LABPREIRBASIC32'][0]) && $Interventions['USIAOOZINJECTION340LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf77">
                    LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USIAOOZINJECTION340LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf78"
                {{ isset($Interventions['USIAOOZINJECTION340LABPREIRSAFETY17'][0]) && $Interventions['USIAOOZINJECTION340LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
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
  <h6 class="mb-3 lut_title">USRFABLATION490</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USRFABLATION490LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightf77USRFABLATION490"
                {{ isset($Interventions['USRFABLATION490LABPREIRBASIC32'][0]) && $Interventions['USRFABLATION490LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf77USRFABLATION490">
                    LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USRFABLATION490LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf78formRadiosRightf78"
                {{ isset($Interventions['USRFABLATION490LABPREIRSAFETY17'][0]) && $Interventions['USRFABLATION490LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf78formRadiosRightf78">
                LABPREIRSAFETY17
                </label>
            </div>
        </div>
        
    </div>
</div>


<div class="col-lg-12">
    <div class="row">
    <div class="col-lg-4">
  <h6 class="mb-3 lut_title">USCRYOABLATION610</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USCRYOABLATION610LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightf77USCRYOABLATION610"
                {{ isset($Interventions['USCRYOABLATION610LABPREIRBASIC32'][0]) && $Interventions['USCRYOABLATION610LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf77USCRYOABLATION610">
                    LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USCRYOABLATION610LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf78formRadiosRightf78USCRYOABLATION610"
                {{ isset($Interventions['USCRYOABLATION610LABPREIRSAFETY17'][0]) && $Interventions['USCRYOABLATION610LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf78formRadiosRightf78USCRYOABLATION610">
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
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOSHE2310LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightf77ANGIOSHE2310"
                {{ isset($Interventions['ANGIOSHE2310LABPREIRBASIC32'][0]) && $Interventions['ANGIOSHE2310LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf77ANGIOSHE2310">
                    LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOSHE2310LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf78formRadiosRightf78ANGIOSHE2310"
                {{ isset($Interventions['ANGIOSHE2310LABPREIRSAFETY17'][0]) && $Interventions['ANGIOSHE2310LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf78formRadiosRightf78ANGIOSHE2310">
                LABPREIRSAFETY17
                </label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOSHE2310IVSEDATION270][]" value="IVSEDATION270" id="formRadiosRightf78formRadiosRightf78ANGIOSHE2310"
                {{ isset($Interventions['ANGIOSHE2310IVSEDATION270'][0]) && $Interventions['ANGIOSHE2310IVSEDATION270'][0] == 'IVSEDATION270' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf78formRadiosRightf78ANGIOSHE2310">
                IVSEDATION270
                </label>
            </div>
        </div>
        
    </div>
</div>

                                    <div class="col-lg-12 mb-3">
                                        <h6 class="section_title__">Supportive 
                                            {{-- <a target="_blank"  href="{{ route('user.viewShoulderPainEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a> --}}
                                                </h6>
                                    </div>
                                    @php
                                    if (isset($supportives) && !empty($supportives)) {
                                        $supportives = json_decode($supportives->data_value, true);

                                        $existingData = [
                                            'IVVITAPAIN175' => ['IVVITAPAIN175'],
                                            'IMNEUROBION19' => ['IMNEUROBION19'],
                                            'LABPREIVBASIC52' => ['LABPREIVBASIC52'],
                                            
                                            'IMCOLLAGEN110' => ['IMCOLLAGEN110'],
                                           
                                            'SCICEB11' => ['SCICEB11'],
                                            
                                            
                                
                                        ];
                                        $filteredData = array_diff_key($supportives, $existingData);
                                    }

                                @endphp

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[IVVITAPAIN175][]" value="IVVITAPAIN175"
                                                        {{ isset($supportives['IVVITAPAIN175']) && in_array('IVVITAPAIN175', $supportives['IVVITAPAIN175']) ? 'checked' : '' }}
                                                        id="formRadiosRightb45">
                                                    <label class="form-check-label" for="formRadiosRightb45">
                                                        IVVITAPAIN175
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[LABPREIVBASIC52][]" value="LABPREIVBASIC52" id="formRadiosRightb45LABPREIVBASIC52"
                                                        {{ isset($supportives['LABPREIVBASIC52']) && in_array('LABPREIVBASIC52', $supportives['LABPREIVBASIC52']) ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="formRadiosRightb45LABPREIVBASIC52">
                                                        LABPREIVBASIC52
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                    {{ isset($supportives['IMNEUROBION19']) && in_array('IMNEUROBION19', $supportives['IMNEUROBION19']) ? 'checked' : '' }}
                                                        name="Supportive[IMNEUROBION19][]" value="IMNEUROBION19"
                                                        id="formRadiosRightb46">
                                                    <label class="form-check-label" for="formRadiosRightb46">
                                                        IMNEUROBION19
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-3" >
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[IMCOLLAGEN110][]"
                                                        {{ isset($supportives['IMCOLLAGEN110']) && in_array('IMCOLLAGEN110', $supportives['IMCOLLAGEN110']) ? 'checked' : '' }}
                                                        value="IMCOLLAGEN110" id="formRadiosRightb47">
                                                    <label class="form-check-label" for="formRadiosRightb47">
                                                        IMCOLLAGEN110
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-lg-3" id="Supportive">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[SCICEB11][]"
                                                        {{ isset($supportives['SCICEB11']) && in_array('SCICEB11', $supportives['SCICEB11']) ? 'checked' : '' }}
                                                        value="SCICEB11" id="formRadiosRightb47SCICEB11">
                                                    <label class="form-check-label" for="formRadiosRightb47SCICEB11">
                                                        SCICEB11
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-lg-12">
                                                <div id="dynamic_Supportive_checkbox_container" class="row">
                                                    @if (isset($filteredData) && !empty($filteredData))
                                                    @forelse ($filteredData as $key => $value)
                                                        <div class="col-lg-4">
                                                            <div class="form-check form-check-right mb-3">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="Supportive[{{ $key }}][]"
                                                                    id="formRadiosRight{{ $key }}"
                                                                    {{ isset($supportives[$key]) && in_array($value[0], $supportives[$key]) ? 'checked' : '' }}
                                                                    value="{{ $value[0] }}">
                                                                <label class="form-check-label"
                                                                    for="formRadiosRight{{ $key }}">
                                                                    {{ $value[0] }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <!-- Code to be executed if $filteredData is empty -->
                                                    @endforelse
                                                @endif
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
                                    @php
                                    if (isset($Prescription) && !empty($Prescription)) {
                                        $Prescription = json_decode($Prescription->data_value, true);
                                    }
                                    @endphp

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Prescription 
                                            {{-- <a target="_blank"  href="{{ route('user.viewShoulderPainEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a> --}}
                                        </h6>
                                        <div class="title_head">
                                              <h4>ADD A DRUG </h4>
                                          </div>
                                      </div>
                                      <div class="row">
                                      <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Glucasamine][]" value="Glucasamine Chondroitin Tab -1 tab PO BID x 2 months" id="formRadiosRightf90"
                                            {{ isset($Prescription['Glucasamine']) && in_array('Glucasamine Chondroitin Tab -1 tab PO BID x 2 months', $Prescription['Glucasamine']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf90">
                                                Glucasamine Chondroitin Tab -1 tab PO BID x 2 months
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Collagen][]" value="Collagen Suppliment (powder / liquid) - 1 scoop / 1 saschet PO OD x 3 months" id="formRadiosRightf91"
                                            {{ isset($Prescription['Collagen']) && in_array('Collagen Suppliment (powder / liquid) - 1 scoop / 1 saschet PO OD x 3 months', $Prescription['Collagen']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf91">
                                                Collagen Suppliment (powder / liquid) - 1 scoop / 1 saschet PO OD x 3 months
                                                </label>    
                                        </div>
                                    </div>
                                      </div>
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Diclofenac][]" value="Diclofenac Gel 1 Ampule -Topical TID x 2 weeks" id="formRadiosRightf92"
                                            {{ isset($Prescription['Diclofenac']) && in_array('Diclofenac Gel 1 Ampule -Topical TID x 2 weeks', $Prescription['Diclofenac']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf92">
                                                Diclofenac Gel 1 Ampule -Topical TID x 2 weeks
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Lidocaine][]" value="Lidocaine Patch - 1 Patch Topical OD X 2 weeks" id="formRadiosRightf93"
                                            {{ isset($Prescription['Lidocaine']) && in_array('Lidocaine Patch - 1 Patch Topical OD X 2 weeks', $Prescription['Lidocaine']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf93">
                                                Lidocaine Patch - 1 Patch Topical OD X 2 weeks
                                                </label>    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Celebrix][]" value="Celebrix Tab - 200 mg PO BID x 1 month" id="formRadiosRightf94Celebrix"
                                            {{ isset($Prescription['Celebrix']) && in_array('Celebrix Tab - 200 mg PO BID x 1 month', $Prescription['Celebrix']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf94Celebrix">
                                                Celebrix Tab - 200 mg PO BID x 1 month
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Riparil][]" value="Riparil Gel 1 Ampule - Topical TID x 2 weeks" id="formRadiosRightf94Riparil"
                                            {{ isset($Prescription['Riparil']) && in_array('Riparil Gel 1 Ampule - Topical TID x 2 weeks', $Prescription['Riparil']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf94Riparil">
                                                Riparil Gel 1 Ampule - Topical TID x 2 weeks
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Sporidex][]" value="Sporidex (Cephalexin) Tab - 500 mg PO BID x 5 days" id="formRadiosRightf94Sporidex"
                                            {{ isset($Prescription['Sporidex']) && in_array('Sporidex (Cephalexin) Tab - 500 mg PO BID x 5 days', $Prescription['Sporidex']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf94Sporidex">
                                                Sporidex (Cephalexin) Tab - 500 mg PO BID x 5 days
                                                </label>    
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

                                    @php
                                        if (isset($Referrals) && !empty($Referrals)) {
                                            $Referrals = json_decode($Referrals->data_value, true);
                                            //    echo "<pre>";
                                            //     print_r($Referrals);
                                            //     die;
                                        }

                                    @endphp
                                    
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="Referral[Rheumatology][]" value="Rheumatology" id="formRadiosRightb48"
                                                        {{ isset($Referrals['Rheumatology'][0]) && $Referrals['Rheumatology'][0] == 'Rheumatology' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="formRadiosRightb48">
                                                        Rheumatology
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b48">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[RheumatologyNote][]">{{ $Referrals['RheumatologyNote'][0] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="Referral[OrthopedicsSurgery][]" value="Orthopedics Surgery" id="formRadiosRightb49"
                                                    {{ isset($Referrals['OrthopedicsSurgery'][0]) && $Referrals['OrthopedicsSurgery'][0] == 'Orthopedics Surgery' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightb49">
                                                        Orthopedics Surgery
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b49">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[OrthopedicsSurgeryNote][]">{{ $Referrals['OrthopedicsSurgeryNote'][0]  ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox" name="Referral[Orthotics][]" value="Orthotics" id="formRadiosRightb50"
                                                    {{ isset($Referrals['Orthotics'][0]) && $Referrals['Orthotics'][0] == 'Orthotics' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightb50">
                                                        Shoulder Rehab program
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b50" style="display: none;">
                                                <div class="form-check form-check-right mb-3">
                                                <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[OrthoticsNote][]">{{ $Referrals['OrthoticsNote'][0] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            </div>
                                           
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="Referral[Others][]" value="Others" id="formRadiosRightb52"
                                                    {{ isset($Referrals['Others'][0]) && $Referrals['Others'][0] == 'Others' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightb52">
                                                        Others
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b52">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[OthersNote][]">{{ $Referrals['OthersNote'][0] ?? '' }}</textarea>
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
                @if (isset($MDTs['IRprocedureNote'][0]))
                $("#textarea_84").show();
                @else

                $("#textarea_84").hide();
                @endif
                @if (isset($MDTs['MedicalNote'][0]))
                $("#textarea_85").show();
                    @else
                    $("#textarea_85").hide();
                @endif
                @if (isset($MDTs['SurgicalNote'][0]))
                $("#textarea_86").show();
                    @else
                    $("#textarea_86").hide();
                @endif
              @if (isset($MDTs['optionsNote'][0]))
              $("#textarea_87").show();
                  @else
                  $("#textarea_87").hide();
              @endif
               

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
                @if (isset($ElegibilitySTATUS['HEMARRHOIDSEMBOLIZATIONNote'][0]))
                $("#textarea_90").show();
                    @else
                    $("#textarea_90").hide();
                @endif
                @if (isset($ElegibilitySTATUS['VVNTNTAblationNote'][0]))
                $("#textarea_91").show();
                    @else
                    $("#textarea_91").hide();
                @endif
                @if (isset($ElegibilitySTATUS['FoamSclerotherapyNote'][0]))
                $("#textarea_92").show();
                @else
                $("#textarea_92").hide();
                    
                @endif
                @if (isset($ElegibilitySTATUS['OthersNote'][0]))
                $("#textarea_93").show();
                    @else
                    $("#textarea_93").hide();
                @endif
               

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
                @if (isset($Referrals['RheumatologyNote'][0]) )
                $("#textarea_b48").show();
                @else
                $("#textarea_b48").hide();
                @endif
                @if ( isset($Referrals['OrthopedicsSurgeryNote'][0]) )
                $("#textarea_b49").show();
                @else
                $("#textarea_b49").hide();
                @endif
               
                @if (isset($Referrals['OthersNote'][0]) )
                $("#textarea_b52").show();
                @else
                $("#textarea_b52").hide();
                @endif
                @if (isset($Imaging['CTCIR48Note'][0]))
                $("#textarea_e36").show();
                @else
                $("#textarea_e36").hide();
                @endif
                
                $("#formRadiosRighte36").click(function(){
                    $("#textarea_e36").show();
                });
                $("#formRadiosRighte35").click(function(){
                    $("#textarea_e36").hide();
                });


                $("#formRadiosRightb48").click(function() {
                    $("#textarea_b48").toggle();

                });
                $("#formRadiosRightb49").click(function() {
                    $("#textarea_b49").toggle();
                });
                @if (isset($Referrals['OrthoticsNote'][0]))
                $("#textarea_b50").show();
                @else
                $("#textarea_b50").hide();
                    
                @endif
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
                @if (isset($ClinicalExam['RegionalExam'][0]) && $ClinicalExam['RegionalExam'][0] == 'Abnormal')
                $("#abnormal_c2").show();  
                @endif
                $("#clinic_exam_2").click(function() {
                    $("#abnormal_c2").show();
                });

                $("#clinic_exam_3").click(function() {
                    $("#abnormal_c4").hide();
                });
                @if (isset($ClinicalExam['SystemicExam'][0]) && $ClinicalExam['SystemicExam'][0] == 'Abnormal')
                $("#abnormal_c4").show();
                @endif
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
                @if (isset($SpecialInvestigations['PeripheralNote'][0]))
                $("#textarea_a789").show();
                    @else
                    $("#textarea_a789").hide();
                @endif
                

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
                    $('#mildLUTSDB').remove();
                    $('#moderateLUTSDB').remove();
                    $('#severeLUTSDB').remove();
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
        
        @if (isset($Lab['RenalFunctiontestNote'][0]))
        $("#textarea_88").show();
        @else
        $("#textarea_88").hide();
        @endif
        $("#formRadiosRight88").click(function(){
            $("#textarea_88").show();
        });
        $("#formRadiosRight89").click(function(){
            $("#textarea_88").hide();
        });

    @if (isset($Lab['URINANALYSISResultsNote'][0]))
    $("#textarea_76").show();
    @else
    $("#textarea_76").hide();
    @endif
        @if (isset($Lab['HistopathResultsNote'][0]))
        $("#textarea_65").show();
        @else
        $("#textarea_65").hide();
        @endif
        @if (isset($Imaging['MRCIR48Note'][0]))
        $("#textarea_651").show();
        @endif
        $("#formRadiosRight65").click(function(){
            $("#textarea_651").show();
        });
        $("#formRadiosRight64").click(function(){
            $("#textarea_651").hide();
        });


        $("#formRadiosRight76").click(function(){
            $("#textarea_76").show();
        });
        $("#formRadiosRightd26").click(function(){
            $("#textarea_76").hide();
        });

        @if (isset($Lab['PAPSMEARResultsNote'][0]) )
        $("#textarea_83").show();
        @else
        $("#textarea_83").hide();
        @endif
        
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

        @if (isset($SpecialInvestigations['REQUROFLOI5'][0]) && $SpecialInvestigations['REQUROFLOI5'][0])
        $("#textarea_a890").show();
        @endif
       

       

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
        @if (isset($Lab['USSTBIOPSYMSK452Note'][0]))
        $("#textarea_e59").show();
            @else
            $("#textarea_e59").hide();
        @endif
        
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
        @if (isset($ElegibilitySTATUS['TopicalRiparilNote'][0]))
        $("#textarea_j2").show();
           @else
           $("#textarea_j2").hide(); 
        @endif
       @if (isset($ElegibilitySTATUS['TopicalAnalgesicsNote'][0]))
       $("#textarea_j4").show();
       @else
       $("#textarea_j4").hide();
           
       @endif
        @if (isset($ElegibilitySTATUS['POAnalgesicsNote'][0]))
        $("#textarea_j6").show();
        @else

        $("#textarea_j6").hide();
        @endif
        @if (isset($ElegibilitySTATUS['ChondroitinNote'][0]))
        $("#textarea_j8").show();
        @else

        $("#textarea_j8").hide();  
        @endif
       @if (isset($ElegibilitySTATUS['POCollagenNote'][0]))
       $("#textarea_j10").show();
       @else
       $("#textarea_j10").hide();
           
       @endif
        @if (isset($ElegibilitySTATUS['conservativeVitaminesNote'][0]))
        $("#textarea_j12").show();
        @else
        $("#textarea_j12").hide();
            
        @endif
        @if (isset($ElegibilitySTATUS['conservativeIMNurobionNote'][0]))
        $("#textarea_j14").show();
        @else

        $("#textarea_j14").hide();
        @endif
       @if (isset($ElegibilitySTATUS['conservativeIMCollagenNote'][0] ))
       $("#textarea_j16").show();
       @else
       $("#textarea_j16").hide();
           
       @endif
      @if (isset($ElegibilitySTATUS['conservativekneeBraceNote'][0]))
      $("#textarea_j18").show();
      @else
      $("#textarea_j18").hide();
          
      @endif
        @if (isset($ElegibilitySTATUS['TriggerpointinjectionNote'][0]  ))
        $("#textarea_j20").show();
        @else

        $("#textarea_j20").hide();
        @endif
        @if (isset($ElegibilitySTATUS['PRPinjectionNote'][0]))
        $("#textarea_j22").show();
        @else
        $("#textarea_j22").hide();
            
        @endif
        @if (isset($ElegibilitySTATUS['HAinjectionNote'][0]))
        $("#textarea_j24").show();
        @else

        $("#textarea_j24").hide();
        @endif
        @if (isset($ElegibilitySTATUS['OzoneIAinjectionNote'][0]))
        $("#textarea_j26").show();
        @else
        $("#textarea_j26").hide();
        @endif
        @if (isset($ElegibilitySTATUS['NerveRFAblationNote'][0]))
        $("#textarea_j28").show();
        @else

        $("#textarea_j28").hide(); 
        @endif
        @if (isset($ElegibilitySTATUS['NerveCooledRFNote'][0]))
        $("#textarea_j30").show();
        @else

        $("#textarea_j30").hide();
        @endif
       
        
        $("#textarea_j35").hide();
// formRadiosRight_j38 start 
        $("#formRadiosRight_j38").click(function(){
            $("#textarea_j38").show();
        });
        $("#formRadiosRight_j38_hide").click(function(){
            $("#textarea_j38").hide();
           
        });

        @if (isset($ElegibilitySTATUS['ShoulderEmbolizationNote'][0]))
        $("#textarea_j38").show();
        @else

        $("#textarea_j38").hide();   
        @endif

// formRadiosRight_j38 end

// formRadiosRight_j37 start 
$("#formRadiosRight_j37").click(function(){
            $("#textarea_j37").show();
        });
        $("#formRadiosRight_j37_hide").click(function(){
            $("#textarea_j37").hide();
           
        });

        @if (isset($ElegibilitySTATUS['NerveCryotherapyNote'][0]))
        $("#textarea_j37").show();
        @else

        $("#textarea_j37").hide();   
        @endif

// formRadiosRight_j37 end
        @if (isset($ElegibilitySTATUS['OthersNote'][0]))
        $("#textarea_j39").show();
        @else

        $("#textarea_j39").hide();   
        @endif
       


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
        @if (isset($Imaging['SofttissueNote'][0]))
        $("#textarea_e14").show();
            @else
            $("#textarea_e14").hide();
        @endif
        @if (isset($Imaging['MRCIR48Note'][0]))
        $("#textarea_e16").show();
            @else
            $("#textarea_e16").hide();
        @endif
       @if (isset($Imaging['CTCIR48Note'][0]))
          $("#textarea_e18").show();
           @else
           $("#textarea_e18").hide();
       @endif
       

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
        @if (isset($Imaging['CervicalNerveRootsNote'][0]))
        $('#textarea_119').show();
        @else

        $('#textarea_119').hide();     
        @endif
        @if (isset($Lab['LABJFA15Note'][0]))
        $('#textarea_120').show();
        @else

        $('#textarea_120').hide();   
        @endif
        @if (isset($Lab['USSTBIOPSYMSK452Note'][0]))
        $('#textarea_121').show();
        @else

        $('#textarea_121').hide();  
        @endif
        @if (isset($Imaging['LumbarFacetnerveNote'][0]))
        $('#textarea_122').show();
        @else
        $('#textarea_122').hide();
            
        @endif
       

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
var isChecked_sym_a6 = $("#sym_a6").is(":checked");
           
           var sym_a6_durationValue = $("select[name='symptoms[5][1]']").val();
           
           var sym_a6_durationType = $("select[name='symptoms[5][2]']").val();
           var sym_a6_description = $("textarea[name='symptoms[5][3]']").val();

           if (sym_a6_durationValue !== "" || sym_a6_durationType !== "" || sym_a6_description !== "") {
              
               if(isChecked_sym_a6 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out  Pain on lifting weight fields in Symptoms.',
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
//   Pain on lifting weight end 



//  Warm Shoulder  start
var isChecked_sym_aa6 = $("#sym_aa6").is(":checked");
           
           var sym_aa6_durationValue = $("select[name='symptoms[6][1]']").val();
           
           var sym_aa6_durationType = $("select[name='symptoms[6][2]']").val();
           var sym_aa6_description = $("textarea[name='symptoms[6][3]']").val();

           if (sym_aa6_durationValue !== "" || sym_aa6_durationType !== "" || sym_aa6_description !== "") {
              
               if(isChecked_sym_aa6 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Warm Shoulder fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_aa6');
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
//  Other end 
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
    imageObj.src = '{{ asset('/assets/thyroid-eligibility-form/' . $VaricoceleEmboForm->AnnotateimageData) }}';
    
    imageObj.onload = function() {
        const image = new Konva.Image({
            image: imageObj,
            width: 800,
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
        link.download = 'uterine-embo.png';
        link.click();
    });


         const dataURL = stage.toDataURL({
                        mimeType: 'image/png'
                    });

         document.getElementById('canvasImage').value = dataURL;



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

        
        $("#updateShoulderPainEligibilityForms").submit(function(event) {


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
                                url: '{{ route("user.updateShoulderPainEligibilityForms") }}',
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
                                            text: 'Shoulder Pain form updated successfully!',
                                            icon: 'success',
                                            timer: 2000, // Display for 2 seconds
                                            timerProgressBar: true, // Show progress bar
                                            showConfirmButton: false, // Hide the OK button
                                            willClose: () => {
                                                var redirectUrl = "{{ route('user.viewShoulderPainEligibilityForms', ['id' => ':id']) }}";
                                                redirectUrl = redirectUrl.replace(':id', patientId);
                                                window.location.href = redirectUrl;
                                            }
                                        });


                                        // Swal.fire({
                                        //                 title: '', // Empty title
                                        //                 text: 'Shoulder Pain form updated successfully!', // Success message
                                        //                 icon: 'success',
                                        //                 showConfirmButton: false, // Hide the default "OK" button
                                        //                 timer: 2000 // Display the message for 2 seconds
                                        //             }).then(function() {
                                        //                 // Define the redirect URL
                                        //                 var redirectUrl = "{{ route('user.viewShoulderPainEligibilityForms', ['id' => ':id']) }}";

                                        //                 // Redirect to the specified URL
                                        //                 window.location.href = redirectUrl;
                                        //             });

              
                                    
                                       
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

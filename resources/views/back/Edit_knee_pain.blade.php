@extends('back.layout.main_view')
@push('title')
Patient | Knee Pain | QASTARAT & DAWALI CLINICS
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
                <form id="updateKneePainEligibilityForms" method="POST" action="{{ route('user.updateKneePainEligibilityForms') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ @$patient_id }}" />
                    <input type="hidden" name="form_type" value="HaemorrhoidsEmbo" />

                    <h3 class="form_title">Knee Pain</h3>

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
                                                'KneeGradeI' => ['Grade I-II OA Knee'],
                                                'KneeGrade2' => ['Grade III-V OA knee'],
                                                'HyalineCartilageDisease' => ['Hyaline Cartilage Disease'],
                                                'Degeneration' => ['Menisceal injury / Degeneration'],
                                                'ligamentous' => ['ligamentous injury / Degeneration'],
                                                'JointEffusion' => ['Joint Effusion'],     
                                                'Tendenopathy' => ['Tendenopathy'],     
                                                'NonsepticArthritis' => ['Non-septic Arthritis'],     
                                                'SepticArthritis' => ['Septic Arthritis'],     
                                                'Bursitis' => ['Bursitis'],     
                                                'hemoarthrosis' => ['hemoarthrosis'],     
                                                'OCD' => ['Osteochondral Disease (OCD)'],     
                                                'PatellaChondromalacia' => ['Patella Chondromalacia'],     
                                                'PatellaSubluxation' => ['Patella Subluxation'],     
                                                'kneeDeformity' => ['knee Deformity'],     
                                                'Kneeloosebody' => ['Knee loosebody'],     
                                                
                                                
                                            ];
                                            $filteredData = array_diff_key($diagnosis_generals, $existingData);
                                        }

                                    @endphp

                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[KneeGradeI][]" id="formRadiosRight1"
                                                {{ isset($diagnosis_generals['KneeGradeI']) && in_array('Grade I-II OA Knee', $diagnosis_generals['KneeGradeI']) ? 'checked' : '' }}
                                                value="Grade I-II OA Knee">
                                            <label class="form-check-label" for="formRadiosRight1">
                                                Grade I-II OA Knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[KneeGrade2][]" id="formRadiosRight2"
                                                {{ isset($diagnosis_generals['KneeGrade2']) && in_array('Grade III-V OA knee', $diagnosis_generals['KneeGrade2']) ? 'checked' : '' }}
                                                value="Grade III-V OA knee">
                                            <label class="form-check-label" for="formRadiosRight2">
                                                Grade III-V OA knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[HyalineCartilageDisease][]" id="formRadiosRight3"
                                                {{ isset($diagnosis_generals['HyalineCartilageDisease']) && in_array('Hyaline Cartilage Disease', $diagnosis_generals['HyalineCartilageDisease']) ? 'checked' : '' }}
                                                value="Hyaline Cartilage Disease">
                                            <label class="form-check-label" for="formRadiosRight3">
                                                Hyaline Cartilage Disease
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Degeneration][]" id="formRadiosRight4"
                                                {{ isset($diagnosis_generals['Degeneration']) && in_array('Menisceal injury / Degeneration', $diagnosis_generals['Degeneration']) ? 'checked' : '' }}
                                                value="Menisceal injury / Degeneration">
                                            <label class="form-check-label" for="formRadiosRight4">
                                                Menisceal injury / Degeneration
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ligamentous][]" id="formRadiosRight5"
                                                {{ isset($diagnosis_generals['ligamentous']) && in_array('ligamentous injury / Degeneration', $diagnosis_generals['ligamentous']) ? 'checked' : '' }}
                                                value="ligamentous injury / Degeneration">
                                            <label class="form-check-label" for="formRadiosRight5">
                                                ligamentous injury / Degeneration
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[JointEffusion][]" id="formRadiosRight4JointEffusion"
                                                {{ isset($diagnosis_generals['JointEffusion']) && in_array('Joint Effusion', $diagnosis_generals['JointEffusion']) ? 'checked' : '' }}
                                                value="Joint Effusion">
                                            <label class="form-check-label" for="formRadiosRight4JointEffusion">
                                                Joint Effusion
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Tendenopathy][]" id="formRadiosRight4Tendenopathy"
                                                {{ isset($diagnosis_generals['Tendenopathy']) && in_array('Tendenopathy', $diagnosis_generals['Tendenopathy']) ? 'checked' : '' }}
                                                value="Tendenopathy">
                                            <label class="form-check-label" for="formRadiosRight4Tendenopathy">
                                                Tendenopathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[NonsepticArthritis][]" id="formRadiosRight4NonsepticArthritis"
                                                {{ isset($diagnosis_generals['NonsepticArthritis']) && in_array('Non-septic Arthritis', $diagnosis_generals['NonsepticArthritis']) ? 'checked' : '' }}
                                                value="Non-septic Arthritis">
                                            <label class="form-check-label" for="formRadiosRight4NonsepticArthritis">
                                                Non-septic Arthritis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
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
                                                name="diagnosis_general[hemoarthrosis][]" id="formRadiosRight4hemoarthrosis"
                                                {{ isset($diagnosis_generals['hemoarthrosis']) && in_array('hemoarthrosis', $diagnosis_generals['hemoarthrosis']) ? 'checked' : '' }}
                                                value="hemoarthrosis">
                                            <label class="form-check-label" for="formRadiosRight4hemoarthrosis">
                                                hemoarthrosis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[OCD][]" id="formRadiosRight4OCD"
                                                {{ isset($diagnosis_generals['OCD']) && in_array('Osteochondral Disease (OCD)', $diagnosis_generals['OCD']) ? 'checked' : '' }}
                                                value="Osteochondral Disease (OCD)">
                                            <label class="form-check-label" for="formRadiosRight4OCD">
                                                Osteochondral Disease (OCD)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[PatellaChondromalacia][]" id="formRadiosRight4PatellaChondromalacia"
                                                {{ isset($diagnosis_generals['PatellaChondromalacia']) && in_array('Patella Chondromalacia', $diagnosis_generals['PatellaChondromalacia']) ? 'checked' : '' }}
                                                value="Patella Chondromalacia">
                                            <label class="form-check-label" for="formRadiosRight4PatellaChondromalacia">
                                                Patella Chondromalacia
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[PatellaSubluxation][]" id="formRadiosRight4PatellaSubluxation"
                                                {{ isset($diagnosis_generals['PatellaSubluxation']) && in_array('Patella Subluxation', $diagnosis_generals['PatellaSubluxation']) ? 'checked' : '' }}
                                                value="Patella Subluxation">
                                            <label class="form-check-label" for="formRadiosRight4PatellaSubluxation">
                                                Patella Subluxation
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[kneeDeformity][]" id="formRadiosRight4kneeDeformity"
                                                {{ isset($diagnosis_generals['kneeDeformity']) && in_array('knee Deformity', $diagnosis_generals['kneeDeformity']) ? 'checked' : '' }}
                                                value="knee Deformity">
                                            <label class="form-check-label" for="formRadiosRight4kneeDeformity">
                                                knee Deformity
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="diagnosis_general_checkbox">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Kneeloosebody][]" id="formRadiosRight4Kneeloosebody"
                                                {{ isset($diagnosis_generals['Kneeloosebody']) && in_array('Knee loosebody', $diagnosis_generals['Kneeloosebody']) ? 'checked' : '' }}
                                                value="Knee loosebody">
                                            <label class="form-check-label" for="formRadiosRight4Kneeloosebody">
                                                Knee loosebody
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
                                                'D480' => ['D48.0 Neoplasm of uncertain or unknown behaviour: Bone and articular cartilage Neoplasm, neoplastic|meniscus, knee joint (lateral) (medial) <>/Uncertain or unknown behaviour'],
                                                'M230' => ['M23.0 Cystic meniscus'],
                                                'M231' => ['M23.1 Discoid meniscus (congenital)'],
                                                'M232' => ['M23.2 Derangement of meniscus due to old tear or injury'],
                                                'M233' => ['M23.3 Other meniscus derangements'],
                                                'M234' => ['M23.4 Loose body in knee'],
                                                'M235' => ['M23.5 Chronic instability of knee'],
                                                'M236' => ['M23.6 Other spontaneous disruption of ligaments of knee'],
                                                'M238' => ['M23.8 Other internal derangements of knee'],
                                                'M239' => ['M23.9 Internal derangement of knee, unspecified'],
                                                'M244' => ['M24.4 Recurrent dislocation and subluxation of joint Derangement|cartilage (articular) NEC|knee, meniscus|recurrent'],
                                                'S800' => ['S80.0 Contusion of knee'],
                                                'S810' => ['S81.0 Open wound of knee'],
                                                'S820' => ['S82.0 Fracture of patella'],
                                                'S830' => ['S83.0 Dislocation of patella'],
                                                'S831' => ['S83.1 Dislocation of knee'],
                                                'S832' => ['S83.2 Tear of meniscus, current'],
                                                'S833' => ['S83.3 Tear of articular cartilage of knee, current'],
                                                'S836' => ['S83.6 Sprain and strain of other and unspecified parts of knee'],
                                                'S837' => ['S83.7 Injury to multiple structures of knee'],
                                                'S8361' => ['S83.6 Sprain and strain of other and unspecified parts of knee'],
                                                'S8371' => ['S83.7 Injury to multiple structures of knee'],
                                                'S899' => ['S89.9 Unspecified injury of lower leg'],
                                                'Q682' => ['Q68.2 Congenital deformity of knee'],
                                                'Q741' => ['Q74.1 Congenital malformation of knee Hypertrophy, hypertrophic|meniscus, knee, congenital'],
                                                'M705' => ['M70.5 Other bursitis of knee'],
                                                'M17' => ['M17 Gonarthrosis [arthrosis of knee]'],
                                                'M704' => ['M70.4 Prepatellar bursitis, Housemaids knee'],
                                                'M768' => ['M76.8 Other enthesopathies of lower limb, excluding foot'],
                                                'M794' => ['M79.4 Hypertrophy of (infrapatellar) fat pad'],
                                                'M210' => ['M21.0 Valgus deformity, not elsewhere classified. Knock knee (acquired)'],
                                                'M2441' => ['M24.4 Recurrent dislocation and subluxation of joint'],
                                                'M256' => ['M25.6 Stiffness of joint, not elsewhere classified'],
                                                'L031' => ['L03.1 Cellulitis of other parts of limb'],
                                                'M243' => ['M24.3 Pathological dislocation and subluxation of joint, not elsewhere classified'],
                                                'M219' => ['M21.9 Acquired deformity of limb, unspecified, Deformity knee (acquired) NEC'],
                                                'M062' => ['M06.2 Rheumatoid bursitis'],
                                                'M652' => ['M65.2 Calcific tendinitis Calcification|tendon (sheath)|with bursitis, synovitis or tenosynovitis'],
                                                'M932' => ['M93.2 Osteochondritis dissecans Osteochondrosis dissecans (knee) (shoulder)'],
                                                'S832' => ['S83.2 Tear of meniscus, current'],
                                                'S836' => ['S83.6 Sprain and strain of other and unspecified parts of knee Injury|knee meniscus (lateral) (medial)'],
                                                'S837' => ['S83.7 Injury to multiple structures of knee Injury to (lateral)(medial) meniscus in combination with (collateral) (cruciate) ligaments'],
                                                'Z895' => ['Z89.5 Acquired absence of leg at or below knee'],
                                                
                                               
                                            ];
                                            $filteredData = array_diff_key($diagnosis_cids, $existingData);
                                        }

                                    @endphp
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D480][]"
                                                id="formRadiosRight8" value="D48.0 Neoplasm of uncertain or unknown behaviour: Bone and articular cartilage Neoplasm, neoplastic|meniscus, knee joint (lateral) (medial) <>/Uncertain or unknown behaviour"
                                                {{ isset($diagnosis_cids['D480']) && in_array('D48.0 Neoplasm of uncertain or unknown behaviour: Bone and articular cartilage Neoplasm, neoplastic|meniscus, knee joint (lateral) (medial) <>/Uncertain or unknown behaviour', $diagnosis_cids['D480']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight8">
                                                D48.0 Neoplasm of uncertain or unknown behaviour: Bone and articular cartilage Neoplasm, neoplastic|meniscus, knee joint (lateral) (medial) <>/Uncertain or unknown behaviour
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M230][]"
                                                id="formRadiosRight9" value="M23.0 Cystic meniscus"
                                                {{ isset($diagnosis_cids['M230']) && in_array('M23.0 Cystic meniscus', $diagnosis_cids['M230']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight9">
                                                M23.0 Cystic meniscus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M231][]"
                                                id="formRadiosRight10" value="M23.1 Discoid meniscus (congenital)"
                                                {{ isset($diagnosis_cids['M231']) && in_array('M23.1 Discoid meniscus (congenital)', $diagnosis_cids['M231']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight10">
                                                M23.1 Discoid meniscus (congenital)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M232][]"
                                                id="formRadiosRight11M232" value="M23.2 Derangement of meniscus due to old tear or injury"
                                                {{ isset($diagnosis_cids['M232']) && in_array('M23.2 Derangement of meniscus due to old tear or injury', $diagnosis_cids['M232']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight11M232">
                                                M23.2 Derangement of meniscus due to old tear or injury
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M233][]"
                                                id="formRadiosRight12M233" value="M23.3 Other meniscus derangements"
                                                {{ isset($diagnosis_cids['M233']) && in_array('M23.3 Other meniscus derangements', $diagnosis_cids['M233']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight12M233">
                                                M23.3 Other meniscus derangements
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M234][]"
                                                id="formRadiosRight13M234" value="M23.4 Loose body in knee"
                                                {{ isset($diagnosis_cids['M234']) && in_array('M23.4 Loose body in knee', $diagnosis_cids['M234']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M234">
                                                M23.4 Loose body in knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M235][]"
                                                id="formRadiosRight13M235" value="M23.5 Chronic instability of knee"
                                                {{ isset($diagnosis_cids['M235']) && in_array('M23.5 Chronic instability of knee', $diagnosis_cids['M235']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M235">
                                                M23.5 Chronic instability of knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M236][]"
                                                id="formRadiosRight13M236" value="M23.6 Other spontaneous disruption of ligaments of knee"
                                                {{ isset($diagnosis_cids['M236']) && in_array('M23.6 Other spontaneous disruption of ligaments of knee', $diagnosis_cids['M236']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M236">
                                                M23.6 Other spontaneous disruption of ligaments of knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M238][]"
                                                id="formRadiosRight13M238" value="M23.8 Other internal derangements of knee"
                                                {{ isset($diagnosis_cids['M238']) && in_array('M23.8 Other internal derangements of knee', $diagnosis_cids['M238']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M238">
                                                M23.8 Other internal derangements of knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M239][]"
                                                id="formRadiosRight13M239" value="M23.9 Internal derangement of knee, unspecified"
                                                {{ isset($diagnosis_cids['M239']) && in_array('M23.9 Internal derangement of knee, unspecified', $diagnosis_cids['M239']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M239">
                                                M23.9 Internal derangement of knee, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M244][]"
                                                id="formRadiosRight13M244" value="M24.4 Recurrent dislocation and subluxation of joint Derangement|cartilage (articular) NEC|knee, meniscus|recurrent"
                                                {{ isset($diagnosis_cids['M244']) && in_array('M24.4 Recurrent dislocation and subluxation of joint Derangement|cartilage (articular) NEC|knee, meniscus|recurrent', $diagnosis_cids['M244']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M244">
                                                M24.4 Recurrent dislocation and subluxation of joint Derangement|cartilage (articular) NEC|knee, meniscus|recurrent
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S800][]"
                                                id="formRadiosRight13S800" value="S80.0 Contusion of knee"
                                                {{ isset($diagnosis_cids['S800']) && in_array('S80.0 Contusion of knee', $diagnosis_cids['S800']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S800">
                                                S80.0 Contusion of knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S810][]"
                                                id="formRadiosRight13S810" value="S81.0 Open wound of knee"
                                                {{ isset($diagnosis_cids['S810']) && in_array('S81.0 Open wound of knee', $diagnosis_cids['S810']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S810">
                                                S81.0 Open wound of knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S820][]"
                                                id="formRadiosRight13S820" value="S82.0 Fracture of patella"
                                                {{ isset($diagnosis_cids['S820']) && in_array('S82.0 Fracture of patella', $diagnosis_cids['S820']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S820">
                                                S82.0 Fracture of patella
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S830][]"
                                                id="formRadiosRight13S830" value="S83.0 Dislocation of patella"
                                                {{ isset($diagnosis_cids['S830']) && in_array('S83.0 Dislocation of patella', $diagnosis_cids['S830']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S830">
                                                S83.0 Dislocation of patella
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S831][]"
                                                id="formRadiosRight13S831" value="S83.1 Dislocation of knee"
                                                {{ isset($diagnosis_cids['S831']) && in_array('S83.1 Dislocation of knee', $diagnosis_cids['S831']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S831">
                                                S83.1 Dislocation of knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S832][]"
                                                id="formRadiosRight13S832" value="S83.2 Tear of meniscus, current"
                                                {{ isset($diagnosis_cids['S832']) && in_array('S83.2 Tear of meniscus, current', $diagnosis_cids['S832']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S832">
                                                S83.2 Tear of meniscus, current
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S833][]"
                                                id="formRadiosRight13S833" value="S83.3 Tear of articular cartilage of knee, current"
                                                {{ isset($diagnosis_cids['S833']) && in_array('S83.3 Tear of articular cartilage of knee, current', $diagnosis_cids['S833']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S833">
                                                S83.3 Tear of articular cartilage of knee, current
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S836][]"
                                                id="formRadiosRight13S836" value="S83.6 Sprain and strain of other and unspecified parts of knee"
                                                {{ isset($diagnosis_cids['S836']) && in_array('S83.6 Sprain and strain of other and unspecified parts of knee', $diagnosis_cids['S836']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S836">
                                                S83.6 Sprain and strain of other and unspecified parts of knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S837][]"
                                                id="formRadiosRight13S837" value="S83.7 Injury to multiple structures of knee"
                                                {{ isset($diagnosis_cids['S837']) && in_array('S83.7 Injury to multiple structures of knee', $diagnosis_cids['S837']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S837">
                                                S83.7 Injury to multiple structures of knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S8361][]"
                                                id="formRadiosRight13S8361" value="S83.6 Sprain and strain of other and unspecified parts of knee"
                                                {{ isset($diagnosis_cids['S8361']) && in_array('S83.6 Sprain and strain of other and unspecified parts of knee', $diagnosis_cids['S8361']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S8361">
                                                S83.6 Sprain and strain of other and unspecified parts of knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S8371][]"
                                                id="formRadiosRight13S8371" value="S83.7 Injury to multiple structures of knee"
                                                {{ isset($diagnosis_cids['S8371']) && in_array('S83.7 Injury to multiple structures of knee', $diagnosis_cids['S8371']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S8371">
                                                S83.7 Injury to multiple structures of knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S899][]"
                                                id="formRadiosRight13S899" value="S89.9 Unspecified injury of lower leg"
                                                {{ isset($diagnosis_cids['S899']) && in_array('S89.9 Unspecified injury of lower leg', $diagnosis_cids['S899']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S899">
                                                S89.9 Unspecified injury of lower leg
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Q682][]"
                                                id="formRadiosRight13Q682" value="Q68.2 Congenital deformity of knee"
                                                {{ isset($diagnosis_cids['Q682']) && in_array('Q68.2 Congenital deformity of knee', $diagnosis_cids['Q682']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13Q682">
                                                Q68.2 Congenital deformity of knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Q741][]"
                                                id="formRadiosRight13Q741" value="Q74.1 Congenital malformation of knee Hypertrophy, hypertrophic|meniscus, knee, congenital"
                                                {{ isset($diagnosis_cids['Q741']) && in_array('Q74.1 Congenital malformation of knee Hypertrophy, hypertrophic|meniscus, knee, congenital', $diagnosis_cids['Q741']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13Q741">
                                                Q74.1 Congenital malformation of knee Hypertrophy, hypertrophic|meniscus, knee, congenital
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M705][]"
                                                id="formRadiosRight13M705" value="M70.5 Other bursitis of knee"
                                                {{ isset($diagnosis_cids['M705']) && in_array('M70.5 Other bursitis of knee', $diagnosis_cids['M705']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M705">
                                                M70.5 Other bursitis of knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M17][]"
                                                id="formRadiosRight13M17" value="M17 Gonarthrosis [arthrosis of knee]"
                                                {{ isset($diagnosis_cids['M17']) && in_array('M17 Gonarthrosis [arthrosis of knee]', $diagnosis_cids['M17']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M17">
                                                M17 Gonarthrosis [arthrosis of knee]
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M704][]"
                                                id="formRadiosRight13M704" value="M70.4 Prepatellar bursitis, Housemaid's knee"
                                                {{ isset($diagnosis_cids['M704']) && in_array('M70.4 Prepatellar bursitis, Housemaids knee', $diagnosis_cids['M704']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M704">
                                                M70.4 Prepatellar bursitis, Housemaid's knee
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M768][]"
                                                id="formRadiosRight13M768" value="M76.8 Other enthesopathies of lower limb, excluding foot"
                                                {{ isset($diagnosis_cids['M768']) && in_array('M76.8 Other enthesopathies of lower limb, excluding foot', $diagnosis_cids['M768']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M768">
                                                M76.8 Other enthesopathies of lower limb, excluding foot
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M794][]"
                                                id="formRadiosRight13M794" value="M79.4 Hypertrophy of (infrapatellar) fat pad"
                                                {{ isset($diagnosis_cids['M794']) && in_array('M79.4 Hypertrophy of (infrapatellar) fat pad', $diagnosis_cids['M794']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M794">
                                                M79.4 Hypertrophy of (infrapatellar) fat pad
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M210][]"
                                                id="formRadiosRight13M210" value="M21.0 Valgus deformity, not elsewhere classified. Knock knee (acquired)"
                                                {{ isset($diagnosis_cids['M210']) && in_array('M21.0 Valgus deformity, not elsewhere classified. Knock knee (acquired)', $diagnosis_cids['M210']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M210">
                                                M21.0 Valgus deformity, not elsewhere classified. Knock knee (acquired)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M2441][]"
                                                id="formRadiosRight13M2441" value="M24.4 Recurrent dislocation and subluxation of joint"
                                                {{ isset($diagnosis_cids['M2441']) && in_array('M24.4 Recurrent dislocation and subluxation of joint', $diagnosis_cids['M2441']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M2441">
                                                M24.4 Recurrent dislocation and subluxation of joint
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M256][]"
                                                id="formRadiosRight13M256" value="M24.4 Recurrent dislocation and subluxation of joint"
                                                {{ isset($diagnosis_cids['M256']) && in_array('M24.4 Recurrent dislocation and subluxation of joint', $diagnosis_cids['M256']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M256">
                                                M24.4 Recurrent dislocation and subluxation of joint
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[L031][]"
                                                id="formRadiosRight13L031" value="L03.1 Cellulitis of other parts of limb"
                                                {{ isset($diagnosis_cids['L031']) && in_array('L03.1 Cellulitis of other parts of limb', $diagnosis_cids['L031']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13L031">
                                                L03.1 Cellulitis of other parts of limb
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M243][]"
                                                id="formRadiosRight13M243" value="M24.3 Pathological dislocation and subluxation of joint, not elsewhere classified"
                                                {{ isset($diagnosis_cids['M243']) && in_array('M24.3 Pathological dislocation and subluxation of joint, not elsewhere classified', $diagnosis_cids['M243']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M243">
                                                M24.3 Pathological dislocation and subluxation of joint, not elsewhere classified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M219][]"
                                                id="formRadiosRight13M219" value="M21.9 Acquired deformity of limb, unspecified, Deformity knee (acquired) NEC"
                                                {{ isset($diagnosis_cids['M219']) && in_array('M21.9 Acquired deformity of limb, unspecified, Deformity knee (acquired) NEC', $diagnosis_cids['M219']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M219">
                                                M21.9 Acquired deformity of limb, unspecified, Deformity knee (acquired) NEC
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M062][]"
                                                id="formRadiosRight13M062" value="M06.2 Rheumatoid bursitis"
                                                {{ isset($diagnosis_cids['M062']) && in_array('M06.2 Rheumatoid bursitis', $diagnosis_cids['M062']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M062">
                                                M06.2 Rheumatoid bursitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M652][]"
                                                id="formRadiosRight13M652" value="M65.2 Calcific tendinitis Calcification|tendon (sheath)|with bursitis, synovitis or tenosynovitis"
                                                {{ isset($diagnosis_cids['M652']) && in_array('M65.2 Calcific tendinitis Calcification|tendon (sheath)|with bursitis, synovitis or tenosynovitis', $diagnosis_cids['M652']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M652">
                                                M65.2 Calcific tendinitis Calcification|tendon (sheath)|with bursitis, synovitis or tenosynovitis
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
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S832][]"
                                                id="formRadiosRight13S832" value="S83.2 Tear of meniscus, current"
                                                {{ isset($diagnosis_cids['S832']) && in_array('S83.2 Tear of meniscus, current', $diagnosis_cids['S832']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S832">
                                                S83.2 Tear of meniscus, current
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S836][]"
                                                id="formRadiosRight13S836" value="S83.6 Sprain and strain of other and unspecified parts of knee Injury|knee meniscus (lateral) (medial)"
                                                {{ isset($diagnosis_cids['S836']) && in_array('S83.6 Sprain and strain of other and unspecified parts of knee Injury|knee meniscus (lateral) (medial)', $diagnosis_cids['S836']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S836">
                                                S83.6 Sprain and strain of other and unspecified parts of knee Injury|knee meniscus (lateral) (medial)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S837][]"
                                                id="formRadiosRight13S837" value="S83.7 Injury to multiple structures of knee Injury to (lateral)(medial) meniscus in combination with (collateral) (cruciate) ligaments"
                                                {{ isset($diagnosis_cids['S837']) && in_array('S83.7 Injury to multiple structures of knee Injury to (lateral)(medial) meniscus in combination with (collateral) (cruciate) ligaments', $diagnosis_cids['S837']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S837">
                                                S83.7 Injury to multiple structures of knee Injury to (lateral)(medial) meniscus in combination with (collateral) (cruciate) ligaments
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="Postpartum_thyroiditis">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Z895][]"
                                                id="formRadiosRight13Z895" value="Z89.5 Acquired absence of leg at or below knee"
                                                {{ isset($diagnosis_cids['Z895']) && in_array('Z89.5 Acquired absence of leg at or below knee', $diagnosis_cids['Z895']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13Z895">
                                                Z89.5 Acquired absence of leg at or below knee
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
                                                                if ($symptom['SymptomType'] === 'Medial knee pain') {
                                                                   
                                                                    $disfiguringSymptoms1 = $symptom;
                                                                    // dd(gettype($disfiguringSymptoms1),'array',$disfiguringSymptoms1);
                                                                }elseif ($symptom['SymptomType'] === 'Anterior Knee Pain') {
                                                                    $disfiguringSymptoms2 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Audiable knee sound') {
                                                                    $disfiguringSymptoms3 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Knee swellimg') {
                                                                    $disfiguringSymptoms4 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Restricted knee flexion') {
                                                                    $disfiguringSymptoms5 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Restricted Walking / running') {
                                                                    $disfiguringSymptoms6 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Restricted knee extensiom') {
                                                                    $disfiguringSymptoms7 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Unstable knee / locking knee') {
                                                                    $disfiguringSymptoms8 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Deformed Valgus /Varus or Valgus knee') {
                                                                    $disfiguringSymptoms9 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Warm knee') {
                                                                    $disfiguringSymptoms10 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Lethargy') {
                                                                    $disfiguringSymptoms11 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Fatigue') {
                                                                    $disfiguringSymptoms12 = $symptom;
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
                                                        value="Medial knee pain"
                                                        
                                                        {{ isset($disfiguringSymptoms1['SymptomType']) && $disfiguringSymptoms1['SymptomType'] === 'Medial knee pain' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a1">
                                                        Medial knee pain
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
                                                        name="symptoms[1][0]" id="sym_a2" value="Anterior Knee Pain"
                                                        {{ isset($disfiguringSymptoms2['SymptomType']) && $disfiguringSymptoms2['SymptomType'] == 'Anterior Knee Pain' ? 'checked' : '' }}

                                                        >
                                                    <label class="form-check-label" for="sym_a2">
                                                        Anterior Knee Pain
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
                                                        name="symptoms[2][0]" value="Audiable knee sound"
                                                        {{ isset($disfiguringSymptoms3['SymptomType']) && $disfiguringSymptoms3['SymptomType'] == 'Audiable knee sound' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a3">
                                                        Audiable knee sound
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
                                                        value="Knee swellimg"
                                                        {{ isset($disfiguringSymptoms4['SymptomType']) && $disfiguringSymptoms4['SymptomType'] == 'Knee swellimg' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a4">
                                                        Knee swellimg
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
                                                        name="symptoms[4][0]" id="sym_a5" value="Restricted knee flexion"
                                                        {{ isset($disfiguringSymptoms5['SymptomType']) && $disfiguringSymptoms5['SymptomType'] == 'Restricted knee flexion' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a5">
                                                        Restricted knee flexion
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
                                                        value="Restricted Walking / running"
                                                        {{ isset($disfiguringSymptoms6['SymptomType']) && $disfiguringSymptoms6['SymptomType'] == 'Restricted Walking / running' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a6">
                                                        Restricted Walking / running
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
                                                        value="Restricted knee extensiom"
                                                        {{ isset($disfiguringSymptoms7['SymptomType']) && $disfiguringSymptoms7['SymptomType'] == 'Restricted knee extensiom' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_aa6">
                                                        Restricted knee extensiom
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
                                                        name="symptoms[7][0]" id="sym_aaa6"
                                                        value="Unstable knee / locking knee"
                                                        {{ isset($disfiguringSymptoms8['SymptomType']) && $disfiguringSymptoms8['SymptomType'] == 'Unstable knee / locking knee' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_aaa6">
                                                        Unstable knee / locking knee
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[7][1]">
                                                            <option value="">Duration value</option>
                                                           @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($disfiguringSymptoms8['SymptomDurationValue']) && $disfiguringSymptoms8['SymptomDurationValue'] == $i ? 'selected' : '' }}>
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
                                                            name="symptoms[7][2]">
                                                            <option value="">Duration Type</option>
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                            <option value="{{ $durationType }}"
                                                                {{ isset($disfiguringSymptoms8['SymptomDurationType']) &&  $disfiguringSymptoms8['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[7][3]">{{ trim($disfiguringSymptoms8['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        name="symptoms[8][0]" id="sym_aaaa61"
                                                        value="Deformed Valgus /Varus or Valgus knee"
                                                        {{ isset($disfiguringSymptoms9['SymptomType']) && $disfiguringSymptoms9['SymptomType'] == 'Deformed Valgus /Varus or Valgus knee' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_aaaa61">
                                                        Deformed Valgus /Varus or Valgus knee
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[8][1]">
                                                            <option value="">Duration value</option>
                                                           @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($disfiguringSymptoms9['SymptomDurationValue']) && $disfiguringSymptoms9['SymptomDurationValue'] == $i ? 'selected' : '' }}>
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
                                                            name="symptoms[8][2]">
                                                            <option value="">Duration Type</option>
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                            <option value="{{ $durationType }}"
                                                                {{ isset($disfiguringSymptoms9['SymptomDurationType']) &&  $disfiguringSymptoms9['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[8][3]">{{ trim($disfiguringSymptoms9['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        name="symptoms[9][0]" id="sym_aaaa62"
                                                        value="Warm knee"
                                                        {{ isset($disfiguringSymptoms10['SymptomType']) && $disfiguringSymptoms10['SymptomType'] == 'Warm knee' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_aaaa62">
                                                        Warm knee
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[9][1]">
                                                            <option value="">Duration value</option>
                                                           @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($disfiguringSymptoms10['SymptomDurationValue']) && $disfiguringSymptoms10['SymptomDurationValue'] == $i ? 'selected' : '' }}>
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
                                                            name="symptoms[9][2]">
                                                            <option value="">Duration Type</option>
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                            <option value="{{ $durationType }}"
                                                                {{ isset($disfiguringSymptoms10['SymptomDurationType']) &&  $disfiguringSymptoms10['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px"  name="symptoms[9][3]">{{ trim($disfiguringSymptoms10['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        name="symptoms[10][0]" id="sym_aaaa621"
                                                        value="Lethargy"
                                                        {{ isset($disfiguringSymptoms11['SymptomType']) && $disfiguringSymptoms11['SymptomType'] == 'Lethargy' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_aaaa621">
                                                        Lethargy
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[10][1]">
                                                            <option value="">Duration value</option>
                                                           @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($disfiguringSymptoms11['SymptomDurationValue']) && $disfiguringSymptoms11['SymptomDurationValue'] == $i ? 'selected' : '' }}>
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
                                                            name="symptoms[10][2]">
                                                            <option value="">Duration Type</option>
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                            <option value="{{ $durationType }}"
                                                                {{ isset($disfiguringSymptoms11['SymptomDurationType']) &&  $disfiguringSymptoms11['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[10][3]">{{ trim($disfiguringSymptoms11['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        name="symptoms[11][0]" id="sym_aaaa6211"
                                                        value="Fatigue"
                                                        {{ isset($disfiguringSymptoms12['SymptomType']) && $disfiguringSymptoms12['SymptomType'] == 'Fatigue' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_aaaa6211">
                                                        Fatigue
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[11][1]">
                                                            <option value="">Duration value</option>
                                                           @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($disfiguringSymptoms12['SymptomDurationValue']) && $disfiguringSymptoms12['SymptomDurationValue'] == $i ? 'selected' : '' }}>
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
                                                            name="symptoms[11][2]">
                                                            <option value="">Duration Type</option>
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                            <option value="{{ $durationType }}"
                                                                {{ isset($disfiguringSymptoms12['SymptomDurationType']) &&  $disfiguringSymptoms12['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[11][3]">{{ trim($disfiguringSymptoms12['SymptomDurationNote'] ?? '') }}</textarea>
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
                                            <h4>Knee OA symptoms score (KOASS)</h4>
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
                                                    <td>Medial knee pain</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Medialkneepain][]"
                                                                id="formRadiosRight14" value="0"
                                                                {{ isset($symptoms_scores['Medialkneepain'][0]) && $symptoms_scores['Medialkneepain'][0] == 0 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight14">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Medialkneepain][]"
                                                                id="formRadiosRight15" value="1"
                                                                {{ isset($symptoms_scores['Medialkneepain'][0]) && $symptoms_scores['Medialkneepain'][0] == 1 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight15">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Medialkneepain][]"
                                                                id="formRadiosRight16" value="3"
                                                                {{ isset($symptoms_scores['Medialkneepain'][0]) && $symptoms_scores['Medialkneepain'][0] == 3 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight16">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Medialkneepain][]"
                                                                id="formRadiosRight17" value="5"
                                                                {{ isset($symptoms_scores['Medialkneepain'][0]) && $symptoms_scores['Medialkneepain'][0] == 5 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight17">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Anterior Knee Pain</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[AnteriorKneePain][]"
                                                                id="formRadiosRight18" value="0"
                                                                {{ isset($symptoms_scores['AnteriorKneePain'][0]) && $symptoms_scores['AnteriorKneePain'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight18">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[AnteriorKneePain][]"
                                                                id="formRadiosRight19" value="1"
                                                                {{ isset($symptoms_scores['AnteriorKneePain'][0]) && $symptoms_scores['AnteriorKneePain'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight19">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[AnteriorKneePain][]"
                                                                id="formRadiosRight20" value="3"
                                                                {{ isset($symptoms_scores['AnteriorKneePain'][0]) && $symptoms_scores['AnteriorKneePain'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight20">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[AnteriorKneePain][]"
                                                                id="formRadiosRight21" value="5"
                                                                {{ isset($symptoms_scores['AnteriorKneePain'][0]) && $symptoms_scores['AnteriorKneePain'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight21">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Audiable knee sound</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Audiablekneesound][]"
                                                                id="formRadiosRight22" value="0"
                                                                {{ isset($symptoms_scores['Audiablekneesound'][0]) && $symptoms_scores['Audiablekneesound'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight22">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Audiablekneesound][]"
                                                                id="formRadiosRight23" value="1"
                                                                {{ isset($symptoms_scores['Audiablekneesound'][0]) && $symptoms_scores['Audiablekneesound'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight23">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Audiablekneesound][]"
                                                                id="formRadiosRight24" value="3"
                                                                {{ isset($symptoms_scores['Audiablekneesound'][0]) && $symptoms_scores['Audiablekneesound'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight24">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Audiablekneesound][]"
                                                                id="formRadiosRight25" value="5"
                                                                {{ isset($symptoms_scores['Audiablekneesound'][0]) && $symptoms_scores['Audiablekneesound'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight25">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Knee swellimg</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Kneeswellimg][]"
                                                                id="formRadiosRight26" value="0"
                                                                {{ isset($symptoms_scores['Kneeswellimg'][0]) && $symptoms_scores['Kneeswellimg'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight26">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Kneeswellimg][]"
                                                                id="formRadiosRight27" value="1"
                                                                {{ isset($symptoms_scores['Kneeswellimg'][0]) && $symptoms_scores['Kneeswellimg'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight27">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Kneeswellimg][]"
                                                                id="formRadiosRight28" value="3"
                                                                {{ isset($symptoms_scores['Kneeswellimg'][0]) && $symptoms_scores['Kneeswellimg'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight28">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Kneeswellimg][]"
                                                                id="formRadiosRight29" value="5"
                                                                {{ isset($symptoms_scores['Kneeswellimg'][0]) && $symptoms_scores['Kneeswellimg'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight29">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Restricted knee flexion</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Restrictedkneeflextion][]"
                                                                id="formRadiosRight30" value="0"
                                                                {{ isset($symptoms_scores['Restrictedkneeflextion'][0]) && $symptoms_scores['Restrictedkneeflextion'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight30">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Restrictedkneeflextion][]"
                                                                id="formRadiosRight31" value="1"
                                                                {{ isset($symptoms_scores['Restrictedkneeflextion'][0]) && $symptoms_scores['Restrictedkneeflextion'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight31">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Restrictedkneeflextion][]"
                                                                id="formRadiosRight32" value="3"
                                                                {{ isset($symptoms_scores['Restrictedkneeflextion'][0]) && $symptoms_scores['Restrictedkneeflextion'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight32">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Restrictedkneeflextion][]"
                                                                id="formRadiosRight33" value="5"
                                                                {{ isset($symptoms_scores['Restrictedkneeflextion'][0]) && $symptoms_scores['Restrictedkneeflextion'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight33">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Restricted knee extensiom </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Restrictedkneeextensiom][]"
                                                                id="formRadiosRight341" value="0"
                                                                {{ isset($symptoms_scores['Restrictedkneeextensiom'][0]) && $symptoms_scores['Restrictedkneeextensiom'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Restrictedkneeextensiom][]"
                                                                id="formRadiosRight351" value="1"
                                                                {{ isset($symptoms_scores['Restrictedkneeextensiom'][0]) && $symptoms_scores['Restrictedkneeextensiom'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Restrictedkneeextensiom][]"
                                                                id="formRadiosRight361" value="3"
                                                                {{ isset($symptoms_scores['Restrictedkneeextensiom'][0]) && $symptoms_scores['Restrictedkneeextensiom'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Restrictedkneeextensiom][]"
                                                                id="formRadiosRight371" value="5"
                                                                {{ isset($symptoms_scores['Restrictedkneeextensiom'][0]) && $symptoms_scores['Restrictedkneeextensiom'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td>Restricted Walking / running </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[RestrictedWalking][]"
                                                                id="formRadiosRight341RestrictedWalking" value="0"
                                                                {{ isset($symptoms_scores['RestrictedWalking'][0]) && $symptoms_scores['RestrictedWalking'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341RestrictedWalking">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[RestrictedWalking][]"
                                                                id="formRadiosRight351RestrictedWalking" value="1"
                                                                {{ isset($symptoms_scores['RestrictedWalking'][0]) && $symptoms_scores['RestrictedWalking'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351RestrictedWalking">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[RestrictedWalking][]"
                                                                id="formRadiosRight361RestrictedWalking" value="3"
                                                                {{ isset($symptoms_scores['RestrictedWalking'][0]) && $symptoms_scores['RestrictedWalking'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361RestrictedWalking">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[RestrictedWalking][]"
                                                                id="formRadiosRight371RestrictedWalking" value="5"
                                                                {{ isset($symptoms_scores['RestrictedWalking'][0]) && $symptoms_scores['RestrictedWalking'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371RestrictedWalking">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                
                                                <tr>
                                                    <td>Unstable knee / locking knee</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Unstableknee][]"
                                                                id="formRadiosRight341Unstableknee" value="0"
                                                                {{ isset($symptoms_scores['Unstableknee'][0]) && $symptoms_scores['Unstableknee'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341Unstableknee">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Unstableknee][]"
                                                                id="formRadiosRight351Unstableknee" value="1"
                                                                {{ isset($symptoms_scores['Unstableknee'][0]) && $symptoms_scores['Unstableknee'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351Unstableknee">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Unstableknee][]"
                                                                id="formRadiosRight361Unstableknee" value="3"
                                                                {{ isset($symptoms_scores['Unstableknee'][0]) && $symptoms_scores['Unstableknee'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361Unstableknee">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Unstableknee][]"
                                                                id="formRadiosRight371Unstableknee" value="5"
                                                                {{ isset($symptoms_scores['Unstableknee'][0]) && $symptoms_scores['Unstableknee'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371Unstableknee">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Deformed Valgus /Varus or Valgus knee</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[DeformedValgus][]"
                                                                id="formRadiosRight341DeformedValgus" value="0"
                                                                {{ isset($symptoms_scores['DeformedValgus'][0]) && $symptoms_scores['DeformedValgus'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341DeformedValgus">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[DeformedValgus][]"
                                                                id="formRadiosRight351DeformedValgus" value="1"
                                                                {{ isset($symptoms_scores['DeformedValgus'][0]) && $symptoms_scores['DeformedValgus'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351DeformedValgus">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[DeformedValgus][]"
                                                                id="formRadiosRight361DeformedValgus" value="3"
                                                                {{ isset($symptoms_scores['DeformedValgus'][0]) && $symptoms_scores['DeformedValgus'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361DeformedValgus">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[DeformedValgus][]"
                                                                id="formRadiosRight371DeformedValgus" value="5"
                                                                {{ isset($symptoms_scores['DeformedValgus'][0]) && $symptoms_scores['DeformedValgus'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371DeformedValgus">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Warm knee</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Warmknee][]"
                                                                id="formRadiosRight341Warmknee" value="0"
                                                                {{ isset($symptoms_scores['Warmknee'][0]) && $symptoms_scores['Warmknee'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341Warmknee">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Warmknee][]"
                                                                id="formRadiosRight351Warmknee" value="1"
                                                                {{ isset($symptoms_scores['Warmknee'][0]) && $symptoms_scores['Warmknee'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351Warmknee">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Warmknee][]"
                                                                id="formRadiosRight361Warmknee" value="3"
                                                                {{ isset($symptoms_scores['Warmknee'][0]) && $symptoms_scores['Warmknee'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361Warmknee">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Warmknee][]"
                                                                id="formRadiosRight371Warmknee" value="5"
                                                                {{ isset($symptoms_scores['Warmknee'][0]) && $symptoms_scores['Warmknee'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371Warmknee">
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
                                                <tr id="moderateLUTS" class="hidden">
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
                                                <h6 class="mb-3 lut_title">Septic Knee (acute pain | acute fever | acute swelling | acute redness)</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[SepticKnee][]" id="formRadiosRight42"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['SepticKnee'][0]) && $clinical_indicators['SepticKnee'][0] == 'YES' ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="formRadiosRight42">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[SepticKnee][]" id="formRadiosRight43"
                                                        value="No"
                                                        {{ isset($clinical_indicators['SepticKnee'][0]) && $clinical_indicators['SepticKnee'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight43">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Knee Prosthesis (or Total Knee Replacement TKR)</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[KneeProsthesis][]" id="formRadiosRight44"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['KneeProsthesis'][0]) && $clinical_indicators['KneeProsthesis'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[KneeProsthesis][]" id="formRadiosRight45"
                                                        value="No"
                                                        {{ isset($clinical_indicators['KneeProsthesis'][0]) && $clinical_indicators['KneeProsthesis'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                                                  
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Clinical Exam 
                                            {{-- <a target="_blank"  href="{{ route('user.viewKneePainEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                            {{-- <a target="_blank"  href="{{ route('user.viewKneePainEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a> --}}
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
                        <h6 class="mb-3 lut_title">Superior Medial GN</h6>
                      </div>
                      <div class="col-lg-4">
                                  <div class="form-check form-check-right mb-3">
                                      <input class="form-check-input"type="radio" name="Imaging[SuperiorMedialGN][]" value="Visible" id="formRadiosRightd10Reflux"
                                      {{ isset($Imaging['SuperiorMedialGN'][0]) && $Imaging['SuperiorMedialGN'][0] == "Visible" ? 'checked' : '' }}
                                      >
                                      <label class="form-check-label" for="formRadiosRightd10Reflux">
                                      Visible 
                                      </label>
                                  </div>
                              </div>

                              <div class="col-lg-4">
                                  <div class="form-check form-check-right mb-3">
                                      <input class="form-check-input"type="radio" name="Imaging[SuperiorMedialGN][]" value="Non-Visible" id="formRadiosRightd11Reflux2"
                                      {{ isset($Imaging['SuperiorMedialGN'][0]) && $Imaging['SuperiorMedialGN'][0] == "Non-Visible" ? 'checked' : '' }}
                                      >
                                      <label class="form-check-label" for="formRadiosRightd11Reflux2">
                                      Non-Visible 
                                      </label>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="col-lg-12">
                          <div class="row">
                          <div class="col-lg-4">
                        <h6 class="mb-3 lut_title">Inferior Medial GN</h6>
                      </div>
                      <div class="col-lg-4">
                                  <div class="form-check form-check-right mb-3">
                                      <input class="form-check-input"type="radio" name="Imaging[InferiorMedialGN][]" value="Visible" id="formRadiosRightd12Reflux12"
                                      {{ isset($Imaging['InferiorMedialGN'][0]) && $Imaging['InferiorMedialGN'][0] == "Visible" ? 'checked' : '' }}
                                      >
                                      <label class="form-check-label" for="formRadiosRightd12Reflux12">
                                      Visible 
                                      </label>
                                  </div>
                              </div>

                              <div class="col-lg-4">
                                  <div class="form-check form-check-right mb-3">
                                      <input class="form-check-input"type="radio" name="Imaging[InferiorMedialGN][]" value="Non-Visible" id="formRadiosRightd13Reflux321"
                                      {{ isset($Imaging['InferiorMedialGN'][0]) && $Imaging['InferiorMedialGN'][0] == "Non-Visible" ? 'checked' : '' }}
                                      >
                                      <label class="form-check-label" for="formRadiosRightd13Reflux321">
                                      Non-Visible 
                                      </label>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-4">
                      <h6 class="mb-3 lut_title">Superior Lateral GN</h6>
                    </div>
                    <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Imaging[SuperiorLateralGN][]" value="Visible" id="formRadiosRightd12Reflux12SuperiorLateralGN"
                                    {{ isset($Imaging['SuperiorLateralGN'][0]) && $Imaging['SuperiorLateralGN'][0] == "Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd12Reflux12SuperiorLateralGN">
                                    Visible 
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Imaging[SuperiorLateralGN][]" value="Non-Visible" id="formRadiosRightd13Reflux321SuperiorLateralGN"
                                    {{ isset($Imaging['SuperiorLateralGN'][0]) && $Imaging['SuperiorLateralGN'][0] == "Non-Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd13Reflux321SuperiorLateralGN">
                                    Non-Visible 
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-4">
                      <h6 class="mb-3 lut_title">Knee effusion</h6>
                    </div>
                    <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Imaging[Kneeeffusion][]" value="Visible" id="formRadiosRightd12Reflux12Kneeeffusion"
                                    {{ isset($Imaging['Kneeeffusion'][0]) && $Imaging['Kneeeffusion'][0] == "Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd12Reflux12Kneeeffusion">
                                    Visible 
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Imaging[Kneeeffusion][]" value="Non-Visible" id="formRadiosRightd13Reflux321Kneeeffusion"
                                    {{ isset($Imaging['Kneeeffusion'][0]) && $Imaging['Kneeeffusion'][0] == "Non-Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd13Reflux321Kneeeffusion">
                                    Non-Visible 
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-4">
                      <h6 class="mb-3 lut_title">Osteoarthretic features</h6>
                    </div>
                    <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Imaging[Osteoarthreticfeatures][]" value="Visible" id="formRadiosRightd12Reflux12Osteoarthreticfeatures"
                                    {{ isset($Imaging['Osteoarthreticfeatures'][0]) && $Imaging['Osteoarthreticfeatures'][0] == "Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd12Reflux12Osteoarthreticfeatures">
                                    Visible 
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Imaging[Osteoarthreticfeatures][]" value="Non-Visible" id="formRadiosRightd13Reflux321Osteoarthreticfeatures"
                                    {{ isset($Imaging['Osteoarthreticfeatures'][0]) && $Imaging['Osteoarthreticfeatures'][0] == "Non-Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd13Reflux321Osteoarthreticfeatures">
                                    Non-Visible 
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
        {{-- <a target="_blank"  href="{{ route('user.viewKneePainEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a> --}}
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
                <option value="other" {{ isset($Lab['CBC'][0]) && $Lab['CBC'][0] == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>


                                                <div @if(isset($Lab['CBC'][0]) && $Lab['CBC'][0] == 'other') hidden @else  @endif class="result result_value {{ isset($Lab['CBC'][0])  && $Lab['CBC'][0] != 'other' ? $Lab['CBC'][0] : 'normal' }}">
                                                        {{ isset($Lab['CBC'][0])  && $Lab['CBC'][0] != 'other' ? $Lab['CBC'][0] : 'normal' }} 
                                                    </div>

                                                <select @if(isset($Lab['CBC'][0]) && $Lab['CBC'][0] == 'other') @else hidden @endif class="tshRangeOther form-select" name="Lab[CBC][otherLevel]">
                                                    <option {{ isset($Lab['CBC']['otherLevel']) && $Lab['CBC']['otherLevel'] == 'low' ? 'selected' : '' }} value="low">Low</option>
                                                    <option {{ isset($Lab['CBC']['otherLevel']) && $Lab['CBC']['otherLevel'] == 'normal' ? 'selected' : '' }} value="normal">Normal</option>
                                                    <option {{ isset($Lab['CBC']['otherLevel']) && $Lab['CBC']['otherLevel'] == 'high' ? 'selected' : '' }} value="high">High</option>
                                                </select>
                                                
                                                <input class="LabOther form-control" placeholder="enter here ..." @if(isset($Lab['CBC'][0]) && $Lab['CBC'][0] == 'other') value="{{$Lab['CBC']['other']??''}}" @else hidden @endif name="Lab[CBC][other]" >
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
                <option value="other" {{ isset($Lab['CRP'][0]) && $Lab['CRP'][0] == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>


                                                <div @if(isset($Lab['CRP'][0]) && $Lab['CRP'][0] == 'other') hidden @else  @endif class="result result_value {{ isset($Lab['CRP'][0])  && $Lab['CRP'][0] != 'other' ? $Lab['CRP'][0] : 'normal' }}">
                                                        {{ isset($Lab['CRP'][0])  && $Lab['CRP'][0] != 'other' ? $Lab['CRP'][0] : 'normal' }} 
                                                    </div>

                                                <select @if(isset($Lab['CRP'][0]) && $Lab['CRP'][0] == 'other') @else hidden @endif class="tshRangeOther form-select" name="Lab[CRP][otherLevel]">
                                                    <option {{ isset($Lab['CRP']['otherLevel']) && $Lab['CRP']['otherLevel'] == 'low' ? 'selected' : '' }} value="low">Low</option>
                                                    <option {{ isset($Lab['CRP']['otherLevel']) && $Lab['CRP']['otherLevel'] == 'normal' ? 'selected' : '' }} value="normal">Normal</option>
                                                    <option {{ isset($Lab['CRP']['otherLevel']) && $Lab['CRP']['otherLevel'] == 'high' ? 'selected' : '' }} value="high">High</option>
                                                </select>
                                                
                                                <input class="LabOther form-control" placeholder="enter here ..." @if(isset($Lab['CRP'][0]) && $Lab['CRP'][0] == 'other') value="{{$Lab['CRP']['other']??''}}" @else hidden @endif name="Lab[CRP][other]" >
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
                 <option value="other" {{ isset($Lab['ESR'][0]) && $Lab['ESR'][0] == 'other' ? 'selected' : '' }}>Other</option>
                </select>


                <div @if(isset($Lab['ESR'][0]) && $Lab['ESR'][0] == 'other') hidden @else  @endif class="result result_value {{ isset($Lab['ESR'][0])  && $Lab['ESR'][0] != 'other' ? $Lab['ESR'][0] : 'normal' }}">
                        {{ isset($Lab['ESR'][0])  && $Lab['ESR'][0] != 'other' ? $Lab['ESR'][0] : 'normal' }} 
                    </div>

                <select @if(isset($Lab['ESR'][0]) && $Lab['ESR'][0] == 'other') @else hidden @endif class="tshRangeOther form-select" name="Lab[ESR][otherLevel]">
                    <option {{ isset($Lab['ESR']['otherLevel']) && $Lab['ESR']['otherLevel'] == 'low' ? 'selected' : '' }} value="low">Low</option>
                    <option {{ isset($Lab['ESR']['otherLevel']) && $Lab['ESR']['otherLevel'] == 'normal' ? 'selected' : '' }} value="normal">Normal</option>
                    <option {{ isset($Lab['ESR']['otherLevel']) && $Lab['ESR']['otherLevel'] == 'high' ? 'selected' : '' }} value="high">High</option>
                </select>
                
                <input class="LabOther form-control" placeholder="enter here ..." @if(isset($Lab['ESR'][0]) && $Lab['ESR'][0] == 'other') value="{{$Lab['ESR']['other']??''}}" @else hidden @endif name="Lab[ESR][other]" >
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
                     <option value="other" {{ isset($Lab['CKMP'][0]) && $Lab['CKMP'][0] == 'other' ? 'selected' : '' }}>Other</option>
                    </select>


                    <div @if(isset($Lab['CKMP'][0]) && $Lab['CKMP'][0] == 'other') hidden @else  @endif class="result result_value {{ isset($Lab['CKMP'][0])  && $Lab['CKMP'][0] != 'other' ? $Lab['CKMP'][0] : 'normal' }}">
                            {{ isset($Lab['CKMP'][0])  && $Lab['CKMP'][0] != 'other' ? $Lab['CKMP'][0] : 'normal' }} 
                        </div>

                    <select @if(isset($Lab['CKMP'][0]) && $Lab['CKMP'][0] == 'other') @else hidden @endif class="tshRangeOther form-select" name="Lab[CKMP][otherLevel]">
                        <option {{ isset($Lab['CKMP']['otherLevel']) && $Lab['CKMP']['otherLevel'] == 'low' ? 'selected' : '' }} value="low">Low</option>
                        <option {{ isset($Lab['CKMP']['otherLevel']) && $Lab['CKMP']['otherLevel'] == 'normal' ? 'selected' : '' }} value="normal">Normal</option>
                        <option {{ isset($Lab['CKMP']['otherLevel']) && $Lab['CKMP']['otherLevel'] == 'high' ? 'selected' : '' }} value="high">High</option>
                    </select>
                    
                    <input class="LabOther form-control" placeholder="enter here ..." @if(isset($Lab['CKMP'][0]) && $Lab['CKMP'][0] == 'other') value="{{$Lab['CKMP']['other']??''}}" @else hidden @endif name="Lab[CKMP][other]" >
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
                         <option value="other" {{ isset($Lab['UricAcid'][0]) && $Lab['UricAcid'][0] == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>


                                                <div @if(isset($Lab['UricAcid'][0]) && $Lab['UricAcid'][0] == 'other') hidden @else  @endif class="result result_value {{ isset($Lab['UricAcid'][0])  && $Lab['UricAcid'][0] != 'other' ? $Lab['UricAcid'][0] : 'normal' }}">
                                                        {{ isset($Lab['UricAcid'][0])  && $Lab['UricAcid'][0] != 'other' ? $Lab['UricAcid'][0] : 'normal' }} 
                                                    </div>

                                                <select @if(isset($Lab['UricAcid'][0]) && $Lab['UricAcid'][0] == 'other') @else hidden @endif class="tshRangeOther form-select" name="Lab[UricAcid][otherLevel]">
                                                    <option {{ isset($Lab['UricAcid']['otherLevel']) && $Lab['UricAcid']['otherLevel'] == 'low' ? 'selected' : '' }} value="low">Low</option>
                                                    <option {{ isset($Lab['UricAcid']['otherLevel']) && $Lab['UricAcid']['otherLevel'] == 'normal' ? 'selected' : '' }} value="normal">Normal</option>
                                                    <option {{ isset($Lab['UricAcid']['otherLevel']) && $Lab['UricAcid']['otherLevel'] == 'high' ? 'selected' : '' }} value="high">High</option>
                                                </select>
                                                
                                                <input class="LabOther form-control" placeholder="enter here ..." @if(isset($Lab['UricAcid'][0]) && $Lab['UricAcid'][0] == 'other') value="{{$Lab['UricAcid']['other']??''}}" @else hidden @endif name="Lab[UricAcid][other]" >
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
                             <option value="other" {{ isset($Lab['RF'][0]) && $Lab['RF'][0] == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>


                                                <div @if(isset($Lab['RF'][0]) && $Lab['RF'][0] == 'other') hidden @else  @endif class="result result_value {{ isset($Lab['RF'][0])  && $Lab['RF'][0] != 'other' ? $Lab['RF'][0] : 'normal' }}">
                                                        {{ isset($Lab['RF'][0])  && $Lab['RF'][0] != 'other' ? $Lab['RF'][0] : 'normal' }} 
                                                    </div>

                                                <select @if(isset($Lab['RF'][0]) && $Lab['RF'][0] == 'other') @else hidden @endif class="tshRangeOther form-select" name="Lab[RF][otherLevel]">
                                                    <option {{ isset($Lab['RF']['otherLevel']) && $Lab['RF']['otherLevel'] == 'low' ? 'selected' : '' }} value="low">Low</option>
                                                    <option {{ isset($Lab['RF']['otherLevel']) && $Lab['RF']['otherLevel'] == 'normal' ? 'selected' : '' }} value="normal">Normal</option>
                                                    <option {{ isset($Lab['RF']['otherLevel']) && $Lab['RF']['otherLevel'] == 'high' ? 'selected' : '' }} value="high">High</option>
                                                </select>
                                                
                                                <input class="LabOther form-control" placeholder="enter here ..." @if(isset($Lab['RF'][0]) && $Lab['RF'][0] == 'other') value="{{$Lab['RF']['other']??''}}" @else hidden @endif name="Lab[RF][other]" >
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
                                  <option value="other" {{ isset($Lab['WBC'][0]) && $Lab['WBC'][0] == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>


                                                <div @if(isset($Lab['WBC'][0]) && $Lab['WBC'][0] == 'other') hidden @else  @endif class="result result_value {{ isset($Lab['WBC'][0])  && $Lab['WBC'][0] != 'other' ? $Lab['WBC'][0] : 'normal' }}">
                                                        {{ isset($Lab['WBC'][0])  && $Lab['WBC'][0] != 'other' ? $Lab['WBC'][0] : 'normal' }} 
                                                    </div>

                                                <select @if(isset($Lab['WBC'][0]) && $Lab['WBC'][0] == 'other') @else hidden @endif class="tshRangeOther form-select" name="Lab[WBC][otherLevel]">
                                                    <option {{ isset($Lab['WBC']['otherLevel']) && $Lab['WBC']['otherLevel'] == 'low' ? 'selected' : '' }} value="low">Low</option>
                                                    <option {{ isset($Lab['WBC']['otherLevel']) && $Lab['WBC']['otherLevel'] == 'normal' ? 'selected' : '' }} value="normal">Normal</option>
                                                    <option {{ isset($Lab['WBC']['otherLevel']) && $Lab['WBC']['otherLevel'] == 'high' ? 'selected' : '' }} value="high">High</option>
                                                </select>
                                                
                                                <input class="LabOther form-control" placeholder="enter here ..." @if(isset($Lab['WBC'][0]) && $Lab['WBC'][0] == 'other') value="{{$Lab['WBC']['other']??''}}" @else hidden @endif name="Lab[WBC][other]" >
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
                                     <option value="other" {{ isset($Lab['Proteins'][0]) && $Lab['Proteins'][0] == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>


                                    <div @if(isset($Lab['Proteins'][0]) && $Lab['Proteins'][0] == 'other') hidden @else  @endif class="result result_value {{ isset($Lab['Proteins'][0])  && $Lab['Proteins'][0] != 'other' ? $Lab['Proteins'][0] : 'normal' }}">
                                            {{ isset($Lab['Proteins'][0])  && $Lab['Proteins'][0] != 'other' ? $Lab['Proteins'][0] : 'normal' }} 
                                        </div>

                                    <select @if(isset($Lab['Proteins'][0]) && $Lab['Proteins'][0] == 'other') @else hidden @endif class="tshRangeOther form-select" name="Lab[Proteins][otherLevel]">
                                        <option {{ isset($Lab['Proteins']['otherLevel']) && $Lab['Proteins']['otherLevel'] == 'low' ? 'selected' : '' }} value="low">Low</option>
                                        <option {{ isset($Lab['Proteins']['otherLevel']) && $Lab['Proteins']['otherLevel'] == 'normal' ? 'selected' : '' }} value="normal">Normal</option>
                                        <option {{ isset($Lab['Proteins']['otherLevel']) && $Lab['Proteins']['otherLevel'] == 'high' ? 'selected' : '' }} value="high">High</option>
                                    </select>
                                    
                                    <input class="LabOther form-control" placeholder="enter here ..." @if(isset($Lab['Proteins'][0]) && $Lab['Proteins'][0] == 'other') value="{{$Lab['Proteins']['other']??''}}" @else hidden @endif name="Lab[Proteins][other]" >
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
                                         <option value="other" {{ isset($Lab['Glucose'][0]) && $Lab['Glucose'][0] == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>


                                                <div @if(isset($Lab['Glucose'][0]) && $Lab['Glucose'][0] == 'other') hidden @else  @endif class="result result_value {{ isset($Lab['Glucose'][0])  && $Lab['Glucose'][0] != 'other' ? $Lab['Glucose'][0] : 'normal' }}">
                                                        {{ isset($Lab['Glucose'][0])  && $Lab['Glucose'][0] != 'other' ? $Lab['Glucose'][0] : 'normal' }} 
                                                    </div>

                                                <select @if(isset($Lab['Glucose'][0]) && $Lab['Glucose'][0] == 'other') @else hidden @endif class="tshRangeOther form-select" name="Lab[Glucose][otherLevel]">
                                                    <option {{ isset($Lab['Glucose']['otherLevel']) && $Lab['Glucose']['otherLevel'] == 'low' ? 'selected' : '' }} value="low">Low</option>
                                                    <option {{ isset($Lab['Glucose']['otherLevel']) && $Lab['Glucose']['otherLevel'] == 'normal' ? 'selected' : '' }} value="normal">Normal</option>
                                                    <option {{ isset($Lab['Glucose']['otherLevel']) && $Lab['Glucose']['otherLevel'] == 'high' ? 'selected' : '' }} value="high">High</option>
                                                </select>
                                                
                                                <input class="LabOther form-control" placeholder="enter here ..." @if(isset($Lab['Glucose'][0]) && $Lab['Glucose'][0] == 'other') value="{{$Lab['Glucose']['other']??''}}" @else hidden @endif name="Lab[Glucose][other]" >
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
                                             <option value="other" {{ isset($Lab['Crystals'][0]) && $Lab['Crystals'][0] == 'other' ? 'selected' : '' }}>Other</option>
                                            </select>


                                            <div @if(isset($Lab['Crystals'][0]) && $Lab['Crystals'][0] == 'other') hidden @else  @endif class="result result_value {{ isset($Lab['Crystals'][0])  && $Lab['Crystals'][0] != 'other' ? $Lab['Crystals'][0] : 'normal' }}">
                                                    {{ isset($Lab['Crystals'][0])  && $Lab['Crystals'][0] != 'other' ? $Lab['Crystals'][0] : 'normal' }} 
                                                </div>

                                            <select @if(isset($Lab['Crystals'][0]) && $Lab['Crystals'][0] == 'other') @else hidden @endif class="tshRangeOther form-select" name="Lab[Crystals][otherLevel]">
                                                <option {{ isset($Lab['Crystals']['otherLevel']) && $Lab['Crystals']['otherLevel'] == 'low' ? 'selected' : '' }} value="low">Low</option>
                                                <option {{ isset($Lab['Crystals']['otherLevel']) && $Lab['Crystals']['otherLevel'] == 'normal' ? 'selected' : '' }} value="normal">Normal</option>
                                                <option {{ isset($Lab['Crystals']['otherLevel']) && $Lab['Crystals']['otherLevel'] == 'high' ? 'selected' : '' }} value="high">High</option>
                                            </select>
                                            
                                            <input class="LabOther form-control" placeholder="enter here ..." @if(isset($Lab['Crystals'][0]) && $Lab['Crystals'][0] == 'other') value="{{$Lab['Crystals']['other']??''}}" @else hidden @endif name="Lab[Crystals][other]" >
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
                                                 <option value="other" {{ isset($Lab['Lactate'][0]) && $Lab['Lactate'][0] == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>


                                                <div @if(isset($Lab['Lactate'][0]) && $Lab['Lactate'][0] == 'other') hidden @else  @endif class="result result_value {{ isset($Lab['Lactate'][0])  && $Lab['Lactate'][0] != 'other' ? $Lab['Lactate'][0] : 'normal' }}">
                                                        {{ isset($Lab['Lactate'][0])  && $Lab['Lactate'][0] != 'other' ? $Lab['Lactate'][0] : 'normal' }} 
                                                    </div>

                                                <select @if(isset($Lab['Lactate'][0]) && $Lab['Lactate'][0] == 'other') @else hidden @endif class="tshRangeOther form-select" name="Lab[Lactate][otherLevel]">
                                                    <option {{ isset($Lab['Lactate']['otherLevel']) && $Lab['Lactate']['otherLevel'] == 'low' ? 'selected' : '' }} value="low">Low</option>
                                                    <option {{ isset($Lab['Lactate']['otherLevel']) && $Lab['Lactate']['otherLevel'] == 'normal' ? 'selected' : '' }} value="normal">Normal</option>
                                                    <option {{ isset($Lab['Lactate']['otherLevel']) && $Lab['Lactate']['otherLevel'] == 'high' ? 'selected' : '' }} value="high">High</option>
                                                </select>
                                                
                                                <input class="LabOther form-control" placeholder="enter here ..." @if(isset($Lab['Lactate'][0]) && $Lab['Lactate'][0] == 'other') value="{{$Lab['Lactate']['other']??''}}" @else hidden @endif name="Lab[Lactate][other]" >
                                             </div>
                                         </div>
                                         </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="title_head">
                                              <h4>USSTBIOPSYMSK452</h4>
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="row">
                                          <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Histopath MSK Biopsy - Findings&nbsp;</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input" type="radio" name="Lab[USSTBIOPSYMSK452][]" value="Normal" id="formRadiosRighte58"
                                                      {{ isset($Lab['USSTBIOPSYMSK452'][0]) && $Lab['USSTBIOPSYMSK452'][0] == "Normal" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRighte58">
                                                      Normal
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input" type="radio" name="Lab[USSTBIOPSYMSK452][]" value="Abnormal" id="formRadiosRighte59"
                                                      {{ isset($Lab['USSTBIOPSYMSK452'][0]) && $Lab['USSTBIOPSYMSK452'][0] == "Abnormal" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRighte59">
                                                      Abnormal
                                                      </label>
                                                  </div>
                                              </div>
                                              <div class="col-lg-12" id="textarea_e59" style="">
                                              <div class="form-check form-check-right mb-3">
                                              <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="Lab[USSTBIOPSYMSK452Note][]">{{ $Lab['USSTBIOPSYMSK452Note'][0] ?? '' }}</textarea>
                                              </div>
                                          </div>
                                          </div>
                                          <div class="col-lg-12 mb-4">
                                            <div class="title_head">
                                                <h4>Others</h4>
                                            </div>
                                            <div class="otherLabRow">
                                                @if(isset($Lab['other']))
                                                @foreach($Lab['other'] as $kk=>$value)
                                                <div class="row my-3">
                                                    <div class="col-lg-6">
                                                        <input class="form-control" name="Lab[other][]" placeholder="Other Title" value="{{$value}}"> 
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" name="Lab[otherNote][]" placeholder="Other Notes" value="{{$Lab['otherNote'][$kk]}}"> 
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                            <div class="add_more_btn">
                                                <a href="javascript:void(0);" style="width: 20%;" onclick="addOtherLab()"><i class="fa-solid fa-plus"></i> Add More</a>
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
                                            <h4>REQNERVECON110</h4>
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
                                            {{-- <a target="_blank"  href="{{ route('user.viewKneePainEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                            {{-- <a target="_blank"  href="{{ route('user.viewKneePainEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                      <h6 class="mb-3 lut_title">Histopath MSK Biopsy - Findings&nbsp;</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[HistopathMSKBiopsy][]" value="Non-Eligibile" id="formRadiosRightj1"
                                                    {{ isset($ElegibilitySTATUS['HistopathMSKBiopsy'][0]) && $ElegibilitySTATUS['HistopathMSKBiopsy'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj1">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[HistopathMSKBiopsy][]" value="Eligibile" id="formRadiosRightj2"
                                                    {{ isset($ElegibilitySTATUS['HistopathMSKBiopsy'][0]) && $ElegibilitySTATUS['HistopathMSKBiopsy'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj2">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j2" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[HistopathMSKBiopsyNote][]">{{ $ElegibilitySTATUS['HistopathMSKBiopsyNote'][0] ?? '' }}</textarea>
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
                                      <h6 class="mb-3 lut_title">Conservative - knee Brace</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[conservativekneeBrace][]" value="Non-Eligibile" id="formRadiosRightj17"
                                                    {{ isset($ElegibilitySTATUS['conservativekneeBrace'][0]) && $ElegibilitySTATUS['conservativekneeBrace'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj17">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[conservativekneeBrace][]" value="Eligibile" id="formRadiosRightj18"
                                                    {{ isset($ElegibilitySTATUS['conservativekneeBrace'][0]) && $ElegibilitySTATUS['conservativekneeBrace'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj18">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j18" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[conservativekneeBraceNote][]">{{ $ElegibilitySTATUS['conservativekneeBraceNote'][0] ?? '' }}</textarea>
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Steroidsinjection][]" value="Non-Eligibile"  id="formRadiosRightj19"
                                                    {{ isset($ElegibilitySTATUS['Steroidsinjection'][0]) && $ElegibilitySTATUS['Steroidsinjection'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj19">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Steroidsinjection][]" value="Eligibile"  id="formRadiosRightj20"
                                                    {{ isset($ElegibilitySTATUS['Steroidsinjection'][0]) && $ElegibilitySTATUS['Steroidsinjection'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj20">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j20" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[SteroidsinjectionNote][]" >{{ $ElegibilitySTATUS['SteroidsinjectionNote'][0]  ?? '' }}</textarea>
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[HAinjection][]" value="Non-Eligibile"  id="formRadiosRightj21"
                                                    {{ isset($ElegibilitySTATUS['HAinjection'][0]) && $ElegibilitySTATUS['HAinjection'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj21">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[HAinjection][]" value="Eligibile"  id="formRadiosRightj22"
                                                    {{ isset($ElegibilitySTATUS['HAinjection'][0]) && $ElegibilitySTATUS['HAinjection'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj22">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j22" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[HAinjectionNote][]">{{ $ElegibilitySTATUS['HAinjectionNote'][0]  ?? '' }}</textarea>
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[PRPinjection][]" value="Non-Eligibile" id="formRadiosRightj23"
                                                    {{ isset($ElegibilitySTATUS['PRPinjection'][0]) && $ElegibilitySTATUS['PRPinjection'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj23">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[PRPinjection][]" value="Eligibile"  id="formRadiosRightj24"
                                                    {{ isset($ElegibilitySTATUS['PRPinjection'][0]) && $ElegibilitySTATUS['PRPinjection'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj24">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j24" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[PRPinjectionNote][]">{{ $ElegibilitySTATUS['PRPinjectionNote'][0] ?? '' }}</textarea>
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
                                      <h6 class="mb-3 lut_title">Neurolysis Block </h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NeurolysisBlock][]" value="Non-Eligibile" id="formRadiosRightj27"
                                                    {{ isset($ElegibilitySTATUS['NeurolysisBlock'][0]) && $ElegibilitySTATUS['NeurolysisBlock'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj27">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NeurolysisBlock][]" value="Eligibile" id="formRadiosRightj28"
                                                    {{ isset($ElegibilitySTATUS['NeurolysisBlock'][0]) && $ElegibilitySTATUS['NeurolysisBlock'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj28">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j28" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[NeurolysisBlockNote][]" >{{ $ElegibilitySTATUS['NeurolysisBlockNote'][0] ?? '' }}</textarea>
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveRFAblation][]" value="Non-Eligibile" id="formRadiosRightj29"
                                                    {{ isset($ElegibilitySTATUS['NerveRFAblation'][0]) && $ElegibilitySTATUS['NerveRFAblation'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj29">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveRFAblation][]" value="Eligibile" id="formRadiosRightj30"
                                                    {{ isset($ElegibilitySTATUS['NerveRFAblation'][0]) && $ElegibilitySTATUS['NerveRFAblation'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj30">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j30" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[NerveRFAblationNote][]">{{ $ElegibilitySTATUS['NerveRFAblationNote'][0] ?? '' }}</textarea>
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCooledRF][]" value="Non-Eligibile"  id="formRadiosRightj31"
                                                    {{ isset($ElegibilitySTATUS['NerveCooledRF'][0]) && $ElegibilitySTATUS['NerveCooledRF'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj31">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCooledRF][]" value="Eligibile"  id="formRadiosRightj32"
                                                    {{ isset($ElegibilitySTATUS['NerveCooledRF'][0]) && $ElegibilitySTATUS['NerveCooledRF'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj32">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j32" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[NerveCooledRFNote][]">{{ $ElegibilitySTATUS['NerveCooledRFNote'][0] ?? '' }}</textarea>
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCryotherapy][]" value="Non-Eligibile"  id="formRadiosRightj33"
                                                    {{ isset($ElegibilitySTATUS['NerveCryotherapy'][0]) && $ElegibilitySTATUS['NerveCryotherapy'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj33">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCryotherapy][]" value="Eligibile"  id="formRadiosRightj34"
                                                    {{ isset($ElegibilitySTATUS['NerveCryotherapy'][0]) && $ElegibilitySTATUS['NerveCryotherapy'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj34">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j34" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[NerveCryotherapyNote][]">{{ $ElegibilitySTATUS['NerveCryotherapyNote'][0] ?? '' }}</textarea>
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
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[OthersNote][]">{{ $ElegibilitySTATUS['OthersNote'][0]  ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <h6 class="section_title__">Intervention PROCEDURE / Rx 
                                            {{-- <a
                                            target="_blank"  href="{{ route('user.viewKneePainEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i
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
                <input class="form-check-input" type="checkbox" name="Intervention[USPRPINJECTION280LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightf72"
                {{ isset($Interventions['USPRPINJECTION280LABPREIRBASIC32'][0]) && $Interventions['USPRPINJECTION280LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf72">
                LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USPRPINJECTION280LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf73"
                {{ isset($Interventions['USPRPINJECTION280LABPREIRSAFETY17'][0]) && $Interventions['USPRPINJECTION280LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
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
                <input class="form-check-input" type="checkbox" name="Intervention[USHAINJECTION310LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightf73"
                {{ isset($Interventions['USHAINJECTION310LABPREIRBASIC32'][0]) && $Interventions['USHAINJECTION310LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf73">
                LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USHAINJECTION310LABPREIRBASIC32][]"  value="LABPREIRSAFETY17" id="formRadiosRightf74"
                {{ isset($Interventions['USHAINJECTION310LABPREIRBASIC32'][0]) && $Interventions['USHAINJECTION310LABPREIRBASIC32'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
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
  <h6 class="mb-3 lut_title">USIAOOZINJECTION340</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USIAOOZINJECTION340LABPREIRBASIC32][]"  value="LABPREIRBASIC32" id="formRadiosRightf75"
                {{ isset($Interventions['USIAOOZINJECTION340LABPREIRBASIC32'][0]) && $Interventions['USIAOOZINJECTION340LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf75">
                LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USIAOOZINJECTION340LABPREIRSAFETY17][]"  value="LABPREIRSAFETY17" id="formRadiosRightf76"
                {{ isset($Interventions['USIAOOZINJECTION340LABPREIRSAFETY17'][0]) && $Interventions['USIAOOZINJECTION340LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
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
  <h6 class="mb-3 lut_title">USNEUROLYSISBLOCK430</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USNEUROLYSISBLOCK430LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightf77"
                {{ isset($Interventions['USNEUROLYSISBLOCK430LABPREIRBASIC32'][0]) && $Interventions['USNEUROLYSISBLOCK430LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf77">
                LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USNEUROLYSISBLOCK430LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf78"
                {{ isset($Interventions['USNEUROLYSISBLOCK430LABPREIRSAFETY17'][0]) && $Interventions['USNEUROLYSISBLOCK430LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
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
                <input class="form-check-input" type="checkbox" name="Intervention[USRFABLATION490LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightf79"
                {{ isset($Interventions['USRFABLATION490LABPREIRBASIC32'][0]) && $Interventions['USRFABLATION490LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf79">
                LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USRFABLATION490LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf80"
                {{ isset($Interventions['USRFABLATION490LABPREIRSAFETY17'][0]) && $Interventions['USRFABLATION490LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf80">
                LABPREIRSAFETY17
                </label>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="row">
    <div class="col-lg-4">
  <h6 class="mb-3 lut_title">USCOOLEDRF560</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USCOOLEDRF560LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightf81"
                {{ isset($Interventions['USCOOLEDRF560LABPREIRBASIC32'][0]) && $Interventions['USCOOLEDRF560LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf81">
                LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USCOOLEDRF560LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf82"
                {{ isset($Interventions['USCOOLEDRF560LABPREIRSAFETY17'][0]) && $Interventions['USCOOLEDRF560LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf82">
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
                <input class="form-check-input" type="checkbox" name="Intervention[USCRYOABLATION610LABPREIRBASIC32][]" value="LABPREIRBASIC32" id="formRadiosRightf83"
                {{ isset($Interventions['USCRYOABLATION610LABPREIRBASIC32'][0]) && $Interventions['USCRYOABLATION610LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf83">
                LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USCRYOABLATION610LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf84"
                {{ isset($Interventions['USCRYOABLATION610LABPREIRSAFETY17'][0]) && $Interventions['USCRYOABLATION610LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf84">
                LABPREIRSAFETY17
                </label>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="row">
    <div class="col-lg-4">
  <h6 class="mb-3 lut_title">ANGIOGAE2310</h6>
</div>
<div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOGAE2310LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightf85"
                {{ isset($Interventions['ANGIOGAE2310LABPREANGIO48'][0]) && $Interventions['ANGIOGAE2310LABPREANGIO48'][0] == 'LABPREANGIO48' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf85">
                LABPREANGIO48
                </label>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOGAE2310LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf86"
                {{ isset($Interventions['ANGIOGAE2310LABPREIRSAFETY17'][0]) && $Interventions['ANGIOGAE2310LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf86">
                LABPREIRSAFETY17
                </label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOGAE2310IVSEDATION270][]" value="IVSEDATION270" id="formRadiosRightf87"
                {{ isset($Interventions['ANGIOGAE2310IVSEDATION270'][0]) && $Interventions['ANGIOGAE2310IVSEDATION270'][0] == 'IVSEDATION270' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf87">
                IVSEDATION270
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mb-4">
        <div class="otherOtherProcedureRx">
            @if(isset($Interventions['other']))
            @foreach($Interventions['other'] as $kk=>$value)
            <div class="row my-3">
                <div class="col-lg-6">
                    <input class="form-control" name="Intervention[other][]" placeholder="Other Title" value="{{$value}}"> 
                </div>
                <div class="col-lg-6">
                    <input class="form-control" name="Intervention[otherNote][]" placeholder="Other Notes" value="{{$Interventions['otherNote'][$kk]}}"> 
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="add_more_btn">
            <a href="javascript:void(0);" style="width: 20%;" onclick="addOtherProcedureRx()"><i class="fa-solid fa-plus"></i> Add More</a>
        </div>
        
    </div>
</div>




                                    <div class="col-lg-12 mb-3">
                                        <h6 class="section_title__">Supportive 
                                            {{-- <a target="_blank"  href="{{ route('user.viewKneePainEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                            
                                            'IMCOLLAGEN110' => ['IMCOLLAGEN110'],
                                            'IAOZ290' => ['IAOZ290'],
                                            'SCKB28' => ['SCKB28'],
                                            'SCICEB11' => ['SCICEB11'],
                                            'LABPREIVBASIC52' => ['LABPREIVBASIC52'],
                                            'LABPREIRBASIC32' => ['LABPREIRBASIC32'],
                                            
                                
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
                                            <div class="col-lg-3" >
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[IAOZ290][]"
                                                        {{ isset($supportives['IAOZ290']) && in_array('IAOZ290', $supportives['IAOZ290']) ? 'checked' : '' }}
                                                        value="IAOZ290" id="formRadiosRightb47">
                                                    <label class="form-check-label" for="formRadiosRightb47">
                                                        IAOZ290
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3" >
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[SCKB28][]"
                                                        {{ isset($supportives['SCKB28']) && in_array('SCKB28', $supportives['SCKB28']) ? 'checked' : '' }}
                                                        value="SCKB28" id="formRadiosRightb47SCKB28">
                                                    <label class="form-check-label" for="formRadiosRightb47SCKB28">
                                                        SCKB28
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3" >
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
                                            <div class="col-lg-3" >
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[LABPREIVBASIC52][]"
                                                        {{ isset($supportives['LABPREIVBASIC52']) && in_array('LABPREIVBASIC52', $supportives['LABPREIVBASIC52']) ? 'checked' : '' }}
                                                        value="LABPREIVBASIC52" id="formRadiosRightb47LABPREIVBASIC52">
                                                    <label class="form-check-label" for="formRadiosRightb47LABPREIVBASIC52">
                                                        LABPREIVBASIC52
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3" id="Supportive">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[LABPREIRBASIC32][]"
                                                        {{ isset($supportives['LABPREIRBASIC32']) && in_array('LABPREIRBASIC32', $supportives['LABPREIRBASIC32']) ? 'checked' : '' }}
                                                        value="LABPREIRBASIC32" id="formRadiosRightb47LABPREIRBASIC32">
                                                    <label class="form-check-label" for="formRadiosRightb47LABPREIRBASIC32">
                                                        LABPREIRBASIC32
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
                                            {{-- <a target="_blank"  href="{{ route('user.viewKneePainEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a> --}}
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
                                            <input class="form-check-input" type="checkbox" name="Prescription[Celebrix][]" value="Celebrix Tab - 200 mg PO BID x 1 month " id="formRadiosRightf94"
                                            {{ isset($Prescription['Celebrix']) && in_array('Celebrix Tab - 200 mg PO BID x 1 month ', $Prescription['Celebrix']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf94">
                                                Celebrix Tab - 200 mg PO BID x 1 month 
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[CelebrixTab][]" value="Celebrix Tab - 200 mg PO BID x 1 month " id="formRadiosRightf94"
                                            {{ isset($Prescription['CelebrixTab']) && in_array('Celebrix Tab - 200 mg PO BID x 1 month ', $Prescription['CelebrixTab']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf94">
                                                Celebrix Tab - 200 mg PO BID x 1 month 
                                                </label>    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Riparil][]" value="Riparil Gel 1 Ampule - Topical TID x 2 weeks" id="formRadiosRightf95"
                                            {{ isset($Prescription['Riparil']) && in_array('Riparil Gel 1 Ampule - Topical TID x 2 weeks', $Prescription['Riparil']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf95">
                                                Riparil Gel 1 Ampule - Topical TID x 2 weeks
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Sporidex][]" value="Sporidex (Cephalexin) Tab - 500 mg PO BID x 5 days" id="formRadiosRightf96"
                                            {{ isset($Prescription['Sporidex']) && in_array('Sporidex (Cephalexin) Tab - 500 mg PO BID x 5 days', $Prescription['Sporidex']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf96">
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
                                                    Orthotics
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
    // Start Image    
    const stage = new Konva.Stage({
        container: 'image-container',
        width: 500,
        height: 600,
    });
    
    const layer = new Konva.Layer();
    stage.add(layer);
    
    let isDrawing = false;
    let annotationMode = false;
    let lastLine;
    
    const imageObj = new Image();
    imageObj.src = '{{  $VaricoceleEmboForm->AnnotateimageData ? asset('/assets/thyroid-eligibility-form/' . $VaricoceleEmboForm->AnnotateimageData) : asset('/assets/thyroid-eligibility-form/add/knee.jpg') }}';
    
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
                    width: 20
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
                        width:300,
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
        link.download = 'knee-pain.png';
        link.click();
    });
</script>




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

                function addOtherLab(){
                    $(".otherLabRow").append(`<div class="row my-3"><div class="col-lg-6">
                                                <input class="form-control" name="Lab[other][]" placeholder="Other Title"> 
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" name="Lab[otherNote][]" placeholder="Other Notes"> 
                                            </div></div>`);
                }

                function addOtherProcedureRx(){
                    $(".otherOtherProcedureRx").append(`<div class="row my-3"><div class="col-lg-6">
                                                <input class="form-control" name="Intervention[other][]" placeholder="Other Title"> 
                                            </div>
                                            <div class="col-lg-6">
                                                <input class="form-control" name="Intervention[otherNote][]" placeholder="Other Notes"> 
                                            </div></div>`);
                }
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


                    if($(select).val() == 'other'){
                        $(select).closest('.lab_test_value').find('.LabOther').removeAttr('hidden').focus();
                        $(select).closest('.lab_test_value').find('.tshRangeOther').removeAttr('hidden').focus();
                        $(select).closest('.lab_test_value').find('.result_value').attr('hidden', 'hidden');
                    } else {
                        $(select).closest('.lab_test_value').find('.LabOther').attr('hidden', 'hidden');
                        $(select).closest('.lab_test_value').find('.tshRangeOther').attr('hidden', 'hidden');
                        $(select).closest('.lab_test_value').find('.result_value').removeAttr('hidden').focus();
                    }
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
        @if (isset($ElegibilitySTATUS['HistopathMSKBiopsyNote'][0]))
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
        @if (isset($ElegibilitySTATUS['SteroidsinjectionNote'][0]  ))
        $("#textarea_j20").show();
        @else

        $("#textarea_j20").hide();
        @endif
        @if (isset($ElegibilitySTATUS['HAinjectionNote'][0]))
        $("#textarea_j22").show();
        @else
        $("#textarea_j22").hide();
            
        @endif
        @if (isset($ElegibilitySTATUS['PRPinjectionNote'][0]))
        $("#textarea_j24").show();
        @else

        $("#textarea_j24").hide();
        @endif
        @if (isset($ElegibilitySTATUS['OzoneIAinjectionNote'][0]))
        $("#textarea_j26").show();
        @else
        $("#textarea_j26").hide();
        @endif
        @if (isset($ElegibilitySTATUS['NeurolysisBlockNote'][0]))
        $("#textarea_j28").show();
        @else

        $("#textarea_j28").hide(); 
        @endif
        @if (isset($ElegibilitySTATUS['NerveRFAblationNote'][0]))
        $("#textarea_j30").show();
        @else

        $("#textarea_j30").hide();
        @endif
        @if (isset($ElegibilitySTATUS['NerveCooledRFNote'][0]))
        $("#textarea_j32").show();
        @else

        $("#textarea_j32").hide();  
        @endif
        @if (isset($ElegibilitySTATUS['NerveCryotherapyNote'][0]))
        $("#textarea_j34").show();
        @else

        $("#textarea_j34").hide(); 
        @endif
        
        $("#textarea_j35").hide();
        @if (isset($ElegibilitySTATUS['OthersNote'][0]  ))
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


{{--  Symptoms fields validation  --}}
<script>







    $(document).ready(function() {
        
        function validateForm() {

            // Medial knee pain start  
            var isChecked_sym_a1 = $("#sym_a1").is(":checked");
           
            var sym_a1_durationValue = $("select[name='symptoms[0][1]']").val();
            
            var sym_a1_durationType = $("select[name='symptoms[0][2]']").val();
            var sym_a1_description = $("textarea[name='symptoms[0][3]']").val();

            if (sym_a1_durationValue !== "" || sym_a1_durationType !== "" || sym_a1_description !== "") {
               
                if(isChecked_sym_a1 ===false){
                    
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please fill out Medial knee pain fields in Symptoms.',
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
// Medial knee pain end  


// Anterior Knee Pain start
var isChecked_sym_a2 = $("#sym_a2").is(":checked");
           
           var sym_a2_durationValue = $("select[name='symptoms[1][1]']").val();
           
           var sym_a2_durationType = $("select[name='symptoms[1][2]']").val();
           var sym_a2_description = $("textarea[name='symptoms[1][3]']").val();

           if (sym_a2_durationValue !== "" || sym_a2_durationType !== "" || sym_a2_description !== "") {
              
               if(isChecked_sym_a2 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Anterior Knee Pain fields in Symptoms.',
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
// Anterior Knee Pain end 



// Audiable knee sound start
var isChecked_sym_a3 = $("#sym_a3").is(":checked");
           
           var sym_a3_durationValue = $("select[name='symptoms[2][1]']").val();
           
           var sym_a3_durationType = $("select[name='symptoms[2][2]']").val();
           var sym_a3_description = $("textarea[name='symptoms[2][3]']").val();

           if (sym_a3_durationValue !== "" || sym_a3_durationType !== "" || sym_a3_description !== "") {
              
               if(isChecked_sym_a3 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Audiable knee sound fields in Symptoms.',
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
// Audiable knee sound end 


//  Knee swellimg start
var isChecked_sym_a4 = $("#sym_a4").is(":checked");
           
           var sym_a4_durationValue = $("select[name='symptoms[3][1]']").val();
           
           var sym_a4_durationType = $("select[name='symptoms[3][2]']").val();
           var sym_a4_description = $("textarea[name='symptoms[3][3]']").val();

           if (sym_a4_durationValue !== "" || sym_a4_durationType !== "" || sym_a4_description !== "") {
              
               if(isChecked_sym_a4 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Knee swellimg fields in Symptoms.',
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
//  Knee swellimg end 



// Restricted knee flexion start
var isChecked_sym_a5 = $("#sym_a5").is(":checked");
           
           var sym_a5_durationValue = $("select[name='symptoms[4][1]']").val();
           
           var sym_a5_durationType = $("select[name='symptoms[4][2]']").val();
           var sym_a5_description = $("textarea[name='symptoms[4][3]']").val();

           if (sym_a5_durationValue !== "" || sym_a5_durationType !== "" || sym_a5_description !== "") {
              
               if(isChecked_sym_a5 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Restricted knee flexion fields in Symptoms.',
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
// Restricted knee flexion end 



//  Restricted Walking / running start
var isChecked_sym_a6 = $("#sym_a6").is(":checked");
           
           var sym_a6_durationValue = $("select[name='symptoms[5][1]']").val();
           
           var sym_a6_durationType = $("select[name='symptoms[5][2]']").val();
           var sym_a6_description = $("textarea[name='symptoms[5][3]']").val();

           if (sym_a6_durationValue !== "" || sym_a6_durationType !== "" || sym_a6_description !== "") {
              
               if(isChecked_sym_a6 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Restricted Walking / running fields in Symptoms.',
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
//  Restricted Walking / running end 



//  Restricted knee extensiom  start
var isChecked_sym_aa6 = $("#sym_aa6").is(":checked");
           
           var sym_aa6_durationValue = $("select[name='symptoms[6][1]']").val();
           
           var sym_aa6_durationType = $("select[name='symptoms[6][2]']").val();
           var sym_aa6_description = $("textarea[name='symptoms[6][3]']").val();

           if (sym_aa6_durationValue !== "" || sym_aa6_durationType !== "" || sym_aa6_description !== "") {
              
               if(isChecked_sym_aa6 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Restricted knee extensiom fields in Symptoms.',
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
//  Restricted knee extensiom  end 



//   Unstable knee / locking knee start
var isChecked_sym_aaa6 = $("#sym_aaa6").is(":checked");
           
           var sym_aaa6_durationValue = $("select[name='symptoms[7][1]']").val();
           
           var sym_aaa6_durationType = $("select[name='symptoms[7][2]']").val();
           var sym_aaa6_description = $("textarea[name='symptoms[7][3]']").val();

           if (sym_aaa6_durationValue !== "" || sym_aaa6_durationType !== "" || sym_aaa6_description !== "") {
              
               if(isChecked_sym_aaa6 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out  Unstable knee / locking knee fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_aaa6');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//   Unstable knee / locking knee end 



//  Deformed Valgus /Varus or Valgus knee start
var isChecked_sym_aaaa61 = $("#sym_aaaa61").is(":checked");
           
           var _sym_aaaa61_durationValue = $("select[name='symptoms[8][1]']").val();
           
           var _sym_aaaa61_durationType = $("select[name='symptoms[8][2]']").val();
           var _sym_aaaa61_description = $("textarea[name='symptoms[8][3]']").val();

           if (_sym_aaaa61_durationValue !== "" || _sym_aaaa61_durationType !== "" || _sym_aaaa61_description !== "") {
              
               if(isChecked_sym_aaaa61 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Deformed Valgus /Varus or Valgus knee fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_aaaa61');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Deformed Valgus /Varus or Valgus knee end 


//  Warm knee start
var isChecked_sym_aaaa62 = $("#sym_aaaa62").is(":checked");
           
           var _sym_aaaa62_durationValue = $("select[name='symptoms[9][1]']").val();
           
           var _sym_aaaa62_durationType = $("select[name='symptoms[9][2]']").val();
           var _sym_aaaa62_description = $("textarea[name='symptoms[9][3]']").val();

           if (_sym_aaaa62_durationValue !== "" || _sym_aaaa62_durationType !== "" || _sym_aaaa62_description !== "") {
              
               if(isChecked_sym_aaaa62 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Warm knee fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_aaaa62');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Warm knee end 


//  Lethargy start
var isChecked_sym_aaaa621 = $("#sym_aaaa621").is(":checked");
           
           var sym_aaaa621_durationValue = $("select[name='symptoms[10][1]']").val();
           
           var sym_aaaa621_durationType = $("select[name='symptoms[10][2]']").val();
           var sym_aaaa621_description = $("textarea[name='symptoms[10][3]']").val();

           if (sym_aaaa621_durationValue !== "" || sym_aaaa621_durationType !== "" || sym_aaaa621_description !== "") {
              
               if(isChecked_sym_aaaa621 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Lethargy fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_aaaa621');
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
var isChecked_sym_aaaa6211 = $("#sym_aaaa6211").is(":checked");
           
           var sym_aaaa6211_durationValue = $("select[name='symptoms[11][1]']").val();
           
           var sym_aaaa6211_durationType = $("select[name='symptoms[11][2]']").val();
           var sym_aaaa6211_description = $("textarea[name='symptoms[11][3]']").val();

           if (sym_aaaa6211_durationValue !== "" || sym_aaaa6211_durationType !== "" || sym_aaaa6211_description !== "") {
              
               if(isChecked_sym_aaaa6211 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Fatigue fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_aaaa6211');
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
        
        $("#updateKneePainEligibilityForms").submit(function(event) {


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
                                url: '{{ route("user.updateKneePainEligibilityForms") }}',
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
                                                        text: 'Knee Pain form updated successfully!',
                                                        icon: 'success',
                                                        timer: 2000, // Display for 2 seconds
                                                        timerProgressBar: true, // Show progress bar
                                                        showConfirmButton: false, // Hide the OK button
                                                        willClose: () => {
                                                            var redirectUrl = "{{ route('user.viewKneePainEligibilityForms', ['id' => ':id']) }}";
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

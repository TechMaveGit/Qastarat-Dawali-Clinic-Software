@extends('back.layout.main_view')
@push('title')
Patient | Haemorrhoids Embo | QASTARAT & DAWALI CLINICS
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
                <form id="updateHaemorrhoidsEmboEligibilityForms" method="POST" action="{{ route('user.updateHaemorrhoidsEmboEligibilityForms') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ @$patient_id }}" />
                    <input type="hidden" name="form_type" value="HaemorrhoidsEmbo" />

                    <h3 class="form_title">Haemorrhoids Embo (HE)</h3>

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
                                                'Haemorrhoids' => ['Haemorrhoids'],
                                                'Analpain' => ['Anal pain'],
                                                'LowerGIBleed' => ['Lower GI Bleed'],
                                                'Perinealvaricosities' => ['Perineal varicosities'],
                                                'Chronicconstipation' => ['Chronic constipation'],
                                                'Analfissure' => ['Anal fissure'],     
                                                'Proctitis' => ['Proctitis'],     
                                                
                                                
                                            ];
                                            $filteredData = array_diff_key($diagnosis_generals, $existingData);
                                        }

                                    @endphp

                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Haemorrhoids][]" id="formRadiosRight1"
                                                {{ isset($diagnosis_generals['Haemorrhoids']) && in_array('Haemorrhoids', $diagnosis_generals['Haemorrhoids']) ? 'checked' : '' }}
                                                value="Haemorrhoids">
                                            <label class="form-check-label" for="formRadiosRight1">
                                                Haemorrhoids
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Analpain][]" id="formRadiosRight2"
                                                {{ isset($diagnosis_generals['Analpain']) && in_array('Anal pain', $diagnosis_generals['Analpain']) ? 'checked' : '' }}
                                                value="Anal pain">
                                            <label class="form-check-label" for="formRadiosRight2">
                                                Anal pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LowerGIBleed][]" id="formRadiosRight3"
                                                {{ isset($diagnosis_generals['LowerGIBleed']) && in_array('Lower GI Bleed', $diagnosis_generals['LowerGIBleed']) ? 'checked' : '' }}
                                                value="Lower GI Bleed">
                                            <label class="form-check-label" for="formRadiosRight3">
                                                Lower GI Bleed
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Perinealvaricosities][]" id="formRadiosRight4"
                                                {{ isset($diagnosis_generals['Perinealvaricosities']) && in_array('Perineal varicosities', $diagnosis_generals['Perinealvaricosities']) ? 'checked' : '' }}
                                                value="Perineal varicosities">
                                            <label class="form-check-label" for="formRadiosRight4">
                                                Perineal varicosities
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Chronicconstipation][]" id="formRadiosRight5"
                                                {{ isset($diagnosis_generals['Chronicconstipation']) && in_array('Chronic constipation', $diagnosis_generals['Chronicconstipation']) ? 'checked' : '' }}
                                                value="Chronic constipation">
                                            <label class="form-check-label" for="formRadiosRight5">
                                                Chronic constipation
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Analfissure][]" id="formRadiosRight4Analfissure"
                                                {{ isset($diagnosis_generals['Analfissure']) && in_array('Anal fissure', $diagnosis_generals['Analfissure']) ? 'checked' : '' }}
                                                value="Anal fissure">
                                            <label class="form-check-label" for="formRadiosRight4Analfissure">
                                                Anal fissure
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4" id="diagnosis_general_checkbox">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Proctitis][]" id="formRadiosRight4Proctitis"
                                                {{ isset($diagnosis_generals['Proctitis']) && in_array('Proctitis', $diagnosis_generals['Proctitis']) ? 'checked' : '' }}
                                                value="Proctitis">
                                            <label class="form-check-label" for="formRadiosRight4Proctitis">
                                                Proctitis
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
                                                'D129' => ['D12.9 Benign neoplasm: Anus and anal canal'],
                                                'K64' => ['K64 Haemorrhoids and perianal venous thrombosis'],
                                                'K640' => ['K64.0 First degree haemorrhoids'],
                                                'K641' => ['K64.1 Second degree haemorrhoids'],
                                                'K642' => ['K64.2 Third degree haemorrhoids'],
                                                'K643' => ['K64.3 Fourth degree haemorrhoids'],
                                                'K644' => ['K64.4 Residual haemorrhoidal skin tags'],
                                                'K648' => ['K64.8 Other specified haemorrhoids'],
                                                'K649' => ['K64.9 Haemorrhoids, unspecified'],
                                                'a022' => ['022 Venous complications and hemorrhoids in pregnancy'],
                                                'a0224' => ['022.4 Haemorrhoids in pregnancy'],
                                                'a087' => ['087 Venous complications and hemorrhoids in the puerperium'],
                                                'a0872' => ['087.2 Haemorrhoids in the puerperium']
                                                
                                               
                                            ];
                                            $filteredData = array_diff_key($diagnosis_cids, $existingData);
                                        }

                                    @endphp
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D129][]"
                                                id="formRadiosRight8" value="D12.9 Benign neoplasm: Anus and anal canal"
                                                {{ isset($diagnosis_cids['D129']) && in_array('D12.9 Benign neoplasm: Anus and anal canal', $diagnosis_cids['D129']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight8">
                                                D12.9 Benign neoplasm: Anus and anal canal
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[K64][]"
                                                id="formRadiosRight9" value="K64 Haemorrhoids and perianal venous thrombosis"
                                                {{ isset($diagnosis_cids['K64']) && in_array('K64 Haemorrhoids and perianal venous thrombosis', $diagnosis_cids['K64']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight9">
                                                K64 Haemorrhoids and perianal venous thrombosis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[K640][]"
                                                id="formRadiosRight10" value="K64.0 First degree haemorrhoids"
                                                {{ isset($diagnosis_cids['K640']) && in_array('K64.0 First degree haemorrhoids', $diagnosis_cids['K640']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight10">
                                                K64.0 First degree haemorrhoids
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[K641][]"
                                                id="formRadiosRight11K641" value="K64.1 Second degree haemorrhoids"
                                                {{ isset($diagnosis_cids['K641']) && in_array('K64.1 Second degree haemorrhoids', $diagnosis_cids['K641']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight11K641">
                                                K64.1 Second degree haemorrhoids
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[K642][]"
                                                id="formRadiosRight12K642" value="K64.2 Third degree haemorrhoids"
                                                {{ isset($diagnosis_cids['K642']) && in_array('K64.2 Third degree haemorrhoids', $diagnosis_cids['K642']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight12K642">
                                                K64.2 Third degree haemorrhoids
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[K643][]"
                                                id="formRadiosRight13K643" value="K64.3 Fourth degree haemorrhoids"
                                                {{ isset($diagnosis_cids['K643']) && in_array('K64.3 Fourth degree haemorrhoids', $diagnosis_cids['K643']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13K643">
                                                K64.3 Fourth degree haemorrhoids
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[K644][]"
                                                id="formRadiosRight13K644" value="K64.4 Residual haemorrhoidal skin tags"
                                                {{ isset($diagnosis_cids['K644']) && in_array('K64.4 Residual haemorrhoidal skin tags', $diagnosis_cids['K644']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13K644">
                                                K64.4 Residual haemorrhoidal skin tags
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[K648][]"
                                                id="formRadiosRight13K648" value="K64.8 Other specified haemorrhoids"
                                                {{ isset($diagnosis_cids['K648']) && in_array('K64.8 Other specified haemorrhoids', $diagnosis_cids['K648']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13K648">
                                                K64.8 Other specified haemorrhoids
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[K649][]"
                                                id="formRadiosRight13K649" value="K64.9 Haemorrhoids, unspecified"
                                                {{ isset($diagnosis_cids['K649']) && in_array('K64.9 Haemorrhoids, unspecified', $diagnosis_cids['K649']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13K649">
                                                K64.9 Haemorrhoids, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a022][]"
                                                id="formRadiosRight13a022" value="022 Venous complications and hemorrhoids in pregnancy"
                                                {{ isset($diagnosis_cids['a022']) && in_array('022 Venous complications and hemorrhoids in pregnancy', $diagnosis_cids['a022']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a022">
                                                022 Venous complications and hemorrhoids in pregnancy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a0224][]"
                                                id="formRadiosRight13a0224" value="022.4 Haemorrhoids in pregnancy"
                                                {{ isset($diagnosis_cids['a0224']) && in_array('022.4 Haemorrhoids in pregnancy', $diagnosis_cids['a0224']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a0224">
                                                022.4 Haemorrhoids in pregnancy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a087][]"
                                                id="formRadiosRight13a087" value="087 Venous complications and hemorrhoids in the puerperium"
                                                {{ isset($diagnosis_cids['a087']) && in_array('087 Venous complications and hemorrhoids in the puerperium', $diagnosis_cids['a087']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a087">
                                                087 Venous complications and hemorrhoids in the puerperium
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="Postpartum_thyroiditis">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a0872][]"
                                                id="formRadiosRight13a0872" value="087.2 Haemorrhoids in the puerperium"
                                                {{ isset($diagnosis_cids['a0872']) && in_array('087.2 Haemorrhoids in the puerperium', $diagnosis_cids['a0872']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a0872">
                                                087.2 Haemorrhoids in the puerperium
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
                                                                if ($symptom['SymptomType'] === 'Anal bulge (self-retract)') {
                                                                   
                                                                    $disfiguringSymptoms1 = $symptom;
                                                                    // dd(gettype($disfiguringSymptoms1),'array',$disfiguringSymptoms1);
                                                                }elseif ($symptom['SymptomType'] === 'Anal bulge (persistent / assisted retraction)') {
                                                                    $disfiguringSymptoms2 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Anal bleed') {
                                                                    $disfiguringSymptoms3 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Anal pain') {
                                                                    $disfiguringSymptoms4 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Anal itching') {
                                                                    $disfiguringSymptoms5 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Constipation') {
                                                                    $disfiguringSymptoms6 = $symptom;
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
                                                        value="Anal bulge (self-retract)"
                                                        
                                                        {{ isset($disfiguringSymptoms1['SymptomType']) && $disfiguringSymptoms1['SymptomType'] === 'Anal bulge (self-retract)' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a1">
                                                        Anal bulge (self-retract)
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
                                                        name="symptoms[1][0]" id="sym_a2" value="Anal bulge (persistent / assisted retraction)"
                                                        {{ isset($disfiguringSymptoms2['SymptomType']) && $disfiguringSymptoms2['SymptomType'] == 'Anal bulge (persistent / assisted retraction)' ? 'checked' : '' }}

                                                        >
                                                    <label class="form-check-label" for="sym_a2">
                                                        Anal bulge (persistent / assisted retraction)
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
                                                        name="symptoms[2][0]" value="Anal bleed"
                                                        {{ isset($disfiguringSymptoms3['SymptomType']) && $disfiguringSymptoms3['SymptomType'] == 'Anal bleed' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a3">
                                                        Anal bleed
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
                                                        value="Anal pain"
                                                        {{ isset($disfiguringSymptoms4['SymptomType']) && $disfiguringSymptoms4['SymptomType'] == 'Anal pain' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a4">
                                                        Anal pain
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
                                                        name="symptoms[4][0]" id="sym_a5" value="Anal itching"
                                                        {{ isset($disfiguringSymptoms5['SymptomType']) && $disfiguringSymptoms5['SymptomType'] == 'Anal itching' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a5">
                                                        Anal itching
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[4][3]">{{ trim($disfiguringSymptoms5['SymptomDurationNote'] ?? '')}}</textarea>
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
                                                        value="Constipation"
                                                        {{ isset($disfiguringSymptoms6['SymptomType']) && $disfiguringSymptoms6['SymptomType'] == 'Constipation' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a6">
                                                        Constipation
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
                                            <h4>Hemarrhoids symptoms score (VSS)</h4>
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
                                                    <td>Anal bulge (self-retract)</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analbulge][]"
                                                                id="formRadiosRight14" value="0"
                                                                {{ isset($symptoms_scores['Analbulge'][0]) && $symptoms_scores['Analbulge'][0] == 0 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight14">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analbulge][]"
                                                                id="formRadiosRight15" value="1"
                                                                {{ isset($symptoms_scores['Analbulge'][0]) && $symptoms_scores['Analbulge'][0] == 1 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight15">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analbulge][]"
                                                                id="formRadiosRight16" value="3"
                                                                {{ isset($symptoms_scores['Analbulge'][0]) && $symptoms_scores['Analbulge'][0] == 3 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight16">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analbulge][]"
                                                                id="formRadiosRight17" value="5"
                                                                {{ isset($symptoms_scores['Analbulge'][0]) && $symptoms_scores['Analbulge'][0] == 5 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight17">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Anal bulge (persistent / assisted retraction)</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[retraction][]"
                                                                id="formRadiosRight18" value="0"
                                                                {{ isset($symptoms_scores['retraction'][0]) && $symptoms_scores['retraction'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight18">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[retraction][]"
                                                                id="formRadiosRight19" value="1"
                                                                {{ isset($symptoms_scores['retraction'][0]) && $symptoms_scores['retraction'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight19">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[retraction][]"
                                                                id="formRadiosRight20" value="3"
                                                                {{ isset($symptoms_scores['retraction'][0]) && $symptoms_scores['retraction'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight20">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[retraction][]"
                                                                id="formRadiosRight21" value="5"
                                                                {{ isset($symptoms_scores['retraction'][0]) && $symptoms_scores['retraction'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight21">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Anal bleed</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analbleed][]"
                                                                id="formRadiosRight22" value="0"
                                                                {{ isset($symptoms_scores['Analbleed'][0]) && $symptoms_scores['Analbleed'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight22">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analbleed][]"
                                                                id="formRadiosRight23" value="1"
                                                                {{ isset($symptoms_scores['Analbleed'][0]) && $symptoms_scores['Analbleed'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight23">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analbleed][]"
                                                                id="formRadiosRight24" value="3"
                                                                {{ isset($symptoms_scores['Analbleed'][0]) && $symptoms_scores['Analbleed'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight24">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analbleed][]"
                                                                id="formRadiosRight25" value="5"
                                                                {{ isset($symptoms_scores['Analbleed'][0]) && $symptoms_scores['Analbleed'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight25">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Anal pain</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Analpain][]"
                                                                id="formRadiosRight26" value="0"
                                                                {{ isset($symptoms_scores['Analpain'][0]) && $symptoms_scores['Analpain'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight26">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Analpain][]"
                                                                id="formRadiosRight27" value="1"
                                                                {{ isset($symptoms_scores['Analpain'][0]) && $symptoms_scores['Analpain'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight27">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Analpain][]"
                                                                id="formRadiosRight28" value="3"
                                                                {{ isset($symptoms_scores['Analpain'][0]) && $symptoms_scores['Analpain'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight28">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Analpain][]"
                                                                id="formRadiosRight29" value="5"
                                                                {{ isset($symptoms_scores['Analpain'][0]) && $symptoms_scores['Analpain'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight29">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Anal itching</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analitching][]"
                                                                id="formRadiosRight30" value="0"
                                                                {{ isset($symptoms_scores['Analitching'][0]) && $symptoms_scores['Analitching'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight30">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analitching][]"
                                                                id="formRadiosRight31" value="1"
                                                                {{ isset($symptoms_scores['Analitching'][0]) && $symptoms_scores['Analitching'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight31">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analitching][]"
                                                                id="formRadiosRight32" value="3"
                                                                {{ isset($symptoms_scores['Analitching'][0]) && $symptoms_scores['Analitching'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight32">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analitching][]"
                                                                id="formRadiosRight33" value="5"
                                                                {{ isset($symptoms_scores['Analitching'][0]) && $symptoms_scores['Analitching'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight33">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Constipation </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Constipation][]"
                                                                id="formRadiosRight341" value="0"
                                                                {{ isset($symptoms_scores['Constipation'][0]) && $symptoms_scores['Constipation'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Constipation][]"
                                                                id="formRadiosRight351" value="1"
                                                                {{ isset($symptoms_scores['Constipation'][0]) && $symptoms_scores['Constipation'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Constipation][]"
                                                                id="formRadiosRight361" value="3"
                                                                {{ isset($symptoms_scores['Constipation'][0]) && $symptoms_scores['Constipation'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Constipation][]"
                                                                id="formRadiosRight371" value="5"
                                                                {{ isset($symptoms_scores['Constipation'][0]) && $symptoms_scores['Constipation'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                
                                                
                                                
                                                
                                                
                                                
                                                @if (isset($sum))
                                                    @if ($sum >= 0 && $sum <= 10)
                                                        <tr id="mildLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Mild LUTS </th>
                                                            <th>(0-10 pts)</th>
                                                        </tr>
                                                    @elseif ($sum >= 11 && $sum <= 20)
                                                        <tr id="moderateLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Moderate LUTS </th>
                                                            <th>(11-20 pts) </th>
                                                        </tr>
                                                    @elseif ($sum >= 21 && $sum <= 1999)
                                                        <tr id="severeLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Severe LUTS </th>
                                                            <th>(21-30 pts) </th>
                                                        </tr>
                                                    @endif
                                                @endif
                                                <tr id="mildLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Mild LUTS </th>
                                                    <th>(0-10 pts)</th>
                                                </tr>
                                                <tr id="moderateLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Moderate LUTS </th>
                                                    <th>(11-20 pts) </th>
                                                </tr>
                                                <tr id="severeLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Severe LUTS </th>
                                                    <th>(21-30 pts) </th>
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
                                                <h6 class="mb-3 lut_title">Anal Fissure</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[AnalFissure][]" id="formRadiosRight42"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['AnalFissure'][0]) && $clinical_indicators['AnalFissure'][0] == 'YES' ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="formRadiosRight42">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[AnalFissure][]" id="formRadiosRight43"
                                                        value="No"
                                                        {{ isset($clinical_indicators['AnalFissure'][0]) && $clinical_indicators['AnalFissure'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight43">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Anal Discharge</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[AnalDischarge][]" id="formRadiosRight44"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['AnalDischarge'][0]) && $clinical_indicators['AnalDischarge'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[AnalDischarge][]" id="formRadiosRight45"
                                                        value="No"
                                                        {{ isset($clinical_indicators['AnalDischarge'][0]) && $clinical_indicators['AnalDischarge'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Fistula in ano</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Fistulainano][]" id="formRadiosRight44Fistulainano"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['Fistulainano'][0]) && $clinical_indicators['Fistulainano'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44Fistulainano">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Fistulainano][]" id="formRadiosRight45Fistulainano"
                                                        value="No"
                                                        {{ isset($clinical_indicators['Fistulainano'][0]) && $clinical_indicators['Fistulainano'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45Fistulainano">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Failed Prior Surgical Hemarrhoidectomy</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Hemarrhoidectomy][]" id="formRadiosRight44Hemarrhoidectomy"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['Hemarrhoidectomy'][0]) && $clinical_indicators['Hemarrhoidectomy'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44Hemarrhoidectomy">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Hemarrhoidectomy][]" id="formRadiosRight45Hemarrhoidectomy"
                                                        value="No"
                                                        {{ isset($clinical_indicators['Hemarrhoidectomy'][0]) && $clinical_indicators['Hemarrhoidectomy'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45Hemarrhoidectomy">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Failed Prior Laser Hemarrhoidectomy</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Laser][]" id="formRadiosRight44Laser"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['Laser'][0]) && $clinical_indicators['Laser'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44Laser">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Laser][]" id="formRadiosRight45Laser"
                                                        value="No"
                                                        {{ isset($clinical_indicators['Laser'][0]) && $clinical_indicators['Laser'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45Laser">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Clinical Exam <a target="_blank"  href="{{ route('user.viewHaemorrhoidsEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn">Order Now <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
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
                                        <h6 class="section_title__">Imaging <a target="_blank"  href="{{ route('user.viewHaemorrhoidsEmboEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
                                      </div>
                                      
                                      <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>USVENOUSDOPPLER70   &gt; <span class="sub_tt__"> Hemarrhoids endorectal US Protocol Findings</span></h4>
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
                                      <h6 class="mb-3 lut_title">External Hemarrhoids</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[ExternalHemarrhoids][]" value="YES" id="formRadiosRight48Dilated"
                                                    {{ isset($Imaging['ExternalHemarrhoids'][0]) && $Imaging['ExternalHemarrhoids'][0] == "YES" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRight48Dilated">
                                                    YES
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[ExternalHemarrhoids][]" value="No" id="formRadiosRight492"
                                                    {{ isset($Imaging['ExternalHemarrhoids'][0]) && $Imaging['ExternalHemarrhoids'][0] == "No" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRight492">
                                                    No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Internal Hemarrhoids</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[InternalHemarrhoids][]" value="YES" id="formRadiosRightd10Reflux"
                                                    {{ isset($Imaging['InternalHemarrhoids'][0]) && $Imaging['InternalHemarrhoids'][0] == "YES" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd10Reflux">
                                                    YES 
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[InternalHemarrhoids][]" value="No" id="formRadiosRightd11Reflux2"
                                                    {{ isset($Imaging['InternalHemarrhoids'][0]) && $Imaging['InternalHemarrhoids'][0] == "No" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd11Reflux2">
                                                    No 
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Suspicious Anal Mass</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[SuspiciousAnalMass][]" value="YES" id="formRadiosRightd12Reflux12"
                                                    {{ isset($Imaging['SuspiciousAnalMass'][0]) && $Imaging['SuspiciousAnalMass'][0] == "YES" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd12Reflux12">
                                                    YES 
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[SuspiciousAnalMass][]" value="No" id="formRadiosRightd13Reflux321"
                                                    {{ isset($Imaging['SuspiciousAnalMass'][0]) && $Imaging['SuspiciousAnalMass'][0] == "No" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd13Reflux321">
                                                    No 
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                   
          
                                    
                                            
                                            
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>MRCIR48  &gt; <span class="sub_tt__">Hemarrhoids MRI Protocol Findings</span></h4>
                                        </div>
                                    </div> 
                                    
                                   
                                    <div class="col-lg-12">
                                      <div class="row">
                                      <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Prominent SRA arteries</h6>
                                  </div>
                                  <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[ProminentSRAarteries][]" value="YES" id="formRadiosRight48DilatedSSVLEFT"
                                                  {{ isset($Imaging['ProminentSRAarteries'][0]) && $Imaging['ProminentSRAarteries'][0] == "YES" ? 'checked' : '' }}
                                                  >
                                                  <label class="form-check-label" for="formRadiosRight48DilatedSSVLEFT">
                                                  YES
                                                  </label>
                                              </div>
                                          </div>
          
                                          <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[ProminentSRAarteries][]" value="No" id="formRadiosRight492SSVLEFT1"
                                                  {{ isset($Imaging['ProminentSRAarteries'][0]) && $Imaging['ProminentSRAarteries'][0] == "No" ? 'checked' : '' }}
                                                  >
                                                  <label class="form-check-label" for="formRadiosRight492SSVLEFT1">
                                                  No
                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-12">
                                      <div class="row">
                                      <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Dilated anal veins</h6>
                                  </div>
                                  <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[Dilatedanalveins][]" value="YES" id="formRadiosRightd10RefluxSSVLEFT"
                                                  {{ isset($Imaging['Dilatedanalveins'][0]) && $Imaging['Dilatedanalveins'][0] == "YES" ? 'checked' : '' }}
                                                  >
                                                  <label class="form-check-label" for="formRadiosRightd10RefluxSSVLEFT">
                                                  YES 
                                                  </label>
                                              </div>
                                          </div>
          
                                          <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[Dilatedanalveins][]" value="No" id="formRadiosRightd11Reflux2SSVLEFT"
                                                  {{ isset($Imaging['Dilatedanalveins'][0]) && $Imaging['Dilatedanalveins'][0] == "No" ? 'checked' : '' }}
                                                  >
                                                  <label class="form-check-label" for="formRadiosRightd11Reflux2SSVLEFT">
                                                  No 
                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
          
                                  <div class="col-lg-12">
                                      <div class="row">
                                      <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">thrombosed hemorrhoids</h6>
                                  </div>
                                  <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[thrombosedhemorrhoids][]" value="YES" id="formRadiosRightd12Reflux12SSVLEFT"
                                                  {{ isset($Imaging['thrombosedhemorrhoids'][0]) && $Imaging['thrombosedhemorrhoids'][0] == "YES" ? 'checked' : '' }}
                                                  >
                                                  <label class="form-check-label" for="formRadiosRightd12Reflux12SSVLEFT">
                                                  YES 
                                                  </label>
                                              </div>
                                          </div>
          
                                          <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[thrombosedhemorrhoids][]" value="No" id="formRadiosRightd13Reflux321SSVLEFT"
                                                  {{ isset($Imaging['thrombosedhemorrhoids'][0]) && $Imaging['thrombosedhemorrhoids'][0] == "No" ? 'checked' : '' }}
                                                  >
                                                  <label class="form-check-label" for="formRadiosRightd13Reflux321SSVLEFT">
                                                  No 
                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
          
                                  <div class="col-lg-12">
                                      <div class="row">
                                      <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Congested pelvic veins</h6>
                                  </div>
                                  <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[Congestedpelvicveins][]" value="YES" id="formRadiosRightd1499SSVLEFT"
                                                  {{ isset($Imaging['Congestedpelvicveins'][0]) && $Imaging['Congestedpelvicveins'][0] == "YES" ? 'checked' : '' }}
                                                  >
                                                  <label class="form-check-label" for="formRadiosRightd1499SSVLEFT">
                                                  YES 
                                                  
                                                  </label>
                                              </div>
                                          </div>
          
                                          <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[Congestedpelvicveins][]" value="NO" id="formRadiosRightd15Reflux00SSVLEFT"
                                                  {{ isset($Imaging['Congestedpelvicveins'][0]) && $Imaging['Congestedpelvicveins'][0] == "NO" ? 'checked' : '' }}
                                                  >
                                                  <label class="form-check-label" for="formRadiosRightd15Reflux00SSVLEFT">
                                                  NO 
                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
          
                                  <div class="col-lg-12">
                                    <div class="row">
                                    <div class="col-lg-4">
                                  <h6 class="mb-3 lut_title">Suspicious ano-rectal mass</h6>
                                </div>
                                <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[Suspicious][]" value="YES" id="formRadiosRightd1499OcclusiveSSVLEFTSSVLEFT"
                                                {{ isset($Imaging['Suspicious'][0]) && $Imaging['Suspicious'][0] == "YES" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd1499OcclusiveSSVLEFTSSVLEFT">
                                                YES 
                                                
                                                </label>
                                            </div>
                                        </div>
          
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[Suspicious][]" value="NO" id="formRadiosRightd15Reflux00OcclusiveSSVLEFT"
                                                {{ isset($Imaging['Suspicious'][0]) && $Imaging['Suspicious'][0] == "NO" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd15Reflux00OcclusiveSSVLEFT">
                                                NO 
                                                </label>
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
                              <h6 class="mb-3 lut_title">Superior Hemorrhoidal arteries</h6>
                            </div>
                            <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="Imaging[SuperiorHemorrhoidalarteries][]" value="Prominent" id="formRadiosRight48DilatedGSVRIGHT"
                                            {{ isset($Imaging['SuperiorHemorrhoidalarteries'][0]) && $Imaging['SuperiorHemorrhoidalarteries'][0] == "Prominent" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="formRadiosRight48DilatedGSVRIGHT">
                                            Prominent
                                            </label>
                                        </div>
                                    </div>
          
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="Imaging[SuperiorHemorrhoidalarteries][]" value="NonProminent" id="formRadiosRight492GSVRIGHT1"
                                            {{ isset($Imaging['SuperiorHemorrhoidalarteries'][0]) && $Imaging['SuperiorHemorrhoidalarteries'][0] == "NonProminent" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="formRadiosRight492GSVRIGHT1">
                                                Non-Prominent
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                <div class="col-lg-4">
                              <h6 class="mb-3 lut_title">Middle Hemorrhoidal arteries</h6>
                            </div>
                            <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="Imaging[MiddleHemorrhoidalarteries][]" value="Prominent" id="formRadiosRightd10RefluxGSVRIGHT"
                                            {{ isset($Imaging['MiddleHemorrhoidalarteries'][0]) && $Imaging['MiddleHemorrhoidalarteries'][0] == "Prominent" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="formRadiosRightd10RefluxGSVRIGHT">
                                            Prominent 
                                            </label>
                                        </div>
                                    </div>
          
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="Imaging[MiddleHemorrhoidalarteries][]" value="NonProminent" id="formRadiosRightd11Reflux2GSVRIGHT"
                                            {{ isset($Imaging['MiddleHemorrhoidalarteries'][0]) && $Imaging['MiddleHemorrhoidalarteries'][0] == "NonProminent" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="formRadiosRightd11Reflux2GSVRIGHT">
                                                Non-Prominent 
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
          
                            <div class="col-lg-12">
                                <div class="row">
                                <div class="col-lg-4">
                              <h6 class="mb-3 lut_title">Inferior Hemorrhoidal arteries</h6>
                            </div>
                            <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="Imaging[InferiorHemorrhoidalarteries][]" value="Prominent" id="formRadiosRightd12Reflux12GSVRIGHT"
                                            {{ isset($Imaging['InferiorHemorrhoidalarteries'][0]) && $Imaging['InferiorHemorrhoidalarteries'][0] == "Prominent" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="formRadiosRightd12Reflux12GSVRIGHT">
                                            Prominent 
                                            </label>
                                        </div>
                                    </div>
          
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="Imaging[InferiorHemorrhoidalarteries][]" value="NonProminent" id="formRadiosRightd13Reflux321GSVRIGHT"
                                            {{ isset($Imaging['InferiorHemorrhoidalarteries'][0]) && $Imaging['InferiorHemorrhoidalarteries'][0] == "NonProminent" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="formRadiosRightd13Reflux321GSVRIGHT">
                                                Non-Prominent  
                                            </label>
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
                                            <img src="{{ asset('public/images/new-images/nodules.png') }}" alt="Your Image" id="image">
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
    <h6 class="section_title__">Lab <a target="_blank"  href="{{ route('user.viewHaemorrhoidsEmboEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
  </div>
    <div class="col-lg-12">
      <div class="title_head">
          <h4>LABCRCMARKERS000 &gt; <span class="sub_tt__">FERTILITY HORMONES Results</span></h4>
      </div>
    </div>
    <div class="col-lg-12 mb-3">
       <div class="row">
          <div class="col-lg-3">
          <h6 class="mb-3 lut_title">CEA</h6>
          </div>  
          <div class="col-lg-6">
              <div class="lab_test_value">
                  <select  class="tshRange" name="Lab[ESR][]">
                  <option value=""></option>
                  <option value="normal"  {{ isset($Lab['ESR'][0]) && $Lab['ESR'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                  <option value="low"  {{ isset($Lab['ESR'][0]) && $Lab['ESR'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                  <option value="high"  {{ isset($Lab['ESR'][0]) && $Lab['ESR'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                  </select>
                  <div class="result result_value {{ isset($Lab['ESR'][0]) ? $Lab['ESR'][0] : '' }} ">
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
          <h6 class="mb-3 lut_title">CA-125</h6>
          </div>  
          <div class="col-lg-6">
              <div class="lab_test_value">
                  <select  class="tshRange" name="Lab[CRP][]">
                  <option value=""></option>
                  <option value="normal" 
                  {{ isset($Lab['CRP'][0]) && $Lab['CRP'][0] == 'normal' ? 'selected' : '' }}
                  >(0.4 - 5.49 mIU/L)</option>
                  <option value="low" {{ isset($Lab['CRP'][0]) && $Lab['CRP'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                  <option value="high" {{ isset($Lab['CRP'][0]) && $Lab['CRP'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                  </select>
                  <div class="result result_value {{ isset($Lab['CRP'][0]) ? $Lab['CRP'][0]  :  '' }}">
                    {{ isset($Lab['CRP'][0]) ? $Lab['CRP'][0]  :  '' }}
                      <!-- Display low, high, and normal values here -->
                  </div>
              </div>
          </div>
          </div>
       </div>

                                            <div class="col-lg-12">
                                            <div class="title_head">
                                                <h4>HCLGIENDOSCOPY000  &gt; <span class="sub_tt__">LGI Endoscopy Findings
                                                </span></h4>
                                            </div>
                                        </div> 
                                           <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">External hemorrhoids</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[Externalhemorrhoids][]" value="YES" id="formRadiosRightd10RefluxGSVRIGHTExternalhemorrhoids"
                                                        {{ isset($Lab['Externalhemorrhoids'][0]) && $Lab['Externalhemorrhoids'][0] == "YES" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd10RefluxGSVRIGHTExternalhemorrhoids">
                                                        YES 
                                                        </label>
                                                    </div>
                                                </div>
                      
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[Externalhemorrhoids][]" value="No" id="formRadiosRightd11Reflux2GSVRIGHTExternalhemorrhoids"
                                                        {{ isset($Lab['Externalhemorrhoids'][0]) && $Lab['Externalhemorrhoids'][0] == "No" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd11Reflux2GSVRIGHTExternalhemorrhoids">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Internal hemorrhoids</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[Internalhemorrhoids][]" value="YES" id="formRadiosRightd10RefluxGSVRIGHTInternalhemorrhoids"
                                                        {{ isset($Lab['Internalhemorrhoids'][0]) && $Lab['Internalhemorrhoids'][0] == "YES" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd10RefluxGSVRIGHTInternalhemorrhoids">
                                                        YES 
                                                        </label>
                                                    </div>
                                                </div>
                      
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[Internalhemorrhoids][]" value="No" id="formRadiosRightd11Reflux2GSVRIGHTInternalhemorrhoids"
                                                        {{ isset($Lab['Internalhemorrhoids'][0]) && $Lab['Internalhemorrhoids'][0] == "No" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd11Reflux2GSVRIGHTInternalhemorrhoids">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Thrombosed hemorrhoids</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[Thrombosedhemorrhoids][]" value="YES" id="formRadiosRightd10RefluxGSVRIGHTThrombosedhemorrhoids"
                                                        {{ isset($Lab['Thrombosedhemorrhoids'][0]) && $Lab['Thrombosedhemorrhoids'][0] == "YES" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd10RefluxGSVRIGHTThrombosedhemorrhoids">
                                                        YES 
                                                        </label>
                                                    </div>
                                                </div>
                      
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[Thrombosedhemorrhoids][]" value="No" id="formRadiosRightd11Reflux2GSVRIGHTThrombosedhemorrhoids"
                                                        {{ isset($Lab['Thrombosedhemorrhoids'][0]) && $Lab['Thrombosedhemorrhoids'][0] == "No" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd11Reflux2GSVRIGHTThrombosedhemorrhoids">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Ano-rectal Bnign Polyp</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[BnignPolyp][]" value="YES" id="formRadiosRightd10RefluxGSVRIGHTBnignPolyp"
                                                        {{ isset($Lab['BnignPolyp'][0]) && $Lab['BnignPolyp'][0] == "YES" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd10RefluxGSVRIGHTBnignPolyp">
                                                        YES 
                                                        </label>
                                                    </div>
                                                </div>
                      
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[BnignPolyp][]" value="No" id="formRadiosRightd11Reflux2GSVRIGHTBnignPolyp"
                                                        {{ isset($Lab['BnignPolyp'][0]) && $Lab['BnignPolyp'][0] == "No" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd11Reflux2GSVRIGHTBnignPolyp">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Ano-rectal Malignanat Polp</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[Polp][]" value="YES" id="formRadiosRightd10RefluxGSVRIGHTPolp"
                                                        {{ isset($Lab['Polp'][0]) && $Lab['Polp'][0] == "YES" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd10RefluxGSVRIGHTPolp">
                                                        YES 
                                                        </label>
                                                    </div>
                                                </div>
                      
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[Polp][]" value="No" id="formRadiosRightd11Reflux2GSVRIGHTPolp"
                                                        {{ isset($Lab['Polp'][0]) && $Lab['Polp'][0] == "No" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd11Reflux2GSVRIGHTPolp">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Ano-rectal Malignanat tumor</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[tumor][]" value="YES" id="formRadiosRightd10RefluxGSVRIGHTtumor"
                                                        {{ isset($Lab['tumor'][0]) && $Lab['tumor'][0] == "YES" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd10RefluxGSVRIGHTtumor">
                                                        YES 
                                                        </label>
                                                    </div>
                                                </div>
                      
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[tumor][]" value="No" id="formRadiosRightd11Reflux2GSVRIGHTtumor"
                                                        {{ isset($Lab['tumor'][0]) && $Lab['tumor'][0] == "No" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd11Reflux2GSVRIGHTtumor">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Ano-rectal Ulcer</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[Ulcer][]" value="YES" id="formRadiosRightd10RefluxGSVRIGHTUlcer"
                                                        {{ isset($Lab['Ulcer'][0]) && $Lab['Ulcer'][0] == "YES" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd10RefluxGSVRIGHTUlcer">
                                                        YES 
                                                        </label>
                                                    </div>
                                                </div>
                      
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[Ulcer][]" value="No" id="formRadiosRightd11Reflux2GSVRIGHTUlcer"
                                                        {{ isset($Lab['Ulcer'][0]) && $Lab['Ulcer'][0] == "No" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd11Reflux2GSVRIGHTUlcer">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Anal fissure</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[Analfissure][]" value="YES" id="formRadiosRightd10RefluxGSVRIGHTAnalfissure"
                                                        {{ isset($Lab['Analfissure'][0]) && $Lab['Analfissure'][0] == "YES" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd10RefluxGSVRIGHTAnalfissure">
                                                        YES 
                                                        </label>
                                                    </div>
                                                </div>
                      
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[Analfissure][]" value="No" id="formRadiosRightd11Reflux2GSVRIGHTAnalfissure"
                                                        {{ isset($Lab['Analfissure'][0]) && $Lab['Analfissure'][0] == "No" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd11Reflux2GSVRIGHTAnalfissure">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                            <div class="col-lg-4">
                                          <h6 class="mb-3 lut_title">Fistula in ano</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[Fistula][]" value="YES" id="formRadiosRightd10RefluxGSVRIGHTFistula"
                                                        {{ isset($Lab['Fistula'][0]) && $Lab['Fistula'][0] == "YES" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd10RefluxGSVRIGHTFistula">
                                                        YES 
                                                        </label>
                                                    </div>
                                                </div>
                      
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input"type="radio" name="Lab[Fistula][]" value="No" id="formRadiosRightd11Reflux2GSVRIGHTFistula"
                                                        {{ isset($Lab['Fistula'][0]) && $Lab['Fistula'][0] == "No" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightd11Reflux2GSVRIGHTFistula">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    <div class="col-lg-12  mb-2">
                                        <h6 class="section_title__">Special Investigation <a href="#"
                                                data-bs-toggle="modal" data-bs-target="#refer_patient"
                                                class="order-now_btn">Reffer <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                        <div class="title_head">
                                            <h4>REQLGIENDOSCOPY5</h4>
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
                                                <h6 class="mb-3 lut_title">Lower GI endoscopy</h6>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="SpecialInvestigation[endoscopy][]"  value="Normal" id="formRadiosRightbf5"
                                                        {{ isset($SpecialInvestigations['endoscopy'][0]) && $SpecialInvestigations['endoscopy'][0] == "Normal" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightbf5">
                                                        Normal
                                                        </label>
                                                    </div>
                                                 
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="SpecialInvestigation[endoscopy][]"  value="Abnormal" id="formRadiosRightbf7"
                                                        {{ isset($SpecialInvestigations['endoscopy'][0]) && $SpecialInvestigations['endoscopy'][0] == "Abnormal" ? 'checked' : '' }}
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
                                                            <textarea  name="SpecialInvestigation[endoscopyNote][]" class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px">{{ $SpecialInvestigations['PeripheralNote'][0]  ?? '' }}</textarea>
                                                            </div>
                                                        </div>
                                                        </div>
                                                       
                                                        
                                                            
                                                    </div>
                                                 </div>
  
  
                
                                            </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">MDT <a target="_blank"  href="{{ route('user.viewHaemorrhoidsEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
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
                                                        <input class="form-check-input" type="checkbox" name="MDT[HE][]" value="HE" id="formRadiosRight84"
                                                        {{ isset($MDTs['HE'][0]) && $MDTs['HE'][0] == 'HE' ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRight84">
                                                        HE
                                                        </label>
                                                    </div>
                                                    <div  id="textarea_84">
                                                    <div class="form-check form-check-right mb-3">
                                                      <textarea class="form-control" placeholder="Enter Elaborate    HE / notes here***"  style="height: 100px" name="MDT[HENote][]">{{ $MDTs['HENote'][0] ?? '' }}</textarea>
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
                                        <h6 class="section_title__">Elegibility STATUS <a target="_blank"  href="{{ route('user.viewHaemorrhoidsEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>ElegibilitySTATUS
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
                                 
                                                <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox" name="ElegibilitySTATUS[HEMARRHOIDSEMBOLIZATION][]" value="HEMARRHOIDS EMBOLIZATION (HE)" id="formRadiosRight90"
                                                    {{ isset($ElegibilitySTATUS['HEMARRHOIDSEMBOLIZATION'][0]) && $ElegibilitySTATUS['HEMARRHOIDSEMBOLIZATION'][0] == 'HEMARRHOIDS EMBOLIZATION (HE)' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRight90">
                                                        HEMARRHOIDS EMBOLIZATION (HE)
                                                    </label>
                                                </div>
                                                <div id="textarea_90">
                                                <div class="form-check form-check-right mb-3">
                                                  <textarea class="form-control" placeholder="Enter Elaborate  HEMARRHOIDS EMBOLIZATION (HE) / notes here***"  style="height: 100px" name="ElegibilitySTATUS[HEMARRHOIDSEMBOLIZATIONNote][]">{{ $ElegibilitySTATUS['HEMARRHOIDSEMBOLIZATIONNote'][0] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            </div>
                                           
                                           
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="ElegibilitySTATUS[Others][]" value="Others" id="formRadiosRight93"
                                                    {{ isset($ElegibilitySTATUS['Others'][0]) && $ElegibilitySTATUS['Others'][0] == 'Others' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRight93">
                                                    Others
                                                    </label>
                                                </div>
                                                <div id="textarea_93">
                                                <div class="form-check form-check-right mb-3">
                                                  <textarea class="form-control" placeholder="Enter Elaborate Other options / notes here***"  style="height: 100px" name="ElegibilitySTATUS[OthersNote][]" >{{ $ElegibilitySTATUS['OthersNote'][0] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            </div>
                                         
                                           
                                         
                                       
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <h6 class="section_title__">Intervention PROCEDURE / Rx <a
                                            target="_blank"  href="{{ route('user.viewHaemorrhoidsEmboEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
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
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[ANGIOHE2910][]" value="ANGIOHE2910"
                    id="formRadiosRightb37"
                    {{ isset($Interventions['ANGIOHE2910'][0]) && $Interventions['ANGIOHE2910'][0] == 'ANGIOHE2910' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb37">
                    ANGIOHE2910
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[LABPREANGIO48][]" value="LABPREANGIO48"
                    id="formRadiosRightb38"
                    {{ isset($Interventions['LABPREANGIO48'][0]) && $Interventions['LABPREANGIO48'][0] == 'LABPREANGIO48' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb38">
                    LABPREANGIO48
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[LABPREIRSAFETY17][]" value="LABPREIRSAFETY17"
                    id="formRadiosRightb39"
                    {{ isset($Interventions['LABPREIRSAFETY17'][0]) && $Interventions['LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb39">
                    LABPREIRSAFETY17
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[IVSEDATION270][]" value="IVSEDATION270"
                    id="formRadiosRightb40"
                    {{ isset($Interventions['IVSEDATION270'][0]) && $Interventions['IVSEDATION270'][0] == 'IVSEDATION270' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40">
                    IVSEDATION270
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[USHSCLERO490][]" value="USHSCLERO490"
                    id="formRadiosRightb40USHSCLERO490"
                    {{ isset($Interventions['USHSCLERO490'][0]) && $Interventions['USHSCLERO490'][0] == 'USHSCLERO490' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40USHSCLERO490">
                    USHSCLERO490
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[LABPREIRBASIC32][]" value="LABPREIRBASIC32"
                    id="formRadiosRightb40LABPREIRBASIC32"
                    {{ isset($Interventions['LABPREIRBASIC32'][0]) && $Interventions['LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40LABPREIRBASIC32">
                    LABPREIRBASIC32
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[LABPREIRSAFETY17][]" value="LABPREIRSAFETY17"
                    id="formRadiosRightb40LABPREIRSAFETY17"
                    {{ isset($Interventions['LABPREIRSAFETY17'][0]) && $Interventions['LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40LABPREIRSAFETY17">
                    LABPREIRSAFETY17
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[USVVNTNTABL2200][]" value="USVVNTNTABL2200"
                    id="formRadiosRightb40USVVNTNTABL2200"
                    {{ isset($Interventions['USVVNTNTABL2200'][0]) && $Interventions['USVVNTNTABL2200'][0] == 'USVVNTNTABL2200' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40USVVNTNTABL2200">
                    USVVNTNTABL2200
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[LABPREIRBASIC32][]" value="LABPREIRBASIC32"
                    id="formRadiosRightb40LABPREIRBASIC32"
                    {{ isset($Interventions['LABPREIRBASIC32'][0]) && $Interventions['LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40LABPREIRBASIC32">
                    LABPREIRBASIC32
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[LABPREIRSAFETY17][]" value="LABPREIRSAFETY17"
                    id="formRadiosRightb40LABPREIRSAFETY17"
                    {{ isset($Interventions['LABPREIRSAFETY17'][0]) && $Interventions['LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40LABPREIRSAFETY17">
                    LABPREIRSAFETY17
                </label>
            </div>
        </div>
       
       
      
       
        
        
        
       
        
    </div>
</div>






                                    <div class="col-lg-12 mb-3">
                                        <h6 class="section_title__">Supportive <a target="_blank"  href="{{ route('user.viewHaemorrhoidsEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                    </div>
                                    @php
                                    if (isset($supportives) && !empty($supportives)) {
                                        $supportives = json_decode($supportives->data_value, true);

                                        $existingData = [
                                            'IVVITATHYROID175' => ['IVVITATHYROID175'],
                                            'LABPREIVBASIC52' => ['LABPREIVBASIC52'],
                                            
                                            'LABPREIVADVANCED230' => ['LABPREIVADVANCED230'],
                                            'PROZ290' => ['PROZ290'],
                                
                                        ];
                                        $filteredData = array_diff_key($supportives, $existingData);
                                    }

                                @endphp

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[IVVITATHYROID175][]" value="IVVITATHYROID175"
                                                        {{ isset($supportives['IVVITATHYROID175']) && in_array('IVVITATHYROID175', $supportives['IVVITATHYROID175']) ? 'checked' : '' }}
                                                        id="formRadiosRightb45">
                                                    <label class="form-check-label" for="formRadiosRightb45">
                                                        IVVITATHYROID175
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                    {{ isset($supportives['LABPREIVBASIC52']) && in_array('LABPREIVBASIC52', $supportives['LABPREIVBASIC52']) ? 'checked' : '' }}
                                                        name="Supportive[LABPREIVBASIC52][]" value="LABPREIVBASIC52"
                                                        id="formRadiosRightb46">
                                                    <label class="form-check-label" for="formRadiosRightb46">
                                                        LABPREIVBASIC52
                                                    </label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-3" >
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[LABPREIVADVANCED230][]"
                                                        {{ isset($supportives['LABPREIVADVANCED230']) && in_array('LABPREIVADVANCED230', $supportives['LABPREIVADVANCED230']) ? 'checked' : '' }}
                                                        value="LABPREIVADVANCED230" id="formRadiosRightb47">
                                                    <label class="form-check-label" for="formRadiosRightb47">
                                                        LABPREIVADVANCED230
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3" id="Supportive">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[PROZ290][]"
                                                        {{ isset($supportives['PROZ290']) && in_array('PROZ290', $supportives['PROZ290']) ? 'checked' : '' }}
                                                        value="PROZ290" id="formRadiosRightb47">
                                                    <label class="form-check-label" for="formRadiosRightb47">
                                                        PROZ290
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

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Referral <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#refer_patient" class="order-now_btn">Reffer <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
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
                                                        name="Referral[Lipidemacareprogram][]" value="Lipidema care program" id="formRadiosRightb48"
                                                        {{ isset($Referrals['Lipidemacareprogram'][0]) && $Referrals['Lipidemacareprogram'][0] == 'Lipidema care program' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="formRadiosRightb48">
                                                        Lipidema care program
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b48">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[LipidemacareprogramNote][]">{{ $Referrals['LipidemacareprogramNote'][0] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="Referral[PhysioTherapy][]" value="Post EVLT - Rehab/PhysioTherapy" id="formRadiosRightb49"
                                                    {{ isset($Referrals['PhysioTherapy'][0]) && $Referrals['PhysioTherapy'][0] == 'Post EVLT - Rehab/PhysioTherapy' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightb49">
                                                        Post EVLT - Rehab/PhysioTherapy
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b49">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[PhysioTherapyNote][]">{{ $Referrals['PhysioTherapyNote'][0] ?? '' }}</textarea>
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
                @if (isset($MDTs['HENote'][0]))
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
                @if (isset($Referrals['LipidemacareprogramNote'][0]) )
                $("#textarea_b48").show();
                @else
                $("#textarea_b48").hide();
                @endif
                @if ( isset($Referrals['PhysioTherapyNote'][0]) )
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

                        if (totalPoints >= 0 && totalPoints <= 10) {
                            mildLUTS.classList.remove('hidden');
                        } else if (totalPoints >= 11 && totalPoints <= 20) {
                            moderateLUTS.classList.remove('hidden');
                        } else if (totalPoints >= 21 && totalPoints <= 1035) {
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

{{--  Symptoms fields validation  --}}
<script>
    $(document).ready(function() {
        
        function validateForm() {

            // Anal bulge (self-retract) start  
            var isChecked_sym_a1 = $("#sym_a1").is(":checked");
           
            var sym_a1_durationValue = $("select[name='symptoms[0][1]']").val();
            
            var sym_a1_durationType = $("select[name='symptoms[0][2]']").val();
            var sym_a1_description = $("textarea[name='symptoms[0][3]']").val();

            if (sym_a1_durationValue !== "" || sym_a1_durationType !== "" || sym_a1_description !== "") {
               
                if(isChecked_sym_a1 ===false){
                    
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please fill out Anal bulge (self-retract) fields in Symptoms.',
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
// Anal bulge (self-retract) end  


// Anal bulge (persistent / assisted retraction) start
var isChecked_sym_a2 = $("#sym_a2").is(":checked");
           
           var sym_a2_durationValue = $("select[name='symptoms[1][1]']").val();
           
           var sym_a2_durationType = $("select[name='symptoms[1][2]']").val();
           var sym_a2_description = $("textarea[name='symptoms[1][3]']").val();

           if (sym_a2_durationValue !== "" || sym_a2_durationType !== "" || sym_a2_description !== "") {
              
               if(isChecked_sym_a2 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Anal bulge (persistent / assisted retraction) fields in Symptoms.',
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
// Anal bulge (persistent / assisted retraction) end 



// Anal bleed start
var isChecked_sym_a3 = $("#sym_a3").is(":checked");
           
           var sym_a3_durationValue = $("select[name='symptoms[2][1]']").val();
           
           var sym_a3_durationType = $("select[name='symptoms[2][2]']").val();
           var sym_a3_description = $("textarea[name='symptoms[2][3]']").val();

           if (sym_a3_durationValue !== "" || sym_a3_durationType !== "" || sym_a3_description !== "") {
              
               if(isChecked_sym_a3 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Anal bleed fields in Symptoms.',
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
// Anal bleed end 


//  Anal pain start
var isChecked_sym_a4 = $("#sym_a4").is(":checked");
           
           var sym_a4_durationValue = $("select[name='symptoms[3][1]']").val();
           
           var sym_a4_durationType = $("select[name='symptoms[3][2]']").val();
           var sym_a4_description = $("textarea[name='symptoms[3][3]']").val();

           if (sym_a4_durationValue !== "" || sym_a4_durationType !== "" || sym_a4_description !== "") {
              
               if(isChecked_sym_a4 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Anal pain fields in Symptoms.',
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
//  Anal pain end 



// Anal itching start
var isChecked_sym_a5 = $("#sym_a5").is(":checked");
           
           var sym_a5_durationValue = $("select[name='symptoms[4][1]']").val();
           
           var sym_a5_durationType = $("select[name='symptoms[4][2]']").val();
           var sym_a5_description = $("textarea[name='symptoms[4][3]']").val();

           if (sym_a5_durationValue !== "" || sym_a5_durationType !== "" || sym_a5_description !== "") {
              
               if(isChecked_sym_a5 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Anal itching fields in Symptoms.',
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
// Anal itching end 



//  Constipation start
var isChecked_sym_a6 = $("#sym_a6").is(":checked");
           
           var sym_a6_durationValue = $("select[name='symptoms[5][1]']").val();
           
           var sym_a6_durationType = $("select[name='symptoms[5][2]']").val();
           var sym_a6_description = $("textarea[name='symptoms[5][3]']").val();

           if (sym_a6_durationValue !== "" || sym_a6_durationType !== "" || sym_a6_description !== "") {
              
               if(isChecked_sym_a6 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Constipation fields in Symptoms.',
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
//  Constipation end 


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
        link.download = 'pelvicCongEmbo.png';
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
    
    
        $("#updateHaemorrhoidsEmboEligibilityForms").submit(function(event) {

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
                                url: '{{ route("user.updateHaemorrhoidsEmboEligibilityForms") }}',
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) 
                                {
                                    var patientId = response.patient_id;
                                    if(response!='')
                                    {
                                       Swal.fire({
                                                title: 'Success',
                                                text: 'Haemorrhoids Embo form updated successfully!!',
                                                icon: 'success',
                                                timer: 2000, // Display for 2 seconds
                                                timerProgressBar: true, // Show progress bar
                                                showConfirmButton: false, // Hide the OK button
                                                willClose: () => {
                                                    var redirectUrl = "{{ route('user.viewHaemorrhoidsEmboEligibilityForms', ['id' => ':id']) }}";
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

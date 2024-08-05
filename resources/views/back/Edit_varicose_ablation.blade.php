@extends('back.layout.main_view')
@push('title')
Patient | Varicose Ablation | QASTARAT & DAWALI CLINICS
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
                <form id="updateVaricoseAblationEligibilityForms" method="POST" action="{{ route('user.updateVaricoseAblationEligibilityForms') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ @$patient_id }}" />
                    <input type="hidden" name="form_type" value="VaricoseAblation" />

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
                                    @php
                                        if (isset($diagnosis_generals_db) && !empty($diagnosis_generals_db)) {
                                            $diagnosis_generals = [];

                                            foreach ($diagnosis_generals_db as $key => $value) {
                                                $decodedData = json_decode($value->data_value, true);
                                                $diagnosis_generals = array_merge($diagnosis_generals, $decodedData);
                                            }

                                            

                                            $existingData = [
                                                'VaricoseVeins' => ['Varicose Veins'],
                                                'Thrombophlebitis' => ['Thrombophlebitis'],
                                                'Venousinsufficiency' => ['Venous insufficiency'],
                                                'Reticular' => ['Reticular/ spider veins'],
                                                'Pedaledema' => ['Pedal edema'],
                                                'Venousuicer' => ['Venous uicer'],     
                                                'Lipidema' => ['Lipidema'],     
                                                'Deep' => ['Deep Vein Thrombosis'],     
                                                
                                            ];
                                            $filteredData = array_diff_key($diagnosis_generals, $existingData);
                                        }

                                    @endphp

                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[VaricoseVeins][]" id="formRadiosRight1"
                                                {{ isset($diagnosis_generals['VaricoseVeins']) && in_array('Varicose Veins', $diagnosis_generals['VaricoseVeins']) ? 'checked' : '' }}
                                                value="Varicose Veins">
                                            <label class="form-check-label" for="formRadiosRight1">
                                                Varicose Veins
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Thrombophlebitis][]" id="formRadiosRight2"
                                                {{ isset($diagnosis_generals['Thrombophlebitis']) && in_array('Thrombophlebitis', $diagnosis_generals['Thrombophlebitis']) ? 'checked' : '' }}
                                                value="Thrombophlebitis">
                                            <label class="form-check-label" for="formRadiosRight2">
                                                Thrombophlebitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Venousinsufficiency][]" id="formRadiosRight3"
                                                {{ isset($diagnosis_generals['Venousinsufficiency']) && in_array('Venous insufficiency', $diagnosis_generals['Venousinsufficiency']) ? 'checked' : '' }}
                                                value="Venous insufficiency">
                                            <label class="form-check-label" for="formRadiosRight3">
                                                Venous insufficiency
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Reticular][]" id="formRadiosRight4"
                                                {{ isset($diagnosis_generals['Reticular']) && in_array('Reticular/ spider veins', $diagnosis_generals['Reticular']) ? 'checked' : '' }}
                                                value="Reticular/ spider veins">
                                            <label class="form-check-label" for="formRadiosRight4">
                                                Reticular/ spider veins
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Pedaledema][]" id="formRadiosRight5"
                                                {{ isset($diagnosis_generals['Pedaledema']) && in_array('Pedal edema', $diagnosis_generals['Pedaledema']) ? 'checked' : '' }}
                                                value="Pedal edema">
                                            <label class="form-check-label" for="formRadiosRight5">
                                                Pedal edema
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Venousuicer][]" id="formRadiosRight4Venousuicer"
                                                {{ isset($diagnosis_generals['Venousuicer']) && in_array('Venous uicer', $diagnosis_generals['Venousuicer']) ? 'checked' : '' }}
                                                value="Venous uicer">
                                            <label class="form-check-label" for="formRadiosRight4Venousuicer">
                                                Venous uicer
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Lipidema][]" id="formRadiosRight4Lipidema"
                                                {{ isset($diagnosis_generals['Lipidema']) && in_array('Lipidema', $diagnosis_generals['Lipidema']) ? 'checked' : '' }}
                                                value="Lipidema">
                                            <label class="form-check-label" for="formRadiosRight4Lipidema">
                                                Lipidema
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="diagnosis_general_checkbox">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Deep][]" id="formRadiosRight4Deep"
                                                {{ isset($diagnosis_generals['Deep']) && in_array('Deep Vein Thrombosis', $diagnosis_generals['Deep']) ? 'checked' : '' }}
                                                value="Deep Vein Thrombosis">
                                            <label class="form-check-label" for="formRadiosRight4Deep">
                                                Deep Vein Thrombosis
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
                                                'a0220' => ['022.0 Varicose veins of lower extremity in pregnancy'],
                                                'a183' => ['183 Varicose veins of lower extremities'],
                                                'a1830' => ['183.0 Varicose veins of lower extremities with ulcer'],
                                                'a1831' => ['183.1 Varicose veins of lower extremities with inflammation'],
                                                'a1832' => ['183.2 Varicose veins of lower extremities with both ulcer and inflammation'],
                                                'a1839' => ['183.9 Varicose veins of lower extremities without ulcer or inflammation'],
                                                'a186' => ['186 Varicose veins of other sites'],
                                                'a1862' => ['186.2 Pelvic varices'],
                                                'a1863' => ['186.3 Vulval varices'],
                                                'a1872' => ['187.2 Venous insufficiency (Chronic) (Peripheral)'],
                                                'a18721' => ['R10.2 Pelvic and perineal pain']
                                                
                                               
                                            ];
                                            $filteredData = array_diff_key($diagnosis_cids, $existingData);
                                        }

                                    @endphp
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a0220][]"
                                                id="formRadiosRight8" value="022.0 Varicose veins of lower extremity in pregnancy"
                                                {{ isset($diagnosis_cids['a0220']) && in_array('022.0 Varicose veins of lower extremity in pregnancy', $diagnosis_cids['a0220']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight8">
                                                022.0 Varicose veins of lower extremity in pregnancy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a183][]"
                                                id="formRadiosRight9" value="183 Varicose veins of lower extremities"
                                                {{ isset($diagnosis_cids['a183']) && in_array('183 Varicose veins of lower extremities', $diagnosis_cids['a183']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight9">
                                                183 Varicose veins of lower extremities
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1830][]"
                                                id="formRadiosRight10" value="183.0 Varicose veins of lower extremities with ulcer"
                                                {{ isset($diagnosis_cids['a1830']) && in_array('183.0 Varicose veins of lower extremities with ulcer', $diagnosis_cids['a1830']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight10">
                                                183.0 Varicose veins of lower extremities with ulcer
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1831][]"
                                                id="formRadiosRight11a1831" value="183.1 Varicose veins of lower extremities with inflammation"
                                                {{ isset($diagnosis_cids['a1831']) && in_array('183.1 Varicose veins of lower extremities with inflammation', $diagnosis_cids['a1831']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight11a1831">
                                                183.1 Varicose veins of lower extremities with inflammation
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1832][]"
                                                id="formRadiosRight12a1832" value="183.2 Varicose veins of lower extremities with both ulcer and inflammation"
                                                {{ isset($diagnosis_cids['a1832']) && in_array('183.2 Varicose veins of lower extremities with both ulcer and inflammation', $diagnosis_cids['a1832']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight12a1832">
                                                183.2 Varicose veins of lower extremities with both ulcer and inflammation
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1839][]"
                                                id="formRadiosRight13a1839" value="183.9 Varicose veins of lower extremities without ulcer or inflammation"
                                                {{ isset($diagnosis_cids['a1839']) && in_array('183.9 Varicose veins of lower extremities without ulcer or inflammation', $diagnosis_cids['a1839']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a1839">
                                                183.9 Varicose veins of lower extremities without ulcer or inflammation
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a186][]"
                                                id="formRadiosRight13a186" value="186 Varicose veins of other sites"
                                                {{ isset($diagnosis_cids['a186']) && in_array('186 Varicose veins of other sites', $diagnosis_cids['a186']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a186">
                                                186 Varicose veins of other sites
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1862][]"
                                                id="formRadiosRight13a1862" value="186.2 Pelvic varices"
                                                {{ isset($diagnosis_cids['a1862']) && in_array('186.2 Pelvic varices', $diagnosis_cids['a1862']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a1862">
                                                186.2 Pelvic varices
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1863][]"
                                                id="formRadiosRight13a1863" value="186.3 Vulval varices"
                                                {{ isset($diagnosis_cids['a1863']) && in_array('186.3 Vulval varices', $diagnosis_cids['a1863']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a1863">
                                                186.3 Vulval varices
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1872][]"
                                                id="formRadiosRight13a1872" value="187.2 Venous insufficiency (Chronic) (Peripheral)"
                                                {{ isset($diagnosis_cids['a1872']) && in_array('187.2 Venous insufficiency (Chronic) (Peripheral)', $diagnosis_cids['a1872']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a1872">
                                                187.2 Venous insufficiency (Chronic) (Peripheral)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="Postpartum_thyroiditis">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a18721][]"
                                                id="formRadiosRight13a18721" value="R10.2 Pelvic and perineal pain"
                                                {{ isset($diagnosis_cids['a18721']) && in_array('R10.2 Pelvic and perineal pain', $diagnosis_cids['a18721']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a18721">
                                                R10.2 Pelvic and perineal pain
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
                                                                if ($symptom['SymptomType'] === 'Dilated leg veins') {
                                                                   
                                                                    $disfiguringSymptoms1 = $symptom;
                                                                    // dd(gettype($disfiguringSymptoms1),'array',$disfiguringSymptoms1);
                                                                }elseif ($symptom['SymptomType'] === 'Leg edema / swelling') {
                                                                    $disfiguringSymptoms2 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Warm legs / feet') {
                                                                    $disfiguringSymptoms3 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Leg heaviness') {
                                                                    $disfiguringSymptoms4 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Perineal varicosities') {
                                                                    $disfiguringSymptoms5 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Leg Pain / burning') {
                                                                    $disfiguringSymptoms6 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Leg pins & needles') {
                                                                    $disfiguringSymptoms7 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Leg itching') {
                                                                    $disfiguringSymptoms9 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Night cramps') {
                                                                    $disfiguringSymptoms10 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Skin pigmentation') {
                                                                    $disfiguringSymptoms11 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'General malise') {
                                                                    $disfiguringSymptoms12 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Leg Ulcers') {
                                                                    $disfiguringSymptoms13 = $symptom;
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
                                                        value="Dilated leg veins"
                                                        
                                                        {{ isset($disfiguringSymptoms1['SymptomType']) && $disfiguringSymptoms1['SymptomType'] === 'Dilated leg veins' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a1">
                                                        Dilated leg veins
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
                                                        name="symptoms[1][0]" id="sym_a2" value="Leg edema / swelling"
                                                        {{ isset($disfiguringSymptoms2['SymptomType']) && $disfiguringSymptoms2['SymptomType'] == 'Leg edema / swelling' ? 'checked' : '' }}

                                                        >
                                                    <label class="form-check-label" for="sym_a2">
                                                        Leg edema / swelling
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
                                                        name="symptoms[2][0]" value="Warm legs / feet"
                                                        {{ isset($disfiguringSymptoms3['SymptomType']) && $disfiguringSymptoms3['SymptomType'] == 'Warm legs / feet' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a3">
                                                        Warm legs / feet
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
                                                        value="Leg heaviness"
                                                        {{ isset($disfiguringSymptoms4['SymptomType']) && $disfiguringSymptoms4['SymptomType'] == 'Leg heaviness' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a4">
                                                        Leg heaviness
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
                                                        name="symptoms[4][0]" id="sym_a5" value="Perineal varicosities"
                                                        {{ isset($disfiguringSymptoms5['SymptomType']) && $disfiguringSymptoms5['SymptomType'] == 'Perineal varicosities' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a5">
                                                        Perineal varicosities
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
                                                        value="Leg Pain / burning"
                                                        {{ isset($disfiguringSymptoms6['SymptomType']) && $disfiguringSymptoms6['SymptomType'] == 'Leg Pain / burning' ? 'checked' : '' }}

                                                        >
                                                    <label class="form-check-label" for="sym_a6">
                                                        Leg Pain / burning
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
                                                        name="symptoms[6][0]" value="Leg pins & needles"
                                                        id="sym_a7"
                                                        {{ isset($disfiguringSymptoms7['SymptomType']) && $disfiguringSymptoms7['SymptomType'] == 'Leg pins & needles' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="sym_a7">
                                                        Leg pins & needles
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
                                                                {{ isset($disfiguringSymptoms7['SymptomDurationType']) &&  $disfiguringSymptoms7['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
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
                                                        name="symptoms[8][0]" id="sym_a9" value="Leg itching"
                                                        {{ isset($disfiguringSymptoms9['SymptomType']) && $disfiguringSymptoms9['SymptomType'] == 'Leg itching' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a9">
                                                        Leg itching
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
                                                        name="symptoms[9][0]" id="sym_a91" value="Night cramps"
                                                        {{ isset($disfiguringSymptoms10['SymptomType']) && $disfiguringSymptoms10['SymptomType'] == 'Night cramps' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a91">
                                                        Night cramps
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[9][3]">{{ trim($disfiguringSymptoms10['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        name="symptoms[10][0]" id="sym_a92" value="Skin pigmentation"
                                                        {{ isset($disfiguringSymptoms11['SymptomType']) && $disfiguringSymptoms11['SymptomType'] == 'Skin pigmentation' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a92">
                                                        Skin pigmentation
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
                                                        name="symptoms[11][0]" id="sym_a923" value="General malise"
                                                        {{ isset($disfiguringSymptoms12['SymptomType']) && $disfiguringSymptoms12['SymptomType'] == 'General malise' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a923">
                                                        General malise
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
                                                        name="symptoms[12][0]" id="sym_a920" value="Leg Ulcers"
                                                        {{ isset($disfiguringSymptoms13['SymptomType']) && $disfiguringSymptoms13['SymptomType'] == 'Leg Ulcers' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a920">
                                                        Leg Ulcers
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="inner_element">
                                                    <div class="mb-3 form-group">
                                                        <select class="form-control select2"
                                                            name="symptoms[12][1]">
                                                            <option value="">Duration value</option>
                                                           @for ($i = 1; $i <= 30; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ isset($disfiguringSymptoms13['SymptomDurationValue']) && $disfiguringSymptoms13['SymptomDurationValue'] == $i ? 'selected' : '' }}>
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
                                                            name="symptoms[12][2]">
                                                            <option value="">Duration Type</option>
                                                            @foreach (['Days', 'Weeks', 'Months', 'Years'] as $durationType)
                                                            <option value="{{ $durationType }}"
                                                                {{ isset($disfiguringSymptoms13['SymptomDurationType']) &&  $disfiguringSymptoms13['SymptomDurationType'] == $durationType  ? 'selected' : '' }}>
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[12][3]">{{ trim($disfiguringSymptoms13['SymptomDurationNote'] ?? '') }}</textarea>
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
                                            <h4>Varicose Veins Symptoms Score (VVSS)</h4>
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
                                                    <td>Dilated leg veins</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dilatedlegveins][]"
                                                                id="formRadiosRight14" value="0"
                                                                {{ isset($symptoms_scores['Dilatedlegveins'][0]) && $symptoms_scores['Dilatedlegveins'][0] == 0 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight14">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dilatedlegveins][]"
                                                                id="formRadiosRight15" value="1"
                                                                {{ isset($symptoms_scores['Dilatedlegveins'][0]) && $symptoms_scores['Dilatedlegveins'][0] == 1 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight15">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dilatedlegveins][]"
                                                                id="formRadiosRight16" value="3"
                                                                {{ isset($symptoms_scores['Dilatedlegveins'][0]) && $symptoms_scores['Dilatedlegveins'][0] == 3 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight16">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dilatedlegveins][]"
                                                                id="formRadiosRight17" value="5"
                                                                {{ isset($symptoms_scores['Dilatedlegveins'][0]) && $symptoms_scores['Dilatedlegveins'][0] == 5 ? 'checked' : '' }}>


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
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[swelling][]"
                                                                id="formRadiosRight18" value="0"
                                                                {{ isset($symptoms_scores['swelling'][0]) && $symptoms_scores['swelling'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight18">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[swelling][]"
                                                                id="formRadiosRight19" value="1"
                                                                {{ isset($symptoms_scores['swelling'][0]) && $symptoms_scores['swelling'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight19">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[swelling][]"
                                                                id="formRadiosRight20" value="3"
                                                                {{ isset($symptoms_scores['swelling'][0]) && $symptoms_scores['swelling'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight20">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[swelling][]"
                                                                id="formRadiosRight21" value="5"
                                                                {{ isset($symptoms_scores['swelling'][0]) && $symptoms_scores['swelling'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight21">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Warm legs / feet </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Warmlegs][]"
                                                                id="formRadiosRight22" value="0"
                                                                {{ isset($symptoms_scores['Warmlegs'][0]) && $symptoms_scores['Warmlegs'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight22">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Warmlegs][]"
                                                                id="formRadiosRight23" value="1"
                                                                {{ isset($symptoms_scores['Warmlegs'][0]) && $symptoms_scores['Warmlegs'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight23">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Warmlegs][]"
                                                                id="formRadiosRight24" value="3"
                                                                {{ isset($symptoms_scores['Warmlegs'][0]) && $symptoms_scores['Warmlegs'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight24">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Warmlegs][]"
                                                                id="formRadiosRight25" value="5"
                                                                {{ isset($symptoms_scores['Warmlegs'][0]) && $symptoms_scores['Warmlegs'][0] == 5 ? 'checked' : '' }}>
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
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Legheaviness][]"
                                                                id="formRadiosRight26" value="0"
                                                                {{ isset($symptoms_scores['Legheaviness'][0]) && $symptoms_scores['Legheaviness'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight26">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Legheaviness][]"
                                                                id="formRadiosRight27" value="1"
                                                                {{ isset($symptoms_scores['Legheaviness'][0]) && $symptoms_scores['Legheaviness'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight27">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Legheaviness][]"
                                                                id="formRadiosRight28" value="3"
                                                                {{ isset($symptoms_scores['Legheaviness'][0]) && $symptoms_scores['Legheaviness'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight28">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Legheaviness][]"
                                                                id="formRadiosRight29" value="5"
                                                                {{ isset($symptoms_scores['Legheaviness'][0]) && $symptoms_scores['Legheaviness'][0] == 5 ? 'checked' : '' }}>
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
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[burning][]"
                                                                id="formRadiosRight30" value="0"
                                                                {{ isset($symptoms_scores['burning'][0]) && $symptoms_scores['burning'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight30">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[burning][]"
                                                                id="formRadiosRight31" value="1"
                                                                {{ isset($symptoms_scores['burning'][0]) && $symptoms_scores['burning'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight31">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[burning][]"
                                                                id="formRadiosRight32" value="3"
                                                                {{ isset($symptoms_scores['burning'][0]) && $symptoms_scores['burning'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight32">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[burning][]"
                                                                id="formRadiosRight33" value="5"
                                                                {{ isset($symptoms_scores['burning'][0]) && $symptoms_scores['burning'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight33">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Leg pins & needles </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[needles][]"
                                                                id="formRadiosRight341" value="0"
                                                                {{ isset($symptoms_scores['needles'][0]) && $symptoms_scores['needles'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[needles][]"
                                                                id="formRadiosRight351" value="1"
                                                                {{ isset($symptoms_scores['needles'][0]) && $symptoms_scores['needles'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[needles][]"
                                                                id="formRadiosRight361" value="3"
                                                                {{ isset($symptoms_scores['needles'][0]) && $symptoms_scores['needles'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[needles][]"
                                                                id="formRadiosRight371" value="5"
                                                                {{ isset($symptoms_scores['needles'][0]) && $symptoms_scores['needles'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Leg itching </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Legitching][]"
                                                                id="formRadiosRight349" value="0"
                                                                {{ isset($symptoms_scores['Legitching'][0]) && $symptoms_scores['Legitching'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight349">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Legitching][]"
                                                                id="formRadiosRight358" value="1"
                                                                {{ isset($symptoms_scores['Legitching'][0]) && $symptoms_scores['Legitching'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight358">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Legitching][]"
                                                                id="formRadiosRight367" value="3"
                                                                {{ isset($symptoms_scores['Legitching'][0]) && $symptoms_scores['Legitching'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight367">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Legitching][]"
                                                                id="formRadiosRight376" value="5"
                                                                {{ isset($symptoms_scores['Legitching'][0]) && $symptoms_scores['Legitching'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight376">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Night cramps </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Nightcramps][]"
                                                                id="formRadiosRight345" value="0"
                                                                {{ isset($symptoms_scores['Nightcramps'][0]) && $symptoms_scores['Nightcramps'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight345">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Nightcramps][]"
                                                                id="formRadiosRight354" value="1"
                                                                {{ isset($symptoms_scores['Nightcramps'][0]) && $symptoms_scores['Nightcramps'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight354">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Nightcramps][]"
                                                                id="formRadiosRight363" value="3"
                                                                {{ isset($symptoms_scores['Nightcramps'][0]) && $symptoms_scores['Nightcramps'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight363">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Nightcramps][]"
                                                                id="formRadiosRight372" value="5"
                                                                {{ isset($symptoms_scores['Nightcramps'][0]) && $symptoms_scores['Nightcramps'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight372">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Skin pigmentation </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Skinpigmentation][]"
                                                                id="formRadiosRight3412" value="0"
                                                                {{ isset($symptoms_scores['Skinpigmentation'][0]) && $symptoms_scores['Skinpigmentation'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight3412">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Skinpigmentation][]"
                                                                id="formRadiosRight35123" value="1"
                                                                {{ isset($symptoms_scores['Skinpigmentation'][0]) && $symptoms_scores['Skinpigmentation'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight35123">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Skinpigmentation][]"
                                                                id="formRadiosRight361234" value="3"
                                                                {{ isset($symptoms_scores['Skinpigmentation'][0]) && $symptoms_scores['Skinpigmentation'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361234">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Skinpigmentation][]"
                                                                id="formRadiosRight3712345" value="5"
                                                                {{ isset($symptoms_scores['Skinpigmentation'][0]) && $symptoms_scores['Skinpigmentation'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight3712345">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>General malise</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Generalmalise][]"
                                                                id="formRadiosRight34123456" value="0"
                                                                {{ isset($symptoms_scores['Generalmalise'][0]) && $symptoms_scores['Generalmalise'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight34123456">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Generalmalise][]"
                                                                id="formRadiosRight341234567" value="1"
                                                                {{ isset($symptoms_scores['Generalmalise'][0]) && $symptoms_scores['Generalmalise'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341234567">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Generalmalise][]"
                                                                id="formRadiosRight3412345678" value="3"
                                                                {{ isset($symptoms_scores['Generalmalise'][0]) && $symptoms_scores['Generalmalise'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight3412345678">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Generalmalise][]"
                                                                id="formRadiosRight3412345679" value="5"
                                                                {{ isset($symptoms_scores['Generalmalise'][0]) && $symptoms_scores['Generalmalise'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight3412345679">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Leg Ulcers</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[LegUlcers][]"
                                                                id="formRadiosRight34123456LegUlcers" value="0"
                                                                {{ isset($symptoms_scores['LegUlcers'][0]) && $symptoms_scores['LegUlcers'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight34123456LegUlcers">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[LegUlcers][]"
                                                                id="formRadiosRight341234567LegUlcers" value="1"
                                                                {{ isset($symptoms_scores['LegUlcers'][0]) && $symptoms_scores['LegUlcers'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341234567LegUlcers">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[LegUlcers][]"
                                                                id="formRadiosRight3412345678LegUlcers" value="3"
                                                                {{ isset($symptoms_scores['LegUlcers'][0]) && $symptoms_scores['LegUlcers'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight3412345678LegUlcers">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[LegUlcers][]"
                                                                id="formRadiosRight3412345679LegUlcers" value="5"
                                                                {{ isset($symptoms_scores['LegUlcers'][0]) && $symptoms_scores['LegUlcers'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight3412345679LegUlcers">
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
                                                    @elseif ($sum >= 16 && $sum <= 39)
                                                        <tr id="moderateLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Moderate LUTS </th>
                                                            <th>(16-39 pts) </th>
                                                        </tr>
                                                    @elseif ($sum >= 40 && $sum <= 1999)
                                                        <tr id="severeLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Severe LUTS </th>
                                                            <th>(40-55 pts) </th>
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
                                                    <th>(16-39 pts) </th>
                                                </tr>
                                                <tr id="severeLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Severe LUTS </th>
                                                    <th>(40-55 pts) </th>
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
                                                <h6 class="mb-3 lut_title">lower extremity Phlepitis</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[lowerextremityPhlepitis][]" id="formRadiosRight42"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['lowerextremityPhlepitis'][0]) && $clinical_indicators['lowerextremityPhlepitis'][0] == 'YES' ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="formRadiosRight42">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[lowerextremityPhlepitis][]" id="formRadiosRight43"
                                                        value="No"
                                                        {{ isset($clinical_indicators['lowerextremityPhlepitis'][0]) && $clinical_indicators['lowerextremityPhlepitis'][0] == 'No' ? 'checked' : '' }}>
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
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[lowerextremityDVT][]" id="formRadiosRight44"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['lowerextremityDVT'][0]) && $clinical_indicators['lowerextremityDVT'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[lowerextremityDVT][]" id="formRadiosRight45"
                                                        value="No"
                                                        {{ isset($clinical_indicators['lowerextremityDVT'][0]) && $clinical_indicators['lowerextremityDVT'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">lower extremity DVT (CHRONIC)</</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[lowerextremityDVTCHRONIC][]" id="formRadiosRight44lowerextremityDVTCHRONIC"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['lowerextremityDVTCHRONIC'][0]) && $clinical_indicators['lowerextremityDVTCHRONIC'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44lowerextremityDVTCHRONIC">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[lowerextremityDVTCHRONIC][]" id="formRadiosRight45lowerextremityDVTCHRONIC"
                                                        value="No"
                                                        {{ isset($clinical_indicators['lowerextremityDVTCHRONIC'][0]) && $clinical_indicators['lowerextremityDVTCHRONIC'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45lowerextremityDVTCHRONIC">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Clinical Exam <a target="_blank"  href="{{ route('user.viewVaricoseAblationEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                        <h6 class="section_title__">Imaging <a target="_blank"  href="{{ route('user.viewVaricoseAblationEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
                                      </div>
                                      
                                      <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>USVENOUSDOPPLER70   &gt; <span class="sub_tt__"> Great Saphenous Vein (GSV) - LEFT</span></h4>
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
                                      <h6 class="mb-3 lut_title">Dilated</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70DilatedGSVLEFT][]" value="YES" id="formRadiosRight48Dilated"
                                                    {{ isset($Imaging['USVENOUSDOPPLER70DilatedGSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70DilatedGSVLEFT'][0] == "YES" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRight48Dilated">
                                                    YES
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70DilatedGSVLEFT][]" value="No" id="formRadiosRight492"
                                                    {{ isset($Imaging['USVENOUSDOPPLER70DilatedGSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70DilatedGSVLEFT'][0] == "No" ? 'checked' : '' }}
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
                                      <h6 class="mb-3 lut_title">Reflux +</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70RefluxGSVLEFT][]" value="YES" id="formRadiosRightd10Reflux"
                                                    {{ isset($Imaging['USVENOUSDOPPLER70RefluxGSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70RefluxGSVLEFT'][0] == "YES" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd10Reflux">
                                                    YES 
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70RefluxGSVLEFT][]" value="No" id="formRadiosRightd11Reflux2"
                                                    {{ isset($Imaging['USVENOUSDOPPLER70RefluxGSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70RefluxGSVLEFT'][0] == "No" ? 'checked' : '' }}
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
                                      <h6 class="mb-3 lut_title">Reflux ++</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux2GSVLEFT][]" value="YES" id="formRadiosRightd12Reflux12"
                                                    {{ isset($Imaging['USVENOUSDOPPLER70Reflux2GSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux2GSVLEFT'][0] == "YES" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd12Reflux12">
                                                    YES 
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux2GSVLEFT][]" value="No" id="formRadiosRightd13Reflux321"
                                                    {{ isset($Imaging['USVENOUSDOPPLER70Reflux2GSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux2GSVLEFT'][0] == "No" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd13Reflux321">
                                                    No 
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
                                                    <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux3GSVLEFT][]" value="YES" id="formRadiosRightd1499"
                                                    {{ isset($Imaging['USVENOUSDOPPLER70Reflux3GSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux3GSVLEFT'][0] == "YES" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd1499">
                                                    YES 
                                                    
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux3GSVLEFT][]" value="NO" id="formRadiosRightd15Reflux00"
                                                    {{ isset($Imaging['USVENOUSDOPPLER70Reflux3GSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux3GSVLEFT'][0] == "NO" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd15Reflux00">
                                                    NO 
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
          
                                    <div class="col-lg-12">
                                      <div class="row">
                                      <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Occlusive / partial thrombosis</h6>
                                  </div>
                                  <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70OcclusiveGSVLEFT][]" value="YES" id="formRadiosRightd1499Occlusive"
                                                  {{ isset($Imaging['USVENOUSDOPPLER70OcclusiveGSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70OcclusiveGSVLEFT'][0] == "YES" ? 'checked' : '' }}
                                                  >
                                                  <label class="form-check-label" for="formRadiosRightd1499Occlusive">
                                                  YES 
                                                  
                                                  </label>
                                              </div>
                                          </div>
          
                                          <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70OcclusiveGSVLEFT][]" value="NO" id="formRadiosRightd15Reflux00Occlusive"
                                                  {{ isset($Imaging['USVENOUSDOPPLER70OcclusiveGSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70OcclusiveGSVLEFT'][0] == "NO" ? 'checked' : '' }}
                                                  >
                                                  <label class="form-check-label" for="formRadiosRightd15Reflux00Occlusive">
                                                  NO 
                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                            
                                            
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>USVENOUSDOPPLER70  &gt; <span class="sub_tt__">Short Saphenous Vein (SSV) - LEFT </span></h4>
                                        </div>
                                    </div> 
                                    
                                   
                                    <div class="col-lg-12">
                                      <div class="row">
                                      <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Dilated</h6>
                                  </div>
                                  <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70DilatedSSVLEFT][]" value="YES" id="formRadiosRight48DilatedSSVLEFT"
                                                  {{ isset($Imaging['USVENOUSDOPPLER70DilatedSSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70DilatedSSVLEFT'][0] == "YES" ? 'checked' : '' }}
                                                  >
                                                  <label class="form-check-label" for="formRadiosRight48DilatedSSVLEFT">
                                                  YES
                                                  </label>
                                              </div>
                                          </div>
          
                                          <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70DilatedSSVLEFT][]" value="No" id="formRadiosRight492SSVLEFT1"
                                                  {{ isset($Imaging['USVENOUSDOPPLER70DilatedSSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70DilatedSSVLEFT'][0] == "No" ? 'checked' : '' }}
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
                                    <h6 class="mb-3 lut_title">Reflux +</h6>
                                  </div>
                                  <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70RefluxSSVLEFT][]" value="YES" id="formRadiosRightd10RefluxSSVLEFT"
                                                  {{ isset($Imaging['USVENOUSDOPPLER70RefluxSSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70RefluxSSVLEFT'][0] == "YES" ? 'checked' : '' }}
                                                  >
                                                  <label class="form-check-label" for="formRadiosRightd10RefluxSSVLEFT">
                                                  YES 
                                                  </label>
                                              </div>
                                          </div>
          
                                          <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70RefluxSSVLEFT][]" value="No" id="formRadiosRightd11Reflux2SSVLEFT"
                                                  {{ isset($Imaging['USVENOUSDOPPLER70RefluxSSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70RefluxSSVLEFT'][0] == "No" ? 'checked' : '' }}
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
                                    <h6 class="mb-3 lut_title">Reflux ++</h6>
                                  </div>
                                  <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux2SSVLEFT][]" value="YES" id="formRadiosRightd12Reflux12SSVLEFT"
                                                  {{ isset($Imaging['USVENOUSDOPPLER70Reflux2SSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux2SSVLEFT'][0] == "YES" ? 'checked' : '' }}
                                                  >
                                                  <label class="form-check-label" for="formRadiosRightd12Reflux12SSVLEFT">
                                                  YES 
                                                  </label>
                                              </div>
                                          </div>
          
                                          <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux2SSVLEFT][]" value="No" id="formRadiosRightd13Reflux321SSVLEFT"
                                                  {{ isset($Imaging['USVENOUSDOPPLER70Reflux2SSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux2SSVLEFT'][0] == "No" ? 'checked' : '' }}
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
                                    <h6 class="mb-3 lut_title">Reflux +++</h6>
                                  </div>
                                  <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux3SSVLEFT][]" value="YES" id="formRadiosRightd1499SSVLEFT"
                                                  {{ isset($Imaging['USVENOUSDOPPLER70Reflux3SSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux3SSVLEFT'][0] == "YES" ? 'checked' : '' }}
                                                  >
                                                  <label class="form-check-label" for="formRadiosRightd1499SSVLEFT">
                                                  YES 
                                                  
                                                  </label>
                                              </div>
                                          </div>
          
                                          <div class="col-lg-4">
                                              <div class="form-check form-check-right mb-3">
                                                  <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux3SSVLEFT][]" value="NO" id="formRadiosRightd15Reflux00SSVLEFT"
                                                  {{ isset($Imaging['USVENOUSDOPPLER70Reflux3SSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux3SSVLEFT'][0] == "NO" ? 'checked' : '' }}
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
                                  <h6 class="mb-3 lut_title">Occlusive / partial thrombosis</h6>
                                </div>
                                <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70OcclusiveSSVLEFTSSVLEFT][]" value="YES" id="formRadiosRightd1499OcclusiveSSVLEFTSSVLEFT"
                                                {{ isset($Imaging['USVENOUSDOPPLER70OcclusiveSSVLEFTSSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70OcclusiveSSVLEFTSSVLEFT'][0] == "YES" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd1499OcclusiveSSVLEFTSSVLEFT">
                                                YES 
                                                
                                                </label>
                                            </div>
                                        </div>
          
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70OcclusiveSSVLEFTSSVLEFT][]" value="NO" id="formRadiosRightd15Reflux00OcclusiveSSVLEFT"
                                                {{ isset($Imaging['USVENOUSDOPPLER70OcclusiveSSVLEFTSSVLEFT'][0]) && $Imaging['USVENOUSDOPPLER70OcclusiveSSVLEFTSSVLEFT'][0] == "NO" ? 'checked' : '' }}
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
                                      <h4>USVENOUSDOPPLER70  &gt; <span class="sub_tt__">Great Saphenous Vein (GSV) - RIGHT
                                      </span></h4>
                                  </div>
                              </div> 
                              
                             
                              <div class="col-lg-12">
                                <div class="row">
                                <div class="col-lg-4">
                              <h6 class="mb-3 lut_title">Dilated</h6>
                            </div>
                            <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70DilatedGSVRIGHT][]" value="YES" id="formRadiosRight48DilatedGSVRIGHT"
                                            {{ isset($Imaging['USVENOUSDOPPLER70DilatedGSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70DilatedGSVRIGHT'][0] == "YES" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="formRadiosRight48DilatedGSVRIGHT">
                                            YES
                                            </label>
                                        </div>
                                    </div>
          
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70DilatedGSVRIGHT][]" value="No" id="formRadiosRight492GSVRIGHT1"
                                            {{ isset($Imaging['USVENOUSDOPPLER70DilatedGSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70DilatedGSVRIGHT'][0] == "No" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="formRadiosRight492GSVRIGHT1">
                                            No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                <div class="col-lg-4">
                              <h6 class="mb-3 lut_title">Reflux +</h6>
                            </div>
                            <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70RefluxGSVRIGHT][]" value="YES" id="formRadiosRightd10RefluxGSVRIGHT"
                                            {{ isset($Imaging['USVENOUSDOPPLER70RefluxGSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70RefluxGSVRIGHT'][0] == "YES" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="formRadiosRightd10RefluxGSVRIGHT">
                                            YES 
                                            </label>
                                        </div>
                                    </div>
          
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70RefluxGSVRIGHT][]" value="No" id="formRadiosRightd11Reflux2GSVRIGHT"
                                            {{ isset($Imaging['USVENOUSDOPPLER70RefluxGSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70RefluxGSVRIGHT'][0] == "No" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="formRadiosRightd11Reflux2GSVRIGHT">
                                            No 
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
                                            <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux2GSVRIGHT][]" value="YES" id="formRadiosRightd12Reflux12GSVRIGHT"
                                            {{ isset($Imaging['USVENOUSDOPPLER70Reflux2GSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux2GSVRIGHT'][0] == "YES" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="formRadiosRightd12Reflux12GSVRIGHT">
                                            YES 
                                            </label>
                                        </div>
                                    </div>
          
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux2GSVRIGHT][]" value="No" id="formRadiosRightd13Reflux321GSVRIGHT"
                                            {{ isset($Imaging['USVENOUSDOPPLER70Reflux2GSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux2GSVRIGHT'][0] == "No" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="formRadiosRightd13Reflux321GSVRIGHT">
                                            No 
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
                                            <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux3GSVRIGHT][]" value="YES" id="formRadiosRightd1499GSVRIGHT"
                                            {{ isset($Imaging['USVENOUSDOPPLER70Reflux3GSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux3GSVRIGHT'][0] == "YES" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="formRadiosRightd1499GSVRIGHT">
                                            YES 
                                            
                                            </label>
                                        </div>
                                    </div>
          
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux3GSVRIGHT][]" value="NO" id="formRadiosRightd15Reflux00GSVRIGHT"
                                            {{ isset($Imaging['USVENOUSDOPPLER70Reflux3GSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux3GSVRIGHT'][0] == "NO" ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="formRadiosRightd15Reflux00GSVRIGHT">
                                            NO 
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
          
                            <div class="col-lg-12">
                              <div class="row">
                              <div class="col-lg-4">
                            <h6 class="mb-3 lut_title">Occlusive / partial thrombosis</h6>
                          </div>
                          <div class="col-lg-4">
                                      <div class="form-check form-check-right mb-3">
                                          <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70OcclusiveGSVRIGH][]" value="YES" id="formRadiosRightd1499OcclusiveGSVRIGH"
                                          {{ isset($Imaging['USVENOUSDOPPLER70OcclusiveGSVRIGH'][0]) && $Imaging['USVENOUSDOPPLER70OcclusiveGSVRIGH'][0] == "YES" ? 'checked' : '' }}
                                          >
                                          <label class="form-check-label" for="formRadiosRightd1499OcclusiveGSVRIGH">
                                          YES 
                                          
                                          </label>
                                      </div>
                                  </div>
          
                                  <div class="col-lg-4">
                                      <div class="form-check form-check-right mb-3">
                                          <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70OcclusiveGSVRIGH][]" value="NO" id="formRadiosRightd15Reflux00OcclusiveSSVLEFTGSVRIGH"
                                          {{ isset($Imaging['USVENOUSDOPPLER70OcclusiveGSVRIGH'][0]) && $Imaging['USVENOUSDOPPLER70OcclusiveGSVRIGH'][0] == "NO" ? 'checked' : '' }}
                                          >
                                          <label class="form-check-label" for="formRadiosRightd15Reflux00OcclusiveSSVLEFTGSVRIGH">
                                          NO 
                                          </label>
                                      </div>
                                  </div>
                              </div>
                          </div>
          
                          <div class="col-lg-12">
                              <div class="title_head">
                                  <h4>USVENOUSDOPPLER70  &gt; <span class="sub_tt__">Short Saphenous Vein (SSV) - RIGHT
                                  </span></h4>
                              </div>
                          </div> 
                          
                         
                          <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Dilated</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70DilatedSSVRIGHT][]" value="YES" id="formRadiosRight48DilatedSSVRIGHT"
                                        {{ isset($Imaging['USVENOUSDOPPLER70DilatedSSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70DilatedSSVRIGHT'][0] == "YES" ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="formRadiosRight48DilatedSSVRIGHT">
                                        YES
                                        </label>
                                    </div>
                                </div>
          
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70DilatedSSVRIGHT][]" value="No" id="formRadiosRight492SSVRIGHT1"
                                        {{ isset($Imaging['USVENOUSDOPPLER70DilatedSSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70DilatedSSVRIGHT'][0] == "No" ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="formRadiosRight492SSVRIGHT1">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                            <div class="col-lg-4">
                          <h6 class="mb-3 lut_title">Reflux +</h6>
                        </div>
                        <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70RefluxSSVRIGHT][]" value="YES" id="formRadiosRightd10RefluxSSVRIGHT"
                                        {{ isset($Imaging['USVENOUSDOPPLER70RefluxSSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70RefluxSSVRIGHT'][0] == "YES" ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="formRadiosRightd10RefluxSSVRIGHT">
                                        YES 
                                        </label>
                                    </div>
                                </div>
          
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70RefluxSSVRIGHT][]" value="No" id="formRadiosRightd11Reflux2SSVRIGHT"
                                        {{ isset($Imaging['USVENOUSDOPPLER70RefluxSSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70RefluxSSVRIGHT'][0] == "No" ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="formRadiosRightd11Reflux2SSVRIGHT">
                                        No 
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
                                        <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux2SSVRIGHT][]" value="YES" id="formRadiosRightd12Reflux12SSVRIGHT"
                                        {{ isset($Imaging['USVENOUSDOPPLER70Reflux2SSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux2SSVRIGHT'][0] == "YES" ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="formRadiosRightd12Reflux12SSVRIGHT">
                                        YES 
                                        </label>
                                    </div>
                                </div>
          
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux2SSVRIGHT][]" value="No" id="formRadiosRightd13Reflux321SSVRIGHT"
                                        {{ isset($Imaging['USVENOUSDOPPLER70Reflux2SSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux2SSVRIGHT'][0] == "No" ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="formRadiosRightd13Reflux321SSVRIGHT">
                                        No 
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
                                        <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux3SSVRIGHT][]" value="YES" id="formRadiosRightd1499SSVRIGHT"
                                        {{ isset($Imaging['USVENOUSDOPPLER70Reflux3SSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux3SSVRIGHT'][0] == "YES" ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="formRadiosRightd1499SSVRIGHT">
                                        YES 
                                        
                                        </label>
                                    </div>
                                </div>
          
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70Reflux3SSVRIGHT][]" value="NO" id="formRadiosRightd15Reflux00SSVRIGHT"
                                        {{ isset($Imaging['USVENOUSDOPPLER70Reflux3SSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70Reflux3SSVRIGHT'][0] == "NO" ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="formRadiosRightd15Reflux00SSVRIGHT">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
          
                        <div class="col-lg-12">
                          <div class="row">
                          <div class="col-lg-4">
                        <h6 class="mb-3 lut_title">Occlusive / partial thrombosis</h6>
                      </div>
                      <div class="col-lg-4">
                                  <div class="form-check form-check-right mb-3">
                                      <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70OcclusiveSSVRIGHT][]" value="YES" id="formRadiosRightd1499OcclusiveSSVRIGHT"
                                      {{ isset($Imaging['USVENOUSDOPPLER70OcclusiveSSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70OcclusiveSSVRIGHT'][0] == "YES" ? 'checked' : '' }}
                                      >
                                      <label class="form-check-label" for="formRadiosRightd1499OcclusiveSSVRIGHT">
                                      YES 
                                      
                                      </label>
                                  </div>
                              </div>
          
                              <div class="col-lg-4">
                                  <div class="form-check form-check-right mb-3">
                                      <input class="form-check-input"type="radio" name="Imaging[USVENOUSDOPPLER70OcclusiveSSVRIGHT][]" value="NO" id="formRadiosRightd15Reflux00OcclusiveSSVRIGHT"
                                      {{ isset($Imaging['USVENOUSDOPPLER70OcclusiveSSVRIGHT'][0]) && $Imaging['USVENOUSDOPPLER70OcclusiveSSVRIGHT'][0] == "NO" ? 'checked' : '' }}
                                      >
                                      <label class="form-check-label" for="formRadiosRightd15Reflux00OcclusiveSSVRIGHT">
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
                                  <input class="form-check-input" type="radio" name="Imaging[MRCIR48][]" value="Normal" id="formRadiosRight64"
                                  {{ isset($Imaging['MRCIR48'][0]) && $Imaging['MRCIR48'][0] == "Normal" ? 'checked' : '' }}
                                  >
                                  <label class="form-check-label" for="formRadiosRight64">
                                  Normal
                                  </label>
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-check form-check-right mb-3">
                                  <input class="form-check-input" type="radio" name="Imaging[MRCIR48][]" value="Abnormal" id="formRadiosRight65"
                                  {{ isset($Imaging['MRCIR48'][0]) && $Imaging['MRCIR48'][0] == "Abnormal" ? 'checked' : '' }}
                                  >
                                  <label class="form-check-label" for="formRadiosRight651">
                                  Abnormal
                                  </label>
                              </div>
                          </div>
                          <div class="col-lg-12" id="textarea_651">
                          <div class="mb-3 form-group">
                              <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
                              <textarea class="form-control" placeholder=""  style="height: 100px" name="Imaging[MRCIR48Note][]">{{ $Imaging['MRCIR48Note'][0] ?? '' }}</textarea>
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
                                  <input class="form-check-input" type="radio" name="Imaging[CTCIR48][]" value="Normal" id="formRadiosRighte35"
                                  {{ isset($Imaging['CTCIR48'][0]) && $Imaging['CTCIR48'][0] == "Normal" ? 'checked' : '' }}
                                  >
                                  <label class="form-check-label" for="formRadiosRighte35">
                                  Normal
                                  </label>
                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-check form-check-right mb-3">
                                  <input class="form-check-input" type="radio" name="Imaging[CTCIR48][]" value="Abnormal" id="formRadiosRighte36"
                                  {{ isset($Imaging['CTCIR48'][0]) && $Imaging['CTCIR48'][0] == "Abnormal" ? 'checked' : '' }}
                                  >
                                  <label class="form-check-label" for="formRadiosRighte36">
                                  Abnormal
                                  </label>
                              </div>
                          </div>
                          <div class="col-lg-12" id="textarea_e36">
                          <div class="mb-3 form-group">
                              <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
                              <textarea class="form-control" placeholder=""  style="height: 100px" name="Imaging[CTCIR48Note][]">{{ $Imaging['CTCIR48Note'][0] ?? '' }}</textarea>
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
    <h6 class="section_title__">Lab <a target="_blank"  href="{{ route('user.viewVaricoseAblationEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
  </div>
    <div class="col-lg-12">
      <div class="title_head">
          <h4>LABABACUTEINFLAME000 &gt; <span class="sub_tt__">Acute inflammation Results</span></h4>
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
          <h6 class="mb-3 lut_title">CRP</h6>
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



                                    <div class="col-lg-12  mb-2">
                                        <h6 class="section_title__">Special Investigation <a href="#"
                                                data-bs-toggle="modal" data-bs-target="#refer_patient"
                                                class="order-now_btn">Reffer <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
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
                                        <h6 class="section_title__">MDT <a target="_blank"  href="{{ route('user.viewVaricoseAblationEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>MDTREVIEW00  &#62; <span class="sub_tt__"> Varicose Veins MDT outcome</span></h4>
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
                                                        <input class="form-check-input" type="checkbox" name="MDT[VVA][]" value="Thermal VVA" id="formRadiosRight84"
                                                        {{ isset($MDTs['VVA'][0]) && $MDTs['VVA'][0] == 'Thermal VVA' ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRight84">
                                                        Thermal VVA
                                                        </label>
                                                    </div>
                                                    <div  id="textarea_84">
                                                    <div class="form-check form-check-right mb-3">
                                                      <textarea class="form-control" placeholder="Enter Elaborate   Thermal VVA / notes here***"  style="height: 100px" name="MDT[VVANote][]">{{ $MDTs['VVANote'][0] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="checkbox" name="MDT[Ablation][]" value="NTNT VVA Ablation"  id="formRadiosRight85"
                                                        {{ isset($MDTs['Ablation'][0]) && $MDTs['Ablation'][0] == 'NTNT VVA Ablation' ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRight85">
                                                        NTNT VVA Ablation
                                                        </label>
                                                    </div>
                                                    <div  id="textarea_85">
                                                    <div class="form-check form-check-right mb-3">
                                                      <textarea class="form-control" placeholder="Enter Elaborate NTNT VVA Ablation / notes here***"  style="height: 100px" name="MDT[AblationNote][]">{{ $MDTs['AblationNote'][0] ?? '' }}</textarea>
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
                                        <h6 class="section_title__">Elegibility STATUS <a target="_blank"  href="{{ route('user.viewVaricoseAblationEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                                    <input class="form-check-input" type="checkbox" name="ElegibilitySTATUS[VVThermalAblation][]" value="VV Thermal Ablation" id="formRadiosRight90"
                                                    {{ isset($ElegibilitySTATUS['VVThermalAblation'][0]) && $ElegibilitySTATUS['VVThermalAblation'][0] == 'VV Thermal Ablation' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRight90">
                                                    VV Thermal Ablation
                                                    </label>
                                                </div>
                                                <div id="textarea_90">
                                                <div class="form-check form-check-right mb-3">
                                                  <textarea class="form-control" placeholder="Enter Elaborate  VV Thermal Ablation / notes here***"  style="height: 100px" name="ElegibilitySTATUS[VVThermalAblationNote][]">{{ $ElegibilitySTATUS['VVThermalAblationNote'][0] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox" name="ElegibilitySTATUS[VVNTNTAblation][]" value="VV NTNT Ablation" id="formRadiosRight91"
                                                    {{ isset($ElegibilitySTATUS['VVNTNTAblation'][0]) && $ElegibilitySTATUS['VVNTNTAblation'][0] == 'VV NTNT Ablation' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRight91">
                                                    VV NTNT Ablation
                                                    </label>
                                                </div>
                                                <div id="textarea_91">
                                                <div class="form-check form-check-right mb-3">
                                                  <textarea class="form-control" placeholder="Enter Elaborate VV NTNT Ablation / notes here***"  style="height: 100px" name="ElegibilitySTATUS[VVNTNTAblationNote][]">{{ $ElegibilitySTATUS['VVNTNTAblationNote'][0] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox" name="ElegibilitySTATUS[FoamSclerotherapy][]" value="Foam Sclerotherapy" id="formRadiosRight92"
                                                    {{ isset($ElegibilitySTATUS['FoamSclerotherapy'][0]) && $ElegibilitySTATUS['FoamSclerotherapy'][0] == 'Foam Sclerotherapy' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRight92">
                                                    Foam Sclerotherapy
                                                    </label>
                                                </div>
                                                <div id="textarea_92">
                                                <div class="form-check form-check-right mb-3">
                                                  <textarea class="form-control" placeholder="Enter Elaborate  Foam Sclerotherapy / notes here***"  style="height: 100px" name="ElegibilitySTATUS[FoamSclerotherapyNote][]">{{ $ElegibilitySTATUS['FoamSclerotherapyNote'][0] ?? '' }}</textarea>
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
                                            target="_blank"  href="{{ route('user.viewVaricoseAblationEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i
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
                    name="Intervention[ANGIOVE1780][]" value="ANGIOVE1780"
                    id="formRadiosRightb37"
                    {{ isset($Interventions['ANGIOVE1780'][0]) && $Interventions['ANGIOVE1780'][0] == 'ANGIOVE1780' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb37">
                    ANGIOVE1780
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[USVVTABL1870][]" value="USVVTABL1870"
                    id="formRadiosRightb38"
                    {{ isset($Interventions['USVVTABL1870'][0]) && $Interventions['USVVTABL1870'][0] == 'USVVTABL1870' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb38">
                    USVVTABL1870
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[LABPREIRBASIC32][]" value="LABPREIRBASIC32"
                    id="formRadiosRightb39"
                    {{ isset($Interventions['LABPREIRBASIC32'][0]) && $Interventions['LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb39">
                    LABPREIRBASIC32
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[LABPREIRSAFETY17][]" value="LABPREIRSAFETY17"
                    id="formRadiosRightb40"
                    {{ isset($Interventions['LABPREIRSAFETY17'][0]) && $Interventions['LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40">
                    LABPREIRSAFETY17
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[PRESSURESTOCKINGS34][]" value="PRESSURESTOCKINGS34"
                    id="formRadiosRightb40PRESSURESTOCKINGS34"
                    {{ isset($Interventions['PRESSURESTOCKINGS34'][0]) && $Interventions['PRESSURESTOCKINGS34'][0] == 'PRESSURESTOCKINGS34' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40PRESSURESTOCKINGS34">
                    PRESSURESTOCKINGS34
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[PRESSURESTOCKINGSFITDEVICE9][]" value="PRESSURESTOCKINGSFITDEVICE9"
                    id="formRadiosRightb40PRESSURESTOCKINGSFITDEVICE9"
                    {{ isset($Interventions['PRESSURESTOCKINGSFITDEVICE9'][0]) && $Interventions['PRESSURESTOCKINGSFITDEVICE9'][0] == 'PRESSURESTOCKINGSFITDEVICE9' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40PRESSURESTOCKINGSFITDEVICE9">
                    PRESSURESTOCKINGSFITDEVICE9
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[USVVNTNTAUL1490][]" value="USVVNTNTAUL1490"
                    id="formRadiosRightb40USVVNTNTAUL1490"
                    {{ isset($Interventions['USVVNTNTAUL1490'][0]) && $Interventions['USVVNTNTAUL1490'][0] == 'USVVNTNTAUL1490' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40USVVNTNTAUL1490">
                    USVVNTNTAUL1490
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
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[PRESSURESTOCKINGS34][]" value="PRESSURESTOCKINGS34"
                    id="formRadiosRightb40PRESSURESTOCKINGS34"
                    {{ isset($Interventions['PRESSURESTOCKINGS34'][0]) && $Interventions['PRESSURESTOCKINGS34'][0] == 'PRESSURESTOCKINGS34' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40PRESSURESTOCKINGS34">
                    PRESSURESTOCKINGS34
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[PRESSURESTOCKINGSFITDEVICE9][]" value="PRESSURESTOCKINGSFITDEVICE9"
                    id="formRadiosRightb40PRESSURESTOCKINGSFITDEVICE9"
                    {{ isset($Interventions['PRESSURESTOCKINGSFITDEVICE9'][0]) && $Interventions['PRESSURESTOCKINGSFITDEVICE9'][0] == 'PRESSURESTOCKINGSFITDEVICE9' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40PRESSURESTOCKINGSFITDEVICE9">
                    PRESSURESTOCKINGSFITDEVICE9
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[USVVFST1DOSE220][]" value="USVVFST1DOSE220"
                    id="formRadiosRightb40USVVFST1DOSE220"
                    {{ isset($Interventions['USVVFST1DOSE220'][0]) && $Interventions['USVVFST1DOSE220'][0] == 'USVVFST1DOSE220' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40USVVFST1DOSE220">
                    USVVFST1DOSE220
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[PRESSURESTOCKINGS34][]" value="PRESSURESTOCKINGS34"
                    id="formRadiosRightb40PRESSURESTOCKINGS34"
                    {{ isset($Interventions['PRESSURESTOCKINGS34'][0]) && $Interventions['PRESSURESTOCKINGS34'][0] == 'PRESSURESTOCKINGS34' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40PRESSURESTOCKINGS34">
                    PRESSURESTOCKINGS34
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input"type="checkbox"
                    name="Intervention[PRESSURESTOCKINGSFITDEVICE9][]" value="PRESSURESTOCKINGSFITDEVICE9"
                    id="formRadiosRightb40PRESSURESTOCKINGSFITDEVICE9"
                    {{ isset($Interventions['PRESSURESTOCKINGSFITDEVICE9'][0]) && $Interventions['PRESSURESTOCKINGSFITDEVICE9'][0] == 'PRESSURESTOCKINGSFITDEVICE9' ? 'checked' : '' }}
                    >
                <label class="form-check-label" for="formRadiosRightb40PRESSURESTOCKINGSFITDEVICE9">
                    PRESSURESTOCKINGSFITDEVICE9
                </label>
            </div>
        </div>
        
        
        
       
        
    </div>
</div>






                                    <div class="col-lg-12 mb-3">
                                        <h6 class="section_title__">Supportive <a target="_blank"  href="{{ route('user.viewVaricoseAblationEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                            
                                            <div class="col-lg-3" id="Supportive">
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
                                        <h6 class="section_title__">Referral <a href="#" data-bs-toggle="modal"
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
                @if (isset($MDTs['VVANote'][0]))
                $("#textarea_84").show();
                @else

                $("#textarea_84").hide();
                @endif
                @if (isset($MDTs['AblationNote'][0]))
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
                @if (isset($ElegibilitySTATUS['VVThermalAblationNote'][0]))
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

                        if (totalPoints >= 0 && totalPoints <= 15) {
                            mildLUTS.classList.remove('hidden');
                        } else if (totalPoints >= 16 && totalPoints <= 39) {
                            moderateLUTS.classList.remove('hidden');
                        } else if (totalPoints >= 40 && totalPoints <= 1035) {
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

            // Dilated leg veins start  
            var isChecked_sym_a1 = $("#sym_a1").is(":checked");
           
            var sym_a1_durationValue = $("select[name='symptoms[0][1]']").val();
            
            var sym_a1_durationType = $("select[name='symptoms[0][2]']").val();
            var sym_a1_description = $("textarea[name='symptoms[0][3]']").val();

            if (sym_a1_durationValue !== "" || sym_a1_durationType !== "" || sym_a1_description !== "") {
               
                if(isChecked_sym_a1 ===false){
                    
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please fill out Dilated leg veins fields in Symptoms.',
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
// Dilated leg veins end  


// Leg edema / swelling start
var isChecked_sym_a2 = $("#sym_a2").is(":checked");
           
           var sym_a2_durationValue = $("select[name='symptoms[1][1]']").val();
           
           var sym_a2_durationType = $("select[name='symptoms[1][2]']").val();
           var sym_a2_description = $("textarea[name='symptoms[1][3]']").val();

           if (sym_a2_durationValue !== "" || sym_a2_durationType !== "" || sym_a2_description !== "") {
              
               if(isChecked_sym_a2 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Leg edema / swelling fields in Symptoms.',
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
// Leg edema / swelling end 



// Warm legs / feet start
var isChecked_sym_a3 = $("#sym_a3").is(":checked");
           
           var sym_a3_durationValue = $("select[name='symptoms[2][1]']").val();
           
           var sym_a3_durationType = $("select[name='symptoms[2][2]']").val();
           var sym_a3_description = $("textarea[name='symptoms[2][3]']").val();

           if (sym_a3_durationValue !== "" || sym_a3_durationType !== "" || sym_a3_description !== "") {
              
               if(isChecked_sym_a3 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Warm legs / feet fields in Symptoms.',
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
// Warm legs / feet end 


//  Leg heaviness start
var isChecked_sym_a4 = $("#sym_a4").is(":checked");
           
           var sym_a4_durationValue = $("select[name='symptoms[3][1]']").val();
           
           var sym_a4_durationType = $("select[name='symptoms[3][2]']").val();
           var sym_a4_description = $("textarea[name='symptoms[3][3]']").val();

           if (sym_a4_durationValue !== "" || sym_a4_durationType !== "" || sym_a4_description !== "") {
              
               if(isChecked_sym_a4 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Leg heaviness fields in Symptoms.',
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
//  Leg heaviness end 



// Perineal varicosities start
var isChecked_sym_a5 = $("#sym_a5").is(":checked");
           
           var sym_a5_durationValue = $("select[name='symptoms[4][1]']").val();
           
           var sym_a5_durationType = $("select[name='symptoms[4][2]']").val();
           var sym_a5_description = $("textarea[name='symptoms[4][3]']").val();

           if (sym_a5_durationValue !== "" || sym_a5_durationType !== "" || sym_a5_description !== "") {
              
               if(isChecked_sym_a5 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Perineal varicosities fields in Symptoms.',
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
// Perineal varicosities end 



//  Leg Pain / burning start
var isChecked_sym_a6 = $("#sym_a6").is(":checked");
           
           var sym_a6_durationValue = $("select[name='symptoms[5][1]']").val();
           
           var sym_a6_durationType = $("select[name='symptoms[5][2]']").val();
           var sym_a6_description = $("textarea[name='symptoms[5][3]']").val();

           if (sym_a6_durationValue !== "" || sym_a6_durationType !== "" || sym_a6_description !== "") {
              
               if(isChecked_sym_a6 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Leg Pain / burning fields in Symptoms.',
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
//  Leg Pain / burning end 



//  Leg pins & needles  start
var isChecked_sym_a7 = $("#sym_a7").is(":checked");
           
           var sym_a7_durationValue = $("select[name='symptoms[6][1]']").val();
           
           var sym_a7_durationType = $("select[name='symptoms[6][2]']").val();
           var sym_a7_description = $("textarea[name='symptoms[6][3]']").val();

           if (sym_a7_durationValue !== "" || sym_a7_durationType !== "" || sym_a7_description !== "") {
              
               if(isChecked_sym_a7 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Leg pins & needles fields in Symptoms.',
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
//  Leg pins & needles  end 



//   Leg itching start
var isChecked_sym_a9 = $("#sym_a9").is(":checked");
           
           var sym_a9_durationValue = $("select[name='symptoms[8][1]']").val();
           
           var sym_a9_durationType = $("select[name='symptoms[8][2]']").val();
           var sym_a9_description = $("textarea[name='symptoms[8][3]']").val();

           if (sym_a9_durationValue !== "" || sym_a9_durationType !== "" || sym_a9_description !== "") {
              
               if(isChecked_sym_a9 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out  Leg itching fields in Symptoms.',
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
//   Leg itching end 



//  Night cramps start
var isChecked_sym_a91 = $("#sym_a91").is(":checked");
           
           var _sym_a91_durationValue = $("select[name='symptoms[9][1]']").val();
           
           var _sym_a91_durationType = $("select[name='symptoms[9][2]']").val();
           var _sym_a91_description = $("textarea[name='symptoms[9][3]']").val();

           if (_sym_a91_durationValue !== "" || _sym_a91_durationType !== "" || _sym_a91_description !== "") {
              
               if(isChecked_sym_a91 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Night cramps fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a91');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Night cramps end 


//  Skin pigmentation start
var isChecked_sym_a92 = $("#sym_a92").is(":checked");
           
           var _sym_a92_durationValue = $("select[name='symptoms[10][1]']").val();
           
           var _sym_a92_durationType = $("select[name='symptoms[10][2]']").val();
           var _sym_a92_description = $("textarea[name='symptoms[10][3]']").val();

           if (_sym_a92_durationValue !== "" || _sym_a92_durationType !== "" || _sym_a92_description !== "") {
              
               if(isChecked_sym_a92 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Skin pigmentation fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a92');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Skin pigmentation end 


//  General malise start
var isChecked_sym_a923 = $("#sym_a923").is(":checked");
           
           var sym_a923_durationValue = $("select[name='symptoms[11][1]']").val();
           
           var sym_a923_durationType = $("select[name='symptoms[11][2]']").val();
           var sym_a923_description = $("textarea[name='symptoms[11][3]']").val();

           if (sym_a923_durationValue !== "" || sym_a923_durationType !== "" || sym_a923_description !== "") {
              
               if(isChecked_sym_a923 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out General malise fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a923');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  General malise end 
//  Leg Ulcers start
var isChecked_sym_a920 = $("#sym_a920").is(":checked");
           
           var sym_a920_durationValue = $("select[name='symptoms[12][1]']").val();
           
           var sym_a920_durationType = $("select[name='symptoms[12][2]']").val();
           var sym_a920_description = $("textarea[name='symptoms[12][3]']").val();

           if (sym_a920_durationValue !== "" || sym_a920_durationType !== "" || sym_a920_description !== "") {
              
               if(isChecked_sym_a920 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Leg Ulcers fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a920');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Leg Ulcers end 
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
const annotateImageData = '{{ $VaricoceleEmboForm->AnnotateimageData ?? '' }}';

if (annotateImageData) {
    // Set the image source only if annotateImageData is not empty
    imageObj.src = '{{ asset('/assets/thyroid-eligibility-form/') }}' + annotateImageData;

    imageObj.onload = function() {
        const image = new Konva.Image({
            image: imageObj,
            width: 500,
            height: 600,
        });

        layer.add(image);
        stage.draw();
    };
} else {
    console.error('AnnotateimageData is empty or undefined');
    // Handle the case when AnnotateimageData is empty or undefined (e.g., show error message)
}




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
      

    
        $("#updateVaricoseAblationEligibilityForms").submit(function(event) {

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
                            url: '{{ route("user.updateVaricoseAblationEligibilityForms") }}',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                var patientId = response.patient_id;
                                if(response!=''){
            
                                    swal.fire(
              
                                            'Success',
              
                                            'Pelvic Cong Embo form updated successfully!',
              
                                            'success'
              
                                        ).then(function() {
                                                
                                               
                                            var redirectUrl = "{{ route('user.viewPelvicCongEmboEligibilityForms', ['id' => ':id']) }}";
                                            redirectUrl = redirectUrl.replace(':id', patientId);
                                            window.location.href = redirectUrl;
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

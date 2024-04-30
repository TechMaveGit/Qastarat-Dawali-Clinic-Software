@extends('back.layout.main_view')
@push('title')
Patient | Uterine Embo| QASTARAT & DAWALI CLINICS
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
                <form id="updatePelvicCongEmboEligibilityForms" method="POST" action="{{ route('user.updatePelvicCongEmboEligibilityForms') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ @$patient_id }}" />
                    <input type="hidden" name="form_type" value="PelvicCongEmbo" />

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
                                    @php
                                        if (isset($diagnosis_generals_db) && !empty($diagnosis_generals_db)) {
                                            $diagnosis_generals = [];

                                            foreach ($diagnosis_generals_db as $key => $value) {
                                                $decodedData = json_decode($value->data_value, true);
                                                $diagnosis_generals = array_merge($diagnosis_generals, $decodedData);
                                            }

                                            

                                            $existingData = [
                                                'PelvicVarices' => ['Pelvic Varices'],
                                                'PelvicCongestionSyndrome' => ['Pelvic Congestion Syndrome'],
                                                'UterineVarices' => ['Uterine Varices'],
                                                'UterineBleed' => ['Uterine Bleed'],
                                                'PerinealVarices' => ['Perineal Varices'],
                                                'PelvicPain' => ['Pelvic Pain'],     
                                                
                                            ];
                                            $filteredData = array_diff_key($diagnosis_generals, $existingData);
                                        }

                                    @endphp

                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[PelvicVarices][]" id="formRadiosRight1"
                                                {{ isset($diagnosis_generals['PelvicVarices']) && in_array('Pelvic Varices', $diagnosis_generals['PelvicVarices']) ? 'checked' : '' }}
                                                value="Pelvic Varices">
                                            <label class="form-check-label" for="formRadiosRight1">
                                                Pelvic Varices
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[PelvicCongestionSyndrome][]" id="formRadiosRight2"
                                                {{ isset($diagnosis_generals['PelvicCongestionSyndrome']) && in_array('Pelvic Congestion Syndrome', $diagnosis_generals['PelvicCongestionSyndrome']) ? 'checked' : '' }}
                                                value="Pelvic Congestion Syndrome">
                                            <label class="form-check-label" for="formRadiosRight2">
                                                Pelvic Congestion Syndrome
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[UterineVarices][]" id="formRadiosRight3"
                                                {{ isset($diagnosis_generals['UterineVarices']) && in_array('Uterine Varices', $diagnosis_generals['UterineVarices']) ? 'checked' : '' }}
                                                value="Uterine Varices">
                                            <label class="form-check-label" for="formRadiosRight3">
                                                Uterine Varices
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[PerinealVarices][]" id="formRadiosRight4"
                                                {{ isset($diagnosis_generals['PerinealVarices']) && in_array('Perineal Varices', $diagnosis_generals['PerinealVarices']) ? 'checked' : '' }}
                                                value="Perineal Varices">
                                            <label class="form-check-label" for="formRadiosRight4">
                                                Perineal Varices
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="diagnosis_general_checkbox">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[PelvicPain][]" id="formRadiosRight5"
                                                {{ isset($diagnosis_generals['PelvicPain']) && in_array('Pelvic Pain', $diagnosis_generals['PelvicPain']) ? 'checked' : '' }}
                                                value="Pelvic Pain">
                                            <label class="form-check-label" for="formRadiosRight5">
                                                Pelvic Pain
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
                                                'a183' => ['183 Varicose veins of lower extremities'],
                                                'a186' => ['186 Varicose veins of other sites'],
                                                'a1862' => ['186.2 Pelvic varices'],
                                                'a1863' => ['186.3 Vulval varices'],
                                                'R10' => ['R10 Abdominal and pelvic pain'],
                                                'R102' => ['R10.2 Pelvic and perineal pain'],
                                                'N736' => ['N73.6 Female pelvic peritoneal adhesions']
                                               
                                            ];
                                            $filteredData = array_diff_key($diagnosis_cids, $existingData);
                                        }

                                    @endphp
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a183][]"
                                                id="formRadiosRight8" value="183 Varicose veins of lower extremities"
                                                {{ isset($diagnosis_cids['a183']) && in_array('183 Varicose veins of lower extremities', $diagnosis_cids['a183']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight8">
                                                183 Varicose veins of lower extremities
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a186][]"
                                                id="formRadiosRight9" value="186 Varicose veins of other sites"
                                                {{ isset($diagnosis_cids['a186']) && in_array('186 Varicose veins of other sites', $diagnosis_cids['a186']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight9">
                                                186 Varicose veins of other sites
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1862][]"
                                                id="formRadiosRight10" value="186.2 Pelvic varices"
                                                {{ isset($diagnosis_cids['a1862']) && in_array('186.2 Pelvic varices', $diagnosis_cids['a1862']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight10">
                                                186.2 Pelvic varices
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1863][]"
                                                id="formRadiosRight11" value="186.3 Vulval varices"
                                                {{ isset($diagnosis_cids['a1863']) && in_array('186.3 Vulval varices', $diagnosis_cids['a1863']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight11">
                                                186.3 Vulval varices
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[R10][]"
                                                id="formRadiosRight12" value="R10 Abdominal and pelvic pain"
                                                {{ isset($diagnosis_cids['R10']) && in_array('R10 Abdominal and pelvic pain', $diagnosis_cids['R10']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight12">
                                                R10 Abdominal and pelvic pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="Postpartum_thyroiditis">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[R102][]"
                                                id="formRadiosRight13" value="R10.2 Pelvic and perineal pain"
                                                {{ isset($diagnosis_cids['R102']) && in_array('R10.2 Pelvic and perineal pain', $diagnosis_cids['R102']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13">
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
                                                       
                                                        $disfiguringSymptoms18 = [];
                                                            foreach ($symptoms_flat as $symptom) {
                                                                if ($symptom['SymptomType'] === 'Pelvic pain (standing)') {
                                                                   
                                                                    $disfiguringSymptoms1 = $symptom;
                                                                    // dd(gettype($disfiguringSymptoms1),'array',$disfiguringSymptoms1);
                                                                }elseif ($symptom['SymptomType'] === 'Pelvic heaviness') {
                                                                    $disfiguringSymptoms2 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Pelvic heat') {
                                                                    $disfiguringSymptoms3 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Pain with period') {
                                                                    $disfiguringSymptoms4 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Perineal varicosities') {
                                                                    $disfiguringSymptoms5 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Anal varicosities') {
                                                                    $disfiguringSymptoms6 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Vaginal bleed on/off') {
                                                                    $disfiguringSymptoms7 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Urinary symptoms') {
                                                                    $disfiguringSymptoms9 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Recurrent miscarriage') {
                                                                    $disfiguringSymptoms10 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Low back pain') {
                                                                    $disfiguringSymptoms11 = $symptom;
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
                                                        value="Pelvic pain (standing)"
                                                        
                                                        {{ isset($disfiguringSymptoms1['SymptomType']) && $disfiguringSymptoms1['SymptomType'] === 'Pelvic pain (standing)' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a1">
                                                        Pelvic pain (standing)
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
                                                        name="symptoms[1][0]" id="sym_a2" value="Pelvic heaviness"
                                                        {{ isset($disfiguringSymptoms2['SymptomType']) && $disfiguringSymptoms2['SymptomType'] == 'Pelvic heaviness' ? 'checked' : '' }}

                                                        >
                                                    <label class="form-check-label" for="sym_a2">
                                                        Pelvic heaviness
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
                                                        name="symptoms[2][0]" value="Pelvic heat"
                                                        {{ isset($disfiguringSymptoms3['SymptomType']) && $disfiguringSymptoms3['SymptomType'] == 'Pelvic heat' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a3">
                                                        Pelvic heat
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
                                                        value="Pain with period"
                                                        {{ isset($disfiguringSymptoms4['SymptomType']) && $disfiguringSymptoms4['SymptomType'] == 'Pain with period' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a4">
                                                        Pain with period
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
                                                        value="Anal varicosities"
                                                        {{ isset($disfiguringSymptoms6['SymptomType']) && $disfiguringSymptoms6['SymptomType'] == 'Anal varicosities' ? 'checked' : '' }}

                                                        >
                                                    <label class="form-check-label" for="sym_a6">
                                                        Anal varicosities
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
                                                        name="symptoms[6][0]" value="Vaginal bleed on/off"
                                                        id="sym_a7"
                                                        {{ isset($disfiguringSymptoms7['SymptomType']) && $disfiguringSymptoms7['SymptomType'] == 'Vaginal bleed on/off' ? 'checked' : '' }}

                                                        >
                                                    <label class="form-check-label" for="sym_a7">
                                                        Vaginal bleed on/off
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
                                                        name="symptoms[8][0]" id="sym_a9" value="Urinary symptoms"
                                                        {{ isset($disfiguringSymptoms9['SymptomType']) && $disfiguringSymptoms9['SymptomType'] == 'Urinary symptoms' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a9">
                                                        Urinary symptoms
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
                                                        name="symptoms[9][0]" id="sym_a91" value="Recurrent miscarriage"
                                                        {{ isset($disfiguringSymptoms10['SymptomType']) && $disfiguringSymptoms10['SymptomType'] == 'Recurrent miscarriage' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a91">
                                                        Recurrent miscarriage
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
                                                        name="symptoms[10][0]" id="sym_a92" value="Low back pain"
                                                        {{ isset($disfiguringSymptoms11['SymptomType']) && $disfiguringSymptoms11['SymptomType'] == 'Low back pain' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a92">
                                                        Low back pain
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
                                            <h4>Pelvic Congestion Symptoms Scale (PCSS)</h4>
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
                                                    <td>Pelvic pain (standing)</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Pelvicpain][]"
                                                                id="formRadiosRight14" value="0"
                                                                {{ isset($symptoms_scores['Pelvicpain'][0]) && $symptoms_scores['Pelvicpain'][0] == 0 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight14">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Pelvicpain][]"
                                                                id="formRadiosRight15" value="1"
                                                                {{ isset($symptoms_scores['Pelvicpain'][0]) && $symptoms_scores['Pelvicpain'][0] == 1 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight15">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Pelvicpain][]"
                                                                id="formRadiosRight16" value="3"
                                                                {{ isset($symptoms_scores['Pelvicpain'][0]) && $symptoms_scores['Pelvicpain'][0] == 3 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight16">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Pelvicpain][]"
                                                                id="formRadiosRight17" value="5"
                                                                {{ isset($symptoms_scores['Pelvicpain'][0]) && $symptoms_scores['Pelvicpain'][0] == 5 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight17">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pelvic heaviness</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Pelvicheaviness][]"
                                                                id="formRadiosRight18" value="0"
                                                                {{ isset($symptoms_scores['Pelvicheaviness'][0]) && $symptoms_scores['Pelvicheaviness'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight18">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Pelvicheaviness][]"
                                                                id="formRadiosRight19" value="1"
                                                                {{ isset($symptoms_scores['Pelvicheaviness'][0]) && $symptoms_scores['Pelvicheaviness'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight19">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Pelvicheaviness][]"
                                                                id="formRadiosRight20" value="3"
                                                                {{ isset($symptoms_scores['Pelvicheaviness'][0]) && $symptoms_scores['Pelvicheaviness'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight20">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Pelvicheaviness][]"
                                                                id="formRadiosRight21" value="5"
                                                                {{ isset($symptoms_scores['Pelvicheaviness'][0]) && $symptoms_scores['Pelvicheaviness'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight21">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pelvic heat </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Pelvicheat][]"
                                                                id="formRadiosRight22" value="0"
                                                                {{ isset($symptoms_scores['Pelvicheat'][0]) && $symptoms_scores['Pelvicheat'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight22">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Pelvicheat][]"
                                                                id="formRadiosRight23" value="1"
                                                                {{ isset($symptoms_scores['Pelvicheat'][0]) && $symptoms_scores['Pelvicheat'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight23">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Pelvicheat][]"
                                                                id="formRadiosRight24" value="3"
                                                                {{ isset($symptoms_scores['Pelvicheat'][0]) && $symptoms_scores['Pelvicheat'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight24">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Pelvicheat][]"
                                                                id="formRadiosRight25" value="5"
                                                                {{ isset($symptoms_scores['Pelvicheat'][0]) && $symptoms_scores['Pelvicheat'][0] == 5 ? 'checked' : '' }}>
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
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Painwithperiod][]"
                                                                id="formRadiosRight26" value="0"
                                                                {{ isset($symptoms_scores['Painwithperiod'][0]) && $symptoms_scores['Painwithperiod'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight26">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Painwithperiod][]"
                                                                id="formRadiosRight27" value="1"
                                                                {{ isset($symptoms_scores['Painwithperiod'][0]) && $symptoms_scores['Painwithperiod'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight27">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Painwithperiod][]"
                                                                id="formRadiosRight28" value="3"
                                                                {{ isset($symptoms_scores['Painwithperiod'][0]) && $symptoms_scores['Painwithperiod'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight28">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Painwithperiod][]"
                                                                id="formRadiosRight29" value="5"
                                                                {{ isset($symptoms_scores['Painwithperiod'][0]) && $symptoms_scores['Painwithperiod'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight29">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Perineal varicosities</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Perinealvaricosities][]"
                                                                id="formRadiosRight30" value="0"
                                                                {{ isset($symptoms_scores['Perinealvaricosities'][0]) && $symptoms_scores['Perinealvaricosities'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight30">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Perinealvaricosities][]"
                                                                id="formRadiosRight31" value="1"
                                                                {{ isset($symptoms_scores['Perinealvaricosities'][0]) && $symptoms_scores['Perinealvaricosities'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight31">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Perinealvaricosities][]"
                                                                id="formRadiosRight32" value="3"
                                                                {{ isset($symptoms_scores['Perinealvaricosities'][0]) && $symptoms_scores['Perinealvaricosities'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight32">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Perinealvaricosities][]"
                                                                id="formRadiosRight33" value="5"
                                                                {{ isset($symptoms_scores['Perinealvaricosities'][0]) && $symptoms_scores['Perinealvaricosities'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight33">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Anal varicosities </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analvaricosities][]"
                                                                id="formRadiosRight341" value="0"
                                                                {{ isset($symptoms_scores['Analvaricosities'][0]) && $symptoms_scores['Analvaricosities'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analvaricosities][]"
                                                                id="formRadiosRight351" value="1"
                                                                {{ isset($symptoms_scores['Analvaricosities'][0]) && $symptoms_scores['Analvaricosities'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analvaricosities][]"
                                                                id="formRadiosRight361" value="3"
                                                                {{ isset($symptoms_scores['Analvaricosities'][0]) && $symptoms_scores['Analvaricosities'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Analvaricosities][]"
                                                                id="formRadiosRight371" value="5"
                                                                {{ isset($symptoms_scores['Analvaricosities'][0]) && $symptoms_scores['Analvaricosities'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Vaginal bleed on/off  </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Vaginalbleed][]"
                                                                id="formRadiosRight349" value="0"
                                                                {{ isset($symptoms_scores['Vaginalbleed'][0]) && $symptoms_scores['Vaginalbleed'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight349">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Vaginalbleed][]"
                                                                id="formRadiosRight358" value="1"
                                                                {{ isset($symptoms_scores['Vaginalbleed'][0]) && $symptoms_scores['Vaginalbleed'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight358">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Vaginalbleed][]"
                                                                id="formRadiosRight367" value="3"
                                                                {{ isset($symptoms_scores['Vaginalbleed'][0]) && $symptoms_scores['Vaginalbleed'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight367">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Vaginalbleed][]"
                                                                id="formRadiosRight376" value="5"
                                                                {{ isset($symptoms_scores['Vaginalbleed'][0]) && $symptoms_scores['Vaginalbleed'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight376">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Urinary symptoms </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Urinarysymptoms][]"
                                                                id="formRadiosRight345" value="0"
                                                                {{ isset($symptoms_scores['Urinarysymptoms'][0]) && $symptoms_scores['Urinarysymptoms'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight345">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Urinarysymptoms][]"
                                                                id="formRadiosRight354" value="1"
                                                                {{ isset($symptoms_scores['Urinarysymptoms'][0]) && $symptoms_scores['Urinarysymptoms'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight354">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Urinarysymptoms][]"
                                                                id="formRadiosRight363" value="3"
                                                                {{ isset($symptoms_scores['Urinarysymptoms'][0]) && $symptoms_scores['Urinarysymptoms'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight363">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Urinarysymptoms][]"
                                                                id="formRadiosRight372" value="5"
                                                                {{ isset($symptoms_scores['Urinarysymptoms'][0]) && $symptoms_scores['Urinarysymptoms'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight372">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Recurrent miscarriage </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Recurrentmiscarriage][]"
                                                                id="formRadiosRight3412" value="0"
                                                                {{ isset($symptoms_scores['Recurrentmiscarriage'][0]) && $symptoms_scores['Recurrentmiscarriage'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight3412">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Recurrentmiscarriage][]"
                                                                id="formRadiosRight35123" value="1"
                                                                {{ isset($symptoms_scores['Recurrentmiscarriage'][0]) && $symptoms_scores['Recurrentmiscarriage'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight35123">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Recurrentmiscarriage][]"
                                                                id="formRadiosRight361234" value="3"
                                                                {{ isset($symptoms_scores['Recurrentmiscarriage'][0]) && $symptoms_scores['Recurrentmiscarriage'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361234">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Recurrentmiscarriage][]"
                                                                id="formRadiosRight3712345" value="5"
                                                                {{ isset($symptoms_scores['Recurrentmiscarriage'][0]) && $symptoms_scores['Recurrentmiscarriage'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight3712345">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Low back pain </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowbackpain][]"
                                                                id="formRadiosRight34123456" value="0"
                                                                {{ isset($symptoms_scores['Lowbackpain'][0]) && $symptoms_scores['Lowbackpain'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight34123456">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowbackpain][]"
                                                                id="formRadiosRight341234567" value="1"
                                                                {{ isset($symptoms_scores['Lowbackpain'][0]) && $symptoms_scores['Lowbackpain'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341234567">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowbackpain][]"
                                                                id="formRadiosRight3412345678" value="3"
                                                                {{ isset($symptoms_scores['Lowbackpain'][0]) && $symptoms_scores['Lowbackpain'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight3412345678">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowbackpain][]"
                                                                id="formRadiosRight3412345679" value="5"
                                                                {{ isset($symptoms_scores['Lowbackpain'][0]) && $symptoms_scores['Lowbackpain'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight3412345679">
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
                                                    @elseif ($sum >= 16 && $sum <= 35)
                                                        <tr id="moderateLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Moderate LUTS </th>
                                                            <th>(16-35 pts) </th>
                                                        </tr>
                                                    @elseif ($sum >= 36 && $sum <= 1999)
                                                        <tr id="severeLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Severe LUTS </th>
                                                            <th>(36-50 pts) </th>
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
                                                    <th>(16-35 pts) </th>
                                                </tr>
                                                <tr id="severeLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Severe LUTS </th>
                                                    <th>(36-50 pts) </th>
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
                                                <h6 class="mb-3 lut_title">Heamarrhoids</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Heamarrhoids][]" id="formRadiosRight42"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['Heamarrhoids'][0]) && $clinical_indicators['Heamarrhoids'][0] == 'YES' ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="formRadiosRight42">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Heamarrhoids][]" id="formRadiosRight43"
                                                        value="No"
                                                        {{ isset($clinical_indicators['Heamarrhoids'][0]) && $clinical_indicators['Heamarrhoids'][0] == 'No' ? 'checked' : '' }}>
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
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[VulvarVarices][]" id="formRadiosRight44"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['VulvarVarices'][0]) && $clinical_indicators['VulvarVarices'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[VulvarVarices][]" id="formRadiosRight45"
                                                        value="No"
                                                        {{ isset($clinical_indicators['VulvarVarices'][0]) && $clinical_indicators['VulvarVarices'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        
                                        
                                        
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Clinical Exam <a target="_blank"  href="{{ route('user.viewPelvicCongEmboEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                        <h6 class="section_title__">Imaging <a target="_blank"  href="{{ route('user.viewPelvicCongEmboEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
                                      </div>
                                      
                                      <div class="col-lg-12">
                                          <div class="title_head">
                                              <h4>USGENERAL70 &gt; <span class="sub_tt__">Ultrasound Uterus / Fibroids Findings</span></h4>
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
                                        <h6 class="mb-3 lut_title">Dilated pelvic varices</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70Dilatedpelvicvarices][]" value="YES" id="formRadiosRight48"
                                                      {{ isset($Imaging['USGENERAL70Dilatedpelvicvarices'][0]) && $Imaging['USGENERAL70Dilatedpelvicvarices'][0] == "YES" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRight48">
                                                      YES
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70Dilatedpelvicvarices][]" value="No" id="formRadiosRight49"
                                                      {{ isset($Imaging['USGENERAL70Dilatedpelvicvarices'][0]) && $Imaging['USGENERAL70Dilatedpelvicvarices'][0] == "No" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRight49">
                                                      No
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="row">
                                          <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Venous Reflux / insufficiency</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70VenousReflux][]" value="YES" id="formRadiosRightd10"
                                                      {{ isset($Imaging['USGENERAL70VenousReflux'][0]) && $Imaging['USGENERAL70VenousReflux'][0] == "YES" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd10">
                                                      YES 
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70VenousReflux][]" value="No" id="formRadiosRightd11"
                                                      {{ isset($Imaging['USGENERAL70VenousReflux'][0]) && $Imaging['USGENERAL70VenousReflux'][0] == "No" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd11">
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
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70FreeFluid][]" value="YES" id="formRadiosRightd12"
                                                      {{ isset($Imaging['USGENERAL70FreeFluid'][0]) && $Imaging['USGENERAL70FreeFluid'][0] == "YES" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd12">
                                                      YES 
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70FreeFluid][]" value="No" id="formRadiosRightd13"
                                                      {{ isset($Imaging['USGENERAL70FreeFluid'][0]) && $Imaging['USGENERAL70FreeFluid'][0] == "No" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd13">
                                                      No 
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
              
                                      <div class="col-lg-12">
                                          <div class="row">
                                          <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Suapicious Pelvic mass / complex cyst</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70SuapiciousPelvicmass][]" value="YES" id="formRadiosRightd14"
                                                      {{ isset($Imaging['USGENERAL70SuapiciousPelvicmass'][0]) && $Imaging['USGENERAL70SuapiciousPelvicmass'][0] == "YES" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd14">
                                                      YES 
                                                      
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70SuapiciousPelvicmass][]" value="NO" id="formRadiosRightd15"
                                                      {{ isset($Imaging['USGENERAL70SuapiciousPelvicmass'][0]) && $Imaging['USGENERAL70SuapiciousPelvicmass'][0] == "NO" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd15">
                                                      NO 
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                  
                                              
                                              
                                      <div class="col-lg-12">
                                          <div class="title_head">
                                              <h4>MRCIR48 &gt; <span class="sub_tt__">MRI - Female Pelvis Protocol- Finding </span></h4>
                                          </div>
                                      </div> 
                                      <div class="col-lg-12">
                                          <div class="row">
                                          <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Dilated pelvic varices</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48Dilatedpelvicvarices][]"  value="YES" id="formRadiosRightd16"
                                                      {{ isset($Imaging['MRCIR48Dilatedpelvicvarices'][0]) && $Imaging['MRCIR48Dilatedpelvicvarices'][0] == "YES" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd16">
                                                      YES
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48Dilatedpelvicvarices][]"  value="NO" id="formRadiosRightd17"
                                                      {{ isset($Imaging['MRCIR48Dilatedpelvicvarices'][0]) && $Imaging['MRCIR48Dilatedpelvicvarices'][0] == "NO" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd17">
                                                      NO
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="row">
                                          <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Venous Reflux / insufficiency</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48VenousReflux][]" value="YES" id="formRadiosRightd18"
                                                      {{ isset($Imaging['MRCIR48VenousReflux'][0]) && $Imaging['MRCIR48VenousReflux'][0] == "YES" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd18">
                                                      YES 
                                                      
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48VenousReflux][]" value="NO" id="formRadiosRightd19"
                                                      {{ isset($Imaging['MRCIR48VenousReflux'][0]) && $Imaging['MRCIR48VenousReflux'][0] == "NO" ? 'checked' : '' }}
                                                      >
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
                                        <h6 class="mb-3 lut_title">Free Fluid</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48FreeFluid][]" value="YES" id="formRadiosRightd20"
                                                      {{ isset($Imaging['MRCIR48FreeFluid'][0]) && $Imaging['MRCIR48FreeFluid'][0] == "YES" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd20">
                                                      YES 
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48FreeFluid][]" value="NO" id="formRadiosRightd21"
                                                      {{ isset($Imaging['MRCIR48FreeFluid'][0]) && $Imaging['MRCIR48FreeFluid'][0] == "NO" ? 'checked' : '' }}
                                                      >
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
                                        <h6 class="mb-3 lut_title">Suapicious Pelvic mass / complex cyst</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48SuapiciousPelvicmass][]" value="YES" id="formRadiosRightd22"
                                                      {{ isset($Imaging['MRCIR48SuapiciousPelvicmass'][0]) && $Imaging['MRCIR48SuapiciousPelvicmass'][0] == "YES" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd22">
                                                      YES 
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48SuapiciousPelvicmass][]" value="NO" id="formRadiosRightd23"
                                                      {{ isset($Imaging['MRCIR48SuapiciousPelvicmass'][0]) && $Imaging['MRCIR48SuapiciousPelvicmass'][0] == "NO" ? 'checked' : '' }}
                                                      >
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
                                        <h6 class="mb-3 lut_title">Netcrucker Features</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48NetcruckerFeatures][]" value="YES" id="formRadiosRightd24"
                                                      {{ isset($Imaging['MRCIR48NetcruckerFeatures'][0]) && $Imaging['MRCIR48NetcruckerFeatures'][0] == "YES" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd24">
                                                      YES 
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48NetcruckerFeatures][]" value="NO" id="formRadiosRightd25"
                                                      {{ isset($Imaging['MRCIR48NetcruckerFeatures'][0]) && $Imaging['MRCIR48NetcruckerFeatures'][0] == "NO" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd25">
                                                      NO 
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>CTCIR48 &gt; <span class="sub_tt__">CT - Pelvic Venography Protocol - Findings </span></h4>
                                        </div>
                                    </div> 
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Dilated pelvic varices</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[CTCIR48Dilatedpelvicvarices][]" value="YES" id="formRadiosRightd24"
                                                    {{ isset($Imaging['CTCIR48Dilatedpelvicvarices'][0]) && $Imaging['CTCIR48Dilatedpelvicvarices'][0] == "YES" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd24">
                                                    YES 
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[CTCIR48Dilatedpelvicvarices][]" value="NO" id="formRadiosRightd25"
                                                    {{ isset($Imaging['CTCIR48Dilatedpelvicvarices'][0]) && $Imaging['CTCIR48Dilatedpelvicvarices'][0] == "NO" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd25">
                                                    NO 
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Venous Reflux / insufficiency</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[CTCIR48VenousReflux][]" value="YES" id="formRadiosRightd24"
                                                    {{ isset($Imaging['CTCIR48VenousReflux'][0]) && $Imaging['CTCIR48VenousReflux'][0] == "YES" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd24">
                                                    YES 
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[CTCIR48VenousReflux][]" value="NO" id="formRadiosRightd25"
                                                    {{ isset($Imaging['CTCIR48VenousReflux'][0]) && $Imaging['CTCIR48VenousReflux'][0] == "NO" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd25">
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
                                                    <input class="form-check-input"type="radio" name="Imaging[CTCIR48FreeFluid][]" value="YES" id="formRadiosRightd24"
                                                    {{ isset($Imaging['CTCIR48FreeFluid'][0]) && $Imaging['CTCIR48FreeFluid'][0] == "YES" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd24">
                                                    YES 
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[CTCIR48FreeFluid][]" value="NO" id="formRadiosRightd25"
                                                    {{ isset($Imaging['CTCIR48FreeFluid'][0]) && $Imaging['CTCIR48FreeFluid'][0] == "NO" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd25">
                                                    NO 
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Suapicious Pelvicmass / complex cyst</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[CTCIR48SuapiciousPelvicmass][]" value="YES" id="formRadiosRightd24"
                                                    {{ isset($Imaging['CTCIR48SuapiciousPelvicmass'][0]) && $Imaging['CTCIR48SuapiciousPelvicmass'][0] == "YES" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd24">
                                                    YES 
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[CTCIR48SuapiciousPelvicmass][]" value="NO" id="formRadiosRightd25"
                                                    {{ isset($Imaging['CTCIR48SuapiciousPelvicmass'][0]) && $Imaging['CTCIR48SuapiciousPelvicmass'][0] == "NO" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd25">
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
                                                    <input class="form-check-input"type="radio" name="Imaging[CTCIR48NetcruckerFeatures][]" value="YES" id="formRadiosRightd24"
                                                    {{ isset($Imaging['CTCIR48NetcruckerFeatures'][0]) && $Imaging['CTCIR48NetcruckerFeatures'][0] == "YES" ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightd24">
                                                    YES 
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio" name="Imaging[CTCIR48NetcruckerFeatures][]" value="NO" id="formRadiosRightd25"
                                                    {{ isset($Imaging['CTCIR48NetcruckerFeatures'][0]) && $Imaging['CTCIR48NetcruckerFeatures'][0] == "NO" ? 'checked' : '' }}
                                                    >
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
                                            <h4>Pelvic Cong Embo findings</h4>
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
    <h6 class="section_title__">Lab <a  target="_blank"  href="{{ route('user.viewPelvicCongEmboEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
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
              <input class="form-check-input"type="radio" name="Lab[URINANALYSISResults][]" value="Negative / no growth" id="formRadiosRightd26"
              {{ isset($Lab['URINANALYSISResults'][0]) && $Lab['URINANALYSISResults'][0] == "Negative / no growth" ? 'checked' : '' }}>
              <label class="form-check-label" for="formRadiosRightd26">
              Negative / no growth
              </label>
          </div>
      </div>
      <div class="col-lg-4">
          <div class="form-check form-check-right mb-3">
              <input class="form-check-input"type="radio" name="Lab[URINANALYSISResults][]" value="Positive  (PCE Unfaverable)" id="formRadiosRight76"
              {{ isset($Lab['URINANALYSISResults'][0]) && $Lab['URINANALYSISResults'][0] == "Positive  (PCE Unfaverable)" ? 'checked' : '' }}
              >
              <label class="form-check-label" for="formRadiosRight76">
              Positive  (PCE Unfaverable)
              </label>
          </div>
      </div>
      <div class="col-lg-12" id="textarea_76">
              <div class="form-check form-check-right mb-3">
                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***"  style="height: 100px" name="Lab[URINANALYSISResultsNote][]">{{ $Lab['URINANALYSISResultsNote'][0] ?? '' }}</textarea>
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
                  <input class="form-check-input" type="radio" name="Lab[HistopathResults][]" value="Negative" id="formRadiosRight64"
                  {{ isset($Lab['HistopathResults'][0]) && $Lab['HistopathResults'][0] == "Negative" ? 'checked' : '' }}
                  >
                  <label class="form-check-label" for="formRadiosRight64">
                  Negative
                  </label>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="form-check form-check-right mb-3">
                  <input class="form-check-input" type="radio" name="Lab[HistopathResults][]" value="Positive  (PCE Unfaverable)" id="formRadiosRight65"
                  {{ isset($Lab['HistopathResults'][0]) && $Lab['HistopathResults'][0] == "Positive  (PCE Unfaverable)" ? 'checked' : '' }}
                  >
                  <label class="form-check-label" for="formRadiosRight65">
                  Positive  (PCE Unfaverable)
                  </label>
              </div>
          </div>
          <div class="col-lg-12" id="textarea_65">
          <div class="mb-3 form-group">
              <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
              <textarea class="form-control" placeholder=""  style="height: 100px" name="Lab[HistopathResultsNote][]">{{ $Lab['HistopathResultsNote'][0] ?? '' }}</textarea>
          </div>
      </div>
      </div>
      </div>


                                    <div class="col-lg-12  mb-2">
                                        <h6 class="section_title__">Special Investigation <a target="_blank"  href="{{ route('user.viewPelvicCongEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                                data-bs-toggle="modal" data-bs-target="#refer_patient"
                                                class="order-now_btn">Reffer <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                        <div class="title_head">
                                            <h4>REQVCFUNEVAL5</h4>
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
                                                <h6 class="mb-3 lut_title">PAP Smear of cervix</h6>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="SpecialInvestigation[PAPSmear][]"  value="Normal" id="formRadiosRightbf5"
                                                        {{ isset($SpecialInvestigations['PAPSmear'][0]) && $SpecialInvestigations['PAPSmear'][0] == "Normal" ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRightbf5">
                                                        Normal
                                                        </label>
                                                    </div>
                                                 
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="SpecialInvestigation[PAPSmear][]"  value="Abnormal" id="formRadiosRightbf7"
                                                        {{ isset($SpecialInvestigations['PAPSmear'][0]) && $SpecialInvestigations['PAPSmear'][0] == "Abnormal" ? 'checked' : '' }}
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
                                                            <textarea  name="SpecialInvestigation[PAPSmearNote][]" class="form-control" placeholder="Enter Elaborate / notes here***" style="height: 100px">{{ $SpecialInvestigations['PAPSmearNote'][0]  ?? '' }}</textarea>
                                                            </div>
                                                        </div>
                                                        </div>
                                                       
                                                        
                                                            
                                                    </div>
                                                 </div>
  
  
                
                                            </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">MDT <a target="_blank"  href="{{ route('user.viewPelvicCongEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>MDTREVIEW00  &#62; <span class="sub_tt__">Pelvic Congestion MDT outcome</span></h4>
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
                                                    <input class="form-check-input" type="checkbox"
                                                        {{ isset($MDTs['PVVE'][0]) && $MDTs['PVVE'][0] == 'PVVE' ? 'checked' : '' }}
                                                        name="MDT[PVVE][]" value="PVVE" id="formRadiosRight84">
                                                    <label class="form-check-label" for="formRadiosRight84">
                                                        PVVE
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_84">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate UFE / notes here***" style="height: 100px"
                                                            name="MDT[PVVENote][]">{{ $MDTs['PVVENote'][0] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"
                                                        {{ isset($MDTs['Medical'][0]) && $MDTs['Medical'][0] == 'Medical' ? 'checked' : '' }}
                                                        type="checkbox" name="MDT[Medical][]" value="Medical"
                                                        id="formRadiosRight85">
                                                    <label class="form-check-label" for="formRadiosRight85">
                                                        Medical
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_85">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate Medical / notes here***" style="height: 100px"
                                                            name="MDT[MedicalNote][]">{{ $MDTs['MedicalNote'][0] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="MDT[OtherOptions][]"
                                                        {{ isset($MDTs['OtherOptions'][0]) && $MDTs['OtherOptions'][0] == 'Other options' ? 'checked' : '' }}
                                                        value="Other options" id="formRadiosRight87">
                                                    <label class="form-check-label" for="formRadiosRight87">
                                                        Other options
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_87">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate  Other options / notes here***" style="height: 100px"
                                                            name="MDT[OtherOptionsNote][]">{{ $MDTs['OtherOptionsNote'][0] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Elegibility STATUS <a target="_blank"  href="{{ route('user.viewPelvicCongEmboEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                        <div class="row ">

                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="ElegibilitySTATUS[Pelvic][]"
                                                        {{ isset($ElegibilitySTATUS['Pelvic'][0]) && $ElegibilitySTATUS['Pelvic'][0] == 'Pelvic' ? 'checked' : '' }}
                                                        value="Pelvic" id="formRadiosRight90">
                                                    <label class="form-check-label" for="formRadiosRight90">
                                                        Pelvic Congestion EMBOLIZATION (PCE)
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_90">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate     Pelvic ABLATION  (Pelvic) / notes here***"
                                                            style="height: 100px" name="ElegibilitySTATUS[PelvicNote][]">
                                                            {{ $ElegibilitySTATUS['PelvicNote'][0] ?? '' }}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="ElegibilitySTATUS[OTHERS][]" value="OTHERS"
                                                        {{ isset($ElegibilitySTATUS['OTHERS'][0]) && $ElegibilitySTATUS['OTHERS'][0] == 'OTHERS' ? 'checked' : '' }}
                                                        id="formRadiosRight93">
                                                    <label class="form-check-label" for="formRadiosRight93">
                                                        OTHERS
                                                    </label>
                                                </div>

                                                <div class="col-lg-12" id="textarea_93">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate OTHERS/ notes here***" style="height: 100px"
                                                            name="ElegibilitySTATUS[OTHERSNote][]">
                                                            {{ $ElegibilitySTATUS['OTHERSNote'][0] ?? '' }}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <h6 class="section_title__">Intervention PROCEDURE / Rx <a
                                            target="_blank"  href="{{ route('user.viewPelvicCongEmboEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i
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
                                                        {{ isset($Interventions['ANGIOVE1780'][0]) && $Interventions['ANGIOVE1780'][0] == 'ANGIOVE1780' ? 'checked' : '' }}
                                                        id="formRadiosRightb37">
                                                    <label class="form-check-label" for="formRadiosRightb37">
                                                        ANGIOVE1780
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[LABPREANGIO48][]"
                                                        {{ isset($Interventions['LABPREANGIO48'][0]) && $Interventions['LABPREANGIO48'][0] == 'LABPREANGIO48' ? 'checked' : '' }}
                                                        value="LABPREANGIO48" id="formRadiosRightb38">
                                                    <label class="form-check-label" for="formRadiosRightb38">
                                                        LABPREANGIO48
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[LABPREIRSAFETY17][]"
                                                        {{ isset($Interventions['LABPREIRSAFETY17'][0]) && $Interventions['LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                                                        value="LABPREIRSAFETY17" id="formRadiosRightb39">
                                                    <label class="form-check-label" for="formRadiosRightb39">
                                                        LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Intervention[IVSEDATION270][]"
                                                        {{ isset($Interventions['IVSEDATION270'][0]) && $Interventions['IVSEDATION270'][0] == 'IVSEDATION270' ? 'checked' : '' }}
                                                        value="IVSEDATION270" id="formRadiosRightb40">
                                                    <label class="form-check-label" for="formRadiosRightb40">
                                                        IVSEDATION270
                                                    </label>
                                                </div>
                                            </div>
                                           
                                           
                                            
                                            
                                        </div>
                                    </div>






                                    <div class="col-lg-12 mb-3">
                                        <h6 class="section_title__">Supportive <a target="_blank"  href="{{ route('user.viewPelvicCongEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                    </div>
                                    @php
                                    if (isset($supportives) && !empty($supportives)) {
                                        $supportives = json_decode($supportives->data_value, true);

                                        $existingData = [
                                            'IVVITATHYROID175' => ['IVVITATHYROID175'],
                                            'LABPREIVBASIC52' => ['LABPREIVBASIC52'],
                                            'IMBVITAMINES37' => ['IMBVITAMINES37'],
                                            'PROZ290' => ['PROZ290'],
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
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                    {{ isset($supportives['PROZ290']) && in_array('PROZ290', $supportives['PROZ290']) ? 'checked' : '' }}
                                                        name="Supportive[PROZ290][]" value="PROZ290"
                                                        id="formRadiosRightb46">
                                                    <label class="form-check-label" for="formRadiosRightb46">
                                                        PROZ290
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
                                                        name="Referral[Gynae][]" value="Gynae" id="formRadiosRightb48"
                                                        {{ isset($Referrals['Gynae'][0]) && $Referrals['Gynae'][0] == 'Gynae' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="formRadiosRightb48">
                                                        Gynae
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b48">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[GynaeNote][]">{{ $Referrals['GynaeNote'][0] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                    name="Referral[Pevic][]" value="EPevic Floor Rehab/PhysioTherapy" id="formRadiosRightb49"
                                                    {{ isset($Referrals['Pevic'][0]) && $Referrals['Pevic'][0] == 'EPevic Floor Rehab/PhysioTherapy' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightb49">
                                                        Pevic Floor Rehab/PhysioTherapy
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_b49">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[PevicNote][]">{{ $Referrals['PevicNote'][0] ?? '' }}</textarea>
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
                @if (isset($MDTs['PVVENote'][0]))
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
              @if (isset($MDTs['OtherOptionsNote'][0]))
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
                @if (isset($ElegibilitySTATUS['PelvicNote'][0]))
                $("#textarea_90").show();
                    @else
                    $("#textarea_90").hide();
                @endif
                @if (isset($ElegibilitySTATUS['MedicalNote'][0]))
                $("#textarea_91").show();
                    @else
                    $("#textarea_91").hide();
                @endif
                @if (isset($ElegibilitySTATUS['SurgicalNote'][0]))
                $("#textarea_92").show();
                @else
                $("#textarea_92").hide();
                    
                @endif
                @if (isset($ElegibilitySTATUS['OTHERSNote'][0]))
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
                @if (isset($Referrals['GynaeNote'][0]) )
                $("#textarea_b48").show();
                @else
                $("#textarea_b48").hide();
                @endif
                @if ( isset($Referrals['PevicNote'][0]) )
                $("#textarea_b49").show();
                @else
                $("#textarea_b49").hide();
                @endif
               
                @if (isset($Referrals['OthersNote'][0]) )
                $("#textarea_b52").show();
                @else
                $("#textarea_b52").hide();
                @endif
                
               


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
                @if (isset($SpecialInvestigations['PAPSmearNote'][0]))
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
                        } else if (totalPoints >= 16 && totalPoints <= 35) {
                            moderateLUTS.classList.remove('hidden');
                        } else if (totalPoints >= 36 && totalPoints <= 1035) {
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

        $("#formRadiosRight65").click(function(){
            $("#textarea_65").show();
        });
        $("#formRadiosRight64").click(function(){
            $("#textarea_65").hide();
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



{{--  Symptoms fields validation  --}}
<script>
    $(document).ready(function() {
        
        function validateForm() {

            // Pelvic pain (standing) start  
            var isChecked_sym_a1 = $("#sym_a1").is(":checked");
           
            var sym_a1_durationValue = $("select[name='symptoms[0][1]']").val();
            
            var sym_a1_durationType = $("select[name='symptoms[0][2]']").val();
            var sym_a1_description = $("textarea[name='symptoms[0][3]']").val();

            if (sym_a1_durationValue !== "" || sym_a1_durationType !== "" || sym_a1_description !== "") {
               
                if(isChecked_sym_a1 ===false){
                    
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please fill out Pelvic pain (standing) fields in Symptoms.',
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
// Pelvic pain (standing) end  


// Pelvic heaviness start
var isChecked_sym_a2 = $("#sym_a2").is(":checked");
           
           var sym_a2_durationValue = $("select[name='symptoms[1][1]']").val();
           
           var sym_a2_durationType = $("select[name='symptoms[1][2]']").val();
           var sym_a2_description = $("textarea[name='symptoms[1][3]']").val();

           if (sym_a2_durationValue !== "" || sym_a2_durationType !== "" || sym_a2_description !== "") {
              
               if(isChecked_sym_a2 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Pelvic heaviness fields in Symptoms.',
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
// Pelvic heaviness end 



// Pelvic heat start
var isChecked_sym_a3 = $("#sym_a3").is(":checked");
           
           var sym_a3_durationValue = $("select[name='symptoms[2][1]']").val();
           
           var sym_a3_durationType = $("select[name='symptoms[2][2]']").val();
           var sym_a3_description = $("textarea[name='symptoms[2][3]']").val();

           if (sym_a3_durationValue !== "" || sym_a3_durationType !== "" || sym_a3_description !== "") {
              
               if(isChecked_sym_a3 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Pelvic heat fields in Symptoms.',
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
// Pelvic heat end 


//  Pain with period start
var isChecked_sym_a4 = $("#sym_a4").is(":checked");
           
           var sym_a4_durationValue = $("select[name='symptoms[3][1]']").val();
           
           var sym_a4_durationType = $("select[name='symptoms[3][2]']").val();
           var sym_a4_description = $("textarea[name='symptoms[3][3]']").val();

           if (sym_a4_durationValue !== "" || sym_a4_durationType !== "" || sym_a4_description !== "") {
              
               if(isChecked_sym_a4 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Pain with period fields in Symptoms.',
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
//  Pain with period end 



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



//  Anal varicosities start
var isChecked_sym_a6 = $("#sym_a6").is(":checked");
           
           var sym_a6_durationValue = $("select[name='symptoms[5][1]']").val();
           
           var sym_a6_durationType = $("select[name='symptoms[5][2]']").val();
           var sym_a6_description = $("textarea[name='symptoms[5][3]']").val();

           if (sym_a6_durationValue !== "" || sym_a6_durationType !== "" || sym_a6_description !== "") {
              
               if(isChecked_sym_a6 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Anal varicosities fields in Symptoms.',
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
//  Anal varicosities end 



//  Vaginal bleed on/off  start
var isChecked_sym_a7 = $("#sym_a7").is(":checked");
           
           var sym_a7_durationValue = $("select[name='symptoms[6][1]']").val();
           
           var sym_a7_durationType = $("select[name='symptoms[6][2]']").val();
           var sym_a7_description = $("textarea[name='symptoms[6][3]']").val();

           if (sym_a7_durationValue !== "" || sym_a7_durationType !== "" || sym_a7_description !== "") {
              
               if(isChecked_sym_a7 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Vaginal bleed on/off fields in Symptoms.',
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
//  Vaginal bleed on/off  end 



//   Urinary symptoms start
var isChecked_sym_a9 = $("#sym_a9").is(":checked");
           
           var sym_a9_durationValue = $("select[name='symptoms[8][1]']").val();
           
           var sym_a9_durationType = $("select[name='symptoms[8][2]']").val();
           var sym_a9_description = $("textarea[name='symptoms[8][3]']").val();

           if (sym_a9_durationValue !== "" || sym_a9_durationType !== "" || sym_a9_description !== "") {
              
               if(isChecked_sym_a9 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out  Urinary symptoms fields in Symptoms.',
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
//   Urinary symptoms end 



//  Recurrent miscarriage start
var isChecked_sym_a91 = $("#sym_a91").is(":checked");
           
           var _sym_a91_durationValue = $("select[name='symptoms[9][1]']").val();
           
           var _sym_a91_durationType = $("select[name='symptoms[9][2]']").val();
           var _sym_a91_description = $("textarea[name='symptoms[9][3]']").val();

           if (_sym_a91_durationValue !== "" || _sym_a91_durationType !== "" || _sym_a91_description !== "") {
              
               if(isChecked_sym_a91 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Recurrent miscarriage fields in Symptoms.',
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
//  Recurrent miscarriage end 


//  Low back pain start
var isChecked_sym_a92 = $("#sym_a92").is(":checked");
           
           var _sym_a92_durationValue = $("select[name='symptoms[10][1]']").val();
           
           var _sym_a92_durationType = $("select[name='symptoms[10][2]']").val();
           var _sym_a92_description = $("textarea[name='symptoms[10][3]']").val();

           if (_sym_a92_durationValue !== "" || _sym_a92_durationType !== "" || _sym_a92_description !== "") {
              
               if(isChecked_sym_a92 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Low back pain fields in Symptoms.',
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
//  Low back pain end 


//  Other start
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
//  Other end 
            return true; 
        }

        
        $("#updatePelvicCongEmboEligibilityForms").submit(function(event) {
            
            event.preventDefault();
            let formData = new FormData(this);
            if (!validateForm()) {
                e.preventDefault(); 
            } 
            else {
                if(validateForm()){

                
                
                $.ajax({
                                url: '{{ route("user.updatePelvicCongEmboEligibilityForms") }}',
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
        }
        });
    });
</script>
    @endpush
@endsection

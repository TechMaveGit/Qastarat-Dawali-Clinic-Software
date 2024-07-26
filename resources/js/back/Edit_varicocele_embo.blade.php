@extends('back.layout.main_view')
@push('title')
Patient | Edit varicocele embo | QASTARAT & DAWALI CLINICS
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
                <form  id="updateVaricoceleEmboEligibilityForms" method="POST" action="{{ route('user.updateVaricoceleEmboEligibilityForms') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ @$patient_id }}" />
                    <input type="hidden" name="form_type" value="VaricoseAblation" />

                    <h3 class="form_title">Varicocele Embo (VE)</h3>

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
                                                'Varicocele' => ['Varicocele'],
                                                'Testicularpain' => ['Testicular pain'],
                                                'Testicularatrophy' => ['Testicular atrophy'],
                                                'Testicular' => ['Testicular mass / cyst'],
                                                'Hydrocele' => ['Hydrocele'],
                                                'Epedidimalabnormality' => ['Epedidimal abnormality'],     
                                                'Hormonalabnormalities' => ['Hormonal abnormalities'],     
                                                'DilatedSeminalvesicles' => ['Dilated Seminal vesicles'],     
                                                'Erectiledysfunction' => ['Erectile dysfunction'],     
                                                'Prostatitis' => ['Prostatitis'],     
                                                
                                            ];
                                            $filteredData = array_diff_key($diagnosis_generals, $existingData);
                                        }

                                    @endphp

                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Varicocele][]" id="formRadiosRight1"
                                                {{ isset($diagnosis_generals['Varicocele']) && in_array('Varicocele', $diagnosis_generals['Varicocele']) ? 'checked' : '' }}
                                                value="Varicocele">
                                            <label class="form-check-label" for="formRadiosRight1">
                                                Varicocele
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Testicularpain][]" id="formRadiosRight2"
                                                {{ isset($diagnosis_generals['Testicularpain']) && in_array('Testicular pain', $diagnosis_generals['Testicularpain']) ? 'checked' : '' }}
                                                value="Testicular pain">
                                            <label class="form-check-label" for="formRadiosRight2">
                                                Testicular pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Testicularatrophy][]" id="formRadiosRight3"
                                                {{ isset($diagnosis_generals['Testicularatrophy']) && in_array('Testicular atrophy', $diagnosis_generals['Testicularatrophy']) ? 'checked' : '' }}
                                                value="Testicular atrophy">
                                            <label class="form-check-label" for="formRadiosRight3">
                                                Testicular atrophy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Testicular][]" id="formRadiosRight4"
                                                {{ isset($diagnosis_generals['Testicular']) && in_array('Testicular mass / cyst', $diagnosis_generals['Testicular']) ? 'checked' : '' }}
                                                value="Testicular mass / cyst">
                                            <label class="form-check-label" for="formRadiosRight4">
                                                Testicular mass / cyst
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Hydrocele][]" id="formRadiosRight5"
                                                {{ isset($diagnosis_generals['Hydrocele']) && in_array('Hydrocele', $diagnosis_generals['Hydrocele']) ? 'checked' : '' }}
                                                value="Hydrocele">
                                            <label class="form-check-label" for="formRadiosRight5">
                                                Hydrocele
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Epedidimalabnormality][]" id="formRadiosRight4Epedidimalabnormality"
                                                {{ isset($diagnosis_generals['Epedidimalabnormality']) && in_array('Epedidimal abnormality', $diagnosis_generals['Epedidimalabnormality']) ? 'checked' : '' }}
                                                value="Epedidimal abnormality">
                                            <label class="form-check-label" for="formRadiosRight4Epedidimalabnormality">
                                                Epedidimal abnormality
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Hormonalabnormalities][]" id="formRadiosRight4Hormonalabnormalities"
                                                {{ isset($diagnosis_generals['Hormonalabnormalities']) && in_array('Hormonal abnormalities', $diagnosis_generals['Hormonalabnormalities']) ? 'checked' : '' }}
                                                value="Hormonal abnormalities">
                                            <label class="form-check-label" for="formRadiosRight4Hormonalabnormalities">
                                                Hormonal abnormalities
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[DilatedSeminalvesicles][]" id="formRadiosRight4DilatedSeminalvesicles"
                                                {{ isset($diagnosis_generals['DilatedSeminalvesicles']) && in_array('Dilated Seminal vesicles', $diagnosis_generals['DilatedSeminalvesicles']) ? 'checked' : '' }}
                                                value="Dilated Seminal vesicles">
                                            <label class="form-check-label" for="formRadiosRight4DilatedSeminalvesicles">
                                                Dilated Seminal vesicles
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Erectiledysfunction][]" id="formRadiosRight4Erectiledysfunction"
                                                {{ isset($diagnosis_generals['Erectiledysfunction']) && in_array('Erectile dysfunction', $diagnosis_generals['Erectiledysfunction']) ? 'checked' : '' }}
                                                value="Erectile dysfunction">
                                            <label class="form-check-label" for="formRadiosRight4Erectiledysfunction">
                                                Erectile dysfunction
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="diagnosis_general_checkbox">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Prostatitis][]" id="formRadiosRight4Prostatitis"
                                                {{ isset($diagnosis_generals['Prostatitis']) && in_array('Prostatitis', $diagnosis_generals['Prostatitis']) ? 'checked' : '' }}
                                                value="Prostatitis">
                                            <label class="form-check-label" for="formRadiosRight4Prostatitis">
                                                Prostatitis
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
                                                'a1830' => ['183.0 Varicose veins of lower extremities with ulcer'],
                                                'a1831' => ['183.1 Varicose veins of lower extremities with inflammatio'],
                                                'a1839' => ['183.9 Varicose veins of lower extremities without ulcer or inflammation'],
                                                'a186' => ['186 Varicose veins of other sites'],
                                                'a1861' => ['186.1 Scrotal varices, Varicocele'],
                                                'a18620' => ['186.2 Pelvic varices, Varicocele (thrombosed) (scrotum) ovary'],
                                                'a1862' => ['186.2 Pelvic varices'],
                                                'a1872' => ['187.2 Venous insufficiency (Chronic) (Peripheral)'],
                                                'a1878' => ['187.8 Other specified disorders of veins'],
                                                'a1879' => ['187.9 Disorder of vein, unspecified'],
                                                'aR10' => ['R10 Abdominal and pelvic pain'],
                                                'aR102' => ['R10.2 Pelvic and perineal pain'],
                                                'aY528' => ['Y52.8 Antivaricose drugs, including sclerosing agents '],
                                                'aY528' => ['Y52.8 Antivaricose drugs, including sclerosing agents '],
                                                
                                               
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
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1830][]"
                                                id="formRadiosRight9" value="183.0 Varicose veins of lower extremities with ulcer"
                                                {{ isset($diagnosis_cids['a1830']) && in_array('183.0 Varicose veins of lower extremities with ulcer', $diagnosis_cids['a1830']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight9">
                                                183.0 Varicose veins of lower extremities with ulcer
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1831][]"
                                                id="formRadiosRight10" value="183.1 Varicose veins of lower extremities with inflammatio"
                                                {{ isset($diagnosis_cids['a1831']) && in_array('183.1 Varicose veins of lower extremities with inflammatio', $diagnosis_cids['a1831']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight10">
                                                183.1 Varicose veins of lower extremities with inflammatio
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1839][]"
                                                id="formRadiosRight11a1839" value="183.9 Varicose veins of lower extremities without ulcer or inflammation"
                                                {{ isset($diagnosis_cids['a1839']) && in_array('183.9 Varicose veins of lower extremities without ulcer or inflammation', $diagnosis_cids['a1839']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight11a1839">
                                                183.9 Varicose veins of lower extremities without ulcer or inflammation
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a186][]"
                                                id="formRadiosRight12a186" value="186 Varicose veins of other sites"
                                                {{ isset($diagnosis_cids['a186']) && in_array('186 Varicose veins of other sites', $diagnosis_cids['a186']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight12a186">
                                                186 Varicose veins of other sites
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1861][]"
                                                id="formRadiosRight13a1861" value="186.1 Scrotal varices, Varicocele"
                                                {{ isset($diagnosis_cids['a1861']) && in_array('186.1 Scrotal varices, Varicocele', $diagnosis_cids['a1861']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a1861">
                                                186.1 Scrotal varices, Varicocele
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
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a18620][]"
                                                id="formRadiosRight13a18620" value="186.2 Pelvic varices, Varicocele (thrombosed) (scrotum) ovary "
                                                {{ isset($diagnosis_cids['a18620']) && in_array('186.2 Pelvic varices, Varicocele (thrombosed) (scrotum) ovary ', $diagnosis_cids['a18620']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a18620">
                                                186.2 Pelvic varices, Varicocele (thrombosed) (scrotum) ovary 
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
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1872][]"
                                                id="formRadiosRight13a1872" value="187.2 Venous insufficiency (Chronic) (Peripheral)"
                                                {{ isset($diagnosis_cids['a1872']) && in_array('187.2 Venous insufficiency (Chronic) (Peripheral)', $diagnosis_cids['a1872']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a1872">
                                                187.2 Venous insufficiency (Chronic) (Peripheral)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1878][]"
                                                id="formRadiosRight13a1878" value="187.8 Other specified disorders of veins"
                                                {{ isset($diagnosis_cids['a1878']) && in_array('187.8 Other specified disorders of veins', $diagnosis_cids['a1878']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a1878">
                                                187.8 Other specified disorders of veins
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[a1879][]"
                                                id="formRadiosRight13a1879" value="187.9 Disorder of vein, unspecified"
                                                {{ isset($diagnosis_cids['a1879']) && in_array('187.9 Disorder of vein, unspecified', $diagnosis_cids['a1879']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13a1879">
                                                187.9 Disorder of vein, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[aR10][]"
                                                id="formRadiosRight13aR10" value="R10 Abdominal and pelvic pain"
                                                {{ isset($diagnosis_cids['aR10']) && in_array('R10 Abdominal and pelvic pain', $diagnosis_cids['aR10']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13aR10">
                                                R10 Abdominal and pelvic pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[aR102][]"
                                                id="formRadiosRight13aR102" value="R10.2 Pelvic and perineal pain"
                                                {{ isset($diagnosis_cids['aR102']) && in_array('R10.2 Pelvic and perineal pain', $diagnosis_cids['aR102']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13aR102">
                                                R10.2 Pelvic and perineal pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="Postpartum_thyroiditis">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[aY528][]"
                                                id="formRadiosRight13aY528" value="Y52.8 Antivaricose drugs, including sclerosing agents "
                                                {{ isset($diagnosis_cids['aY528']) && in_array('Y52.8 Antivaricose drugs, including sclerosing agents ', $diagnosis_cids['aY528']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13aY528">
                                                Y52.8 Antivaricose drugs, including sclerosing agents 
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
                                                                if ($symptom['SymptomType'] === 'Scrotal swelling') {
                                                                   
                                                                    $disfiguringSymptoms1 = $symptom;
                                                                    // dd(gettype($disfiguringSymptoms1),'array',$disfiguringSymptoms1);
                                                                }elseif ($symptom['SymptomType'] === 'Scrotal heaviness') {
                                                                    $disfiguringSymptoms2 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Scrotal heat') {
                                                                    $disfiguringSymptoms3 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Scrotal pain') {
                                                                    $disfiguringSymptoms4 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Groin / thigh pain') {
                                                                    $disfiguringSymptoms5 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Erectile dysfunction') {
                                                                    $disfiguringSymptoms6 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Infertility') {
                                                                    $disfiguringSymptoms7 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Burning Micturation') {
                                                                    $disfiguringSymptoms8 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Pain during defecation') {
                                                                    $disfiguringSymptoms9 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Recurrent Urinary tract infections') {
                                                                    $disfiguringSymptoms10 = $symptom;
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
                                                        value="Scrotal swelling"
                                                        
                                                        {{ isset($disfiguringSymptoms1['SymptomType']) && $disfiguringSymptoms1['SymptomType'] === 'Scrotal swelling' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a1">
                                                        Scrotal swelling
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px"
                                                            name="symptoms[0][3]">{{ trim($disfiguringSymptoms1['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        name="symptoms[1][0]" id="sym_a2" value="Scrotal heaviness"
                                                        {{ isset($disfiguringSymptoms2['SymptomType']) && $disfiguringSymptoms2['SymptomType'] == 'Scrotal heaviness' ? 'checked' : '' }}

                                                        >
                                                    <label class="form-check-label" for="sym_a2">
                                                        Scrotal heaviness
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
                                                        name="symptoms[2][0]" value="Scrotal heat"
                                                        {{ isset($disfiguringSymptoms3['SymptomType']) && $disfiguringSymptoms3['SymptomType'] == 'Scrotal heat' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a3">
                                                        Scrotal heat
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
                                                        value="Scrotal pain"
                                                        {{ isset($disfiguringSymptoms4['SymptomType']) && $disfiguringSymptoms4['SymptomType'] == 'Scrotal pain' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a4">
                                                        Scrotal pain
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px"
                                                            name="symptoms[3][3]">{{ trim($disfiguringSymptoms4['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        name="symptoms[4][0]" id="sym_a5" value="Groin / thigh pain"
                                                        {{ isset($disfiguringSymptoms5['SymptomType']) && $disfiguringSymptoms5['SymptomType'] == 'Groin / thigh pain' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a5">
                                                        Groin / thigh pain
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
                                                        name="symptoms[5][0]" id="sym_a75"
                                                        value="Erectile dysfunction"
                                                        {{ isset($disfiguringSymptoms6['SymptomType']) && $disfiguringSymptoms6['SymptomType'] == 'Erectile dysfunction' ? 'checked' : '' }}

                                                        >
                                                    <label class="form-check-label" for="sym_a75">
                                                        Erectile dysfunction
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px"
                                                            name="symptoms[5][3]">{{ trim($disfiguringSymptoms6['SymptomDurationNote'] ?? '') }}</textarea>
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
                                                        name="symptoms[6][0]" value="Infertility"
                                                        id="sym_a7"
                                                        {{ isset($disfiguringSymptoms7['SymptomType']) && $disfiguringSymptoms7['SymptomType'] == 'Infertility' ? 'checked' : '' }}

                                                        >
                                                    <label class="form-check-label" for="sym_a7">
                                                        Infertility
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
                                                        name="symptoms[7][0]" id="sym_a7Fatigue" value="Burning Micturation"
                                                        {{ isset($disfiguringSymptoms8['SymptomType']) && $disfiguringSymptoms8['SymptomType'] == 'Burning Micturation' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a7Fatigue">
                                                        Burning Micturation
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
                                                        name="symptoms[8][0]" id="sym_8Painduringdefecation" value="Pain during defecation"
                                                        {{ isset($disfiguringSymptoms9['SymptomType']) && $disfiguringSymptoms9['SymptomType'] == 'Pain during defecation' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_8Painduringdefecation">
                                                        Pain during defecation
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[8][3]">{{ trim($disfiguringSymptoms9['SymptomDurationNote'] ?? '')}}</textarea>
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
                                                        name="symptoms[9][0]" id="sym_8RecurrentUrinarytractinfections" value="Recurrent Urinary tract infections"
                                                        {{ isset($disfiguringSymptoms10['SymptomType']) && $disfiguringSymptoms10['SymptomType'] == 'Recurrent Urinary tract infections' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_8RecurrentUrinarytractinfections">
                                                        Recurrent Urinary tract infections
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[9][3]">{{ trim($disfiguringSymptoms10['SymptomDurationNote'] ?? '')}}</textarea>
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
                                                        name="symptoms[13][0]" value="Other" id="sym_a18"
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
                                                            name="symptoms[13][1]">
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
                                                            name="symptoms[13][2]">
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[13][3]">{{ trim($disfiguringSymptoms18['SymptomDurationNote'] ?? '') }}</textarea>
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
                                            <h4>Varicocele symptoms score (VSS)</h4>
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
                                                    <td>Scrotal swelling</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ScrotalSwelling][]"
                                                                id="formRadiosRight14" value="0"
                                                                {{ isset($symptoms_scores['ScrotalSwelling'][0]) && $symptoms_scores['ScrotalSwelling'][0] == 0 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight14">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ScrotalSwelling][]"
                                                                id="formRadiosRight15" value="1"
                                                                {{ isset($symptoms_scores['ScrotalSwelling'][0]) && $symptoms_scores['ScrotalSwelling'][0] == 1 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight15">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ScrotalSwelling][]"
                                                                id="formRadiosRight16" value="3"
                                                                {{ isset($symptoms_scores['ScrotalSwelling'][0]) && $symptoms_scores['ScrotalSwelling'][0] == 3 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight16">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[ScrotalSwelling][]"
                                                                id="formRadiosRight17" value="5"
                                                                {{ isset($symptoms_scores['ScrotalSwelling'][0]) && $symptoms_scores['ScrotalSwelling'][0] == 5 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight17">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Scrotal heaviness</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Scrotalheaviness][]"
                                                                id="formRadiosRight18" value="0"
                                                                {{ isset($symptoms_scores['Scrotalheaviness'][0]) && $symptoms_scores['Scrotalheaviness'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight18">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Scrotalheaviness][]"
                                                                id="formRadiosRight19" value="1"
                                                                {{ isset($symptoms_scores['Scrotalheaviness'][0]) && $symptoms_scores['Scrotalheaviness'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight19">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Scrotalheaviness][]"
                                                                id="formRadiosRight20" value="3"
                                                                {{ isset($symptoms_scores['Scrotalheaviness'][0]) && $symptoms_scores['Scrotalheaviness'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight20">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Scrotalheaviness][]"
                                                                id="formRadiosRight21" value="5"
                                                                {{ isset($symptoms_scores['Scrotalheaviness'][0]) && $symptoms_scores['Scrotalheaviness'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight21">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Scrotal heat </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Scrotalheat][]"
                                                                id="formRadiosRight22" value="0"
                                                                {{ isset($symptoms_scores['Scrotalheat'][0]) && $symptoms_scores['Scrotalheat'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight22">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Scrotalheat][]"
                                                                id="formRadiosRight23" value="1"
                                                                {{ isset($symptoms_scores['Scrotalheat'][0]) && $symptoms_scores['Scrotalheat'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight23">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Scrotalheat][]"
                                                                id="formRadiosRight24" value="3"
                                                                {{ isset($symptoms_scores['Scrotalheat'][0]) && $symptoms_scores['Scrotalheat'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight24">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Scrotalheat][]"
                                                                id="formRadiosRight25" value="5"
                                                                {{ isset($symptoms_scores['Scrotalheat'][0]) && $symptoms_scores['Scrotalheat'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight25">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Scrotal pain</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[ScotalPain][]"
                                                                id="formRadiosRight26" value="0"
                                                                {{ isset($symptoms_scores['ScotalPain'][0]) && $symptoms_scores['ScotalPain'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight26">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[ScotalPain][]"
                                                                id="formRadiosRight27" value="1"
                                                                {{ isset($symptoms_scores['ScotalPain'][0]) && $symptoms_scores['ScotalPain'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight27">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[ScotalPain][]"
                                                                id="formRadiosRight28" value="3"
                                                                {{ isset($symptoms_scores['ScotalPain'][0]) && $symptoms_scores['ScotalPain'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight28">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[ScotalPain][]"
                                                                id="formRadiosRight29" value="5"
                                                                {{ isset($symptoms_scores['ScotalPain'][0]) && $symptoms_scores['ScotalPain'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight29">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Groin / thigh pain</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Groin][]"
                                                                id="formRadiosRight30" value="0"
                                                                {{ isset($symptoms_scores['Groin'][0]) && $symptoms_scores['Groin'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight30">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Groin][]"
                                                                id="formRadiosRight31" value="1"
                                                                {{ isset($symptoms_scores['Groin'][0]) && $symptoms_scores['Groin'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight31">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Groin][]"
                                                                id="formRadiosRight32" value="3"
                                                                {{ isset($symptoms_scores['Groin'][0]) && $symptoms_scores['Groin'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight32">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Groin][]"
                                                                id="formRadiosRight33" value="5"
                                                                {{ isset($symptoms_scores['Groin'][0]) && $symptoms_scores['Groin'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight33">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                               
                                                
                                               
                                                
                                               
                                               
                                                
                                                @if (isset($sum))
                                                    @if ($sum >= 0 && $sum <= 5)
                                                        <tr id="mildLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Mild LUTS </th>
                                                            <th>(0-5 pts)</th>
                                                        </tr>
                                                    @elseif ($sum >= 6 && $sum <= 15)
                                                        <tr id="moderateLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Moderate LUTS </th>
                                                            <th>(6-15 pts) </th>
                                                        </tr>
                                                    @elseif ($sum >= 16 && $sum <= 1999)
                                                        <tr id="severeLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Severe LUTS </th>
                                                            <th>(16-25 pts) </th>
                                                        </tr>
                                                    @endif
                                                @endif
                                                <tr id="mildLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Mild LUTS </th>
                                                    <th>(0-5 pts)</th>
                                                </tr>
                                                <tr id="moderateLUTS" class="hidden">>
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Moderate LUTS </th>
                                                    <th>(6-15 pts) </th>
                                                </tr>
                                                <tr id="severeLUTS" class="hidden">
                                                    <td colspan="3" rowspan="3"></td>
                                                    <th>Severe LUTS </th>
                                                    <th>(16-25 pts) </th>
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
                                                <h6 class="mb-3 lut_title">Small (atrophic) testicles</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[testicles][]" id="formRadiosRight42"
                                                        value="YES  (VE unfaverable)"
                                                        {{ isset($clinical_indicators['testicles'][0]) && $clinical_indicators['testicles'][0] == 'YES' ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="formRadiosRight42">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[testicles][]" id="formRadiosRight43"
                                                        value="No"
                                                        {{ isset($clinical_indicators['testicles'][0]) && $clinical_indicators['testicles'][0] == 'NO' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight43">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Undecended testicles</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Undecendedtesticles][]" id="formRadiosRight44"
                                                        value="YES  (VE unfaverable)"
                                                        {{ isset($clinical_indicators['Undecendedtesticles'][0]) && $clinical_indicators['Undecendedtesticles'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Undecendedtesticles][]" id="formRadiosRight45"
                                                        value="NO"
                                                        {{ isset($clinical_indicators['Undecendedtesticles'][0]) && $clinical_indicators['Undecendedtesticles'][0] == 'NO' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Erectile dysfunction</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Erectiledysfunction][]" id="formRadiosRight44Erectiledysfunction"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['Erectiledysfunction'][0]) && $clinical_indicators['Erectiledysfunction'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44Erectiledysfunction">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Erectiledysfunction][]" id="formRadiosRight45Erectiledysfunction"
                                                        value="No"
                                                        {{ isset($clinical_indicators['Erectiledysfunction'][0]) && $clinical_indicators['Erectiledysfunction'][0] == 'NO' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45Erectiledysfunction">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Reduced Ejaculate volume</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[ReducedEjaculate][]" id="formRadiosRight44ReducedEjaculate"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['ReducedEjaculate'][0]) && $clinical_indicators['ReducedEjaculate'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44ReducedEjaculate">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[ReducedEjaculate][]" id="formRadiosRight45ReducedEjaculate"
                                                        value="No"
                                                        {{ isset($clinical_indicators['ReducedEjaculate'][0]) && $clinical_indicators['ReducedEjaculate'][0] == 'NO' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45ReducedEjaculate">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Primary infertility</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Primaryinfertility][]" id="formRadiosRight44Primaryinfertility"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['Primaryinfertility'][0]) && $clinical_indicators['Primaryinfertility'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44Primaryinfertility">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Primaryinfertility][]" id="formRadiosRight45Primaryinfertility"
                                                        value="No"
                                                        {{ isset($clinical_indicators['Primaryinfertility'][0]) && $clinical_indicators['Primaryinfertility'][0] == 'NO' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45Primaryinfertility">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Secondary infertility</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Secondaryinfertility][]" id="formRadiosRight44Secondaryinfertility"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['Secondaryinfertility'][0]) && $clinical_indicators['Secondaryinfertility'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44Secondaryinfertility">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Secondaryinfertility][]" id="formRadiosRight45Secondaryinfertility"
                                                        value="No"
                                                        {{ isset($clinical_indicators['Secondaryinfertility'][0]) && $clinical_indicators['Secondaryinfertility'][0] == 'NO' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45Secondaryinfertility">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Clinical Exam <a target="_blank"  href="{{ route('user.viewVaricoceleEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn ">Order Now <i
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
                                        <h6 class="section_title__">Imaging <a target="_blank"  href="{{ route('user.viewVaricoceleEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                            class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
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
                                    <div class="title_head">
                                        <h4>USVENOUSDOPPLER70 &gt; <span class="sub_tt__">Varicocel Grade - LEFT </span></h4>
                                    </div>
                                </div> 
                             
                                <div class="col-lg-12">
                                    <div class="row">
                                 
                                <div class="col-lg-6">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[Grade][]" value="Grade I (Reflux to Groin (with Vulsalva)" id="formRadiosRight48"
                                                {{ isset($Imaging['Grade'][0]) && $Imaging['Grade'][0] == "Grade I (Reflux to Groin (with Vulsalva)" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRight48">
                                                Grade I (Reflux to Groin (with Vulsalva)
                                                </label>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-6">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[Grade][]" value=" Grade II (Reflux to upper scrotum (with Vulsalva)" id="formRadiosRight49"
                                                {{ isset($Imaging['Grade'][0]) && $Imaging['Grade'][0] == "Grade II (Reflux to upper scrotum (with Vulsalva)" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRight49">
                                                Grade II (Reflux to upper scrotum (with Vulsalva)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[Grade][]" value="Grade III Reflux to lower scrotum (with Vulsalva)" id="formRadiosRightd10"
                                                {{ isset($Imaging['Grade'][0]) && $Imaging['Grade'][0] == "Grade III Reflux to lower scrotum (with Vulsalva)" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd10">
                                                Grade III Reflux to lower scrotum (with Vulsalva)
                                                </label>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-6">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[Grade][]" value="Grade IV (Spontoneous Reflux)" id="formRadiosRightd11"
                                                {{ isset($Imaging['Grade'][0]) && $Imaging['Grade'][0] == "Grade IV (Spontoneous Reflux)" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd11">
                                                Grade IV (Spontoneous Reflux)
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[Grade][]" value="Grade V (Spontoneous Reflux with testicular atrophy)" id="formRadiosRightd12"
                                                {{ isset($Imaging['Grade'][0]) && $Imaging['Grade'][0] == "Grade V (Spontoneous Reflux with testicular atrophy)" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd12">
                                                Grade V (Spontoneous Reflux with testicular atrophy)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="title_head">
                                        <h4>USVENOUSDOPPLER70 &gt; <span class="sub_tt__">Scrotal Findings - LEFT</span></h4>
                                    </div>
                                </div>
                             
        
                                <div class="col-lg-12">
                                    <div class="row">
                                    <div class="col-lg-4">
                                  <h6 class="mb-3 lut_title">Testicular Size / Volume (< 2 cc)</h6>
                                </div>
                                <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[LEFTTesticularSize][]" value="YES (VE Unfaverable)" id="formRadiosRightd38"
                                                {{ isset($Imaging['LEFTTesticularSize'][0]) && $Imaging['LEFTTesticularSize'][0] == "YES (VE Unfaverable)" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd38">
                                                YES (VE Unfaverable)
                                                </label>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[LEFTTesticularSize][]" value="NO" id="formRadiosRightd13"
                                                {{ isset($Imaging['LEFTTesticularSize'][0]) && $Imaging['LEFTTesticularSize'][0] == "NO" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd13">
                                                NO 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-lg-12">
                                    <div class="row">
                                    <div class="col-lg-4">
                                  <h6 class="mb-3 lut_title">Testicular Mass / tumor </h6>
                                </div>
                                <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[LEFTTesticularMass][]" value="YES (UFE contraindicated)"  id="formRadiosRightd14"
                                                {{ isset($Imaging['LEFTTesticularMass'][0]) && $Imaging['LEFTTesticularMass'][0] == "YES (UFE contraindicated)" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd14">
                                                YES (UFE contraindicated)
                                                </label>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[LEFTTesticularMass][]" value="NO"  id="formRadiosRightd15"
                                                {{ isset($Imaging['LEFTTesticularMass'][0]) && $Imaging['LEFTTesticularMass'][0] == "NO" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd15">
                                                NO 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-lg-12">
                                    <div class="row">
                                    <div class="col-lg-4">
                                  <h6 class="mb-3 lut_title">Testicular Calcification (Echogenic foci)</h6>
                                </div>
                                <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[LEFTTesticularCalcification][]" value="YES (VE Unfaverable)" id="formRadiosRightd39"
                                                {{ isset($Imaging['LEFTTesticularCalcification'][0]) && $Imaging['LEFTTesticularCalcification'][0] == "YES (VE Unfaverable)" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd39">
                                                YES (VE Unfaverable)
                                                </label>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[LEFTTesticularCalcification][]" value="NO" id="formRadiosRightd40"
                                                {{ isset($Imaging['LEFTTesticularCalcification'][0]) && $Imaging['LEFTTesticularCalcification'][0] == "NO" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd40">
                                                NO 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                    <div class="col-lg-4">
                                  <h6 class="mb-3 lut_title">Epididemis Abnormality</h6>
                                </div>
                                <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[LEFTEpididemisAbnormality][]" value="YES (VE Unfaverable)" id="formRadiosRightd41"
                                                {{ isset($Imaging['LEFTEpididemisAbnormality'][0]) && $Imaging['LEFTEpididemisAbnormality'][0] == "YES (VE Unfaverable)" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd41">
                                                YES (VE Unfaverable)
                                                </label>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[LEFTEpididemisAbnormality][]" value="NO" id="formRadiosRightd42"
                                                {{ isset($Imaging['LEFTEpididemisAbnormality'][0]) && $Imaging['LEFTEpididemisAbnormality'][0] == "NO" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd42">
                                                NO 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                    <div class="col-lg-4">
                                  <h6 class="mb-3 lut_title">Hydrocele (moderate to severe) </h6>
                                </div>
                                <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[LEFTHydrocele][]" value="YES (VE Unfaverable)" id="formRadiosRightd43"
                                                {{ isset($Imaging['LEFTHydrocele'][0]) && $Imaging['LEFTHydrocele'][0] == "YES (VE Unfaverable)" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd43">
                                                YES (VE Unfaverable)
                                                </label>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[LEFTHydrocele][]" value="NO" id="formRadiosRightd44"
                                                {{ isset($Imaging['LEFTHydrocele'][0]) && $Imaging['LEFTHydrocele'][0] == "NO" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd44">
                                                NO 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                    <div class="col-lg-4">
                                  <h6 class="mb-3 lut_title">Retes testis </h6>
                                </div>
                                <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[LEFTRetestestis][]" value="YES" id="formRadiosRightd45"
                                                {{ isset($Imaging['LEFTRetestestis'][0]) && $Imaging['LEFTRetestestis'][0] == "YES" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd45">
                                                YES
                                                </label>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[LEFTRetestestis][]" value="NO" id="formRadiosRightd46"
                                                {{ isset($Imaging['LEFTRetestestis'][0]) && $Imaging['LEFTRetestestis'][0] == "NO" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd46">
                                                NO 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                        
                                        
                                <div class="col-lg-12">
                                    <div class="title_head">
                                        <h4>MRCIR48 &gt; <span class="sub_tt__">MRI - Scrotum Protocol- Findings </span></h4>
                                    </div>
                                </div> 
                                <div class="col-lg-12">
                                    <div class="row">
                                    <div class="col-lg-4">
                                  <h6 class="mb-3 lut_title">Testicular Size / Volume (< 2 cc)</h6>
                                </div>
                                <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[RIGHTRetestestis][]" value="YES (VE Unfaverable)" id="formRadiosRightd16"
                                                {{ isset($Imaging['RIGHTRetestestis'][0]) && $Imaging['RIGHTRetestestis'][0] == "YES (VE Unfaverable)" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd16">
                                                YES (VE Unfaverable)
                                                </label>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[RIGHTRetestestis][]" value="NO" id="formRadiosRightd17"
                                                {{ isset($Imaging['RIGHTRetestestis'][0]) && $Imaging['RIGHTRetestestis'][0] == "NO" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd17">
                                                No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                    <div class="col-lg-4">
                                  <h6 class="mb-3 lut_title">Testicular Mass / tumor </h6>
                                </div>
                                <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[RIGHTTesticularMass][]" value="YES (VE contraindicated)" id="formRadiosRightd18"
                                                {{ isset($Imaging['RIGHTTesticularMass'][0]) && $Imaging['RIGHTTesticularMass'][0] == "YES (VE contraindicated)" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd18">
                                                YES (VE contraindicated)
                                                </label>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[RIGHTTesticularMass][]" value="NO" id="formRadiosRightd19"
                                                {{ isset($Imaging['RIGHTTesticularMass'][0]) && $Imaging['RIGHTTesticularMass'][0] == "NO" ? 'checked' : '' }}
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
                                  <h6 class="mb-3 lut_title">Testicular Calcification (Echogenic foci)</h6>
                                </div>
                                <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio"  name="Imaging[RIGHTTesticularCalcification][]" value="YES (VE Unfaverable)" id="formRadiosRightd20"
                                                {{ isset($Imaging['RIGHTTesticularCalcification'][0]) && $Imaging['RIGHTTesticularCalcification'][0] == "YES (VE Unfaverable)" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd20">
                                                YES (VE Unfaverable)
                                                </label>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio"  name="Imaging[RIGHTTesticularCalcification][]" value="NO" id="formRadiosRightd21"
                                                {{ isset($Imaging['RIGHTTesticularCalcification'][0]) && $Imaging['RIGHTTesticularCalcification'][0] == "NO" ? 'checked' : '' }}
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
                                  <h6 class="mb-3 lut_title">Epididemis Abnormality</h6>
                                </div>
                                <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[RIGHTEpididemisAbnormality][]" value="YES (VE Unfaverable)" id="formRadiosRightd22"
                                                {{ isset($Imaging['RIGHTEpididemisAbnormality'][0]) && $Imaging['RIGHTEpididemisAbnormality'][0] == "YES (VE Unfaverable)" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd22">
                                                YES (VE Unfaverable)
                                                </label>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[RIGHTEpididemisAbnormality][]" value="NO" id="formRadiosRightd23"
                                                {{ isset($Imaging['RIGHTEpididemisAbnormality'][0]) && $Imaging['RIGHTEpididemisAbnormality'][0] == "NO" ? 'checked' : '' }}
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
                                  <h6 class="mb-3 lut_title">Hydrocele (moderate to severe)</h6>
                                </div>
                                <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[RIGHTHydrocele][]" value="YES (VE Unfaverable)" id="formRadiosRightd24"
                                                {{ isset($Imaging['RIGHTHydrocele'][0]) && $Imaging['RIGHTHydrocele'][0] == "YES (VE Unfaverable)" ? 'checked' : '' }}
                                                
                                                >
                                                <label class="form-check-label" for="formRadiosRightd24">
                                                YES (VE Unfaverable)
                                                </label>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[RIGHTHydrocele][]" value="NO" id="formRadiosRightd25"
                                                {{ isset($Imaging['RIGHTHydrocele'][0]) && $Imaging['RIGHTHydrocele'][0] == "NO" ? 'checked' : '' }}
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
                                  <h6 class="mb-3 lut_title">Retes testis </h6>
                                </div>
                                <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[RIGHTRetestestis][]" value="YES" id="formRadiosRightd47"
                                                {{ isset($Imaging['RIGHTRetestestis'][0]) && $Imaging['RIGHTRetestestis'][0] == "YES" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd47">
                                                YES
                                                </label>
                                            </div>
                                        </div>
        
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input"type="radio" name="Imaging[RIGHTRetestestis][]" value="NO" id="formRadiosRightd48"
                                                {{ isset($Imaging['RIGHTRetestestis'][0]) && $Imaging['RIGHTRetestestis'][0] == "NO" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRightd48">
                                                NO 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>CTCIR48  </h4>
                                            </div>
                                        </div> 
                                <div class="col-lg-12">
                                    <div class="row">
                                    
                                        <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">CT - Pelvic Venography Protocol - Findings </h6>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input" type="radio" name="Imaging[CTCIR48][]" value="Normal" id="formRadiosRight64"
                                                {{ isset($Imaging['CTCIR48'][0]) && $Imaging['CTCIR48'][0] == "Normal" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRight64">
                                                Normal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-check form-check-right mb-3">
                                                <input class="form-check-input" type="radio" name="Imaging[CTCIR48][]" value="Abnormal" id="formRadiosRight65"
                                                {{ isset($Imaging['CTCIR48'][0]) && $Imaging['CTCIR48'][0] == "Abnormal" ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="formRadiosRight65">
                                                Abnormal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" id="textarea_65">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
                                            <textarea class="form-control" placeholder=""  style="height: 100px" name="Imaging[NOTE][]">{{ $Imaging['NOTE'][0]  ?? '' }}</textarea>
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
    <h6 class="section_title__">Lab <a target="_blank"  href="{{ route('user.viewVaricoceleEmboEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
  </div>
    <div class="col-lg-12">
      <div class="title_head">
          <h4>LABFERTILITYHORMONES000 &gt; <span class="sub_tt__">FERTILITY HORMONES Results</span></h4>
      </div>
    </div>
   
       
    <div class="col-lg-12 mb-3">
        <div class="row">
           <div class="col-lg-3">
           <h6 class="mb-3 lut_title">Prolactin</h6>
           </div>  
           <div class="col-lg-6">
               <div class="lab_test_value">
                   <select  class="tshRange" name="Lab[Prolactin][]">
                   <option value=""></option>
                   <option value="normal" {{ isset($Lab['Prolactin'][0]) && $Lab['Prolactin'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                   <option value="low" {{ isset($Lab['Prolactin'][0]) && $Lab['Prolactin'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                   <option value="high" {{ isset($Lab['Prolactin'][0]) && $Lab['Prolactin'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                   </select>
                   <div class="result result_value {{ isset($Lab['Prolactin'][0]) ? $Lab['Prolactin'][0] : '' }}">
                       <!-- Display low, high, and normal values here -->
                       {{ isset($Lab['Prolactin'][0]) ? $Lab['Prolactin'][0] : '' }}
                   </div>
               </div>
           </div>
           </div>
        </div>
        <div class="col-lg-12 mb-3">
        <div class="row">
           <div class="col-lg-3">
           <h6 class="mb-3 lut_title">TSH</h6>
           </div>  
           <div class="col-lg-6">
               <div class="lab_test_value">
                   <select  class="tshRange" name="Lab[TSH][]">
                   <option value=""></option>
                   <option value="normal" {{ isset($Lab['TSH'][0]) && $Lab['TSH'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                   <option value="low" {{ isset($Lab['TSH'][0]) && $Lab['TSH'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                   <option value="high" {{ isset($Lab['TSH'][0]) && $Lab['TSH'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                   </select>
                   <div class="result result_value {{ isset($Lab['TSH'][0]) ? $Lab['TSH'][0] : '' }}">
                       <!-- Display low, high, and normal values here -->
                       {{ isset($Lab['TSH'][0]) ? $Lab['TSH'][0] : '' }}
                   </div>
               </div>
           </div>
           </div>
        </div>
        <div class="col-lg-12 mb-3">
         <div class="row">
            <div class="col-lg-3">
            <h6 class="mb-3 lut_title">FSH</h6>
            </div>  
            <div class="col-lg-6">
                <div class="lab_test_value">
                    <select  class="tshRange" name="Lab[FSH][]">
                    <option value=""></option>
                    <option value="normal" {{ isset($Lab['FSH'][0]) && $Lab['FSH'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                    <option value="low" {{ isset($Lab['FSH'][0]) && $Lab['FSH'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                    <option value="high" {{ isset($Lab['FSH'][0]) && $Lab['FSH'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                    </select>
                    <div class="result result_value {{ isset($Lab['FSH'][0]) ? $Lab['FSH'][0] : '' }}">
                        <!-- Display low, high, and normal values here -->
                        {{ isset($Lab['FSH'][0]) ? $Lab['FSH'][0] : '' }}
                    </div>
                </div>
            </div>
            </div>
         </div>
         <div class="col-lg-12 mb-3">
             <div class="row">
                <div class="col-lg-3">
                <h6 class="mb-3 lut_title">LH</h6>
                </div>  
                <div class="col-lg-6">
                    <div class="lab_test_value">
                        <select  class="tshRange" name="Lab[LH][]">
                        <option value=""></option>
                        <option value="normal" {{ isset($Lab['LH'][0]) && $Lab['LH'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                        <option value="low" {{ isset($Lab['LH'][0]) && $Lab['LH'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                        <option value="high" {{ isset($Lab['LH'][0]) && $Lab['LH'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                        </select>
                        <div class="result result_value {{ isset($Lab['LH'][0]) ? $Lab['LH'][0] : '' }}">
                            <!-- Display low, high, and normal values here -->
                            {{ isset($Lab['LH'][0]) ? $Lab['LH'][0] : '' }}
                        </div>
                    </div>
                </div>
                </div>
             </div>
             <div class="col-lg-12 mb-3">
                 <div class="row">
                    <div class="col-lg-3">
                    <h6 class="mb-3 lut_title">Testosterone</h6>
                    </div>  
                    <div class="col-lg-6">
                        <div class="lab_test_value">
                            <select  class="tshRange" name="Lab[Testosterone][]">
                            <option value=""></option>
                            <option value="normal" {{ isset($Lab['Testosterone'][0]) && $Lab['Testosterone'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                            <option value="low" {{ isset($Lab['Testosterone'][0]) && $Lab['Testosterone'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                            <option value="high" {{ isset($Lab['Testosterone'][0]) && $Lab['Testosterone'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                            </select>
                            <div class="result result_value {{ isset($Lab['Testosterone'][0]) ? $Lab['Testosterone'][0] : '' }}">
                                <!-- Display low, high, and normal values here -->
                                {{ isset($Lab['Testosterone'][0]) ? $Lab['Testosterone'][0] : '' }}
                            </div>
                        </div>
                    </div>
                    </div>
                 </div>
                 <div class="col-lg-12 mb-3">
                     <div class="row">
                        <div class="col-lg-3">
                        <h6 class="mb-3 lut_title">Estrodiol D2</h6>
                        </div>  
                        <div class="col-lg-6">
                            <div class="lab_test_value">
                                <select  class="tshRange" name="Lab[EstrodiolD2][]">
                                <option value=""></option>
                                <option value="normal" {{ isset($Lab['EstrodiolD2'][0]) && $Lab['EstrodiolD2'][0] == 'normal' ? 'selected' : '' }}>(0.4 - 5.49 mIU/L)</option>
                                <option value="low" {{ isset($Lab['EstrodiolD2'][0]) && $Lab['EstrodiolD2'][0] == 'low' ? 'selected' : '' }}>(0.01 - 0.39 mIU/L)</option>
                                <option value="high" {{ isset($Lab['EstrodiolD2'][0]) && $Lab['EstrodiolD2'][0] == 'high' ? 'selected' : '' }}>(> 5.49 mIU/L)</option>
                                </select>
                                <div class="result result_value {{ isset($Lab['EstrodiolD2'][0]) ? $Lab['EstrodiolD2'][0] : '' }}">
                                    <!-- Display low, high, and normal values here -->
                                    {{ isset($Lab['EstrodiolD2'][0]) ? $Lab['EstrodiolD2'][0] : '' }}
                                </div>
                            </div>
                        </div>
                        </div>
                     </div>

                     <div class="col-lg-12">
                        <div class="title_head">
                            <h4>LABSEMENANALYSIS000 &gt; <span class="sub_tt__">SEMEN Analysis RESULTS</span></h4>
                        </div>
                      </div>
                   
                      <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-4">
                      <h6 class="mb-3 lut_title">Semen Volume (ml)</h6>
                    </div>
                    <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[Semen][]" value="> 1.5 ml " id="formRadiosRightd60"
                                    {{ isset($Lab['Semen'][0]) && $Lab['Semen'][0] == "> 1.5 ml " ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd60">
                                    > 1.5 ml 
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[Semen][]" value="< 1.5 ml " id="formRadiosRightd61"
                                    {{ isset($Lab['Semen'][0]) && $Lab['Semen'][0] == "< 1.5 ml" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd61">
                                    < 1.5 ml 
                                    </label>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-4">
                      <h6 class="mb-3 lut_title">Sperm count (Million)</h6>
                    </div>
                    <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[Spermcount][]" value="> 39 Million " id="formRadiosRightd62"
                                    {{ isset($Lab['Spermcount'][0]) && $Lab['Spermcount'][0] == "> 39 Million" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd62">
                                    > 39 Million
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[Spermcount][]" value="< 39 Million  (VE Faverable)" id="formRadiosRightd63"
                                    {{ isset($Lab['Spermcount'][0]) && $Lab['Spermcount'][0] == "< 39 Million  (VE Faverable)" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd63">
                                    < 39 Million  (VE Faverable)
                                    </label>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-4">
                      <h6 class="mb-3 lut_title">Sperm Concentration (Million/ml)</h6>
                    </div>
                    <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[SpermConcentration][]" value="> 15 Million /ml" id="formRadiosRightd64"
                                    {{ isset($Lab['SpermConcentration'][0]) && $Lab['SpermConcentration'][0] == "> 15 Million /ml" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd64">
                                    > 15 Million /ml
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[SpermConcentration][]" value="< 15 Million /ml  (VE Faverable)" id="formRadiosRightd65"
                                    {{ isset($Lab['SpermConcentration'][0]) && $Lab['SpermConcentration'][0] == "< 15 Million /ml  (VE Faverable)" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd65">
                                    < 15 Million /ml  (VE Faverable)
                                    </label>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-4">
                      <h6 class="mb-3 lut_title">Normal Form</h6>
                    </div>
                    <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[NormalForm][]" value=">4%" id="formRadiosRightd66"
                                    {{ isset($Lab['NormalForm'][0]) && $Lab['NormalForm'][0] == ">4%" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd66">
                                    > 4%
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[NormalForm][]" value="< 4% (VE Faverable)" id="formRadiosRightd67"
                                    {{ isset($Lab['NormalForm'][0]) && $Lab['NormalForm'][0] == "< 4% (VE Faverable)" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd67">
                                    < 4% (VE Faverable)
                                    </label>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-4">
                      <h6 class="mb-3 lut_title">Progressive (Forward) Motility</h6>
                    </div>
                    <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[Progressive][]" value=" > 32%"  id="formRadiosRightd68"
                                    {{ isset($Lab['Progressive'][0]) && $Lab['Progressive'][0] == "> 32%" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd68">
                                    > 32%
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio" name="Lab[Progressive][]" value="< 32%  (VE Faverable)"  id="formRadiosRightd69"
                                    {{ isset($Lab['Progressive'][0]) && $Lab['Progressive'][0] == "< 32%  (VE Faverable)" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd69">
                                    < 32%  (VE Faverable)
                                    </label>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-4">
                      <h6 class="mb-3 lut_title">WBC (Million /ml)</h6>
                    </div>
                    <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio"  name="Lab[WBC][]" value="< 1%" id="formRadiosRightd70"
                                    {{ isset($Lab['WBC'][0]) && $Lab['WBC'][0] == "< 1%" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd70">
                                    < 1%
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="radio"  name="Lab[WBC][]" value="> 1%" id="formRadiosRightd71"
                                    {{ isset($Lab['WBC'][0]) && $Lab['WBC'][0] == "> 1%" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd71">
                                    > 1%
                                    </label>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                    


                    <div class="col-lg-12">
                        <div class="title_head">
                            <h4>LABSEMENCULTURE000 </h4>
                        </div>
                      </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                        <h6 class="mb-3 lut_title">SEMEN culture RESULTS</h6>
                        </div>
                      
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[culture][]" value="Negative / no growth" id="formRadiosRight77"
                                {{ isset($Lab['culture'][0]) && $Lab['culture'][0] == "Negative / no growth" ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="formRadiosRight77">
                                Negative / no growth
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="Lab[culture][]" value="Positive  (VE contraindicated)" id="formRadiosRight76"
                                {{ isset($Lab['culture'][0]) && $Lab['culture'][0] == "Positive  (VE contraindicated)" ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="formRadiosRight76">
                                Positive  (VE contraindicated)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12" id="textarea_76">
                                <div class="form-check form-check-right mb-3">
                                  <textarea class="form-control" placeholder="Enter Elaborate  / notes here***"  style="height: 100px" name="Lab[NOTE][]">{{ $Lab['NOTE'][0]  ?? '' }}</textarea>
                                </div>
                            </div>
                    </div>
                

                    <div class="col-lg-12">
                        <div class="title_head">
                            <h4>LABDNAFRAG000</h4>
                        </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                                <h6 class="mb-3 lut_title">DNA Fragmentation RESULTS</h6>
                            </div>
                                <div class="col-lg-6">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input"type="checkbox" name="Lab[RESULTS][]" value="Normal (&#60;30%)" id="formRadiosRight82"
                                    {{ isset($Lab['RESULTS'][0]) && $Lab['RESULTS'][0] == "Normal (&#60;30%)" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRight82">
                                    Normal (&#60;30%)
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="checkbox" name="Lab[RESULTS1][]" value=" < 1.5 ml " id="formRadiosRight83"
                                    {{ isset($Lab['RESULTS1'][0]) && $Lab['RESULTS1'][0] == " < 1.5 ml " ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRight83">
                                    < 1.5 ml 
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="checkbox" name="Lab[RESULTS2][]" value="AbNormal (>30%)" id="formRadiosRightd72"
                                    {{ isset($Lab['RESULTS2'][0]) && $Lab['RESULTS2'][0] == " AbNormal (>30%)" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd72">
                                    AbNormal (>30%)
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="checkbox" name="Lab[RESULTS3][]" value=" < 39 Million  (VE Faverable)" id="formRadiosRightd73"
                                    {{ isset($Lab['RESULTS3'][0]) && $Lab['RESULTS3'][0] == " < 39 Million  (VE Faverable)" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd73">
                                    < 39 Million  (VE Faverable)
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
                                        <h6 class="section_title__">MDT <a target="_blank"  href="{{ route('user.viewVaricoceleEmboEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                                        <input class="form-check-input" type="checkbox" name="MDT[VE][]" value="VE" id="formRadiosRight84"
                                                        {{ isset($MDTs['VE'][0]) && $MDTs['VE'][0] == 'VE' ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRight84">
                                                        VE
                                                        </label>
                                                    </div>
                                                    <div  id="textarea_84">
                                                    <div class="form-check form-check-right mb-3">
                                                      <textarea class="form-control" placeholder="Enter Elaborate    VE / notes here***"  style="height: 100px" name="MDT[VENote][]">{{ $MDTs['VENote'][0] ?? '' }}</textarea>
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
                                                      <textarea class="form-control" placeholder="Enter Elaborate  Medical / notes here***"  style="height: 100px" name="MDT[MedicalNote][]">{{ $MDTs['MedicalNote'][0] ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="checkbox" name="MDT[IVF][]" value="IVF" id="formRadiosRight86"
                                                        {{ isset($MDTs['IVF'][0]) && $MDTs['IVF'][0] == 'IVF' ? 'checked' : '' }}
                                                        >
                                                        <label class="form-check-label" for="formRadiosRight86">
                                                        IVF
                                                        </label>
                                                    </div>
                                                    <div  id="textarea_86">
                                                    <div class="form-check form-check-right mb-3">
                                                      <textarea class="form-control" placeholder="Enter Elaborate IVF / notes here***"  style="height: 100px" name="MDT[IVFNote][]">{{ $MDTs['IVFNote'][0] ?? '' }}</textarea>
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
                                        <h6 class="section_title__">Elegibility STATUS <a target="_blank"  href="{{ route('user.viewVaricoceleEmboEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                                    <input class="form-check-input" type="checkbox" name="ElegibilitySTATUS[VARICOCELEEMBOLIZATION][]" value="VARICOCELE EMBOLIZATION (VE)" id="formRadiosRight90"
                                                    {{ isset($ElegibilitySTATUS['VARICOCELEEMBOLIZATION'][0]) && $ElegibilitySTATUS['VARICOCELEEMBOLIZATION'][0] == 'VARICOCELE EMBOLIZATION (VE)' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRight90">
                                                    VARICOCELE EMBOLIZATION (VE)
                                                    </label>
                                                </div>
                                                <div id="textarea_90">
                                                <div class="form-check form-check-right mb-3">
                                                  <textarea class="form-control" placeholder="Enter Elaborate  VARICOCELE EMBOLIZATION (VE) / notes here***"  style="height: 100px" name="ElegibilitySTATUS[VARICOCELEEMBOLIZATIONNote][]">{{ $ElegibilitySTATUS['VARICOCELEEMBOLIZATIONNote'][0] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox" name="ElegibilitySTATUS[OTHERS][]" value="OTHERS" id="formRadiosRight91"
                                                    {{ isset($ElegibilitySTATUS['OTHERS'][0]) && $ElegibilitySTATUS['OTHERS'][0] == 'OTHERS' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRight91">
                                                    OTHERS
                                                    </label>
                                                </div>
                                                <div id="textarea_91">
                                                <div class="form-check form-check-right mb-3">
                                                  <textarea class="form-control" placeholder="Enter Elaborate OTHERS / notes here***"  style="height: 100px" name="ElegibilitySTATUS[OTHERSNote][]">{{ $ElegibilitySTATUS['OTHERSNote'][0] ?? '' }}</textarea>
                                                </div>
                                            </div>
                                            </div>
                                           
                                          
                                         
                                           
                                         
                                       
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <h6 class="section_title__">Intervention PROCEDURE / Rx <a
                                                target="_blank"  href="{{ route('user.viewVaricoceleEmboEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i
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
        
       
        
    </div>
</div>






                                    <div class="col-lg-12 mb-3">
                                        <h6 class="section_title__">Supportive <a target="_blank"  href="{{ route('user.viewVaricoceleEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn order-now_btn_alt">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                    </div>
                                    @php
                                    if (isset($supportives) && !empty($supportives)) {
                                        $supportives = json_decode($supportives->data_value, true);

                                        $existingData = [
                                            'IVVITAFERTILITY175' => ['IVVITAFERTILITY175'],
                                            'LABPREIVBASIC52' => ['LABPREIVBASIC52'],
                                            
                                            'LABPREIVADVANCED230' => ['LABPREIVADVANCED230'],
                                            'IMCOQ1069' => ['IMCOQ1069'],
                                
                                        ];
                                        $filteredData = array_diff_key($supportives, $existingData);
                                    }

                                @endphp

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[IVVITAFERTILITY175][]" value="IVVITAFERTILITY175"
                                                        {{ isset($supportives['IVVITAFERTILITY175']) && in_array('IVVITAFERTILITY175', $supportives['IVVITAFERTILITY175']) ? 'checked' : '' }}
                                                        id="formRadiosRightb45">
                                                    <label class="form-check-label" for="formRadiosRightb45">
                                                        IVVITAFERTILITY175
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
                                            <div class="col-lg-3">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[IMCOQ1069][]"
                                                        {{ isset($supportives['IMCOQ1069']) && in_array('IMCOQ1069', $supportives['IMCOQ1069']) ? 'checked' : '' }}
                                                        value="IMCOQ1069" id="formRadiosRightb47IMCOQ1069">
                                                    <label class="form-check-label" for="formRadiosRightb47IMCOQ1069">
                                                        IMCOQ1069
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-3" id="Supportive">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="checkbox"
                                                        name="Supportive[PROZ290][]"
                                                        {{ isset($supportives['PROZ290']) && in_array('PROZ290', $supportives['PROZ290']) ? 'checked' : '' }}
                                                        value="PROZ290" id="formRadiosRightb47PROZ290">
                                                    <label class="form-check-label" for="formRadiosRightb47PROZ290">
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
            <input class="form-check-input" type="checkbox" name="Referral[Physiotherapy][]" value="Physiotherapy" id="formRadiosRightb48"
            {{ isset($Referrals['Physiotherapy'][0]) && $Referrals['Physiotherapy'][0] == 'Physiotherapy' ? 'checked' : '' }}
            >
            <label class="form-check-label" for="formRadiosRightb48">
            Pelvic Rehab / Physiotherapy
            </label>
        </div>
        <div class="col-lg-12" id="textarea_b48" style="">
        <div class="form-check form-check-right mb-3">
        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[PhysiotherapyNote][]" >{{  $Referrals['PhysiotherapyNote'][0] ?? '' }}</textarea>
        </div>
    </div>
    </div>
    <div class="col-lg-4">
        <div class="form-check form-check-right mb-3 ">
            <input class="form-check-input" type="checkbox" name="Referral[IVF][]" value="IVF" id="formRadiosRightb49"
            {{ isset($Referrals['IVF'][0]) && $Referrals['IVF'][0] == 'IVF' ? 'checked' : '' }}
            >
            <label class="form-check-label" for="formRadiosRightb49">
            IVF
            </label>
        </div>
        <div class="col-lg-12" id="textarea_b49" style="">
        <div class="form-check form-check-right mb-3">
        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px " name="Referral[IVFNote][]" >{{ $Referrals['IVFNote'][0]  ?? '' }}</textarea>
        </div>
    </div>
    </div>
    <div class="col-lg-4">
        <div class="form-check form-check-right mb-3 ">
            <input class="form-check-input" type="checkbox" name="Referral[Urology][]" value="Urology" id="formRadiosRightb50"
            {{ isset($Referrals['Urology'][0]) && $Referrals['Urology'][0] == 'Urology' ? 'checked' : '' }}
            >
            <label class="form-check-label" for="formRadiosRightb50">
            Urology
            </label>
        </div>
        <div class="col-lg-12" id="textarea_b50" style="">
        <div class="form-check form-check-right mb-3">
        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[UrologyNote][]">{{ $Referrals['UrologyNote'][0] ?? '' }}</textarea>
        </div>
    </div>
    </div>
    <div class="col-lg-4">
        <div class="form-check form-check-right mb-3">
            <input class="form-check-input" type="checkbox" name="Referral[Andrology][]" value="Andrology" id="formRadiosRightb51"
            {{ isset($Referrals['Andrology'][0]) && $Referrals['Andrology'][0] == 'Andrology' ? 'checked' : '' }}
            >
            <label class="form-check-label" for="formRadiosRightb51">
            Andrology
            </label>
        </div>
        <div class="col-lg-12" id="textarea_b51" style="">
        <div class="form-check form-check-right mb-3">
        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[AndrologyNote][]">{{ $Referrals['AndrologyNote'][0] ?? '' }}</textarea>
        </div>
    </div>
    </div>
    <div class="col-lg-4">
        <div class="form-check form-check-right mb-3">
            <input class="form-check-input" type="checkbox" name="Referral[Endocrinology][]" value="Endocrinology" id="formRadiosRightb52"
            {{ isset($Referrals['Endocrinology'][0]) && $Referrals['Endocrinology'][0] == 'Endocrinology' ? 'checked' : '' }}
            >
            <label class="form-check-label" for="formRadiosRightb52">
            Endocrinology
            </label>
        </div>
        <div class="col-lg-12" id="textarea_b52" style="">
        <div class="form-check form-check-right mb-3">
        <textarea class="form-control" placeholder="Enter note to referring physician here" style="height: 100px" name="Referral[EndocrinologyNote][]">{{ $Referrals['EndocrinologyNote'][0] ?? '' }}</textarea>
        </div>
    </div>
    </div>
    <div class="col-lg-4">
        <div class="form-check form-check-right mb-3">
            <input class="form-check-input" type="checkbox" name="Referral[Others][]" value="Others" id="formRadiosRightb53"
            {{ isset($Referrals['Others'][0]) && $Referrals['Others'][0] == 'Others' ? 'checked' : '' }}
            >
            <label class="form-check-label" for="formRadiosRightb53">
            Others
            </label>
        </div>
        <div class="col-lg-12" id="textarea_b53" style="">
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
    imageObj.src = '{{ asset('public/assets/thyroid-eligibility-form/' . $VaricoceleEmboForm->AnnotateimageData) }}';
    
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
                        fontStyle: 'bold',
                        fontFamily: 'Arial',
                        fill: '#000',
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
    
    // End Image 
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
                @if (isset($MDTs['VENote'][0]))
                $("#textarea_84").show();
                @else

                $("#textarea_84").hide();
                @endif
                @if (isset($MDTs['MedicalNote'][0]))
                $("#textarea_85").show();
                    @else
                    $("#textarea_85").hide();
                @endif
                @if (isset($MDTs['IVFNote'][0]))
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
                @if (isset($ElegibilitySTATUS['VARICOCELEEMBOLIZATIONNote'][0]))
                $("#textarea_90").show();
                    @else
                    $("#textarea_90").hide();
                @endif
                @if (isset($ElegibilitySTATUS['OTHERSNote'][0]))
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
    $(document).ready(function(){
        @if (isset( $Referrals['PhysiotherapyNote'][0]))
        $("#textarea_b48").show();
        @else

        $("#textarea_b48").hide(); 
        @endif
       @if (isset($Referrals['IVFNote'][0]))
       $("#textarea_b49").show();
           @else
           $("#textarea_b49").hide();
       @endif
       @if (isset($Referrals['UrologyNote'][0]))
       $("#textarea_b50").show();
       @else

       $("#textarea_b50").hide();
       @endif
        @if (isset($Referrals['AndrologyNote'][0] ))
        $("#textarea_b51").show();
            @else
            $("#textarea_b51").hide();
        @endif
        @if (isset($Referrals['EndocrinologyNote'][0]))
        $("#textarea_b52").show();
        @else
        $("#textarea_b52").hide();
            
        @endif
        @if (isset($Referrals['OthersNote'][0]))
        $("#textarea_b53").show();
        @else
        $("#textarea_b53").hide();
            
        @endif
       



        $("#formRadiosRightb48").click(function(){
            $("#textarea_b48").toggle();
        
        });
        $("#formRadiosRightb49").click(function(){
            $("#textarea_b49").toggle();
        });
        $("#formRadiosRightb50").click(function(){
           $("#textarea_b50").toggle();
        
        });
        $("#formRadiosRightb51").click(function(){
            $("#textarea_b51").toggle();
          
        });
        $("#formRadiosRightb52").click(function(){
            $("#textarea_b52").toggle();
            
        });
        $("#formRadiosRightb53").click(function(){
            $("#textarea_b53").toggle();
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

                        if (totalPoints >= 0 && totalPoints <= 5) {
                            mildLUTS.classList.remove('hidden');
                        } else if (totalPoints >= 6 && totalPoints <= 15) {
                            moderateLUTS.classList.remove('hidden');
                        } else if (totalPoints >= 16 && totalPoints <= 1035) {
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

<script>
    $(document).ready(function(){
        $("#textarea_88").hide();
        $("#formRadiosRight88").click(function(){
            $("#textarea_88").show();
        });
        $("#formRadiosRight89").click(function(){
            $("#textarea_88").hide();
        });

@if (isset($Lab['NOTE'][0] ))
$("#textarea_76").show();
    @else
    $("#textarea_76").hide();
@endif
       
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


        @if (isset($Imaging['NOTE'][0] ))
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
        })
</script>

{{--  Symptoms fields validation  --}}
<script>
    $(document).ready(function() {
        
        function validateForm() {

            // focal headache start  
            var isChecked_sym_a1 = $("#sym_a1").is(":checked");
           
            var sym_a1_durationValue = $("select[name='symptoms[0][1]']").val();
            
            var sym_a1_durationType = $("select[name='symptoms[0][2]']").val();
            var sym_a1_description = $("textarea[name='symptoms[0][3]']").val();

            if (sym_a1_durationValue !== "" || sym_a1_durationType !== "" || sym_a1_description !== "") {
               
                if(isChecked_sym_a1 ===false){
                    
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please fill out Scrotal swelling fields in Symptoms.',
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
// focal headache end  


// numbness/ pain to neck or shoulder or arm start
var isChecked_sym_a2 = $("#sym_a2").is(":checked");
           
           var sym_a2_durationValue = $("select[name='symptoms[1][1]']").val();
           
           var sym_a2_durationType = $("select[name='symptoms[1][2]']").val();
           var sym_a2_description = $("textarea[name='symptoms[1][3]']").val();

           if (sym_a2_durationValue !== "" || sym_a2_durationType !== "" || sym_a2_description !== "") {
              
               if(isChecked_sym_a2 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Scrotal heaviness fields in Symptoms.',
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
// numbness/ pain to neck or shoulder or arm end 



// associated with nausea or vomiting start
var isChecked_sym_a3 = $("#sym_a3").is(":checked");
           
           var sym_a3_durationValue = $("select[name='symptoms[2][1]']").val();
           
           var sym_a3_durationType = $("select[name='symptoms[2][2]']").val();
           var sym_a3_description = $("textarea[name='symptoms[2][3]']").val();

           if (sym_a3_durationValue !== "" || sym_a3_durationType !== "" || sym_a3_description !== "") {
              
               if(isChecked_sym_a3 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Scrotal heat fields in Symptoms.',
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
// associated with nausea or vomiting end 


//  associated with vertigo or drawziness start
var isChecked_sym_a4 = $("#sym_a4").is(":checked");
           
           var sym_a4_durationValue = $("select[name='symptoms[3][1]']").val();
           
           var sym_a4_durationType = $("select[name='symptoms[3][2]']").val();
           var sym_a4_description = $("textarea[name='symptoms[3][3]']").val();

           if (sym_a4_durationValue !== "" || sym_a4_durationType !== "" || sym_a4_description !== "") {
              
               if(isChecked_sym_a4 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Scrotal pain fields in Symptoms.',
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
//  associated with vertigo or drawziness end 



//  associated with blurring / visual disturbances start
var isChecked_sym_a5 = $("#sym_a5").is(":checked");
           
           var sym_a5_durationValue = $("select[name='symptoms[4][1]']").val();
           
           var sym_a5_durationType = $("select[name='symptoms[4][2]']").val();
           var sym_a5_description = $("textarea[name='symptoms[4][3]']").val();

           if (sym_a5_durationValue !== "" || sym_a5_durationType !== "" || sym_a5_description !== "") {
              
               if(isChecked_sym_a5 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Groin / thigh pain fields in Symptoms.',
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
//  associated with blurring / visual disturbances end 



//  Sleep disturbance start
var isChecked_sym_a75 = $("#sym_a75").is(":checked");
           
           var sym_a75_durationValue = $("select[name='symptoms[5][1]']").val();
           
           var sym_a75_durationType = $("select[name='symptoms[5][2]']").val();
           var sym_a75_description = $("textarea[name='symptoms[5][3]']").val();

           if (sym_a75_durationValue !== "" || sym_a75_durationType !== "" || sym_a75_description !== "") {
              
               if(isChecked_sym_a75 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Erectile dysfunction fields in Symptoms.',
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
//  Sleep disturbance end 



//  Lethargy start
var isChecked_sym_a7 = $("#sym_a7").is(":checked");
           
           var sym_a7_durationValue = $("select[name='symptoms[6][1]']").val();
           
           var sym_a7_durationType = $("select[name='symptoms[6][2]']").val();
           var sym_a7_description = $("textarea[name='symptoms[6][3]']").val();

           if (sym_a7_durationValue !== "" || sym_a7_durationType !== "" || sym_a7_description !== "") {
              
               if(isChecked_sym_a7 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Infertility fields in Symptoms.',
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
//  Lethargy end 



//  Burning Micturation start
var isChecked_sym_a7Fatigue = $("#sym_a7Fatigue").is(":checked");
           
           var sym_a7Fatigue_durationValue = $("select[name='symptoms[7][1]']").val();
           
           var sym_a7Fatigue_durationType = $("select[name='symptoms[7][2]']").val();
           var sym_a7Fatigue_description = $("textarea[name='symptoms[7][3]']").val();

           if (sym_a7Fatigue_durationValue !== "" || sym_a7Fatigue_durationType !== "" || sym_a7Fatigue_description !== "") {
              
               if(isChecked_sym_a7Fatigue ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Burning Micturation fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_a7Fatigue');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Burning Micturation end 



//  Pain during defecation start
var isChecked_8Painduringdefecation = $("#sym_8Painduringdefecation").is(":checked");
           
           var _8Painduringdefecation_durationValue = $("select[name='symptoms[8][1]']").val();
           
           var _8Painduringdefecation_durationType = $("select[name='symptoms[8][2]']").val();
           var _8Painduringdefecation_description = $("textarea[name='symptoms[8][3]']").val();

           if (_8Painduringdefecation_durationValue !== "" || _8Painduringdefecation_durationType !== "" || _8Painduringdefecation_description !== "") {
              
               if(isChecked_8Painduringdefecation ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Pain during defecation fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_8Painduringdefecation');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Pain during defecation end 


//  Recurrent Urinary tract infections start
var isChecked_8RecurrentUrinarytractinfections = $("#sym_8RecurrentUrinarytractinfections").is(":checked");
           
           var _8RecurrentUrinarytractinfections_durationValue = $("select[name='symptoms[9][1]']").val();
           
           var _8RecurrentUrinarytractinfections_durationType = $("select[name='symptoms[9][2]']").val();
           var _8RecurrentUrinarytractinfections_description = $("textarea[name='symptoms[9][3]']").val();

           if (_8RecurrentUrinarytractinfections_durationValue !== "" || _8RecurrentUrinarytractinfections_durationType !== "" || _8RecurrentUrinarytractinfections_description !== "") {
              
               if(isChecked_8RecurrentUrinarytractinfections ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Recurrent Urinary tract infections fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_8RecurrentUrinarytractinfections');
                               if (elementToScroll) {
                                   // Scroll to the element's position
                                   elementToScroll.scrollIntoView({ behavior: "smooth", block: "center" });
                               }
                           }, 1000);
                       });
                       return false;
                }


       }
//  Recurrent Urinary tract infections end 


//  Other start
var isChecked_sym_a18 = $("#sym_a18").is(":checked");
           
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

        

        $("#updateVaricoceleEmboEligibilityForms").submit(function(event) {
            
            const dataURL = stage.toDataURL({
                        mimeType: 'image/png'
                    });

            document.getElementById('canvasImage').value = dataURL;
            
            event.preventDefault();
            let formData = new FormData(this);
            if (!validateForm()) {
                e.preventDefault(); 
            } 
            else {
                if(validateForm())
                {
                    $.ajax({
                            url: '{{ route("user.updateVaricoceleEmboEligibilityForms") }}',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                var patientId = response.patient_id;
                                if(response!=''){
                                    Swal.fire({
                                                title: 'Success',
                                                text: 'Order Lab Test Added successfully!',
                                                icon: 'success',
                                                showConfirmButton: false, // Hide the default "OK" button
                                                timer: 2000 // Display the message for 2 seconds
                                            }).then(() => {
                                                location.reload(); // Refresh the page after the timer ends
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

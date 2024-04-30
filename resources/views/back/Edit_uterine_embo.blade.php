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
                <form id="updateUterineEmboEligibilityForms" method="POST" action="{{ route('user.updateUterineEmboEligibilityForms') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ @$patient_id }}" />
                    <input type="hidden" name="form_type" value="uterine_embo" />

                    <h3 class="form_title">Uterine Embo (UE)</h3>

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
                                                'UterineFibroid' => ['Uterine Fibroid'],
                                                'MultiFibroidUterus' => ['Multi-Fibroid Uterus'],
                                                'Adenomyosis' => ['Adenomyosis'],
                                                'UterineBleed' => ['Uterine Bleed'],
                                                'Dysmenprrhea' => ['Dysmenprrhea'],
                                                'Abdominalmass' => ['Abdominal mass'],
                                                'Anemia' => ['Anemia'],
                                                'EndomertialCA' => ['Endomertial CA'],
                                                'PelvicPain' => ['Pelvic Pain'],
                                                
                                            ];
                                            $filteredData = array_diff_key($diagnosis_generals, $existingData);
                                        }

                                    @endphp

                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[UterineFibroid][]" id="formRadiosRight1"
                                                {{ isset($diagnosis_generals['UterineFibroid']) && in_array('Uterine Fibroid', $diagnosis_generals['UterineFibroid']) ? 'checked' : '' }}
                                                value="Uterine Fibroid">
                                            <label class="form-check-label" for="formRadiosRight1">
                                                Uterine Fibroid
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[MultiFibroidUterus][]" id="formRadiosRight2"
                                                {{ isset($diagnosis_generals['MultiFibroidUterus']) && in_array('Multi-Fibroid Uterus', $diagnosis_generals['MultiFibroidUterus']) ? 'checked' : '' }}
                                                value="MultiFibroidUterus">
                                            <label class="form-check-label" for="formRadiosRight2">
                                                Multi-Fibroid Uterus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Adenomyosis][]" id="formRadiosRight3"
                                                {{ isset($diagnosis_generals['Adenomyosis']) && in_array('Adenomyosis', $diagnosis_generals['Adenomyosis']) ? 'checked' : '' }}
                                                value="Adenomyosis">
                                            <label class="form-check-label" for="formRadiosRight3">
                                                Adenomyosis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[UterineBleed][]" id="formRadiosRight4"
                                                {{ isset($diagnosis_generals['UterineBleed']) && in_array('Uterine Bleed', $diagnosis_generals['UterineBleed']) ? 'checked' : '' }}
                                                value="Uterine Bleed">
                                            <label class="form-check-label" for="formRadiosRight4">
                                                Uterine Bleed
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Dysmenprrhea][]" id="formRadiosRight5"
                                                {{ isset($diagnosis_generals['Dysmenprrhea']) && in_array('Dysmenprrhea', $diagnosis_generals['Dysmenprrhea']) ? 'checked' : '' }}
                                                value="Dysmenprrhea">
                                            <label class="form-check-label" for="formRadiosRight5">
                                                Dysmenprrhea
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Anemia][]" id="formRadiosRight6"
                                                {{ isset($diagnosis_generals['Anemia']) && in_array('Anemia', $diagnosis_generals['Anemia']) ? 'checked' : '' }}
                                                value="Anemia">
                                            <label class="form-check-label" for="formRadiosRight6">
                                                Anemia
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[EndomertialCA][]" id="formRadiosRight6"
                                                {{ isset($diagnosis_generals['EndomertialCA']) && in_array('Endomertial CA', $diagnosis_generals['EndomertialCA']) ? 'checked' : '' }}
                                                value="Endomertial CA">
                                            <label class="form-check-label" for="formRadiosRight6">
                                                Endomertial CA
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="diagnosis_general_checkbox">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[PelvicPain][]" id="formRadiosRight7"
                                                {{ isset($diagnosis_generals['PelvicPain']) && in_array('Pelvic Pain', $diagnosis_generals['PelvicPain']) ? 'checked' : '' }}
                                                value="Pelvic Pain">
                                            <label class="form-check-label" for="formRadiosRight7">
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
                                                'D250' => ['D25.0 Submucous leiomyoma of uterus'],
                                                'D251' => ['D25.1 Intramural leiomvoma of uterus'],
                                                'D252' => ['D25.2 Subserosal leiomyoma of uterus'],
                                                'D259' => ['D25.9 Leiomyoma of uterus, unspecified'],
                                                'N710' => ['N71.0 Acute inflammatory disease of uterus'],
                                                'N800' => ['N80.0 Endometriosis of uterus'],
                                                'N840' => ['N84.0 Polyp of corpus uteri'],
                                                'N852' => ['N85.2 Hypertrophy of uterus'],
                                                'N853' => ['N85.3 Subinvolution of uterus'],
                                                'N854' => ['N85.4 Malposition of uterus'],
                                                'N855' => ['N85.5 Inversion of uterus'],
                                                'N856' => ['N85.6 Intrauterine synechiae'],
                                                'N858' => ['N85.8 Other specified noninflammatory disorders of uterus'],
                                                'N859' => ['N85.9 Noninflammatory disorder of uterus, unspecified'],
                                                'N87' => ['N87 Dysplasia of cervix uteri'],
                                                'N879' => ['N87.9 Dysplasia of cervix uteri, unspecified'],
                                                'P209' => ['P20.9 Intrauterine hypoxia, unspecified'],
                                                'Q513' => ['Q51.3 Bicornate uterus'],
                                                'Q514' => ['Q51.4 Unicornate uterus'],
                                                'Q518' => ['Q51.8 Other congenital malformations of uterus and cervix'],
                                               
                                            ];
                                            $filteredData = array_diff_key($diagnosis_cids, $existingData);
                                        }

                                    @endphp
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D250][]"
                                                id="formRadiosRight8" value="D25.0 Submucous leiomyoma of uterus"
                                                {{ isset($diagnosis_cids['D250']) && in_array('D25.0 Submucous leiomyoma of uterus', $diagnosis_cids['D250']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight8">
                                                D25.0 Submucous leiomyoma of uterus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D251][]"
                                                id="formRadiosRight9" value="D25.1 Intramural leiomvoma of uterus"
                                                {{ isset($diagnosis_cids['D251']) && in_array('D25.1 Intramural leiomvoma of uterus', $diagnosis_cids['D251']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight9">
                                                D25.1 Intramural leiomvoma of uterus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D252][]"
                                                id="formRadiosRight10" value="D25.2 Subserosal leiomyoma of uterus"
                                                {{ isset($diagnosis_cids['D252']) && in_array('D25.2 Subserosal leiomyoma of uterus', $diagnosis_cids['D252']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight10">
                                                D25.2 Subserosal leiomyoma of uterus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[D259][]"
                                                id="formRadiosRight11" value="D25.9 Leiomyoma of uterus, unspecified"
                                                {{ isset($diagnosis_cids['D259']) && in_array('D25.9 Leiomyoma of uterus, unspecified', $diagnosis_cids['D259']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight11">
                                                D25.9 Leiomyoma of uterus, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N710][]"
                                                id="formRadiosRight12" value="N71.0 Acute inflammatory disease of uterus"
                                                {{ isset($diagnosis_cids['N710']) && in_array('N71.0 Acute inflammatory disease of uterus', $diagnosis_cids['N710']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight12">
                                                N71.0 Acute inflammatory disease of uterus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N800][]"
                                                id="formRadiosRight13" value="N80.0 Endometriosis of uterus"
                                                {{ isset($diagnosis_cids['N800']) && in_array('N80.0 Endometriosis of uterus', $diagnosis_cids['N800']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13">
                                                N80.0 Endometriosis of uterus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N840][]"
                                                id="formRadiosRighta3" value="N84.0 Polyp of corpus uteri"
                                                {{ isset($diagnosis_cids['N840']) && in_array('N84.0 Polyp of corpus uteri', $diagnosis_cids['N840']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRighta3">
                                                N84.0 Polyp of corpus uteri
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N852][]"
                                                value="N85.2 Hypertrophy of uterus" id="formRadiosRighta4"
                                                {{ isset($diagnosis_cids['N852']) && in_array('N85.2 Hypertrophy of uterus', $diagnosis_cids['N852']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRighta4">
                                                N85.2 Hypertrophy of uterus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N853][]"
                                                id="formRadiosRighta5"
                                                value="N85.3 Subinvolution of uterus"
                                                {{ isset($diagnosis_cids['N853']) && in_array('N85.3 Subinvolution of uterus', $diagnosis_cids['N853']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRighta5">
                                                N85.3 Subinvolution of uterus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N854][]"
                                                id="formRadiosRighta6"
                                                value="N85.4 Malposition of uterus"
                                                {{ isset($diagnosis_cids['N854']) && in_array('N85.4 Malposition of uterus', $diagnosis_cids['N854']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRighta6">
                                                N85.4 Malposition of uterus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N855][]"
                                                id="formRadiosRighta7" value="N85.5 Inversion of uterus"
                                                {{ isset($diagnosis_cids['N855']) && in_array('N85.5 Inversion of uterus', $diagnosis_cids['N855']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRighta7">
                                                N41.3 Prostatocystitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N856][]"
                                                id="formRadiosRighta8" value="N85.6 Intrauterine synechiae"
                                                {{ isset($diagnosis_cids['N856']) && in_array('N85.6 Intrauterine synechiae', $diagnosis_cids['N856']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRighta8">
                                                N85.6 Intrauterine synechiae
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N858][]"
                                                id="formRadiosRighta9" value="N85.8 Other specified noninflammatory disorders of uterus"
                                                {{ isset($diagnosis_cids['N858']) && in_array('N85.8 Other specified noninflammatory disorders of uterus', $diagnosis_cids['N858']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRighta9">
                                                N85.8 Other specified noninflammatory disorders of uterus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N859][]"
                                                id="formRadiosRighta10" value="N85.9 Noninflammatory disorder of uterus, unspecified"
                                                {{ isset($diagnosis_cids['N859']) && in_array('N85.9 Noninflammatory disorder of uterus, unspecified', $diagnosis_cids['N859']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRighta10">
                                                N85.9 Noninflammatory disorder of uterus, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N87][]"
                                                id="formRadiosRighta11"
                                                value="N87 Dysplasia of cervix uteri"
                                                {{ isset($diagnosis_cids['N87']) && in_array('N87 Dysplasia of cervix uteri', $diagnosis_cids['N87']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRighta11">
                                                N87 Dysplasia of cervix uteri
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[N879][]"
                                                id="formRadiosRighta12" value="N87.9 Dysplasia of cervix uteri, unspecified"
                                                {{ isset($diagnosis_cids['N879']) && in_array('N87.9 Dysplasia of cervix uteri, unspecified', $diagnosis_cids['N879']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRighta12">
                                                N87.9 Dysplasia of cervix uteri, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[P209][]"
                                                id="formRadiosRighta13" value="P20.9 Intrauterine hypoxia, unspecified"
                                                {{ isset($diagnosis_cids['P209']) && in_array('P20.9 Intrauterine hypoxia, unspecified', $diagnosis_cids['P209']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRighta13">
                                                P20.9 Intrauterine hypoxia, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Q513][]"
                                                id="formRadiosRighta13" value="Q51.3 Bicornate uterus"
                                                {{ isset($diagnosis_cids['Q513']) && in_array('Q51.3 Bicornate uterus', $diagnosis_cids['Q513']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRighta13">
                                                Q51.3 Bicornate uterus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Q514][]"
                                                id="formRadiosRighta13" value="Q51.4 Unicornate uterus"
                                                {{ isset($diagnosis_cids['Q514']) && in_array('Q51.4 Unicornate uterus', $diagnosis_cids['Q514']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRighta13">
                                                Q51.4 Unicornate uterus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="Postpartum_thyroiditis">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Q518][]"
                                                id="formRadiosRighta14" value="Q51.8 Other congenital malformations of uterus and cervix"
                                                {{ isset($diagnosis_cids['Q518']) && in_array('Q51.8 Other congenital malformations of uterus and cervix', $diagnosis_cids['Q518']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRighta14">
                                                Q51.8 Other congenital malformations of uterus and cervix
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
                                                       
                                                        $disfiguringSymptoms18 = [];
                                                            foreach ($symptoms_flat as $symptom) {
                                                                if ($symptom['SymptomType'] === 'Heavy Period') {
                                                                   
                                                                    $disfiguringSymptoms1 = $symptom;
                                                                    // dd(gettype($disfiguringSymptoms1),'array',$disfiguringSymptoms1);
                                                                }elseif ($symptom['SymptomType'] === 'Dysmenorrhea') {
                                                                    $disfiguringSymptoms2 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Compressive symptoms - Urinary (frequency / urgency / drippling)') {
                                                                    $disfiguringSymptoms3 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Compressive symptoms - Constipation') {
                                                                    $disfiguringSymptoms4 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Compressive symptoms - Low back pain') {
                                                                    $disfiguringSymptoms5 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Symptomatic anemia') {
                                                                    $disfiguringSymptoms6 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Abdominal mass') {
                                                                    $disfiguringSymptoms7 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Recurrent Urinary infections') {
                                                                    $disfiguringSymptoms9 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Other') {
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
                                                        value="Heavy Period"
                                                        
                                                        {{ isset($disfiguringSymptoms1['SymptomType']) && $disfiguringSymptoms1['SymptomType'] === 'Heavy Period' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a1">
                                                        Heavy Period
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
                                                        name="symptoms[1][0]" id="sym_a2" value="Dysmenorrhea"
                                                        {{ isset($disfiguringSymptoms2['SymptomType']) && $disfiguringSymptoms2['SymptomType'] == 'Dysmenorrhea' ? 'checked' : '' }}

                                                        >
                                                    <label class="form-check-label" for="sym_a2">
                                                        Dysmenorrhea
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
                                                        name="symptoms[2][0]" value="Compressive symptoms - Urinary (frequency / urgency / drippling)"
                                                        {{ isset($disfiguringSymptoms3['SymptomType']) && $disfiguringSymptoms3['SymptomType'] == 'Compressive symptoms - Urinary (frequency / urgency / drippling)' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a3">
                                                        Compressive symptoms - Urinary (frequency / urgency / drippling)
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
                                                        value="Compressive symptoms - Constipation"
                                                        {{ isset($disfiguringSymptoms4['SymptomType']) && $disfiguringSymptoms4['SymptomType'] == 'Compressive symptoms - Constipation' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a4">
                                                        Compressive symptoms - Constipation
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
                                                        name="symptoms[4][0]" id="sym_a5" value="Compressive symptoms - Low back pain"
                                                        {{ isset($disfiguringSymptoms5['SymptomType']) && $disfiguringSymptoms5['SymptomType'] == 'Compressive symptoms - Low back pain' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a5">
                                                        Compressive symptoms - Low back pain
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
                                                        value="Symptomatic anemia"
                                                        {{ isset($disfiguringSymptoms6['SymptomType']) && $disfiguringSymptoms6['SymptomType'] == 'Symptomatic anemia' ? 'checked' : '' }}

                                                        >
                                                    <label class="form-check-label" for="sym_a6">
                                                        Symptomatic anemia
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
                                                        name="symptoms[6][0]" value="Abdominal mass"
                                                        id="sym_a7"
                                                        {{ isset($disfiguringSymptoms7['SymptomType']) && $disfiguringSymptoms7['SymptomType'] == 'Abdominal mass' ? 'checked' : '' }}

                                                        >
                                                    <label class="form-check-label" for="sym_a7">
                                                        Abdominal mass
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
                                                        name="symptoms[8][0]" id="sym_a9" value="Recurrent Urinary infections"
                                                        {{ isset($disfiguringSymptoms9['SymptomType']) && $disfiguringSymptoms9['SymptomType'] == 'Recurrent Urinary infections' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a9">
                                                        Recurrent Urinary infections
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
                                            <h4>uterine Compressive symptoms score (TCSS)</h4>
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
                                                    <td>Heavy Period</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[HeavyPeriod][]"
                                                                id="formRadiosRight14" value="0"
                                                                {{ isset($symptoms_scores['HeavyPeriod'][0]) && $symptoms_scores['HeavyPeriod'][0] == 0 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight14">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[HeavyPeriod][]"
                                                                id="formRadiosRight15" value="1"
                                                                {{ isset($symptoms_scores['HeavyPeriod'][0]) && $symptoms_scores['HeavyPeriod'][0] == 1 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight15">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[HeavyPeriod][]"
                                                                id="formRadiosRight16" value="3"
                                                                {{ isset($symptoms_scores['HeavyPeriod'][0]) && $symptoms_scores['HeavyPeriod'][0] == 3 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight16">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[HeavyPeriod][]"
                                                                id="formRadiosRight17" value="5"
                                                                {{ isset($symptoms_scores['HeavyPeriod'][0]) && $symptoms_scores['HeavyPeriod'][0] == 5 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight17">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Dysmenorrhea</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dysmenorrhea][]"
                                                                id="formRadiosRight18" value="0"
                                                                {{ isset($symptoms_scores['Dysmenorrhea'][0]) && $symptoms_scores['Dysmenorrhea'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight18">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dysmenorrhea][]"
                                                                id="formRadiosRight19" value="1"
                                                                {{ isset($symptoms_scores['Dysmenorrhea'][0]) && $symptoms_scores['Dysmenorrhea'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight19">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dysmenorrhea][]"
                                                                id="formRadiosRight20" value="3"
                                                                {{ isset($symptoms_scores['Dysmenorrhea'][0]) && $symptoms_scores['Dysmenorrhea'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight20">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Dysmenorrhea][]"
                                                                id="formRadiosRight21" value="5"
                                                                {{ isset($symptoms_scores['Dysmenorrhea'][0]) && $symptoms_scores['Dysmenorrhea'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight21">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Compressive symptoms - Urinary </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[CompressivesymptomsUrinary][]"
                                                                id="formRadiosRight22" value="0"
                                                                {{ isset($symptoms_scores['CompressivesymptomsUrinary'][0]) && $symptoms_scores['CompressivesymptomsUrinary'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight22">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[CompressivesymptomsUrinary][]"
                                                                id="formRadiosRight23" value="1"
                                                                {{ isset($symptoms_scores['CompressivesymptomsUrinary'][0]) && $symptoms_scores['CompressivesymptomsUrinary'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight23">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[CompressivesymptomsUrinary][]"
                                                                id="formRadiosRight24" value="3"
                                                                {{ isset($symptoms_scores['CompressivesymptomsUrinary'][0]) && $symptoms_scores['CompressivesymptomsUrinary'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight24">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[CompressivesymptomsUrinary][]"
                                                                id="formRadiosRight25" value="5"
                                                                {{ isset($symptoms_scores['CompressivesymptomsUrinary'][0]) && $symptoms_scores['CompressivesymptomsUrinary'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight25">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Compressive symptoms - Constipation</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[CompressivesymptomsConstipation][]"
                                                                id="formRadiosRight26" value="0"
                                                                {{ isset($symptoms_scores['CompressivesymptomsConstipation'][0]) && $symptoms_scores['CompressivesymptomsConstipation'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight26">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[CompressivesymptomsConstipation][]"
                                                                id="formRadiosRight27" value="1"
                                                                {{ isset($symptoms_scores['CompressivesymptomsConstipation'][0]) && $symptoms_scores['CompressivesymptomsConstipation'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight27">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[CompressivesymptomsConstipation][]"
                                                                id="formRadiosRight28" value="3"
                                                                {{ isset($symptoms_scores['CompressivesymptomsConstipation'][0]) && $symptoms_scores['CompressivesymptomsConstipation'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight28">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[CompressivesymptomsConstipation][]"
                                                                id="formRadiosRight29" value="5"
                                                                {{ isset($symptoms_scores['CompressivesymptomsConstipation'][0]) && $symptoms_scores['CompressivesymptomsConstipation'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight29">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Compressive symptoms - Low back pain</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[CompressivesymptomsLowbackpain][]"
                                                                id="formRadiosRight30" value="0"
                                                                {{ isset($symptoms_scores['CompressivesymptomsLowbackpain'][0]) && $symptoms_scores['CompressivesymptomsLowbackpain'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight30">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[CompressivesymptomsLowbackpain][]"
                                                                id="formRadiosRight31" value="1"
                                                                {{ isset($symptoms_scores['CompressivesymptomsLowbackpain'][0]) && $symptoms_scores['CompressivesymptomsLowbackpain'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight31">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[CompressivesymptomsLowbackpain][]"
                                                                id="formRadiosRight32" value="3"
                                                                {{ isset($symptoms_scores['CompressivesymptomsLowbackpain'][0]) && $symptoms_scores['CompressivesymptomsLowbackpain'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight32">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[CompressivesymptomsLowbackpain][]"
                                                                id="formRadiosRight33" value="5"
                                                                {{ isset($symptoms_scores['CompressivesymptomsLowbackpain'][0]) && $symptoms_scores['CompressivesymptomsLowbackpain'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight33">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Symptomatic anemia </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Symptomaticanemia][]"
                                                                id="formRadiosRight34" value="0"
                                                                {{ isset($symptoms_scores['Symptomaticanemia'][0]) && $symptoms_scores['Symptomaticanemia'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight34">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Symptomaticanemia][]"
                                                                id="formRadiosRight35" value="1"
                                                                {{ isset($symptoms_scores['Symptomaticanemia'][0]) && $symptoms_scores['Symptomaticanemia'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight35">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Symptomaticanemia][]"
                                                                id="formRadiosRight36" value="3"
                                                                {{ isset($symptoms_scores['Symptomaticanemia'][0]) && $symptoms_scores['Symptomaticanemia'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight36">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Symptomaticanemia][]"
                                                                id="formRadiosRight37" value="5"
                                                                {{ isset($symptoms_scores['Symptomaticanemia'][0]) && $symptoms_scores['Symptomaticanemia'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight37">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Abdominal mass  </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Abdominalmass][]"
                                                                id="formRadiosRight34" value="0"
                                                                {{ isset($symptoms_scores['Abdominalmass'][0]) && $symptoms_scores['Abdominalmass'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight34">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Abdominalmass][]"
                                                                id="formRadiosRight35" value="1"
                                                                {{ isset($symptoms_scores['Abdominalmass'][0]) && $symptoms_scores['Abdominalmass'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight35">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Abdominalmass][]"
                                                                id="formRadiosRight36" value="3"
                                                                {{ isset($symptoms_scores['Abdominalmass'][0]) && $symptoms_scores['Abdominalmass'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight36">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Abdominalmass][]"
                                                                id="formRadiosRight37" value="5"
                                                                {{ isset($symptoms_scores['Abdominalmass'][0]) && $symptoms_scores['Abdominalmass'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight37">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                
                                                @if (isset($sum))
                                                    @if ($sum >= 0 && $sum <= 7)
                                                        <tr id="mildLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Mild LUTS </th>
                                                            <th>(0-7 pts)</th>
                                                        </tr>
                                                    @elseif ($sum >= 8 && $sum <= 19)
                                                        <tr id="moderateLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Moderate LUTS </th>
                                                            <th>(8-19 pts) </th>
                                                        </tr>
                                                    @else
                                                        <tr id="severeLUTSDB">
                                                            <td colspan="3" rowspan="3"></td>
                                                            <th>Severe LUTS </th>
                                                            <th>(20-35 pts) </th>
                                                        </tr>
                                                    @endif
                                                @endif
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
                                                <h6 class="mb-3 lut_title">Active PID | Vaginal discharge | Vaginal or vulvar ulcer</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Vaginal][]" id="formRadiosRight42"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['Vaginal'][0]) && $clinical_indicators['Vaginal'][0] == 'YES' ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="formRadiosRight42">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Vaginal][]" id="formRadiosRight43"
                                                        value="No"
                                                        {{ isset($clinical_indicators['Vaginal'][0]) && $clinical_indicators['Vaginal'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight43">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Dysfunctional Uterine bleed</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Uterine][]" id="formRadiosRight44"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['Uterine'][0]) && $clinical_indicators['Uterine'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[Uterine][]" id="formRadiosRight45"
                                                        value="No"
                                                        {{ isset($clinical_indicators['Uterine'][0]) && $clinical_indicators['Uterine'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center">
                                            <div class="col-lg-4">
                                                <h6 class="mb-3 lut_title">Painful intercorse (for married female)</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="clinical_indicator[Painfulintercorse][]" id="formRadiosRight46"
                                                        value="Yes"
                                                        {{ isset($clinical_indicators['Painfulintercorse'][0]) && $clinical_indicators['Painfulintercorse'][0] == 'Yes' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight46">
                                                        Yes
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="clinical_indicator[Painfulintercorse][]" id="formRadiosRight47"
                                                        value="NO"
                                                        {{ isset($clinical_indicators['Painfulintercorse'][0]) && $clinical_indicators['Painfulintercorse'][0] == 'NO' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight47">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-4"> 
                                                <h6 class="mb-3 lut_title">Recurrent abortion (for married female)</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="clinical_indicator[Recurrentabortion][]" id="formRadiosRight46"
                                                        {{ isset($clinical_indicators['Recurrentabortion'][0]) && $clinical_indicators['Recurrentabortion'][0] == 'Yes' ? 'checked' : '' }}
                                                        value="Yes">
                                                    <label class="form-check-label" for="formRadiosRight46">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="clinical_indicator[Recurrentabortion][]" id="formRadiosRight47"
                                                        {{ isset($clinical_indicators['Recurrentabortion'][0]) && $clinical_indicators['Recurrentabortion'][0] == 'No' ? 'checked' : '' }}
                                                        value="No">
                                                    <label class="form-check-label" for="formRadiosRight47">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-4"> 
                                                <h6 class="mb-3 lut_title">GnRH-a injections</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="clinical_indicator[injections][]" id="formRadiosRight46"
                                                        {{ isset($clinical_indicators['injections'][0]) && $clinical_indicators['injections'][0] == 'Yes' ? 'checked' : '' }}
                                                        value="Yes">
                                                    <label class="form-check-label" for="formRadiosRight46">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="clinical_indicator[injections][]" id="formRadiosRight47"
                                                        {{ isset($clinical_indicators['injections'][0]) && $clinical_indicators['injections'][0] == 'No' ? 'checked' : '' }}
                                                        value="No">
                                                    <label class="form-check-label" for="formRadiosRight47">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Clinical Exam <a target="_blank"  href="{{ route('user.viewUterineEmboEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                        <h6 class="section_title__">Imaging <a href="view-medical-record.php" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
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
                                        <h6 class="mb-3 lut_title">Fibroids</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70Fibroids][]" value="Single" id="formRadiosRight48"
                                                      {{ isset($Imaging['USGENERAL70Fibroids'][0]) && $Imaging['USGENERAL70Fibroids'][0] == "Single" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRight48">
                                                      Single
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70Fibroids][]" value="Multiple" id="formRadiosRight49"
                                                      {{ isset($Imaging['USGENERAL70Fibroids'][0]) && $Imaging['USGENERAL70Fibroids'][0] == "Multiple" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRight49">
                                                      Multiple
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="row">
                                          <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Endometrium</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70Endometrium][]" value="Normal" id="formRadiosRightd10"
                                                      {{ isset($Imaging['USGENERAL70Endometrium'][0]) && $Imaging['USGENERAL70Endometrium'][0] == "Normal" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd10">
                                                      Normal 
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70Endometrium][]" value="Abnormal" id="formRadiosRightd11"
                                                      {{ isset($Imaging['USGENERAL70Endometrium'][0]) && $Imaging['USGENERAL70Endometrium'][0] == "Abnormal" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd11">
                                                      Abnormal (>15 mm Adnomyosis)
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
              
                                      <div class="col-lg-12">
                                          <div class="row">
                                          <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Ovaries</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70Ovaries][]" value="Normal" id="formRadiosRightd12"
                                                      {{ isset($Imaging['USGENERAL70Ovaries'][0]) && $Imaging['USGENERAL70Ovaries'][0] == "Normal" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd12">
                                                      Normal 
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70Ovaries][]" value="Abnormal" id="formRadiosRightd13"
                                                      {{ isset($Imaging['USGENERAL70Ovaries'][0]) && $Imaging['USGENERAL70Ovaries'][0] == "Abnormal" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd13">
                                                      Abnormal 
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
              
                                      <div class="col-lg-12">
                                          <div class="row">
                                          <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">PID</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70PID][]" value="YES" id="formRadiosRightd14"
                                                      {{ isset($Imaging['USGENERAL70PID'][0]) && $Imaging['USGENERAL70PID'][0] == "YES" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd14">
                                                      YES 
                                                      
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[USGENERAL70PID][]" value="NO" id="formRadiosRightd15"
                                                      {{ isset($Imaging['USGENERAL70PID'][0]) && $Imaging['USGENERAL70PID'][0] == "NO" ? 'checked' : '' }}
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
                                              <h4>MRCIR48 &gt; <span class="sub_tt__">CT - Uterus / Fibroids Findings </span></h4>
                                          </div>
                                      </div> 
                                      <div class="col-lg-12">
                                          <div class="row">
                                          <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Fibroids</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48Fibroids][]"  value="Single" id="formRadiosRightd16"
                                                      {{ isset($Imaging['MRCIR48Fibroids'][0]) && $Imaging['MRCIR48Fibroids'][0] == "Single" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd16">
                                                      Single
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48Fibroids][]"  value="Multiple" id="formRadiosRightd17"
                                                      {{ isset($Imaging['MRCIR48Fibroids'][0]) && $Imaging['MRCIR48Fibroids'][0] == "Multiple" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd17">
                                                      Multiple
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="row">
                                          <div class="col-lg-4">
                                        <h6 class="mb-3 lut_title">Ovaries</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48Ovaries][]" value="YES" id="formRadiosRightd18"
                                                      {{ isset($Imaging['MRCIR48Ovaries'][0]) && $Imaging['MRCIR48Ovaries'][0] == "YES" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd18">
                                                      YES 
                                                      
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48Ovaries][]" value="NO" id="formRadiosRightd19"
                                                      {{ isset($Imaging['MRCIR48Ovaries'][0]) && $Imaging['MRCIR48Ovaries'][0] == "NO" ? 'checked' : '' }}
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
                                        <h6 class="mb-3 lut_title">Adnexal Mass / Complex Cyst</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48OAdnexalMass][]" value="YES" id="formRadiosRightd20"
                                                      {{ isset($Imaging['MRCIR48OAdnexalMass'][0]) && $Imaging['MRCIR48OAdnexalMass'][0] == "YES" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd20">
                                                      YES 
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48OAdnexalMass][]" value="NO" id="formRadiosRightd21"
                                                      {{ isset($Imaging['MRCIR48OAdnexalMass'][0]) && $Imaging['MRCIR48OAdnexalMass'][0] == "NO" ? 'checked' : '' }}
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
                                        <h6 class="mb-3 lut_title">Pelvic Lymph nodes enlargement / Free Fluid</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48OFreeFluid][]" value="YES" id="formRadiosRightd22"
                                                      {{ isset($Imaging['MRCIR48OFreeFluid'][0]) && $Imaging['MRCIR48OFreeFluid'][0] == "YES" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd22">
                                                      YES 
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48OFreeFluid][]" value="NO" id="formRadiosRightd23"
                                                      {{ isset($Imaging['MRCIR48OFreeFluid'][0]) && $Imaging['MRCIR48OFreeFluid'][0] == "NO" ? 'checked' : '' }}
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
                                        <h6 class="mb-3 lut_title">PID</h6>
                                      </div>
                                      <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48OPID][]" value="YES" id="formRadiosRightd24"
                                                      {{ isset($Imaging['MRCIR48OPID'][0]) && $Imaging['MRCIR48OPID'][0] == "YES" ? 'checked' : '' }}
                                                      >
                                                      <label class="form-check-label" for="formRadiosRightd24">
                                                      YES 
                                                      </label>
                                                  </div>
                                              </div>
              
                                              <div class="col-lg-4">
                                                  <div class="form-check form-check-right mb-3">
                                                      <input class="form-check-input"type="radio" name="Imaging[MRCIR48OPID][]" value="NO" id="formRadiosRightd25"
                                                      {{ isset($Imaging['MRCIR48OPID'][0]) && $Imaging['MRCIR48OPID'][0] == "NO" ? 'checked' : '' }}
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
                                            <h4>Annotate Thyroid / Parathyroid findings</h4>
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
    <h6 class="section_title__">Lab <a href="view-medical-record.php" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a></h6>
  </div>
    <div class="col-lg-12">
      <div class="title_head">
          <h4>LABOVARIANHOTMONES78 &gt; <span class="sub_tt__">Ovarian Reserve Result</span></h4>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="row">
      <div class="col-lg-4">
    <h6 class="mb-3 lut_title">FSH</h6>
  </div>
  <div class="col-lg-4">
              <div class="form-check form-check-right mb-3">
                  <input class="form-check-input"type="radio" name="Lab[FSH][]" value="Normal" id="formRadiosRightd26"
                  {{ isset($Lab['FSH'][0]) && $Lab['FSH'][0] == "Normal" ? 'checked' : '' }}
                  >
                  <label class="form-check-label" for="formRadiosRightd26">
                  Normal
                  </label>
              </div>
          </div>

          <div class="col-lg-4">
              <div class="form-check form-check-right mb-3">
                  <input class="form-check-input"type="radio" name="Lab[FSH][]" value="Abnormal" id="formRadiosRightd27"
                  {{ isset($Lab['FSH'][0]) && $Lab['FSH'][0] == "Abnormal" ? 'checked' : '' }}
                  >
                  <label class="form-check-label" for="formRadiosRightd27">
                  Abnormal 
                  </label>
              </div>
          </div>
      </div>
  </div>

  <div class="col-lg-12">
      <div class="row">
      <div class="col-lg-4">
    <h6 class="mb-3 lut_title">LH</h6>
  </div>
  <div class="col-lg-4">
              <div class="form-check form-check-right mb-3">
                  <input class="form-check-input"type="radio" name="Lab[LH][]" value="Normal" id="formRadiosRightd28"
                  {{ isset($Lab['LH'][0]) && $Lab['LH'][0] == "Normal" ? 'checked' : '' }}
                  >
                  <label class="form-check-label" for="formRadiosRightd28">
                  Normal
                  </label>
              </div>
          </div>

          <div class="col-lg-4">
              <div class="form-check form-check-right mb-3">
                  <input class="form-check-input"type="radio" name="Lab[LH][]" value="Abnormal" id="formRadiosRightd29"
                  {{ isset($Lab['LH'][0]) && $Lab['LH'][0] == "Abnormal" ? 'checked' : '' }}
                  >
                  <label class="form-check-label" for="formRadiosRightd29">
                  Abnormal 
                  </label>
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-12">
      <div class="row">
      <div class="col-lg-4">
    <h6 class="mb-3 lut_title">AMH</h6>
  </div>
  <div class="col-lg-4">
              <div class="form-check form-check-right mb-3">
                  <input class="form-check-input"type="radio" name="Lab[AMH][]" value="Normal" id="formRadiosRightd30"
                  {{ isset($Lab['AMH'][0]) && $Lab['AMH'][0] == "Normal" ? 'checked' : '' }}
                  >
                  <label class="form-check-label" for="formRadiosRightd30">
                  Normal
                  </label>
              </div>
          </div>

          <div class="col-lg-4">
              <div class="form-check form-check-right mb-3">
                  <input class="form-check-input"type="radio" name="Lab[AMH][]" value="Abnormal" id="formRadiosRightd31"
                  {{ isset($Lab['AMH'][0]) && $Lab['AMH'][0] == "Abnormal" ? 'checked' : '' }}
                  >
                  <label class="form-check-label" for="formRadiosRightd31">
                  Abnormal 
                  
                  </label>
              </div>
          </div>
      </div>
  </div>
  





   
      <div class="col-lg-12">
      <div class="title_head">
          <h4>LABRFT12</h4>
      </div>
    </div>
 
  <div class="col-lg-12">
      <div class="row">
      <div class="col-lg-4">
    <h6 class="mb-3 lut_title">Renal Function test (Creatinine | Na | K | urea) Results</h6>
  </div>
          <div class="col-lg-4">
          <div class="form-check form-check-right mb-3">
              <input class="form-check-input"type="radio" name="Lab[RenalFunctiontest][]" value="Abnormal Renal profile (PAE contraindicated)" id="formRadiosRight88"
              {{ isset($Lab['RenalFunctiontest'][0]) && $Lab['RenalFunctiontest'][0] == "Abnormal Renal profile (PAE contraindicated)" ? 'checked' : '' }}
              >
              <label class="form-check-label" for="formRadiosRight88">
              Abnormal Renal profile (PAE contraindicated)
              </label>
          </div>
          </div>
          <div class="col-lg-4">
              <div class="form-check form-check-right mb-3">
                  <input class="form-check-input"type="radio" name="Lab[RenalFunctiontest][]" value="Normal Renal profile" id="formRadiosRight89"
                  {{ isset($Lab['RenalFunctiontest'][0]) && $Lab['RenalFunctiontest'][0] == "Normal Renal profile" ? 'checked' : '' }}
                  >
                  <label class="form-check-label" for="formRadiosRight89">
                  Normal Renal profile
                  </label>
              </div>
          </div>
          <div class="col-lg-12" id="textarea_88">
              <div class="form-check form-check-right mb-3">
                <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***"  style="height: 100px" name="Lab[RenalFunctiontestNote][]">{{ $Lab['RenalFunctiontestNote'][0] ?? '' }}</textarea>
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
      <div class="col-lg-4">
      <h6 class="mb-3 lut_title">Urinalysis Results</h6>
      </div>
          <div class="col-lg-4">
          <div class="form-check form-check-right mb-3">
              <input class="form-check-input"type="radio" name="Lab[UrinalysisResults][]" value="Abnormal Urinanalysis (UAE unfaverable)" id="formRadiosRight76"
              {{ isset($Lab['UrinalysisResults'][0]) && $Lab['UrinalysisResults'][0] == "Abnormal Urinanalysis (UAE unfaverable)" ? 'checked' : '' }}
              >
              <label class="form-check-label" for="formRadiosRight76">
              Abnormal Urinanalysis (UAE unfaverable)
              </label>
          </div>
      </div>
      <div class="col-lg-4">
          <div class="form-check form-check-right mb-3">
              <input class="form-check-input"type="radio" name="Lab[UrinalysisResults][]" value="Normal Urinanalysis" id="formRadiosRight77"
              {{ isset($Lab['UrinalysisResults'][0]) && $Lab['UrinalysisResults'][0] == "Normal Urinanalysis" ? 'checked' : '' }}
              >
              <label class="form-check-label" for="formRadiosRight77">
              Normal Urinanalysis
              </label>
          </div>
      </div>
      <div class="col-lg-12" id="textarea_76">
              <div class="form-check form-check-right mb-3">
                <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***"  style="height: 100px" name="Lab[UrinalysisResultsNote][]">{{ $Lab['UrinalysisResultsNote'][0] ?? '' }}</textarea>
              </div>
          </div>
  </div>


  <div class="col-lg-12">
      <div class="title_head">
          <h4>LABPAPSMEAR185</h4>
      </div>
  </div>

  <div class="col-lg-12">
  <div class="row align-items-center">
      <div class="col-lg-4">
              <h6 class="mb-3 lut_title">PAP SMEAR  Results</h6>
          </div>
              <div class="col-lg-4">
              <div class="form-check form-check-right mb-3">
                  <input class="form-check-input"type="radio" name="Lab[PAPSMEARResults][]" value="Normal PAP smear cervix" id="formRadiosRight82"
                  {{ isset($Lab['PAPSMEARResults'][0]) && $Lab['PAPSMEARResults'][0] == "Normal PAP smear cervix" ? 'checked' : '' }}
                  >
                  <label class="form-check-label" for="formRadiosRight82">
                  Normal PAP smear cervix
                  </label>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="form-check form-check-right mb-3">
                  <input class="form-check-input" type="radio" name="Lab[PAPSMEARResults][]" value="Malignant PAP" id="formRadiosRight83"
                  {{ isset($Lab['PAPSMEARResults'][0]) && $Lab['PAPSMEARResults'][0] == "Malignant PAP" ? 'checked' : '' }}
                  >
                  <label class="form-check-label" for="formRadiosRight83">
                  Malignant PAP 
                  </label>
              </div>
          </div>
          <div class="col-lg-12" id="textarea_83">
              <div class="form-check form-check-right mb-3 ps-0">
                <textarea class="form-control" placeholder="Enter Elaborate Malignant PAP / notes here***"  style="height: 100px" name="Lab[PAPSMEARResultsNote][]" >{{ $Lab['PAPSMEARResultsNote'][0] ?? '' }}</textarea>
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
                                        <h6 class="section_title__">MDT <a target="_blank"  href="{{ route('user.viewUterineEmboEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="title_head">
                                            <h4>MDTREVIEW00 &#62; <span class="sub_tt__">THYROID MDT outcome</span></h4>
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
                                                        {{ isset($MDTs['UFE'][0]) && $MDTs['UFE'][0] == 'UFE' ? 'checked' : '' }}
                                                        name="MDT[UFE][]" value="UFE" id="formRadiosRight84">
                                                    <label class="form-check-label" for="formRadiosRight84">
                                                        UFE
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_84">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate UFE / notes here***" style="height: 100px"
                                                            name="MDT[UFENote][]">{{ $MDTs['UFENote'][0] ?? '' }}</textarea>
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
                                                        name="MDT[Surgical][]"
                                                        {{ isset($MDTs['Surgical'][0]) && $MDTs['Surgical'][0] == 'Surgical' ? 'checked' : '' }}
                                                        value="Surgical" id="formRadiosRight86">
                                                    <label class="form-check-label" for="formRadiosRight86">
                                                        Surgical
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_86">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate Surgical / notes here***" style="height: 100px"
                                                            name="MDT[SurgicalNote][]">{{ $MDTs['SurgicalNote'][0] ?? '' }}</textarea>
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
                                        <h6 class="section_title__">Elegibility STATUS <a target="_blank"  href="{{ route('user.viewUterineEmboEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                                        name="ElegibilitySTATUS[UFE][]"
                                                        {{ isset($ElegibilitySTATUS['UFE'][0]) && $ElegibilitySTATUS['UFE'][0] == 'UFE' ? 'checked' : '' }}
                                                        value="UFE" id="formRadiosRight90">
                                                    <label class="form-check-label" for="formRadiosRight90">
                                                        UFE
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_90">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate     uterine THERMAL ABLATION  (UFE) / notes here***"
                                                            style="height: 100px" name="ElegibilitySTATUS[UFENote][]">
                                                            {{ $ElegibilitySTATUS['UFENote'][0] ?? '' }}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="ElegibilitySTATUS[Medical][]"
                                                        {{ isset($ElegibilitySTATUS['Medical'][0]) && $ElegibilitySTATUS['Medical'][0] == 'Medical' ? 'checked' : '' }}
                                                        value="Medical"
                                                        id="formRadiosRight91">
                                                    <label class="form-check-label" for="formRadiosRight91">
                                                        Medical
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_91">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate    THERMAL ABLATION  Medical  / notes here***"
                                                            style="height: 100px" name="ElegibilitySTATUS[MedicalNote][]">
                                                           {{ $ElegibilitySTATUS['MedicalNote'][0] ?? '' }}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check form-check-right mb-3 ">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="ElegibilitySTATUS[Surgical][]" value="Surgical"
                                                        {{ isset($ElegibilitySTATUS['Surgical'][0]) && $ElegibilitySTATUS['Surgical'][0] == 'Surgical' ? 'checked' : '' }}
                                                        id="formRadiosRight92">
                                                    <label class="form-check-label" for="formRadiosRight92">
                                                        Surgical
                                                    </label>
                                                </div>
                                                <div class="col-lg-12" id="textarea_92">
                                                    <div class="form-check form-check-right mb-3">
                                                        <textarea class="form-control" placeholder="Enter Elaborate   EMBOLIZATION   / notes here***"
                                                            style="height: 100px" name="ElegibilitySTATUS[SurgicalNote][]">
                                                        {{ $ElegibilitySTATUS['SurgicalNote'][0] ?? '' }}
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
                                                target="_blank"  href="{{ route('user.viewUterineEmboEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i
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
                                                        name="Intervention[ANGIOPAE2910][]" value="ANGIOPAE2910"
                                                        {{ isset($Interventions['ANGIOPAE2910'][0]) && $Interventions['ANGIOPAE2910'][0] == 'ANGIOPAE2910' ? 'checked' : '' }}
                                                        id="formRadiosRightb37">
                                                    <label class="form-check-label" for="formRadiosRightb37">
                                                        ANGIOPAE2910
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
                                        <h6 class="section_title__">Supportive <a target="_blank"  href="{{ route('user.viewUterineEmboEligibilityForms',['id'=>@$patient_id ]) }}"
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
                @if (isset($MDTs['UFENote'][0]))
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
                @if (isset($ElegibilitySTATUS['UFENote'][0]))
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

                    $('#TR1_RIGHTDB').remove();
                    $('#TR2_RIGHTDB').remove();
                    $('#TR3_RIGHTDB').remove();
                    $('#TR4_RIGHTDB').remove();
                    $('#TR5_RIGHTDB').remove();
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

                    $('#TR1_LEFTDB').remove();
                    $('#TR2_LEFTDB').remove();
                    $('#TR3_LEFTDB').remove();
                    $('#TR4_LEFTDB').remove();
                    $('#TR5_LEFTDB').remove();
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

    @if (isset($Lab['UrinalysisResultsNote'][0]))
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

            // Heavy Period start  
            var isChecked_sym_a1 = $("#sym_a1").is(":checked");
           
            var sym_a1_durationValue = $("select[name='symptoms[0][1]']").val();
            
            var sym_a1_durationType = $("select[name='symptoms[0][2]']").val();
            var sym_a1_description = $("textarea[name='symptoms[0][3]']").val();

            if (sym_a1_durationValue !== "" || sym_a1_durationType !== "" || sym_a1_description !== "") {
               
                if(isChecked_sym_a1 ===false){
                    
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please fill out Heavy Period fields in Symptoms.',
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
// Heavy Period end  


// Dysmenorrhea start
var isChecked_sym_a2 = $("#sym_a2").is(":checked");
           
           var sym_a2_durationValue = $("select[name='symptoms[1][1]']").val();
           
           var sym_a2_durationType = $("select[name='symptoms[1][2]']").val();
           var sym_a2_description = $("textarea[name='symptoms[1][3]']").val();

           if (sym_a2_durationValue !== "" || sym_a2_durationType !== "" || sym_a2_description !== "") {
              
               if(isChecked_sym_a2 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Dysmenorrhea fields in Symptoms.',
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
// Dysmenorrhea end 



// Compressive symptoms start
var isChecked_sym_a3 = $("#sym_a3").is(":checked");
           
           var sym_a3_durationValue = $("select[name='symptoms[2][1]']").val();
           
           var sym_a3_durationType = $("select[name='symptoms[2][2]']").val();
           var sym_a3_description = $("textarea[name='symptoms[2][3]']").val();

           if (sym_a3_durationValue !== "" || sym_a3_durationType !== "" || sym_a3_description !== "") {
              
               if(isChecked_sym_a3 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Compressive symptoms fields in Symptoms.',
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
// Compressive symptoms end 


//  Compressive symptoms - Constipation start
var isChecked_sym_a4 = $("#sym_a4").is(":checked");
           
           var sym_a4_durationValue = $("select[name='symptoms[3][1]']").val();
           
           var sym_a4_durationType = $("select[name='symptoms[3][2]']").val();
           var sym_a4_description = $("textarea[name='symptoms[3][3]']").val();

           if (sym_a4_durationValue !== "" || sym_a4_durationType !== "" || sym_a4_description !== "") {
              
               if(isChecked_sym_a4 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Compressive symptoms - Constipation fields in Symptoms.',
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
//  Compressive symptoms - Constipation end 



//  Compressive symptoms - Low back pain start
var isChecked_sym_a5 = $("#sym_a5").is(":checked");
           
           var sym_a5_durationValue = $("select[name='symptoms[4][1]']").val();
           
           var sym_a5_durationType = $("select[name='symptoms[4][2]']").val();
           var sym_a5_description = $("textarea[name='symptoms[4][3]']").val();

           if (sym_a5_durationValue !== "" || sym_a5_durationType !== "" || sym_a5_description !== "") {
              
               if(isChecked_sym_a5 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Compressive symptoms - Low back pain fields in Symptoms.',
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
//  Compressive symptoms - Low back pain end 



//  Symptomatic anemia start
var isChecked_sym_a6= $("#sym_a6").is(":checked");
           
           var sym_a6_durationValue = $("select[name='symptoms[5][1]']").val();
           
           var sym_a6_durationType = $("select[name='symptoms[5][2]']").val();
           var sym_a6_description = $("textarea[name='symptoms[5][3]']").val();

           if (sym_a6_durationValue !== "" || sym_a6_durationType !== "" || sym_a6_description !== "") {
              
               if(isChecked_sym_a6 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Symptomatic anemia fields in Symptoms.',
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
//  Symptomatic anemia end 



//  Abdominal mass start
var isChecked_sym_a7 = $("#sym_a7").is(":checked");
           
           var sym_a7_durationValue = $("select[name='symptoms[6][1]']").val();
           
           var sym_a7_durationType = $("select[name='symptoms[6][2]']").val();
           var sym_a7_description = $("textarea[name='symptoms[6][3]']").val();

           if (sym_a7_durationValue !== "" || sym_a7_durationType !== "" || sym_a7_description !== "") {
              
               if(isChecked_sym_a7 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Abdominal mass fields in Symptoms.',
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
//  Abdominal mass end 



//   Recurrent Urinary infections start
var isChecked_sym_a9 = $("#sym_a9").is(":checked");
           
           var sym_a9_durationValue = $("select[name='symptoms[8][1]']").val();
           
           var sym_a9_durationType = $("select[name='symptoms[8][2]']").val();
           var sym_a9_description = $("textarea[name='symptoms[8][3]']").val();

           if (sym_a9_durationValue !== "" || sym_a9_durationType !== "" || sym_a9_description !== "") {
              
               if(isChecked_sym_a9 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out  Recurrent Urinary infections fields in Symptoms.',
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
//   Recurrent Urinary infections end 



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

        
        $("#updateUterineEmboEligibilityForms").submit(function(event) {
            
            event.preventDefault();
            let formData = new FormData(this);
            if (!validateForm()) {
                e.preventDefault(); 
            } 
            else {
                if(validateForm()){

                
                
                $.ajax({
                                url: '{{ route("user.updateUterineEmboEligibilityForms") }}',
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    
                                    var patientId = response.patient_id;
                                    if(response!=''){
              
                                        swal.fire(
              
                                            'Success',
              
                                            'Uterine embo  form updated successfully!',
              
                                            'success'
              
                                        ).then(function() {
                                                
                                               
                                            var redirectUrl = "{{ route('user.viewUterineEmboEligibilityForms', ['id' => ':id']) }}";
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

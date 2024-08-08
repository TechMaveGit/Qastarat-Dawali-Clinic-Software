@extends('back.layout.main_view')
@push('title')
Patient | Spine Pain | QASTARAT & DAWALI CLINICS
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
                <form id="updateSpinePainEligibilityForms" method="POST" action="{{ route('user.updateSpinePainEligibilityForms') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ @$patient_id }}" />
                    <input type="hidden" name="form_type" value="SpinePain" />

                    <h3 class="form_title">Spine Pain</h3>

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
                                                'CervicalRadiculopathy' => ['Cervical - Radiculopathy'],
                                                'CervicalFacetArthropathy' => ['Cervical - Facet Arthropathy'],
                                                'CervicalDiscoProlapse' => ['Cervical - Disco Prolapse'],
                                                'CervicalDiscogenicPain' => ['Cervical - Discogenic Pain'],
                                                'CervicalCordinjury' => ['Cervical - Cord injury'],
                                                'CervicalCanalStenosis' => ['Cervical - Canal Stenosis'],     
                                                'TriggerPointSyndrome' => ['Cervical - Muscle Spasm /Trigger Point Syndrome'],     
                                                'CervicalSpndylolysis' => ['Cervical - Spndylolysis'],     
                                                'CervicalSpndylolylisthesis' => ['Cervical - Spndylolylisthesis'],     
                                                'LumbarRadiculopathy' => ['Lumbar - Radiculopathy'],     
                                                'LumbarFacetArthropathy' => ['Lumbar - Facet Arthropathy'],     
                                                'LumbarDiscoProlapse' => ['Lumbar - Disco Prolapse'],     
                                                'LumbarDiscogenicPain' => ['Lumbar - Discogenic Pain'],     
                                                'LumbarCanalStenosis' => ['Lumbar - Canal Stenosis'],     
                                                'TriggerPointSyndrome2' => ['Lumbar - Muscle Spasm /Trigger Point Syndrome'],     
                                                'LumbarSpndylolysis' => ['Lumbar - Spndylolysis'],     
                                                'Lumbarsacralization' => ['Lumbar sacralization'],     
                                                'LigamentumFlavumHypertrphy' => ['Ligamentum Flavum Hypertrphy'],     
                                                'Sacroilitis' => ['Sacroilitis'],     
                                                'TailBonePain' => ['Tail Bone Pain'],     
                                                'PostherpagicNeuralgia' => ['Post-herpagic Neuralgia'],     
                                                'ThoracicFacetArthropathy' => ['Thoracic - Facet Arthropathy'],     
                                                'ThoracicDiscoProlapse' => ['Thoracic - Disco Prolapse'],     
                                                'ThoracicDiscogenicPain' => ['Thoracic - Discogenic Pain'],     
                                                'ThoracicCanalStenosis' => ['Thoracic - Canal Stenosis'],     
                                                'MuscleSpasmTriggerPointSyndrome' => ['Thoracic - Muscle Spasm /Trigger Point Syndrome'],     
                                                'ThoracicSpndylolysis' => ['Thoracic - Spndylolysis'],     
                                                'ThoracicSpndylolylisthesis' => ['Thoracic - Spndylolylisthe'],     
                                                'VertbralFractureCervical' => ['Vertbral Fracture - Cervical'],     
                                                'VertbralFractureLumbar' => ['Vertbral Fracture - Lumbar'],     
                                                
                                                
                                            ];
                                            $filteredData = array_diff_key($diagnosis_generals, $existingData);
                                        }

                                    @endphp

                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[CervicalRadiculopathy][]" id="formRadiosRight1"
                                                {{ isset($diagnosis_generals['CervicalRadiculopathy']) && in_array('Cervical - Radiculopathy', $diagnosis_generals['CervicalRadiculopathy']) ? 'checked' : '' }}
                                                value="Cervical - Radiculopathy">
                                            <label class="form-check-label" for="formRadiosRight1">
                                                Cervical - Radiculopathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[CervicalFacetArthropathy][]" id="formRadiosRight2"
                                                {{ isset($diagnosis_generals['CervicalFacetArthropathy']) && in_array('Cervical - Facet Arthropathy', $diagnosis_generals['CervicalFacetArthropathy']) ? 'checked' : '' }}
                                                value="Cervical - Facet Arthropathy">
                                            <label class="form-check-label" for="formRadiosRight2">
                                                Cervical - Facet Arthropathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[CervicalDiscoProlapse][]" id="formRadiosRight3"
                                                {{ isset($diagnosis_generals['CervicalDiscoProlapse']) && in_array('Cervical - Disco Prolapse', $diagnosis_generals['CervicalDiscoProlapse']) ? 'checked' : '' }}
                                                value="Cervical - Disco Prolapse">
                                            <label class="form-check-label" for="formRadiosRight3">
                                                Cervical - Disco Prolapse
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[CervicalDiscogenicPain][]" id="formRadiosRight4"
                                                {{ isset($diagnosis_generals['CervicalDiscogenicPain']) && in_array('Cervical - Discogenic Pain', $diagnosis_generals['CervicalDiscogenicPain']) ? 'checked' : '' }}
                                                value="Cervical - Discogenic Pain">
                                            <label class="form-check-label" for="formRadiosRight4">
                                                Cervical - Discogenic Pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[CervicalCordinjury][]" id="formRadiosRight5"
                                                {{ isset($diagnosis_generals['CervicalCordinjury']) && in_array('Cervical - Cord injury', $diagnosis_generals['CervicalCordinjury']) ? 'checked' : '' }}
                                                value="Cervical - Cord injury">
                                            <label class="form-check-label" for="formRadiosRight5">
                                                Cervical - Cord injury
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[CervicalCanalStenosis][]" id="formRadiosRight4CervicalCanalStenosis"
                                                {{ isset($diagnosis_generals['CervicalCanalStenosis']) && in_array('Cervical - Canal Stenosis', $diagnosis_generals['CervicalCanalStenosis']) ? 'checked' : '' }}
                                                value="Cervical - Canal Stenosis">
                                            <label class="form-check-label" for="formRadiosRight4CervicalCanalStenosis">
                                                Cervical - Canal Stenosis
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[TriggerPointSyndrome][]" id="formRadiosRight4TriggerPointSyndrome"
                                                {{ isset($diagnosis_generals['TriggerPointSyndrome']) && in_array('Cervical - Muscle Spasm /Trigger Point Syndrome', $diagnosis_generals['TriggerPointSyndrome']) ? 'checked' : '' }}
                                                value="Cervical - Muscle Spasm /Trigger Point Syndrome">
                                            <label class="form-check-label" for="formRadiosRight4TriggerPointSyndrome">
                                                Cervical - Muscle Spasm /Trigger Point Syndrome
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[CervicalSpndylolysis][]" id="formRadiosRight4CervicalSpndylolysis"
                                                {{ isset($diagnosis_generals['CervicalSpndylolysis']) && in_array('Cervical - Spndylolysis', $diagnosis_generals['CervicalSpndylolysis']) ? 'checked' : '' }}
                                                value="Cervical - Spndylolysis">
                                            <label class="form-check-label" for="formRadiosRight4CervicalSpndylolysis">
                                                Cervical - Spndylolysis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[CervicalSpndylolylisthesis][]" id="formRadiosRight4CervicalSpndylolylisthesis"
                                                {{ isset($diagnosis_generals['CervicalSpndylolylisthesis']) && in_array('Cervical - Spndylolylisthesis', $diagnosis_generals['CervicalSpndylolylisthesis']) ? 'checked' : '' }}
                                                value="Cervical - Spndylolylisthesis">
                                            <label class="form-check-label" for="formRadiosRight4CervicalSpndylolylisthesis">
                                                Cervical - Spndylolylisthesis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LumbarRadiculopathy][]" id="formRadiosRight4LumbarRadiculopathy"
                                                {{ isset($diagnosis_generals['LumbarRadiculopathy']) && in_array('Lumbar - Radiculopathy', $diagnosis_generals['LumbarRadiculopathy']) ? 'checked' : '' }}
                                                value="Lumbar - Radiculopathy">
                                            <label class="form-check-label" for="formRadiosRight4LumbarRadiculopathy">
                                                Lumbar - Radiculopathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LumbarFacetArthropathy][]" id="formRadiosRight4LumbarFacetArthropathy"
                                                {{ isset($diagnosis_generals['LumbarFacetArthropathy']) && in_array('Lumbar - Facet Arthropathy', $diagnosis_generals['LumbarFacetArthropathy']) ? 'checked' : '' }}
                                                value="Lumbar - Facet Arthropathy">
                                            <label class="form-check-label" for="formRadiosRight4LumbarFacetArthropathy">
                                                Lumbar - Facet Arthropathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LumbarDiscoProlapse][]" id="formRadiosRight4LumbarDiscoProlapse"
                                                {{ isset($diagnosis_generals['LumbarDiscoProlapse']) && in_array('Lumbar - Disco Prolapse', $diagnosis_generals['LumbarDiscoProlapse']) ? 'checked' : '' }}
                                                value="Lumbar - Disco Prolapse">
                                            <label class="form-check-label" for="formRadiosRight4LumbarDiscoProlapse">
                                                Lumbar - Disco Prolapse
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LumbarDiscogenicPain][]" id="formRadiosRight4LumbarDiscogenicPain"
                                                {{ isset($diagnosis_generals['LumbarDiscogenicPain']) && in_array('Lumbar - Discogenic Pain', $diagnosis_generals['LumbarDiscogenicPain']) ? 'checked' : '' }}
                                                value="Lumbar - Discogenic Pain">
                                            <label class="form-check-label" for="formRadiosRight4LumbarDiscogenicPain">
                                                Lumbar - Discogenic Pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LumbarCanalStenosis][]" id="formRadiosRight4LumbarCanalStenosis"
                                                {{ isset($diagnosis_generals['LumbarCanalStenosis']) && in_array('Lumbar - Canal Stenosis', $diagnosis_generals['LumbarCanalStenosis']) ? 'checked' : '' }}
                                                value="Lumbar - Canal Stenosis">
                                            <label class="form-check-label" for="formRadiosRight4LumbarCanalStenosis">
                                                Lumbar - Canal Stenosis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[TriggerPointSyndrome2][]" id="formRadiosRight4TriggerPointSyndrome2"
                                                {{ isset($diagnosis_generals['TriggerPointSyndrome2']) && in_array('Lumbar - Muscle Spasm /Trigger Point Syndrome', $diagnosis_generals['TriggerPointSyndrome2']) ? 'checked' : '' }}
                                                value="Lumbar - Muscle Spasm /Trigger Point Syndrome">
                                            <label class="form-check-label" for="formRadiosRight4TriggerPointSyndrome2">
                                                Lumbar - Muscle Spasm /Trigger Point Syndrome
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LumbarSpndylolysis][]" id="formRadiosRight4LumbarSpndylolysis"
                                                {{ isset($diagnosis_generals['LumbarSpndylolysis']) && in_array('Lumbar - Spndylolysis', $diagnosis_generals['LumbarSpndylolysis']) ? 'checked' : '' }}
                                                value="Lumbar - Spndylolysis">
                                            <label class="form-check-label" for="formRadiosRight4LumbarSpndylolysis">
                                                Lumbar - Spndylolysis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Lumbarsacralization][]" id="formRadiosRight4Lumbarsacralization"
                                                {{ isset($diagnosis_generals['Lumbarsacralization']) && in_array('Lumbar sacralization', $diagnosis_generals['Lumbarsacralization']) ? 'checked' : '' }}
                                                value="Lumbar sacralization">
                                            <label class="form-check-label" for="formRadiosRight4Lumbarsacralization">
                                                Lumbar sacralization
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LigamentumFlavumHypertrphy][]" id="formRadiosRight4LigamentumFlavumHypertrphy"
                                                {{ isset($diagnosis_generals['LigamentumFlavumHypertrphy']) && in_array('Ligamentum Flavum Hypertrphy', $diagnosis_generals['LigamentumFlavumHypertrphy']) ? 'checked' : '' }}
                                                value="Ligamentum Flavum Hypertrphy">
                                            <label class="form-check-label" for="formRadiosRight4LigamentumFlavumHypertrphy">
                                                Ligamentum Flavum Hypertrphy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Sacroilitis][]" id="formRadiosRight4Sacroilitis"
                                                {{ isset($diagnosis_generals['Sacroilitis']) && in_array('Sacroilitis', $diagnosis_generals['Sacroilitis']) ? 'checked' : '' }}
                                                value="Sacroilitis">
                                            <label class="form-check-label" for="formRadiosRight4Sacroilitis">
                                                Sacroilitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[TailBonePain][]" id="formRadiosRight4TailBonePain"
                                                {{ isset($diagnosis_generals['TailBonePain']) && in_array('Tail Bone Pain', $diagnosis_generals['TailBonePain']) ? 'checked' : '' }}
                                                value="Tail Bone Pain">
                                            <label class="form-check-label" for="formRadiosRight4TailBonePain">
                                                Tail Bone Pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[PostherpagicNeuralgia][]" id="formRadiosRight4PostherpagicNeuralgia"
                                                {{ isset($diagnosis_generals['PostherpagicNeuralgia']) && in_array('Post-herpagic Neuralgia', $diagnosis_generals['PostherpagicNeuralgia']) ? 'checked' : '' }}
                                                value="Post-herpagic Neuralgia">
                                            <label class="form-check-label" for="formRadiosRight4PostherpagicNeuralgia">
                                                Post-herpagic Neuralgia
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ThoracicFacetArthropathy][]" id="formRadiosRight4ThoracicFacetArthropathy"
                                                {{ isset($diagnosis_generals['ThoracicFacetArthropathy']) && in_array('Thoracic - Facet Arthropathy', $diagnosis_generals['ThoracicFacetArthropathy']) ? 'checked' : '' }}
                                                value="Thoracic - Facet Arthropathy">
                                            <label class="form-check-label" for="formRadiosRight4ThoracicFacetArthropathy">
                                                Thoracic - Facet Arthropathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ThoracicDiscoProlapse][]" id="formRadiosRight4ThoracicDiscoProlapse"
                                                {{ isset($diagnosis_generals['ThoracicDiscoProlapse']) && in_array('Thoracic - Disco Prolapse', $diagnosis_generals['ThoracicDiscoProlapse']) ? 'checked' : '' }}
                                                value="Thoracic - Disco Prolapse">
                                            <label class="form-check-label" for="formRadiosRight4ThoracicDiscoProlapse">
                                                Thoracic - Disco Prolapse
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ThoracicDiscogenicPain][]" id="formRadiosRight4ThoracicDiscogenicPain"
                                                {{ isset($diagnosis_generals['ThoracicDiscogenicPain']) && in_array('Thoracic - Discogenic Pain', $diagnosis_generals['ThoracicDiscogenicPain']) ? 'checked' : '' }}
                                                value="Thoracic - Discogenic Pain">
                                            <label class="form-check-label" for="formRadiosRight4ThoracicDiscogenicPain">
                                                Thoracic - Discogenic Pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ThoracicCanalStenosis][]" id="formRadiosRight4ThoracicCanalStenosis"
                                                {{ isset($diagnosis_generals['ThoracicCanalStenosis']) && in_array('Thoracic - Canal Stenosis', $diagnosis_generals['ThoracicCanalStenosis']) ? 'checked' : '' }}
                                                value="Thoracic - Canal Stenosis">
                                            <label class="form-check-label" for="formRadiosRight4ThoracicCanalStenosis">
                                                Thoracic - Canal Stenosis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[MuscleSpasmTriggerPointSyndrome][]" id="formRadiosRight4MuscleSpasmTriggerPointSyndrome"
                                                {{ isset($diagnosis_generals['MuscleSpasmTriggerPointSyndrome']) && in_array('Thoracic - Muscle Spasm /Trigger Point Syndrome', $diagnosis_generals['MuscleSpasmTriggerPointSyndrome']) ? 'checked' : '' }}
                                                value="Thoracic - Muscle Spasm /Trigger Point Syndrome">
                                            <label class="form-check-label" for="formRadiosRight4MuscleSpasmTriggerPointSyndrome">
                                                Thoracic - Muscle Spasm /Trigger Point Syndrome
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ThoracicSpndylolysis][]" id="formRadiosRight4ThoracicSpndylolysis"
                                                {{ isset($diagnosis_generals['ThoracicSpndylolysis']) && in_array('Thoracic - Spndylolysis', $diagnosis_generals['ThoracicSpndylolysis']) ? 'checked' : '' }}
                                                value="Thoracic - Spndylolysis">
                                            <label class="form-check-label" for="formRadiosRight4ThoracicSpndylolysis">
                                                Thoracic - Spndylolysis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ThoracicSpndylolylisthesis][]" id="formRadiosRight4ThoracicSpndylolylisthesis"
                                                {{ isset($diagnosis_generals['ThoracicSpndylolylisthesis']) && in_array('Thoracic - Spndylolylisthe', $diagnosis_generals['ThoracicSpndylolylisthesis']) ? 'checked' : '' }}
                                                value="Thoracic - Spndylolylisthe">
                                            <label class="form-check-label" for="formRadiosRight4ThoracicSpndylolylisthesis">
                                                Thoracic - Spndylolylisthe
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[VertbralFractureCervical][]" id="formRadiosRight4VertbralFractureCervical"
                                                {{ isset($diagnosis_generals['VertbralFractureCervical']) && in_array('Vertbral Fracture - Cervical', $diagnosis_generals['VertbralFractureCervical']) ? 'checked' : '' }}
                                                value="Vertbral Fracture - Cervical">
                                            <label class="form-check-label" for="formRadiosRight4VertbralFractureCervical">
                                                Vertbral Fracture - Cervical
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="diagnosis_general_checkbox">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[VertbralFractureLumbar][]" id="formRadiosRight4VertbralFractureLumbar"
                                                {{ isset($diagnosis_generals['VertbralFractureLumbar']) && in_array('Vertbral Fracture - Lumbar', $diagnosis_generals['VertbralFractureLumbar']) ? 'checked' : '' }}
                                                value="Vertbral Fracture - Lumbar">
                                            <label class="form-check-label" for="formRadiosRight4VertbralFractureLumbar">
                                                Vertbral Fracture - Lumbar
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
                                                'G541' => ['G54.1 Lumbosacral plexus disorders, Neuropathy, neuropathic lumbar plexus'],
                                                'G551' => ['G55.1 Nerve root and plexus compressions in intervertebral disc disorders, Neuritis|due to herniation, nucleus pulposus |lumbar, lumbosacral'],
                                                'M478cervical' => ['M47.8 Other spondylosis , Spondylosis cervical'],
                                                'M478lumbar' => ['M47.8 Other spondylosis, Spondylosis| lumbar'],
                                                'M500' => ['M50.0 Cervical disc disorder with myelopathy'],
                                                'M501' => ['M50.1 Cervical disc disorder with radiculopathy'],
                                                'M502' => ['M50.2 Other cervical disc displacement'],
                                                'M503' => ['M50.3 Other cervical disc degeneration'],
                                                'M508' => ['M50.8 Other cervical disc disorders'],
                                                'M509' => ['M50.9 Cervical disc disorder, unspecified'],
                                                'M51' => ['M51 Other intervertebral disc disorders, thoracic, thoracolumbar and lumbosacral disc disorders'],
                                                'M510' => ['M51.0 Lumbar and other intervertebral disc disorders with myelopathy'],
                                                'M511' => ['M51.1 Lumbar and other intervertebral disc disorders with radiculopathy'],
                                                'M512' => ['M51.2 Other specified intervertebral disc displacement'],
                                                'M519' => ['M51.9 Intervertebral disc disorder, unspecified Disease, diseased|intervertebral disk|lumbar, lumbosacral (with)'],
                                                'M541' => ['M54.1 Radiculopathy , Neuritis or radiculitis: lumbar NOS'],
                                                'M542' => ['M54.2 Cervicalgia'],
                                                'M530' => ['M53.0 Cervicocranial syndrome'],
                                                'M545' => ['M54.5 Low back pain, Pain(s) lumbar region'],
                                                'Q765' => ['Q76.5 Cervical rib'],
                                                'S122' => ['S12.2 Fracture of other specified cervical vertebra'],
                                                'S127' => ['S12.7 Multiple fractures of cervical spine'],
                                                'S131' => ['S13.1 Dislocation of cervical vertebra'],
                                                'S134' => ['S13.4 Sprain and strain of cervical spine'],
                                                'S141' => ['S14.1 Other and unspecified injuries of cervical spinal cord a'],
                                                'S300' => ['S30.0 Contusion of lower back and pelvis'],
                                                'S32' => ['S32 Fracture of lumbar spine and pelvis'],
                                                'S320' => ['S32.0 Fracture of lumbar vertebra'],
                                                'S327' => ['S32.7 Multiple fractures of lumbar spine and pelvis'],
                                                'S328' => ['S32.8 Fracture of other and unspecified parts of lumbar spine and pelvis'],
                                                'S33' => ['S33 Dislocation, sprain and strain of joints and ligaments of lumbar spine and pelvis'],
                                                'S330' => ['S33.0 Traumatic rupture of lumbar intervertebral disc'],
                                                'S331' => ['S33.1 Dislocation of lumbar vertebra'],
                                                'S333' => ['S33.3 Dislocation of other and unspecified parts of lumbar spine and pelvis'],
                                                'S335' => ['S33.5 Sprain and strain of lumbar spine'],
                                                'S337' => ['S33.7 Sprain and strain of other and unspecified parts of lumbar spine and pelvis'],
                                                'S340' => ['S34.0 Concussion and oedema of lumbar spinal cord'],
                                                'S341' => ['S34.1 Other injury of lumbar spinal cord'],
                                                'S342' => ['S34.2 Injury of nerve root of lumbar and sacral spine'],
                                                'S344' => ['S34.4 Injury of lumbosacral plexus'],
                                                'S345' => ['S34.5 Injury of lumbar, sacral and pelvic sympathetic nerves'],
                                                
                                                
                                               
                                            ];
                                            $filteredData = array_diff_key($diagnosis_cids, $existingData);
                                        }

                                    @endphp
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[G541][]"
                                                id="formRadiosRight8" value="G54.1 Lumbosacral plexus disorders, Neuropathy, neuropathic lumbar plexus"
                                                {{ isset($diagnosis_cids['G541']) && in_array('G54.1 Lumbosacral plexus disorders, Neuropathy, neuropathic lumbar plexus', $diagnosis_cids['G541']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight8">
                                                G54.1 Lumbosacral plexus disorders, Neuropathy, neuropathic lumbar plexus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[G551][]"
                                                id="formRadiosRight9" value="G55.1 Nerve root and plexus compressions in intervertebral disc disorders, Neuritis|due to herniation, nucleus pulposus |lumbar, lumbosacral"
                                                {{ isset($diagnosis_cids['G551']) && in_array('G55.1 Nerve root and plexus compressions in intervertebral disc disorders, Neuritis|due to herniation, nucleus pulposus |lumbar, lumbosacral', $diagnosis_cids['G551']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight9">
                                                G55.1 Nerve root and plexus compressions in intervertebral disc disorders, Neuritis|due to herniation, nucleus pulposus |lumbar, lumbosacral
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M478cervical][]"
                                                id="formRadiosRight10" value="M47.8 Other spondylosis , Spondylosis cervical"
                                                {{ isset($diagnosis_cids['M478cervical']) && in_array('M47.8 Other spondylosis , Spondylosis cervical', $diagnosis_cids['M478cervical']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight10">
                                                M47.8 Other spondylosis , Spondylosis cervical
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M478lumbar][]"
                                                id="formRadiosRight11M478lumbar" value="M47.8 Other spondylosis, Spondylosis| lumbar"
                                                {{ isset($diagnosis_cids['M478lumbar']) && in_array('M47.8 Other spondylosis, Spondylosis| lumbar', $diagnosis_cids['M478lumbar']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight11M478lumbar">
                                                M47.8 Other spondylosis, Spondylosis| lumbar
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M500][]"
                                                id="formRadiosRight12M500" value="M50.0 Cervical disc disorder with myelopathy"
                                                {{ isset($diagnosis_cids['M500']) && in_array('M50.0 Cervical disc disorder with myelopathy', $diagnosis_cids['M500']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight12M500">
                                                M50.0 Cervical disc disorder with myelopathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M502][]"
                                                id="formRadiosRight13M502" value="M50.2 Other cervical disc displacement"
                                                {{ isset($diagnosis_cids['M502']) && in_array('M50.2 Other cervical disc displacement', $diagnosis_cids['M502']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M502">
                                                M50.2 Other cervical disc displacement
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M503][]"
                                                id="formRadiosRight13M503" value="M50.3 Other cervical disc degeneration"
                                                {{ isset($diagnosis_cids['M503']) && in_array('M50.3 Other cervical disc degeneration', $diagnosis_cids['M503']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M503">
                                                M50.3 Other cervical disc degeneration
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M508][]"
                                                id="formRadiosRight13M508" value="M50.8 Other cervical disc disorders"
                                                {{ isset($diagnosis_cids['M508']) && in_array('M50.8 Other cervical disc disorders', $diagnosis_cids['M508']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M508">
                                                M50.8 Other cervical disc disorders
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M509][]"
                                                id="formRadiosRight13M509" value="M50.9 Cervical disc disorder, unspecified"
                                                {{ isset($diagnosis_cids['M509']) && in_array('M50.9 Cervical disc disorder, unspecified', $diagnosis_cids['M509']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M509">
                                                M50.9 Cervical disc disorder, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M51][]"
                                                id="formRadiosRight13M51" value="M51 Other intervertebral disc disorders, thoracic, thoracolumbar and lumbosacral disc disorders"
                                                {{ isset($diagnosis_cids['M51']) && in_array('M51 Other intervertebral disc disorders, thoracic, thoracolumbar and lumbosacral disc disorders', $diagnosis_cids['M51']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M51">
                                                M51 Other intervertebral disc disorders, thoracic, thoracolumbar and lumbosacral disc disorders
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M510][]"
                                                id="formRadiosRight13M510" value="M51.0 Lumbar and other intervertebral disc disorders with myelopathy"
                                                {{ isset($diagnosis_cids['M510']) && in_array('M51.0 Lumbar and other intervertebral disc disorders with myelopathy', $diagnosis_cids['M510']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M510">
                                                M51.0 Lumbar and other intervertebral disc disorders with myelopathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M511][]"
                                                id="formRadiosRight13M511" value="M51.1 Lumbar and other intervertebral disc disorders with radiculopathy"
                                                {{ isset($diagnosis_cids['M511']) && in_array('M51.1 Lumbar and other intervertebral disc disorders with radiculopathy', $diagnosis_cids['M511']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M511">
                                                M51.1 Lumbar and other intervertebral disc disorders with radiculopathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M512][]"
                                                id="formRadiosRight13M512" value="M51.2 Other specified intervertebral disc displacement"
                                                {{ isset($diagnosis_cids['M512']) && in_array('M51.2 Other specified intervertebral disc displacement', $diagnosis_cids['M512']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M512">
                                                M51.2 Other specified intervertebral disc displacement
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M519][]"
                                                id="formRadiosRight13M519" value="M51.9 Intervertebral disc disorder, unspecified Disease, diseased|intervertebral disk|lumbar, lumbosacral (with)"
                                                {{ isset($diagnosis_cids['M519']) && in_array('M51.9 Intervertebral disc disorder, unspecified Disease, diseased|intervertebral disk|lumbar, lumbosacral (with)', $diagnosis_cids['M519']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M519">
                                                M51.9 Intervertebral disc disorder, unspecified Disease, diseased|intervertebral disk|lumbar, lumbosacral (with)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M541][]"
                                                id="formRadiosRight13M541" value="M54.1 Radiculopathy , Neuritis or radiculitis: lumbar NOS"
                                                {{ isset($diagnosis_cids['M541']) && in_array('M54.1 Radiculopathy , Neuritis or radiculitis: lumbar NOS', $diagnosis_cids['M541']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M541">
                                                M54.1 Radiculopathy , Neuritis or radiculitis: lumbar NOS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M542][]"
                                                id="formRadiosRight13M542" value="M54.2 Cervicalgia"
                                                {{ isset($diagnosis_cids['M542']) && in_array('M54.2 Cervicalgia', $diagnosis_cids['M542']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M542">
                                                M54.2 Cervicalgia
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M530][]"
                                                id="formRadiosRight13M530" value="M53.0 Cervicocranial syndrome"
                                                {{ isset($diagnosis_cids['M530']) && in_array('M53.0 Cervicocranial syndrome', $diagnosis_cids['M530']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M530">
                                                M53.0 Cervicocranial syndrome
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M545][]"
                                                id="formRadiosRight13M545" value="M54.5 Low back pain, Pain(s) lumbar region"
                                                {{ isset($diagnosis_cids['M545']) && in_array('M54.5 Low back pain, Pain(s) lumbar region', $diagnosis_cids['M545']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13M545">
                                                M54.5 Low back pain, Pain(s) lumbar region
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Q765][]"
                                                id="formRadiosRight13Q765" value="Q76.5 Cervical rib"
                                                {{ isset($diagnosis_cids['Q765']) && in_array('Q76.5 Cervical rib', $diagnosis_cids['Q765']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13Q765">
                                                Q76.5 Cervical rib
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S122][]"
                                                id="formRadiosRight13S122" value="S12.2 Fracture of other specified cervical vertebra"
                                                {{ isset($diagnosis_cids['S122']) && in_array('S12.2 Fracture of other specified cervical vertebra', $diagnosis_cids['S122']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S122">
                                                S12.2 Fracture of other specified cervical vertebra
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S127][]"
                                                id="formRadiosRight13S127" value="S12.7 Multiple fractures of cervical spine"
                                                {{ isset($diagnosis_cids['S127']) && in_array('S12.7 Multiple fractures of cervical spine', $diagnosis_cids['S127']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S127">
                                                S12.7 Multiple fractures of cervical spine
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S131][]"
                                                id="formRadiosRight13S131" value="S13.1 Dislocation of cervical vertebra"
                                                {{ isset($diagnosis_cids['S131']) && in_array('S13.1 Dislocation of cervical vertebra', $diagnosis_cids['S131']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S131">
                                                S13.1 Dislocation of cervical vertebra
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S134][]"
                                                id="formRadiosRight13S134" value="S13.4 Sprain and strain of cervical spine"
                                                {{ isset($diagnosis_cids['S134']) && in_array('S13.4 Sprain and strain of cervical spine', $diagnosis_cids['S134']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S134">
                                                S13.4 Sprain and strain of cervical spine
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S141][]"
                                                id="formRadiosRight13S141" value="S14.1 Other and unspecified injuries of cervical spinal cord a"
                                                {{ isset($diagnosis_cids['S141']) && in_array('S14.1 Other and unspecified injuries of cervical spinal cord a', $diagnosis_cids['S141']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S141">
                                                S14.1 Other and unspecified injuries of cervical spinal cord a
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S300][]"
                                                id="formRadiosRight13S300" value="S30.0 Contusion of lower back and pelvis"
                                                {{ isset($diagnosis_cids['S300']) && in_array('S30.0 Contusion of lower back and pelvis', $diagnosis_cids['S300']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S300">
                                                S30.0 Contusion of lower back and pelvis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S32][]"
                                                id="formRadiosRight13S32" value="S32 Fracture of lumbar spine and pelvis"
                                                {{ isset($diagnosis_cids['S32']) && in_array('S32 Fracture of lumbar spine and pelvis', $diagnosis_cids['S32']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S32">
                                                S32 Fracture of lumbar spine and pelvis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S320][]"
                                                id="formRadiosRight13S320" value="S32.0 Fracture of lumbar vertebra"
                                                {{ isset($diagnosis_cids['S320']) && in_array('S32.0 Fracture of lumbar vertebra', $diagnosis_cids['S320']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S320">
                                                S32.0 Fracture of lumbar vertebra
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S327][]"
                                                id="formRadiosRight13S327" value="S32.7 Multiple fractures of lumbar spine and pelvis"
                                                {{ isset($diagnosis_cids['S327']) && in_array('S32.7 Multiple fractures of lumbar spine and pelvis', $diagnosis_cids['S327']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S327">
                                                S32.7 Multiple fractures of lumbar spine and pelvis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S328][]"
                                                id="formRadiosRight13S328" value="S32.8 Fracture of other and unspecified parts of lumbar spine and pelvis"
                                                {{ isset($diagnosis_cids['S328']) && in_array('S32.8 Fracture of other and unspecified parts of lumbar spine and pelvis', $diagnosis_cids['S328']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S328">
                                                S32.8 Fracture of other and unspecified parts of lumbar spine and pelvis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S33][]"
                                                id="formRadiosRight13S33" value="S33 Dislocation, sprain and strain of joints and ligaments of lumbar spine and pelvis"
                                                {{ isset($diagnosis_cids['S33']) && in_array('S33 Dislocation, sprain and strain of joints and ligaments of lumbar spine and pelvis', $diagnosis_cids['S33']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S33">
                                                S33 Dislocation, sprain and strain of joints and ligaments of lumbar spine and pelvis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S330][]"
                                                id="formRadiosRight13S330" value="S33.0 Traumatic rupture of lumbar intervertebral disc"
                                                {{ isset($diagnosis_cids['S330']) && in_array('S33.0 Traumatic rupture of lumbar intervertebral disc', $diagnosis_cids['S330']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S330">
                                                S33.0 Traumatic rupture of lumbar intervertebral disc
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S331][]"
                                                id="formRadiosRight13S331" value="S33.1 Dislocation of lumbar vertebra"
                                                {{ isset($diagnosis_cids['S331']) && in_array('S33.1 Dislocation of lumbar vertebra', $diagnosis_cids['S331']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S331">
                                                S33.1 Dislocation of lumbar vertebra
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S333][]"
                                                id="formRadiosRight13S333" value="S33.3 Dislocation of other and unspecified parts of lumbar spine and pelvis"
                                                {{ isset($diagnosis_cids['S333']) && in_array('S33.3 Dislocation of other and unspecified parts of lumbar spine and pelvis', $diagnosis_cids['S333']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S333">
                                                S33.3 Dislocation of other and unspecified parts of lumbar spine and pelvis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S335][]"
                                                id="formRadiosRight13S335" value="S33.5 Sprain and strain of lumbar spine"
                                                {{ isset($diagnosis_cids['S335']) && in_array('S33.5 Sprain and strain of lumbar spine', $diagnosis_cids['S335']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S335">
                                                S33.5 Sprain and strain of lumbar spine
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S337][]"
                                                id="formRadiosRight13S337" value="S33.7 Sprain and strain of other and unspecified parts of lumbar spine and pelvis"
                                                {{ isset($diagnosis_cids['S337']) && in_array('S33.7 Sprain and strain of other and unspecified parts of lumbar spine and pelvis', $diagnosis_cids['S337']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S337">
                                                S33.7 Sprain and strain of other and unspecified parts of lumbar spine and pelvis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S340][]"
                                                id="formRadiosRight13S340" value="S34.0 Concussion and oedema of lumbar spinal cord"
                                                {{ isset($diagnosis_cids['S340']) && in_array('S34.0 Concussion and oedema of lumbar spinal cord', $diagnosis_cids['S340']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S340">
                                                S34.0 Concussion and oedema of lumbar spinal cord
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S341][]"
                                                id="formRadiosRight13S341" value="S34.1 Other injury of lumbar spinal cord"
                                                {{ isset($diagnosis_cids['S341']) && in_array('S34.1 Other injury of lumbar spinal cord', $diagnosis_cids['S341']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S341">
                                                S34.1 Other injury of lumbar spinal cord
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S342][]"
                                                id="formRadiosRight13S342" value="S34.2 Injury of nerve root of lumbar and sacral spine"
                                                {{ isset($diagnosis_cids['S342']) && in_array('S34.2 Injury of nerve root of lumbar and sacral spine', $diagnosis_cids['S342']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S342">
                                                S34.2 Injury of nerve root of lumbar and sacral spine
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S344][]"
                                                id="formRadiosRight13S344" value="S34.4 Injury of lumbosacral plexus"
                                                {{ isset($diagnosis_cids['S344']) && in_array('S34.4 Injury of lumbosacral plexus', $diagnosis_cids['S344']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S344">
                                                S34.4 Injury of lumbosacral plexus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="Postpartum_thyroiditis">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S345][]"
                                                id="formRadiosRight13S345" value="S34.5 Injury of lumbar, sacral and pelvic sympathetic nerves"
                                                {{ isset($diagnosis_cids['S345']) && in_array('S34.5 Injury of lumbar, sacral and pelvic sympathetic nerves', $diagnosis_cids['S345']) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formRadiosRight13S345">
                                                S34.5 Injury of lumbar, sacral and pelvic sympathetic nerves
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
                                                                if ($symptom['SymptomType'] === 'Low back pain - 1 side') {
                                                                   
                                                                    $disfiguringSymptoms1 = $symptom;
                                                                    // dd(gettype($disfiguringSymptoms1),'array',$disfiguringSymptoms1);
                                                                }elseif ($symptom['SymptomType'] === 'Low back pain - Bilateral') {
                                                                    $disfiguringSymptoms2 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Pain radiates to leg') {
                                                                    $disfiguringSymptoms3 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Distal leg numbess') {
                                                                    $disfiguringSymptoms4 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'feet burning at night / rest') {
                                                                    $disfiguringSymptoms5 = $symptom;
                                                                }elseif ($symptom['SymptomType'] === 'Leg spasm / tightness on walking') {
                                                                    $disfiguringSymptoms6 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Pain interfering with sleep') {
                                                                    $disfiguringSymptoms7 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Priking pain on turning from side to side') {
                                                                    $disfiguringSymptoms8 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'Lower back muscle spasm') {
                                                                    $disfiguringSymptoms9 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'loss of urinary / bowel muscle control') {
                                                                    $disfiguringSymptoms10 = $symptom;
                                                                }
                                                                elseif ($symptom['SymptomType'] === 'leg weakness') {
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
                                                        value="Low back pain - 1 side"
                                                        
                                                        {{ isset($disfiguringSymptoms1['SymptomType']) && $disfiguringSymptoms1['SymptomType'] === 'Low back pain - 1 side' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a1">
                                                        Low back pain - 1 side
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
                                                        name="symptoms[1][0]" id="sym_a2" value="Low back pain - Bilateral"
                                                        {{ isset($disfiguringSymptoms2['SymptomType']) && $disfiguringSymptoms2['SymptomType'] == 'Low back pain - Bilateral' ? 'checked' : '' }}

                                                        >
                                                    <label class="form-check-label" for="sym_a2">
                                                        Low back pain - Bilateral
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
                                                        name="symptoms[2][0]" value="Pain radiates to leg"
                                                        {{ isset($disfiguringSymptoms3['SymptomType']) && $disfiguringSymptoms3['SymptomType'] == 'Pain radiates to leg' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a3">
                                                        Pain radiates to leg
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
                                                        value="Distal leg numbess"
                                                        {{ isset($disfiguringSymptoms4['SymptomType']) && $disfiguringSymptoms4['SymptomType'] == 'Distal leg numbess' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a4">
                                                        Distal leg numbess
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
                                                        name="symptoms[4][0]" id="sym_a5" value="feet burning at night / rest"
                                                        {{ isset($disfiguringSymptoms5['SymptomType']) && $disfiguringSymptoms5['SymptomType'] == 'feet burning at night / rest' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a5">
                                                        feet burning at night / rest
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
                                                        value="Leg spasm / tightness on walking"
                                                        {{ isset($disfiguringSymptoms6['SymptomType']) && $disfiguringSymptoms6['SymptomType'] == 'Leg spasm / tightness on walking' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_a6">
                                                        Leg spasm / tightness on walking
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
                                                        value="Pain interfering with sleep"
                                                        {{ isset($disfiguringSymptoms7['SymptomType']) && $disfiguringSymptoms7['SymptomType'] == 'Pain interfering with sleep' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_aa6">
                                                        Pain interfering with sleep
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
                                                        value="Priking pain on turning from side to side"
                                                        {{ isset($disfiguringSymptoms8['SymptomType']) && $disfiguringSymptoms8['SymptomType'] == 'Priking pain on turning from side to side' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_aaa6">
                                                        Priking pain on turning from side to side
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
                                                        value="Lower back muscle spasm"
                                                        {{ isset($disfiguringSymptoms9['SymptomType']) && $disfiguringSymptoms9['SymptomType'] == 'Lower back muscle spasm' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_aaaa61">
                                                        Lower back muscle spasm
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
                                                        value="loss of urinary / bowel muscle control"
                                                        {{ isset($disfiguringSymptoms10['SymptomType']) && $disfiguringSymptoms10['SymptomType'] == 'loss of urinary / bowel muscle control' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_aaaa62">
                                                        loss of urinary / bowel muscle control
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
                                                        name="symptoms[10][0]" id="sym_aaaa621"
                                                        value="leg weakness"
                                                        {{ isset($disfiguringSymptoms11['SymptomType']) && $disfiguringSymptoms11['SymptomType'] == 'leg weakness' ? 'checked' : '' }}
                                                        >
                                                    <label class="form-check-label" for="sym_aaaa621">
                                                        leg weakness
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
                                                    <td>Low back pain - 1 side</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowbackpainside][]"
                                                                id="formRadiosRight14" value="0"
                                                                {{ isset($symptoms_scores['Lowbackpainside'][0]) && $symptoms_scores['Lowbackpainside'][0] == 0 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight14">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowbackpainside][]"
                                                                id="formRadiosRight15" value="1"
                                                                {{ isset($symptoms_scores['Lowbackpainside'][0]) && $symptoms_scores['Lowbackpainside'][0] == 1 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight15">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowbackpainside][]"
                                                                id="formRadiosRight16" value="3"
                                                                {{ isset($symptoms_scores['Lowbackpainside'][0]) && $symptoms_scores['Lowbackpainside'][0] == 3 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight16">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowbackpainside][]"
                                                                id="formRadiosRight17" value="5"
                                                                {{ isset($symptoms_scores['Lowbackpainside'][0]) && $symptoms_scores['Lowbackpainside'][0] == 5 ? 'checked' : '' }}>


                                                            <label class="form-check-label" for="formRadiosRight17">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Low back pain - Bilateral</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[LowbackpainBilateral][]"
                                                                id="formRadiosRight18" value="0"
                                                                {{ isset($symptoms_scores['LowbackpainBilateral'][0]) && $symptoms_scores['LowbackpainBilateral'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight18">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[LowbackpainBilateral][]"
                                                                id="formRadiosRight19" value="1"
                                                                {{ isset($symptoms_scores['LowbackpainBilateral'][0]) && $symptoms_scores['LowbackpainBilateral'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight19">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[LowbackpainBilateral][]"
                                                                id="formRadiosRight20" value="3"
                                                                {{ isset($symptoms_scores['LowbackpainBilateral'][0]) && $symptoms_scores['LowbackpainBilateral'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight20">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[LowbackpainBilateral][]"
                                                                id="formRadiosRight21" value="5"
                                                                {{ isset($symptoms_scores['LowbackpainBilateral'][0]) && $symptoms_scores['LowbackpainBilateral'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight21">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pain radiates to leg</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painradiatestoleg][]"
                                                                id="formRadiosRight22" value="0"
                                                                {{ isset($symptoms_scores['Painradiatestoleg'][0]) && $symptoms_scores['Painradiatestoleg'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight22">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painradiatestoleg][]"
                                                                id="formRadiosRight23" value="1"
                                                                {{ isset($symptoms_scores['Painradiatestoleg'][0]) && $symptoms_scores['Painradiatestoleg'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight23">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painradiatestoleg][]"
                                                                id="formRadiosRight24" value="3"
                                                                {{ isset($symptoms_scores['Painradiatestoleg'][0]) && $symptoms_scores['Painradiatestoleg'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight24">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painradiatestoleg][]"
                                                                id="formRadiosRight25" value="5"
                                                                {{ isset($symptoms_scores['Painradiatestoleg'][0]) && $symptoms_scores['Painradiatestoleg'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight25">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Distal leg numbess</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Distallegnumbess][]"
                                                                id="formRadiosRight26" value="0"
                                                                {{ isset($symptoms_scores['Distallegnumbess'][0]) && $symptoms_scores['Distallegnumbess'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight26">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Distallegnumbess][]"
                                                                id="formRadiosRight27" value="1"
                                                                {{ isset($symptoms_scores['Distallegnumbess'][0]) && $symptoms_scores['Distallegnumbess'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight27">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Distallegnumbess][]"
                                                                id="formRadiosRight28" value="3"
                                                                {{ isset($symptoms_scores['Distallegnumbess'][0]) && $symptoms_scores['Distallegnumbess'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight28">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio"
                                                                name="symptoms_score[Distallegnumbess][]"
                                                                id="formRadiosRight29" value="5"
                                                                {{ isset($symptoms_scores['Distallegnumbess'][0]) && $symptoms_scores['Distallegnumbess'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight29">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>feet burning at night / rest</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[feetburningatnightrest][]"
                                                                id="formRadiosRight30" value="0"
                                                                {{ isset($symptoms_scores['feetburningatnightrest'][0]) && $symptoms_scores['feetburningatnightrest'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight30">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[feetburningatnightrest][]"
                                                                id="formRadiosRight31" value="1"
                                                                {{ isset($symptoms_scores['feetburningatnightrest'][0]) && $symptoms_scores['feetburningatnightrest'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight31">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[feetburningatnightrest][]"
                                                                id="formRadiosRight32" value="3"
                                                                {{ isset($symptoms_scores['feetburningatnightrest'][0]) && $symptoms_scores['feetburningatnightrest'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight32">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[feetburningatnightrest][]"
                                                                id="formRadiosRight33" value="5"
                                                                {{ isset($symptoms_scores['feetburningatnightrest'][0]) && $symptoms_scores['feetburningatnightrest'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight33">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Leg spasm / tightness on walking </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Legspasmtightnessonwalking][]"
                                                                id="formRadiosRight341" value="0"
                                                                {{ isset($symptoms_scores['Legspasmtightnessonwalking'][0]) && $symptoms_scores['Legspasmtightnessonwalking'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Legspasmtightnessonwalking][]"
                                                                id="formRadiosRight351" value="1"
                                                                {{ isset($symptoms_scores['Legspasmtightnessonwalking'][0]) && $symptoms_scores['Legspasmtightnessonwalking'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Legspasmtightnessonwalking][]"
                                                                id="formRadiosRight361" value="3"
                                                                {{ isset($symptoms_scores['Legspasmtightnessonwalking'][0]) && $symptoms_scores['Legspasmtightnessonwalking'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Legspasmtightnessonwalking][]"
                                                                id="formRadiosRight371" value="5"
                                                                {{ isset($symptoms_scores['Legspasmtightnessonwalking'][0]) && $symptoms_scores['Legspasmtightnessonwalking'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td>Pain interfering with sleep </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Paininterferingwithsleep][]"
                                                                id="formRadiosRight341Paininterferingwithsleep" value="0"
                                                                {{ isset($symptoms_scores['Paininterferingwithsleep'][0]) && $symptoms_scores['Paininterferingwithsleep'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341Paininterferingwithsleep">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Paininterferingwithsleep][]"
                                                                id="formRadiosRight351Paininterferingwithsleep" value="1"
                                                                {{ isset($symptoms_scores['Paininterferingwithsleep'][0]) && $symptoms_scores['Paininterferingwithsleep'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351Paininterferingwithsleep">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Paininterferingwithsleep][]"
                                                                id="formRadiosRight361Paininterferingwithsleep" value="3"
                                                                {{ isset($symptoms_scores['Paininterferingwithsleep'][0]) && $symptoms_scores['Paininterferingwithsleep'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361Paininterferingwithsleep">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Paininterferingwithsleep][]"
                                                                id="formRadiosRight371Paininterferingwithsleep" value="5"
                                                                {{ isset($symptoms_scores['Paininterferingwithsleep'][0]) && $symptoms_scores['Paininterferingwithsleep'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371Paininterferingwithsleep">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                
                                                <tr>
                                                    <td>Priking pain on turning from side to side</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Prikingpainonturningfromsidetoside][]"
                                                                id="formRadiosRight341Prikingpainonturningfromsidetoside" value="0"
                                                                {{ isset($symptoms_scores['Prikingpainonturningfromsidetoside'][0]) && $symptoms_scores['Prikingpainonturningfromsidetoside'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341Prikingpainonturningfromsidetoside">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Prikingpainonturningfromsidetoside][]"
                                                                id="formRadiosRight351Prikingpainonturningfromsidetoside" value="1"
                                                                {{ isset($symptoms_scores['Prikingpainonturningfromsidetoside'][0]) && $symptoms_scores['Prikingpainonturningfromsidetoside'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351Prikingpainonturningfromsidetoside">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Prikingpainonturningfromsidetoside][]"
                                                                id="formRadiosRight361Prikingpainonturningfromsidetoside" value="3"
                                                                {{ isset($symptoms_scores['Prikingpainonturningfromsidetoside'][0]) && $symptoms_scores['Prikingpainonturningfromsidetoside'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361Prikingpainonturningfromsidetoside">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Prikingpainonturningfromsidetoside][]"
                                                                id="formRadiosRight371Prikingpainonturningfromsidetoside" value="5"
                                                                {{ isset($symptoms_scores['Prikingpainonturningfromsidetoside'][0]) && $symptoms_scores['Prikingpainonturningfromsidetoside'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371Prikingpainonturningfromsidetoside">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Lower back muscle spasm</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowerbackmusclespasm][]"
                                                                id="formRadiosRight341Lowerbackmusclespasm" value="0"
                                                                {{ isset($symptoms_scores['Lowerbackmusclespasm'][0]) && $symptoms_scores['Lowerbackmusclespasm'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341Lowerbackmusclespasm">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowerbackmusclespasm][]"
                                                                id="formRadiosRight351Lowerbackmusclespasm" value="1"
                                                                {{ isset($symptoms_scores['Lowerbackmusclespasm'][0]) && $symptoms_scores['Lowerbackmusclespasm'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351Lowerbackmusclespasm">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowerbackmusclespasm][]"
                                                                id="formRadiosRight361Lowerbackmusclespasm" value="3"
                                                                {{ isset($symptoms_scores['Lowerbackmusclespasm'][0]) && $symptoms_scores['Lowerbackmusclespasm'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361Lowerbackmusclespasm">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowerbackmusclespasm][]"
                                                                id="formRadiosRight371Lowerbackmusclespasm" value="5"
                                                                {{ isset($symptoms_scores['Lowerbackmusclespasm'][0]) && $symptoms_scores['Lowerbackmusclespasm'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371Lowerbackmusclespasm">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>loss of urinary / bowel muscle control</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[bowelmusclecontrol][]"
                                                                id="formRadiosRight341bowelmusclecontrol" value="0"
                                                                {{ isset($symptoms_scores['bowelmusclecontrol'][0]) && $symptoms_scores['bowelmusclecontrol'][0] == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight341bowelmusclecontrol">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[bowelmusclecontrol][]"
                                                                id="formRadiosRight351bowelmusclecontrol" value="1"
                                                                {{ isset($symptoms_scores['bowelmusclecontrol'][0]) && $symptoms_scores['bowelmusclecontrol'][0] == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight351bowelmusclecontrol">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[bowelmusclecontrol][]"
                                                                id="formRadiosRight361bowelmusclecontrol" value="3"
                                                                {{ isset($symptoms_scores['bowelmusclecontrol'][0]) && $symptoms_scores['bowelmusclecontrol'][0] == 3 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight361bowelmusclecontrol">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[bowelmusclecontrol][]"
                                                                id="formRadiosRight371bowelmusclecontrol" value="5"
                                                                {{ isset($symptoms_scores['bowelmusclecontrol'][0]) && $symptoms_scores['bowelmusclecontrol'][0] == 5 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="formRadiosRight371bowelmusclecontrol">
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
                                                <h6 class="mb-3 lut_title">Leg weakness / foot drop</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[footdrop][]" id="formRadiosRight42"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['footdrop'][0]) && $clinical_indicators['footdrop'][0] == 'YES' ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="formRadiosRight42">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[footdrop][]" id="formRadiosRight43"
                                                        value="No"
                                                        {{ isset($clinical_indicators['footdrop'][0]) && $clinical_indicators['footdrop'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight43">
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
                                                        name="clinical_indicator[spinecollection][]" id="formRadiosRight44"
                                                        value="YES"
                                                        {{ isset($clinical_indicators['spinecollection'][0]) && $clinical_indicators['spinecollection'][0] == 'YES' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight44">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[spinecollection][]" id="formRadiosRight45"
                                                        value="No"
                                                        {{ isset($clinical_indicators['spinecollection'][0]) && $clinical_indicators['spinecollection'][0] == 'No' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadiosRight45">
                                                        NO
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                                                  
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Clinical Exam 
                                            {{-- <a target="_blank"  href="{{ route('user.viewSpinePainEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                            {{-- <a target="_blank"  href="{{ route('user.viewSpinePainEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a> --}}
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
                        <div class="col-lg-3">
                      <h6 class="mb-3 lut_title">Cervical - Nerve Roots </h6>
                    </div>
                    <div class="col-lg-3">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[CervicalNerveRoots][]" value="Visible"  id="formRadiosRightd38"
                                    {{ isset($Imaging['CervicalNerveRoots'][0]) && $Imaging['CervicalNerveRoots'][0] == "Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd38">
                                    Visible
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[CervicalNerveRoots][]" value="Non-Visible"  id="formRadiosRightd13"
                                    {{ isset($Imaging['CervicalNerveRoots'][0]) && $Imaging['CervicalNerveRoots'][0] == "Non-Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd13">
                                    Non-Visible
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[CervicalNerveRoots][]" value="N/A"  id="formRadiosRightd119"
                                    {{ isset($Imaging['CervicalNerveRoots'][0]) && $Imaging['CervicalNerveRoots'][0] == "N/A" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd119">
                                    N/A
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_119" style="display: none;">
                            <div class="text_area_gfhi mb-3">
                            <textarea class="form-control" placeholder="Enter Elaborate Rheumatology / notes here***" style="height: 100px" name="Imaging[CervicalNerveRootsNote][]">{{ $Imaging['CervicalNerveRootsNote'][0] ?? '' }}</textarea>
                            </div>
                        </div>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-3">
                      <h6 class="mb-3 lut_title">Cervical - Facet nerve</h6>
                    </div>
                    <div class="col-lg-3">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[CervicalFacetnerve][]" value="Visible" id="formRadiosRightd14"
                                    {{ isset($Imaging['CervicalFacetnerve'][0]) && $Imaging['CervicalFacetnerve'][0] == "Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd14">
                                    Visible
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[CervicalFacetnerve][]" value="Non-Visible" id="formRadiosRightd15"
                                    {{ isset($Imaging['CervicalFacetnerve'][0]) && $Imaging['CervicalFacetnerve'][0] == "Non-Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd15">
                                    Non-Visible
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[CervicalFacetnerve][]" value="N/A" id="formRadiosRightd120"
                                    {{ isset($Imaging['CervicalFacetnerve'][0]) && $Imaging['CervicalFacetnerve'][0] == "N/A" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd120">
                                    N/A
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_120" style="display: none;">
                            <div class="text_area_gfhi mb-3">
                            <textarea class="form-control" placeholder="Enter Elaborate Rheumatology / notes here***" style="height: 100px" name="Imaging[CervicalFacetnerveNote][]">{{ $Imaging['CervicalFacetnerveNote'][0] ?? '' }}</textarea>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-3">
                      <h6 class="mb-3 lut_title">Thooracic - Inter-costal nerves </h6>
                    </div>
                    <div class="col-lg-3">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[ThooracicIntercostalnerves][]" value="Visible" id="formRadiosRightd39"
                                    {{ isset($Imaging['ThooracicIntercostalnerves'][0]) && $Imaging['ThooracicIntercostalnerves'][0] == "Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd39">
                                    Visible
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[ThooracicIntercostalnerves][]" value="Non-Visible" id="formRadiosRightd40"
                                    {{ isset($Imaging['ThooracicIntercostalnerves'][0]) && $Imaging['ThooracicIntercostalnerves'][0] == "Non-Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd40">
                                    Non-Visible
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[ThooracicIntercostalnerves][]" value="N/A" id="formRadiosRightd121"
                                    {{ isset($Imaging['ThooracicIntercostalnerves'][0]) && $Imaging['ThooracicIntercostalnerves'][0] == "N/A" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd121">
                                    N/A
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_121" style="display: none;">
                            <div class="text_area_gfhi mb-3">
                            <textarea class="form-control" placeholder="Enter Elaborate Rheumatology / notes here***" style="height: 100px" name="Imaging[ThooracicIntercostalnervesNote][]">{{ $Imaging['ThooracicIntercostalnervesNote'][0] ?? '' }}</textarea>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-lg-3">
                      <h6 class="mb-3 lut_title">Lumbar - Facet nerve</h6>
                    </div>
                    <div class="col-lg-3">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[LumbarFacetnerve][]" value="Visible" id="formRadiosRightd41"
                                    {{ isset($Imaging['LumbarFacetnerve'][0]) && $Imaging['LumbarFacetnerve'][0] == "Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd41">
                                   Visible
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[LumbarFacetnerve][]" value="Non-Visible" id="formRadiosRightd42"
                                    {{ isset($Imaging['LumbarFacetnerve'][0]) && $Imaging['LumbarFacetnerve'][0] == "Non-Visible" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd42">
                                    Non-Visible
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-check form-check-right mb-3">
                                    <input class="form-check-input" type="radio" name="Imaging[LumbarFacetnerve][]" value="N/A" id="formRadiosRightd122"
                                    {{ isset($Imaging['LumbarFacetnerve'][0]) && $Imaging['LumbarFacetnerve'][0] == "N/A" ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="formRadiosRightd122">
                                    N/A
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12" id="textarea_122" style="display: none;">
                            <div class="text_area_gfhi mb-3">
                            <textarea class="form-control" placeholder="Enter Elaborate Rheumatology / notes here***" style="height: 100px" name="Imaging[LumbarFacetnerveNote][]">{{ $Imaging['LumbarFacetnerveNote'][0] ?? '' }}</textarea>
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
                                            {{-- <img src="{{ asset('assets/images/new-images/nodules.png') }}" alt="Your Image" id="image"> --}}
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
        {{-- <a href="javascript:void(0)" class="order-now_btn order-now_btn_alt">Order Now <i class="fa-solid fa-arrow-right-long"></i></a> --}}
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
                                        <h6 class="section_title__">MDT <a target="_blank"  href="{{ route('user.viewSpinePainEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                        <h6 class="section_title__">Eligibility STATUS <a target="_blank"  href="{{ route('user.viewSpinePainEligibilityForms',['id'=>@$patient_id ]) }}"
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
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">conservative - Topical Riparil&nbsp;</h6>
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
                                      <h6 class="mb-3 lut_title">conservative - Topical Analgesics &nbsp;</h6>
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
                                      <h6 class="mb-3 lut_title">conservative - PO Analgesics</h6>
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
                                      <h6 class="mb-3 lut_title">conservative - PO Glucasamine / Chondroitin</h6>
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
                                      <h6 class="mb-3 lut_title">conservative - PO Collagen</h6>
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
                                      <h6 class="mb-3 lut_title">conservative - IV Vitamines</h6>
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
                                      <h6 class="mb-3 lut_title">conservative - IM Nurobion</h6>
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
                                      <h6 class="mb-3 lut_title">conservative - IM Collagen</h6>
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
                                      <h6 class="mb-3 lut_title">conservative - knee Brace</h6>
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
                                      <h6 class="mb-3 lut_title">Ozone intra-discal injection  </h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Ozoneintradiscalinjection][]" value="Non-Eligibile" id="formRadiosRightj23"
                                                    {{ isset($ElegibilitySTATUS['Ozoneintradiscalinjection'][0]) && $ElegibilitySTATUS['Ozoneintradiscalinjection'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj23">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Ozoneintradiscalinjection][]" value="Eligibile"  id="formRadiosRightj24"
                                                    {{ isset($ElegibilitySTATUS['Ozoneintradiscalinjection'][0]) && $ElegibilitySTATUS['Ozoneintradiscalinjection'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj24">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j24" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[OzoneintradiscalinjectionNote][]">{{ $ElegibilitySTATUS['OzoneintradiscalinjectionNote'][0] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">Ozone intra-discal injection</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Ozoneintradiscalinjection][]" value="Non-Eligibile" id="formRadiosRightj25"
                                                    {{ isset($ElegibilitySTATUS['Ozoneintradiscalinjection'][0]) && $ElegibilitySTATUS['Ozoneintradiscalinjection'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj25">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Ozoneintradiscalinjection][]" value="Eligibile" id="formRadiosRightj26"
                                                    {{ isset($ElegibilitySTATUS['Ozoneintradiscalinjection'][0]) && $ElegibilitySTATUS['Ozoneintradiscalinjection'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj26">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j26" style="display: none;">
                                            <div class="form-check form-check-right mb-3 ps-0">
                                            <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[OzoneintradiscalinjectionNote][]">{{ $ElegibilitySTATUS['OzoneintradiscalinjectionNote'][0] ?? '' }}</textarea>
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCooledRF][]" value="Non-Eligibile" id="formRadiosRightj29"
                                                    {{ isset($ElegibilitySTATUS['NerveCooledRF'][0]) && $ElegibilitySTATUS['NerveCooledRF'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj29">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCooledRF][]" value="Eligibile" id="formRadiosRightj30"
                                                    {{ isset($ElegibilitySTATUS['NerveCooledRF'][0]) && $ElegibilitySTATUS['NerveCooledRF'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj30">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j30" style="display: none;">
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
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCryotherapy][]" value="Non-Eligibile"  id="formRadiosRightj31"
                                                    {{ isset($ElegibilitySTATUS['NerveCryotherapy'][0]) && $ElegibilitySTATUS['NerveCryotherapy'][0] == 'Non-Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj31">
                                                    Non-Eligibile
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCryotherapy][]" value="Eligibile"  id="formRadiosRightj32"
                                                    {{ isset($ElegibilitySTATUS['NerveCryotherapy'][0]) && $ElegibilitySTATUS['NerveCryotherapy'][0] == 'Eligibile' ? 'checked' : '' }}
                                                    >
                                                    <label class="form-check-label" for="formRadiosRightj32">
                                                    Eligibile
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12" id="textarea_j32" style="display: none;">
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
                                                target="_blank"  href="{{ route('user.viewSpinePainEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i
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
  <h6 class="mb-3 lut_title">USTPINJECTION270</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USTPINJECTION270LABPREIRBASIC32][]" value="LABPREIRBASIC32"  id="formRadiosRightf70"
                {{ isset($Interventions['USTPINJECTION270LABPREIRBASIC32'][0]) && $Interventions['USTPINJECTION270LABPREIRBASIC32'][0] == 'LABPREIRBASIC32' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf70">
                LABPREIRBASIC32
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[USTPINJECTION270LABPREIRSAFETY17][]" value="LABPREIRSAFETY17"  id="formRadiosRightf71"
                {{ isset($Interventions['USTPINJECTION270LABPREIRSAFETY17'][0]) && $Interventions['USTPINJECTION270LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
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
  <h6 class="mb-3 lut_title">ANGIOPRPINJECTION390</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOPRPINJECTION390LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightf73"
                {{ isset($Interventions['ANGIOPRPINJECTION390LABPREANGIO48'][0]) && $Interventions['ANGIOPRPINJECTION390LABPREANGIO48'][0] == 'LABPREANGIO48' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf73">
                LABPREANGIO48
                </label>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOPRPINJECTION390LABPREIRSAFETY17][]"  value="LABPREIRSAFETY17" id="formRadiosRightf74"
                {{ isset($Interventions['ANGIOPRPINJECTION390LABPREIRSAFETY17'][0]) && $Interventions['ANGIOPRPINJECTION390LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
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
  <h6 class="mb-3 lut_title">ANGIOIDOZINJECTION440</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOIDOZINJECTION440LABPREANGIO48][]"  value="LABPREANGIO48" id="formRadiosRightf75"
                {{ isset($Interventions['ANGIOIDOZINJECTION440LABPREANGIO48'][0]) && $Interventions['ANGIOIDOZINJECTION440LABPREANGIO48'][0] == 'LABPREANGIO48' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf75">
                LABPREANGIO48
                </label>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOIDOZINJECTION440LABPREIRSAFETY17][]"  value="LABPREIRSAFETY17" id="formRadiosRightf76"
                {{ isset($Interventions['ANGIOIDOZINJECTION440LABPREIRSAFETY17'][0]) && $Interventions['ANGIOIDOZINJECTION440LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf76">
                LABPREIRSAFETY17
                </label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOIDOZINJECTION440IVSEDATION270][]"  value="IVSEDATION270" id="formRadiosRightf76IVSEDATION270"
                {{ isset($Interventions['ANGIOIDOZINJECTION440IVSEDATION270'][0]) && $Interventions['ANGIOIDOZINJECTION440IVSEDATION270'][0] == 'IVSEDATION270' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf76IVSEDATION270">
                IVSEDATION270
                </label>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="row">
    <div class="col-lg-4">
  <h6 class="mb-3 lut_title">ANGIOCNL470</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCNL470LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightf77"
                {{ isset($Interventions['ANGIOCNL470LABPREANGIO48'][0]) && $Interventions['ANGIOCNL470LABPREANGIO48'][0] == 'LABPREANGIO48' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf77">
                LABPREANGIO48
                </label>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCNL470LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf78"
                {{ isset($Interventions['ANGIOCNL470LABPREIRSAFETY17'][0]) && $Interventions['ANGIOCNL470LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf78">
                LABPREIRSAFETY17
                </label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCNL470IVSEDATION270][]" value="IVSEDATION270" id="formRadiosRightf78IVSEDATION270"
                {{ isset($Interventions['ANGIOCNL470IVSEDATION270'][0]) && $Interventions['ANGIOCNL470IVSEDATION270'][0] == 'IVSEDATION270' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf78IVSEDATION270">
                    IVSEDATION270
                </label>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="row">
    <div class="col-lg-4">
  <h6 class="mb-3 lut_title">ANGIORFABLATION490</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIORFABLATION490LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightf79"
                {{ isset($Interventions['ANGIORFABLATION490LABPREANGIO48'][0]) && $Interventions['ANGIORFABLATION490LABPREANGIO48'][0] == 'LABPREANGIO48' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf79">
                LABPREANGIO48
                </label>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIORFABLATION490LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf80"
                {{ isset($Interventions['ANGIORFABLATION490LABPREIRSAFETY17'][0]) && $Interventions['ANGIORFABLATION490LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf80">
                LABPREIRSAFETY17
                </label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIORFABLATION490IVSEDATION270][]" value="IVSEDATION270" id="formRadiosRightf80IVSEDATION270"
                {{ isset($Interventions['ANGIORFABLATION490IVSEDATION270'][0]) && $Interventions['ANGIORFABLATION490IVSEDATION270'][0] == 'IVSEDATION270' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf80IVSEDATION270">
                IVSEDATION270
                </label>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="row">
    <div class="col-lg-4">
  <h6 class="mb-3 lut_title">ANGIOCOOLEDRF560</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCOOLEDRF560LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightf81"
                {{ isset($Interventions['ANGIOCOOLEDRF560LABPREANGIO48'][0]) && $Interventions['ANGIOCOOLEDRF560LABPREANGIO48'][0] == 'LABPREANGIO48' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf81">
                LABPREANGIO48
                </label>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCOOLEDRF560LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf82"
                {{ isset($Interventions['ANGIOCOOLEDRF560LABPREIRSAFETY17'][0]) && $Interventions['ANGIOCOOLEDRF560LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf82">
                LABPREIRSAFETY17
                </label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCOOLEDRF560IVSEDATION270][]" value="IVSEDATION270" id="formRadiosRightf82IVSEDATION270"
                {{ isset($Interventions['ANGIOCOOLEDRF560IVSEDATION270'][0]) && $Interventions['ANGIOCOOLEDRF560IVSEDATION270'][0] == 'IVSEDATION270' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf82IVSEDATION270">
                IVSEDATION270
                </label>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="row">
    <div class="col-lg-4">
  <h6 class="mb-3 lut_title">ANGIOCRYOABLATION610</h6>
</div>
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCRYOABLATION610LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightf83"
                {{ isset($Interventions['ANGIOCRYOABLATION610LABPREANGIO48'][0]) && $Interventions['ANGIOCRYOABLATION610LABPREANGIO48'][0] == 'LABPREANGIO48' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf83">
                LABPREANGIO48
                </label>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCRYOABLATION610LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf84"
                {{ isset($Interventions['ANGIOCRYOABLATION610LABPREIRSAFETY17'][0]) && $Interventions['ANGIOCRYOABLATION610LABPREIRSAFETY17'][0] == 'LABPREIRSAFETY17' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf84">
                LABPREIRSAFETY17
                </label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCRYOABLATION610IVSEDATION270][]" value="IVSEDATION270" id="formRadiosRightf84IVSEDATION270"
                {{ isset($Interventions['ANGIOCRYOABLATION610IVSEDATION270'][0]) && $Interventions['ANGIOCRYOABLATION610IVSEDATION270'][0] == 'IVSEDATION270' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf84IVSEDATION270">
                IVSEDATION270
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
<div class="col-lg-4">
            <div class="form-check form-check-right mb-3">
                <input class="form-check-input" type="checkbox" name="Intervention[ANGIOGAE2310LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightf85"
                {{ isset($Interventions['ANGIOGAE2310LABPREANGIO48'][0]) && $Interventions['ANGIOGAE2310LABPREANGIO48'][0] == 'LABPREANGIO48' ? 'checked' : '' }}
                >
                <label class="form-check-label" for="formRadiosRightf85">
                LABPREANGIO48
                </label>
            </div>
        </div>

        <div class="col-lg-2">
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
</div>



                                    <div class="col-lg-12 mb-3">
                                        <h6 class="section_title__">Supportive <a target="_blank"  href="{{ route('user.viewSpinePainEligibilityForms',['id'=>@$patient_id ]) }}"
                                                class="order-now_btn">Medical Record <i
                                                    class="fa-solid fa-arrow-right-long"></i></a></h6>
                                    </div>
                                    @php
                                    if (isset($supportives) && !empty($supportives)) {
                                        $supportives = json_decode($supportives->data_value, true);

                                        $existingData = [
                                            'IVVITAPAIN175' => ['IVVITAPAIN175'],
                                            'IMNEUROBION19' => ['IMNEUROBION19'],
                                            
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
                                            {{-- <a target="_blank"  href="{{ route('user.viewSpinePainEligibilityForms',['id'=>@$patient_id ]) }}" class="order-now_btn">Order Now <i class="fa-solid fa-arrow-right-long"></i></a> --}}
                                        </h6>
                                        <div class="title_head">
                                              <h4>ADD A DRUG </h4>
                                          </div>
                                      </div>
                                      <div class="row">
                                      <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[CollagenSuppliment][]" value="Collagen Suppliment (powder / liquid) - 1 scoop / 1 saschet PO OD x 3 months" id="formRadiosRightf90"
                                            {{ isset($Prescription['CollagenSuppliment']) && in_array('Collagen Suppliment (powder / liquid) - 1 scoop / 1 saschet PO OD x 3 months', $Prescription['CollagenSuppliment']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf90">
                                                Collagen Suppliment (powder / liquid) - 1 scoop / 1 saschet PO OD x 3 months
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Diclofenac][]" value="Diclofenac Gel 1 Ampule -Topical TID x 2 weeks" id="formRadiosRightf91"
                                            {{ isset($Prescription['Diclofenac']) && in_array('Diclofenac Gel 1 Ampule -Topical TID x 2 weeks', $Prescription['Diclofenac']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf91">
                                                Diclofenac Gel 1 Ampule -Topical TID x 2 weeks
                                                </label>    
                                        </div>
                                    </div>
                                      </div>
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Lidocaine][]" value="Lidocaine Patch - 1 Patch Topical OD X 2 weeks" id="formRadiosRightf92"
                                            {{ isset($Prescription['Lidocaine']) && in_array('Lidocaine Patch - 1 Patch Topical OD X 2 weeks', $Prescription['Lidocaine']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf92">
                                                Lidocaine Patch - 1 Patch Topical OD X 2 weeks
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Celebrix][]" value="Celebrix Tab - 200 mg PO BID x 1 month" id="formRadiosRightf93"
                                            {{ isset($Prescription['Celebrix']) && in_array('Celebrix Tab - 200 mg PO BID x 1 month', $Prescription['Celebrix']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf93">
                                                Celebrix Tab - 200 mg PO BID x 1 month
                                                </label>    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Riparil][]" value="Riparil Gel 1 Ampule - Topical TID x 2 weeks" id="formRadiosRightf94"
                                            {{ isset($Prescription['Riparil']) && in_array('Riparil Gel 1 Ampule - Topical TID x 2 weeks', $Prescription['Riparil']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf94">
                                                Riparil Gel 1 Ampule - Topical TID x 2 weeks
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Sporidex][]" value="Sporidex (Cephalexin) Tab - 500 mg PO BID x 5 days" id="formRadiosRightf94"
                                            {{ isset($Prescription['Sporidex']) && in_array('Sporidex (Cephalexin) Tab - 500 mg PO BID x 5 days', $Prescription['Sporidex']) ? 'checked' : '' }}
                                            >
                                                <label class="form-check-label" for="formRadiosRightf94">
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
        @if (isset($ElegibilitySTATUS['OzoneintradiscalinjectionNote'][0]))
        $("#textarea_j24").show();
        @else

        $("#textarea_j24").hide();
        @endif
        @if (isset($ElegibilitySTATUS['OzoneintradiscalinjectionNote'][0]))
        $("#textarea_j26").show();
        @else
        $("#textarea_j26").hide();
        @endif
        @if (isset($ElegibilitySTATUS['NeurolysisBlockNote'][0]))
        $("#textarea_j28").show();
        @else

        $("#textarea_j28").hide(); 
        @endif
        @if (isset($ElegibilitySTATUS['NerveCooledRFNote'][0]))
        $("#textarea_j30").show();
        @else

        $("#textarea_j30").hide();
        @endif
        @if (isset($ElegibilitySTATUS['NerveCryotherapyNote'][0]))
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


<script>
    $(document).ready(function(){
        @if (isset($Imaging['CervicalNerveRootsNote'][0]))
        $('#textarea_119').show();
        @else

        $('#textarea_119').hide();     
        @endif
        @if (isset($Imaging['CervicalFacetnerveNote'][0]))
        $('#textarea_120').show();
        @else

        $('#textarea_120').hide();   
        @endif
        @if (isset($Imaging['ThooracicIntercostalnervesNote'][0]))
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

            // Low back pain - 1 side start  
            var isChecked_sym_a1 = $("#sym_a1").is(":checked");
           
            var sym_a1_durationValue = $("select[name='symptoms[0][1]']").val();
            
            var sym_a1_durationType = $("select[name='symptoms[0][2]']").val();
            var sym_a1_description = $("textarea[name='symptoms[0][3]']").val();

            if (sym_a1_durationValue !== "" || sym_a1_durationType !== "" || sym_a1_description !== "") {
               
                if(isChecked_sym_a1 ===false){
                    
                    Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please fill out Low back pain - 1 side fields in Symptoms.',
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
// Low back pain - 1 side end  


// Low back pain - Bilateral start
var isChecked_sym_a2 = $("#sym_a2").is(":checked");
           
           var sym_a2_durationValue = $("select[name='symptoms[1][1]']").val();
           
           var sym_a2_durationType = $("select[name='symptoms[1][2]']").val();
           var sym_a2_description = $("textarea[name='symptoms[1][3]']").val();

           if (sym_a2_durationValue !== "" || sym_a2_durationType !== "" || sym_a2_description !== "") {
              
               if(isChecked_sym_a2 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Low back pain - Bilateral fields in Symptoms.',
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
// Low back pain - Bilateral end 



// Pain radiates to leg start
var isChecked_sym_a3 = $("#sym_a3").is(":checked");
           
           var sym_a3_durationValue = $("select[name='symptoms[2][1]']").val();
           
           var sym_a3_durationType = $("select[name='symptoms[2][2]']").val();
           var sym_a3_description = $("textarea[name='symptoms[2][3]']").val();

           if (sym_a3_durationValue !== "" || sym_a3_durationType !== "" || sym_a3_description !== "") {
              
               if(isChecked_sym_a3 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Pain radiates to leg fields in Symptoms.',
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
// Pain radiates to leg end 


//  Distal leg numbess start
var isChecked_sym_a4 = $("#sym_a4").is(":checked");
           
           var sym_a4_durationValue = $("select[name='symptoms[3][1]']").val();
           
           var sym_a4_durationType = $("select[name='symptoms[3][2]']").val();
           var sym_a4_description = $("textarea[name='symptoms[3][3]']").val();

           if (sym_a4_durationValue !== "" || sym_a4_durationType !== "" || sym_a4_description !== "") {
              
               if(isChecked_sym_a4 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Distal leg numbess fields in Symptoms.',
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
//  Distal leg numbess end 



// feet burning at night / rest start
var isChecked_sym_a5 = $("#sym_a5").is(":checked");
           
           var sym_a5_durationValue = $("select[name='symptoms[4][1]']").val();
           
           var sym_a5_durationType = $("select[name='symptoms[4][2]']").val();
           var sym_a5_description = $("textarea[name='symptoms[4][3]']").val();

           if (sym_a5_durationValue !== "" || sym_a5_durationType !== "" || sym_a5_description !== "") {
              
               if(isChecked_sym_a5 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out feet burning at night / rest fields in Symptoms.',
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
// feet burning at night / rest end 



//  Leg spasm / tightness on walking start
var isChecked_sym_a6 = $("#sym_a6").is(":checked");
           
           var sym_a6_durationValue = $("select[name='symptoms[5][1]']").val();
           
           var sym_a6_durationType = $("select[name='symptoms[5][2]']").val();
           var sym_a6_description = $("textarea[name='symptoms[5][3]']").val();

           if (sym_a6_durationValue !== "" || sym_a6_durationType !== "" || sym_a6_description !== "") {
              
               if(isChecked_sym_a6 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Leg spasm / tightness on walking fields in Symptoms.',
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
//  Leg spasm / tightness on walking end 



//   Pain interfering with sleep  start
var isChecked_sym_aa6 = $("#sym_aa6").is(":checked");
           
           var sym_aa6_durationValue = $("select[name='symptoms[6][1]']").val();
           
           var sym_aa6_durationType = $("select[name='symptoms[6][2]']").val();
           var sym_aa6_description = $("textarea[name='symptoms[6][3]']").val();

           if (sym_aa6_durationValue !== "" || sym_aa6_durationType !== "" || sym_aa6_description !== "") {
              
               if(isChecked_sym_aa6 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out  Pain interfering with sleep fields in Symptoms.',
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
//   Pain interfering with sleep  end 



//   Priking pain on turning from side to side start
var isChecked_sym_aaa6 = $("#sym_aaa6").is(":checked");
           
           var sym_aaa6_durationValue = $("select[name='symptoms[7][1]']").val();
           
           var sym_aaa6_durationType = $("select[name='symptoms[7][2]']").val();
           var sym_aaa6_description = $("textarea[name='symptoms[7][3]']").val();

           if (sym_aaa6_durationValue !== "" || sym_aaa6_durationType !== "" || sym_aaa6_description !== "") {
              
               if(isChecked_sym_aaa6 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out  Priking pain on turning from side to side fields in Symptoms.',
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
//   Priking pain on turning from side to side end 



//  Lower back muscle spasm start
var isChecked_sym_aa8 = $("#sym_aaaa61").is(":checked");
           
           var _sym_aaaa61_durationValue = $("select[name='symptoms[8][1]']").val();
           
           var _sym_aaaa61_durationType = $("select[name='symptoms[8][2]']").val();
           var _sym_aaaa61_description = $("textarea[name='symptoms[8][3]']").val();

           if (_sym_aaaa61_durationValue !== "" || _sym_aaaa61_durationType !== "" || _sym_aaaa61_description !== "") {
              
               if(isChecked_sym_aaaa61 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Lower back muscle spasm fields in Symptoms.',
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
//  Lower back muscle spasm end 


//  loss of urinary / bowel muscle control start
var isChecked_sym_aaaa62 = $("#sym_aaaa62").is(":checked");
           
           var _sym_aaaa62_durationValue = $("select[name='symptoms[9][1]']").val();
           
           var _sym_aaaa62_durationType = $("select[name='symptoms[9][2]']").val();
           var _sym_aaaa62_description = $("textarea[name='symptoms[9][3]']").val();

           if (_sym_aaaa62_durationValue !== "" || _sym_aaaa62_durationType !== "" || _sym_aaaa62_description !== "") {
              
               if(isChecked_sym_aaaa62 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out loss of urinary / bowel muscle control fields in Symptoms.',
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
//  loss of urinary / bowel muscle control end 


//  leg weakness start
var isChecked_sym_aaaa621 = $("#sym_aaaa621").is(":checked");
           
           var sym_aaaa621_durationValue = $("select[name='symptoms[10][1]']").val();
           
           var sym_aaaa621_durationType = $("select[name='symptoms[10][2]']").val();
           var sym_aaaa621_description = $("textarea[name='symptoms[10][3]']").val();

           if (sym_aaaa621_durationValue !== "" || sym_aaaa621_durationType !== "" || sym_aaaa621_description !== "") {
              
               if(isChecked_sym_aaaa621 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out leg weakness fields in Symptoms.',
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
//  leg weakness end 

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

    imageObj.src = '{{ $VaricoceleEmboForm->AnnotateimageData ? asset('/assets/thyroid-eligibility-form/' . $VaricoceleEmboForm->AnnotateimageData) : asset('/assets/thyroid-eligibility-form/add/ShoulderPain.jpg') }}';

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
        link.download = 'spine-pain.png';
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

        
        $("#updateSpinePainEligibilityForms").submit(function(event) {
            
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
                                url: '{{ route("user.updateSpinePainEligibilityForms") }}',
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    
                                    var patientId = response.patient_id;
                                    if(response!=''){
              
                                        swal.fire(
              
                                            'Success',
              
                                            'Spine Pain form updated successfully!',
              
                                            'success'
              
                                        ).then(function() {
                                                
                                               
                                            var redirectUrl = "{{ route('user.viewSpinePainEligibilityForms', ['id' => ':id']) }}";
                                            redirectUrl = redirectUrl.replace(':id', patientId);
                                            window.location.href = redirectUrl;
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

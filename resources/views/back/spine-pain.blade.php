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
                <form id="storeSpinePainEligibilityForms" method="POST" action="{{ route('user.storeSpinePainEligibilityForms') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ @$patient_id }}" />
                    <input type="hidden" name="form_type" value="SpinePain"/>

                    <h3 class="form_title">Spine  Pain</h3>

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
                                                name="diagnosis_general[CervicalRadiculopathy][]" id="formRadiosRight1"
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
                                                value="Cervical - Discogenic Pain">
                                            <label class="form-check-label" for="formRadiosRight4">
                                                Cervical - Discogenic Pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[CervicalCordinjury][]" id="formRadiosRight5"
                                                value="Cervical - Cord injury">
                                            <label class="form-check-label" for="formRadiosRight5">
                                                Cervical - Cord injury
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[CervicalCanalStenosis][]" id="formRadiosRight6"
                                                value="Cervical - Canal Stenosis">
                                            <label class="form-check-label" for="formRadiosRight6">
                                                Cervical - Canal Stenosis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[TriggerPointSyndrome][]" id="formRadiosRight7"
                                                value="Cervical - Muscle Spasm /Trigger Point Syndrome">
                                            <label class="form-check-label" for="formRadiosRight7">
                                                Cervical - Muscle Spasm /Trigger Point Syndrome
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[CervicalSpndylolysis][]" id="formRadiosRight7CervicalSpndylolysis"
                                                value="Cervical - Spndylolysis">
                                            <label class="form-check-label" for="formRadiosRight7CervicalSpndylolysis">
                                                Cervical - Spndylolysis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[CervicalSpndylolylisthesis][]" id="formRadiosRight7CervicalSpndylolylisthesis"
                                                value="Cervical - Spndylolylisthesis">
                                            <label class="form-check-label" for="formRadiosRight7CervicalSpndylolylisthesis">
                                                Cervical - Spndylolylisthesis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LumbarRadiculopathy][]" id="formRadiosRight7LumbarRadiculopathy"
                                                value="Lumbar - Radiculopathy">
                                            <label class="form-check-label" for="formRadiosRight7LumbarRadiculopathy">
                                                Lumbar - Radiculopathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4"  >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LumbarFacetArthropathy][]" id="formRadiosRight7LumbarFacetArthropathy"
                                                value="Lumbar - Facet Arthropathy">
                                            <label class="form-check-label" for="formRadiosRight7LumbarFacetArthropathy">
                                                Lumbar - Facet Arthropathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LumbarDiscoProlapse][]" id="formRadiosRight7LumbarDiscoProlapse"
                                                value="Lumbar - Disco Prolapse">
                                            <label class="form-check-label" for="formRadiosRight7LumbarDiscoProlapse">
                                                Lumbar - Disco Prolapse
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LumbarDiscogenicPain][]" id="formRadiosRight7LumbarDiscogenicPain"
                                                value="Lumbar - Discogenic Pain">
                                            <label class="form-check-label" for="formRadiosRight7LumbarDiscogenicPain">
                                                Lumbar - Discogenic Pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LumbarCanalStenosis][]" id="formRadiosRight7LumbarCanalStenosis"
                                                value="Lumbar - Canal Stenosis">
                                            <label class="form-check-label" for="formRadiosRight7LumbarCanalStenosis">
                                                Lumbar - Canal Stenosis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[TriggerPointSyndrome2][]" id="formRadiosRight7TriggerPointSyndrome"
                                                value="Lumbar - Muscle Spasm /Trigger Point Syndrome">
                                            <label class="form-check-label" for="formRadiosRight7TriggerPointSyndrome">
                                                Lumbar - Muscle Spasm /Trigger Point Syndrome
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LumbarSpndylolysis][]" id="formRadiosRight7LumbarSpndylolysis"
                                                value="Lumbar - Spndylolysis">
                                            <label class="form-check-label" for="formRadiosRight7LumbarSpndylolysis">
                                                Lumbar - Spndylolysis
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Lumbarsacralization][]" id="formRadiosRight7Lumbarsacralization"
                                                value="Lumbar sacralization">
                                            <label class="form-check-label" for="formRadiosRight7Lumbarsacralization">
                                                Lumbar sacralization
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[LigamentumFlavumHypertrphy][]" id="formRadiosRight7LigamentumFlavumHypertrphy"
                                                value="Ligamentum Flavum Hypertrphy">
                                            <label class="form-check-label" for="formRadiosRight7LigamentumFlavumHypertrphy">
                                                Ligamentum Flavum Hypertrphy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[Sacroilitis][]" id="formRadiosRight7Sacroilitis"
                                                value="Sacroilitis">
                                            <label class="form-check-label" for="formRadiosRight7Sacroilitis">
                                                Sacroilitis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[TailBonePain][]" id="formRadiosRight7TailBonePain"
                                                value="Tail Bone Pain">
                                            <label class="form-check-label" for="formRadiosRight7TailBonePain">
                                                Tail Bone Pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[PostherpagicNeuralgia][]" id="formRadiosRight7PostherpagicNeuralgia"
                                                value="Post-herpagic Neuralgia">
                                            <label class="form-check-label" for="formRadiosRight7PostherpagicNeuralgia">
                                                Post-herpagic Neuralgia
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ThoracicFacetArthropathy][]" id="formRadiosRight7ThoracicFacetArthropathy"
                                                value="Thoracic - Facet Arthropathy">
                                            <label class="form-check-label" for="formRadiosRight7ThoracicFacetArthropathy">
                                                Thoracic - Facet Arthropathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ThoracicDiscoProlapse][]" id="formRadiosRight7ThoracicDiscoProlapse"
                                                value="Thoracic - Disco Prolapse">
                                            <label class="form-check-label" for="formRadiosRight7ThoracicDiscoProlapse">
                                                Thoracic Disco Prolapse
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ThoracicDiscogenicPain][]" id="formRadiosRight7ThoracicDiscogenicPain"
                                                value="Thoracic - Discogenic Pain">
                                            <label class="form-check-label" for="formRadiosRight7ThoracicDiscogenicPain">
                                                Thoracic - Discogenic Pain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ThoracicCanalStenosis][]" id="formRadiosRight7ThoracicCanalStenosis"
                                                value="Thoracic - Canal Stenosis">
                                            <label class="form-check-label" for="formRadiosRight7ThoracicCanalStenosis">
                                                Thoracic - Canal Stenosis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[MuscleSpasmTriggerPointSyndrome][]" id="formRadiosRight7MuscleSpasmTriggerPointSyndrome"
                                                value="Thoracic - Muscle Spasm /Trigger Point Syndrome">
                                            <label class="form-check-label" for="formRadiosRight7MuscleSpasmTriggerPointSyndrome">
                                                Thoracic - MuscleSpasm /Trigger Point Syndrome
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ThoracicSpndylolysis][]" id="formRadiosRight7ThoracicSpndylolysis"
                                                value="Thoracic - Spndylolysis">
                                            <label class="form-check-label" for="formRadiosRight7ThoracicSpndylolysis">
                                                Thoracic - Spndylolysis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[ThoracicSpndylolylisthesis][]" id="formRadiosRight7ThoracicSpndylolylisthesis"
                                                value="Thoracic - Spndylolylisthe">
                                            <label class="form-check-label" for="formRadiosRight7ThoracicSpndylolylisthesis">
                                                Thoracic - Spndylolylisthesis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[VertbralFractureCervical][]" id="formRadiosRight7VertbralFractureCervical"
                                                value="Vertbral Fracture - Cervical">
                                            <label class="form-check-label" for="formRadiosRight7VertbralFractureCervical">
                                                Vertbral Fracture - Cervical
                                            </label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-4" id="diagnosis_general_checkbox">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox"
                                                name="diagnosis_general[VertbralFractureLumbar][]" id="formRadiosRight7VertbralFractureLumbar"
                                                value="Vertbral Fracture - Lumbar">
                                            <label class="form-check-label" for="formRadiosRight7VertbralFractureLumbar">
                                                Vertbral Fracture - Lumbar
                                            </label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-12">
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
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[G541][]"
                                                id="formRadiosRight8" value="G54.1 Lumbosacral plexus disorders, Neuropathy, neuropathic lumbar plexus">
                                            <label class="form-check-label" for="formRadiosRight8">
                                                G54.1 Lumbosacral plexus disorders, Neuropathy, neuropathic lumbar plexus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[G551][]"
                                                id="formRadiosRight9" value="G55.1 Nerve root and plexus compressions in intervertebral disc disorders, Neuritis|due to herniation, nucleus pulposus |lumbar, lumbosacral">
                                            <label class="form-check-label" for="formRadiosRight9">
                                                G55.1 Nerve root and plexus compressions in intervertebral disc disorders, Neuritis|due to herniation, nucleus pulposus |lumbar, lumbosacral
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M478cervical][]"
                                                id="formRadiosRight10" value="M47.8 Other spondylosis , Spondylosis cervical">
                                            <label class="form-check-label" for="formRadiosRight10">
                                                M47.8 Other spondylosis , Spondylosis cervical
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M478lumbar][]"
                                                id="formRadiosRight11" value="M47.8 Other spondylosis, Spondylosis| lumbar">
                                            <label class="form-check-label" for="formRadiosRight11">
                                                M47.8 Other spondylosis, Spondylosis| lumbar
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M500][]"
                                                id="formRadiosRight12" value="M50.0 Cervical disc disorder with myelopathy">
                                            <label class="form-check-label" for="formRadiosRight12">
                                                M50.0 Cervical disc disorder with myelopathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M501][]"
                                                id="formRadiosRight13" value="M50.1 Cervical disc disorder with radiculopathy">
                                            <label class="form-check-label" for="formRadiosRight13">
                                                M50.1 Cervical disc disorder with radiculopathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M502][]"
                                                id="formRadiosRight14" value="M50.2 Other cervical disc displacement">
                                            <label class="form-check-label" for="formRadiosRight14">
                                                M50.2 Other cervical disc displacement
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M503][]"
                                                id="formRadiosRight15" value="M50.3 Other cervical disc degeneration">
                                            <label class="form-check-label" for="formRadiosRight15">
                                                M50.3 Other cervical disc degeneration
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M508][]"
                                                id="formRadiosRight16" value="M50.8 Other cervical disc disorders">
                                            <label class="form-check-label" for="formRadiosRight16">
                                                M50.8 Other cervical disc disorders
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M509][]"
                                                id="formRadiosRight17" value="M50.9 Cervical disc disorder, unspecified">
                                            <label class="form-check-label" for="formRadiosRight17">
                                                M50.9 Cervical disc disorder, unspecified
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M51][]"
                                                id="formRadiosRight18" value="M51 Other intervertebral disc disorders, thoracic, thoracolumbar and lumbosacral disc disorders">
                                            <label class="form-check-label" for="formRadiosRight18">
                                                M51 Other intervertebral disc disorders, thoracic, thoracolumbar and lumbosacral disc disorders
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M510][]"
                                                id="formRadiosRight19M510" value="M51.0 Lumbar and other intervertebral disc disorders with myelopathy">
                                            <label class="form-check-label" for="formRadiosRight19M510">
                                                M51.0 Lumbar and other intervertebral disc disorders with myelopathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M511][]"
                                                id="formRadiosRight19M511" value="M51.1 Lumbar and other intervertebral disc disorders with radiculopathy">
                                            <label class="form-check-label" for="formRadiosRight19M511">
                                                M51.1 Lumbar and other intervertebral disc disorders with radiculopathy
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M512][]"
                                                id="formRadiosRight19M512" value="M51.2 Other specified intervertebral disc displacement">
                                            <label class="form-check-label" for="formRadiosRight19M512">
                                                M51.2 Other specified intervertebral disc displacement
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M519][]"
                                                id="formRadiosRight19M519" value="M51.9 Intervertebral disc disorder, unspecified Disease, diseased|intervertebral disk|lumbar, lumbosacral (with)">
                                            <label class="form-check-label" for="formRadiosRight19M519">
                                                M51.9 Intervertebral disc disorder, unspecified Disease, diseased|intervertebral disk|lumbar, lumbosacral (with)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M541][]"
                                                id="formRadiosRight19M541" value="M54.1 Radiculopathy , Neuritis or radiculitis: lumbar NOS">
                                            <label class="form-check-label" for="formRadiosRight19M541">
                                                M54.1 Radiculopathy , Neuritis or radiculitis: lumbar NOS
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M542][]"
                                                id="formRadiosRight19M542" value="M54.2 Cervicalgia">
                                            <label class="form-check-label" for="formRadiosRight19M542">
                                                M54.2 Cervicalgia
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M530][]"
                                                id="formRadiosRight19M530" value="M53.0 Cervicocranial syndrome">
                                            <label class="form-check-label" for="formRadiosRight19M530">
                                                M53.0 Cervicocranial syndrome
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[M545][]"
                                                id="formRadiosRight19M545" value="M54.5 Low back pain, Pain(s) lumbar region">
                                            <label class="form-check-label" for="formRadiosRight19M545">
                                                M54.5 Low back pain, Pain(s) lumbar region
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[Q765][]"
                                                id="formRadiosRight19Q765" value="Q76.5 Cervical rib">
                                            <label class="form-check-label" for="formRadiosRight19Q765">
                                                Q76.5 Cervical rib
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S122][]"
                                                id="formRadiosRight19S122" value="S12.2 Fracture of other specified cervical vertebra">
                                            <label class="form-check-label" for="formRadiosRight19S122">
                                                S12.2 Fracture of other specified cervical vertebra
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S127][]"
                                                id="formRadiosRight19S127" value="S12.7 Multiple fractures of cervical spine">
                                            <label class="form-check-label" for="formRadiosRight19S127">
                                                S12.7 Multiple fractures of cervical spine
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S131][]"
                                                id="formRadiosRight19S131" value="S13.1 Dislocation of cervical vertebra">
                                            <label class="form-check-label" for="formRadiosRight19S131">
                                                S13.1 Dislocation of cervical vertebra
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S134][]"
                                                id="formRadiosRight19S134" value="S13.4 Sprain and strain of cervical spine">
                                            <label class="form-check-label" for="formRadiosRight19S134">
                                                S13.4 Sprain and strain of cervical spine
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S141][]"
                                                id="formRadiosRight19" value="S14.1 Other and unspecified injuries of cervical spinal cord a">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S14.1 Other and unspecified injuries of cervical spinal cord a
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S300][]"
                                                id="formRadiosRight19" value="S30.0 Contusion of lower back and pelvis">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S30.0 Contusion of lower back and pelvis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S32][]"
                                                id="formRadiosRight19" value="S32 Fracture of lumbar spine and pelvis">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S32 Fracture of lumbar spine and pelvis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S320][]"
                                                id="formRadiosRight19" value="S32.0 Fracture of lumbar vertebra">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S32.0 Fracture of lumbar vertebra
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S327][]"
                                                id="formRadiosRight19" value="S32.7 Multiple fractures of lumbar spine and pelvis">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S32.7 Multiple fractures of lumbar spine and pelvis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S328][]"
                                                id="formRadiosRight19" value="S32.8 Fracture of other and unspecified parts of lumbar spine and pelvis">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S32.8 Fracture of other and unspecified parts of lumbar spine and pelvis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S33][]"
                                                id="formRadiosRight19" value="S33 Dislocation, sprain and strain of joints and ligaments of lumbar spine and pelvis">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S33 Dislocation, sprain and strain of joints and ligaments of lumbar spine and pelvis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S330][]"
                                                id="formRadiosRight19" value="S33.0 Traumatic rupture of lumbar intervertebral disc">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S33.0 Traumatic rupture of lumbar intervertebral disc
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S331][]"
                                                id="formRadiosRight19" value="S33.1 Dislocation of lumbar vertebra">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S33.1 Dislocation of lumbar vertebra
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S333][]"
                                                id="formRadiosRight19" value="S33.3 Dislocation of other and unspecified parts of lumbar spine and pelvis">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S33.3 Dislocation of other and unspecified parts of lumbar spine and pelvis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S335][]"
                                                id="formRadiosRight19" value="S33.5 Sprain and strain of lumbar spine">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S33.5 Sprain and strain of lumbar spine
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S337][]"
                                                id="formRadiosRight19" value="S33.7 Sprain and strain of other and unspecified parts of lumbar spine and pelvis">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S33.7 Sprain and strain of other and unspecified parts of lumbar spine and pelvis
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S340][]"
                                                id="formRadiosRight19" value="S34.0 Concussion and oedema of lumbar spinal cord">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S34.0 Concussion and oedema of lumbar spinal cord
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S341][]"
                                                id="formRadiosRight19" value="S34.1 Other injury of lumbar spinal cord">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S34.1 Other injury of lumbar spinal cord
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S342][]"
                                                id="formRadiosRight19" value="S34.2 Injury of nerve root of lumbar and sacral spine">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S34.2 Injury of nerve root of lumbar and sacral spine
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" >
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S344][]"
                                                id="formRadiosRight19" value="S34.4 Injury of lumbosacral plexus">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S34.4 Injury of lumbosacral plexus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="Postpartum_thyroiditis">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="diagnosis_cid[S345][]"
                                                id="formRadiosRight19" value="S34.5 Injury of lumbar, sacral and pelvic sympathetic nerves">
                                            <label class="form-check-label" for="formRadiosRight19">
                                                S34.5 Injury of lumbar, sacral and pelvic sympathetic nerves
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
                                                        value="Low back pain - 1 side">
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px"  name="symptoms[0][3]"></textarea>
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
                                                        name="symptoms[1][0]" id="sym_a2" value="Low back pain - Bilateral">
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
                                                        name="symptoms[2][0]" value="Pain radiates to leg">
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
                                                        value="Distal leg numbess">
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
                                                        name="symptoms[4][0]" id="sym_a5" value="feet burning at night / rest">
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
                                                        name="symptoms[5][0]" value="Leg spasm / tightness on walking"
                                                        id="sym_a75">
                                                    <label class="form-check-label" for="sym_a75">
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
                                                        name="symptoms[6][0]" value="Pain interfering with sleep"
                                                        id="sym_a7">
                                                    <label class="form-check-label" for="sym_a7">
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
                                                        name="symptoms[7][0]" value="Priking pain on turning from side to side"
                                                        id="sym_aa7">
                                                    <label class="form-check-label" for="sym_aa7">
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
                                                            name="symptoms[7][2]">
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[7][3]"></textarea>
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
                                                        name="symptoms[8][0]" value="Lower back muscle spasm"
                                                        id="sym_aa8">
                                                    <label class="form-check-label" for="sym_aa8">
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
                                                            name="symptoms[8][2]">
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[8][3]"></textarea>
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
                                                        name="symptoms[9][0]" value="loss of urinary / bowel muscle control"
                                                        id="sym_aa9">
                                                    <label class="form-check-label" for="sym_aa9">
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
                                                            name="symptoms[9][2]">
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[9][3]"></textarea>
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
                                                        name="symptoms[10][0]" value="leg weakness"
                                                        id="sym_aa10">
                                                    <label class="form-check-label" for="sym_aa10">
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
                                                            name="symptoms[10][2]">
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
                                                        <textarea class="form-control" placeholder="Type here..." style="height: 43px" name="symptoms[10][3]"></textarea>
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
                                            <h4>Spine symptoms score (SSS)</h4>
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
                                                    <td>Low back pain - 1 side</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowbackpainside][]"
                                                                id="formRadiosRight14" value="0">
                                                            <label class="form-check-label" for="formRadiosRight14">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowbackpainside][]"
                                                                id="formRadiosRight15" value="1">
                                                            <label class="form-check-label" for="formRadiosRight15">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowbackpainside][]"
                                                                id="formRadiosRight16" value="3">
                                                            <label class="form-check-label" for="formRadiosRight16">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowbackpainside][]"
                                                                id="formRadiosRight171" value="5">
                                                            <label class="form-check-label" for="formRadiosRight171">
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
                                                                id="formRadiosRight18" value="0">
                                                            <label class="form-check-label" for="formRadiosRight18">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[LowbackpainBilateral][]"
                                                                id="formRadiosRight19" value="1">
                                                            <label class="form-check-label" for="formRadiosRight19">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[LowbackpainBilateral][]"
                                                                id="formRadiosRight20" value="3">
                                                            <label class="form-check-label" for="formRadiosRight20">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[LowbackpainBilateral][]"
                                                                id="formRadiosRight21" value="5">
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
                                                                id="formRadiosRight22" value="0">
                                                            <label class="form-check-label" for="formRadiosRight22">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painradiatestoleg][]"
                                                                id="formRadiosRight23" value="1">
                                                            <label class="form-check-label" for="formRadiosRight23">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painradiatestoleg][]"
                                                                id="formRadiosRight24" value="3">
                                                            <label class="form-check-label" for="formRadiosRight24">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Painradiatestoleg][]"
                                                                id="formRadiosRight25" value="5">
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
                                                                name="symptoms_score[Distallegnumbess][]"
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
                                                                name="symptoms_score[Distallegnumbess][]"
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
                                                                name="symptoms_score[Distallegnumbess][]"
                                                                id="formRadiosRight29" value="5">
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
                                                                id="formRadiosRight30" value="0">
                                                            <label class="form-check-label" for="formRadiosRight30">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[feetburningatnightrest][]"
                                                                id="formRadiosRight31" value="1">
                                                            <label class="form-check-label" for="formRadiosRight31">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[feetburningatnightrest][]"
                                                                id="formRadiosRight32" value="3">
                                                            <label class="form-check-label" for="formRadiosRight32">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[feetburningatnightrest][]"
                                                                id="formRadiosRight33" value="5">
                                                            <label class="form-check-label" for="formRadiosRight33">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>Leg spasm / tightness on walking</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Legspasmtightnessonwalking][]"
                                                                id="formRadiosRight34" value="0">
                                                            <label class="form-check-label" for="formRadiosRight34">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Legspasmtightnessonwalking][]"
                                                                id="formRadiosRight35" value="1">
                                                            <label class="form-check-label" for="formRadiosRight35">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Legspasmtightnessonwalking][]"
                                                                id="formRadiosRight36" value="3">
                                                            <label class="form-check-label" for="formRadiosRight36">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Legspasmtightnessonwalking][]"
                                                                id="formRadiosRight37" value="5">
                                                            <label class="form-check-label" for="formRadiosRight37">
                                                                5 pts
                                                            </label>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Pain interfering with sleep</td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Paininterferingwithsleep][]"
                                                                id="formRadiosRight34Paininterferingwithsleep" value="0">
                                                            <label class="form-check-label" for="formRadiosRight34Paininterferingwithsleep">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Paininterferingwithsleep][]"
                                                                id="formRadiosRight35Paininterferingwithsleep" value="1">
                                                            <label class="form-check-label" for="formRadiosRight35Paininterferingwithsleep">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Paininterferingwithsleep][]"
                                                                id="formRadiosRight36Paininterferingwithsleep" value="3">
                                                            <label class="form-check-label" for="formRadiosRight36Paininterferingwithsleep">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Paininterferingwithsleep][]"
                                                                id="formRadiosRight37Paininterferingwithsleep" value="5">
                                                            <label class="form-check-label" for="formRadiosRight37Paininterferingwithsleep">
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
                                                                id="formRadiosRight34Prikingpainonturningfromsidetoside" value="0">
                                                            <label class="form-check-label" for="formRadiosRight34Prikingpainonturningfromsidetoside">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Prikingpainonturningfromsidetoside][]"
                                                                id="formRadiosRight35Prikingpainonturningfromsidetoside" value="1">
                                                            <label class="form-check-label" for="formRadiosRight35Prikingpainonturningfromsidetoside">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Prikingpainonturningfromsidetoside][]"
                                                                id="formRadiosRight36Prikingpainonturningfromsidetoside" value="3">
                                                            <label class="form-check-label" for="formRadiosRight36Prikingpainonturningfromsidetoside">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Prikingpainonturningfromsidetoside][]"
                                                                id="formRadiosRight37Prikingpainonturningfromsidetoside" value="5">
                                                            <label class="form-check-label" for="formRadiosRight37Prikingpainonturningfromsidetoside">
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
                                                                id="formRadiosRight34Lowerbackmusclespasm" value="0">
                                                            <label class="form-check-label" for="formRadiosRight34Lowerbackmusclespasm">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowerbackmusclespasm][]"
                                                                id="formRadiosRight35Lowerbackmusclespasm" value="1">
                                                            <label class="form-check-label" for="formRadiosRight35Lowerbackmusclespasm">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowerbackmusclespasm][]"
                                                                id="formRadiosRight36Lowerbackmusclespasm" value="3">
                                                            <label class="form-check-label" for="formRadiosRight36Lowerbackmusclespasm">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[Lowerbackmusclespasm][]"
                                                                id="formRadiosRight37Lowerbackmusclespasm" value="5">
                                                            <label class="form-check-label" for="formRadiosRight37Lowerbackmusclespasm">
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
                                                                id="formRadiosRight34bowelmusclecontrol" value="0">
                                                            <label class="form-check-label" for="formRadiosRight34bowelmusclecontrol">
                                                                0 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[bowelmusclecontrol][]"
                                                                id="formRadiosRight35bowelmusclecontrol" value="1">
                                                            <label class="form-check-label" for="formRadiosRight35bowelmusclecontrol">
                                                                1 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[bowelmusclecontrol][]"
                                                                id="formRadiosRight36bowelmusclecontrol" value="3">
                                                            <label class="form-check-label" for="formRadiosRight36bowelmusclecontrol">
                                                                3 pts
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-right">
                                                            <input class="form-check-input symtoms_scrore_checkbox"
                                                                type="radio" name="symptoms_score[bowelmusclecontrol][]"
                                                                id="formRadiosRight37bowelmusclecontrol" value="5">
                                                            <label class="form-check-label" for="formRadiosRight37bowelmusclecontrol">
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
                                                <h6 class="mb-3 lut_title">Leg weakness / foot drop</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[footdrop][]" id="formRadiosRight042"
                                                        value="YES">
                                                    <label class="form-check-label" for="formRadiosRight042">
                                                        YES
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[footdrop][]" id="formRadiosRight043"
                                                        value="No">
                                                    <label class="form-check-label" for="formRadiosRight043">
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
                                                        name="clinical_indicator[spinecollection][]" id="formRadiosRight044"
                                                        value="YES">
                                                    <label class="form-check-label" for="formRadiosRight044">
                                                        YES 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input"type="radio"
                                                        name="clinical_indicator[spinecollection][]" id="formRadiosRight045"
                                                        value="No">
                                                    <label class="form-check-label" for="formRadiosRight045">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                       
                                        

                                        
                                        
                                    </div>
                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Clinical Exam 
                                            {{-- <a href="javascript:void(0)"
                                                class="order-now_btn order-now_btn_alt">Order Now <i
                                                    class="fa-solid fa-arrow-right-long"></i></a> --}}
                                                </h6>
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
                            <h6 class="section_title__">Imaging 
                                {{-- <a href="javascript:void(0)" class="order-now_btn order-now_btn_alt">Order Now <i class="fa-solid fa-arrow-right-long"></i></a> --}}
                            </h6>
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
                            <div class="col-lg-3">
                          <h6 class="mb-3 lut_title">Cervical - Nerve Roots </h6>
                        </div>
                        <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[CervicalNerveRoots][]" value="Visible"  id="formRadiosRightd38">
                                        <label class="form-check-label" for="formRadiosRightd38">
                                        Visible
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[CervicalNerveRoots][]" value="Non-Visible"  id="formRadiosRightd13">
                                        <label class="form-check-label" for="formRadiosRightd13">
                                        Non-Visible
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[CervicalNerveRoots][]" value="N/A"  id="formRadiosRightd119">
                                        <label class="form-check-label" for="formRadiosRightd119">
                                        N/A
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_119" style="display: none;">
                                <div class="text_area_gfhi mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate Rheumatology / notes here***" style="height: 100px" name="Imaging[CervicalNerveRootsNote][]"></textarea>
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
                                        <input class="form-check-input" type="radio" name="Imaging[CervicalFacetnerve][]" value="Visible" id="formRadiosRightd14">
                                        <label class="form-check-label" for="formRadiosRightd14">
                                        Visible
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[CervicalFacetnerve][]" value="Non-Visible" id="formRadiosRightd15">
                                        <label class="form-check-label" for="formRadiosRightd15">
                                        Non-Visible
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[CervicalFacetnerve][]" value="N/A" id="formRadiosRightd120">
                                        <label class="form-check-label" for="formRadiosRightd120">
                                        N/A
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_120" style="display: none;">
                                <div class="text_area_gfhi mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate Rheumatology / notes here***" style="height: 100px" name="Imaging[CervicalFacetnerveNote][]"></textarea>
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
                                        <input class="form-check-input" type="radio" name="Imaging[ThooracicIntercostalnerves][]" value="Visible" id="formRadiosRightd39">
                                        <label class="form-check-label" for="formRadiosRightd39">
                                        Visible
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[ThooracicIntercostalnerves][]" value="Non-Visible" id="formRadiosRightd40">
                                        <label class="form-check-label" for="formRadiosRightd40">
                                        Non-Visible
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[ThooracicIntercostalnerves][]" value="N/A" id="formRadiosRightd121">
                                        <label class="form-check-label" for="formRadiosRightd121">
                                        N/A
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_121" style="display: none;">
                                <div class="text_area_gfhi mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate Rheumatology / notes here***" style="height: 100px" name="Imaging[ThooracicIntercostalnervesNote][]"></textarea>
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
                                        <input class="form-check-input" type="radio" name="Imaging[LumbarFacetnerve][]" value="Visible" id="formRadiosRightd41">
                                        <label class="form-check-label" for="formRadiosRightd41">
                                       Visible
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[LumbarFacetnerve][]" value="Non-Visible" id="formRadiosRightd42">
                                        <label class="form-check-label" for="formRadiosRightd42">
                                        Non-Visible
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="Imaging[LumbarFacetnerve][]" value="N/A" id="formRadiosRightd122">
                                        <label class="form-check-label" for="formRadiosRightd122">
                                        N/A
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="textarea_122" style="display: none;">
                                <div class="text_area_gfhi mb-3">
                                <textarea class="form-control" placeholder="Enter Elaborate Rheumatology / notes here***" style="height: 100px" name="Imaging[LumbarFacetnerveNote][]"></textarea>
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

                                    <div class="col-lg-12">
                                        <h6 class="section_title__">Lab 
                                            {{-- <a href="javascript:void(0)" class="order-now_btn order-now_btn_alt">Order Now <i class="fa-solid fa-arrow-right-long"></i></a> --}}
                                        </h6>
                                      </div>
                                        <div class="col-lg-12">
                                          <div class="title_head">
                                              <h4>LABACUTEMSK35    &gt; <span class="sub_tt__"> Acute MSK inflammation Results</span></h4>
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

                                        
                                    <div class="col-lg-12  mb-2">
                                        <h6 class="section_title__">Special Investigation 
                                            {{-- <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#refer_patient" class="order-now_btn">Reffer <i class="fa-solid fa-arrow-right-long"></i></a> --}}
                                        </h6>
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
                                        <h6 class="section_title__">Eligibility STATUS <a href="javascript:void(0)"
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
                                          <h6 class="mb-3 lut_title">conservative - knee Brace</h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[conservativekneeBrace][]" value="Non-Eligibile" id="formRadiosRightj17">
                                                        <label class="form-check-label" for="formRadiosRightj17">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[conservativekneeBrace][]" value="Eligibile" id="formRadiosRightj18">
                                                        <label class="form-check-label" for="formRadiosRightj18">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j18" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[conservativekneeBraceNote][]"></textarea>
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
                                          <h6 class="mb-3 lut_title">Ozone intra-discal injection </h6>
                                        </div>
                                        <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Ozoneintradiscalinjection][]" value="Non-Eligibile" id="formRadiosRightj23">
                                                        <label class="form-check-label" for="formRadiosRightj23">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[Ozoneintradiscalinjection][]" value="Eligibile"  id="formRadiosRightj24">
                                                        <label class="form-check-label" for="formRadiosRightj24">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j24" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[OzoneintradiscalinjectionNote][]"></textarea>
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
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveRFAblation][]" value="Non-Eligibile" id="formRadiosRightj25">
                                                        <label class="form-check-label" for="formRadiosRightj25">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveRFAblation][]" value="Eligibile" id="formRadiosRightj26">
                                                        <label class="form-check-label" for="formRadiosRightj26">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j26" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[NerveRFAblationNote][]"></textarea>
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
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCooledRF][]" value="Non-Eligibile" id="formRadiosRightj27">
                                                        <label class="form-check-label" for="formRadiosRightj27">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCooledRF][]" value="Eligibile" id="formRadiosRightj28">
                                                        <label class="form-check-label" for="formRadiosRightj28">
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
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCryotherapy][]" value="Non-Eligibile" id="formRadiosRightj29">
                                                        <label class="form-check-label" for="formRadiosRightj29">
                                                        Non-Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                
                                                <div class="col-lg-4">
                                                    <div class="form-check form-check-right mb-3">
                                                        <input class="form-check-input" type="radio" name="ElegibilitySTATUS[NerveCryotherapy][]" value="Eligibile" id="formRadiosRightj30">
                                                        <label class="form-check-label" for="formRadiosRightj30">
                                                        Eligibile
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="textarea_j30" style="display: none;">
                                                <div class="form-check form-check-right mb-3 ps-0">
                                                <textarea class="form-control" placeholder="Enter Elaborate  / notes here***" style="height: 100px" name="ElegibilitySTATUS[NerveCryotherapyNote][]"></textarea>
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
                                        <h6 class="section_title__">Intervention PROCEDURE / Rx 
                                            {{-- <a
                                            href="javascript:void(0)" class="order-now_btn order-now_btn_alt">Order Now <i
                                                    class="fa-solid fa-arrow-right-long"></i></a> --}}
                                                </h6>
                                    </div>
                                    

                                    <div class="col-lg-12">
                                        <div class="row">
                                        <div class="col-lg-4">
                                      <h6 class="mb-3 lut_title">USTPINJECTION270</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[USTPINJECTION270LABPREIRBASIC32][]" value="LABPREIRBASIC32"  id="formRadiosRightf70">
                                                    <label class="form-check-label" for="formRadiosRightf70">
                                                    LABPREIRBASIC32
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[USTPINJECTION270LABPREIRSAFETY17][]" value="LABPREIRSAFETY17"  id="formRadiosRightf71">
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
                                      <h6 class="mb-3 lut_title">ANGIOPRPINJECTION390</h6>
                                    </div>
                                    <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOPRPINJECTION390LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightf73">
                                                    <label class="form-check-label" for="formRadiosRightf73">
                                                    LABPREANGIO48
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-4">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOPRPINJECTION390LABPREIRSAFETY17][]"  value="LABPREIRSAFETY17" id="formRadiosRightf74">
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
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOIDOZINJECTION440LABPREANGIO48][]"  value="LABPREANGIO48" id="formRadiosRightf75">
                                                    <label class="form-check-label" for="formRadiosRightf75">
                                                    LABPREANGIO48
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOIDOZINJECTION440LABPREIRSAFETY17][]"  value="LABPREIRSAFETY17" id="formRadiosRightf76">
                                                    <label class="form-check-label" for="formRadiosRightf76">
                                                    LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOIDOZINJECTION440IVSEDATION270][]"  value="IVSEDATION270" id="formRadiosRightf76IVSEDATION270">
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
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCNL470LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightf77">
                                                    <label class="form-check-label" for="formRadiosRightf77">
                                                    LABPREANGIO48
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCNL470LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf78">
                                                    <label class="form-check-label" for="formRadiosRightf78">
                                                    LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCNL470IVSEDATION270][]" value="IVSEDATION270" id="formRadiosRightf78IVSEDATION270">
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
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIORFABLATION490LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightf79">
                                                    <label class="form-check-label" for="formRadiosRightf79">
                                                    LABPREANGIO48
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIORFABLATION490LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf80">
                                                    <label class="form-check-label" for="formRadiosRightf80">
                                                    LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIORFABLATION490IVSEDATION270][]" value="IVSEDATION270" id="formRadiosRightf80IVSEDATION270">
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
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCOOLEDRF560LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightf81">
                                                    <label class="form-check-label" for="formRadiosRightf81">
                                                    LABPREANGIO48
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCOOLEDRF560LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf82">
                                                    <label class="form-check-label" for="formRadiosRightf82">
                                                    LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCOOLEDRF560IVSEDATION270][]" value="IVSEDATION270" id="formRadiosRightf82IVSEDATION270">
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
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCRYOABLATION610LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightf83">
                                                    <label class="form-check-label" for="formRadiosRightf83">
                                                    LABPREANGIO48
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCRYOABLATION610LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf84">
                                                    <label class="form-check-label" for="formRadiosRightf84">
                                                    LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOCRYOABLATION610IVSEDATION270][]" value="IVSEDATION270" id="formRadiosRightf84IVSEDATION270">
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
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOGAE2310LABPREANGIO48][]" value="LABPREANGIO48" id="formRadiosRightf85">
                                                    <label class="form-check-label" for="formRadiosRightf85">
                                                    LABPREANGIO48
                                                    </label>
                                                </div>
                                            </div>
            
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOGAE2310LABPREIRSAFETY17][]" value="LABPREIRSAFETY17" id="formRadiosRightf86">
                                                    <label class="form-check-label" for="formRadiosRightf86">
                                                    LABPREIRSAFETY17
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-check form-check-right mb-3">
                                                    <input class="form-check-input" type="checkbox" name="Intervention[ANGIOGAE2310IVSEDATION270][]" value="IVSEDATION270" id="formRadiosRightf87">
                                                    <label class="form-check-label" for="formRadiosRightf87">
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
                                        <h6 class="section_title__">Prescription 
                                            {{-- <a href="javascript:void(0)" class="order-now_btn order-now_btn_alt">Order Now <i class="fa-solid fa-arrow-right-long"></i></a> --}}
                                        </h6>
                                        <div class="title_head">
                                              <h4>ADD A DRUG </h4>
                                          </div>
                                      </div>
                                      <div class="row">
                                      <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[CollagenSuppliment][]" value="Collagen Suppliment (powder / liquid) - 1 scoop / 1 saschet PO OD x 3 months" id="formRadiosRightf90">
                                                <label class="form-check-label" for="formRadiosRightf90">
                                                Collagen Suppliment (powder / liquid) - 1 scoop / 1 saschet PO OD x 3 months
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Diclofenac][]" value="Diclofenac Gel 1 Ampule -Topical TID x 2 weeks" id="formRadiosRightf91">
                                                <label class="form-check-label" for="formRadiosRightf91">
                                                Diclofenac Gel 1 Ampule -Topical TID x 2 weeks
                                                </label>    
                                        </div>
                                    </div>
                                      </div>
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Lidocaine][]" value="Lidocaine Patch - 1 Patch Topical OD X 2 weeks" id="formRadiosRightf92">
                                                <label class="form-check-label" for="formRadiosRightf92">
                                                Lidocaine Patch - 1 Patch Topical OD X 2 weeks
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Celebrix][]" value="Celebrix Tab - 200 mg PO BID x 1 month" id="formRadiosRightf93">
                                                <label class="form-check-label" for="formRadiosRightf93">
                                                Celebrix Tab - 200 mg PO BID x 1 month
                                                </label>    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Riparil][]" value="Riparil Gel 1 Ampule - Topical TID x 2 weeks" id="formRadiosRightf94">
                                                <label class="form-check-label" for="formRadiosRightf94">
                                                Riparil Gel 1 Ampule - Topical TID x 2 weeks
                                                </label>    
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check form-check-right mb-3">
                                            <input class="form-check-input" type="checkbox" name="Prescription[Sporidex][]" value="Sporidex (Cephalexin) Tab - 500 mg PO BID x 5 days" id="formRadiosRightf94">
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
                                    <div class="col-lg-12">
                                        <div class="row">

                                            
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
                                                    Orthotics
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
var isChecked_sym_a75 = $("#sym_a75").is(":checked");
           
           var sym_a75_durationValue = $("select[name='symptoms[5][1]']").val();
           
           var sym_a75_durationType = $("select[name='symptoms[5][2]']").val();
           var sym_a75_description = $("textarea[name='symptoms[5][3]']").val();

           if (sym_a75_durationValue !== "" || sym_a75_durationType !== "" || sym_a75_description !== "") {
              
               if(isChecked_sym_a75 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Leg spasm / tightness on walking fields in Symptoms.',
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
//  Leg spasm / tightness on walking end 



//   Pain interfering with sleep  start
var isChecked_sym_a7 = $("#sym_a7").is(":checked");
           
           var sym_a7_durationValue = $("select[name='symptoms[6][1]']").val();
           
           var sym_a7_durationType = $("select[name='symptoms[6][2]']").val();
           var sym_a7_description = $("textarea[name='symptoms[6][3]']").val();

           if (sym_a7_durationValue !== "" || sym_a7_durationType !== "" || sym_a7_description !== "") {
              
               if(isChecked_sym_a7 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out  Pain interfering with sleep fields in Symptoms.',
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
//   Pain interfering with sleep  end 



//   Priking pain on turning from side to side start
var isChecked_sym_aa7 = $("#sym_aa7").is(":checked");
           
           var sym_aa7_durationValue = $("select[name='symptoms[7][1]']").val();
           
           var sym_aa7_durationType = $("select[name='symptoms[7][2]']").val();
           var sym_aa7_description = $("textarea[name='symptoms[7][3]']").val();

           if (sym_aa7_durationValue !== "" || sym_aa7_durationType !== "" || sym_aa7_description !== "") {
              
               if(isChecked_sym_aa7 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out  Priking pain on turning from side to side fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_aa7');
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
var isChecked_sym_aa8 = $("#sym_aa8").is(":checked");
           
           var _sym_aa8_durationValue = $("select[name='symptoms[8][1]']").val();
           
           var _sym_aa8_durationType = $("select[name='symptoms[8][2]']").val();
           var _sym_aa8_description = $("textarea[name='symptoms[8][3]']").val();

           if (_sym_aa8_durationValue !== "" || _sym_aa8_durationType !== "" || _sym_aa8_description !== "") {
              
               if(isChecked_sym_aa8 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out Lower back muscle spasm fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_aa8');
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
var isChecked_sym_aa9 = $("#sym_aa9").is(":checked");
           
           var _sym_aa9_durationValue = $("select[name='symptoms[9][1]']").val();
           
           var _sym_aa9_durationType = $("select[name='symptoms[9][2]']").val();
           var _sym_aa9_description = $("textarea[name='symptoms[9][3]']").val();

           if (_sym_aa9_durationValue !== "" || _sym_aa9_durationType !== "" || _sym_aa9_description !== "") {
              
               if(isChecked_sym_aa9 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out loss of urinary / bowel muscle control fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_aa9');
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
var isChecked_sym_aa10 = $("#sym_aa10").is(":checked");
           
           var sym_aa10_durationValue = $("select[name='symptoms[10][1]']").val();
           
           var sym_aa10_durationType = $("select[name='symptoms[10][2]']").val();
           var sym_aa10_description = $("textarea[name='symptoms[10][3]']").val();

           if (sym_aa10_durationValue !== "" || sym_aa10_durationType !== "" || sym_aa10_description !== "") {
              
               if(isChecked_sym_aa10 ===false){
                   
                   Swal.fire({
                           icon: 'error',
                           title: 'Oops...',
                           text: 'Please fill out leg weakness fields in Symptoms.',
                           confirmButtonText: 'OK'
                       }).then(function () {
                           setTimeout(function() {
                               var elementToScroll = document.getElementById('sym_aa10');
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

    imageObj.src = '{{ asset('/assets/thyroid-eligibility-form/add/ShoulderPain.jpg') }}';

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
        
        $("#storeSpinePainEligibilityForms").submit(function(event) {


            const dataURL = stage.toDataURL({
                        mimeType: 'image/png'
                    });

                document.getElementById('canvasImage').value = dataURL;
            
            event.preventDefault();
            let formData = new FormData(this);
            if (isFormDataValid(formData)) {
                
            
            if (!validateForm()) {
                e.preventDefault(); 
            } 
            else {
                if(validateForm()){
                    $.ajax({
                        url: '{{ route("user.storeSpinePainEligibilityForms") }}',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log(response);
                            
                            var patientId = response.patient_id;
                            if(response!=''){
        
                                swal.fire(
        
                                    'Success',
        
                                    'Spine Pain form saved successfully!',
        
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
        } else {
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
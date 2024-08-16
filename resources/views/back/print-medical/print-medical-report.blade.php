<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeMarch">
    <link class="dark-theme-img" rel="icon" href="{{ asset('/assets/images/new-images/logofwhite.png') }}" type="image/x-icon">

    <!-- Site Title -->
    <title>Print Medical Record</title>
    <link rel="stylesheet" href="{{ asset('/assets/report-genrate/css/style.css') }}">
    <style>
        .form-control {
            padding: 10px 10px;
            width: 100%;
            border: 1px solid #dedede;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .footer_section {
            padding: 6px 55px;
            height: 115px;
            background-position: center;
            background-size: inherit;
            background-repeat: no-repeat;
        }

        .signature-pad canvas {
            border: 1px solid #ececec;
            width: 100%;
        }

        .InputBox {
            display: flex;
            gap: 10px;
        }

        #clear-signature {
            padding: 4px 7px;
            color: #fff;
            background: #78ade6;
            border: 1px solid #78ade6;
            border-radius: 5px;
        }

        .formGroup label {
            display: block;
            margin-bottom: 5px;
        }

    </style>
    <style>
        #save-signature {
            padding: 4px 7px;
            color: #fff;
            background: #78e68e;
            border: 1px solid #81e678;
            border-radius: 5px;
            float: right;
        }

        footer {
            font-size: 9px;
            width: 100%;
            height: 128px !important;
            text-align: center;
        }

        @page{
            padding-bottom: 50px;
        }
       
        @media print {
            footer { 
                page-break-before: always;
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
            }

            #bodyContent{
                padding-bottom: 50px;
            }
        }

    </style>
</head>

<style>
    /* 26 apr 2024 */
    .detail_box ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .detail_box ul li {
        display: flex;
        align-items: center;
        justify-content: space-between;

    }

    .detail_ans h6 {
        font-weight: 400;
        color: #686868;
    }

    .border-right-dashed {
        border-right: 2px dashed #ececec;
    }

    .row {
        display: flex;
    }

    .col-lg-6 {
        width: 50%;
        padding: 0 15px;
    }

    .patient {
        border: 1px solid #ececec;
        padding: 20px 20px 15px;
        margin-bottom: 50px;
        background: aliceblue;
        border-radius: 5px;
    }

    .detail_title h6 {
        margin-bottom: 0;
        font-size: 15px;
    }

    .detail_ans h6 {
        margin-bottom: 0;
        font-size: 14px;
    }

    .mb-4 {
        margin-bottom: 20px;
    }

    #download_section {
        padding-bottom: 120px;
    }


</style>

<body>
    <div class="cs-container">
        <div class="cs-invoice cs-style1">
            <div class="cs-invoice_in pdf_box" id="download_section">
                <div id="bodyContent">
                <div class="cs-invoice_head logo_head cs-type1 cs-mb25">
                    <div class="cs-invoice_right cs-text_right">
                        <div class="cs-logo cs-mb5"><img src="{{ asset('/assets/report-genrate/img/FullLogo-01.svg') }}" alt="Logo">
                        </div>
                    </div>

                </div>
                <div class="body_meain">

                    <div class="row patient">
                        <div class="col-lg-6 border-right-dashed">
                            <div class="detail_box pe-4">
                                <ul>
                                    <li class="mb-4">
                                        <div class="detail_title">
                                            <h6>Patient ID</h6>
                                        </div>
                                        <div class="detail_ans">
                                            <h6>{{ $patient->patient_id }}</h6>
                                        </div>
                                    </li>
                                    <li class="mb-4">
                                        <div class="detail_title">
                                            <h6>Patient Name</h6>
                                        </div>
                                        <div class="detail_ans">
                                            <h6>{{ $patient->name }}</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="detail_title">
                                            <h6>Date of Birth</h6>
                                        </div>
                                        <div class="detail_ans">
                                            <h6>{{ $patient->birth_date }}</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="detail_box pe-4">
                                <ul>


                                    <li class="mb-4">
                                        <div class="detail_title">
                                            <h6>Mobile No.</h6>
                                        </div>
                                        <div class="detail_ans">
                                            <h6>{{ $patient->mobile_no }}</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="detail_title">
                                            <h6>Email Address</h6>
                                        </div>
                                        <div class="detail_ans">
                                            <h6>{{ $patient->email }}</h6>
                                        </div>
                                    </li>



                                </ul>
                            </div>
                        </div>
                    </div>






                    @if (isset($generalDiagnosis_) && !empty($generalDiagnosis_))
                    @if(($generalDiagnosis && $generalDiagnosis->count()>0) || ($symptoms_scores_db && $symptoms_scores_db->count()>0))
                    <div class="symptoms_section">
                        <div class="section_title">
                            <h2>Symptoms</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak diagnosis_data">

                            <ul>
                                {{-- @dump($symptoms_scores_db) --}}
                                @if($generalDiagnosis && $generalDiagnosis->count()>0)
                                <li>
                                    @forelse ($generalDiagnosis as $key =>$value)
                                    <div class="appoin_date">
                                        <div>
                                            <div class="diagnosis_show">

                                                <div class="symp_title">
                                                    <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                        {{ $value['SymptomType'] ?? '' }}<span class="sym_duration">
                                                        </span>
                                                    </h6>
                                                    <p class="diagnosis_text">
                                                        {{ $value['SymptomDurationNote'] ?? '' }}!</p>
                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                    @empty
                                    <div class="appoin_date">
                                        <div>
                                            <div class="diagnosis_show">


                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <span style="font-size:10px;"> ---- </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse

                                </li>
                                @elseif($symptoms_scores_db)
                                <li>
                                    @forelse ($symptoms_scores_db as $symptoms)
                                    @php

                                    $symptoms_data_value = json_decode($symptoms->data_value,true);

                                    @endphp
                                    <div class="appoin_date">
                                        <div>
                                            <div class="diagnosis_show">

                                                @forelse ($symptoms_data_value as $key =>$value)
                                                <div class="appoin_date">
                                                    <div>
                                                        <div class="diagnosis_show">

                                                            <div class="symp_title">
                                                                <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                                    {{ $value['SymptomType'] ?? '' }}<span class="sym_duration">&nbsp;-{{
                                                                        $value['SymptomDurationValue'] ?? '' }} &nbsp;{{
                                                                        $value['SymptomDurationType'] ?? '' }}</span>
                                                                </h6>
                                                                <p class="diagnosis_text"> {{
                                                                    $value['SymptomDurationNote'] ?? '' }}!</p>
                                                            </div>
                                                            {{-- @if($loop->last)
                                                            <p class="diagnosis_date"><span class="enter_span_hivj">
                                                                    Entered By | {{
                                                                    optional(optional($symptoms)->doctor)->name ?? ''
                                                                    }}</span> <span class="enter_span_hivj">{{
                                                                    isset($symptoms) && isset($symptoms->created_at) ?
                                                                    $symptoms->created_at->format('D, d M Y, H:i A') :
                                                                    '' }}</span></p>
                                                            @endif --}}


                                                        </div>

                                                    </div>
                                                </div>
                                                @empty
                                                @endforelse

                                            </div>

                                        </div>

                                    </div>



                                    @empty
                                    <div class="appoin_date">
                                        <div>
                                            <div class="diagnosis_show">


                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <span style="font-size:10px;"> ---- </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                </li>

                                @endif

                            </ul>
                        </div>
                    </div>
                    @endif
                    @endif



                    @if (isset($pastMedicalHistory) && !empty($pastMedicalHistory))

                    <div class="pastMedical_section">
                        <div class="section_title">
                            <h2>Past Medical History</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak">



                            <ul id="past_medical_histories">
                                @if ($patient_past_history->isEmpty())
                                <li><small style="font-size:10px;">----</small>.
                                </li>
                                @else
                                @foreach ($patient_past_history as $past_history)
                                <li>

                                    <div class="appoin_title">

                                        <h6>{{ $past_history->diseases_name }}</h6>

                                        </p>

                                    </div>

                                    <div class="appoin_date">

                                        <div class="read-more-content">

                                            <p>

                                                {{ $past_history->describe }}
                                            </p>

                                        </div>


                                    </div>

                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endif




                    @if (isset($pastSurgicalHistory) && !empty($pastSurgicalHistory))

                    <div class="pastSurgical_section">
                        <div class="section_title">
                            <h2>Past Surgical History</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak">

                            <ul>
                                @if ($patient_past_surgical->isEmpty())
                                <li><small style="font-size:10px;">----</small>.
                                </li>
                                @else
                                @foreach ($patient_past_surgical as $past_surgical)
                                <li>

                                    <div class="appoin_title">

                                        <h6>{{ $past_surgical->diseases_name }}</h6>



                                    </div>

                                    <div class="appoin_date">

                                        <div class="read-more-content">

                                            <p>

                                                {{ $past_surgical->describe }}
                                            </p>

                                        </div>



                                    </div>

                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endif


                    @if (isset($oldCurrentMeds) && !empty($oldCurrentMeds))
                    <div class="oldCurrentMeds_section">
                        <div class="section_title">
                            <h2>Old/Current meds</h2>
                        </div>
                        <div class="drug">
                            <ul>
                                @if ($patient_current_med->isEmpty())
                                <li><small style="font-size:10px;">----</small></li>
                                @else
                                @foreach ($patient_current_med as $patient_current)
                                <li>

                                    <div class="appoin_title">

                                        <h6>{{ $patient_current->drug_name }}</h6>



                                    </div>

                                    <div class="appoin_date">

                                        <div class="read-more-content">

                                            <p>

                                                {{ $patient_current->frequency }}
                                            </p>

                                        </div>


                                    </div>

                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endif



                    @if (isset($allergies) && !empty($allergies))
                    <div class="allergies_section">
                        <div class="section_title">
                            <h2>Allergies</h2>
                        </div>


                        <ul class="symptoms">
                            @php
                            $patient_allergies = App\Models\patient\Patient_allergy::where(
                            'patient_id',
                            decrypt(@$id),
                            )
                            ->orderBy('id', 'desc')
                            ->get();
                            @endphp

                            @if ($patient_allergies->isEmpty())
                            <li><small style="font-size:10px;">----</small>.</li>
                            @else
                            @foreach ($patient_allergies as $patient_allergy)
                            <li>{{ $patient_allergy->allergy_name }}</li>
                            @endforeach
                            @endif

                        </ul>

                    </div>
                    @endif




                    @if (isset($clinicalExam) && !empty($clinicalExam))
                    @if(($regionalpatientGeneralDiagnosis && $regionalpatientGeneralDiagnosis->count()>0) || 
                    ($systemicpatientGeneralDiagnosis && $systemicpatientGeneralDiagnosis->count()>0) || 
                    ($ClinicalExam_db && $ClinicalExam_db->count()>0))
                    <div class="ClinicalExam_section">
                        <div class="section_title">
                            <h2>Clinical Exam</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak diagnosis_data">

                            <ul>
                                @forelse ($regionalpatientGeneralDiagnosis as $record)
                                <li>
                                    <div class="appoin_date">
                                        <div>
                                            <div class="diagnosis_show">

                                                @if (isset($record->RegionalExam))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            Regional Exam
                                                        </h6>
                                                    </div>
                                                    <p class="ss_result">
                                                        <strong>{{ $record->RegionalExam }} -
                                                            {{ $record->RegionalExamNote }}</strong>
                                                    </p>
                                                </div>

                                                @endif

                                            </div>



                                        </div>

                                    </div>
                                </li>
                                @empty
                                @endforelse


                            </ul>

                            <ul>
                                @forelse ($systemicpatientGeneralDiagnosis as $record)
                                <li>
                                    <div class="appoin_date">
                                        <div>
                                            <div class="diagnosis_show">


                                                @if (isset($record->SystemicExam))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            Systemic Exam</h6>
                                                    </div>
                                                    <p class="ss_result">
                                                        <strong>{{ $record->SystemicExam }} -
                                                            {{ $record->SystemicExamNote }}</strong>
                                                    </p>
                                                </div>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                </li>
                                @empty
                                @endforelse




                                @if (isset($ClinicalExam_db))
                                @forelse ($ClinicalExam_db as $record)
                                <li>

                                    <div class="appoin_date">
                                        <div class="read-more-content sypm_tom_cnt" style="">
                                            <div class="diagnosis_show">

                                                @php
                                                $ClinicalExam = json_decode($record->data_value, true);
                                                @endphp


                                                @if (isset($ClinicalExam['RegionalExam']) &&
                                                $ClinicalExam['RegionalExam'][0] == 'Abnormal')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            Regional Exam</h6>
                                                    </div>
                                                    <p class="ss_result">
                                                        <strong>Abnormal</strong>
                                                        -
                                                        {{ $ClinicalExam['RegionalExamNote'][0] ?? '' }}.
                                                    </p>
                                                </div>
                                                @endif


                                                @if (isset($ClinicalExam['RegionalExam']) &&
                                                $ClinicalExam['RegionalExam'][0] == 'Normal')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            Regional Exam</h6>
                                                    </div>
                                                    <p class="ss_result">
                                                        <strong>Normal</strong>

                                                </div>
                                                @endif
                                                @if (isset($ClinicalExam['SystemicExam']) &&
                                                $ClinicalExam['SystemicExam'][0] == 'Abnormal')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            Systemic Exam</h6>
                                                    </div>
                                                    <p class="ss_result">
                                                        <strong>Abnormal</strong>
                                                        -
                                                        {{ $ClinicalExam['SystemicExamNote'][0] ?? '' }}.
                                                    </p>
                                                </div>
                                                @endif
                                                @if (isset($ClinicalExam['SystemicExam']) &&
                                                $ClinicalExam['SystemicExam'][0] == 'Normal')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            Systemic Exam</h6>
                                                    </div>
                                                    <p class="ss_result">
                                                        <strong>Normal</strong>

                                                </div>
                                                @endif

                                            </div>
                                            {{-- <p class="diagnosis_date top_de"><span class="enter_span_hivj">{{
                                                    'Entered By |' . optional(optional($record)->doctor)->name ?? '' }}
                                            </span> <span class="enter_span_hivj">{{ isset($record) &&
                                                    isset($record->created_at) ? $record->created_at->format('D, d M Y,
                                                    H:i A') : '' }}
                                            </span></p> --}}


                                        </div>

                                    </div>
                                </li>
                                @empty
                                <ul>
                                    <li><small style="font-size:10px;">----</small></li>
                                </ul>
                                @endforelse
                                @endif

                            </ul>






                        </div>
                    </div>
                    @endif
                    @endif



                    @if (isset($imagingExam) && !empty($imagingExam))
                    @if ($VaricoceleEmboForm)
                    <div class="ClinicalExam_section">
                        <img src="{{ asset('/assets/thyroid-eligibility-form/' . $VaricoceleEmboForm->AnnotateimageData ?? '') }}" style="width: 700px;" />
                    </div>
                    @endif

                    @endif





                    @if (isset($lab_) && !empty($lab_))
                    <div class="Lab_section">
                        <div class="section_title">
                            <h2>Lab</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak diagnosis_data">


                            <ul>
                                <li>

                                    <div class="appoin_date">

                                        <div class="diagnosis_show">


                                            <div class="datatable-container allinvoice_table custom_table_area table_test_fgi">


                                                <table id="allinvoice_table" class="display">
                                                    <thead>
                                                        <tr>
                                                            <th>Test Name</th>
                                                            <th>Appoinment Date</th>
                                                            <th>Status</th>
                                                            <th>Order Date</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($Patient_order_labs as $Patient_order_lab)
                                                        @if ($Patient_order_lab->test_type == 'pathology')
                                                        <tr>
                                                            @php
                                                            $pathology_price_list = DB::table(
                                                            'pathology_price_list',
                                                            )->where('id',
                                                            $Patient_order_lab->task)->where('price_type',$Patient_order_lab->test_type)->first();
                                                            @endphp

                                                            <td>{{ $pathology_price_list->test_name ?? '' }}
                                                            </td>

                                                            <td>{{ $Patient_order_lab->appoinment_date }}
                                                            </td>

                                                            @if ($Patient_order_lab->approveDocumentSts == '1')
                                                            <td><button class="pending-badge">Approve
                                                                    By Nurse</button>
                                                            </td>
                                                            @elseif($Patient_order_lab->approveDocumentSts == '0')
                                                            <td><button class="confirmed-badge">Reject
                                                                    By nurse</button>
                                                            </td>
                                                            @else
                                                            <td><button class="confirmed-badge">No
                                                                    Action</button>
                                                            </td>
                                                            @endif



                                                            @if ($Patient_order_lab->labDocument)
                                                            <td>
                                                                <a href="{{ env('Document_Url') }}{{ $Patient_order_lab->labDocument }}" download="{{ env('Document_Url') }}{{ $Patient_order_lab->labDocument }}" class="download_rp_btn">
                                                                    <i class="fa-solid fa-file-arrow-down"></i>
                                                                    Download Report
                                                                </a>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <a href="" class="download_rp_btn" style="color: #f30728;">
                                                                    <i class="fa-solid fa-file-arrow-down" style="color: #db0808; border: 1px solid #e90a0a;"></i>
                                                                    Report Not Uploded
                                                                </a>
                                                            </td>
                                                            @endif

                                                        </tr>
                                                        @endif
                                                        @empty
                                                        <td colspan="4" class="text-center">No record found
                                                        </td>
                                                        @endforelse

                                                    </tbody>
                                                </table>



                                            </div>

                                        </div>





                                    </div>
                                </li>
                                @forelse ($Labs as $record)
                                <li>

                                    <div class="appoin_date">
                                        <div class="read-more-content sypm_tom_cnt" style="">
                                            <div class="diagnosis_show">
                                                <p class="diagnosis_date top_de"><span class="enter_span_hivj">
                                                        @php
                                                        $jsonData = json_decode($record->data_value, true);

                                                        @endphp
                                                        <div class="ss_result_box">
                                                            <div class="symp_title mb-1">
                                                                <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                                    LABTFT39 > TFT Results</h6>

                                                            </div>

                                                            <p class="ss_result"><strong>TSH</strong> -

                                                                @if ($jsonData['TSH'][0] == 'normal')
                                                                (0.4 - 5.49 mIU/L)
                                                                <span>Normal</span>
                                                                @elseif ($jsonData['TSH'][0] == 'low')
                                                                (0.01 - 0.39 mIU/L)<span>Low</span>
                                                                @elseif ($jsonData['TSH'][0] == 'high')
                                                                (> 5.49 mIU/L)<span>High</span>
                                                                @endif


                                                            </p>
                                                            <p class="ss_result"><strong>T4</strong>

                                                                @if ($jsonData['T4'][0] == 'normal')
                                                                0.9 to 2.3 ng/dL <span>Normal</span>
                                                                @elseif ($jsonData['T4'][0] == 'low')
                                                                Below 0.9 ng/dL<span>Low</span>
                                                                @elseif ($jsonData['T4'][0] == 'high')
                                                                Above 2.3 ng/dL&nbsp;<span>High</span>
                                                                @endif


                                                            </p>
                                                        </div>
                                                        <div class="ss_result_box">
                                                            <div class="symp_title mb-1">
                                                                <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                                    LABPTFT39 > PTFT Results</h6>

                                                            </div>
                                                            <p class="ss_result"><strong>PTH</strong> -

                                                                @if ($jsonData['PTH'][0] == 'normal')
                                                                (0.4 - 5.49 mIU/L) <span>Normal</span>
                                                                @elseif ($jsonData['PTH'][0] == 'low')
                                                                Below 0.4 mIU/L <span>Low</span>
                                                                @elseif ($jsonData['PTH'][0] == 'high')
                                                                5.5 mIU/L and above <span>High</span>
                                                                @endif

                                                            </p>
                                                            <p class="ss_result"><strong>Ca+</strong> -
                                                                @if ($jsonData['Ca'][0] == 'normal')
                                                                (0.4 - 5.49 mIU/L) <span>Normal</span>
                                                                @elseif ($jsonData['Ca'][0] == 'low')
                                                                Below 0.4 mIU/L <span>Low</span>
                                                                @elseif ($jsonData['Ca'][0] == 'high')
                                                                5.5 mIU/L and above <span>High</span>
                                                                @endif


                                                            </p>
                                                        </div>

                                            </div>

                                        </div>

                                    </div>
                                </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    @endif

                    @if(isset($specialInvestigation) && !empty($specialInvestigation))
                    @if (($SpecialInvestigations_db && $SpecialInvestigations_db->count() > 0) || ($SpecialInvestigations_db1 && $SpecialInvestigations_db1->count() > 0))

                    <div class="SpecialInvestigation_section">
                        <div class="section_title">
                            <h2>Special Investigation</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak diagnosis_data">
                            <ul>
                                <li>
                                    @if ($SpecialInvestigations_db && $SpecialInvestigations_db->count() > 0)
                                    @forelse ($SpecialInvestigations_db as $record)
                                    <div class="appoin_date">
                                        <div>
                                            <div class="diagnosis_show">

                                                <p class="diagnosis_text">{{ $record->Title }} </p>
                                                <p class="diagnosis_text">{{ $record->SubTitle }} </p>
                                                <p class="diagnosis_text">{{ $record->Invistigation }}
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                    @empty
                                    <small style="font-size:10px;">----</small>
                                    @endforelse
                                    @elseif (isset($SpecialInvestigations_db1))
                                    @forelse ($SpecialInvestigations_db1 as $record)
                                    <div class="appoin_date">
                                        <div class="diagnosis_show">
                                            @php
                                            $specialInvestigations = json_decode($record->data_value, true);
                                            @endphp
                                            @if (isset($specialInvestigations['evaluation']) && $specialInvestigations['evaluation'][0]=='Abnormal')


                                            <div class="ss_result_box">
                                                <div class="symp_title mb-1">
                                                    <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                        REQVCFUNEVAL5</h6>
                                                    <h6 class="ss_result">Vocal cord function
                                                        endoscopic evaluation</h6>
                                                </div>
                                                <p class="ss_result"><strong>Abnormal</strong>
                                                    - {{ $specialInvestigations['evaluationNOTE'][0] ?? '' }}</p>
                                            </div>
                                            @endif
                                            @if (isset($specialInvestigations['PAPSmear']) && $specialInvestigations['PAPSmear'][0]=='Abnormal')


                                            <div class="ss_result_box">
                                                <div class="symp_title mb-1">
                                                    <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                        REQVCFUNEVAL5</h6>
                                                    <h6 class="ss_result">Vocal cord function
                                                        endoscopic evaluation</h6>
                                                </div>
                                                <p class="ss_result"><strong>Abnormal</strong>- {{ $specialInvestigations['PAPSmearNote'][0] ?? '' }}</p>
                                            </div>
                                            @endif
                                            @if (isset($specialInvestigations['evaluation']) && $specialInvestigations['evaluation'][0]=='Normal')
                                            <div class="ss_result_box">
                                                <div class="symp_title mb-1">
                                                    <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                        REQVCFUNEVAL5</h6>
                                                    <h6 class="ss_result">Vocal cord function
                                                        endoscopic evaluation</h6>
                                                </div>
                                                <p class="ss_result"><strong>Normal</strong>
                                                </p>
                                            </div>
                                            @endif
                                            @if (isset($specialInvestigations['PAPSmear']) && $specialInvestigations['PAPSmear'][0] == 'Abnormal')
                                            <div class="ss_result_box">
                                                <div class="symp_title mb-1">
                                                    <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                        REQPAPSMEAR5</h6>
                                                    <h6 class="ss_result">PAP Smear of
                                                        cervix</h6>
                                                </div>
                                                <p class="ss_result">
                                                    <strong>Abnormal</strong>
                                                    -
                                                    {{ $specialInvestigations['PAPSmearNote'][0] ?? '' }}
                                                </p>
                                            </div>
                                            @endif
                                            @if (isset($specialInvestigations['PAPSmear']) && $specialInvestigations['PAPSmear'][0] == 'Normal')
                                            <div class="ss_result_box">
                                                <div class="symp_title mb-1">
                                                    <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                        REQPAPSMEAR5</h6>
                                                    <h6 class="ss_result">PAP Smear of
                                                        cervix</h6>
                                                </div>
                                                <p class="ss_result">
                                                    <strong>Normal</strong>

                                                </p>
                                            </div>
                                            @endif

                                            @if (isset($specialInvestigations['title']) && $specialInvestigations['title'])
                                            <div class="ss_result_box">
                                                <div class="symp_title mb-1">
                                                    <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                        REQVCFUNEVAL5</h6>
                                                    <h6 class="ss_result">{{ $specialInvestigations['title'] ?? '' }}</h6>
                                                </div>
                                                <p class="ss_result"><strong>{{ $specialInvestigations['subtile'] ?? '' }}</strong>
                                                    -
                                                    {{ $specialInvestigations['invistigation'] ?? '' }}
                                                </p>
                                            </div>
                                            @endif



                                            @if (isset($specialInvestigations['Peripheral']) && $specialInvestigations['Peripheral'])
                                            <div class="ss_result_box">
                                                <div class="symp_title mb-1">
                                                    <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                        REQDNAFRAGTEST320 > DNA Fragmentation
                                                        test
                                                    </h6>

                                                </div>
                                                <div class="symp_title mb-3">

                                                    @if (isset($specialInvestigations['Peripheral']) && $specialInvestigations['Peripheral'][0] == 'Abnormal')
                                                    <p class="ss_result">
                                                        {{ $specialInvestigations['Peripheral'][0] ?? '' }}
                                                    </p>
                                                    <p class="ss_result">
                                                        &nbsp;&nbsp;{{ $specialInvestigations['PeripheralNote'][0] ?? '' }}
                                                    </p>
                                                    @else
                                                    <p class="ss_result">
                                                        &nbsp;&nbsp;{{ $specialInvestigations['Peripheral'][0] ?? '' }}
                                                    </p>
                                                    @endif




                                                </div>
                                            </div>
                                            @endif
                                            @if (isset($specialInvestigations['endoscopy']))
                                            <div class="ss_result_box">
                                                <div class="symp_title mb-1">
                                                    <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                        REQLGIENDOSCOPY5 > Lower GI
                                                        endoscopy
                                                    </h6>

                                                </div>
                                                <div class="symp_title mb-3">

                                                    @if (isset($specialInvestigations['endoscopy']) && $specialInvestigations['endoscopy'][0] == 'Abnormal')
                                                    <p class="ss_result">
                                                        {{ $specialInvestigations['endoscopy'][0] ?? '' }}
                                                    </p>
                                                    <p class="ss_result">
                                                        &nbsp;&nbsp;{{ $specialInvestigations['endoscopyNote'][0] ?? '' }}
                                                    </p>
                                                    @else
                                                    <p class="ss_result">
                                                        &nbsp;&nbsp;{{ $specialInvestigations['endoscopy'][0] ?? '' }}
                                                    </p>
                                                    @endif




                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        {{-- <p class="diagnosis_date "><span
                                                        class="enter_span_hivj"> {{ 'Entered By |' . optional(optional($record)->doctor)->name ?? '' }}
                                        </span> <span class="enter_span_hivj">{{ isset($record) && isset($record->created_at) ? $record->created_at->format('D, d M Y, H:i A') : '' }}
                                        </span></p> --}}

                                    </div>

                                    @empty
                                    <small style="font-size:10px;">----</small>
                                    @endforelse
                                    @endif
                                </li>

                            </ul>
                        </div>
                    </div>
                    @endif
                    @endif






                    @if(isset($mdtReview) && !empty($mdtReview))
                    @if (isset($MDTs_db) && $MDTs_db->count()>0)
                    <div class="MdtReview_section">
                        <div class="section_title">
                            <h2>MDT Review</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak diagnosis_data">



                            <ul>
                                @if ($MDTs_db)
                                @forelse ($MDTs_db as $record)
                                <li>

                                    <div class="appoin_date">
                                        <div class="read-more-content " style="">
                                            <div class="diagnosis_show">@php

                                                $MDT = json_decode($record->data_value, true);
                                                // dump($MDT);
                                                @endphp


                                                @if (isset($MDT['TTA']) && $MDT['TTA'][0] == 'TTA')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            TTA</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $MDT['TTANote'][0] ?? '' }}.
                                                    </p>
                                                </div>
                                                @endif
                                                @if (isset($MDT['TE']) && $MDT['TE'][0] == 'TE')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            TE</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $MDT['TENote'][0] ?? '' }}.
                                                    </p>
                                                </div>
                                                @endif
                                                @if (isset($MDT['HE']) && $MDT['HE'][0] == 'HE')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            HE</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $MDT['HENote'][0] ?? '' }}.
                                                    </p>
                                                </div>
                                                @endif
                                                @if (isset($MDT['VVA']) && $MDT['VVA'][0] == 'Thermal VVA')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            Thermal VVA</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $MDT['VVANote'][0] ?? '' }}</p>
                                                </div>
                                                @endif
                                                @if (isset($MDT['Ablation']) && $MDT['Ablation'][0] == 'NTNT VVA Ablation')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            NTNT VVA Ablation</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $MDT['AblationNote'][0] ?? '' }}
                                                    </p>
                                                </div>
                                                @endif
                                                @if (isset($MDT['IRprocedure']) && $MDT['IRprocedure'][0] == 'IR procedure')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            IR procedure</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $MDT['IRprocedureNote'][0] ?? '' }}
                                                    </p>
                                                </div>
                                                @endif

                                                @if (isset($MDT['UFE']) && $MDT['UFE'][0] == 'UFE')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            UFE</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $MDT['UFENote'][0] ?? '' }}.</p>
                                                </div>
                                                @endif
                                                @if (isset($MDT['Surgical']) && $MDT['Surgical'][0] == 'Surgical')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            Surgical</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $MDT['SurgicalNote'][0] ?? '' }}.</p>
                                                </div>
                                                @endif
                                                @if (isset($MDT['Medical']) && $MDT['Medical'][0] == 'Medical')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            Medical</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $MDT['MedicalNote'][0] ?? '' }}.</p>
                                                </div>
                                                @endif

                                                @if (isset($MDT['OtherOptions']) && $MDT['OtherOptions'][0] == 'Other options')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            Other options</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $MDT['OtherOptionsNote'][0] ?? '' }}.</p>
                                                </div>
                                                @endif
                                                @if (isset($MDT['options']) && $MDT['options'][0] == 'options')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            Other options</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $MDT['optionsNote'][0] ?? '' }}.</p>
                                                </div>
                                                @endif


                                                @if (!isset($MDT['OtherOptions']) && !isset($MDT['Surgical']) && !isset($MDT['TE']) && !isset($MDT['HE']) && !isset($MDT['TTA']) && !isset($MDT['TENote']) && !isset($MDT['IRprocedure']) && !isset($MDT['UFENote']) && !isset($MDT['MedicalNote']) && !isset($MDT['Ablation']) && !isset($MDT['VVA']))
                                                <div class="ss_result_box">
                                                    @foreach ($MDT as $key => $value)
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span>
                                                            {{ $key }}</h6>
                                                    </div>
                                                    <p class="ss_result">{{ $value['asd'] ?? '' }}
                                                    </p>
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div>
                                            {{-- <p class="diagnosis_date "><span
                                                            class="enter_span_hivj">{{ 'Entered By |' . optional(optional($record)->doctor)->name ?? '' }}
                                            </span> <span class="enter_span_hivj">{{ isset($record) && isset($record->created_at) ? $record->created_at->format('D, d M Y, H:i A') : '' }}
                                            </span>

                                            </p> --}}



                                        </div>

                                    </div>
                                </li>
                                @empty
                                <small style="font-size:10px;">----</small>
                                @endforelse
                                @endif
                            </ul>




                        </div>
                    </div>

                    @endif
                    @endif





                @if (isset($diagnosis) && !empty($diagnosis_generals->checkValData))
                    @if ($diagnosis_generals->count()>0)
                    <div class="diagnosis_section">
                        <div class="section_title">
                            <h2>Diagnosis</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak diagnosis_data">
                            <ul>
                                <li>
                                    <div class="appoin_title">
                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span> Provisional /
                                            Gernal diagnosis</h6>

                                    </div>
                                    <div class="appoin_date">
                                        <div>
                                            <div class="diagnosis_show">


                                                <p class="diagnosis_text">
                                                    @forelse ($diagnosis_generals as $diagnosis_general)
                                                    <div class="diagnosis_show ">

                                                        <p class="diagnosis_text">
                                                            @if (isset($diagnosis_general))
                                                            @php
                                                                $diagnosis_general_data_value = json_decode($diagnosis_general->data_value,true);
                                                            @endphp
                                                                @forelse ($diagnosis_general_data_value as $key => $values)
                                                                    @foreach ($values as $value)
                                                                        {{ $value }}
                                                                    @endforeach
                                                                    @if (!$loop->last)
                                                                        <span class="separation">|</span>
                                                                    @endif
                                                                @empty
                                                                @endforelse
                                                            @endif
                                                        </p>
                                                    </div>
                                                    @empty
                                                    <small style="font-size:10px;">----</small>
                                                    @endforelse
                                                </p>

                                            </div>

                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="appoin_title">
                                        <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span> ICD 10</h6>

                                    </div>
                                    <div class="appoin_date">
                                        @forelse ($diagnosis_cids as $diagnosis_cid)
                                        <div class="diagnosis_show ">

                                            <p class="diagnosis_text">
                                                @if (isset($diagnosis_cid))
                                                @php

                                                $diagnosis_cid_data_value = json_decode(
                                                $diagnosis_cid->data_value,
                                                true,
                                                );

                                                @endphp
                                                @forelse ($diagnosis_cid_data_value as $key => $values)
                                                @foreach ($values as $value)
                                                {{ $value }}

                                                @endforeach
                                                @if (!$loop->last)
                                                <span class="separation">|</span>
                                                @endif
                                                @empty
                                                @endforelse
                                                @endif
                                            </p>
                                            {{-- <p class="diagnosis_date">
                                                                    <span class="enter_span_hivj">Entered By |
                                                                        &nbsp;{{ optional(optional($diagnosis_cid)->doctor)->name ?? '' }}</span>


                                            <span class="enter_span_hivj">{{ isset($diagnosis_cid) && isset($diagnosis_cid->created_at) ? $diagnosis_cid->created_at->format('D, d M Y, H:i A') : '' }}</span>
                                            </p> --}}
                                        </div>

                                        @empty
                                        <small style="font-size:10px;">---</small>
                                        @endforelse

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    @endif

                @elseif (isset($diagnosis) && (count($diagnosis_generals)>0) || count($diagnosis_cids) > 0)
                <div class="diagnosis_section">
                    <div class="section_title">
                        <h2>Diagnosis</h2>
                    </div>
                    <div class="appointments___list past_medical_history_ak diagnosis_data">
                        <ul>
                            <li>
                                <div class="appoin_title">
                                    <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span> Provisional /
                                        Gernal diagnosis</h6>

                                </div>
                                <div class="appoin_date">
                                    <div>
                                        <div class="diagnosis_show">


                                            <p class="diagnosis_text">
                                                @forelse($diagnosis_generals as $diagnosis_general)
                                                {{ $diagnosis_general->data_value }}
                                                @if (!$loop->last)
                                                <span class="separation">|</span>
                                                @endif
                                                @empty
                                                <small style="font-size:10px;">----</small>
                                                @endforelse
                                            </p>

                                        </div>

                                    </div>
                                    <!-- <button class="btn btn_read read-more-btn past_history_readmorebtn" onclick="toggleReadMore(this)">Read More</button> -->
                                </div>
                            </li>

                            <li>
                                <div class="appoin_title">
                                    <h6><span class="point_dia"><i class="fa-regular fa-circle-dot"></i></span> ICD 10</h6>

                                </div>
                                <div class="appoin_date">
                                    <div>
                                        <div class="diagnosis_show">


                                            <p class="diagnosis_text">
                                                @forelse ($diagnosis_cids as $diagnosis_cid)
                                                {{ $diagnosis_cid->data_value }}
                                                @if (!$loop->last)
                                                <span class="separation">|</span>
                                                @endif
                                                @empty
                                                <small style="font-size:10px;">----</small>
                                                @endforelse
                                            </p>




                                        </div>

                                    </div>
                                    <!-- <button class="btn btn_read read-more-btn past_history_readmorebtn" onclick="toggleReadMore(this)">Read More</button> -->
                                </div>

                            </li>


                        </ul>
                    </div>
                </div>
                @endif


                @if (isset($eligibility) && $ElegibilitySTATUSDB && $ElegibilitySTATUSDB->count()>0)
                <div class="Eligibility_section">
                    <div class="section_title">
                        <h2>Eligibility Status</h2>
                    </div>
                    <div class="appointments___list past_medical_history_ak diagnosis_data">


                        <ul>
                            @if ($ElegibilitySTATUSDB)
                            @forelse ($ElegibilitySTATUSDB as $record)
                            <li>

                                <div class="appoin_date">
                                    <div class="read-more-content " style="">
                                        <div class="diagnosis_show">
                                            @php
                                                $ElegibilitySTATUS = json_decode($record->data_value,true);
                                            @endphp

                                            @if (isset($ElegibilitySTATUS['TTA']) && $ElegibilitySTATUS['TTA'][0] == 'THYROID THERMAL ABLATION (TTA)')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            THYROID THERMAL ABLATION (TTA)</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $ElegibilitySTATUS['TTANote'][0] ?? '' }}
                                                    </p>
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['PTTA']) && $ElegibilitySTATUS['PTTA'][0] == 'PARATHYROID THERMAL ABLATION PTTA')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            PARATHYROID THERMAL ABLATION PTTA</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $ElegibilitySTATUS['PTTANote'][0] ?? '' }}
                                                    </p>
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['TE']) && $ElegibilitySTATUS['TE'][0] == 'THYROID EMBOLIZATION TE')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            THYROID EMBOLIZATION TE</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $ElegibilitySTATUS['TENote'][0] ?? '' }}</p>
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['VARICOCELEEMBOLIZATION']) && $ElegibilitySTATUS['VARICOCELEEMBOLIZATION'][0] == 'VARICOCELE EMBOLIZATION (VE)')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                    VARICOCELE EMBOLIZATION (VE)</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $ElegibilitySTATUS['VARICOCELEEMBOLIZATIONNote'][0] ?? '' }}</p>
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['Pelvic']) && $ElegibilitySTATUS['Pelvic'][0] == 'Pelvic')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Pelvic</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $ElegibilitySTATUS['PelvicNote'][0] ?? '' }}.
                                                    </p>
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['VVThermalAblation']) &&
                                                $ElegibilitySTATUS['VVThermalAblation'][0] == 'VV Thermal Ablation')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            VV Thermal Ablation</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $ElegibilitySTATUS['VVThermalAblationNote'][0] ?? '' }}
                                                    </p>
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['VVNTNTAblation']) && $ElegibilitySTATUS['VVNTNTAblation'][0] == 'VV NTNT Ablation')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            VV NTNT Ablation</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $ElegibilitySTATUS['VVNTNTAblationNote'][0] ?? '' }}
                                                    </p>
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['FoamSclerotherapy']) &&
                                                    $ElegibilitySTATUS['FoamSclerotherapy'][0] == 'Foam Sclerotherapy')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Foam Sclerotherapy</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $ElegibilitySTATUS['FoamSclerotherapyNote'][0] ?? '' }}
                                                    </p>
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['HEMARRHOIDSEMBOLIZATION']) && $ElegibilitySTATUS['HEMARRHOIDSEMBOLIZATION'][0] == 'HEMARRHOIDS EMBOLIZATION (HE)')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                    HEMARRHOIDS EMBOLIZATION (HE)</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $ElegibilitySTATUS['HEMARRHOIDSEMBOLIZATIONNote'][0] ?? '' }}
                                                    </p>
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['HistopathMSKBiopsy']) && !empty($ElegibilitySTATUS['HistopathMSKBiopsy'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Histopath MSK Biopsy -
                                                            Findings </h6>

                                                    </div>
                        
                                                    @if (isset($ElegibilitySTATUS['HistopathMSKBiopsy']) && $ElegibilitySTATUS['HistopathMSKBiopsy'][0] == 'Eligibile')
                                                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['HistopathMSKBiopsy'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['HistopathMSKBiopsyNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['HistopathMSKBiopsy'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['TopicalRiparil']) && !empty($ElegibilitySTATUS['TopicalRiparil'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                    Conservative - Topical Riparil  </h6>

                                                    </div>

                                                    @if (isset($ElegibilitySTATUS['TopicalRiparil']) && $ElegibilitySTATUS['TopicalRiparil'][0] == 'Eligibile')
                                                                                    <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['TopicalRiparil'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['TopicalRiparilNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['TopicalRiparil'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['TopicalAnalgesics']) && !empty($ElegibilitySTATUS['TopicalAnalgesics'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Conservative - Topical
                                                            Analgesics </h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['TopicalAnalgesics']) && $ElegibilitySTATUS['TopicalAnalgesics'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['TopicalAnalgesics'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['TopicalAnalgesicsNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['TopicalAnalgesics'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            
                                            @if (isset($ElegibilitySTATUS['POAnalgesics']) && !empty($ElegibilitySTATUS['POAnalgesics'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Conservative - PO Analgesics
                                                        </h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['POAnalgesics']) && $ElegibilitySTATUS['POAnalgesics'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['POAnalgesics'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['POAnalgesicsNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['POAnalgesics'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['Chondroitin']) && !empty($ElegibilitySTATUS['Chondroitin'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Conservative - PO
                                                            Glucasamine / Chondroitin
                                                        </h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['Chondroitin']) && $ElegibilitySTATUS['Chondroitin'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['Chondroitin'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['ChondroitinNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['Chondroitin'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['POCollagen']) && !empty($ElegibilitySTATUS['POCollagen'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Conservative - PO Collagen
                                                        </h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['POCollagen']) && $ElegibilitySTATUS['POCollagen'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['POCollagen'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['POCollagenNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['POCollagen'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['conservativeVitamines']) && !empty($ElegibilitySTATUS['conservativeVitamines'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Conservative - IV Vitamines
                                                        </h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['conservativeVitamines']) && $ElegibilitySTATUS['conservativeVitamines'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['conservativeVitamines'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['conservativeVitaminesNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['conservativeVitamines'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['conservativeIMNurobion']) && !empty($ElegibilitySTATUS['conservativeIMNurobion'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Conservative - IM Nurobion
                                                        </h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['conservativeIMNurobion']) &&
                                                            $ElegibilitySTATUS['conservativeIMNurobion'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['conservativeIMNurobion'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['conservativeIMNurobionNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['conservativeIMNurobion'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['conservativeIMCollagen']) && !empty($ElegibilitySTATUS['conservativeIMCollagen'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Conservative - IM Collagen
                                                        </h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['conservativeIMCollagen']) &&
                                                            $ElegibilitySTATUS['conservativeIMCollagen'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['conservativeIMCollagen'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['conservativeIMCollagenNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['conservativeIMCollagen'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['Triggerpointinjection']) && !empty($ElegibilitySTATUS['Triggerpointinjection'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                    Trigger point injection
                                                        </h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['Triggerpointinjection']) &&
                                                            $ElegibilitySTATUS['Triggerpointinjection'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['Triggerpointinjection'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['TriggerpointinjectionNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['Triggerpointinjection'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['conservativekneeBrace']) && !empty($ElegibilitySTATUS['conservativekneeBrace'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Conservative - knee Brace
                                                        </h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['conservativekneeBrace']) && $ElegibilitySTATUS['conservativekneeBrace'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['conservativekneeBrace'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['conservativekneeBraceNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['conservativekneeBrace'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['Steroidsinjection']) && !empty($ElegibilitySTATUS['Steroidsinjection'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Steroids injection</h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['Steroidsinjection']) && $ElegibilitySTATUS['Steroidsinjection'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['Steroidsinjection'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['SteroidsinjectionNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['Steroidsinjection'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['HAinjection']) && !empty($ElegibilitySTATUS['HAinjection'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            HA injection</h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['HAinjection']) && $ElegibilitySTATUS['HAinjection'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['HAinjection'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['HAinjectionNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['HAinjection'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['PRPinjection']) && !empty($ElegibilitySTATUS['PRPinjection'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            PRP injection</h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['PRPinjection']) && $ElegibilitySTATUS['PRPinjection'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['PRPinjection'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['PRPinjectionNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['PRPinjection'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['Ozoneintradiscalinjection']) && !empty($ElegibilitySTATUS['Ozoneintradiscalinjection'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                    Ozone intra-discal injection  </h6>

                                                    </div>

                                                    @if (isset($ElegibilitySTATUS['Ozoneintradiscalinjection']) && $ElegibilitySTATUS['Ozoneintradiscalinjection'][0] == 'Eligibile')
                                                                                    <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['Ozoneintradiscalinjection'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['OzoneintradiscalinjectionNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['Ozoneintradiscalinjection'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['OzoneIAinjection']) && !empty($ElegibilitySTATUS['OzoneIAinjection'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Ozone IA injection</h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['OzoneIAinjection']) && $ElegibilitySTATUS['OzoneIAinjection'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['OzoneIAinjection'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['OzoneIAinjectionNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['OzoneIAinjection'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['NeurolysisBlock']) && !empty($ElegibilitySTATUS['NeurolysisBlock'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Neurolysis Block</h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['NeurolysisBlock']) && $ElegibilitySTATUS['NeurolysisBlock'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['NeurolysisBlock'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['NeurolysisBlockNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['NeurolysisBlock'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['NerveRFAblation']) && !empty($ElegibilitySTATUS['NerveRFAblation'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Nerve RF Ablation</h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['NerveRFAblation']) && $ElegibilitySTATUS['NerveRFAblation'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['NerveRFAblation'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['NerveRFAblationNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['NerveRFAblation'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['NerveCooledRF']) && !empty($ElegibilitySTATUS['NerveCooledRF'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Nerve Cooled RF</h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['NerveCooledRF']) && $ElegibilitySTATUS['NerveCooledRF'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['NerveCooledRF'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['NerveCooledRFNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['NerveCooledRF'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['NerveCryotherapy']) && !empty($ElegibilitySTATUS['NerveCryotherapy'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Nerve Cryotherapy</h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['NerveCryotherapy']) && $ElegibilitySTATUS['NerveCryotherapy'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['NerveCryotherapy'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['NerveCryotherapyNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['NerveCryotherapy'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['ShoulderEmbolization']) && !empty($ElegibilitySTATUS['ShoulderEmbolization'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                    Shoulder Embolization </h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['ShoulderEmbolization']) && $ElegibilitySTATUS['ShoulderEmbolization'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['ShoulderEmbolization'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['ShoulderEmbolizationNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['ShoulderEmbolization'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['NerveBlockinjection']) && !empty($ElegibilitySTATUS['NerveBlockinjection'][0]))
                                                                                    <div class="ss_result_box">
                                                                                        <div class="symp_title mb-1">
                                                                                            <h6><span class="point_dia"><i
                                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                                        Nerve Block injection</h6>

                                                                                        </div>

                                                                                        @if (isset($ElegibilitySTATUS['NerveBlockinjection']) && $ElegibilitySTATUS['NerveBlockinjection'][0] == 'Eligibile')
                                                                                                                        <p class="ss_result">
                                                                                                {{ $ElegibilitySTATUS['NerveBlockinjection'][0] ?? '' }}
                                                                                            </p>
                                                                                            <p class="ss_result">
                                                                                                &nbsp;&nbsp;{{ $ElegibilitySTATUS['NerveBlockinjectionNote'][0] ?? '' }}
                                                                                            </p>
                                                                                        @else
                                                                                            <p class="ss_result">
                                                                                                &nbsp;&nbsp;{{ $ElegibilitySTATUS['NerveBlockinjection'][0] ?? '' }}
                                                                                            </p>
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                                @if (isset($ElegibilitySTATUS['NerveRFTherapy']) && !empty($ElegibilitySTATUS['NerveRFTherapy'][0]))
                                                                                    <div class="ss_result_box">
                                                                                        <div class="symp_title mb-1">
                                                                                            <h6><span class="point_dia"><i
                                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                                        Nerve RF Therapy</h6>

                                                                                        </div>

                                                                                        @if (isset($ElegibilitySTATUS['NerveRFTherapy']) && $ElegibilitySTATUS['NerveRFTherapy'][0] == 'Eligibile')
                                                                                                                        <p class="ss_result">
                                                                                                {{ $ElegibilitySTATUS['NerveRFTherapy'][0] ?? '' }}
                                                                                            </p>
                                                                                            <p class="ss_result">
                                                                                                &nbsp;&nbsp;{{ $ElegibilitySTATUS['NerveRFTherapyNote'][0] ?? '' }}
                                                                                            </p>
                                                                                        @else
                                                                                            <p class="ss_result">
                                                                                                &nbsp;&nbsp;{{ $ElegibilitySTATUS['NerveRFTherapy'][0] ?? '' }}
                                                                                            </p>
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                                @if (isset($ElegibilitySTATUS['STE']) && !empty($ElegibilitySTATUS['STE'][0]))
                                                                                    <div class="ss_result_box">
                                                                                        <div class="symp_title mb-1">
                                                                                            <h6><span class="point_dia"><i
                                                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                                                        Soft tissue Embolization (STE)</h6>

                                                                                        </div>

                                                                                        @if (isset($ElegibilitySTATUS['STE']) && $ElegibilitySTATUS['STE'][0] == 'Eligibile')
                                                                                                                        <p class="ss_result">
                                                                                                {{ $ElegibilitySTATUS['STE'][0] ?? '' }}
                                                                                            </p>
                                                                                            <p class="ss_result">
                                                                                                &nbsp;&nbsp;{{ $ElegibilitySTATUS['STENote'][0] ?? '' }}
                                                                                            </p>
                                                                                        @else
                                                                                            <p class="ss_result">
                                                                                                &nbsp;&nbsp;{{ $ElegibilitySTATUS['STE'][0] ?? '' }}
                                                                                            </p>
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                            @if (isset($ElegibilitySTATUS['Others']) && !empty($ElegibilitySTATUS['Others'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Others</h6>

                                                    </div>
                                                    @if (isset($ElegibilitySTATUS['Others']) && $ElegibilitySTATUS['Others'][0] == 'Eligibile')
                                                        
                                                        <p class="ss_result">
                                                            {{ $ElegibilitySTATUS['Others'][0] ?? '' }}
                                                        </p>
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['OthersNote'][0] ?? '' }}
                                                        </p>
                                                    @else
                                                        <p class="ss_result">
                                                            &nbsp;&nbsp;{{ $ElegibilitySTATUS['Others'][0] ?? '' }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @endif
                                            @if (isset($ElegibilitySTATUS['OTHERS']) && $ElegibilitySTATUS['OTHERS'][0] == 'OTHERS')
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            Other options</h6>

                                                    </div>
                                                    <p class="ss_result">
                                                        {{ $ElegibilitySTATUS['OTHERSNote'][0] ?? '' }}
                                                    </p>
                                                </div>
                                            @endif
                                            @if (
                                                !isset($ElegibilitySTATUS['OTHERS']) &&
                                                    !isset($ElegibilitySTATUS['TE']) &&
                                                    !isset($ElegibilitySTATUS['PTTA']) && !isset($ElegibilitySTATUS['HEMARRHOIDSEMBOLIZATION']) && !isset($ElegibilitySTATUS['Pelvic']) &&
                                                    !isset($ElegibilitySTATUS['TTA']) && !isset($ElegibilitySTATUS['VARICOCELEEMBOLIZATIONNote']) &&
                                                                    !isset($ElegibilitySTATUS['FoamSclerotherapy']) &&
                                                                    !isset($ElegibilitySTATUS['VVNTNTAblation']) &&
                                                                    !isset($ElegibilitySTATUS['VVThermalAblation']) && !isset($ElegibilitySTATUS['Others']) &&
                                                                    !isset($ElegibilitySTATUS['NerveCryotherapy']) &&
                                                                    !isset($ElegibilitySTATUS['NerveCryotherapy']) &&
                                                                    !isset($ElegibilitySTATUS['NerveRFAblation']) &&
                                                                    !isset($ElegibilitySTATUS['NeurolysisBlock']) &&
                                                                    !isset($ElegibilitySTATUS['OzoneIAinjection']) &&
                                                                    !isset($ElegibilitySTATUS['PRPinjection']) &&
                                                                    !isset($ElegibilitySTATUS['HAinjection']) &&
                                                                    !isset($ElegibilitySTATUS['Steroidsinjection']) &&
                                                                    !isset($ElegibilitySTATUS['conservativekneeBrace']) &&
                                                                    !isset($ElegibilitySTATUS['conservativeIMCollagen']) &&
                                                                    !isset($ElegibilitySTATUS['conservativeIMNurobion']) &&
                                                                    !isset($ElegibilitySTATUS['conservativeVitamines']) &&
                                                                    !isset($ElegibilitySTATUS['POCollagen']) &&
                                                                    !isset($ElegibilitySTATUS['Chondroitin']) &&
                                                                    !isset($ElegibilitySTATUS['POAnalgesics']) &&
                                                                    !isset($ElegibilitySTATUS['TopicalAnalgesics']) &&
                                                                    !isset($ElegibilitySTATUS['HistopathMSKBiopsy']) &&
                                                                    !isset($ElegibilitySTATUS['HistopathMSKBiopsy']))
                                                <div class="ss_result_box">
                                                    @foreach ($ElegibilitySTATUS as $key => $value)
                                                        <div class="symp_title mb-1">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                {{ $key }}</h6>
                                                        </div>
                                                        <p class="ss_result">{{ $value['asd'] ?? '' }}
                                                        </p>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @empty
                            @endforelse
                            @endif
                        </ul>
                    </div>
                </div>
                @endif


                @if (isset($list) && $procedures && $procedures->count()>0)
                    <div class="Procedures_section">
                        <div class="section_title">
                            <h2>List of Procedures</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak diagnosis_data">


                            <ul>
                                @if ($procedures->isEmpty())
                                    <li><small style="font-size:10px;">----</small></li>
                                @else
                                    @foreach ($procedures as $procedure)
                                        <li>

                                            <div class="appoin_title">

                                                <h6>{{ $procedure->procedure_name }}</h6>



                                            </div>


                                            <div class="appoin_date">

                                                <div class="read-more-content">

                                                    <p>

                                                        {{ $procedure->summary }}
                                                    </p>

                                                </div>


                                            </div>

                                        </li>
                                    @endforeach
                                @endif
                            </ul>



                        </div>
                    </div>
                @endif

                @if (isset($procedure) && $procedures && $procedures->count()>0)
                    <div class="Procedures_section">
                        <div class="section_title">
                            <h2>Procedure</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak diagnosis_data">
                            <ul>
                                @foreach($procedures  as $record)
                                    <li>
                                        <div class="appoin_date">
                                            <div class="read-more-content " style="">
                                                <div class="diagnosis_show">
                                                    <div class="Bottom_btn">
                                                        <span class="orderProcedure"
                                                            data-id="{{ $record->id }}">
                                                            <i class="fa-regular fa-trash-can trash_btn"></i>
                                                        </span>
                                                    </div>
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-1">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                {{ $record->procedure_name ?? '' }}</h6>

                                                        </div>
                                                        <p class="ss_result">
                                                            <strong>Entry</strong> &nbsp;&colon;
                                                            {{ $record->entry ?? '' }}
                                                        </p>

                                                        <p class="ss_result">
                                                            <strong>Summary</strong> &nbsp;&colon;
                                                            {{ $record->summary ?? '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>



                        </div>
                    </div>
                @endif


                @if (isset($supportiveTreatment) && $supportiveTreatments && $supportiveTreatments->count()>0)
                    <div class="SupportiveTreatment_section">
                        <div class="section_title">
                            <h2>Supportive Treatment</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak diagnosis_data">


                            <ul>
                                @if (isset($supportiveTreatments))
                                    @forelse ($supportiveTreatments  as $record)
                                        <li>

                                            <div class="appoin_date">
                                                <div class="read-more-content " style="">
                                                    <div class="diagnosis_show">


                                                        <div class="ss_result_box">
                                                            <div class="symp_title mb-1">
                                                                <h6><span class="point_dia"><i
                                                                            class="fa-regular fa-circle-dot"></i></span>
                                                                    {{ $record->title ?? '' }}</h6>

                                                            </div>
                                                            <p class="ss_result">
                                                                -
                                                                {{ $record->sub_title ?? '' }}
                                                            </p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;
                                                                {{ $record->treatment ?? '' }}
                                                            </p>
                                                        </div>



                                                    </div>



                                                </div>

                                            </div>
                                        </li>
                                    @empty
                                        <small style="font-size:10px;">----</small>
                                    @endforelse
                                @endif
                            </ul>


                        </div>
                    </div>
                @endif


                {{-- @dump($prescriptions) --}}
                @if (isset($ListOfPrescribed) && $prescriptions && $prescriptions->count()>0)
                    <div class="PrescribedMedication_section">
                        <div class="section_title">
                            <h2>List Of Prescribed Medication</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak diagnosis_data">


                            <ul>
                                @if ($prescriptions->isEmpty())
                                    <li><small style="font-size:10px;">----</small></li>
                                @else
                                    @foreach ($prescriptions as $prescription)
                                        <li>

                                            <div class="appoin_title">

                                                <h6></h6>



                                            </div>

                                            <div class="appoin_date">

                                                <div class="read-more-content">

                                                    <p>

                                                        {{ $prescription->prescription }}
                                                    </p>

                                                </div>


                                            </div>

                                        </li>
                                    @endforeach
                                @endif
                            </ul>



                        </div>
                    </div>
                @endif

                @if (isset($planRecommendation) && $patient_future_plans && $patient_future_plans->count()>0)
                    <div class="PlansRecomandation_section">
                        <div class="section_title">
                            <h2>Plans/Recommandation</h2>
                        </div>
                        <div class="appointments___list plans_list">

                            <ul>
                                @if (isset($patient_future_plans))
                                    @forelse ($patient_future_plans  as $record)
                                        <li>
                                            <div class="appoin_date">
                                                <div class="read-more-content " style="">
                                                    <div class="diagnosis_show">


                                                        <div class="ss_result_box">
                                                            <div class="symp_title mb-1">
                                                                <h6><span class="point_dia"><i
                                                                            class="fa-regular fa-circle-dot"></i></span>
                                                                    {{ $record->date ?? '' }}</h6>

                                                            </div>

                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;
                                                                {{ $record->plan_text ?? '' }}
                                                            </p>
                                                        </div>



                                                    </div>



                                                </div>

                                            </div>
                                        </li>
                                    @empty
                                        <small style="font-size:10px;">----</small>
                                    @endforelse
                                @endif
                            </ul>
                        </div>
                    </div>
                @endif

                @if (isset($orderImagingExam) && $Imaging && $Imaging->count()>0)
                    <div class="PlansRecomandation_section">
                        <div class="section_title">
                            <h2>Order Imaging Exam</h2>
                        </div>
                        <div class="appointments___list plans_list">

                            <ul>
                                @forelse ($Imaging as $record)
                                    <li>

                                        <div class="appoin_date">
                                            <div class="read-more-content sypm_tom_cnt"
                                                style="">
                                                <div class="diagnosis_show">

                                                    @php
                                                        $jsonData = json_decode($record->data_value, true);
                                                    @endphp
                                                    <!--USVENOUSDOPPLER70  > Hemarrhoids endorectal US Protocol Findings start -->
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-3">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                USVENOUSDOPPLER70 > Hemarrhoids
                                                                endorectal US Protocol Findings</h6>
                                                        </div>

                                                        @if(isset($jsonData['ExternalHemarrhoids'][0]))
                                                        <div class="symp_title mb-3">
                                                            <p class="ss_result">External Hemarrhoids
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['ExternalHemarrhoids'][0] ?? '' }}
                                                            </p>



                                                        </div>
                                                        @endif

                                                        @if(issrt($jsonData['InternalHemarrhoids'][0]))
                                                        <div class="symp_title mb-3">
                                                            <p class="ss_result">Internal Hemarrhoids
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['InternalHemarrhoids'][0] ?? '' }}
                                                            </p>
                                                        </div>
                                                        @endif


                                                        <div class="symp_title mb-3">
                                                            <p class="ss_result">Suspicious Anal Mass
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['SuspiciousAnalMass'][0] ?? '' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!--USVENOUSDOPPLER70  > Hemarrhoids endorectal US Protocol Findings end -->


                                                    <!-- MRCIR48 > Hemarrhoids MRI Protocol Findings start -->
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-3">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                MRCIR48 > Hemarrhoids MRI Protocol
                                                                Findings</h6>
                                                        </div>

                                                        <div class="symp_title mb-3">
                                                            <p class="ss_result">Prominent SRA arteries
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['ProminentSRAarteries'][0] ?? '' }}
                                                            </p>



                                                        </div>
                                                        <div class="symp_title mb-3">
                                                            <p class="ss_result">Dilated anal veins
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['Dilatedanalveins'][0] ?? '' }}
                                                            </p>



                                                        </div>
                                                        <div class="symp_title mb-3">
                                                            <p class="ss_result">thrombosed hemorrhoids
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['thrombosedhemorrhoids'][0] ?? '' }}
                                                            </p>



                                                        </div>
                                                        <div class="symp_title mb-3">
                                                            <p class="ss_result">Congested pelvic veins
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['Congestedpelvicveins'][0] ?? '' }}
                                                            </p>



                                                        </div>
                                                        <div class="symp_title mb-3">
                                                            <p class="ss_result">Suspicious ano-rectal
                                                                mass</p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['Suspicious'][0] ?? '' }}
                                                            </p>



                                                        </div>

                                                    </div>
                                                    <!-- MRCIR48 > Hemarrhoids MRI Protocol Findings end -->

                                                    <!--CTCIR48 > CTA - Pelvic Protocol - Findings start -->
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-3">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                CTCIR48 > CTA - Pelvic Protocol -
                                                                Findings</h6>
                                                        </div>

                                                        <div class="symp_title mb-3">
                                                            <p class="ss_result">Superior Hemorrhoidal
                                                                arteries
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['SuperiorHemorrhoidalarteries'][0] ?? '' }}
                                                            </p>



                                                        </div>
                                                        <div class="symp_title mb-3">
                                                            <p class="ss_result">Middle Hemorrhoidal
                                                                arteries
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['MiddleHemorrhoidalarteries'][0] ?? '' }}
                                                            </p>



                                                        </div>
                                                        <div class="symp_title mb-3">
                                                            <p class="ss_result">Inferior Hemorrhoidal
                                                                arteries
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['InferiorHemorrhoidalarteries'][0] ?? '' }}
                                                            </p>



                                                        </div>



                                                    </div>
                                                    <!--CTCIR48 > CTA - Pelvic Protocol - Findings end -->





                                                </div>



                                            </div>
                                            {{-- <button
                                                class="btn btn_read read-more-btn past_history_readmorebtn"
                                                onclick="toggleReadMore(this)">Read More</button> --}}
                                        </div>

                                    </li>

                                @empty

                                    {{-- <small style="font-size:10px;">No Data Found</small> --}}
                                @endforelse
                            </ul>
                        </div>
                    </div>
                @endif


                @if (isset($lab) && $Labs && $Labs->count()>0)
                    <div class="Procedures_section">
                        <div class="section_title">
                            <h2>Labs</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak diagnosis_data">
                            <ul>
                                @forelse ($Labs as $record)
                                <li>

                                    <div class="appoin_date">
                                        <div class="read-more-content sypm_tom_cnt" style="">
                                            <div class="diagnosis_show">
                                                @php
                                                    $jsonData = json_decode($record->data_value, true);
                                                @endphp
                                                @if(isset($jsonData['Prolactin'][0]) || isset($jsonData['TSH'][0]) || isset($jsonData['T4'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-1">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                            
                                                                @if($form_type == 'VaricoceleEmboForm')
                                                                LABFERTILITYHORMONES000 &gt; FERTILITY HORMONES Results
                                                                @else
                                                                    LABTFT39 > TFT Results
                                                                @endif
                                                                </h6>

                                                        </div>
                                                        

                                                        @if(isset($jsonData['TSH'][0]))
                                                        <p class="ss_result"><strong>TSH</strong> -

                                                            @if ($jsonData['TSH'][0] == 'normal')
                                                                (0.4 - 5.49 mIU/L)
                                                                <span>Normal</span>
                                                            @elseif ($jsonData['TSH'][0] == 'low')
                                                                (0.01 - 0.39 mIU/L)<span>Low</span>
                                                            @elseif ($jsonData['TSH'][0] == 'high')
                                                                (> 5.49 mIU/L)<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif

                                                        @if(isset($jsonData['T4'][0]))
                                                        <p class="ss_result"><strong>T4</strong>
                                                            @if ($jsonData['T4'][0] == 'normal')
                                                                0.9 to 2.3 ng/dL <span>Normal</span>
                                                            @elseif ($jsonData['T4'][0] == 'low')
                                                                Below 0.9 ng/dL<span>Low</span>
                                                            @elseif ($jsonData['T4'][0] == 'high')
                                                                Above 2.3 ng/dL&nbsp;<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif

                                                    </div>
                                                @endif

                                                @if(isset($jsonData['PTH'][0]) || isset($jsonData['Ca'][0]))
                                                <div class="ss_result_box">
                                                    <div class="symp_title mb-1">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                            LABPTFT39 > PTFT Results</h6>

                                                    </div>

                                                    @if(isset($jsonData['PTH'][0]))
                                                    <p class="ss_result"><strong>PTH</strong> -
                                                        @if ($jsonData['PTH'][0] == 'normal')
                                                            (0.4 - 5.49 mIU/L) <span>Normal</span>
                                                        @elseif ($jsonData['PTH'][0] == 'low')
                                                            Below 0.4 mIU/L <span>Low</span>
                                                        @elseif ($jsonData['PTH'][0] == 'high')
                                                            5.5 mIU/L and above <span>High</span>
                                                        @endif
                                                    </p>
                                                    @endif

                                                    @if(isset($jsonData['Ca'][0]))
                                                    <p class="ss_result"><strong>Ca+</strong> -
                                                        @if ($jsonData['Ca'][0] == 'normal')
                                                            (0.4 - 5.49 mIU/L) <span>Normal</span>
                                                        @elseif ($jsonData['Ca'][0] == 'low')
                                                            Below 0.4 mIU/L <span>Low</span>
                                                        @elseif ($jsonData['Ca'][0] == 'high')
                                                            5.5 mIU/L and above <span>High</span>
                                                        @endif
                                                    </p>
                                                    @endif

                                                </div>
                                                @endif

                                                    <!--HCLGIENDOSCOPY000  > LGI Endoscopy Findings start -->
                                                @if(isset($jsonData['Externalhemorrhoids'][0]) || 
                                                isset($jsonData['Internalhemorrhoids'][0]) || 
                                                isset($jsonData['Thrombosedhemorrhoids'][0]) || 
                                                isset($jsonData['BnignPolyp'][0]) || 
                                                isset($jsonData['Polp'][0]) || 
                                                isset($jsonData['tumor'][0]) || 
                                                isset($jsonData['Ulcer'][0]) || 
                                                isset($jsonData['Analfissure'][0]) || 
                                                isset($jsonData['Fistula'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title ">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                HCLGIENDOSCOPY000 > LGI Endoscopy
                                                                Findings</h6>
                                                        </div>

                                                        @if (isset($jsonData['Externalhemorrhoids'][0]))
                                                        <div class="symp_title ">
                                                            <p class="ss_result">External hemorrhoids
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['Externalhemorrhoids'][0] ?? '' }}
                                                            </p>
                                                        </div>
                                                        @endif
                                                        
                                                        @if (isset($jsonData['Internalhemorrhoids'][0]))
                                                        <div class="symp_title ">
                                                            <p class="ss_result">Internal hemorrhoids
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['Internalhemorrhoids'][0] ?? '' }}
                                                            </p>
                                                        </div>
                                                        @endif

                                                        @if (isset($jsonData['Thrombosedhemorrhoids'][0]))
                                                        <div class="symp_title ">
                                                            <p class="ss_result">Thrombosed hemorrhoids
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['Thrombosedhemorrhoids'][0] ?? '' }}
                                                            </p>
                                                        </div>
                                                        @endif

                                                        @if (isset($jsonData['BnignPolyp'][0]))
                                                        <div class="symp_title ">
                                                            <p class="ss_result">Ano-rectal Bnign Polyp
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['BnignPolyp'][0] ?? '' }}
                                                            </p>
                                                        </div>
                                                        @endif

                                                        @if (isset($jsonData['Polp'][0]))
                                                        <div class="symp_title ">
                                                            <p class="ss_result">Ano-rectal Malignanat
                                                                Polp
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['Polp'][0] ?? '' }}
                                                            </p>
                                                        </div>
                                                        @endif

                                                        @if (isset($jsonData['tumor'][0]))
                                                        <div class="symp_title ">
                                                            <p class="ss_result">Ano-rectal Malignanat
                                                                tumor
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['tumor'][0] ?? '' }}
                                                            </p>
                                                        </div>
                                                        @endif

                                                        @if (isset($jsonData['Ulcer'][0]))
                                                        <div class="symp_title ">
                                                            <p class="ss_result">Ano-rectal Ulcer
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['Ulcer'][0] ?? '' }}
                                                            </p>
                                                        </div>
                                                        @endif

                                                        @if (isset($jsonData['Analfissure'][0]))
                                                        <div class="symp_title ">
                                                            <p class="ss_result">Anal fissure
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['Analfissure'][0] ?? '' }}
                                                            </p>
                                                        </div>
                                                        @endif

                                                        @if (isset($jsonData['Fistula'][0]))
                                                        <div class="symp_title ">
                                                            <p class="ss_result">Fistula in anal
                                                            <p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['Fistula'][0] ?? '' }}
                                                            </p>
                                                        </div>
                                                        @endif


                                                    </div>
                                                @endif

                                                @if(isset($jsonData['CBC'][0]) || 
                                                isset($jsonData['CRP'][0]) || 
                                                isset($jsonData['ESR'][0]) || 
                                                isset($jsonData['CKMP'][0]) || 
                                                isset($jsonData['UricAcid'][0]) || 
                                                isset($jsonData['RF'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-1">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                LABACUTEMSK35 > Acute MSK inflammation
                                                                Results</h6>

                                                        </div>

                                                        @if(isset($jsonData['CBC'][0]))
                                                        <p class="ss_result"><strong>CBC</strong> -
                                                            @if (isset($jsonData['CBC'][0]) && $jsonData['CBC'][0] == 'normal')
                                                                (0.4 - 5.49 mIU/L)
                                                                <span>Normal</span>
                                                            @elseif (isset($jsonData['CBC'][0]) && $jsonData['CBC'][0] == 'low')
                                                                (0.01 - 0.39 mIU/L)<span>Low</span>
                                                            @elseif (isset($jsonData['CBC'][0]) && $jsonData['CBC'][0] == 'high')
                                                                (> 5.49 mIU/L)<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif

                                                        @if(isset($jsonData['CRP'][0]))
                                                        <p class="ss_result"><strong>CRP</strong>
                                                            @if (isset($jsonData['CRP'][0]) && $jsonData['CRP'][0] == 'normal')
                                                                0.9 to 2.3 ng/dL <span>Normal</span>
                                                            @elseif (isset($jsonData['CRP'][0]) && $jsonData['CRP'][0] == 'low')
                                                                Below 0.9 ng/dL<span>Low</span>
                                                            @elseif (isset($jsonData['CRP'][0]) && $jsonData['CRP'][0] == 'high')
                                                                Above 2.3 ng/dL&nbsp;<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif

                                                        @if(isset($jsonData['ESR'][0]))
                                                        <p class="ss_result"><strong>ESR</strong>
                                                            @if (isset($jsonData['ESR'][0]) && $jsonData['ESR'][0] == 'normal')
                                                                0.9 to 2.3 ng/dL <span>Normal</span>
                                                            @elseif (isset($jsonData['ESR'][0]) && $jsonData['ESR'][0] == 'low')
                                                                Below 0.9 ng/dL<span>Low</span>
                                                            @elseif (isset($jsonData['ESR'][0]) && $jsonData['ESR'][0] == 'high')
                                                                Above 2.3 ng/dL&nbsp;<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif

                                                        @if(isset($jsonData['CKMP'][0]))
                                                        <p class="ss_result"><strong>CKMP</strong>
                                                            @if (isset($jsonData['CKMP'][0]) && $jsonData['CKMP'][0] == 'normal')
                                                                0.9 to 2.3 ng/dL <span>Normal</span>
                                                            @elseif (isset($jsonData['CKMP'][0]) && $jsonData['CKMP'][0] == 'low')
                                                                Below 0.9 ng/dL<span>Low</span>
                                                            @elseif (isset($jsonData['CKMP'][0]) && $jsonData['CKMP'][0] == 'high')
                                                                Above 2.3 ng/dL&nbsp;<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif

                                                        @if(isset($jsonData['UricAcid'][0]))
                                                        <p class="ss_result"><strong>Uric Acid</strong>
                                                            @if (isset($jsonData['UricAcid'][0]) && $jsonData['UricAcid'][0] == 'normal')
                                                                0.9 to 2.3 ng/dL <span>Normal</span>
                                                            @elseif (isset($jsonData['UricAcid'][0]) && $jsonData['UricAcid'][0] == 'low')
                                                                Below 0.9 ng/dL<span>Low</span>
                                                            @elseif (isset($jsonData['UricAcid'][0]) && $jsonData['UricAcid'][0] == 'high')
                                                                Above 2.3 ng/dL&nbsp;<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif

                                                        @if(isset($jsonData['RF'][0]))
                                                        <p class="ss_result"><strong>RF</strong>
                                                            @if (isset($jsonData['RF'][0]) && $jsonData['RF'][0] == 'normal')
                                                                0.9 to 2.3 ng/dL <span>Normal</span>
                                                            @elseif (isset($jsonData['RF'][0]) && $jsonData['RF'][0] == 'low')
                                                                Below 0.9 ng/dL<span>Low</span>
                                                            @elseif (isset($jsonData['RF'][0]) && $jsonData['RF'][0] == 'high')
                                                                Above 2.3 ng/dL&nbsp;<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif
                                                    </div>
                                                @endif

                                                @if(isset($jsonData['WBC'][0]) || 
                                                isset($jsonData['Proteins'][0]) || 
                                                isset($jsonData['Glucose'][0]) || 
                                                isset($jsonData['Crystals'][0]) || 
                                                isset($jsonData['Lactate'][0]))
                                                    <div class="ss_result_box">    
                                                        <div class="symp_title mb-1 mt-2">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                        @if($form_type == 'VaricoceleEmboForm')
                                                                        LABFERTILITYHORMONES000 &gt; FERTILITY HORMONES Results
                                                                    @else LABJFA15 > Joint Fluid Analysis Results
                                                                    @endif
                                                            </h6>
                                                        </div>
                                                        @if(isset($jsonData['WBC'][0]))
                                                        <p class="ss_result"><strong>WBC</strong>
                                                            @if (isset($jsonData['WBC'][0]) && $jsonData['WBC'][0] == 'normal')
                                                                0.9 to 2.3 ng/dL <span>Normal</span>
                                                            @elseif (isset($jsonData['WBC'][0]) && $jsonData['WBC'][0] == 'low')
                                                                Below 0.9 ng/dL<span>Low</span>
                                                            @elseif (isset($jsonData['WBC'][0]) && $jsonData['WBC'][0] == 'high')
                                                                Above 2.3 ng/dL&nbsp;<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif

                                                        @if(isset($jsonData['Proteins'][0]))
                                                        <p class="ss_result"><strong>Proteins</strong>
                                                            @if (isset($jsonData['Proteins'][0]) && $jsonData['Proteins'][0] == 'normal')
                                                                0.9 to 2.3 ng/dL <span>Normal</span>
                                                            @elseif (isset($jsonData['Proteins'][0]) && $jsonData['Proteins'][0] == 'low')
                                                                Below 0.9 ng/dL<span>Low</span>
                                                            @elseif (isset($jsonData['Proteins'][0]) && $jsonData['Proteins'][0] == 'high')
                                                                Above 2.3 ng/dL&nbsp;<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif

                                                        @if(isset($jsonData['Glucose'][0]))
                                                        <p class="ss_result"><strong>Glucose</strong>
                                                            @if (isset($jsonData['Glucose'][0]) && $jsonData['Glucose'][0] == 'normal')
                                                                0.9 to 2.3 ng/dL <span>Normal</span>
                                                            @elseif (isset($jsonData['Glucose'][0]) && $jsonData['Glucose'][0] == 'low')
                                                                Below 0.9 ng/dL<span>Low</span>
                                                            @elseif (isset($jsonData['Glucose'][0]) && $jsonData['Glucose'][0] == 'high')
                                                                Above 2.3 ng/dL&nbsp;<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif

                                                        @if(isset($jsonData['Crystals'][0]))
                                                        <p class="ss_result"><strong>Crystals</strong>
                                                            @if (isset($jsonData['Crystals'][0]) && $jsonData['Crystals'][0] == 'normal')
                                                                0.9 to 2.3 ng/dL <span>Normal</span>
                                                            @elseif (isset($jsonData['Crystals'][0]) && $jsonData['Crystals'][0] == 'low')
                                                                Below 0.9 ng/dL<span>Low</span>
                                                            @elseif (isset($jsonData['Crystals'][0]) && $jsonData['Crystals'][0] == 'high')
                                                                Above 2.3 ng/dL&nbsp;<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif

                                                        @if(isset($jsonData['Lactate'][0]))
                                                        <p class="ss_result"><strong>Lactate</strong>
                                                            @if (isset($jsonData['Lactate'][0]) && $jsonData['Lactate'][0] == 'normal')
                                                                0.9 to 2.3 ng/dL <span>Normal</span>
                                                            @elseif (isset($jsonData['Lactate'][0]) && $jsonData['Lactate'][0] == 'low')
                                                                Below 0.9 ng/dL<span>Low</span>
                                                            @elseif (isset($jsonData['Lactate'][0]) && $jsonData['Lactate'][0] == 'high')
                                                                Above 2.3 ng/dL&nbsp;<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif
                                                    </div>
                                                @endif

                                                @if(isset($jsonData['FSH'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-3">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                        LABOVARIANHOTMONES78 / FSH</h6>
                                                        </div>
                                                            
                                                                <div class="symp_title mb-3">

                                                                    <p class="ss_result">
                                                                    {{ $jsonData['FSH'][0] ?? '' }}</p>
                                                                    
                                                                
                                                                </div>
                                                                
                                                            

                                                    </div>
                                                @endif

                                                @if(isset($jsonData['LH'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-3">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                        @if($form_type == 'VaricoceleEmboForm')
                                                                        LABFERTILITYHORMONES000 &gt; FERTILITY HORMONES Results
                                                                    @else
                                                                        LH
                                                                        @endif</h6></h6>
                                                        </div>
                                                        <div class="symp_title mb-3">

                                                            <p class="ss_result">
                                                            {{ $jsonData['LH'][0] ?? '' }}</p>
                                                            
                                                        
                                                        </div>
                                                    </div>
                                                @endif

                                                @if (isset($jsonData['Testosterone'][0]) ||
                                                isset($jsonData['EstrodiolD2'][0]))
                                                    <div class="ss_result_box">
                                                        
                                                        <div class="symp_title mb-1">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                LABFERTILITYHORMONES000 &gt; FERTILITY
                                                                HORMONES Results</h6>

                                                        </div>

                                                        @if(isset($jsonData['Testosterone'][0]))
                                                        <p class="ss_result">
                                                            <strong>Testosterone</strong>

                                                            @if (isset($jsonData['Testosterone'][0]) && $jsonData['Testosterone'][0] == 'normal')
                                                                0.9 to 2.3 ng/dL <span>Normal</span>
                                                            @elseif (isset($jsonData['Testosterone'][0]) && $jsonData['Testosterone'][0] == 'low')
                                                                Below 0.9 ng/dL<span>Low</span>
                                                            @elseif (isset($jsonData['Testosterone'][0]) && $jsonData['Testosterone'][0] == 'high')
                                                                Above 2.3 ng/dL&nbsp;<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif

                                                        @if(isset($jsonData['EstrodiolD2'][0]))
                                                        <p class="ss_result"><strong>Estrodiol D2</strong>
                                                            @if (isset($jsonData['EstrodiolD2'][0]) && $jsonData['EstrodiolD2'][0] == 'normal')
                                                                0.9 to 2.3 ng/dL <span>Normal</span>
                                                            @elseif (isset($jsonData['EstrodiolD2'][0]) && $jsonData['EstrodiolD2'][0] == 'low')
                                                                Below 0.9 ng/dL<span>Low</span>
                                                            @elseif (isset($jsonData['EstrodiolD2'][0]) && $jsonData['EstrodiolD2'][0] == 'high')
                                                                Above 2.3 ng/dL&nbsp;<span>High</span>
                                                            @endif
                                                        </p>
                                                        @endif

                                                    </div>
                                                @endif

                                                @if (isset($jsonData['Semen'][0]) ||
                                                isset($jsonData['Spermcount'][0]) ||
                                                isset($jsonData['SpermConcentration'][0]) ||
                                                isset($jsonData['NormalForm'][0]) ||
                                                isset($jsonData['Progressive'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-1">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                LABSEMENANALYSIS000 &gt; SEMEN Analysis
                                                                RESULTS</h6>
                                                        </div>
                                                        @if (isset($jsonData) && is_array($jsonData) && array_key_exists('Semen', $jsonData))
                                                            <div class="symp_title mb-1">
                                                                <h6>
                                                                    Semen Volume (ml)</h6>
                                                            </div>
                                                            <p class="ss_result">
                                                                {{ $jsonData['Semen'][0] ?? '' }}</p>
                                                        @endif
                                                        @if (isset($jsonData) && is_array($jsonData) && array_key_exists('Spermcount', $jsonData))
                                                            <div class="symp_title mb-1">
                                                                <h6>
                                                                    Sperm count (Million)</h6>
                                                            </div>
                                                            <p class="ss_result">
                                                                {{ $jsonData['Spermcount'][0] ?? '' }}
                                                            </p>
                                                        @endif
                                                        @if (isset($jsonData) && is_array($jsonData) && array_key_exists('SpermConcentration', $jsonData))
                                                            <div class="symp_title mb-1">
                                                                <h6>
                                                                    Sperm Concentration (Million/ml)
                                                                </h6>
                                                            </div>
                                                            <p class="ss_result">
                                                                {{ $jsonData['SpermConcentration'][0] ?? '' }}
                                                            </p>
                                                        @endif
                                                        @if (isset($jsonData) && is_array($jsonData) && array_key_exists('NormalForm', $jsonData))
                                                            <div class="symp_title mb-1">
                                                                <h6>
                                                                    Normal Form</h6>
                                                            </div>
                                                            <p class="ss_result">
                                                                {{ $jsonData['NormalForm'][0] ?? '' }}
                                                            </p>
                                                        @endif

                                                        @if (isset($jsonData) && is_array($jsonData) && array_key_exists('Progressive', $jsonData))
                                                            <div class="symp_title mb-1">
                                                                <h6>
                                                                    Progressive (Forward) Motility </h6>
                                                            </div>
                                                            <p class="ss_result">
                                                                {{ $jsonData['Progressive'][0] ?? '' }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                @endif


                                                @if(isset($jsonData['culture'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-3">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                LABSEMENCULTURE000 > SEMEN culture RESULTS
                                                            </h6>
                                                        </div>

                                                        <div class="symp_title mb-3">
                                                            @if (isset($jsonData['culture']) && $jsonData['culture'][0] == 'Positive  (VE contraindicated)')
                                                                <p class="ss_result">
                                                                    {{ $jsonData['culture'][0] ?? '' }}</p>
                                                                <p class="ss_result">
                                                                    &nbsp;&nbsp;{{ $jsonData['NOTE'][0] ?? '' }}
                                                                </p>
                                                            @else
                                                                <p class="ss_result">
                                                                    &nbsp;&nbsp;{{ $jsonData['culture'][0] ?? '' }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                                    <!--CTCIR48 > Short Saphenous Vein (SSV) - RIGHT end -->


                                                @if (isset($jsonData['RESULTS'][0]) ||
                                                isset($jsonData['RESULTS1'][0]) ||
                                                isset($jsonData['RESULTS2'][0]) ||
                                                isset($jsonData['RESULTS3'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-1">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                LABDNAFRAG000 &gt; DNA Fragmentation RESULTS
                                                            </h6>
                                                        </div>
                                                        @if (isset($jsonData) && is_array($jsonData) && array_key_exists('RESULTS', $jsonData))
                                                            <p class="ss_result">
                                                                {{ $jsonData['RESULTS'][0] ?? '' }}</p>
                                                        @endif
                                                        @if (isset($jsonData) && is_array($jsonData) && array_key_exists('RESULTS1', $jsonData))
                                                            <p class="ss_result">
                                                                {{ $jsonData['RESULTS1'][0] ?? '' }}</p>
                                                        @endif
                                                        @if (isset($jsonData) && is_array($jsonData) && array_key_exists('RESULTS2', $jsonData))
                                                            <p class="ss_result">
                                                                {{ $jsonData['RESULTS2'][0] ?? '' }}</p>
                                                        @endif
                                                        @if (isset($jsonData) && is_array($jsonData) && array_key_exists('RESULTS3', $jsonData))
                                                            <p class="ss_result">
                                                                {{ $jsonData['RESULTS3'][0] ?? '' }}</p>
                                                        @endif



                                                    </div>
                                                @endif

                                                @if(isset($jsonData['AMH'][0]))
                                                    <div class="ss_result_box">
                                                    <div class="symp_title mb-3">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                    LH</h6>
                                                    </div>
                                                        
                                                            <div class="symp_title mb-3">

                                                                <p class="ss_result">
                                                                {{ $jsonData['AMH'][0] ?? '' }}</p>
                                                                
                                                            
                                                            </div>
                                                            
                                                        

                                                    </div>
                                                @endif

                                                @if(isset($jsonData['RenalFunctiontest'][0]))
                                                    <div class="ss_result_box">
                                                    <div class="symp_title mb-3">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                    LABRFT12 / Renal Function test (Creatinine | Na | K | urea) Results</h6>
                                                    </div>
                                                        
                                                            <div class="symp_title mb-3">
                                                            @if (isset($jsonData['RenalFunctiontest']) && !empty($jsonData['RenalFunctiontest'][0]))
                                                                
                                                            
                                                                <p class="ss_result">
                                                                {{ $jsonData['RenalFunctiontest'][0] =='Normal Renal profile' ?  $jsonData['RenalFunctiontest'][0] :  '' }}</p>
                                                                @elseif (isset($jsonData['RenalFunctiontestNote']) && !empty($jsonData['RenalFunctiontestNote'][0]))
                                                                <p class="ss_result">{{ $jsonData['RenalFunctiontest'][0] ?? '' }}</p>
                                                                <p class="ss_result">
                                                                    &nbsp;&nbsp;{{ $jsonData['RenalFunctiontest'][0] =='Abnormal Renal profile (PAE contraindicated)' ?  $jsonData['RenalFunctiontestNote'][0] :  '' }}</p>
                                                                
                                                                @endif
                                                            </div>
                                                            
                                                        

                                                    </div>
                                                @endif
                                                <!-- LABRFT12 / Renal Function test (Creatinine | Na | K | urea) Results  end -->


                                                    <!--  LABUA29 / Urinalysis (Blood | Protein | WBC) Results -->
                                                @if(isset($jsonData['UrinalysisResults'][0]))
                                                    <div class="ss_result_box">
                                                    <div class="symp_title mb-3">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                    LABUA29 / Urinalysis Results</h6>
                                                    </div>
                                                        
                                                            <div class="symp_title mb-3">
                                                            @if (isset($jsonData['UrinalysisResults']) && !empty($jsonData['UrinalysisResults'][0]))
                                                                
                                                            
                                                                <p class="ss_result">
                                                                {{ $jsonData['UrinalysisResults'][0] =='Normal Urinanalysis' ?  $jsonData['UrinalysisResults'][0] :  '' }}</p>
                                                                @elseif (isset($jsonData['UrinalysisResultsNote']) && !empty($jsonData['UrinalysisResultsNote'][0]))
                                                                <p class="ss_result">{{ $jsonData['UrinalysisResults'] ?? '' }}</p>
                                                                <p class="ss_result">
                                                                    {{ $jsonData['UrinalysisResults'][0] =='Abnormal Urinanalysis (UAE unfavorable)' ?  $jsonData['UrinalysisResultsNote'][0] :  '' }}</p>
                                                                
                                                                @endif
                                                            </div>
                                                            
                                                        

                                                    </div>
                                                @endif
                                                <!--  LABUA29 / Urinalysis (Blood | Protein | WBC) Results  end -->
                                                    <!--  LABPAPSMEAR185 / Urinalysis (Blood | Protein | WBC) Results -->
                                                @if(isset($jsonData['PAPSMEARResults'][0]))
                                                    <div class="ss_result_box">
                                                    <div class="symp_title mb-3">
                                                        <h6><span class="point_dia"><i
                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                    LABPAPSMEAR185 / PAP SMEAR  Results</h6>
                                                    </div>
                                                        
                                                            <div class="symp_title mb-3">
                                                            @if (isset($jsonData['PAPSMEARResults']) && !empty($jsonData['PAPSMEARResults'][0]))
                                                                
                                                            
                                                                <p class="ss_result">
                                                                {{ $jsonData['PAPSMEARResults'][0] =='Normal Urinanalysis' ?  $jsonData['PAPSMEARResults'][0] :  '' }}</p>
                                                                @elseif (isset($jsonData['PAPSMEARResultsNote']) && !empty($jsonData['PAPSMEARResultsNote'][0]))
                                                                <p class="ss_result">{{ $jsonData['PAPSMEARResults'][0] ?? '' }}</p>
                                                                <p class="ss_result">
                                                                    {{ $jsonData['PAPSMEARResults'][0] =='Abnormal Urinanalysis (UAE unfavorable)' ?  $jsonData['PAPSMEARResultsNote'][0] :  '' }}</p>
                                                                
                                                                @endif
                                                            </div>
                                                            
                                                        

                                                    </div>
                                                @endif

                                                @if(isset($jsonData['LABJFA15']))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title ">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                LABJFA15 > Histopath MSK Biopsy -
                                                                Findings</h6>
                                                        </div>

                                                        @if (isset($jsonData['LABJFA15']) && $jsonData['LABJFA15'][0] == 'Abnormal')
                                                            <p class="ss_result">
                                                                {{ $jsonData['LABJFA15'][0] ?? '' }}
                                                            </p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['LABJFA15Note'][0] ?? '' }}
                                                            </p>
                                                        @else
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['LABJFA15'][0] ?? '' }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                @endif

                                                @if(isset($jsonData['USSTBIOPSYMSK452']))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title ">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                USSTBIOPSYMSK452 > Histopath MSK Biopsy
                                                                - Findings</h6>
                                                        </div>
                                                        @if (isset($jsonData['USSTBIOPSYMSK452']) && $jsonData['USSTBIOPSYMSK452'][0] == 'Abnormal')
                                                            <p class="ss_result">
                                                                {{ $jsonData['USSTBIOPSYMSK452'][0] ?? '' }}
                                                            </p>
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['USSTBIOPSYMSK452Note'][0] ?? '' }}
                                                            </p>
                                                        @else
                                                            <p class="ss_result">
                                                                &nbsp;&nbsp;{{ $jsonData['USSTBIOPSYMSK452'][0] ?? '' }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                @endif

                                                @if(isset($jsonData['URINANALYSISResults'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-3">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                LABURINANALYSIS000 / URINANALYSIS
                                                                Results</h6>
                                                        </div>

                                                        @if (isset($jsonData['URINANALYSISResults'][0]) && $jsonData['URINANALYSISResults'][0] == 'Positive  (PCE unfavorable)')
                                                            <div class="symp_title mb-3">
                                                                <p class="ss_result">
                                                                    {{ $jsonData['URINANALYSISResults'][0] ?? '' }}
                                                                </p>

                                                                <p class="ss_result">
                                                                    &nbsp;&nbsp;{{ $jsonData['URINANALYSISResultsNote'][0] ?? '' }}
                                                                </p>


                                                            </div>
                                                        @else
                                                            <div class="symp_title mb-3">

                                                                <p class="ss_result">
                                                                    {{ $jsonData['URINANALYSISResults'][0] ?? '' }}
                                                                </p>


                                                            </div>
                                                        @endif

                                                    </div>
                                                @endif

                                                @if(isset($jsonData['HistopathResults'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-3">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                LABPAPSMEAR000 / Histopath Results</h6>
                                                        </div>

                                                        @if (isset($jsonData['HistopathResults'][0]) && $jsonData['HistopathResults'][0] == 'Positive  (PCE unfavorable)')
                                                            <div class="symp_title mb-3">
                                                                <p class="ss_result">
                                                                    {{ $jsonData['HistopathResults'][0] ?? '' }}
                                                                </p>
                                                                <p class="ss_result">
                                                                    &nbsp;&nbsp;{{ $jsonData['HistopathResultsNote'][0] ?? '' }}
                                                                </p>


                                                            </div>
                                                        @else
                                                            <div class="symp_title mb-3">

                                                                <p class="ss_result">
                                                                    {{ $jsonData['HistopathResults'][0] ?? '' }}
                                                                </p>


                                                            </div>
                                                        @endif



                                                    </div>
                                                @endif

                                                @if(isset($jsonData['LABPSA24'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-3">
                                                            <h6>
                                                                <span class="point_dia">
                                                                    <i class="fa-regular fa-circle-dot"></i>
                                                                </span>
                                                                LABPSA24 / PSA
                                                            </h6>
                                                        </div>
                                                        <div class="symp_title mb-3">
                                                            <p class="ss_result">
                                                            {{ $jsonData['LABPSA24'][0] ?? '' }}</p>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if(isset($jsonData['LABRFT12'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-3">
                                                            <h6>
                                                                <span class="point_dia">
                                                                    <i class="fa-regular fa-circle-dot"></i>
                                                                </span>
                                                                        LABRFT12 / Renal Function test (Creatinine | Na | K | urea) Results
                                                            </h6>
                                                        </div>
                                                        <div class="symp_title mb-3">
                                                            @if (isset($jsonData['LABRFT12']) && !empty($jsonData['LABRFT12'][0]))
                                                                <p class="ss_result"> {{ $jsonData['LABRFT12'][0] =='Normal Renal profile' ?  $jsonData['LABRFT12'][0] :  '' }}</p>
                                                            @elseif (isset($jsonData['LABRFT12NOTE']) && !empty($jsonData['LABRFT12NOTE'][0]))
                                                                <p class="ss_result">{{ $jsonData['LABRFT12'][0] ?? '' }}</p>
                                                                <p class="ss_result">&nbsp;&nbsp;{{ $jsonData['LABRFT12'][0] =='Abnormal Renal profile' ?  $jsonData['LABRFT12NOTE'][0] :  '' }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif

                                                @if(isset($jsonData['LABUA29'][0]))
                                                        <div class="ss_result_box">
                                                        <div class="symp_title mb-3">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                        LABUA29 / Urinalysis (Blood | Protein | WBC) Results</h6>
                                                        </div>
                                                            
                                                                <div class="symp_title mb-3">
                                                                @if (isset($jsonData['LABUA29']) && !empty($jsonData['LABUA29'][0]))
                                                                    
                                                                
                                                                    <p class="ss_result">
                                                                    {{ $jsonData['LABUA29'][0] =='Normal Urinanalysis' ?  $jsonData['LABUA29'][0] :  '' }}</p>
                                                                    @elseif (isset($jsonData['LABUA29NOTE']) && !empty($jsonData['LABUA29NOTE'][0]))
                                                                    <p class="ss_result">{{ $jsonData['LABUA29'][0] }}</p>
                                                                    <p class="ss_result">
                                                                        {{ $jsonData['LABUA29'][0] =='Abnormal Urinanalysis (PAE unfavorable)' ?  $jsonData['LABUA29NOTE'][0] :  '' }}</p>
                                                                    
                                                                    @endif
                                                                </div>
                                                                
                                                            

                                                    </div>
                                                @endif
                                                                        <!--  LABUA29 / Urinalysis (Blood | Protein | WBC) Results  end -->
                                                                        <!-- LABUROFLO82 / Uroflowmetery tests Results -->
                                                @if(isset($jsonData['QMax'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-3">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                        LABUROFLO82 / Uroflowmetery tests Results</h6>
                                                        </div>
                                                            
                                                                <div class="symp_title mb-3">
                                                                    <p class="ss_result">
                                                                    {{ $jsonData['QMax'][0] ?? '' }}</p>
                                                                </div>
                                                    </div>
                                                @endif
                                                                        <!-- LABUROFLO82 / Uroflowmetery tests Results  end -->
                                                                        <!-- LABUROFLO82 / Uroflowmetery tests Results -->
                                                @if(isset($jsonData['PVR'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-3">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                        LABUROFLO82 / Post-Residual Volume (PVR)</h6>
                                                        </div>
                                                            
                                                                <div class="symp_title mb-3">

                                                                    <p class="ss_result">
                                                                    {{ $jsonData['PVR'][0] ?? '' }}</p>
                                                                    
                                                                
                                                                </div>
                                                                
                                                            

                                                    </div>
                                                @endif
                                                                        <!-- LABUROFLO82 / Uroflowmetery tests Results  end -->

                                                                        <!--   LABUROFLOINVASIVE752 /Filling-Voiding phase testing Results -->
                                                @if(isset($jsonData['LABUROFLOINVASIVE752'][0]))
                                                    <div class="ss_result_box">
                                                        <div class="symp_title mb-3">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                        LABUROFLOINVASIVE752 /Filling-Voiding phase testing Results</h6>
                                                        </div>
                                                        <div class="symp_title mb-3">
                                                            @if (isset($jsonData['LABUROFLOINVASIVE752']) && !empty($jsonData['LABUROFLOINVASIVE752'][0]))
                                                                
                                                            
                                                                <p class="ss_result">
                                                                {{ $jsonData['LABUROFLOINVASIVE752'][0] =='Normal results (PAE unfavorable)' ?  $jsonData['LABUROFLOINVASIVE752'][0] :  '' }}</p>
                                                                @elseif (isset($jsonData['LABUROFLOINVASIVE752NOTE']) && !empty($jsonData['LABUROFLOINVASIVE752NOTE'][0]))
                                                                <p class="ss_result">
                                                                    <p class="ss_result">{{ $jsonData['LABUROFLOINVASIVE752'][0] ?? '' }}</p>
                                                                    {{ $jsonData['LABUROFLOINVASIVE752'][0] =='Abnormal Urinanalysis (PAE unfavorable)' ?  $jsonData['LABUROFLOINVASIVE752NOTE'][0] :  '' }}</p>
                                                                
                                                                @endif
                                                        </div>
                                                    </div>
                                                @endif

                                                
                                            </div>
                                        </div>
                                    
                                    </div>
                                </li>
                            @empty
                            @endforelse
                            </ul>



                        </div>
                    </div>
                @endif

                @if (isset($listofVisit) )
                    @php
                        $patient_id = decrypt(@$id);
                        $visit_notes = App\Models\patient\Patient_progress_note::where([
                                // 'progress_note_canned_text_id' => 6,
                                'patient_id' => @$patient_id
                            ])
                            ->orderBy('id', 'desc')
                            ->get();
                    @endphp
                    @if($visit_notes && $visit_notes->count()>0)
                    
                    <div class="diagnosis_section">
                        <div class="section_title">
                            <h2>List of Visit</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak diagnosis_data">
                            <ul>
                                @foreach ($visit_notes as $visit)
                                    <li>
                                        <div class="appoin_title">
                                            <h6><span class="point_dia"><i
                                                class="fa-regular fa-circle-dot"></i></span>{{ date('Y-m-d',strtotime($visit->created_at))}}</h6>
                                        </div>
                                        <div class="appoin_date">

                                            <div class="read-more-content">

                                                <p>{{ $visit->day??'0' }} {{ $visit->date??'days' }}</p>
                                                <p>{{$visit->details}}</p>

                                            </div>
                                            

                                        </div>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                @endif

                @if (isset($progressNote) && $Patient_progress_notes && $Patient_progress_notes->count()>0)
                    <div class="diagnosis_section">
                        <div class="section_title">
                            <h2>Progress Notes</h2>
                        </div>
                        <div class="appointments___list past_medical_history_ak diagnosis_data">
                            <ul>
                                @if (isset($Patient_progress_notes))
                                            @forelse ($Patient_progress_notes  as $record)
                                                <li>

                                                    <div class="appoin_date">
                                                        <div class="read-more-content " style="">
                                                            <div class="diagnosis_show">
                                                                
                                                                <div class="Bottom_btn">
                                                            
                                                                    <span class="removeNotes" data-id="{{ $record->id }}">
                                                                        <i class="fa-regular fa-trash-can trash_btn"></i>
                                                                    </span>
                                                                </div>
                                                                
                                                                <div class="ss_result_box">
                                                                    <div class="symp_title mb-1">
                                                                        <h6><span class="point_dia"><i
                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                            {{ $record->progressNote->canned_name ?? '' }}
                                                                        </h6>

                                                                    </div>

                                                                    @if ($record->voice_recognition)
                                                                        <p class="ss_result">
                                                                            <strong>Summery 1</strong> &nbsp;&colon;
                                                                            {{ strip_tags($record->voice_recognition ?? '') }}
                                                                        </p>
                                                                    @endif

                                                                    @if ($record->summery)
                                                                        <p class="ss_result">
                                                                            <strong>Summery 2</strong> &nbsp;&colon;
                                                                            {{ $record->summery ?? '' }}
                                                                        </p>
                                                                    @endif
                                                                


                                                                
                                                                </div>



                                                            </div>



                                                        </div>
                                                    </div>

                                                


                                                </li>
                                            @empty
                                                {{-- <small style="font-size:10px;">No Data Found</small> --}}
                                            @endforelse
                                        @endif

                                


                            </ul>
                        </div>
                    </div>
                @endif

              <div class="signatureBox">
              <!-- <div class="col-lg-12" style="width:100%;">
                    <b class="tm_primary_color">Signature:</b>
                    </div> -->
                <div class="row">
                   
                
                    <div class="col-lg-6" style="padding-left:0;">
                    <div class="tm_invoice_footer tm_type1">
                                <div class="tm_left_footer">
                                    <!-- Signature Pad Container -->
                                    <div class="formGroup">
                                    <label for="">Signature</label>
                                    <div id="signature-pad" class="signature-pad">
                                        <canvas></canvas>
                                    </div>
                                    <img id="imgSrc" hidden />
                                    <button id="clear-signature" type="button">Clear</button>
                                    <button id="save-signature" class="btn btn-success btn-sm" type="button">Save</button>
                                    </div>
                                </div>
                              
                                </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="InputBox">
                            <div class="formGroup">
                                <label for="">Doctor Name</label>
                                <input type="text" id="dname" class="form-control" placeholder="Name">
                            </div>
                            <div class="formGroup">
                                <label for="">Date</label>
                                <input type="text"  class="form-control" placeholder="Date" id="basicDate">
                            </div>
                           
                            

                        </div>
                        <div class="InputBoxLabel" style="display: none;">
                            <div class="formGroup" style="width: 50%;">
                                <label for="">Doctor Name</label>
                                <b id="dnamelabel"> </b>
                            </div>
                            <div class="formGroup" style="width: 50%;">
                                <label for="">Date</label>
                                <b id="ddatelabel"> </b>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>

                
                
            </div>
            <footer>
                <div class="footer_section">
                    <div class="MainBox">
                        <div class="leftSide">
                            <div class="footerogo">
                                <img src="{{ asset('/assets/report-genrate/img/dsgd.png') }}" alt="">
                            </div>
                            <div class="footerContact">
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <iconify-icon icon="mdi:location"></iconify-icon>
                                        </div>
                                        <div class="dtBox">
                                            <p>Address: 18 November street @Azaiba Muscat, Oman</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <iconify-icon icon="oui:email"></iconify-icon>
                                        </div>
                                        <div class="dtBox">
                                            <p>Email: <a href="#">info@qastaratclinics.com</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="footerContact">
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <iconify-icon icon="ph:phone"></iconify-icon>
                                        </div>
                                        <div class="dtBox">
                                            <p>Mobile: <a href="#">+96892000230</a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <iconify-icon icon="uil:instagram"></iconify-icon>
                                        </div>
                                        <div class="dtBox">
                                            <p>Instagram <a href="#">qastarat_clinics</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="rightSide">
                            <p>#علاجك_بدون_شق_جراحي</p>
                            <h5><span>Toll Free</span> (+968) 80080099</h5>
                        </div>
                    </div>
                </div>
            </footer>
        </div>


            <div class="cs-invoice_btns cs-hide_print">
                
                <a href="javascript:window.print()" class="cs-invoice_btn cs-color1">
                    <svg xmlns="http://www.w3.org/2000/svg'" class="ionicon" viewBox="0 0 512 512">
                        <path
                            d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                            fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                        <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32"
                            fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                        <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                            stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                        <circle cx="392" cy="184" r="24" />
                    </svg>
                    <span>Print</span>
                </a>

                <button id="download_btn" class="cs-invoice_btn cs-color2">
                    <svg xmlns="http://www.w3.org/2000/svg')}}" class="ionicon" viewBox="0 0 512 512">
                        <title>Download</title>
                        <path
                            d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40"
                            fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="32" />
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="32" d="M176 272l80 80 80-80M256 48v288" />
                    </svg>
                    <span>Download</span>
                </button>

            </div>
        </div>
    </div>
    <script src="{{ asset('/assets/report-genrate/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/report-genrate/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('/assets/report-genrate/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('/assets/report-genrate/js/main.js') }}"></script>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
  <!--  Flatpickr  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
  <script>
    $("#basicDate").flatpickr({
    enableTime: false,
    dateFormat: "F, d Y"
});
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var canvas = document.querySelector("#signature-pad canvas");
      var signaturePad = new SignaturePad(canvas);
  
      // Adjust canvas size
      function resizeCanvas() {
        var ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = (canvas.offsetHeight * ratio)*2;
        canvas.getContext("2d").scale(ratio, ratio);
        signaturePad.clear(); // otherwise isEmpty() might return incorrect value
      }
  
      window.addEventListener("resize", resizeCanvas);
      resizeCanvas();
  
      // Clear signature
      document.getElementById('clear-signature').addEventListener('click', function () {
        signaturePad.clear();
      });
  
      // Save signature (you can modify this to save the signature as per your requirement)
      // Example: Saving the signature data URL in localStorage
      document.getElementById('save-signature').addEventListener('click', function () {

        let dname = $("#dname").val();
        let ddate = $("#basicDate").val();

        if(dname == ''){
            alert('Please Fill Name Field.');
        }else if(ddate == ''){
            alert('Please Fill Date Field.');
        }else if (!signaturePad.isEmpty()) {
          var dataURL = signaturePad.toDataURL();
          $("#imgSrc").attr('src',dataURL);
          $("#imgSrc").removeAttr('hidden');
          $(".signature-pad").prop('hidden',true);
          $("#save-signature").prop('hidden',true);
          $("#clear-signature").prop('hidden',true);
          $(".InputBox").css('display','none');
          $(".InputBoxLabel").css('display','flex');


          $("#ddatelabel").text(ddate);
          $("#dnamelabel").text(dname);

          localStorage.setItem('signature', dataURL);
        } else {
          alert("Please provide a signature first.");
        }
      });
    });

    window.onbeforeprint = function() {
        var footerHeight = document.querySelector('footer').offsetHeight;
        document.querySelector('.content').style.marginBottom = footerHeight + 'px';
    };
  </script>
       

</body>

</html>

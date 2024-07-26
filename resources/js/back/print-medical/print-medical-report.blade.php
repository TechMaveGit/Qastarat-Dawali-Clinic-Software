<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeMarch">
    <link class="dark-theme-img" rel="icon" href="{{ asset('public/assets/images/new-images/logofwhite.png') }}"
        type="image/x-icon">

    <!-- Site Title -->
    <title>Print Medical Record</title>
    <link rel="stylesheet" href="{{ asset('public/assets/report-genrate/css/style.css') }}">
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
</style>

<body>
    <div class="cs-container">
        <div class="cs-invoice cs-style1">
            <div class="cs-invoice_in pdf_box" id="download_section">
                <div class="cs-invoice_head logo_head cs-type1 cs-mb25">
                    <div class="cs-invoice_right cs-text_right">
                        <div class="cs-logo cs-mb5"><img
                                src="{{ asset('public/assets/report-genrate/img/FullLogo-01.svg') }}" alt="Logo">
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

                        <div class="symptoms_section">
                            <div class="section_title">
                                <h2>Symptoms</h2>
                            </div>
                            <div class="appointments___list past_medical_history_ak diagnosis_data">

                                <ul>
                                    <li>
                                        @forelse ($generalDiagnosis as $key =>$value)
                                            <div class="appoin_date">
                                                <div>
                                                    <div class="diagnosis_show">

                                                        <div class="symp_title">
                                                            <h6><span class="point_dia"><i
                                                                        class="fa-regular fa-circle-dot"></i></span>
                                                                {{ $value['SymptomType'] ?? '' }}<span
                                                                    class="sym_duration">&nbsp;-{{ $value['SymptomDurationValue'] ?? '' }}
                                                                    &nbsp;{{ $value['SymptomDurationType'] ?? '' }}</span>
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

                                </ul>
                            </div>
                        </div>
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
                                                                    <h6><span class="point_dia"><i
                                                                                class="fa-regular fa-circle-dot"></i></span>
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
                                                                    <h6><span class="point_dia"><i
                                                                                class="fa-regular fa-circle-dot"></i></span>
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
                                                                // echo "<pre>";
                                                                //     echo $ClinicalExam['RegionalExam'][0];
                                                                //     die;
                                                            @endphp


                                                            @if (isset($ClinicalExam['RegionalExam']) && $ClinicalExam['RegionalExam'][0] == 'Abnormal')
                                                                <div class="ss_result_box">
                                                                    <div class="symp_title mb-1">
                                                                        <h6><span class="point_dia"><i
                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                            Regional Exam</h6>
                                                                    </div>
                                                                    <p class="ss_result">
                                                                        <strong>Abnormal</strong>
                                                                        -
                                                                        {{ $ClinicalExam['RegionalExamNote'][0] ?? '' }}.
                                                                    </p>
                                                                </div>
                                                            @endif


                                                            @if (isset($ClinicalExam['RegionalExam']) && $ClinicalExam['RegionalExam'][0] == 'Normal')
                                                                <div class="ss_result_box">
                                                                    <div class="symp_title mb-1">
                                                                        <h6><span class="point_dia"><i
                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                            Regional Exam</h6>
                                                                    </div>
                                                                    <p class="ss_result">
                                                                        <strong>Normal</strong>

                                                                </div>
                                                            @endif
                                                            @if (isset($ClinicalExam['SystemicExam']) && $ClinicalExam['SystemicExam'][0] == 'Abnormal')
                                                                <div class="ss_result_box">
                                                                    <div class="symp_title mb-1">
                                                                        <h6><span class="point_dia"><i
                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                            Systemic Exam</h6>
                                                                    </div>
                                                                    <p class="ss_result">
                                                                        <strong>Abnormal</strong>
                                                                        -
                                                                        {{ $ClinicalExam['SystemicExamNote'][0] ?? '' }}.
                                                                    </p>
                                                                </div>
                                                            @endif
                                                            @if (isset($ClinicalExam['SystemicExam']) && $ClinicalExam['SystemicExam'][0] == 'Normal')
                                                                <div class="ss_result_box">
                                                                    <div class="symp_title mb-1">
                                                                        <h6><span class="point_dia"><i
                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                            Systemic Exam</h6>
                                                                    </div>
                                                                    <p class="ss_result">
                                                                        <strong>Normal</strong>

                                                                </div>
                                                            @endif

                                                        </div>



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



                    @if (isset($imagingExam) && !empty($imagingExam))
                        @if ($VaricoceleEmboForm)
                            <div class="ClinicalExam_section">
                                <img
                                    src="{{ asset('public/assets/thyroid-eligibility-form/' . $VaricoceleEmboForm->AnnotateimageData ?? '') }}" />
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


                                                <div
                                                    class="datatable-container allinvoice_table custom_table_area table_test_fgi">


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
                                                                            )->where('id', $Patient_order_lab->task);
                                                                            if (
                                                                                $Patient_order_lab->test_type ==
                                                                                'pathology'
                                                                            ) {
                                                                                $pathology_price_list = $pathology_price_list->where(
                                                                                    'price_type',
                                                                                    '0',
                                                                                );
                                                                            } else {
                                                                                $pathology_price_list = $pathology_price_list->where(
                                                                                    'price_type',
                                                                                    '1',
                                                                                );
                                                                            }
                                                                            $pathology_price_list = $pathology_price_list->first();

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
                                                                                <a href="{{ env('Document_Url') }}{{ $Patient_order_lab->labDocument }}"
                                                                                    download="{{ env('Document_Url') }}{{ $Patient_order_lab->labDocument }}"
                                                                                    class="download_rp_btn">
                                                                                    <i
                                                                                        class="fa-solid fa-file-arrow-down"></i>
                                                                                    Download Report
                                                                                </a>
                                                                            </td>
                                                                        @else
                                                                            <td>
                                                                                <a href=""
                                                                                    class="download_rp_btn"
                                                                                    style="color: #f30728;">
                                                                                    <i class="fa-solid fa-file-arrow-down"
                                                                                        style="color: #db0808; border: 1px solid #e90a0a;"></i>
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
                                                            {{-- <tr>
                                                            <td>17 Hydroxyprogesterone</td>
                                                            <td>2 week</td>
                                                            <td><button
                                                                    class="confirmed-badge">Complete</button>
                                                            </td>
                                                            <td>
                                                                <a href="images/new-images/dummy.pdf"
                                                                    download=""
                                                                    class="download_rp_btn"><i
                                                                        class="fa-solid fa-file-arrow-down"></i>
                                                                    Download Report</a>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td>5 HIAA</td>
                                                            <td>1 day</td>
                                                            <td><button
                                                                    class="pending-badge">Pending</button>
                                                            </td>
                                                            <td>

                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td>6-TGN</td>
                                                            <td>1 day</td>
                                                            <td><button
                                                                    class="pending-badge">Pending</button>
                                                            </td>
                                                            <td>

                                                            </td>


                                                        </tr> --}}
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
                                                        <p class="diagnosis_date top_de"><span
                                                                class="enter_span_hivj">
                                                                @php
                                                                    $jsonData = json_decode($record->data_value, true);
                                                                    // echo "<pre>";
                                                                    //     print_r($jsonData);
                                                                    //     die;
                                                                @endphp
                                                                <div class="ss_result_box">
                                                                    <div class="symp_title mb-1">
                                                                        <h6><span class="point_dia"><i
                                                                                    class="fa-regular fa-circle-dot"></i></span>
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
                                                                        <h6><span class="point_dia"><i
                                                                                    class="fa-regular fa-circle-dot"></i></span>
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



                    @if (isset($specialInvestigation) && !empty($specialInvestigation))

                        <div class="SpecialInvestigation_section">
                            <div class="section_title">
                                <h2>Special Investigation</h2>
                            </div>
                            <div class="appointments___list past_medical_history_ak diagnosis_data">
                                <ul>
                                    <li>
                                        @if (isset($SpecialInvestigations_db))
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
                                        @endif
                                    </li>

                                </ul>
                            </div>
                        </div>
                    @endif






                    @if (isset($mdtReview) && !empty($mdtReview))
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
                                                            // echo "<pre>";
                                                            //     print_r($MDT);
                                                            //     die;
                                                        @endphp


                                                            @if (isset($MDT['TTA']) && $MDT['TTA'][0] == 'TTA')
                                                                <div class="ss_result_box">
                                                                    <div class="symp_title mb-1">
                                                                        <h6><span class="point_dia"><i
                                                                                    class="fa-regular fa-circle-dot"></i></span>
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
                                                                        <h6><span class="point_dia"><i
                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                            TE</h6>

                                                                    </div>
                                                                    <p class="ss_result">
                                                                        {{ $MDT['TENote'][0] ?? '' }}.
                                                                    </p>
                                                                </div>
                                                            @endif
                                                            @if (isset($MDT['Surgical']) && $MDT['Surgical'][0] == 'Surgical')
                                                                <div class="ss_result_box">
                                                                    <div class="symp_title mb-1">
                                                                        <h6><span class="point_dia"><i
                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                            Surgical</h6>

                                                                    </div>
                                                                    <p class="ss_result">
                                                                        {{ $MDT['SurgicalNote'][0] ?? '' }}.</p>
                                                                </div>
                                                            @endif
                                                            @if (isset($MDT['OtherOptions']) && $MDT['OtherOptions'][0] == 'Other options')
                                                                <div class="ss_result_box">
                                                                    <div class="symp_title mb-1">
                                                                        <h6><span class="point_dia"><i
                                                                                    class="fa-regular fa-circle-dot"></i></span>
                                                                            Other options</h6>

                                                                    </div>
                                                                    <p class="ss_result">
                                                                        {{ $MDT['OtherOptionsNote'][0] ?? '' }}.</p>
                                                                </div>
                                                            @endif
                                                            @if (!isset($MDT['OtherOptions']) || !isset($MDT['Surgical']) || !isset($MDT['TE']) || !isset($MDT['TTA']))
                                                                <div class="ss_result_box">
                                                                    @foreach ($MDT as $key => $value)
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
                                            <small style="font-size:10px;">----</small>
                                        @endforelse
                                    @endif
                                </ul>




                            </div>
                        </div>

                    @endif


                    @if (empty($diagnosis_generals->checkValData))
                        @if (isset($diagnosis) && !empty($diagnosis))
                            <div class="diagnosis_section">
                                <div class="section_title">
                                    <h2>Diagnosis</h2>
                                </div>
                                <div class="appointments___list past_medical_history_ak diagnosis_data">


                                    <ul>
                                        <li>
                                            <div class="appoin_title">
                                                <h6><span class="point_dia"><i
                                                            class="fa-regular fa-circle-dot"></i></span> Provisional /
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
                                                <h6><span class="point_dia"><i
                                                            class="fa-regular fa-circle-dot"></i></span> ICD 10</h6>

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
                    @endif


                    @if (!empty($diagnosis_generals->checkValData))
                        @if (isset($diagnosis) && !empty($diagnosis))
                            <div class="diagnosis_section">
                                <div class="section_title">
                                    <h2>Diagnosis</h2>
                                </div>
                                <div class="appointments___list past_medical_history_ak diagnosis_data">


                                    <ul>
                                        <li>
                                            <div class="appoin_title">
                                                <h6><span class="point_dia"><i
                                                            class="fa-regular fa-circle-dot"></i></span> Provisional /
                                                    Gernal diagnosis</h6>

                                            </div>
                                            <div class="appoin_date">
                                                <div>
                                                    <div class="diagnosis_show">


                                                        <p class="diagnosis_text">
                                                            @forelse ($diagnosis_generals as $diagnosis_general)
                                                                <div class="diagnosis_show ">
                                                                    <p class="diagnosis_date">
                                                                        <span class="enter_span_hivj">Entered By |
                                                                            &nbsp;{{ optional(optional($diagnosis_general)->doctor)->name ?? '' }}</span>


                                                                        <span
                                                                            class="enter_span_hivj">{{ isset($diagnosis_general) && isset($diagnosis_general->created_at) ? $diagnosis_general->created_at->format('D, d M Y, H:i A') : '' }}</span>
                                                                    </p>
                                                                    <p class="diagnosis_text">
                                                                        @if (isset($diagnosis_general))
                                                                            @php

                                                                                $diagnosis_general_data_value = json_decode(
                                                                                    $diagnosis_general->data_value,
                                                                                    true,
                                                                                );

                                                                            @endphp
                                                                            @forelse ($diagnosis_general_data_value as $key => $values)
                                                                                @foreach ($values as $value)
                                                                                    {{ $value }}

                                                                                    <span class="separation">|</span>
                                                                                @endforeach
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
                                                <h6><span class="point_dia"><i
                                                            class="fa-regular fa-circle-dot"></i></span> ICD 10</h6>

                                            </div>
                                            <div class="appoin_date">
                                                @forelse ($diagnosis_cids as $diagnosis_cid)
                                                    <div class="diagnosis_show ">
                                                        <p class="diagnosis_date">
                                                            <span class="enter_span_hivj">Entered By |
                                                                &nbsp;{{ optional(optional($diagnosis_cid)->doctor)->name ?? '' }}</span>


                                                            <span
                                                                class="enter_span_hivj">{{ isset($diagnosis_cid) && isset($diagnosis_cid->created_at) ? $diagnosis_cid->created_at->format('D, d M Y, H:i A') : '' }}</span>
                                                        </p>
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

                                                                        <span class="separation">|</span>
                                                                    @endforeach
                                                                @empty
                                                                @endforelse
                                                            @endif
                                                        </p>

                                                    </div>

                                                @empty
                                                    <small style="font-size:10px;">---</small>
                                                @endforelse

                                            </div>

                                </div>
                                </li>
                                </ul>
                            </div>

                        @endif
                    @endif


                    @if (isset($eligibility) && !empty($eligibility))
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
                                                                $ElegibilitySTATUS = json_decode(
                                                                    $record->data_value,
                                                                    true,
                                                                );
                                                                // echo "<pre>";
                                                                //     print_r($ElegibilitySTATUS);
                                                                //     die;
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
                                                                !isset($ElegibilitySTATUS['OTHERS']) ||
                                                                    !isset($ElegibilitySTATUS['TE']) ||
                                                                    !isset($ElegibilitySTATUS['PTTA']) ||
                                                                    !isset($ElegibilitySTATUS['TTA']))
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


                    @if (isset($list) && !empty($list))
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


                    @if (isset($supportiveTreatment) && !empty($supportiveTreatment))
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


                    @if (isset($listOfPrescribed) && !empty($listOfPrescribed))
                        <div class="PrescribedMedication_section">
                            <div class="section_title">
                                <h2>Prescribed Medication</h2>
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

                    @if (isset($planRecommendation) && !empty($planRecommendation))
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


                </div>


                <div class="footer_section">
                    <div class="MainBox">
                        <div class="leftSide">
                            <div class="footerogo">
                                <img src="{{ asset('public/assets/report-genrate/img/dsgd.png') }}" alt="">
                            </div>
                            <div class="footerContact">
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <iconify-icon icon="mdi:location"></iconify-icon>
                                        </div>
                                        <div class="dtBox">
                                            <p>Address: 18 November street <br> @Azaiba Muscat, Oman</p>
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
    <script src="{{ asset('public/assets/report-genrate/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/report-genrate/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('public/assets/report-genrate/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('public/assets/report-genrate/js/main.js') }}"></script>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js')}}"></script>
</body>

</html>

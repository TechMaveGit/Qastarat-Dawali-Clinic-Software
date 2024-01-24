@extends('front.layout.main_view')
@push('title')
Service | QASTARAT & DAWALI CLINICS 
@endpush
@section('content-section')


<div class="sub_bnr" style="background-image: url({{ url('assets') }}/images/hero-15.jpg);">
<div class="sub_bnr_cnt">
        <h1 class=""> PAE <span class="blue_theme"> Eligibility</span> Form</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Patient Details</li>
            </ol>
        </nav>
        <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-toggle="modal" data-bs-target="#add_patient">+ Add New Patient </a> -->
    </div>

</div>

<div class="eligiblity-form">
   
    <div class="container">
        <div class="form_inner_dt">
            <form action="#">

            
          <h3 class="form_title">Prostate Artery Embolization <span>Eligibility</span></h3>
        
          <div class="form_data">
          <h6 class="section_title__">Clinical</h6>
          <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Diagnosis - General</h4>
                            </div>
                        </div>
                                       
                        <div class="col-lg-4">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight1">
                                <label class="form-check-label" for="formRadiosRight1">
                                BPH 
                                </label>
                            </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight2">
                            <label class="form-check-label" for="formRadiosRight2">
                            BOO
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight3">
                            <label class="form-check-label" for="formRadiosRight3">
                            Prostaitis
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight4">
                            <label class="form-check-label" for="formRadiosRight4">
                            Cystitis
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight5">
                            <label class="form-check-label" for="formRadiosRight5">
                            OAB Bladder
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight6">
                            <label class="form-check-label" for="formRadiosRight6">
                            Acute Urinary Retention
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight7">
                            <label class="form-check-label" for="formRadiosRight7">
                            Postate Carcinoma
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Diagnosis - ICD 10</h4>
                            </div>
                        </div>
                        <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight8">
                            <label class="form-check-label" for="formRadiosRight8">
                            D29.1 Benign neoplasm: Prostate
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight9">
                            <label class="form-check-label" for="formRadiosRight9">
                            N40 Hyperplasia of Prostate
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight10">
                            <label class="form-check-label" for="formRadiosRight10">
                            N41.0 Acute Prostatitis
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight11">
                            <label class="form-check-label" for="formRadiosRight11">
                            N41.1 Chronic Prostatitis
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight12">
                            <label class="form-check-label" for="formRadiosRight12">
                            N41.2 Abscess of Prostate
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-4">
                         <div class="form-check form-check-right mb-3">
                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight13">
                            <label class="form-check-label" for="formRadiosRight13">
                            C61 Malignant neoplasm of prostate
                            </label>
                        </div>
                     </div>
                     <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Lowwer Urinary Tract symptoms score  (IPSS)</h4>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th colspan="5" class="top_header_frm_tb">Calculate LUTS Score (IPSS)</th>
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
                                    <td>Frequency</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight14">
                                            <label class="form-check-label" for="formRadiosRight14">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight15">
                                            <label class="form-check-label" for="formRadiosRight15">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight16">
                                            <label class="form-check-label" for="formRadiosRight16">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight17">
                                            <label class="form-check-label" for="formRadiosRight17">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Urgency</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight18">
                                            <label class="form-check-label" for="formRadiosRight18">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight19">
                                            <label class="form-check-label" for="formRadiosRight19">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight20">
                                            <label class="form-check-label" for="formRadiosRight20">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight21">
                                            <label class="form-check-label" for="formRadiosRight21">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Intermittency</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight22">
                                            <label class="form-check-label" for="formRadiosRight22">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight23">
                                            <label class="form-check-label" for="formRadiosRight23">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight24">
                                            <label class="form-check-label" for="formRadiosRight24">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight25">
                                            <label class="form-check-label" for="formRadiosRight25">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Straining</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight26">
                                            <label class="form-check-label" for="formRadiosRight26">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight27">
                                            <label class="form-check-label" for="formRadiosRight27">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight28">
                                            <label class="form-check-label" for="formRadiosRight28">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight29">
                                            <label class="form-check-label" for="formRadiosRight29">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Weak Stream</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight30">
                                            <label class="form-check-label" for="formRadiosRight30">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight31">
                                            <label class="form-check-label" for="formRadiosRight31">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight32">
                                            <label class="form-check-label" for="formRadiosRight32">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight33">
                                            <label class="form-check-label" for="formRadiosRight33">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Incomplete emptying</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight34">
                                            <label class="form-check-label" for="formRadiosRight34">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight35">
                                            <label class="form-check-label" for="formRadiosRight35">
                                            1 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight36">
                                            <label class="form-check-label" for="formRadiosRight36">
                                            3 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight37">
                                            <label class="form-check-label" for="formRadiosRight37">
                                           5 pts 
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>

                                    <tr>
                                    <td>Nocturia</td>
                                    <td>
                                        <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight38">
                                            <label class="form-check-label" for="formRadiosRight38">
                                            0 pts 
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight39">
                                            <label class="form-check-label" for="formRadiosRight39">
                                            1 pts ( 1 time)
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight40">
                                            <label class="form-check-label" for="formRadiosRight40">
                                            3 pts  (3 times)
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-check form-check-right">
                                            <input class="form-check-input" type="checkbox" name="formRadiosRight" id="formRadiosRight41">
                                            <label class="form-check-label" for="formRadiosRight41">
                                            5 pts (5 times)
                                            </label>
                                        </div>
                                    </td>
                                    
                                    </tr>
                                    <tr>
                                        <td colspan="3" rowspan="3"></td>
                                        <th>Mild LUTS </th>
                                        <th>(0-7 pts)</th>
                                    </tr>
                                    <tr>
                                     
                                        <th>Moderate LUTS </th>
                                        <th>(8-19 pts) (PAE FAVERABLE)</th>
                                    </tr>
                                    <tr>
                                      
                                        <th>Severe LUTS  </th>
                                        <th>(20-35 pts) (PAE FAVERABLE)</th>
                                    </tr>
                                </tbody>
                              </table>
                        </div>

                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Other clinical indicators</h4>
                            </div>
                        </div>
             

                        <div class="col-lg-12">
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">LUTS Meds</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="formRadiosRight16" id="formRadiosRight42">
                                        <label class="form-check-label" for="formRadiosRight42">
                                        Mono-therapy
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="formRadiosRight16" id="formRadiosRight43">
                                        <label class="form-check-label" for="formRadiosRight43">
                                        Combo-therapy
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Erectile Dysfunction (ED)</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="formRadiosRight15" id="formRadiosRight44">
                                        <label class="form-check-label" for="formRadiosRight44">
                                       Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="formRadiosRight15" id="formRadiosRight45">
                                        <label class="form-check-label" for="formRadiosRight45">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Detrusor Failure  (indwelling / permanent catheter)</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight14" id="formRadiosRight46">
                                        <label class="form-check-label" for="formRadiosRight46">
                                        YES (PAE FAVERABLE)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight14" id="formRadiosRight47">
                                        <label class="form-check-label" for="formRadiosRight47">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="section_title__">Imaging</h6>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>USGENERAL70</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">Prostate Parameters</h6>
                        </div>
                        <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight48">
                                        <label class="form-check-label" for="formRadiosRight48">
                                          Total Prostate Volume (TPV) TPV < 40 cc (PAE unfaverable)
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight49">
                                        <label class="form-check-label" for="formRadiosRight49">
                                        PSA:TPV Ratio (PSA density)>0.15 ng/ml/cc (PAE unfaverable)
                                        </label>
                                    </div>
                                </div> <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight50">
                                        <label class="form-check-label" for="formRadiosRight50">
                                        TPV > 40 cc (PAE FAVERABLE)
                                        </label>
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight51">
                                        <label class="form-check-label" for="formRadiosRight51">
                                        0.15 ng/ml/cc 
                                        </label>
                                    </div>
                                </div> 
                                
                                <div class="col-lg-12">
                            <div class="title_head">
                                <h4>MRCIR36</h4>
                            </div>
                        </div>  
                        <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">Calculate PI-RARDS </h6>
                        </div>  
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight52">
                                <label class="form-check-label" for="formRadiosRight52">
                                Pi-RADS PZ PI-RADS IV-V (PAE contraindicated)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight53">
                                <label class="form-check-label" for="formRadiosRight53">
                                PI-RADS I-III 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight54">
                                <label class="form-check-label" for="formRadiosRight54">
                                Pi-RADS TZ PI-RADS IV-V (PAE contraindicated)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight55">
                                <label class="form-check-label" for="formRadiosRight55">
                                PI-RADS I-III 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight56">
                                <label class="form-check-label" for="formRadiosRight56">
                                Total Prostate Volume (TPV) TPV < 40 cc (PAE unfaverable)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight57">
                                <label class="form-check-label" for="formRadiosRight57">
                                TPV > 40 cc (PAE FAVERABLE)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight58">
                                <label class="form-check-label" for="formRadiosRight58">
                                PSA:TPV Ratio (PSA density)>0.15 ng/ml/cc (PAE unfaverable)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight59">
                                <label class="form-check-label" for="formRadiosRight59">
                                &#60;0.15 ng/ml/cc 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">Size (cm)/voulme (cm3) - right & left nodules</h6>
                        </div> 
                        <div class="col-lg-12">
                            <!-- <div class="nodule_img">
                                <img src="images/new-images/nodules.png" alt="">
                            </div> -->
                            <div id="image-container">
                              <img src="{{ url('assets') }}/images/new-images/nodules.png" alt="Your Image" id="image">
                            </div>
                            <div class="button_images">
                                <button class="btn r-04 btn--theme hover--tra-black add_patient" id="draw-mode" type="button">Draw</button>
                                <button class="btn r-04 btn--theme hover--tra-black add_patient" id="annotate-mode" type="button">Annotate</button>
                                <button class="btn r-04 btn--theme hover--tra-black add_patient" id="download-image" type="button">Download</button>
                            </div>
                            </div>
                        <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">BPH type</h6>
                        </div> 
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input" type="radio" name="formRadiosRight13" id="formRadiosRight60">
                                <label class="form-check-label" for="formRadiosRight60">
                                AdBPH (PAE FAVERABLE)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input" type="radio" name="formRadiosRight13" id="formRadiosRight61">
                                <label class="form-check-label" for="formRadiosRight61">
                                NON-AdBPH 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">3rd lobe</h6>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input" type="radio" name="formRadiosRight12" id="formRadiosRight62">
                                <label class="form-check-label" for="formRadiosRight62">
                                YES (PAE unfaverable)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input" type="radio" name="formRadiosRight12" id="formRadiosRight63">
                                <label class="form-check-label" for="formRadiosRight63">
                                NO 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">Prostitis / Prostate Abscess</h6>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3" id="pae_yes">
                                <input class="form-check-input" type="radio" name="formRadiosRight11" id="formRadiosRight64">
                                <label class="form-check-label" for="formRadiosRight64">
                                YES (PAE contraindicated)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3" id="pae_no">
                                <input class="form-check-input" type="radio" name="formRadiosRight11" id="formRadiosRight65">
                                <label class="form-check-label" for="formRadiosRight65">
                                NO 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12" id="text_pae">
                         <div class="mb-3 form-group">
                            <label for="validationCustom01" class="form-label">Enter Elaborate / notes here***</label>
							<textarea class="form-control" placeholder=""  style="height: 100px"></textarea>
                        </div>
                     </div>
                     <div class="col-lg-12">
                            <div class="title_head">
                                <h4>CTCIR36</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">CT -  Prostate Protocol- Findings </h6>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight66">
                                <label class="form-check-label" for="formRadiosRight66">
                                Total Prostate Volume (TPV)TPV < 40 cc (PAE unfaverable)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight67">
                                <label class="form-check-label" for="formRadiosRight67">
                                TPV > 40 cc (PAE FAVERABLE)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight68">
                                <label class="form-check-label" for="formRadiosRight68">
                                PSA:TPV Ratio (PSA density)>0.15 ng/ml/cc (PAE unfaverable)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="checkbox" name="formRadiosRight" id="formRadiosRight69">
                                <label class="form-check-label" for="formRadiosRight69">
                                &#60;0.15 ng/ml/cc 
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>USBIOPSYPROSTETE690 &#62; <span class="sub_tt__">US - Prostate tru-cut biopsy Results</span></h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Prostate Hyperplasia</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight10" id="formRadiosRight70">
                                        <label class="form-check-label" for="formRadiosRight70">
                                        YES 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight10" id="formRadiosRight71">
                                        <label class="form-check-label" for="formRadiosRight71">
                                        NO 
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Prostate AdenoCarcinoma</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight9" id="formRadiosRight72">
                                        <label class="form-check-label" for="formRadiosRight72">
                                        YES (PAE contraindicated)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight9" id="formRadiosRight73">
                                        <label class="form-check-label" for="formRadiosRight73">
                                        No
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Image Annotation</h4>
                            </div>
                        </div> -->
                    
                        <!-- <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">Annotate Prostate findings</h6>
                        </div> -->



                        <div class="col-lg-12">
                          <h6 class="section_title__">Lab</h6>
                        </div>
                          <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABPSA24</h4>
                            </div>
                          </div>
                          <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">PSA</h6>
                        </div>
                     
                          
                                    <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight8" id="formRadiosRight74">
                                        <label class="form-check-label" for="formRadiosRight74">
                                        PSA > 4 gm/dl OR PSA > 4 ng/ml (PAE unfaverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight8" id="formRadiosRight75">
                                        <label class="form-check-label" for="formRadiosRight75">
                                        PSA &#60;4 gm/dl    OR    PSA &#60;4 ng/ml
                                        </label>
                                    </div>
                                </div>
                         
                            <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABRFT12</h4>
                            </div>
                          </div>
                          <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">Renal Function test (Creatinine | Na | K | urea) Results</h6>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="formRadiosRight7" id="formRadiosRight88">
                                <label class="form-check-label" for="formRadiosRight88">
                                Abnormal Renal profile (PAE contraindicated)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="formRadiosRight7" id="formRadiosRight89">
                                <label class="form-check-label" for="formRadiosRight89">
                                Normal Renal profile
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABUA29</h4>
                            </div>
                          </div>
                          <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">Urinalysis (Blood | Protein | WBC) Results</h6>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="formRadiosRight6" id="formRadiosRight76">
                                <label class="form-check-label" for="formRadiosRight76">
                                Abnormal Urinanalysis (PAE unfaverable)
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-check form-check-right mb-3">
                                <input class="form-check-input"type="radio" name="formRadiosRight6" id="formRadiosRight77">
                                <label class="form-check-label" for="formRadiosRight77">
                                Normal Urinanalysis
                                </label>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABUROFLO82 &#62; <span class="sub_tt__">Uroflowmetery tests Results</span></h4>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Q-Max </h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="formRadiosRight5" id="formRadiosRight78">
                                        <label class="form-check-label" for="formRadiosRight78">
                                        >10ml/s (PAE unfaverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="formRadiosRight5" id="formRadiosRight79">
                                        <label class="form-check-label" for="formRadiosRight79">
                                        &#60;10ml/s (BOO) (PAE FAVERABLE)
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">Post-Residual Volume (PVR)</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="formRadiosRight4" id="formRadiosRight80">
                                        <label class="form-check-label" for="formRadiosRight80">
                                        < 200cc (PAE unfaverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="formRadiosRight4" id="formRadiosRight81">
                                        <label class="form-check-label" for="formRadiosRight81">
                                        > 200cc (BOO) (PAE FAVERABLE)
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABUROFLOINVASIVE752 &#62; <span class="sub_tt__">Filling-Voiding phase testing Results</span></h4>
                            </div>
                        </div>

                        <div class="col-lg-12">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                    <h6 class="mb-3 lut_title">* 40Yr+ | TPV 40cc+ | Qmax 15ml/s+ | LUTS+++| PVR300ml+ | IDDM | or  Neuro deficits</h6>
                                </div>
                                    <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input"type="radio" name="formRadiosRight3" id="formRadiosRight82">
                                        <label class="form-check-label" for="formRadiosRight82">
                                        Normal results (PAE unfaverable)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight3" id="formRadiosRight83">
                                        <label class="form-check-label" for="formRadiosRight83">
                                        Abnormal results
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="section_title__">MTD</h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>MDTREFFERAL30 &#62; <span class="sub_tt__">Prostate MDT oucome</span></h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">MDT decision</h6>
                        </div>
                        <div class="col-lg-12">
                        <div class="row align-items-center">
                     
                                    <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3 text_area_hide">
                                        <input class="form-check-input" type="radio" name="formRadiosRight" id="formRadiosRight84">
                                        <label class="form-check-label" for="formRadiosRight84">
                                         PAE 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3 text_area_hide">
                                        <input class="form-check-input" type="radio" name="formRadiosRight" id="formRadiosRight85">
                                        <label class="form-check-label" for="formRadiosRight85">
                                        Medical
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3 text_area_hide">
                                        <input class="form-check-input" type="radio" name="formRadiosRight" id="formRadiosRight86">
                                        <label class="form-check-label" for="formRadiosRight86">
                                        Surgical
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3 text_area_show">
                                        <input class="form-check-input" type="radio" name="formRadiosRight" id="formRadiosRight87">
                                        <label class="form-check-label" for="formRadiosRight87">
                                        Other options
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="text_area">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate / notes here***"  style="height: 100px"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                          <h6 class="section_title__">Elegibility STATUS</h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>Choose Eligible treatment option</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="row align-items-center">
                     
                                    <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3 hide_eligibility_textarea">
                                        <input class="form-check-input" type="radio" name="formRadiosRight17" id="formRadiosRight90">
                                        <label class="form-check-label" for="formRadiosRight90">
                                        THYROID THERMAL ABLATION  (TTA)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3 hide_eligibility_textarea">
                                        <input class="form-check-input" type="radio" name="formRadiosRight17" id="formRadiosRight91">
                                        <label class="form-check-label" for="formRadiosRight91">
                                        PARATHYROID THERMAL ABLATION  PTTA 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3 hide_eligibility_textarea">
                                        <input class="form-check-input" type="radio" name="formRadiosRight17" id="formRadiosRight92">
                                        <label class="form-check-label" for="formRadiosRight92">
                                        THYROID EMBOLIZATION  TE 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3" id="eligibility_other">
                                        <input class="form-check-input" type="radio" name="formRadiosRight17" id="formRadiosRight93">
                                        <label class="form-check-label" for="formRadiosRight93">
                                        OTHERS
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="eligibility_text_area">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate / notes here***"  style="height: 100px"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="section_title__">Action plan</h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>ANGIOPAE2910</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABPREANGIO48</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>LABPREIRSAFETY17</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>IVSEDATION270</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>CTCIR48</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">CTA -  Prostatic artery origin type -RIGHT </h6>
                        </div>
                        <div class="col-lg-12">
                        <div class="row align-items-center">
                     
                                    <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight18" id="formRadiosRight94">
                                        <label class="form-check-label" for="formRadiosRight94">
                                          Type I  (28%)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight18" id="formRadiosRight95">
                                        <label class="form-check-label" for="formRadiosRight95">
                                        Type II (14%)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight18" id="formRadiosRight96">
                                        <label class="form-check-label" for="formRadiosRight96">
                                        Type III (18%)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight18" id="formRadiosRight97">
                                        <label class="form-check-label" for="formRadiosRight97">
                                        Type IV (31%)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight18" id="formRadiosRight98">
                                        <label class="form-check-label" for="formRadiosRight98">
                                        Type V (5%)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="mb-3 lut_title">CTA -  Prostatic artery origin type -LEFT </h6>
                        </div>
                        <div class="col-lg-12">
                        <div class="row align-items-center">
                     
                                    <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight19" id="formRadiosRight99">
                                        <label class="form-check-label" for="formRadiosRight99">
                                          Type I  (28%)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight19" id="formRadiosRight_a1">
                                        <label class="form-check-label" for="formRadiosRight_a1">
                                        Type II (14%)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight19" id="formRadiosRight_a2">
                                        <label class="form-check-label" for="formRadiosRight_a2">
                                        Type III (18%)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight19" id="formRadiosRight_a3">
                                        <label class="form-check-label" for="formRadiosRight_a3">
                                        Type IV (31%)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight19" id="formRadiosRight_a4">
                                        <label class="form-check-label" for="formRadiosRight_a4">
                                        Type V (5%)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>PROZ290</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                          <h6 class="section_title__">Supportive</h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="title_head">
                                <h4>HCREFFERAL</h4>
                            </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="row align-items-center">
                     
                                    <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3" id="Nephrology_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight20" id="formRadiosRight_a5">
                                        <label class="form-check-label" for="formRadiosRight_a5">
                                          Nephrology
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-check form-check-right mb-3" id="PevicRehab_checkbox">
                                        <input class="form-check-input" type="radio" name="formRadiosRight20" id="formRadiosRight_a6">
                                        <label class="form-check-label" for="formRadiosRight_a6">
                                         Pevic Rehab/PhysioTherapy
                                        </label>
                                    </div>
                                </div>
                           
                                <div class="col-lg-12" id="Nephrology_textarea">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate / notes here***"  style="height: 100px"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="PevicRehab_textarea">
                                    <div class="form-check form-check-right mb-3">
                                      <textarea class="form-control" placeholder="Enter Elaborate / notes here***"  style="height: 100px"></textarea>
                                    </div>
                                </div>
                          
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
            
          <div class="action_btns">
            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient draft_btn">SAVE DRAFT</a>
            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient">SAVE FINAL</a>
          </div>
          </form>
        </div>
    </div>
</div>






<script src="https://cdnjs.cloudflare.com/ajax/libs/konva/8.1.1/konva.min.js"></script>

<script>
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
        imageObj.src = '{{ url("assets") }}/images/new-images/nodules.png';

        imageObj.onload = function () {
            const image = new Konva.Image({
                image: imageObj,
                width: 500,
                height: 600,
            });

            layer.add(image);
            stage.draw();
        };

        stage.on('mousedown touchstart', function (e) {
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
                            fontStyle:'bold',
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

        stage.on('mousemove touchmove', function () {
            if (!isDrawing) {
                return;
            }

            const pos = stage.getPointerPosition();
            const newPoints = lastLine.points().concat([pos.x, pos.y]);
            lastLine.points(newPoints);
            layer.batchDraw();
        });

        stage.on('mouseup touchend', function () {
            isDrawing = false;
            lastLine = null;
        });

        document.getElementById('draw-mode').addEventListener('click', function () {
            annotationMode = false;
        });

        document.getElementById('annotate-mode').addEventListener('click', function () {
            annotationMode = true;
        });

        document.getElementById('download-image').addEventListener('click', function () {
            const dataURL = stage.toDataURL({ mimeType: 'image/png' });
            const link = document.createElement('a');
            link.href = dataURL;
            link.download = 'drawn-image.png';
            link.click();
        });
    </script>
@endsection
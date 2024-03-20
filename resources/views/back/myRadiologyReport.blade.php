@extends('back.layout.main_view')

@push('title')

Order Medical report  | QASTARAT & DAWALI CLINICS 

@endpush

@section('content-section')

@push('custom-css')

	{{-- add here --}}

@endpush
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.css">
<div class="sub_bnr_img" style="background-image: url({{ asset('assets/public/images/hero-15.jpg') }});">
    <div class="sub_bnr ">
        <h1 class="dashboard_title">My <span class="blue_theme">Radiology Report</span> </h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order Medical Report</li>
         </ol>
      </nav>
        <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black">Set Out Office </a> -->
    </div>
</div>

<div class="db_main db_report">
    <div class="container">
        
        <div class="row">
           
            <div class="col-lg-12">
            <div class="service-content-inner reports_section">
										<div class="service-content-wrapper">
                                            <div class="wrapper_box">
                                            <h4 class="iq-title iq-heading-title">Download/Share My Radiology imaging report</h4>
                                                <!-- <p class="iq-service-desc">Online Consultation is designed to Fast Track your Access to our services if you don’t want to wait</p> -->
                                                <ul>
                                                    <li>Any report without images ----  <span>0  OMR (FREE)</span></li>
                                                    <li>Ultrasound report with images ---- <span> 5  OMR (chargeable service) </span></li>
                                                    <!-- <li>Non-Urgent Medical Report issued within 15-21  business days ----  <span>10  OMR</span></li> -->
                                                </ul>
                                                <p class="iq-service-desc mb-3">All Reports are Free (except ultrasound reports with images)</p>
                                                <h6>Radiology Exam  Download/share Report</h6>
                                                <ul>
                                                    <li>Ultrasound</li>
                                                    <li>Ultrasound with images</li>
                                                    <li>MRI</li>
                                                    <li>CT</li>
                                                </ul>
                                                <h6 class="pay_title">You may also pay in your local currency at check out</h6>
                                                <p class="para_consul">Steps to  get your Radiology reports:</p>
                                                <ol class="payment_list">
                                                    <li>Obtain a log in via our call center (FREE) and download your report from the list
</li>
                                                    <li>Log in and Pay  if you need ultrasound images incorporated in reports</li>
                                                    <li>Choose your in-clinic consultation date / time  from available slots</li>
                                                    <li>Receive confirmation via your registered WhatsApp and/or your registered email</li>
                                                </ol>
                                            </div>
										
									
                                            <div class="imgages_">
                                                <img src="{{ asset('assets/public/images/new-images/Picture6.png') }}" alt="">
                                            </div>
										</div> 
                                      
									</div>
                                
            </div>

            
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="report_title  card-header">
                        <h6>My Radiology Report</h6>
                    </div>
                    <div class="card-body">
                    <div class="datatable-container allinvoice_table custom_table_area ">
                                            <table id="allinvoice_table" class="display">
                                              <thead>
                                                  <tr>
                                                      <th>Test Name</th>
                                                      <th>Duration</th>
                                                      <th>Status</th>
                                                      <th>Action</th>
                                                  
                                                  </tr>
                                              </thead>
                                                <tbody>
                                                <tr>
                                                    <td>CT- Scan</td>
                                                    <td>2 week</td>
                                                    <td><button class="confirmed-badge">Complete</button></td>
                                                    <td>
                                                        <a href="images/new-images/dummy.pdf" download="" class="download_rp_btn"><i class="fa-solid fa-file-arrow-down"></i> Download Report</a>
                                                    </td>
                                              
                                                    
                                                </tr>
                                                <tr>
                                                    <td>Ultrasound</td>
                                                    <td>1 day</td>
                                                    <td><button class="pending-badge">Pending</button></td>
                                                    <td>
                                                        
                                                    </td>
                                              
                                                    
                                                </tr>
                                                <tr>
                                                    <td>MRI</td>
                                                    <td>1 day</td>
                                                    <td><button class="pending-badge">Pending</button></td>
                                                    <td>
                                                        
                                                    </td>
                                              
                                                    
                                                </tr>
                                             </tbody>
                                              </table>
                                                  </div>
                    </div>
                </div>
           
            </div>
        </div>
       
    </div>
</div>
@push('custom-js')

<script>
    $('#allinvoice_table').DataTable({ 
       scrollX: true,
       "pagingType": "simple_numbers",
       "language": {
          "paginate": {
             "previous": '<iconify-icon icon="radix-icons:double-arrow-left"></iconify-icon>',
             "next": '<iconify-icon icon="radix-icons:double-arrow-right"></iconify-icon>'
          }
       }
    });
 </script>
@endpush



@endsection
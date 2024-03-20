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
        <h1 class="dashboard_title">My <span class="blue_theme">Lab Results</span> </h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Lab Results</li>
         </ol>
      </nav>
        <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black">Set Out Office </a> -->
    </div>
</div>

<div class="db_main db_report">
    <div class="container">
        
        <div class="row">
     
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="report_title  card-header">
                        <h6>My Lab Results</h6>
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
                                                        <a href="{{ asset('assets/public/images/new-images/dummy.pdf') }}" download="" class="download_rp_btn"><i class="fa-solid fa-file-arrow-down"></i> Download Report</a>
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
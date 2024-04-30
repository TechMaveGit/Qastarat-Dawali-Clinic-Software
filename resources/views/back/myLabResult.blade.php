@extends('back.layout.main_view')

@push('title')

Order Medical report  | QASTARAT & DAWALI CLINICS 

@endpush

@section('content-section')

@push('custom-css')

	{{-- add here --}}

@endpush
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.css">
<!-- <div class="sub_bnr_img" style="background-image: url(images/hero-15.jpg);">
    <div class="sub_bnr ">
        <h1 class="dashboard_title">Order  <span class="blue_theme">Medical Report</span> </h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index-2.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order Medical Report</li>
         </ol>
      </nav>
      
    </div>
</div> -->
<div class="db_main db_report">
    <div class="container">
        
        <div class="row">
           
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="report_title  card-header">
                        <h6>My Record</h6>
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
                                                <tr class="pain_inv">
                                                    <td>CT- Scan</td>
                                                    <td>2 week</td>
                                                    <td>
                                                    <div class="statusuccess_itgt">
                                                        <div class="activecircle">
                                                            <div class="mini_circlegreen"></div>
                                                        </div>
                                                        Complete
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="images/new-images/dummy.pdf" download="" class="download_rp_btn"><i class="fa-solid fa-file-arrow-down"></i> Download Report</a>
                                                    </td>
                                              
                                                    
                                                </tr>
                                                <tr>
                                                    <td>Ultrasound</td>
                                                    <td>1 day</td>
                                                    <td>
                                                    <div class="statusinactive_itgt">
                                                    <div class="activecircle">
                                                        <div class="mini_circlegreen"></div>
                                                    </div>
                                                   Pending
                                                    </div>
                                                    </td>
                                                    <td>
                                                        
                                                    </td>
                                              
                                                    
                                                </tr>
                                                <tr>
                                                    <td>MRI</td>
                                                    <td>1 day</td>
                                                    <td>
                                                    <div class="statusinactive_itgt">
                                                    <div class="activecircle">
                                                        <div class="mini_circlegreen"></div>
                                                    </div>
                                                    Pending
                                                    </div>
                                                    </td>
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
 <script>
    $('#allinvoice_table1').DataTable({ 
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
 <script>
    $('#allinvoice_table2').DataTable({ 
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
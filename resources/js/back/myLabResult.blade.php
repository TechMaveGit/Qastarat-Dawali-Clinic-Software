@extends('front.layout.main_view')

@push('title')
    Home | QASTARAT & DAWALI CLINICS
@endpush

@section('content-section')

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
                                                      <th>Status</th>
                                                      <th>Order Date</th>
                                                      <th>Action</th>
                                                  
                                                  </tr>
                                              </thead>
                                                <tbody>

                                                    @forelse ($totalTask as $alltotalTask)

                                                    @php
                                                       $testName= DB::table('pathology_price_list')->where('id',$alltotalTask->task)->first();
                                                    @endphp

                                                     <tr class="pain_inv">
                                                        <td>{{  $testName->test_name}}</td>
                                                        
                                                        <td>
                                                          <div class="statusuccess_itgt">
                                                            <div class="activecircle">
                                                                <div class="mini_circlegreen"></div>
                                                            </div>
                                                             @if ($alltotalTask->approveDocumentSts == '1')
                                                               <button 
                                                                    class="pending-badge">Complete
                                                                    </button>
                                                            @else
                                                            <button 
                                                            class="pending-badge dns">Pending
                                                            </button>
                                                            @endif
                                                            
                                                        
                                                            </div>
                                                        </td>
                                                        
                                                         <td>
                                                            {{ \Carbon\Carbon::parse($alltotalTask->created_at)->format('D, d M Y') }}
                                                         </td>
                                                    
                                                                @if ($alltotalTask->labDocument)
                                                                    @if ($alltotalTask->approveDocumentSts=='1')
                                                                    <td>
                                                                        <a href="{{ env('Document_Url') }}{{ $alltotalTask->labDocument }}"
                                                                            download="{{ env('Document_Url') }}{{ $alltotalTask->labDocument }}"
                                                                            class="download_rp_btn">
                                                                            <i
                                                                                class="fa-solid fa-file-arrow-down"></i>
                                                                            Download Report
                                                                        </a>
                                                                    </td>
                                                                    @endif
                                                                @else 
                                                                    
                                                                    <td>
                                                                        <a
                                                                            class="download_rp_btn"
                                                                            style="color: #f30728;">
                                                                            <i class="fa-solid fa-file-arrow-down"
                                                                                style="color: #db0808; border: 1px solid #e90a0a;"></i>
                                                                            Report Not Uploded
                                                                        </a>
                                                                    </td>
                                                                @endif
                                                    </tr>
                                                        
                                                    @empty
                                                        
                                                    @endforelse
                                                
                                              
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
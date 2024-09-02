@extends('back.layout.main_view')

@push('title')
Invoice | QASTARAT & DAWALI CLINICS 
@endpush

@section('content-section')




<link rel="stylesheet" href="{{ asset('/assets/invoiceassets/css/style.css')}}">


<div class="main_invoicing" id="printContent">
  <div class="tm_container" id="invoice-container">  
      <div class="tm_invoice_wrap">
        <div class="tm_invoice tm_style1" id="tm_download_section">
        <svg class="top_shape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#19276d" fill-opacity="1" d="M0,192L60,170.7C120,149,240,107,360,80C480,53,600,43,720,69.3C840,96,960,160,1080,154.7C1200,149,1320,75,1380,37.3L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
        <svg class="top_shape2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#19276d99" fill-opacity="1" d="M0,192L60,170.7C120,149,240,107,360,80C480,53,600,43,720,69.3C840,96,960,160,1080,154.7C1200,149,1320,75,1380,37.3L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
        <svg class="top_shape3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#19276d47" fill-opacity="1" d="M0,192L60,170.7C120,149,240,107,360,80C480,53,600,43,720,69.3C840,96,960,160,1080,154.7C1200,149,1320,75,1380,37.3L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
          <div class="tm_invoice_in">
            <div class="tm_invoice_head tm_align_center tm_mb20">  
              <div class="tm_invoice_left">    
                <div class="tm_logo"><img src="{{ asset('/assets/video/657131764.png')}}" alt="Logo"></div>   
              </div>


              <div class="contact_info">
                <div class="contact1">
                  <h6>Phone</h6>
                  <p>+968 9200 0230</p>
                  <p>+971 5 81114000</p>
                </div>
                <div class="contact1">
                  <h6>Web</h6>
                  <p><a href="https://qastaratclinics.com">https://qastaratclinics.com</a></p>
                  
                </div>
                <div class="contact1">
                  <h6>Address</h6>
                  <p>PO Box 64 Azaiba, Postal code: 130 Muscat, Oman</p>
                  
                </div>
               
              </div>


            </div>
            <div class="tm_invoice_info tm_mb20 top_head_fgu">
           
              <div class="tm_invoice_info_list">
                <p class="tm_invoice_number tm_m0">Invoice No: <b class="tm_primary_color">{{ $printData->invoice_no }}</b></p>

                @php
                $date = new DateTime($printData->updated_at);
                $formattedDate = $date->format("D d F, Y");
                @endphp

                <p class="tm_invoice_date tm_m0">Date: <b class="tm_primary_color">{{ $formattedDate }}</b></p>
              </div>
               <div class="tm_invoice_right tm_text_right">
                <div class="tm_primary_color tm_f50 tm_text_uppercase ">Invoice</div>
              </div>
            </div>

            @php
              $patientName = DB::table('users')->whereId($printData->patient_id)->first();
            @endphp
            <div class="tm_invoice_head tm_mb10 ">
              <div class="tm_invoice_left">
                <p class="tm_mb2"><b class="tm_primary_color">Invoice To:</b></p>
                <p style="width: 100%;">

                  {{ $patientName->street}} , {{ $patientName->town}} ,  {{ $patientName->country}} 

                </p>
                <p> {{ $patientName->email }}</p>
              </div>
              <div class="tm_invoice_right tm_text_right">
                <p class="tm_mb2"><b class="tm_primary_color">Customer Name:</b></p>
                <p>
                {{ $patientName->name }} <br>
                 
                </p>
              </div>
            </div>
            <div class="tm_table tm_style1 tm_mb30">
              <div class="tm_round_border">
                <div class="tm_table_responsive">
                  <table>
                    <thead>
                      <tr>
                        <th class="tm_width_3 tm_semi_bold tm_primary_color tm_gray_bg">Date</th>
                        <th class="tm_width_4 tm_semi_bold tm_primary_color tm_gray_bg">Item</th>
                        <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Item No.</th>
                        <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Discount </th>
                        <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">VAT </th>
                        <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg tm_text_right">Cost</th>
                      </tr>
                    </thead>
                    <tbody>

                      @if($printData && $printData->tasks)
                      @foreach($printData->tasks as $value)
                        
                      
                      @php                                                                
                          $pathology_price_list=  DB::table('pathology_price_list')->where('id',$value->task)->first();                                                          
                      @endphp
                      <tr>

                        @php
                        $created = new DateTime($value->created_at);
                        $createdDate = $created->format("D d F, Y");
                        @endphp
                          <td class="tm_width_3">{{ $createdDate }}</td>
                          <td class="tm_width_4">
                          {{ $pathology_price_list->test_name }}
                          </td>   
                          <td class="tm_width_2">{{ $value->invoiceNumber }}</td>
                          <td class="tm_width_1">{{ $value->discount }}%</td>
                          <td class="tm_width_1">{{ $value->vatDiscount }}%</td>
                          <td class="tm_width_2 tm_text_right">{{env('SHOW_CURRENCY')}} {{ $value->finalAmount }} </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tm_invoice_footer">
                <div class="tm_left_footer">
                  <p class="tm_mb2"><b class="tm_primary_color"></b></p>
                  <p class="tm_m0"></p>
                </div>
                <div class="tm_right_footer">
                  <table>
                    <tbody>
                      <!-- <tr>
                        <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Subtoal</td>
                        <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_bold">$1650</td>
                      </tr>
                      <tr>
                        <td class="tm_width_3 tm_primary_color tm_border_none tm_pt0">Tax <span class="tm_ternary_color">(5%)</span></td>
                        <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_pt0">+$82</td>
                      </tr> -->
                      <!-- <tr class="tm_border_top tm_border_bottom">
                        <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color">% VAT	</td>
                        <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right">00</td>
                      </tr> -->
                      <tr class="tm_border_top tm_border_bottom">
                        <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color">Grand Total	</td>
                        <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right">{{env('SHOW_CURRENCY')}} {{ $printData->finalAmount }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tm_padd_15_20 tm_round_border">
              <p class="tm_mb5"><b class="tm_primary_color">Payment instructions:</b></p>
              <ul class="tm_m0 tm_note_list">
                <li>BACS Payment to  account number , sort code , quoting SAENF8YY</li>
                <li>By Cheque, made out to salzaabi@healthconnect.om quoting SAENF8YY or detach and enclose the slip below. </li>
              </ul>
            </div><!-- .tm_note -->

            <br>
  
          
           
            <div class="tm_invoice_head tm_mb10 ">
              <div class="tm_invoice_left">
                <p class="tm_mb2 thankYou"><b class="tm_primary_color">Thank You !</b></p>
                <br>
                {{-- <p><b class="tm_primary_color">Terms :</b> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, consectetur.</p> --}}
            
              </div>
              <div class="tm_invoice_right tm_text_right">
                <p class="tm_mb2"><b class="tm_primary_color">Qastarat & Dawali Clinics</b></p>
                <p>Accounting Manager</p>
                <img src="invoiceassets/img/Jon_Kirsch's_Signature.png" alt="" class="sign_invoice">
              </div>
            </div>
          </div>
        </div>
        <div class="tm_invoice_btns tm_hide_print">
          <a onclick="printDiv('printContent')" class="tm_invoice_btn tm_color1">
            <span class="tm_btn_icon">
              <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
            </span>
            <span class="tm_btn_text">Print</span>
            Print
          </a>
          <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
            <span class="tm_btn_icon">
              <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
            </span>
            <span class="tm_btn_text">Download</span>
            Download
          </button>
        </div>
      </div>
    </div>
  </div>
  

  <script>
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = '<div style="width: 100%;">' + printContents + '</div>';

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>



  <script src="{{ asset('/assets/invoiceassets/js/jquery.min.js')}}"></script>
  <script src="{{ asset('/assets/invoiceassets/js/jspdf.min.js')}}"></script>
  <script src="{{ asset('/assets/invoiceassets/js/html2canvas.min.js')}}"></script>
  <script src="{{ asset('/assets/invoiceassets/js/main.js')}}"></script>

  
@endsection
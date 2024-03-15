@extends('back.layout.main_view')

@push('title')

Dashboard  | QASTARAT & DAWALI CLINICS 

@endpush

@section('content-section')

@push('custom-css')

	{{-- add here --}}

@endpush

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.css">
<div class="sub_bnr_img" style="background-image: url(images/hero-15.jpg);">
    <div class="sub_bnr">
        <h1 class="dashboard_title">Welcome <span class="blue_theme">{{ auth('doctor')->user()->name }}</span> </h1>
        <p class="dashboard_para">Here is your performance on Qastarat Clinic (up to today <span>{{ now()->format('(D, M j, Y)') }}</span> )</p>
        <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black">Set Out Office </a> -->
    </div>
    <div class="flip-container">
  <div class="flipper">
    <div class="front">
      <img src="{{ asset('public/assets/images/new-images/clinic-team1.png') }}" />
    </div>
    <div class="back">
      <img src="{{ asset('public/assets/images/new-images/qastara-logo1.png') }}" />
    </div>
  </div>
</div>
</div>

<div class="db_main">
    <div class="container">
        <div class="row">
            <!-- Widget 1 Start -->
            <div class="col-xxl-3 col-md-6 mb5">
                <a href="#">
                <div class="card shadow-card p5 border-top-one">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <span class="avatar avatar-md p-2 bg-one">
                                <iconify-icon icon="fa6-regular:user" width="20"></iconify-icon>
                            </span>
                        </div>
                        <div class="flex-fill">
                            <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">Consultation</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="fw-semibold mb-0 lh-1 total_count__">100</h5>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
             
            </div>
            <!-- Widget 1 End -->

            <!-- Widget 1 Start -->
            <div class="col-xxl-3 col-md-6 mb5">
                <a href="#">
                <div class="card shadow-card p5 border-top-two">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <span class="avatar avatar-md p-2 bg-two">
                     
                               <iconify-icon icon="material-symbols:lab-research-outline-rounded" width="24"></iconify-icon>
                            </span>
                        </div>
                        <div class="flex-fill">
                            <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">Lab Orders</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="fw-semibold mb-0 lh-1 total_count__">50</h5>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
              
            </div>
            <!-- Widget 1 End -->
               <!-- Widget 1 Start -->
               <div class="col-xxl-3 col-md-6 mb5">
                <a href="#">
                <div class="card shadow-card p5 border-top-three">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <span class="avatar avatar-md p-2 bg-three">

                            <iconify-icon icon="mdi:x-ray-box-outline" width="24"></iconify-icon  >
                            </span>
                        </div>
                        <div class="flex-fill">
                            <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">Imaging Orders</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="fw-semibold mb-0 lh-1 total_count__">200</h5>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
               
            </div>
            <!-- Widget 1 End -->
                       <!-- Widget 1 Start -->
                       <div class="col-xxl-3 col-md-6 mb5">
                        <a href="#">
                        <div class="card shadow-card p5 border-top-four">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <span class="avatar avatar-md p-2 bg-four">
                            <!-- <iconify-icon icon="uil:invoice"></iconify-icon> -->
                            <iconify-icon icon="mdi:note-edit-outline" width="24"></iconify-icon>
                            </span>
                        </div>
                        <div class="flex-fill">
                            <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">Procedures</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="fw-semibold mb-0 lh-1 total_count__">100</h5>
                            </div>
                        </div>
                    </div>
                </div>
                        </a>
           
            </div>
            <!-- Widget 1 End -->
                      <!-- Widget 1 Start -->
                      <!-- <div class="col-xxl-3 col-md-6 mb5 mt-4">
                        <a href="#">
                        <div class="card shadow-card p5 border-top-five">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <span class="avatar avatar-md p-2 bg-five">
                            <iconify-icon icon="el:list-alt" width="24"></iconify-icon>
                            </span>
                        </div>
                        <div class="flex-fill">
                            <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">Appointment / Calling</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="fw-semibold mb-0 lh-1 total_count__">50</h5>
                            </div>
                        </div>
                    </div>
                </div>
                        </a>
            
            </div> -->
            <!-- Widget 1 End -->

        </div>
@if (auth()->guard('doctor')->user()->user_type=='doctor')
    

        <div class="row">
            <div class="col-lg-7">
                <div class="card mt-5">
                <div class="top_title_gp card-header">
                   <h6>Current month invoice analytics</h6>
                 </div>
              
                  <div class="shadow-card">
                
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                            <div id="chart" width="100%"></div>
                            </div>
                            <div class="col-lg-5">
                                <h6 class="graph_title paid_gp">1020 OMR <span>Invoiced during this month (PAID)</span></h6>
                                <h6 class="graph_title pos_gp">794 OMR <span>POS Machine / Online Transfer</span></h6>
                                <h6 class="graph_title cash_gp">226 OMR <span>Cash Payment</span></h6>


                            </div>
                        </div>
                  </div> 
          
                        
                

                   
                </div>
            </div>
            <div class="col-lg-5 mt-5">
                <div class="card">
                <div class="top_title_gp card-header">
                   <h6>Cumulaative Value <span class="color_green">7, 022 OMR</span></h6>
                 </div>
                 <div class="shadow-card">
                  
                  <div id="cumulative"></div>
                 </div>
                </div>
          
            </div>
        </div>
        @endif
    </div>
</div>



@push('custom-js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.16.0/d3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js"></script>
<script>
var chart = c3.generate({
bindto: '#chart',
data: {
  columns: [
    [' (Paid)', 150],  // Replace 150 with the actual number of invoices paid
    ['POS Machine/Online Transfer', 100],  // Replace 100 with the actual number of invoices paid via POS machine/online transfer
    ['Cash Payment', 50]  // Replace 50 with the actual number of invoices paid with cash
  ],
  type: 'donut',
  colors: {
    'Invoice during this months (Paid)': '#1f77b4',
    'POS Machine/Online Transfer': '#ff7f0e',
    'Cash Payment': '#2ca02c'
  }
},
legend: {
  // position: 'right', // Show legend on the left side
  show: false, // Show legend
  inset: {
    space: 10 // Add space between legend items and top/bottom of legend
  }
}
});




</script>

<script>
var data = {
  columns: [
      ['Month', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      ['Value', 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650] // Cumulative values
  ],
  type: 'bar',
  colors: {
      Value: '#2ca02c' // Set the color for the 'Value' series
  }
};

// Initialize C3.js chart
var chart = c3.generate({
  bindto: '#cumulative',
  data: data,
  axis: {
      x: {
          type: 'category',
          tick: {
              format: function (x) { return ''; } // Hide the tick labels
          }
      },
      y: {
          label: {
              text: 'Last 12 months invoice analytics',
              position: 'outer-middle',
              show:false,
          }
      }
  },
  grid: {
      y: {
          show: false
      }
  },
  legend: {
      show: false
  },
  bar: {
      label: {
          show: true,
          position: 'top'
      }
  }
});




  </script>
@endpush

@endsection
@extends('back.layout.main_view')

@push('title')
    Dashboard | QASTARAT & DAWALI CLINICS
@endpush

@section('content-section')
    @push('custom-css')
        {{-- add here --}}
    @endpush


    <style>
        .flipper .front img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.css">
    <div class="sub_bnr_img" style="background-image: url(images/hero-15.jpg);">
        <div class="sub_bnr">
            <h1 class="dashboard_title">Welcome <span class="blue_theme">{{ auth('doctor')->user()->name }}</span> </h1>

            @if (auth()->guard('doctor')->user()->user_type == 'doctor')
                <p class="dashboard_para">Here is your performance on Qastarat Clinic (up to today
                    <span>{{ now()->format('(D, M j, Y)') }}</span> )
                </p>
            @endif

        </div>


        @php
            $today = \Carbon\Carbon::today();
          $referal_patients =  DB::table('referal_patients')->where('doctor_id', auth('doctor')->user()->id)->whereDate('created_at', $today)
          ->first();
        @endphp

            @if ($referal_patients)
            <script>
                Swal.fire({
                    html: 'New referral patient assigned, Please check in patient list.',
                    showConfirmButton: false,
                    showCloseButton: true, // This adds the close (X) button
                    closeButtonHtml: '&times;', // Optional: Customize the close button (e.g., cross icon)
                }).then(() => {
            
                });
            </script>
            @endif





        <div class="flip-container">
            <div class="loader3">
                <div class="loader_img">
                    @php
                        $doctor = auth('doctor')->user();
                        $doctor_profile = '';
                        if ($doctor->role_id == '1') {
                            $doctor_profile = asset('/assets/profileImage/') . '/' . $doctor->patient_profile_img;
                        } elseif ($doctor->role_id == '2') {
                            $doctor_profile =
                                asset('/assets/nurse_profile/') . '/' . $doctor->patient_profile_img;
                        } elseif ($doctor->role_id == '5') {
                            $doctor_profile =
                                asset('/assets/nurse_profile/') . '/' . $doctor->patient_profile_img;
                        } elseif ($doctor->role_id == '6') {
                            $doctor_profile =
                                asset('/assets/nurse_profile/') . '/' . $doctor->patient_profile_img;
                        } elseif ($doctor->role_id == '11') {
                            $doctor_profile =
                                asset('/assets/nurse_profile/') . '/' . $doctor->patient_profile_img;
                        } elseif ($doctor->role_id == '10') {
                            $doctor_profile =
                                asset('/assets/nurse_profile/') . '/' . $doctor->patient_profile_img;
                        }

                    @endphp



                    @isset($doctor->patient_profile_img)
                        <img src="{{ $doctor_profile ?? asset('/assets/images/team-13.jpg') }}" alt="db_img">
                    @else
                        <img src="{{ asset('/assets/images/team-13.jpg') }}" alt="temp_img">
                    @endisset
                </div>
                <div class="back">
                    <img src="{{ asset('/assets/images/new-images/qastara-logo1.png') }}" />
                </div>
            </div>
        </div>
    </div>

    @if (auth()->guard('doctor')->user()->user_type == 'doctor')
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
                                            <h5 class="fw-semibold mb-0 lh-1 total_count__">{{ $user }}</h5>
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

                                            <iconify-icon icon="material-symbols:lab-research-outline-rounded"
                                                width="24"></iconify-icon>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">Lab Orders</p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="fw-semibold mb-0 lh-1 total_count__">{{ $labtasks }}</h5>
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

                                            <iconify-icon icon="mdi:x-ray-box-outline" width="24"></iconify-icon>
                                        </span>
                                    </div>
                                    <div class="flex-fill">
                                        <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">Imaging Orders</p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h5 class="fw-semibold mb-0 lh-1 total_count__">{{ $imagingCount }}</h5>
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
                                            <h5 class="fw-semibold mb-0 lh-1 total_count__">{{ $patient_order_procedures }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-7" style="padding-top: 49px;">
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
                                        <h6 class="graph_title paid_gp">{{ $count }} <span> All invoice this month
                                            </span></h6>
                                        <h6 class="graph_title pos_gp">{{ $paid }} <span> Paid invoice this month
                                                (Paid)</span></h6>
                                        <h6 class="graph_title pos_gp" style="color: #E791BC;">{{ $unpayAmount }} <span> Unpaid invoice this month   
                                                (Unpaid)</span></h6>
                                        <h6 class="graph_title cash_gp">{{ $payAmount }} OMR <span>Cash Payment</span>
                                        </h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-5 mt-5">

                   

                            <form method="post" action="{{ route('admin.dashboard') }}" style="padding-bottom: 4px;">@csrf
                            <div class="row">
                                <div class="col-lg-8">
                                <select class="form-content select2" name="yearName" id="yearDropdown">
                                    <!-- <option value="">Select Year</option> -->
                                    @foreach ($years as $yr)
                                            <option value="{{ $yr }}" {{ $year == $yr ? 'selected' : '' }}>{{ $yr }}</option>
                                    @endforeach
                                  </select> 
                                </div>
                                <div class="col-lg-4">
                                <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                                    <iconify-icon icon="bi:save"></iconify-icon> Filter

                                    </button>
                                </div>
                             </div>
                             </form>
                        
                            <div class="card">
                                <div class="top_title_gp card-header">
                                    <h6>Monthly Paid Amount<span class="color_green"></span></h6>
                                </div>
                                <div class="shadow-card">

                                    <div id="cumulative"></div>

                                </div>
                            </div>
                        

                    </div>
                </div>
            </div>
        </div>
    @endif



    @push('custom-js')



        <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.16.0/d3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js"></script>
        <script>
            var chart = c3.generate({
                bindto: '#chart',
                data: {
                    columns: [
                        ['All invoice this month', {{ $count }}],
                        ['Paid invoice this month', {{ $paid }}],
                        ['Unpaid invoice this month', {{ $unpayAmount }}],
                        ['Cash Payment', {{ $payAmount }}],
                    ],
                    type: 'donut',
                    colors: {
                        'All invoice this month': '#1f77b4',
                        'Paid invoice this month': '#ff7f0e',
                        'Unpaid invoice this month': '#E791BC',
                        'Cash Payment': '#2ca01c'  
                    }
                },
                legend: {
                    show: false,
                    inset: {
                        space: 10
                    }
                }
            });
        </script>


        <script>
            const doctorRes = @json($doctorRes);
            console.log(doctorRes);
            var data = {
                x: 'x',
                columns: [
                    ['x', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep',
                        'Oct', 'Nov', 'Dec'
                    ],
                    ['Amount'].concat(doctorRes.slice(0, 12))
                ]
            };



            var chart = c3.generate({
                bindto: '#cumulative',
                data: data,
                axis: {
                    x: {
                        type: 'category',
                        categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
                            'September', 'October', 'November', 'December'
                        ]
                    },
                    y: {
                        label: {
                            text: 'Amount',
                            position: 'outer-middle'
                        }
                    }
                },
                grid: {
                    y: {
                        show: true
                    }
                },
                legend: {
                    show: false
                },
                tooltip: {
                    format: {
                        value: function(value, ratio, id) {
                            return value;
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection

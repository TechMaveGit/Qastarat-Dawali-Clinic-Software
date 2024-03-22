@extends('back.layout.main_view')
@push('title')
Home | QASTARAT & DAWALI CLINICS 
@endpush
@section('content-section')
@push('custom-css')
	{{-- add here --}}
@endpush

<div class="sub_bnr" style="background-image: url({{ url('assets') }}/images/hero-15.jpg);">
    <div class="sub_bnr">
        <h1>Welcome <span class="blue_theme">SAIF</span> </h1>
        <p>Here is what you have on QASTARAT & CLINICS today (Mon, Oct 23, 2023)</p>
        <a href="#" class="btn r-04 btn--theme hover--tra-black">Set Out Office </a>
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
                            <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">Tasks</p>
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
                               <iconify-icon icon="humbleicons:refresh" width="24"></iconify-icon>
                            </span>
                        </div>
                        <div class="flex-fill">
                            <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">Recall</p>
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
                            <iconify-icon icon="streamline:mail-chat-bubble-typing-oval-messages-message-bubble-typing-chat" width="22"></iconify-icon>
                            </span>
                        </div>
                        <div class="flex-fill">
                            <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">Messages</p>
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
                            <iconify-icon icon="uil:invoice" width="24"></iconify-icon>
                            </span>
                        </div>
                        <div class="flex-fill">
                            <p class="mb-0 fs-10 op-7 text-muted fw-semibold title_">To Invoice</p>
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
                      <div class="col-xxl-3 col-md-6 mb5 mt-4">
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
            
            </div>
            <!-- Widget 1 End -->

        </div>
    </div>
</div>

@push('custom-js')
			<script>
				// add custom js
			</script>
@endpush
@endsection
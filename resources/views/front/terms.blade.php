@extends('front.layout.main_view')
@push('title')
Terms | QASTARAT & DAWALI CLINICS 
@endpush
@section('content-section')

<section id="hero-15" class="bg--scroll innerbannerSection hero-section"
   style="background-image: url({{ asset('/assets/images/new-images/page-title.jpg') }});">
   <div class="container">
      <!-- <div id="owl-carousel" class="service_slider owl-carousel owl-theme"></div> -->
      <div class="row d-flex ">

         <div class="col-lg-12">
            <div class="center_section">
               <h6 class="center_sub_title">Terms of Use</h6>
               {{-- <h1 class="center_title">Terms of Use</h1> --}}
            </div>
         </div>
      </div>

   </div>
</section>

<div class="row">
   <div class="col-md-12">
      <div class="container">

         <p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

      </div>
   </div>
</div>



@endsection
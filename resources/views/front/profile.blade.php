@extends('front.layout.main_view')

@push('title')
    Home | QASTARAT & DAWALI CLINICS
@endpush

@section('content-section')

<div class="partner_view">
    <form action="{{ route('patient.update_profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">

        <div class="col-lg-12 mt-4">
            <div class="profile_box admin_profile">
                    <div class="back_img">
                    <div class="avtar_box">
                   <div class="avatar-upload">
                       <div class="avatar-edit">
                           <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" name="patient_profile_img">
                           <label for="imageUpload"></label>
                       </div>
                       <div class="avatar-preview">


                        @isset($doctor->patient_profile_img)

                        <div id="imagePreview" style="background-image: url('{{ asset("/assets/patient_profile/" . $doctor->patient_profile_img) }}');">
                        </div>
                        @else
                        <div id="imagePreview" style="background-image: url('{{ asset("/assets/images/team-13.jpg") }}');">
                        </div>
                        @endisset


                       </div>
                       <!-- <h6 class="name_dt_fg">kathreen Cooper</h6>  -->
                   </div>
                   <!-- <div class="partners_dt_name">
                       <h6>Frank Kirk <span>example@gmail.com</span></h6>
                   </div> -->

               </div>
                      </div>
                            <div class="inner_box_ghie">

                            <div class="row align-items-center">


                   <div class="col-lg-6">
                     <div class="row">
                       <div class="col-lg-12">
                           <div class="form_input">
                               <label for="formrow-firstname-input" class="form-label">Name</label>
                               <input type="text" class="form-control" id="formrow-firstname-input" placeholder="Hector Lambert" name="name" value="{{ $doctor->name ?? '' }}">
                               @error('name')
                                   <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                               @enderror
                           </div>
                       </div>
                       <div class="col-lg-12">
                        <div class="form_input">
                            <label for="formrow-firstname-input" class="form-label">Title</label>
                            <input type="text" class="form-control" id="formrow-firstname-input" placeholder="HectorLambert" name="title" value="{{ $doctor->title ?? '' }}">
                            @error('title')
                            <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                        @enderror
                        </div>
                    </div>


                     </div>
                   </div>
                   <div class="col-lg-6">
                     <div class="row">
                        <div class="col-lg-12">
                            <div class="form_input">
                                <label for="formrow-firstname-input" class="form-label">Email </label>
                                <input type="email" class="form-control" id="formrow-firstname-input" placeholder="example@gmail.com" name="email" value="{{ $doctor->email ?? '' }}" readonly>
                                @error('email')
                                <span class="text-danger" style="font-size: 13px;">{{ $message }}</span>
                                @enderror



                            </div>
                        </div>
                       <div class="col-lg-12">
                           <div class="form_input">
                               <label for="formrow-firstname-input" class="form-label">Password</label>
                               <input type="password" class="form-control" id="formrow-firstname-input" placeholder="" name="password">
                           </div>
                       </div>

                     </div>
                   </div>
                   <div class="col-lg-12">
                       <div class="action_btns_ui text-end">

                           <button type="submit" class="update_btn">
                               <iconify-icon icon="solar:smartphone-update-outline" class="update_icon"></iconify-icon> Update
                           </button>
                       </div>
                   </div>

               </div>
               </div>




            </div>
        </div>


    </div>
</form>
</div>



@endsection
@extends('back.layout.main_view')

@push('title')

profile  | QASTARAT & DAWALI CLINICS

@endpush

@section('content-section')

@push('custom-css')

	{{-- add here --}}

@endpush

<div class="partner_view">
    <form action="{{ route('update_profile') }}" method="POST" enctype="multipart/form-data">
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
                                @php
                                   $doctor_profile='';
                                    if($doctor->role_id=='1'){
                                        $doctor_profile=asset('/assets/profileImage/').'/'.$doctor->patient_profile_img;
                                    }elseif($doctor->role_id=='2'){
                                        $doctor_profile=asset('/assets/nurse_profile/').'/'.$doctor->patient_profile_img;
                                    }
                                    elseif($doctor->role_id=='5'){
                                        $doctor_profile=asset('/assets/nurse_profile/').'/'.$doctor->patient_profile_img;
                                    }
                                    elseif($doctor->role_id=='6'){
                                        $doctor_profile=asset('/assets/nurse_profile/').'/'.$doctor->patient_profile_img;
                                    }

                                    elseif($doctor->role_id=='11'){
                                        $doctor_profile=asset('/assets/nurse_profile/').'/'.$doctor->patient_profile_img;
                                    }
                                    
                                    elseif($doctor->role_id=='10'){
                                        $doctor_profile=asset('/assets/nurse_profile/').'/'.$doctor->patient_profile_img;
                                    }

                                @endphp
                        @isset($doctor->patient_profile_img)

                        <div id="imagePreview" style="background-image: url('{{ $doctor_profile }}');">
                            
                        </div>
                        @else
                        <div id="imagePreview" style="background-image: url('{{ asset("/assets/images/team-13.jpg") }}');">
                        </div>
                        @endisset


                       </div>
                       <!-- <h6 class="name_dt_fg">kathreen Cooper</h6> -->
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
                               <label for="formrow-firstname-input" class="form-label">Name </label>
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
                                <label for="formrow-firstname-input" class="form-label">Email</label>
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
@push('custom-js')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function () {
        readURL(this);
    });


</script>
@if (session('status'))
<script>
    swal.fire(
        'Success',
        '{{ session('status') }}',
        'success'
    );
</script>
@endif
@endpush
@endsection

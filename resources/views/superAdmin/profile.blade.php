@extends('superAdmin.superAdminLayout.main')
<!-- Content Wrapper. Contains page content -->
@push('title')
    <title>Profile | Super Admin</title>
@endpush
@section('content')

<div class="content-wrapper">
    <div class="container-full">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="d-flex">
      <h4 class="page-title">Update Profile</h4>

      </div>

      </div>

      <section class="content">
        <div class="row">
            <div class="col-12">

                <form action="{{ route('super-admin.profile') }}" method="post">   @csrf
                     <div class="box">
                             <div class="box-body">
                                 <div class="row">

                                    <div class="col-lg-12 mt-3">
                                        <div class="title_head">
                                            <h4>Name</h4>
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Name <span class="clr"> * </span></label>
                                            <input type="text" name="name" value="{{ $userDetail->name }}" class="form-control" placeholder="">


                                        </div>
                                        </div>


                                     <div class="col-md-3">
                                     <div class="form-group">
                                         <label class="form-label">Email Address <span class="clr"> * </span></label>
                                         <input type="text" name="email" value="{{ $userDetail->email }}" class="form-control" placeholder="" readonly>


                                     </div>
                                     </div>


                                     <div class="col-md-3">
                                         <div class="form-group">
                                             <label class="form-label">Password <span class="clr">*</span></label>
                                             <div class="wrap-input">
                                                 <input type="password" name="password" id="password" class="form-control password" placeholder="">
                                                 <span class="btn-show-pass ico-20 ">
                                                     <span class="  eye-pass flaticon-visibility "></span>
                                                 </span>
                                             </div>
                                                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- /.box-body -->
                             <div class="box-footer">
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="submit_btn text-end">
                                            <button type="submit" class="waves-effect waves-light btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                                         </div>
                                     </div>
                                 </div>
                               </div>
                             </div>

                         </form>
                             <!-- /.box -->
                         </div>




        </div>
    </section>








    </div>
</div>




 @endsection


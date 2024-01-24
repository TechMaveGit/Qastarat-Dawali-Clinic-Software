@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Add Accountant | Super Admin</title>
@endpush
@section('content')
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex">
        <h4 class="page-title">Add Accountant</h4>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('accountants.index') }}">Accountant</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Accountant</li>
                </ol>
            </nav>
        </div>
          
		</div>
        <section class="content">
        <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                    <div class="col-lg-12 mt-2">
							<div class="title_head">
								<h4>Basic Info</h4>
							</div>
						</div>
                    <div class="col-md-3">
					  <div class="form-group">
						<label class="form-label">Title</label>
						<select class="form-control select2" style="width: 100%;" name="title">
						<option value="">Mr</option>
									<option value="">Mrs</option>
									<option value="">Miss</option>
									<option value="">Ms</option>
									<option value="">Dr</option>
									<option value="">Lady</option>
									<option value="">Sir</option>
									<option value="">Professor</option>
									<option value="">Capt</option>
									<option value="">Lord</option>
                           </select>
                           @error('title')
                           <span class="error text-danger">{{ $message }}</span>
                       @enderror
					  </div>
					  <!-- /.form-group -->
					</div>
                       <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="" name="name">
                            @error('name')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                    <label class="form-label">Date of Birth</label>

                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" name="birth_date">
                                    @error('birth_date')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                    </div>
                                    <!-- /.input group -->
                                </div>
                        </div>
                            <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <select class="form-control select2" style="width: 100%;" name="gendar">
                                    <option value="">Male</option>
                                    <option value="">Female</option>
                                </select>
                                @error('gendar')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        <!-- /.form-group -->
                        </div>
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Postal Address</h4>
							</div>
						</div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Post Code</label>
                            <input type="text" class="form-control" placeholder="" name="post_code">
                            @error('post_code')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Street</label>
                            <input type="text" class="form-control" placeholder="" name="street"> 
                            @error('street')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Town</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Country</label>
                                <select class="form-control" id="countries" style="width: 100%;">
                                    <option value=""></option>
                                    <option value="">Female</option>
                                </select>
                            </div>
                        <!-- /.form-group -->
                        </div>
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Phone & Email</h4>
							</div>
						</div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Mobile Phone</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Landline</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        </div>
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Educational Background</h4>
							</div>
						</div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Name of University/College</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Degree</label>
                            <input type="text" class="form-control" placeholder="(e.g., Bachelor's in Accounting, CPA)">
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Graduation Year</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Soft Skill</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Work Experience</label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="submit_btn text-end">
                                <a href="accountant-list.php"><button type="button" class="waves-effect waves-light btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Save</button></a>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.box -->      
            </div>
          </div>
        </section>
        
      </div>
 </div>
@endsection
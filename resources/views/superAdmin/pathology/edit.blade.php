@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Edit Nurse | Super Admin</title>
@endpush
@section('content')

<div class="content-wrapper">
    <div class="container-full">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="d-flex">
      <h4 class="page-title">Edit Doctor</h4>
      <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Doctor</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Doctor</li>
              </ol>
          </nav>
      </div>

      </div>
      <section class="content">
      <div class="row">

   <form action="{{ route('nurses.edit',['id'=>$id]) }}" method="post"/> @csrf
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
                      <select class="form-control select2" style="width: 100%;">
                          <option value="Mr" {{ $nurse ->title == 'Mr' ? 'selected="selected"' : '' }}>Mr</option>
                          <option value="Mrs" {{ $nurse->title == 'Mrs' ? 'selected="selected"' : '' }}>Mrs</option>
                          <option value="Miss" {{ $nurse->title == 'Miss' ? 'selected="selected"' : '' }}>Miss</option>
                          <option value="Ms" {{ $nurse->title == 'Ms' ? 'selected="selected"' : '' }}>Ms</option>
                          <option value="Dr" {{ $nurse->title ==  'Dr' ? 'selected="selected"' : '' }}>Dr</option>
                          <option value="Lady" {{ $nurse->title ==  'Lady' ? 'selected="selected"' : '' }}>Lady</option>
                          <option value="Sir" {{ $nurse->title == 'Sir' ? 'selected="selected"' : '' }}>Sir</option>
                          <option value="Professor" {{ $nurse->title == 'Professor' ? 'selected="selected"' : '' }}>Professor</option>
                          <option value="Capt" {{ $nurse->title == 'Capt' ? 'selected="selected"' : '' }}>Capt</option>
                          <option value="Lord" {{ $nurse->title == 'Lord' ? 'selected="selected"' : '' }}>Lord</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                     <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label"> Name</label>
                          <input type="text" name="name" value="{{ $nurse->name }}" class="form-control" placeholder="">
                      </div>
                      </div>

                      <div class="col-md-3">
                          <div class="form-group">
                                  <label class="form-label">Date of Birth</label>

                                  <div class="input-group date">
                                  <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" value="{{ $nurse->birth_date }}" name="birth_date" class="form-control pull-right" id="datepicker">
                                  </div>
                                  <!-- /.input group -->
                              </div>
                      </div>
                          <div class="col-md-3">
                          <div class="form-group">
                              <label class="form-label">Gender</label>
                              <select class="form-control select2" name="gendar" style="width: 100%;">
                                  <option value="male" {{ $nurse->gendar  == 'male' ? 'selected' : '' }}>Male</option>
                                  <option value="female" {{ $nurse->gendar == 'female' ? 'selected' : '' }}>Female</option>
                                  <option value="other" {{ $nurse->gendar == 'other' ? 'selected' : '' }}>Other</option>
                              </select>
                          </div>
                      <!-- /.form-group -->
                      </div>
                      
                      
                       <div class="col-md-3">
                          <div class="form-group">
                              <label class="form-label">Status</label>
                              <select class="form-control" name="status" id="countries" style="width: 100%;">
                                   <option value="active">Active</option>
                                   <option value="inactive">Inactive</option>
                              </select>
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
                          <input type="text" value="{{ $nurse->post_code }}" class="form-control" placeholder="">
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Street</label>
                          <input type="text" value="{{ $nurse->street }}" class="form-control" placeholder="">
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Town</label>
                          <input type="text" value="{{ $nurse->town }}" class="form-control" placeholder="">
                      </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label class="form-label">Country</label>
                              <select class="form-control" id="countries" style="width: 100%;">
                                  {{-- <option value=""></option>
                                  <option value="">Female</option> --}}
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
                          <input type="text" value="{{ $nurse->email }}" class="form-control" placeholder="">
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Mobile Phone</label>
                          <input type="text" value="{{ $nurse->mobile_no }}" class="form-control" placeholder="">
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Landline</label>
                          <input type="text" value="{{ $nurse->landline }}" class="form-control" placeholder="">
                      </div>
                      </div>
                      <div class="col-lg-12 mt-3">
                          <div class="title_head">
                              <h4>Skills Info.</h4>
                          </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Specialty</label>
                          <input type="text" value="{{ $nurse->specialty }}" class="form-control" placeholder="">
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Qualifications</label>
                          <input type="text" value="{{ $nurse->qualifications }}" class="form-control" placeholder="">
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Experience</label>
                          <input type="text" value="{{ $nurse->experience }}" class="form-control" placeholder="">
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Working Hours</label>
                          <input type="text" value="{{ $nurse->working_hours }}" class="form-control" placeholder="">
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Languages Spoken</label>
                          <input type="text" value="{{ $nurse->languages_spoken }}" class="form-control" placeholder="">
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">License Number</label>
                          <input type="text" value="{{ $nurse->lincense_no }}" class="form-control" placeholder="">
                      </div>
                      </div>
                      {{-- <div class="col-lg-12 mt-3">
                          <div class="title_head">
                              <h4>Document</h4>
                          </div>
                      </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">License Upload</label>
                      <input name="file1" type="file" class="dropify" data-height="100" />
                      </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-label">Academic Document Upload</label>
                      <input name="file1" type="file" class="dropify" data-height="100" />
                      </div>
                    </div> --}}





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
              <!-- /.box -->
          </div>
         </form>
        </div>
      </section>

    </div>
</div>
@endsection

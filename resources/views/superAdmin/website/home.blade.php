@extends('superAdmin.superAdminLayout.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    
        <section class="content">
        <div class="row">
        <div class="col-12">
            <form action="{{ route('homes.index') }}" method="POST">
                @csrf
            <div class="box">
                <div class="box-body">
                    <div class="row">
                   
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Home</h4>
							</div>
						</div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Titile</label>
                            <input type="text" class="form-control" placeholder="" name="title" value="{{ $home->title }}">
                            @error('title')
                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Sub Titile</label>
                            <textarea type="text" class="form-control" placeholder="" name="subTitle">{{ $home->subTitle }}</textarea>
                            @error('subTitle')
                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                
                            @enderror
                        </div>
                        </div>
                        
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Basic Info.</h4>
							</div>
						</div>
                        <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label">Reasonal Clinics</label>
                            <input type="number" class="form-control" placeholder="" min=0 name="reasonalClinics" value="{{ $home->reasonalClinics }}">
                            @error('reasonalClinics')
                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label">GCC Countries</label>
                            <input type="number" min=0 class="form-control" placeholder="" name="gccCountries" value="{{ $home->gccCountries }}">
                            @error('gccCountries')
                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label">Satellietes Centers</label>
                            <input type="number" min=0 class="form-control" placeholder="" name="satellietesCenters" value="{{ $home->satellietesCenters }}">
                            @error('satellietesCenters')
                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                            <label class="form-label">Population served</label>
                            <input type="number" min=0 class="form-control" placeholder="" name="populationServed" value="{{ $home->populationServed }}">
                            @error('populationServed')
                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="form-label">Years of experience</label>
                                <input type="number" min=0 class="form-control" placeholder="" name="yearsExperience" value="{{ $home->yearsExperience }}">
                                @error('yearsExperience')
                                <span class="text-danger font-size :14px;">{{ $message }}</span>
                                    
                                @enderror
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
 @if (session('status'))
 
<script>
    
    swal.fire(
        'Success',
        '{{ session('status') }}',
        'success'
    );
</script>
@endif
@endsection
@extends('superAdmin.superAdminLayout.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    
        <section class="content">
        <div class="row">
        <div class="col-12">
            <form action="{{ route('ourBranches.ourBranch') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="box">
                <div class="box-body">
                    <div class="row">
                   
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>about Us</h4>
							</div>
						</div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Titile</label>
                            <input type="text" class="form-control" placeholder="" name="title" value="{{ $branch->title }}">
                            @error('title')
                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Sub Titile</label>
                            <textarea type="text" class="form-control" placeholder="" name="subTitle" style="height: 300px; width: 500px;">{{ $branch->subTitle }}</textarea>
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
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-label">image Upload</label>
                              <input name="imageUpload" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($branch->imageUpload)) data-default-file="{{ asset('public/assets/video'.'/'.$branch->imageUpload) }}" @endif/>
                              @error('imageUpload')
                              <span class="text-danger font-size: 14px;">{{ $message }}</span>
                              @enderror
                              </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="title_head">
                                    <h4>Branch Info.</h4>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label"> Title 1</label>
                                    <input type="text" class="form-control" placeholder="" name="title1" value="{{ $branch->title1  }}">
                                </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">phone Number</label>
                                        <input type="text" class="form-control" placeholder="" name="title1phonenumber" value="{{ $branch->title1phonenumber  }}">
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">TollFree  Number</label>
                                            <input type="text" class="form-control" placeholder="" name="title1tollfreenumber" value="{{ $branch->title1tollfreenumber  }}">
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title 2</label>
                                                <input type="text" class="form-control" placeholder="" name="title2" value="{{ $branch->title2  }}">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">phone Number</label>
                                                    <input type="text" class="form-control" placeholder="" name="title2phonenumber" value="{{ $branch->title2phonenumber  }}">
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Title 3</label>
                                                        <input type="text" class="form-control" placeholder="" name="title3" value="{{ $branch->title3  }}">
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" class="form-control" placeholder="" name="title3email" value="{{ $branch->title3email  }}">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Title 4</label>
                                                                <input type="text" class="form-control" placeholder="" name="title4" value="{{ $branch->title4  }}">
                                                            </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="email" class="form-control" placeholder="" name="title4email" value="{{ $branch->title4email  }}">
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
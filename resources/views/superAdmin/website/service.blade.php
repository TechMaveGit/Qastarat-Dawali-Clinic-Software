@extends('superAdmin.superAdminLayout.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    
        <section class="content">
        <div class="row">
        <div class="col-12">
            <form action="{{ route('ourServices.ourService') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="box">
                <div class="box-body">
                    <div class="row">
                   
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Service </h4>
							</div>
						</div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Titile</label>
                                <input type="text" class="form-control" placeholder="" name="title" value="{{ $service->title }}">
                                @error('title')
                                <span class="text-danger font-size :14px;">{{ $message }}</span>
                                    
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Sub Titile</label>
                                <textarea type="text" class="form-control" placeholder="" name="subTitle" style="height: 300px; width: 500px;">{{ $service->subTitle }}</textarea>
                                @error('subTitle')
                                <span class="text-danger font-size :14px;">{{ $message }}</span>
                                    
                                @enderror
                            </div>
                            </div>
                       
                      
                        
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Images Details.</h4>
							</div>
						</div>
                        <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-label">Image</label>
                              <input name="image1" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($service->image1)) data-default-file="{{ asset('public/assets/video'.'/'.$service->image1) }}" @endif/>
                              @error('image1')
                              <span class="text-danger font-size: 14px;">{{ $message }}</span>
                              @enderror
                              </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" placeholder="" name="image1title" value="{{ $service->image1title }}" >
                                @error('image1title')
                                <span class="text-danger font-size :14px;">{{ $message }}</span>
                                    
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Sub Titile</label>
                                    <textarea type="text" class="form-control" placeholder="" name="image1subtitle" style="height: 300px; width: 500px;">{{ $service->image1subtitle }}</textarea>
                                    @error('image1subtitle')
                                    <span class="text-danger font-size :14px;">{{ $message }}</span>
                                        
                                    @enderror
                                </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                      <label class="form-label">Image</label>
                                      <input name="image2" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($service->image2)) data-default-file="{{ asset('public/assets/video'.'/'.$service->image2) }}" @endif/>
                                      @error('image2')
                                      <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                      @enderror
                                      </div>
                                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" placeholder="" name="image2title" value="{{ $service->image2title }}" >
                                        @error('image2title')
                                        <span class="text-danger font-size :14px;">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Sub Titile</label>
                                            <textarea type="text" class="form-control" placeholder="" name="image2subtitle" style="height: 300px; width: 500px;">{{ $service->image2subtitle }}</textarea>
                                            @error('image2subtitle')
                                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                                
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                              <label class="form-label">Image</label>
                                              <input name="image3" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($service->image3)) data-default-file="{{ asset('public/assets/video'.'/'.$service->image3) }}" @endif/>
                                              @error('image3')
                                              <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                              @enderror
                                              </div>
                                            </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" placeholder="" name="image3title" value="{{ $service->image3title }}" >
                                                @error('image3title')
                                                <span class="text-danger font-size :14px;">{{ $message }}</span>
                                                    
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Sub Titile</label>
                                                    <textarea type="text" class="form-control" placeholder="" name="image3subtitle" style="height: 300px; width: 500px;">{{ $service->image3subtitle }}</textarea>
                                                    @error('image3subtitle')
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
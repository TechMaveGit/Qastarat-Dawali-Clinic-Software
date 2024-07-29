@extends('superAdmin.superAdminLayout.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    
        <section class="content">
        <div class="row">
        <div class="col-12">
            <form action="{{ route('aboutUs.aboutUs') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" placeholder="" name="title" value="{{ $aboutUs->title }}">
                            @error('title')
                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Sub Titile</label>
                            <textarea type="text" class="form-control" placeholder="" name="subTitle" style="height: 300px; width: 500px;">{{ $aboutUs->subTitle }}</textarea>
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
                        {{-- <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Video</label>
                                @if(isset($aboutUs->videoFile))
                                    <video width="400" controls class="text-center">
                                        <source src="{{  asset('/assets/video'.'/'.$aboutUs->videoFile)  }}" type="video/mp4">
                                        Your browser does not support HTML video.
                                    </video>
                                @endif
                                <input name="videoFile" type="file" class="dropify" data-height="100" accept="video/*" @if(isset($aboutUs->videoFile)) data-default-file="{{ asset('/assets/video'.'/'.$aboutUs->videoFile) }}" @endif/>
                               
                                @error('videoFile')
                                <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Video Url</label>
                                <input type="url" class="form-control" placeholder="Enter video URL" name="video_url" value="{{ $aboutUs->video_url }}">
                                @error('video_url')
                                <span class="text-danger font-size :14px;">{{ $message }}</span>
                                    
                                @enderror
                            </div>
                            </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-label">image Upload</label>
                              <input name="imageUpload" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($aboutUs->imageUpload)) data-default-file="{{ asset('/assets/video'.'/'.$aboutUs->imageUpload) }}" @endif/>
                              @error('imageUpload')
                              <span class="text-danger font-size: 14px;">{{ $message }}</span>
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
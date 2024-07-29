@extends('superAdmin.superAdminLayout.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    
        <section class="content">
        <div class="row">
        <div class="col-12">
            <form action="{{ route('ourTreatments.ourTreatment') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" placeholder="" name="title" value="{{ $treatment->title }}">
                            @error('title')
                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Sub Titile</label>
                            <textarea type="text" class="form-control" placeholder="" name="subTitle" style="height: 300px; width: 500px;">{{ $treatment->subTitle }}</textarea>
                            @error('subTitle')
                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                
                            @enderror
                        </div>
                        </div>
                        
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>File Info.</h4>
							</div>
						</div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Video</label>
                                @if(isset($treatment->videoFile))
                                    <video width="400" controls>
                                        <source src="{{  asset('/assets/video'.'/'.$treatment->videoFile)  }}" type="video/mp4">
                                        Your browser does not support HTML video.
                                    </video>
                                @endif
                                <input name="videoFile" type="file" class="dropify" data-height="100" accept="video/*" @if(isset($treatment->videoFile)) data-default-file="{{ asset('/assets/video'.'/'.$treatment->videoFile) }}" @endif/>
                               
                                @error('videoFile')
                                <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- <div class="form-group">
                                <label class="form-label">Video Url</label>
                                <input type="url" class="form-control" placeholder="Enter video URL" name="video_url" value="{{ $treatment->video_url }}">
                                @error('video_url')
                                <span class="text-danger font-size :14px;">{{ $message }}</span>
                                    
                                @enderror
                            </div>
                            </div> -->
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                              <label class="form-label">image Upload</label>
                              <input name="imageUpload" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($treatment->imageUpload)) data-default-file="{{ asset('/assets/video'.'/'.$treatment->imageUpload) }}" @endif/>
                              @error('imageUpload')
                              <span class="text-danger font-size: 14px;">{{ $message }}</span>
                              @enderror
                              </div>
                            </div>
                       
                            <div class="col-lg-12 mt-3">
                                <div class="title_head">
                                    <h4> Women heal better Info.</h4>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Women heal better</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Womenhealbetter" value="{{ $treatment->Womenhealbetter }}">
                                   
                                    @error('Womenhealbetter')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 1</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Womenhealbettercontent1" value="{{ $treatment->Womenhealbettercontent1 }}">
                                   
                                    @error('Womenhealbettercontent1')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 2</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Womenhealbettercontent2" value="{{ $treatment->Womenhealbettercontent2 }}">
                                   
                                    @error('Womenhealbettercontent2')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 3</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Womenhealbettercontent3" value="{{ $treatment->Womenhealbettercontent3 }}">
                                   
                                    @error('Womenhealbettercontent3')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                       
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 4</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Womenhealbettercontent4" value="{{ $treatment->Womenhealbettercontent4 }}">
                                   
                                    @error('Womenhealbettercontent4')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 5</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Womenhealbettercontent5" value="{{ $treatment->Womenhealbettercontent5 }}">
                                   
                                    @error('Womenhealbettercontent5')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 6</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Womenhealbettercontent6" value="{{ $treatment->Womenhealbettercontent6 }}">
                                   
                                    @error('Womenhealbettercontent6')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="title_head">
                                    <h4> Men heal better Info.</h4>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Men heal better</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Menhealbetter" value="{{ $treatment->Menhealbetter }}">
                                   
                                    @error('Menhealbetter')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 1</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Menhealbettercontent1" value="{{ $treatment->Menhealbettercontent1 }}">
                                   
                                    @error('Menhealbettercontent1')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 2</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Menhealbettercontent2" value="{{ $treatment->Menhealbettercontent2 }}">
                                   
                                    @error('Menhealbettercontent2')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 3</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Menhealbettercontent3" value="{{ $treatment->Menhealbettercontent3 }}">
                                   
                                    @error('Menhealbettercontent3')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                       
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 4</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Menhealbettercontent4" value="{{ $treatment->Menhealbettercontent4 }}">
                                   
                                    @error('Menhealbettercontent4')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 5</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Menhealbettercontent5" value="{{ $treatment->Menhealbettercontent5 }}">
                                   
                                    @error('Menhealbettercontent5')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 6</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Menhealbettercontent6" value="{{ $treatment->Menhealbettercontent6 }}">
                                   
                                    @error('Menhealbettercontent6')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="title_head">
                                    <h4>  Men & women heal better Info.</h4>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Men & women heal better</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Menwomenhealbetter" value="{{ $treatment->Menwomenhealbetter }}">
                                   
                                    @error('Menwomenhealbetter')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 1</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Menwomenhealbettercontent1" value="{{ $treatment->Menwomenhealbettercontent1 }}">
                                   
                                    @error('Menwomenhealbettercontent1')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 2</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Menwomenhealbettercontent2" value="{{ $treatment->Menwomenhealbettercontent2 }}">
                                   
                                    @error('Menwomenhealbettercontent2')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 3</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Menwomenhealbettercontent3" value="{{ $treatment->Menwomenhealbettercontent3 }}">
                                   
                                    @error('Menwomenhealbettercontent3')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                       
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 4</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Menwomenhealbettercontent4" value="{{ $treatment->Menwomenhealbettercontent4 }}">
                                   
                                    @error('Menwomenhealbettercontent4')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 5</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Menwomenhealbettercontent5" value="{{ $treatment->Menwomenhealbettercontent5 }}">
                                   
                                    @error('Menwomenhealbettercontent5')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 6</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="Menwomenhealbettercontent6" value="{{ $treatment->Menwomenhealbettercontent6 }}">
                                   
                                    @error('Menwomenhealbettercontent6')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="title_head">
                                    <h4>Regenerative Therapies Info.</h4>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Regenerative Therapies</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="regenerativetherapies" value="{{ $treatment->regenerativetherapies }}">
                                   
                                    @error('regenerativetherapies')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 1</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="regenerativetherapiescontent1" value="{{ $treatment->regenerativetherapiescontent1 }}">
                                   
                                    @error('regenerativetherapiescontent1')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 2</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="regenerativetherapiescontent2" value="{{ $treatment->regenerativetherapiescontent2 }}">
                                   
                                    @error('regenerativetherapiescontent2')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 3</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="regenerativetherapiescontent3" value="{{ $treatment->regenerativetherapiescontent3 }}">
                                   
                                    @error('regenerativetherapiescontent3')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                       
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 4</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="regenerativetherapiescontent4" value="{{ $treatment->regenerativetherapiescontent4 }}">
                                   
                                    @error('regenerativetherapiescontent4')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 5</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="regenerativetherapiescontent5" value="{{ $treatment->regenerativetherapiescontent5 }}">
                                   
                                    @error('regenerativetherapiescontent5')
                                    <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">content 6</label>
                                  
                                    <input type="text" class="form-control" placeholder="" name="regenerativetherapiescontent6" value="{{ $treatment->regenerativetherapiescontent6 }}">
                                   
                                    @error('regenerativetherapiescontent6')
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
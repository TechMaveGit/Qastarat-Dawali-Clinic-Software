@extends('superAdmin.superAdminLayout.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    
        <section class="content">
        <div class="row">
        <div class="col-12">
            <form action="{{ route('ourUniqueSoftwares.ourUniqueSoftware') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" placeholder="" name="title" value="{{ $software->title }}">
                            @error('title')
                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Sub Titile</label>
                            <textarea type="text" class="form-control" placeholder="" name="subTitle" style="height: 300px; width: 500px;">{{ $software->subTitle }}</textarea>
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
                              <input name="imageUpload" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($software->imageUpload)) data-default-file="{{ asset('/assets/video'.'/'.$software->imageUpload) }}" @endif/>
                              @error('imageUpload')
                              <span class="text-danger font-size: 14px;">{{ $message }}</span>
                              @enderror
                              </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="title_head">
                                    <h4>list Info.</h4>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">list 1</label>
                                    <input type="text" class="form-control" placeholder="" name="list1" value="{{ $software->list1  }}">
                                </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">list 2</label>
                                        <input type="text" class="form-control" placeholder="" name="list2" value="{{ $software->list2  }}">
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">list 3</label>
                                            <input type="text" class="form-control" placeholder="" name="list3" value="{{ $software->list3  }}">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">list 4</label>
                                                <input type="text" class="form-control" placeholder="" name="list4" value="{{ $software->list4  }}">
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">list 5</label>
                                                    <input type="text" class="form-control" placeholder="" name="list5" value="{{ $software->list5  }}">
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">list 6</label>
                                                        <input type="text" class="form-control" placeholder="" name="list6" value="{{ $software->list6  }}">
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">list 7</label>
                                                            <input type="text" class="form-control" placeholder="" name="list7" value="{{ $software->list7  }}">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label">list 8</label>
                                                                <input type="text" class="form-control" placeholder="" name="list8" value="{{ $software->list8  }}">
                                                            </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="form-label">list 9</label>
                                                                    <input type="text" class="form-control" placeholder="" name="list9" value="{{ $software->list9  }}">
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
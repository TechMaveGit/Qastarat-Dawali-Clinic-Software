@extends('superAdmin.superAdminLayout.main')
@section('content')



<div class="modal fade select2_dp" id="add_lab" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('faqs.add') }}" method="post">   @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Faq</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Title<span class="clr">*</span></label>
                                    <input type="text" name="faqTitle" class="form-control" placeholder="" id="lab_name1" value="" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Description<span class="clr">*</span></label>
                                    <textarea type="text" class="form-control" placeholder="" name="faqDescription" style="height: 300px; width: 500px;" required></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save </button>
                    </div>
                </div>
            </form>
        </div>
    </div>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    
        <section class="content">
        <div class="row">
        <div class="col-12">

            
           
            <div class="box">
                <div class="box-body">
                    <div class="row">

                        

                        <div class="box-header with-border">
                            <div class="top_area">
                                {{-- <h3 class="box-title">All Faq</h3> --}}
                                    <a onclick="openForm()" class="waves-effect waves-light btn btn-md btn-primary"><i
                                        class="fa-solid fa-plus"></i> Add New Faq
                                    </a>
                            </div>
                        </div>

                        
                    <form action="{{ route('faqs.faq') }}" method="POST" enctype="multipart/form-data">  @csrf

                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Faq Section</h4>
							</div>
						</div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" placeholder="" name="title" value="{{ $faq->title }}">
                                @error('title')
                                <span class="text-danger font-size :14px;">{{ $message }}</span>
                                    
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Sub Title</label>
                                <textarea type="text" class="form-control" placeholder="" name="subTitle" style="height: 300px; width: 500px;">{{ $faq->subTitle }}</textarea>
                                @error('subTitle')
                                <span class="text-danger font-size :14px;">{{ $message }}</span>
                                    
                                @enderror
                            </div>
                        </div>
                        
                    
                        <div class="col-lg-=12">
                            <div class="form-group">
                              <label class="form-label">image Upload</label>
                              <input name="imageUpload" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($faq->imageUpload)) data-default-file="{{ asset('/assets/video'.'/'.$faq->imageUpload) }}" @endif/>
                              @error('imageUpload')
                              <span class="text-danger font-size: 14px;">{{ $message }}</span>
                              @enderror
                              </div>
                            </div>


                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="submit_btn text-end">
                                            <button type="submit" class="waves-effect waves-light btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                                        </div>
                                    </div>
                                </div>
                              </div>

                    </form>




<div class="row">
        <div class="col-12">


                 <form action="{{ route('faqs.faq') }}" method="POST" enctype="multipart/form-data">  @csrf

                    <input type="hidden" name="faqValue" value="faqValue"/>


                           @forelse ($faqs as $allfaqs)

                                    <div class="col-lg-12 mt-3">
                                            <div class="title_head">
                                                <h4>Faq {{ $loop->iteration }}</h4>
                                            </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="form-label">Title</label>

                                            <input type="text" class="form-control" placeholder="" name="title[]" value="{{ $allfaqs->list1	 }}">
                                        
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="form-label">Sub Titile</label>
                                            <textarea type="text" class="form-control" placeholder="" name="subTitle[]" style="height: 200px; width: 1000px;">{{ $allfaqs->list1subtitle }}</textarea>
                                            @error('subTitle')
                                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                                
                                            @enderror
                                        </div>
                                    </div>

                            @empty
                               
                            @endforelse

                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="submit_btn text-end">
                                            <button type="submit" class="waves-effect waves-light btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                                        </div>
                                    </div>
                                </div>
                              </div>

                            </form>

        </div>
</div>


                    </div>
                </div>
                <!-- /.box-body -->
               
                </div>
          
                <!-- /.box -->      
            </div>
          </div>
        </section>
        
      </div>
 </div>


 <script>
    function openForm() {
        $("#add_lab").modal('show');
    }
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
@endsection
@extends('superAdmin.superAdminLayout.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    
        <section class="content">
        <div class="row">
        <div class="col-12">
            <form action="{{ route('footers.footer') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="box">
                <div class="box-body">
                    <div class="row">
                   
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Footer </h4>
							</div>
						</div>
                        <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-label">website logo</label>
                              <input name="websitelogo" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($footer->websitelogo)) data-default-file="{{ asset('public/assets/video'.'/'.$footer->websitelogo) }}" @endif/>
                              @error('websitelogo')
                              <span class="text-danger font-size: 14px;">{{ $message }}</span>
                              @enderror
                              </div>
                            </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Headquarter Location</label>
                            <input type="text" class="form-control" placeholder="" name="HeadquarterLocation" value="{{ $footer->HeadquarterLocation }}">
                            @error('HeadquarterLocation')
                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Mailing address</label>
                            <input type="text" class="form-control" placeholder="" name="Mailingaddress" value="{{ $footer->Mailingaddress }}">
                            @error('Mailingaddress')
                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                
                            @enderror
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">International Call Center</label>
                                <input type="text" class="form-control" placeholder="" name="CallCenter" value="{{ $footer->CallCenter }}">
                                @error('CallCenter')
                                <span class="text-danger font-size :14px;">{{ $message }}</span>
                                    
                                @enderror
                            </div>
                            </div>
                        
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Quick Connect.</h4>
							</div>
						</div>
                        <div class="col-lg-4">
                            <div class="form-group">
                              <label class="form-label">logo</label>
                              <input name="logo1" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($footer->logo1)) data-default-file="{{ asset('public/assets/video'.'/'.$footer->logo1) }}" @endif/>
                              @error('logo1')
                              <span class="text-danger font-size: 14px;">{{ $message }}</span>
                              @enderror
                              </div>
                            </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Whatsapp Number</label>
                                <input type="text" class="form-control" placeholder="" name="logo1whatsapp" value="{{ $footer->logo1whatsapp }}" minlength="10" maxlength="15">
                                @error('logo1whatsapp')
                                <span class="text-danger font-size :14px;">{{ $message }}</span>
                                    
                                @enderror
                            </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">phone Number</label>
                                    <input type="text" class="form-control" placeholder="" name="logo1phone" value="{{ $footer->logo1phone }}" minlength="10" maxlength="15">
                                    @error('logo1phone')
                                    <span class="text-danger font-size :14px;">{{ $message }}</span>
                                        
                                    @enderror
                                </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                      <label class="form-label">logo</label>
                                      <input name="logo2" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($footer->logo2)) data-default-file="{{ asset('public/assets/video'.'/'.$footer->logo2) }}" @endif/>
                                      @error('logo2')
                                      <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                      @enderror
                                      </div>
                                    </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Whatsapp Number</label>
                                        <input type="text" class="form-control" placeholder="" name="logo2whatsapp" value="{{ $footer->logo2whatsapp }}" minlength="10" maxlength="15">
                                        @error('logo2whatsapp')
                                        <span class="text-danger font-size :14px;">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">phone Number</label>
                                            <input type="text" class="form-control" placeholder="" name="logo2phone" value="{{ $footer->logo2phone }}" minlength="10" maxlength="15">
                                            @error('logo2phone')
                                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                                
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                              <label class="form-label">logo</label>
                                              <input name="logo3" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($footer->logo3)) data-default-file="{{ asset('public/assets/video'.'/'.$footer->logo3) }}" @endif/>
                                              @error('logo3')
                                              <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                              @enderror
                                              </div>
                                            </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Whatsapp Number</label>
                                                <input type="text" class="form-control" placeholder="" name="logo3whatsapp" value="{{ $footer->logo3whatsapp }}" minlength="10" maxlength="15">
                                                @error('logo3whatsapp')
                                                <span class="text-danger font-size :14px;">{{ $message }}</span>
                                                    
                                                @enderror
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">phone Number</label>
                                                    <input type="text" class="form-control" placeholder="" name="logo3phone" value="{{ $footer->logo3phone }}" minlength="10" maxlength="15">
                                                    @error('logo3phone')
                                                    <span class="text-danger font-size :14px;">{{ $message }}</span>
                                                        
                                                    @enderror
                                                </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                      <label class="form-label">logo</label>
                                                      <input name="logo4" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($footer->logo4)) data-default-file="{{ asset('public/assets/video'.'/'.$footer->logo4) }}" @endif/>
                                                      @error('logo4')
                                                      <span class="text-danger font-size: 14px;">{{ $message }}</span>
                                                      @enderror
                                                      </div>
                                                    </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Whatsapp Number</label>
                                                        <input type="text" class="form-control" placeholder="" name="logo4whatsapp" value="{{ $footer->logo4whatsapp }}" minlength="10" maxlength="15">
                                                        @error('logo4whatsapp')
                                                        <span class="text-danger font-size :14px;">{{ $message }}</span>
                                                            
                                                        @enderror
                                                    </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label">phone Number</label>
                                                            <input type="text" class="form-control" placeholder="" name="logo4phone" value="{{ $footer->logo4phone }}" minlength="10" maxlength="15">
                                                            @error('logo4phone')
                                                            <span class="text-danger font-size :14px;">{{ $message }}</span>
                                                                
                                                            @enderror
                                                        </div>
                                                        </div>
                            
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label">text</label>
                                                                <input type="text" class="form-control" placeholder="" name="text1" value="{{ $footer->text1 }}">
                                                                @error('text1')
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
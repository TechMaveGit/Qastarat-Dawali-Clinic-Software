@extends('superAdmin.superAdminLayout.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    
        <section class="content">
        <div class="row">
        <div class="col-12">
            <form action="{{ route('ourTeams.ourTeam') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="box">
                <div class="box-body">
                    <div class="row">
                   
                        <div class="col-lg-12 mt-3">
							<div class="title_head">
								<h4>Teams Details </h4>
							</div>
						</div>
                       
                            
                            <div class="col-md-12 team-members">
                                <!-- Team member template (hidden by default) -->
                                <div class="team-member-template" style="display: none;">
                                    <div class="item">
                                        <div class="single-doctors-card">
                                            <div class="doctors-image">
                                                <input name="member_image[]" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" />
                                                <input type="hidden" name="current_image[]" value="">
                                                <ul class="social">
                                                    <li>
                                                        <input type="text" class="form-control" placeholder="Facebook URL" name="member_social_fb[]">
                                                    </li>
                                                    <li>
                                                        <input type="text" class="form-control" placeholder="Twitter URL" name="member_social_twitter[]">
                                                    </li>
                                                    <li>
                                                        <input type="text" class="form-control" placeholder="Instagram URL" name="member_social_instagram[]">
                                                    </li>
                                                    <li>
                                                        <input type="text" class="form-control" placeholder="LinkedIn URL" name="member_social_linkedin[]">
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="doctors-content">
                                                <input type="text" class="form-control member-name" placeholder="Name" name="member_name[]">
                                                <input type="text" class="form-control member-title" placeholder="Title" name="member_title[]">
                                            </div>
                                            <button type="button" class="btn btn-danger remove-member">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Team member template -->
                            
                                @foreach($TeamMembers as $member)
                                <div class="item">
                                    <div class="single-doctors-card">
                                        <div class="doctors-image">
                                            
                                            <input name="member_image[]" type="file"  class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($member->image_url)) data-default-file="{{ asset('public/assets/video'.'/'.$member->image_url) }}" @endif/>
                                                    @if(isset($member->image_url))
                                                    <input type="hidden" name="current_image[]" value="{{ $member->image_url }}">
                                                    @endif
                                            <ul class="social">
                                                <li>
                                                    <input type="text" class="form-control" placeholder="Facebook URL" name="member_social_fb[]" value="{{ $member->social_fb }}">
                                                </li>
                                                <li>
                                                    <input type="text" class="form-control" placeholder="Twitter URL" name="member_social_twitter[]" value="{{ $member->social_twitter }}">
                                                </li>
                                                <li>
                                                    <input type="text" class="form-control" placeholder="Instagram URL" name="member_social_instagram[]" value="{{ $member->social_instagram }}">
                                                </li>
                                                <li>
                                                    <input type="text" class="form-control" placeholder="LinkedIn URL" name="member_social_linkedin[]" value="{{ $member->social_linkedin }}">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="doctors-content">
                                            <input type="text" class="form-control member-name" placeholder="Name" name="member_name[]" value="{{ $member->name }}">
                                            <input type="text" class="form-control member-title" placeholder="Title" name="member_title[]" value="{{ $member->title }}">
                                        </div>
                                        <button type="button" class="btn btn-danger remove-member">Remove</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <div class="col-md-12 mt-3">
                                <button type="button" class="btn btn-success btn-sm add-member">Add Team Member</button>
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
 @push('custom-js')
 <script src="{{ url('public/assets') }}/js/jquery-3.7.0.min.js"></script>

 @if (session('status'))
 
<script>
    
    swal.fire(
        'Success',
        '{{ session('status') }}',
        'success'
    );
</script>
@endif
<script>
    $(document).ready(function () {
        
        $('.add-member').click(function () {
            var template = $('.team-member-template').html();
            $('.team-members').append(template);
        });

     
        $('.team-members').on('click', '.remove-member', function () {
            $(this).closest('.item').remove();
        });
    });
</script>
@endpush
@endsection
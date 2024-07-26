@extends('superAdmin.superAdminLayout.main')
@section('content')

<style>
 .team-members .item {
	padding: 10px;
	border: 1px solid #ececec;
	margin-bottom: 20px;
	box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
	border-radius: 5px;
}
.doctors-content .form-control {
	padding-right: 15px;
}
.social li {
  margin-bottom: 10px;
}
.social {
  list-style: none;
  padding-left: 0;
}
.teamPageTitle {
	display: flex;
	align-items: center;
	justify-content: space-between;
	margin-bottom: 20px;
}
.teamPageTitle h4{
    margin-bottom:0px;
}
.remove-member {
	padding: 5px 10px;
}
.social li .form-control {
	border: none;
	border-radius: 0;
	border-bottom: 1px solid #ececec;
}
.actionBtnGYU {
	padding: 4px 8px;
	border-radius: 50%;
	display: flex;
	align-items: center;
	justify-content: center;
	width: 30px;
	height: 29px;
}
.theme-success .btn-danger.actionBtnGYU {
	background-color: #ee315826;
	border-color: #ee3158;
	color: #ef4669;
}
.theme-success .btn-warning.actionBtnGYU {
	background-color: #ffa8001c;
	border-color: #ffa800;
	color: #ffa700;
}
.theme-success .btn-warning.actionBtnGYU:hover {
	background-color: #ffa700 !important;
	border: #ffa700 1px solid !important;
}
.card_header {
	display: flex;
	margin-bottom: 10px;
	gap: 6px;
	justify-content: end;
}
</style>
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
							<div class="title_head teamPageTitle">
								<h4>Teams Details </h4>
                                <button type="button" class="btn  btn-primary btn-sm add-member">+ Add Team Member</button>
							</div>
						</div>
                       
                            
                            <div class="col-md-12 team-members">
                                <!-- Team member template (hidden by default) -->
                                <div class="row">
                                    <div class="col-lg-4">
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
                                    </div>
                                </div>
                                
                               
                            <div class="row">
                            @foreach($TeamMembers as $member)
                            <div class="col-lg-4">
                            <div class="item">
                                <div class="card_header">
                                <button type="button" class="btn btn-soft btn-danger actionBtnGYU remove-member"><iconify-icon icon="ph:trash-bold"></iconify-icon></button>
                                <button type="button" class="btn btn-soft btn-warning actionBtnGYU "><iconify-icon icon="uil:edit"></iconify-icon></button>

                                </div>
                                    <div class="single-doctors-card">
                                        <div class="doctors-image">
                                            <div class="form-group">
                                            <input name="member_image[]" type="file"  class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($member->image_url)) data-default-file="{{ asset('public/assets/video'.'/'.$member->image_url) }}" @endif/>
                                                    @if(isset($member->image_url))
                                                    <input type="hidden" name="current_image[]" value="{{ $member->image_url }}">
                                                    @endif
                                            </div>
                                           
                                        
                                        </div>
                                        <div class="doctors-content">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="#">Name</label>
                                                        <input type="text" class="form-control member-name" placeholder="Name" name="member_name[]" value="{{ $member->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                    <label for="#">Position</label>
                                                    <input type="text" class="form-control member-title" placeholder="Title" name="member_title[]" value="{{ $member->title }}">
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        
                                           
                                        </div>
                                        <div class="doctor_socialMedia">
                                            <h6 class="mb-1 mt-2">Social media</h6>
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
                                     
                                    </div>
                                </div>
                            </div>
                                
                                @endforeach
                            </div>
                               
                            </div>
                            
                            <!-- <div class="col-md-12 mt-3">
                                <button type="button" class="btn btn-success btn-sm add-member">Add Team Member</button>
                            </div> -->
                            
                       
                                    
                            
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
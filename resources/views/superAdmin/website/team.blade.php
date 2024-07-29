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
.topHefti {
	display: flex;
	align-items: center;
	justify-content: space-between;
}
.socialmediaViewBtn {
	display: flex;
	align-items: center;
	gap: 6px;
	padding: 2px 5px;
	background: #79b6f04d;
	border-radius: 5px;
}
.social li input {
	padding-left: 0;
}
</style>
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
                   
                        <div class="col-lg-12 mt-3">
							<div class="title_head teamPageTitle">
								<h4>Teams Details </h4>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#add_lab" class="btn  btn-primary btn-sm add-member">+ Add Team Member</button>
							</div>
						</div>
                       
                            
                            <div class="col-md-12 team-members">                                   
                                    <div class="row">
                                       
                                            @foreach($TeamMembers as $member)    

                                            <div class="col-lg-4">
                                                <form action="{{ route('ourTeams.ourTeam') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                              <div class="item">
                                                <div class="card_header">
                                                <button type="button" class="btn btn-soft btn-danger actionBtnGYU" onclick="deleteTeam(`{{ $member->id }}`)"><iconify-icon icon="ph:trash-bold"></iconify-icon></button>
                                                <button type="submit" class="btn btn-soft btn-warning actionBtnGYU "><iconify-icon icon="uil:edit"></iconify-icon></button>

                                                </div>
                                                    <div class="single-doctors-card">
                                                        <div class="doctors-image">
                                                            <div class="form-group">
                                                            <input name="member_image" type="file"  class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" @if(isset($member->image_url)) data-default-file="{{ asset('/assets/video'.'/'.$member->image_url) }}" @endif/>
                                                                    @if(isset($member->image_url))
                                                                    <input type="hidden" name="current_image" value="{{ $member->image_url }}">
                                                                    @endif
                                                            </div>
                                                            
                                
                                                        </div>
                                                        <div class="doctors-content">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="#">Name</label>
                                                                        <input type="text" class="form-control member-name" placeholder="Name" name="member_name" value="{{ $member->name }}">
                                                                        <input type="hidden" name="teamId" value="{{ $member->id }}"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                    <label for="#">Position</label>
                                                                    <input type="text" class="form-control member-title" placeholder="Title" name="member_title" value="{{ $member->title }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                        
                                                        
                                                        </div>

                                                        <div class="doctor_socialMedia">
                                                            <div class="topHefti">
                                                            <h6 class="mb-1 mt-2">Social media</h6>
                                                            <a href="#" class="socialmediaViewBtn" onclick="socialMediaViewBtn({{ $member->id }})"><iconify-icon icon="hugeicons:view"></iconify-icon> view </a>
                                                            </div>
                                                            
                                                            <ul class="social" id="socialMedia{{ $member->id }}">
                                                                    <li>
                                                                        <input type="text" class="form-control" placeholder="Facebook URL" name="member_social_fb" value="{{ $member->social_fb }}">
                                                                    </li>
                                                                    <li>
                                                                        <input type="text" class="form-control" placeholder="Twitter URL" name="member_social_twitter" value="{{ $member->social_twitter }}">
                                                                    </li>
                                                                    <li>
                                                                        <input type="text" class="form-control" placeholder="Instagram URL" name="member_social_instagram" value="{{ $member->social_instagram }}">
                                                                    </li>
                                                                    <li>
                                                                        <input type="text" class="form-control" placeholder="LinkedIn URL" name="member_social_linkedin" value="{{ $member->social_linkedin }}">
                                                                    </li>
                                                            </ul>

                                                          

                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                            </form>  
                                            </div>   
                                            
                                         
                                         @endforeach
                                      
                                    </div>
                            </div>
                       </div>
                   </div>
                </div>
            </div>
          </div>
        </section>
        
      </div>
 </div>

 <div class="modal fade select2_dp" id="add_lab" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
     <form action="{{ route('ourTeams.addTeam') }}" method="post" enctype="multipart/form-data"> @csrf

 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="exampleModalLabel">Add Team Member</h5>
 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 </div>

 <div class="modal-body">
 <div class="row">
<div class="col-lg-12">
<div class="team-member-template1">
<div class="item">
    <div class="single-doctors-card">
        <div class="doctors-image">
            <div class="form-group mb-3">
                <label for="#" class="mb-1">Upload Profile</label>
                <input name="member_image" type="file" class="dropify" data-height="100" accept="image/png, image/gif, image/jpeg" />
            </div>
            
            <div class="doctors-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="#" class="mb-1">Name</label>
                            <input type="text" class="form-control member-name" placeholder="Name" name="member_name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="#" class="mb-1">Position</label>
                            <input type="text" class="form-control member-title" placeholder="Title" name="member_title">
                        </div>
                    </div>
                </div>
            
            
           </div>
           <div class="topHefti">
            <h6 class="mb-1 mt-2">Social media</h6>
            <!-- <a href="#" class="socialmediaViewBtn" id="socialMediaViewBtn"><iconify-icon icon="hugeicons:view"></iconify-icon> view </a> -->
            
        </div>
            <ul class="social_">
                <li>
                    <input type="text" class="form-control" placeholder="Facebook URL" name="member_social_fb">
                </li>
                <li>
                    <input type="text" class="form-control" placeholder="Twitter URL" name="member_social_twitter">
                </li>
                <li>
                    <input type="text" class="form-control" placeholder="Instagram URL" name="member_social_instagram">
                </li>
                <li>
                    <input type="text" class="form-control" placeholder="LinkedIn URL" name="member_social_linkedin">
                </li>
            </ul>
        </div>
       
        <!-- <button type="button" class="btn btn-danger remove-member">Remove</button> -->
    </div>
</div>
</div>
<!-- End of Team member template -->
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
 @push('custom-js')
 <script src="{{ url('/assets') }}/js/jquery-3.7.0.min.js"></script>

 @if (session('status'))
<script>
            Swal.fire({
            title: 'Success',
            text: 'Team Updated successfully!',
            icon: 'success',
            showConfirmButton: false, // This will hide the OK button
            timer: 1000 // Set the timer to reload the page after 1 second (1000 milliseconds)
        }).then(() => {
            location.reload(); // Reload the page after the timer expires
        });
</script>
@endif


@if (session('teamAdd'))
<script>
            Swal.fire({
            title: 'Success',
            text: 'Team Added successfully!',
            icon: 'success',
            showConfirmButton: false, // This will hide the OK button
            timer: 1000 // Set the timer to reload the page after 1 second (1000 milliseconds)
        }).then(() => {
            location.reload(); // Reload the page after the timer expires
        });
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

<script>
      $(document).ready(function() {
        $('.social').hide();
    });
        function socialMediaViewBtn(id)
        {     
                $('#socialMedia'+id).toggle(); 
        
        }   
</script>

<script>
    function deleteTeam(memberId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // AJAX request to delete team member
                $.ajax({
                    url: '{{ route('ourTeams.deleteTeam') }}',
                    type: 'POST',
                    data: {
                        memberId: memberId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) 
                        {
                            Swal.fire({
                                title: 'Success',
                                text: 'Team member has been deleted.',
                                icon: 'success',
                                showConfirmButton: false, // This will hide the OK button
                                timer: 1000 // Set the timer to reload the page after 1 second (1000 milliseconds)
                            }).then(() => {
                                location.reload(); // Reload the page after the timer expires
                            });
                        } 
                        else {
                            Swal.fire(
                                'Error!',
                                'Failed to delete team member.',
                                'error'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        Swal.fire(
                            'Error!',
                            'Failed to delete team member.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>


@endpush
@endsection
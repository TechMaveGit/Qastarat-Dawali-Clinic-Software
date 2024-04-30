@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>All Radiology | Super Admin</title>
@endpush
@push('custom-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header edit_title_head mb-0">
                <div class="d-flex">
                    <h4 class="page-title lab_name">All Radiology</h4>
                    {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Radiology Department</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Radiology</li>
                        </ol>
                    </nav> --}}
                </div>
                <!-- <a href="manage-lab.php" class="waves-effect waves-light btn btn-md btn-primary"><i class="fa-solid fa-gears"></i> Manage Lab</a> -->
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">

                            <div class="box-header with-border">
                                <div class="top_area">
                                    <h3 class="box-title">All Radiology</h3>
                                    <a onclick="openForm()" class="waves-effect waves-light btn btn-md btn-primary"><i
                                            class="fa-solid fa-plus"></i> Add New Radiology</a>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-main-box">
                                            <table id="custom_table" class="custom_table table  table-striped table-hover"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>Email </th>
                                                        <th>Mobile No. </th>
                                                        <th>Landline</th>
                                                        <th>Street</th>
                                                        <th>Branch</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($radiologys as $key => $allRadiologys)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $allRadiologys->lab_name }}</td>
                                                            <td>{{ $allRadiologys->email }}</td>
                                                            <td>{{ $allRadiologys->mobile_no }}</td>
                                                            <td>{{ $allRadiologys->landline }}</td>
                                                            <td>{{ $allRadiologys->street }}</td>

                                                            @php
                                                            $user_branchs = DB::table('user_branchs')->where('patient_id', $allRadiologys->id)->where('branch_type', 'radiology')->first();
                                                            $getBranchName = $user_branchs ? DB::table('branchs')->where('id', $user_branchs->add_branch)->first() : null;
                                                            @endphp
                                                            <td>{{ $getBranchName->branch_name??'' }}</td>


                                                            <td>{{ ucfirst($allRadiologys->status) }}</td>
                                                            <td>
                                                                <ul class="action_icons">
                                                                    <li>
                                                                        <a onclick="editForm('{{ $allRadiologys->id }}','{{ $allRadiologys->lab_name }}','{{ $allRadiologys->email }}','{{ $allRadiologys->mobile_no }}','{{ $allRadiologys->landline }}','{{ $allRadiologys->post_code }}','{{ $allRadiologys->street }}','{{ $allRadiologys->town }}','{{ $allRadiologys->status }}')"
                                                                            class="waves-effect waves-light btn btn-rounded btn-warning-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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


    <!-- Modal -->
    <div class="modal fade select2_dp" id="edit_lab" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('radiology.edit') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Radiology</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Lab Name</label>
                                    <input type="hidden" name="id" id="id" class="form-control" placeholder="">
                                    <input type="text" id="lab_name" class="form-control" placeholder="" name="lab_name"

                                        required>
                                        @error('lab_name')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="" required>
                                        @error('email')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Password </label>
                                    <div class="wrap-input">
                                        <input type="password" name="password" id="password" class="form-control password" placeholder="" autocomplete="new-password">
                                        <span class="btn-show-pass ico-20">
                                            <span class="eye-pass flaticon-visibility "></span>
                                        </span>
                                    </div>
                                    @error('password')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status" id="status" style="width: 100%;">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>

                                </div>
                            <!-- /.form-group -->
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Add Branch</label>    
    
                                    <select class="form-control form-select" name="selectBranch[]"  style="width: 100%;">
    
                                         <option value="">Select Any One</option>
                                        @forelse ($branchs as $allbranchs)
                                           <option value="{{$allbranchs->id}}">{{$allbranchs->branch_name}}</option>
                                        @empty
    
                                        @endforelse
                                    </select>
                                </div>
                            <!-- /.form-group -->
                            </div>
    




                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Mobile Phone</label>
                                    <input type="text" name="mobile_no" id="mobile_no" class="form-control"
                                        placeholder="">
                                        @error('mobile_no')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Landline</label>
                                    <input type="text" name="landline" id="landline" class="form-control"
                                        placeholder="">
                                        @error('landline')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select class="form-control" name="country" id="countries" style="width: 100%;">
                                        <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                        <option value="USA" {{ old('country') == 'USA' ? 'selected' : '' }}>USA</option>
                                    </select>
                                    @error('country')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Post Code</label>
                                    <input type="text" name="post_code" id="post_code" class="form-control"
                                        placeholder="">
                                        @error('post_code')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Street</label>
                                    <input type="text" name="street" id="street" class="form-control"
                                        placeholder="">
                                        @error('street')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Town</label>
                                    <input type="text" name="town" id="town" class="form-control"
                                        placeholder="">
                                        @error('town')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
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






    <div class="modal fade select2_dp" id="add_lab" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('radiology.add') }}" method="post"> @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Radiology</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Lab Name<span class="clr">*</span></label>
                                    <input type="text" name="lab_name" class="form-control" placeholder="" id="lab_name1" value="{{ old('lab_name') }}" required>
                                    @error('lab_name')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email Address<span class="clr">*</span></label>
                                    <input type="text" name="email" class="form-control" placeholder="" required value="{{ old('email') }}" id="email1">
                                    @error('email')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Password <span class="clr">*</span></label>
                                    <div class="wrap-input">
                                        <input type="password" name="password" id="passwordId" class="form-control password" placeholder="">
                                        <span class="btn-show-pass ico-20 " >
                                            <span class="  eye-pass flaticon-visibility "></span>
                                        </span>
                                    </div>
                                    @error('password')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status" id="status" style="width: 100%;">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>

                                </div>
                            <!-- /.form-group -->
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Add Branch</label>    
    
                                    <select class="form-control form-select" name="selectBranch[]"  style="width: 100%;">
    
                                         <option value="">Select Any One</option>
                                        @forelse ($branchs as $allbranchs)
                                           <option value="{{$allbranchs->id}}">{{$allbranchs->branch_name}}</option>
                                        @empty
    
                                        @endforelse
                                    </select>
                                </div>
                            <!-- /.form-group -->
                            </div>
    





                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Mobile Phone<span class="clr">*</span></label>
                                    <input type="text" name="mobile_no" class="form-control" placeholder="" id="mobile_no1" value="{{ old('mobile_no') }}" minlength="10" maxlength="15">
                                    @error('mobile_no')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Landline</label>
                                    <input type="text" name="landline" class="form-control" placeholder="">
                                    @error('landline')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Country</label>
                                    <select class="form-control" name="country" id="countries1" style="width: 100%;">
                                        <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                        <option value="USA" {{ old('country') == 'USA' ? 'selected' : '' }}>USA</option>
                                    </select>
                                    @error('country')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            <!-- /.form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Post Code</label>
                                    <input type="text" name="post_code" class="form-control" placeholder="" id="post_code1" value="{{ old('post_code') }}" minlength="4" maxlength="8">
                                    @error('post_code')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Street</label>
                                    <input type="text" name="street" class="form-control" placeholder="" id="street1" value="{{ old('street') }}">
                                    @error('street')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Town</label>
                                    <input type="text" name="town" class="form-control" placeholder=""  value="{{ old('town') }}" id="town1">
                                    @error('town')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
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


    <script>
        function openForm() {
            $("#add_lab").modal('show');
        }

        function editForm(id, lab_name, email, mobile_phone, landline, post_code, street, town,status) {
            $('#id').val(id);
            $('#lab_name').val(lab_name);
            $('#email').val(email);
            $('#mobile_no').val(mobile_phone);
            $('#landline').val(landline);
            $('#post_code').val(post_code);
            $('#street').val(street);
            $('#town').val(town);
            $('#status').val(status);

            $("#edit_lab").modal('show');
        }
    </script>
    @push('custom-js')
    <script>
    $(document).ready(function(){
        let id=  $('#id').val();
        @if ($errors->any())

      if(id.length > 0){
        // alert('edit_lab');
        $("#edit_lab").modal('show');
      }else if(id.length == 0){
        // alert('add_lab');
        $("#add_lab").modal('show');
      }

        @endif
      });
      </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {


            // Add event listener for when the modal is hidden
            $('#add_lab').on('hidden.bs.modal', function (e) {
                // Clear all input fields
                $('#lab_name1').val('');
                $('#email1').val('');
                $('#mobile_no1').val('');
                $('#landline1').val('');
                $('#post_code1').val('');
                $('#street1').val('');
                $('#password').val('');
                $('#town1').val('');
                $(".error").remove();


            });




        });
    </script>
    @endpush
@endsection

@extends('superAdmin.superAdminLayout.main')
<!-- Content Wrapper. Contains page content -->
@push('title')
    <title>Create Role & Permission | Super Admin</title>
@endpush
@section('content')
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex">
        <h4 class="page-title">Add Role</h4>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></li> --}}
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('super-admin.dashboard') }}">User Permission</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add User Permission</li>
                </ol>
            </nav>
        </div>
          
		</div>
        <section class="content">
        <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header box_h">
                                <div class="top_section_title">
                                    <h5>Add Role</h5>
                                </div>
                            </div>
                        <div class="box-body">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Role Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
     

                                <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Select Users</label>
                                    <select multiple="" class="form-control testselect2" style="width: 100%;">
                                        <option value="">Jhon</option>
                                        <option value="">Saif</option>
                                        <option value="">Amir</option>
                                        <option value="">Junaid Khan</option>   

                                    </select>
                                </div>
                                </div>


                                


                            </div>

                        </div>
                        <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="submit_btn text-end">
                                <a href="user-permission.php"><button type="button" class="waves-effect waves-light btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Save</button></a>
                            </div>
                        </div>
                    </div>
                  </div>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="box">
                       <div class="box-header box_h">
                            <div class="top_section_title">  
                                <h5>Task </h5>
                            </div>
                        </div>
                        <div class="box-body box_body_h">
                        <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                            <thead>
        
                            <tr>
                                <th>Patient Action </th>
                                <th>View Task</th>
                                <th>Assign Task </th>
                              
                            </tr>
                            </thead>
                            <tbody>
        
                            <tr>
        
                                <td class="text-">Action</td>
                                        @foreach($permission as $key=>$value)
                                        @if ($value->verify_status=='3')
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" name="permission[]" value="{{$value->id}}" type="checkbox" id="autoSizingCheck2a{{$value->id}}" <?php if(in_array($value->id,$array)){ echo "checked";}?>>
                                                <label class="form-check-label" for="autoSizingCheck2a{{$value->id}}">
        
                                                    </label>
                                            </div>
                                        </td>
                                        @endif
                                        @endforeach
                                </td>
        
                            </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
        
            </div>
        </section>
        
      </div>
 </div>
 @endsection


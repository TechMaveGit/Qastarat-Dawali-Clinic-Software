@extends('superAdmin.superAdminLayout.main')
@section('content')
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex">
        <h4 class="page-title">Edit Role & Permission</h4>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">User Permission</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
                </ol>
            </nav>
        </div>
		</div>

        <section class="content">
            <form action="{{ route('permissions.edit', ['id' => $id]) }}" method="post"> @csrf
             <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header box_h">
                                <div class="top_section_title">
                                    <h5>Edit Role</h5>
                                    <input type="hidden" name="role_id" value="{{$id}}"/>
                                </div>
                            </div>
                        <div class="box-body">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Role Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $roleDetail->name}}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>



                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select class="form-control select2" name="status" style="width: 100%;">
                                            <option value="">Select Any One</option>
                                            <option value="1" {{ $roleDetail->status== '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $roleDetail->status== '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('gendar')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
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
                        <h5>Patient</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>

                    <th>Patient Action </th>
                    <th>Add  Patient </th>
                    {{-- <th>Add  Medical Record </th> --}}
                    <th>View Medical Record</th>
                    <th>View Patient</th>
                    {{-- <th>Show Patient </th> --}}
                    <th>Edit Patient </th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>

                        <td class="text-">Action</td>
                                @foreach($permission as $key=>$value)
                                @if ($value->verify_status=='1')
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



          <div class="col-lg-12">
            <div class="box">
               <div class="box-header box_h">
                    <div class="top_section_title">
                        <h5>Invoices </h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>

                    <tr>
                        <th>Patient Action </th>
                        <th>Print Invoice </th>
                        <th>Share Invoice</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>

                        <td class="text-">Action</td>
                                @foreach($permission as $key=>$value)
                                @if ($value->verify_status=='2')
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


          <div class="col-lg-12">
            <div class="box">
               <div class="box-header box_h">
                    <div class="top_section_title">
                        <h5>Calendar</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>

                    <tr>
                        <th>Calendar Action </th>
                        <th>View Calendar</th>

                    </tr>
                    </thead>
                    <tbody>

                    <tr>

                        <td class="text-">Action</td>
                                @foreach($permission as $key=>$value)
                                @if ($value->verify_status=='4')
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
        </section>

      </div>
 </div>


 <script>
    // Disable the "Select Any One" option using JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.querySelector('select[name="status"]');
        const selectAnyOneOption = selectElement.querySelector('option[value=""]');

        if (selectAnyOneOption) {
            selectAnyOneOption.disabled = true;
        }
    });
</script>



 @endsection

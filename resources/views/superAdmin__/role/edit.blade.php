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
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>



                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Description</label>
                                        <textarea name="description" class="form-control">sdfg</textarea>
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
                    <th>View Medical Report</th>
                    <th>View Patient</th>
                    <th>Show Patient </th>
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
                        <h5>Patient Allergies</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>

                    <th>Menu / Action</th>

                    <th>View</th>
                    <th>Add</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td class="text-">Patient Allergies</td>

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
                        <h5>Past Medical History</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>

                    <th>Menu / Action</th>
                    <th>View</th>
                    <th>Add</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <td class="text-">Past Medical History</td>


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
                        <h5>Past Surgical History</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>

                    <th>Menu / Action</th>
                    <th>Add</th>
                    <th>View</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <td class="text-">Past Surgical History</td>

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
                        <h5>Old / Current meds</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>

                    <th>Menu / Action</th>
                    <th>View</th>
                    <th>Add</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <td class="text-">Old / Current meds</td>

                    @foreach($permission as $key=>$value)
                        @if ($value->verify_status=='5')
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="permission[]" value="{{$value->id}}" type="checkbox" id="autoSizingCheck2a{{$value->id}}" <?php if(in_array($value->id,$array)){ echo "checked";}?>>
                                    <label class="form-check-label" for="autoSizingCheck2a{{$value->id}}">

                                    </label>
                            </div>
                            </td>
                        @endif
                        @endforeach

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
                        <h5>List of procedures</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
                        <th>Menu / Action</th>
                        <th>View</th>
                        <th>Add</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <td class="text-">List of procedures</td>


                        @foreach($permission as $key=>$value)
                        @if ($value->verify_status=='6')
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="permission[]" value="{{$value->id}}" type="checkbox" id="autoSizingCheck2a{{$value->id}}" <?php if(in_array($value->id,$array)){ echo "checked";}?>>
                                    <label class="form-check-label" for="autoSizingCheck2a{{$value->id}}">

                                    </label>
                            </div>
                            </td>
                        @endif
                        @endforeach


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
                        <h5>List of Visit</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
                        <th>Menu / Action</th>
                        <th>View</th>
                        <th>Add</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <td class="text-">List of Visit</td>


                        @foreach($permission as $key=>$value)
                        @if ($value->verify_status=='7')
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="permission[]" value="{{$value->id}}" type="checkbox" id="autoSizingCheck2a{{$value->id}}" <?php if(in_array($value->id,$array)){ echo "checked";}?>>
                                    <label class="form-check-label" for="autoSizingCheck2a{{$value->id}}">

                                    </label>
                            </div>
                            </td>
                        @endif
                        @endforeach


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
                        <h5>Referrals</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
                        <th>Menu / Action</th>
                        <th>View</th>
                        <th>Add</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <td class="text-">List of Visit</td>


                        @foreach($permission as $key=>$value)
                            @if ($value->verify_status=='8')
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" name="permission[]" value="{{$value->id}}" type="checkbox" id="autoSizingCheck2a{{$value->id}}" <?php if(in_array($value->id,$array)){ echo "checked";}?>>
                                    <label class="form-check-label" for="autoSizingCheck2a{{$value->id}}">

                                        </label>
                                </div>
                                </td>
                            @endif
                        @endforeach


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
                        <h5>Prescribed Medication</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
                        <th>Menu / Action</th>
                        <th>View</th>
                        <th>Add</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <td class="text-">Prescribed Medication</td>


                        @foreach($permission as $key=>$value)
                        @if ($value->verify_status=='9')
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="permission[]" value="{{$value->id}}" type="checkbox" id="autoSizingCheck2a{{$value->id}}" <?php if(in_array($value->id,$array)){ echo "checked";}?>>
                                    <label class="form-check-label" for="autoSizingCheck2a{{$value->id}}">

                                    </label>
                            </div>
                            </td>
                        @endif
                        @endforeach


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
                        <h5> Order Procedure</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
                        <th>Menu / Action</th>
                        <th>Add</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <td class="text-"> Order Procedure</td>


                        @foreach($permission as $key=>$value)
                        @if ($value->verify_status=='10')
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="permission[]" value="{{$value->id}}" type="checkbox" id="autoSizingCheck2a{{$value->id}}" <?php if(in_array($value->id,$array)){ echo "checked";}?>>
                                    <label class="form-check-label" for="autoSizingCheck2a{{$value->id}}">

                                    </label>
                            </div>
                            </td>
                        @endif
                        @endforeach


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
                        <h5>Order Special Invistigation
                        </h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
                        <th>Menu / Action</th>
                        <th>Add</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <td class="text-">Order Special Invistigation
                    </td>


                        @foreach($permission as $key=>$value)
                        @if ($value->verify_status=='11')
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="permission[]" value="{{$value->id}}" type="checkbox" id="autoSizingCheck2a{{$value->id}}" <?php if(in_array($value->id,$array)){ echo "checked";}?>>
                                    <label class="form-check-label" for="autoSizingCheck2a{{$value->id}}">

                                    </label>
                            </div>
                            </td>
                        @endif
                        @endforeach


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
                        <h5>Future Plans
                        </h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
                        <th>Menu / Action</th>
                        <th>Add</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <td class="text-">Future Plans
                    </td>


                        @foreach($permission as $key=>$value)
                        @if ($value->verify_status=='12')
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="permission[]" value="{{$value->id}}" type="checkbox" id="autoSizingCheck2a{{$value->id}}" <?php if(in_array($value->id,$array)){ echo "checked";}?>>
                                    <label class="form-check-label" for="autoSizingCheck2a{{$value->id}}">

                                    </label>
                            </div>
                            </td>
                        @endif
                        @endforeach


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
                        <h5>Progress Note
                        </h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
                        <th>Menu / Action</th>
                        <th>Add</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <td class="text-">Progress Note
                    </td>


                        @foreach($permission as $key=>$value)
                        @if ($value->verify_status=='13')
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="permission[]" value="{{$value->id}}" type="checkbox" id="autoSizingCheck2a{{$value->id}}" <?php if(in_array($value->id,$array)){ echo "checked";}?>>
                                    <label class="form-check-label" for="autoSizingCheck2a{{$value->id}}">

                                    </label>
                            </div>
                            </td>
                        @endif
                        @endforeach


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
                        <h5>Nurse Task Report
                        </h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
                        <th>Menu / Action</th>
                        <th>View Nurse Task</th>
                        <th>Add Book Appointment</th>
                        <th> View Updated Reports From Lab </th>
                        <th>View Today Appointment</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <td class="text-">Nurse Task Report
                    </td>


                        @foreach($permission as $key=>$value)
                        @if ($value->verify_status=='14')
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="permission[]" value="{{$value->id}}" type="checkbox" id="autoSizingCheck2a{{$value->id}}" <?php if(in_array($value->id,$array)){ echo "checked";}?>>
                                    <label class="form-check-label" for="autoSizingCheck2a{{$value->id}}">

                                    </label>
                            </div>
                            </td>
                        @endif
                        @endforeach


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
                        <h5>Lab Test Patient Test's
                        </h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
                        <th>Menu / Action</th>
                        <th>View Patient Test's</th>
                        <th>Update Report</th>

                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                    <td class="text-">Lab Test Patient Test's
                    </td>

                        @foreach($permission as $key=>$value)
                        @if ($value->verify_status=='15')
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" name="permission[]" value="{{$value->id}}" type="checkbox" id="autoSizingCheck2a{{$value->id}}" <?php if(in_array($value->id,$array)){ echo "checked";}?>>
                                    <label class="form-check-label" for="autoSizingCheck2a{{$value->id}}">

                                    </label>
                            </div>
                            </td>
                        @endif
                        @endforeach


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
 @endsection

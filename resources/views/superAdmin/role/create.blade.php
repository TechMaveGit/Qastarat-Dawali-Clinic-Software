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
                <h4 class="page-title">Add Role & Permission</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('permissions.index') }}">User
                                Permission</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Role & Permission</li>
                    </ol>
                </nav>
            </div>

        </div>
        <section class="content">
            <div class="row">
                <form action="{{ route('permissions.create') }}" method="post">@csrf

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
                                            <input type="text" name="role_type" value="{{ old('role_type') }}"
                                                class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="">
                                        </div>

                                        @if($errors->has('role_type'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('role_type') }}
                                        </div>
                                        @endif
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
                                            <th>Add Patient </th>
                                            {{-- <th>Add Medical Record </th> --}}
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
                                                    <input class="form-check-input" name="permission[]"
                                                        value="{{$value->id}}" type="checkbox"
                                                        id="autoSizingCheck2a{{$value->id}}">
                                                    <label class="form-check-label"
                                                        for="autoSizingCheck2a{{$value->id}}">

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
                                            <th>Invoice Action </th>
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
                                                    <input class="form-check-input" name="permission[]"
                                                        value="{{$value->id}}" type="checkbox"
                                                        id="autoSizingCheck2a{{$value->id}}">
                                                    <label class="form-check-label"
                                                        for="autoSizingCheck2a{{$value->id}}">

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
                                            <th>Task Action </th>
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
                                                    <input class="form-check-input" name="permission[]"
                                                        value="{{$value->id}}" type="checkbox"
                                                        id="autoSizingCheck2a{{$value->id}}">
                                                    <label class="form-check-label"
                                                        for="autoSizingCheck2a{{$value->id}}">
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
                                                    <input class="form-check-input" name="permission[]"
                                                        value="{{$value->id}}" type="checkbox"
                                                        id="autoSizingCheck2a{{$value->id}}">
                                                    <label class="form-check-label"
                                                        for="autoSizingCheck2a{{$value->id}}">
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
                            <button type="submit" class="waves-effect waves-light btn btn-primary"><i
                                    class="fa-regular fa-floppy-disk"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </div>
</div>
@endsection
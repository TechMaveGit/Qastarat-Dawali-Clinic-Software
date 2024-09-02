@extends('superAdmin.superAdminLayout.main')
@push('title')
<title>All Staffs | Super Admin</title>
@endpush
@section('content')
<style>
    .branchcls span {
        border: 1px solid #ececec;
        border-radius: 17px;
        padding: 0px 8px;
        background: #fff;
    }
</style>
<!-- delete Modal -->
<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="btn-close"></button>
            </div>
            <form action="{{route('nurses.nurse_delete')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you Sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                        </div>
                        <input type="hidden" name="common" id="hidden_id" />

                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn w-sm btn-danger">Yes, Delete It! </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end modal -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex">
                <h4 class="page-title">All Staff</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Staff</li>
                    </ol>
                </nav>
            </div>

        </div>
        <section class="content">
            <div class="row">
                <div class="col-lg-12" id="filterBox">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="top_area">
                                <h3 class="box-title">Filter By</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <form>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label">Staff Name</label>
                                            <input type="text" name="stname" value="{{request()->get('stname')}}"
                                                class="form-control" placeholder="Search here">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label">Select Branch</label>
                                            <select multiple class="form-control testselect2" name="branch[]"
                                                style="width: 100%;">
                                                <option value="0">All Branch</option>
                                                @if($branchs)
                                                @foreach($branchs as $value)
                                                <option {{ request()->get('branch') &&
                                                    in_array($value->id,request()->get('branch')) ? 'selected' : '' }}
                                                    value="{{$value->id}}">{{$value->branch_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">

                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select class="form-control select2" name="status" style="width: 100%;">
                                                <option value="0">All Status</option>
                                                <option {{request()->get('status') == "active" ? 'selected' : '' }}
                                                    value="active">Active</option>
                                                <option {{request()->get('status') == "inactive" ? 'selected' : '' }}
                                                    value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label class="form-label" style="visibility: hidden;">-</label>
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                            <a href="{{route('nurses.index')}}" class="btn btn-danger btn-sm">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <div class="top_area">
                                <h3 class="box-title">All Staffs</h3>
                                <div class="filterBntBox">
                                    <a href="#" class="filterbtn" id="FilterBtn">
                                        <iconify-icon icon="mi:filter"></iconify-icon> Filter
                                    </a>
                                    <a href="{{ route('nurses.create') }}"
                                    class="waves-effect waves-light btn btn-md btn-primary"><i
                                        class="fa-solid fa-plus"></i> Add Staff</a>
                                </div>
                               
                            </div>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pt-0">
                            <div class="table-main-box">
                                <table id="custom_table" class="custom_table table  table-striped table-hover"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th hidden></th>
                                            <th>Staff Id</th>
                                            <th> Name</th>
                                            <th>Mobile No.</th>
                                            <th>Email Address</th>
                                            <th>Staff Type</th>
                                            <th>Branch</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        @forelse ($nurse as $allnurse)

                                        <tr>
                                            <td hidden></td>
                                            <td>{{ $allnurse->doctor_id }}</td>
                                            <td>
                                                <div class="patent_detail__">
                                                    <div class="patient_profile">
                                                        @if (isset($allnurse->patient_profile_img))

                                                        <img src="{{ asset('/assets/nurse_profile/' . $allnurse->patient_profile_img) }}"
                                                            alt="">
                                                        @else
                                                        <img src="{{ asset('/superAdmin/images/newimages/avtar.jpg')}}"
                                                            alt="">
                                                        @endif
                                                    </div>
                                                    <div class="patient_name__dt_">
                                                        <h6>{{ $allnurse->name}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $allnurse->dial_code}} {{ $allnurse->mobile_no}}</td>
                                            <td>{{ $allnurse->email}}</td>
                                            @php
                                            $roleName = DB::table('roles')->where('id',$allnurse->role_id)->first();
                                            @endphp
                                            <td>{{ $roleName->name ??''}}</td>


                                            <td>
                                                <span class="branchcls" style="color: #74afe7;">
                                                    @forelse ($allnurse->staffBranch as $getbranchName)

                                                    @if ($getbranchName->branch_type!='patient')
                                                    <span>{{ $getbranchName->userBranchName->branch_name??'' }}</span>

                                                    @endif

                                                    @empty

                                                    @endforelse
                                                </span>

                                            </td>



                                            @if($allnurse->status)
                                            <td>{{ ucfirst($allnurse->status) }}</td>
                                            @else
                                            <td>Inactive</td>
                                            @endif


                                            <td>

                                                <ul class="action_icons">
                                                    <li>
                                                        <a href="{{ route('nurses.view',['id'=>$allnurse->id]) }}"
                                                            class="waves-effect waves-light btn btn-rounded btn-info-light "><i
                                                                data-feather="eye"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('nurses.edit',['id'=>$allnurse->id]) }}"
                                                            class="waves-effect waves-light btn btn-rounded btn-warning-light"><i
                                                                data-feather="edit"></i></a>
                                                    </li>

                                                </ul>



                                                <!-- <div class="btn-group">
                        <a class="hover-primary dropdown-toggle no-caret" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('nurses.edit',['id'=>$allnurse->id]) }}">Edit</a>
                        <a class="dropdown-item" href="{{ route('nurses.view',['id'=>$allnurse->id]) }}">View Detail</a>

                    </div>
                    </div> -->

                                            </td>

                                        </tr>

                                        @empty

                                        @endforelse


                                    </tbody>

                                </table>
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
    function remove_nurse(id)
        {
            var id = id;
            $('#hidden_id').val(id);
            $("#deleteRecordModal").modal('show');
        }
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function(){

        $('#filterBox').hide();
        $('#FilterBtn').click(function(){
            $('#filterBox').toggle ();
        });

});
   
</script>
@endsection
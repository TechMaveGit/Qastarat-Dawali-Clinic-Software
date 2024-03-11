@extends('superAdmin.superAdminLayout.main')
<!-- Content Wrapper. Contains page content -->
@push('title')
    <title>User Permission | Super Admin</title>
@endpush
@section('content')
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex">
        <h4 class="page-title">Manage Role</h4>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Permission</li>
                </ol>
            </nav>
        </div>

		</div>
        <section class="content">
        <div class="row">
        <div class="col-12">

<div class="box">
   <div class="box-header with-border">
    <div class="top_area">
    <h3 class="box-title">All Roles & Permission</h3>
    <a href="{{ route('permissions.create') }}" class="waves-effect waves-light btn btn-md btn-primary"><i class="fa-solid fa-plus"></i> Add New Role</a>
    </div>

   </div>
   <!-- /.box-header -->
   <div class="box-body pt-0">
       <div class="table-main-box">
         <table id="custom_table" class="custom_table table  table-striped table-hover" style="width:100%">
         <thead class="border-top">
                                <tr>

                                    <th class="bg-transparent border-bottom-0">Role Name</th>

                                    <th class="bg-transparent border-bottom-0" style="width: 5%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                             @forelse ($roles as $allroles)


                                <tr class="border-bottom">
                                     <td>{{ $allroles->name }}</td>

                                        <td>
                                                <ul class="action_icons">

                                        <li>
                                                <a href="{{ route('permissions.edit',['id'=>$allroles->id]) }}" class="waves-effect waves-light btn btn-rounded btn-warning-light"><i data-feather="edit"></i></a>
                                            </li>

                                        </ul>
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
@endsection

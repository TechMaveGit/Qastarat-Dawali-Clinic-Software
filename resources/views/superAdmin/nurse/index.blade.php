@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>All Nurses | Super Admin</title>
@endpush
@section('content')
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex">
        <h4 class="page-title">All Nurse</h4>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('nurses.index') }}">Staff</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nurse</li>
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
    <h3 class="box-title">All Nurse</h3>
    <a href="{{ route('nurses.create') }}" class="waves-effect waves-light btn btn-md btn-primary"><i class="fa-solid fa-plus"></i> Add Nurse</a>
    </div>

   </div>
   <!-- /.box-header -->
   <div class="box-body pt-0">
       <div class="table-main-box">
         <table id="custom_table" class="custom_table table  table-striped table-hover" style="width:100%">
           <thead>
               <tr>
                   <th>Nurse Id</th>
                   <th>Nurse Name</th>
                   <th>Mobile No.</th>
                   <th>Email Address</th>
                   <th>Postal Code</th>
                   <th>Action</th>

               </tr>
           </thead>
           <tbody>


            @forelse ($nurse as $allnurse)

               <tr>
                   <td>{{ $allnurse->doctor_id }}</td>
                   <td>
                   <div class="patent_detail__">
                    <div class="patient_profile">
                        <img src="images/newimages/avtar.jpg" alt="">
                    </div>
                    <div class="patient_name__dt_">
                        <h6>{{ $allnurse->name}}</h6>
                    </div>
                    </div>
                   </td>
                   <td>{{ $allnurse->mobile_no}}</td>
                   <td>{{ $allnurse->email}}</td>
                   <td>{{ $allnurse->post_code}}</td>
                   <td>
                   <div class="btn-group">
                        <a class="hover-primary dropdown-toggle no-caret" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="#">View Details</a> -->
                        <a class="dropdown-item" href="{{ route('nurses.edit',['id'=>$allnurse->id]) }}">Edit</a>
                        {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                        </div>
                    </div>

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

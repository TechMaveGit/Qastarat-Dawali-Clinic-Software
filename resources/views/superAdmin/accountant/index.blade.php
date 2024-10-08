@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>All Accountants | Super Admin</title>
@endpush
@section('content')
<!-- delete Modal -->
<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <form action="{{route('accountants.accountant_delete')}}" method="POST">
                @csrf
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you Sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                    </div>
                    <input type="hidden" name="common" id="hidden_id"/>

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
        <h4 class="page-title">All Accountant</h4>
        {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('accountants.index') }}">Staff</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Accountant</li>
                </ol>
            </nav> --}}
        </div>

		</div>
        <section class="content">
        <div class="row">
        <div class="col-12">

<div class="box">
   <div class="box-header with-border">
    <div class="top_area">
    <h3 class="box-title">All Accountant</h3>
    <a href="{{ route('accountants.create') }}" class="waves-effect waves-light btn btn-md btn-primary"><i class="fa-solid fa-plus"></i> Add Accountant</a>
    </div>

   </div>
   <!-- /.box-header -->
   <div class="box-body pt-0">
       <div class="table-main-box">
         <table id="custom_table" class="custom_table table  table-striped table-hover" style="width:100%">
           <thead>
               <tr>
                <th hidden></th>
                   <th>Acc. Id</th>
                   <th>Acc. Name</th>
                   <th>Mobile No.</th>
                   <th>Email Address</th>
                   <th>Postal Code</th>
                   <th>Action</th>

               </tr>
           </thead>
           <tbody>


            @forelse ($accountant as $allaccountant)

            <tr>
                <td hidden></td>
                <td>{{ $allaccountant->doctor_id }}</td>
                <td>
                <div class="patent_detail__">
                 <div class="patient_profile">
                    @if (isset($allaccountant->patient_profile_img))

                    <img src="{{ asset('/assets/accountant_profile/' . $allaccountant->patient_profile_img) }}" alt="">
                    @else
                    <img src="{{ asset('/superAdmin/images/newimages/avtar.jpg')}}" alt="">
                    @endif
                 </div>
                 <div class="patient_name__dt_">
                     <h6>{{ $allaccountant->name}}</h6>
                 </div>
                 </div>
                </td>
                <td>{{ $allaccountant->dial_code}} {{ $allaccountant->mobile_no}}</td>
                <td>{{ $allaccountant->email}}</td>
                <td>{{ $allaccountant->post_code}}</td>
                <td>
                <div class="btn-group">
                     <a class="hover-primary dropdown-toggle no-caret" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                     <div class="dropdown-menu">
                     <!-- <a class="dropdown-item" href="#">View Details</a> -->
                     <a class="dropdown-item" href="{{ route('accountants.edit',['id'=>$allaccountant->id]) }}">Edit</a>
                     <a  onclick="remove_accountant({{ $allaccountant->id }})" class="dropdown-item">Delete</a>
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
 <script>
    function remove_accountant(id)
        {
            var id = id;
            $('#hidden_id').val(id);
            $("#deleteRecordModal").modal('show');
        }
    </script>
@endsection

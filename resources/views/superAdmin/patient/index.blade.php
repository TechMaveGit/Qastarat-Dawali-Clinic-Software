@extends('superAdmin.superAdminLayout.main')

@push('title')

    <title>All Patients | Super Admin</title>

@endpush

@section('content')



   <!-- delete Modal -->
   <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <form action="{{route('patients.patient_delete')}}" method="POST">
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


       
        </div>



		</div>

        <section class="content">

        <div class="row">

        <div class="col-12">



<div class="box">

   <div class="box-header with-border">

    <div class="top_area">

    <h3 class="box-title">All Patients</h3>

    <a href="{{ route('patients.create') }}" class="waves-effect waves-light btn btn-md btn-primary"><i class="fa-solid fa-plus"></i> Add Patient</a>

    </div>



   </div>

   <!-- /.box-header -->

   <div class="box-body pt-0">

       <div class="table-main-box">

         <table id="custom_table" class="custom_table table  table-striped table-hover" style="width:100%">

           <thead>

               <tr>

                   <th>Id</th>

                   <th>Patient Id</th>

                   <th>Patient Name</th>

                   <th>Mobile No.</th>

                   <th>Email Address</th>

                   <th>Postal Code</th>

                   <th>Assigned Doctor</th>

                   <th>Status</th>

                   <th>Action</th>



               </tr>

           </thead>

           <tbody>


             @forelse($users as $key => $allUsers)

               <tr>

                   <td>{{ $loop->iteration }}</td>

                   <td>{{ $allUsers->patient_id }}</td>

                   <td>

                   <div class="patent_detail__">

                    <div class="patient_profile">


                        @if ($allUsers->patient_profile_img)

                        <img src="{{ asset('/public/assets/patient_profile/' . $allUsers->patient_profile_img) }}" alt="">

                        @else
                        <img src="{{ asset('public/superAdmin/images/newimages/avtar.jpg')}}" alt="">

                        @endif

                    </div>

                    <div class="patient_name__dt_">

                        <h6>{{ $allUsers->name }}</h6>

                    </div>

                    </div>

                   </td>

                   <td>{{ $allUsers->mobile_no }}</td>

                   <td>{{ $allUsers->email }}</td>

                   <td>{{ $allUsers->post_code }}</td>

                   @php
                      $doctorName= DB::table('doctors')->where('id',$allUsers->doctor_id)->first();
                   @endphp
                   <td>{{ $doctorName->name??'' }}</td>

                   <td>{{ $allUsers->status == '1' ? 'Active' : 'Inactive' }}</td>

                   <td>


                   <ul class="action_icons">
                        <li >
                            <a href="{{ route('patients.view', ['id' => $allUsers->id]) }}" class="waves-effect waves-light btn btn-rounded btn-info-light "><i data-feather="eye"></i></a>
                        </li>
                        <li>
                                <a href="{{ route('patients.edit',['id'=>$allUsers->id]) }}" class="waves-effect waves-light btn btn-rounded btn-warning-light"><i data-feather="edit"></i></a>
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


 <script>
    function remove_patient(id)
        {
            var id = id;
            $('#hidden_id').val(id);
            $("#deleteRecordModal").modal('show');
        }
    </script>


@endsection

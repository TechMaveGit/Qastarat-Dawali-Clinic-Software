@extends('superAdmin.superAdminLayout.main')
@push('title')
<title>All Branch | Super Admin</title>
@endpush
@section('content')

<div class="content-wrapper">
    <div class="container-full">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="d-flex">
      <h4 class="page-title">Branch Management</h4>
      {{-- <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Branch Management</li>
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
  <h3 class="box-title">All Branches</h3>
  <a href="#" class="waves-effect waves-light btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#add_lab"><i class="fa-solid fa-plus"></i> Add Branch</a>
  </div>

 </div>
 <!-- /.box-header -->
 <div class="box-body pt-0">
     <div class="table-main-box">
       <table id="custom_table" class="custom_table table  table-striped table-hover" style="width:100%">
         <thead>
             <tr>
                 <th>Branch Name</th>
                 <th>Phone No.</th>
                 <th>Address</th>
                 <th>Status</th>
                 <th>Action</th>
             </tr>
         </thead>
         <tbody>

          @forelse ($branch as $allbranch)

             <tr>
                 <td>{{ $allbranch->branch_name }}</td>
                <td>{{ $allbranch->phone_no }}</td>
                <td>{{ $allbranch->address }}</td>
                <td>
                    @if($allbranch->status=='1')
                        Active
                    @else
                        Inactive
                    @endif
                </td>
                <td>
                    <ul class="action_icons">
                       <li>
                          <a onclick="editForm('{{ $allbranch->id }}',`{{ $allbranch->branch_name }}`,`{{ $allbranch->phone_no }}`,`{{ $allbranch->address }}`,`{{ $allbranch->status }}`)" class="waves-effect waves-light btn btn-rounded btn-warning-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></a>
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




<!-- Modal -->
<div class="modal fade select2_dp" id="edit_lab" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <form action="{{ route('branch.management.edit') }}" method="post">
          @csrf
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Branch
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                <div class="row">
                   <div class="col-md-6">
                      <div class="form-group">
                         <label class="form-label">Branch Name</label>
                         <input type="hidden" name="id" id="id"  class="form-control" placeholder="">
                         <input type="text" name="branch_name" id="lab_name" class="form-control" placeholder="" required>
                      </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                         <label class="form-label">Phone No</label>

                         <input type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" placeholder="" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                         minlength="0" maxlength="15" name="phone_no" id="phone_no__" pattern="[0-9]{10,15}">

                         {{-- <input type="text" name="phone_no"  id="phone_no" class="form-control" placeholder="Phone No"> --}}
                        </div>
                   </div>
                   <div class="col-md-6">
                      <div class="form-group">
                         <label class="form-label">Address</label>
                         <input type="text" name="address"  id="phone" class="form-control" placeholder="" required>
                      </div>
                   </div>


                   <div class="col-md-6">
                    <div class="form-group">
                       <label class="form-label">Status</label>

                       <select class="form-control" name="status" id="status" style="width: 100%;">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>

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


 <div class="modal fade select2_dp" id="add_lab" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
     <form action="{{ route('branch.management.add') }}" method="post"> @csrf

 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title" id="exampleModalLabel">Add Branch</h5>
 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 </div>

 <div class="modal-body">
 <div class="row">
 <div class="col-md-6">
 <div class="form-group">
 <label class="form-label">Branch Name
</label>
 <input type="text" name="branch_name" class="form-control" placeholder="" required>
 </div>
 </div>
 <div class="col-md-6">
 <div class="form-group">
 <label class="form-label">Phone No.
</label>
 <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="" required>
 </div>
 </div>
 <div class="col-md-6">
 <div class="form-group">
 <label class="form-label">Address</label>
 <input type="text" name="address" class="form-control" placeholder="" required>
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
    function openForm()
    {
        $("#add_lab").modal('show');
    }
    function editForm(id,lab_name,phone_no,address,status)
    {

        $('#id').val(id);
        $('#lab_name').val(lab_name);
        $('#phone').val(address);
        $('#phone_no__').val(phone_no);
        $('#status').val(status);
        $("#edit_lab").modal('show');
    }
 </script>



<script>
    // Get the input element by its ID
    const phoneInput = document.getElementById('phone_no');

    // Add an event listener for the keypress event
    phoneInput.addEventListener('keypress', function(event) {
        // Get the value of the pressed key
        const key = event.key;

        // Check if the key pressed is a numeric character (0-9)
        if (!isNumeric(key)) {
            // If it's not a numeric character, prevent the default action (typing the character)
            event.preventDefault();
        }
    });

    // Helper function to check if a character is numeric
    function isNumeric(char) {
        return /^\d+$/.test(char);
    }
</script>


<script>
    // Get the input element by its ID
    const phoneInput1 = document.getElementById('phone_no1');

    // Add an event listener for the keypress event
    phoneInput1.addEventListener('keypress', function(event) {
        // Get the value of the pressed key
        const key = event.key;

        // Check if the key pressed is a numeric character (0-9)
        if (!isNumeric(key)) {
            // If it's not a numeric character, prevent the default action (typing the character)
            event.preventDefault();
        }
    });

    // Helper function to check if a character is numeric
    function isNumeric(char) {
        return /^\d+$/.test(char);
    }
</script>



@endsection

@extends('superAdmin.partical.main')
@push('title')
    <title>All Other Price | Super Admin</title>
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header edit_title_head mb-0">
                <div class="d-flex">
                    <h4 class="page-title lab_name">All Other Expense</h4>
                    {{-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Expense</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Expense</li>
                        </ol>
                    </nav> --}}
                </div>
                <!-- <a href="manage-lab.php" class="waves-effect waves-light btn btn-md btn-primary"><i class="fa-solid fa-gears"></i> Manage Lab</a> -->
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <div class="top_area">
                                    <h3 class="box-title">All Expense</h3>
                                    <a onclick="openForm()" class="waves-effect waves-light btn btn-md btn-primary"><i
                                            class="fa-solid fa-plus"></i> Add New Expense</a>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-main-box">
                                            <table id="custom_table" class="custom_table table  table-striped table-hover"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>

                                                            Expense Type</th>
                                                        <th>Price </th>

                                                        <th>Status</th>

                                                         <th>Create Date </th>

                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allexpenses as $key => $allexpenses)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $allexpenses->expense_type }}</td>
                                                            <td>{{ $allexpenses->price }}</td>
                                                             <td>{{ ucfirst($allexpenses->status) }}</td>
                                                            <td>{{ date('Y-m-d', strtotime($allexpenses->created_at)) }}</td>
                                                            <td>
                                                               <ul class="action_icons">

                                                                    <li>
                                                                        <a onclick="editForm('{{ $allexpenses->id }}','{{ $allexpenses->expense_type }}','{{ $allexpenses->price }}')" class="waves-effect waves-light btn btn-rounded btn-warning-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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

    {{-- add db --}}
    <div class="modal fade select2_dp" id="add_lab" tabindex="-1" aria-labelledby="exampleModalLabel12" aria-hidden="true">

      <div class="modal-dialog">
       <form action="{{ route('expense.add') }}" method="post">
          @csrf
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel12">Add Other Expense
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

              </div>


              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="form-label">Expense Type
                              </label>
                              <input type="text" name="expense_type" class="form-control" placeholder="" required>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="form-label">Price</label>
                              <input type="text" name="price" class="form-control" placeholder="" required>
                          </div>
                      </div>



                      <!-- /.form-group -->
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
    <!-- Modal -->
    <div class="modal fade select2_dp" id="edit_lab" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

         <form action="{{ route('expense.edit') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Expense Type </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Expense Type
                                </label>
                                <input type="hidden" name="id" id="id" class="form-control" placeholder="">
                                <input type="text" id="expense_type" class="form-control" placeholder="" name="expense_type">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Price
                                </label>
                                <input type="text" name="price" id="price" class="form-control"
                                    placeholder="">
                            </div>
                        </div>

                         <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status" id="countries1" style="width: 100%;">
                                        <option value="">Select Any One</option>
                                        <option value="active" >Active</option>
                                        <option value="inactive" >Inactive</option>
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







    <script>
        function openForm() {
            $("#add_lab").modal('show');
        }

        function editForm(id, expense_type, price) {
            $('#id').val(id);
            $('#expense_type').val(expense_type);
            $('#price').val(price);
            $("#edit_lab").modal('show');
        }
    </script>
@endsection

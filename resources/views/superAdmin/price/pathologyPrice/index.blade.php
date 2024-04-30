@extends('superAdmin.partical.main')
@push('title')
    <title>Pathology Price List  | Super Admin</title>
@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
  <!-- Content Header (Page header) -->
  <div class="content-header ">
      <div class="d-flex">
      <h4 class="page-title lab_name">All Pathology Tests & Price</h4>
      <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Pathology Price</li>
              </ol>
          </nav>
      </div>

      </div>
      <section class="content">
      <div class="row">


          <div class="col-12">
          <div class="box">
              <div class="box-body">
                  <div class="row">
                  <div class="col-lg-12 mt-2">
                          <div class="title_head edit_title_head mb-3">
                              <h4>Pathology Tests & Price</h4>
                              <a href="{{ route('price.addPathologyPrice') }}" class="waves-effect waves-light btn btn-md btn-primary"><i class="fa-solid fa-plus"></i> Add New Tests</a>
                              <!-- <div class="add_price_btn edit_btn_info">
                              <a href="#"><i data-feather="plus-circle"></i> Add New Tests</a>
                          </div> -->
                          </div>
                      </div>

                      <div class="col-lg-12">
                      <div class="table-main-box">
                         <table id="custom_table" class="custom_table table  table-striped table-hover" style="width:100%">
                                          <thead>
                                              <tr>
                                                  <th>S.No</th>
                                                  <th>Test Name</th>
                                                  <th>Test Code</th>
                                                  <th>Included Tests</th>
                                                  <th>Turnaround</th>
                                                  <th>Note</th>
                                                  <th>Price</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>


                                            @forelse ($pathology_price_list as $key=>$allpathology_price_list)


                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $allpathology_price_list->test_name }}</td>
                                                    <td>{{ $allpathology_price_list->test_code }}</td>
                                                    <td>{{ $allpathology_price_list->included_tests }}</td>
                                                    <td>{{ $allpathology_price_list->turnaround }}</td>
                                                    <td>{{ $allpathology_price_list->note }}</td>
                                                    <td>AED {{ $allpathology_price_list->price }}</td>
                                                    <td>
                                                    <ul class="action_icons">

                                                    <li>
                                                        <a onclick="editForm('{{ $allpathology_price_list->id }}','{{ $allpathology_price_list->test_name }}', '{{ $allpathology_price_list->test_code }}', '{{ $allpathology_price_list->included_tests }}', '{{ $allpathology_price_list->turnaround }}', '{{ $allpathology_price_list->note }}', '{{ $allpathology_price_list->price }}')" class="waves-effect waves-light btn btn-rounded btn-warning-light">
                                                            <i data-feather="edit"></i>
                                                        </a>
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

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Launch demo modal
</button> -->




<div class="modal fade" id="edit_test_info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">

       <form action="{{ route('price.pathologyPriceList') }}" method="post" /> @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Test Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                <div class="row">
                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Test Name</label>
                                    <input type="text" class="form-control" name="test_name" id="lab_name" placeholder="">
                                    <input type="hidden" name="id" id="id"/>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Test Code</label>
                                    <input type="text" name="test_code" class="form-control" id="test_code" placeholder="">
                                </div>
                                </div>

                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Turnaround</label>
                                    <input type="text" class="form-control" name="turnaround" id="turnaround" placeholder="">
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="">
                                </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
                                            <label class="form-label">Included Tests</label>
                                            <textarea rows="2" class="form-control" name="included_tests" id="included_tests" placeholder=""></textarea>
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
                                            <label class="form-label">Note</label>
                                            <textarea rows="2" id="note" name="note" class="form-control" placeholder=""></textarea>
                                        </div>
                                </div>
                </div>

                </div>
                <div class="modal-footer text-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
      </form>


</div>
</div>

<script>
    function editForm(id,test_name,test_code,included_tests,turnaround,note,price)
    {
        $('#id').val(id);
        $('#lab_name').val(test_name);
        $('#test_code').val(test_code);
        $('#included_tests').val(included_tests);
        $('#turnaround').val(turnaround);
        $('#note').val(note);
        $('#price').val(price);
        $("#edit_test_info").modal('show');
    }
 </script>
@endsection

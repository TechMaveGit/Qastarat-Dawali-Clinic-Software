@extends('superAdmin.partical.main')
@push('title')
<title>All Nurses | Super Admin</title>
@endpush
@section('content')

<style>
.bg_color_ghi {
    padding: 10px;
    border-radius: 50px;
}
    </style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
  <!-- Content Header (Page header) -->
  <div class="content-header ">
      <div class="d-flex">
      <h4 class="page-title lab_name">All Appointments & Services  </h4>
      <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Appointments & services</li>
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
                              <h4>Appointments & services</h4>
                              <a href="{{ route('price.addradiologyPrice') }}" class="waves-effect waves-light btn btn-md btn-primary"><i class="fa-solid fa-plus"></i> Add More</a>
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
                                                <th hidden></th>
                                                  <th>S.No</th>
                                                  <th>Test Name</th>
                                                  <th>Test Code</th>
                                                  <th>Included Tests</th>
                                                  <th>Turnaround</th>
                                                  <th>Note</th>
                                                  <th>Type</th>
                                                  <th>Price</th>
                                                  <th>Created Date</th>
                                                  <th>Status</th>
                                                  <th>Colour</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>


                                            @forelse ($pathology_price_list as $key=>$allpathology_price_list)


                                                <tr>
                                                    <td hidden></td>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $allpathology_price_list->test_name }}</td>
                                                    <td>{{ $allpathology_price_list->test_code }}</td>
                                                    <td>{{ $allpathology_price_list->included_tests }}</td>
                                                    <td>{{ $allpathology_price_list->turnaround }}</td>
                                                    <td>{{ $allpathology_price_list->note }}</td>
                                                    <td>
                                                        @if ($allpathology_price_list->price_type=='0')
                                                        Pathology
                                                        @elseif($allpathology_price_list->price_type=='1')
                                                        Radiology
                                                        @elseif($allpathology_price_list->price_type=='2')
                                                        Other
                                                        @else
                                                        ---
                                                        @endif
                                                    </td>
                                                    <td>{{env('SHOW_CURRENCY')}} {{ $allpathology_price_list->price }}</td>
                                                    {{-- <td>{{ $allpathology_price_list->created_at->format('Y-m-d') }}</td> --}}
                                                    <td>{{ \Carbon\Carbon::parse($allpathology_price_list->created_at)->format('Y-m-d') }}</td>
                                                    <td>{{ $allpathology_price_list->status== '1' ? 'Active' : 'Inactive' }}</td>
                                                    <td> <div class="bg_color_ghi" style="background-color: {{ $allpathology_price_list->colour_type }}"></div>
                                                    </td>
                                                    <td>
                                                    <ul class="action_icons">
                                                        <li>
                                                            <a onclick="editForm('{{ $allpathology_price_list->id }}','{{ $allpathology_price_list->test_name }}', '{{ $allpathology_price_list->test_code }}', '{{ $allpathology_price_list->included_tests }}', '{{ $allpathology_price_list->turnaround }}', '{{ $allpathology_price_list->note }}', '{{ $allpathology_price_list->price }}', '{{ $allpathology_price_list->price_type }}', '{{ $allpathology_price_list->status }}','{{ $allpathology_price_list->colour_type }}')" class="waves-effect waves-light btn btn-rounded btn-warning-light">
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

       <form action="{{ route('price.pathologyPriceList') }}" method="post" > @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Test Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                <div class="row">
                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Test Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="test_name" id="lab_name" placeholder="" required>
                                    <input type="hidden" name="id" id="id"/>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Test Code <span class="required">*</span></label>
                                    <input type="text" name="test_code" class="form-control" id="test_code" placeholder="" required>
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
                                    <label class="form-label">Price <span class="required">*</span></label>
                                    {{-- <input type="number" name="price" step="0.01" min="0" id="price" class="form-control" placeholder=""> --}}
                                    <input type="number" name="price" step="0.01" min="0" id="price" class="form-control" placeholder="">
                                    {{-- <input type="text" class="form-control" name="price" id="price" placeholder="" required> --}}
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
                                                <textarea rows="2" id="note" name="note" maxlength="100" class="form-control" placeholder=""></textarea>
                                            </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Type <span class="required">*</span></label>
                                        <select class="form-control" id="mulipleType" name="price_type" style="width: 100%;" required>
                                            <option value="11">Select Any One</option>
                                            <option value="0">Pathology</option>
                                            <option value="1">Radiology</option>
                                            <option value="2">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Status <span class="required">*</span></label>
                                        <select class="form-control" id="statusId" name="status" style="width: 100%;">
                                            <option value="">Select Any One</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-lg-6">
                                    <div class="inner_element">
                                        <div class="form-group">
                                            <label class="form-label">Colour Code</label>
                                            {{-- <img style="min-width:16px;min-height:16px;box-sizing:unset;box-shadow:none;background:unset;padding:0 6px 0 0;cursor:pointer;" src="chrome-extension://ohcpnigalekghcmgcdcenkpelffpdolg/img/icon16.png" title="Select with ColorPick Eyedropper - See advanced option: &quot;Add ColorPick Eyedropper near input[type=color] fields on websites&quot;" class="colorpick-eyedropper-input-trigger"> --}}
                                            <input type="color" name="colour_type" id="colourId" class="colorpicker form-control" colorpick-eyedropper-active="true">
                                        </div>
                                    </div>
                                  </div>
            
                                   <br>
                                  </br>



                        </div>

                </div>

                <div class="modal-footer text-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </div>

            </div>
      </form>


</div>
</div>


<script>
    function editForm(id,test_name,test_code,included_tests,turnaround,note,price,price_type,status,colourId)
    {
        $('#id').val(id);
        $('#lab_name').val(test_name);
        $('#test_code').val(test_code);
        $('#included_tests').val(included_tests);
        $('#turnaround').val(turnaround);
        $('#note').val(note);
        $('#price').val(price);
        $('#mulipleType').val(price_type);
        $('#statusId').val(status);
        $('#colourId').val(colourId);
        $("#edit_test_info").modal('show');
    }
 </script>



<script>
    // Disable the "Select Any One" option using JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.querySelector('select[name="type[]"]');
        const selectAnyOneOption = selectElement.querySelector('option[value="11"]');

        if (selectAnyOneOption) {
            selectAnyOneOption.disabled = true;
        }
    });
</script>



@endsection

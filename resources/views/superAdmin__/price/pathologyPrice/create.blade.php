@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Add pathology price  | Super Admin</title>
@endpush
@section('content')



<div class="content-wrapper">
    <div class="container-full">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="d-flex">
      <h4 class="page-title lab_name">Add Pathology Test & Price</h4>
      <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Price Management</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="#">Pathology Price</a></li>

              </ol>
          </nav>
      </div>

      </div>
      <section class="content">
      <div class="row">


          <div class="col-12">
          <div class="box">

            <form action="{{ route('price.addPathologyPrice') }}" method="post">@csrf


              <div class="box-body">
                  <div class="row">
                  <div class="col-lg-12 mt-2">
                          <div class="title_head">
                              <h4>Add Lab Test And Price</h4>
                          </div>
                      </div>

                     <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Test Name</label>
                          <input type="text" name="test_name[]" id="test_name" class="form-control" placeholder="" >
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Test Code</label>
                          <input type="text" name="test_code[]" name="test_code" id="test_code" class="form-control" placeholder="">
                      </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Turnaround</label>
                          <input type="text" name="turnaround[]" id="turnaround" class="form-control" placeholder="">
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                          <label class="form-label">Price</label>
                          <input type="number" min="0" name="price[]" id="price" class="form-control" placeholder="" >
                      </div>
                      </div>
                      <div class="col-lg-6">
                      <div class="form-group">
                                <label class="form-label">Included Tests</label>
                                <textarea rows="2" name="included_tests[]" id="included_tests" class="form-control" placeholder=""></textarea>
                              </div>
                      </div>
                      <div class="col-lg-6">
                      <div class="form-group">
                                <label class="form-label">Note</label>
                                <textarea rows="2" name="note[]"  id="note" class="form-control" placeholder=""></textarea>
                              </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="add_price_btn">
                              <a onclick="addNewRate()"><i data-feather="plus-circle"></i> Add Test</a>
                          </div>
                      </div>
                      <div class="col-lg-12" id="test_list">
                                  <table class="table lab_test table-striped table-hover" style="width:100%">
                                          <thead>
                                              <tr>
                                                  <th>Test Name</th>
                                                  <th>Test Code</th>
                                                  <th>Included Tests</th>
                                                  <th>Turnaround</th>
                                                  <th>Note</th>
                                                  <th>Price</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>

                                                <tbody id="addNewAppendRate">

                                                </tbody>

                                      </table>
                               </div>




                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="submit_btn text-end">
                            <button type="submit" class="waves-effect waves-light btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                          </div>
                      </div>
                  </div>
                </div>
               </form>
              </div>
              <!-- /.box -->
          </div>

        </div>
      </section>

    </div>
</div>

<script>

function addNewRate()
     {

    let test_name      = $("#test_name").val();
    let test_code      = $("#test_code").val();
    let turnaround     = $("#turnaround").val();
    let price          = $("#price").val();
    let included_tests = $("#included_tests").val();
    let note           = $("#note").val();

    var selectType= document.getElementById('test_name').value;
    if(selectType == ''){
            $("#selectTypeId").attr('hidden',false);
            return false;
        }
        else{
            $("#selectTypeId").attr('hidden',true);
        }


        let microtime = Date.now();
        let addressHtml = `<tr id="address${microtime}">
                                    <td hidden>
                                        <input name="test_name[]" hidden value="${test_name}">
                                        <input name="test_code[]" hidden value="${test_code}">
                                        <input name="turnaround[]" hidden value="${turnaround}">
                                        <input name="price[]" hidden value="${price}">
                                        <input name="included_tests[]" hidden value="${included_tests}">
                                        <input name="note[]" hidden value="${note}">
                                    </td>
                                    <td>
                                        ${test_name}
                                    </td>
                                    <td>
                                        ${test_code}
                                    </td>
                                    <td>
                                    ${turnaround}
                                   </td>
                                    <td>
                                        ${price}
                                    </td>
                                    <td>
                                        ${included_tests}
                                    </td>
                                    <td>
                                        ${note}
                                    </td>
                                    <td>
                                    <ul class="action_icons">
                                           <li>
                                                <a href="#" id="remove_test" class="waves-effect waves-light btn btn-rounded btn-danger-light" onclick="deleteTabletr('address${microtime}')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                            </li>
                                        </ul>
                                    </td>

                            </tr>`;
        $("#addNewAppendRate").append(addressHtml);
        resetAddress();
  }

  function deleteTabletr(tabletr,filenumber='none'){
        $(`#${tabletr}`).remove();
        if(filenumber != 'none'){
            $(`#documentFilesDocsDiv${filenumber}`).remove();
        }
    }



  function resetAddress(){
        $("#test_name").val('');
        $("#test_code").val('');
        $("#turnaround").val('');
        $("#price").val('');
        $("#included_tests").val('');
        $("#note").val('');
       
    }


</script>

<script>
    $(document).ready(function(){
        $("#test_list").hide();
        $("#add_test").click(function(){
            $("#test_list").show();
        })
        $("#remove_test").click(function(){
            $("#test_list").hide();
        })
$()


    })
 </script>


 @endsection

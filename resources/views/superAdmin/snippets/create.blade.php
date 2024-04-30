
@extends('superAdmin.superAdminLayout.main')
<!-- Content Wrapper. Contains page content -->
@push('title')
    <title>add-snippets</title>
@endpush
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="d-flex">
      <h4 class="page-title lab_name">Add Snippet</h4>
      <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Add New Snippet</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="#">Add Snippet</a></li>
               
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
                          <div class="title_head">
                              <h4>Add New Snippet</h4>
                          </div>
                      </div>
          
                     <div class="col-md-6">
                      <div class="form-group">
                          <label class="form-label">Type a new context</label>
                          <input type="text" class="form-control" placeholder="">
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group">
                          <label class="form-label">Give your Snippet Title</label>
                          <input type="text" class="form-control" placeholder="">
                      </div>
                      </div>
                  
                 
                      <div class="col-lg-12">
                      <div class="form-group">
                                <label class="form-label">Type or paste in your text snippet here..</label>
                                <textarea rows="4" class="form-control" placeholder=""></textarea>
                              </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="add_price_btn">
                              <a href="#" id="add_test"><i data-feather="plus-circle"></i> Add Snippet</a>
                          </div>
                      </div>
                      <div class="col-lg-12" id="test_list">
                                  <table class="table lab_test table-striped table-hover" style="width:100%">
                                          <thead>
                                              <tr>
                                                  {{-- <th>Context Title</th>
                                                  <th>Snippet Title</th> --}}
                                                  <th>Snippet Content</th>
                                                 <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          <tr>
                                          {{-- <td>Notes</td>
                                          <td>EVLT-GSV</td> --}}
                                          <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum accusamus voluptates ab at consectetur suscipit in impedit excepturi cupiditate similique?</td>
                                              <td>
                                              <ul class="action_icons">
                                                  <!-- <li >
                                                      <a href="#" class="waves-effect waves-light btn btn-rounded btn-info-light "><i data-feather="eye"></i></a>
                                                  </li> -->
                                                  <!-- <li>
                                                          <a href="role-edit.php" class="waves-effect waves-light btn btn-rounded btn-warning-light"><i data-feather="edit"></i></a>
                                                      </li> -->
                                                      <li>
                                                          <a href="#" id="remove_test" class="waves-effect waves-light btn btn-rounded btn-danger-light"><i  data-feather="trash-2"></i></a>
                                                      </li>
                                                  </ul>
                                              </td>
                                          </tr>
                                  
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
                              <a href="snippets.php"><button type="button" class="waves-effect waves-light btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Save</button></a>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <!-- /.box -->      
          </div>
        </div>
      </section>
      
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#test_list").hide();
        $("#add_test").click(function(){
            $("#test_list").show();
        })
        $("#remove_test").click(function(){
            $("#test_list").hide();
        })
        
    })
 </script>
 
@endsection
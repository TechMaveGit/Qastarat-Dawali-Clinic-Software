@extends('superAdmin.superAdminLayout.main')
<!-- Content Wrapper. Contains page content -->
@push('title')
    <title>Edit Snippets</title>
@endpush
@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="d-flex">
      <h4 class="page-title lab_name">Edit Snippet</h4>
      <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('snippets')}}">All Snippets</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Snippet</li>

              </ol>
          </nav>
      </div>

      </div>
      <section class="content">
      <div class="row">


          <div class="col-12">

            <form action="{{ route('edit.snippets', ['id' => $snippets->id]) }}" method="POST"> @csrf

             <div class="box">
              <div class="box-body">
                  <div class="row">
                  <div class="col-lg-12 mt-2">
                          <div class="title_head">
                              <h4>Edit Snippet</h4>
                          </div>
                      </div>
                      @php
                      $allTemplate = DB::table('progress_note_canned_text')->where('id',$snippets->progress_note_canned_text_id)->first();
                    @endphp

                     <div class="col-md-6">
                      <div class="form-group">
                          <label class="form-label">Type a new context</label>
                          <input type="text"  value="{{ $allTemplate->canned_name??''}}" class="form-control" placeholder="" readonly>
                      </div>
                      </div>


                      <div class="col-lg-12">
                      <div class="form-group">
                                <label class="form-label">Type or paste in your text snippet here..</label>
                                <textarea rows="8" name="Titledescription" class="form-control" placeholder="">{{ strip_tags($snippets->describe) }}"</textarea>
                              </div>
                      </div>





                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="submit_btn text-end">
                              <button type="submit" class="waves-effect waves-light btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Update</button>
                          </div>
                      </div>
                  </div>
                </div>
              </div>


            </form>




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

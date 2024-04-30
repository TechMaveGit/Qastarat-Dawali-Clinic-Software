
@extends('superAdmin.superAdminLayout.main')
<!-- Content Wrapper. Contains page content -->
@push('title')
    <title>All-snippets</title>
@endpush
@section('content')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="d-flex">
      <h4 class="page-title">Snippets Management</h4>
      {{-- <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Snippets</li>
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
  <h3 class="box-title">All Snippets</h3>
  {{-- <a href="{{ route('add.snippets') }}" class="waves-effect waves-light btn btn-md btn-primary"><i class="fa-solid fa-plus"></i> Add New Snippet</a> --}}
  </div>

 </div>
 <!-- /.box-header -->
 <div class="box-body pt-0">
     <div class="table-main-box">
       <table id="custom_table" class="custom_table table  table-striped table-hover" style="width:100%">
         <thead>
             <tr>
                 <th>S.No</th>
                 <th>Title</th>
                 <th>Snippet Content</th>
                 <th>Action</th>

             </tr>
         </thead>
         <tbody>



            @forelse ($snippets as $key=>$allsnippets)
            @php
              $allTemplate = DB::table('progress_note_canned_text')->where('id',$allsnippets->progress_note_canned_text_id)->first();
            @endphp

             <tr>
                 <td>{{$key+1}}</td>
                 <td>{{$allTemplate->canned_name}}</td>
                 <td>{!! $allsnippets->describe !!}</td>
                 <td>
                   <div class="btn-group">
                      <a class="hover-primary dropdown-toggle no-caret" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                      <div class="dropdown-menu">
                      <!-- <a class="dropdown-item" href="#">View Details</a> -->
                      <a class="dropdown-item" href="{{ route('edit.snippets', ['id' => $allsnippets->id]) }}">Edit</a>

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

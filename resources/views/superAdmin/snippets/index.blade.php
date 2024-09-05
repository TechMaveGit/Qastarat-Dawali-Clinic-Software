
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
      <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Snippets</li>
              </ol>
          </nav>
      </div>

      </div>
      <section class="content">
      <div class="row">
      <div class="col-12">

<div class="box">
 <div class="box-header with-border">
  <div class="top_area">
  <h3 class="box-title">All Snippets</h3>
  <a href="{{ route('add.snippets') }}" class="waves-effect waves-light btn btn-md btn-primary"><i class="fa-solid fa-plus"></i> Add New Snippet</a>
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
                 <td>{{$allTemplate->canned_name??''}}</td>
                 <td>{!! $allsnippets->describe??'' !!}</td>

                 <td>

                    <ul class="action_icons">
                     
                      <li>
                              <a href="{{ route('edit.snippets', ['id' => $allsnippets->id]) }}" class="waves-effect waves-light btn btn-rounded btn-warning-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></a>
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


@endsection

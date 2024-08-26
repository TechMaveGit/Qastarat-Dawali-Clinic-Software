@extends('superAdmin.superAdminLayout.main')
<!-- Content Wrapper. Contains page content -->
@push('title')
<title>Add Snippets</title>
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
                        <li class="breadcrumb-item"><a href="{{route('snippets')}}">All Snippets</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Snippet</li>

                    </ol>
                </nav>
            </div>

        </div>
        <section class="content">
            <div class="row">


                <div class="col-12">
                    <div class="box">
                        <form action="{{route('add.snippets')}}" method="POST">
                            @csrf
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
                                        <input type="text" name="newContext" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Give your Snippet Title</label>
                                        <input type="text" name="snippetText" class="form-control" placeholder="">
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Type or paste in your text snippet here..</label>
                                        <textarea rows="4" name="snippetDescription" class="form-control"
                                            placeholder=""></textarea>
                                    </div>
                                </div>




                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="submit_btn text-end">
                                        <button type="submit" class="waves-effect waves-light btn btn-primary"><i
                                                class="fa-regular fa-floppy-disk"></i> Save</button>
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
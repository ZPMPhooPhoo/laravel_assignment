@extends('backend.layout.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>New Blogs</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">New Blogs</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-10 m-auto">
                <!-- jquery validation -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">New Blogs</h3>
                    </div><!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post" action="{{ route('blogs.store')}}" class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                </div>
                                @if($errors->has('name'))
                                    <div class="error text-danger">{{$errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="description" placeholder="Enter Description">
                                </div>
                                @if($errors->has('description'))
                                    <div class="error text-danger">{{$errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="form-group-row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_active" id="inlineRadio1" value="0" checked>
                                        <label class="form-check-label" for="inlineRadio1">in active</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_active" id="inlineRadio2" value="1">
                                        <label class="form-check-label" for="inlineRadio2">is active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-info">Submit</button>
                          <a href="{{route('blogs.index')}}" class="btn btn-default float-right">Cancel</a>
                        </div>
                        <!-- /.card-footer -->
                    </form><!-- /.form-end -->
                </div><!-- /.card -->
            </div><!--/.col (left) -->
            
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
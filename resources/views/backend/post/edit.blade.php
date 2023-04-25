@extends('backend.layout.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Post</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Post</li>
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
                        <h3 class="card-title">Edit Blogs</h3>
                    </div><!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post" action="{{ route('post.update', $data->id)}}" class="form-horizontal">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{ $data->title}}">
                                </div>
                                @if($errors->has('title'))
                                    <div class="error text-danger">{{$errors->first('title') }}</div>
                                @endif        
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="description" placeholder="Enter Description" value="{{ $data->description}}">
                                </div>
                                @if($errors->has('description'))
                                    <div class="error text-danger">{{$errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="form-group-row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="is_active" value="1"{{($data->is_active) == 1 ? ' checked' : ''}}>
                                        <label class="form-check-label" for="is_active">is_active</label>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-info">Update</button>
                          <a href="{{route('post.index')}}" class="btn btn-default float-right">Cancel</a>                          
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

<!-- <div class="container">
    <br><br>
    <h1>Edit Post</h1>
    
    <form method="post" action="{{ route('post.update', $data->id)}}" class="mt-3">
        @csrf
        {{ method_field('PATCH') }}
    <div class="form-group mt-3">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{ $data->title}}" >
        @if($errors->has('title'))
            <div class="error text-danger">{{$errors->first('title') }}</div>
        @endif
    </div>

    <div class="form-group mt-3">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" placeholder="Enter description" value="{{ $data->description}}">
        @if($errors->has('description'))
            <div class="error text-danger">{{$errors->first('description') }}</div>
        @endif
    </div>
    
    <div class="form-group mt-3">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" name="is_active" value="1"{{($data->is_active) == 1 ? ' checked' : ''}} >
        <label class="form-check-label" for="is_active">
            is_active
        </label>
        </div>
    </div>
    <button type="submit" class="btn btn-success mt-3">Update</button>
    <a href="{{route('post.index')}}" class="btn btn-warning mt-3">Back</a> 
    </form>
</div> -->
@endsection
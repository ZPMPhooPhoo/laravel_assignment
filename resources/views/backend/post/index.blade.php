@extends('backend.layout.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">                
                <h1>Post Listing</h1>
                @can('postCreate')
                <a href="{{route('post.create')}}" class="btn btn-success mt-3">Add New</a>
                @endcan
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Post Listing</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with minimal features & hover style</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Is_Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1 ?>
                                @foreach ($data as $val)
                                <tr>
                                    <td> {{ $count++ }} </td>
                                    <td> {{ "ID - " . $val->id }} </td>
                                    <td> {{ $val->title }} </td>
                                    <td> {{ $val->description }} </td>
                                    <td>
                                    <input class="form-check-input" type="checkbox" onclick="return false;" style="margin-left: auto;margin-right: auto;" name="is_active" value=""{{($val->is_active) == 1 ? ' checked' : ''}} >
                                    </td>
                                    <td>
                                        @can('postEdit')
                                        <a href="{{route('post.edit',$val->id)}}" class="btn btn-primary">Edit</a>
                                        @endcan

                                        @can('postShow')
                                        <a href="{{route('post.show',$val->id)}}" class="btn btn-success">View</a>
                                        @endcan

                                        @can('postDelete')
                                        <form action="{{route('post.destroy',$val->id)}}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Is_Active</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <div class="container">
    <br><br>
    <h1>Post Listing</h1>
    <a href="{{route('post.create')}}" class="btn btn-success">Add New</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">is_active</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 1 ?>
            @foreach ($data as $val)
            <tr>
                <td> {{ $count++ }} </td>
                <td> {{ "ID - " . $val->id }} </td>
                <td> {{ $val->title }} </td>
                <td> {{ $val->description }} </td>
                <td>
                <input class="form-check-input" type="checkbox" onclick="return false;" name="is_active" value=""{{($val->is_active) == 1 ? ' checked' : ''}} >
                </td>
                <td>
                    
                    <a href="{{route('post.edit',$val->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{route('post.show',$val->id)}}" class="btn btn-success">View</a>
                    <form action="{{route('post.destroy',$val->id)}}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>
                
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div> -->
@endsection

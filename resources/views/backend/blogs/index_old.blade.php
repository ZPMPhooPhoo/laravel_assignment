@extends('backend.layout.master')
@section('content')
<div class="container">
    <h1>Blogs Listing</h1>
    <a href="{{route('blogs.create')}}" class="btn btn-success">Add New</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">image</th>
            <th scope="col">description</th>
            <th scope="col">is_active</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 1 ?>
            @foreach ($data as $val)
            <tr>
                <td>{{$count++}}</td>
                <td> {{ "ID - " . $val->id }} </td>
                <td> {{ $val->name }} </td>
                <td> {{ $val->image }} </td>
                <td> {{ $val->description }} </td>
                <!-- <td> {{ $val->is_active }}</td> -->
                <td>
                <input class="form-check-input" type="checkbox" onclick="return false;" name="is_active" value=""{{($val->is_active) == 1 ? ' checked' : ''}} >
                </td>
                <td>
                    <a href="{{route('blogs.edit',$val->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{route('blogs.show',$val->id)}}" class="btn btn-success">View</a>
                    <form action="{{route('blogs.destroy',$val->id)}}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection
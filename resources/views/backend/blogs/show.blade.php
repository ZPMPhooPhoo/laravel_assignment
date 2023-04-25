@extends('backend.layout.master')
@section('content')
<div class="container">
    <br><br>
    <h1>Show Blogs </h1>
    
    <form method="post" class="mt-3">
        @csrf
        <table class="table table-light mt-3">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">image</th>
                <th scope="col">description</th>
                <th scope="col">is_active</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $count = 1 }} </td>
                    <td> {{  "ID - " . $data->id }}</td>
                    <td> {{ $data->name }} </td>
                    <td> {{ $data->image }} </td>
                    <td> {{ $data->description }} </td>
                    <!-- <td> {{ $data->is_active }}</td> -->
                    <td>
                    <input class="form-check-input" type="checkbox" onclick="return false;" name="is_active" value=""{{($data->is_active) == 1 ? ' checked' : ''}} >
                    </td>
                </tr>
            </tbody>
        </table>
        <a href="{{route('blogs.index')}}" class="btn btn-warning">Back</a>
    
    </form>
</div>
@endsection
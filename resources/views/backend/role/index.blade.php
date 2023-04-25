@extends('backend.layout.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Role Listing</h1>
    
        <a href="{{ route('role.create') }}" class="btn btn-success mt-3">Add New</a>
    
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Role</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              DataTable with minimal features & hover style
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Id</th>
                  <th>Name</th>                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $count = 1 ?>
                @foreach ($data as $val)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{ "ID - " . $val->id }}</td>
                  <td>{{ $val->name }}</td>                  
                  <td>
                   
                    <a href="{{route('role.edit',$val->id)}}" class="btn btn-primary">Edit</a>
               

             
                    <a href="{{route('role.show',$val->id)}}" class="btn btn-success">View</a>
             

                   
                    <form action="{{route('role.destroy',$val->id)}}" method="POST" style="display: inline-block">
                      @csrf @method('DELETE')
                      <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete?')">
                        Delete
                      </button>
                    </form>
          
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Id</th>
                  <th>Name</th>                  
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>

          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>

  <!-- /.container-fluid -->
</section>

<!-- /.content -->
@endsection
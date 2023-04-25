@extends('backend.layout.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
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
                        <h3 class="card-title">Edit User</h3>
                    </div><!-- /.card-header -->
                    
                    <!-- form start -->
                    <form method="post" action="{{ route('user.update', $data->id)}}" class="form-horizontal">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">                                
                                <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ $data->name}}" >
                                </div>
                                @if($errors->has('name'))
                                    <div class="error text-danger">{{$errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ $data->email}}">
                                </div>
                                @if($errors->has('email'))
                                    <div class="error text-danger">{{$errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" placeholder="Enter Password" value="{{ $data->password}}">
                                </div>
                                @if($errors->has('password'))
                                    <div class="error text-danger">{{$errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password" value="{{ $data->password_confirmation}}">
                                </div>
                                @if($errors->has('password_confirmation'))
                                    <div class="error text-danger">{{$errors->first('password_confirmation') }}</div>
                                @endif
                            </div>
                            
                            <div class="form-group row">
                                <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                                <div class="col-sm-10">                                    
                                    <select class="custom-select" name="roles[]" id="roles[]" class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ in_array($role->name, $userRole) 
                                                    ? 'selected'
                                                    : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('roles')) <div class="error text-danger">{{ $errors->first('roles') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-info">Update</button>
                          <a href="{{route('user.index')}}" class="btn btn-default float-right">Cancel</a>                          
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
@extends('backend.layout.app')

@section('title')
    Admin-Create
@endsection

@section('content')
    <!-- Main Content -->
    
        <div class="row ">
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Admin Update Form</h4>
                    </div>
                    <form action="{{route('admin.update',$admin->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Admin Name</label>
                                    <input type="text" name="name" class="form-control"  value="{{$admin->name}}">
                                    @error('name')
                                        <div class="error text-danger my-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">User Name</label>
                                    <input type="text" name="username" class="form-control"  value="{{$admin->username}}">
                                    @error('username')
                                        <div class="error text-danger my-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Admin Email</label>
                                        <input type="text" name="email" class="form-control"  value="{{$admin->email}}">
                                        @error('email')
                                            <div class="error text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Password</label>
                                        <input type="password" name="password" class="form-control" id="inputEmail4" placeholder="Enter Password">
                                        @error('password')
                                            <div class="error text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputState">Asign Role</label>
                                    <select  name="roles[]"  id="inputState" class="form-control select2" multiple>
                                        @foreach ($roles as $item)
                                            <option value="{{$item->name}}" {{$admin->hasRole($item->name) ? 'selected' : ''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                        <div class="error text-danger my-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Enter Confirm Password">
                                    @error('password_confirmation')
                                        <div class="error text-danger my-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save a New Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

          
@endsection
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
                    <h4>Admin Form</h4>
                </div>
                <form action="{{route('admin.store')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6 pr-5">
                                <label for="name">Admin Name</label>
                                <input type="text" name="name" class="form-control"  placeholder="Enter Name">
                                @error('name')
                                    <div class="error text-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">User-Name</label>
                                <input type="text" name="username" class="form-control"  placeholder="Enter User Name">
                                @error('username')
                                    <div class="error text-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                                <div class="form-group col-md-6 pr-5">
                                    <label for="email">Admin Email</label>
                                    <input type="text" name="email" class="form-control"  placeholder="Enter Eamail">
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
                            <div class="form-group col-md-6 pr-5">
                                <label for="roles">Asign Role</label>
                                    <select name="roles[]" id="inputState" class="form-control select2" multiple>
                                        @foreach ($roles as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
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
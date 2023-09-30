@extends('backend.layout.app')

@section('title')
    User-Manage
@endsection

@section('content')
    <!-- Main Content -->
   
    <div class="row">
      <div class="col-12 pb-3">
        <div class="d-flex justify-content-end px-3">
          <a class="btn btn-primary" href="{{route('user.create')}}"><i class="fas fa-user-plus"></i><span class="px-3">Add User</span></a>
        </div>
      </div>
    </div>
          <div class="row ">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>User Table</h4>
                  <div class="card-header-form">
                    <form>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md">
                      <tr>
                        <th>SI No</th>
                        <th> Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Action</th>
                      </tr>
                      @foreach ($users as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td class="my-2">
                            @foreach ($item->roles as $role)
                              <span style="margin-top: 7px;" class="badge bg-success">{{$role->name}}</span>
                            @endforeach
                        </td>
                        <td class="">{{$item->created_at->format('M-d-y')}}</td>
                        <td class="d-flex justify-content-between">
                          <a href="{{route('user.edit', $item->id)}}" class="btn btn-icon btn-primary mr-3"><i class="far fa-edit"></i> </a>
                          <a  href="{{ route('user.destroy', $item->id) }}"
                              onclick="event.preventDefault(); document.getElementById('delete-form-{{$item->id}}').submit();"
                              class="btn btn-icon btn-danger"><i class="fas fa-trash-alt"></i> 
                          </a>
                            <form id="delete-form-{{$item->id}}" action="{{ route('user.destroy', $item->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </table>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="#">1 <span
                            class="sr-only">(current)</span></a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          
@endsection
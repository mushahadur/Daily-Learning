@extends('backend.layout.app')

@section('title')
    Role-Manage
@endsection

@section('content')
    <!-- Main Content -->
   
    <div class="row">
      <div class="col-12 pb-3">
        <div class="d-flex justify-content-end px-3">
          <a class="btn btn-primary" href="{{route('role.create')}}"><i class="fas fa-user-plus"></i><span class="px-3">Add Role</span></a>
        </div>
      </div>
    </div>
          <div class="row ">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Role Table</h4>
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
                        <th>Role Name</th>
                        <th>Permission</th>
                        <th>Created At</th>
                        <th>Action</th>
                      </tr>
                      @foreach ($roles as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td class="my-2">
                            @foreach ($item->permissions as $permission)
                              <span style="margin-top: 7px;" class="badge bg-info">{{$permission->name}}</span>
                            @endforeach
                        </td>
                        <td class="">{{$item->created_at->format('M-d-y')}}</td>
                        <td class="d-flex justify-content-between">
                          <a href="{{route('role.edit', $item->id)}}" class="btn btn-icon btn-primary mr-3"><i class="far fa-edit"></i> </a>
                          <a  href="{{ route('role.destroy', $item->id) }}"
                              onclick="event.preventDefault(); document.getElementById('delete-form-{{$item->id}}').submit();"
                              class="btn btn-icon btn-danger"><i class="fas fa-trash-alt"></i> 
                          </a>
                            <form id="delete-form-{{$item->id}}" action="{{ route('role.destroy', $item->id) }}"
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
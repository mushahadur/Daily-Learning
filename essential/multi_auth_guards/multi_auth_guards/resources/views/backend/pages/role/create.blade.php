@extends('backend.layout.app')

@section('title')
    Role-Create
@endsection

@section('content')
    <!-- Main Content -->
    
          <div class="row ">

            <div class="col-10 mx-auto">
              <div class="card">
                <div class="card-header">
                  <h2>Role Create</h2>
                </div>
                <div class="card-body">
                  <form action="{{route('role.store')}}" method="POST" class="px-3">
                    @csrf
                    <input type="text" class="form-control" name="name" placeholder="Enter Role Name">
                        @error('name')
                            <div class="error text-danger my-2">{{ $message }}</div>
                        @enderror
                    <div class="">
                        <h5 class="card-title my-4"> Permissions</h5>
                        <label class="form-check my-2">
                            <input class="form-check-input" id="selectAll" type="checkbox" value="">
                            <span class="form-check-label">All</span>
                        </label>
                        <hr>
                        @php $i = 1; @endphp
                        @foreach ($permission_groups as $item)
                            <div class="row pb-2">
                                <div class="col-md-3">
                                    <label class="form-check my-2" style="text-transform: capitalize">
                                        <input class="form-check-input checkbox" id="{{$i}}Management" type="checkbox" onclick="checkPermissionByGroup('role-{{$i}}-management-checkbox', this)" value="{{$item->name}}">
                                        <span for="checkPermission" class="form-check-label">{{$item->name}}</span>
                                    </label>
                                </div>
                                <div class="col-md-9 role-{{$i}}-management-checkbox">
                                    @php
                                        $permissions = App\Models\User::getPermissionByGroupName($item->name);
                                        $j = 1; 
                                    @endphp
                                    @foreach ($permissions as $permission)
                                        <label class="form-check my-2" style="text-transform: capitalize">
                                            <input class="form-check-input checkbox" id="checkPermission" name="permissions[]" type="checkbox" value="{{$permission->name}}">
                                            <span for="checkPermission" class="form-check-label">{{$permission->name}}</span>
                                        </label>
                                        @php $j++; @endphp
                                    @endforeach
                                </div>
                            </div>
                            @php $i++; @endphp
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary  my-4" type="submit">Save New Role</button>
                    </div>
                </form>
              </div>


              <script>
                const selectAllCheckbox = document.getElementById('selectAll');
                const checkboxes = document.querySelectorAll('.checkbox');
        
                selectAllCheckbox.addEventListener('change', function() {
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = selectAllCheckbox.checked;
                    });
                });
        
                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        if (!this.checked) {
                            selectAllCheckbox.checked = false;
                        }
                    });
                });
        
                function checkPermissionByGroup(className, checkThis){
                    const groupIdName = $("#"+checkThis.id);
                    const classCheckbox = $('.'+className+' input');
                    if(groupIdName.is(':checked')){
                        classCheckbox.prop('checked', true);
                    }
                    else{
                        classCheckbox.prop('checked', false);
                    }
                }
            </script>
          
@endsection
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
                  <h2>Update Role Permission</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('role.update',$role->id)}}" method="POST" class="px-5">
                        @method('PUT')
                        @csrf

                            <input type="text" class="form-control py-2" name="name" value="{{$role->name}}" placeholder="Enter Role Name">
                                @error('name')
                                    <div class="error text-danger my-2">{{ $message }}</div>
                                @enderror
                            <h5 class="card-title my-4"> Permissions</h5>
                            <label class="form-check my-2">
                                <input class="form-check-input" id="selectAll" type="checkbox" value="">
                                <span class="form-check-label" for="customCheckAll">All</span>
                            </label>
                            <hr>
                            @php $i = 1; @endphp
                            @foreach ($permission_groups as $group)
                                <div class="row pb-2">
                                    @php
                                        $permissions = App\Models\User::getPermissionByGroupName($group->name);
                                        $j = 1; 
                                    @endphp
                                    <div class="col-md-3">
                                        <label class="form-check my-2">
                                            <input class="form-check-input checkbox" 
                                            id="{{$i}}customgroup"
                                            type="checkbox" 
                                            onclick="checkPermissionByGroup('role-{{$i}}-management-checkbox', this)"
                                            value="{{$group->name}}"
                                            {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : ''}}
                                            
                                            >
                                            <span class="form-check-label" for="{{ $i }}customgroup">{{ $group->name }}</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9 role-{{$i}}-management-checkbox">
                                        @foreach ($permissions as $permission)
                                            <label class="form-check my-2">
                                                <input class="form-check-input checkbox" 
                                                id="customCheck-{{ $permission->id }}"
                                                type="checkbox" 
                                                name="permissions[]"
                                                {{$role->hasPermissionTo($permission->name) ? 'checked' : ''}} 
                                                type="checkbox" 
                                                onclick="checkSinglePermission('role-{{ $i }}-checkbox-manage', '{{ $i }}customgroup', {{ count($permissions) }})"
                                                value="{{$permission->name}}"
                                                {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : ''}}
                                                
                                            >
                                                <span class="form-check-label" for="customCheck-{{ $permission->id }}"> {{ $permission->name }}</span>
                                            </label>
                                            
                                            @php $j++; @endphp
                                        @endforeach
                                    </div>
                                </div>
                                @php $i++; @endphp
                            @endforeach
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary  my-4" type="submit">Update Role</button>
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
    implementAllChecked();


    function checkPermissionByGroup(className, checkThis){
        const groupIdName = $("#"+checkThis.id);
        const classCheckBox = $('.'+className+' input');

        if(groupIdName.is(':checked')){
            classCheckBox.prop('checked', true);
        }
        else{
            classCheckBox.prop('checked', false);
        }

        implementAllChecked();
    }

    function checkSinglePermission(groupClassName, groupID, countTotalPermission){
        const classCheckbox = $('.'+groupClassName+ ' input');
        const groupIDCheckBox = $("#"+groupID);

        if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
            groupIDCheckBox.prop('checked', true);
        }
        else{
            groupIDCheckBox.prop('checked', false);
        }

        implementAllChecked();
    }
    function implementAllChecked() {
             const countPermissions = {{ count($permissions) }};
             const countPermissionGroups = {{ count($permission_groups) }};

             if($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)){
                $("#customCheckAll").prop('checked', true);
            }else{
                $("#customCheckAll").prop('checked', false);
            }
		}

</script>
          
@endsection
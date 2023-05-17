@extends('layouts.app')

@section('title')
    Outreach Link Agency | Role Edit Page
@endsection

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Role Edit Section</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="custom-validation" action="{{ route('role.update', $role->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3">
                                    <label class="form-label">Name <span style="color: red">*</span> </label>
                                    <input name="name" type="text" class="form-control" required
                                        value="{{ $role->name }}" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Permissions</label>
                                    <div class="custom-control custom-checkbox custom-checkbox-color-check">
                                        <input type="checkbox" class="custom-control-input bg-success" id="customCheckAll"
                                            value="1"
                                            {{ App\Models\User::roleHasPermissions($role, $permissionsAll) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheckAll">All Permission</label>
                                    </div>
                                    <hr>
                                    @php $i = 1; @endphp
                                    @foreach ($permissionsGroup as $group)
                                        <div class="row">
                                            @php
                                                $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                                $j = 1;
                                            @endphp
                                            <div class="col-3">
                                                <div class="custom-control custom-checkbox custom-checkbox-color-check">
                                                    <input type="checkbox" class="custom-control-input bg-success"
                                                        id="{{ $i }}customgroup" value="{{ $group->group_name }}"
                                                        onclick="checkPermissionByGroup('role-{{ $i }}-checkbox-manage', this)"
                                                        {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="{{ $i }}customgroup">{{ $group->group_name }}</label>
                                                </div>
                                            </div>
                                            <div class="col-9 role-{{ $i }}-checkbox-manage">
                                                @foreach ($permissions as $permission)
                                                    {{-- @dd($permission); --}}
                                                    <div
                                                        class="custom-control custom-checkbox custom-checkbox-color-check d-inline-block col-sm-3">
                                                        <input type="checkbox" class="custom-control-input bg-primary"
                                                            name="permissions[]"
                                                            onclick="checkSinglePermission('role-{{ $i }}-checkbox-manage', '{{ $i }}customgroup', {{ count($permissions) }})"
                                                            id="customCheck-{{ $permission->id }}"
                                                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                            value="{{ $permission->name }}">
                                                        <label class="custom-control-label"
                                                            for="customCheck-{{ $permission->id }}">
                                                            {{ $permission->name }}</label>
                                                    </div>
                                                    @php $j++; @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        @php $i++; @endphp
                                    @endforeach
                                </div>

                                <div>
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                            Update Role
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    @include('admin.components.checkbox-script')
@endpush

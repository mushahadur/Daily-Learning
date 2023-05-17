@extends('layouts.app')

@section('title')
    Outreach Link Agency | Role Create Page
@endsection

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">Role Create Section</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="custom-validation" action="{{ route('role.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name <span style="color: red">*</span> </label>
                                    <input name="name" type="text" class="form-control" required
                                        placeholder="Type something" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Permissions</label>
                                    <div class="custom-control custom-checkbox custom-checkbox-color-check">
                                        <input type="checkbox" class="custom-control-input bg-success" id="customCheckAll"
                                            value="1">
                                        <label class="custom-control-label" for="customCheckAll">All Permission</label>
                                    </div>
                                    <hr>
                                    @php $i = 1; @endphp
                                    @foreach ($permissionsGroup as $group)
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="custom-control custom-checkbox custom-checkbox-color-check">
                                                    <input type="checkbox" class="custom-control-input bg-success"
                                                        id="{{ $i }}customgroup" value="{{ $group->group_name }}"
                                                        onclick="checkPermissionByGroup('role-{{ $i }}-checkbox-manage', this)">
                                                    <label class="custom-control-label"
                                                        for="{{ $i }}customgroup">{{ $group->group_name }}</label>
                                                </div>
                                            </div>
                                            <div class="col-9 role-{{ $i }}-checkbox-manage">
                                                @php
                                                    $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                                    $j = 1;
                                                @endphp
                                                @foreach ($permissions as $permission)
                                                    {{-- @dd($permission); --}}
                                                    <div
                                                        class="custom-control custom-checkbox custom-checkbox-color-check d-inline-block col-sm-3">
                                                        <input type="checkbox" class="custom-control-input bg-primary"
                                                            name="permissions[]" id="customCheck-{{ $permission->id }}"
                                                            value="{{ $permission->name }}"
                                                            onclick="checkSinglePermission('role-{{ $i }}-checkbox-manage', '{{ $i }}customgroup', {{ count($permissions) }})">
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
                                            Submit
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

@extends('layouts.app')

@php
    $admin = Auth::guard('web')->user();
@endphp

@section('title')
    Outreach Link Agency | User list Page
@endsection

@section('dashboard')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <span class="mb-0 header-style">User List</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="mb-3 text-end">
                                        @if ($admin->can('User Create'))
                                            <a href="{{ route('user-create.create') }}"
                                                class="btn btn-otr-primary waves-effect waves-light"><i
                                                    class="mdi mdi-plus me-2"></i> Add User</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="">
                                <table id="data-table" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($user as $item)
                                            @if ($item->getRoleNames()->first() != 'Super Admin')
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/profile-image/' . $item->avatar) }}"
                                                            alt="" class="avatar-xs rounded-circle me-2">
                                                        <a href="#" class="text-body"></a>
                                                    </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>
                                                        @foreach ($item->roles as $role)
                                                            <span class="badge rounded-pill bg-info p-2">
                                                                {{ $role->name }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($item->roles as $role)
                                                            @if ($role->name != 'Super Admin')
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item">
                                                                        @if ($admin->can('User Edit'))
                                                                            <a href="{{ route('user-create.edit', $item->id) }}"
                                                                                class="btn btn-success" title="Edit"><i
                                                                                    class="fa fa-pencil-alt"></i></a>
                                                                        @endif
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        @if ($admin->can('User Delete'))
                                                                            <form
                                                                                action="{{ route('user-create.destroy', [$item->id]) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="btn btn-danger delete-confirm"
                                                                                    data-name="{{ $item->title }}"
                                                                                    title="Delete"><i
                                                                                        class="fa fa-trash-alt"></i></button>
                                                                            </form>
                                                                        @endif
                                                                    </li>
                                                                </ul>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

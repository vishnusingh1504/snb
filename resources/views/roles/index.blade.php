@extends('layouts.master')
@section('title') Role Management @endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <h4 class="card-title">All Roles</h4>
                        @can('create roles')
                            <a href="{{ route('roles.create') }}" class="btn btn-primary">Add New Role</a>
                        @endcan
                    </div>

                    <table class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Role Name</th>
                                <th>Permissions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach($role->permissions as $permission)
                                        <span class="badge bg-success">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('edit roles')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

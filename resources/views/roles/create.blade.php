@extends('layouts.master')
@section('title')
    Create New Role
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Create a New Role</h4>

                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role-name" class="form-label">Role Name</label>
                                    <input type="text" class="form-control" id="role-name" name="name"
                                        placeholder="Enter role name" required>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h5 class="mb-3">Assign Permissions</h5>
                        <div class="row">
                            @foreach ($permissions as $permission)
                                <div class="col-md-3">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox"
                                            id="permission-{{ $permission->id }}" name="permissions[]"
                                            value="{{ $permission->name }}">
                                        <label class="form-check-label" for="permission-{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Save Role</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

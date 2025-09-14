@extends('layouts.master')
@section('title')
    Edit User
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="dob" value="{{ old('dob', $user->dob) }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email"
                                value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label>Avatar</label>
                            <input type="file" class="form-control" name="avatar" accept="image/*">
                            @if ($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="60">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label>Assign Roles</label>
                            <select name="roles" class="form-select">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Update User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

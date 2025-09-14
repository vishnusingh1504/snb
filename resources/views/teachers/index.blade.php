@extends('layouts.master')

@section('title') Teachers @endsection

@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between mb-3">
        <h4 class="card-title">Teachers</h4>
        <a href="{{ route('teachers.create') }}" class="btn btn-primary">Add Teacher</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Teacher ID</th>
                <th>Qualification</th>
                <th>Experience</th>
                <th>Status</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->teacher->teacher_id }}</td>
                <td>{{ $teacher->teacher->qualification }}</td>
                <td>{{ $teacher->teacher->experience }}</td>
                <td>{{ ucfirst($teacher->teacher->status) }}</td>
                <td>
                    @if($teacher->teacher->image_location)
                        <img src="{{ asset('storage/'.$teacher->teacher->image_location) }}" width="50">
                    @endif
                </td>
                <td>
                    <a href="{{ route('teachers.edit',$teacher->teacher->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('teachers.destroy',$teacher->teacher->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this teacher?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $teachers->links() }}
  </div>
</div>
@endsection

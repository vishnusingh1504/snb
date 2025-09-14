@extends('layouts.master')

@section('title') Edit Teacher @endsection

@section('content')
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Edit Teacher</h4>
    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      @include('teachers.partials.form', ['teacher' => $teacher])
      <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
  </div>
</div>
@endsection

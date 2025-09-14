@extends('layouts.master')

@section('title') Add Teacher @endsection

@section('content')
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Add Teacher</h4>
    <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @include('teachers.partials.form')
      <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
  </div>
</div>
@endsection

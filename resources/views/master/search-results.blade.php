@extends('layouts.master')

@section('title') Search @endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Search @endslot
@slot('title') Results @endslot
@endcomponent

@endsection

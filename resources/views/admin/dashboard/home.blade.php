@extends('backend.master')
@section('content')
    <h3>Hello, {{ Auth::user()->name }} Welcome back !</h3>
@endsection
@extends('backend.master')
@section('content')
    <h3>Hello, {{ Auth::user()->role }} Welcome back !</h3>
@endsection
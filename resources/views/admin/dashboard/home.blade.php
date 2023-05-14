@extends('backend.master')
@section('content')
    <h3>Hello, {{ Auth::user()->name }} Welcome back !</h3>
    @if (session('status'))
    <script>
        Swal.fire({
            icon:'success',
            title:'Sukses!',
            text:"{{session('status')}}",
        });
    </script>   
@endif
@endsection
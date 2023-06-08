@extends('backend.master')
@section('content')
<form class="tab-wizard wizard-circle wizard vertical" action="{{ route('user-store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label >Nama :</label>
                <input name="name" type="text" class="form-control" required>

                @error('name')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label >Email :</label>
                <input name="email" type="email" class="form-control" required>

                @error('email')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Role :</label>
                <select name="role" class="custom-select form-control" required>
                    <option label="Pilih Role"></option>
                    <option value="admin">Admin</option>
                    <option value="perawat">Perawat</option>
                    <option value="pemimpin">Pemimpin</option>
                </select>

                @error('role')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label >Password :</label>
                <input name="password" type="password" class="form-control" required>

                @error('password')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label >Repeat Password :</label>
                <input name="password_confirmation" type="password" class="form-control" required>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary btn-user btn-block" type="submit">
                Simpan
            </button>
        </div>
    </div>   
</form>
@endsection
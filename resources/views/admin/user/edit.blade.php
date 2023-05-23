@extends('backend.master')
@section('content')
<form class="tab-wizard wizard-circle wizard vertical" action="{{ route('user-update', $user->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label >Nama :</label>
                <input name="name" type="text" class="form-control" value="{{ $user->name }}" required>

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
                <input name="email" type="email" class="form-control" value="{{ $user->email }}" required>

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
                    <option>{{ $user->role }}</option>
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

        <div class="col-12">
            <button class="btn btn-primary btn-user btn-block" type="submit">
                Update
            </button>
        </div>
    </div>   
</form>
@endsection
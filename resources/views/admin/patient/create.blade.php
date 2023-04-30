@extends('backend.master')
@section('content')
<form class="tab-wizard wizard-circle wizard vertical" action="{{ route('patient-store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label >Nama lengkap :</label>
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
                <label>Jenis kelamin :</label>
                <select name="gender" class="custom-select form-control" required>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>

                @error('gender')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label >Date of Birth :</label>
                <input name="date_of_birth" type="date" class="form-control" placeholder="Select Date" required >

                @error('date_of_birth')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label >Usia :</label>
                <input name="age" type="number" class="form-control" required>
                @error('age')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label >Alamat :</label>
                <input name="address" type="text" class="form-control" required>
                @error('address')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
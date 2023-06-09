@extends('backend.master')
@section('content')
<form class="tab-wizard wizard-circle wizard vertical" action="{{ route('patient-update', $patient->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label >Nama lengkap :</label>
                <input name="name" type="text" class="form-control" value="{{ $patient->name }}" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Jenis kelamin :</label>
                <select name="gender" class="custom-select form-control" required>
                    <option>{{ $patient->gender }}</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label >Tanggal lahir :</label>
                <input name="date_of_birth" type="date" class="form-control" placeholder="Select Date" value="{{ $patient->date_of_birth }}" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label >Alamat :</label>
                <input name="address" type="text" class="form-control" value="{{ $patient->address }}" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Penyakit :</label>
                <input name="disease" type="text" class="form-control" value="{{ $patient->disease }}" required>
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
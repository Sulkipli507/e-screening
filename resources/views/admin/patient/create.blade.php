@extends('backend.master')
@section('content')
<form class="tab-wizard wizard-circle wizard vertical">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label >Nama lengkap :</label>
                <input name="name" type="text" class="form-control" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Jenis kelamin :</label>
                <select name="gender" class="custom-select form-control" required>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label >Date of Birth :</label>
                <input name="date_of_birth" type="date" class="form-control" placeholder="Select Date" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label >Usia :</label>
                <input type="number" class="form-control" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label >Alamat :</label>
                <input type="text" class="form-control" required>
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
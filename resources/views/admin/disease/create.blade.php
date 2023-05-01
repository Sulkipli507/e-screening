@extends('backend.master')
@section('content')
<form class="tab-wizard wizard-circle wizard vertical" action="{{ route('disease-store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label >Nama Penyakit :</label>
                <input name="name" type="text" class="form-control" required>

                @error('name')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
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
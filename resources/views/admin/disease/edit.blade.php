@extends('backend.master')
@section('content')
<form class="tab-wizard wizard-circle wizard vertical" action="{{ route('disease-update', $disease->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label >Nama penyakit :</label>
                <input name="name" type="text" class="form-control" value="{{ $disease->name }}" required>
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
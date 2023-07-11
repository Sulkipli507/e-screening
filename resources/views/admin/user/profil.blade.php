@extends('backend.master')
@section('content')
<div class="row">
    <div class="col-md-12 col-lg-6 mb-3">
        <div class="card">
            <div class="card-body card-block">
                <form class="tab-wizard wizard-circle wizard vertical" action="{{ route('user-updateProfile', $user->id) }}" method="post">
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
        
                        <div class="col-12">
                            <button class="btn btn-primary btn-user btn-block" type="submit">
                                Update
                            </button>
                        </div>
                    </div>   
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-body card-block">
                <form class="tab-wizard wizard-circle wizard vertical" action="{{ route('user-updatePassword', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
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
                                Update
                            </button>
                        </div>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>

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
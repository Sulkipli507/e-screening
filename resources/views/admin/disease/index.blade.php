@extends('backend.master')
@section('content')
<div class="card shadow mb-4"> 
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ route('disease-create') }}"><button class="btn btn-primary">Tambah data</button></a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama penyakit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diseases as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('disease-edit', $item->id) }}">Edit</a>
                            <form action="{{ route('disease-delete', $item->id ) }}" method="post" style="display:inline" class="form-check-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" >HAPUS</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection